<?php 

class OperationModel extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
	}

    public function get_all_channel(){
        $this->db->select('*');
        $this->db->from('m_channel');
        $this->db->order_by('channel_name', 'ASC');
        $query = $this->db->get();

		return $query->result();
    }
    
	public function get_top_3_category($params, $index){
        $this->db->select('category, sum(total) as total_kip');
        $this->db->from('summary');
        if($params == 'day'){
			$this->db->where('DATE(date)', $index);
		}else if($params == 'month'){
			$this->db->where('MONTH(date)', $index);

            //hardcoded year based on availability data on db
            $this->db->where('YEAR(date)', $index);
			// $this->db->where('YEAR(date)', '2019');
		}else if($params == 'year'){
			$this->db->where('YEAR(date)', $index);
        }
        $this->db->group_by('category');
        $this->db->order_by('total_kip', 'DESC');
        $this->db->limit(3); 

        $query = $this->db->get();

        // $this->createLogSql();

		return $query->result();
    }

    public function get_top_3_category_operation_performance($params, $index, $year){
        $this->db->select('category, sum(jumlah) as total_kip');
        $this->db->from('rpt_summ_kip1');
        if($params == 'day'){
            $this->db->where('tanggal', $index);
        }else if($params == 'month'){
            $this->db->where('MONTH(tanggal)', $index);
            $this->db->where('YEAR(tanggal)', $year);
            // $this->db->where('YEAR(date)', '2019');
        }else if($params == 'year'){
            $this->db->where('YEAR(tanggal)', $index);
        }
        $this->db->group_by('category');
        $this->db->order_by('total_kip', 'DESC');
        $this->db->limit(3); 

        $query = $this->db->get();

        // $this->createLogSql();

        return $query->result();
    }

    public function get_kip_per_channel($params, $index, $arr_category, $params_year)
    {
        $index_alpha[1]="a";
        $index_alpha[2]="b";
        $index_alpha[3]="c";

        $where= "";
        if($params == 'day'){
			$where = 'tanggal = "'.$index.'"' ;
		}else if($params == 'month'){
			$where = 'MONTH(tanggal) = "'.$index.'" AND YEAR(tanggal) = "'.$params_year.'" ' ;
		}else if($params == 'year'){
			$where = 'YEAR(tanggal) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
        $i =1;
        foreach($arr_category as $key){
            $select .= ", $index_alpha[$i].category_$i, $index_alpha[$i].total_$i";
            $left_join .= " LEFT JOIN (
                SELECT category as category_$i, channel_id, sum(jumlah) as total_$i
                from rpt_summ_kip1
                where category = '".$key->category."' and $where
                GROUP BY channel_id
            ) as $index_alpha[$i] on $index_alpha[$i].channel_id = m_channel.channel_id ";
            $i++;
        }
        $query = $this->db->query("SELECT m_channel.channel_name
        $select
        FROM m_channel
        $left_join
        order by m_channel.channel_name asc
        ");	

        // $this->createLogSql();

        return $query->result();
    }

    public function get_traffic_per_channel($params, $index, $arr_category, $params_year)
    {
        $index_alpha[1]="a";
        $index_alpha[2]="b";
        $index_alpha[3]="c";

        $where= "";
        if($params == 'day'){
            $where = 'DATE(date) = "'.$index.'"' ;
        }else if($params == 'month'){
            // $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = YEAR(CURDATE()) ' ;
            $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = "'.$params_year.'" ' ;
        }else if($params == 'year'){
            $where = 'YEAR(date) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
        $i =1;
        foreach($arr_category as $key){
            $select .= ", $index_alpha[$i].category_$i, CASE WHEN $index_alpha[$i].total_$i IS NULL THEN '0' ELSE $index_alpha[$i].total_$i END as total_$i ";

            $left_join .= " LEFT JOIN (
                SELECT category as category_$i, channel_id, sum(total) as total_$i
                from summary
                where category = '".$key->category."' and $where
                GROUP BY channel_id
            ) as $index_alpha[$i] on $index_alpha[$i].channel_id = m_channel.channel_id ";
            $i++;
        }
        $query = $this->db->query("SELECT m_channel.channel_name
        $select
        FROM m_channel
        $left_join
        ORDER BY m_channel.channel_name DESC
        "); 

        return $query->result();
        //  $CI = & get_instance();
    }

    public function get_data_sub_category($params, $index, $channel_id, $category, $params_year){
        $this->db->select('m_channel.channel_name
        , rpt_summ_kip2.category
        , sum(rpt_summ_kip2.jumlah) as total_kip
        , CASE
        WHEN rpt_summ_kip2.sub_category is null THEN "None"
        WHEN (LEFT(rpt_summ_kip2.sub_category, LOCATE(" &", rpt_summ_kip2.sub_category) -1 )) != ""
        THEN LEFT(rpt_summ_kip2.sub_category, LOCATE(" &", rpt_summ_kip2.sub_category) -1 )
        WHEN (LEFT(rpt_summ_kip2.sub_category, LOCATE(" |", rpt_summ_kip2.sub_category) -1 )) != ""
        THEN LEFT(rpt_summ_kip2.sub_category, LOCATE(" |", rpt_summ_kip2.sub_category) -1 )
        WHEN (LEFT(rpt_summ_kip2.sub_category, LOCATE(" -", rpt_summ_kip2.sub_category) -1 )) != ""
        THEN LEFT(rpt_summ_kip2.sub_category, LOCATE(" -", rpt_summ_kip2.sub_category) -1 )
        ELSE rpt_summ_kip2.sub_category
        END as sub_category
        ,  CASE 
        WHEN rpt_summ_kip2.sub_category is null THEN "None"
        WHEN SUBSTRING_INDEX(rpt_summ_kip2.sub_category," |",3) != ""
        THEN UPPER(SUBSTRING_INDEX(rpt_summ_kip2.sub_category," |",3))
        WHEN SUBSTRING_INDEX(rpt_summ_kip2.sub_category," |",2) != ""
        THEN UPPER(SUBSTRING_INDEX(rpt_summ_kip2.sub_category," |",2))
        WHEN SUBSTRING_INDEX(rpt_summ_kip2.sub_category," |",1) != ""
        THEN UPPER(SUBSTRING_INDEX(rpt_summ_kip2.sub_category," |",1))
        ELSE UPPER(rpt_summ_kip2.sub_category)
        END as sub_category_lng
        ', FALSE); //LEFT(field1,LOCATE(' ',field1) - 1)
		$this->db->from('rpt_summ_kip2');
        $this->db->join('m_channel', 'm_channel.channel_id = rpt_summ_kip2.channel_id');
        if($params == 'day'){
            $this->db->where('tanggal', $index);
        }else if($params == 'month'){
            $this->db->where('MONTH(tanggal)', $index);
            $this->db->where('YEAR(tanggal)', $params_year);
        }else if($params == 'year'){
            $this->db->where('YEAR(tanggal)', $index);
        }
        if (!empty($channel_id)) {
            $this->db->where('m_channel.channel_id', $channel_id);
        }
        $this->db->where('rpt_summ_kip2.category', $category);
		$this->db->group_by('rpt_summ_kip2.sub_category');
        $this->db->order_by('total_kip', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        // print_r($this->db->last_query());
        // exit;
    
    	return $query->result();
    }
    
    public function getCategory1($params, $index, $arr_category, $params_year)
    {
        $where= "";
        if($params == 'day'){
            $where = 'DATE(date) = "'.$index.'"' ;
        }else if($params == 'month'){
            // $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = YEAR(CURDATE()) ' ;
            $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = "'.$params_year.'"' ;
        }else if($params == 'year'){
            $where = 'YEAR(date) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
            $select .= ", a.category, a.total";

            $left_join .= " LEFT JOIN (
                SELECT category as category, channel_id, sum(total) as total
                from summary
                where category = '".$arr_category[0]->category."' and $where
                GROUP BY channel_id
            ) as a on a.channel_id = m_channel.channel_id ";
            
        $query = $this->db->query("SELECT m_channel.channel_name
        $select
        FROM m_channel
        $left_join
        ORDER BY m_channel.channel_name DESC
        "); 

        return $query->result();
    }

    public function getCategory2($params, $index, $arr_category, $params_year)
    {
        $where= "";
        if($params == 'day'){
            $where = 'DATE(date) = "'.$index.'"' ;
        }else if($params == 'month'){
            // $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = YEAR(CURDATE())' ;
            $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = "'.$params_year.'"' ;
        }else if($params == 'year'){
            $where = 'YEAR(date) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
            $select .= ", a.category, a.total";

            $left_join .= " LEFT JOIN (
                SELECT category as category, channel_id, sum(total) as total
                from summary
                where category = '".$arr_category[1]->category."' and $where
                GROUP BY channel_id
            ) as a on a.channel_id = m_channel.channel_id ";
            
        $query = $this->db->query("SELECT m_channel.channel_name
        $select
        FROM m_channel
        $left_join
        ORDER BY m_channel.channel_name DESC
        "); 

        return $query->result();
    }

    public function getCategory3($params, $index, $arr_category, $params_year)
    {
        $where= "";
        if($params == 'day'){
            $where = 'DATE(date) = "'.$index.'"' ;
        }else if($params == 'month'){
            // $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = YEAR(CURDATE()) ' ;
            $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = "'.$params_year.'"' ;
        }else if($params == 'year'){
            $where = 'YEAR(date) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
            $select .= ", a.category, a.total";

            $left_join .= " LEFT JOIN (
                SELECT category as category, channel_id, sum(total) as total
                from summary
                where category = '".$arr_category[2]->category."' and $where
                GROUP BY channel_id
            ) as a on a.channel_id = m_channel.channel_id ";
            
        $query = $this->db->query("SELECT m_channel.channel_name
        $select
        FROM m_channel
        $left_join
        ORDER BY m_channel.channel_name DESC
        "); 

        return $query->result();
        // return $str;
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

    function get_total_nfcr(){
        $query =$this->db->query("SELECT v_fcr.fcr, v_nfcr.nfcr
                    from(
                        select sum(total) as fcr
                        from summary
                        where ticket_action = 1
                    ) as v_fcr,
                    (
                        select sum(total) as nfcr
                        from summary
                        where ticket_action = 2
                    ) as v_nfcr");

        return $query->result();
    }

    function getNfcrCategory1($arr_category){
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        
        $query = $this->db->query('SELECT m_channel.channel_name
            ,fcr.category
            , fcr.fcr
            , nfcr.nfcr
            from m_channel
            left join (
                select sum(total) as fcr, channel_id, category
                from summary
                where ticket_action = 1
                and category = "'.$arr_category[0]->category.'"
                group by channel_id
                    ) as fcr on fcr.channel_id = m_channel.channel_id
                    left join (
                        select sum(total) as nfcr, channel_id, category
                        from summary
                        where ticket_action = 2
                        and category = "'.$arr_category[0]->category.'"
                    GROUP BY channel_id
                    ) as nfcr on nfcr.channel_id = m_channel.channel_id
                    ORDER BY m_channel.channel_name DESC
            ');
        return $query->result();
    }

    function getNfcrCategory2($arr_category){
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        
        $query = $this->db->query('SELECT m_channel.channel_name
            ,fcr.category
            , fcr.fcr
            , nfcr.nfcr
            from m_channel
            left join (
                select sum(total) as fcr, channel_id, category
                from summary
                where ticket_action = 1
                and category = "'.$arr_category[1]->category.'"
                group by channel_id
                    ) as fcr on fcr.channel_id = m_channel.channel_id
                    left join (
                        select sum(total) as nfcr, channel_id, category
                        from summary
                        where ticket_action = 2
                        and category = "'.$arr_category[0]->category.'"
                    GROUP BY channel_id
                    ) as nfcr on nfcr.channel_id = m_channel.channel_id
                    ORDER BY m_channel.channel_name DESC
            ');
        return $query->result();
    }

    function getNfcrCategory3($arr_category){
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        
        $query = $this->db->query('SELECT m_channel.channel_name
            ,fcr.category
            , fcr.fcr
            , nfcr.nfcr
            from m_channel
            left join (
                select sum(total) as fcr, channel_id, category
                from summary
                where ticket_action = 1
                and category = "'.$arr_category[2]->category.'"
                group by channel_id
                    ) as fcr on fcr.channel_id = m_channel.channel_id
                    left join (
                        select sum(total) as nfcr, channel_id, category
                        from summary
                        where ticket_action = 2
                        and category = "'.$arr_category[2]->category.'"
                    GROUP BY channel_id
                    ) as nfcr on nfcr.channel_id = m_channel.channel_id
                    ORDER BY m_channel.channel_name DESC
            ');
        return $query->result();
    }

    function getSummaryTrafficNfcr(){
         $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        $query = $this->db->query('select m_channel.channel_name
                    , fcr.fcr
                    , nfcr.nfcr
                    from m_channel
                    left join (
                        select sum(total) as fcr, channel_id
                        from summary
                        where ticket_action = 1
                        GROUP BY channel_id
                    ) as fcr on fcr.channel_id = m_channel.channel_id
                    left join (
                    select sum(total) as nfcr, channel_id
                    from summary
                    where ticket_action = 2
                    GROUP BY channel_id
                    ) as nfcr on nfcr.channel_id = m_channel.channel_id
                    ORDER BY m_channel.channel_name DESC
            ');
        return $query->result();
    }

    function getNfcrPerCategory($arr_category){

        $left_join = "";
        $select = "";
        $i =1;
        foreach($arr_category as $key){
            $select .= ", CASE WHEN fcr_$i.fcr_$i IS NULL THEN '0' ELSE fcr_$i.fcr_$i END as fcr_$i
                        , CASE WHEN nfcr_$i.nfcr_$i IS NULL THEN '0' ELSE nfcr_$i.nfcr_$i END as nfcr_$i 
                        , CASE WHEN nfcr_$i.category_$i is null THEN '".$key->category."' ELSE nfcr_$i.category_$i END AS category_$i";

            $left_join .= " LEFT JOIN (
                select sum(total) as fcr_$i, channel_id, category as category_$i
                from summary
                where ticket_action = 1 AND category = '".$key->category."'
                GROUP BY channel_id
            ) as fcr_$i on fcr_$i.channel_id = m_channel.channel_id 
                LEFT JOIN (
                select sum(total) as nfcr_$i, channel_id, category as category_$i
                from summary
                where ticket_action = 2 AND category = '".$key->category."'
                GROUP BY channel_id
            ) as nfcr_$i on nfcr_$i.channel_id = m_channel.channel_id 
            ";
            $i++;
        }
        $query = $this->db->query("SELECT m_channel.channel_name
        $select
        FROM m_channel
        $left_join
        ORDER BY m_channel.channel_name ASC
        "); 

        return $query->result();
    }

#region :: ragakasih
    public function  getSService($params,$index,$params_year)
    {
        $this->db->select('AVG(art_num) AS ART, AVG(aht_num)AS AHT, AVG(ast_num) AS AST');
        $this->db->from('rpt_summary_scr');
        if($params=='month')
		{
			$this->db->where('MONTH(tanggal)',$index);
			$this->db->where('YEAR(tanggal)',$params_year);
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

        if($query->row()->ART)
        {   
            $content = array(
                'SUM_ART'=>strval(ROUND($query->row()->ART,0)),
                'SUM_AHT'=>strval(ROUND($query->row()->AHT,0)),
                'SUM_AST'=>strval(ROUND($query->row()->AST,0))
            );

            return $content;                   
        }
        return FALSE;
    }
    public function  getSServicebyChannel($params,$index,$param_year)
    {
        $this->db->select('channel_id as CHANNEL_ID,channel_name as CHANNEL_NAME');
        $this->db->from('m_channel');
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            foreach($query->result() as $data)
            {
                $content = array(
                    'CHANNEL_ID'=> $data->CHANNEL_ID,
                    'CHANNEL_NAME'=> $data->CHANNEL_NAME,
                );
                $content2 = $this->get_dataSServicebychannel($params,$index,$param_year,$data->CHANNEL_ID);
                
                $databuild[] = array_merge($content,$content2);
            }
           return $databuild;
        }
        return false;
    }

    private function get_dataSServicebychannel($params,$index,$param_year,$channel)
    {
        $this->db->select('m_channel.channel_id AS CHANNEL_ID,m_channel.channel_name AS CHANNEL_NAME,SUM(rpt_summary_scr.art_num)AS ART, SUM(rpt_summary_scr.aht_num)AS AHT, SUM(rpt_summary_scr.ast_num) AS AST');
        $this->db->from('rpt_summary_scr');
        $this->db->join('m_channel','m_channel.channel_id = rpt_summary_scr.channel_id');
        $this->db->where('rpt_summary_scr.channel_id',$channel);
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
        $this->db->group_by('channel_id','ASC');

        $query = $this->db->get();

        if($query->num_rows()>0)
        {   

            foreach($query->result() as $data)
            {
                $content = array(
                    
                    'SUM_ART'=>strval($data->ART),
                    'SUM_AHT'=>strval($data->AHT),
                    'SUM_AST'=>strval($data->AST)
                );
            }              
        }
        else
        {
            $content = array(
                'SUM_ART'=>'0',
                'SUM_AHT'=>'0',
                'SUM_AST'=>'0'
            );
        }

        return $content; 
    }
#endregion

}
