<?php
	//chech for username & password
	
	//echo checkUsernamePassword("apple","apple");

	function checkUsernamePassword($user,$pw){
/*
AboCom
Apple
ASUS
AVM International
BEC technologies
Billion
Bintec-Elmeg
BUFFALO
CERIO
Comtrend
DrayTek
D-Link
FireBrick Ltd
Linksys
NetComm
Netgear
Technicolor
TP-LINK
VisionNet
Zoom
ZyXEL
*/

	$username = array(
		"user1" => "abocom",
		"user2" => "apple",
		"user3" => "asus",
		"user4" => "avm",
		"user5" => "bec",
		"user6" => "billion",
		"user7" => "bintec-elmeg",
		"user8" => "buffalo",
		"user9" => "cerio",
		"user10" => "comtrend",
		"user11" => "draytek",
		"user12" => "d-link",
		"user13" => "firebrick",
		"user14" => "linksys",
		"user15" => "netcomm",
		"user16" => "netgear",
		"user17" => "technicolor",
		"user18" => "tp-link",
		"user19" => "visionnet",
		"user20" => "zoom",
		"user21" => "zyxel"

		);

	$password = array(
		"user1" => "abocom",
		"user2" => "apple",
		"user3" => "asus",
		"user4" => "avm",
		"user5" => "bec",
		"user6" => "billion",
		"user7" => "bintec-elmeg",
		"user8" => "buffalo",
		"user9" => "cerio",
		"user10" => "comtrend",
		"user11" => "draytek",
		"user12" => "d-link",
		"user13" => "firebrick",
		"user14" => "linksys",
		"user15" => "netcomm",
		"user16" => "netgear",
		"user17" => "technicolor",
		"user18" => "tp-link",
		"user19" => "visionnet",
		"user20" => "zoom",
		"user21" => "zyxel"

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
			($user == $username["user17"] && $pw == $password["user17"]) ||
			($user == $username["user18"] && $pw == $password["user18"]) ||
			($user == $username["user19"] && $pw == $password["user19"]) ||
			($user == $username["user20"] && $pw == $password["user20"]) ||
			($user == $username["user21"] && $pw == $password["user21"]) ){
			//echo "true";
			return true;
		}else{
			//echo "false";
			return false;
		}
	}
?>