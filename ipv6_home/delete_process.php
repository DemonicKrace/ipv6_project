<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//	mb_internal_encoding('utf-8');

	session_start();
	$userdir = $_SESSION['path'];


//    $filename = basename($_GET["file"]);
//  $filename = mb_convert_encoding($_GET["file"], "big5", "utf8");
//    $filename = iconv("BIG5", "UTF-8",$_GET["file"]);
	$filename = $_GET["file"];


    $file = $userdir . '/' . $filename ;
//    echo "$file <br>";
    if (unlink($file)){
		echo iconv("utf-8", "big5",$filename) .  " has been deleted!";    	
	}
	else{
		echo ("Error deleting $filename");
	}
    echo "<br/> 3 秒後 自動跳轉 ...";
    echo '<meta http-equiv=REFRESH CONTENT="3;url=upload.php">';
?>