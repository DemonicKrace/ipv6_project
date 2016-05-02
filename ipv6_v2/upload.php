<?php

	session_start();

	$upload = false;
	$user = "";
	$pw = "";

//	echo "1";
	require_once("user.php");

	if(isset($_POST["username"]) && isset($_POST["password"])){
		$user = $_POST["username"];
		$pw = $_POST["password"];
	}

	if(isset($_SESSION["username"]) && isset($_SESSION["password"])){

//		echo "session_username = " . $_SESSION["username"] ."<br>";
//		echo "session_pw = " . $_SESSION["password"] ."<br>";	

		if(checkUsernamePassword($_SESSION["username"],$_SESSION["password"])){
			$upload = true;
//			echo "a";
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
//			echo "b";
		}else{
			session_destroy();
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

<script src="http://code.jquery.com/jquery-1.4.2.min.js" type="text/javascript"></script>
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
								<table style='font-size: 12pt;
							    border-style: solid;
							    border-color: #45543D;
							    text-align: center;'>";
							for($i = 2; $i <= sizeof($dir) - 1 ; $i++){
								$filenames = "$path/$dir[$i]" ;
								$file = $dir[$i];
//								$dir[$i] = iconv('big5' , 'utf-8' , $dir[$i] );  
								//$dir[$i] = utf8_encode($dir[$i]);
								echo "<tr>";
								echo "<td> $file </td>";
								echo "<td> ". filesize($filenames) / 1000 . 'Kb' . "</td>";                                 //檔案名稱                       
					            echo "<td>" . date ("Y/m/d H:i:s",filemtime($filenames)) . "</td>";  			 //修改時間   
								
					            echo "<td>";
									echo "<a href='$path/$file' onclick =\"return window.confirm('確定要下載? " . $dir[$i] . "?')\"><img src='images/download.png' title='Download'/></a>";
									echo "<a href='delete_process.php?file=$dir[$i]' onclick =\"return window.confirm('確定要刪除? " . $dir[$i] . "?')\"><img src='images/delete.png' title='Delete'/></a>";
					            echo "</td>";
					            echo "</tr>";
							}
							echo "</table></div>";
						}
				}else{
					echo "<h1>帳號or密碼有誤!<br><a href='update_login.php'>請重新登入!</a></h1>";
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


<!--

<div class='uploadButton' onclick='selectFile()'>
						    	選擇檔案
						    	<input type='file' name='fileToUpload' id='file' style='opacity:0; width:1px'>
						    </div>
						    <div class='uploadButton' onclick='checkFile()'>
							    上傳檔案
						    	<input type='submit' name='submit' onclick='checkFile()' style='opacity:0; width:1px'>
						    </div><br/><br/>	
						    (檔案上限10MB)
-->