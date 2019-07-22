<?php
class rateSchedule extends Connectdb{

    
public $error = array();
public $msg = array();
public $timeRange = array(
    '0'=>'12:00 AM (mid night)','0.15' => '12:15 AM','0.30' => '12.30 AM','0.45' => '12:45 AM',
    '1' => '1:00 AM','1.15' => '1:15 AM','1.30' => '1:30 AM','1.45' => '1:45 AM',
    '2' => '2:00 AM','2.15' => '2:15 AM','2.30' => '2:30 AM','2.45' => '2:45 AM',
    '3' => '3:00 AM','3.15' => '3:15 AM','3.30' => '3:30 AM','3.45' => '3:45 AM',
    '4' => '4:00 AM','4.15' => '4:15 AM','4.30' => '4:30 AM','4.45' => '4:45 AM',
    '5' => '5:00 AM','5.15' => '5:15 AM','5.30' => '5:30 AM','5.45' => '5:45 AM',
    '6' => '6:00 AM','6.15' => '6:15 AM','6.30' => '6:30 AM','6.45' => '6:45 AM',
    '7' => '7:00 AM','7.15' => '7:15 AM','7.30' => '7:30 AM','7.45' => '7:45 AM',
    '8' => '8:00 AM','8.15' => '8:15 AM','8.30' => '8:30 AM','8.45' => '8:45 AM',
    '9' => '9:00 AM','9.15' => '9:15 AM','9.30' => '9:30 AM','9.45' => '9:45 AM',
    '10' => '10:00 AM','10.15' => '10:15 AM','10.30' => '10:30 AM','10.45' => '10:45 AM',
    '11' => '11:00 AM','11.15' => '11:15 AM','11.30' => '11:30 AM','11.45' => '11:45 AM',
    '12' => '12:00 PM (noon)','12.15' => '12:15 PM','12.30' => '12:30 PM','12.45' => '12:45 PM',
    '13' => '1:00 PM','13.15' => '1:15 PM','13.30' => '1:30 PM','13.45' => '1:45 PM',
    '14' => '2:00 PM','14.15' => '2:15 PM','14.30' => '2:30 PM','14.45' => '2:45 PM',
    '15' => '3:00 PM','15.15' => '3:15 PM','15.30' => '3:30 PM','15.45' => '3:45 PM',
    '16' => '4:00 PM','16.15' => '4:15 PM','16.30' => '4:30 PM','16.45' => '4:45 PM',
    '17' => '5:00 PM','17.15' => '5:15 PM','17.30' => '5:30 PM','17.45' => '5:45 PM',
    '18' => '6:00 PM','18.15' => '6:15 PM','18.30' => '6:30 PM','18.45' => '6:45 PM',
    '19' => '7:00 PM','19.15' => '7:15 PM','19.30' => '7:30 PM','19.45' => '7:45 PM',
    '20' => '8:00 PM','20.15' => '8:15 PM','20.30' => '8:30 PM','20.45' => '8:45 PM',
    '21' => '9:00 PM','21.15' => '9:15 PM','21.30' => '9:30 PM','21.45' => '9:45 PM',
    '22' => '10:00 PM','22.15' => '10:15 PM','22.30' => '10:30 PM','22.45' => '10:45 PM',
    '23' => '11:00 PM','23.15' => '11:15 PM','23.30' => '11:30 PM','23.45' => '11:45 PM'
);

//public $timeRangeFieldArray=array('s1_usage_time_range_weekdays','s1_usage_time_range_weekend','s2_usage_time_range_weekdays','s2_usage_time_range_weekend');

public $timeRangeFieldArray=array('s1_usage_time_range_weekdays');


public $arrayToJson = array('s1_date_range','s1_usage_times','s1_usage_time_range_weekdays','s1_usage_time_range_weekend','s1_usage_time_energy_charge','s1_usage_time_demand_charge',
    's2_date_range','s2_usage_times','s2_usage_time_range_weekdays','s2_usage_time_range_weekend','s2_usage_time_energy_charge','s2_usage_time_demand_charge'
);
    public function __construct(){
        parent::__construct();
        $this->setGetVars();
        $this->setPostVars();
        
    }
    
    public function setPostVars(){
        foreach($_POST as $k=>$v){
            $this->$k=$v;
        }
        
        if($this->submit == 1){
            /*foreach($this->timeRangeFieldArray as $kField=>$vField){
                $test = array();
                foreach($this->$vField as $kTp=>$vTp){
                    if(empty($test)){
                        $test = $this->$vField;
                    }
                    for($i=0;$i<3;$i++){
                        $to = str_replace(':','.',$vTp['to'][$i]);
                        $from = str_replace(':','.',$vTp['from'][$i]);
                       
                        if($i == 0){
                            $test[$kTp] = array();
                        }
                        foreach($this->timeRange as $kt=>$vt){
                            if($kt >= $from && $kt <= $to){
                                if(!in_array($kt,$test[$kTp])){
                                    
                                    array_push($test[$kTp],$kt);
                                }
                                
                            }
                        }
                        
                    }
                }
                $this->$vField = $test;
            }*/
           // _DX($this);
            foreach($this->arrayToJson as $k=>$v){
                if(is_array($this->$v) && !empty($this->$v)){
                    $this->$v = json_encode($this->$v);
                }
            }
        }
        
    }
    
    public function setGetVars(){
        foreach($_GET as $k=>$v){
            $this->$k=$v;
        }
    }

    public function saveRateSchedule(){
        
        if(isset($this->rsid) && $this->rsid != ""){
            $this->updateRateSchedule();
        }else{
            $this->insertRateSchedule();
        }
        return true;
        
    }
    public function insertRateSchedule(){
        
        $insSql = "INSERT INTO rateSchedule (rateschedule_name,utility_name,schedule_number,type,effective_date,lower_threshold,upper_threshold,
                   s1,s1_date_range,s1_usage_times,s1_usage_time_range_weekdays,s1_usage_time_range_weekend,s1_usage_time_energy_charge,s1_usage_time_demand_charge,s1_fixed_charge_cycle,s1_fixed_charges,s1_CPP_incentive,
                   s2,s2_date_range,s2_usage_times,s2_usage_time_range_weekdays,s2_usage_time_range_weekend,s2_usage_time_energy_charge,s2_usage_time_demand_charge,s2_fixed_charge_cycle,s2_fixed_charges,s2_CPP_incentive,
                   date_added,status,added_by)
                   VALUES ('".$this->rateschedule_name."','".$this->utility_name."','".$this->schedule_number."','".$this->type."',
                   '".date_format(date_create($this->effective_date), 'Y-m-d')."',$this->lower_threshold,$this->upper_threshold,
                   '".$this->s1."','".$this->s1_date_range."','".$this->s1_usage_times."','".$this->s1_usage_time_range_weekdays."','".$this->s1_usage_time_range_weekend."','".$this->s1_usage_time_energy_charge."','".$this->s1_usage_time_demand_charge."','".$this->s1_fixed_charge_cycle."','".$this->s1_fixed_charges."','".$this->s1_CPP_incentive."',
                   '".$this->s2."','".$this->s2_date_range."','".$this->s2_usage_times."','".$this->s2_usage_time_range_weekdays."','".$this->s2_usage_time_range_weekend."','".$this->s2_usage_time_energy_charge."','".$this->s2_usage_time_demand_charge."','".$this->s2_fixed_charge_cycle."','".$this->s2_fixed_charges."','".$this->s2_CPP_incentive."',
                    '".date('Y-m-d H:i:s')."','".$this->status."','".$_SESSION['uid']."')";
        _DX($insSql);
        $this->conn->query($insSql);
        $this->msg[] = 'Rate Schedule inserted successfully!';
        return true;
    }
    public function updateRateSchedule(){
        if(!isset($this->rsid) || $this->rsid == '')
            return false;
       
        
        $updateSql = "UPDATE rateSchedule SET rateschedule_name = '".$this->rateschedule_name."',utility_name = '".$this->utility_name."',schedule_number = '".$this->schedule_number."', type='".$this->type."', effective_date = '".date_format(date_create($this->effective_date), 'Y-m-d')."',lower_threshold = '".$this->lower_threshold."',upper_threshold = '".$this->upper_threshold."',
                      s1 = '".$this->s1."', s1_date_range = '".$this->s1_date_range."',s1_usage_times='".$this->s1_usage_times."',s1_usage_time_range_weekdays='".$this->s1_usage_time_range_weekdays."',s1_usage_time_range_weekend='".$this->s1_usage_time_range_weekend."',s1_usage_time_energy_charge='".$this->s1_usage_time_energy_charge."',s1_usage_time_demand_charge='".$this->s1_usage_time_demand_charge."',s1_fixed_charge_cycle = '".$this->s1_fixed_charge_cycle."',s1_fixed_charges = '".$this->s1_fixed_charges."',s1_CPP_incentive='".$this->s1_CPP_incentive."',
                      s2 = '".$this->s2."', s2_date_range = '".$this->s2_date_range."',s2_usage_times='".$this->s2_usage_times."',s2_usage_time_range_weekdays='".$this->s2_usage_time_range_weekdays."',s2_usage_time_range_weekend='".$this->s2_usage_time_range_weekend."',s2_usage_time_energy_charge='".$this->s2_usage_time_energy_charge."',s2_usage_time_demand_charge='".$this->s2_usage_time_demand_charge."',s2_fixed_charge_cycle = '".$this->s2_fixed_charge_cycle."',s2_fixed_charges = '".$this->s2_fixed_charges."',s2_CPP_incentive='".$this->s2_CPP_incentive."',
                      date_modified = '".date('Y-m-d H:i:s')."', status='".$this->status."', modified_by = '".$_SESSION['uid']."' 
                    WHERE rsid=".$this->rsid;
       // _DX($updateSql);
        $this->conn->query($updateSql);
        $this->msg[] = 'Record is updated successfully!';
        return true;
    }
    public function getAllRateSchedule(){
        $sql = "SELECT rs.*,u1.fname as added_fname,u1.lname as added_lname, u2.fname as modified_fname,u2.lname as modified_lname 
                FROM rateSchedule as rs 
                LEFT JOIN users as u1 ON rs.added_by=u1.id 
                LEFT JOIN users as u2 ON rs.added_by=u2.id 
                WHERE rs.status = 'Y' ORDER BY rs.rsid DESC";
        $result = $this->conn->query($sql);
        $res = $this->getArray($result);
        return $res;
    }
    public function getRateScheduleInformation($rsid){
        if(!isset($rsid) || $rsid == ""){
            $rsid = $this->rsid;
        }
        if(!$rsid || $rsid == ""){
            return false;
        }
        
        $sql = "SELECT * FROM rateSchedule WHERE rsid = ".$rsid;
        $res=$this->conn->query($sql);
        $result = $this->getArray($res);
       if(is_array($result[0]) && !empty($result[0])){
            foreach($result[0] as $k=>$v){
                if(in_array($k,$this->arrayToJson)){
                    $this->$k = json_decode($v,true);
                }else{
                    $this->$k = $v;
                }
                
            }
            return true;
        }
        return false;
    }
    public function setStatus($status,$id){
        
        if($status == '' || empty($id)){
            $this->error[] = "Selected records are not updated";
            
            return false;
        }
        $idString = implode(",", $id);
        
        $sql = "UPDATE rateSchedule SET status = '".$status."' WHERE rsid IN (".$idString.")";
        $this->conn->query($sql);
        if($status == 'Y'){
            $this->msg[] = "Selected records are activated successfully!";
        }else if($status == 'N'){
            $this->msg[] = "Selected records are inactivated successfully!";
            
        }else if($status == 'D'){
            $this->msg[] = "Selected records are deleted successfully!";
        }
        return true;
    }
    
    public function copyRateSchedule($id){
        if(empty($id)){
            $this->error[] = "Selected records are not copied";
            
            return false;
        }
        $idString = implode(",", $id);
        
        $selSql = "SELECT * FROM rateSchedule WHERE rsid IN (".$idString.")";
        $result = $this->conn->query($selSql);
        $res = $this->getArray($result);
        //_DX($res);
        foreach($res as $k=>$vRecord){
            $insSql = "INSERT INTO rateSchedule (rateschedule_name,utility_name,schedule_number,type,lower_threshold,upper_threshold,effective_date,
                        s1,s1_date_range,s1_usage_times,s1_usage_time_range_weekdays,s1_usage_time_range_weekend,s1_usage_time_energy_charge,s1_usage_time_demand_charge,s1_fixed_charges,s1_CPP_incentive,
                        s2,s2_date_range,s2_usage_times,s2_usage_time_range_weekdays,s2_usage_time_range_weekend,s2_usage_time_energy_charge,s2_usage_time_demand_charge,s2_fixed_charges,s2_CPP_incentive,date_added,status,added_by) VALUES
                       ('".$vRecord['rateschedule_name']."','".$vRecord['utility_name']."','".$vRecord['schedule_number']."','".$vRecord['type']."','".$vRecord['lower_threshold']."','".$vRecord['upper_threshold']."','".$vRecord['effective_date']."',
                        '".$vRecord['s1']."','".$vRecord['s1_date_range']."','".$vRecord['s1_usage_times']."','".$vRecord['s1_usage_time_range_weekdays']."','".$vRecord['s1_usage_time_range_weekend']."','".$vRecord['s1_usage_time_energy_charge']."','".$vRecord['s1_usage_time_demand_charge']."','".$vRecord['s1_fixed_charges']."','".$vRecord['s1_CPP_incentive']."',
                        '".$vRecord['s2']."','".$vRecord['s2_date_range']."','".$vRecord['s2_usage_times']."','".$vRecord['s2_usage_time_range_weekdays']."','".$vRecord['s2_usage_time_range_weekend']."','".$vRecord['s2_usage_time_energy_charge']."','".$vRecord['s2_usage_time_demand_charge']."','".$vRecord['s2_fixed_charges']."','".$vRecord['s2_CPP_incentive']."',
                        '".date("Y-m-d H:i:s")."','N','".$_SESSION['uid']."')";
           
            
            $this->conn->query($insSql);
            $this->msg[] = "Selected records are copied (inactive mode) successfully!";
            return true;
        }
        
    }
    
    function getArray($result){
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                foreach($row as $k=>$v){
                    $row[$k]	= stripslashes($v);
                }
                $records[] = $row;
            }
            return $records;
        }
    }
   
}
?>