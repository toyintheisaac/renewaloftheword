<?php include "req/coonnect.php";?>
<?php
if(!userloggedin()){
	header("Location: index");
	exit();
}
?>
<!DOCTYPE html> 
<html lang="en" >
<head>
	<title>Make Post</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="keywords" content=""/>
  <meta name="description" content="<?php echo $websiteProfileDESC;?>"> 
  <meta name="robots" content="noindex, nofollow">
  <meta name="robots" content="max-image-preview:standard">
	<meta name="googlebot" content="noindex">
  
 
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
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo dirHompg();?>summernote/summernote-bs4.css">
	
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

	<link rel="stylesheet" href='dist/css/venobox.css' type="text/css" media="screen" />
	<script type="text/javascript" src="dist/js/venobox.min.js"></script>
	
		<link rel='stylesheet' type="text/css" href='css/styling.css' >
		
<script src="ckeditor/ckeditor.js"></script>

<!--		 
<script type="text/javascript" src="dist/js/ckeditor2.js"></script> 

<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
-->
</head> 
<body>  
<?php // $USERstatus == 5 admin,  10 = super admin
/* if(empty($USERstatus)||($USERstatus!=5&&$USERstatus!=10)){
	header('Location: index.php');
} */
?> 
 
 
<?php include "includes/navHeading.php";?>
	  
<div class='container pt-3 pb-3 mt-2 mb-4'>
	<div class='row'>
	<div class="col-lg-8 col-md-12 col-sm-12">
	
	
<?php	if(!isset($USERid)||empty($USERid)){ ?>	 
<div class='mt-5 text-center' >
	<p class='mb-4'>Login To make a post</p>

<a href='' class="btn socialLogin" ><i class="fa fa-facebook-official" style="font-size:16px;color:#3b5999;"></i> &nbsp;Facebook</a>

	<a href='' class="btn socialLogin"><i class="fa fa-twitter" style="font-size:16px;color:#00ACEE;"></i> &nbsp;Twitter</a>
	
	<a href='' class="btn socialLogin"><i class="fab fa-linkedin" style="font-size:16px;color:#00ACEE;"></i> &nbsp;Linkedin</a>
</div>	
<?php	}else{ ?>

<form method="POST" action='' enctype="multipart/form-data">
<?php	
		
		
		
	if(isset($_GET['post'])&&!empty($_GET['post'])){
	$post	= sanitize($conn, $_GET['post']);
		$selectPOST = $conn->query("SELECT * FROM article WHERE article_id='$post' AND article_userid='$USERid'");
			$numRowPOST = $selectPOST->num_rows;
			
	if( $numRowPOST==1 ){
		$fetchCurrenPOST = $selectPOST->fetch_assoc();
			$ARTICLEtitle		= $fetchCurrenPOST['article_title'];
			$ARTICLEurl 		= $fetchCurrenPOST['article_url']; // title_id + 300;
			$ARTICLEcontent 	= $fetchCurrenPOST['article_content'];
			$ARTICLEfeatureimg 	= $fetchCurrenPOST['article_featureimg'];
			$ARTICLEcomment 	= $fetchCurrenPOST['article_comment'];
			$ARTICLEcommentreply= $fetchCurrenPOST['article_commentreply'];
			$ARTICLEsharing 	= $fetchCurrenPOST['article_sharing'];
			$ARTICLEtags 		= $fetchCurrenPOST['article_tags'];
			$ARTICLEdescription = $fetchCurrenPOST['article_description'];
			$ARTICLEstatus 		= $fetchCurrenPOST['article_status'];
			$ARTICLEpostDate 	= $fetchCurrenPOST['article_date'];
			$ARTICLEmodifiedDate= $fetchCurrenPOST['article_modifieddate'];
			
		// article_status=2 first_time waiting for approval article
		// article_status=3 edited waiting for approval article
		// article_status=1 clicked on edit change to 0 
		// article_status=4 rejected Post 
		// article_status=5 approved
		// article_status=10 deleted post
		
	}else{
		header("Location: new-post.php");
	}
	
	if(isset($_GET['edits'])&&isset($_GET['edit'])){
		if($_GET['edits']=="activ" && $_GET['edit']=="$ARTICLEurl"){
			$updateINSERTED=$conn->query("UPDATE article SET article_status='1' WHERE article_id='$post' AND article_userid='$USERid'");
		}
	}


	

if(isset($_GET['preview']) && $_GET['preview']=='active'){
	include "includes/mainPostPreview.php"; 
}else{
	include "includes/mainPostCreating.php"; 
}
?>



<?php }else{ ?>

	<div class='mt-2' >
	<h3>Create Your Post Title</h3>
<?php 
	if(isset($_POST['createTitle'])){
		if(isset($_POST['title'])&&!empty($_POST['title'])){
			$maintitle = sanitize($conn, $_POST['title']);
			$titleLower = sanitize($conn, strtolower($maintitle));
			
			$insertQUERY = "INSERT INTO article(article_id, article_userid, article_title, article_status ) VALUES ('','$USERid','$maintitle','0')";
				if($conn->query($insertQUERY)===true && $conn->affected_rows==1){
						$last_id = $conn->insert_id;
			$newID = $last_id+1500;
			
			$serviceAaa =	preg_replace('/[^A-Za-z0-9\-]/', ' ', trim($titleLower));
				$TitleURLses = str_replace(" ","-",$serviceAaa);
					$TitleURL =	preg_replace('/-+/', '-', trim($TitleURLses));
	
if(substr($TitleURL, -1)=='-'){
	 $TitleURL =substr("$TitleURL", 0, -1);
}else{
	$TitleURL =	$TitleURL;
}
	 $newTitleURL = $TitleURL."-".$newID;
			
			$updateINSERTED="UPDATE article SET article_url='$newTitleURL' WHERE article_id='$last_id' AND article_userid='$USERid' ";
	if($conn->query($updateINSERTED)===true && $conn->affected_rows==1){
		
		$errorLOG=5;
		echo "
		<script>
			window.setTimeout(function(){
				window.location.href = 'new-post?post=$last_id';
			}, 1500);
		</script>
			";
	}else{
		$errorLOG=3;
	}
				}else{
					$errorLOG=2;
				}
		}else{
			$emptyError=1;
		}
	}
?>	
<?php if(isset($errorLOG)){ ?>

	<?php if($errorLOG==2){ echo "<span class='text-danger'>Something went wrong!!! Try again or reload this page if error persist</span>";} ?>
	<?php if($errorLOG==3){ echo "<span class='text-danger'>Unknown Error Occurred, Try Again</span>";} ?>
	<?php if($errorLOG==5){ echo "<span class='spinner-border text-success spinner-border-sm'></span> <span class='text-success'>Successfully Created!!! Redirecting...</span>";} ?>

<?php } ?>	
	
	
	<small style='color:#ccc;' id='urllink' ></small>
			<input type='text' name='title' style="width:100%;padding:20px;border:1px solid gray;border-radius:5px;font-size:25px;<?php if(isset($emptyError)){echo'border:3px solid red;';}?>" placeholder='Post Title' <?php if(isset($emptyError)){echo'autofocus';}?> maxlength="80" id='title' onkeyup='titleUrl()' value='<?php if(isset($_POST['title'])){ echo $_POST['title'];} ?>' /> 
	</div>
	<div class='mt-2' > 
		<button name='createTitle' type='submit' class='btn btn-sm btn-info'>Create</button>
	</div>

<?php } ?>
</form>
<?php } ?>

	</div>
	<div class="col-lg-4 col-md-12 col-sm-12">
		<?php include "includes/mainSideNav.php";?>
	</div>
	</div>
</div>  
	 
		<?php include "includes/footers.php";?>

<script>
function titleUrl(){
	var title= document.getElementById('title').value;
	var titleLower = title.toLowerCase();
	var	removeTitleSpecial=	titleLower.replace(/[^a-zA-Z0-9\-]/g, "-");
	var	replaceMultiHypne=	removeTitleSpecial.replace(/-{2,}/g, '-');

				var checkLast =replaceMultiHypne.slice(-1)
			if(checkLast=='-'){
				var newString = replaceMultiHypne.slice(0, -1);
			}else{
				var newString = replaceMultiHypne;
			}
		document.getElementById("urllink").innerHTML = "https://www.<?php echo $websiteUrl1;?>/"+ newString+"-xxxx";
} 
</script>
<script src="<?php echo dirHompg();?>summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
	
    //Initialize Select2 Elements
    $('.select2').select2()
	
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
</body>
</html>