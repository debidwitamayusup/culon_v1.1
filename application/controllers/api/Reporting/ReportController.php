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

        // Export ke excel
        public function EXPORTSC_get()
        {
            $data = $this->module_model->get_datareportSC();
            $spreadsheet = new Spreadsheet();

            $spreadsheet->getProperties()->setCreator('Infomedoi')
            ->setLastModifiedBy('infomedio')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

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
                $spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
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
            $data = $this->module_model->get_datareportSPO();
            $spreadsheet = new Spreadsheet();

            $spreadsheet->getProperties()->setCreator('INFOMEDIA')
            ->setLastModifiedBy('INFOMEDIA')
            ->setTitle('Office 2007 XLSX Document')
            ->setSubject('Office 2007 XLSX Document')
            ->setDescription('document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('result file');

            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'TANGGAL')
            ->setCellValue('C1', 'COF')
            ->setCellValue('D1', 'ART')
            ->setCellValue('E1', 'AHT')
            ->setCellValue('F1', 'AST')
            ->setCellValue('G1', 'SCR')
            ;

            $i=2; foreach($data as $datas) {

                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $i-1)
                ->setCellValue('B'.$i, $datas->TANGGAL)
                ->setCellValue('c'.$i, $datas->COF)
                ->setCellValue('D'.$i, $datas->ART)
                ->setCellValue('E'.$i, $datas->AHT)
                ->setCellValue('F'.$i, $datas->AST)
                ->setCellValue('G'.$i, round($datas->SCR,2).'%')
                ;
                $i++;
            }
                $spreadsheet->getActiveSheet()->setTitle('SP Operation -  '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
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