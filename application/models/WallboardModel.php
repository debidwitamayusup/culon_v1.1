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


}