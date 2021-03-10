<?php include "req/coonnect.php";?>
<!DOCTYPE html> 
<html lang="en" >
<head>
	<title>Contact Us</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="keywords" content="<?php echo $websiteName;?>, Contact, message, help"/>
  <meta name="description" content="<?php echo $websiteProfileDESC;?>"> 
  <meta name="robots" content="index, follow"> 
  
<meta property="og:type" content="website" />
<meta property="og:title" content="Contact <?php echo $websiteName;?>" />
<meta property="og:description" content="Contact <?php echo $websiteName;?>" />
<meta property="og:image" content="<?php echo $websiteLogoWhite;?>" />
<meta property="og:url" content="<?php echo $websiteUrl;?>" />
<meta property="og:site_name" content="<?php echo $websiteName;?>" />
  
  

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<?php if($serverSTATUS=='ONLINE'){ ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> 
	  
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<?php }else{ ?>
<link rel="stylesheet" href="dist/css/bootstrap.min.css">
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/popper.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
 
<link rel="stylesheet" type='text/css' href="dist/css/googleFont.css">
<?php } ?>

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
		<link rel='stylesheet' type="text/css" href='css/styling.css' >
</head> 
<body>
<?php include "includes/navHeading.php";?>
   
<div class="container contact">
	<div class="row">
		<div class="col-md-33 col-md-3">
			<div class="contact-info">
				<i class='fa fa-envelope' style='color:#fff;font-size:80px;'></i>
				
				<h2>Send us message</h2>
			</div>
		</div>
		<div class="col-md-99 col-md-9">

<?php
if(isset($_POST['msgContactSend'])){
	if(!empty($_POST['name']) && !empty($_POST['Email']) && !empty($_POST['Message']) ){
		
		$REQfullname			=htmlspecialchars(stripslashes(trim($_POST['name'])));
		$REQclientEmail			=htmlspecialchars(stripslashes(trim($_POST['Email'])));
		$REQclientPhone			=setGuestUser();
		$REQMessage				=htmlspecialchars(stripslashes(trim($_POST['Message'])));
		
         $to = $websiteEMAIL;
         $subject = "Message form $websiteName";
         
         $message = "	<p>User Fullname:	$REQfullname</p>
						<p>User Email:		$REQclientEmail</p>
						<p>User ID:		$REQclientPhone</p>
						<p>User IP:		$GUEST_ip</p>
						<p>User Country:	$GuestCountry</p>
						<p>User Time:		$CURRENT_time</p>
						<p> </p>			
						<p>-----------------------</p>			
						<p>-----------------------</p>			
						<p>&nbsp; </p>			
						<p>$REQMessage</p>
					";
         
         $header = "From:$REQclientEmail \r\n"; 
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if($retval == true){		 
			 echo "<script>
				alert('Message Sent, we will get back to you soon!!!');
			</script>
			";			
			echo "
			<script>
				window.setTimeout(function(){
					window.location.href = 'index.php';
				}, 500);
			</script>";
			
			}else {
			 echo "<script>
				alert('An error just occurred, Please try again');
			</script>
			"; 
			echo "
			<script>
				window.setTimeout(function(){
					window.location.href = 'index.php';
				}, 500);
			</script>";
         }	
	}
	
}
?>		
		
	<form method="POST" action=''>	
			<div class="contact-form">
				<div class="form-group">
				  <label class="control-label col-sm-10" for="fname">Full Name:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="fname" placeholder="Enter Full Name" name="name" required <?php if(userloggedin()===true){ ?> value="<?php echo $USERfullname ?>" readonly <?php } ?>>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-10" for="email">Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="Email" required <?php if(userloggedin()===true){ ?> value="<?php echo $USERemail ?>" readonly <?php } ?>>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-10" for="Message">Message:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="Message" name='Message' placeholder='Message / Request' required ></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default" name="msgContactSend">Send</button>
				  </div>
				</div>
			</div>
</form>
		</div>
	</div>
</div>
		<?php include "includes/footers.php";?>

<style>

	.contact{
		padding: 4%;
	}
	.col-md-33{
		background: #05a334;
		padding: 1% 4%;
		border-top-left-radius: 0.5rem;
		border-bottom-left-radius: 0.5rem;
	}
	.contact-info{
		margin-top:5%;
		color:#fff;
	}
	.contact-info i{
		margin-bottom: 10%;
	}
	.contact-info h2{
		margin-bottom: 5%;
	}
	.col-md-99{
		background: #fff;
		padding: 1% 3%;
		border-top-right-radius: 0.5rem;
		border-bottom-right-radius: 0.5rem;
	}
	.contact-form label{
		font-weight:600;
	}
	.contact-form button{
		background: #25274d;
		color: #fff;
		font-weight: 600;
		width: 35%;
	}
	.contact-form button:hover{
		box-shadow:none;
		color: #ccc;
	}

</style>
</body>
</html>