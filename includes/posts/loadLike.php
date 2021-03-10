<?php include "../../req/coonnect.php"; ?>
<?php
if(isset($_POST['article_Check'])){
	$article_Check	=sanitize($conn, $_POST['article_Check']);
	$articleCheckid	= $article_Check;

$checkLIKESCount = $conn->query("SELECT * FROM article_likes WHERE likes_articleId='$articleCheckid' ");
	$numRowLIKESCount = $checkLIKESCount->num_rows;
	
$checkLIKES = $conn->query("SELECT * FROM article_likes WHERE likes_articleId='$articleCheckid' AND likes_userId='$USERid' ");
	$numRowCheckLike = $checkLIKES->num_rows;
}
?> 
	
<?php if(userloggedin()===true && $numRowCheckLike<1){ ?>
	<button class="socialHover rounded-circle mr-1 text-center float-left border-0" style='width:35px;height:35px;line-height:40px'  title='Like' id='like' onclick="likePost();"><i class="fas fa-heart" style='font-size:20px;'></i></button>
<?php }else if(userloggedin()===true && $numRowCheckLike==1){ ?>	
	<button class="socialHover rounded-circle mr-1 text-center float-left border-0 bg-danger text-light" style='width:35px;height:35px;line-height:40px'  title='Like'  onclick="dislike();"><i class="fas fa-heart" style='font-size:20px;'></i></button>
<?php }else{ ?>	
	<a class="socialHover rounded-circle mr-1 text-center float-left border-0" style='width:35px;height:35px;line-height:40px' onclick="loginRequired();" title='Login required' ><i class="fas fa-heart" style='font-size:20px;'></i></a>
<?php } ?>	