<?php 
include ("lib/common.php");

include("model/user.cls.php");
$clsUser = new User();
$errorMsg = "";

if(isset($_SESSION['uid']) && is_numeric($_SESSION['uid'])){
    redirect('index.php');
    
}
if($clsUser->submit == 1){
    $isLogin = $clsUser->login();
    if(!$isLogin){
        unset($_SESSION['uid']);
        $errorMsg = "Your username and password doesn't match";
    }else{
        $_SESSION['uid'] = $clsUser->id;
        $clsUser->setUserProfile($_SESSION['uid']);
        redirect('index.php');
        
    }
}

$smarty->assign('errorMsg',$errorMsg);

$smarty->assign('title','Gridscape | Solar Analysis Tool');

$smarty->display('middle/login.tpl');

?>