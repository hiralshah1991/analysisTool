<?php
include ("lib/common.php");

if($_SESSION['uid'] == ''){
    redirect("login.php");
}

include ("model/analysisList.cls.php");

$clsAnalysisList = new analysisList();

$analysisList = $clsAnalysisList->getAnalysisList();

if(is_array($analysisList) && !empty($analysisList)){
    $smarty->assign('analysisList',$analysisList);
}
$smarty->assign('currentModule','analysis');
$smarty->assign('currentPage','pastanalysis');
$smarty->assign('title','Analysis List');
$smarty->assign('pageHeader','Analysis List');
$smarty->assign('pageSubHeader','All Past Analysis');
$smarty->assign('clsAnalysis',$clsAnalysisList);
$smarty->display('middle/pastAnalysisList.tpl');

?>