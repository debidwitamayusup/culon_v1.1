<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class ReportController extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('CutiModel','module_model');
        }

        function printSuratPengajuanCUti(){
            $user_id = $this->security->xss_clean($this->input->get('id_karyawan'));
            $namaCuti = $this->security->xss_clean($this->input->get('namaCuti'));
            $durasiCuti = $this->security->xss_clean($this->input->get('durasiCuti'));
            $startDate = $this->security->xss_clean($this->input->get('startDate'));
            $endDate = $this->security->xss_clean($this->input->get('endDate'));
            $alasan = $this->security->xss_clean($this->input->get('alasan'));
            $namaHRD = $this->security->xss_clean($this->input->get('hrd'));
            $idCuti = $this->security->xss_clean($this->input->get('idCuti'));
            
            $dataCutiFromDB = $this->module_model->getDetilPengajuanCutiApp($idCuti);
            $dataKaryawan = $this->module_model->getKaryawanDataNotLoginApp($user_id);
           
            $arrCuti = array(
                "namaCuti"      => $namaCuti,
                "durasiCuti"    => $durasiCuti,
                "startDate"     => $startDate,
                "endDate"       => $endDate,
                "alasan"        => $alasan,
                "namaHRD"           => $namaHRD
            );

            $arrData = array(
                "dataKaryawan"  => $dataKaryawan,
                "dataCuti"      => $arrCuti,
                "dataCutiFromDB" => $dataCutiFromDB
            );
            // $data = $arrData;
            $data['arrData']=$arrData;
            // var_dump($arrData);
            $this->load->helper('pdf_helper');
		    $this->load->view('pdfreport', $data);

        }
    }

?>