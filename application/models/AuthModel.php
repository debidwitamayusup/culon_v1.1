<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class AuthModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
#region :: ragakasih
    public function checkId() { //this check if user registered were true
        // $checked_phone = $this->db->get_where('m_users', array(
        //     'USERNAME' => $this->input->post('username')
        // ));
        // if ($checked_phone->num_rows() == 1) {
        //     return TRUE;
        // }
        // return FALSE;
        return FALSE;
    }
    public function loginapp($usr,$pwd){ //this check user and password, returning login data value

        $this->db->select('userid AS USERID, name as LONG_NAME, userlevel AS PREVILAGE, tenant_id as TENANT_ID');
        $this->db->from('m_user');//('m_login');
        $this->db->where(array('userid' => $usr,'password' => MD5($pwd)));
        $this->db->where('is_active','1');
        $this->db->where_in('userlevel', array('supervisor','admin','operation')); //('userlevel','Supervisor'); //temporary - need tenant table access previllage
        

        $query = $this->db->get();

        if($query->num_rows()==1) //where clause
        {
            $data    = $query->row();
            $content = array(
                'USERID'        => $data->USERID,
                'NICK'          => $data->LONG_NAME,
                'NAME'          => $data->LONG_NAME,
                'PREVILAGE'     => $data->PREVILAGE,
                'TENANT_ID'     => $this->getTenantAccess($data->USERID),
                'PICTURE'       => FCPATH."public\user\default-avatar.jpg",//APPPATH.'public\user'.$data->PICTURE,
              //  'UNIT'          => $data->UNIT_ID

            );

            // $this->db->where('userid', $usr);
            // $this->db->update('m_login', array('is_login' => '1'));

            return $content;
        }

        return FALSE;
    }

    public function getTenantAccess($userid)
    {
        $this->db->select('a.tenant_id, a.tenant_name');
        $this->db->from('m_tenant a');
        $this->db->join('m_akses b', 'a.tenant_id = b.tenant_id', 'left');
        $this->db->where('b.userid', $userid);
        $query = $this->db->get();

        
        if($query->num_rows() > 0)
        {
            $result = array();
            foreach($query->result() as $data)
            {
                $result[] = array(
                    'TENANT_ID'=> $data->tenant_id,
                    'TENANT_NAME'=> $data->tenant_name
                );
            }
            return $result;
        }
        return false;
    }

    public function logoutapp($usr){
        
        $this->db->select('userid AS USERID, name as LONG_NAME, userlevel AS PREVILAGE');
        $this->db->from('m_user');
        $this->db->where('userid', $usr);

        $query = $this->db->get();

        if($query->num_rows()==1) //where clause
        {
            $data    = $query->row();
            $content = array(
                'USERID'        => $data->USERID,
                'NICK'          => $data->LONG_NAME,
                'NAME'          => $data->LONG_NAME,
                'PREVILAGE'     => $data->PREVILAGE,
                'PICTURE'       => APPPATH.'public\user\default-avatar.jpg',//APPPATH.'public\user'.$data->PICTURE,
              //  'UNIT'          => $data->UNIT_ID

            );

            // $this->db->where('userid', $usr);
            // $this->db->update('m_login', array('is_login' => '1'));

            return $content;
        }

        return FALSE;

    }
    // public function tenant(){
    // }
    public function do_registeracc($usr,$pwd){

        //query double checking goes here
        if(($usr == 'admin') && ($pwd == 'admin*')) //where clause - may add with additional unique data
        {
           return FALSE;
        }
        //2nd query insert goes here
        //$insert <<-- this for lastinsert data to retuned on if clauses
        $insert = array(
            'ID' => '12345'
        ); //$this->db->insert_id();

        if($insert)
        {
            $content = array(
                'USERNAME'          => 'User2',
                'ACC_NAME'          => 'Harimau-02',
                'ACC_PREVILAGE'     => 'MANAGEMENT'
            );
            return $content;
        }

        return FALSE;
    }
    public function do_forgotpwd() {
        // $this->db->select('ID');
        // $this->db->where('*EMAIL/HP/ETC', $this->input->post('*params'));
        // $checked = $this->db->get('m_user');

        // if ($checked->num_rows() == 0) {
        //     return FALSE;
        // }

           $rand_password = random_string('numeric', 6); 
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
        $content = array(
            'ID_USER'       => 'User1',
            'NAMAUSER'      => 'ADMIN1',
            'NEWPASSWORD'   => $rand_password //this should not be sent back via json (sent via sms or email api instead)
        );

        return $content;
    }
#endregion

}