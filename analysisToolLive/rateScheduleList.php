<?php
include ("lib/common.php");

if($_SESSION['uid'] == ''){
    redirect("login.php");
}

include ("model/rateSchedule.cls.php");
$clsRateSchedule = new rateSchedule();

if($_POST['submit'] == 1){
   // _DX($_POST);
   $status = '';
    if($_POST['inactiveRows'] == 1){
        $status = 'N';
    }elseif($_POST['activeRows'] == 1){
        $status = 'Y';
    }elseif($_POST['deleteRows'] == 1){
        $status = 'D';
    }elseif($_POST['copyRows'] == 1){
        $status = '';
    }
    if(is_array($_POST['rateSchedule']) && !empty($_POST['rateSchedule'])){
        if( $status != ''){
            $clsRateSchedule->setStatus($status,$_POST['rateSchedule']);
        }elseif($_POST['copyRows'] == 1){
            $clsRateSchedule->copyRateSchedule($_POST['rateSchedule']);
        }
            
    }
}

$rateScheduleList = $clsRateSchedule->getAllRateSchedule();

if (isset($clsRateSchedule->error) && ! empty($clsRateSchedule->error)) {
    
    $smarty->assign('error', implode("<br/>", $clsRateSchedule->error));
}
if (isset($clsRateSchedule->msg) && ! empty($clsRateSchedule->msg)) {
    
    $smarty->assign('msg', implode("<br/>", $clsRateSchedule->msg));
}
$smarty->assign('rateScheduleList',$rateScheduleList);
$smarty->assign('currentModule','rateSchedule');
$smarty->assign('currentPage','rateScheduleList');
$smarty->assign('title','Rate Schedule List');
$smarty->assign('pageHeader','Rate Schedule List');
$smarty->assign('pageSubHeader','All Rate Schedule');
$smarty->assign('clsRateSchedule',$clsRateSchedule);
$smarty->display('middle/rateScheduleList.tpl');
?>