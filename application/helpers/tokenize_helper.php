<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('checkuser_token')) {
    
    function checkuser_token($token) 
    {
        $CI =& get_instance();
        $CI->db->select('name,userlevel');
        $CI->db->from('m_user');
        $CI->db->where('token',$token);

        $query = $CI->db->get();

        if($query->num_rows() == 1)
        {
            return true;
        }
        return false;
    }
}

if (!function_exists('get_tenantlst')) {
    function get_tenantlst($token) 
    {
        $CI =& get_instance();
        $CI->db->select('a.tenant_id');
        $CI->db->from('m_akses a');
        $CI->db->join('m_user b','a.userid = b.userid');
        $CI->db->where('b.token',$token);

        $query = $CI->db->get();
        $result = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $data)
            {
                array_push($result,$data->tenant_id);
            }
            return $result;
        }
        return false;
    }
}