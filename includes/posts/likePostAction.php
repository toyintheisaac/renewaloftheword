<?php include "../../req/coonnect.php"; ?>
<?php
if(isset($_POST['article_check'])){
	$article_Check	=sanitize($conn, $_POST['article_check']);
	$articleCheckid	=$article_Check;
	
$checkLIKES = $conn->query("SELECT * FROM article_likes WHERE likes_articleId='$articleCheckid' AND likes_userId='$USERid' ");
	$numRowCheckLike = $checkLIKES->num_rows;

}


	if($numRowCheckLike<1){	
	$insertLike="INSERT INTO `article_likes`(`likes_id`, `likes_articleId`, `likes_userId`, `likes_date`) VALUES ('','$articleCheckid','$USERid','$StrCurrentTime')";
	if($conn->query($insertLike)===true){
		echo "
			<script>
				 loadlikePost();
			</script>
			";
}
}
 

?>
 