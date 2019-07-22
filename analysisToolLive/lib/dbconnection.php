<?php
class Connectdb{

public function __construct(){

	 $conn = "";
	 /*$servername = "localhost";
	 $username = "root";
	 $password = "";
	 $dbname="schoolmanagement";*/
	 $servername = "localhost";
	 $username = "hiral";
	 $password = "hiral@123";
	 $dbname="solarBatteryAnalysisDB";
	 // Create connection
	$this->conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($this->conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
}

}
?>
