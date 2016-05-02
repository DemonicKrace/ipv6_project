<?php
//	echo "0";

	session_start();

	$upload = false;
	$user = "";
	$pw = "";

//	echo "1";


	require_once("user.php");

	//echo "after require_once('user.php')";


	if(isset($_POST["username"]) && isset($_POST["password"])){
		$user = $_POST["username"];
		$pw = $_POST["password"];
//		echo "_POST['username'] = $_POST['username']";
//		echo "_POST['password'] = $_POST['password']";
	}

	if(isset($_SESSION["username"]) && isset($_SESSION["password"])){

//		echo "session_username = " . $_SESSION["username"] ."<br>";
//		echo "session_pw = " . $_SESSION["password"] ."<br>";	

		if(checkUsernamePassword($_SESSION["username"],$_SESSION["password"])){
			$upload = true;
//			echo "a<br/>";
		}else{
			session_destroy();
		}
	}else{

//		echo "user = " . $user ."<br>";
//		echo "pw = " . $pw ."<br>";	

		if(checkUsernamePassword($user,$pw)){
			$_SESSION["username"] = $user;
			$_SESSION["password"] = $pw;
			$upload = true;
//			echo "b<br/>";
		}else{
			session_destroy();
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
		<script language="JavaScript" type="text/javascript">
		    var fileSize = 0; //檔案大小
			var SizeLimit = 10 * 1024 * 1024;  //上傳上限，單位:byte

		    function checkFile() {
		        var f = document.getElementById("file");

		        //FOR IE
		        if ($.browser.msie) {
		            var img = new Image();
		            img.onload = checkSize;
		            img.src = f.value;
		        }
		        //FOR Firefox,Chrome
		        else {
		            fileSize = f.files.item(0).size;
		            checkSize();
		        }
		    }

		    //檢查檔案大小
		    function checkSize() {
		        //FOR IE FIX
		        if ($.browser.msie) {
		            fileSize = this.fileSize;

		        }
		        if (fileSize > SizeLimit) {
		            Message((fileSize / 1024).toPrecision(4), (SizeLimit / 1024).toPrecision(2));
		        } else {
		            document.FileForm.submit();
		        }
		    }
		    function Message(file, limit) {
		        var msg = "您所選擇的檔案大小已超過上傳上限(10MB)!"
		        alert(msg);
		    }

		    function selectFile(){
		    	document.getElementById("file").click();    	
		    }

		</script>
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
									<?php
									
										if($upload){
											echo "<h1>廠商 ". $_SESSION["username"] .  " 資料上傳區</h1>" . 
												 "<a href='update_login.php?logout=true'><button class='lougoutButton'>登出</button></a><br><br><br><br>" . 
												 "<form action='upload_process.php' method='post' enctype='multipart/form-data'>
												    <input type='file' name='fileToUpload' id='file' >
												    <input type='submit' name='submit' onclick='checkFile()'>
												    <font size='1'>(檔案上限10MB)</font>
												    <br/>
												  </form>";
												  
										  		$path = "upload/" . $_SESSION["username"];
												$dir = scandir($path);
												$_SESSION['path'] = $path;
												if(sizeof($dir) > 2){
													//echo "path = $path <br>";
													echo "<br/><div align='center'>
														<table class='downloadTable'>";
													for($i = 2; $i <= sizeof($dir) - 1 ; $i++){
														$filenames = "$path/$dir[$i]" ;
														$file = $dir[$i];
														//$dir[$i] = iconv('big5' , 'utf-8' , $dir[$i] );  
														//$dir[$i] = utf8_encode($dir[$i]);
														echo "<tr>";
														echo "<td> $file </td>";
														echo "<td> ". filesize($filenames) / 1000 . 'Kb' . "</td>";                                 //檔案名稱                       
											            echo "<td>" . date ("Y/m/d H:i:s",filemtime($filenames)) . "</td>";  			 //修改時間   
														
											            echo "<td>";
															echo "<a href='$path/$file' onclick =\"return window.confirm('確定要下載? " . $dir[$i] . "?')\"><img height='30px' width='40px'src='images/download.png' title='Download'/></a>";
															echo "<a href='delete_process.php?file=$dir[$i]' onclick =\"return window.confirm('確定要刪除? " . $dir[$i] . "?')\"><img height='30px' width='40px' src='images/delete.png' title='Delete'/></a>";
											            echo "</td>";
											            echo "</tr>";
													}
													echo "</table></div>";
												}
										}else{
											echo "<h1>帳號or密碼有誤!<br><a href='update_login.php'>請重新登入!</a></h1>";
										}
										
									?>
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