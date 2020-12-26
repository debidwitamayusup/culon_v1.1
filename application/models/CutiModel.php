<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class CutiModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
       
    }

    public function getKaryawanDataApp($usr){
        $que = '
        SELECT a.id_user, a.PASSWORD, b.*, c.nama_jabatan
        FROM user a, karyawan b, jabatan c
        WHERE a.id_user = "'.$usr.'"
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
                    'nomorInduk'     => $data->nomor_induk,
                    'nama'          => $data->nama,
                    'idJabatan'     => $data->id_jabatan,
                    'namaJabatan'   => $data->nama_jabatan,
                    'tempatLahir'   => $data->tgl_lahir,
                    'jenisKelamin' => $data->agama,
                    'nik'           => $data->nik,
                    'noKK'          => $data->no_kk,
                    'kwn'           => $data->kwn,
                    'status'        => $data->status,
                    'alamatKtp'    => $data->alamat_ktp,
                    'alamatSekarang'   => $data->alamat_sekarang,
                    'noTelp'       => $data->no_telp,
                    'noBpjstk'      => $data->no_bpjstk,
                    'noBpjskes'     => $data->no_bpjskes,
                    'noNpwp'        => $data->no_npwp,
                    'tglGabung'     => $data->tgl_gabung,
                    'dataLeader'    => $this->getLeaderApp($data->nomor_induk, $data->id_leader),
                    'dataKaryawanFull'  => $this->getKaryawanDataNotLoginApp($data->nomor_induk)
                );

                return $content;
        }

            // $this->db->where('userid', $usr);
            // $this->db->update('m_login', array('is_login' => '1'));

         return FALSE;
    }

    public function getKaryawanDataNotLoginApp($nomorInduk){
        $que = '
            SELECT * FROM karyawan WHERE nomor_induk = "'.$nomorInduk.'"
        ';
        
        $query = $this->db->query($que);
        $data    = $query->row();
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows()==1) //where clause
        {
                $content = array(
                    'nomorInduk'     => $data->nomor_induk,
                    'nama'          => $data->nama,
                    'idJabatan'     => $data->id_jabatan,
                    'tempatLahir'   => $data->tgl_lahir,
                    'jenisKelamin' => $data->agama,
                    'nik'           => $data->nik,
                    'noKK'          => $data->no_kk,
                    'kwn'           => $data->kwn,
                    'status'        => $data->status,
                    'alamatKtp'    => $data->alamat_ktp,
                    'alamatSekarang'   => $data->alamat_sekarang,
                    'noTelp'       => $data->no_telp,
                    'noBpjstk'      => $data->no_bpjstk,
                    'noBpjskes'     => $data->no_bpjskes,
                    'noNpwp'        => $data->no_npwp,
                    'tglGabung'     => $data->tgl_gabung,
                    'dataLeader'    => $this->getLeaderApp($data->nomor_induk, $data->id_leader),
                    'dataJabatan'   => $this->getJabatanApp($data->nomor_induk)
                );

                return $content;
        }

            // $this->db->where('userid', $usr);
            // $this->db->update('m_login', array('is_login' => '1'));

         return FALSE;
    }

    public function getLeaderApp($nomorInduk, $id_leader){
        $que = '
        SELECT karyawan.nomor_induk,
        karyawan.nama,
        karyawan.id_jabatan
        FROM karyawan
        LEFT JOIN (
            SELECT * FROM karyawan WHERE nomor_induk = "'.$nomorInduk.'") AS a ON a.nomor_induk = karyawan.id_leader
        WHERE karyawan.nomor_induk = "'.$id_leader.'"
        ';
        
        $query = $this->db->query($que);
        $data    = $query->row();
        if($query->num_rows()==1) //where clause
        {
                $content = array(
                    'nomorIndukLeader'        => $data->nomor_induk,
                    'namaLeader'     => $data->nama,
                    'jabatanLeader'          => $data->id_jabatan
                );
                return $content;
            }
        return FALSE;
    }

    public function getJabatanApp($nomorInduk){
        $que = '
        SELECT j.id_jabatann, j.nama_jabatan from jabatan j  
        left join karyawan k on j.id_jabatann = k.id_jabatan 
        where k.nomor_induk = "'.$nomorInduk.'"
        ';
        
        $query = $this->db->query($que);
        $data    = $query->row();
        if($query->num_rows()==1) //where clause
        {
                $content = array(
                    'idJabatan'        => $data->id_jabatann,
                    'namaJabatan'     => $data->nama_jabatan
                );
                return $content;
            }
        return FALSE;
    }

    public function getDropdownCutiApp($jenis_kelamin){
        $this->db->select('*');
        $this->db->from('jenis_cuti');
        $this->db->where('jenis_kelamin_cuti = "u" OR jenis_kelamin_cuti = "'.$jenis_kelamin.'"');

        $query = $this->db->get()->result();

        if($query){
            foreach($query as $data){
                $content[] = array(
                    'idCuti'            => $data->id_cuti,
                    'descCuti'          =>$data->desc_cuti,
                    'jenisKelaminCuti'  =>$data->jenis_kelamin_cuti
                );
            }
            return $content;
        }
        return FALSE;
    }

    public function getBalanceCutiApp($usr, $idCuti){
        $this->db->select('*');
        $this->db->from('karyawan_cuti_historis');
        $this->db->where('id_cuti', $idCuti);
        $this->db->where('nomor_induk', $usr);
        $this->db->where('YEAR(tgl_pengajuan) = YEAR(CURDATE())');

        $query = $this->db->get()->result();

        if($query){
            foreach($query as $data){
                $content[] = array(
                    'idCuti'        => $data->id_cuti,
                    'nomorInduk'    => $data->nomor_induk,
                    'descCuti'      => $data->desc_cuti,
                    'banyakPengajuan'   => $data->banyak_pengajuan
                );
            }
            return $content;
        }
        return FALSE;
    }

    public function getLimitCutiApp($idCuti){
        $this->db->select('*');
        $this->db->from('jenis_cuti');
        $this->db->where('id_cuti = "'.$idCuti.'"');

        $query = $this->db->get()->result();

        if($query){
            foreach($query as $data){
                $content[] = array(
                    'idCuti'            => $data->id_cuti,
                    'descCuti'          =>$data->desc_cuti,
                    'limitCuti'  =>$data->limit_cuti
                );
            }
            return $content;
        }
        return FALSE;
    }

    public function getPengantiApp($namaPengganti){
        $this->db->select('nomor_induk, nama');
        $this->db->from('karyawan');
        $this->db->like('nama', $namaPengganti);

        $query = $this->db->get()->result();

        if($query){
            foreach($query as $data){
                $content[] = array(
                    'nomorInduk'        => $data->nomor_induk,
                    'nama'          =>$data->nama
                );
            }
            return $content;
        }
        return FALSE;
    }

    public function insertPengajuanApp($idCuti, $nomorInduk, $alasanPengajuan, $durasiPengajuan, $dariTanggal,
    $keTanggal, $idPengganti, $namaPengganti){
        $que = '
        INSERT INTO pengajuan_cuti (id_cuti, nomor_induk, alasan_pengajuan, durasi_pengajuan, dari_tanggal, ke_tanggal, 
        id_karyawan_pengganti, nama_karyawan_pengganti)
        VALUES ("'.$idCuti.'", "'.$nomorInduk.'", "'.$alasanPengajuan.'","'.$durasiPengajuan.'", "'.$dariTanggal.'", "'.$keTanggal.'",
        "'.$idPengganti.'", "'.$namaPengganti.'")
        ';
        
        $query = $this->db->query($que);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function insertHistorisPengajuanApp($idCuti, $nomorInduk, $descCuti, $durasiPengajuan){
        $que='
        INSERT INTO karyawan_cuti_historis (id_cuti, nomor_induk, desc_cuti, banyak_pengajuan)
        VALUES ("'.$idCuti.'", "'.$nomorInduk.'", "'.$descCuti.'","'.$durasiPengajuan.'")
        ';

        $query = $this->db->query($que);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function cekApprovalCutiApp($idCUti, $nomorInduk){
        $que = '
        SELECT * FROM pengajuan_cuti a
        INNER JOIN (
            select id_cuti as id_cuti2, nomor_induk as nomor_induk2
            FROM pengajuan_cuti where approve_pemohon = "N" OR approve_pekerja_pengganti = "N"
            OR approve_leader = "N" OR approve_kepala_bagian = "N" OR approve_hrd = "N"
        ) AS b ON a.id_cuti = b.id_cuti2 AND a.nomor_induk = b.nomor_induk2
        WHERE a.id_cuti = "'.$idCUti.'" AND a.nomor_induk = "'.$nomorInduk.'"
        AND YEAR(a.tgl_pengajuan) = YEAR(CURDATE())
        ';
        
        $query = $this->db->query($que);
        $data    = $query->row();
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows()==1) //where clause
        {
            $content = array(
                'idPengajuan'        => $data->id_pengajuan_cuti,
                'idCuti'             => $data->id_cuti,
                'nomorInduk'          => $data->nomor_induk,
                'tglPengajuan'      => $data->tgl_pengajuan,
                'alasanPengajuan'   => $data->alasan_pengajuan,
                'durasiPengajuan'   => $data->durasi_pengajuan,
                'dariTanggal'       => $data->dari_tanggal,
                'dariJam'           => $data->dari_jam,
                'keTanggal'          => $data->ke_tanggal,
                'keJam'             => $data->ke_jam,
                'idPengganti'        => $data->id_karyawan_pengganti,
                'namaPengganti'     => $data->nama_karyawan_pengganti,
                'approvePemohon'    => $data->approve_pemohon,
                'approvePengganti'  => $data->approve_pekerja_pengganti,
                'approveLeader'     => $data->approve_leader,
                'approveKepalaBagian'     => $data->approve_kepala_bagian,
                'approveHrd'        => $data->approve_hrd,
                'keterangan'     => $data->keterangan
            );
            return $content;
        }
        return FALSE;
    }

    public function listPengajuanCutiApp($nomorInduk){
        $que = '
        SELECT a.id_pengajuan_cuti idUnikCuti, b.desc_cuti, a.tgl_pengajuan, a.durasi_pengajuan, a.dari_tanggal, a.ke_tanggal, a.approve_pemohon,
        a.approve_pekerja_pengganti, a.approve_leader, a.approve_kepala_bagian, a.approve_hrd 
        FROM pengajuan_cuti a, jenis_cuti b
        WHERE a.nomor_induk = "'.$nomorInduk.'" AND a.id_cuti = b.id_cuti
        ORDER BY a.tgl_pengajuan DESC
        ';
        
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
                    $data->desc_cuti,
                    $data->tgl_pengajuan,
                    $data->durasi_pengajuan,
                    $data->dari_tanggal,
                    $data->ke_tanggal,
                    $data->approve_pemohon,
                    $data->approve_pekerja_pengganti,
                    $data->approve_leader,
                    $data->approve_kepala_bagian,
                    $data->approve_hrd,
                    '<a href="v_detil_pengajuan?id='.$data->idUnikCuti.'">Detil</a>'
                );
                $id++;
            }
            
            return $result;
        }
        return FALSE;
    }

    public function listApprovalPengajuanCutiApp($nomorInduk){
        $que = '
        
        SELECT pc.id_pengajuan_cuti idUnikCuti, jc.desc_cuti, pc.tgl_pengajuan, pc.durasi_pengajuan, pc.dari_tanggal, pc.ke_tanggal, pc.approve_pemohon,
                pc.approve_pekerja_pengganti, pc.approve_leader, pc.approve_kepala_bagian, pc.approve_hrd, pc.nomor_induk ,k.nama 
        FROM  pengajuan_cuti pc
        LEFT JOIN jenis_cuti jc ON pc.id_cuti = jc.id_cuti 
        LEFT JOIN karyawan k ON k.nomor_induk = pc.nomor_induk 
        WHERE k.id_leader = "'.$nomorInduk.'"
        ';
        
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
                    $data->nomor_induk,
                    $data->nama,
                    $data->desc_cuti,
                    $data->durasi_pengajuan,
                    $data->dari_tanggal,
                    $data->ke_tanggal,
                    $data->approve_pemohon,
                    $data->approve_pekerja_pengganti,
                    $data->approve_leader,
                    $data->approve_kepala_bagian,
                    $data->approve_hrd,
                    '<a href="v_detil_approval_pengajuan?id='.$data->idUnikCuti.'">Proses</a>'
                );
                $id++;
            }
            
            return $result;
        }
        return FALSE;
    }

    public function listApprovalPengajuanCutiHRDApp(){
        $que = '
        
        SELECT pc.id_pengajuan_cuti idUnikCuti, jc.desc_cuti, pc.tgl_pengajuan, pc.durasi_pengajuan, pc.dari_tanggal, pc.ke_tanggal, pc.approve_pemohon,
                pc.approve_pekerja_pengganti, pc.approve_leader, pc.approve_kepala_bagian, pc.approve_hrd, pc.nomor_induk ,k.nama 
        FROM  pengajuan_cuti pc
        LEFT JOIN jenis_cuti jc ON pc.id_cuti = jc.id_cuti 
        LEFT JOIN karyawan k ON k.nomor_induk = pc.nomor_induk
        ';
        
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
                    $data->nomor_induk,
                    $data->nama,
                    $data->desc_cuti,
                    $data->durasi_pengajuan,
                    $data->dari_tanggal,
                    $data->ke_tanggal,
                    $data->approve_pemohon,
                    $data->approve_pekerja_pengganti,
                    $data->approve_leader,
                    $data->approve_kepala_bagian,
                    $data->approve_hrd,
                    '<a href="v_detil_approval_pengajuan_hrd?id='.$data->idUnikCuti.'">Proses</a>'
                );
                $id++;
            }
            
            return $result;
        }
        return FALSE;
    }

    public function getLimitCutiHariIniApp(){
        $que = 'SELECT COUNT(tgl_pengajuan) sisaCuti FROM pengajuan_cuti WHERE tgl_pengajuan  = CURDATE()';

        $query = $this->db->query($que);
        $data    = $query->row();
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows()>=1) //where clause
        {
            $data = $query->result();
            $sisaCuti = $data[0]->sisaCuti;
            $response = array(
                'sisaCuti'   => $sisaCuti
            );

            return $response;
        }
        return FALSE;
    }

    public function getDetilPengajuanCutiApp($idUnikCuti){
        $this->db->select('*');
        $this->db->from('pengajuan_cuti');
        $this->db->where('id_pengajuan_cuti = "'.$idUnikCuti.'"');
        
        $query = $this->db->get()->result();
        
        // print_r($this->db->last_query());
        // exit;
        if($query){
            foreach($query as $data){
                $content[] = array(
                    'id'                => $data->id_pengajuan_cuti,
                    'idCuti'            => $data->id_cuti,
                    'nomorInduk'        => $data->nomor_induk,
                    'tglPengajuan'      => $data->tgl_pengajuan,
                    'alasanPengajuan'   => $data->alasan_pengajuan,
                    'durasiPengajuan'   => $data->durasi_pengajuan,
                    'dariTanggal'       => $data->dari_tanggal,
                    'keTanggal'         => $data->ke_tanggal,
                    'idPengganti'       => $data->id_karyawan_pengganti,
                    'approvePemohon'    => $data->approve_pemohon,
                    'approvePekerjaPengganti'   =>  $data->approve_pekerja_pengganti,
                    'approveLeader'     => $data->approve_leader,
                    'approveKepalaBagian'   => $data->approve_kepala_bagian,
                    'approveHrd'        => $data->approve_hrd,
                    'keterangan'        => $data->keterangan,
                    'jenisCuti'          => $this->getJenisCuti($data->id_cuti),
                    'namaPengganti'     => $this->getNamaPengganti($data->id_karyawan_pengganti),
                    'dataKaryawan'      => $this->getKaryawanDataNotLoginApp($data->nomor_induk)
                );
            }
            return $content;
        }
        return FALSE;
    }

    public function getJenisCuti($idCuti){
        $this->db->select('*');
        $this->db->from('jenis_cuti');
        $this->db->where('id_cuti = "'.$idCuti.'"');

        $query = $this->db->get()->result();

        if($query){
            foreach($query as $data){
                $content[] = array(
                    'idCuti'                => $data->id_cuti,
                    'descCuti'            => $data->desc_cuti,
                    'limitCuti'        => $data->limit_cuti,
                    'jenisKelaminCuti'  => $data->jenis_kelamin_cuti
                );
            }
            return $content;
        }
        return FALSE;
    }

    public function getNamaPengganti($nomorInduk){
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->where('nomor_induk = "'.$nomorInduk.'"');

        $query = $this->db->get()->result();

        if($query){
            foreach($query as $data){
                $content[] = array(
                    'namaPengganti'                => $data->nama
                );
            }
            return $content;
        }
        return FALSE;
    }

    public function postSimpanApproveLeader($idUnikCuti, $stApproval, $idApproveLeader){
        $que = '
        UPDATE pengajuan_cuti 
        SET approve_leader = "'.$stApproval.'", tgl_approve_leader = CURDATE(), id_approve_leader = "'.$idApproveLeader.'"
        WHERE id_pengajuan_cuti = "'.$idUnikCuti.'"
        ';
        $query = $this->db->query($que);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function postSimpanApproveHRD($idUnikCuti, $stApproval, $idApproveHRD){
        $que = '
        UPDATE pengajuan_cuti 
        SET approve_hrd = "'.$stApproval.'", tgl_approve_hrd = CURDATE(), id_approve_hrd = "'.$idApproveHRD.'"
        WHERE id_pengajuan_cuti = "'.$idUnikCuti.'"
        ';
        $query = $this->db->query($que);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function postSimpanKaryawan($nomorInduk, $nama, $idJabatan, $tempatLahir, $idLeader,
    $tglLahir, $jenisKelamin, $agama, $nik, $noKK, $kwn, $status, $alamatKTP, $alamatSekarang, $noTelp,
    $noBPJSTK, $noBPJSKES, $npwp, $tglGabung){
        $que = 'INSERT INTO karyawan (nomor_induk, nama, id_jabatan, tempat_lahir, id_leader, tgl_lahir, 
                        jenis_kelamin, agama, nik, no_kk, kwn, status, alamat_ktp, alamat_sekarang, no_telp, 
                        no_bpjstk, no_bpjskes, no_npwp, tgl_gabung) 
                VALUES ("'.$nomorInduk.'", "'.$nama.'", "'.$idJabatan.'", "'.$tempatLahir.'", "'.$idLeader.'",
                        "'.$tglLahir.'", "'.$jenisKelamin.'", "'.$agama.'", "'.$nik.'", "'.$noKK.'", "'.$kwn.'", 
                        "'.$status.'", "'.$alamatKTP.'", "'.$alamatSekarang.'", "'.$noTelp.'", "'.$noBPJSTK.'", 
                        "'.$noBPJSKES.'", "'.$npwp.'", "'.$tglGabung.'")';
        $query = $this->db->query($que);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getJabatan(){
        $this->db->select('*');
        $this->db->from('jabatan');

        $query = $this->db->get()->result();
        // print_r($this->db->last_query());
        // print_r($query);
        // exit;
        if($query){
            foreach($query as $data){
                $content[] = array(
                    'idJabatan'        => $data->id_jabatann,
                    'namaJabatan'    => $data->nama_jabatan
                );
            }
            // print_r($content);
            // exit;
            return $content;
        }
        return FALSE;
    }

    public function getLatestID(){
        $que ='select nomor_induk from karyawan k order by nomor_induk  desc limit 1';
        $query = $this->db->query($que);
        $data    = $query->row();
        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows()==1) //where clause
        {
            $content = array(
                'nomorInduk'        => $data->nomor_induk
            );

            return $content;
        }
        return FALSE;
    }

    public function postSimpanUser($Username, $Password, $nomorInduk){
        $que = 'INSERT INTO user (id_user, nomor_induk, password) 
        VALUES ("'.$Username.'", "'.$Password.'", "'.$nomorInduk.'")';
        $query = $this->db->query($que);
        if($query)
        {
        return TRUE;
        }
        return FALSE;
    }

    public function getStatusApproval($idUnikCuti){
        $this->db->select('approve_leader, approve_hrd');
        $this->db->from('pengajuan_cuti');
        $this->db->where('id_pengajuan_cuti', $idUnikCuti);

        $query = $this->db->get()->result();
        // print_r($this->db->last_query());
        // print_r($query);
        // exit;
        if($query){
            foreach($query as $data){
                $content[] = array(
                    'approveLeader'        => $data->approve_leader,
                    'approveHRD'    => $data->approve_hrd
                );
            }
            // print_r($content);
            // exit;
            return $content;
        }
        return FALSE;
    }
}