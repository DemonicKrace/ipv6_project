<?php
	session_start();
	if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
		if($_GET["logout"]){
			session_destroy();
		}else{
			header("location: upload.php");
		}
	}
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
		<link rel="stylesheet" href="assets/css/login.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
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
									<center>
									<!-- Main Content -->
									<section id="content_login">
										<form action="upload.php" method="post">
											<h1>廠商登入</h1>
											<div>
												<input type="text" placeholder="Username" required="" id="username" name="username"/>
											</div>
											<div>
												<input type="password" placeholder="Password" required="" id="password" name="password" />
											</div>
											<div>
												<input type="submit" value="登入" />
												<a href="#">忘記帳號密碼?</a>
											</div>
										</form>
									</section>
									</center>
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