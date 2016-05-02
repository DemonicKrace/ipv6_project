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
			<div class="container_login">
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
					</form><!-- form -->
				</section><!-- content -->
			</div><!-- container -->
		</div>
</div>
<div id="copyright" class="container">
	<h1><p>本網站建置經費由財團法人台灣網路資訊中心-TWNIC 贊助</p></h1>
	<h2><p>&copy;Design by <a href="http://www.mcu.edu.tw" target="_blank">MCU</a>銘傳大學製作</p></h2>
</div>
</body>
</html>
