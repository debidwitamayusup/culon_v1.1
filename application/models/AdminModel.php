<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class AdminModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
       
    }

    public function listKaryawanApp(){
        $que = "
        SELECT b.id_user, a.nomor_induk, a.nama, c.nama_jabatan, a.tgl_gabung
        FROM karyawan a, user b, jabatan c
        WHERE a.nomor_induk = b.nomor_induk AND a.id_jabatan = c.id_jabatann
        AND a.id_jabatan != 'ADMD'
        ";
        
        $query = $this->db->query($que);
        $data    = $query->row();
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows()>=1) //where clause
        {
            $id = 1;
            foreach( $query->result() as $data)
            {
                $result[] = array(
                    $id,
                    $data->id_user,
                    $data->nomor_induk,
                    $data->nama,
                    $data->nama_jabatan,
                    $data->tgl_gabung,
                    '<a href="ubah_pass_admin?id='.$data->id_user.'">Ubah Password</a>'
                );
                $id++;
            }
            
            return $result;
        }
        return FALSE;
    }

    public function ubahPasswordUserApp($user_id, $pwd){
        $que = 'UPDATE user SET password = "'.$pwd.'" WHERE  id_user = "'.$user_id.'"';
        $query = $this->db->query($que);
        if($query)
        {
        return TRUE;
        }
        return FALSE;
    }
}

?>