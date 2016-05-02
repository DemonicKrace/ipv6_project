<?php
	session_start();
	session_unset();
?>
<!DOCTYPE HTML>
<!--
	Halcyonic by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>IPv6分享器搜尋系統</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<script type="text/javascript" src="jquery.js"></script>
			<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/skel-viewport.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
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

									<!-- Main Content -->
									<section>
										<h2>IPv6設備查詢</h2>	
										<h3><a href="brief_search.php"> 快速檢索 </a></h3>
										<form action="device_search_result.php" method="post"  name="Search" id="Search">

											<h1>
											<br />
											　廠商:
											<select id="myParentSelect" Style="Font-Size:20pt">
												<option value="">請選擇(*必選)</option>
											<?php
											    // 資料庫設定
											    require_once("Connections/V6UpgradeDatabase.php");
											    mysql_select_db($database_V6UpgradeDatabase,$V6UpgradeDatabase);
											    // 動態取得第一階層下拉式選單
											    //$query = "show tables";
												$query = "SELECT DISTINCT manufacturer FROM V6_HOME ";
											    $result = mysql_query($query,$V6UpgradeDatabase);
											    $j = 1;
												while ($row = mysql_fetch_assoc($result)) {
							           				   echo '<option value="' . $j++ . '">' . $row["manufacturer"] . '</option>' . "\n";
							        			}
							        			
											?>
											</select>
											<br />
											<br />
											　型號:
											<select id="myFirstChildSelect" Style="Font-Size:20pt" name="model">
												<option value="0">請選擇</option>
											</select>
											<br />
											<br />
											<script> 
											$(document).ready(function(){  
											 	//-------------------------第一層　廠商-------------------------------
											 	//當選擇廠商欄位時，處理第二層型號的欄位
											   	$('#myParentSelect').change(function(){  
												    //每次處理前先清空之前第二層型號的欄位
												    $('#myFirstChildSelect').empty().append("<option value=''>請選擇</option>");
													 
													var i=1;
													var j=0;
													$.ajax({  
														type:    "GET",  
														url:     "device_action.php",  
														//將data傳送至device_action.php
														//manufacturer: 廠商名稱，例:"TP-LINK" 	  
														data:    {act:'first',manufacturer: $('#myParentSelect option:selected').html()},
														datatype:  "json",

														success: function(result){  
															//當第一層回到預設值時，第二層回到預設位置
															if(result == ""){  
																$('#myFirstChildSelect').val($('option:first').val());//pseudo selector   
															}
															//依據第一層回傳的值去改變第二層的內容
															while(i<result.length+1){  
																$("#myFirstChildSelect").append("<option value='"+i+"'>"+result[j]['model']+"</option>");  
																i++;
																j++;
															}  
														},  
														error:  function(error){  
															alert("error"); 
														}  
													});
												});

												$('#myFirstChildSelect').change(function(){  
													$.ajax({  
														type:    "GET",  
														url:     "device_action.php",  
														//將data傳送至device_action.php
														//model:裝置型號 例:"FVigorFly 210"
														data:    {act:'second',model: $('#myFirstChildSelect option:selected').html()},
														datatype:  "json",  
														success: function(result){
															//已在device_action.php將model存入session
														},  
														error:  function(error){  
															alert("error"); 
														}  
													});
												});				
											});
											</script>
											<br />
											<br />
											<input Style="Font-Size:20pt; background-color:#45443D; color:#FFF" name="確認送出" type="submit" value="確認送出" /></h1>
										</form>

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

	</body>
</html>