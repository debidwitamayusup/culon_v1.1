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
            $this->db->where('b.tenant_id',$tid);
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
}
?>