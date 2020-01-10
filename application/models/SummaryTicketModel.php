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

	public function getSummUnit(){
		$this->db->select('unit, (SUM(sNew) + SUM(sOpen) + SUM(sOnProgress) + SUM(sPending) + SUM(sReopen) + SUM(sReject) + SUM(sReject) + SUM(sResolved)) as total');
		$this->db->from('rpt_summ_ticket_unit');
		$this->db->group_by('unit');

		$query = $this->db->get();

		return $query->result();
	}

	public function getSummStatusperUnit(){
		$this->db->select('unit, sNew as new, sOpen as open, sOnProgress as onProgress, sResolved as Resolved, sReopen as Reopen, sPending as pending, sReturn as '."'return'".'');
		$this->db->from('rpt_summ_ticket_unit');
		$this->db->group_by('unit');

		$query = $this->db->get();

		return $query->result();
	}


}

?>