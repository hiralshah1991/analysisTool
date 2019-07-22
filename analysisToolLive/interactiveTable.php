<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
error_reporting( E_ALL );
include ("lib/common.php");



$smarty->display('middle/interactiveTable.tpl');

?>