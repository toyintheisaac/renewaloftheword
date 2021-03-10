
<?php
if(isset($_COOKIE['SettingsActive'])&&!empty('SettingsActive')){
	$openACC = $_COOKIE['SettingsActive'];
}
?>

	<div class='mt-3' >
				<small class='text-success mb-0'>Additional Settings</small> 
			 <div id="accordion">
			 
<form method="POST" action='' enctype="multipart/form-data" >
  <div class="card">
	<div class="card-header" style='padding:10px 20px;font-size:13px;'>
	  <a class="collapsed card-link text-dark" data-toggle="collapse" href="#FeatureImage"  onclick="activeSET('SettingsActive', 'FeatureImage', 1)">
		Feature Image
	  </a>
	</div>
	<div id="FeatureImage" class="collapse <?php if( (!isset($openACC) || empty($openACC) ) || ( isset($openACC) && $openACC=='FeatureImage')){echo 'show';}?>" data-parent="#accordion">
	  <div class="card-body" style='padding:15px 20px;font-size:13px;'>
		  <div class="custom-file">

<?php
$name = ''; $type = ''; $size = ''; $error = '';
   function compress_image($source_url, $destination_url, $quality) {
      $info = getimagesize($source_url);
          if ($info['mime'] == 'image/jpeg')
          $image = imagecreatefromjpeg($source_url);
          elseif ($info['mime'] == 'image/gif')
          $image = imagecreatefromgif($source_url);
          elseif ($info['mime'] == 'image/png')
          $image = imagecreatefrompng($source_url);
          imagejpeg($image, $destination_url, $quality);
          return $destination_url;
        }
		
if(isset($_POST['userImageaa'])) {

$UploadFilename	= $_FILES["userImage"]["name"];
$fileTmpLoc 	= $_FILES["userImage"]["tmp_name"];
$fileType 		= $_FILES["userImage"]["type"];
$fileSize 		= $_FILES["userImage"]["size"];
$fileErrorMsg 	= $_FILES["userImage"]["error"];

$rand			=mt_rand(10, 99999);
$new_filename	=$rand.'_'.$UploadFilename;

$targetPath = "easyimage/features/imgs/1/".$new_filename;

				if(compress_image($_FILES["userImage"]["tmp_name"], $targetPath, 30)){
					
				$updateFeatureIMG="UPDATE article SET article_featureimg='$new_filename' WHERE article_userid='$USERid' AND article_id='$post' AND article_url='$ARTICLEurl'";
		if($conn->query($updateFeatureIMG)===true){
			if(!empty($ARTICLEfeatureimg)){
				if(file_exists("easyimage/features/imgs/1/$ARTICLEfeatureimg")){
					unlink("easyimage/features/imgs/1/$ARTICLEfeatureimg");
				}
			}
			
$targetPaths = "easyimage/features/imgs/1/".$new_filename;
		/*	echo "
			<script>
				window.setTimeout(function(){
					window.location.href = '$currentUrlPage';
				}, 500);
			</script>
			";		*/
		}else{
			$errorFeatureIMg="<span class='text-danger'>Cant upload, Try again!!!</span>";
		}
}
}
?>

<div class="bgColor clearfix">
<?php if(isset($errorFeatureIMg)){ echo $errorFeatureIMg;} ?>
		<?php if(isset($targetPaths)){ ?><img class="image-preview" src="<?php echo $targetPaths; ?>" /><?php }else if(!empty($ARTICLEfeatureimg)){ ?><img class="image-preview" src="easyimage/features/imgs/1/<?php echo $ARTICLEfeatureimg; ?>" alt="<?php echo $ARTICLEfeatureimg; ?>" /><?php }else{ ?> <div id="targetLayer">No Image</div><?php } ?>
		<div id="uploadFormLayer">
			<input name='userImage' type="file" class="inputFile"  accept="image/*"/><br/>
			<input type="submit" name="userImageaa" value="Submit" class="btnSubmit" />
		</div>
</div>

	<small style='color:#7e0505;display:block;'>This image will be display on search preview</small>
		  </div>
	  </div>
	</div>
  </div>
</form>



<div class="card">
		<div class="card-header" style='padding:10px 20px;font-size:13px;'>
		  <a class="collapsed card-link text-dark" data-toggle="collapse" href="#CommentsSharing" onclick="activeSET('SettingsActive', 'CommentsSharing', 1)">
			Comments & Sharing
		  </a>
		</div>
	<div id="CommentsSharing" class="collapse <?php if(isset($openACC) && $openACC=='CommentsSharing'){echo 'show';}?>" data-parent="#accordion">
	  <div class="card-body" style='padding:15px 20px;font-size:13px;'>
						
		  <div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input" id="AllowComments" name="AllowComments"  <?php if(isset($_POST['AllowComments'])){echo 'checked';}else if(isset($ARTICLEcomment)&&$ARTICLEcomment==1){ echo 'checked';}else if(!isset($_POST['AllowComments']) && $ARTICLEcomment==0){echo 'checked';}?>  />
				<label class="custom-control-label" for="AllowComments">Allow Comments					
				</label>
					<small style='color:#7e0505;display:block;'>(public can comment on this article)</small>
		  </div>
		  <div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input" id="AllowCommentsReply" name="AllowCommentsReply" <?php if(isset($_POST['AllowCommentsReply'])){echo 'checked';}else if(isset($ARTICLEcommentreply)&&$ARTICLEcommentreply==1){ echo 'checked';}else if(!isset($_POST['AllowCommentsReply']) && $ARTICLEcommentreply==0){echo 'checked';}?> 
			/>
				<label class="custom-control-label" for="AllowCommentsReply">Allow Comments Reply</label>
					<small style='color:#7e0505;display:block;'>(public can reply to comments on this article)</small>
		  </div>
		  <div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input" id="AllowSharing" name="AllowSharing" 
				<?php if(isset($_POST['AllowSharing'])){echo 'checked';}else if(isset($ARTICLEsharing)&&$ARTICLEsharing==1){ echo 'checked'; }else if(!isset($_POST['AllowSharing']) && $ARTICLEsharing==0){echo 'checked';}?> 
			/>
			
				<label class="custom-control-label" for="AllowSharing">Allow Sharing</label>
					<small style='color:#7e0505;display:block;'>(public can share this article)</small>
		  </div>
				
					
	  </div>
	</div>
  </div>

	  <div class="card">
		<div class="card-header" style='padding:10px 20px;font-size:13px;'>
		  <a class="collapsed card-link text-dark" data-toggle="collapse" href="#AddTag" onclick="activeSET('SettingsActive', 'AddTag', 1)">
			Add Search Tag
		  </a>
		</div>
		<div id="AddTag" class="collapse <?php if(isset($openACC) && $openACC=='AddTag'){echo 'show';}?>" data-parent="#accordion">
		  <div class="card-body" style='padding:15px 20px;font-size:13px;'>
			<input type='text' name='shortTags' value="<?php if(isset($_POST['shortTags'])){echo $_POST['shortTags'];}else if(isset($ARTICLEtags)){ echo $ARTICLEtags;}?>" class='form-control' placeholder='Add Tag' maxlength='80' />
				<small style='color:#7e0505;display:block;'>Max 7 Keywords separated with a comma</small>
		  </div>
		</div>
	  </div>

  <div class="card">
	<div class="card-header" style='padding:10px 20px;font-size:13px;'>
	  <a class="collapsed card-link text-dark" data-toggle="collapse" href="#ShortDescription" onclick="activeSET('SettingsActive', 'ShortDescription', 1)">
		Write a Short Description
	  </a>
	</div>
	<div id="ShortDescription" class="collapse <?php if(isset($openACC) && $openACC=='ShortDescription'){echo 'show';}?>" data-parent="#accordion">
	  <div class="card-body" style='padding:15px 20px;font-size:13px;'>
			 <div class="form-group">
			  <label for="ShortDescription">Short Description:</label>
			  <textarea class="form-control" rows="3" id="ShortDescription" maxlength='250' name='shortDesc'><?php if(isset($_POST['shortDesc'])){echo $_POST['shortDesc'];}else if(isset($ARTICLEdescription)){ echo $ARTICLEdescription;}?></textarea>
			<small style='color:#7e0505;display:block;'>This will be displayed on search engines</small>
			</div> 
	  </div>
	</div>
  </div>
			</div>
	</div>
	
<script>
function activeSET(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*60*3600));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
</script>