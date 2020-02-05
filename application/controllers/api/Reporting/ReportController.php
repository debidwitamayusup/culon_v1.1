<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . '/vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    class ReportController extends REST_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('ReportModel', 'module_model');
        }

        public function ReportingSC_post()
        {

            $date1 = $this->security->xss_clean($this->input->post('date_start'));
            $date2 = $this->security->xss_clean($this->input->post('date_end'));
            $src = $this->security->xss_clean($this->input->post('src'));
            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $chn = $this->security->xss_clean($this->input->post('channel'));

            //token
            $res = $this->module_model->get_datareportSC($date1,$date2,$tid,$chn,$src);
    
            if ($res) {
                $this->response([
                    'status'  => TRUE,
                    'message' => 'Data available!',
                    'data'    => $res
                        ], REST_Controller::HTTP_OK);
            }
            else {
                $this->response([
                    'status'  => FALSE,
                    'message' => 'Not Found!',
                    'data'    => 'EMPTY'
                        ], REST_Controller::HTTP_OK);
            }
        }

        public function ReportingSPO_post()
        {

            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $chn = $this->security->xss_clean($this->input->post('channel_id'));
            $mnth = $this->security->xss_clean($this->input->post('month'));
            $meth = 'data';

            //token
            $res = $this->module_model->get_datareportSPO($tid,$chn,$mnth,$meth);
    
            if ($res) {
                $this->response([
                    'status'  => TRUE,
                    'message' => 'Data available!',
                    'data'    => $res
                        ], REST_Controller::HTTP_OK);
            }
            else {
                $this->response([
                    'status'  => FALSE,
                    'message' => 'Not Found!',
                    'data'    => array()
                        ], REST_Controller::HTTP_OK);
            }
        }

        // Export ke excel
        public function EXPORTSC_get()
        {
            $data = $this->module_model->get_datareportSC();
            $spreadsheet = new Spreadsheet();

            $spreadsheet->getProperties()->setCreator('INFOMEDIA')
            ->setLastModifiedBy('INFOMEDIA')
            ->setTitle('Office 2007 Test Document')
            ->setSubject('Office 2007 Test Document')
            ->setDescription(' document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('result file');

            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'NAMA CHANNEL')
            ->setCellValue('C1', 'MESSAGE IN')
            ->setCellValue('D1', 'MESSAGE OUT')
            ->setCellValue('E1', 'UNIQUE CUSTOMER')
            ->setCellValue('F1', 'TOTAL SESSION')
            ;

            $i=2; foreach($data as $datas) {

                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $i-1)
                ->setCellValue('B'.$i, $datas->CHANNEL_NAME)
                ->setCellValue('c'.$i, $datas->MESSAGE_IN)
                ->setCellValue('D'.$i, $datas->MESSAGE_OUT)
                ->setCellValue('E'.$i, $datas->UNIQUE_CUSTOMER)
                ->setCellValue('F'.$i, $datas->TOTAL_SESSION)
                ;
                $i++;
            }
                $spreadsheet->getActiveSheet()->setTitle('Summary Channel - '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Summary Channel Report"'.date('d-m-Y H').'".xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                header('Cache-Control: cache, must-revalidate'); 
                header('Pragma: public'); 
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
        }

        public function EXPORTSPO_get()
        {
            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $chn = $this->security->xss_clean($this->input->get('channel_id'));
            $chn2 = $this->security->xss_clean($this->input->get('channel_name'));
            $mnth = $this->security->xss_clean($this->input->get('month'));
            $mnth2 = $this->security->xss_clean($this->input->get('month_name'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportSPO($tid,$chn,$mnth,$meth);
            $spreadsheet = new Spreadsheet();

            $spreadsheet->getProperties()->setCreator('INFOMEDIA')
            ->setLastModifiedBy('INFOMEDIA')
            ->setTitle('Office 2007 XLSX Document')
            ->setSubject('Office 2007 XLSX Document')
            ->setDescription('document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('result file');

            if (!$tid){
                $tid = 'All Tenant';
            }

            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1','Summary Performance Operation - '.$tid)
            ->setCellValue('A2','Export Time ')
            ->setCellValue('A3','Export By ')
            ->setCellValue('B2',date('d-m-Y H'))
            ->setCellValue('B3', $name)
            ->setCellValue('C2','Filter Month ')
            ->setCellValue('C3','Filter Channel ')
            ->setCellValue('D2', $mnth2)
            ->setCellValue('D3', $chn2)
            ->setCellValue('A4', 'NO')
            ->setCellValue('B4', 'TANGGAL')
            ->setCellValue('C4', 'COF')
            ->setCellValue('D4', 'ART')
            ->setCellValue('E4', 'AHT')
            ->setCellValue('F4', 'AST')
            ->setCellValue('G4', 'SCR')
            ;

            $i=5; foreach($data as $datas) {

                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $i-4)
                ->setCellValue('B'.$i, $datas->TANGGAL)
                ->setCellValue('c'.$i, $datas->COF)
                ->setCellValue('D'.$i, $datas->ART)
                ->setCellValue('E'.$i, $datas->AHT)
                ->setCellValue('F'.$i, $datas->AST)
                ->setCellValue('G'.$i, round($datas->SCR,2).'%')
                ;
                $i++;
            }
                $spreadsheet->getActiveSheet()->setAutoFilter('A4:G'.$i);

                $spreadsheet->getActiveSheet()->setTitle('SP Operation -  '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="SP Operation Report "'.date('d-m-Y H').'".xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                header('Cache-Control: cache, must-revalidate'); 
                header('Pragma: public'); 
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
        }
    }
?>