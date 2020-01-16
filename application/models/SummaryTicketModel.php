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

		// foreach ($query->result() as $key) {
		// 	$cotent[] = array(
		// 		'unit' => $key->unit,
		// 		'statusData' => $key->new.','.$key->open.','.$key->onProgress.','.$key->Resolved.','.$key->pending.','.$key->Reopen.','.$key->reject.','.$key->return
		// 	);
		// }

		return $query->result();
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
			$TA =0;
			$TB = 0;
			$TC =0;
			foreach($query->result() as $data)
			{
				$content[] = array(
					strval($idx),
					strval($data->UNIT_NAME),
					strval($data->DayA),
					strval($data->DayB),
					strval($data->DayC),
					strval($data->DayA+$data->DayB+$data->DayC)
				);
				$TA=$TA+$data->DayA;
				$TB=$TB+$data->DayB;
				$TC=$TC+$data->DayC;
				$idx++;
			}


			$total = array(
				$TA,
				$TB,
				$TC

			);

		}
		else{
			$content[] = array();
		}

		$res = array(
			'recordsTotal' => $query->num_rows(),
			'recordsFiltered' => $query->num_rows(),
			'data' => $content,
			'total' => $total
		);

		return $res;


	}

	public function getSCloseTicketMTH($unit,$params, $index, $params_year)
	{
		// print_r($unit.$params.$index.$params_year);
		 
		$max_date = date('t', strtotime($params_year.'-'.$index.'-01'));
		$content = array();
		$tanggal = array();

		
		
		for($i=1;$i<=$max_date;$i++)
		{
			$period = $params_year.'-'.$index.'-'.$i;
				
			$this->db->select('DATE(date_close) AS TANGGAL, IFNULL(COUNT(ticket_id),0) AS CT');
			$this->db->from('trans_ticket_today');
			$this->db->where('ticket_status',8);
			$this->db->where('DATE(date_close)',$period);
			if($unit)
			{
				$this->db->where('unit_id',$unit);
			}
			$this->db->group_by('DATE(date_close)');
	
			$query = $this->db->get();


			if ($query->num_rows() > 0) {
				array_push($content,$query->row()->CT);
				array_push($tanggal ,$i);
				
			}
			else 
			{
				array_push($content,'0');
				array_push($tanggal ,$i);
			}
		 
		}

		$data = array(
			'unit'=>$this->getunit($unit),
			'total_ticket'=>$content,
			'label_time'=> $tanggal,
			'color'=> ''
		);


		$res = array(
			'status' => TRUE,
			'data' => $data
		);

		return $res;
	
	}

	public function getSCloseTicketYR($unit,$params, $index, $params_year)
	{
		$content = array();
		$month = array();

		for($i=1;$i<=12;$i++)
		{
			
				
			$this->db->select('MONTH(date_close) AS TANGGAL, IFNULL(COUNT(ticket_id),0) AS CT');
			$this->db->from('trans_ticket_today');
			$this->db->where('ticket_status',8);
			$this->db->where('MONTH(date_close)',$i);
			$this->db->where('YEAR(date_close)',$index);
			if($unit)
			{
				$this->db->where('unit_id',$unit);
			}
			$this->db->group_by('MONTH(date_close)');
	
			$query = $this->db->get();


			if ($query->num_rows() > 0) {
				array_push($content,$query->row()->CT);
				array_push($month ,$i);
			}
			else 
			{
				array_push($content,'0');
				array_push($month ,$i);
			}
		 
		}

		$data = array(
			'unit'=>$this->getunit($unit),
			'total_ticket'=>$content,
			'label_time'=> $month,
			'color'=> ''
		);

		$res = array(
			'status' => TRUE,
			'data' => $data
		);

		return $res;
	
	}

	public function getSCloseTicketDY($unit,$params, $index, $params_year)
	{
		$content = array();
		$hour = array();

		for($i=0;$i<=23;$i++)
		{
			$this->db->select('HOUR(date_close) AS HOUR, IFNULL(COUNT(ticket_id),0) AS CT');
			$this->db->from('trans_ticket_today');
			$this->db->where('ticket_status',8);
			$this->db->where('HOUR(date_close)',$i);
			$this->db->where('DATE(date_close)',$index);

			if($unit)
			{
				$this->db->where('unit_id',$unit);
			}
			$this->db->group_by('MONTH(date_close)');
	
			$query = $this->db->get();


			if ($query->num_rows() > 0) {
				array_push($content,$query->row()->CT);
				array_push($hour ,$i.':00:00');
			}
			else 
			{
				array_push($content,'0');
				array_push($hour ,$i.':00:00');
			}
		 
		}

		$data = array(
			'unit'=>$this->getunit($unit),
			'total_ticket'=>$content,
			'label_time'=> $hour,
			'color'=> ''
		);

		$res = array(
			'status' => TRUE,
			'data' => $data
		);

		return $res;
	
	}


	function getunit($unit)
	{
		$this->db->select('unit AS UNIT');
		$this->db->from('m_unit');
		$this->db->where('unit_id',$unit);
		$query=$this->db->get();

		if ($query->num_rows() >0) {
			return $query->row()->UNIT;
		}

		return 'All';
	}
}
?>