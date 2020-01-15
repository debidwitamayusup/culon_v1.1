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

		$i = 1;
		$totalnew = 0;
		foreach ($query->result() as $key) {
			$cotent[] = array(
				// 'num' => strval($i),
				// 'unit' => $key->unit,
				// 'new' => $key->new,
				// 'open' => $key->open,
				// 'onProgress' => $key->onProgress,
				// 'pending' => $key->pending,
				// 'reOpen' => $key->Reopen,
				// 'reject' => $key->reject,
				// 'resolved' => $key->Resolved,
				// 'return' => $key->return
				strval($i),
				$key->unit,
	    		$key->new,
	    		$key->open,
	    		$key->onProgress,
	    		$key->pending,
	    		$key->Reopen,
	    		$key->reject,
	    		$key->Resolved,
	    		$key->return
	    		// $totalnew = strval($totalnew + floatval($key->new))
			);
			$i++;
		}
		// return $query->result();
		// return $query;
		$return = array(
				'recordsTotal' => $query->num_rows(),
                'recordsFiltered' => $query->num_rows(),
                'data' => $cotent,
                // 'totalnew' => number_format($totalnew, 2)
			);
		return $return;
	}



	public function filter($search, $limit, $start, $params, $index, $params_year, $draw){
		if ($params == 'day'){
			$this->db->where('DATE(lup) = "'.$index.'"');
		}else if ($params == 'month'){
			$this->db->where('MONTH(lup) = "'.$index.'" AND YEAR(lup) = "'.$year.'"');
		}else if ($params == 'year'){
			$this->db->where('YEAR(lup) = "'.$index.'"');
		}
	    $this->db->like('unit', $search); // Untuk menambahkan query where LIKE
	    $this->db->or_like('sNew', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sOpen', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sOnProgress', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sPending', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sReopen', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sReject', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sResolved', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->or_like('sReturn', $search); // Untuk menambahkan query where OR LIKE
	    $this->db->order_by('unit', 'asc'); // Untuk menambahkan query ORDER BY
	    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
	    // return
	    $query = $this->db->get('rpt_summ_ticket_unit');
	    // ->result_array(); // Eksekusi query sql sesuai kondisi diatas

	    $i = 1;
		$totalnew = 0;
		foreach ($query->result() as $key) {
			$cotent[] = array(
				// 'num' => strval($i),
				// 'unit' => $key->unit,
				// 'new' => $key->new,
				// 'open' => $key->open,
				// 'onProgress' => $key->onProgress,
				// 'pending' => $key->pending,
				// 'reOpen' => $key->Reopen,
				// 'reject' => $key->reject,
				// 'resolved' => $key->Resolved,
				// 'return' => $key->return
				strval($i),
				$key->unit,
	    		$key->sNew,
	    		$key->sOpen,
	    		$key->sOnProgress,
	    		$key->sPending,
	    		$key->sReopen,
	    		$key->sReject,
	    		$key->sResolved,
	    		$key->sReturn
	    		// $totalnew = strval($totalnew + floatval($key->new))
			);
			$i++;
		}
		$return = array(
				// 'draw' => $draw,
				'recordsTotal' => $query->num_rows(),
                'recordsFiltered' => $query->num_rows(),
                'data' => $cotent,
                'totalnew' => number_format($totalnew, 2)
			);
		return $return;
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

	public function getStatusperUnit($params, $index, $params_year){
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

		foreach ($query->result() as $key) {
			$cotent[] = array(
				'unit' => $key->unit,
				'statusData' => $key->new.','.$key->open.','.$key->onProgress.','.$key->Resolved.','.$key->pending.','.$key->Reopen.','.$key->reject.','.$key->return
			);
		}

		return $cotent;
	}

	public function getSummaryAgentPerformSkill($src='')
	{
		$this->db->select('vunit as UNIT_NAME, hari_1 as DayA, hari_2 as DayB, hari_3 as DayC');
		$this->db->from('v_summ_kip');
		if($src)
		{
			$this->db->like('UNIT_NAME',$src);
			$this->db->or_like('DayA',$src);
			$this->db->or_like('DayB',$src);
			$this->db->or_like('DayC',$src);
		}

		$query = $this->db->get();

		if($query->num_rows()>0)
		{
			$idx = 1;
			foreach($query->result() as $data)
			{
				$content[] = array(
					strval($idx),
					strval($data->UNIT_NAME),
					strval($data->DayA),
					strval($data->DayB),
					strval($data->DayC)
				);
				$idx++;
			}

		}
		else{
			$content[] = array();
		}

		$res = array(
			'recordsTotal' => $query->num_rows(),
			'recordsFiltered' => $query->num_rows(),
			'data' => $content,
		);

		return $res;


	}
}
?>