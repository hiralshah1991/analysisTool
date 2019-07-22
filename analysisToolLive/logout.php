<?php
include ("lib/common.php");
unset($_SESSION);
session_destroy();
redirect("login.php");
?>