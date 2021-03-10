<?php include "../req/coonnect.php";?>

<?php

if(isset($_POST['post'])){
	$post	= $_POST['post'];

$name = ''; $type = ''; $size = ''; $error = '';
   function compress_images($source_url, $destination_url, $quality) {
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
		
if(isset($_FILES["postImg"]["tmp_name"]) && !empty($_FILES["postImg"]["tmp_name"]) ) {

$UploadFilename	= $_FILES["postImg"]["name"];
$fileTmpLoc 	= $_FILES["postImg"]["tmp_name"];
$fileType 		= $_FILES["postImg"]["type"];
$fileSize 		= $_FILES["postImg"]["size"];
$fileErrorMsg 	= $_FILES["postImg"]["error"];

$rand			=mt_rand(10, 99999);
$new_filename	=$rand.'_'.$UploadFilename;

	$postPath = "../easyimage/upload/".$new_filename;


if (!file_exists($postPath)) {
    mkdir($postPath);
}
				if(compress_images($_FILES["postImg"]["tmp_name"], $postPath, 20)){
	$updateFeatureIMG="INSERT INTO attachment(attachment_id, attachment_userID, attachment_article_id, attachment_url, attachment_type, attachment_date) VALUES ('','$USERid','$post','$new_filename','1','$StrCurrentTime')
				";
		if($conn->query($updateFeatureIMG)===true){
echo $postPaths = "../easyimage/upload/".$new_filename;
		/*	echo "
			<script>
				window.setTimeout(function(){
					window.location.href = '$currentUrlPage';
				}, 500);
			</script>
			";		*/
		}else{
echo $errorPostIMg="<span class='text-danger'>Cant upload, Try again!!!</span>";
		}
}
}
}
?>