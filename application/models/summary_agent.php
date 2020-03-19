<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class summary_agent extends CI_Model{

	public function __construct() {
		parent::__construct();
		$this->load->helper('tokenize');
	}
	
	public function authceck($token)
    {
        $data = checkuser_token($token);
        return $data;
    }

    public function get_all_rsummary(){
		$this->db->select('*');
		$this->db->from('rsummary');
		$query = $this->db->get();
    	return $query->result(); 
	}

	public function get_summary_case(){
		// $this->db->select("row_date, tenant_id, SUM(case_in) as case_in, SUM(case_out)as case_out, SUM(msg_in) as msg_in, SUM(msg_out) as msg_out");
		// $this->db->from('hsummary');

		// // where
		
		// $this->db->group_by('row_date');
		// $this->db->order_by('row_date', 'ASC');
		// $this->db->order_by('tenant_id', 'ASC');
		$this->db->select('*');
		$this->db->from('agent_perform');
		$this->db->limit(10);
		$query = $this->db->get();
    	return $query->result(); 
	}
}

