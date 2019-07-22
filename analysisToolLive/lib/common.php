<?php
require_once('smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->cache_dir = 'templates_c';
session_start();
require_once "dbconnection.php";
require_once "functions.php";
//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;

global $sitePath;
$sitePath = "/var/www/html/analysisWI/analysisTool";
error_reporting(-1);


/*require_once "functions.php";*/


?>
