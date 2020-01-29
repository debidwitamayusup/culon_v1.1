<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryToday extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Stc_Model');
	}

    public function getIntervalTrafficToday(){
        $date = $this->security->xss_clean($this->input->post('date', true));
        if(!$date){
            $date = date("Y-m-d");
        }
        $arr_channel = $this->security->xss_clean($this->input->post('arr_channel', true));
        if(!$arr_channel){
            $response = array(
                'status' => false,
                'data' => 'data channel not found'
            );
            echo json_encode($response);
            return;
        }

        $arr_time = array();
        for($i=0;$i<24;$i++){
            $time = '';
            if($i<10){
                $time =  '0'.$i.':00:00';
            }else{
                $time = $i.':00:00';
            }
            array_push($arr_time, $time);
        }
        $data_series = array();
        foreach($arr_channel as $channel){
            $arr_data = array();
            $query = $this->Stc_Model->get_traffic_interval_today($date, $channel);
            $index = 0;
            for($i = 0; $i<sizeof($query);$i++){
                $status = 0;
                while($index < sizeof($arr_time) && $status == 0){
                    if(date('H:i:s', strtotime($arr_time[$index])) == date('H:i:s', strtotime($query[$i]->time)) && $channel == $query[$i]->channel_name && $i < sizeof($query)){
                        array_push($arr_data, $query[$i]->total);
                        $status = 1;
                    }else{
                        array_push($arr_data, 0);
                    }
                    $index++;
                }
            }
            if($index < 24){
                while($index < 24){
                    array_push($arr_data, 0);
                    $index++;
                }
            }
            $arr_series = [
                'label' => $channel,
                'data' => $arr_data
            ];
            array_push($data_series, $arr_series);
        }
        

        $data = [
            "label_time" => $arr_time,
            "series" => $data_series
        ];
        if($data){
            $response = array(
                'status' => true,
                'data' => $data
            );
        }else{
            $response = array(
                'status' => false,
                'data' => 'data not found'
            );
        }

        echo json_encode($response);
    }

    public function getIntervalTrafficToday2(){

        $date =   $this->security->xss_clean($this->input->post('date', true));
        $channel = $this->security->xss_clean($this->input->post('arr_channel', true));


        $model = $this->Stc_Model->get_traffic_interval_today2($date, $channel);
        

        echo json_encode($model);
      
    }

    public function getIntervalTrafficWeekly(){

        $week_id =   $this->security->xss_clean($this->input->post('week', true));
        $channel = $this->security->xss_clean($this->input->post('arr_channel', true));


        $result = $this->Stc_Model->get_traffic_interval_weekly($week_id, $channel);
        

        echo json_encode($result);
      
    }

    public function getIntervalTrafficWeeklyBar(){

        $week_id =   $this->security->xss_clean($this->input->post('week', true));
        $channel = $this->security->xss_clean($this->input->post('arr_channel', true));


        $data = $this->Stc_Model->get_traffic_interval_weeklyBar($week_id, $channel);
        
        if($data)
        {
            $result = array(
                'status' => true,
                'data' => $data
            );
            echo json_encode($result);  
        }
        else
        {
            $result = array(
                'status' => true,
                'data' => "no data"
            );
            echo json_encode($result);  
        }
       
      
    }

    public function getIntervalTrafficWeeklyBarAvg(){

        $week_id =   $this->security->xss_clean($this->input->post('week', true));
        $channel = $this->security->xss_clean($this->input->post('arr_channel', true));


        $result = $this->Stc_Model->get_traffic_interval_weeklyAvg($week_id, $channel);
        

        echo json_encode($result);
      
    }

    public function getAverageInterval(){
        $date = $this->security->xss_clean($this->input->post('date', true));
        if(!$date){
            $date = date("Y-m-d");
        }
        $params= "day";
        $index = $date;
        $query = $this->Stc_Model->getAverageIntervalToday($params, $index);
        
        if($query){
            $response = array(
                'status' => true,
                'data' => $query
            );
        }else{
            $response = array(
                'status' => false,
                'data' => ''
            );
        }

        echo json_encode($response);
    }

    public function getPercentageTrafficToday(){
        $date = $this->security->xss_clean($this->input->post('date', true));
        if(!$date){
            $date = date("Y-m-d");
        }

        $arr_channel = $this->Stc_Model->get_all_channel();
        $arr_data = array();

        $query = $this->Stc_Model->getPercentageIntervalToday($date);
        $i = 0;
        if($query){
            while($i < sizeof($arr_channel)){
                $index = 0;
                $status = 0;
                while($index<sizeof($query) && $status == 0){
                    $obj = array();
                    if($arr_channel[$i]->channel_name == $query[$index]->channel_name){
                        $obj = [
                            "channel_name" => $arr_channel[$i]->channel_name,
                            "rate" => $query[$index]->rate
                        ];
                        $status = 1;
                    }else{
                        $obj = [
                            "channel_name" => $arr_channel[$i]->channel_name,
                            "rate" => 0
                        ];
                    }
                    $index++;
                }
                array_push($arr_data, $obj);
                $i++;
            }
            
            $response = array(
                'status' => true,
                'data' => $arr_data, 
            );
        }else{
            $response = array(
                'status' => false,
                'data' => ''
            );
        }

        echo json_encode($response);
    }

    //temporary, for wallboard day
    public function getPercentageTrafficTodayWallDay(){
        $date = $this->security->xss_clean($this->input->post('date', true));
        // $tid = $this->security->xss_clean($this->input->post('tenant_id'));
        if(!$date){
            $date = date("Y-m-d");
        }

        $arr_channel = $this->Stc_Model->get_all_channel();
        $arr_data = array();

        $query = $this->Stc_Model->getPercentageIntervalTodayWallDay($date);
        $i = 0;
        if($query){
            while($i < sizeof($arr_channel)){
                $index = 0;
                $status = 0;
                while($index<sizeof($query) && $status == 0){
                    $obj = array();
                    if($arr_channel[$i]->channel_name == $query[$index]->channel_name){
                        $obj = [
                            "channel_name" => $arr_channel[$i]->channel_name,
                            "rate" => $query[$index]->rate
                        ];
                        $status = 1;
                    }else{
                        $obj = [
                            "channel_name" => $arr_channel[$i]->channel_name,
                            "rate" => 0
                        ];
                    }
                    $index++;
                }
                array_push($arr_data, $obj);
                $i++;
            }
            
            $response = array(
                'status' => true,
                'data' => $arr_data, 
            );
        }else{
            $response = array(
                'status' => false,
                'data' => ''
            );
        }

        echo json_encode($response);
    }
}
