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
#region :: Raga
        function ss_formatter($src)
        {
            if($src =='header') {
            $result = [
                'font' => [
                    'bold' => true,
                    'color' => [
                        'rgb' => 'f2f2f2',
                    ]
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => '404040',
                    ]
                    
                ],
            ];
            }
            else if($src =='body')
            {
                $result = [
                   
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                    
                ];
            }
            else if($src == 'title')
            {
                $result = [
                    'font' => [
                        'bold' => true,
                        'size' => 16
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    
                ];
            }
            else if($src == 'subtitle')
            {
                $result = [
                    'font' => [
                        'bold' => true,
                        'size' => 12
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ],
                    
                ];
            }

            return $result;
        }

        public function OptionSkill_post()
        {
            $res = $this->module_model->get_skill();
    
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
        
        public function ReportingSC_post()
        {

            $t_start = $this->security->xss_clean($this->input->post('start_time'));
            $t_end = $this->security->xss_clean($this->input->post('end_time'));
            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $meth = 'data';
            //token
            $res = $this->module_model->get_datareportSC($tid,$t_start,$t_end,$meth);
    
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

        public function ReportingSCloseTicket_post()
        {
            $t_start = $this->security->xss_clean($this->input->post('start_date'));
            $t_end = $this->security->xss_clean($this->input->post('end_date'));
            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $chn = $this->security->xss_clean($this->input->post('channel'));
            $meth = 'data';
            //token
            $res = $this->module_model->get_datareportSCloseTicket($tid,$t_start,$t_end,$chn,$meth);
    
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

        public function ReportingSClosePerCh_post()
        {
            $t_start = $this->security->xss_clean($this->input->post('start_date'));
            $t_end = $this->security->xss_clean($this->input->post('end_date'));
            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $chn = $this->security->xss_clean($this->input->post('channel'));
            $meth = 'data';
            //token
            $res = $this->module_model->get_datareportSCloseTicket_PerCh($tid,$t_start,$t_end,$chn,$meth);
    
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
        
        public function ReportingSInterval_post()
        {

            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $date = $this->security->xss_clean($this->input->post('tanggal'));
            $interval = $this->security->xss_clean($this->input->post('interval'));
            $chn = $this->security->xss_clean($this->input->post('channel'));

            $meth = 'data';
            //token
            $res = $this->module_model->get_datareportSInterval($tid,$chn,$interval,$date,$meth);
            // print_r($res);
            // exit;

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

        public function ReportingSPA_post()
        {

            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $t_start = $this->security->xss_clean($this->input->post('start_time'));
            $t_end = $this->security->xss_clean($this->input->post('end_time'));
            $meth = 'data';

            //token
            $res = $this->module_model->get_datareportSPA($tid, $t_start,$t_end,$meth);
            
            // print_r($res);
            // exit;

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

        public function ReportingOPS_post()
        {
            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $d_start = $this->security->xss_clean($this->input->post('start_date'));
            $d_end = $this->security->xss_clean($this->input->post('end_date'));
            $meth = 'data';

            //token
            $res = $this->module_model->get_datareportOPS($tid,$d_start,$d_end,$meth);
    
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

        public function ReportingOPS2_post()
        {
            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $d_start = $this->security->xss_clean($this->input->post('start_date'));
            $d_end = $this->security->xss_clean($this->input->post('end_date'));
            $meth = 'data';

            //token
            $res = $this->module_model->get_datareportOPS2($tid,$d_start,$d_end,$meth);
    
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
        public function ReportingAP_post()
        {
            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $d_start = $this->security->xss_clean($this->input->post('start_date'));
            $d_end = $this->security->xss_clean($this->input->post('end_date'));
            $skillz = str_replace('_',' ',$this->security->xss_clean($this->input->post('skill')));

            $meth = 'data';

            //token
            $res = $this->module_model->get_datareportAP($tid,$d_start,$d_end,$skillz,$meth);
    
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

        public function ReportingAL_post()
        {
            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $d_start = $this->security->xss_clean($this->input->post('start_date'));
            $d_end = $this->security->xss_clean($this->input->post('end_date'));
            
            $meth = 'data';

            //token
            $res = $this->module_model->get_datareportAL($tid,$d_start,$d_end,$meth);
    
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

        public function ReportingSTraffic_post()
        {

            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            
            $d_start = $this->security->xss_clean($this->input->post('start_date'));
            $d_end = $this->security->xss_clean($this->input->post('end_date'));
            $amt = $this->security->xss_clean($this->input->post('ammount'));
            $pge = $this->security->xss_clean($this->input->post('page'));
            $meth = 'data';

            //token
            $res = $this->module_model->get_datareportTraffic($tid,$d_start,$d_end,$meth,$amt,$pge);
            $count_d =  $this->module_model->get_maxrowTraffic($tid,$d_start,$d_end);
    
            if ($res) {
                $this->response([
                    'status'  => TRUE,
                    'message' => 'Data available!',
                    'max_row' => $count_d,
                    'data'    => $res
                        ], REST_Controller::HTTP_OK);
            }
            else {
                $this->response([
                    'status'  => FALSE,
                    'message' => 'Not Found!',
                    'max_row' => 0,
                    'data'    => array()
                        ], REST_Controller::HTTP_OK);
            }
        }

        public function ReportingKIP_post()
        {

            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $cid = $this->security->xss_clean($this->input->post('channel_id'));
            $d_start = $this->security->xss_clean($this->input->post('start_date'));
            $d_end = $this->security->xss_clean($this->input->post('end_date'));
            $meth = 'data';

            //token
            $res = $this->module_model->get_datareportKIP($tid,$cid,$d_start,$d_end,$meth);
    
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
            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            $t_start = $this->security->xss_clean($this->input->get('start_time'));
            $t_end = $this->security->xss_clean($this->input->get('end_time'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportSC($tid,$t_start,$t_end,$meth);
        
            if ($data) {
            $spreadsheet = new Spreadsheet();
             #region - 1st part sub image to spreadsheet
                // $chart = $this->security->xss_clean($this->input->get('chart_img'));
                // $imageData = base64_decode($chart);
                // $chart_img = imagecreatefromstring($imageData);
                // $white = imagecolorallocate($chart_img, 255, 255, 255);
                // imagecolortransparent($chart_img, $white);
                // imagesavealpha($chart_img,true);
                // imagealphablending($chart_img, true); 
            
                // $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing();
                // $drawing->setName('Chart');
                // $drawing->setDescription('Chart');
                // $drawing->setCoordinates('H2');
                // $drawing->setImageResource($chart_img);
                // $drawing->setRenderingFunction(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::RENDERING_PNG);
                // $drawing->setMimeType(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_DEFAULT);       
            #endregion 
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
            ->setCellValue('A1','Summary Performance Operation - '.$tin)
            ->setCellValue('A2','Export Time ')
            ->setCellValue('A3','Export By ')
            ->setCellValue('B2',date('d-m-Y H:i:s'))
            ->setCellValue('B3', $name)
            ->setCellValue('C2','Filter Start ')
            ->setCellValue('C3','Filter END ')
            ->setCellValue('D2', $t_start)
            ->setCellValue('D3', $t_end)
            ->setCellValue('A4', 'NO')
            ->setCellValue('B4', 'CHANNEL_NAME')
            ->setCellValue('E4', 'UNIQUE CUSTOMER')
            ->setCellValue('F4', 'TOTAL SESSION')
            ->setCellValue('C4', 'MESSAGE IN')
            ->setCellValue('D4', 'MESSAGE OUT')
            ;

            #region - 2nd part sub image to spreadsheet
                // $drawing->setWorksheet($spreadsheet->getActiveSheet());
            #endregion           

            $spreadsheet->getActiveSheet()->mergeCells('A1:G1');
            $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
            $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
            $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
            $spreadsheet->getActiveSheet()->getStyle('A4:F4')->applyFromArray($this->ss_formatter('header'));


            $i=5; 
            foreach($data as $datas) {

                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $i-4)
                ->setCellValue('B'.$i, $datas->CHANNEL_NAME)
                ->setCellValue('C'.$i, $datas->UNIQUE_CUSTOMER)
                ->setCellValue('D'.$i, strval($datas->TOTAL_SESSION))
                ->setCellValue('E'.$i, $datas->MESSAGE_IN)
                ->setCellValue('F'.$i, $datas->MESSAGE_OUT)
                ;
                $i++;
            }
            $x = $i-1;
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);


                $spreadsheet->getActiveSheet()->getStyle('A5:F'.$x)->applyFromArray($this->ss_formatter('body'));

                $spreadsheet->getActiveSheet()->setAutoFilter('A4:F'.$x);

                $spreadsheet->getActiveSheet()->setTitle('S Channel -  '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                $filename = $name.' SC Report '.date('d-m-Y H').'.xls';
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename='.$filename);
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                header('Cache-Control: cache, must-revalidate'); 
                header('Pragma: public'); 

                // $path = FCPATH.'public/reportdata/';
                $writer = IOFactory::createWriter($spreadsheet,'Xls');
                // $writer->save($path.$filename);
                $writer->save('php://output');
                // $res = base_url().'public/reportdata/'.$filename;

                
                    // $this->response([
                    //     'status'  => TRUE,
                    //     'message' => 'Report Stored!',
                    //     'Link'    => $res
                    //         ], REST_Controller::HTTP_OK);
                        }
                        // else {
                        //     $this->response([
                        //         'status'  => FALSE,
                        //         'message' => 'Report Storing Failed!',
                        //         'Link'    => false
                        //             ], REST_Controller::HTTP_OK);
                        // }
        }

        public function EXPORTSPO_get()
        {
            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            $chn = $this->security->xss_clean($this->input->get('channel_id'));
            $chn2 = $this->security->xss_clean($this->input->get('channel_name'));
            $mnth = $this->security->xss_clean($this->input->get('month'));
            $mnth2 = $this->security->xss_clean($this->input->get('month_name'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportSPO($tid,$chn,$mnth,$meth);
            if($data)
            {
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
                ->setCellValue('A1','Summary Performance Operation - '.$tin)
                ->setCellValue('A2','Export Time ')
                ->setCellValue('A3','Export By ')
                ->setCellValue('B2',date('d-m-Y H:i:s'))
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

                $spreadsheet->getActiveSheet()->mergeCells('A1:G1');
                $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
                $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('A4:G4')->applyFromArray($this->ss_formatter('header'));


                $i=5; 
                foreach($data as $datas) {

                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $i-4)
                    ->setCellValue('B'.$i, $datas->TANGGAL)
                    ->setCellValue('c'.$i, strval(number_format($datas->COF,0,',','.')))
                    ->setCellValue('D'.$i, $datas->ART)
                    ->setCellValue('E'.$i, $datas->AHT)
                    ->setCellValue('F'.$i, $datas->AST)
                    ->setCellValue('G'.$i, round($datas->SCR,2).'%')
                    ;
                    $i++;
                }
                $x = $i-1;
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                    $spreadsheet->getActiveSheet()->getStyle('A5:G'.$x)->applyFromArray($this->ss_formatter('body'));

                    $spreadsheet->getActiveSheet()->setAutoFilter('A4:G'.$x);

                    $spreadsheet->getActiveSheet()->setTitle('SP Operation -  '.date('d-m-Y H'));
                    $spreadsheet->setActiveSheetIndex(0);
                    $filename = $name.'SP Operation Report'.date('d-m-Y H').'.xls';
                    // header('Content-Type', 'application/vnd.ms-excel');
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename='.$filename);
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                    header('Cache-Control: cache, must-revalidate'); 
                    header('Pragma: public'); 
                 

                    // $path = FCPATH.'public/reportdata/';
                    $writer = IOFactory::createWriter($spreadsheet,'Xls');
                    // $writer->save($path.$filename);
                    $writer->save('php://output');
                    //$response->headers->set('Content-Type', 'application/vnd.ms-excel');
                    //$response->headers->set('Content-Disposition', 'attachment;filename="ExportScan.xls"');
                    //$response->headers->set('Cache-Control','max-age=0');
                    //return $response;
                    // $res = base_url().'public/reportdata/'.$filename;

                
                    // $this->response([
                    //     'status'  => TRUE,
                    //     'message' => 'Report Stored!',
                    //     'Link'    => $res
                    //         ], REST_Controller::HTTP_OK);
            }
            // else {
            //         $this->response([
            //             'status'  => FALSE,
            //             'message' => 'Report Storing Failed!',
            //             'Link'    => false
            //                 ], REST_Controller::HTTP_OK);
            // }
            
        }

        public function EXPORTSPA_get()
        {

            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            $t_start = $this->security->xss_clean($this->input->get('start_time'));
            $t_end = $this->security->xss_clean($this->input->get('end_time'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportSPA($tid,$t_start,$t_end,$meth);
            if($data)
            {
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
                ->setCellValue('A1','Summary Performance Operation - '.$tin)
                ->setCellValue('A2','Export Time ')
                ->setCellValue('A3','Export By ')
                ->setCellValue('B2',date('d-m-Y H:i:s'))
                ->setCellValue('B3', $name)
                ->setCellValue('C2','Filter Start ')
                ->setCellValue('C3','Filter End ')
                ->setCellValue('D2', $t_start)
                ->setCellValue('D3', $t_end)
                ->setCellValue('A4', 'NO')
                ->setCellValue('B4', 'AGENT ID')
                ->setCellValue('C4', 'AGENT NAME')
                ->setCellValue('D4', 'SKILL')
                ->setCellValue('E4', 'COF')
                ->setCellValue('F4', 'ART')
                ->setCellValue('G4', 'AHT')
                ->setCellValue('H4', 'AST')
                ->setCellValue('I4', 'SCR')
                ;

                $spreadsheet->getActiveSheet()->mergeCells('A1:I1');
                $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
                $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('A4:I4')->applyFromArray($this->ss_formatter('header'));

                $i=5; foreach($data as $datas) {

                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $i-4)
                    ->setCellValue('B'.$i, $datas->AGENT_ID)
                    ->setCellValue('C'.$i, $datas->AGENT_NAME)
                    ->setCellValue('D'.$i, $datas->SKILL_NAME)
                    ->setCellValue('E'.$i, strval(number_format($datas->COF,0,',','.')))
                    ->setCellValue('F'.$i, $datas->ART)
                    ->setCellValue('G'.$i, $datas->AHT)
                    ->setCellValue('H'.$i, $datas->AST)
                    ->setCellValue('I'.$i, round($datas->SCR,2).'%')
                    ;
                    $i++;
                }
                $x = $i-1;
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

                    $spreadsheet->getActiveSheet()->getStyle('A5:I'.$x)->applyFromArray($this->ss_formatter('body'));
                    $spreadsheet->getActiveSheet()->setAutoFilter('A4:I'.$x);
                

                    $spreadsheet->getActiveSheet()->setTitle('SP Agent -  '.date('d-m-Y H'));
                    $spreadsheet->setActiveSheetIndex(0);
                    $filename = $name.'SP Agent Report '.date('d-m-Y H').'.xls';
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename='.$filename);
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                    header('Cache-Control: cache, must-revalidate'); 
                    header('Pragma: public'); 
                    // $path = FCPATH.'public/reportdata/';
                    $writer = IOFactory::createWriter($spreadsheet,'Xls');
                    // $writer->save($path.$filename);
                    //$writer->save('php://output');
                    // $res = base_url().'public/reportdata/'.$filename;
                    
                    // $this->response([
                    //     'status'  => TRUE,
                    //     'message' => 'Report Stored!',
                    //     'Link'    => $res
                    //         ], REST_Controller::HTTP_OK);
            }
            // else
            // {
            //     $this->response([
            //         'status'  => FALSE,
            //         'message' => 'Report Storing Failed!',
            //         'Link'    => false
            //             ], REST_Controller::HTTP_OK);
            // }
        }

        public function EXPORTKIP_get()
        {
            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            $cid = $this->security->xss_clean($this->input->get('channel_id'));
            $chn2 = $this->security->xss_clean($this->input->get('channel_name'));
            $d_start = $this->security->xss_clean($this->input->get('start_date'));
            $d_end = $this->security->xss_clean($this->input->get('end_date'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportKIP($tid,$cid,$d_start,$d_end,$meth);
            if($data)
            {
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
                ->setCellValue('A1','Summary KIP - '.$tin)
                ->setCellValue('A2','Export Time ')
                ->setCellValue('A3','Export By ')
                ->setCellValue('B2',date('d-m-Y H:i:s'))
                ->setCellValue('B3', $name)
                ->setCellValue('C2','Start Date')
                ->setCellValue('C3','End Date ')
                ->setCellValue('D2', $d_start)
                ->setCellValue('D3', $d_end)
                ->setCellValue('A4', 'NO')
                ->setCellValue('B4', 'KATEGORI')
                ->setCellValue('C4', 'JUMLAH')
                ;

                $spreadsheet->getActiveSheet()->mergeCells('A1:G1');
                $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
                $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('A4:C4')->applyFromArray($this->ss_formatter('header'));

                $asw = 0;
                $i=5; 
                foreach($data as $datas) {

                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $i-4)
                    ->setCellValue('B'.$i, $datas->category)
                    ->setCellValue('C'.$i, strval($datas->jumlah))
                    ;
                    $asw = $asw+$datas->jumlah;
                    $i++;
                }
                $x = $i-1;
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    

                    $spreadsheet->getActiveSheet()->getStyle('A5:C'.$x)->applyFromArray($this->ss_formatter('body'));

                    $spreadsheet->getActiveSheet()->setAutoFilter('A4:C'.$x);

                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$i , 'TOTAL');
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$i , strval($asw));

                    $spreadsheet->getActiveSheet()->setTitle('SP Operation -  '.date('d-m-Y H'));
                    $spreadsheet->setActiveSheetIndex(0);
                    $filename = $name.'Summary KIP Report'.date('d-m-Y H').'.xls';
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename='.$filename);
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                    header('Cache-Control: cache, must-revalidate'); 
                    header('Pragma: public'); 
                 

                    // $path = FCPATH.'public/reportdata/';
                    $writer = IOFactory::createWriter($spreadsheet,'Xls');
                    // $writer->save($path.$filename);
                    $writer->save('php://output');
                    // $res = base_url().'public/reportdata/'.$filename;

                
                    // $this->response([
                    //     'status'  => TRUE,
                    //     'message' => 'Report Stored!',
                    //     'Link'    => $res
                    //         ], REST_Controller::HTTP_OK);
                }
            // else {
            //         $this->response([
            //             'status'  => FALSE,
            //             'message' => 'Report Storing Failed!',
            //             'Link'    => false
            //                 ], REST_Controller::HTTP_OK);
            // }
            
        }

        public function EXPORTTRF_get()
        {
            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            
            $d_start = $this->security->xss_clean($this->input->get('start_date'));
            $d_end = $this->security->xss_clean($this->input->get('end_date'));
            $name = $this->security->xss_clean($this->input->get('name'));
            $amt = $this->security->xss_clean($this->input->get('ammount'));
            $page = $this->security->xss_clean($this->input->get('page'));
            $meth = 'data';

            //token
            $data = $this->module_model->get_datareportTraffic($tid,$d_start,$d_end,$meth, $amt, $page);
           

            if ($data) {
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
                ->setCellValue('A1','Summary Traffic - '.$tin)
                ->setCellValue('A2','Export Time ')
                ->setCellValue('A3','Export By ')
                ->setCellValue('B2',date('d-m-Y H:i:s'))
                ->setCellValue('B3', $name)
                ->setCellValue('C2','Filter Start ')
                ->setCellValue('C3','Filter END ')
                ->setCellValue('D2', $d_start)
                ->setCellValue('D3', $d_end)
                ->setCellValue('A4', 'NO')
                ->setCellValue('B4', 'TANGGAL')
                ;
                
                $z = 0;
                for($y=3;$y<=26;$y++)
                {
                    if($z<12)
                    {
                        $spreadsheet->getActiveSheet(0)->getCellByColumnAndRow($y,4)->setValue($data[0]['DATA'][$z]['CHANNEL_NAME']);
                    }
                    
                    $z++;
                    $spreadsheet->getActiveSheet(0)->getCellByColumnAndRow($y,5)->setValue('COF');
                    $y++;
                    $spreadsheet->getActiveSheet(0)->getCellByColumnAndRow($y,5)->setValue('SCR');
                }
                

                $spreadsheet->getActiveSheet()->mergeCells('A1:AB1');
                $spreadsheet->getActiveSheet()->mergeCells('A4:A5');
                $spreadsheet->getActiveSheet()->mergeCells('B4:B5');
                $spreadsheet->getActiveSheet()->mergeCells('C4:D4');
                $spreadsheet->getActiveSheet()->mergeCells('E4:F4');
                $spreadsheet->getActiveSheet()->mergeCells('G4:H4');
                $spreadsheet->getActiveSheet()->mergeCells('I4:J4');
                $spreadsheet->getActiveSheet()->mergeCells('K4:L4');
                $spreadsheet->getActiveSheet()->mergeCells('M4:N4');
                $spreadsheet->getActiveSheet()->mergeCells('O4:P4');
                $spreadsheet->getActiveSheet()->mergeCells('Q4:R4');
                $spreadsheet->getActiveSheet()->mergeCells('S4:T4');
                $spreadsheet->getActiveSheet()->mergeCells('U4:V4');
                $spreadsheet->getActiveSheet()->mergeCells('W4:X4');
                $spreadsheet->getActiveSheet()->mergeCells('Y4:Z4');
                // $spreadsheet->getActiveSheet()->mergeCells('AA4:AB4');

                $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
                $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('A4:Z5')->applyFromArray($this->ss_formatter('header'));
    
    
                $i=6; 
                foreach($data as $datas) {
                   
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $i-5)
                    ->setCellValue('B'.$i, $datas['TANGGAL']);

                    $i2=3;
                    foreach($datas['DATA'] as $datas2)
                    {
                        $spreadsheet->getActiveSheet(0)->getCellByColumnAndRow($i2, $i)->setValue($datas2['COF']);
                        $i2 ++;
                        $spreadsheet->getActiveSheet(0)->getCellByColumnAndRow($i2, $i)->setValue($datas2['SCR']);
                        $i2 ++;
                    }
                   
                    $i++;
                }
                $x = $i-1;

                    for($char = 'A';$char != 'AA';$char++)
                    {
                        $spreadsheet->getActiveSheet()->getColumnDimension($char)->setAutoSize(true);
                    }
                    // $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
                    // $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
    
    
                    $spreadsheet->getActiveSheet()->getStyle('A5:Z'.$x)->applyFromArray($this->ss_formatter('body'));
    
                    $spreadsheet->getActiveSheet()->setAutoFilter('A5:Z'.$x);
    
                    $spreadsheet->getActiveSheet()->setTitle('S Channel -  '.date('d-m-Y H'));
                    $spreadsheet->setActiveSheetIndex(0);
                    $filename = $name.' SC Report '.date('d-m-Y H').'.xls';
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename='.$filename);
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                    header('Cache-Control: cache, must-revalidate'); 
                    header('Pragma: public'); 
    
                    // $path = FCPATH.'public/reportdata/';
                    $writer = IOFactory::createWriter($spreadsheet,'Xls');
                    // $writer->save($path.$filename);
                    $writer->save('php://output');
                    // $res = base_url().'public/reportdata/'.$filename;
    
                    
                        // $this->response([
                        //     'status'  => TRUE,
                        //     'message' => 'Report Stored!',
                        //     'Link'    => $res
                        //         ], REST_Controller::HTTP_OK);
                            }
                            // else {
                            //     $this->response([
                            //         'status'  => FALSE,
                            //         'message' => 'Report Storing Failed!',
                            //         'Link'    => false
                            //             ], REST_Controller::HTTP_OK);
                            // }
        }

        public function EXPORTAP_get()
        {
            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            $d_start = $this->security->xss_clean($this->input->get('start_date'));
            $d_end = $this->security->xss_clean($this->input->get('end_date'));
            $skillz = $this->security->xss_clean($this->input->get('skill'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportAP($tid,$d_start,$d_end,$skillz,$meth);
            // print_r($data);
            //     exit;
            if ($data) {
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
            ->setCellValue('A1','Agent Performance Operation - '.$tin)
            ->setCellValue('A2','Export Time ')
            ->setCellValue('A3','Export By ')
            ->setCellValue('B2', date('d-m-Y H:i:s'))
            ->setCellValue('B3', $name)
            ->setCellValue('C2','Filter Start ')
            ->setCellValue('C3','Filter End ')
            ->setCellValue('D2', $d_start)
            ->setCellValue('D3', $d_end)
            ->setCellValue('A4', 'NO')
            ->setCellValue('B4', 'AGENT ID')
            ->setCellValue('C4', 'AGENT NAME')
            ->setCellValue('D4', 'SKILL')
            ->setCellValue('E4', 'OFFERED')
            ->setCellValue('F4', 'HANDLED')
            ->setCellValue('G4', 'UNHANDLED')
            ->setCellValue('H4', 'AHT')
            ->setCellValue('I4', 'ART')
            ->setCellValue('J4', 'AST')
            ->setCellValue('K4', 'SCR')
            ;

                 

            $spreadsheet->getActiveSheet()->mergeCells('A1:G1');
            $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
            $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
            $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
            $spreadsheet->getActiveSheet()->getStyle('A4:K4')->applyFromArray($this->ss_formatter('header'));


            $i=5; 
            foreach($data as $datas) {

                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $i-4)
                ->setCellValue('B'.$i, $datas->AGENTID)
                ->setCellValue('C'.$i, $datas->AGENTNAME)
                ->setCellValue('D'.$i, $datas->SKILLNAME)
                ->setCellValue('E'.$i, strval(number_format($datas->OFFERED,0,'.',',')))
                ->setCellValue('F'.$i, '-')
                ->setCellValue('G'.$i, '-')
                ->setCellValue('H'.$i, $datas->AHT)
                ->setCellValue('I'.$i, $datas->ART)
                ->setCellValue('J'.$i, $datas->AST)
                ->setCellValue('K'.$i, round($datas->SCR,2).'%')
                ;
                $i++;
            }
            $x = $i-1;
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);


                $spreadsheet->getActiveSheet()->getStyle('A5:K'.$x)->applyFromArray($this->ss_formatter('body'));

                $spreadsheet->getActiveSheet()->setAutoFilter('A4:K'.$x);

                $spreadsheet->getActiveSheet()->setTitle('Agent Perform -  '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                $filename = $name.' Agent Report '.date('d-m-Y H').'.xls';
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename='.$filename);
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                header('Cache-Control: cache, must-revalidate'); 
                header('Pragma: public'); 

                // $path = FCPATH.'public/reportdata/';
                $writer = IOFactory::createWriter($spreadsheet,'Xls');
                // $writer->save($path.$filename);
                $writer->save('php://output');
                // $res = base_url().'public/reportdata/'.$filename;

                
                    // $this->response([
                    //     'status'  => TRUE,
                    //     'message' => 'Report Stored!',
                    //     'Link'    => $res
                    //         ], REST_Controller::HTTP_OK);
            }
            // else {
            //     $this->response([
            //         'status'  => FALSE,
            //         'message' => 'Report Storing Failed!',
            //         'Link'    => false
            //             ], REST_Controller::HTTP_OK);
            // }
        }

        public function EXPORTOPS_get()
        {

            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            $d_start = $this->security->xss_clean($this->input->get('start_date'));
            $d_end = $this->security->xss_clean($this->input->get('end_date'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportOPS($tid,$d_start,$d_end,$meth);
            $data2 = $this->module_model->get_datareportOPS2($tid,$d_start,$d_end,$meth);

            if($data)
            {
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
                ->setCellValue('A1','Summary Operation Performance by date - '.$tin)
                ->setCellValue('A2','Export Time ')
                ->setCellValue('A3','Export By ')
                ->setCellValue('B2',date('d-m-Y H:i:s'))
                ->setCellValue('B3', $name)
                ->setCellValue('C2','Filter Start ')
                ->setCellValue('C3','Filter End ')
                ->setCellValue('D2', $d_start)
                ->setCellValue('D3', $d_end)
                ->setCellValue('A4', 'NO')
                ->setCellValue('B4', 'TANGGAL')
                ->setCellValue('C4', 'COF')
                ->setCellValue('D4', 'ART')
                ->setCellValue('E4', 'AHT')
                ->setCellValue('F4', 'AST')
                ->setCellValue('G4', 'SCR')
                ;

                $spreadsheet->getActiveSheet()->mergeCells('A1:E1');
                $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
                $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('A4:G4')->applyFromArray($this->ss_formatter('header'));

                $i=5; 
                foreach($data as $datas) {

                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $i-4)
                    ->setCellValue('B'.$i, $datas->TANGGAL)
                    ->setCellValue('c'.$i, strval(number_format($datas->OFFERED,0,',','.')))
                    ->setCellValue('D'.$i, $datas->ART)
                    ->setCellValue('E'.$i, $datas->AHT)
                    ->setCellValue('F'.$i, $datas->AST)
                    ->setCellValue('G'.$i, round($datas->SCR,2).'%')
                    ;
                    $i++;
                }
                $x = $i-1;
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

                    $spreadsheet->getActiveSheet()->getStyle('A5:G'.$x)->applyFromArray($this->ss_formatter('body'));
                    $spreadsheet->getActiveSheet()->setAutoFilter('A4:G'.$x);

                    $spreadsheet->getActiveSheet()->setTitle('SUMM DATE -  '.date('d-m-Y H'));
                    $spreadsheet->setActiveSheetIndex(0);

                #region : trial
                    $spreadsheet->createSheet();

                    $spreadsheet->setActiveSheetIndex(1)
                    ->setCellValue('A1','Summary Operation Performance by skill - '.$tid)
                    ->setCellValue('A2','Export Time ')
                    ->setCellValue('A3','Export By ')
                    ->setCellValue('B2',date('d-m-Y H:i:s'))
                    ->setCellValue('B3', $name)
                    ->setCellValue('C2','Filter Start ')
                    ->setCellValue('C3','Filter End ')
                    ->setCellValue('D2', $d_start)
                    ->setCellValue('D3', $d_end)
                    ->setCellValue('A4', 'NO')
                    ->setCellValue('B4', 'SKILL')
                    ->setCellValue('C4', 'COF')
                    ->setCellValue('D4', 'ART')
                    ->setCellValue('E4', 'AHT')
                    ->setCellValue('F4', 'AST')
                    ->setCellValue('G4', 'SCR')
                    ;

                    $spreadsheet->getActiveSheet()->mergeCells('A1:E1');
                    $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
                    $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
                    $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
                    $spreadsheet->getActiveSheet()->getStyle('A4:G4')->applyFromArray($this->ss_formatter('header'));

                    $i=5; 
                    foreach($data2 as $datas) {

                        $spreadsheet->setActiveSheetIndex(1)
                        ->setCellValue('A'.$i, $i-4)
                        ->setCellValue('B'.$i, $datas->SKILLNAME)
                        ->setCellValue('c'.$i, strval(number_format($datas->OFFERED,0,',','.')))
                        ->setCellValue('D'.$i, $datas->ART)
                        ->setCellValue('E'.$i, $datas->AHT)
                        ->setCellValue('F'.$i, $datas->AST)
                        ->setCellValue('G'.$i, round($datas->SCR,2).'%')
                        ;
                        $i++;
                    }
                    $x = $i-1;
                        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

                        $spreadsheet->getActiveSheet()->getStyle('A5:G'.$x)->applyFromArray($this->ss_formatter('body'));
                        $spreadsheet->getActiveSheet()->setAutoFilter('A4:G'.$x);

                        $spreadsheet->getActiveSheet()->setTitle('SUMM SKILL - '.date('d-m-Y H'));
                        $spreadsheet->setActiveSheetIndex(0);


                #endregion :trial

                    $filename = $name.'OPS-'.date('d-m-Y H').'.xls';
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename='.$filename);
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                    header('Cache-Control: cache, must-revalidate'); 
                    header('Pragma: public'); 
                    // $path = FCPATH.'public/reportdata/';
                    $writer = IOFactory::createWriter($spreadsheet,'Xls');
                    // $writer->save($path.$filename);
                        $writer->save('php://output');
                    // $res = base_url().'public/reportdata/'.$filename;
                        
                    // $this->response([
                    //     'status'  => TRUE,
                    //     'message' => 'Report Stored!',
                    //     'Link'    => $res
                    //         ], REST_Controller::HTTP_OK);
            }
            // else
            // {
            //     $this->response([
            //         'status'  => FALSE,
            //         'message' => 'Report Storing Failed!',
            //         'Link'    => false
            //             ], REST_Controller::HTTP_OK);
            // }
        }

        

#endregion Raga

#region :: debi
        public function ReportingSIntervalMonth_post()
        {

            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $month = $this->security->xss_clean($this->input->post('month'));
            $chn = $this->security->xss_clean($this->input->post('channel'));

            $meth = 'data';
            //token
            $res = $this->module_model->get_datareportSIntervalMonth($tid,$chn,$month,$meth);
            // print_r($res);
            // exit;

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


        public function EXPORTSCLOSE_get()
        {

            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            $t_start = $this->security->xss_clean($this->input->get('start_date'));
            $t_end = $this->security->xss_clean($this->input->get('end_date'));
            $chn = $this->security->xss_clean($this->input->get('channel_id'));
            $chn2 = $this->security->xss_clean($this->input->get('channel_name'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportSCloseTicket($tid,$t_start,$t_end,$chn,$meth);
            $dataPerChn = $this->module_model->get_datareportSCloseTicket_PerCh($tid,$t_start,$t_end,$chn,$meth);
        

            if($data)
            {
                $spreadsheet = new Spreadsheet();

                // $chart = $this->security->xss_clean($this->input->post('chart_img'));

                // if($chart)
                // {
                //     $imageData = base64_decode($chart);
                //     $chart_img = imagecreatefromstring($imageData);
                //     $white = imagecolorallocate($chart_img, 255, 255, 255);
                //     imagecolortransparent($chart_img, $white);
                //     imagesavealpha($chart_img,true);
                //     imagealphablending($chart_img, true); 
                
                //     $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing();
                //     $drawing->setName('Chart');
                //     $drawing->setDescription('Chart');
                //     $drawing->setCoordinates('H2');
                //     $drawing->setImageResource($chart_img);
                //     $drawing->setRenderingFunction(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::RENDERING_PNG);
                //     $drawing->setMimeType(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_DEFAULT);
                // }

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
                ->setCellValue('A1','Summary Close Ticket - '.$tin)
                ->setCellValue('A2','Export Time ')
                ->setCellValue('A3','Export By ')
                ->setCellValue('B2',date('d-m-Y H:i:s'))
                ->setCellValue('B3', $name)
                ->setCellValue('C2','Filter Start ')
                ->setCellValue('C3','Filter End ')
                ->setCellValue('D2', $t_start)
                ->setCellValue('D3', $t_end)
                ->setCellValue('A4', 'NO')
                ->setCellValue('B4', 'DATE')
                ->setCellValue('C4', 'CHANNEL')
                ->setCellValue('D4', 'STATUS')
                ->setCellValue('E4', 'TICKETS')
                ;

                $spreadsheet->getActiveSheet()->mergeCells('A1:E1');
                $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
                $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('A4:E4')->applyFromArray($this->ss_formatter('header'));

                $i=5; foreach($data as $datas) {

                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $i-4)
                    ->setCellValue('B'.$i, $datas->TANGGAL)
                    ->setCellValue('C'.$i, $datas->CHANNEL_NAME)
                    ->setCellValue('D'.$i, $datas->STATUS)
                    ->setCellValue('E'.$i, strval(number_format($datas->T_CLOSE,0,',','.')))
                    ;
                    $i++;
                }
                //for table per channel
                $j=$i+3; 
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$j, 'NO')
                ->setCellValue('B'.$j, 'CHANNEL')
                ->setCellValue('C'.$j, 'JUMLAH')
                ;
                $spreadsheet->getActiveSheet()->getStyle('A'.$j.':C'.$j.'')->applyFromArray($this->ss_formatter('header'));
                $h=$j+1;
                $numering = 1;
                foreach($dataPerChn as $dataschn){
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$h, $numering)
                    ->setCellValue('B'.$h, $dataschn->CHANNEL_NAME)
                    ->setCellValue('C'.$h, strval(number_format($dataschn->T_CLOSE,0,',','.')))
                    ;
                    $h++;
                    $numering++;
                }
                    $x = $i-1;
                    $y= $h-1;
                    $yy = $h-2;
                    $indek = 'A'.$y.':'.'C'.$y;
                    $indekfilter = 'A'.$yy.':'.'C'.$yy;
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

                    $spreadsheet->getActiveSheet()->getStyle('A5:E'.$x)->applyFromArray($this->ss_formatter('body'));
                    $spreadsheet->getActiveSheet()->setAutoFilter('A4:E'.$x);

                    $spreadsheet->getActiveSheet()->getStyle(''.$indek.'')->applyFromArray($this->ss_formatter('body'));
                    // $spreadsheet->getActiveSheet()->setAutoFilter(''.$indekfilter.'');
                    
                    // if($chart)
                    // {
                    //     $drawing->setWorksheet($spreadsheet->getActiveSheet());
                    // }
                    

                    $spreadsheet->getActiveSheet()->setTitle('ST Close -  '.date('d-m-Y H'));
                    $spreadsheet->setActiveSheetIndex(0);
                    $filename = $name.'Summary Ticket Close '.date('d-m-Y H').'.xls';
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename='.$filename);
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                    header('Cache-Control: cache, must-revalidate'); 
                    header('Pragma: public'); 
                    // $path = FCPATH.'public/reportdata/';
                    $writer = IOFactory::createWriter($spreadsheet,'Xls');
                    // $writer->save($path.$filename);
                        $writer->save('php://output');
                    // $res = base_url().'public/reportdata/'.$filename;
                        
                    // $this->response([
                    //     'status'  => TRUE,
                    //     'message' => 'Report Stored!',
                    //     'Link'    => $res
                    //         ], REST_Controller::HTTP_OK);
            }
            // else
            // {
            //     $this->response([
            //         'status'  => FALSE,
            //         'message' => 'Report Storing Failed!',
            //         'Link'    => false
            //             ], REST_Controller::HTTP_OK);
            // }
        }

        public function EXPORTSIMONTH_get()
        {
            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            $month = $this->security->xss_clean($this->input->get('month'));
            $chn2 = $this->security->xss_clean($this->input->get('channel_name'));
            $monthName = $this->security->xss_clean($this->input->get('month_name'));
            $meth = 'excel';
            $chn = $this->security->xss_clean($this->input->get('channel'));
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->datareportSIntervalMonth($tid,$chn,$month,$meth);
            // print_r($data);
            // print_r($data[0]->TANGGAL);
            // exit;
            
            if($data[0])
            {
                $spreadsheet = new Spreadsheet();

                $spreadsheet->getProperties()->setCreator('INFOMEDIA')
                ->setLastModifiedBy('INFOMEDIA')
                ->setTitle('Office 2007 XLSX Document')
                ->setSubject('Office 2007 XLSX Document')
                ->setDescription('document for Office 2007 XLSX, generated using PHP classes.')
                ->setKeywords('office 2007 openxml php')
                ->setCategory('result file');

                if (!$tid){
                    $tid = 'oct_telkomcare';
                }

                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1','Summary Interval - '.$tin)
                ->setCellValue('A2','Export Time ')
                ->setCellValue('A3','Export By ')
                ->setCellValue('B2',date('d-m-Y H:i:s'))
                ->setCellValue('B3', $name)
                ->setCellValue('C2','Filter Month ')
                ->setCellValue('C3','Filter Channel ')
                ->setCellValue('D2', $monthName)
                ->setCellValue('D3', $chn2)
                ->setCellValue('A4', 'No.')
                ->setCellValue('B4', 'Date')
                ->setCellValue('C4', 'ART')
                ->setCellValue('D4', 'AHT')
                ->setCellValue('E4', 'AST')
                ->setCellValue('F4', 'Message In')
                ->setCellValue('G4', 'Message Out')
                ->setCellValue('H4', 'Total Session (COF)')
                ;

                #region - 2nd part sub image to spreadsheet
                    //$drawing->setWorksheet($spreadsheet->getActiveSheet());
                #endregion           

                $spreadsheet->getActiveSheet()->mergeCells('A1:G1');
                $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
                $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('A4:H4')->applyFromArray($this->ss_formatter('header'));


                $i=5;
                $j=0;
                foreach($data as $datas) {
                    // print_r($datas[0]);
                    // exit;
                    // if ($j < 9) {
                    //     $tgl = substr($datas->TANGGAL, 9);
                    // }else{
                    //     $tgl = substr($datas->TANGGAL, 8);
                    // }
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $i-4)
                    ->setCellValue('B'.$i, $datas->TANGGAL)
                    ->setCellValue('C'.$i, $datas->ART)
                    ->setCellValue('D'.$i, $datas->AHT)
                    ->setCellValue('E'.$i, $datas->AST)
                    ->setCellValue('F'.$i, $datas->MESSAGE_IN)
                    ->setCellValue('G'.$i, $datas->MESSAGE_OUT)
                    ->setCellValue('H'.$i, round($datas->SCR,2).'%')
                    ;
                    $j++;
                    $i++;
                }
                $x = $i-1;
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                    $spreadsheet->getActiveSheet()->getStyle('A5:H'.$x)->applyFromArray($this->ss_formatter('body'));

                    $spreadsheet->getActiveSheet()->setAutoFilter('A4:H'.$x);

                    $spreadsheet->getActiveSheet()->setTitle('S Inval Month-  '.date('d-m-Y H'));
                    $spreadsheet->setActiveSheetIndex(0);
                    $filename = $name.' Summary Inval Month Report '.date('d-m-Y H').'.xls';
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename='.$filename);
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                    header('Cache-Control: cache, must-revalidate'); 
                    header('Pragma: public'); 
                    // $path = FCPATH.'public/reportdata/';
                    $writer = IOFactory::createWriter($spreadsheet,'Xls');
                    // $writer->save($path.$filename);
                    $writer->save('php://output');
                    // $res = base_url().'public/reportdata/'.$filename;
                    
                    // $this->response([
                    //     'status'  => TRUE,
                    //     'message' => 'Report Stored!',
                    //     'Link'    => $res
                    //         ], REST_Controller::HTTP_OK);
                    
            }
            // else
            // {
            //     $this->response([
            //         'status'  => FALSE,
            //         'message' => 'Report Storing Failed!',
            //         'Link'    => false
            //             ], REST_Controller::HTTP_OK);
            // }

            
        }

        public function EXPORTAL_get()
        {
            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            $d_start = $this->security->xss_clean($this->input->get('start_date'));
            $d_end = $this->security->xss_clean($this->input->get('end_date'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportAL($tid,$d_start,$d_end,$meth);
            // print_r($data);
            // exit;
            if($data)
            {
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
                ->setCellValue('A1','Agent Log - '.$tin)
                ->setCellValue('A2','Export Time ')
                ->setCellValue('A3','Export By ')
                ->setCellValue('B2',date('d-m-Y H:i:s'))
                ->setCellValue('B3', $name)
                ->setCellValue('C2','Start Date')
                ->setCellValue('C3','End Date ')
                ->setCellValue('D2', $d_start)
                ->setCellValue('D3', $d_end)
                ->setCellValue('A4', 'NO')
                ->setCellValue('B4', 'DATE')
                ->setCellValue('C4', 'AGENT ID')
                ->setCellValue('D4', 'AGENT NAME')
                ->setCellValue('E4', 'LOGIN TIME')
                ->setCellValue('F4', 'LOGOUT TIME')
                ->setCellValue('G4', 'STAFFED TIME')
                ->setCellValue('H4', 'AUX')
                ->setCellValue('H5', 'ISTIRAHAT')
                ->setCellValue('I5', 'IBADAH')
                ->setCellValue('J5', 'BRIEFING')
                ->setCellValue('K5', 'LAI-LAIN')
                ->setCellValue('L5', 'TOTAL')
                ;

                $spreadsheet->getActiveSheet()->mergeCells('A1:L1');
                $spreadsheet->getActiveSheet()->mergeCells('A4:A5');
                $spreadsheet->getActiveSheet()->mergeCells('B4:B5');
                $spreadsheet->getActiveSheet()->mergeCells('C4:C5');
                $spreadsheet->getActiveSheet()->mergeCells('D4:D5');
                $spreadsheet->getActiveSheet()->mergeCells('E4:E5');
                $spreadsheet->getActiveSheet()->mergeCells('F4:F5');
                $spreadsheet->getActiveSheet()->mergeCells('G4:G5');
                $spreadsheet->getActiveSheet()->mergeCells('H4:L4');
                $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
                $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('A4:L4')->applyFromArray($this->ss_formatter('header'));
                $spreadsheet->getActiveSheet()->getStyle('A5:L5')->applyFromArray($this->ss_formatter('header'));

                $asw = 0;
                $i=6; 
                foreach($data as $datas) {

                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $i-5)
                    ->setCellValue('B'.$i, $datas->TANGGAL)
                    ->setCellValue('C'.$i, $datas->AGENTID)
                    ->setCellValue('D'.$i, $datas->AGENTNAME)
                    ->setCellValue('E'.$i, $datas->LOGIN)
                    ->setCellValue('F'.$i, $datas->LOGOUT)
                    ->setCellValue('G'.$i, $datas->STAFFTIME)
                    ->setCellValue('H'.$i, $datas->AISTIRAHAT)
                    ->setCellValue('I'.$i, $datas->AIBADAH)
                    ->setCellValue('J'.$i, $datas->ABRIEFING)
                    ->setCellValue('K'.$i, $datas->ALAINLAIN)
                    ->setCellValue('L'.$i, $datas->ATOTAL)
                    ;
                    $i++;
                }
                $x = $i-1;
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
                    

                    $spreadsheet->getActiveSheet()->getStyle('A6:L'.$x)->applyFromArray($this->ss_formatter('body'));

                    $spreadsheet->getActiveSheet()->setAutoFilter('A5:L'.$x);

                    $spreadsheet->getActiveSheet()->setTitle('Agent Log -  '.date('d-m-Y H'));
                    $spreadsheet->setActiveSheetIndex(0);
                    $filename = $name.'Agent Log'.date('d-m-Y H').'.xls';
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename='.$filename);
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                    header('Cache-Control: cache, must-revalidate'); 
                    header('Pragma: public'); 
                 

                    // $path = FCPATH.'public/reportdata/';
                    $writer = IOFactory::createWriter($spreadsheet,'Xls');
                    // $writer->save($path.$filename);
                    $writer->save('php://output');
                    // $res = base_url().'public/reportdata/'.$filename;

                
                    // $this->response([
                    //     'status'  => TRUE,
                    //     'message' => 'Report Stored!',
                    //     'Link'    => $res
                    //         ], REST_Controller::HTTP_OK);
                }
            // else {
            //         $this->response([
            //             'status'  => FALSE,
            //             'message' => 'Report Storing Failed!',
            //             'Link'    => false
            //                 ], REST_Controller::HTTP_OK);
            // }
            
        }
#endregion debi

#region :: risyad
        public function EXPORTSI_get()
        {
            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $tin = $this->security->xss_clean($this->input->get('tenant_name'));
            $date = $this->security->xss_clean($this->input->get('tanggal'));
            $interval = $this->security->xss_clean($this->input->get('interval'));
            $chn2 = $this->security->xss_clean($this->input->get('channel_name'));
            $meth = 'excel';
            $chn = $this->security->xss_clean($this->input->get('channel'));
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportSInterval($tid,$chn,$interval,$date,$meth);
            // print_r($data);
            // print_r($data[0][0]->TANGGAL);
            // exit;
            
            if($data[0][0])
            {
                $spreadsheet = new Spreadsheet();

                $spreadsheet->getProperties()->setCreator('INFOMEDIA')
                ->setLastModifiedBy('INFOMEDIA')
                ->setTitle('Office 2007 XLSX Document')
                ->setSubject('Office 2007 XLSX Document')
                ->setDescription('document for Office 2007 XLSX, generated using PHP classes.')
                ->setKeywords('office 2007 openxml php')
                ->setCategory('result file');

                if (!$tid){
                    $tid = 'oct_telkomcare';
                }

                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1','Summary Interval - '.$tin)
                ->setCellValue('A2','Export Time ')
                ->setCellValue('A3','Export By ')
                ->setCellValue('B2',date('d-m-Y H:i:s'))
                ->setCellValue('B3', $name)
                ->setCellValue('C2','Filter Date ')
                ->setCellValue('C3','Filter Channel ')
                ->setCellValue('D2', $date)
                ->setCellValue('D3', $chn2)
                ->setCellValue('A4', 'No.')
                ->setCellValue('B4', 'Date')
                ->setCellValue('C4', 'Interval')
                ->setCellValue('D4', 'ART')
                ->setCellValue('E4', 'AHT')
                ->setCellValue('F4', 'AST')
                ->setCellValue('G4', 'Message In')
                ->setCellValue('H4', 'Message Out')
                ->setCellValue('I4', 'Total Session (COF)')
                ;

                #region - 2nd part sub image to spreadsheet
                    //$drawing->setWorksheet($spreadsheet->getActiveSheet());
                #endregion           

                $spreadsheet->getActiveSheet()->mergeCells('A1:G1');
                $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($this->ss_formatter('title'));
                $spreadsheet->getActiveSheet()->getStyle('A2:A3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('C2:C3')->applyFromArray($this->ss_formatter('subtitle'));
                $spreadsheet->getActiveSheet()->getStyle('A4:I4')->applyFromArray($this->ss_formatter('header'));


                $i=5;
                $j=0;
                foreach($data as $datas) {
                    // print_r($datas[0]);
                    // exit;
                    $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $i-4)
                    ->setCellValue('B'.$i, $datas[0]->TANGGAL)
                    ->setCellValue('C'.$i, $datas[0]->INTERVAL_TIME_START.'-'.$datas[0]->INTERVAL_TIME_END)
                    ->setCellValue('D'.$i, $datas[0]->ART)
                    ->setCellValue('E'.$i, $datas[0]->AHT)
                    ->setCellValue('F'.$i, $datas[0]->AST)
                    ->setCellValue('G'.$i, $datas[0]->MESSAGE_IN)
                    ->setCellValue('H'.$i, $datas[0]->MESSAGE_OUT)
                    ->setCellValue('I'.$i, round($datas[0]->SCR,2).'%')
                    ;
                    $j++;
                    $i++;
                }
                $x = $i-1;
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

                    $spreadsheet->getActiveSheet()->getStyle('A5:I'.$x)->applyFromArray($this->ss_formatter('body'));

                    $spreadsheet->getActiveSheet()->setAutoFilter('A4:I'.$x);

                    $spreadsheet->getActiveSheet()->setTitle('S Interval -  '.date('d-m-Y H'));
                    $spreadsheet->setActiveSheetIndex(0);
                    $filename = $name.' Summary Interval Report '.date('d-m-Y H').'.xls';
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename='.$filename);
                    header('Cache-Control: max-age=0');
                    header('Cache-Control: max-age=1');
                    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                    header('Cache-Control: cache, must-revalidate'); 
                    header('Pragma: public'); 
                    // $path = FCPATH.'public/reportdata/';
                    $writer = IOFactory::createWriter($spreadsheet,'Xls');
                    // $writer->save($path.$filename);
                    $writer->save('php://output');
                    // $res = base_url().'public/reportdata/'.$filename;
                    
                    // $this->response([
                    //     'status'  => TRUE,
                    //     'message' => 'Report Stored!',
                    //     'Link'    => $res
                    //         ], REST_Controller::HTTP_OK);
                    
            }
            // else
            // {
            //     $this->response([
            //         'status'  => FALSE,
            //         'message' => 'Report Storing Failed!',
            //         'Link'    => false
            //             ], REST_Controller::HTTP_OK);
            // }

            
        }
#endregion risyad
    }
?>