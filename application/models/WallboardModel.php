<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Wallboardmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Op_Performance($src='')
    {
        $this->db->select('*');
        $this->db->from('v_summ_ticket_unit');
        if($src)
		{
			$this->db->like('unit',$src);
        }
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            $idx = 1;
            foreach($query->result() as $data)
            {
                // $result[] = array(
                //     'unit_name' => $data->unit,
                //     'New'   => $data->sNew,
                //     'Open'  => $data->sOpen,
                //     'ReProses' => $data->sReProses,
                //     'ReOpen' => $data->sReopen,
                //     'PreClose' => $data->sPreClose,
                //     'ReAssign' => $data->sReAssign,
                //     'Pending' => 'NAN 0',
                //     'jml' => $data->jml
                // );

     //missing pending - reject
                $result[] = array(
                     $idx,
                     $data->unit,
                     $data->sNew,
                     $data->sOpen,
                     $data->sReopen,
                     

                     $data->sReProses,
                     $data->sReAssign,
                     $data->sPreClose,
                     $data->jml
                );
                $idx++;
            }

            return $result;
        }

        return FALSE;
    }

    public function sumStat_NC()
    {
        $this->db->select('SUM(sNew) as SNEW, SUM(sOpen) as SOPEN, SUM(sReopen) as SREOPEN, SUM(sReProses) as SREPROSES, SUM(sPreClose) as SPRECLOSE, SUM(sReAssign) as SREASSIGN');
        $this->db->from('v_summ_ticket_unit');
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            $result = array(
                'sumNew'   => $query->row()->SNEW,
                'sumOpen'  => $query->row()->SOPEN,
                'sumReProses' => $query->row()->SREPROSES,
                'sumReOpen' => $query->row()->SREOPEN,
                'sumPreClose' => $query->row()->SPRECLOSE,
                'sumReAssign' => $query->row()->SREASSIGN,
                'sumPending' => 'NAN 0'
             );

            return $result;
        }

           
        

        return FALSE;


    }

    public function Traffic_ops($date)
    {
        $this->db->select('tenant_id, SUM(art_num) AS ART, SUM(aht_num) AS AHT, SUM(ast_num) AS AST, SUM(scr) AS SCR');
        $this->db->from('v_scr_all_data');
        $this->db->where('tanggal',$date);
        $this->db->group_by('tenant_id');
        // $this->db->order_by('');
        $query = $this->db->get();
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
                $result[] = array(
                    'TENANT_ID' => $data->tenant_id,
                    'ART' => $data->ART,
                    'AHT' => $data->AHT,
                    'AST' => $data->AST,
                    'SCR' => $data->SCR
                );
            }
            return $result;
        }

        return FALSE;
    }

    public function scr_pie_chart_channel($date)
    {
        $this->db->select('m_channel.channel_name,m_channel.channel_id,m_channel.channel_color');
		$this->db->from('m_channel');
		$query = $this->db->get();

        $res_channel = array();
        $res_color = array();
		$res_tot = array();
			
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $data)
			{
                array_push($res_channel,$data->channel_name);
                array_push($res_color,$data->channel_color);
				array_push($res_tot,$this->get_total_cof_piechart($date,$data->channel_id));
			}

			$result = array(
                'channel_name' => $res_channel, 
                'color' => $res_color,
				'total' => $res_tot
			);
		}
		
		return $result;
    }

    function get_total_cof_piechart($date,$channel) //summ
	{
        
		$this->db->select('v_scr_all_data.cof as TOTAL');
		$this->db->from('v_scr_all_data');
		$this->db->where('v_scr_all_data.tanggal',$date);
		$this->db->where('v_scr_all_data.channel_id',$channel);
		$query = $this->db->get();

		if($query->num_rows()>0)
		{
			return $query->row()->TOTAL;
		}
		else
		{
			return '0';
		}

    }
    
    // function get_intervalchart($date)
    // {
    //     $this->db->select('m_channel.channel_name,m_channel.channel_id,m_channel.channel_color');
	// 	$this->db->from('m_channel');
	// 	$query = $this->db->get();

    //     $res_channel = array();
    //     $res_color = array();
	// 	   $res_tot = array();
			
	// 	if($query->num_rows() > 0)
	// 	{
	// 		foreach($query->result() as $data)
	// 		{
    //             array_push($res_channel,$data->channel_name);
    //             array_push($res_color,$data->channel_color);
	// 			array_push($res_tot,$this->get_total_cof_piechart($date,$data->channel_id));
	// 		}

	// 		$result = array(
    //             'channel_name' => $res_channel, 
    //             'color' => $res_color,
	// 			'total' => $res_tot
	// 		);
	// 	}
		
	// 	return $result;
    // }

}