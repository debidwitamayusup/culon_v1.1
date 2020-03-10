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
        $this->db->where_in('userlevel', array('supervisor','admin','manager')); //('userlevel','Supervisor'); //temporary - need tenant table access previllage
        

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
        // if($token)
        // {
        //     $this->db->where('token', $token);
        // }

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
            
            // $this->db->set('token','');
            // $this->db->where('token', $token);
            // $this->db->update('m_user'));

            return $content;
        }

        return FALSE;

    }

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

    public function c_pwd($token,$password,$newpwd){

        $password = md5($password);
        $newpwd = md5($newpwd);

        $this->db->select('userid AS USERID');
        $this->db->from('m_user');
        $this->db->where('token', $token);
        $this->db->where('password',$password);
        $query = $this->db->get();

        if($query->num_rows()==1) 
        {
            $data    = $query->row();
            if($newpwd)
            {
                $this->db->set('password',$newpwd);
            }
            $this->db->where('token', $token);
            $this->db->update('m_user');

            if($this->db->affected_rows() == 1)
            {
                return true;
            }
        }
        return FALSE;

    }

    public function update_prof($token,$userid,$email,$phone,$image)
    {
        $this->db->select('userid AS USERID');
        $this->db->from('m_user');
        $this->db->where('token', $token);
        $query = $this->db->get();

        if($query->num_rows()==1) 
        {
            $data    = $query->row();
            if($userid)
            {
                $this->db->set('userid',$userid);
            }
            if($phone)
            {
                $this->db->set('phone',$phone);
            }
            if($email)
            {
                $this->db->set('email',$email);
            } 
            if($image)
            {
            }  
            $this->db->where('token', $token);
            $this->db->update('m_user');

            if($this->db->affected_rows() == 1)
            {
                return true;
            }
        }
        return FALSE;
    }

    function getdataupdate($token)
    {
        $this->db->select('m_user.userid AS ID, m_user.email AS EMAIL, m_user.phone as PHONE');
        $this->db->from('m_user');
        $this->db->join('m_akses','m_akses.userid = m_user.userid');
        $this->db->where('token', $token);
        $query = $this->db->get();
        if($query->num_rows()>0) 
        {
            $data = $query->row();
            $content = array(
                'ID'       => $data->ID,
                'EMAIL'      => $data->EMAIL,
                'PHONE'   => $data->PHONE
            );
            return $content;
        }

        return false;
    }

    function token_checker($token)
    {
        $this->db->select('m_user.userid AS ID, m_user.userlevel AS PREVILAGE, m_akses.tenant_id as TID');
        $this->db->from('m_user');
        $this->db->join('m_akses','m_akses.userid = m_user.userid');
        $this->db->where('token', $token);
        $query = $this->db->get();
        if($query->num_rows()>0) 
        {
            foreach($query->result() as $data)
            {
                $data[] = array(
                    'TENANT_ID' => $data->TID
                );
            }

            $content = array(
                'ID_USER'       => $query->row()->ID,
                'PREVILAGE'      => $query->row()->PREVILAGE,
                'TENANT_LIST'   => $data
            );

            return $content;
        }

        return false;
    }

    #region additional funct

    function generate_token($usr){
        
        $this->db->select('userid AS USERID, name as LONG_NAME,phone as TELPON, userlevel AS PREVILAGE');
        $this->db->from('m_user');
        $this->db->where('userid', $usr);

        $query = $this->db->get();

        if($query->num_rows()==1) 
        {
            $data    = $query->row();
            $token = hash('gost',$data->USERID.$data->TELPON.date('his'));

            $this->db->where('userid', $usr);
            $this->db->update('m_user', array('token' => $token));

            return $token;
        }
        return FALSE;
    }

    #endregion


#endregion

}