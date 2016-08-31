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

//mysql_select_db($database_V6UpgradeDatabase,$V6UpgradeDatabase);

$act =  $_GET['act'];//process for action

//$_SESSION["table"] = "V6_HOME";//the table which one is want to search
$table = "V6_HOME";

$manufacturer = $_GET['manufacturer'];//get ajax data 'manufacturer'
$model =  $_GET["model"];

$jarray = array();//to store return data 

/*
echo "act = $act ,";
echo "manufacturer = $manufacturer ,";
echo "model = $model ";
*/

switch($act){

	case 'first':{

		$_SESSION["manufacturer"] = "";

		$_SESSION["model"] = "";

		if($manufacturer != "請選擇"){

			$_SESSION["manufacturer"] = $manufacturer;// store to session
			
			$query = "SELECT DISTINCT model FROM $table WHERE manufacturer = '$manufacturer'";

			//$result = mysql_query($query, $V6UpgradeDatabase);    
			
			$result = mysqli_query($V6UpgradeDatabase,$query);    

			//$row = mysql_fetch_assoc($result)

		    while ($row = mysqli_fetch_assoc($result)) {
		        $jarray[] = $row;
		    }

		    echo json_encode($jarray);
			return;
			break;
			
		} 
		
		
	}
	case 'second':{

		$_SESSION["model"] = "";

		if($_GET["model"] != "請選擇"){

			// store to session
			$_SESSION["model"] = $model;

		 	echo json_encode($jarray);
			return;
			break;
		}

	}
	default:
		break;		
}

?>