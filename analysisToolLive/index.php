<?php
include ("lib/common.php");
//_DX($_SESSION['uid']);

if($_SESSION['uid'] == ''){
    redirect("login.php");
}
$smarty->assign('pageHeader','Dashboard');
$smarty->assign('pageSubHeader','');
$smarty->assign('currentModule','dashboard');

$smarty->display('middle/index.tpl');
?>