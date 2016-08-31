<?php
	require_once("Connections/V6UpgradeDatabase.php");
	session_start();
	$q_table = "V6_HOME";
	$q_manufacturer = $_POST[''];
	$q_model = "";
	$query = "SELECT * FROM $q_table";

	$support = "√";
	$not_support = "X";
	$data_count = 0;
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>IPv6分享器搜尋系統</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<script type="text/javascript" src="jquery.js"></script>
		<style type="text/css">
		.tiltleField td{
			border: solid;
		}
		</style>
	</head>
	<body class="subpage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">
						<div class="row">
							<div class="12u">
<!-- Logo -->
									<h1><a href="index.html" id="logo">IPv6分享器搜尋系統</a></h1>

								<!-- Nav -->
									<nav id="nav">
										<a href="index.html">首頁</a>
										<a href="device.php">設備搜尋</a>
										<a href="update_login.php">廠商上傳</a>
										<a href="manufacturer.html">聯絡廠商</a>
									</nav>


							</div>
						</div>
					</header>
				</div>

			<!-- Content -->
				<div id="content-wrapper">
					<div id="content">
						<div class="container">
							<div class="row">
								<div class="12u">
									<section style="background: #fff;margin:0;">				<h1 style="font-size: xx-large;margin-bottom: 5%;">支援項目說明</h1>
										<ul style="text-align:left;">
										    <ul><li>Static 靜態模式，固定的ip位址</li></ul>
										    <ul><li>PPPoE(Point-to-Point Protocol Over Ethernet)，乙太網上的對等協定，是將對等協定（PPP）封裝在乙太網（Ethernet）框架中的一種網路隧道協定。</li></ul>
										    <ul><li>DHCPv6 一個用來配置工作在IPv6網絡上的IPv6主機所需的IP位址、IP前綴和/或其他配置的網絡協議。</li></ul>
										    <ul><li>6to4 一種轉送機制，設計目的是為了從網際協議版本 4（IPv4）過渡到版本 6（IPv6）。這個協定可以讓IPv6封包，不必經過外部通道（tunnel）就可以穿越IPv4網際網路。為了能夠使6to4網路能夠與原生IPv6網路之間溝通，必須建立一個特定的轉送伺服器。</li></ul>
										    <ul><li>Tunnel 通道（Tunneling）是一個用來連結IPv4與IPv6的機制。為了連通IPv6網際網路，一個孤立主機或網路需要使用現存IPv4的基礎設施來攜帶IPv6封包。這可由將IPv6封包裝入IPv4封包的通道協議來完成，實際上就是將IPv4當成IPv6的連結層。</li></ul>
										    <ul><li>6rd是建立在6to4的機制上，提供ISP快速布建IPv6網路的機制。</li></ul>
										    <ul><li>Tspc 即Tunnel Broker 模式，利用既有的 IPv4 網路連結到 IPv4 轉換 IPv6 的伺服器，透過 IPv4 的網路建立一條特殊通道來傳輸 IPv6 的資料。</li></ul>
										    <ul><li>Aiccu (Automatic IPv6 Connectivity Client Utility)，一種6in4 穿隧參數後自動組態設定的工具軟體。</li></ul>
										    <ul><li>In_sell 是否市售</li></ul>
										    <ul><li>Cable 電纜數據線</li></ul>
										    <ul><li>Dsl 數位用戶迴路（Digital Subscriber Line），是通過銅線或者本地電話網提供數位連線的一種技術。</li></ul>
										    <ul><li>Router/AP 路由功能及無線存取</li></ul>
										</ul>
									</section>
									<!-- Main Content -->
									<section>
										<p>√ = 支援該功能 &nbsp;&nbsp;&nbsp;X = 不支援該功能</p>
										<table style="width:100%;border-collapse: collapse; word-break:break-all">
											
											<tr class="tiltleField">
												<td>廠商</td>
												<td>型號</td>
												<td>版本</td>
												<td>Static</td>
												<td>Pppoe</td>
												<td>Dhcpv6</td>

												<td>6to4</td>
												<td>Tunnel</td>
												<td>6rd</td>

												<td>Tspc</td>
												<td>Aiccu</td>
												<td>In_sell</td>

												<td>Cable</td>
												<td>Dsl</td>
												<td>Router/AP</td>
											</tr>


											<?php

												if(isset($_SESSION['manufacturer']) && !empty($_SESSION['manufacturer'])){
													$q_manufacturer = $_SESSION['manufacturer'];
													$query = "SELECT * FROM $q_table WHERE manufacturer = '$q_manufacturer'";
													if(isset($_SESSION["model"]) && !empty($_SESSION["model"])){
														$q_model = $_SESSION["model"];
														$query = "SELECT * FROM $q_table WHERE manufacturer = '$q_manufacturer' AND model = '$q_model'";
													}
												}


												//echo $query . "\n";
												
												//mysql_select_db($database_V6UpgradeDatabase,$V6UpgradeDatabase);				
												
												//$result = mysql_query($query,$V6UpgradeDatabase);

												$result = mysqli_query($V6UpgradeDatabase,$query);
												
												//$row = mysql_fetch_assoc($result)
												
												while($row_result = mysqli_fetch_assoc($result)){
											?>

											<tr>
												<td >&nbsp;<?php echo $row_result['manufacturer']; ?> &nbsp;</td>
												<td >&nbsp;<?php echo $row_result['model']; ?> &nbsp;</td>
												<td >&nbsp;<?php echo $row_result['version']; ?> &nbsp;</td>

												<td >&nbsp;<?php echo $row_result['static_ipv6']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
												<td >&nbsp;<?php echo $row_result['pppoe']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
												<td >&nbsp;<?php echo $row_result['dhcpv6_client']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
										
												<td >&nbsp;<?php echo $row_result['6to4']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
												<td >&nbsp;<?php echo $row_result['tunnel']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
												<td >&nbsp;<?php echo $row_result['6rd']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
											
												<td >&nbsp;<?php echo $row_result['tspc']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
												<td >&nbsp;<?php echo $row_result['aiccu']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
												<td >&nbsp;<?php echo $row_result['in_sell']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
											
												<td >&nbsp;<?php echo $row_result['cable']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
												<td >&nbsp;<?php echo $row_result['dsl']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
												<td >&nbsp;<?php echo $row_result['rw_access_points']=="1"?"$support":"$not_support"; ?> &nbsp;</td>
											</tr>

											<?php
												$data_count++;
												}
												echo "共有" . $data_count ."筆資料";

												$_SESSION["manufacturer"] = "";

												$_SESSION["model"] = "";
											?>
										</table>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Copyright -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="8u 12u(mobile)">

							</div>
							<div class="4u 12u(mobile)">

							</div>
						</div>
					</footer>
				</div>
				<h1 align="center"><p>本網站建置經費由財團法人台灣網路資訊中心-TWNIC 贊助</p></h1>
			<!-- Copyright -->
				<div id="copyright">
					<p>©Design by <a href="http://www.mcu.edu.tw" target="_blank">MCU</a>銘傳大學製作</p>
				</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>