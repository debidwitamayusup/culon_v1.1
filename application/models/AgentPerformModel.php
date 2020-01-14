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

	public function getSSallchannel($src='',$params,$index,$param_year)
	{
		$this->db->select('tanggal AS DATE, art AS ART, aht AS AHT, ast as AST, scr AS SCR, cof AS COF');
		$this->db->from('rpt_summary_scr');
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
		if($src)
		{
			$this->db->like('tanggal',$src);
			$this->db->or_like('art',$src);
			$this->db->or_like('aht',$src);
			$this->db->or_like('ast',$src);
			$this->db->or_like('scr',$src);
			$this->db->or_like('cof',$src);
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
}

?>