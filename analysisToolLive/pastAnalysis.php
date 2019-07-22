<?php
include ("lib/common.php");
if($_SESSION['uid'] == ''){
    redirect("login.php");
}
include ("model/analysisList.cls.php");

$clsAnalysisList = new analysisList();

$analysisDetail = $clsAnalysisList->getAnalysisDetail();
if(is_array($analysisDetail) && !empty($analysisDetail)){
   
    $smarty->assign('analysisDetail',$analysisDetail[0]);
  
}
if($_GET['filePath'] && $_GET['filePath'] != ""){
    header('Content-Description: File Transfer');
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.basename($_GET['filePath']).'"');
    readfile($_GET['filePath']);
    exit;
   
}

$smarty->assign('lower_threshold',$analysisDetail[0]['lower_threshold']);
$smarty->assign('upper_threshold',$analysisDetail[0]['upper_threshold']);

$smarty->assign('currentModule','analysis');
$smarty->assign('currentPage','pastanalysis');
$smarty->assign('title','Analysis Detail');
$smarty->assign('pageHeader','Analysis Detail');
$smarty->assign('pageSubHeader','Past Analysis Detail');
$smarty->assign('clsAnalysis',$clsAnalysisList);
//$smarty->debugging = true;
$smarty->display('middle/pastAnalysis.tpl');

?>