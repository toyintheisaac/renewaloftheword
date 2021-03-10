<style>
.headingLINK{
	color:#116206;
	text-decoration:none;
}
.headingLINK:hover{
	color:#000;
	text-decoration:none;
}
.subHeadingLINK{
	color:#000;
	text-decoration:none;
}
.subHeadingLINK:hover{
	color:#116206;
	text-decoration:none;
}
.text-dangerr{
	color:#7e0505;
}
.socialLogin{
	font-size:14px;
	border:1px solid #ccc;
	border-radius:20px;
	padding:10px 30px;
	margin:3px auto;
	width:150px;
}
.socialLogin:hover{
	background:whitesmoke;
	border:1px solid whitesmoke;
}
</style>

<?php  

if(isset($_GET['view'])&&!empty($_GET['view'])&&isset($_GET['by'])&&!empty($_GET['by'])){
	
	$view	=sanitize($conn, $_GET['view']-1150);
	$by	=sanitize($conn, $_GET['by']);
	
	
$selectTEST=$conn->query("SELECT * FROM testimony WHERE testimony_status='2' AND testimony_id='$view' "); 
if($selectTEST->num_rows == 1){
 
	$fetchTEST	=$selectTEST->fetch_assoc();
		$testimonyId		=$fetchTEST['testimony_userId'];
		$testimonyContent	=$fetchTEST['testimony_content'];
		$testimonyDate		=$fetchTEST['testimony_date'];
			$checkName= $conn->query("SELECT * FROM main_user WHERE user_id='$testimonyId' ");
				$fetchName = $checkName->fetch_assoc();
					$Firstname = $fetchName['user_firstname'];
					$Lastname = $fetchName['user_lastname'];
				$testimonyName = ucwords($Lastname.' '.$Firstname);
 
?>
<div class="col-sm-12 text-justify" style='margin-bottom:18px;'>
<?php
if(!empty($USERid)){
	$testUser = $USERid;
}else if(!empty($cUSERid)){
	$testUser = $cUSERid;
}else{
	$testUser = 0;
} 
	$conn->query("UPDATE testimony SET testimony_view=testimony_view+'1' WHERE testimony_status='2' AND testimony_userId!='$testUser' AND testimony_id='$view' ");
 
?>	


	<h3 class='text-left mb-0'>View <?php echo $testimonyName;?> Testimony</h3>
	<div class="mt-0 mb-2">Read and share testimonies to glorify God in your life</div>	
		<div class='bg-light p-3 mb-0' >
	
<div class='mb-0 clearfix' >
<?php 		
	echo "<div class='clearfix text-justify'>".$testimonyContent."</div>";	
	echo "<div class='float-right mr-1'> <i>by <small class='text-dark'> ".$testimonyName ."</small> on <small class='text-dark'>".date("d-M, h:i A", $testimonyDate)."</small></i></div>";
?>
</div>	

 
<?php }else{
		header('Location: testimony.php');
	} ?>
		</div>
</div>
<?php }else{
	

?>

<?php
if(!empty($USERid)){
	$testUser = $USERid;
}else if(!empty($cUSERid)){
	$testUser = $cUSERid;
}else{
	$testUser = 0;
} 
	$conn->query("UPDATE testimony SET testimony_view=testimony_view+'1' WHERE testimony_status='2' AND testimony_userId!='$testUser' ORDER BY testimony_id DESC LIMIT 10");
 
?>	

<div class="col-sm-12 text-justify" style='margin-bottom:18px;'>
	<h3 class='text-left mb-0'>Testify to God glory in your life</h3>
	<div class="mt-0 mb-2">Read and share testimonies to glorify God in your life</div>	
		<div class='bg-light p-3 mb-0' style='margin-bottom:18px;max-height:450px;overflow-y:scroll;'>
<?php 
$selectTEST=$conn->query("SELECT * FROM testimony WHERE testimony_status='2' ORDER BY testimony_id DESC"); 
if($selectTEST->num_rows >= 1){
?>	
<marquee direction = "up" SCROLLDELAY="450" height="550px;">
<?php
	while($fetchTEST	=$selectTEST->fetch_assoc()){
		$testimonyId		=$fetchTEST['testimony_userId'];
		$testimonyContent	=$fetchTEST['testimony_content'];
		$testimonyDate		=$fetchTEST['testimony_date'];
			$checkName= $conn->query("SELECT * FROM main_user WHERE user_id='$testimonyId' ");
				$fetchName = $checkName->fetch_assoc();
					$Firstname = $fetchName['user_firstname'];
					$Lastname = $fetchName['user_lastname'];
				$testimonyName = ucwords($Lastname.' '.$Firstname);
?>		
<div class='mb-5 clearfix' >
<?php 		
	echo "<div class='clearfix text-justify'>".$testimonyContent."</div>";	
	echo "<div class='float-right mr-1'> <i>by <small class='text-dark'> ".$testimonyName ."</small> on <small class='text-dark'>".date("d-M, h:i A", $testimonyDate)."</small></i></div>";
?>
</div>	
<?php } ?>

</marquee>
<?php }else{ ?>
	<div class='bg-light p-3 mb-0' style='margin-bottom:18px;height:350px;'>
		Be the first person to share your testimony
	</div>
<?php } ?>
		</div>
</div>
<?php } ?>
			<hr/>
	


	
<div class="col-sm-12 text-justify clearfix" style='margin-bottom:18px;'> 

<?php if(!userloggedin()===true){ ?>
<div class='mt-0 text-center d-none'>
	<p class='mb-0'>Login to share your Testimony</p>

<a href='' class="btn socialLogin" ><i class="fa fa-facebook-official" style="font-size:16px;color:#3b5999;"></i> &nbsp;Facebook</a>

	<a href='' class="btn socialLogin" ><i class="fa fa-twitter" style="font-size:16px;color:#00ACEE;"></i> &nbsp;Twitter</a>
	
	<a href='' class="btn socialLogin" ><i class="fab fa-linkedin" style="font-size:16px;color:#00ACEE;"></i> &nbsp;Linkedin</a>
</div>

<div class='mt-5 p-4 text-center bg-light'>
	<p class='mb-2'>Login to Share your Testimony</p>
	<div class="clearfix text-center" >
		<button type="button" class='btn btn-sm btn-info text-light'  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#UserLoginModal" >Login Here</button>
	</div>
</div>
<?php } ?>

<?php 
if(!empty($USERid)){
	if(isset($_POST['TestiSubmit'])){
		
	if(empty($_POST['cont'])){
		$errorLOG ="<div class='text-danger'>Empty Field</div>";
	}else{
		$content	= sanitize($conn, nl2br($_POST['cont']));

	$test_userId=sanitize($conn, $USERid);
		// status: 0=default, 1=waiting approval, 2=approved, 5=deleted
	$zero		=sanitize($conn, 0);

	$checkMulti=$conn->query("SELECT * FROM `testimony` WHERE testimony_userId='$test_userId' AND testimony_content='$content' ");
	if($checkMulti->num_rows>=1){
		 header('Location: testimony.php');
	}else{
		
	$USERname = $USERfirstname.'-'.$USERlastname;
	
		if( !empty($USERname) && !empty($content)){
			$testINSERT	= "INSERT INTO `testimony`(`testimony_id`, `testimony_userId`, `testimony_name`, `testimony_content`, `testimony_status`, `testimony_view`, `testimony_count`, `testimony_date`) VALUES ('','$test_userId','$USERname','$content','$zero','$zero','$zero','$StrCurrentTime')";
			
				if($insertQuery= $conn->query($testINSERT)){
					$errorLOG ="<div class='alert alert-success alert-dismissible fade show'>
								  <button type='button' class='close' data-dismiss='alert'>&times;</button>
								  <strong>Success!</strong> Waiting for approval
								</div>";
	
					// header('Location: testimony.php');
						$content	= '';
				}else{
					
				}
		}
	}
	}
	}
}
?>


<?php if(isset($errorLOG)&&!empty($errorLOG)){ echo $errorLOG;} ?>
<?php if(isset($USERid)&&!empty($USERid)){ ?>
				<form method='POST' action=''>
					<div class="input-group mb-2">
						<input type="hidden" name='fullname' id='fullname' class="form-control" placeholder="Name" value='<?php if(!empty($USERfullname)){echo $USERfullname;}?>' readonly />
					</div>
					<div class="form-group">
		<textarea class="form-control" name='cont' rows="8" placeholder='Share your testimonies:' style="resize:none;" maxlength="2000" required id='cont' ><?php if(isset($content)){echo $content;}else if(isset($_POST['cont'])){echo $_POST['cont'];}?></textarea>
					</div> 
	<div id="textleft" style='color:black;font-size:12px;' class='float-right pr-3'>2000 / 2000 max</div>
					<div class="form-group">
					  <button type='submit' name='TestiSubmit' class='btn btn-success btn-sm'>Share</button>
					</div> 
				</form>

<?php } ?>			 
			
</div>
			 
			<hr/>
			
<script> 
$(document).ready(function () {
  $('#cont').keypress(function (event) {
    var max = 2000;
    var len = $(this).val().length;
		if (event.which < 0x20) { 
		  return; // Do nothing
		}
    if (len >= max) {
      event.preventDefault();
    }
  });

  $('#cont').keyup(function (event) {
    var max = 2000;
    var len = $(this).val().length;
    var char = max - len;
    $('#textleft').text(char + ' / 2000 max');
  });
});
</script>	






<?php
$checkMulti=$conn->query("SELECT * FROM `testimony` WHERE testimony_userId='$USERid' ");
	if($checkMulti->num_rows>=1){

?>
<div class="col-sm-12 text-justify clearfix" style='margin-bottom:18px;'>
<div id="accordion">
  <div class="card">
    <div class="card-header">
      <a class="text-success " data-toggle="collapse" href="#collapseOne" style='font-size:13px;'>
        View All Your Testimonies
      </a>
    </div>
    <div id="collapseOne" class="collapse" data-parent="#accordion">
      <div class="card-body table-responsive">
        <table class='table table-hover' style='font-size:12px;'>
			<tr>
				<th>Testimonies</th>
				<th><i class='fas fa-eye'></i></th>
				<th>Action</th>
			</tr>
<?php
	while($fetchMulti = $checkMulti->fetch_assoc()){
		$testimonyID		= $fetchMulti['testimony_id'];
		$testimonyContent	= $fetchMulti['testimony_content'];
		$testimonyStatus	= $fetchMulti['testimony_status'];
		$testimonyView		= $fetchMulti['testimony_view'];
		
	$content2 = strip_tags($testimonyContent, '');
			$testimonyShortDesc = mb_strimwidth($content2, 0, 120, '');	
?>
			<tr>
				<td><?php echo $testimonyShortDesc;?></td>
				<td><?php echo $testimonyView;?></td>
				<td> <?php if($testimonyStatus!=5){ ?>
<?php if($testimonyStatus==2){?>
	<a href='testimony.php?by=<?php echo $USERfirstname.'-'.$USERlastname;?>&view=<?php echo 1150+$testimonyID;?>' class='btn btn-secondary btn-sm mt-1' style='font-size:12px;'>view</a> 
	<a href='<?php $websiteUrl;?>/testimony.php?by=<?php echo $USERfirstname.'-'.$USERlastname;?>&view=<?php echo 1150+$testimonyID;?>' class='btn btn-info btn-sm mt-1' style='font-size:12px;'>share</a><?php }?>	
	<a href='testimony.php?del=<?php echo 1150+$testimonyID;?>' class='btn btn-danger btn-sm mt-1' style='font-size:12px;'>delete</a> 
	<?php } ?>	</td>
			</tr>
<?php } ?>
		</table>
      </div>
    </div>
  </div>
</div> 
</div>
<?php 
} 


?>
