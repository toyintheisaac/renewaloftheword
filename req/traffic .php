<?php
$username='0';

if(isset($_COOKIE['GuestUserId'])&&!empty($_COOKIE['GuestUserId'])){
	
	
		$checkTEMP=$conn->query("SELECT * FROM all_traffic WHERE traffic_username='".$_COOKIE['GuestUserId']."' AND traffic_accountUsers='$username' AND traffic_source='$directedFrom2' ");
			$fetchTEMP = $checkTEMP->fetch_assoc();
					$GUEST_ip		= $fetchTEMP['traffic_ip'];
					$GuestCountry	= $fetchTEMP['traffic_country'];
					$GuestRegion	= $fetchTEMP['traffic_region'];
	
	 if($checkTEMP->num_rows<1){
		 setcookie('GuestUserId', $_COOKIE['GuestUserId'], $StrCurrentTime + (3600 * 20), "/");
	 }

}else{
$GUEST_ip	=get_client_ip_server();
 
	$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$GUEST_ip")); 
$GuestRegion 			= $geo["geoplugin_regionName"];
$GuestCountry 			= $geo["geoplugin_countryName"]; 
 

if(empty($GUEST_ip)){
	$GUEST_ip			= $geo["geoplugin_request"];
}else{
	$GUEST_ip			=$GUEST_ip;
}
}




function sanitize($conn, $data){
	return mysqli_real_escape_string($conn, $data);
}


function setGuestUser(){
	global $conn;
	global $GUEST_ip;
	global $StrCurrentTime;
	global $GuestCountry;
	global $GuestRegion;
	global $username;
	global $directedFrom2;
		if(!empty($username)){
$Codinn = '';
$keys = array_merge(range(0, 9), range('a', 'z'));
for ($i = 0; $i < 15; $i++){
	$Codinn .= $keys[array_rand($keys)];
}
	$randCode	= $Codinn;
	$rand		=mt_rand(10000, 9999999);	
		$GuestNotLoginUSER	=	$randCode."_".$rand; 
			
if(isset($_COOKIE['GuestUserId'])&&!empty($_COOKIE['GuestUserId'])){
	$GuestNotLoginSet =$_COOKIE['GuestUserId'];
		$checkTEMP=$conn->query("SELECT * FROM all_traffic WHERE traffic_username='".$_COOKIE['GuestUserId']."' AND traffic_accountUsers='$username' AND traffic_source='$directedFrom2' ");
	if($checkTEMP->num_rows<1){
		$conn->query($INSERTtempUsers= "INSERT INTO all_traffic(traffic_id, traffic_username, traffic_accountUsers, traffic_ip, traffic_country, traffic_region, traffic_count, traffic_date, traffic_source) VALUES ('','$GuestNotLoginSet','$username','$GUEST_ip','$GuestCountry','$GuestRegion','1','$StrCurrentTime','$directedFrom2')");
	}
	if($checkTEMP->num_rows>=1){
		if($conn->query("UPDATE all_traffic SET traffic_count=traffic_count+'1' WHERE traffic_username='$GuestNotLoginSet' AND traffic_accountUsers='$username' AND traffic_source='$directedFrom2' ")==true){
			setcookie('GuestUserId', $GuestNotLoginSet, $StrCurrentTime + (3600 * 6020), "/");
		}
	}
		return $_COOKIE['GuestUserId'];
}else{
	$checkTEMP =$conn->query("SELECT * FROM all_traffic WHERE traffic_username='$GuestNotLoginUSER' AND traffic_accountUsers='$username' AND traffic_source='$directedFrom2' ");
	
	if($checkTEMP->num_rows<1){
		$INSERTtempUsers= "INSERT INTO all_traffic(traffic_id, traffic_username, traffic_accountUsers, traffic_ip, traffic_country, traffic_region, traffic_count, traffic_date, traffic_source) VALUES ('','$GuestNotLoginUSER','$username','$GUEST_ip','$GuestCountry','$GuestRegion','1','$StrCurrentTime','$directedFrom2')";
		if($conn->query($INSERTtempUsers)==true){
			if(setcookie('GuestUserId', $GuestNotLoginUSER, $StrCurrentTime + (3600 * 6020), "/")){
				return $GuestNotLoginUSER;
			}
		}
	}else{
		$INSERTtempUsers= "UPDATE all_traffic SET traffic_count=traffic_count+'1' WHERE traffic_username='$GuestNotLoginUSER' AND traffic_accountUsers='$username' AND traffic_source='$directedFrom2' ";
		if($conn->query($INSERTtempUsers)==true){
			if(setcookie('GuestUserId', $GuestNotLoginUSER, $StrCurrentTime + (3600 * 6020), "/")){
				return $GuestNotLoginUSER;
			}
		}
	}
} }
}

setGuestUser();
?>