<?php
class AgentPerformModel extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
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
	public function getSSallchannel($src='',$params,$index,$param_year)
	{
		$this->db->select('tanggal AS DATE, art AS ART, aht AS AHT, ast as AST, scr AS SCR, cof AS COF');
		$this->db->from('rpt_summary_scr');
		
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
			$this->db->where('YEAR(tanggal)',$param_year);
		}
		else if($params=='year')
		{
			$this->db->where('YEAR(tanggal)',$index);
		}
		else if($params=='day')
		{
			$this->db->where('DATE(tanggal)',$index);
		}

		$query = $this->db->get();

		if($query->num_rows()>0)
		{
			$idx = 1;
			foreach($query->result() as $data)
			{
				$content[] = array(
					strval($idx),
					strval($data->DATE),
					strval($data->ART),
					strval($data->AHT),
					strval($data->AST),
					strval($data->SCR),
					strval($data->COF)
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
	public function getSAgentperformskills($src='',$param) // table right - bottom
	{
		$this->db->select('rpt_summary_agent.art as ART, rpt_summary_agent.aht as AHT, rpt_summary_agent.ast as AST, rpt_summary_agent.session as COF, m_login.userid AS AGENTID, m_login.name AS NAME, group_skill.skill_name AS SKILLNAME');
		$this->db->from('m_login');
		$this->db->join('group_skill','m_login.skill_id = group_skill.skill_id');
		$this->db->join('rpt_summary_agent', 'm_login.userid = rpt_summary_agent.agentId');
		if($src)
		{
			$this->db->like('ART',$src);
			$this->db->or_like('AHT',$src);
			$this->db->or_like('AST',$src);
			$this->db->or_like('COF',$src);
			$this->db->or_like('AGENTID',$src);
			$this->db->or_like('NAME',$src);
			$this->db->or_like('SKILLNAME',$src);

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
		if($query->num_rows()>0)
		{
			$idx = 1;
			foreach($query->result() as $data)
			{
				$content[] = array(
					strval($idx),
					strval($data->AGENTID),
					strval($data->NAME),
					strval($data->SKILLNAME),
					strval($data->COF),
					strval($data->ART),
					strval($data->AHT),
					strval($data->AST),
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
	public function getSAgentperformByskill()
	{
		$this->db->select('SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary_agent.art))),2,7) as ART,
			SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary_agent.aht))),2,7) as AHT,
			SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(rpt_summary_agent.ast))),2,7) as AST, 
			group_skill.skill_name AS SKILLNAME,group_skill.skill_id AS SKILLID');
		$this->db->from('m_login');
		$this->db->join('group_skill','m_login.skill_id = group_skill.skill_id');
		$this->db->join('rpt_summary_agent', 'm_login.userid = rpt_summary_agent.agentId');
		$this->db->order_by('group_skill.skill_id','ASC');
		$query = $this->db->get();

		if($query->num_rows()>0)
		{
		
			foreach($query->result() as $data)
			{
				$content[] = array(
					'SKILL_ID'=>strval($data->SKILLID),
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

		return $res;
		
	}
#endregion

}

?>