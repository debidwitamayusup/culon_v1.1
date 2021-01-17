<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class AuthModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
       
    }

    public function loginApp($usr,$pwd){ //this check user and password, returning login data value

        // $this->db->select('SELECT a.id_user, a.PASSWORD, b.*');
        // $this->db->from('user a, karyawan b');//('m_login');
        // $this->db->where('a.id_user', $usr);
        // $this->db->where('a.password', $pwd);
        // $this->db->where('a.nomor_induk = b.nomor_induk');

        $que = '
        SELECT a.id_user, a.PASSWORD, b.jenis_kelamin, b.id_jabatan, b.nomor_induk, c.nama_jabatan
        FROM user a, karyawan b, jabatan c
        WHERE a.id_user = "'.$usr.'"
        AND a.PASSWORD = "'.$pwd.'"
        AND a.nomor_induk = b.nomor_induk
        AND b.id_jabatan = c.id_jabatann
        ';
        
        $query = $this->db->query($que);
        $data    = $query->row();
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows()==1) //where clause
        {
                $content = array(
                    'userId'        => $data->id_user,
                    'idJabatan'     => $data->id_jabatan,
                    'namaJabatan'   => $data->nama_jabatan,
                    'jenisKelamin'  => $data->jenis_kelamin,
                    'nomorInduk'    => $data->nomor_induk
                );

                return $content;
            }

            // $this->db->where('userid', $usr);
            // $this->db->update('m_login', array('is_login' => '1'));

            return FALSE;
        }

        public function c_pwd($password,$nomorInduk){

            $queUser = 'UPDATE user SET password = "'.$password.'" WHERE nomor_induk = "'.$nomorInduk.'"';
            $query = $this->db->query($queUser);
            if($queUser)
            {
                return TRUE;
            }
            return FALSE;
    
        }
    }

    