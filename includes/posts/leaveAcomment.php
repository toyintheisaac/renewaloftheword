<?php include "../../req/coonnect.php"; ?>
<?php
if(isset($_POST['article_Check'])){
	$article_Check			=sanitize($conn, $_POST['article_Check']);
	$article_UserCheck		=sanitize($conn, $_POST['article_UserCheck']);
	$article_postComment	=$_POST['article_postComment'];
	$article_Commentreply	=sanitize($conn, $_POST['article_Commentreply']);
	$articleCheckid	= $article_Check;
 
?>
 

<?php	 
	if(!empty($article_postComment)){
			$commentClean = sanitize($conn, nl2br($article_postComment));
		
		$selectCheckBanUser=$conn->query("SELECT * FROM comments WHERE comment_articleId='$articleCheckid' AND comment_userId='$USERid' AND comment_status='3' ");
		if($selectCheckBanUser->num_rows>=1){
			
		}else{
		/*	$selectDuplicate=$conn->query("SELECT * FROM comments WHERE comment_articleId='$articleCheckid' AND comment_userId='$USERid' AND comment_content='$commentClean' AND comment_status='0' AND comment_type='0' AND comment_type_id='0'");
				if($selectDuplicate->num_rows>=1){
					echo "
						<script>
							 loadComment();
						</script>
						";
			//	}else{ */
	$insertComment="INSERT INTO `comments`(`comment_id`, `comment_articleId`, `comment_userId`, `comment_content`, `comment_type`, `comment_type_id`, `comment_status`, `comment_date`) VALUES ('','$articleCheckid','$USERid','$commentClean','0','0','0','$StrCurrentTime')";
	if($conn->query($insertComment)==true){
		echo "
			<script>
				 loadComment(); 
				 document.getElementById('PostCommentBtn').style.display='block'; 
			</script>
			";
			
	}
			//	}
			
			
		}
	}
	}
?>