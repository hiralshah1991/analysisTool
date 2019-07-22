<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
include ("lib/common.php");
include ("model/analysisFontanaMonthly.cls.php");

$time_start = microtime(true);
$clsAnalysis = new analysis();

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
           
           
            $seasonMonthArray = array("winter"=>array(10,11,12,1,2,3,4,5),"summer"=>array(6,7,8,9));
            $weekEndArray = array('Sat','Sun');
            //For Winter season
            
            $winterSeasonArray  = array(10,11,12,1,2,3,4,5);
            
            $winterTimePeriodArray = array('OnPeak','OffPeak','MidPeak');
            
            $winterWeekdayPeriodArray = array(
                "OnPeak" => array(),
                "OffPeak" => array(22,22.15,22.3,22.45,
                                   23,23.15,23.3,23.45,
                                   0,0.15,0.3,0.45,
                                   1,1.15,1.3,1.45,
                                   2,2.15,2.3,2.45,
                                   3,3.15,3.3,3.45,
                                   4,4.15,4.3,4.45,
                                   5,5.15,5.3,5.45,
                                   6,6.15,6.3,6.45,
                                   7,7.15,7.3,7.45),
                "MidPeak" => array(8,8.15,8.3,8.45,
                                   9,9.15,9.3,9.45,
                                   10,10.15,10.3,10.45,
                                   11,11.15,11.3,11.45,
                                   12,12.15,12.3,12.45,
                                   13,13.15,13.3,13.45,
                                   14,14.15,14.3,14.45,
                                   15,15.15,15.3,15.45,
                                   16,16.15,16.3,16.45,
                                   17,17.15,17.3,17.45,
                                   18,18.15,18.3,18.45,
                                   19,19.15,19.3,19.45,
                                   20,20.15,20,3,20.45,
                                   21,21.15,21.3,21.45)
               
            );
            $winterWeekendPeriodArray = array(
                "OnPeak"=>array(),
                "OffPeak" => array(0,0.15,0.3,0.45,
                                   1,1.15,1.3,1.45,
                                   2,2.15,2.3,2.45,
                                   3,3.15,3.3,3.45,
                                   4,4.15,4.3,4.45,
                                   5,5.15,5.3,5.45,
                                   6,6.15,6.3,6.45,
                                   7,7.15,7.3,7.45,
                                   8,8.15,8.3,8.45,
                                   9,9.15,9.3,9.45,
                                   10,10.15,10.3,10.45,
                                   11,11.15,11.3,11.45,
                                   12,12.15,12.3,12.45,
                                   13,13.15,13.3,13.45,
                                   14,14.15,14.3,14.45,
                                   15,15.15,15.3,15.45,
                                   16,16.15,16.3,16.45,
                                   17,17.15,17.3,17.45,
                                   18,18.15,18.3,18.45,
                                   19,19.15,19.3,19.45,
                                   20,20.15,20.3,20.45,
                                   21,21.15,21.3,21.45,
                                   22,22.15,22.3,22.45,
                                   23,23.15,23.3,23.45),
                "MidPeak" => array(),
                "CriticalPeak" => array()
                
            );
            
            $winterEnergyRate = array(
                "MidPeak" => 0.06238,
                "OffPeak"  => 0.05413,
                "CriticalPeak" => 1.37482
            );
            $winterDemadRate = array(
                "NC" => 18.29,
                "MidPeak" => 0,
                "OffPeak"  => 0,
                "CriticalPeak" => 0
            );
            
            //For Summare Season
            
            $summerSeasonArray = array(6,7,8,9);
            
            $summerTimePeriodArray = array('OnPeak','OffPeak','MidPeak');
            
            
            $summerWeekdayPeriodArray = array(
                "OnPeak" => array(12,12.15,12.3,12.45,
                    13,13.15,13.3,13.45,
                    14,14.15,14.3,14.45,
                    15,15.15,15.3,15.45,
                    16,16.15,16.3,16.45,
                    17,17.15,17.3,17.45),
                "OffPeak" => array(23,23.15,23.3,23.45,
                                   0,0.15,0.3,0.45,
                                   1,1.15,1.3,1.45,
                                   2,2.15,2.3,2.45,
                                   3,3.15,3.3,3.45,
                                   4,4.15,4.3,4.45,
                                   5,5.15,5.3,5.45,
                                   6,6.15,6.3,6.45,
                                   7,7.15,7.3,7.45),
                "MidPeak" => array(8,8.15,8.3,8.45,
                                    9,9.15,9.3,9.45,
                                    10,10.15,10.3,10.45,
                                    11,11.15,11.3,11.45,
                                    18,18.15,18.3,18.45,
                                    19,19.15,19.3,19.45,
                                    20,20.15,20.3,20.45,
                                    21,21.15,21.3,21.45,
                                    22,22.15,22.3,22.45),
                /*"CriticalPeak" => array(14,14.15,14.3,14.45,
                                        15,15.15,15.3,15.45,
                                        16,16.15,16.3,16.45,
                                        17,17.15,17.3,17.45)*/
            );
            $summerWeekendPeriodArray = array(
                "OnPeak" => array(),
                "OffPeak" => array(0,0.15,0.3,0.45,
                                   1,1.15,1.3,1.45,
                                   2,2.15,2.3,2.45,
                                   3,3.15,3.3,3.45,
                                   4,4.15,4.3,4.45,
                                   5,5.15,5.3,5.45,
                                   6,6.15,6.3,6.45,
                                   7,7.15,7.3,7.45,
                                   8,8.15,8.3,8.45,
                                    9,9.15,9.3,9.45,
                                    10,10.15,10.3,10.45,
                                    11,11.15,11.3,11.45,
                                    12,12.15,12.3,12.45,
                                    13,13.15,13.3,13.45,
                                    14,14.15,14.3,14.45,
                                    15,15.15,15.3,15.45,
                                    16,16.15,16.3,16.45,
                                    17,17.15,17.3,17.45,
                                    18,18.15,18.3,18.45,
                                      19,19.15,19.3,19.45,
                                      20,20.15,20,3,20.45,
                                      21,21.15,21.3,21.45,
                                      22,22.15,22.3,22.45,
                                      23,23.15,23.3,23.45),
                "MidPeak" => array(),
                "CriticalPeak" => array()
            );
            $summerEnergyRate = array(
                "OnPeak" => 0.09851,
                "MidPeak" => 0.06614,
                "OffPeak"  => 0.0499,
                "CriticalPeak" => 1.37453
                
            );
            $summerDemadRate = array(
                "NC" => 18.29,
                "OnPeak" => 15.14,
                "MidPeak" => 2.98,
                "OffPeak"  => 0,
                "CriticalPeak" => 0
            );
            
            
            $CPPIncentive = -11.44;
            $fixedCharges = 462.59;
            
            
            $criticalPeakDays = array(1,8,15,20,28);
            $criticalPeakHours = array(
                                   14,14.15,14.3,14.45,
                                   15,15.15,15.3,15.45,
                                   16,16.15,16.3,16.45,
                                   17,17.15,17.3,17.45);
            
            $summary = array();
            $arrResultUsageFinal = $clsAnalysis->getUsageArrayHorizontal($usageDataFile);
            array_shift($arrResultUsageFinal);
            $totalAnnualUsage = array_pop($arrResultUsageFinal);
            $incomeRate = 0;
            if(isset($_POST['incomeRate']) && $_POST['incomeRate'] != 0){
                
                $incomeRate = $_POST['incomeRate'];
                //_DX($incomeRate);
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
                    - 1,
                    $_POST['bs']
                );
            }
            
            
            if ($_POST['analysisStructure'] == 'annual') {
                foreach ($solarSizeArray as $solarSize) {
                    $arrToProcess = $clsAnalysis->getGenerationProductionAray($solarSize, $address, $arrResultUsageFinal);
                    
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
                                if(in_array($day,$criticalPeakDays) && in_array($hour,$criticalPeakHours)){
                                    $criticalPeakCharges[$month][$day][$hour] = $energyFromGrid[$month][$day][$hour] * $rateArr['CriticalPeak'];
                                }
                                $totalCriticalPeakCharges+=$criticalPeakCharges[$month][$day][$hour];
                                
                               //calculate peak for demand rates
                               
                                foreach($$nameOfTPArray as $tp=>$tpHour){
                                   
                                    if($tp == $timePeriod && in_array($hour,$tpHour)){
                                        $demandTPArray[$tp][$month][$day][$hour] = $energyFromGrid[$month][$day][$hour] * 4;
                                    }
                                }
                                if($totalDaysOFMonth == $day && $hour == 23.45){
                                    
                                   
                                    
                                    $calculateDaysOFMonth = 1;
                                    
                                    //Trace highest value (highest peak in kwh) for each time period
                                    $offPeakDayPick[$month] = array();
                                    $onPeakDayPick[$month] = array();
                                    $midPeakDayPick[$month] = array();
                                    
                                    $onPeakDay = 0;
                                    $onPeakDayPeak = 0;
                                    $onPeakDayHour = 0;
                                    
                                    $midPeakDay = 0;
                                    $midPeakDayPeak = 0;
                                    $midPeakDayHour = 0;
                                    
                                    $offPeakDay = 0;
                                    $offPeakDayPeak = 0;
                                    $offPeakDayHour = 0;
                                    foreach($demandTPArray as $kDemandTP=>$vDemandTP){
                                        foreach($vDemandTP as $kMonth=>$vMonth){
                                            $offPeakDayPick[$kMonth] = array();
                                            $onPeakDayPick[$kMonth] = array();
                                            $midPeakDayPick[$kMonth] = array();
                                            if($kDemandTP == 'OffPeak'){
                                                $isFirstOffPeakDay = true;
                                                $offPeakDayPeak = 0;
                                            }elseif($kDemandTP == 'OnPeak'){
                                                $isFirstOnPeakDay = true;
                                                $onPeakDayPeak = 0;
                                            }elseif($kDemandTP == 'MidPeak'){
                                                $isFirstMidPeakDay= true;
                                                $midPeakDayPeak = 0;
                                            }
                                           
                                            foreach($vMonth as $kDay=>$vDay){
                                                foreach($vDay as $kHour=>$valKWH){
                                                    if($kDemandTP == 'OffPeak'){
                                                        if($isFirstOffPeakDay){
                                                            $isFirstOffPeakDay = false;
                                                            $offPeakDayPeak = $valKWH;
                                                            $offPeakDayHour= $kHour;
                                                            $offPeakDay = $kDay;
                                                        }
                                                        if($valKWH >= $offPeakDayPeak){
                                                            $offPeakDayPeak = $valKWH;
                                                            $offPeakDayHour= $kHour;
                                                            $offPeakDay = $kDay;
                                                        }
                                                    }
                                                    elseif($kDemandTP == 'OnPeak'){
                                                        if($isFirstOnPeakDay){
                                                            $isFirstOnPeakDay = false;
                                                            $onPeakDayPeak = $valKWH;
                                                            $onPeakDayHour= $kHour;
                                                            $onPeakDay = $kDay;
                                                        }
                                                        if($valKWH >= $onPeakDayPeak){
                                                            $onPeakDayPeak = $valKWH;
                                                            $onPeakDayHour= $kHour;
                                                            $onPeakDay = $kDay;
                                                        }
                                                    }
                                                    elseif($kDemandTP == 'MidPeak'){
                                                        if($isFirstMidPeakDay){
                                                            $isFirstMidPeakDay = false;
                                                            $midPeakDayPeak = $valKWH;
                                                            $midPeakDayHour= $kHour;
                                                            $midPeakDay = $kDay;
                                                        }
                                                        if($valKWH >= $midPeakDayPeak){
                                                            $midPeakDayPeak = $valKWH;
                                                            $midPeakDayHour= $kHour;
                                                            $midPeakDay = $kDay;
                                                        }
                                                    }
                                                }
                                                $offPeakDayPick[$kMonth] = array('peakDay'=>$offPeakDay,'peakVal'=>$offPeakDayPeak,'peakHour'=>$offPeakDayHour);
                                                $onPeakDayPick[$kMonth] = array('peakDay'=>$onPeakDay,'peakVal'=>$onPeakDayPeak,'peakHour'=>$onPeakDayHour);
                                                $midPeakDayPick[$kMonth] = array('peakDay'=>$midPeakDay,'peakVal'=>$midPeakDayPeak,'peakHour'=>$midPeakDayHour);
                                                
                                                
                                            }
                                            
                                        }
                                        
                                    }
                                    $monthlyPeak[$month] = array();
                                    //get monthly peak
                                    $monthlyPeak[$month]['OffPeak'] = $offPeakDayPick[$month];
                                    $monthlyPeak[$month]['OnPeak'] = $onPeakDayPick[$month];
                                    $monthlyPeak[$month]['MidPeak'] = $midPeakDayPick[$month];
                                   
                                    
                                    $highestPeak = 0;
                                    $highestPeakTP = '';
                                    //get highest peak from all monthly peaks
                                    if($monthlyPeak[$month]['OffPeak']['peakVal'] >= $monthlyPeak[$month]['OnPeak']['peakVal']){
                                        $highestPeak = $monthlyPeak[$month]['OffPeak']['peakVal'];
                                        $highestPeakTP = 'OffPeak';
                                    }else{
                                        $highestPeak = $monthlyPeak[$month]['OnPeak']['peakVal'];
                                        $highestPeakTP = 'OnPeak';
                                    }
                                    if($highestPeak < $monthlyPeak[$month]['MidPeak']['peakVal']){
                                        $highestPeak = $monthlyPeak[$month]['MidPeak']['peakVal'];
                                        $highestPeakTP = 'MidPeak';
                                    }
                                    
                                    $demandRateArrayName = $season."DemadRate";
                                    $tpArrayName = $season."TimePeriodArray";
                                    
                                    $demandChargesArr = $$demandRateArrayName;
                                    foreach($monthlyPeak[$month] as $kTpName=>$vTpVal){
                                        if($kTpName == $highestPeakTP){
                                            
                                            $demandCharges[$month][$kTpName] = $demandChargesArr['NC'] * $vTpVal['peakVal'] + $demandChargesArr[$kTpName] * $vTpVal['peakVal'];;
                                          
                                        }else{
                                            $demandCharges[$month][$kTpName] = $demandChargesArr[$kTpName] * $vTpVal['peakVal'];
                                        }
                                    }
                                    $totalDemandCharge = 0;
                                    foreach($demandCharges[$month] as $kDemandTp=>$vDemand){
                                        $totalDemandChargeMonth+=$vDemand;
                                    }
                                    
                                    
                                    //calculate CPP Incentive
                                    $CPPIncentiveAmount = $monthlyPeak[$month][$highestPeakTP]['peakVal'] * $CPPIncentive;
                                    $totalMonthlyBillCost[$month] = $fixedCharges + $totalDemandChargeMonth + $totalEnergyCharges + $totalCriticalPeakCharges + $CPPIncentiveAmount;
                                    
                                    
                                    $batterySizeText = $batterySize;
                                    $solarSizeText = $solarSize;
                                    
                                    if($NBNS){
                                        $batterySizeText = 'NBNS';
                                        $solarSizeText = 'NBNS';
                                    }
                                    
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
                                        'fixedCharges'=>number_format($fixedCharges,2, ".",","),
                                        'totalEnergyExport'=>number_format($totalEnergyExport, 2, ".",","),
                                        'totalIncomeEE'=>number_format($totalIncomeEE,2, ".",",")
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
                                }
                            }
                            
                            
                        }
                       
                    }
                }
            }
        }
    }
}
//_DX($annualData);
$annualData = $clsAnalysis->calculateAnnualData($annualData);

//_Dx($annualData);
$time_end = microtime(true);
$execution_time = ($time_end - $time_start)/60;
ob_end_clean();
_D($execution_time);
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
$smarty->assign('currentModule','analysis');
$smarty->assign('currentPage','newanalysis');
$smarty->assign('title','Analysis');
$smarty->assign('pageHeader','Analysis');
$smarty->assign('pageSubHeader','New Solar + Battery Analysis');
$smarty->assign('clsAnalysis',$clsAnalysis);
$smarty->display('middle/analysisHorizontal.tpl');

?>