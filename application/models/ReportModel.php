<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class ReportModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_datareportSC()
    {
        $tid = $this->security->xss_clean($this->input->post('tenant_id'));

        $this->db->select('b.channel_name as CHANNEL_NAME, SUM(a.msg_in) as MESSAGE_IN, SUM(a.msg_out) as MESSAGE_OUT, SUM(a.unik) as UNIQUE_CUSTOMER, sum(a.cof) as TOTAL_SESSION');
        $this->db->from('rpt_summary_scr a');
        $this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        $this->db->group_by('b.channel_name');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {

            return $query->result();
            // foreach($query->result() as $data)
            // {
                
            // }
        }

        return false;
    }

    public function get_datareportSPO($tid, $chn, $mnth,$meth)
    {
        $year = date('Y');

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
                        $data->COF,
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

    public function get_datareportSPA($tid, $chn, $mnth,$meth)
    {
        $year = date('Y');

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
                        $data->COF,
                        $data->ART,
                        $data->AHT,
                        $data->AST,
                        $data->SCR.'%'
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