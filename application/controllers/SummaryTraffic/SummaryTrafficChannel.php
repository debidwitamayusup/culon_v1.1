<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryTrafficChannel extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('stc/Summary_Call');
		$this->load->view('footer');
	}	

	public function tc_menu()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('stc/Traffic_Channel');
		$this->load->view('footer');
	}

	public function avr_time_menu()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('stc/Average_Time');
		$this->load->view('footer');
	}

	public function case_menu()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('stc/Case_In_Out');
		$this->load->view('footer');
	}

	public function stc_today()
	{
		//proses
		$date = $this->get('row_date');
		$rowdate = $this->Stc_Model->getRowdate('$date');
		//response true
		$response = array(
			'status' => true,
			'data' => $rowdate);
	}

	public function stc_month()
	{

	}

	public function stc_year()
	{

	}

	// public function stc_interval()
	// {

	// }

	// public function stc_art()
	// {

	// }

	// public function stc_aht()
	// {

	// }

	// public function stc_ast()
	// {

	// }

	// public function case_in_interval()
	// {

	// }

	// public function case_out_interval()
	// {

	// }
}
