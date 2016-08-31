<?php
/*
Author: DemonicKrace
Date: 2016/08/20
Description: 
	#process from device.php ajax and return json data.
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

switch($act){
	case 'first':{

		$_SESSION['table'] = "";
		$_SESSION['brand'] = "";
		$_SESSION['code'] = "";

		if($lvnum != 0){
			first_act($lvnum);
			/*
			switch ($lvnum) {
				case 1:
					$_SESSION["table"] = "device_01load_balancer";
					break;
				case 2:
					$_SESSION["table"] = "device_02firewall";
					break;
				case 3:
					$_SESSION["table"] = "device_03router";
					break;
				case 4:
					$_SESSION["table"] = "device_04server";
					break;
				case 5:
					$_SESSION["table"] = "device_05dns_software";
					break;
				case 6:
					$_SESSION["table"] = "device_06second_layer_switches";
					break;
				case 7:
					$_SESSION["table"] = "device_07third_layer_switches";
					break;
				case 8:
					$_SESSION["table"] = "device_08web_software";
					break;
				case 9:
					$_SESSION["table"] = "device_09email_software";
					break;
				case 10:
					$_SESSION["table"] = "device_10ftp_software";
					break;
				case 11:
					$_SESSION["table"] = "device_11switch_os";
					break;
				case 12:
					$_SESSION["table"] = "device_12router_os";
					break;
				default:
					break;
			}
			*/
			$table = $_SESSION['table'];  	
			
			$query = "SELECT DISTINCT Search_menufactor FROM `$table`";
	        
	        //$result = mysql_query($query, $V6UpgradeDatabase);
	        $result = mysqli_query($V6UpgradeDatabase,$query);
	        
	        //($row = mysql_fetch_assoc($result)

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

			$brand = $table;                  
			$_SESSION['brand'] = $brand;
		    $table = $_SESSION['table'];      
			$query = "SELECT DISTINCT  `Search_code` FROM  `$table` WHERE  `Search_menufactor` =  '$brand'";
			
	        //$result = mysql_query($query, $V6UpgradeDatabase);
	        $result = mysqli_query($V6UpgradeDatabase,$query);
	        
	        //($row = mysql_fetch_assoc($result)

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
			//此次操作無須Query
			$query = "SELECT DISTINCT Search_menufactor FROM `$table`";

	        //$result = mysql_query($query, $V6UpgradeDatabase);
	        $result = mysqli_query($V6UpgradeDatabase,$query);

	        //($row = mysql_fetch_assoc($result)

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