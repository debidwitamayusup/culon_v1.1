<?php 

class Stc_Model extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
	}

	// select data table hsummary
	//controller SummaryTrafficChannel function stc_today
	public function getToday()
	{
		$query = $this->db->query('SELECT channel, SUM(tot_pickup) + SUM(antrian) + SUM(chat_in_progress) AS summary_traffic FROM hsummary_copy WHERE date(lup) = CURRENT_DATE GROUP BY channel;');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $data) {
				$today[] = $data;
			}
			return $today;
		}
	}

	//controller SummaryTrafficChannel function stc_month
	public function getMonth()
	{
		$query = $this->db->query('SELECT channel, SUM(tot_pickup) + SUM(antrian) + SUM(chat_in_progress) AS summary_traffic
				FROM hsummary_copy WHERE MONTH(lup) = MONTH(CURRENT_TIME) AND YEAR(lup) = YEAR(CURRENT_TIME) group by channel;');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $data) {
				$month[] = $data;
			}
			return $month;
		}
	}

	//controller SummaryTrafficChannel function stc_year
	public function getYear()
	{
		$query = $this->db->query('SELECT channel, sum(tot_pickup) + sum(antrian) + sum(chat_in_progress) AS summary_traffic
				FROM hsummary_copy WHERE YEAR(lup) = YEAR(CURRENT_TIME) group by channel;');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $data) {
				$year[] = $data;
			}
			return $year;
		}
	}

	//controller TrafficInterval function stc_interval15
	public function getInterval15()
	{
		$query = $this->db->query('SELECT DATE(lup),TIME(lup), SUM(tot_pickup), SUM(antrian), SUM(chat_in_progress)
				FROM hsummary_copy
				WHERE TIME(lup) BETWEEN "00:00:00" AND "23:59:59"
				GROUP BY DATE(lup), UNIX_TIMESTAMP(lup) DIV 900;');
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $data) {
				$interval15[] = $data;
			}
			return $interval15;
		}
	}

	//controller TrafficInterval function stc_interval30//
	public function getInterval30()
	{
		$query = $this->db->query('SELECT DATE(lup),TIME(lup), SUM(tot_pickup), SUM(antrian), SUM(chat_in_progress)
				FROM hsummary_copy
				WHERE TIME(lup) BETWEEN "00:00:00" AND "23:59:59"
				GROUP BY DATE(lup), UNIX_TIMESTAMP(lup) DIV 1800;');
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $data) {
				$interval30[] = $data;
			}
			return $interval30;
		}
	}

	//controller CaseInOut function case_in_interval
	public function getCaseIn()
	{
		$query = $this->db->query('SELECT lup, case_in
				FROM hsummary
				WHERE TIME(lup) BETWEEN "00:00:00" AND "23:59:59"
				GROUP BY DATE(lup), UNIX_TIMESTAMP(lup) DIV 900;');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $data) {
				$casein[] = $data;
			}
			return $casein;
		}
	}

	//controller CaseInOut function case_out_interval
	public function getCaseOut()
	{
		$query = $this->db->query('SELECT lup, case_out
				FROM hsummary
				WHERE TIME(lup) BETWEEN "00:00:00" AND "23:59:59"
				GROUP BY DATE(lup), UNIX_TIMESTAMP(lup) DIV 900;');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $data) {
				$caseout[] = $data;
			}
			return $caseout;
		}
	}

	//controller AverageTime function stc_art
	public function getArt()
	{
		$query = $this->db->query('');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $data) {
				$get_art[] = $data;
			}
			return $get_art;
		}
	}

	//controller AverageTime function stc_aht
	public function getAht()
	{
		$query = $this->db->query('');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $data) {
				$get_aht[] = $data;
			}
			return $get_aht;
		}
	}

	//controller AverageTime function stc_ast
	public function getAst()
	{
		$query = $this->db->query('');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $data) {
				$get_ast[] = $data;
			}
			return $get_ast;
		}
	}
}