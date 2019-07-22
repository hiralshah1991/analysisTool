<?php
class analysisList extends Connectdb{

    
public $error = array();

    public function __construct(){
        parent::__construct();
        $this->setGetVars();
        $this->setPostVars();
        
    }
    
    public function setPostVars(){
        foreach($_POST as $k=>$v){
            $this->$k=$v;
        }
    }
    
    public function setGetVars(){
        foreach($_GET as $k=>$v){
            $this->$k=$v;
        }
    }

    public function getAnalysisList(){
        $sql = "SELECT a.*,u.fname, u.lname, r.rateschedule_name 
                FROM analyses as a LEFT JOIN users as u ON a.added_by = u.id
                LEFT JOIN rateSchedule as r ON a.rate_schedule = r.rsid
                WHERE a.status != 'D' ORDER BY a.analysis_id DESC";
        $res=$this->conn->query($sql);
        $result = $this->getArray($res);
       
        return $result;
    }
    
    public function getAnalysisDetail(){
      
       if(!$this->aid || !is_numeric($this->aid)){
          
           
           return false;
       }
        
            $sql = "SELECT a.*, r.rateschedule_name, r.lower_threshold, r.upper_threshold, u.fname, u.lname 
                    FROM analyses as a LEFT JOIN rateSchedule as r ON a.rate_schedule = r.rsid 
                    JOIN users as u ON a.added_by = u.id 
                    WHERE analysis_id = ".$this->aid;
            $res = $this->conn->query($sql);
            $result = $this->getArray($res);
            $result[0]['analysis_array'] = json_decode($result[0]['analysis_array'],true);
            //$result[0]['site_address'] = explode(",",$result[0]['site_address']);
            $fileName = array_pop(explode("/",$result[0]['load_file_name']));
            $result[0]['file_name'] = $fileName;
            return $result;
        
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