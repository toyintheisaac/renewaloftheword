<?php include "../../req/coonnect.php"; ?>
<?php
if(isset($_POST['article_check'])){
	$article_Check	=sanitize($conn, $_POST['article_check']);
	$articleCheckid	=$article_Check;
	
$checkSAVE = $conn->query("SELECT * FROM article_save WHERE save_articleId='$articleCheckid' AND save_userId='$USERid' ");
	$numRowCheckSave = $checkSAVE->num_rows;
}
 

if($numRowCheckSave>=1){
	$deleteLike="DELETE FROM article_save WHERE save_articleId='$articleCheckid' AND save_userId='$USERid' ";
	if($conn->query($deleteLike)===true){
		echo "
			<script>
				 loadSavePost();
			</script>
			";
	}
}


?>
 