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

		// $this->load->view('temp/header');
		// $this->load->view('temp/navbar');
		// $this->load->view('temp/sidebar');
        // $this->load->view('temp/body');
    //    $this->load->view('temp/footer');
		$this->load->view('login_temp/header');
		$this->load->view('v_login');
		$this->load->view('login_temp/footer');
	}

	public function home()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
        $this->load->view('temp/body');
	}

	public function summary_traffic(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_summary_traffic');
	}

	public function login(){
		$this->load->view('login_temp/header');
		$this->load->view('v_login');
		$this->load->view('login_temp/footer');
	}

	public function forgot(){
		$this->load->view('login_temp/header');
		$this->load->view('v_forgot');
		$this->load->view('login_temp/footer');
	}
	
	public function this_day(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_today');
	}

	public function this_week(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_this_week');
	}
	
	public function this_month(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_this_month');
	}
	
	public function this_year(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_this_year');
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

		public function traffic_performance(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_traffic_performance');
	}

	public function summary_agent(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_summary_agent');
	}

	public function performance_channel(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_performance_bychannel');
	}

	// Wallboard 
	public function wallboard(){
		$this->load->view('temp/header');
		$this->load->view('v_wallboard');
		$this->load->view('temp/wall_footer');
	}

	public function wallboard_2(){
		$this->load->view('temp/header');
		$this->load->view('v_wallboard_v2');
		$this->load->view('temp/wall_footer');
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

	public function monitoring_ticket_time(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_monitoring_time');
	}

	public function monitoring_ticket_time_w(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_monitoring_time_week');
	}

	public function monitoring_ticket_time_m(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_monitoring_time_month');
	}

	public function monitoring_ticket_time_y(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_monitoring_time_year');
	}

	public function summary_inout_sla(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_summary_inout_sla');
	}

	public function wall_summary_traffic(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_wall_summary_traffic');
	}

	public function wall_sumTraffic_day(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_wall_sumTraffic_day');
	}

	public function wall_sumTraffic_week(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_wall_sumTraffic_week');
	}

	public function wall_sumTraffic_month(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_wall_sumTraffic_month');
	}

	public function wall_status_nonClose(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_wall_status_nonClose');
	}

	public function wall_ticket_Close(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_wall_ticket_Close');
	}

	public function wall_performance_operation(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_wall_performance_operation');
	}

	public function wall_summary_performance(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_wall_summary_performance');
	}
	// report

	public function report_summary_ticket(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_sum_ticket');
	}

	public function report_summary_channel(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_sum_channel');
	}

	public function report_summary_interval(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_summary_interval');
	}

	public function report_agent_log(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_agent_log');
	}

	public function report_agent_performance(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_agent_performance');
	}

	public function report_agent_summary(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_agent_summary');
	}

	public function report_operation_performance(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_operation_performance');
	}

	public function report_performance_agent(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_performance_agent');
	}
	public function report_detail_cwc(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_detail_cwc');
	}
	
	public function report_summary_traffic(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_summary_traffic');
	}

	public function report_summary_interval_month(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_summary_interval_month');
	}

	public function report_summary_close_ticket(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_close_ticket');
	}
	
	public function report_detail_ticket(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_detail_ticket');
	}

	public function report_close_v2(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_close_ticket_v2');
	}

	public function report_summary_kip(){
		$this->load->view('temp/header');
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('v_report_summary_kip');
	}

}
