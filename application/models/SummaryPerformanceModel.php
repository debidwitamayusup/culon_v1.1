<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class SummaryPerformanceModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('tokenize');
    }
    public function authceck($token)
    {
        $data = checkuser_token($token);
        return $data;
    }

     #region :: debi
    public function summary_performance_dashboard($params, $index, $params_year,$limit,$offset,$token)
    {
        $tid = get_tenantlst($token);

        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        if($offset){
            $offset = $limit*$offset;
        }

        $this->db->select('m_tenant.tenant_name as TENANT, 
        rpt_summ_interval.tenant_id as TENANT_ID, 
        SUBSTRING(SEC_TO_TIME(AVG(rpt_summ_interval.ast_num)),2,7) as AST,
        SUBSTRING(SEC_TO_TIME(AVG(rpt_summ_interval.art_num)),2,7) as ART, 
        SUBSTRING(SEC_TO_TIME(AVG(rpt_summ_interval.aht_num)),2,7) AS AHT, 
        SUM(rpt_summ_interval.case_session) as COF, 
        AVG(rpt_summ_interval.scr) SCR');
        $this->db->from('m_tenant');
        $this->db->join('rpt_summ_interval', 'm_tenant.tenant_id = rpt_summ_interval.tenant_id');
        if($tid){
            $this->db->where_in('rpt_summ_interval.tenant_id', $tid);
        }

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
        $this->db->where('rpt_summ_interval.channel_id != 1');
        $this->db->group_by('rpt_summ_interval.tenant_id');
        if($limit)
        {
            $this->db->limit($limit,$offset);
        }
        $query = $this->db->get();
        
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {

                $result[] = array(
                    'TENANT_NAME' => $data->TENANT,
                    'ART' => $data->ART,
                    'AHT' => $data->AHT,
                    'AST' => $data->AST,
                    'COF' => $data->COF,
                    'SCR' => number_format($data->SCR,2,'.','')
                );
            }
            return $result;
        }

        return FALSE;
    }

    public function summary_performance_dash_bar($params,$index,$params_year,$token)
    {
        $tid = get_tenantlst($token);
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        $this->db->select('m_tenant.tenant_name, m_tenant.tenant_id, SUM(rpt_summ_interval.case_session) total, m_tenant.color_id color');
        $this->db->from('m_tenant');
        $this->db->join('rpt_summ_interval', 'm_tenant.tenant_id = rpt_summ_interval.tenant_id');
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
        if($tid){
            $this->db->where_in('rpt_summ_interval.tenant_id', $tid);
        }
        $this->db->where('rpt_summ_interval.channel_id != 1');
        $this->db->group_by('rpt_summ_interval.tenant_id');
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

    public function summary_performance_dash_pie($params,$index,$params_year,$token)
    {
        $tid = get_tenantlst($token);
        $this->db->select('m_channel.channel_name,m_channel.channel_id,m_channel.channel_color');
        $this->db->from('m_channel');
        $this->db->where('m_channel.channel_id != 1');
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
                array_push($res_tot,$this->get_cof_performance_piechart($params,$index,$params_year,$tid,$data->channel_id));
            }

            $result = array(
                'channel_name' => $res_channel,
                'color' => $res_color,
                'total' => $res_tot
            );
        }

        return $result;
    }
    function get_cof_performance_piechart($params,$index,$params_year,$tid,$channel) //summ
    {
      

        $this->db->select('IFNULL(SUM(rpt_summ_interval.case_session),0) as TOTAL');
        
        $this->db->from('rpt_summ_interval');
        $this->db->where('rpt_summ_interval.channel_id',$channel);

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
        if($tid){
            $this->db->where_in('rpt_summ_interval.tenant_id', $tid);
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
    public function get_interval_performance_dash($params,$index,$params_year,$token)
    {
        $tid = get_tenantlst($token);

        $this->db->select('rpt_summ_interval.starttime as time');
        $this->db->from('rpt_summ_interval');
        $this->db->group_by('rpt_summ_interval.starttime','ASC');
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
                    'series' => $this->get_availdata_performance_dash($params,$index,$params_year,$tid)
                );

        return $result;
    }
    public function get_availdata_performance_dash($params,$index,$params_year,$tid)
    {
        $this->db->select('rpt_summ_interval.starttime, COALESCE(SUM(rpt_summ_interval.case_session),0) as total');
		$this->db->from('rpt_summ_interval');
        if($tid){
            $this->db->where_in('rpt_summ_interval.tenant_id', $tid);
        }
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
        $this->db->where('rpt_summ_interval.channel_id != 1');
		$this->db->group_by('rpt_summ_interval.starttime','ASC');
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
    #endregion debi

}