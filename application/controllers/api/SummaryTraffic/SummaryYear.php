<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryYear extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}

	public function gInterval()
	{
		$year = $this->input->post('year');
		$channel_name = $this->input->post('channel_name');
		$data = array();
		$total_traffic = array();
		$traffic = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
		$date = array();

		$interval = $this->Stc_Model->getIntervalYear($year,$channel_name)->result();

		if($interval)
		{
			foreach ($interval as $key) {
				array_push($total_traffic,$key->total_traffic);
				array_push($date,$key->date);
			}

			for ($i=0; $i < sizeof($total_traffic); $i++)
			{
				for ($x=0; $x < sizeof($date); $x++)
				{
					if($i == $date[$x]-1)
					{
						$traffic[$i] = (int)$total_traffic[$x];
					}
				}
			}

			$data = ([
				'channel_name' => $channel_name,
				'date' => $date,
				'total_traffic' => $total_traffic
			]);

			$response = array(
				'status' => 200,
				'message' => "Success",
				'data' => $data);
		} else {
			$response = array(
				'status' => 200,
				'message' => "Data Not Found",
				'data' => $data);
		}
		echo json_encode($response);
	}

	public function gIntervalAll()
	{
		$data = array();
		$channel_name = array();
		$year = array();

		$intervalAll = $this->Stc_Model->getIntervalYearAll()->result();

		if ($intervalAll) 
		{
			
		}
	}
}
