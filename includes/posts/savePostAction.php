<?php include "../../req/coonnect.php"; ?>
<?php
if(isset($_POST['article_check'])){
	$article_Check	=sanitize($conn, $_POST['article_check']);
	$articleCheckid	=$article_Check;
	
$checkSAVE = $conn->query("SELECT * FROM article_save WHERE save_articleId='$articleCheckid' AND save_userId='$USERid' ");
	$numRowCheckSave = $checkSAVE->num_rows;
}


if($numRowCheckSave<1){
	$insertLike="INSERT INTO `article_save`(`save_id`, `save_articleId`, `save_userId`, `save_date`) VALUES ('','$articleCheckid','$USERid','$StrCurrentTime')";
	if($conn->query($insertLike)===true){
		echo "
			<script>
				 loadSavePost();
			</script>
			";
	}
}



?>
 