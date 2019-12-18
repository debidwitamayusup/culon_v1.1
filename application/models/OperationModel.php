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
		}else if($params == 'year'){
			$this->db->where('YEAR(date)', $index);
        }
        $this->db->group_by('category');
        $this->db->order_by('total_kip', 'DESC');
        $this->db->limit(3); 

        $query = $this->db->get();

		return $query->result();
    }

    public function get_kip_per_channel($params, $index, $arr_category)
    {
        $index_alpha[1]="a";
        $index_alpha[2]="b";
        $index_alpha[3]="c";

        $where= "";
        if($params == 'day'){
			$where = 'DATE(date) = "'.$index.'"' ;
		}else if($params == 'month'){
			$where = 'MONTH(date) = "'.$index.'"' ;
		}else if($params == 'year'){
			$where = 'YEAR(date) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
        $i =1;
        foreach($arr_category as $key){
            $select .= ", $index_alpha[$i].category_$i, $index_alpha[$i].total_$i";
            $left_join .= " LEFT JOIN (
                SELECT category as category_$i, channel_id, sum(total_kip)as total_$i
                from summary_kip
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
            $where = 'MONTH(date) = "'.$index.'"' ;
        }else if($params == 'year'){
            $where = 'YEAR(date) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
        $i =1;
        foreach($arr_category as $key){
            $select .= ", $index_alpha[$i].category_$i, CASE WHEN $index_alpha[$i].total_$i IS NULL THEN '0' ELSE $index_alpha[$i].total_$i END as total_$i ";

            $left_join .= " LEFT JOIN (
                SELECT category as category_$i, channel_id, sum(total_kip) as total_$i
                from summary_kip
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

    public function get_data_sub_category($params, $index, $channel_id, $category){
        $this->db->select('m_channel.channel_name
        , summary_kip.category
        , sum(summary_kip.total_kip) as total_kip
        , CASE WHEN summary_kip.sub_category is null THEN "None" ELSE summary_kip.sub_category END as sub_category
        ', FALSE);
		$this->db->from('summary_kip');
        $this->db->join('m_channel', 'm_channel.channel_id = summary_kip.channel_id');
        if($params == 'day'){
            $this->db->where('DATE(date)', $index);
        }else if($params == 'month'){
            $this->db->where('MONTH(date)', $index);
        }else if($params == 'year'){
            $this->db->where('YEAR(date)', $index);
        }
        $this->db->where('m_channel.channel_id', $channel_id);
        $this->db->where('summary_kip.category', $category);
		$this->db->group_by('summary_kip.sub_category');
        $this->db->order_by('total_kip', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        $this->createLogSql();
    	return $query->result();
    }
    

    public function getCategory1($params, $index, $arr_category)
    {
        $where= "";
        if($params == 'day'){
            $where = 'DATE(date) = "'.$index.'"' ;
        }else if($params == 'month'){
            $where = 'MONTH(date) = "'.$index.'"' ;
        }else if($params == 'year'){
            $where = 'YEAR(date) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
            $select .= ", a.category, a.total";

            $left_join .= " LEFT JOIN (
                SELECT category as category, channel_id, sum(total_kip) as total
                from summary_kip
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
            $where = 'MONTH(date) = "'.$index.'"' ;
        }else if($params == 'year'){
            $where = 'YEAR(date) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
            $select .= ", a.category, a.total";

            $left_join .= " LEFT JOIN (
                SELECT category as category, channel_id, sum(total_kip) as total
                from summary_kip
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
            $where = 'MONTH(date) = "'.$index.'"' ;
        }else if($params == 'year'){
            $where = 'YEAR(date) = "'.$index.'"' ;
        }

        $left_join = "";
        $select = "";
            $select .= ", a.category, a.total";

            $left_join .= " LEFT JOIN (
                SELECT category as category, channel_id, sum(total_kip) as total
                from summary_kip
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
}
