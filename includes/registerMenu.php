
   
<script type="text/javascript"> 
window.onload=function(){
document.getElementById("submitRegLoading").style.display="none"; 
}
function clickRegisterBtn() {
    registerBtnClickNone(); 
    registerCheck();
}
function registerBtnClickNone(){
		document.getElementById('clickRegisterBtn').style.display="none";
		document.getElementById('submitRegLoading').style.display="block"; 
}
function registerBtnClickShow(){
	document.getElementById('clickRegisterBtn').style.display="block";
	document.getElementById('submitRegLoading').style.display="none"; 
}

function passvalid(){
 var password = document.getElementById("pass").value;
 var passwordretype = document.getElementById("passretype").value;
	if( password != "" && passwordretype != ""){
	if(password==passwordretype){
		document.getElementById('pasmismatch').innerHTML = "";
		 return true;
	}else{
	document.getElementById('pasmismatch').innerHTML = "<span class='text-danger'> <strong>Error!</strong> Password Mis-Matched</span>";
		document.regform.passretype.focus();
		return false;
	}
	}else{
		document.regform.passretype.focus();
		return false;
	}
}




function registerCheck(){
	 var first 		= document.getElementById("firstname").value;
	 var last 		= document.getElementById("lastname").value;
	 var SecurityQ 	= document.getElementById("Secquestion").value;
	 var SecurityA 	= document.getElementById("Secanswer").value;
	 var emails 	= document.getElementById("emails").value;
	 var pwd 		= document.getElementById("pass").value;
	 var pwdretype 	= document.getElementById("passretype").value;
	 var currenturl = "<?php echo $comingFrom; ?>";
	if(passvalid()){
 if( emails == '' || SecurityA=='' || first==''){
	  document.getElementById('successLogin').innerHTML = "<div class='alert alert-danger' >All field is required</div>";
	  registerBtnClickShow();
  return false;
 }else{
 $.ajax({
  type: 'post',
  url: 'includes/registerdata.php',
  data: {
		firstname:first,
		lastname:last,
		SecurityQuestion:SecurityQ,
		SecurityAnswer:SecurityA,
		email:emails,
		password:pwd,
		passwordretype:pwdretype,
		comingFrom:currenturl
  },
  success: function (response){
   $('#successLogin').html(response);
			registerBtnClickShow();
  },
	error: function(jqXHR, textStatus, errorThrown){
	 // $('#successLogin').text(errorThrown);
		 alert(textStatus +' '+ errorThrown);
	}
 });
 return false;
}
	}else{
		return passvalid();
	}
}
</script>

	<div class="form-group mb-2">
	<label class='ml-1 mb-0 text-success' ><small>First-Name</small></label>
		<input type="text" class="form-control" placeholder="First Name"  id="firstname" required />	
	</div>
	<div class="form-group mb-2">
	<label class='ml-1 mb-0 text-success' ><small>Last-Name / Surname </small></label>
		<input type="text" class="form-control" placeholder="Last Name / Surname" id="lastname" required />
	</div>
	<div class="form-group mb-2">
	<label class='ml-1 mb-0 text-success' ><small>Email</small></label>
		<input type="email" class="form-control" placeholder="will be used for verification" id="emails" required />
	</div> 
	<div class="form-group mb-2">
	<label class='ml-1 mb-0 text-success' ><small>Password</small></label>
		<input type="password" class="form-control" placeholder="Password" id="pass" required />
	</div> 
	<div class="form-group mb-2">
		<input type="password" class="form-control" placeholder="Retype Password" id="passretype" required onblur="passvalid();"/> <small id='pasmismatch'></small>
	</div> 
	<div class="form-group mb-2">
	<label class='ml-1 mb-0 text-success' ><small>Select a Security Question</small></label>
		<select class="custom-select" id="Secquestion" >
			<option selected></option>
			<option value="What Is your favorite book?"  >What Is your favorite book?</option>
			<option value="What is your mother’s maiden name?">What is your mother’s maiden name?</option>
			<option value="What was the name of your first pet?" >What was the name of your first pet?</option>
			<option value="What was the first company that you worked for?" >What was the first company that you worked for?</option>
			<option value="Where did you meet your spouse?" >Where did you meet your spouse?</option>
			<option value="What city were you born in?" >What city were you born in?</option>
			<option value="What is your favorite color?" >What is your favorite color?</option>
		 </select> 
	</div>
	<div class="form-group mb-3">
	<label class='ml-1 mb-0 text-success' ><small>Security Answer</small></label>
		<input type="text" class="form-control" placeholder="use for password reset" id="Secanswer" required />
	</div>
	
	<div class="mb-3" id='successLogin'></div>
	  
	<div class="form-group text-left">
	  <button type="button"  class='btn btn-success btn-md form-control' id="clickRegisterBtn"  onclick="clickRegisterBtn();" >Create Account</button>
	  
				<button class="btn btn-info form-control" id='submitRegLoading' disabled>
					<span class="spinner-border spinner-border-sm"></span> Loading...
				</button>
	</div>  