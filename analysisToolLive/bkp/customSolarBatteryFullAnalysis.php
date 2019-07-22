<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
include ("lib/common.php");

if($_SESSION['uid'] == ''){
    redirect("login.php");
}

include ("model/analysisFontanaMonthly.cls.php");

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
            
            $monthToText = array(8=>'Aug 2016',9=>'Sep 2016',10=>'Oct 2016',11=>'Nov 2016',12=>'Dec 2016',
                1=>'Jan 2017',2=>'Feb 2017',3=>'March 2017',4=>'Apr 2017',5=>'May 2017',6=>'Jun 2017',7=>'Jul 2017');
            
            if(isset($_POST['rateSchedule']) && $_POST['rateSchedule'] != ''){
                $rateSchedule = $clsAnalysis->getRateScheduleInformation($_POST['rateSchedule']);
                
            }else{
                $clsAnalysis->error[] = 'Please select rate schedule';
            }
            
            $lowerThreshold = $rateSchedule['lower_threshold'];
            $upperThreshold = $rateSchedule['upper_threshold'];
            $lowerThresholdKWH = $rateSchedule['lower_threshold']/4;
            $upperThresholdKWH = $rateSchedule['upper_threshold']/4;
            //_DX($upperThresholdKWH);
            $weekEndArray = array('Sat','Sun');
            $criticalPeakDays = array(1,8,15,20,28);
            
            //For Winter season
            $winterSeasonArray = json_decode($rateSchedule['s1_date_range'],1);
            $winterTimePeriodArray = json_decode($rateSchedule['s1_usage_times'],1);
            
            
            $winterWeekdayPeriodArray = json_decode($rateSchedule['s1_usage_time_range_weekdays'],1);
            $winterWeekdayCriticalPeakHours = $winterWeekdayPeriodArray['criticalpeak'];
            $winterWeekdayPeriodArray['criticalpeak'] = array();
            
            $winterWeekendPeriodArray = json_decode($rateSchedule['s1_usage_time_range_weekend'],1);
            $winterWeekendCriticalPeakHours = $winterWeekendPeriodArray['criticalpeak'];
            $winterWeekendPeriodArray['criticalpeak'] = array();
            
            $winterEnergyRate =  json_decode($rateSchedule['s1_usage_time_energy_charge'],1);
            
            $winterDemadRate = json_decode($rateSchedule['s1_usage_time_demand_charge'],1);
            $winterCPPIncentive = $rateSchedule['s1_CPP_incentive'];
            $winterFixedCharges = $rateSchedule['s1_fixed_charges'];
            
            
            //For Summer season
            $summerSeasonArray = json_decode($rateSchedule['s2_date_range'],1);
            $summerTimePeriodArray = json_decode($rateSchedule['s2_usage_times'],1);
            
            
            $summerWeekdayPeriodArray = json_decode($rateSchedule['s2_usage_time_range_weekdays'],1);
            $summerWeekdayCriticalPeakHours = $summerWeekdayPeriodArray['criticalpeak'];
            $summerWeekdayPeriodArray['criticalpeak'] = array();
            
            $summerWeekendPeriodArray = json_decode($rateSchedule['s2_usage_time_range_weekend'],1);
            $summerWeekendCriticalPeakHours = $summerWeekendPeriodArray['criticalpeak'];
            $summerWeekendPeriodArray['criticalpeak'] = array();
            
            $summerEnergyRate =  json_decode($rateSchedule['s2_usage_time_energy_charge'],1);
            $summerDemadRate = json_decode($rateSchedule['s2_usage_time_demand_charge'],1);
            
            $summerCPPIncentive = $rateSchedule['s2_CPP_incentive'];
            $summerFixedCharges = $rateSchedule['s2_fixed_charges'];
            
            $summary = array();
            $arrResultUsageFinal = $clsAnalysis->getUsageArrayHorizontal($usageDataFile);
            array_shift($arrResultUsageFinal);
            $totalAnnualUsage = array_pop($arrResultUsageFinal);
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
                $batterySizeArray = array(
                    //- 1,
                    $_POST['bs']
                );
            }
            
            
            if ($_POST['analysisStructure'] == 'annual') {
                foreach ($solarSizeArray as $solarSize) {
                    $arrToProcess = $clsAnalysis->getGenerationProductionAray($solarSize, $address, $arrResultUsageFinal);
                    //_DX($arrToProcess);
                    if (isset($arrToProcess) && ! empty($arrToProcess)) {
                        array_shift($arrToProcess);
                        $summary = array();
                        $calculateDaysOFMonth = 1;
                        foreach ($batterySizeArray as $batterySize) {
                            $calculateDaysOFMonth = true;
                            
                            
                            $NBNS = false;
                            $batteryStorage = $batterySize;
                            if ($batterySize == - 1) {
                                $NBNS = true;
                                $batterySize = 0;
                            }
                            $generation = array();
                            $demand = array();
                            $BS = array();
                            $totalEnergyExport = 0;
                            $totalEnergyFromGrid = 0;
                            $totalBatteryStorage = 0;
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
                            foreach($arrToProcess as $k => $v) {
                                $isWeekDay = true;
                                $isWeekEnd = false;
                                
                                $hour = $v[4];
                                $day = $v[3];
                                $month = $v[2];
                                $date = $v[1];
                                $year = date('Y',strtotime($v[1]));
                                $BS[$month][$day][$hour] = 0;
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
                                
                                if ($generation[$month][$day][$hour] + $batteryStorage > $demand[$month][$day][$hour]) { // generation + batteryStorage is greater than usage then charge the battery
                                    
                                    $batteryStorage = $generation[$month][$day][$hour] + $batteryStorage - $demand[$month][$day][$hour];
                                    
                                    if ($batteryStorage > $batterySize) {
                                        $energyExport[$month][$day][$hour] = $batteryStorage - $batterySize;
                                        $batteryStorage = $batterySize;
                                    }
                                } else {
                                    $energyFromGrid[$month][$day][$hour] = $demand[$month][$day][$hour] - ($generation[$month][$day][$hour] + $batteryStorage);
                                    $batteryStorage = 0;
                                }
                                $BS[$month][$day][$hour] = $batteryStorage;
                                $totalEnergyExport+= $energyExport[$month][$day][$hour];
                                $totalEnergyFromGrid+= $energyFromGrid[$month][$day][$hour];
                                $totalBatteryStorage+= $BS[$month][$day][$hour];
                                $totalSolarGeneration+= $generation[$month][$day][$hour];
                                $totalDemand+= $demand[$month][$day][$hour];
                                
                                if($energyFromGrid[$month][$day][$hour] > $lowerThresholdKWH && $energyFromGrid[$month][$day][$hour] < $upperThresholdKWH){
                                    $lowerThresholdCount++;
                                    $lowerThresholdKW[$month][$day][$hour] = $energyFromGrid[$month][$day][$hour] * 4;
                                    if($solarSize == 442 && $batterySize == 550){
                                        $lowerThresholdKWDisplay[$month][$day][$hour] = $energyFromGrid[$month][$day][$hour] * 4;
                                        $generationDisplay[$month][$day][$hour] = $generation[$month][$day][$hour];
                                        $loadDisplay[$month][$day][$hour] = $demand[$month][$day][$hour];
                                        $efgDisplay[$month][$day][$hour] = $energyFromGrid[$month][$day][$hour];
                                        $bsDisplay[$month][$day][$hour]= $BS[$month][$day][$hour];
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
                                $SOC[$month][$day][$hour] = $BS[$month][$day][$hour] * 100 / $batterySize;
                                $fullSummary[] = array($month,$day,$hour,$demand[$month][$day][$hour],$generation[$month][$day][$hour],$energyFromGrid[$month][$day][$hour],$BS[$month][$day][$hour],$energyExport[$month][$day][$hour],$SOC[$month][$day][$hour]);
                                if($totalDaysOFMonth == $day && $hour == 23.45){
                                    
                                    $calculateDaysOFMonth = 1;
                                    
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
                                    // _d($demandRatesPeak);
                                    
                                    
                                    //calculate demand rates
                                    
                                    
                                    $demandRateArrayName = $season."DemadRate";
                                    $tpArrayName = $season."TimePeriodArray";
                                    
                                    $demandChargesArr = $$demandRateArrayName;
                                    
                                    // _D($demandChargesArr);
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
                                    
                                    $fixedCharges = $season."FixedCharges";
                                    $totalMonthlyBillCost[$month] = $$fixedCharges + $totalDemandChargeMonth + $totalEnergyCharges + $totalCriticalPeakCharges + $CPPIncentiveAmount;
                                    
                                    
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
                                        'fixedCharges'=>number_format($$fixedCharges,2, ".",","),
                                        'totalEnergyExport'=>number_format($totalEnergyExport, 2, ".",","),
                                        'totalIncomeEE'=>number_format($totalIncomeEE,2, ".",","),
                                        'lowerThresholdCross'=>$lowerThresholdCount,
                                        'upperThresholdCross'=>$upperThresholdCount
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
                                    // _DX($criticalPeakCharges);
                                }
                            }
                            
                        }
                        
                    }
                }
            }
        }
    }
}

//_DX($fullSummary);

if(!empty($fullSummary)){
    $filename = 'fullAnalysis'.str_replace(" ","_",$clsAnalysis->siteName).'_'.$_POST['solarSize'].'_'.$_POST['bs'].'.csv';
    $output = fopen("php://output", 'w') or die("Can't open php://output");
    header("Content-Type:application/csv");
    header("Content-Disposition:attachment;filename=" . $filename);
    fputcsv($output, array(
        'Month',
        'Day',
        'Hour',
        'Load (KWH)',
        'Generation (KWH)',
        'FnergyFromGrid (KWH)',
        'BatteryStorage (KWH)',
        'EnergyExport (KWH)',
        'SOC (%)'
    ));
    
    foreach ($fullSummary as $k => $vArray) {
        
        //_DX($row);
        fputcsv($output, $vArray);
        
    }
    
    /*foreach($annualData as $solarSize=>$allBattery){
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
     }*/
    
    
    
    fclose($output) or die("Can't close php://output");
    
    exit;
    
}



if (isset($clsAnalysis->error) && ! empty($clsAnalysis->error)) {
    
    $smarty->assign('error', implode("<br/>", $clsAnalysis->error));
}
$smarty->assign('allRateSchedule',$allRateSchedule);
$smarty->assign('currentModule','analysis');
$smarty->assign('currentPage','newanalysis');
$smarty->assign('title','Analysis');
$smarty->assign('pageHeader','Analysis');
$smarty->assign('pageSubHeader','New Solar + Battery Analysis');
$smarty->assign('clsAnalysis',$clsAnalysis);
$smarty->display('middle/analysisHorizontal.tpl');

?>