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
                        'argb' => 'FFFFFF',
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
                        'argb' => '777777',
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

            $d_start = $this->security->xss_clean($this->input->post('start_date'));
            $d_end = $this->security->xss_clean($this->input->post('end_date'));
            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $channel = $this->security->xss_clean($this->input->post('channel'));
            $meth = 'data';
            //token
            $res = $this->module_model->get_datareportSCloseTicket($tid,$d_start,$d_end,$channel,$meth);
            
            if ($res) {
                $this->response([
                    'status'  => TRUE,
                    'message' => 'Data available!',
                    'data'    => $res,

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

            $d_start = $this->security->xss_clean($this->input->post('start_date'));
            $d_end = $this->security->xss_clean($this->input->post('end_date'));
            $tid = $this->security->xss_clean($this->input->post('tenant_id'));
            $channel = $this->security->xss_clean($this->input->post('channel'));
            $meth = 'data';
            //token
            $res = $this->module_model->get_datareportSCloseTicket_PerCh($tid,$d_start,$d_end,$channel,$meth);
            if ($res) {
                $this->response([
                    'status'  => TRUE,
                    'message' => 'Data available!',
                    'data'    => $res,
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
            $t_start = $this->security->xss_clean($this->input->get('start_time'));
            $t_end = $this->security->xss_clean($this->input->get('end_time'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            #region - 1st part sub image to spreadsheet
                // $chart = $this->security->xss_clean($this->input->post('chart_img'));
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

            $data = $this->module_model->get_datareportSC($tid,$t_start,$t_end,$meth);
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
            ->setCellValue('B2',date('d-m-Y H:i:s'))
            ->setCellValue('B3', $name)
            ->setCellValue('C2','Filter Start ')
            ->setCellValue('C3','Filter END ')
            ->setCellValue('D2', $t_start)
            ->setCellValue('D3', $t_end)
            ->setCellValue('A4', 'NO')
            ->setCellValue('B4', 'CHANNEL_NAME')
            ->setCellValue('C4', 'MESSAGE IN')
            ->setCellValue('D4', 'MESSAGE OUT')
            ->setCellValue('E4', 'UNIQUE CUSTOMER')
            ->setCellValue('F4', 'TOTAL SESSION')
            ;

            #region - 2nd part sub image to spreadsheet
                //$drawing->setWorksheet($spreadsheet->getActiveSheet());
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
                ->setCellValue('D'.$i, strval(number_format($datas->TOTAL_SESSION,0,',','.')))
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
                $filename = $name.'"Summary Channel Report "'.date('d-m-Y H').'".xlsx"';
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename='.$filename);
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
                header('Cache-Control: cache, must-revalidate'); 
                header('Pragma: public'); 
                $path = APPPATH.'public/reportdata';
                $writer = IOFactory::createWriter($spreadsheet,'Xlsx');
                // $writer->save($path.$filename);
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

        public function EXPORTSPA_get()
        {

            $tid = $this->security->xss_clean($this->input->get('tenant_id'));
            $t_start = $this->security->xss_clean($this->input->get('start_time'));
            $t_end = $this->security->xss_clean($this->input->get('end_time'));
            $meth = 'excel';
            $name = $this->security->xss_clean($this->input->get('name'));

            $data = $this->module_model->get_datareportSPA($tid,$t_start,$t_end,$meth);
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
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="SP Agent Report "'.date('d-m-Y H').'".xlsx"');
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

#endregion Raga
    }
?>