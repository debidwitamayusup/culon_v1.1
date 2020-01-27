<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class WallboardModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Op_Performance($src='')
    {
        $this->db->select('*');
        $this->db->from('v_summ_ticket_unit');
        if($src)
		{
			$this->db->like('unit',$src);
        }
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            $idx = 1;
            foreach($query->result() as $data)
            {
                // $result[] = array(
                //     'unit_name' => $data->unit,
                //     'New'   => $data->sNew,
                //     'Open'  => $data->sOpen,
                //     'ReProses' => $data->sReProses,
                //     'ReOpen' => $data->sReopen,
                //     'PreClose' => $data->sPreClose,
                //     'ReAssign' => $data->sReAssign,
                //     'Pending' => 'NAN 0',
                //     'jml' => $data->jml
                // );

     //missing pending - reject
                $result[] = array(
                     $idx,
                     $data->unit,
                     $data->sNew,
                     $data->sOpen,
                     $data->sReopen,
                     

                     $data->sReProses,
                     $data->sReAssign,
                     $data->sPreClose,
                     $data->jml
                );
                $idx++;
            }

            return $result;
        }

        return FALSE;
    }

    public function sumStat_NC()
    {
        $this->db->select('SUM(sNew) as SNEW, SUM(sOpen) as SOPEN, SUM(sReopen) as SREOPEN, SUM(sReProses) as SREPROSES, SUM(sPreClose) as SPRECLOSE, SUM(sReAssign) as SREASSIGN');
        $this->db->from('v_summ_ticket_unit');
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            $result = array(
                'sumNew'   => $query->row()->SNEW,
                'sumOpen'  => $query->row()->SOPEN,
                'sumReProses' => $query->row()->SREPROSES,
                'sumReOpen' => $query->row()->SREOPEN,
                'sumPreClose' => $query->row()->SPRECLOSE,
                'sumReAssign' => $query->row()->SREASSIGN,
                'sumPending' => 'NAN 0'
             );

            return $result;
        }

           
        

        return FALSE;


    }

    public function Traffic_ops($params,$index,$params_year)
    {
        $this->db->select('tenant_id, SUM(art_num) AS ART, SUM(aht_num) AS AHT, SUM(ast_num) AS AST, SUM(scr) AS SCR');
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
        // $this->db->order_by('');
        $query = $this->db->get();
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
                $result[] = array(
                    'TENANT_ID' => $data->tenant_id,
                    'ART' => $data->ART,
                    'AHT' => $data->AHT,
                    'AST' => $data->AST,
                    'SCR' => $data->SCR
                );
            }
            return $result;
        }

        return FALSE;
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
    


}