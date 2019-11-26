<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class summary_agent extends CI_Model{

	public function __construct() {
        parent::__construct();
    }

    public function get_all_rsummary(){
		$this->db->select('*');
		$this->db->from('rsummary');
		$query = $this->db->get();
    	return $query->result(); 
	}
}

