<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//
session_start();
require_once("user.php");


$uploadOk = 1;
$uploadSuccess = 0;


if(checkUsernamePassword($_SESSION["username"],$_SESSION["password"])){
    $target_dir = "upload/" . $_SESSION["username"] . "/";

//    $target_file = $target_dir . iconv('big5' , 'utf-8' , $_FILES['fileToUpload']['name']) ;
//  $target_file = $target_dir . basename($_FILES['fileToUpload']['name']) ;
    $target_file = $target_dir . $_FILES['fileToUpload']['name'];

//    $file = iconv('big5' , 'utf-8' , $_FILES['fileToUpload']['name']) ;


/*
    echo "target_dir = $target_dir" . "<br>";
    echo "target_file = $target_file" . "<br>";
    echo "FILES = " . $_FILES['fileToUpload']['name'] . "<br>";
    echo "iconv(utf8,big5,target_file) = " . iconv("utf-8", "big5", $target_file) . "<br>";
    echo "iconv(big5,utf8,target_file) = " . iconv("big5", "utf-8", $target_file) . "<br>";
*/
    //$FileType = pathinfo($target_file,PATHINFO_EXTENSION);


  
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 10 * 1024 * 1024) {
        echo "Error, your file is too large.";
        $uploadOk = 0;
    }



    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Error, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". $_FILES['fileToUpload']['name'] . " has been uploaded.";
            $uploadSuccess = 1;
        } else {
            echo "Error, there was an error uploading your file.";
        }
    }
    
}else{

    echo "Error,you are not login!";
}
    echo "<br/> 3 秒後 自動跳轉 ...";
    echo '<meta http-equiv=REFRESH CONTENT="3; url=upload.php">';

?>