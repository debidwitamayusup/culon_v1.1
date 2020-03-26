<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class AuthModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
       
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

    public function usercheckempt($usr){ //this check user and password, returning login data value

        $this->db->select('userid AS USERID, name as LONG_NAME, userlevel AS PREVILAGE, tenant_id as TENANT_ID, image as gambar');
        $this->db->from('m_user');
        $this->db->where('userid',$usr);
        $this->db->where('token = ""');
   
        $query = $this->db->get();
        if($query->num_rows()==1) //where clause
        {
            return true;
        }

        return false;

    }

    public function loginapp($usr,$pwd){ //this check user and password, returning login data value

        $this->db->select('userid AS USERID, name as LONG_NAME, userlevel AS PREVILAGE, tenant_id as TENANT_ID, image as gambar');
        $this->db->from('m_user');//('m_login');
        $this->db->where(array('userid' => $usr,'password' => MD5($pwd)));
        $this->db->where('token = ""');
        $this->db->where('is_active','1');
        $this->db->where_in('userlevel', array('supervisor','admin','manager')); //('userlevel','Supervisor'); //temporary - need tenant table access previllage
        
        $query = $this->db->get();

        if($query->num_rows()==1) //where clause
        {
            $data    = $query->row();
            if(!$data->gambar)
            {
                $content = array(
                    'USERID'        => $data->USERID,
                    'NICK'          => $data->LONG_NAME,
                    'NAME'          => $data->LONG_NAME,
                    'PREVILAGE'     => $data->PREVILAGE,
                    'TENANT_ID'     => $this->getTenantAccess($data->USERID),
                    'PICTURE'       => FCPATH."public/user/".$data->gambar
           
                );

            }
            else{
                $content = array(
                    'USERID'        => $data->USERID,
                    'NICK'          => $data->LONG_NAME,
                    'NAME'          => $data->LONG_NAME,
                    'PREVILAGE'     => $data->PREVILAGE,
                    'TENANT_ID'     => $this->getTenantAccess($data->USERID),
                    'PICTURE'       => FCPATH.'public/user/'.$data->gambar
                );
            }

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

    public function logoutapp($token){
        
        $this->db->select('userid AS USERID, name as LONG_NAME, userlevel AS PREVILAGE');
        $this->db->from('m_user');
        $this->db->where('token', $token);

        $query = $this->db->get();

        if($query->num_rows()==1) //where clause
        {
            $data    = $query->row();
            
            $this->db->set('token','');
            $this->db->where('token', $token);
            $this->db->update('m_user');

            if($this->db->affected_rows() == 1)
            {
                return true;
            }
            return false;
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

    public function pwd_checker($token,$pwd){
        $password = md5($pwd);
        $this->db->select('userid AS USERID');
        $this->db->from('m_user');
        $this->db->where('token', $token);
        $this->db->where('password',$password);
        $query = $this->db->get();
        if($query->num_rows()==1) 
        {
            return true;
        }
        return false;

    }

    public function update_prof($token,$userid,$email,$phone,$password,$image)
    {
       
      
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
                $this->db->set('image',$image);
            }  
            $this->db->where('token', $token);
            $this->db->update('m_user');

            if($this->db->affected_rows() == 1)
            {
                return true;
            }

            return FALSE;
    }

    public function userdata()
    {
        $this->db->select('m_user.userid AS ID,m_user.name as NAME,m_user.phone as PHONE,m_user.email as EMAIL, m_user.userlevel AS PREVILAGE');
        $this->db->from('m_user');
        $this->db->where('m_user.userlevel !="admin"');
        $query = $this->db->get();
        if($query->num_rows()>0) 
        {
            $id = 1;
            foreach($query->result() as $data)
            {
                
                $result[] = array(
                    $id,
                    $data->ID,
                    $data->NAME,
                    $data->PREVILAGE,
                    $data->PHONE,
                    $data->EMAIL
                );
                $id++;
            }
            return $result;
        }
        return false;
    }

    public function tenantdata()
    {
        $this->db->select('tenant_id as ID, tenant_name as NAME, is_active as STATUS, group_id as GROUP');
        $this->db->from('m_tenant');
        $this->db->where('tenant_id > ""');
        $query = $this->db->get();
        if($query->num_rows()>0) 
        {
            $id = 1;
            foreach($query->result() as $data)
            {
                
                $result[] = array(
                    $id,
                    $data->ID,
                    $data->NAME,
                    $data->STATUS,
                    $data->GROUP
                );
                $id++;
            }
            return $result;
        }
        return false;
    }

    function tntchecker($id){
        $this->db->select('tenant_id');
        $this->db->from('m_tenant');
        $this->db->where('tenant_id', $id);
        
        $query = $this->db->get();
        if($query->num_rows()>0) 
        {
            return false;
        }
        return true;
    }

    public function addtnt($id,$name)
    {

        $data = array(
            'tenant_id' => $id,
            'tenant_name' => $name
        ); //$this->db->insert_id();
        $ins =  $this->db->insert('m_tenant',$data);

        if($ins)
        {
            //where inserted do !
            $content = array(
                'tenant_id'          => $id,
                'name'          => $name
            );
            return $content;
        }
        return FALSE;
    }

    public function adduser($username,$name,$phone,$email,$previlage)
    {

        $pwd = 'infomedia';//'8888'.substr($username,0,2).substr($phone,6,2).substr($previlage,0,2);
        $haspwd = md5($pwd);

        $data = array(
            'userid' => $username,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => $haspwd,
            'userlevel' => $previlage,
            'password' => ' '
            
        ); //$this->db->insert_id();
        $ins =  $this->db->insert('m_user',$data);

        if($ins)
        {
            //where inserted do !
            $content = array(
                'username'          => $username,
                'password'          => $pwd,
                'previlage'     => $previlage
            );

            return $content;
        }

        return FALSE;
    }

    public function changeuser($username,$name,$phone,$email,$previlage)
    {
        
        $data = array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'userlevel' => $previlage
        ); 

        $this->db->set($data);
        $this->db->where('userid', $username);
        $this->db->update('m_user');

        if($this->db->affected_rows() == 1)
        {
            return true;
        }

        return FALSE;
    }

    public function changeuserpwd($username)
    {
        $password = md5('infomedia');
        
        $this->db->set('password',$password);
        $this->db->set('token','""');
        $this->db->where('userid', $username);
        $this->db->update('m_user');

        if($this->db->affected_rows() == 1)
        {
            return true;
        }

        return FALSE;
    }

    public function tenantlist()
    {
        $this->db->select('tenant_id as id, tenant_name as name');
        $this->db->from('m_tenant');
        $query = $this->db->get();
        if($query->num_rows()>0) 
        {
            foreach($query->result() as $data)
            {
                $result[] = array(
                    'tenant_id' => $data->id,
                    'tenant_name' => $data->name
                );
            }
            return $result;
        }
        return FALSE;
    }

    public function assigntenanttouser($username,$tenant)
    {
        $data = array(
            'userid' => $username,
            'tenant_id' => $tenant
        ); 

        $this->db->set($data);
        $this->db->insert('m_akses');

        if($this->db->affected_rows() == 1)
        {
            return true;
        }

        return FALSE;
    }

    public function removetenanttouser($username)
    {
        if($username)
        {
            $this->db->where('userid',$username);
            $this->db->delete('m_akses');    
            if($this->db->affected_rows() == 1)
            {
                return true;
            }
            return FALSE;
        }
        return FALSE;
    }

    public function removeuser($username)
    {
        if($username)
        {
            $this->db->where('userid', $username);
            $this->db->delete('m_user');
            if($this->db->affected_rows() == 1)
            {
                return true;
            }
            return FALSE;
        }
        return FALSE;
    }
    public function removetenant($tenantid)
    {
        if($tenantid)
        {
            $this->db->where('tenant_id', $tenantid);
            $this->db->delete('m_tenant');
            if($this->db->affected_rows() == 1)
            {
                return true;
            }
            return FALSE;
        }
        return FALSE;
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

    function userchecker($username){
        $this->db->select('m_user.userid AS ID');
        $this->db->from('m_user');
        $this->db->where('userid', $username);
        
        $query = $this->db->get();
        if($query->num_rows()>0) 
        {
            return false;
        }
        return true;
    }

    function admin_checker($token)
    {
        $this->db->select('m_user.userid AS ID, m_user.userlevel AS PREVILAGE');
        $this->db->from('m_user');
        $this->db->where('m_user.token', $token);
        $this->db->where('m_user.userlevel = "admin"');

        $query = $this->db->get();

        if($query->num_rows()>0) 
        {
            return true;
        }
        return false;
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
    #endregion


#endregion

}