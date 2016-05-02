<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : EntryWay 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140124

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>相容搜尋</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1></span><a href="index.html">支援IPv6軟硬體資料庫系統</a></h1>
		</div> 
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="hardware.php" accesskey="1" title="">IPv6硬體<br>支援查詢</a></li>
				<li><a href="software.php" accesskey="2" title="">IPv6軟體<br>支援查詢</a></li>
				<li><a href="device.php" accesskey="3" title="">IPv6相容<br>設備查詢</a></li>
				<li><a href="manufacturer.html" accesskey="4" title="">常用廠商<br>聯絡資料</a></li>
				<li><a href="update_login.php" accesskey="4" title="">廠商資料<br>更新上傳</a></li>
				<li><a href="http://interop.ipv6.org.tw/index.php" target="_blank" accesskey="5" title=""><img src="images/logo.png" height="80px" style=" margin-top:-1.5em"></a></li>
			</ul>
		</div>
	</div>
</div>

<div id="wel">
	<div class="container">
		<h2>IPv6相容設備查詢</h2>
		<div>
			<?php 
				require_once("Connections/V6UpgradeDatabase.php");
				session_start();

				if(isset($_SESSION['table']))
					$q_table = $_SESSION['table'];
				else 
					$q_table = "";

				if(isset($_SESSION['brand']))
					$q_brand = $_SESSION['brand'];
				else
					$q_brand = "";

				if(isset($_SESSION['code']))
					$q_code = $_SESSION['code'];
				else
					$q_code = "";
			
				$q_version = strtolower($_POST["version"]);

				
				/* 
				echo "q_table = " . "$q_table" ."<br>";
				echo "q_brand = " . "$q_brand" ."<br>";
				echo "q_code = " . "$q_code" ."<br>";
				echo "q_version = " . "$q_version" ."<br>";
				*/


				switch ($q_table) {
					case 'device_01load_balancer':
					case 'device_02firewall':
					case 'device_03router':
					case 'device_04server':
					case 'device_06second_layer_switches':
					case 'device_07third_layer_switches':				
					$query = "SELECT * FROM `$q_table` WHERE Search_menufactor='$q_brand' AND Search_code='$q_code' AND Search_version ='$q_version' ORDER BY Search_timeset DESC";
						break;
					case 'device_05dns_software':
					case 'device_08web_software':
					case 'device_09email_software':
					case 'device_10ftp_software':
					case 'device_11switch_os':
					case 'device_12router_os':
					$query = "SELECT * FROM `$q_table` WHERE Search_menufactor='$q_brand' AND Search_version ='$q_version' ORDER BY Search_timeset DESC";
						break;
					default:
					$query = "";
						break;
				}			

				//start searching option
//				$query = "SELECT * FROM `$q_table` WHERE Search_menufactor='$q_brand' AND Search_code='$q_code' AND Search_version ='$q_version'";
				if($query!=""){
					mysql_select_db($database_V6UpgradeDatabase,$V6UpgradeDatabase);				
					$result = mysql_query($query,$V6UpgradeDatabase);
					$row_result = mysql_fetch_assoc($result);
					if ($row_result['Search_upgradable']== "1"){

						echo "<h1>Acceptable</h1>";

						$id = $row_result['Search_id'];
						if ($row_result['Search_timeset'] == "")
							$count = 1;
						else
							$count = $row_result['Search_timeset'] + 1;
						mysql_query("UPDATE `$q_table` SET Search_timeset = '$count'  WHERE Search_id = '$id' ",$V6UpgradeDatabase);	
					}else{
						echo "<h1>Unacceptable</h1>";
					}
				}else{
					echo "<h1>資料輸入有誤！請重新輸入!</h1> <br \>";
				}
			?>

</div>
			
	</div>
</div>

<div id="copyright" class="container">
	<h1><p>本網站建置經費由財團法人台灣網路資訊中心-TWNIC 贊助</p></h1>
	<h2><p>&copy;Design by <a href="http://www.mcu.edu.tw" target="_blank">MCU</a>銘傳大學製作</p></h2>
</div>
</body>
</html>
<?php mysql_free_result($result); ?> 