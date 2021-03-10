<?php include "../req/coonnect.php";?>

<?php 

if(isset($_POST['email'])&&isset($_POST['password'])){

	$currenturl		=$_POST['currenturl'];

 $urlDelSt= $websiteUrl3.$currenturl;


$password = sanitize($conn, $_POST['password']);
$email = sanitize($conn, strtolower(trim($_POST['email'])));
 


if(validateemail($email)==true){

	$checkExistMain = $conn->query("SELECT * FROM main_user WHERE user_email='$email' ");
		if($checkExistMain->num_rows==1){
			$fetchOLD = $checkExistMain->fetch_assoc();
				$user_pass		= $fetchOLD['user_pass'];

if(password_verify($password, $user_pass)){
	
				$_SESSION['user_id']		= $fetchOLD['user_id'];
				$_SESSION['user_unique']	= $fetchOLD['user_unique'];
	
					$usercookiesID = $fetchOLD['user_cookiesID'];
				setcookie("user_cookieID", "$usercookiesID", $StrCurrentTime + (3600 * 1020), "/");
	
	echo $loginStatusOutput="<div class='alert alert-success'><span class='spinner-grow text-warning spinner-grow-sm'></span> <strong>Success!</strong><span class='text-dark'> Fetching Details</span> </div>";			
		echo "
			<script>
				window.setTimeout(function(){
					window.location.href = '$urlDelSt';
				}, 1500);
			</script>
				";
}else{  
		echo  $loginStatusOutput="<div class='alert alert-danger'> <strong>Error!</strong> Wrong password</div>";
}
		}else{
			echo  $loginStatusOutput="<div class='alert alert-danger'> <strong>Error!</strong>  Email is not registered</div> ";
		}
	}else{
	echo  $loginStatusOutput="<div class='alert alert-danger'> <strong>Error!</strong>  Invalid Email</div> ";
}
}

?>