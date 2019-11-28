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

		return $query->result();
	}

	//controller SummaryTrafficChannel function stc_month
	public function getMonth()
	{
		$query = $this->db->query('SELECT channel, SUM(tot_pickup) + SUM(antrian) + SUM(chat_in_progress) AS summary_traffic
				FROM hsummary_copy WHERE MONTH(lup) = MONTH(CURRENT_TIME) AND YEAR(lup) = YEAR(CURRENT_TIME) group by channel;');

		return $query->result();
	}

	//controller SummaryTrafficChannel function stc_year
	public function getYear()
	{
		$query = $this->db->query('SELECT channel, sum(tot_pickup) + sum(antrian) + sum(chat_in_progress) AS summary_traffic
				FROM hsummary_copy WHERE YEAR(lup) = YEAR(CURRENT_TIME) group by channel;');

		return $query->result();
	}

	//controller TrafficInterval function stc_interval15
	public function getInterval15()
	{
		$query = $this->db->query('SELECT DATE(lup),TIME(lup), SUM(tot_pickup), SUM(antrian), SUM(chat_in_progress)
				FROM hsummary_copy
				WHERE TIME(lup) BETWEEN "00:00:00" AND "23:59:59"
				GROUP BY DATE(lup), UNIX_TIMESTAMP(lup) DIV 900 AND channel;');
		
		return $query;
	}

	//controller TrafficInterval function stc_interval30//
	public function getInterval30()
	{
		$query = $this->db->query('SELECT DATE(lup),TIME(lup), SUM(tot_pickup), SUM(antrian), SUM(chat_in_progress)
				FROM hsummary_copy
				WHERE TIME(lup) BETWEEN "00:00:00" AND "23:59:59"
				GROUP BY DATE(lup), UNIX_TIMESTAMP(lup) DIV 1800 AND channel;');
		
		return $query;
	}

	//controller CaseInOut function case_in_interval
	public function getCaseIn()
	{
		$query = $this->db->query('SELECT lup, case_in
				FROM hsummary
				WHERE TIME(lup) BETWEEN "00:00:00" AND "23:59:59"
				GROUP BY DATE(lup), UNIX_TIMESTAMP(lup) DIV 900 AND channel;');

		return $query;
	}

	//controller CaseInOut function case_out_interval
	public function getCaseOut()
	{
		$query = $this->db->query('SELECT lup, case_out
				FROM hsummary
				WHERE TIME(lup) BETWEEN "00:00:00" AND "23:59:59"
				GROUP BY DATE(lup), UNIX_TIMESTAMP(lup) DIV 900 AND channel;');

		return $query;
	}

	//controller AverageTime function stc_art
	public function getArt()
	{
		$query = $this->db->query('SELECT DATE(lup), TIME(lup), AVG(response_time) avg_handle
				FROM hsummary_copy
				WHERE TIME(lup) BETWEEN "00:00:00" AND "23:59:59"
				GROUP BY DATE(lup), UNIX_TIMESTAMP(lup) DIV 900 AND channel;');

		return $query;
	}

	//controller AverageTime function stc_aht
	public function getAht()
	{
		$query = $this->db->query('');

		return $query;
	}

	//controller AverageTime function stc_ast
	public function getAst()
	{
		$query = $this->db->query('');

		return $query;
	}

	public function getCardMain()
	{
		$query = $this->db->query('');

		return $query->result();
	}

	public function getCGraph()
	{
		$query = $this->db->query('');

		return $query->result();
	}

	public function getBGraph()
	{
		$query = $this->db->query('');

		return $query->result();
	}

	public function getInteraction()
	{
		$query = $this->db->query('');

		return $query->result();
	}

	public function getUniqueCustomer()
	{
		$query = $this->db->query('');

		return $query->result();
	}

	public function getAverageCustom()
	{
		$query = $this->db->query('');

		return $query->result();
	}
}