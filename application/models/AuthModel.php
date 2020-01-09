<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class AuthModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkId() {
        // $checked_phone = $this->db->get_where('m_users', array(
        //     'USERNAME' => $this->input->post('username')
        // ));
        // if ($checked_phone->num_rows() == 1) {
        //     return TRUE;
        // }
        // return FALSE;
        return TRUE;
    }

    public function do_forgotpwd() {
        // $this->db->select('ID');
        // $this->db->where('*EMAIL/HP/ETC', $this->input->post('*params'));
        // $checked = $this->db->get('m_user');

        // if ($checked->num_rows() == 0) {
        //     return FALSE;
        // }

        // $rand_password = random_string('numeric', 6); 
        // $code_security = $this->access->_generate_security_code(); 
        // $password      = $this->access->_do_hash($rand_password, $code_security);//salting
        // $token         = md5($code_security); //generate token
        // $phone         = $this->input->post('handphone');

        // $this->db->where(array('ID' => $checked->row()->ID));
        // $update = $this->db->update('m_user', array(
        //     'PASSWORD'      => $password,
        //     'CODE_SECURITY' => $code_security,
        //     'TOKEN'         => $token,
        //     'RESET_COUNT'   => '1', //kalau ada limit reset count per date
        //     'RESET_DATE'    => date('Y-m-d H:i:s') //kalau ada limit reset pwd per day
        // ));

        // if ($update) {
        //     $msg = 'Berikut adalah password reset Anda ' . $rand_password . '. Silahkan ganti password untuk keamanan dan kenyamanan penggunaan aplikasi.';
        //     SendSMS($phone, $msg); //sms 
        //     return array(
        //         'PASSWORD' => $rand_password
        //     );
        // }

        return FALSE;
    }

}