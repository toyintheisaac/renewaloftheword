<?php include "../../req/coonnect.php"; ?>
<?php
if(isset($_POST['article_Check'])){
	$article_Check	=sanitize($conn, $_POST['article_Check']);
	$articleCheckid	= $article_Check;
 
$checkSAVE = $conn->query("SELECT * FROM article_save WHERE save_articleId='$articleCheckid' AND save_userId='$USERid' ");
	$numRowCheckSave = $checkSAVE->num_rows;

}
?>



<?php if(!userloggedin()==true ){ ?>
	<a class="socialHover rounded-circle mr-1 text-center float-left border-0" style='width:35px;height:35px;line-height:40px' onclick="loginRequired();" title='Login Required' ><i class="fa fa-bookmark-o" style='font-size:20px;'></i></a>
<?php }else if(userloggedin()===true && $numRowCheckSave<1){?>
	<button class="socialHover rounded-circle mr-1 text-center float-left border-0" style='width:35px;height:35px;line-height:40px'  title='Save' onclick="savePost();" ><i class="fa fa-bookmark-o" style='font-size:20px;'></i></button>
<?php }else if(userloggedin()===true && $numRowCheckSave==1){ ?>	
	<button class="socialHover rounded-circle mr-1 text-center float-left border-0 bg-danger text-light" style='width:35px;height:35px;line-height:40px'  title='Save'  onclick="unSavePost();"><i class="fa fa-bookmark-o" style='font-size:20px;'></i></button>
<?php } ?>	