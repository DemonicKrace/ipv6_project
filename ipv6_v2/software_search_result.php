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
<title>軟體搜尋</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
<script type="text/javascript" src="jquery.js"></script>

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
		<h2>IPv6軟體支援查詢</h2>
		<?php
			session_start();
		?>
		<div style="padding-left:250px; width:670;">
			<?php 
				require_once("Connections/V6UpgradeDatabase.php");

				if(isset($_SESSION['table']))
					$q_table = $_SESSION['table'];
				else
					$q_table = "";

				if(isset($_SESSION['brand']))
					$q_brand = $_SESSION['brand'];
				else
					$q_brand = "";

				if(isset($_SESSION['version']))
					$q_version = $_SESSION['version'];
				else
					$q_version = "";

				//$q_version = "";



			/*$query = "SELECT * FROM `$q_table` WHERE Search_menufactor='$q_brand' ORDER BY Search_timeset DESC";
			mysql_select_db($database_V6UpgradeDatabase,$V6UpgradeDatabase);
			$result = mysql_query($query,$V6UpgradeDatabase);
			$row_result = mysql_fetch_assoc($result);*/

			//start searching option
				/*
				if($q_brand == "" && $q_code == "")
					$query = "SELECT * FROM `$q_table` ORDER BY Search_timeset DESC";
				else if($q_code == "" && $q_version == "")
					$query = "SELECT * FROM `$q_table` WHERE Search_menufactor='$q_brand' ORDER BY Search_timeset DESC";
				else if($q_version == "")
					$query = "SELECT * FROM `$q_table` WHERE Search_menufactor='$q_brand' AND Search_code='$q_code' ORDER BY Search_timeset DESC";
				else
					$query = "SELECT * FROM `$q_table` WHERE Search_menufactor='$q_brand' AND Search_code='$q_code' AND Search_version ='$q_version' ORDER BY Search_timeset DESC";
				*/
				if($q_brand == "")
					$query = "SELECT * FROM `$q_table` ORDER BY Search_timeset DESC";
				else if($q_version == "")
					$query = "SELECT * FROM `$q_table` WHERE Search_menufactor='$q_brand' ORDER BY Search_timeset DESC";
				else
					$query = "SELECT * FROM `$q_table` WHERE Search_menufactor='$q_brand' AND Search_version ='$q_version' ORDER BY Search_timeset DESC";

				mysql_select_db($database_V6UpgradeDatabase,$V6UpgradeDatabase);
				$result = mysql_query($query,$V6UpgradeDatabase);
				$row_result = mysql_fetch_assoc($result);
			
			?>


			<?php $count = "" ; 
				if($row_result=="") $count = 0; else $count = 1;
			?>

			<?php if($row_result=="")echo "<h1>No Data!</h1>"; //無資料時，之後須印有支援表格
				else do{
			?>
	
			<?php if($count == 1){ ?>

			<div style=" height:110px;">
				<table border="2" style="word-break:break-all;" >
				    <tr >
				        <td width="139px"><h3>設備</h3></td>
				        <td width="166px"><h3>品牌</h3></td>
<!--				        <td width="166px"><h3>型號</h3></td> -->
				        <td width="204px"><h3>版本</h3></td>
				        <td width="138px"><h3>可否支援</h3></td>
				    </tr>
				</table>
			</div>
			<div style="width:670;">
				<table border="2" style="word-break:break-all;" >
			
				<?php }?>
			
			   	<tr>
			    	<td width="139px">&nbsp;<?php echo $row_result['Search_type']; ?> &nbsp;</td>
			        <td width="166px">&nbsp;<?php echo $row_result['Search_menufactor']; ?> &nbsp;</td>
<!--			        <td width="166px">&nbsp;<?php //echo $row_result['Search_code']; ?> &nbsp;</td> -->
			        <td width="204px">&nbsp;<?php echo $row_result['Search_version']; ?> &nbsp;</td>
			        <td width="138px">&nbsp;<?php echo $row_result['Search_upgradable']=="1"?"可支援":"不可支援"; ?> &nbsp;</td>
			    </tr>
				
				<?php 
					$count++; }
					while($row_result=mysql_fetch_assoc($result));
				?>

				</table>
			</div>
		
			
		</div>
		<br>
		<?php 
			if($count != 0){
				echo "<h3 >一共有";
				echo $count -1 ;
				echo "筆資料</h3>"; 
			}
		?>

	</div>
</div>

<div id="copyright" class="container">
	<h1><p>本網站建置經費由財團法人台灣網路資訊中心-TWNIC 贊助</p></h1>
	<h2><p>&copy;Design by <a href="http://www.mcu.edu.tw" target="_blank">MCU</a>銘傳大學製作</p></h2>
</div>
</body>
</html>
<?php 
	 mysql_free_result($result);
	 session_unset();
?> 

