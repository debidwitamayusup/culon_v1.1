<?php 

class Stc_Model extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
	}

	function createLogSql(){
        $this->load->helper('file');
        $CI = & get_instance();
        $times = $CI->db->query_times;
        $sql="";
        foreach ($CI->db->queries as $key => $query) {
            $sql = $query . " \n Execution Time:" . $times[$key];
        }
        $todate= date('Y-m-d');

        $text = $sql;

        $string = read_file(APPPATH.'/logs/log'.$todate.'.txt');
        if($string){
            $text .= "\r\n".$string;
        }

        if ( ! write_file(APPPATH.'/logs/log'.$todate.'.txt', $text)){

        }
    }

	public function get_all_channel(){
		//summary_channel
		// $this->db->select('channel_name');
		// $this->db->from('summary_channel');
		// $this->db->group_by('channel_name');
		// $this->db->order_by('channel_name');

		//rpt_summary
		$this->db->select('a.channel_name');
		$this->db->from('m_channel a');
		$this->db->join('rpt_summary b', 'a.channel_id=b.channel_id', 'LEFT');
		$this->db->group_by('channel_name');
		$this->db->order_by('channel_name');
		$query = $this->db->get();

		return $query->result();
	} 

	public function get_channel_negation($arr){
		$this->db->select('a.channel_name as channel, 0 as total');
		$this->db->from('m_channel a');
		$this->db->join('rpt_summary b', 'a.channel_id=b.channel_id', 'LEFT');
		foreach($arr as $key){
			$this->db->where_not_in('a.channel_name',$key);
		}
		$this->db->group_by('a.channel_name');
		$this->db->order_by('a.channel_name');
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
		$this->db->select('a.channel_name, sum(b.session) as total_unique');
		$this->db->from('m_channel a');
		$this->db->join('rpt_summary b', 'a.channel_id=b.channel_id', 'LEFT');
		if($params == 'day'){
			$this->db->where('DATE(b.date)', $index);
		}else if($params == 'month'){
			$this->db->where('MONTH(b.date)', $index);
		}else if($params == 'year'){
			$this->db->where('YEAR(b.date)', $index);
		}
		$this->db->group_by('a.channel_name');
		$this->db->order_by('a.channel_name', 'ASC');
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
		$where2 = "";
		if($params == 'day'){
			$where = "DATE(date_time)= '".$index."'";
			$where2 = "DATE(date)= '".$index."'";
		}else if($params == 'month'){
			// $where = "MONTH(date_time)= '".$index."' AND YEAR(date_time) = YEAR(CURDATE()) ";
			// $where2 = "MONTH(date)= '".$index."' AND YEAR(date) = YEAR(CURDATE())";

			//temporarily hardcode year based on data ready on database
			// $where = "MONTH(date_time)= '".$index."' AND YEAR(date_time) = '2019' ";
			$where2 = "MONTH(date)= '".$index."' AND YEAR(date) = YEAR(CURDATE())";
		}else if($params == 'year'){
			// $where = "YEAR(date_time)= '".$index."'";
			$where2 = "YEAR(date)= '".$index."'";
		}
		$str = "SELECT m_channel.channel_name as channel
		, IFNULL(b.total, 0) as total
		, IFNULL(b.total_session, 0) as total_session
		, IFNULL(b.msg_in, 0) as msg_in
		, IFNULL(b.msg_out,0) as msg_out
		, IFNULL(b.sla,0) as sla
		, m_channel.channel_color
		, m_channel.icon_dashboard
		
		FROM m_channel 
		-- LEFT JOIN (
		-- 	select summary_channel.channel_id, SUM(summary_channel.total) total, SUM(summary_channel.total_unique) total_unique
		-- 	from summary_channel
		-- 	where $where
		-- 	GROUP BY summary_channel.channel_name
		-- 	ORDER BY summary_channel.channel_name
		-- )as a on a.channel_id = m_channel.channel_id
		LEFT JOIN(
			SELECT channel_id, SUM(unique_customer) as total, SUM(session) as total_session, SUM(message_in) as msg_in, SUM(message_out) as msg_out, AVG(sla) as sla
			from rpt_summary
			where $where2
			GROUP BY channel_id 
		)as b on b.channel_id = m_channel.channel_id   
		ORDER BY m_channel.channel_name";

		$query = $this->db->query($str);
		// $CI = & get_instance();
        // $times = $CI->db->query_times;
        // $sql="";
        // foreach ($CI->db->queries as $key => $query) {
        //     $sql = $query . " \n Execution Time:" . $times[$key];
        // }
		// $this->createLogSql();

		


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
		$this->db->select('SUM(session) total_interaction');
		$this->db->from('rpt_summary');
		if($params == 'day'){
			$this->db->where('DATE(date)', $index);
		}else if($params == 'month'){
			$this->db->where('MONTH(date)', $index);
		}else if($params == 'year'){
			$this->db->where('YEAR(date)', $index);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getTotUniqueCustomer($params, $index)
	{
		$this->db->select('SUM(unique_customer) total_unique_customer');
		$this->db->from('rpt_summary');
		if($params == 'day'){
			$this->db->where('DATE(date)', $index);
		}else if($params == 'month'){
			$this->db->where('MONTH(date)', $index);
		}else if($params == 'year'){
			$this->db->where('YEAR(date)', $index);
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
			// $this->db->select('MONTH(date_time) date, SUM(total) total_traffic');
			// $this->db->from('summary_channel');
			// $this->db->where('YEAR(date_time) = "'.$year.'" ');
			// $this->db->group_by('MONTH(date_time)');
			// $this->db->order_by('MONTH(date_time)');

			//summary_channel
			// $this->db->select('b.channel_color, MONTH(a.date_time) date, SUM(a.total) total_traffic');
			// $this->db->from('summary_channel a');
			// $this->db->join('m_channel b', 'a.channel_id=b.channel_id', 'LEFT');
			// $this->db->where('YEAR(a.date_time) = "'.$year.'"');
			// $this->db->group_by('MONTH(a.date_time)');
			// $this->db->order_by('MONTH(a.date_time)');

			//rpt_summary
			$this->db->select('b.channel_color, MONTH(a.date) date, SUM(a.session) total_traffic');
			$this->db->from('rpt_summary a');
			$this->db->join('m_channel b', 'a.channel_id=b.channel_id', 'LEFT');
			$this->db->where('YEAR(a.date) = "'.$year.'"');
			$this->db->group_by('MONTH(a.date)');
			$this->db->order_by('MONTH(a.date)');

			$query = $this->db->get();
		
			return $query;
		} else {
			//JANGAN DIAPUS YA BRAY, BACK TO THE UP. BACKUP
			// $this->db->select('channel_name, MONTH(date_time) date, SUM(total) total_traffic');
			// $this->db->from('summary_channel');
			// $this->db->where('YEAR(date_time) = "'.$year.'" AND channel_name = "'.$channel_name.'"');
			// $this->db->group_by('MONTH(date_time)');
			
			//summary_channel
			// $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
			// $this->db->select('b.channel_name, b.channel_color, MONTH(a.date_time) date, SUM(a.total) total_traffic');
			// $this->db->from('summary_channel a');
			// $this->db->join('m_channel b', 'a.channel_id=b.channel_id', 'LEFT');
			// $this->db->where('YEAR(a.date_time) = "'.$year.'" AND b.channel_name = "'.$channel_name.'"');
			// $this->db->group_by('MONTH(a.date_time)');
			// $this->db->order_by('MONTH(a.date_time)');

			$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
			$this->db->select('b.channel_name, b.channel_color, MONTH(a.date) date, SUM(a.session) total_traffic');
			$this->db->from('rpt_summary a');
			$this->db->join('m_channel b', 'a.channel_id=b.channel_id', 'LEFT');
			$this->db->where('YEAR(a.date) = "'.$year.'" AND b.channel_name = "'.$channel_name.'"');
			$this->db->group_by('MONTH(a.date)');
			$this->db->order_by('MONTH(a.date)');

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
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
		$query = $this->db->query("SELECT
			m_channel.channel_name,
			IFNULL(SUM(a.total), 0) total_by_year,
			IFNULL(a.rate, 0) rate
			FROM m_channel
			LEFT JOIN (
			SELECT channel_id,
			SUM(session) total,
			CAST(SUM(session)*100/
			(SELECT SUM(rpt_summary.session) AS total FROM rpt_summary WHERE YEAR(rpt_summary.date) = '".$year."' ) AS DECIMAL(10,2)) as rate
			FROM rpt_summary
			WHERE YEAR(rpt_summary.date) = '".$year."'
			GROUP BY rpt_summary.channel_id) AS a ON a.channel_id = m_channel.channel_id 	
			GROUP BY m_channel.channel_name");

		return $query->result();
	}

	public function getIntervalPerMonth($month, $channel_name, $year)
	{
		if ($channel_name == "ShowAll") {
			//solve error sql mode ver. 5.7 = only full group by
			$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

			// $this->db->select('DAY(date_time) date, SUM(total) total_traffic');
			// $this->db->from('summary_channel');
			// $this->db->where('MONTH(date_time) = "'.$month.'" AND YEAR(date_time) = YEAR(CURRENT_TIME) AND TIME(date_time) BETWEEN "00:00:00"
			// 					AND "23:00:00"');
			// $this->db->group_by('DATE(date_time)');
			// $query = $this->db->get();
			
			//summary_channel
			// $query = $this->db->query('
			// 	SELECT b.channel_color, DAY(a.date_time) date, SUM(a.total) total_traffic
			// 	FROM summary_channel a INNER JOIN m_channel b
			// 	ON a.channel_id = b.channel_id
			// 	WHERE  MONTH(date_time) = '.$month.' AND YEAR(date_time) = '.$year.' AND TIME(date_time) 
			// 	BETWEEN "00:00:00" AND "23:59:59" 
			// 	GROUP BY DATE(a.date_time)
			// 	');

			//rpt_summary
			$query = $this->db->query('
				SELECT b.channel_color, DAY(a.date) date, SUM(a.session) total_traffic
				FROM rpt_summary a INNER JOIN m_channel b
				ON a.channel_id = b.channel_id
				WHERE  MONTH(date) = '.$month.' AND YEAR(date) = '.$year.' AND TIME(date) 
				BETWEEN "00:00:00" AND "23:59:59" 
				GROUP BY DATE(a.date)
				');
			return $query;	
		}else{
			//solve error sql mode ver. 5.7 = only full group by
			$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

			// $this->db->select('channel_name, DAY(date_time) date, SUM(total) total_traffic');
			// $this->db->from('summary_channel');
			// $this->db->where('MONTH(date_time) = "'.$month.'" AND YEAR(date_time) = YEAR(CURRENT_TIME) AND TIME(date_time) BETWEEN "00:00:00"
			// 					AND "23:00:00" AND channel_name= "'.$channel_name.'"');
			// $this->db->group_by('DATE(date_time)');
			// $query = $this->db->get();
			
			//summary_channel
			// $query = $this->db->query('
			// 	SELECT a.channel_name, b.channel_color, DAY(a.date_time) date, SUM(a.total) total_traffic
			// 	FROM summary_channel a INNER JOIN m_channel b
			// 	ON a.channel_id = b.channel_id
			// 	WHERE  MONTH(date_time) = '.$month.' AND YEAR(date_time) = '.$year.' AND TIME(date_time) 
			// 	BETWEEN "00:00:00" AND "23:59:59" AND a.channel_name = "'.$channel_name.'"
			// 	GROUP BY DATE(a.date_time)
			// 	');

			//rpt_summary
			$query = $this->db->query('
				SELECT b.channel_name, b.channel_color, DAY(a.date) date, SUM(a.session) total_traffic
				FROM rpt_summary a INNER JOIN m_channel b
				ON a.channel_id = b.channel_id
				WHERE  MONTH(date) = '.$month.' AND YEAR(date) = '.$year.' AND TIME(date) 
				BETWEEN "00:00:00" AND "23:59:59" AND b.channel_name = "'.$channel_name.'"
				GROUP BY DATE(a.date)
				');
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
		//summary_channel
		$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
		// $this->db->select('TIME(date_time)as time, channel_name, sum(total) as total');
		// $this->db->from('summary_channel');
		// if($channel){
		// 	$this->db->where('channel_name', $channel);
		// }
		// $this->db->where('DATE(date_time)', $date);
		// $this->db->group_by('channel_name');
		// $this->db->group_by('UNIX_TIMESTAMP(date_time) DIV 3600');
		// $this->db->order_by('time', 'ASC');
		// $this->db->order_by('channel_name', 'ASC');

		//rpt_summary
		$this->db->select('TIME(b.date)as time, a.channel_name, sum(b.session) as total');
		$this->db->from('m_channel a');
		$this->db->join('rpt_summary b', 'a.channel_id=b.channel_id', 'LEFT');
		if ($channel) {
			$this->db->where('channel_name', $channel);
		}
		$this->db->where('DATE(b.date)', $date);
		$this->db->group_by('channel_name');
		$this->db->group_by('UNIX_TIMESTAMP(date) DIV 3600');
		$this->db->order_by('time', 'ASC');
		$this->db->order_by('a.channel_name', 'ASC');
		$query = $this->db->get();
    	return $query->result();
	}

	public function getAverageIntervalToday($params, $index, $year=0)
	{
		$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
		
		// $this->db->select('agent_perform.date_time, m_channel.channel_name, agent_perform.art, agent_perform.aht, agent_perform.ait as ast, agent_perform.hi, agent_perform.handle, round((agent_perform.hi/agent_perform.handle)*100, 2) as sla');
		// $this->db->from('agent_perform');
		// $this->db->join('m_channel', 'm_channel.channel_id = agent_perform.channel_id');
		// $this->db->where('DATE(agent_perform.date_time)', $date);
		// $this->db->group_by('agent_perform.channel_id');
		// $this->db->order_by('agent_perform.channel_id', 'ASC');
		// $query = $this->db->get();
		$where = "";
		$art = "";
		$aht = "";
		$ast = "";
		if($params == 'day'){
			//agent_perform
			// $where = "DATE(agent_perform.date_time)= '".$index."'";
			// $art = "agent_perform.art";
			// $ast = "agent_perform.ait as ast";
			// $aht = "agent_perform.aht";

			//rpt_summary
			$where = "DATE(rpt_summary.date)= '".$index."'";
			$art = "SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary.art))),2,7) AS art";
			$ast = "SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary.ast))),2,7) AS ast";
			$aht =	"SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary.aht))),2,7) AS aht";
		}else if($params == 'month'){
			//agent_perform
			// $where = "MONTH(agent_perform.date_time)= '".$index."' AND YEAR(agent_perform.date_time)= '".$year."'";
			// $art = "SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(agent_perform.art))),2,7) AS art";
			// $ast = "SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(agent_perform.ait))),2,7) AS ast";
			// $aht =	"SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(agent_perform.aht))),2,7) AS aht";

			//rpt_summary
			$where = "MONTH(rpt_summary.date)= '".$index."' AND YEAR(rpt_summary.date)= '".$year."'";
			$art = "SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary.art))),2,7) AS art";
			$ast = "SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary.ast))),2,7) AS ast";
			$aht =	"SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary.aht))),2,7) AS aht";
		}else if($params == 'year'){
			//agent_perform
			// $where = "YEAR(agent_perform.date_time)= '".$index."'";
			// $art = "SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(agent_perform.art))),2,7) AS art";
			// $ast = "SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(agent_perform.ait))),2,7) AS ast";
			// $aht =	"SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(agent_perform.aht))),2,7) AS aht";

			//rpt_summary
			$where = "YEAR(rpt_summary.date)= '".$index."'";
			$art = "SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary.art))),2,7) AS art";
			$ast = "SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary.ast))),2,7) AS ast";
			$aht =	"SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary.aht))),2,7) AS aht";
		}
		$query = $this->db->query("SELECT 
			-- agent_perform
		-- m_channel.channel_name
		-- , m_channel.icon_dashboard
		-- , m_channel.channel_color 
		-- , IFNULL(a.art, 0) as art 
		-- , IFNULL(a.aht, 0) as aht 
		-- , IFNULL(a.ast, 0) as ast
		-- , IFNULL(a.sla, 0) as sla
		-- FROM m_channel 
		-- LEFT JOIN (
		-- 	SELECT agent_perform.channel_id
		-- 	, $art
		-- 	, $aht
		-- 	, $ast
		-- 	, agent_perform.hi, agent_perform.handle
		-- 	, round((agent_perform.hi/agent_perform.handle)*100, 2) as sla 
		-- 	, DATE(agent_perform.date_time)as date 
		-- 	FROM agent_perform 
		-- 	WHERE $where 
		-- 	GROUP BY agent_perform.channel_id
		-- )as a on a.channel_id = m_channel.channel_id  
		-- ORDER BY m_channel.channel_name

		-- rpt_summary
		m_channel.channel_name
		, m_channel.icon_dashboard
		, m_channel.channel_color 
		, IFNULL(a.art, 0) as art 
		, IFNULL(a.aht, 0) as aht 
		, IFNULL(a.ast, 0) as ast
		, IFNULL(a.sla, 0) as sla
		FROM m_channel 
		LEFT JOIN (
			SELECT rpt_summary.channel_id
			, $art
			, $aht
			, $ast
			, round(AVG(rpt_summary.sla), 2) as sla
			, DATE(rpt_summary.date)as date 
			FROM rpt_summary
			WHERE $where
			GROUP BY rpt_summary.channel_id
		)as a on a.channel_id = m_channel.channel_id  
		ORDER BY m_channel.channel_name
		");	
    	return $query->result();
	}

	public function getPercentageIntervalToday($date){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
		$query = $this->db->query("SELECT
			m_channel.channel_name,
			IFNULL(SUM(a.total), 0) total_by_month,
			IFNULL(a.rate, 0) rate
			FROM m_channel
			LEFT JOIN (
			SELECT channel_id,
			SUM(session) total,
			CAST(SUM(session)*100/
			(SELECT SUM(rpt_summary.session) AS total FROM rpt_summary WHERE DATE(rpt_summary.date) = '".$date."' ) AS DECIMAL(10,2)) as rate
			FROM rpt_summary
			WHERE DATE(rpt_summary.date) = '".$date."'
			GROUP BY rpt_summary.channel_id) AS a ON a.channel_id = m_channel.channel_id 	
			GROUP BY m_channel.channel_name");

		return $query->result();
	}
	public function getSumIntervalMonth($month, $year){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
		
		//summary_channel
		// $query = $this->db->query("SELECT
		// 	m_channel.channel_name,
		// 	IFNULL(SUM(a.total), 0) total_by_month,
		// 	IFNULL(a.rate, 0) rate
		// 	FROM m_channel
		// 	LEFT JOIN (
		// 	SELECT channel_id,
		// 	SUM(total) total,
		// 	CAST(SUM(total)*100/
		// 	(SELECT SUM(summary_channel.total) AS total FROM summary_channel WHERE MONTH(summary_channel.date_time) = '".$month."' AND YEAR(date_time) = '".$year."') AS DECIMAL(10,2)) as rate
		// 	FROM summary_channel
		// 	WHERE MONTH(summary_channel.date_time) = '".$month."' AND YEAR(date_time) = '".$year."'
		// 	GROUP BY summary_channel.channel_id) AS a ON a.channel_id = m_channel.channel_id 	
		// 	GROUP BY m_channel.channel_name");

		//rpt_sumamary
		$query = $this->db->query("SELECT
			m_channel.channel_name,
			IFNULL(SUM(a.total), 0) total_by_month,
			IFNULL(a.rate, 0) rate
			FROM m_channel
			LEFT JOIN (
			SELECT channel_id,
			SUM(session) total,
			CAST(SUM(session)*100/
			(SELECT SUM(rpt_summary.session) AS total FROM rpt_summary WHERE MONTH(rpt_summary.date) = '".$month."' AND YEAR(date) = '".$year."') AS DECIMAL(10,2)) as rate
			FROM rpt_summary
			WHERE MONTH(rpt_summary.date) = '".$month."' AND YEAR(date) = '".$year."'
			GROUP BY rpt_summary.channel_id) AS a ON a.channel_id = m_channel.channel_id 	
			GROUP BY m_channel.channel_name");
		return $query->result();
	}

	public function getOptionYear()
	{
		// //summary_channel
		// $this->db->select('DATE_FORMAT(date_time,"%Y") AS niceDate'); 
		// $this->db->from('summary_channel');
		// $this->db->where('YEAR(date_time) > 2018'); // reg
		// // $this->db->where('YEAR(date_time) = YEAR(CURRENT_TIME)');
		// $this->db->group_by('niceDate');
		// $this->db->order_by('niceDate DESC'); 
		// $this->db->limit('0,14'); 

		//rpt_summary
		$this->db->select('DATE_FORMAT(date,"%Y") AS niceDate'); 
		$this->db->from('rpt_summary');
		$this->db->where('YEAR(date) > 2018'); // reg
		// $this->db->where('YEAR(date_time) = YEAR(CURRENT_TIME)');
		$this->db->group_by('niceDate');
		$this->db->order_by('niceDate DESC'); 
		$query = $this->db->get();

		return $query->result();
	}

	public function get_summary_case_tot_agent_sla($params, $index){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
		$this->db->select('ifnull(sum(message_in),0) as msg_in, ifnull(sum(message_out), 0) as msg_out, IFNULL(sum(tot_agent),0) as tot_agent'); 
		$this->db->from('rpt_summary');
		if($params == 'day'){
			$this->db->where('DATE(date)', $index);
		}else if($params == 'month'){
			$this->db->where('MONTH(date)', $index);
			// $this->db->where('YEAR(date)', date("Y"));

			//temporarily hardcode year based on data ready on database
			$this->db->where('YEAR(date)', '2019');
		}else if($params == 'year'){
			$this->db->where('YEAR(date)', $index);
		}

		$query = $this->db->get();

		return $query->row();
	}
}	