<?php include "../../req/coonnect.php"; ?>
<?php
if(isset($_POST['article_Check'])){
	$articleCheckid			=sanitize($conn, $_POST['article_Check']);
	$article_UserCheck		=sanitize($conn, $_POST['article_UserCheck']);
	$article_Comment		=sanitize($conn, $_POST['article_Comment']);
	$articleCurrenturl		=sanitize($conn, $_POST['article_currenturl']);
	$article_Commentreply	=sanitize($conn, $_POST['article_Commentreply']);
 
	 $urlDelSt= $websiteUrl.'/'.$articleCurrenturl;
?>

<?php
//pub= userid that make post -, unique=selected comment id, content=selected current article_id

// SELECT ban User 
	$selectBANcheck=$conn->query("SELECT * FROM comments WHERE (comment_status='3' OR comment_status='5') AND comment_userId='$USERid' AND comment_articleId='$articleCheckid'");
 
// END SELECT ban User
?>
		  
<?php
$selectComent=$conn->query("SELECT * FROM comments WHERE comment_type='0' AND comment_articleId='$articleCheckid' AND (comment_status!='1' AND comment_status!='3' AND comment_status!='5') ORDER BY comment_id ASC");
	$numRowComments = $selectComent->num_rows;
	for($sn=1;$sn<=$numRowComments;){
		while($fetchComent = $selectComent->fetch_assoc()){
				$commentId		= $fetchComent['comment_id'];
				$commentUserId	= $fetchComent['comment_userId'];
				$commentContent	= $fetchComent['comment_content']; 
				$commentType	= $fetchComent['comment_type'];   // 0 Main Comment, 3 replying to comment_type_id
				$commentTypeId	= $fetchComent['comment_type_id']; // if comment_type=3 then to comment_id
				$commentStatus	= $fetchComent['comment_status']; // 0 active, 1=Deleted, 3 ban_user
				$commentDate	= $fetchComent['comment_date'];
					$commentArtId	= $articleCheckid;

$selectCommentType=$conn->query("SELECT * FROM main_user WHERE user_id='$commentUserId' ");
			$fetchCommentType = $selectCommentType->fetch_assoc();
				$CommentTypeFirstname 	= $fetchCommentType['user_firstname'];
				$CommentTypeLastname 	= $fetchCommentType['user_lastname'];
					$CommentTypeFullname = ucwords($CommentTypeLastname.' '.$CommentTypeFirstname);
$modalPhs=$sn++;					
?>

<script>
function replyAcomment<?php echo $modalPhs;?>(){
	 var usercheck=<?php echo 1034;?>;
	 var articleCheck =<?php echo $articleCheckid;?>;
	 var commentID = document.getElementById("commentID<?php echo $modalPhs;?>").value;
	 var replyComentContent = document.getElementById("replyComent<?php echo $modalPhs;?>").value;
		commentCheck = replyComentContent.replace(/\s\s+/g, '');
 if( articleCheck == "" || commentCheck=='' || commentCheck==' ' ){
  return false;
 }else{
 $.ajax({
  type: 'post',
  url: 'includes/posts/replyAcomment.php',
  data: {
		user_check:usercheck,
		article_Check:articleCheck,
		article_commentID:commentID,
		article_postComment:replyComentContent
  },
  success: function (response) {
	  loadComment();
  }
 });
 return false;
}
}
</script>		
<div style='margin-bottom:15px;padding:10px;background:#d9e1ea;color:#000;'> 
	<div class="">
		<?php echo $commentContent;?> 
		 
		<?php if($article_UserCheck==$USERid){?><span class='clearfix'><?php if($commentUserId!=$USERid){ ?><a href='<?php echo $urlDelSt;?>?pub=<?php echo $article_UserCheck*33;?>&deletepost=deleteandban&unique=<?php echo $commentId*33;?>&content=<?php echo $commentArtId*33;?>' onclick="return confirm('This will delete and ban user from commenting on this post');" title='ban user'><i title='ban user' class="fa fa-ban float-right text-secondary"></i></a>
		
		<i class="float-right">&nbsp;&nbsp;</i>
		
		<a href='<?php echo $urlDelSt;?>?pub=<?php echo $article_UserCheck*33;?>&deletepost=reportandban&unique=<?php echo $commentId*33;?>&content=<?php echo $commentArtId*33;?>' onclick="return confirm('Report user as SPAM');" title='report SPAM'><i title='report SPAM' class="fas fa-user-alt-slash text-secondary float-right"></i></a><?php }?> 
		
		<i class="float-right">&nbsp;&nbsp;</i> 
		
		<a href='<?php echo $urlDelSt;?>?pub=<?php echo $article_UserCheck*33;?>&deletepost=deleteonly&unique=<?php echo $commentId*33;?>&content=<?php echo $commentArtId*33;?>' onclick="return confirm('Do you want to delete this post?');" title='delete'><i title='delete' class="fa fa-trash-o text-danger float-right"></i></a>
		</span><?php }?>
		
	</div>
		<div class="clearfix" >
<small><b>- <?php echo $CommentTypeFullname;?></b></small> <i class="float-right" ><small><?php //echo date('M d, Y h:ia', $commentDate);?></small></i> 
		</div> 
	
<?php if($article_Commentreply==1 || ( $article_Commentreply==0 && $article_UserCheck== $USERid )){ ?>
<?php if(userloggedin()===true){  ?>			
	<div class="clearfix" >
<?php if($selectBANcheck->num_rows<1){ ?>	
		<button data-toggle="collapse" data-target="#Reply<?php echo $modalPhs;?>" class='btn btn-link text-danger'>Reply</button>
<?php } ?>
			<div id="Reply<?php echo $modalPhs;?>" class="collapse" style='margin-left:20px;padding:10px;border:1px solid #fff;' > 
					<div class="form-group">
					<input type='hidden' id='commentID<?php echo $modalPhs;?>' value='<?php echo $commentId;?>' />
					  <textarea class="form-control" rows="3" name="replyComent<?php echo $modalPhs;?>" id="replyComent<?php echo $modalPhs;?>" placeholder='Comment:' maxlength='400' ></textarea>
					</div> 
					<div class="form-group">
					  <input onclick="replyAcomment<?php echo $modalPhs;?>();" class='btn btn-danger btn-sm' value='Post Comment' />
					</div>  
			</div>
	</div>
<?php } ?>	
<?php } ?>	

<?php 
$selcetComentReply= $conn->query("SELECT * FROM comments WHERE comment_articleId='$articleCheckid' AND comment_type='3' AND comment_type_id='$commentId' AND (comment_status!='1' AND comment_status!='3' AND comment_status!='5') ORDER BY comment_id ASC");


	while($fetchComentReply = $selcetComentReply->fetch_assoc()){
			$commentReplyId		= $fetchComentReply['comment_id'];
			$commentReplyUserId	= $fetchComentReply['comment_userId'];
			$commentReplyContent= $fetchComentReply['comment_content']; 
			$commentReplyDate	= $fetchComentReply['comment_date'];


$selectCommentRType=$conn->query("SELECT * FROM main_user WHERE user_id='$commentReplyUserId' ");
			$fetchCommentRType = $selectCommentRType->fetch_assoc();
				$CommentTypeRFirstname 	= $fetchCommentRType['user_firstname'];
				$CommentTypeRLastname 	= $fetchCommentRType['user_lastname'];
					$CommentTypeRFullname = ucwords($CommentTypeRLastname.' '.$CommentTypeRFirstname);


?>		
		
<div class="clearfix" style='padding:15px;border:2px solid #fff;' >
			<?php echo $commentReplyContent;?>
			
	<?php if($article_UserCheck==$USERid){?><span class='clearfix'><?php if($commentReplyUserId!=$USERid){?><a href='<?php echo $urlDelSt;?>?pub=<?php echo $article_UserCheck*33;?>&deletepost=deleteandban&unique=<?php echo $commentReplyId*33;?>&content=<?php echo $commentArtId*33;?>' onclick="return confirm('This will delete and ban user from commenting on this post');" title='ban user'><i title='ban user' class="fa fa-ban float-right text-secondary"></i></a>
		<i class="float-right">&nbsp;&nbsp;</i>
		
		<a href='<?php echo $urlDelSt;?>?pub=<?php echo $article_UserCheck*33;?>&deletepost=reportandban&unique=<?php echo $commentId*33;?>&content=<?php echo $commentArtId*33;?>' onclick="return confirm('Report user as SPAM');" title='report SPAM'><i title='report SPAM' class="fas fa-user-alt-slash text-secondary float-right"></i></a>
	<?php }?> 
<i class="float-right">&nbsp;&nbsp;</i> 
<a href='<?php echo $urlDelSt;?>?pub=<?php echo $article_UserCheck*33;?>&deletepost=deleteonly&unique=<?php echo $commentReplyId*33;?>&content=<?php echo $commentArtId*33;?>' onclick="return confirm('Do you want to delete this post?');" title='delete'><i title='delete' class="fa fa-trash-o text-danger float-right"></i></a></span><?php }?>
			
	<div class="clearfix" >
		<small><b>- <?php echo $CommentTypeRFullname;?></b></small> <i class="float-right" ><small><?php // echo date('M d, Y h:ia', $commentReplyDate);?></small></i> 
	</div>
</div>
	<?php } ?>
	</div>
<?php } ?>	
<?php } ?>	
<?php } ?>	
	
