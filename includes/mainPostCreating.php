<style>
input{ outline:0; border:1px solid #000; }
#editor{  min-height:400px; }
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




#targetLayer{
float:left;
width:70px;
height:70px;
text-align:center;
line-height:70px;
font-weight: bold;
color: #C0C0C0;
background-color: #F0E8E0;
border-bottom-left-radius: 4px;
border-top-left-radius: 4px;
} 

#uploadFormLayer{
	float:left;
	padding: 10px;
}
.btnSubmit {
	background-color: #696969;
    padding: 3px 15px;
    border: #696969 1px solid;
    border-radius: 4px;
    color: #FFFFFF;
    margin-top: 5px;
}
.inputFile {
	padding: 3px;
	background-color: #FFFFFF;
	border:#F0E8E0 1px solid;
	border-radius: 4px;
}
.image-preview {
float:left;
width:70px;
height:70px;
text-align:center;
line-height:70px; 
background-color: #F0E8E0;
border-bottom-left-radius: 4px;
border-top-left-radius: 4px;
}

</style>
<?php
if(isset($_POST['saveforpreview'])){
	$content			=	sanitize($conn, $_POST['content']);
	
	if(isset($_POST['AllowComments'])){
		$AllowComments		=	sanitize($conn, 1);
	}else{
		$AllowComments		=	sanitize($conn, 5); //0=not set
	}
		if(isset($_POST['AllowCommentsReply'])){
			$AllowCommentsReply		=	sanitize($conn, 1);
		}else{
			$AllowCommentsReply		=	sanitize($conn, 5);
		}
			if(isset($_POST['AllowSharing'])){
				$AllowSharing		=	sanitize($conn, 1);
			}else{
				$AllowSharing		=	sanitize($conn, 5);
			}

	$shortTags	= sanitize($conn, $_POST['shortTags']);
	$shortDesc	= sanitize($conn, $_POST['shortDesc']);
	
		if(empty($shortDesc)){
				$content2 = strip_tags($content, '');
			$shortDesc = mb_strimwidth($content2, 0, 280, '');
		}else{
			$shortDesc = $shortDesc;
		}
		
	if(!empty($content)){
		
		
		$updateArticleCont="UPDATE article SET article_content='$content', article_comment='$AllowComments', article_commentreply='$AllowCommentsReply', article_sharing='$AllowSharing', article_tags='$shortTags', article_description='$shortDesc' WHERE article_id='$post' AND article_userid='$USERid'";
			
			if($conn->query($updateArticleCont)===true && $conn->affected_rows==1){
					$successLOGs = "<span class='spinner-border text-warning spinner-border-sm'></span> Generating Preview";
				echo "
				<script>
					window.setTimeout(function(){
						window.location.href = 'new-post?post=$post&preview=active';
					}, 2000);
				</script>
				";
				
			}else{
				$errorLOGs="<span class='spinner-border text-warning spinner-border-sm'></span> No changes made!!! Generating Preview </br>";
				echo "
				<script>
					window.setTimeout(function(){
						window.location.href = 'new-post?post=$post&preview=active';
					}, 2500);
				</script>
				";
			}
		
	}else{
		$errorLOGs="You can't post an empty article</br>";
	}
}

?>
<div class="text-justify" style='margin-bottom:18px;'>

	<div class='mt-2' >
		<small class='text-success mb-0'>Title</small>
		<h3><?php echo $ARTICLEtitle;?></h3>
	</div>
	
	<div class='mt-3' >
<?php ?>
	</div>

<?php include "includes/mainPostSettings.php"; ?>

	<div class='mt-3' >
		<small class='text-success mb-0'>Article</small> 
			 
	
        <textarea id="compose-textarea" class="form-control" style="height:600px" name="content"  rows="10" placeholder='Write your article....'  ><?php if(isset($_POST['content'])){echo $_POST['content'];}else if(isset($ARTICLEcontent)){ echo $ARTICLEcontent;}?></textarea>
	
	
	
 
	</div>

<?php
if(isset($_GET['FileURLid'])&&isset($_GET['FileURL'])&&!empty($_GET['FileURLid'])&&!empty($_GET['FileURL'])){
	$FileURLid	= sanitize($conn, $_GET['FileURLid']);
	 $FileURL	= sanitize($conn, $_GET['FileURL']);
	if(!empty($FileURLid)){
		$deleteATTAC="DELETE FROM attachment WHERE attachment_type='1' AND attachment_id='$FileURLid' AND attachment_userID='$USERid' AND attachment_url='$FileURL' ";
		if($conn->query($deleteATTAC)==true){
			if(file_exists("easyimage/upload/$FileURL")){
				unlink("easyimage/upload/$FileURL");
			}
			echo "
				<script>
					window.setTimeout(function(){
						window.location.href = 'new-post?post=$post&edits=activ&edit=$ARTICLEurl';
					}, 500);
				</script>
				";
			
		}
	}
}
?>
<script>
function showMainFiles(){
 var posts = <?php echo $post;?>; 
	var urls = "<?php echo $ARTICLEurl;?>"; 
 if( posts == "" ){
  return false;
 }else{
 $.ajax({
  type: 'post',
  url: 'includes/showMainFiles.php',
  data: {
		currenturl:urls,
		posts:posts
  },
  success: function (response) {
	$('#showMainUpload').html(response);
	
  },
	error: function(jqXHR, textStatus, errorThrown){
		alert(textStatus +' '+ errorThrown);
	}
 });
 return false;
}
}
</script>	  
	
	
	<div class='mt-3'>
	<?php if(isset($errorLOGs)){echo "<small class='text-danger'>$errorLOGs</small>";} ?>
	
		<button name='saveforpreview' class='btn btn-sm btn-success'><?php if(isset($successLOGs)){echo $successLOGs;}else{echo 'Save and Preview';}?> </button>
	</div>
</div> 

<script type="text/javascript"> 
window.onload=function(){
showMainFiles();

}
</script>