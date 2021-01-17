<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CutiController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('CutiModel','module_model');
    }

    public function getDataKaryawan(){

        $user_id = $this->security->xss_clean($this->input->post('id_user'));

        $data = $this->module_model->getKaryawanDataApp($user_id);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Sukses',
                'data'    => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Gagal Mengambil Data'
            );
            echo json_encode($response);
        }
    }

    public function getDropdownCuti(){
        $jenis_kelamin = $this->security->xss_clean($this->input->post('jenis_kelamin'));

        $data = $this->module_model->getDropdownCutiApp($jenis_kelamin);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'    => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan!'
            );
            echo json_encode($response);
        }
    }
    
    public function getBalanceCuti(){
        $user_id = $this->security->xss_clean($this->input->post('id_user'));
        $idCuti = $this->security->xss_clean($this->input->post('id_cuti'));

        $data = $this->module_model->getBalanceCutiApp($user_id, $idCuti);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'    => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan!'
            );
            echo json_encode($response);
        }
    }

    public function getLimitCuti(){
        $idCuti = $this->security->xss_clean($this->input->post('id_cuti'));

        $data = $this->module_model->getLimitCutiApp($idCuti);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'    => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan!'
            );
            echo json_encode($response);
        }
    }

    public function getPengganti(){
        $namaPengganti = $this->security->xss_clean($this->input->post('namaPengganti'));

        $data = $this->module_model->getPengantiApp($namaPengganti);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'    => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan!'
            );
            echo json_encode($response);
        }        
    }

    public function insertPengajuan(){
        $idCuti = $this->security->xss_clean($this->input->post('idCuti'));
        $nomorInduk = $this->security->xss_clean($this->input->post('nomorInduk'));
        $alasanPengajuan = $this->security->xss_clean($this->input->post('alasanPengajuan'));
        $durasiPengajuan = $this->security->xss_clean($this->input->post('durasiPengajuan'));
        $dariTanggal = $this->security->xss_clean($this->input->post('dariTanggal'));
        $keTanggal = $this->security->xss_clean($this->input->post('keTanggal'));
        $idPengganti = $this->security->xss_clean($this->input->post('idPengganti'));
        $namaPengganti = $this->security->xss_clean($this->input->post('namaPengganti'));

        $data = $this->module_model->insertPengajuanApp($idCuti, $nomorInduk, $alasanPengajuan, $durasiPengajuan, $dariTanggal,
            $keTanggal, $idPengganti, $namaPengganti);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Berhasil Input Data!',
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Gagal Input Data!'
            );
            echo json_encode($response);
        }    
    }

    public function insertHistorisPengajuan(){
        $idCuti = $this->security->xss_clean($this->input->post('idCuti'));
        $nomorInduk = $this->security->xss_clean($this->input->post('nomorInduk'));
        $descCuti = $this->security->xss_clean($this->input->post('descCuti'));
        $durasiPengajuan = $this->security->xss_clean($this->input->post('durasiPengajuan'));

        $data = $this->module_model->insertHistorisPengajuanApp($idCuti, $nomorInduk, $descCuti, $durasiPengajuan);
        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Berhasil Input Data!',
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Gagal Input Data!'
            );
            echo json_encode($response);
        }    
    }

    public function cekApprovalCuti(){
        $idCuti = $this->security->xss_clean($this->input->post('idCuti'));
        $nomorInduk = $this->security->xss_clean($this->input->post('nomorInduk'));

        $data = $this->module_model->cekApprovalCutiApp($idCuti, $nomorInduk);
        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'  => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan',
                'data'  => $data
            );
            echo json_encode($response);
        }
    }

    public function listPengajuanCuti(){
        $nomorInduk = $this->security->xss_clean($this->input->post('nomorInduk'));

        $data = $this->module_model->listPengajuanCutiApp($nomorInduk);
        if($data != TRUE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'  => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan',
                'data'  => $data
            );
            echo json_encode($response);
        }
    }

    public function listApprovalPengajuanCuti(){
        $nomorInduk = $this->security->xss_clean($this->input->post('nomorInduk'));

        $data = $this->module_model->listApprovalPengajuanCutiApp($nomorInduk);
        if($data != TRUE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'  => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan',
                'data'  => $data
            );
            echo json_encode($response);
        }
    }

    public function listApprovalPengajuanCutiHRD(){

        $data = $this->module_model->listApprovalPengajuanCutiHRDApp();
        if($data != TRUE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'  => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan',
                'data'  => $data
            );
            echo json_encode($response);
        }
    }

    public function getLimitCutiHariIni(){
        $data = $this->module_model->getLimitCutiHariIniApp();

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'    => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan!'
            );
            echo json_encode($response);
        }
    }

    public function getDetilPengajuanCUti(){
        $idUnikCuti = $this->security->xss_clean($this->input->post('idUnikCuti'));
        $data = $this->module_model->getDetilPengajuanCutiApp($idUnikCuti);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'    => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan!'
            );
            echo json_encode($response);
        }
    }

    public function simpanApproveLeader(){
        $idUnikCuti = $this->security->xss_clean($this->input->post('idPengajuan'));
        $stApproval = $this->security->xss_clean($this->input->post('stApprove'));
        $idApproveLeader = $this->security->xss_clean($this->input->post('idApproveLeader'));
        $data = $this->module_model->postSimpanApproveLeader($idUnikCuti, $stApproval, $idApproveLeader);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data Berhasil Disimpan!'
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data Gagal Disimpan!'
            );
            echo json_encode($response);
        }
    }

    public function simpanApproveHRD(){
        $idUnikCuti = $this->security->xss_clean($this->input->post('idPengajuan'));
        $stApproval = $this->security->xss_clean($this->input->post('stApprove'));
        $idApproveHRD = $this->security->xss_clean($this->input->post('idApproveHRD'));
        $data = $this->module_model->postSimpanApproveHRD($idUnikCuti, $stApproval, $idApproveHRD);

        if($data != FALSE)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data Berhasil Disimpan!'
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data Gagal Disimpan!'
            );
            echo json_encode($response);
        }
    }

    public function simpanKaryawanApp(){
        $nomorInduk = $this->security->xss_clean($this->input->post('nomorInduk'));
        $nama = $this->security->xss_clean($this->input->post('nama'));
        $idJabatan = $this->security->xss_clean($this->input->post('idJabatan'));
        $tempatLahir = $this->security->xss_clean($this->input->post('tempatLahir'));
        $idLeader = $this->security->xss_clean($this->input->post('idLeader'));
        $tglLahir = $this->security->xss_clean($this->input->post('tglLahir'));
        $jenisKelamin = $this->security->xss_clean($this->input->post('jenisKelamin'));
        $agama = $this->security->xss_clean($this->input->post('agama'));
        $nik = $this->security->xss_clean($this->input->post('nik'));
        $noKK = $this->security->xss_clean($this->input->post('noKK'));
        $kwn = $this->security->xss_clean($this->input->post('kwn'));
        $status = $this->security->xss_clean($this->input->post('status'));
        $alamatKTP = $this->security->xss_clean($this->input->post('alamatKTP'));
        $alamatSekarang = $this->security->xss_clean($this->input->post('alamatSekarang'));
        $noTelp = $this->security->xss_clean($this->input->post('noTelp'));
        $noBPJSTK = $this->security->xss_clean($this->input->post('noBPJSTK'));
        $noBPJSKES = $this->security->xss_clean($this->input->post('noBPJSKES'));
        $npwp = $this->security->xss_clean($this->input->post('npwp'));
        $tglGabung = $this->security->xss_clean($this->input->post('tglGabung'));

        $data = $this->module_model->postSimpanKaryawan($nomorInduk, $nama, $idJabatan, $tempatLahir, $idLeader,
                $tglLahir, $jenisKelamin, $agama, $nik, $noKK, $kwn, $status, $alamatKTP, $alamatSekarang, $noTelp,
                $noBPJSTK, $noBPJSKES, $npwp, $tglGabung);

        if($data != FALSE)
        {
            $data2 = $this->module_model->postSimpanUser($nomorInduk, $nomorInduk, $nomorInduk);
            if($data2 != FALSE){
                $response = array(
                    'status'  => TRUE,
                    'message' => 'Data Berhasil Disimpan!'
                );
                echo json_encode($response);   
            }else{
                $response = array(
                    'status'  => FALSE,
                    'message' => 'Data Gagal Disimpan!'
                );
                echo json_encode($response);
            }
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data Gagal Disimpan!'
            );
            echo json_encode($response);
        }
    }

    public function ubahKaryawanApp(){
        $username = $this->security->xss_clean($this->input->post('username'));
        $nomorInduk = $this->security->xss_clean($this->input->post('nomorInduk'));
        $nama = $this->security->xss_clean($this->input->post('nama'));
        $idJabatan = $this->security->xss_clean($this->input->post('idJabatan'));
        $tempatLahir = $this->security->xss_clean($this->input->post('tempatLahir'));
        $idLeader = $this->security->xss_clean($this->input->post('idLeader'));
        $tglLahir = $this->security->xss_clean($this->input->post('tglLahir'));
        $jenisKelamin = $this->security->xss_clean($this->input->post('jenisKelamin'));
        $agama = $this->security->xss_clean($this->input->post('agama'));
        $nik = $this->security->xss_clean($this->input->post('nik'));
        $noKK = $this->security->xss_clean($this->input->post('noKK'));
        $kwn = $this->security->xss_clean($this->input->post('kwn'));
        $status = $this->security->xss_clean($this->input->post('status'));
        $alamatKTP = $this->security->xss_clean($this->input->post('alamatKTP'));
        $alamatSekarang = $this->security->xss_clean($this->input->post('alamatSekarang'));
        $noTelp = $this->security->xss_clean($this->input->post('noTelp'));
        $noBPJSTK = $this->security->xss_clean($this->input->post('noBPJSTK'));
        $noBPJSKES = $this->security->xss_clean($this->input->post('noBPJSKES'));
        $npwp = $this->security->xss_clean($this->input->post('npwp'));
        $tglGabung = $this->security->xss_clean($this->input->post('tglGabung'));

        $data = $this->module_model->postUbahKaryawan($username, $nomorInduk, $nama, $idJabatan, $tempatLahir, $idLeader,
                $tglLahir, $jenisKelamin, $agama, $nik, $noKK, $kwn, $status, $alamatKTP, $alamatSekarang, $noTelp,
                $noBPJSTK, $noBPJSKES, $npwp, $tglGabung);

        if($data != FALSE)
        {
            // $data2 = $this->module_model->postSimpanUser($nomorInduk, $nomorInduk, $nomorInduk);
            // if($data2 != FALSE){
                $response = array(
                    'status'  => TRUE,
                    'message' => 'Data Berhasil Disimpan!'
                );
                echo json_encode($response);   
            // }else{
            //     $response = array(
            //         'status'  => FALSE,
            //         'message' => 'Data Gagal Disimpan!'
            //     );
            //     echo json_encode($response);
            // }
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data Gagal Disimpan!'
            );
            echo json_encode($response);
        }
    }

    public function getJabatanApp(){
        $data = $this->module_model->getJabatan();
        if($data)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'  => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan'
            );
            echo json_encode($response);
        }
    }

    public function getlatestID(){
        $data = $this->module_model->getLatestID();
        if($data)
        {
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'  => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data tidak ditemukan'
            );
            echo json_encode($response);
        }
    }

    public function getStatusApproval(){
        $idUnikCuti = $this->security->xss_clean($this->input->post('idUnikCuti'));
        $data = $this->module_model->getStatusApproval($idUnikCuti);

        if($data != FALSE)
        { 
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'  => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data Tidak Ditemukan!'
            );
            echo json_encode($response);
        }
    }

    public function getDataKaryawanNotLogin(){
        $idUser = $this->security->xss_clean($this->input->post('idUser'));

        $data = $this->module_model->getKaryawanDataApp($idUser);

        if($data != FALSE)
        { 
            $response = array(
                'status'  => TRUE,
                'message' => 'Data ditemukan!',
                'data'  => $data
            );
            echo json_encode($response);
        }else{
            $response = array(
                'status'  => FALSE,
                'message' => 'Data Tidak Ditemukan!'
            );
            echo json_encode($response);
        }
    }
}