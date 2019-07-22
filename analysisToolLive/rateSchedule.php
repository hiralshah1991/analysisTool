<?php
include ("lib/common.php");

if($_SESSION['uid'] == ''){
    redirect("login.php");
}

include ("model/rateSchedule.cls.php");

$clsRateSchedule = new rateSchedule();

//_DX($clsRateSchedule);

if($_POST['submit'] == 1){
    if($clsRateSchedule->saveRateSchedule()){
        header("Location: rateScheduleList.php");
        die();
    }
}
if($_GET['rsid'] && is_numeric($_GET['rsid'])){
    $clsRateSchedule->getRateScheduleInformation($_GET['rsid']);
}
//_D($clsRateSchedule);
$monthRange = array(
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'october',
    11 => 'November',
    12 => 'December'
    
);



$smarty->assign('timeRange',$clsRateSchedule->timeRange);
$smarty->assign('monthRange',$monthRange);
$smarty->assign('currentModule','rateSchedule');
$smarty->assign('currentPage','rateSchedule');
$smarty->assign('title','Rate Schedule');
$smarty->assign('pageHeader','Rate Schedule');
$smarty->assign('pageSubHeader','Add/Edit Rate Schedule');
$smarty->assign('clsRateSchedule',$clsRateSchedule);
$smarty->display('middle/rateSchedule.tpl');
?>