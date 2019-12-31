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
			$this->db->where('YEAR(date)', date("Y"));
		}else if($params == 'year'){
			$this->db->where('YEAR(date)', $index);
        }
        $this->db->group_by('category');
        $this->db->order_by('total_kip', 'DESC');
        $this->db->limit(3); 

        $query = $this->db->get();

		return $query->result();
    }

    public function get_kip_per_channel($params, $index, $arr_category, $params_year)
    {
        $index_alpha[1]="a";
        $index_alpha[2]="b";
        $index_alpha[3]="c";

        $where= "";
        if($params == 'day'){
			$where = 'DATE(date) = "'.$index.'"' ;
		}else if($params == 'month'){
			$where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = "'.$params_year.'" ' ;
		}else if($params == 'year'){
			$where = 'YEAR(date) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
        $i =1;
        foreach($arr_category as $key){
            $select .= ", $index_alpha[$i].category_$i, $index_alpha[$i].total_$i";
            $left_join .= " LEFT JOIN (
                SELECT category as category_$i, channel_id, sum(total)as total_$i
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
        order by m_channel.channel_name asc
        ");	

        // $this->createLogSql();

        return $query->result();
    }

    public function get_traffic_per_channel($params, $index, $arr_category)
    {
        $index_alpha[1]="a";
        $index_alpha[2]="b";
        $index_alpha[3]="c";

        $where= "";
        if($params == 'day'){
            $where = 'DATE(date) = "'.$index.'"' ;
        }else if($params == 'month'){
            $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = YEAR(CURDATE()) ' ;
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
        , summary.category
        , sum(summary.total) as total_kip
        , CASE WHEN summary.sub_category is null THEN "None" ELSE summary.sub_category END as sub_category
        ', FALSE);
		$this->db->from('summary');
        $this->db->join('m_channel', 'm_channel.channel_id = summary.channel_id');
        if($params == 'day'){
            $this->db->where('DATE(date)', $index);
        }else if($params == 'month'){
            $this->db->where('MONTH(date)', $index);
            $this->db->where('YEAR(date)', $params_year);
        }else if($params == 'year'){
            $this->db->where('YEAR(date)', $index);
        }
        if (!empty($channel_id)) {
            $this->db->where('m_channel.channel_id', $channel_id);
        }
        $this->db->where('summary.category', $category);
		$this->db->group_by('summary.sub_category');
        $this->db->order_by('total_kip', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        // $this->createLogSql();
        
    	return $query->result();
    }
    

    public function getCategory1($params, $index, $arr_category)
    {
        $where= "";
        if($params == 'day'){
            $where = 'DATE(date) = "'.$index.'"' ;
        }else if($params == 'month'){
            $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = YEAR(CURDATE()) ' ;
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

    public function getCategory2($params, $index, $arr_category)
    {
        $where= "";
        if($params == 'day'){
            $where = 'DATE(date) = "'.$index.'"' ;
        }else if($params == 'month'){
            $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = YEAR(CURDATE())' ;
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

    public function getCategory3($params, $index, $arr_category)
    {
        $where= "";
        if($params == 'day'){
            $where = 'DATE(date) = "'.$index.'"' ;
        }else if($params == 'month'){
            $where = 'MONTH(date) = "'.$index.'" AND YEAR(date) = YEAR(CURDATE()) ' ;
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
}
