<?php
require_once 'phpfunctions.php';
session_start();
//return json format
header('Content-Type: application/json;charset=utf-8');

include_once("Connections/V6UpgradeDatabase.php");
mysql_select_db($database_V6UpgradeDatabase,$V6UpgradeDatabase);
$act =   $_GET['act'];
$lvnum = $_GET['lv'];//get ajax data 'lv'
$table = $_GET['table'];
$jarray = array();//使用array儲存結果，再以json_encode一次回傳

switch($act){
case 'first':{
	if($lvnum != 0){
		if($lvnum==5){
			$_SESSION['table']="device_05dns_software";
		}else if($lvnum==8){
			$_SESSION['table']="device_08web_software";
		}else if($lvnum==9){
			$_SESSION['table']="device_09email_software";
		}else if($lvnum==10){
			$_SESSION['table']="device_10ftp_software";
		}else if($lvnum==11){
			$_SESSION['table']="device_11switch_os";
		}else if($lvnum==12){
			$_SESSION['table']="device_12router_os";
		}
		$table = $_SESSION['table'];  	
		//$query = "SELECT DISTINCT Search_menufactor FROM device_01load_balancer";
		$query = "SELECT DISTINCT Search_menufactor FROM `$table`";
      //將資料表(table) 存入session
        $result = mysql_query($query, $V6UpgradeDatabase);
        while ($row = mysql_fetch_assoc($result)) {
            $jarray[] = $row;        
        }
	}else{
		echo $query;
		return;
	}
	echo json_encode($jarray);
	return;
	break;
	}
case 'second':{
	if($lvnum != 0){
		$brand = $table;                  //$brand = second時的table值(廠商)
		$_SESSION['brand'] = $brand;
	    $table = $_SESSION['table'];      //$table = first時的table值(資料表)
		$query = "SELECT DISTINCT  `Search_version` FROM  `$table` WHERE  `Search_menufactor` =  '$brand'";
		//$query = "SELECT DISTINCT  `Search_code` FROM  `device_01load_balancer` WHERE  `Search_menufactor` =  'F5'";
		//$query = "SELECT DISTINCT 'Search_code' FROM '$table' WHERE 'Search_menufactor' = '廠商''";
        $result = mysql_query($query, $V6UpgradeDatabase);
        while ($row = mysql_fetch_assoc($result)) {
            $jarray[] = $row;        
        }
	}else{
		echo $query;
		return;
	}
	echo json_encode($jarray);
	return;
	break;
	}
case 'third':{
		if($lvnum != 0){
		$_SESSION['version'] = $table; //code
		$query = "SELECT DISTINCT Search_menufactor FROM `$table`";
        $result = mysql_query($query, $V6UpgradeDatabase);
        while ($row = mysql_fetch_assoc($result)) {
            $jarray[] = $row;        
        }
	}else{
		echo $query;
		return;
	}
	echo json_encode($jarray);
	return;
	break;
	}
}
?>