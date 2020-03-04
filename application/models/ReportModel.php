<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class ReportModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    #region :: Raga
    public function get_datareportSC($tid,$t_start,$t_end,$meth)
    {
        $this->db->select('b.channel_name as CHANNEL_NAME, 
        SUM(a.unik) as UNIQUE_CUSTOMER, 
        SUM(a.cof) as TOTAL_SESSION,
        SUM(a.msg_in) as MESSAGE_IN, 
        SUM(a.msg_out) as MESSAGE_OUT
        ');
        $this->db->from('rpt_summary_scr a');
        $this->db->join('m_channel b','b.channel_id = a.channel_id');

        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($t_start)
        {
            $this->db->where('a.tanggal >=',$t_start);
        }
        if($t_end)
        {
            $this->db->where('a.tanggal <=',$t_end);
        }

        $this->db->group_by('b.channel_name');
        $query = $this->db->get();

       if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->CHANNEL_NAME,
                        strval(number_format($data->UNIQUE_CUSTOMER,0,',','.')),
                        strval(number_format($data->TOTAL_SESSION,0,',','.')),
                        strval(number_format($data->MESSAGE_IN,0,',','.')),
                        strval(number_format($data->MESSAGE_OUT,0,',','.'))
                    );
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }      
        }
        return false;
    }

    public function get_skill()
    {
        $this->db->select('a.skill_name');
        $this->db->from('rpt_summary_agent a');
        $this->db->where('a.skill_name <> ""');
        $this->db->group_by('a.skill_name');
        $query = $this->db->get();

       if($query->num_rows() > 0)
        {
            foreach( $query->result() as $data)
            {
                $result[] = array(
                    'SKILL_NAME' => $data->skill_name
                );
            }
            return $result;
        }
        return false;
    }

    public function get_datareportSCloseTicket($tid,$d_start,$d_end,$channel,$meth)
    {
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
        $this->db->select('a.tanggal as TANGGAL,
        b.channel_name as CHANNEL_NAME, "CLOSE" as STATUS,
        SUM(a.sClose) as T_CLOSE
        ');
        $this->db->from('rpt_summ_ticket a');
        $this->db->join('m_channel b','b.channel_id = a.channel_id');

        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($d_start)
        {
            $this->db->where('a.tanggal >=',$d_start);
        }
        if($d_end)
        {
            $this->db->where('a.tanggal <=',$d_end);
        }
        if($channel)
        {
            $this->db->where('a.channel_id',$channel);
        }
        $this->db->group_by('a.tanggal');
        $query = $this->db->get();

       if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->TANGGAL,
                        $data->CHANNEL_NAME,
                        $data->STATUS,
                        strval(number_format($data->T_CLOSE,0,',','.'))
                    );
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }      
        }
        return false;
    }

    public function get_datareportSCloseTicket_PerCh($tid,$d_start,$d_end,$channel,$meth)
    {
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        $this->db->select('b.channel_name as CHANNEL_NAME, 
        SUM(a.sClose) as T_CLOSE
        ');
        $this->db->from('rpt_summ_ticket a');
        $this->db->join('m_channel b','b.channel_id = a.channel_id');

        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($d_start)
        {
            $this->db->where('a.tanggal >=',$d_start);
        }
        if($d_end)
        {
            $this->db->where('a.tanggal <=',$d_end);
        }
        if($channel)
        {
            $this->db->where('a.channel_id',$channel);
        }
        $this->db->group_by('b.channel_id');
        $query = $this->db->get();

       if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->CHANNEL_NAME,
                        strval(number_format($data->T_CLOSE,0,',','.'))
                    ); 
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }      
        }
        return false;
    }

    public function get_datareportSInterval($tid,$chn,$interval_v,$date,$meth)
    {
        
        if($interval_v==1 || $interval_v==3 || $interval_v ==6)
        {
            $x = 1;
            for($i=0;$i<24;$i= $i+$interval_v)
            {
                if ($meth == 'data') {      
                    $data = array(
                        $x
                    );
                    
                    $x++;
                    $datareport = $this->datareportSInterval($tid,$chn,$interval_v,$i,$i+$interval_v,$date,$meth);
                    if($datareport)
                    {
                        $result[] = array_merge($data,$datareport);
                    }
                    else{
                        $result = false;
                        break;
                    }

                }else{
                    $result[] = $this->datareportSInterval($tid,$chn,$interval_v,$i,$i+$interval_v,$date,$meth);
                }
            }
            if($result)
            {
                return $result;
            }else{
                return false;
            }
        }
        return false;
    }

    public function get_datareportSPO($tid, $chn, $mnth,$meth)
    {
        $year = date('Y');
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        $this->db->select('a.tanggal as TANGGAL, 
        SUM(a.cof) as COF,
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
        AVG(a.scr) as SCR');

        $this->db->from('rpt_summary_scr a');
        //$this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($chn)
        {
            $this->db->where('a.channel_id',$chn);
        }
        if($mnth)
        {
            $this->db->where('MONTH(a.tanggal)',$mnth);
            
        }
        $this->db->where('YEAR(a.tanggal)',$year);

        $this->db->group_by('a.tanggal');
        $query = $this->db->get();


        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->TANGGAL,
                        strval(number_format($data->COF,0,'.',',')),
                        // $data->COF,
                        $data->ART,
                        $data->AHT,
                        $data->AST,
                        round($data->SCR,2).'%'
                    );
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }  
        }

        return false;
    }

    public function get_datareportOPS($tid, $d_start, $d_end ,$meth)
    {
        $year = date('Y');
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        //QUERY - 
        // SUM(a.handling) as HANDLED,
        //(SUM(a.cof)-SUM(a.handling)) as UNHANDLED,

        $this->db->select('a.tanggal as TANGGAL, 
        SUM(a.cof) as OFFERED,
      
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
        AVG(a.scr) as SCR,
        ');

        $this->db->from('rpt_summary_agent a');
        // $this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($d_start)
        {
            $this->db->where('a.tanggal >= ',$d_start);
        }

        if($d_end)
        {
            $this->db->where('a.tanggal <=',$d_end);
            
        }
        // $this->db->where('YEAR(a.tanggal)',$year);

        $this->db->group_by('a.tanggal');
        $query = $this->db->get();

        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->TANGGAL,
                        strval(number_format($data->OFFERED,0,'.',',')),
                        '-',//strval(number_format($data->HANDLED,0,'.',',')),
                        '-',//strval(number_format($data->UNHANDLED,0,'.',',')),
                        // $data->COF,
                        $data->ART,
                        $data->AHT,
                        $data->AST,
                        round($data->SCR,2).'%'
                    );
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }  
        }
        return FALSE;
    }
    
    public function get_datareportOPS2 ($tid, $d_start, $d_end ,$meth)
    {
        $year = date('Y');
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        //QUERY - 
        // SUM(a.handling) as HANDLED,
        //(SUM(a.cof)-SUM(a.handling)) as UNHANDLED,
        $this->db->select('
        a.skill_name as SKILLNAME,
        SUM(a.cof) as OFFERED,
      
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
        AVG(a.scr) as SCR,
        ');

        $this->db->from('rpt_summary_agent a');
        // $this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($d_start)
        {
            $this->db->where('a.tanggal >= ',$d_start);
        }

        if($d_end)
        {
            $this->db->where('a.tanggal <=',$d_end);
            
        }
        // $this->db->where('YEAR(a.tanggal)',$year);

        $this->db->group_by('a.skill_name');
        $query = $this->db->get();

        // print_r($this->db->last_query());
        // exit;

        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->SKILLNAME,
                        strval(number_format($data->OFFERED,0,'.',',')),
                        '-',//strval(number_format($data->HANDLED,0,'.',',')),
                        '-',//strval(number_format($data->UNHANDLED,0,'.',',')),
                        // $data->COF,
                        $data->ART,
                        $data->AHT,
                        $data->AST,
                        round($data->SCR,2).'%'
                    );
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }  
        }

        return false;
    }

    public function get_datareportAP ($tid, $d_start, $d_end ,$skillz,$meth)
    {
        $year = date('Y');
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        //QUERY - 
        // SUM(a.handling) as HANDLED,
        //(SUM(a.cof)-SUM(a.handling)) as UNHANDLED,
        $this->db->select('a.agentid as AGENTID,
        a.agentName as AGENTNAME,
        a.skill_name as SKILLNAME,
        SUM(a.session) as OFFERED,
      
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
        AVG(a.scr) as SCR,
        ');

        $this->db->from('rpt_summary_agent a');
        
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($d_start)
        {
            $this->db->where('a.tanggal >= ',$d_start);
        }

        if($d_end)
        {
            $this->db->where('a.tanggal <=',$d_end);
            
        }
        if($skillz)
       {
        $this->db->where('a.skill_name',$skillz);
       }

        $this->db->group_by('a.agentid');
        $query = $this->db->get();

 

        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->AGENTID,
                        $data->AGENTNAME,
                        $data->SKILLNAME,
                        strval(number_format($data->OFFERED,0,'.',',')),
                        '-',//strval(number_format($data->HANDLED,0,'.',',')),
                        '-',//strval(number_format($data->UNHANDLED,0,'.',',')),
                        
                        $data->ART,
                        $data->AHT,
                        $data->AST,
                        round($data->SCR,2).'%'
                    );
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }  
        }

        return false;
    }

    public function get_datareportAL ($tid, $d_start, $d_end,$meth)
    {
        $year = date('Y');
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        //QUERY - 
        // SUM(a.handling) as HANDLED,
        //(SUM(a.cof)-SUM(a.handling)) as UNHANDLED,
        $this->db->select('a.tanggal as TANGGAL,
        a.agent_id as AGENTID,
        a.agent_name as AGENTNAME,
        TIME(a.login_time ) as LOGIN,
        TIME(a.logout_time ) as LOGOUT,
        SEC_TO_TIME(a.staff_time) as STAFFTIME,
        SEC_TO_TIME(a.aux_istirahat) as AISTIRAHAT,
        SEC_TO_TIME(a.aux_ibadah) as AIBADAH,
        SEC_TO_TIME(a.aux_briefing) as ABRIEFING,
        SEC_TO_TIME(a.aux_toilet) as ALAINLAIN,
        SEC_TO_TIME(a.aux_tot) as ATOTAL,
        ');

        $this->db->from('rpt_agent_log a');
        
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($d_start)
        {
            $this->db->where('a.tanggal >= ',$d_start);
        }

        if($d_end)
        {
            $this->db->where('a.tanggal <=',$d_end);
            
        }
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->TANGGAL,
                        $data->AGENTID,
                        $data->AGENTNAME,
                        $data->LOGIN,
                        $data->LOGOUT,
                        $data->STAFFTIME,
                        $data->AISTIRAHAT,
                        $data->AIBADAH,
                        $data->ABRIEFING,
                        $data->ALAINLAIN,
                        $data->ATOTAL
                    );
                    $id++;
                }
                return $result;
            }
            else
            {
                return $query->result();
            }  
        }
        return false;
    }

    public function get_datareportSPA($tid, $t_start,$t_end,$meth)
    {
        //$year = date('Y');
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        $this->db->select('a.agentid as AGENT_ID,
        a.agentName as AGENT_NAME,
        a.skill_name as SKILL_NAME, 
        SUM(a.session) as COF,
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
        SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
        AVG(a.scr) as SCR');

        $this->db->from('rpt_summary_agent a');
        // $this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($t_start)
        {
            $this->db->where('a.tanggal >=',$t_start);
        }
        if($t_end)
        {
            $this->db->where('a.tanggal <=',$t_end);
        }
       // $this->db->where('YEAR(a.tanggal)',$year);
        $this->db->group_by('a.agentName');
        $query = $this->db->get();

        // print_r($this->db->last_query());
        // exit;
        
        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        $id,
                        $data->AGENT_ID,
                        $data->AGENT_NAME,
                        $data->SKILL_NAME,
                        strval(number_format($data->COF,0,',','.')),
                        $data->ART,
                        $data->AHT,
                        $data->AST,
                        round($data->SCR,2).'%'
                    );
                    $id++;
                }
                
                return $result;
            }
            else
            {
                return $query->result();
            }      
        }
        return false;
    }

    public function get_datareportTraffic($tid, $d_start, $d_end,$meth, $amt,$pge)
    {
        $year = date('Y');
        if($pge){
            $pge = $pge*$amt;
        }
        

        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        $this->db->select('a.tanggal as TANGGAL');
        $this->db->from('rpt_summary_scr a');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
       
        if($d_start)
        {
            $this->db->where('a.tanggal >= ',$d_start);
        }
        if($d_end)
        {
            $this->db->where('a.tanggal <=',$d_end);
            
        }
        // $this->db->where('YEAR(a.tanggal)',$year);
        if($amt)
        {
            $this->db->limit($amt,$pge);
        }
       

        $this->db->group_by('a.tanggal');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        'ID' => $id,
                        'TANGGAL' => $data->TANGGAL,
                        'DATA' => $this->data_reportTraffic($data->TANGGAL,$tid, $meth)
                    );
                    $id++;
                }
                return $result;
            }
            else
            {
                return array($this->data_reportTraffic($data->TANGGAL,$tid, $meth));
            }
           
        }

        return false;
    }

    public function get_datareportKIP($tid, $cid, $d_start,$d_end,$meth)
    {

        $this->db->select('category, SUM(jumlah) as jumlah');
        $this->db->from('rpt_summ_kip2');
        if($cid)
        {
            $this->db->where('channel_id',$cid);
        }
        if($tid)
        {
            $this->db->where('tenant_id',$tid);
        }
        if($d_start)
        {
            $this->db->where('tanggal >= ',$d_start);
        }
        if($d_end)
        {
            $this->db->where('tanggal <=',$d_end);
        }
        $this->db->group_by('category');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $id = 1;
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        'ID' => $id,
                        'CATEGORY' => $data->category,
                        'JUMLAH' => $data->jumlah
                    );
                    $id++;
                }
                return $result;
            }
            else{
                return $query->result();
            }
           
        }

        return false;

    }

    #endregion :: Raga

    #region :: debi
    public function get_datareportSIntervalMonth($tid,$chn,$month,$meth)
    {
        
                if ($meth == 'data') {    
                    
                    $datareport = $this->datareportSIntervalMonth($tid,$chn,$month,$meth);
                    if($datareport)
                    {
                        $result = $datareport;
                    }
                    else{
                        $result = false;
                    }

                }else{
                    $result[] = $this->datareportSIntervalMonth($tid,$chn,$month,$meth);
                }

            if($result)
            {
                return $result;
            }else{
                return false;
            }
    }
    #endregion :: debi

    #region :: additional-function

    public function get_maxrowTraffic($tid, $d_start, $d_end)
    {
        $year = date('Y');
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        $this->db->select('COUNT(DISTINCT a.tanggal) as MAXROWS');
        $this->db->from('rpt_summary_scr a');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
       
        if($d_start)
        {
            $this->db->where('a.tanggal >= ',$d_start);
        }
        if($d_end)
        {
            $this->db->where('a.tanggal <=',$d_end);
            
        }
        // $this->db->where('YEAR(a.tanggal)',$year);
        $query = $this->db->get();
        
        // print_r($this->db->last_query());
        // exit;
        if($query->num_rows() > 0)
        {
            return $query->row()->MAXROWS;
        }
        return 0;


    }

    function data_reportTraffic($dt ,$tid, $meth)
    {
        $year = date('Y');
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        //subquery
        $this->db->select('a.tenant_id, a.channel_id ,a.tanggal, SUM(a.cof) as cof , avg(a.scr) as scr');
        $this->db->from('rpt_summary_scr a');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($dt)
        {
            $this->db->where('a.tanggal ',$dt);
        }
        $this->db->where('YEAR(a.tanggal)',$year);
        $this->db->where_not_in('a.channel_id', '1');
        $this->db->group_by('a.tanggal, a.channel_id');
        $this->db->get();
        $subquery = $this->db->last_query();
        // print_r($subquery);
        // exit;

        //mainquery
        $this->db->select('IFNULL(a.tanggal,"'.$dt.'") as TANGGAL,
        b.channel_id as CHANNEL_ID,
        b.channel_name as CHANNEL_NAME,
        IFNULL(a.cof,0) as COF,
        IFNULL(a.scr,0) as SCR,
        b.channel_category as CATEGORY
        ');
        $this->db->from('m_channel b');
        $this->db->where_not_in('b.channel_id', '1');
        $this->db->join('('.$subquery.') a' , 'a.channel_id = b.channel_id','LEFT');
        $query = $this->db->get();
        // print_r($this->db->last_query());
        // exit;
        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
               
                foreach( $query->result() as $data)
                {
                    $result[] = array(
                        
                        'CHANNEL_NAME' => $data->CHANNEL_NAME,
                        'CHANNEL_CATEGORY' => $data->CATEGORY,
                        'COF' => strval(number_format($data->COF,0,',','.')),
                        'SCR' => round($data->SCR,2).'%'
                    );
                    
                }
                
                return $result;
            }
        }
        return false;
    }

    function datareportSInterval($tid,$chn,$interval_v,$interval_s,$interval_e,$date,$meth)
    {
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');

        if($interval_v == 3)
        {
            $this->db->select("
             a.tanggal as TANGGAL, 
            CONCAT(SUBSTRING(`a`.`interval`,1,2),':00:00')  as `INTERVAL_TIME_START`,
            CONCAT(LPAD(SUBSTRING(`a`.`interval`,1,2)+3,2,0),':00:00')  as `INTERVAL_TIME_END`, 
            SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
            SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
            SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
            SUM(a.case_in) as MESSAGE_IN,
            SUM(a.case_out) as MESSAGE_OUT,
            AVG(a.scr) as SCR");
        }
        if($interval_v == 6)
        {
            $this->db->select("a.tanggal as TANGGAL, 
            CONCAT(SUBSTRING(`a`.`interval`,1,2),':00:00')  as `INTERVAL_TIME_START`,
            CONCAT(LPAD(SUBSTRING(`a`.`interval`,1,2)+6,2,0),':00:00')  as `INTERVAL_TIME_END`, 
            SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
            SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
            SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
            SUM(a.case_in) as MESSAGE_IN,
            SUM(a.case_out) as MESSAGE_OUT,
            AVG(a.scr) as SCR");
        }
        if($interval_v == 1)
        {
                $this->db->select("a.tanggal as TANGGAL, 
                CONCAT(SUBSTRING(`a`.`interval`,1,2),':00:00')  as `INTERVAL_TIME_START`,
                CONCAT(LPAD(SUBSTRING(`a`.`interval`,1,2)+1,2,0),':00:00')  as `INTERVAL_TIME_END`, 
                SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
                SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
                SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
                SUM(a.case_in) as MESSAGE_IN,
                SUM(a.case_out) as MESSAGE_OUT,
                AVG(a.scr) as SCR");
        }
        

        $this->db->from('rpt_summ_interval a');
        // $this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($chn)
        {
            $this->db->where('a.channel_id',$chn);
        }
        if($interval_v)
        {
            $this->db->where('SUBSTRING(a.interval,1,2) >= ',$interval_s);
            $this->db->where('SUBSTRING(a.interval,1,2) < ',$interval_e);
        }
        
        $this->db->where('a.tanggal',$date);   

        $this->db->group_by('TANGGAL');
        $query = $this->db->get();

        // print_r($this->db->last_query());
        // exit;
        
        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                foreach( $query->result() as $data)
                {
                   
                    $result = array(
                        
                        // $data->TANGGAL,
                        $data->INTERVAL_TIME_START.'-'.$data->INTERVAL_TIME_END,
                        $data->ART,
                        $data->AHT,
                        $data->AST,
                        strval(number_format($data->MESSAGE_IN,0,',','.')),
                        strval(number_format($data->MESSAGE_OUT,0,',','.')),
                        str_replace('.',',',strval(round($data->SCR,2))).'%'
                    ); 
                }
                return $result;
            }
            else
            {
                return $query->result();
            }
        }
        return false;
    }

    function datareportSIntervalMonth($tid,$chn,$month,$meth)
    {
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
            
        $this->db->select("MONTH(a.tanggal) as BULAN, a.tanggal as TANGGAL,
                            SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.art))),2,7) as ART, 
                            SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.aht))),2,7) as AHT, 
                            SUBSTRING(SEC_TO_TIME(AVG(TIME_TO_SEC(a.ast))),2,7) as AST, 
                            SUM(a.case_in) as MESSAGE_IN,
                            SUM(a.case_out) as MESSAGE_OUT,
                            AVG(a.SCR) as SCR");
        $this->db->from('rpt_summ_interval a');
        // $this->db->join('m_channel b','b.channel_id = a.channel_id');
        if($tid)
        {
            $this->db->where('a.tenant_id',$tid);
        }
        if($chn)
        {
            $this->db->where('a.channel_id',$chn);
        }

        $this->db->where('MONTH(a.tanggal)',$month);   
        $this->db->where('YEAR(a.tanggal) = YEAR(CURDATE())');

        $this->db->group_by('TANGGAL');
        $query = $this->db->get();

        // print_r($this->db->last_query());
        // exit;
        
        if($query->num_rows() > 0)
        {
            if($meth == 'data')
            {   
                $i=1;
                foreach( $query->result() as $data)
                {
                   
                    $result[] = array(
                        $i,
                        substr($data->TANGGAL,8),
                        $data->ART,
                        $data->AHT,
                        $data->AST,
                        strval(number_format($data->MESSAGE_IN,0,',','.')),
                        strval(number_format($data->MESSAGE_OUT,0,',','.')),
                        str_replace('.',',',strval(round($data->SCR,2))).'%'
                    ); 
                    $i++;
                }
                return $result;
            }
            else
            {
                return $query->result();
            }
        }
        return false;
    }


    #endregion :: additional-function

    
}
?>