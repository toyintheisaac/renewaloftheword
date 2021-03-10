<?php include "../../req/coonnect.php"; ?>
<?php
if(isset($_POST['article_Check'])){
	$articleCheckid			=sanitize($conn, $_POST['article_Check']);
	$article_commentID	=sanitize($conn, $_POST['article_commentID']);
	$article_postComment	=$_POST['article_postComment'];

 
?>

<?php
	if(!empty($article_postComment)){
			$CcommentId = $article_commentID;	
			$commentClean = sanitize($conn, nl2br($article_postComment));	
	 
		$selectCheckBanUser=$conn->query("SELECT * FROM comments WHERE comment_articleId='$articleCheckid' AND comment_userId='$USERid' AND comment_status='3' ");
		if($selectCheckBanUser->num_rows>=1){
			
		}else{ 
	$insertComment="INSERT INTO `comments`(`comment_id`, `comment_articleId`, `comment_userId`, `comment_content`, `comment_type`, `comment_type_id`, `comment_status`, `comment_date`) VALUES ('','$articleCheckid','$USERid','$commentClean','3','$CcommentId','0','$StrCurrentTime')";
	if($conn->query($insertComment)==true){
		echo "
			<script>
				 loadComment();
			</script>
			";
	}
				 
			
			
		}
	}
	}
?>