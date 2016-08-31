<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_V6UpgradeDatabase = "localhost";
$database_V6UpgradeDatabase = "ipv6_database";
$username_V6UpgradeDatabase = "root";
$password_V6UpgradeDatabase = "root";

//$V6UpgradeDatabase = mysql_pconnect($hostname_V6UpgradeDatabase, $username_V6UpgradeDatabase, $password_V6UpgradeDatabase) or trigger_error(mysql_error(),E_USER_ERROR);


$V6UpgradeDatabase = mysqli_connect($hostname_V6UpgradeDatabase,$username_V6UpgradeDatabase,$password_V6UpgradeDatabase,$database_V6UpgradeDatabase);

//mysql_query("SET NAMES 'utf8'",$V6UpgradeDatabase);

mysqli_query($V6UpgradeDatabase,"SET NAMES 'utf8'");

?>