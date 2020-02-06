<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class ReportModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_datareportSC($tid,$t_start,$t_end,$meth)
    {
        $this->db->select('b.channel_name as CHANNEL_NAME, 
        SUM(a.unik) as UNIQUE_CUSTOMER, 
        SUM(a.cof) as TOTAL_SESSION,
        SUM(a.msg_in) as MESSAGE_IN, 
        SUM(a.msg_out) as MESSAGE_OUT
        ');
        $this->db->from('rpt_summary_scr a');
        $this->db->join('m_channel b','b.channel_id = a.channel_id');

        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($t_start)
        {
            $this->db->where('a.tanggal >=',$t_start);
        }
        if($t_end)
        {
            $this->db->where('a.tanggal <=',$t_end);
        }

        $this->db->group_by('b.channel_name');
        $query = $this->db->get();

       if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->CHANNEL_NAME,
                        $data->UNIQUE_CUSTOMER,
                        strval(number_format($data->TOTAL_SESSION,0,',','.')),
                        $data->MESSAGE_IN,
                        $data->MESSAGE_OUT
                    );
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }      
        }
        return false;
    }

    public function get_datareportSPO($tid, $chn, $mnth,$meth)
    {
        $year = date('Y');
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        $this->db->select('a.tanggal as TANGGAL, 
        SUM(a.cof) as COF,
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
        AVG(a.scr) as SCR');

        $this->db->from('rpt_summary_scr a');
        // $this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($chn)
        {
            $this->db->where('a.channel_id',$chn);
        }
        if($mnth)
        {
            $this->db->where('MONTH(a.tanggal)',$mnth);
            
        }
        $this->db->where('YEAR(a.tanggal)',$year);

        $this->db->group_by('a.tanggal');
        $query = $this->db->get();


        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->TANGGAL,
                        strval(number_format($data->COF,0,',','.')),
                        // $data->COF,
                        $data->ART,
                        $data->AHT,
                        $data->AST,
                        round($data->SCR,2).'%'
                    );
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }
            
        }

        return false;
    }

    public function get_datareportSPA($tid, $t_start,$t_end,$meth)
    {
        //$year = date('Y');
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        $this->db->select('a.agentid as AGENT_ID,
        a.agentName as AGENT_NAME,
        a.skill_name as SKILL_NAME, 
        SUM(a.cof) as COF,
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
        AVG(a.scr) as SCR');

        $this->db->from('v_rpt_summ_agent a');
        // $this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($t_start)
        {
            $this->db->where('a.tanggal >=',$t_start);
        }
        if($t_end)
        {
            $this->db->where('a.tanggal <=',$t_end);
        }
       // $this->db->where('YEAR(a.tanggal)',$year);
        $this->db->group_by('a.agentName');
        $query = $this->db->get();

        // print_r($this->db->last_query());
        // exit;
        
        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->AGENT_ID,
                        $data->AGENT_NAME,
                        $data->SKILL_NAME,
                        strval(number_format($data->COF,0,',','.')),
                        $data->ART,
                        $data->AHT,
                        $data->AST,
                        round($data->SCR,2).'%'
                    );
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }      
        }
        return false;
    }
}
?>