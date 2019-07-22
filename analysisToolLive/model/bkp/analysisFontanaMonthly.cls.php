<?php
class analysis extends Connectdb{

    
public $error = array();

public function __construct(){
    parent::__construct();
    $this->setPostVars();
    if(isset($_POST['submit'])){
        $this->checkPostData();
    }
}

public function setPostVars(){
    foreach($_POST as $k=>$v){
        $this->$k=$v;
    }
    $this->filePath = '';
}

public function checkPostData(){
    /*if(!isset($this->FS) || !is_numeric($this->FS)){
        $this->error[] = "Please enter Fire Station#";
    }*/
    if(!(isset($this->analysisType)) || $this->analysisType == ""){
        $this->error[] = "Please select Analysis Type";
    }
    if(!(isset($_POST['analysisStructure'])) || $_POST['analysisStructure'] == ""){
        $this->error[] = "Please select Analysis Structure";
    }
    
    if(!($this->address) || $this->address == ""){
        $this->error[] = "Please enter site address";
    }
    
    if($this->analysisType == 'customAnalysis'){
        if(!isset($this->solarSize) || !is_numeric($this->solarSize)){
            $this->error[] = "Please enter solar size";
            
        }
        
        if(!isset($this->bs) || !is_numeric($this->bs)){
            $this->error[] = "Please enter battery size";
        }
        
    }
        
}

public function uploadLoadData(){
    global $sitePath;
  
        if ( isset($_FILES["loadFile"])) {
            
            //if there was an error uploading the file
            if ($_FILES["loadFile"]["error"] > 0) {
                $this->error[] = "Return Code: " . $_FILES["loadFile"]["error"];
                
            }
            else {
                
                //if file already exists
                if (file_exists($sitePath.'/uploadLoadFiles/' . $_FILES["loadFile"]["name"])) {
                   $this->error[] = $_FILES["loadFile"]["name"] . " already exists. ";
                }
                else {
                    $path_parts = pathinfo($_FILES["loadFile"]["name"]);
                    $storagename = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
                    //move_uploaded_file($_FILES["loadFile"]["tmp_name"],  '/Applications/XAMPP/xamppfiles/htdocs/analysisTheme/analysisTool/uploadLoadFiles/' . $storagename);
                    if(move_uploaded_file($_FILES["loadFile"]["tmp_name"],  $sitePath.'/uploadLoadFiles/'. $storagename)){
                        $path = $sitePath.'/uploadLoadFiles/'.$storagename;
                        $this->filePath = $path;
                        
                        return $path;
                    }else{
                        $this->error[] = "File is not uploaded";
                        return false;
                    }
                    //$path = "/Applications/XAMPP/xamppfiles/htdocs/analysisTheme/analysisTool/uploadLoadFiles/" . $storagename;
                    
                }
            }
        } else {
            $this->error[] = "No file selected";
        }
        return false;
    
}

public function getUsageArrayHorizontal($usageDataFile){
    $arrResultUsage  = array();
    $handle     = fopen($usageDataFile, "r");
    if(empty($handle) === false) {
        while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
            $arrResultUsage[] = $data;
        }
        fclose($handle);
    }
    $energyEfficiency = 1;
    if($this->energyeffeciency > 0){
        $energyEfficiency = 1 - ($this->energyeffeciency/100);
    }
    $arrResultUsageFinal[] = array('Account #','Date','Hour','Load');
    $hourlyVals = array();
    $totalUsage=0;
    $annualUsage = 0;
    $calcAnnnualUsage = 0;
    $lastHour = 0;
    $hourTotal = 0;
    $hourValue = array();
  // _Dx($arrResultUsage);
   $partHourKey = 0;
   $minuteInterval = 0;
    foreach($arrResultUsage as $k=>$v){
        if ($k > 0) {
            for($h=5;$h<=100;$h++){
                $hourTotal = $v[$h]*$energyEfficiency;
                $hourValue[(string)$partHourKey] = $hourTotal;
                $partHourKey = $partHourKey + 0.15;
                $minuteInterval+=15;
                if($minuteInterval == 60){
                    $nextHour = floor($partHourKey)+1;
                    if($nextHour == 24){
                        $nextHour = 0;
                    }
                    $partHourKey = $nextHour;
                    $minuteInterval = 0;
                }
            }
            //_D($hourValue);
            foreach($hourValue as $hour=>$total){
                
                $annualUsage=$annualUsage + $total;
               
                $newVal = array($v[0],$v[1],(string)$hour,$total);
                $arrResultUsageFinal[] = $newVal;
                $newVal = array();
            }
            //_DX($annualUsage);
            $hourValue = array();
         
           
        }
        
      
    }
    $arrResultUsageFinal[] = $annualUsage;
  //  _Dx($arrResultUsageFinal);
    return $arrResultUsageFinal;
}

public function getUsageArray($usageDataFile){
    
    $arrResultUsage  = array();
    $handle     = fopen($usageDataFile, "r");
    if(empty($handle) === false) {
        while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
            $arrResultUsage[] = $data;
        }
        fclose($handle);
    }
    
    $arrResultUsageFinal[] = array('Account #','Date','Hour','Load');
  
    
    $annualUsage = 0;
    
    $energyEfficiency = 1;
    if($this->energyeffeciency > 0){
        $energyEfficiency = 1 - ($this->energyeffeciency/100);
    }
    foreach($arrResultUsage as $k=>$v){
        if ($k > 0) {
            $annualUsage+=$v[3]*$energyEfficiency;
            $endDateHour = date('G.i', strtotime($v[1]));
            $newVal = array($v[0],date('m/d/Y', strtotime($v[1])),$endDateHour,$v[3]*$energyEfficiency);
            $arrResultUsageFinal[] = $newVal;
            $newVal = array();
        }
    }
    
    $arrResultUsageFinal[] = $annualUsage;
    return $arrResultUsageFinal;
}

    public function getGenerationProductionAray($solarSize, $address, $arrResultUsageFinal)
    {
        //_Dx($arrResultUsageFinal);
        $day = date("z", strtotime($arrResultUsageFinal[0][1]));
        
        $startIndex = ($day-1) * 24 ;
        
        $ddd = 'https://developer.nrel.gov/api/pvwatts/v6.json?api_key=OTOytiqVouYdP0qvGuE347Oi8FnJUD18DgxoiMaq&address=' . urlencode($address) . '&system_capacity=' . $solarSize . '&azimuth=180&tilt=20&array_type=0&module_type=0&losses=14.08&timeframe=hourly';
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $ddd);

        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        
        if (empty($buffer)) {
            $this->error[]="recheck the address dont keep any special characters";
        } else {
            $generationResult = json_decode($buffer, true);
            if (isset($generationResult['errors']) && ! empty($generationResult['errors'])) {
                $this->error[] = implode(",",$generationResult['errors']);
            }else if (! isset($generationResult['outputs']['ac']) || empty($generationResult['outputs']['ac'])) {
                $this->error[] = "No generation data from NREL";
            }
            $generationHourlyData = $generationResult['outputs']['ac'];
          
            if (isset($generationHourlyData) && ! empty($generationHourlyData)) {

                $last_batch = array_slice($generationHourlyData, ($startIndex));

                $first_batch = array_slice($generationHourlyData, 0, $startIndex);

                $arrHourlyGeneration = array_merge($last_batch, $first_batch);
                //_D($arrHourlyGeneration);
               // _D("__");
                $minuteInterval = 0;
                $partHourKey = 0;
                foreach($arrHourlyGeneration as $k=>$v){
                    
                    $partHourKey = $k;
                    
                    for($i=0;$i<4;$i++){
                        //$arrQuartlrlyGeneration[(string)$partHourKey] = $v/4;
                        $arrQuartlrlyGeneration[] = $v/4;
                        
                        $partHourKey+=0.15;
                        if($i == 4){
                            $partHourKey = $k+1;
                        }
                        
                    }
                    
                    
                    
                    $partHourKey = $partHourKey + 0.15;
                    $minuteInterval+=15;
                    
                    if($minuteInterval == 60){
                        $nextHour = floor($partHourKey)+1;
                        if($nextHour == 24){
                            $nextHour = 0;
                        }
                        $partHourKey = $nextHour;
                        $minuteInterval = 0;
                    }
                }
              //_D($arrQuartlrlyGeneration);
            $arrGenerationFinal[] = array(
                'MeterNo',
                'Date',
                'Month',
                'Day',
                'Hour',
                'Load',
                'Generation',
                'Load (KW)'
            );
            
           // _D("-----");
           //_DX($arrResultUsageFinal);
            foreach ($arrResultUsageFinal as $k => $v) {
                $arrGenerationFinal[] = array(
                    $v[0],
                    $v[1],
                    date('n', strtotime($v[1])),
                    date('j', strtotime($v[1])),
                    $v[2],
                    $v[3],
                    $arrQuartlrlyGeneration[$k]/1000,
                    $v[3]*4
                );
            }
           //_DX($arrGenerationFinal);
             return $arrGenerationFinal;
            }
            return false;
        }
        return false;
    }

    public function calculateAnnualData($annualData){
        if(empty($annualData))
            return false;
            //_D($annualData);
            foreach($annualData as $k=>$v){
                foreach($v as $k1=>$v1){
                    foreach($v1 as $k2=>$v2){
                      
                        $annualTotalSolarGeneration+=filter_var($v2['totalSolarGeneration'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $annualTotalEnergyFromGrid+=filter_var($v2['totalEnergyFromGrid'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $annualTotalEnergyExport+=filter_var($v2['totalEnergyExport'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $annualTotalBill+=filter_var($v2['totalBill'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $annualTotalEnergyCharges+=filter_var($v2['energyCharges'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $annualTotalDemandharges+=filter_var($v2['demandCharges'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $annualTotalCriticalPeakCharges+=filter_var($v2['criticalPeakCharges'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $annualTotalCPPIncentive+=filter_var($v2['CPPIncentive'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $annualFixedCharges+=filter_var($v2['fixedCharges'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $annualTotalIncome+=filter_var($v2['totalIncomeEE'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $annualLowerThresholdCross+=$v2['lowerThresholdCross'];
                        $annualUpperThresholdCross+=$v2['upperThresholdCross'];
                        $annualestimatedTimeGridResiliency = $v2['estimatedTimeGridResiliency'];
                        
                    }
                    
                    $annualUsage = array(
                        'solarSize'=>$k,
                        'batterySize'=>$k1,
                        'month'=>'Annual',
                        'totalSolarGeneration'=>number_format($annualTotalSolarGeneration, 2, ".", ","),
                        'totalEnergyFromGrid'=>number_format($annualTotalEnergyFromGrid, 2, ".", ","),
                        'totalBill'=>number_format($annualTotalBill, 2, ".", ","),
                        'energyCharges'=>number_format($annualTotalEnergyCharges, 2, ".", ","),
                        'demandCharges'=>number_format($annualTotalDemandharges, 2, ".", ","),
                        'criticalPeakCharges'=>number_format($annualTotalCriticalPeakCharges, 2, ".", ","),
                        'CPPIncentive'=>number_format($annualTotalCPPIncentive, 2, ".", ","),
                        'fixedCharges'=>number_format($annualFixedCharges, 2, ".", ","),
                        'totalEnergyExport'=>number_format($annualTotalEnergyExport, 2, ".", ","),
                        'totalIncomeEE'=>number_format($annualTotalIncome, 2, ".", ","),
                        'lowerThresholdCross'=>$annualLowerThresholdCross,
                        'upperThresholdCross'=>$annualUpperThresholdCross,
                        'estimateGridResiliencyTime'=>number_format($annualestimatedTimeGridResiliency, 2, ".", ",")
                        
                        );
                    $annualData[$k][$k1] = array('annual'=>$annualUsage)+$annualData[$k][$k1];
                    $annualSummary[$k][$k1]['annual'] = $annualUsage;
                    $annualUsage=array();
                    
                    $annualTotalSolarGeneration=0;
                    $annualTotalEnergyFromGrid=0;
                    $annualTotalEnergyExport=0;
                    $annualTotalBill=0;
                    $annualTotalEnergyCharges=0;
                    $annualTotalDemandharges=0;
                    $annualTotalCriticalPeakCharges=0;
                    $annualTotalCPPIncentive=0;
                    $annualFixedCharges=0;
                    $annualTotalIncome=0;
                    $annualLowerThresholdCross=0;
                    $annualUpperThresholdCross=0;
                }
               // $annualMonthlyBreakDown = 
                //$annualData[$k][$k1] = array('annual'=>$annualUsage)+$annualData[$k][$k1];
                
            }
            //_DX($annualData);
            $this->insertAnalysisData($annualData);
            return $annualData;
        
    }
   
    public function insertAnalysisData($annualData){
       // _DX($this);
        $annualDataJson=json_encode($annualData);
        $date=date("Y-m-d h:i:s");
        $analysisType="F";
        $analysisCustomSolar = "";
        $analysisCustomBattery = "";
        if($this->analysisType == 'customAnalysis'){
            $analysisType="C";
            $analysisCustomSolar=$this->solarSize;
            $analysisCustomBattery=$this->bs;
        }
        $sql = "INSERT INTO analyses
                (site_name,site_address,load_file_name,analysis_array,date_added,status,analysis_type,analysis_custom_solarsize,analysis_custom_batterysize,energy_efficiency,nem_rate,rate_schedule,added_by,grid_resiliency) VALUES 
                ('$this->siteName','$this->address','$this->filePath','$annualDataJson','$date','Y','$analysisType','$analysisCustomSolar','$analysisCustomBattery','$this->energyeffeciency','$this->incomeRate','$this->rateSchedule','".$_SESSION['uid']."',$this->gridresiliency)";
        //_DX($sql);
        $this->conn->query($sql);
        return true;
        
    }
    public function getRateScheduleInformation($rsid){
        
        if(!$rsid || $rsid == ""){
            return false;
        }
        
        $sql = "SELECT * FROM rateSchedule WHERE rsid = ".$rsid;
        $res=$this->conn->query($sql);
        $result = $this->getArray($res);
        return $result[0];
        //_DX($result);
    }
    public function getAllRateSchedule(){
        
        $sql = "SELECT rateschedule_name,rsid FROM rateSchedule WHERE status = 'Y'";
        $res=$this->conn->query($sql);
        $result = $this->getArray($res);
        return $result;
       // _DX($result);
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