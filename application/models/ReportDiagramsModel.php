<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class ReportDiagramsModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_diagramsSC($tid,$t_start,$t_end)
    {

        $this->db->select('channel_name, channel_color,channel_id');
        $this->db->from('m_channel');
        $this->db->where('channel_id != 1');
        $query = $this->db->get();

        $channel_name = array();
        $channel_color =array();
        $total = array();

        if($query->num_rows() > 0)
        { 

            foreach($query->result() as $data)
            { 
                array_push($channel_name,$data->channel_name);
                array_push($channel_color,$data->channel_color);
                array_push($total,$this->datadiagramsSC($tid,$t_start,$t_end,$data->channel_id));
            }

            $result = array(
                'CHANNEL_NAME' => $channel_name,
                'CHANNEL_COLOR' => $channel_color,
                'TOTAL' => $total
            );

            return $result;
        }
        
        return false;
    }

    public function datadiagramsSC($tid,$t_start,$t_end,$channel)
    {
        $this->db->select('IFNULL(SUM(a.cof),2) as TOTAL_SESSION');
        $this->db->from('rpt_summary_scr a');
        $this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($t_start)
        {
            $this->db->where('a.tanggal >=',$t_start);
        }
        if($t_end)
        {
            $this->db->where('a.tanggal <=',$t_end);
        }
        $this->db->where('b.channel_id',$channel);
        $this->db->group_by('b.channel_name');
        $query = $this->db->get();
        

        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows() > 0)
        { 
            return $query->row()->TOTAL_SESSION;
        }

        return '0';
    }

    public function get_diagramsSSClose($tid,$t_start,$t_end,$channel_id)
    {
        
        $this->db->select('channel_name, channel_color,channel_id');
        $this->db->from('m_channel');
        if($channel_id)
        {
             $this->db->where('channel_id',$channel_id);
        }
        $query = $this->db->get();

        $channel_name = array();
        $channel_color =array();
        $total = array();

        if($query->num_rows() > 0)
        { 

            foreach($query->result() as $data)
            { 
                array_push($channel_name,$data->channel_name);
                array_push($channel_color,$data->channel_color);
                array_push($total,$this->datadiagramsSSclose($tid,$t_start,$t_end,$data->channel_id));
            }

            $result = array(
                'CHANNEL_NAME' => $channel_name,
                'CHANNEL_COLOR' => $channel_color,
                'TOTAL' => $total
            );

            return $result;
        }
        
        return false;
    }

    public function datadiagramsSSclose($tid,$t_start,$t_end,$channel)
    {
        $this->db->select('IFNULL(SUM(a.sClose),0) as TOTAL_CLOSE');
        $this->db->from('rpt_summ_ticket a');
        $this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($t_start)
        {
            $this->db->where('a.tanggal >=',$t_start);
        }
        if($t_end)
        {
            $this->db->where('a.tanggal <=',$t_end);
        }
        $this->db->where('a.channel_id',$channel);
       
        $this->db->group_by('b.channel_name');
        $query = $this->db->get();
        

        // print_r($this->db->last_query())

        if($query->num_rows() > 0)
        { 
            return $query->row()->TOTAL_CLOSE;
        }

        return '0';
    }
}
?>