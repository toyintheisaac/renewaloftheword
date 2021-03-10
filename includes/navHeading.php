<script>
function loginRequired(){
	alert('Kindly login to perform this action');
}
</script>
<style>
.firstHeading ul{
	display:inline-block;
}
.firstHeading ul li{
	display:inline-block; 
}
.firstHeading ul li:first-child{
	margin-left:20px; 
	padding-left:0px;
}
.firstHeading ul li{
	margin-left:7px; 
	padding-left:7px;
}
.secondHeading ul{
	display:inline-block;
}
.secondHeading ul li{
	display:inline-block; 
}
</style>
<div class='container-fliud d-none'>    
 <nav class="bg-dark p-0 firstHeading">
  <!-- Links -->
  <ul class="navbar-nav" style='font-size:13px;'>
    <li class="nav-item">
      <a class="nav-link text-light" href="<?php echo dirHompg();?>index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="<?php echo dirHompg();?>relationship">Relationship</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="<?php echo dirHompg();?>testimony">Testimonies</a>
    </li>

<!-- Drop Down -->
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-light" href="#" id="navbardrop" data-toggle="dropdown">
		More
      </a>
      <div class="dropdown-menu dropdown-menu-right" style='font-size:13px;'>
        <a class="dropdown-item d-none" href="">Biblical Quiz</a>
        <a class="dropdown-item d-none" href="">Counseling</a>
        <a class="dropdown-item d-none" href="">Downloads</a>
        <a class="dropdown-item d-none" href="">Donations</a>
        <a class="dropdown-item" href="contact-us.php">Contact Us</a>
      </div>
	</li>
<!-- Drop Down -->
  </ul>
</nav> 
</div>


<div class='container mt-4 mb-4'>    
 <nav class="secondHeading clearfix"> 
  <!-- Brand -->
  <a class="text-dark" href="<?php echo dirHompg();?>index"><img src='<?php echo dirHompg();?>img/logo2.png' class='' width='130px'/></a>

  <ul class="navbar-nav float-right"> 
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown" style='font-size:13px;'>
         Welcome<?php if(isset($USERid)&&!empty($USERid)){echo ', '. ucwords($USERfullname);}else{ echo "";} ?>
		
      </a>
      <div class="dropdown-menu dropdown-menu-right p-0" style='font-size:13px;'>
<?php if(userloggedin()===true){ ?>  
	   <a class="dropdown-item" href="new-post">New Post</a>
	   <a class="dropdown-item" href="all-post">All Post</a> 
        <a class="dropdown-item" href="logout">Log Out</a>
<?php }else{ ?>
	   <a class="dropdown-item" href="register">Register</a>
	   <a class="dropdown-item" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#UserLoginModal">Log in</a>
<?php } ?>
      </div>
    </li>
</ul>
	
</nav> 
</div>

<div class='container-fliud p-4 bg-success'>
<?php
if(count($_COOKIE) > 0) {
  //  echo "Cookies are enabled.";
} else {
   // echo "Cookies are disabled.";
}
?>
</div> 

<div class="modal" id="UserLoginModal">
  <div class="modal-dialog" style=''>
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header ">
        <h4 class="modal-title">User Login</h4>
      </div>

<script>
function loginCheck(){
 var email = document.loginform.email.value;
 var password = document.loginform.password.value;
 var currenturl = "<?php echo $currentUrlPage; ?>";
	commentCheck = email.replace(/\s\s+/g, '');

	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(commentCheck.match(mailformat)){
 if( password == "" || commentCheck=='' || commentCheck==' ' ){
  return false;
 }else{
 $.ajax({
  type: 'post',
  url: 'includes/logindata.php',
  data: {
		email:email,
		currenturl:currenturl,
		password:password
  },
  success: function (response) {
	  $('#loginStatusOutput').html(response);
//	  document.getElementById("myDIV").style.display = "none";
//	  setInterval('location.reload()', 1000);
		LoginBtnClickShow();
  }
 });
 return false;
}}
else
{
$('#loginStatusOutput').html("<div class='alert alert-danger'> <strong>Error!</strong> You have entered an invalid email address!</div>"); 
document.loginform.email.focus();
return false;
}
}
</script>

      <!-- Modal body -->
<div class="modal-body" style='font-size:13px;'>
<?php if(tempCokieCheck()==false){ ?> 
	<div class='text-danger'>*Enable Cookies to enjoy full Access to all site functions</div>
<?php } ?>	

<div id='loginStatusOutput'></div> 
<form method='post' name='loginform' id='loginform'>	
		<div class="input-group mb-2">
			<input type="email" class="form-control" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" placeholder="Email" name="email" onkeyup="LoginBtnClickShow();" id="email" required >
		</div>
		<div class="input-group mb-2">
			<input type="password" class="form-control" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" placeholder="Password" onkeyup="LoginBtnClickShow();" name="password" id="password" required >
		</div>
		<div class="form-group text-left">
		  <button type="button" name='submitLog' id='submitLog' class='btn btn-success btn-sm form-control' onclick="clickloginBtn();" onmouseout="">Log In</button>
				<button class="btn btn-info form-control" id='submitLogLoading' disabled>
					<span class="spinner-border spinner-border-sm"></span> Loading...
				</button>
				
		  <p id='success_login'></p>
		</div>
</form>
<script type="text/javascript">  

 
//	LoginBtnClickShow();
 

function clickloginBtn() {
    LoginBtnClickNone(); 
    loginCheck();
}

function LoginBtnClickNone(){
		document.getElementById('submitLog').style.display="none";
		document.getElementById('submitLogLoading').style.display="block"; 
}
function LoginBtnClickShow(){
	document.getElementById('submitLog').style.display="block";
	document.getElementById('submitLogLoading').style.display="none"; 
}
	document.getElementById('submitLogLoading').style.display="none"; 
</script>
		<div class="form-group text-left">
		 Create your account? <a href='<?php echo $websiteUrl;?>/register.php' class='text-danger' >Sign up for free</a>
		</div>  
</div>

      <!-- Modal footer -->
<div class="modal-footer">
	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
</div>

    </div>
  </div>
</div> 

