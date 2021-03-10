<?php
ob_start();
session_start(); 
?>

<?php


$currentPageURLcheck =$_SERVER['HTTP_HOST'];
error_reporting(E_ALL);
if($currentPageURLcheck == '127.0.0.1' || $currentPageURLcheck== "localhost" || $currentPageURLcheck== "192.168.43.126"){
$server_name = "localhost";
			$server_username = "root";
			$server_password = "";
			$server_dbname = "theword2";
	$StrCurrentTime = strtotime("0 hours", time());
	$CURRENT_time =date('d-M-Y H:i:s', $StrCurrentTime); 
ini_set('display_errors', 1);
ini_set('log_errors', 0);

	$serverSTATUS='OFFLINE';
	
$websiteName		="renewaloftheword2";
$websiteUrl1		="$currentPageURLcheck";
$websiteUrl			="http://".$currentPageURLcheck."/renewaloftheword";
$websiteUrl3		="http://".$currentPageURLcheck;
$websiteTextLink	="easyimage/upload/";
$websiteEMAIL		="admin@renewaloftheword.com";
$websiteEMAIL2		="info@renewaloftheword.com";	
	
}else{
		$server_name = "localhost";
		$server_username = "isaaavza";
		$server_password = "JZTNPIOl1GqX";
		$server_dbname = "isaaavza_renewalofword";
			 	
			
// $FTPserver: ftp.isaac-tech.com	
// $FTPusername: renewaloftheword.com@renewaloftheword.com
//$ftpPASS='HEwhoKnowsGod!)*&%#$@.';	
		
	$StrCurrentTime = strtotime("+5 hours", time());
	$CURRENT_time =date('d-M-Y H:i:s', $StrCurrentTime);  
ini_set('display_errors', 0);
ini_set('log_errors', 1);

	$serverSTATUS='ONLINE';
	
	$websiteName		="renewaloftheword";
$websiteUrl1		="$currentPageURLcheck";
$websiteUrl			="https://".$currentPageURLcheck."/renewaloftheword";
$websiteUrl3		="https://".$currentPageURLcheck."/renewaloftheword";
$websiteTextLink	="easyimage/upload/";
$websiteEMAIL		="admin@renewaloftheword.com";
$websiteEMAIL2		="info@renewaloftheword.com";
}

$websiteLogoWhite		="img/logo.png";
$websiteSearchDisImg	="img/logo.png";
$websiteProfileDESC	="We are dedicated in giving you the word of God to norish your soul every week, share your testimonies and share it with your friends to read and thank God. Amen";
$websiteProfileTags	="christian, religion, Jesus, Christ, christian motivation, love, weekly quote, God Love, Weekly awakeing";

// Create connection
    $conn = mysqli_connect($server_name, $server_username, $server_password, $server_dbname);
// END Create connection

if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }

?>
<?php include 'functions.php';?>