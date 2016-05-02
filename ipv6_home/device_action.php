<?php
require_once 'phpfunctions.php';
session_start();
//return json format
header('Content-Type: application/json;charset=utf-8');

include_once("Connections/V6UpgradeDatabase.php");
mysql_select_db($database_V6UpgradeDatabase,$V6UpgradeDatabase);
$act =   $_GET['act'];//process for action

$_SESSION["table"] = "V6_HOME";//the table which one is want to search
$table = $_SESSION['table'];

$jarray = array();//to store return data 

switch($act){
case 'first':{
	$manufacturer = $_GET['manufacturer'];//get ajax data 'manufacturer'
	if($manufacturer != "請選擇(*必選)"){
		$_SESSION["manufacturer"] = $manufacturer;// store to session
		$query = "SELECT DISTINCT model FROM $table WHERE manufacturer = '$manufacturer'";
		$result = mysql_query($query, $V6UpgradeDatabase);    
	    while ($row = mysql_fetch_assoc($result)) {
	        $jarray[] = $row;
	    }
	}else{
		$_SESSION["manufacturer"] = "";
	}    
	echo json_encode($jarray);
	return;
	break;
	}
case 'second':{
	if($_GET["model"] != "請選擇"){
		$_SESSION["model"] = $_GET["model"];// store to session
	}else{
		$_SESSION["model"] = "";
	}
 	echo json_encode($jarray);
	return;
	break;
	}
}

?>