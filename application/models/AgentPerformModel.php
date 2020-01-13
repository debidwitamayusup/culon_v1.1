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
                        , SUM(sl) as sl
				FROM rpt_summary_scr
				GROUP BY channel_id
				) as b  on b.channel_id=m_channel.channel_id
		ORDER BY m_channel.channel_name
		");

		return $query->result();
	}
}

?>