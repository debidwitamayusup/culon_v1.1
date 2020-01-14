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

	public function filter($search, $limit, $start, $order_field, $order_ascdesc){
	    $this->db->like('unit', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('sNew', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sOpen', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sOnProgress', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sPending', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sReopen', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sReject', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sResolved', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sReturn', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
	    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
	    return $this->db->get('rpt_summ_ticket_unit')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  	}
  	public function count_all(){
    	return $this->db->count_all('rpt_summ_ticket_unit'); // Untuk menghitung semua data siswa
  	}

	public function count_filter($search){
	  	$this->db->like('unit', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('sNew', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sOpen', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sOnProgress', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sPending', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sReopen', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sReject', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sResolved', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sReturn', $search); // Untuk menambahkan query where OR or_like
	    return $this->db->get('rpt_summ_ticket_unit')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
	}
}

?>