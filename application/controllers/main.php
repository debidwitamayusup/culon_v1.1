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
		$this->load->view('temp/footer');
	}

	public function agent_interval(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');	
	}

	public function left_menu()
	{
		$this->load->view('left_menu');
		$this->load->view('footer');
		
		
	}
	

	
}
