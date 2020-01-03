<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

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
	public function index()
	{

		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
        $this->load->view('temp/body');
    //    $this->load->view('temp/footer');
	}
	public function login(){
		$this->load->view('login_temp/header');
		$this->load->view('v_login');
		$this->load->view('login_temp/footer');
	}
	
	public function this_day(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('today');
	}
	
	public function this_month(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('this_month');
	}
	
	public function this_year(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('this_year');
	}
	
	public function average(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_average');
		// $this->load->view('temp/footer');		
	}

	public function kip(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_kip');
	}

	public function traffic_category(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_traffic_category');
	}

	public function nfcr(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_nfcr');
	}
	
	public function agent_performance(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_agent_performance');
	}

	public function average_duration(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_average_duration');
	}
	
	public function agent_interval(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');	
		$this->load->view('v_agent_interval');
	}

	public function summary_ticket(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');	
		$this->load->view('v_summary_ticket');
	}

	public function summary_ticket_category()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_summary_ticket_category');
	}

	public function monitoring_status(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_monitoring_status');
	}

	public function summary_ticket_time(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_summary_ticket_time');
	}
}
