<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH.'libraries/REST_Controller.php';

class SummaryTicketUnit extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('SummaryTicketModel','module_model');
    }

    public function getSummaryTicket(){
    	$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
		$index = $this->security->xss_clean($this->input->post('index', true));	// value params
		$params_year = $this->security->xss_clean($this->input->post('year', true));	// value params

    	$data = $this->module_model->getSummTicket($params, $index, $params_year);

    	if ($data) {
            $response = array(
				'status' => true,
				'data' => $data
			);
        }
        else {
            $response = array(
				'status' => false,
                'data' => array(),
                'message' => 'Unable to fetch Data');
        }

        echo json_encode($response);
    }

    public function getSummaryUnit(){
    	$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
		$index = $this->security->xss_clean($this->input->post('index', true));	// value params
		$params_year = $this->security->xss_clean($this->input->post('year', true));	// value params

    	$data = $this->module_model->getSummUnit($params, $index, $params_year);

    	if ($data) {
            $response = array(
				'status' => true,
				'data' => $data
			);
        }
        else {
            $response = array(
				'status' => false,
                'data' => array(),
                'message' => 'Unable to fetch Data');
        }

        echo json_encode($response);
    }

    public function getSummaryStatusperUnit(){

    	$draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));

    	$params = $this->security->xss_clean($this->input->post('params', true)); //day month year
		$index = $this->security->xss_clean($this->input->post('index', true));	// value params
		$params_year = $this->security->xss_clean($this->input->post('year', true));	// value params
		
    	$data = $this->module_model->getSummStatusperUnit($params, $index, $params_year);
    	// $datas = [];
    	// foreach ($data->result() as $key) {
    		
    	// 	$datas [] = array(
				 //    		$key->unit,
				 //    		$key->new,
				 //    		$key->open,
				 //    		$key->onProgress,
				 //    		$key->pending,
				 //    		$key->Reopen,
				 //    		$key->reject,
				 //    		$key->Resolved,
				 //    		$key->return
				 //    	);
    	// }
    	if ($data) {
   //          $response = array(
			// 	// 'status' => true,
			// 	// 'recordsTotal' => $data->num_rows(),
   //  //             'recordsFiltered' => $data->num_rows(),
			// 	'data' => $data
			// );
			$response = $data;
        }
        else {
            $response = array(
				'status' => false,
                'data' => array(),
                'message' => 'Unable to fetch Data');
        }

        echo json_encode($response);
    }

    public function filterTable(){
        $search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
        $limit = $_POST['length']; // Ambil data limit per page
        $start = $_POST['start']; // Ambil data start
        $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
        $order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
        $sql_total = $this->module_model->count_all(); // Panggil fungsi count_all pada SiswaModel
        $sql_data = $this->module_model->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada SiswaModel
        $sql_filter = $this->module_model->count_filter($search); // Panggil fungsi count_filter pada SiswaModel
        $callback = array(
            'draw'=>$_POST['draw'], // Ini dari datatablenya
            'recordsTotal'=>$sql_total,
            'recordsFiltered'=>$sql_filter,
            'data'=>$sql_data
        );
        header('Content-Type: application/json');
        echo json_encode($callback); // Convert array $callback ke json
    }
}

?>