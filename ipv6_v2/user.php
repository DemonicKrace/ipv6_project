<?php
	//chech for username & password
	function checkUsernamePassword($user,$pw){

		$username = array(
		"user1" => "abocom",
		"user2" => "apache",
		"user3" => "cisco",
		"user4" => "dell",
		"user5" => "dlink",
		"user6" => "netfos",
		"user7" => "f5",
		"user8" => "fz",
		"user9" => "fortinet",
		"user10" => "hp",
		"user11" => "ibm",
		"user12" => "isc",
		"user13" => "juniper",
		"user14" => "microsoft",
		"user15" => "novell",
		"user16" => "oracle",
		"user17" => "servicepro",
		"user18" => "vsftpd"

		);

	$password = array(
		"user1" => "abocom",
		"user2" => "apache",
		"user3" => "cisco",
		"user4" => "dell",
		"user5" => "dlink",
		"user6" => "netfos",
		"user7" => "f5",
		"user8" => "fz",
		"user9" => "fortinet",
		"user10" => "hp",
		"user11" => "ibm",
		"user12" => "isc",
		"user13" => "juniper",
		"user14" => "microsoft",
		"user15" => "novell",
		"user16" => "oracle",
		"user17" => "servicepro",
		"user18" => "vsftpd"

		);

		/*
		echo "user = $user <br> pw = $pw";

		echo "username <br>";
		foreach($username as $key => $value) {
			echo "key = $key , value = $value <br>";
		}

		echo "password <br>";
		foreach($password as $key => $value) {
			echo "key = $key , value = $value <br>";
		}
		*/

		if( ($user == $username["user1"] && $pw == $password["user1"]) ||
			($user == $username["user2"] && $pw == $password["user2"]) ||
			($user == $username["user3"] && $pw == $password["user3"]) ||
			($user == $username["user4"] && $pw == $password["user4"]) ||
			($user == $username["user5"] && $pw == $password["user5"]) ||
			($user == $username["user6"] && $pw == $password["user6"]) ||
			($user == $username["user7"] && $pw == $password["user7"]) ||
			($user == $username["user8"] && $pw == $password["user8"]) ||
			($user == $username["user9"] && $pw == $password["user9"]) ||
			($user == $username["user10"] && $pw == $password["user10"]) ||
			($user == $username["user11"] && $pw == $password["user11"]) ||
			($user == $username["user12"] && $pw == $password["user12"]) ||
			($user == $username["user13"] && $pw == $password["user13"]) ||
			($user == $username["user14"] && $pw == $password["user14"]) ||
			($user == $username["user15"] && $pw == $password["user15"]) ||
			($user == $username["user16"] && $pw == $password["user16"]) ||
			($user == $username["user17"] && $pw == $password["user17"]) ){
			//echo "true";
			return true;
		}else{
			//echo "false";
			return false;
		}
	}
?>