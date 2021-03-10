<?php include "../req/coonnect.php";?>
<?php 
if(isset($_POST['email'])&&isset($_POST['password'])){ 

	$comingFrom		=$_POST['comingFrom'];
	
	if(!empty($comingFrom)){
		$newurl	=	$websiteUrl.''.$comingFrom;
	}else{
		$newurl	=	$websiteUrl;
	}
	
if(empty($_POST['email'])||empty($_POST['firstname'])||empty($_POST['lastname'])||empty($_POST['password'])||empty($_POST['passwordretype'])||empty($_POST['SecurityQuestion'])||empty($_POST['SecurityAnswer'])){
	echo	$regStatusOutput="<div class='alert alert-danger alert-dismissible fade show'>
						  <button type='button' class='close' data-dismiss='alert'>&times;</button>
						  <strong>Error!</strong> All field is required
					</div>
					
		<script>
			registerBtnClickShow();
		</script>
					"; 
}else{
	
$fname = sanitize($conn, strtolower(trim($_POST['firstname'])));
$lname = sanitize($conn, strtolower(trim($_POST['lastname'])));
$email = sanitize($conn, strtolower(trim($_POST['email'])));
$SecurityQuestion = sanitize($conn, trim($_POST['SecurityQuestion']));
$SecurityAnswer = sanitize($conn, trim($_POST['SecurityAnswer']));

$password 	= sanitize($conn, $_POST['password']);
$passwordretype = sanitize($conn, $_POST['passwordretype']);

if($passwordretype!=$password){
	echo	$regStatusOutput="<div class='alert alert-danger alert-dismissible fade show'>
								  <button type='button' class='close' data-dismiss='alert'>&times;</button>
								  <strong>Error!</strong> Password Mis-Matched
					</div>";
}else{

if(tempCokieCheck()==true){
	$GuestNotLoginSet	= $_COOKIE['temp_cookieID'];
}else{
	$Codinns = '';
		$keyss = array_merge(range(0, 9),range('a', 'z'));
		for ($i = 0; $i < 13; $i++){
			$Codinns .= $keyss[array_rand($keyss)];
		}
			$randCodes= sanitize($conn, $Codinns);
				$randsa			=mt_rand(10, 99999);
		$GuestNotLoginSet	= $randCodes."_".$StrCurrentTime."_".$randsa;
}

$encryptedPassword = password_hash($password, PASSWORD_BCRYPT);


	$checkExistMain = $conn->query("SELECT * FROM main_user WHERE user_email='$email'");
		if($checkExistMain->num_rows==1){ 
				echo $regStatusOutput="<div class='alert alert-danger alert-dismissible fade show'>
								  <button type='button' class='close' data-dismiss='alert'>&times;</button>
								  <strong>Error!</strong> Email already registered 
					</div>";
		}else{
			$insertNewUSER = "INSERT INTO `main_user`(`user_id`, `user_unique`, `user_firstname`, `user_lastname`, `user_email`, `user_pass`, `user_pasQuestion`, `user_pasAnswer`, `user_status`, `user_regDate`, `user_totalLogin`, `user_cookiesID`) VALUES ('','1','$fname','$lname','$email','$encryptedPassword','$SecurityQuestion','$SecurityAnswer','0','$StrCurrentTime','0','$GuestNotLoginSet')";
				
				
	if($conn->query($insertNewUSER)){
			$lastID = $conn->insert_id;
		$_SESSION['user_unique']	=1;
		$_SESSION['user_id']		=$lastID;
			setcookie("user_cookieID", "$GuestNotLoginSet", $StrCurrentTime + (3600 * 1020), "/");
 
echo	$regStatusOutput="<div class='alert alert-success alert-dismissible fade show'>
								  <button type='button' class='close' data-dismiss='alert'>&times;</button>
								  <strong>Success!</strong> Account created <span class='spinner-grow text-success spinner-grow-sm'></span>
					</div>";
			$_SESSION['comingFrom']='';
	echo "
		<script>
			window.setTimeout(function(){
				window.location.href = '$newurl';
			}, 1000);
		</script>
			";		
	
	}else{
	echo $regStatusOutput="<div class='alert alert-danger alert-dismissible fade show'>
						  <button type='button' class='close' data-dismiss='alert'>&times;</button>
						 Error from server, Reload this page and try again
			</div>";
	}
		}
}
}
}

?>