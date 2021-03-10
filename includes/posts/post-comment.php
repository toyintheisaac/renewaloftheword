<hr/><hr/>

<?php if($ARTcomment==1){ ?>

<?php
	// 	$commentType	= $fetchComent['comment_type'];   ----  0 Main Comment, 3 replying to comment_type_id
	//	$commentTypeId	= $fetchComent['comment_type_id'];  ----  if comment_type=3 then to comment_id
	//	$commentStatus	= $fetchComent['comment_status'];  ---- 0 active, 1=Deleted, 3 ban_user
	//	$commentStatus	= $fetchComent['comment_status'];  ---- 0 active, 1=Deleted, 5 SPAM USER
if(userloggedin()===true ){
	$selectBANcheck=$conn->query("SELECT * FROM comments WHERE comment_userId='$USERid' AND (comment_status='3' OR comment_status='5') AND comment_articleId='$ARTid'");
}

// pub=33&deletepost=deleteonly&unique=3894&content=33
if($ARTuserid==$USERid){
if(isset($_GET['pub'])&&isset($_GET['unique'])&&isset($_GET['content'])&&isset($_GET['deletepost'])){
	$pub	 = sanitize($conn, $_GET['pub']/33);
	$unique	 = sanitize($conn, $_GET['unique']/33);
	$content = sanitize($conn, $_GET['content']/33);
		$deletePost = sanitize($conn, $_GET['deletepost']);
	
		if($deletePost=='deleteonly'){
			$deletePostNew = sanitize($conn, 1);
			$deleteMessage = 'Post deleted';
		}else if($deletePost=='deleteandban'){
			$deletePostNew = sanitize($conn, 3);
			$deleteMessage = 'Post deleted and user banned';
		}else if($deletePost=='reportandban'){
			$deletePostNew = sanitize($conn, 5);
			$deleteMessage = 'SPAM reported and User banned';
		}else{
			$deletePostNew = sanitize($conn, 0);
			$deleteMessage = 'Post deleted';
		}

		if($pub==$USERid){
	$selectCheck=$conn->query("SELECT * FROM comments WHERE comment_id='$unique' AND comment_articleId='$content'");
		if($selectCheck->num_rows==1){
	$deleteCheck="UPDATE comments SET comment_status='$deletePostNew' WHERE comment_id='$unique' AND comment_articleId='$content'";
		if($conn->query($deleteCheck)===true){
			echo "<script>
					alert('".$deleteMessage."');
				</script>
				"; 
			echo "
			<script>
				window.setTimeout(function(){
					window.location.href = '$currenturl';
				}, 500);
			</script>
				";
		}else{
		}
		}else{
		}
		}else{
		}
}
}
?>	
 
 
<script type="text/javascript"> 
function PostCmtBtnNone(){
 var comment = document.getElementById("comment").value;
	comment = comment.replace(/\s\s+/g, '');
	if(comment=='' || comment==' ' ){
		 return false;
	}else{
	document.getElementById("PostCommentBtn").style.display="none";
	document.getElementById("PostCommentLoading").style.display="block"; 
	}
}  
function PostCmtBtnShow(){
	document.getElementById("PostCommentBtn").style.display="block";
	document.getElementById("PostCommentLoading").style.display="none"; 
}  
function clickPostCommentBtn() {
    PostCmtBtnNone(); 
    leaveAcomment();
}


 

function loadComment()
{
 var usercheck=<?php echo 1034;?>;
 var articleCheck =<?php echo $ARTid;?>;
 var articleUserCheck =<?php echo $ARTuserid;?>;
 var articleComment =<?php echo $ARTcomment;?>;
 var articleCommentreply =<?php echo $ARTcommentreply;?>;
 var currenturl = "<?php echo $currenturl;?>";
 
 if(articleCheck)
 {
  $.ajax({
	type: 'post',
	url: 'includes/posts/loadComment.php', 
	data: {
		user_check:usercheck,
		article_Check:articleCheck,
		article_UserCheck:articleUserCheck,
		article_Comment:articleComment,
		article_currenturl:currenturl,
		article_Commentreply:articleCommentreply
	},
  success: function (response) {
   $('#loadComment').html(response);
		 
  }
  });
 }
 else
 {
  $('#loadComment').html("P");
 }
}

function leaveAcomment(){
 var usercheck=<?php echo 1034;?>;
 var articleCheck =<?php echo $ARTid;?>;
 var articleUserCheck =<?php echo $ARTuserid;?>;
 var articleComment =<?php echo $ARTcomment;?>;
 var articleCommentreply =<?php echo $ARTcommentreply;?>;
 var comment = document.getElementById("comment").value;
	commentCheck = comment.replace(/\s\s+/g, '');
 if( articleCheck == "" || commentCheck=='' || commentCheck==' ' ){
  return false;
 }else{
 $.ajax({
  type: 'post',
  url: 'includes/posts/leaveAcomment.php',
  data: {
		user_check:usercheck,
		article_Check:articleCheck,
		article_UserCheck:articleUserCheck,
		article_Comment:articleComment,
		article_postComment:comment,
		article_Commentreply:articleCommentreply
  },
  success: function (response) {
   $('#comment').html("Sent");
      $('textarea').val(''); 
//	  document.getElementById("myDIV").style.display = "none";
	  document.getElementById('commentInfos').innerHTML = "<div class='alert alert-success' ><a class='close' data-dismiss='alert'>&times;</a> Comment Updated</div>";
			$('#commentInfos').fadeOut(2000).show();
	  loadComment();
	  document.getElementById("PostCommentBtn").style.display="block"; 
	document.getElementById("PostCommentLoading").style.display="none"; 
  }
 });
 return false;
}
}
</script>

<h5 style='margin-bottom:20px;'><b>Comments <?php // echo $currenturl;?></b></h5>
<div class="col-sm-12" style='margin-bottom:35px;' id="loadComment" onm ouseout="loadComment();">
	
</div>

<div class="col-sm-12" style='margin-bottom:25px;' id="commentss">
<h5><b>Leave a Comment</b></h5>
<?php if(userloggedin()===true){ 
if($selectBANcheck->num_rows<1){

?>
	<div style='' >
	<div id='commentInfos' ></div>	
 
			<div class="form-group">
			  <textarea class="form-control" rows="5" name="comment" id="comment" placeholder='Comment:' maxlength='500' onkeyup="PostCmtBtnShow();"><?php if(isset($_POST['comment'])){echo $_POST['comment']; }?></textarea>
			</div> 
			<div class="form-group">
			  <button class='btn btn-danger btn-sm' onclick="clickPostCommentBtn();" id='PostCommentBtn' onmouseover="loadComment();" >Post Comment</button>
				<button class="btn btn-info" id='PostCommentLoading' disabled>
					<span class="spinner-border spinner-border-sm"></span> Posting...
				</button>
			</div> 
	</div>
<?php } }else{ ?>
	<div style='' >
		<button type="button" class='btn btn-sm btn-info text-light'  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#UserLoginModal" >Login to Comment</button>
	</div>
<?php } ?>
</div>	 	
<?php } ?>	

     
<script type="text/javascript"> 
window.setTimeout(function () {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 2000);
</script>	