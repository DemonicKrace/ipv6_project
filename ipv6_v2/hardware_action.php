<?php
/*
Author: DemonicKrace
Date: 2016/08/20
Description: 
	#process from hardware.php ajax and return json data.
*/


session_start();
//return json format
header('Content-Type: application/json;charset=utf-8');

include_once("Connections/V6UpgradeDatabase.php");

include_once("Myfunction/session_search_data_process.php");

//mysql_select_db($database_V6UpgradeDatabase,$V6UpgradeDatabase);

$act =   $_GET['act'];
$lvnum = $_GET['lv'];
$table = $_GET['table'];
$jarray = array();

//$_SESSION['table'] //當下act 傳入選擇的項目
//$_SESSION['brand'] //品牌
//$_SESSION['code']  //型號

switch($act){
	case 'first':{

		$_SESSION['table'] = "";
		$_SESSION['brand'] = "";
		$_SESSION['code'] = "";

		if($lvnum != 0){
			first_act($lvnum);

		     //將資料表名稱(table) 存入session
			$table = $_SESSION['table'];  	
			//$query = "SELECT DISTINCT Search_menufactor FROM device_01load_balancer";
			$query = "SELECT DISTINCT Search_menufactor FROM `$table`";

	        //$result = mysql_query($query, $V6UpgradeDatabase);
	        $result = mysqli_query($V6UpgradeDatabase,$query);

	        //($row = mysql_fetch_assoc($result))

	        while ($row = mysqli_fetch_assoc($result)) {
	            $jarray[] = $row;        
	        }

	    	echo json_encode($jarray);
			return;
			break;
		}

	}
	case 'second':{

		$_SESSION['brand'] = "";
		$_SESSION['code'] = "";

		if($lvnum != 0){
			$brand = $table;                  //$brand = second時的table值(廠商)
			$_SESSION['brand'] = $brand;
		    $table = $_SESSION['table'];      //$table = first時的table值(資料表)
			$query = "SELECT DISTINCT  `Search_code` FROM  `$table` WHERE  `Search_menufactor` =  '$brand'";
			//$query = "SELECT DISTINCT  `Search_code` FROM  `device_01load_balancer` WHERE  `Search_menufactor` =  'F5'";

			//$result = mysql_query($query, $V6UpgradeDatabase);
	        $result = mysqli_query($V6UpgradeDatabase,$query);

	        //($row = mysql_fetch_assoc($result))

	        while ($row = mysqli_fetch_assoc($result)) {
	            $jarray[] = $row;        
	        }

	        echo json_encode($jarray);
			return;
			break;		
		}
	}
	case 'third':{

		$_SESSION['code'] = "";

		if($lvnum != 0){
			$_SESSION['code'] = $table;

			/*
			$query = "SELECT DISTINCT Search_menufactor FROM `$table`";

	        //$result = mysql_query($query, $V6UpgradeDatabase);

	        $result = mysqli_query($V6UpgradeDatabase,$query); 
	        
	        //($row = mysql_fetch_assoc($result))
			
	        while ($row = mysqli_fetch_assoc($result)) {
	            $jarray[] = $row;        
	        }
	        */

	    	echo json_encode($jarray);
			return;
			break;

		}
	}
	default:	
		break;
}
?>