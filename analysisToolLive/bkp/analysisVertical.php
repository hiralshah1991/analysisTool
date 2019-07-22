<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
include ("lib/common.php");
include ("model/analysisFontanaMonthly.cls.php");

$timeRange = array(
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
$time_start = microtime(true);
$clsAnalysis = new analysis();
$allRateSchedule = $clsAnalysis->getAllRateSchedule();
$annualData = array();
if (isset($clsAnalysis->submit) && $clsAnalysis->submit == 1) {
    
    if (isset($_POST['address']) && $_POST['address'] != "" && isset($_FILES['loadFile']) && ! empty($_FILES['loadFile'])) {
        
        $address = $_POST['address'];
        if (isset($_FILES) && ! empty($_FILES)) {
            $usageDataFile = $clsAnalysis->uploadLoadData();
        }
        if (isset($usageDataFile) && $usageDataFile != "") {
            
            
            if(isset($_POST['rateSchedule']) && $_POST['rateSchedule'] != ''){
                $rateSchedule = $clsAnalysis->getRateScheduleInformation($_POST['rateSchedule']);
                
            }else{
                $clsAnalysis->error[] = 'Please select rate schedule';
            }
            
            $lowerThreshold = $rateSchedule['lower_threshold'];
            $upperThreshold = $rateSchedule['upper_threshold'];
            
            $lowerThresholdKWH = $lowerThreshold/4;
            $upperThresholdKWH = $upperThreshold/4;
            
            $weekEndArray = array('Sat','Sun');
            $criticalPeakDays = array(1,8,15,20,28);
            
            //For Winter season
            $winterSeasonArray = json_decode($rateSchedule['s1_date_range'],1);
            $winterTimePeriodArray = json_decode($rateSchedule['s1_usage_times'],1);
            
            $winterWeekdayPeriodArray = json_decode($rateSchedule['s1_usage_time_range_weekdays'],1);
            foreach($winterWeekdayPeriodArray as $tp=>$tpArray){
                $fromCnt = count($tpArray['from']);
                $toCnt = count($tpArray['to']);
                $totalCnt = $toCnt;
                if($fromCnt >= $toCnt){
                    $totalCnt = $fromCnt;
                }
                for($i=0; $i<$totalCnt; $i++){
                    $to = str_replace(':','.',$tpArray['to'][$i]);
                    $from = str_replace(':','.',$tpArray['from'][$i]);
                    
                    if($i == 0){
                        $winterWeekdayPeriodArray[$tp] = array();
                    }
                    foreach($timeRange as $kt=>$vt){
                        if($from != '' && $to != ''){
                            if($kt >= $from && $kt <= $to){
                                if(!in_array($kt,$winterWeekdayPeriodArray[$tp])){
                                    
                                    array_push($winterWeekdayPeriodArray[$tp],$kt);
                                }
                                
                            }
                        }
                        
                    }
                }
            }
            $winterWeekdayCriticalPeakHours = $winterWeekdayPeriodArray['criticalpeak'];
            $winterWeekdayPeriodArray['criticalpeak'] = array();
            
            
            
            $winterWeekendPeriodArray = json_decode($rateSchedule['s1_usage_time_range_weekend'],1);
            foreach($winterWeekendPeriodArray as $tp=>$tpArray){
                $fromCnt = count($tpArray['from']);
                $toCnt = count($tpArray['to']);
                $totalCnt = $toCnt;
                if($fromCnt >= $toCnt){
                    $totalCnt = $fromCnt;
                }
                
                for($i=0; $i<$totalCnt; $i++){
                    $to = str_replace(':','.',$tpArray['to'][$i]);
                    $from = str_replace(':','.',$tpArray['from'][$i]);
                    
                    if($i == 0){
                        $winterWeekendPeriodArray[$tp] = array();
                    }
                    foreach($timeRange as $kt=>$vt){
                        if($from != '' && $to != ''){
                            if($kt >= $from && $kt <= $to){
                                if(!in_array($kt,$winterWeekendPeriodArray[$tp])){
                                    
                                    array_push($winterWeekendPeriodArray[$tp],$kt);
                                }
                                
                            }
                        }
                        
                    }
                }
            }
            $winterWeekendCriticalPeakHours = $winterWeekendPeriodArray['criticalpeak'];
            $winterWeekendPeriodArray['criticalpeak'] = array();
            
            $winterEnergyRate =  json_decode($rateSchedule['s1_usage_time_energy_charge'],1);
            $winterDemadRate = json_decode($rateSchedule['s1_usage_time_demand_charge'],1);
            $winterCPPIncentive = $rateSchedule['s1_CPP_incentive'];
            $winterFixedCharges = $rateSchedule['s1_fixed_charges'];
            $winterFixedChargeBillCyclePerDay = false;
            if($rateSchedule['s1_fixed_charge_cycle'] == 'D'){
                $winterFixedChargeBillCyclePerDay = true;
            }
            
            //For Summer season
            
            $summerSeasonArray = json_decode($rateSchedule['s2_date_range'],1);
            $summerTimePeriodArray = json_decode($rateSchedule['s2_usage_times'],1);
            //_D($summerSeasonArray);
           // _D($summerTimePeriodArray);
            //get summer's time period array
            $summerWeekdayPeriodArray = json_decode($rateSchedule['s2_usage_time_range_weekdays'],1);
            //_D($summerWeekdayPeriodArray);
            foreach($summerWeekdayPeriodArray as $tp=>$tpArray){
                $fromCnt = count($tpArray['from']);
                $toCnt = count($tpArray['to']);
                $totalCnt = $toCnt;
                if($fromCnt >= $toCnt){
                    $totalCnt = $fromCnt;
                }
                for($i=0; $i<$totalCnt; $i++){
                    $to = str_replace(':','.',$tpArray['to'][$i]);
                    $from = str_replace(':','.',$tpArray['from'][$i]);
                    
                    if($i == 0){
                        $summerWeekdayPeriodArray[$tp] = array();
                    }
                    foreach($timeRange as $kt=>$vt){
                        if($from != '' && $to != ''){
                            if($kt >= $from && $kt <= $to){
                                if(!in_array($kt,$summerWeekdayPeriodArray[$tp])){
                                    
                                    array_push($summerWeekdayPeriodArray[$tp],$kt);
                                }
                                
                            }
                        }
                        
                    }
                }
            }
            $summerWeekdayCriticalPeakHours = $summerWeekdayPeriodArray['criticalpeak'];
            $summerWeekdayPeriodArray['criticalpeak'] = array();
           // _D($summerWeekdayPeriodArray);
            $summerWeekendPeriodArray = json_decode($rateSchedule['s2_usage_time_range_weekend'],1);
            foreach($summerWeekendPeriodArray as $tp=>$tpArray){
                $fromCnt = count($tpArray['from']);
                $toCnt = count($tpArray['to']);
                $totalCnt = $toCnt;
                if($fromCnt >= $toCnt){
                    $totalCnt = $fromCnt;
                }
                
                for($i=0; $i<$totalCnt; $i++){
                    $to = str_replace(':','.',$tpArray['to'][$i]);
                    $from = str_replace(':','.',$tpArray['from'][$i]);
                    
                    if($i == 0){
                        $summerWeekendPeriodArray[$tp] = array();
                    }
                    foreach($timeRange as $kt=>$vt){
                        if($from != '' && $to != ''){
                            if($kt >= $from && $kt <= $to){
                                if(!in_array($kt,$summerWeekendPeriodArray[$tp])){
                                    
                                    array_push($summerWeekendPeriodArray[$tp],$kt);
                                }
                                
                            }
                        }
                        
                    }
                }
            }
            $summerWeekendCriticalPeakHours = $summerWeekendPeriodArray['criticalpeak'];
            $summerWeekendPeriodArray['criticalpeak'] = array();
            
            $summerEnergyRate =  json_decode($rateSchedule['s2_usage_time_energy_charge'],1);
            $summerDemadRate = json_decode($rateSchedule['s2_usage_time_demand_charge'],1);
            $summerCPPIncentive = $rateSchedule['s2_CPP_incentive'];
            $summerFixedCharges = $rateSchedule['s2_fixed_charges'];
            $summerFixedChargeBillCyclePerDay = false;
            if($rateSchedule['s2_fixed_charge_cycle'] == 'D'){
                $summerFixedCharges = $rateSchedule['s2_fixed_charges'];
               
                $summerFixedChargeBillCyclePerDay = true;
            }
            $summary = array();
            $arrResultUsageFinal = $clsAnalysis->getUsageArray($usageDataFile);
            array_shift($arrResultUsageFinal);
            $totalAnnualUsage = array_pop($arrResultUsageFinal);
           // _D($totalAnnualUsage);
            $totalInterval = count($arrResultUsageFinal);
            $totalDays = $totalInterval/(4*24);
            $avgHourlyUsage = $totalAnnualUsage / ($totalDays*24);
            
            //create Month number to month text array
            $totalElement = count($arrResultUsageFinal);
            
            $startDate = $arrResultUsageFinal[0][1];
            $endDate = $arrResultUsageFinal[$totalElement-1][1];
            $startMonth = date("n",strtotime($startDate));
            $startYear = date("Y",strtotime($startDate));
            $endYear = date("Y",strtotime($endDate));
            $monthToText = array();
            for($i=$startMonth;$i<=12;$i++){
                $exDate = $i."/"."1/".$startYear;
                $monthText = date('M',strtotime($exDate));
                $monthToText[$i] = $monthText." ".$startYear;
            }
            $firstYearMonthCount = count($monthToText);
            $secondYearMonthCount = 12 - $firstYearMonthCount;
            for($i=1;$i<=$secondYearMonthCount;$i++){
                $exDate = $i."/"."1/".$endYear;
                $monthText = date('M',strtotime($exDate));
                $monthToText[$i] = $monthText." ".$endYear;
            }
            //end create Month number to month text array
            
            $incomeRate = 0;
            if(isset($_POST['incomeRate']) && $_POST['incomeRate'] != 0){
                
                $incomeRate = $_POST['incomeRate'];
                
            }
            
            $solarSizeArray = array();
            
            if(isset($_POST['kwhtokwratio']) && $_POST['kwhtokwratio']!= "" ){
                $kwhToKwRatio = $_POST['kwhtokwratio'];
            }
            
            if ($_POST['analysisType'] == 'allAnalysis') {
                // get solar range array
                
                for ($i = 0; $i < 7; $i ++) {
                    if ($i == 0) {
                        $solarSizeArray[$i] = round(($totalAnnualUsage / $kwhToKwRatio) * 1.1);
                    } else if ($i == 1) {
                        $solarSizeArray[$i] = round($totalAnnualUsage / $kwhToKwRatio);
                    } else {
                        $percentDecrease = 1 - ($i / 10);
                        $solarSizeArray[$i] = round($solarSizeArray[0] * $percentDecrease);
                    }
                }
                $batterySizeArray = [
                    - 1,
                    0,
                    110,
                    220,
                    330,
                    440,
                    550,
                    660,
                    770,
                    880,
                    990,
                    1100,
                    1210,
                    1320,
                    1430
                ];
            } elseif ($_POST['analysisType'] == 'customAnalysis') {
                $solarSizeArray[] = $_POST['solarSize'];
                /*$batterySizeArray = array(
                    - 1,
                    $_POST['bs']
                );*/
                $batterySizeArray = explode(",",$_POST['bs']);
                array_unshift($batterySizeArray, "-1");
                //_DX($batterySizeArray);
            }
            
            // Grid Resiliency Calculation
            $gridResiliency = 0;
            if($clsAnalysis->gridresiliency > 0){
                $gridResiliency = $clsAnalysis->gridresiliency;
            }
            
            if ($_POST['analysisStructure'] == 'annual') {
                foreach ($solarSizeArray as $solarSize) {
                    $arrToProcess = $clsAnalysis->getGenerationProductionAray($solarSize, $address, $arrResultUsageFinal);
                   
                    if (isset($arrToProcess) && ! empty($arrToProcess)) {
                        array_shift($arrToProcess);
                        //_Dx($arrToProcess);
                        $summary = array();
                        $calculateDaysOFMonth = 1;
                        foreach ($batterySizeArray as $batterySize) {
                            $calculateDaysOFMonth = true;
                            
                            
                            $NBNS = false;
                            $batteryStorage = $batterySize;
                            if ($batterySize == - 1) {
                                $NBNS = true;
                                $batterySize = 0;
                                $batteryStorage = 0;
                            }
                            
                            // Grid Resiliency Calculation
                            $allowedBatteryUsage = $batterySize;
                            $usableBatteryStorage = $batterySize;
                            $spareBatteryStorageKWH = 0;
                            if($batterySize >0 && $gridResiliency > 0){
                                $allowedBatteryUsage = $batterySize * (1 - ($gridResiliency/100));
                                $usableBatteryStorage = $allowedBatteryUsage;
                                $spareBatteryStorageKWH = $batterySize - $allowedBatteryUsage;
                            }
                            //_D($batterySize);_D($allowedBatteryUsage);_D($batteryStorage);_Dx($spareBatteryStorageKWH);
                            
                            $generation = array();
                            $demand = array();
                            $BS = array();
                            $usableBS = array();
                            $totalEnergyExport = 0;
                            $totalEnergyFromGrid = 0;
                            $totalBatteryStorage = 0;
                            $totalUsableBatteryStorage = 0;
                            $totalSolarGeneration = 0;
                            $totalEnergyCharges = 0;
                            $totalCriticalPeakCharges = 0;
                            $totalIncomeEE = 0;
                            $totalDemandCharge = 0;
                            $totalDemand = 0;
                            $energyFromGrid = array();
                            $lowerThresholdKW = array();
                            $upperThresholdKW = array();
                            $energyExport = array();
                            $incomeEE = array();
                            $energyCharges = array();
                            $demandCharges = array();
                            $criticalCharges = array();
                            $criticalPeakCharges = array();
                            $demandTPArray = array();
                            $offPeakDayPick = array();
                            $onPeakDayPick = array();
                            $midPeakDayPick = array();
                            
                            $annualSolarGeneration = 0;
                            $lowerThresholdCount = 0;
                            $upperThresholdCount = 0;
                            $demandRatesPeak = array();
                           	$keyArray = array_keys($arrToProcess);
                            $lastKey = end($keyArray);
                            
                            foreach($arrToProcess as $k => $v) {
                                $isWeekDay = true;
                                $isWeekEnd = false;
                                
                                $hour = $v[4];
                                $day = $v[3];
                                $month = $v[2];
                                $date = $v[1];
                                $year = date('Y',strtotime($v[1]));
                                $BS[$month][$day][$hour] = 0;
                                $usableBS[$month][$day][$hour] = 0;
                                $energyExport[$month][$day][$hour] = 0;
                                $energyFromGrid[$month][$day][$hour] = 0;
                                $energyCharges[$month][$day][$hour] = 0;
                                $demand[$month][$day][$hour] = $v[5];
                                $lowerThresholdKW[$month][$day][$hour] = 0;
                                $upperThresholdKW[$month][$day][$hour] = 0;
                                
                                if ($NBNS) {
                                    $generation[$month][$day][$hour] = 0;
                                } else {
                                    $generation[$month][$day][$hour] = $v[6];
                                }
                                
                                if($calculateDaysOFMonth == 1){
                                    $totalDaysOFMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
                                    $calculateDaysOFMonth = 0;
                                }
                                
                                /*if ($generation[$month][$day][$hour] + $batteryStorage > $demand[$month][$day][$hour]) { // generation + batteryStorage is greater than usage then charge the battery
                                    
                                    $batteryStorage = $generation[$month][$day][$hour] + $batteryStorage - $demand[$month][$day][$hour];
                                    
                                    if ($batteryStorage > $batterySize) {
                                        $energyExport[$month][$day][$hour] = $batteryStorage - $batterySize;
                                        $batteryStorage = $batterySize;
                                    }
                                } else {
                                    $energyFromGrid[$month][$day][$hour] = $demand[$month][$day][$hour] - ($generation[$month][$day][$hour] + $batteryStorage);
                                    $batteryStorage = 0;
                                }*/
                                
                                if ($generation[$month][$day][$hour] + $usableBatteryStorage > $demand[$month][$day][$hour]) { // generation + batteryStorage is greater than usage then charge the battery
                                    
                                    $batteryStorage = $generation[$month][$day][$hour] + $batteryStorage - $demand[$month][$day][$hour];
                                    
                                    $usableBatteryStorage = $generation[$month][$day][$hour] + $usableBatteryStorage - $demand[$month][$day][$hour];
                                    
                                    if ($batteryStorage > $batterySize) {
                                        $energyExport[$month][$day][$hour] = $batteryStorage - $batterySize;
                                        $batteryStorage = $batterySize;
                                        $usableBatteryStorage = $allowedBatteryUsage;
                                    }
                                } else {
                                    $energyFromGrid[$month][$day][$hour] = $demand[$month][$day][$hour] - ($generation[$month][$day][$hour] + $usableBatteryStorage);
                                    $batteryStorage = $batterySize - $allowedBatteryUsage;
                                    $usableBatteryStorage = 0;
                                }
                                
                                $usableBS[$month][$day][$hour] = $usableBatteryStorage;
                                $BS[$month][$day][$hour] = $batteryStorage;
                                $totalEnergyExport+= $energyExport[$month][$day][$hour];
                                $totalEnergyFromGrid+= $energyFromGrid[$month][$day][$hour];
                                $totalBatteryStorage+= $BS[$month][$day][$hour];
                                $totalUsableBatteryStorage+=$usableBS[$month][$day][$hour];
                                $totalSolarGeneration+= $generation[$month][$day][$hour];
                                $totalDemand+= $demand[$month][$day][$hour];
                                
                                if($energyFromGrid[$month][$day][$hour] > $lowerThresholdKWH && $energyFromGrid[$month][$day][$hour] < $upperThresholdKWH){
                                    $lowerThresholdCount++;
                                    $lowerThresholdKW[$month][$day][$hour] = $energyFromGrid[$month][$day][$hour] * 4;
                                    if($solarSize == 442 && $batterySize == 550){
                                        $lowerThresholdKWDisplay[$month][$day][$hour] = $energyFromGrid[$month][$day][$hour] * 4;
                                        
                                    }
                                    
                                }else if($energyFromGrid[$month][$day][$hour] >= $upperThresholdKWH){
                                    
                                    $upperThresholdCount++;
                                    $upperThresholdKW[$month][$day][$hour] = $energyFromGrid[$month][$day][$hour] * 4;
                                }
                                
                                $annualSolarGeneration+= $generation[$month][$day][$hour];
                                
                                //income from exported energy
                                $incomeEE[$month][$day][$hour] = $energyExport[$month][$day][$hour] * $incomeRate;
                                $totalIncomeEE+=$incomeEE[$month][$day][$hour];
                                
                                //weekend check
                                $dayName = date('D',strtotime($date));
                                
                                
                                if(in_array($dayName,$weekEndArray)){
                                    $isWeekEnd = true;
                                    $isWeekDay = false;
                                }
                                
                                //Get Season Name
                                $season = "winter";
                                if(in_array($month,$summerSeasonArray)){
                                    $season = "summer";
                                }
                                
                                //Get Time Period
                                $nameOfTPArray = $season."WeekdayPeriodArray";
                                if($isWeekEnd){
                                    $nameOfTPArray = $season."WeekendPeriodArray";
                                }
                                foreach($$nameOfTPArray as $kTP=>$vTP){
                                    if(in_array($hour,$vTP)){
                                        $timePeriod = $kTP;
                                    }
                                }
                                //Cost Calculation for energy charges
                                $nameOfRateArray = $season."EnergyRate";
                                
                                
                                $rateArr = $$nameOfRateArray;
                                
                                $energyCharges[$month][$day][$hour] = $energyFromGrid[$month][$day][$hour] * $rateArr[$timePeriod];
                                
                                
                                $totalEnergyCharges+= $energyCharges[$month][$day][$hour];
                                
                                //cost calculation for critical peak
                                $criticalPeakHoursName = $season."WeekdayCriticalPeakHours";
                                if($isWeekEnd){
                                    $criticalPeakHoursName = $season."WeekendCriticalPeakHours";
                                }
                                $criticalPeakHours = $$criticalPeakHoursName;
                                
                                
                                if(in_array($day,$criticalPeakDays) && in_array($hour,$criticalPeakHours)){
                                    $criticalPeakCharges[$month][$day][$hour] = $energyFromGrid[$month][$day][$hour] * $rateArr['criticalpeak'];
                                }
                                $totalCriticalPeakCharges+=$criticalPeakCharges[$month][$day][$hour];
                                
                                
                                //calculate peak for demand rates
                                
                                if(!is_array($demandRatesPeak[$month][$timePeriod]) || empty($demandRatesPeak[$month][$timePeriod])){
                                    $demandRatesPeak[$month][$timePeriod] = array('peakDay'=>$day,'peakHour'=>$hour,'peakValueKWH'=>$energyFromGrid[$month][$day][$hour],'highestPeak'=>'No');
                                    
                                }elseif($energyFromGrid[$month][$day][$hour] >= $demandRatesPeak[$month][$timePeriod]['peakValueKWH']){
                                    $demandRatesPeak[$month][$timePeriod] = array('peakDay'=>$day,'peakHour'=>$hour,'peakValueKWH'=>$energyFromGrid[$month][$day][$hour],'highestPeak'=>'No');
                                    
                                }
                                
                                //calculate fixed charges if billing cycle is per day
                                if($hour == 23.45){
                                    $seasonFixedBillCheck = $season."FixedChargeBillCyclePerDay";
                                    if($$seasonFixedBillCheck){
                                        $fixChargeVar = $season."FixedCharges";
                                        $fixedChargeMonth+=$$fixChargeVar;
                                    }
                                }
                                
                                
                                if(($totalDaysOFMonth == $day && $hour == 23.45) || ($k == $lastKey && $hour = 23.45)){
                                    
                                    
                                    $calculateDaysOFMonth = 1;
                                    
                                    //_D($demandRatesPeak);
                                    
                                    //set highest demand peak
                                    $highestPeakValue = 0;
                                    foreach ($demandRatesPeak[$month] as $tp=>$v){
                                        $demandRatesPeak[$month][$tp]['peakValueKW'] = $v['peakValueKWH'] * 4;
                                        if($v['peakValueKWH'] >= $highestPeakValue){
                                            $highestPeakValue = $v['peakValueKWH'];
                                            $demandRatesPeak[$month][$tp]['highestPeak'] = 'Yes';
                                            $timePeriodArray = $season."TimePeriodArray";
                                            foreach($$timePeriodArray as $timePeriod){
                                                if($tp != $timePeriod && is_array($demandRatesPeak[$month][$timePeriod]) && !empty($demandRatesPeak[$month][$timePeriod])){
                                                    $demandRatesPeak[$month][$timePeriod]['highestPeak'] = 'No';
                                                }
                                            }
                                        }
                                        
                                    }
                                    
                                    //calculate demand rates
                                    
                                    
                                    $demandRateArrayName = $season."DemadRate";
                                    $tpArrayName = $season."TimePeriodArray";
                                    
                                    $demandChargesArr = $$demandRateArrayName;
                                    
                                    $CPPIncentiveName = $season."CPPIncentive";
                                    
                                    foreach($demandRatesPeak[$month] as $tp=>$tpArray){
                                        if($tpArray['highestPeak'] == 'Yes'){
                                            $demandCharges[$month][$tp] = $demandChargesArr[$tp] * $tpArray['peakValueKW'] + $demandChargesArr['NC'] * $tpArray['peakValueKW'];
                                            $CPPIncentiveAmount = $tpArray['peakValueKW'] * $$CPPIncentiveName;
                                        }else{
                                            $demandCharges[$month][$tp] = $demandChargesArr[$tp] * $tpArray['peakValueKW'];
                                        }
                                    }
                                    $totalDemandCharge = 0;
                                    foreach($demandCharges[$month] as $kDemandTp=>$vDemand){
                                        $totalDemandChargeMonth+=$vDemand;
                                    }
                                   
                                    $seasonFixedBillCheck = $season."FixedChargeBillCyclePerDay";
                                    
                                    if($$seasonFixedBillCheck){
                                        $fixedChargeValue = $fixedChargeMonth;
                                    }else{
                                        $fixedCharges = $season."FixedCharges";
                                        $fixedChargeValue = $$fixedCharges;
                                    }
                                    $totalMonthlyBillCost[$month] = $fixedChargeValue + $totalDemandChargeMonth + $totalEnergyCharges + $totalCriticalPeakCharges + $CPPIncentiveAmount - $totalIncomeEE;
                                    
                                    
                                    $batterySizeText = $batterySize;
                                    $solarSizeText = $solarSize;
                                    
                                    if($NBNS){
                                        $batterySizeText = 'NBNS';
                                        $solarSizeText = 'NBNS';
                                    }
                                    $lowerThresholdCross[$month] = $lowerThresholdCount;
                                    $upperThresholdCross[$month] = $upperThresholdCount;
                                    $annualData[$solarSizeText][$batterySizeText][$month]=
                                    array(
                                        'solarSize'=>$solarSizeText,
                                        'batterySize'=>$batterySizeText,
                                        'month'=>$monthToText[$month],
                                        'totalSolarGeneration'=>number_format($totalSolarGeneration, 2, ".", ","),
                                        'totalEnergyFromGrid'=>number_format($totalEnergyFromGrid, 2, ".", ","),
                                        'totalBill'=>number_format($totalMonthlyBillCost[$month],2, ".",","),
                                        'energyCharges'=>number_format($totalEnergyCharges,2, ".",","),
                                        'demandCharges'=>number_format($totalDemandChargeMonth,2, ".",","),
                                        'criticalPeakCharges'=>number_format($totalCriticalPeakCharges,2, ".",","),
                                        'CPPIncentive'=>number_format($CPPIncentiveAmount,2, ".",","),
                                        'fixedCharges'=>number_format($fixedChargeValue,2, ".",","),
                                        'totalEnergyExport'=>number_format($totalEnergyExport, 2, ".",","),
                                        'totalIncomeEE'=>number_format($totalIncomeEE,2, ".",","),
                                        'lowerThresholdCross'=>$lowerThresholdCount,
                                        'upperThresholdCross'=>$upperThresholdCount,
                                        'estimatedTimeGridResiliency'=>$spareBatteryStorageKWH/$avgHourlyUsage
                                    );
                                    
                                    $totalDemandChargeMonth = 0;
                                    $totalCriticalPeakCharges = 0;
                                    $CPPIncentiveAmount = 0;
                                    $totalEnergyCharges = 0;
                                    $totalEnergyExport = 0;
                                    $totalEnergyFromGrid = 0;
                                    $totalBatteryStorage = 0;
                                    $totalSolarGeneration = 0;
                                    $totalIncomeEE = 0;
                                    $lowerThresholdCount = 0;
                                    $upperThresholdCount = 0;
                                    $fixedChargeMonth = 0;
                                    // _DX($criticalPeakCharges);
                                    
                                    _D($month);
                                    _D($totalEnergyFromGrid);
                                    _DX($annualData);
                                }
                            }
                            
                        }
                        
                    }
                }
            }
        }
    }
}
_DX($annualData);

$annualData = $clsAnalysis->calculateAnnualData($annualData);

$time_end = microtime(true);
$execution_time = ($time_end - $time_start)/60;
_D($execution_time);
ob_end_clean();
if(!empty($annualData)){
    $smarty->assign('finalSummary',$annualData);
    $smarty->assign('execution_time',$execution_time);
    /*$filename = 'analysis'.str_replace(" ","_",$clsAnalysis->siteName).'.csv';
     $output = fopen("php://output", 'w') or die("Can't open php://output");
     header("Content-Type:application/csv");
     header("Content-Disposition:attachment;filename=" . $filename);
     fputcsv($output, array(
     'Solar Size',
     'Battery Size',
     'Month',
     'Annual Solar Generation',
     'Annual Energy procured from Grid (KWH)', // Annual energy demand from grid
     'Total Cost',
     'Cost of Energy from Grid', // Total cost of energy from grid
     'Cost of Demand Charges from Grid', // Total cost of demand from grid
     'Cost of Critical PEak Charges', // Total cost of critical charges
     'CPP Incentive', // total cost for CPP Incentive
     'fixedCharges', // Fixed
     'Annual Energy Export', // Annual energy exported to grid
     'NEM Incentive' // Total income from exported energy
     ));
     
     foreach($annualData as $solarSize=>$allBattery){
     foreach($allBattery as $month=>$analysis){
     foreach($analysis as $row){
     fputcsv($output, $row);
     }
     }
     
     $emaptyLine = array(
     '','','','','','','','','','','','',''
     );
     fputcsv($output, $emaptyLine);
     $headerLine = array(
     'Solar Size',
     'Battery Size',
     'Month',
     'Annual Solar Generation',
     'Annual Energy procured from Grid (KWH)', // Annual energy demand from grid
     'Total Cost',
     'Cost of Energy from Grid', // Total cost of energy from grid
     'Cost of Demand Charges from Grid', // Total cost of demand from grid
     'Cost of Critical PEak Charges', // Total cost of critical charges
     'CPP Incentive', // total cost for CPP Incentive
     'fixedCharges', // Fixed
     'Annual Energy Export', // Annual energy exported to grid
     'NEM Incentive' // Total income from exported energy
     );
     fputcsv($output, $headerLine);
     }
     
     
     
     fclose($output) or die("Can't close php://output");
     
     exit;*/
}
if (isset($clsAnalysis->error) && ! empty($clsAnalysis->error)) {
    
    $smarty->assign('error', implode("<br/>", $clsAnalysis->error));
}
$smarty->assign('upperThreshold',$upperThreshold);
$smarty->assign('lowerThreshold',$lowerThreshold);
$smarty->assign('allRateSchedule',$allRateSchedule);
$smarty->assign('currentModule','analysis');
$smarty->assign('currentPage','newanalysisvertical');
$smarty->assign('title','Analysis');
$smarty->assign('pageHeader','Analysis');
$smarty->assign('pageSubHeader','New Solar + Battery Analysis (Vertical Format)');
$smarty->assign('clsAnalysis',$clsAnalysis);
$smarty->display('middle/analysisHorizontal.tpl');

?>