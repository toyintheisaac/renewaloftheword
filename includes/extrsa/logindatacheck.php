<?php include "req/coonnect.php";?>

<?php
if(isset($_POST['f_name'])&&isset($_POST['u_email'])){

$fname = strtolower(trim($_POST['f_name']));
$lname = strtolower(trim($_POST['l_name']));
$email = strtolower(trim($_POST['u_email']));

if(tempCokieCheck()==true){
	$GuestNotLoginSet	= $_COOKIE['temp_cookieID'];

	$checkExistMain = $conn->query("SELECT * FROM main_user WHERE user_email='$email' ");
		if($checkExistMain->num_rows==1){
			$fetchOLD = $checkExistMain->fetch_assoc();
				$USERSfetch_assoc['user_id']	= $fetchOLD['user_id'];
				$USERSfetch_assoc['user_unique']= $fetchOLD['user_unique'];
					$usercookiesID = $fetchOLD['user_cookiesID'];
				setcookie("user_cookieID", "$usercookiesID", $StrCurrentTime + (3600 * 1020), "/");
				setcookie("temp_cookieID", "$usercookiesID", $StrCurrentTime + (3600 * 1020), "/");
		}else{
			$insertNewUSER = "INSERT INTO `main_user`(`user_id`, `user_unique`, `user_firstname`, `user_lastname`, `user_email`, `user_status`, `user_regDate`, `user_totalLogin`, `user_cookiesID`) VALUES ('','1','$fname','$lname','$email','0','$StrCurrentTime','0','$GuestNotLoginSet')";
				$lastID = $conn->insert_id;
				
	if($conn->query($insertNewUSER)){
		$USERSfetch_assoc['user_unique']=1;
		$USERSfetch_assoc['user_id']=$lastID;
			setcookie("user_cookieID", "$GuestNotLoginSet", $StrCurrentTime + (3600 * 1020), "/");
	}else{
		return false;
	}
		}
}
}
?>
