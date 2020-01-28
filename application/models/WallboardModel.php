<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class WallboardModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function Op_Performance($src='')
    {
        $this->db->select('m_unit.unit,m_unit.unit_id');
        $this->db->from('m_unit');
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
        
            $idx = 1;
            foreach($query->result() as $data)
            {
                $data1 = array(
                        $idx,
                        $data->unit    
                    );
                $idx++;
                $data2 = $this->Op_Performancestat($src,$data->unit_id);
                $data3 = array_merge($data1,$data2);
                $result[] = $data3; 
            }
            return $result;
        }
        return FALSE;


    }

    function Op_Performancestat($src ='',$unit)
    {
        $this->db->select('status_id');
        $this->db->from('m_status');
        $this->db->where('status_id !=',8);
        $this->db->order_by('status_id');
        $query = $this->db->get();

        $result = array();

        if($query->num_rows()>0)
        {
            $tdatas=0;

            foreach($query->result() as $data)
            {
                $datas = $this->Op_Performancedata($src,$unit,$data->status_id);
                $tdatas = $tdatas + $datas;
                array_push($result,$datas);
            }
            array_push($result,strval($tdatas));

            return $result;
        }
        return FALSE;
    }



    function Op_Performancedata($src='',$unit,$status_id)
    {
        $this->db->select('v_summ_unit.jml');
        $this->db->from('v_summ_unit');
        $this->db->join('m_status','v_summ_unit.ticket_status = m_status.status_id');
        $this->db->where('v_summ_unit.unit_id',$unit);
        $this->db->where('v_summ_unit.ticket_status',$status_id);
        if($src)
		{
			$this->db->like('m_unit.unit',$src);
        }
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            return $query->row()->jml;
        }

        return "0";
    }

    

    public function sumStat_NC()
    {
        $this->db->select('m_status.status , SUM(v_summ_unit.jml) as jml');
        $this->db->from('m_status');
        $this->db->join('v_summ_unit','v_summ_unit.ticket_status = m_status.status_id');
        $this->db->where('v_summ_unit.jml IS NOT NULL');
        $this->db->or_where('v_summ_unit.jml IS NULL');
        $this->db->group_by('v_summ_unit.ticket_status');

        $query = $this->db->get();
        $result = array();

        if($query->num_rows()>0)
        {
            foreach($query->result() as $datas)
            {
                $result['sum'.$datas->status] = $datas->jml;
            }
            
            // $result = array(
            //     'sumNew'   => $query->row()->SNEW,
            //     'sumOpen'  => $query->row()->SOPEN,
            //     'sumReProses' => $query->row()->SREPROSES,
            //     'sumReOpen' => $query->row()->SREOPEN,
            //     'sumPreClose' => $query->row()->SPRECLOSE,
            //     'sumReAssign' => $query->row()->SREASSIGN,
            //     'sumPending' => 'NAN 0'
            //  );

            return $result;
        }         
        return FALSE;
    }

    public function Traffic_ops($params,$index,$params_year)
    {
        $this->db->select('tenant_id');
        $this->db->from('rpt_summary_scr');
        if($params == 'day')
        {
            $this->db->where('tanggal',$index);
        }
        if($params == 'month')
        {
            $this->db->where('MONTH(tanggal)',$index);
            $this->db->where('YEAR(tanggal)',$params_year);
        } 
        if($params == 'year')
        {
            $this->db->where('YEAR(tanggal)',$index);
        }
        $this->db->group_by('tenant_id');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
                
                $result[] = array(
                    'TENANT_ID' => $data->tenant_id,
                    'DATA' => $this->Traffic_opschannel($params,$index,$params_year,$data->tenant_id)
                );
            }
            return $result;
        }

        return FALSE;
    }

    function Traffic_opschannel($params,$index,$params_year,$tid)
    {
        $this->db->select('channel_id');
        $this->db->from('m_channel');
        $query = $this->db->get();

        $result = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
               array_push($result,$this->Traffic_opsdata($params,$index,$params_year,$tid,$data->channel_id));
            }
            return $result;
        }
        return FALSE;
    }


    function Traffic_opsdata($params,$index,$params_year,$tid,$channel)
    {
        $this->db->select('IFNULL(SUM(rpt_summary_scr.cof),0) AS cof');
        $this->db->from('rpt_summary_scr');
        $this->db->join('m_channel','m_channel.channel_id = rpt_summary_scr.channel_id');
        if($params == 'day')
        {
            $this->db->where('rpt_summary_scr.tanggal',$index);
        }
        if($params == 'month')
        {
            $this->db->where('MONTH(rpt_summary_scr.tanggal)',$index);
            $this->db->where('YEAR(rpt_summary_scr.tanggal)',$params_year);
        } 
        if($params == 'year')
        {
            $this->db->where('YEAR(rpt_summary_scr.tanggal)',$index);
        }
        $this->db->where('rpt_summary_scr.tenant_id',$tid);        
        $this->db->where('rpt_summary_scr.channel_id',$channel);
        $query = $this->db->get();

       
        if($query->num_rows() > 0)
        {
            return $query->row()->cof;
        }
        return 0;
    }

    public function scr_pie_chart_channel($params,$index,$params_year)
    {
        $this->db->select('m_channel.channel_name,m_channel.channel_id,m_channel.channel_color');
		$this->db->from('m_channel');
		$query = $this->db->get();

        $res_channel = array();
        $res_color = array();
		$res_tot = array();
			
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $data)
			{
                array_push($res_channel,$data->channel_name);
                array_push($res_color,$data->channel_color);
				array_push($res_tot,$this->get_total_cof_piechart($params,$index,$params_year,$data->channel_id));
			}

			$result = array(
                'channel_name' => $res_channel, 
                'color' => $res_color,
				'total' => $res_tot
			);
		}
		
		return $result;
    }

    function get_total_cof_piechart($params,$index,$params_year,$channel) //summ
	{
        
		$this->db->select('rpt_summary_scr.cof as TOTAL');
        $this->db->from('rpt_summary_scr');
        if($params == 'day')
        {
            $this->db->where('rpt_summary_scr.tanggal',$index);
        }
        if($params == 'month')
        {
            $this->db->where('MONTH(rpt_summary_scr.tanggal)',$index);
            $this->db->where('YEAR(rpt_summary_scr.tanggal)',$params_year);
        } 
        if($params == 'year')
        {
            $this->db->where('YEAR(rpt_summary_scr.tanggal)',$index);
        }
		
		$this->db->where('rpt_summary_scr.channel_id',$channel);
		$query = $this->db->get();

		if($query->num_rows()>0)
		{
			return $query->row()->TOTAL;
		}
		else
		{
			return '0';
		}

    }
    
    function get_intervalchart($params,$index,$params_year,$channel)
    {
        $this->db->select('rpt_summ_interval.interval as time');
		$this->db->from('rpt_summ_interval');
		$this->db->group_by('rpt_summ_interval.interval','ASC');
		$query = $this->db->get();
		$times = array();

		if($query->num_rows()>0)
		{
			foreach($query->result() as $data)
			{
				array_push($times,substr($data->time,0,5).':00');
			}

			if($channel)
			{
				foreach($channel as $channels)
				{
					$serials[] =  array(
						'label'=>$channels,
						'data'=>$this->get_availdata($params,$index,$params_year,$channels)
					);
				}
			}
			else 
			{
				$serials[] =  array(
					'label'=>'Facebook',
					'data'=>array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)
				);
			}
		}

		$result = array(
					'label_time' => $times,
					'series' => $serials
                );
		


		return $result;
		
    }

    function get_availdata($params,$index,$params_year,$channel)
	{
		if(!$channel)
		{
			return array("0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
		}

		$this->db->select('rpt_summ_interval.interval , COALESCE(SUM(rpt_summ_interval.case_session),0) as total');
		$this->db->from('m_channel');
        $this->db->join('rpt_summ_interval','rpt_summ_interval.channel_id = m_channel.channel_id');
        if($params =='day')
        {
            $this->db->where('rpt_summ_interval.tanggal', $index);
        }
        else if($params == 'month')
        {
            $this->db->where('MONTH(rpt_summ_interval.tanggal)', $index);
            $this->db->where('YEAR(rpt_summ_interval.tanggal)', $params_year);
        }
        else if($params == 'year')
        {
            $this->db->where('YEAR(rpt_summ_interval.tanggal)', $index);
        }
		
		$this->db->where_in('m_channel.channel_name',$channel);
		$this->db->group_by('rpt_summ_interval.interval','ASC');
		$query = $this->db->get();
		$result = array();
		
		// print_r($this->db->last_query());
		// exit;

		if($query->num_rows()>0)
		{
			
			for($inx = 0;$inx < 24; $inx++)
			{
				if(str_pad(strval($inx), 1, '0', STR_PAD_LEFT)  == substr($query->row($inx)->interval,0,2))
				{
					array_push($result,$query->row($inx)->total);
				}
				else
				{
					array_push($result,'0');
				}
					
			}

		}
		else
		{
			$result = array("0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
		}
		

		return $result;
		
    }

    public function SummPerformOps($date,$src)
    {
        $this->db->select('REPLACE(rpt_summary_scr.tenant_id,"oct_","") as id, rpt_summary_scr.tenant_id ,SUM(cof) as COF, SUM(art_num) ART, SUM(aht_num) as AHT, SUM(ast_num) as AST, SUM(scr) as SCR');
        $this->db->from('rpt_summary_scr');
        $this->db->where('tanggal',$date);
        if($src)
        {
            $this->db->where('tenant_id',$src);
        }
        $this->db->group_by('tenant_id');

        $query = $this->db->get();
        
        if($query->num_rows()>0)
        {
            foreach($query->result() as $data)
            {
                $t_id = $data->tenant_id;

                $data = array(
                    'TENANT_ID' => strtoupper($data->id),
                    'SUMCOF' =>  $data->COF,
                    'SUMART' => $data->ART,
                    'SUMAHT' => $data->AHT,
                    'SUMAST' => $data->AST,
                    'SUMSCR' => $data->SCR
                );

                $data2 = $this->SummPerformOps_sub($date,$t_id);

                $data3 = array_merge($data,$data2);
                $result[] = $data3;

            }

            return $result;
        }

        return FALSE;
    }

    function SummPerformOps_sub($date,$tenant_id)
    {

        $this->db->select('m_channel.channel_name , IFNULL(rpt_summary_scr.cof,0) as cof');
        $this->db->from('m_channel');
        $this->db->join('rpt_summary_scr','m_channel.channel_id = rpt_summary_scr.channel_id','left');
        $this->db->where('rpt_summary_scr.tanggal',$date);
        $this->db->where('rpt_summary_scr.tenant_id',$tenant_id);
        $this->db->where('cof IS NOT NULL');
        $this->db->or_where('cof IS NULL');
        $this->db->group_by('m_channel.channel_name');
        $this->db->order_by('m_channel.channel_id','asc');

        $query = $this->db->get();
        $result = array();


        if($query->num_rows()>0)
        {
            foreach($query->result() as $data)
            {
                $result[$data->channel_name] =  $data->cof;
            }
       
            return $result;
        }

        return false;
        
    }

    public function Tenantscrget($date)
    {
        $this->db->select('tenant_id');
        $this->db->from('rpt_summary_scr');
        $this->db->where('tanggal',$date);
        $this->db->group_by('tenant_id');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $result = array();
            foreach($query->result() as $data)
            {
                array_push($result,$data->tenant_id);
            }
            return $result;
        }
        return false;
    }

    public function Channel_data()
    {
        $this->db->select('channel_name');
        $this->db->from('m_channel');
        $query = $this->db->get();

        $result = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
               array_push($result,$data->channel_name);
            }
            return $result;
        }
        return FALSE;
    }

//under const

public function SummStatusTicketOps($date,$src)
    {
        $this->db->select('rpt_summ_kip1.tenant_id,');
        $this->db->from('rpt_summ_kip1');
        $this->db->where('tanggal',$date);
        if($src)
        {
            $this->db->where('tenant_id',$src);
        }
        $this->db->group_by('category');
        $this->db->group_by('tenant_id');

        $query = $this->db->get();
        
        if($query->num_rows()>0)
        {
            foreach($query->result() as $data)
            {
                $t_id = $data->tenant_id;

                $data = array(
                    'TENANT_ID' => $t_id
                );

                $result[] = $data3;

            }

            return $result;
        }

        return FALSE;
    }
    public function SummTicketC($months,$year)
    {
        

        return FALSE;

    }
    


}