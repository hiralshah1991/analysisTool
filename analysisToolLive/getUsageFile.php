<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
include ("lib/common.php");
include("model/usageGenerationData.cls.php");

$clsUsageGeneration = new usageGenerationData();

$finalArray = array();

if(isset($clsUsageGeneration->submit) && $clsUsageGeneration->submit == 1){
    



$generationFileName = $clsUsageGeneration->uploadGenerationData();

$utilityFileName = $clsUsageGeneration->uploadUtilityInOutData();
if(!empty($generationFileName) && $generationFileName != ''){
    $generationFinalArray = $clsUsageGeneration->getGenerationData($generationFileName);
    
}

if(!empty($generationFinalArray) && !empty($utilityFileName)){
    $finalArray = $clsUsageGeneration->getFinalArrayForUsageFile($generationFinalArray,$utilityFileName);
    
}
/* Download Usage File */

if(!empty($finalArray)){
    $filename = 'loadData'.str_replace(" ",'_',$clsUsageGeneration->siteName).'.csv';
    //$filename = 'loadDataFresnoPoliceRegionalTrainingCenter.csv';
    $output = fopen("php://output", 'w') or die("Can't open php://output");
    header("Content-Type:application/csv");
    header("Content-Disposition:attachment;filename=" . $filename);
    /*fputcsv($output, array(
     'Service Aggrement','StartDateTime','EndDateTime','Usage','Usage Unit','Cost','Currency Unit','Avg. Temperature','Temperature Unit','Event Flags','Peak Demand','Demand Unit'
     ));*/
    foreach ($finalArray as $row) {
        fputcsv($output, $row);
    }
    fclose($output) or die("Can't close php://output");
    exit;
}


}


if (isset($clsUsageGeneration->error) && ! empty($clsUsageGeneration->error)) {    
    $smarty->assign('error', implode("<br/>", $clsAnalysis->error));
}
$smarty->assign('clsUsageGeneration',$clsUsageGeneration);
$smarty->assign('currentModule','usageGeneration');
$smarty->assign('currentPage','usageGeneration');
$smarty->assign('title','Usage Generation');
$smarty->assign('pageHeader','Generate Usage Data');
$smarty->assign('pageSubHeader',"Generate Site's usage data");
$smarty->assign('clsAnalysis',$clsAnalysis);
$smarty->display('middle/getUsageFile.tpl');
?>