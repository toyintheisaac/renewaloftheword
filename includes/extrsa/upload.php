<?php include "req/coonnect.php"; 

?>
<?php
if(!empty($_FILES)){
	if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
	{
			//	sleep(1);
		$source_path = $_FILES['uploadFile']['tmp_name'];
		$proIDmain = $_POST['proIDmain']; 
		 
		$NewEdit	= $proIDmain/131;

			$selectDesc=$conn->query("SELECT product_profileImg FROM all_services_products WHERE product_id='$NewEdit' AND product_sellerId='$USERid'");
		$selectProductFetch	=	$selectDesc->fetch_assoc();
			$OldproductImg		= $selectProductFetch['product_profileImg'];

		$Old_path 		= "../../../".$USERserviceName."/productDisplay/".$OldproductImg; 
		
// Check file size
if ($_FILES["uploadFile"]["size"] > 6388608) {
			echo "<script>
					alert('Sorry, your file is too large.');
				</script>
				";
	echo '<img src="'.$Old_path.'" style="height:100%;" />';
}else{
    $RandomNum   = rand(1000, 99999999);
 
    $ImageName      = str_replace(' ','-',strtolower($_FILES['uploadFile']['name']));
    $ImageType      = $_FILES['uploadFile']['type']; //"image/png", image/jpeg etc.
  
  //Create new image name (with random number added).
    $NewImageName = $RandomNum.'-'.$ImageName;		
		
		$target_path 	= '../../../'.$USERserviceName.'/productDisplay/'.$NewImageName; 
		
			
			if(move_uploaded_file($source_path, $target_path))
			{
	$updateProductSql="UPDATE all_services_products SET product_profileImg='$NewImageName' WHERE product_id='$NewEdit' AND product_sellerId='$USERid'";
				if($conn->query($updateProductSql)){
					
					if(!empty($OldproductImg) && file_exists($Old_path)){
						unlink($Old_path);
					} 
					
					
					echo '<img src="'.$target_path.'" style="height:100%;" />';
				}
			} 
	}
	}else{
		
	}
}


if(isset($_POST['deleteMain'])){
	$proIDmain	= $_POST['proIDmaina'];
		$NewEdit	= $proIDmain;
	
			$selectDesc = $conn->query("SELECT attachment_url FROM attachment WHERE attachment_id='$NewEdit' AND attachment_username='$USERid'");
		$selectProductFetch	=	$selectDesc->fetch_assoc();
			$OldproductImg		= $selectProductFetch['attachment_url'];

		$Old_path 		= "easyimage/upload/".$OldproductImg;
		
	$updateProductSql="DELETE FROM attachment WHERE attachment_id='$NewEdit' AND attachment_username='$USERid' ";
		if($conn->query($updateProductSql)){
				if(!empty($OldproductImg) && file_exists($Old_path)){
					unlink($Old_path);
						echo"<script>
								window.setTimeout(function(){
									window.location.href = 'new-post.php';
								}, 100);
							</script>";
				}
		}
}
?>