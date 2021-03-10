<?php

// Root Folder 
function dirHompg(){
	$current_page = $_SERVER['SCRIPT_NAME'];
	$page_slash_count= substr_count($current_page,'/');
	$page_slash_count=$page_slash_count-2; //delete on server  
	for($a=1; $a<=$page_slash_count; $a++){
		echo '../';
	}
}
// END Root Folder 

function sanitize($conn, $data){
	return mysqli_real_escape_string($conn, $data);
}


function get_client_ip_server(){
	global $serverSTATUS;
    $ipaddress = '';
	if($serverSTATUS=='ONLINE'){
		if($_SERVER['HTTP_X_FORWARDED_FOR']){
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else if($_SERVER['HTTP_X_FORWARDED']){
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		}else if($_SERVER['HTTP_FORWARDED_FOR']){
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		}else if($_SERVER['HTTP_FORWARDED']){
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		}else if($_SERVER['REMOTE_ADDR']){
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		}else{
			$ipaddress = 'UNKNOWN';
		}
	}
    return $ipaddress;
}
 
 
 
 

	if(isset($_COOKIE['browser_ip'])&&!empty($_COOKIE['browser_ip'])){
		$GUEST_ip		= $_COOKIE['browser_ip'];
		$GuestCountry	=$_COOKIE['browser_country'];
	}else{
		$GUEST_ip	=get_client_ip_server();
		$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$GUEST_ip")); 
		$GuestCountry 			= $geo["geoplugin_countryName"]; 
		$GUEST_ip			= $geo["geoplugin_request"];
			setcookie('browser_ip', $GUEST_ip, $StrCurrentTime + (3600 * 1020), "/");
			setcookie('browser_country', $GuestCountry, $StrCurrentTime + (3600 * 1020), "/");
	}
 
// Last URl
$currentUrlPage	= $_SERVER['REQUEST_URI'];

if(!empty($_SERVER['HTTP_REFERER'])){
	$lastUrlPag	= $_SERVER['HTTP_REFERER'];
}else{
	$lastUrlPag	= '';
}

if(strpos($lastUrlPag, $websiteUrl1) !== false){
	$lastUrlPage = '';
}else{
	$lastUrlPage = $lastUrlPag;
}

if(!empty($lastUrlPage) && $lastUrlPage != $currentUrlPage ){
	$directedFrom2	= $_SESSION['lastVisit'] = $lastUrlPage;
}else{
	if(!empty($_SESSION['lastVisit'])){
		$directedFrom2 = $_SESSION['lastVisit'];
	}else{
		$directedFrom2	= "";
	}
}
// END Last Url

function validateemail2($str) {
	return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
   
function validateemail($str) {
	if(filter_var($str, FILTER_VALIDATE_EMAIL)){
		return true;
	}else{
		return false;
	}
}

function userloggedin(){
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
		return true;
	}else{
		return false;
	}
}

function cookieLogin(){
	if(isset($_COOKIE['user_cookieID'])&&!empty($_COOKIE['user_cookieID'])){
		return true;
	}else{
		return false;
	}
}
function cookieUSERcheck(){
	global $conn;
	global $StrCurrentTime;
	
	if(cookieLogin()==true){
		$GetFeildquery = $conn->query("SELECT * FROM main_user WHERE user_cookiesID='".$_COOKIE['user_cookieID']."'");
		if($GetFeildquery->num_rows>=1){
			return true;
		}else{
			setcookie("user_cookieID", "", $StrCurrentTime - 12600);
			return false;
		}
	}else{
		return false;
	}
}



if(userloggedin()== true){
	function getUserBasic($userField){
	global $conn;
		$GetFeildquery = "SELECT $userField FROM main_user WHERE user_id='".$_SESSION['user_id']."' ";
		if ($query_run = $conn->query($GetFeildquery) ){
			$query_fetch= $query_run->fetch_assoc();
			return $query_result=$query_fetch[$userField];
		}else{
			session_unset(); 
		}
	}
}else if(cookieUSERcheck()== true){
	function getUserBasic($userField){
	global $conn;
	global $StrCurrentTime;
	
		$GetFeildquery = "SELECT $userField FROM main_user WHERE user_cookiesID='".$_COOKIE['user_cookieID']."'";
		if ($query_run = $conn->query($GetFeildquery) ){
			$query_fetch= $query_run->fetch_assoc();
			return $query_result=$query_fetch[$userField];
		}else{
			setcookie("user_cookieID", "", $StrCurrentTime - 12600);
		}
	}
}

// cookieUSERcheck()== true
if(userloggedin()==true ){
	$USERid				= getUserBasic('user_id');
	$USERcookieID		= getUserBasic('user_cookiesID');
	$USERunique			= getUserBasic('user_unique');
	$USERfirstname		= getUserBasic('user_firstname');
	$USERlastname		= getUserBasic('user_lastname');
		$USERfullname		= $USERlastname.' '.$USERfirstname;
	$USERemail			= getUserBasic('user_email');
	$USERregDate		= getUserBasic('user_regDate');
	$USERstatus			= getUserBasic('user_status');
}else{
	$USERid				= '';
}

if(cookieUSERcheck()==true && userloggedin()==false){
	$cUSERid				= getUserBasic('user_id');
	$cUSERcookieID		= getUserBasic('user_cookiesID');
	$cUSERunique			= getUserBasic('user_unique');
	$cUSERfirstname		= getUserBasic('user_firstname');
	$cUSERlastname		= getUserBasic('user_lastname');
		$cUSERfullname		= $cUSERlastname.' '.$cUSERfirstname;
	$cUSERemail			= getUserBasic('user_email');
	$cUSERregDate		= getUserBasic('user_regDate');
	$cUSERstatus			= getUserBasic('user_status');
}
 
if(isset($_SESSION['user_id']) && empty($_SESSION['user_id'])){
	session_unset();
	// session_destroy();
	if(!isset($_SESSION['user_id'])){
		header('Location: index.php');
	}
}

function tempCokieCheck(){
if(isset($_COOKIE['temp_cookieID'])&&!empty($_COOKIE['temp_cookieID'])){
		return true;
	}else{
		return false;
	}
}	


// Updating temp and user Cookies to same thing
if(cookieUSERcheck()==true && cookieTEMPcheck()==true ){
	if($_COOKIE['temp_cookieID']!=$_COOKIE['user_cookieID']){
		if(setcookie('temp_cookieID', $_COOKIE['user_cookieID'], $StrCurrentTime + (3600 * 1020), "/")==true){
			$conn->query("UPDATE temp_users SET temp_users_cookies='".$_COOKIE['user_cookieID']."' WHERE temp_users_cookies='".$_COOKIE['temp_cookieID']."'");
		}
	}else{
		setcookie('user_cookieID', $_COOKIE['user_cookieID'], $StrCurrentTime + (3600 * 1020), "/"); // 3600 = 1 hr
	}
}
// END Updating Temp and user Cookies to same thing



// Set Temp Cookies
function insertTempCokie(){
	global $conn;
	global $StrCurrentTime;
	global $GUEST_ip;
	
if(tempCokieCheck()==true){	
		$GuestNotLoginSet	= $_COOKIE['temp_cookieID'];
}else{
	$Codinn = '';
		$keys = array_merge(range(0, 9),range('a', 'z'));
		for ($i = 0; $i < 13; $i++){
			$Codinn .= $keys[array_rand($keys)];
		}
			$randCode= sanitize($conn, $Codinn);
				$rand			=mt_rand(10, 99999);
		$GuestNotLoginSet	= $randCode."_".$StrCurrentTime."_".$rand;
}

		$GetFeildquery = $conn->query("SELECT * FROM temp_users WHERE temp_users_cookies='$GuestNotLoginSet'");

	if($GetFeildquery -> num_rows<1){
			setcookie('temp_cookieID', $GuestNotLoginSet, $StrCurrentTime + (3600 * 1020), "/"); // 3600 = 1 hr
		if(tempCokieCheck()==true){
			$conn->query("INSERT INTO `temp_users`(`temp_users_id`, `temp_users_cookies`, `temp_users_ip`, `temp_users_count`, `temp_users_date`) VALUES ('','$GuestNotLoginSet','$GUEST_ip','1','$StrCurrentTime')");
		}
	}else{ 
	$updateTEMP	= $conn->query("UPDATE temp_users SET temp_users_count=temp_users_count+'1', temp_users_date='$StrCurrentTime' WHERE temp_users_cookies='".$_COOKIE['temp_cookieID']."'");
			setcookie('temp_cookieID', $_COOKIE['temp_cookieID'], $StrCurrentTime + (3600 * 1020), "/"); // 3600 = 1 hr
	}
} // END Set Temp Cookies


// Check Temp Cookies
function cookieTEMPcheck(){
	global $conn;
	global $StrCurrentTime;
if(tempCokieCheck()==true){
	$GetFeildquery = $conn->query("SELECT * FROM temp_users WHERE temp_users_cookies='".$_COOKIE['temp_cookieID']."'");
		if($GetFeildquery->num_rows==1){
			return true;
		}else{
			setcookie("temp_cookieID", "", $StrCurrentTime - 12600);
			return false;
		}
	}else{
		return false;
	}	
}// END Check Temp Cookies


if(userloggedin()==false && cookieUSERcheck()== false && cookieTEMPcheck()== false ){
	insertTempCokie();
}else if(userloggedin()==true && cookieUSERcheck()== false && cookieTEMPcheck()== false ){
	setcookie("user_cookieID", $USERcookieID, $StrCurrentTime + (3600 * 1020), "/");
}else if(userloggedin()==false && cookieUSERcheck()== true && cookieTEMPcheck()== false ){
	setcookie("temp_cookieID", $_COOKIE['user_cookieID'], $StrCurrentTime + (3600 * 1020), "/");
}


// Login Count
if(isset($_COOKIE['temp_cookieID']) && !empty($_COOKIE['temp_cookieID'])){	
		$updateTEMP	= $conn->query("UPDATE temp_users SET temp_users_count=temp_users_count+'1', temp_users_lastdate='$StrCurrentTime' WHERE temp_users_cookies='".$_COOKIE['temp_cookieID']."'");
	setcookie('temp_cookieID', $_COOKIE['temp_cookieID'], $StrCurrentTime + (3600 * 1020), "/"); // 3600 = 1 hr
}
// End Login Count




$inludePHP ='.php';

?>
