<?php 

class OperationModel extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
	}

	public function get_top_3_category($params, $index){
        $this->db->select('category, sum(total_kip) as total_kip');
        $this->db->from('summary_kip');
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
        ");	

        return $query->result();
        // $CI = & get_instance();
        // $times = $CI->db->query_times;
        // $sql="";
        // foreach ($CI->db->queries as $key => $query) {
        //     $sql = $query . " \n Execution Time:" . $times[$key];
        // }
        // return $sql;
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
        "); 

        return $query->result();
        //  $CI = & get_instance();
        // $times = $CI->db->query_times;
        // $sql="";
        // foreach ($CI->db->queries as $key => $query) {
        //     $sql = $query . " \n Execution Time:" . $times[$key];
        // }
        // return $sql;
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
        "); 

        return $query->result();
    }
}
