<style>
.titleLINK{	color:#000;	text-decoration:none;}
.titleLINK:hover{ color:#000; text-decoration:underline;}
.text-dangerr{ color:#7e0505; }
.socialHover{ color:#3c5a99; background:whitesmoke; }
.socialHover:hover{	background:red;	color:white; box-shadow: 1px 1px 15px grey;} 
.shareHover{ background:whitesmoke; }
.shareHover:hover{ background:#d9e1ea; box-shadow: 1px 1px 15px grey;}
</style>
<?php 
$currenturl	=	$currentProductFilename.''.$inludePHP;




?>




<div class="col-sm-12 clearfix" style='margin-bottom:30px;'>
	<a href='<?php echo $currentProductFilename;?>' class='titleLINK'><h2 class='text-left'><?php echo $ARTtitle;?></h2></a>
<div class='clearfix'> 
	<i class='float-left'>by <a href='#' class='text-secondary' style=''><?php echo ucwords($AuthourFullname);?></a></i> <i class='float-left ml-5 text-danger'> <i class='fas fa-eye'></i> <?php echo $ARTE_count;?></i>
</div>
<div class='clearfix mt-1 text-danger'>
	<?php if(isset($ErrorMs)){ echo $ErrorMs ; } ?>		  
</div>
<div class='clearfix' style='margin-top:5px;'>
<?php if($ARTsharing==1){?>	
	<div class='float-left'>Share via:</div>
<?php } ?>	
</div>  

<?php if($ARTsharing==1){?>	
	<a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $websiteUrl.''.$currentUrlPage;?>" title="Share on Facebook" target="_blank" >
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-2 rounded-circle text-center float-left shareHover'>
			<i class="fa fa-facebook" style='font-size:20px;color:#3c5a99;'></i>
		</div>
	</a>
	<a href="http://twitter.com/share?url=<?php echo $websiteUrl.''.$currentUrlPage;?>&text=<?php echo $ARTtitle; ?>&hashtags=<?php echo str_replace(' ', '', $ARTtags);?>" title="Share on Twitter" target="_blank" >
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-2 rounded-circle text-center float-left shareHover'>
			<i class="fa fa-twitter" style='font-size:20px;color:#1da1f2;'></i>
		</div>
	</a>
	<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $websiteUrl.''.$currentUrlPage;?>" title="Share on Linkedin" target="_blank" >
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-2 rounded-circle text-center float-left shareHover'>
			<i class="fa fa-linkedin" style='font-size:20px;color:#0077B5;'></i>
		</div>
	</a>
	<a href="whatsapp://send?text=<?php echo $websiteUrl.''.$currentUrlPage;?>" data-action="share/whatsapp/share" title="Share on WhatsApp" target="_blank" >
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-0 rounded-circle text-center float-left shareHover'>
			<i class="fa fa-whatsapp" style='font-size:20px;color:#4ac959;'></i>
		</div>
	</a> 	
<?php } ?>
<div class='clearfix'>
	<div class='float-right'>
<span class="postSave"></span>
<?php if($ARTcomment==1){?>		
		<a href='#commentss' ><div style='width:35px;height:35px;line-height:40px' class='d-inline mr-1 rounded-circle text-center float-right socialHover'>
			<i class="fa fa-comment-o" style='font-size:20px;'></i>
		</div></a>
<?php }else{?>		
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-1 rounded-circle text-center float-right'>
			<i class="fas fa-comment-slash" style='font-size:20px;'></i>
		</div> 
<?php } ?>
	</div>
</div> 
	<div class='clearfix mt-3 text-justify' style='width:100%;'  >
			 <?php echo $ARTcontent;?>		  
	</div> 
<div class='clearfix mt-1 text-danger'>
	<?php if(isset($ErrorMs)){ echo $ErrorMs ; } ?>		  
</div>	 
<div class='clearfix' style='margin-top:5px;'>
<?php if($ARTsharing==1){?>	
	<div class='float-right'>Share via:</div>
<?php } ?>	
</div>
<script type="text/javascript">

function loadlikePost(){
 var usercheck=<?php echo 1034;?>;
 var articleCheck =<?php echo $ARTid;?>; 
 if(usercheck){
  $.ajax({	type: 'post',	url: 'includes/posts/loadLike.php', 
	data: {	user_check:usercheck, article_Check:articleCheck },  
	success: function (response) {
   $('#postLike').html(response); } });
 }else{ $('#postLike').html("p");}}
function likePost(){var usercheck=<?php echo 1034;?>;var articleCheck =<?php echo $ARTid;?>;
 if( articleCheck == "" ){ return false;}else{
 $.ajax({  type: 'post',  url: 'includes/posts/likePostAction.php',
  data: {   article_check:articleCheck,   user_check:usercheck
  }, success:function(response){loadlikePost(); }
 });
 return false;}}
function dislike(){
 var usercheck=<?php echo 1034;?>;
 var articleCheck =<?php echo $ARTid;?>;
 if(articleCheck==""){ return false;}else{
 $.ajax({
  type: 'post',
  url: 'includes/posts/unlikePostAction.php',
  data: {
   article_check:articleCheck,
   user_check:usercheck
  },  success:function(response){ loadlikePost(); }
 }); return false;}}
</script>
<script type="text/javascript"> 
function loadSavePost(){ var usercheck=<?php echo 1034;?>; var articleCheck =<?php echo $ARTid;?>;
 if(usercheck){
  $.ajax({ type: 'post', url: 'includes/posts/loadSavePost.php', 
	data:{	user_check:usercheck, article_Check:articleCheck},
  success:function(response){ 
	$('.postSave').html(response);  
  }}); }
 else{ $('.postSave').html("P"); }}

function savePost(){ var usercheck=<?php echo 1034;?>; var articleCheck =<?php echo $ARTid;?>;
 if(articleCheck==""){ return false; }else{
 $.ajax({  type: 'post',  url: 'includes/posts/savePostAction.php',
  data: { article_check:articleCheck,  user_check:usercheck },
  success: function (response) {  
	loadSavePost();  
  } }); return false;}}
function unSavePost(){ var usercheck=<?php echo 1034;?>; var articleCheck =<?php echo $ARTid;?>;
 if(articleCheck==""){ return false; }else{
 $.ajax({ type: 'post', url: 'includes/posts/unSavePostAction.php',
  data: {  article_check:articleCheck,  user_check:usercheck  },
  success: function (response) {
	  loadSavePost();
  } }); return false;}}
</script>


	<div class='clearfix'> 	
<div class='float-left'>
<span id="postLike"></span>
<span class="postSave"></span>
<?php if($ARTcomment==1){?>		
		<a href='#commentss' ><div style='width:35px;height:35px;line-height:40px' class='d-inline mr-1 rounded-circle text-center float-right socialHover'>
			<i class="fa fa-comment-o" style='font-size:20px;'></i>
		</div></a>
<?php }else{?>		
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-1 rounded-circle text-center float-right'>
			<i class="fas fa-comment-slash" style='font-size:20px;'></i>
		</div> 
<?php } ?>	
</div> 
	 
<?php if($ARTsharing==1){?>	
	<a href="whatsapp://send?text=<?php echo $websiteUrl.''.$currentUrlPage;?>" data-action="share/whatsapp/share" title="Share on WhatsApp" target="_blank" >
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-0 rounded-circle text-center float-right shareHover'>
			<i class="fa fa-whatsapp" style='font-size:20px;color:#4ac959;'></i>
		</div>
	</a> 
	<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $websiteUrl.''.$currentUrlPage;?>" title="Share on Linkedin" target="_blank" >
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-2 rounded-circle text-center float-right shareHover'>
			<i class="fa fa-linkedin" style='font-size:20px;color:#0077B5;'></i>
		</div>
	</a>
	<a href="http://twitter.com/share?url=<?php echo $websiteUrl.''.$currentUrlPage;?>&text=<?php echo $ARTtitle; ?>&hashtags=<?php echo str_replace(' ', '', $ARTtags);?>" title="Share on Twitter" target="_blank" >
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-2 rounded-circle text-center float-right shareHover'>
			<i class="fa fa-twitter" style='font-size:20px;color:#1da1f2;'></i>
		</div>
	</a>
	<a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $websiteUrl.''.$currentUrlPage;?>" title="Share on Facebook" target="_blank" >
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-2 rounded-circle text-center float-right shareHover'>
			<i class="fa fa-facebook" style='font-size:20px;color:#3c5a99;'></i>
		</div>
	</a>
<?php } ?>
	</div>
	 
</div>

<?php include "post-comment.php";?>

<script type="text/javascript"> 
window.onload=function(){
loadlikePost();
loadSavePost();
loadComment();
document.getElementById("PostCommentLoading").style.display="none"; 
}
</script>

<script type="text/javascript"> 
window.setTimeout(function () {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 2000);
</script>