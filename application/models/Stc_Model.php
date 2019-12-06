<?php 

class Stc_Model extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
	}

	public function get_all_channel(){
		$this->db->select('channel_name');
		$this->db->from('summary_channel');
		$this->db->group_by('channel_name');
		$this->db->order_by('channel_name');
		$query = $this->db->get();

		return $query->result();
	} 

	public function get_channel_negation($arr){
		$this->db->select('channel_name as channel, 0 as total');
		$this->db->from('summary_channel');
		foreach($arr as $key){
			$this->db->where_not_in('channel_name',$key);
		}
		$this->db->group_by('channel_name');
		$this->db->order_by('channel_name');
		$query = $this->db->get();

		return $query->result();
	}
	// select data table hsummary
	//controller SummaryTrafficChannel function stc_today
	public function getToday()
	{
		$this->db->select('channel AS channel, SUM(tot_pickup) + SUM(antrian) + SUM(chat_in_progress) AS summary_traffic');
		$this->db->from(' hsummary_copy');
		$this->db->where('date(lup) = (CURRENT_DATE)');
		$this->db->group_by('channel');

		$query = $this->db->get();

		return $query;
	}

	//controller SummaryTrafficChannel function stc_month
	public function getMonth()
	{
		$this->db->select('channel AS channel, SUM(tot_pickup) + SUM(antrian) + SUM(chat_in_progress) AS summary_traffic');
		$this->db->from(' hsummary_copy');
		$this->db->where('MONTH(lup) = MONTH(CURRENT_TIME) AND YEAR(lup) = YEAR(CURRENT_TIME)');
		$this->db->group_by('channel');

		$query = $this->db->get();

		return $query;
	}

	//controller SummaryTrafficChannel function stc_year
	public function getYear()
	{
		$this->db->select('channel AS channel, sum(tot_pickup) + sum(antrian) + sum(chat_in_progress) AS summary_traffic');
		$this->db->from(' hsummary_copy');
		$this->db->where('YEAR(lup) = YEAR(CURRENT_TIME)');
		$this->db->group_by('channel');

		$query = $this->db->get();

		return $query;
	}

	//controller TrafficInterval function stc_interval15
	public function getInterval15()
	{
		$this->db->select('DATE(lup) AS dl,TIME(lup) AS tl, SUM(tot_pickup) AS tp, SUM(antrian) AS a, SUM(chat_in_progress) AS cip');
		$this->db->from(' hsummary_copy');
		$this->db->where('TIME(lup) BETWEEN "00:00:00" AND "23:59:59"');
		$this->db->group_by('DATE(lup)');
		$this->db->group_by('UNIX_TIMESTAMP(lup) DIV 900');
		$this->db->group_by('channel');
		$this->db->order_by('channel');

		$query = $this->db->get();

		return $query;		
	}

	//controller TrafficInterval function stc_interval30//
	public function getInterval30()
	{
		$this->db->select('DATE(lup) AS dl,TIME(lup) AS tl, SUM(tot_pickup) AS tp, SUM(antrian) AS a, SUM(chat_in_progress) AS cip');
		$this->db->from(' hsummary_copy');
		$this->db->where('TIME(lup) BETWEEN "00:00:00" AND "23:59:59"');
		$this->db->group_by('DATE(lup)');
		$this->db->group_by('UNIX_TIMESTAMP(lup) DIV 1800');
		$this->db->group_by('channel');
		$this->db->order_by('channel');

		$query = $this->db->get();

		return $query;	
	}

	//controller CaseInOut function case_in_interval
	public function getCaseIn()
	{
		$this->db->select('lup AS lup, case_in AS case_in');
		$this->db->from(' hsummary');
		$this->db->where('TIME(lup) BETWEEN "00:00:00" AND "23:59:59"');
		$this->db->group_by('DATE(lup)');
		$this->db->group_by('UNIX_TIMESTAMP(lup) DIV 900');
		$this->db->group_by('channel');
		$this->db->order_by('channel');

		$query = $this->db->get();

		return $query;
	}

	//controller CaseInOut function case_out_interval
	public function getCaseOut()
	{
		$this->db->select('lup AS lup, case_out AS case_out');
		$this->db->from(' hsummary');
		$this->db->where('TIME(lup) BETWEEN "00:00:00" AND "23:59:59"');
		$this->db->group_by('DATE(lup)');
		$this->db->group_by('UNIX_TIMESTAMP(lup) DIV 900');
		$this->db->group_by('channel');
		$this->db->order_by('channel');

		$query = $this->db->get();

		return $query;
	}

	public function get_all_unique_customer_per_channel($params, $index)
	{
		$this->db->select('channel_name, sum(total_unique) as total_unique');
		$this->db->from('summary_channel');
		if($params == 'day'){
			$this->db->where('DATE(date_time)', $index);
		}else if($params == 'month'){
			$this->db->where('MONTH(date_time)', $index);
		}else if($params == 'year'){
			$this->db->where('YEAR(date_time)', $index);
		}
		$this->db->group_by('channel_name');
		$this->db->order_by('channel_name', 'ASC');
		$query = $this->db->get();
    	return $query->result();
	}
	//controller AverageTime function stc_art
	public function getArt()
	{
		$this->db->select('channel, DATE(lup) lup_date, TIME(lup) lup_time, CAST(AVG(response_time)AS DECIMAL(10,0)) avg_response_time');
		$this->db->from('hsummary');
		$this->db->where('TIME(lup) BETWEEN "00:00:00" AND "23:59:59"');
		$this->db->group_by('DATE(lup)');
		$this->db->group_by('UNIX_TIMESTAMP(lup) DIV 900');
		$this->db->group_by('channel');
		$this->db->order_by('channel');

		$query = $this->db->get();

		return $query;
	}

	//controller AverageTime function stc_aht
	public function getAht()
	{
		$this->db->select('channel, DATE(lup) lup_date, TIME(lup) lup_interval, CAST(AVG(handling_time)AS DECIMAL(10,0)) avg_handling_time');
		$this->db->from('hsummary');

		//where
		$this->db->where('TIME(lup) BETWEEN "00:00:00" AND "23:59:59"');
		$this->db->group_by('DATE(lup)');
		$this->db->group_by('UNIX_TIMESTAMP(lup) DIV 900');
		$this->db->group_by('channel');
		$this->db->order_by('channel');
		$query = $this->db->get();
		return $query;
	}

	//controller AverageTime function stc_ast
	public function getAst()
	{
		$this->db->select('channel, DATE(lup) lup_date, TIME(lup) lup_time, CAST(AVG(conversation_time)AS DECIMAL(10,0)) avg_service');
		$this->db->from('hsummary_copy');

		//where
		$this->db->where('TIME(lup) BETWEEN "00:00:00" AND "23:59:59"');
		$this->db->group_by('channel');
		$this->db->group_by('DATE(lup)');
		$this->db->group_by('UNIX_TIMESTAMP(lup) DIV 900');
		$this->db->order_by('channel');

		$query = $this->db->get();
		
		return $query;
	}

	public function getCardMain($params, $index)
	{	
		$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
		// $this->db->select('channel_name channel, SUM(total) total');
		// $this->db->from('summary_channel');
		// if($params == 'day'){
		// 	$this->db->where('DATE(date_time)', $index);
		// }else if($params == 'month'){
		// 	$this->db->where('MONTH(date_time)', $index);
		// }else if($params == 'year'){
		// 	$this->db->where('YEAR(date_time)', $index);
		// }
		// $this->db->group_by('channel_name');
		// $this->db->order_by('channel_name', 'ASC');

		// $query = $this->db->get();
		$where = "";
		if($params == 'day'){
			$where = "DATE(date_time)= '".$index."'";
		}else if($params == 'month'){
			$where = "MONTH(date_time)= '".$index."'";
		}else if($params == 'year'){
			$where = "YEAR(date_time)= '".$index."'";
		}
		$str = "SELECT m_channel.channel_name as channel, IFNULL(a.total, 0) as total
		FROM m_channel 
		LEFT JOIN (
			select summary_channel.channel_id, SUM(summary_channel.total) total
			from summary_channel
			where $where
			GROUP BY summary_channel.channel_name
			ORDER BY summary_channel.channel_name
		)as a on a.channel_id = m_channel.channel_id  
		ORDER BY m_channel.channel_name";

		$query = $this->db->query($str);
		// $CI = & get_instance();
        // $times = $CI->db->query_times;
        // $sql="";
        // foreach ($CI->db->queries as $key => $query) {
        //     $sql = $query . " \n Execution Time:" . $times[$key];
        // }
		return $query->result();
		// return $str;
	}

	public function getCGraph()
	{
		$this->db->select('channel_name channel, SUM(total) total, (SUM(total)* 100 / (SELECT SUM(total) FROM summary_channel)) persen');
		$this->db->from('summary_channel');
		$this->db->group_by('channel_name');

		$query = $this->db->get();

		return $query->result();
	}

	public function getBGraph()
	{
		$query = $this->db->query('');

		return $query->result();
	}

	public function getTotInteraction($params, $index)
	{
		$this->db->select('SUM(total) total_interaction');
		$this->db->from('summary_channel');
		if($params == 'day'){
			$this->db->where('DATE(date_time)', $index);
		}else if($params == 'month'){
			$this->db->where('MONTH(date_time)', $index);
		}else if($params == 'year'){
			$this->db->where('YEAR(date_time)', $index);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getTotUniqueCustomer($params, $index)
	{
		$this->db->select('SUM(total_unique) total_unique_customer');
		$this->db->from('summary_channel');
		if($params == 'day'){
			$this->db->where('DATE(date_time)', $index);
		}else if($params == 'month'){
			$this->db->where('MONTH(date_time)', $index);
		}else if($params == 'year'){
			$this->db->where('YEAR(date_time)', $index);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getAverageCustomer($params, $index)
	{
		$this->db->select('SUM(total)/SUM(total_unique)  average_customer');
		$this->db->from('summary_channel');
		if($params == 'day'){
			$this->db->where('DATE(date_time)', $index);
		}else if($params == 'month'){
			$this->db->where('MONTH(date_time)', $index);
		}else if($params == 'year'){
			$this->db->where('YEAR(date_time)', $index);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getIntervalYear($year,$channel_name)
	{
		if ($channel_name == "ShowAll") {
			$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
			$this->db->select('MONTH(date_time) date, SUM(total) total_traffic');
			$this->db->from('summary_channel');
			$this->db->where('YEAR(date_time) = "'.$year.'" AND YEAR(date_time) = YEAR(CURRENT_TIME) AND TIME(date_time) BETWEEN "00:00:00"
								AND "23:00:00"');
			$this->db->group_by('MONTH(date_time)');

			$query = $this->db->get();
		
			return $query;
		} else {
			$this->db->select('channel_name, MONTH(date_time) date, SUM(total) total_traffic');
			$this->db->from('summary_channel');
			$this->db->where('YEAR(date_time) = "'.$year.'" AND channel_name = "'.$channel_name.'"');
			$this->db->group_by('MONTH(date_time)');

			$query = $this->db->get();
		
			return $query;
		}
	}

	public function getIntervalYearTable($year)
	{
		$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
		$this->db->select('b.channel_name, ROUND((a.hi/a.handle),2)*100 SLA, a.art art, a.aht aht, a.ait ast');
		$this->db->from('agent_perform a, m_channel b');
		$this->db->where('YEAR(date_time) = "'.$year.'" and b.channel_id = a.channel_id');
		$this->db->group_by('b.channel_id');

		$query = $this->db->get();
		
		return $query;
	}

	public function getSumIntervalYear($year)
	{
		$this->db->select('channel_name channel_name, SUM(total) total_by_year, CAST(SUM(total)*100/ 
			(SELECT SUM(total) FROM summary_channel WHERE YEAR(date_time) = '.$year.' ) AS DECIMAL(10,2)) rate');
		$this->db->from('summary_channel');
		$this->db->where('YEAR(date_time) = '.$year.'');
		$this->db->group_by('channel_name');

		$query = $this->db->get();

		return $query;
	}

	public function getIntervalPerMonth($month, $channel_name)
	{
		if ($channel_name == "ShowAll") {
			//solve error sql mode ver. 5.7 = only full group by
			$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

			$this->db->select('DAY(date_time) date, SUM(total) total_traffic');
			$this->db->from('summary_channel');
			$this->db->where('MONTH(date_time) = "'.$month.'" AND YEAR(date_time) = YEAR(CURRENT_TIME) AND TIME(date_time) BETWEEN "00:00:00"
								AND "23:00:00"');
			$this->db->group_by('DATE(date_time)');
			$query = $this->db->get();
			return $query;	
		}else{
			//solve error sql mode ver. 5.7 = only full group by
			$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

			$this->db->select('channel_name, DAY(date_time) date, SUM(total) total_traffic');
			$this->db->from('summary_channel');
			$this->db->where('MONTH(date_time) = "'.$month.'" AND YEAR(date_time) = YEAR(CURRENT_TIME) AND TIME(date_time) BETWEEN "00:00:00"
								AND "23:00:00" AND channel_name= "'.$channel_name.'"');
			$this->db->group_by('DATE(date_time)');
			$query = $this->db->get();
			return $query;
		}
	}

	public function getAvgIntervalTable($month)
	{
		//solve error sql mode ver. 5.7 = only full group by
		$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

		$this->db->select('b.channel_name, ROUND((a.hi/a.handle),2)*100 SLA, a.art art, a.aht aht, a.ait ast');
		$this->db->from('agent_perform a, m_channel b');
		$this->db->where('MONTH(date_time) = "'.$month.'" and b.channel_id = a.channel_id');
		$this->db->group_by('b.channel_name');
		$query = $this->db->get();
		return $query;
	}

	// public function getAverageCustom()
	// {
	// 	$query = $this->db->query('');

	// 	return $query->result();
	// }

	public function get_traffic_interval_today($date, $channel)
	{
		$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
		$this->db->select('TIME(date_time)as time, channel_name, sum(total) as total');
		$this->db->from('summary_channel');
		if($channel){
			$this->db->where('channel_name', $channel);
		}
		$this->db->where('DATE(date_time)', $date);
		$this->db->group_by('channel_name');
		$this->db->group_by('UNIX_TIMESTAMP(date_time) DIV 3600');
		$this->db->order_by('time', 'ASC');
		$this->db->order_by('channel_name', 'ASC');
		$query = $this->db->get();
    	return $query->result();
	}

	public function getAverageIntervalToday($date){
		$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
		
		// $this->db->select('agent_perform.date_time, m_channel.channel_name, agent_perform.art, agent_perform.aht, agent_perform.ait as ast, agent_perform.hi, agent_perform.handle, round((agent_perform.hi/agent_perform.handle)*100, 2) as sla');
		// $this->db->from('agent_perform');
		// $this->db->join('m_channel', 'm_channel.channel_id = agent_perform.channel_id');
		// $this->db->where('DATE(agent_perform.date_time)', $date);
		// $this->db->group_by('agent_perform.channel_id');
		// $this->db->order_by('agent_perform.channel_id', 'ASC');
		// $query = $this->db->get();

		$query = $this->db->query("SELECT 
			m_channel.channel_name 
			, IFNULL(a.art, 0) as art 
			, IFNULL(a.aht, 0) as aht 
			, IFNULL(a.ast, 0) as ast
			, IFNULL(a.sla, 0) as sla
			FROM m_channel 
			LEFT JOIN (
				SELECT agent_perform.channel_id
				, agent_perform.art
				, agent_perform.aht, agent_perform.ait as ast 
				, agent_perform.hi, agent_perform.handle
				, round((agent_perform.hi/agent_perform.handle)*100, 2) as sla 
				, DATE(agent_perform.date_time)as date 
				FROM agent_perform 
				WHERE DATE(agent_perform.date_time) = '$date' 
				GROUP BY agent_perform.channel_id
			)as a on a.channel_id = m_channel.channel_id  
			ORDER BY m_channel.channel_name
		");
    	return $query->result();
	}

	public function getPercentageIntervalToday($date){
		$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
		$query = $this->db->query("SELECT channel_name, SUM(total) as total, CAST(SUM(total)*100/(SELECT SUM(total) FROM summary_channel WHERE DATE(date_time) = '$date' ) AS DECIMAL(10,2)) rate 
			FROM summary_channel 
			WHERE DATE(date_time) = '$date' 
			GROUP BY channel_name
			ORDER BY channel_name
		");
		return $query->result();
	}
	public function getSumIntervalMonth($month){
		$this->db->select('channel_name channel_name, SUM(total) total_by_month, CAST(SUM(total)*100/ 
		(SELECT SUM(total) FROM summary_channel WHERE MONTH(date_time) = '.$month.' ) AS DECIMAL(10,2)) rate');
		$this->db->from('summary_channel');
		$this->db->where('MONTH(date_time) = '.$month.'');
		$this->db->group_by('channel_name');
		$query = $this->db->get();
		return $query;
	}
}	