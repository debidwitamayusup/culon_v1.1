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
		// $date = date('lup') = 'CURRENT_DATE';
		// $this->db->select('channel,
		// SUM(tot_pickup) + SUM(antrian) + SUM(chat_in_progress) AS summary_traffic');
		// $this->db->from('hsummary_copy');
		// $this->db->where($date);
		// $this->db->group_by('channel');
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

	public function getPersenChannel()
	{
		$query = $this->db->query('');
		return $query->result();
	}
}