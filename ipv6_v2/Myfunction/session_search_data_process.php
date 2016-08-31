<?
/*
Author: DemonicKrace
Date: 2016/08/20
Description: 
	#自定義函數
*/

session_start();

//處理第1個下拉式選單(#myParentSelect)選取時，對應session的處理
function first_act($lvnum){

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
}

//清除session的查詢資料
function reset_session_table_query_data(){

	$_SESSION['table'] = "";
	$_SESSION['brand'] = "";
	$_SESSION['code'] = "";
	$_SESSION['version'] = "";

}


?>