<?php
class usageGenerationData extends Connectdb{

    
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

    
    public function getGenerationData($inputFileName)
    {
        
        $arrResultGeneration  = array();
        $handle     = fopen($inputFileName, "r");
        if(empty($handle) === false) {
            while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
                $arrResultGeneration[] = $data;
            }
            fclose($handle);
        }
        $generationArray[] = array('date','hour','generationValueKWH');
        $arrResultGenerationSlice = array_slice($arrResultGeneration,17);
        foreach($arrResultGenerationSlice as $k=>$v){
            
            if($k>0){
                $generationValue = number_format($v[10]/1000/4,4);
                $hour = intval($v[2]);
                for($i=0; $i<4;$i++){
                    
                    $date = $v[0]."/".$v[1]."/2018";
                    if($i == 0){
                        $nextHour = $hour;
                    }else{
                        $nextHour = number_format($nextHour+0.15,2);
                    }
                    
                    
                    $generationArray[] = array($date,$nextHour,$generationValue);
                }
                
            }
            
        }
        return $generationArray;
        
    }
    public function getFinalArrayForUsageFile($generationFinalArray,$utilityFileName){
        $utilityDataArray  = array();
        $handle     = fopen($utilityFileName, "r");
        if(empty($handle) === false) {
            while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
                $utilityDataArray[] = $data;
            }
            fclose($handle);
        }
        $finalArray = array();
        $finalArray[] = array('Service Aggrement','StartDateTime','EndDateTime','Usage','Usage Unit','Cost','Currency Unit','Avg. Temperature','Temperature Unit','Event Flags','Peak Demand','Demand Unit');
        $utilityDataArraySlice = array_slice($utilityDataArray,8);
        $utilityExportArray = array();
        $utilityImportArray = array();
        
        
        $utilityImportArray[]=array('sa_id','sp_id','date','hour','value');
        $utilityExportArray[]=array('sa_id','sp_id','date','hour','value');
        
        foreach($utilityDataArraySlice as $k=>$v){
            
            if($k>0){
                if($v[2] == 'D'){
                    // _DX($v[3]);
                    $date = date('m/d/Y',strtotime($v[3]));
                    $time = date('G.i',strtotime($v[3]));
                    
                    $utilityImportArray[]=array($v[0],$v[1],$date,$time,$v[5]);
                    $date = '';
                    $time = '';
                }else{
                    $date = date('m/d/Y',strtotime($v[3]));
                    $time = date('G.i',strtotime($v[3]));
                    $utilityExportArray[]=array($v[0],$v[1],$date,$time,$v[5]);
                    $date = '';
                    $time = '';
                }
                
            }
        }
        
        foreach($generationFinalArray as $k=>$v){
            if($k>0){
                $dateTime = $v[0].' '.str_replace('.',':',$utilityExportArray[$k][3]);
                if($utilityExportArray[$k][4] == 0 && $utilityImportArray[$k][4] > 0){
                    $usage = $utilityImportArray[$k][4] + $v[2];
                    
                }else if($utilityImportArray[$k][4] == 0 && $utilityExportArray[$k][4] > 0){
                    
                    $usage = $v[2] - $utilityExportArray[$k][4];
                    
                }else if($utilityImportArray[$k][4] > 0 && $utilityExportArray[$k][4] > 0){
                    $netImport = $utilityImportArray[$k][4] - $utilityExportArray[$k][4];
                    $usage = $netImport + $v[2];
                }else if($utilityExportArray[$k][4] == 0 && $utilityImportArray[$k][4] == 0){
                    $usage = $v[2];
                }
                if($usage < 0){
                    $usage = 0;
                }
                //$finalArray[$k] = array($v[0],2,$v[1],$utilityExportArray[$k][4],$utilityImportArray[$k][4],$usage,$v[2]);
                $finalArray[$k] = array($utilityExportArray[$k][0],$dateTime,'',$usage,'KWH','','','','','','','');
                
                $usage = '';
                $dateTime ='';
            }
        }
        return $finalArray;
        
        
        
    }
    public function uploadGenerationData(){
        global $sitePath;
        if ( isset($_FILES["generationFile"])) {
            
            //if there was an error uploading the file
            if ($_FILES["generationFile"]["error"] > 0) {
                $this->error[] = "Return Code: " . $_FILES["generationFile"]["error"];
                
            }
            else {
                
                //if file already exists
                if (file_exists($sitePath.'/usageGenerationReqData/' . $_FILES["generationFile"]["name"])) {
                    $this->error[] = $_FILES["generationFile"]["name"] . " already exists. ";
                }
                else {
                    $path_parts = pathinfo($_FILES["generationFile"]["name"]);
                    $storagename = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
                    move_uploaded_file($_FILES["generationFile"]["tmp_name"],  $sitePath.'/usageGenerationReqData/' . $storagename);
                    $path = $sitePath."/usageGenerationReqData/" . $storagename;
                    $this->filePath = $path;
                    return $path;
                }
            }
        } else {
            $this->error[] = "No file selected";
        }
        return false;
        
    }
    
    public function uploadUtilityInOutData(){
        global $sitePath;
        if ( isset($_FILES["utilityFile"])) {
            
            //if there was an error uploading the file
            if ($_FILES["generationFile"]["error"] > 0) {
                $this->error[] = "Return Code: " . $_FILES["utilityFile"]["error"];
            }
            else {
                //if file already exists
                if (file_exists($sitePath.'/usageGenerationReqData/' . $_FILES["utilityFile"]["name"])) {
                    $this->error[] = $_FILES["utilityFile"]["name"] . " already exists. ";
                }
                else {
                    $path_parts = pathinfo($_FILES["utilityFile"]["name"]);
                    $storagename = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
                    move_uploaded_file($_FILES["utilityFile"]["tmp_name"],  $sitePath.'/usageGenerationReqData/' . $storagename);
                    $path = $sitePath."/usageGenerationReqData/" . $storagename;
                    $this->filePath = $path;
                    return $path;
                }
            }
        } else {
            $this->error[] = "No file selected";
        }
        return false;
        
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