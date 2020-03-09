<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class WallboardModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

#region :: raga
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

    public function Traffic_ops($params,$index,$params_year,$grup)
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id'));

        $this->db->select('group_id');
        $this->db->from('m_tenant');
        $this->db->where('group_id != ""');
        if($grup)
        {
            $this->db->where_in('group_id',$grup);
        }
        $this->db->group_by('group_id');
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            foreach($q->result() as $qq)
            {
                $tenant_dt = $this->tenant_result($params,$index,$params_year,$tid,$qq->group_id);
                if($tenant_dt)
                {
                    $result[] = array(
                        'GROUP' => $qq->group_id,
                        'DATA' => $this->tenant_result($params,$index,$params_year,$tid,$qq->group_id)
                    );  
                }
                else 
                {
                    $result[] = array(
                        'GROUP' => $qq->group_id,
                        'DATA' => array()
                    );
                }    
                
            }
            
        return $result;
        }
        return FALSE;
    }

    function tenant_result($params,$index,$params_year,$tid,$group)
    {
        $this->db->select('tenant_id, tenant_name');
        $this->db->from('m_tenant');
        $this->db->where('group_id',$group);
        if($tid)
        {
            $this->db->where_in('tenant_id',$tid);
        }
        $this->db->group_by('tenant_id');
        $query = $this->db->get();
        // print_r($this->db->last_query());
        // exit;   
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
                $detail[] = array(
                    'TENANT_ID' => $data->tenant_name,
                    'DATA' => $this->Traffic_opschannel($params,$index,$params_year,$data->tenant_id)
                );                    
            }
            return $detail;            
        }
                
    }

    public function T_id($params,$index,$params_year)
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id'));

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
        if($tid)
        {
            $this->db->where('tenant_id',$tid);
        }
        $this->db->group_by('tenant_id');
        $query = $this->db->get();

        $result = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
                array_push($result,$data->tenant_id);
            }
            return $result;
        }

        return FALSE;
    }
    
    public function Traffic_ops2($params,$index,$params_year)
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id'));
        $maxtenant = $this->getalltenantnumscr($params,$index,$params_year,$tid);

        $this->db->select('channel_id, channel_name');
        $this->db->from('m_channel');
        $this->db->where('channel_id != 1');
        $query = $this->db->get();

       // $result = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
                $num = array();
                $rss = array();
                for($a = 1; $a<=$maxtenant;$a++)
                {   
                    if($a == 1)
                    {
                        $tids = 'oct_bodyshop';
                    }
                    else if($a == 2)
                    {
                        $tids = 'oct_telkomcare';
                    }
                    else if($a == 3)
                    {
                        $tids = 'oct_telkomsel';
                    }
                    
                    $num = null;
                    $num = $this->Traffic_opsdata2($params,$index,$params_year,$tids,$data->channel_id);

                    if($num)
                    {
                        array_push($rss,$num);
                    }
                    else 
                    {
                        array_push($rss,'0');
                    }
                       
                }


                $result[] = array(
                    'channel_name' => $data->channel_name,
                    'data' =>  $num
                );
               
            }
            return $result;
        }
        return FALSE;

    }

    function Traffic_opsdata2($params,$index,$params_year,$tid,$channel)
    {
       
        $this->db->select('IFNULL(SUM(rpt_summary_scr.cof),0) AS cof');
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
        if($tid)
        {
            $this->db->where('rpt_summary_scr.tenant_id',$tid);
        }
        
        $this->db->where('rpt_summary_scr.channel_id',$channel);
        $this->db->group_by('rpt_summary_scr.tenant_id');

        $query = $this->db->get();

        // print_r($this->db->last_query());
        // //exit();
        $result = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
                array_push($result,$data->cof);
            }
            return $result;
        }
        return array(0,0,0);
    }

    function getalltenantnumscr($params,$index,$params_year,$tid)
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id'));

        $this->db->select('count(tenant_id) as ct');
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
        if($tid)
        {
            $this->db->where('tenant_id',$tid);
        }
        $this->db->group_by('tenant_id');
        $query = $this->db->get();

        

        if($query->num_rows() > 0)
        {
            return $query->row()->ct;
        }

        return 0;
    }

    function Traffic_opschannel($params,$index,$params_year,$tid)
    {
        $this->db->select('channel_id,channel_name, sequence');
        $this->db->from('m_channel');
        $this->db->where('channel_id != 1');
        $this->db->order_by('sequence');
        $query = $this->db->get();

        $result = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {

                $total = array(
                    'channel'=>$data->channel_name,
                    'total'=> $this->Traffic_opsdata($params,$index,$params_year,$tid,$data->channel_id)
                );
                array_push($result,$total);

             //  array_push($result,$this->Traffic_opsdata($params,$index,$params_year,$tid,$data->channel_id));
            }
            return $result;
        }
        return FALSE;
    }


    function Traffic_opsdata($params,$index,$params_year,$tid,$channel)
    {
        $this->db->select('IFNULL(SUM(rpt_summ_interval.case_session),0) AS cof');
        $this->db->from('rpt_summ_interval');
        $this->db->join('m_channel','m_channel.channel_id = rpt_summ_interval.channel_id');
        if($params == 'day')
        {
            $this->db->where('rpt_summ_interval.tanggal',$index);
        }
        if($params == 'month')
        {
            $this->db->where('MONTH(rpt_summ_interval.tanggal)',$index);
            $this->db->where('YEAR(rpt_summ_interval.tanggal)',$params_year);
        }
        if($params == 'year')
        {
            $this->db->where('YEAR(rpt_summ_interval.tanggal)',$index);
        }
        $this->db->where('rpt_summ_interval.tenant_id',$tid);
        $this->db->where('rpt_summ_interval.channel_id',$channel);
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
        $this->db->where('channel_id != 1');
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
        $tid = $this->security->xss_clean($this->input->post('tenant_id'));
        if($tid){
            $this->db->select('rpt_summ_interval.case_session as TOTAL');
        }else{
            $this->db->select('SUM(rpt_summ_interval.case_session) as TOTAL');
        }
		
        $this->db->from('rpt_summ_interval');
        if($params == 'day')
        {
            $this->db->where('rpt_summ_interval.tanggal',$index);
        }
        if($params == 'month')
        {
            $this->db->where('MONTH(rpt_summ_interval.tanggal)',$index);
            $this->db->where('YEAR(rpt_summ_interval.tanggal)',$params_year);
        }
        if($params == 'year')
        {
            $this->db->where('YEAR(rpt_summ_interval.tanggal)',$index);
        }
        if($tid)
        {
            $this->db->where_in('rpt_summ_interval.tenant_id',$tid);
        }

		$this->db->where('rpt_summ_interval.channel_id',$channel);
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

        $tid = $this->security->xss_clean($this->input->post('tenant_id'));

		if(!$channel)
		{
			return array("0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
		}

		$this->db->select('rpt_summ_interval.interval , COALESCE(SUM(rpt_summ_interval.case_session),0) as total');
		$this->db->from('m_channel');
        $this->db->join('rpt_summ_interval','rpt_summ_interval.channel_id = m_channel.channel_id');
        $this->db->where('m_channel.channel_id != 1');
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
        if($tid)
        {
            $this->db->where_in('rpt_summ_interval.tenant_id',$tid);
        }


		$this->db->where_in('m_channel.channel_name',$channel);
		$this->db->group_by('rpt_summ_interval.interval','ASC');
		$query = $this->db->get();
		$result = array();

		// print_r($this->db->last_query());
		// exit;

		if($query->num_rows()>0)
		{
            $indx=0;
			for($inx = 0;$inx < 24; $inx++)
			{
				if(str_pad(strval($inx), 1, '0', STR_PAD_LEFT)  == substr($query->row($indx)->interval,0,2))
				{
                    array_push($result,$query->row($indx)->total);
                    $indx++;
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
        $this->db->select('REPLACE(rpt_summary_scr.tenant_id,"oct_","") as id, rpt_summary_scr.tenant_id ,SUM(cof) as COF, SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(art))),2,7) AS ART, SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(aht))),2,7) as AHT, SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(ast))),2,7) as AST, ROUND(AVG(scr),2) as SCR');
        $this->db->from('rpt_summary_scr');
        $this->db->where('tanggal',$date);
        $this->db->where('rpt_summary_scr.tenant_id != ""');
        $tidd = array();
        if($src)
        {
            $this->db->where_in('tenant_id',$src);
        }
        $this->db->group_by('tenant_id');

        $query = $this->db->get();
        // print_r($this->db->last_query());
        // exit;
        if($query->num_rows()>0)
        {
            foreach($query->result() as $datas)
            {
                $t_id = $datas->tenant_id;
                array_push($tidd,$datas->tenant_id);
                $data = array(
                    'TENANT_ID' => strtoupper($datas->id),
                    'SUMCOF' =>  $datas->COF,
                    'SUMART' => $datas->ART,
                    'SUMAHT' => $datas->AHT,
                    'SUMAST' => $datas->AST,
                    'SUMSCR' => $datas->SCR
                );

                $data2 = $this->SummPerformOps_sub($date,$tidd);

                $data3 = array_merge($data,$data2);
                $result[] = $data3;

            }

            return $result;
        }

        return FALSE;
    }

    function SummPerformOps_sub($date,$tenant_id)
    {
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        $this->db->select('m_channel.channel_name , IFNULL(rpt_summary_scr.cof,0) as cof');
        $this->db->from('m_channel');
        $this->db->join('rpt_summary_scr','m_channel.channel_id = rpt_summary_scr.channel_id','left');
        $this->db->where('m_channel.channel_id != 1');
        $this->db->where('rpt_summary_scr.tanggal',$date);
        $this->db->where_in('rpt_summary_scr.tenant_id',$tenant_id);
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

    public function Tenantscrget()
    {
        $this->db->select('tenant_id');
        $this->db->from('m_tenant');
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

    public function Tenantscrfilter()
    {
        $userid = $this->security->xss_clean($this->input->post('userid'));

        $this->db->select('a.tenant_id, a.tenant_name');
        $this->db->from('m_tenant a');
        if($userid){
            $this->db->join('m_akses b', 'a.tenant_id = b.tenant_id', 'left');
            $this->db->where('b.userid', $userid);
        }
        $query = $this->db->get();

        
        if($query->num_rows() > 0)
        {
            $result = array();
            foreach($query->result() as $data)
            {
                $result[] = array(
                    'TENANT_ID'=> $data->tenant_id,
                    'TENANT_NAME'=> $data->tenant_name
                );
            }
            return $result;
        }
        return false;
    }

    public function Channel_data()
    {
        $this->db->select('channel_name, channel_color');
        $this->db->from('m_channel');
        $this->db->where('channel_id != 1');
        $this->db->order_by('sequence');
        $query = $this->db->get();

        $name = array();
        $color = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
               array_push($name,$data->channel_name);
               array_push($color,$data->channel_color);
            }

            $result = array(
                'name' => $name,
                'color' => $color
            );

            return $result;
        }
        return FALSE;
    }
    

    public function getBarchannelPerMonth($month, $year)
    {
        $this->db->select('channel_name,channel_id');
        $this->db->from('m_channel');
        $this->db->where('channel_id != 1');
        $this->db->order_by('channel_id','desc');
        $query = $this->db->get();

        $result = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
               $result[] = array(
                   'channel_name' => $data->channel_name,
                   'rate' => $this->getBarchannelPerMonth_det($month,$year,$data->channel_id)
               );
            }
            return $result;
        }
        return FALSE;
    }

    public function getBarchannelPerMonth_det($month,$year,$channel_id)
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id'));

        $this->db->select('IFNULL(SUM(case_session),0) as cof');
        $this->db->from('rpt_summ_interval');
        $this->db->where('MONTH(tanggal)',$month);
        $this->db->where('YEAR(tanggal)',$year);
        $this->db->where('channel_id',$channel_id);
        $this->db->where('channel_id != 1');
        if($tid)
        {
            $this->db->where('tenant_id',$tid);
        }
        $this->db->group_by('channel_id');
        $query = $this->db->get();

        if($query->num_rows() > 0)
		{
           return $query->row()->cof;
        }
        return false;
    }




    public function get_traffic_interval_monthly($month,$channel)
	{
        $year = date('Y');

		$numdateofmonth = cal_days_in_month(CAL_GREGORIAN, $month, intval($year));

		$this->db->select('m_channel.channel_name,m_channel.channel_id,m_channel.channel_color');
        $this->db->from('m_channel');
        $this->db->where('channel_id != 1');
		if($channel)
		{
			$this->db->where('m_channel.channel_name',$channel);
        }
        $this->db->order_by('m_channel.channel_category DESC, m_channel.sequence_by_rtc ASC');

        $query = $this->db->get();

		if($query->num_rows() > 0)
		{
            // print_r($this->db->last_query());
            // exit;
			foreach($query->result() as $data)
			{
				$result[] = array(
					'channel_name' => $data->channel_name,
					'channel_color' => $data->channel_color,
					'month'	=> $month,
					'total_interval'=> $this->get_availabledata_permonth_day_ShowALL($numdateofmonth,$month,$year,$data->channel_id)
				);
			}

			return $result;
        }
		return false;
    }

    public function getalldateinmonth($month)
    {
        $year = date('Y');
        $mo_int = $month;
        $numdateofmonth = cal_days_in_month(CAL_GREGORIAN, intval($mo_int), intval($year));
        $arr_time = array();


        for($i = 1; $i <= $numdateofmonth;$i++)
		{
			array_push($arr_time, $year.'-'.str_pad(strval($month), 2, '0', STR_PAD_LEFT).'-'.str_pad(strval($i), 2, '0', STR_PAD_LEFT));
        }

        return $arr_time;
    }

    public function getallagentpermonth($month)
    {
        $year = date('Y');
        $numdateofmonth = cal_days_in_month(CAL_GREGORIAN, intval($month), intval($year));

        $tid = $this->security->xss_clean($this->input->post('tenant_id'));


		$this->db->select('SUM(tot_agent) as tots, DAY(rpt_summ_interval.tanggal) as DAY');
        $this->db->from('rpt_summ_interval');
        if($tid)
        {
            $this->db->where('rpt_summ_interval.tenant_id',$tid);
        }
		$this->db->where('MONTH(rpt_summ_interval.tanggal)',$month);
		$this->db->where('YEAR(rpt_summ_interval.tanggal)',$year);
		$this->db->group_by('rpt_summ_interval.tanggal');
		$this->db->order_by('DAY(rpt_summ_interval.tanggal)','ASC');
		$query = $this->db->get();

        // print_r($this->db->last_query());
        // exit;

		$result = array();
		if($query->num_rows()>0)
		{
			$st = 0;
			for($inx = 1; $inx <= $numdateofmonth; $inx++)
			{
				if(str_pad(strval($inx), 1, '0', STR_PAD_LEFT) == str_pad(strval($query->row($st)->DAY), 1, '0', STR_PAD_LEFT))
				{
                    array_push($result,strval($query->row($st)->tots));
                    $st++;
				}
				else
				{
					array_push($result,'0');
				}
			}

		}
		else
		{
			for($inx = 1;$inx <= $numdateofmonth; $inx++)
			{
				array_push($result,'0');
			}
		}

		return $result;
    }

    public function get_availabledata_permonth_day_ShowALL($numdateofmonth,$month,$year,$channel_id)
	{

        $tid = $this->security->xss_clean($this->input->post('tenant_id'));

		$this->db->select('DAY(rpt_summ_interval.tanggal) as DAY, sum(rpt_summ_interval.case_session) as COF');
        $this->db->from('rpt_summ_interval');

        if($tid)
        {
            $this->db->where('rpt_summ_interval.tenant_id',$tid);
        }

		$this->db->where('MONTH(rpt_summ_interval.tanggal)',$month);
		$this->db->where('YEAR(rpt_summ_interval.tanggal)',$year);
		$this->db->where('rpt_summ_interval.channel_id', $channel_id);
		$this->db->group_by('rpt_summ_interval.tanggal');
		$this->db->order_by('DAY(rpt_summ_interval.tanggal)','ASC');
		$query = $this->db->get();

        // print_r($this->db->last_query());
        // exit;

		$result = array();
		if($query->num_rows()>0)
		{

			for($inx = 0; $inx < $numdateofmonth; $inx++)
			{
				if(str_pad(strval($inx+1), 1, '0', STR_PAD_LEFT) == str_pad(strval($query->row($inx)->DAY), 1, '0', STR_PAD_LEFT))
				{
					array_push($result,strval($query->row($inx)->COF));
				}
				else
				{
					array_push($result,'0');
				}
			}

		}
		else
		{
			for($inx = 1;$inx <= $numdateofmonth; $inx++)
			{
				array_push($result,'0');
			}
		}

		return $result;
	}

    public function WallboardMain()
    {
        $this->db->select('channel_id, chn ,cof ,art ,aht, Queue, icon_dashboard');
        $this->db->from('v_mon_service_today_custom');
        // if($tid)
        // {
           //noTID
        // }
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            foreach($query->result() as $data)
            {
                $result[] = array(
                    'CHANNEL_NAME' => $data->chn,
                    'CHANNEL_ICON' => $data->icon_dashboard,
                    'COF' => $data->cof,
                    'ART' => $data->art,
                    'AHT' => $data->aht,
                    'QUEUE' => $data->Queue,
                    'WAITING' => "999",
                    'SCR' => "99.9%",
                    'MSG_IN' => "999",
                    'MSG_OUT' => "999",
                    'SLA' => "99.9%"
                );

            }

            return $result;
        }

        return false;
    }

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

    public function summaryTicketCloseWall($month, $year)
    {
        $numdateofmonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $this->db->select('m_channel.channel_name,m_channel.channel_id,m_channel.channel_color');
        $this->db->from('m_channel');
        $this->db->where('channel_id != 1');
        $query = $this->db->get();
        $arr_time = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
                $result[] = array(
                    'channel_name' => $data->channel_name,
                    'channel_color' => $data->channel_color,
                    'month' => $month,
                    'total_traffic'=> $this->get_availabledata_permonth_day_summaryTicketCloseWall($numdateofmonth,$month,$year,$data->channel_id)
                );
            }


            return $result;
        }

        return false;

    }

    public function get_availabledata_permonth_day_summaryTicketCloseWall($numdateofmonth,$month,$year,$channel_id)
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));

        $this->db->select('DAY(rpt_summ_ticket.tanggal) AS DAY, SUM(rpt_summ_ticket.sClose) AS ticketClose');
        $this->db->from('rpt_summ_ticket');
        if ($tid){
            $this->db->where('rpt_summ_ticket.tenant_id', $tid);
        }
        $this->db->where('MONTH(rpt_summ_ticket.tanggal)',$month);
        $this->db->where('YEAR(rpt_summ_ticket.tanggal)',$year);
        $this->db->where('rpt_summ_ticket.channel_id', $channel_id);
        $this->db->group_by('rpt_summ_ticket.tanggal');
        $this->db->order_by('DAY(rpt_summ_ticket.tanggal)','ASC');
        $query = $this->db->get();

        $result = array();
        if($query->num_rows()>0)
        {
            $ser = 0;
            for($inx = 1; $inx <= $numdateofmonth; $inx++)
            {
                if(str_pad(strval($inx), 1, '0', STR_PAD_LEFT) == str_pad(strval($query->row($ser)->DAY), 1, '0', STR_PAD_LEFT))
                {
                    array_push($result,strval($query->row($ser)->ticketClose));
                    // print_r('|'.$inx.'-'.$ser.'-'.$query->row($ser)->DAY);
                    $ser++;
                }
                else
                {
                    // print_r('|'.$inx.'-'.$ser.'-'.$query->row($ser)->DAY);
                    array_push($result,'0');
                }
            }
            $ser = 0;
        }
        else
        {
            for($inx = 1;$inx <= $numdateofmonth; $inx++)
            {
                array_push($result,'0');
            }
        }

        return $result;
    }

    public function getSPOstatsticket($tanggal)
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id'));

        $this->db->select('tenant_id');
        $this->db->from('rpt_summ_kip2'); //m_tenant swap back when data available
        $this->db->group_by('tenant_id');   
        $tidd = array();     
        if($tid)
        {
            $this->db->where_in('tenant_id',$tid);
        }
        $query = $this->db->get();

        // print_r($this->db->last_query());
        // exit;
        if($query->num_rows() > 0)
		{
            foreach($query->result() as $data)
            {
                //change tenant 
                array_push($tidd, $data->tenant_id);
                $result[] = array(
                    'TENANT_ID' => $data->tenant_id,
                    'SUMMARY' => $this->getSPOdata($tanggal,$tidd)
                );
            }
           return $result;
        }
        return false;
    }

    public function getSPOdata($tanggal,$tid)
    {
        $this->db->select('IFNULL(SUM(jumlah),0) as total, category');
        $this->db->from('rpt_summ_kip2');
        $this->db->where('tanggal',$tanggal);
        $this->db->where_in('tenant_id',$tid);
        $this->db->group_by('category');
        $query = $this->db->get();
        // print_r($this->db->last_query());
        // exit;
        if($query->num_rows() > 0)
		{
            foreach($query->result() as $data)
            {
                $datas[] = array(
                    'KATEGORI' => $data->category,
                    'TOTAL' => $data->total
                );
            }
           return $datas;
        }
        return array();
    }

    function Top5_opsdata($params,$index,$params_year,$tid)
    {
        $this->db->select('IFNULL(SUM(rpt_summ_interval.case_session),0) AS cof, m_tenant.tenant_name, m_tenant.color_id as coloring');
        $this->db->from('rpt_summ_interval');
        $this->db->join('m_tenant','m_tenant.tenant_id = rpt_summ_interval.tenant_id');
        if($params == 'day')
        {
            $this->db->where('rpt_summ_interval.tanggal',$index);
        }
        if($params == 'month')
        {
            $this->db->where('MONTH(rpt_summ_interval.tanggal)',$index);
            $this->db->where('YEAR(rpt_summ_interval.tanggal)',$params_year);
        }
        if($params == 'year')
        {
            $this->db->where('YEAR(rpt_summ_interval.tanggal)',$index);
        }
        if($tid)
        {
            $this->db->where_in('rpt_summ_interval.tenant_id',$tid);
        }
        $this->db->group_by('rpt_summ_interval.tenant_id');
        $this->db->order_by('cof','DESC');
        $this->db->limit(5,0);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {           
            foreach($query->result() as $top5)
            {
                $data[] = array(
                    'tenant' => $top5->tenant_name,
                    'color' => $top5->coloring,
                    'total' => $top5->cof,
                    
                );
            }
            return $data;
        }
        return 0;
    }

    public function get_datatable_perform_nas()
    {
        $this->db->select('m_channel.channel_id,m_channel.channel_name');
        $this->db->from('m_channel');
        $this->db->where('channel_id != 1');
        $query = $this->db->get();

        if($query->num_rows() > 1)
        {
            foreach($query->result() as $data)
            {
                $res = $this->data_detail_perfnas($data->channel_id,$data->channel_name);
                if($res)
                {
                    $result[] = $res;
                }
                
            }
            return $result;
        }
    }

    function data_detail_perfnas($channel,$c_name)
    {

        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        $this->db->select('a.channel_id as C_ID, b.channel_name as C_NAME, a.tot_antrian as QUEUE,a.tot_cof as COF, a.abd as ABD, a.scr as SCR,a.tot_handling as HANDLING, a.msg_in as MSG_IN, a.msg_out as MSG_OUT, SUBSTRING(SEC_TO_TIME(IFNULL(a.ast_num,0)),1,8) as AST,SUBSTRING(SEC_TO_TIME(IFNULL(a.art_num,0)),1,8) ART, SUBSTRING(SEC_TO_TIME(IFNULL(a.aht_num,0)),1,8) AS AHT  ');
        $this->db->from('v_mon_summ_chn a');
        $this->db->join('m_channel b', 'b.channel_id = a.channel_id');
        $this->db->where('a.channel_id',$channel);
        $this->db->where('b.channel_id != 1');
        $this->db->group_by('a.channel_id');
        $this->db->order_by('b.channel_id','ASC');
        $query = $this->db->get();
        
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows() == 1)
        {
            foreach($query->result() as $data)
            {

                $result = array(
                    'CHANNEL_NAME' => $data->C_NAME,
                    'QUEUE' => strval(number_format($data->QUEUE,0,'.',',')),
                    'HANDLING' => $data->HANDLING,
                    'MESSAGE_IN' => $data->MSG_IN,
                    'MESSAGE_OUT' => $data->MSG_OUT,
                    'ABANDON' => $data->ABD,
                    'ART' => $data->ART,
                    'AHT' => $data->AHT,
                    'AST' => $data->AST,
                    'OFFERED' => $data->COF,
                    'SCR' => round($data->SCR,2)
                );
            }
            return $result;
        }
        // else
        // {
        //     $result = array(
        //         'CHANNEL_NAME' => $c_name,
        //         'QUEUE' => "-",
        //         'HANDLING' => "-",
        //         'MESSAGE_IN' => "-",
        //         'MESSAGE_OUT' => "-",
        //         'ABANDON' => "-",
        //         'ART' => "--:--:--",
        //         'AHT' => "--:--:--",
        //         'AST' => "--:--:--",
        //         'OFFERED' => "-",
        //         'SCR' => "-"
        //     );
        // }
       
       
    }

    public function get_channel_only()
	{
		$this->db->select('m_channel.channel_name,m_channel.channel_id');
        $this->db->from('m_channel');
        $this->db->where('channel_id != 1');
		$this->db->order_by('m_channel.channel_id');
		$query = $this->db->get();

		$res_channel = array();

		if($query->num_rows() > 0)
		{
			foreach($query->result() as $data)
			{
				array_push($res_channel,$data->channel_name);
			}
			
		}
		
		return $res_channel;
    }
    
    public function thomas_the_dank_engine(){
        //$date = $this->security->xss_clean($this->input->post('date', true));
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));

        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        $this->db->select('m_tenant.tenant_name, wall_monitoring.tenant_id, SUM(wall_monitoring.antrian) queue,SUM(wall_monitoring.handling) handling, SUM(wall_monitoring.msg_in) msg_in,SUM(wall_monitoring.msg_out) msg_out,SUM(wall_monitoring.abd) abd, SUBSTRING(SEC_TO_TIME(AVG(wall_monitoring.ast_num)),1,8) ast,SUBSTRING(SEC_TO_TIME(AVG(wall_monitoring.art_num)),1,8) waiting, SUBSTRING(SEC_TO_TIME(AVG(wall_monitoring.aht_num)),1,8) AS aht, SUM(wall_monitoring.cof) offered, AVG(wall_monitoring.scr) scr ');
        $this->db->from('m_tenant');
        $this->db->join('wall_monitoring', 'm_tenant.tenant_id = wall_monitoring.tenant_id');
        $this->db->where_in('wall_monitoring.channel_id',array(2,3,4,5,6,7,8,10,11,12,13,15));
        
        if($tid){
            $this->db->where_in('wall_monitoring.tenant_id', $tid);
        }
        $query = $this->db->get();
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows() ==1 )
        {
            foreach($query->result() as $data)
            {

                $result = array(
                    'TENANT_NAME' => 'DANK',
                    'QUEUE' => strval(number_format($data->queue,0,'.',',')),
                    'HANDLING' => $data->handling,
                    'MESSAGE_IN' => $data->msg_in,
                    'MESSAGE_OUT' => $data->msg_out,
                    'ABANDON' => $data->abd,
                    'ART' => $data->waiting,
                    'AHT' => $data->aht,
                    'AST' => $data->ast,
                    'OFFERED' => $data->offered,
                    'SCR' => number_format(round($data->scr,2),2,'.',',')
                );
            }
            return $result;
        }

        return FALSE;
    }



#endregion :: raga

#region :: debi
    public function summary_performance_nasional(){
        //$date = $this->security->xss_clean($this->input->post('date', true));
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));

        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        $this->db->select('m_tenant.tenant_name, wall_monitoring.tenant_id, SUM(wall_monitoring.antrian) queue,SUM(wall_monitoring.handling) handling, SUM(wall_monitoring.msg_in) msg_in,SUM(wall_monitoring.msg_out) msg_out,SUM(wall_monitoring.abd) abd, SUBSTRING(SEC_TO_TIME(AVG(wall_monitoring.ast_num)),1,8) ast,SUBSTRING(SEC_TO_TIME(AVG(wall_monitoring.art_num)),1,8) waiting, SUBSTRING(SEC_TO_TIME(AVG(wall_monitoring.aht_num)),1,8) AS aht, SUM(wall_monitoring.cof) offered, AVG(wall_monitoring.scr) scr ');
        $this->db->from('m_tenant');
        $this->db->join('wall_monitoring', 'm_tenant.tenant_id = wall_monitoring.tenant_id');
        $this->db->where_in('wall_monitoring.channel_id',array(1,2,3,4,5,6,7,8,10,11,12,13,15));
        
        if($tid){
            $this->db->where_in('wall_monitoring.tenant_id', $tid);
        }
        $this->db->group_by('wall_monitoring.tenant_id');
        $query = $this->db->get();
        
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {

                $result[] = array(
                    'TENANT_NAME' => $data->tenant_name,
                    'QUEUE' => strval(number_format($data->queue,0,'.',',')),
                    'HANDLING' => $data->handling,
                    'MESSAGE_IN' => $data->msg_in,
                    'MESSAGE_OUT' => $data->msg_out,
                    'ABANDON' => $data->abd,
                    'ART' => $data->waiting,
                    'AHT' => $data->aht,
                    'AST' => $data->ast,
                    'OFFERED' => $data->offered,
                    'SCR' => round($data->scr,2)
                );
            }
            return $result;
        }

        return FALSE;
    }

   

    public function summary_performance_nas_bar()
    {
        //$date = $this->security->xss_clean($this->input->post('date', true));
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));

        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        $this->db->select('m_tenant.tenant_name, m_tenant.tenant_id, SUM(wall_monitoring.cof) total, m_tenant.color_id color');
        $this->db->from('m_tenant');
        $this->db->join('wall_monitoring', 'm_tenant.tenant_id = wall_monitoring.tenant_id');
        $this->db->where_in('wall_monitoring.channel_id',array(2,3,4,5,6,7,8,10,11,12,13,15));
       
        if($tid){
            $this->db->where_in('wall_monitoring.tenant_id', $tid);
        }
        $this->db->group_by('wall_monitoring.tenant_id');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {

                $result[] = array(
                    'TENANT_NAME' => $data->tenant_name,
                    'TOTAL' => $data->total,
                    'COLOR' => $data->color
                );
            }
            return $result;
        }

        return FALSE;
    }
    public function summary_performance_nas_pie()
    {
        $this->db->select('m_channel.channel_name,m_channel.channel_id,m_channel.channel_color');
        $this->db->from('m_channel');
        $this->db->where('channel_id != 1');
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
                array_push($res_tot,$this->get_cof_performance_piechart($data->channel_id));
            }

            $result = array(
                'channel_name' => $res_channel,
                'color' => $res_color,
                'total' => $res_tot
            );
        }

        return $result;
    }
    function get_cof_performance_piechart($channel) //summ
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));
        $date = $this->security->xss_clean($this->input->post('date', true));
        $this->db->select('IFNULL(SUM(wall_monitoring.cof),0) as TOTAL');
        
        $this->db->from('wall_monitoring');
        $this->db->where_in('wall_monitoring.channel_id',array(2,3,4,5,6,7,8,10,11,12,13,15));
        $this->db->where('wall_monitoring.channel_id',$channel);
        if($tid){
            $this->db->where_in('wall_monitoring.tenant_id', $tid);
        }
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
    public function get_interval_performance_nas()
    {
        $this->db->select('wall_traffic.starttime as time');
        $this->db->from('wall_traffic');
        $this->db->group_by('wall_traffic.starttime','ASC');
        $query = $this->db->get();
        $times = array();

        if($query->num_rows()>0)
        {
            foreach($query->result() as $data)
            {
                if (strlen($data->time) == 3){
                    array_push($times,"0".substr($data->time,0,1).':00:00');
                }else{
                    array_push($times,substr($data->time,0,2).':00:00');
                }
            }

        }

        $result = array(
                    'label_time' => $times,
                    'series' => $this->get_availdata_performance_nas()
                );



        return $result;
    }
    public function get_availdata_performance_nas()
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));

		$this->db->select('wall_traffic.starttime , COALESCE(SUM(wall_traffic.cof),0) as total');
		$this->db->from('wall_traffic');
        if($tid){
            $this->db->where_in('wall_traffic.tenant_id', $tid);
        }
		$this->db->group_by('wall_traffic.starttime','ASC');
		$query = $this->db->get();
		$result = array();

		// print_r($this->db->last_query());
		// exit;

		if($query->num_rows()>0)
		{
            $indx=0;
			for($inx = 1;$inx < 25; $inx++)
			{
				if(strval($inx)  == substr($query->row($indx)->starttime,0,-2))
				{
                    array_push($result,$query->row($indx)->total);
                    $indx++;
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

    public function get_available_data_wallmon($tid)
    {
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        $this->db->select('a.tenant_id as TID, c.tenant_name as TN,c.tenant_icon as TICC ,SUM(a.antrian) as QUEUE ,SUM(a.cof) as COF, AVG(a.scr) as SCR');
        $this->db->from('wall_monitoring a');
        $this->db->join('m_tenant c','c.tenant_id = a.tenant_id');
        $this->db->where_in('a.channel_id',array(2,3,4,5,6,7,8,10,11,12,13,15));
        if($tid){
            $this->db->where_in('a.tenant_id', $tid);
        }
        $this->db->group_by('a.tenant_id');
        $query = $this->db->get();

        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows()>0)
		{
            foreach($query->result() as $rs)
            {
                $result[] = array(
                    'TENANT_NAME' => $rs->TN,
                    'TENANT_ICON' =>  base_url()."public/tenant/".$rs->TICC,
                    'TOTAL_COF' => number_format($rs->COF,0,',','.'),
                    'TOTAL_SCR' => number_format($rs->SCR,2,',',','),
                    'TOTAL_QUEUE' => $rs->QUEUE,
                    'DATA' => $this->get_available_data_wallmon_data($rs->TID)
                );
            }
            return $result;
        }
        return false;
    }

    function get_available_data_wallmon_data($tid)
    {

        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
       
		$this->db->select('a.tenant_id as TID, c.tenant_name as TN, b.channel_category as CCAT, SUM(a.antrian) as QUEUE ,COALESCE(SUM(a.cof),0) as COF, AVG(a.scr) as SCR, SUBSTRING(SEC_TO_TIME(AVG(a.ast_num)),1,8) AST,SUBSTRING(SEC_TO_TIME(AVG(a.art_num)),1,8) ART, SUBSTRING(SEC_TO_TIME(AVG(a.aht_num)),1,8) AS AHT');
        $this->db->from('wall_monitoring a');
        $this->db->join('m_channel b','a.channel_id = b.channel_id');
        $this->db->join('m_tenant c','c.tenant_id = a.tenant_id');

        $this->db->where_in('a.channel_id',array(2,3,4,5,6,7,8,10,11,12,13,15));
        if($tid){
            $this->db->where('a.tenant_id', $tid);
        }
        $this->db->group_by('b.channel_category');
        $this->db->group_by('c.tenant_name');
        $query = $this->db->get();
		// print_r($this->db->last_query());
		// exit;

		if($query->num_rows()>0)
		{
           
            foreach($query->result() as $rq)
            {
                $result[] = array(
                    'TENANT_ID' => $rq->TID,
                    'TENANT_NAME' => $rq->TN,
                    'CATEGORY'=> $rq->CCAT,
                    'QUEUE' => $rq->QUEUE,
                    'COF' => number_format($rq->COF,0,',','.'),
                    'AHT' => $rq->AHT,
                    'AST' => $rq->AST,
                    'ART' => $rq->ART,
                    'SCR' => number_format($rq->SCR,2,',',',')
                );
            }
            return $result;
            
		}
	return false;
		
    }
    
    public function getAgentMonitoringData()
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id', true));

        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        $this->db->select('a.tenant_id TENANTID,b.tenant_name as TENANTNAME, a.agent_id AGENTID, a.agent_name AGENTNAME, a.state STATE, a.in_service INSERVICE,
        a.total_handled TOTALHANDLED, a.art ART, a.aht AHT');
        $this->db->join('m_tenant b','a.tenant_id = b.tenant_id');
        $this->db->from('rpt_agent_monitoring a');
       
        if($tid){
            $this->db->where('a.tenant_id', $tid);
        }

        $this->db->order_by('AGENTID');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $id = 1;
            foreach($query->result() as $data)
            {

                $result[] = array(
                    $id,
                    $data->AGENTID,
                    $data->AGENTNAME,
                    $data->TENANTNAME,
                    $data->STATE,
                    strval(number_format($data->INSERVICE,0,'.',',')),
                    strval(number_format($data->TOTALHANDLED,0,'.',',')),
                    $data->ART,
                    $data->AHT
                );
                $id++;
            }
            return $result;
        }

        return FALSE;
    }
    #endregion debi

}