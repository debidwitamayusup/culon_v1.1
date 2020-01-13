<?php 

class SummaryTicketModel extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
	}

	public function getSummTicket($params, $index, $params_year){
		$this->db->select('SUM(sNew) as new
						, SUM(sOpen) as open
						, SUM(sOnProgress) as onProgress
						, SUM(sPending) as pending
						, SUM(sReopen) as reOpen
						, SUM(sReject) as '."'reject'".'
						, SUM(sResolved) as resolved
						, SUM(sReturn) as '."'return'".'');
		$this->db->from('rpt_summ_ticket_unit');
		if ($params == 'day'){
			$this->db->where('DATE(lup) = "'.$index.'"');
		}else if ($params == 'month'){
			$this->db->where('MONTH(lup) = "'.$index.'" AND YEAR(lup) = "'.$year.'"');
		}else if ($params == 'year'){
			$this->db->where('YEAR(lup) = "'.$index.'"');
		}
		$query = $this->db->get();

		return $query->result();
	}

	public function getSummUnit($params, $index, $params_year){
		$this->db->select('unit, (SUM(sNew) + SUM(sOpen) + SUM(sOnProgress) + SUM(sPending) + SUM(sReopen) + SUM(sReject) + SUM(sReturn) + SUM(sResolved)) as total');
		$this->db->from('rpt_summ_ticket_unit');
		if ($params == 'day'){
			$this->db->where('DATE(lup) = "'.$index.'"');
		}else if ($params == 'week'){
			$this->db->where('WEEK (lup) = WEEK("'.$index.'") AND YEAR(lup) = "'.$params_year.'"');
		}else if ($params == 'month'){
			$this->db->where('MONTH(lup) = "'.$index.'" AND YEAR(lup) = "'.$year.'"');
		}else if ($params == 'year'){
			$this->db->where('YEAR(lup) = "'.$index.'"');
		}
		$this->db->group_by('unit');

		$query = $this->db->get();

		return $query->result();
	}

	public function getSummStatusperUnit($params, $index, $params_year){
		$this->db->select('unit, sNew as new, sOpen as open, sOnProgress as onProgress, sResolved as Resolved, sReopen as Reopen, sPending as pending, sReject as reject, sReturn as '."'return'".'');
		$this->db->from('rpt_summ_ticket_unit');
		if ($params == 'day'){
			$this->db->where('DATE(lup) = "'.$index.'"');
		}else if ($params == 'month'){
			$this->db->where('MONTH(lup) = "'.$index.'" AND YEAR(lup) = "'.$year.'"');
		}else if ($params == 'year'){
			$this->db->where('YEAR(lup) = "'.$index.'"');
		}
		$this->db->group_by('unit');

		$query = $this->db->get();

		return $query->result();
	}


}

?>