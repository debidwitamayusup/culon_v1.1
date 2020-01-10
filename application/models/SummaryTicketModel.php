<?php 

class SummaryTicketModel extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
	}

	public function getSummTicket(){
		$this->db->select('SUM(sNew) as new
						, SUM(sOpen) as open
						, SUM(sOnProgress) as onProgress
						, SUM(sPending) as pending
						, SUM(sReopen) as reOpen
						, SUM(sReject) as reject
						, SUM(sResolved) as resolved
						, SUM(sReturn) as '."'return'".'');
		$this->db->from('rpt_summ_ticket_unit');
		$query = $this->db->get();

		return $query->result();
	}
}

?>