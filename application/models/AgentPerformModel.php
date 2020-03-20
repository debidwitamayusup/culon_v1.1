<?php
class AgentPerformModel extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('tokenize');
		$this->load->helper('developer_helper');
	}
	public function authceck($token)
    {
        $data = checkuser_token($token);
        return $data;
    }

	public function getScrCof(){
		$query = $this->db->query("
			SELECT m_channel.channel_name as channel
		, IFNULL(b.scr, 0) as scr
		, IFNULL(b.cof, 0) as cof
		, IFNULL(b.abd, 0) as abd
		, IFNULL(b.sl, 0) as sl
		, IFNULL(b.aht, 0) as aht
		, IFNULL(b.art, 0) as art
		, IFNULL(b.ast, 0) as ast
		, m_channel.channel_color
		FROM m_channel 
		LEFT JOIN(
				SELECT channel_id, round(AVG(scr), 2) as scr, SUM(cof) as cof, sum(abd) as abd
						, SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(art))),2,7) AS art
                        , SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(aht))),2,7) AS aht
                        , SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(ast))),2,7) AS ast
                        , round(AVG(sl), 2) as sl
				FROM rpt_summary_scr
				GROUP BY channel_id
				) as b  on b.channel_id=m_channel.channel_id
		ORDER BY m_channel.channel_name
		");

		return $query->result();
	}

#region :: ragakasih
	public function getSSallchannel($src='',$params,$index,$params_year)
	{
		$tid = $this->security->xss_clean($this->input->post('tenant_id'));

		$this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
		
		$this->db->select('
		tanggal AS DATE,
		SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(art))),2,7) AS ART,
		SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(aht))),2,7) AS AHT,
		SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(ast))),2,7) as AST,
		AVG(scr) AS SCR,
		SUM(cof) AS COF');

		$this->db->from('rpt_summary_scr');
		if($tid)
		{
			$this->db->where('rpt_summary_scr.tenant_id',$tid);
		}
		
		
		if($src)//search datatable function 
		{
			$this->db->like('tanggal',$src);
			$this->db->or_like('art',$src);
			$this->db->or_like('aht',$src);
			$this->db->or_like('ast',$src);
			$this->db->or_like('scr',$src);
			$this->db->or_like('cof',$src);
		}

		if($params=='month')
		{
			$this->db->where('MONTH(tanggal)',$index);
			$this->db->where('YEAR(tanggal)',$params_year);
			$this->db->group_by('DATE','ASC');
		}
		else if($params=='year')
		{
			$this->db->where('YEAR(tanggal)',$index);
			$this->db->group_by('MONTH(DATE)','ASC');
		}
		else if($params=='day')
		{
			$this->db->where('DATE(tanggal)',$index);
			$this->db->group_by('DATE','ASC');
		}
		$this->db->where('rpt_summary_scr.channel_id != 1');
		$query = $this->db->get();
		// print_r($this->db->last_query());    
		//  exit;
		if (count($query->result()) == 0) {
			$content[] = array(
				strval("-"),
				strval("-"),
				strval("-"),
				strval("-"),
				strval("-"),
				strval("-"),
				strval("-")
			);
		}else{
			if($query->num_rows()>0)
			{
				$idx = 1;
				foreach($query->result() as $data)
				{
					if($data->ART)
					{
						$ART = $data->ART;
					}
					else{
						$ART = '-';
					}

					if($params != 'year')
					{
						$content[] = array(
							strval($idx),
							strval($data->DATE),
							strval($ART),
							strval($data->AHT),
							strval($data->AST),
							strval(round($data->SCR, 2).'%'),
							strval(number_format($data->COF,0,',','.'))
						);
					}
					else
					{
						$content[] = array(
							strval($idx),
							strval(DATE('F',strtotime($data->DATE))),
							strval($ART),
							strval($data->AHT),
							strval($data->AST),
							strval(round($data->SCR, 2).'%'),
							strval(number_format($data->COF,0,',','.'))
						);
					}
					$idx++;
				}

			}
			else{
				$content[] = array();
			}
		}
	
		$res = array(
			'recordsTotal' => $query->num_rows(),
			'recordsFiltered' => $query->num_rows(),
			'data' => $content,
		);

		return $res;
		
	}


	public function getSAgentperformskills($src='',$param, $params_time, $index, $params_year) // table right - bottom need limit / offset
	{
		$tid = $this->security->xss_clean($this->input->post('tenant_id'));
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
		$this->db->select('SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary_agent.art))),2,7) AS ART,
							SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary_agent.aht))),2,7) AS AHT,
							SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary_agent.ast))),2,7) AS AST,
							SUM(rpt_summary_agent.session) as COF,
							rpt_summary_agent.agentid AS AGENTID, rpt_summary_agent.agentName AS NAME, rpt_summary_agent.skill_name AS SKILLNAME');//,v_rpt_summ_agent.profile_pic AS IMAGE //
		$this->db->from('rpt_summary_agent');
		$this->db->where('rpt_summary_agent.agentName <> "" ');
		$this->db->where('rpt_summary_agent.agentid <> "" ');
		if($tid)
		{
			$this->db->where('rpt_summary_agent.tenant_id',$tid);
		}
		if ($params_time == "day") {
			$this->db->where('rpt_summary_agent.tanggal', $index);
		}else if ($params_time == "month") {
			$this->db->where('MONTH(rpt_summary_agent.tanggal)', $index);
			$this->db->where('YEAR(rpt_summary_agent.tanggal)', $params_year);
		}else if ($params_time == "year") {
			$this->db->where('YEAR(rpt_summary_agent.tanggal)', $index);
		}
		$this->db->where('rpt_summary_agent.channel_id != 1');
		$this->db->group_by('AGENTID');
		if($src)
		{
			
			$this->db->like('ART',$src);
			$this->db->or_like('AHT',$src);
			$this->db->or_like('AST',$src);
			$this->db->or_like('COF',$src);
			$this->db->or_like('AGENTID',$src);
			$this->db->or_like('NAME',$src);
			$this->db->or_like('SKILLNAME',$src);
			$this->db->or_like('LEVEL',$src);

		}
		if($param == 'AHT')
		{
			$this->db->order_by('AHT','ASC');
			$this->db->limit(5);
		}
		else if($param == 'ART')
		{
			$this->db->order_by('ART','ASC');
			$this->db->limit(5);
		}
		else if($param == 'COF')
		{
			$this->db->order_by('COF','DESC');
			$this->db->limit(5);
		}
		else
		{
			$this->db->order_by('AGENTID','ASC');
		}
		
		$query = $this->db->get();
		// print_r($this->db->last_query());
		// exit;
		if (count($query->result()) == 0) {
			$content[] = array(
				strval("no data"),
				strval("no data"),
				strval("no data"),
				strval("no data"),
				strval("no data"),
				strval("no data"),
				strval("no data"),
				strval("no data"),
				strval("no data")
			);
		}else{
			if($query->num_rows()>0)
			{
				// print_r($this->db->last_query());    
				// exit;
				$idx = 1;
				foreach($query->result() as $data)
				{
					$content[] = array(
						strval($idx),
						strval($data->AGENTID),
						strval($data->NAME),
						strval($data->SKILLNAME),
						strval(number_format($data->COF,0, ',','.')),
						strval($data->ART),
						strval($data->AHT),
						strval($data->AST),
						strval(base_url().'public/user/unknown-avatar.jpg')
					);
					$idx++;
				}

			}
			else{
				$content[] = array();
			}
		}

		$res = array(
			'recordsTotal' => $query->num_rows(),
			'recordsFiltered' => $query->num_rows(),
			'data' => $content
		);

		return $res;

	}
	
	public function getSAgentperformByskill($params, $index, $params_year)
	{
		$tid = $this->security->xss_clean($this->input->post('tenant_id'));
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
		$this->db->select('IFNULL(SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary_agent.art))),2,7), "no data") as ART,
			IFNULL(SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary_agent.aht))),2,7), "no data") as AHT,
			IFNULL(SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary_agent.ast))),2,7), "no data") as AST, 
			IFNULL(rpt_summary_agent.skill_name, "no data") AS SKILLNAME');
		$this->db->from('rpt_summary_agent');
		$this->db->where('rpt_summary_agent.skill_name <> ""');
		
		
		if($tid)
		{
			$this->db->where('rpt_summary_agent.tenant_id',$tid);
		}
		if ($params == "day") {
			$this->db->where('rpt_summary_agent.tanggal = "'.$index.'"');
		}else if ($params == "month") {
			$this->db->where('MONTH(rpt_summary_agent.tanggal) = "'.$index.'"');
			$this->db->where('YEAR(rpt_summary_agent.tanggal) = "'.$params_year.'"');
		}else if ($params == "year") {
			$this->db->where('YEAR(rpt_summary_agent.tanggal) = "'.$index.'"');
		}
		$this->db->where('rpt_summary_agent.channel_id != 1');

		$this->db->group_by('rpt_summary_agent.skill_name','ASC');
		$this->db->order_by('rpt_summary_agent.skill_name','ASC');
		$query = $this->db->get();

		if($query->num_rows()>0)
		{
			
			foreach($query->result() as $data)
			{
				$content = array(
					'SKILL_NAME'=>strval($data->SKILLNAME),
					'AVG_AHT'=>strval($data->AHT),
					'AVG_ART'=>strval($data->ART),
					'AVG_AST'=>strval($data->AST)
				);	
				
			}
			$res = array(
				'status' => TRUE,
				'message' => 'Data Found!',
				'data' => $content,
			);
		}
		else{
			$res = array(
				'status' => TRUE,
				'message' => 'Data  Not Found!',
				'data' => array(),
			);
		}

		// return $res;
		return $query->result();
		
	}
	

#endregion

}

?>