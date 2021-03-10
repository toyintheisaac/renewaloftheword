<style> 
.titleLINK{
	color:#000;
	text-decoration:none;
}
.titleLINK:hover{
	color:#000;
	text-decoration:underline;
}
.text-dangerr{
	color:#7e0505;
}
.socialHover{
	color:#3c5a99;
	background:whitesmoke;
}
.socialHover:hover{
	background:red;
	color:white;
}
.shareHover{
	background:whitesmoke;
}
.shareHover:hover{
	background:#d9e1ea;
} 

.defaultIMGadd{
	width:100px;
	height:100px;
	line-height:100px;
	margin:auto;
	background:#5a5252;
	position:relative;
	border-radius:100px;
}
.defaultIMGadd button{
	text-align:center;
	color:#7f8080;
	font-size:14px;
	border:0;
	width:100%;
	height:100px;
	line-height:100px;
	border-radius:100px;
}
.defaultIMGadd button:hover{
	background:#bdbcc0;
}
.defaultIMGadd button span{
	height:100px;
	line-height:100px;
} 

.defaultIMG{
	width:140px;
	height:100px;
	border-radius:5px;
	background:#fff;
	border:1px solid gray;
	position:relative;
	overflow:hidden;
}
.defaultIMG img{
	width:100%;
	height:100%;
	position:relative;
	
} 






.headingLINK{
	color:#116206;
	text-decoration:none;
}
.headingLINK:hover{
	color:#000;
	text-decoration:none;
}
.subHeadingLINK{
	color:#000;
	text-decoration:none;
}
.subHeadingLINK:hover{
	color:#116206;
	text-decoration:none;
}
.text-dangerr{
	color:#7e0505;
}
</style> 




<div class="col-sm-12 clearfix" style='margin-bottom:30px;'>
  
	
 <a href='' class='titleLINK'><h3 class='text-left'><?php echo $ARTICLEtitle;?></h3></a>
	
<div class='clearfix'> 
	<i class='float-left'>by <a href='' class='text-secondary' style=''><?php echo ucwords($USERfullname);?></a></i>
</div>	
<div class='clearfix'>
	<div class='float-left'>
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-1 rounded-circle text-center float-right socialHover'>
			<i class="fa fa-bookmark-o" style='font-size:20px;'></i>
		</div><?php if($ARTICLEcomment==1){ ?>
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-1 rounded-circle text-center float-right socialHover'>
			<i class="fa fa-comment-o" style='font-size:20px;'></i>
		</div> <?php } ?>
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-1 rounded-circle text-center float-right socialHover'>
			<a class="fa fa-thumbs-o-up" style='font-size:20px;'></a>
		</div>
	</div>
</div>


	 <div class='clearfix mt-3 text-justify' style='width:100%;'>
		<?php echo $ARTICLEcontent; ?> 
	 </div>
	 
	 
	<div class='mt-2' >
		<small class='text-success mb-0'>Additional Settings</small> 
		


 <div class="">
	<div class="custom-control custom-switch d-inline">
      <input type="checkbox" class="custom-control-input" id="AllowComment" name="" <?php if($ARTICLEcomment==1){ echo 'checked';}?> disabled />
      <label class="custom-control-label" for="AllowComment">Allow Comments</label>
    </div>
    
    <div class="custom-control custom-switch d-inline">
      <input type="checkbox" class="custom-control-input" id="CommentsReply" name="" <?php if($ARTICLEcommentreply==1){ echo 'checked';}?> disabled />
      <label class="custom-control-label" for="CommentsReply">Allow Comments Reply</label>
    </div> 
	
    <div class="custom-control custom-switch d-inline">
      <input type="checkbox" class="custom-control-input" id="sharing" name="" <?php if($ARTICLEsharing==1){ echo 'checked';}?> disabled />
      <label class="custom-control-label" for="sharing">Allow Social Sharing</label>
    </div>
</div>
    			
<div class="mt-1">
		<small class='text-success mb-0'>Search Tags</small> 
	<div class="bg-info p-2 text-light"><?php if(isset($ARTICLEtags)){ echo $ARTICLEtags;}else{echo "Search Tag Not Set";}?></div>
</div>	
<div class="mt-1">
<hr/><hr/>
		<small class='text-success mb-0'>Search Description</small>
	
<div class="text-justify" style='margin-bottom:18px;'>
	<a href='post' class='headingLINK'><h3 class='text-left'><?php echo $ARTICLEtitle;?></h3></a>
				
		<a class='subHeadingLINK'>
		 <div class='clearfix mt-2' style='width:100%;'>
			<img class='' title='<?php echo $ARTICLEtitle;?>' src="<?php echo dirHompg();?>easyimage/features/imgs/1/<?php echo $ARTICLEfeatureimg;?>" alt="<?php echo $ARTICLEtitle;?>" style="width:120px;height:120px;margin-right:15px;float:left;" /> 
			 <?php if(isset($ARTICLEdescription)){ echo $ARTICLEdescription;}?> [...]
		 </div>
		</a>
	<div class='' style="font-size:13px;"><i class='text-dangerr'>0 <i class='fas fa-eye'></i></i>&nbsp;&nbsp; <i>~ posted by <?php echo ucwords($USERfullname);?></i></div>				
</div>
<hr/><hr/>

</div>	 	
			  
	</div> 
	 
<div class='clearfix' style='margin-top:15px;'>
</div>

<?php if($ARTICLEsharing==1){ ?>	
<div class='clearfix'>
	<div class='float-right'>Share via:</div>
</div>
<?php } ?>

	<div class='clearfix'>
<div class='float-left'>
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-1 rounded-circle text-center float-left socialHover' title='Like'>
			<a class="fa fa-thumbs-o-up" style='font-size:20px;'></a>
		</div> <?php if($ARTICLEcomment==1){ ?>
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-1 rounded-circle text-center float-left socialHover' title='Comment'>
			<i class="fa fa-comment-o" style='font-size:20px;'></i>
		</div> 	<?php } ?>
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-1 rounded-circle text-center float-left socialHover' title='Save'>
			<i class="fa fa-bookmark-o" style='font-size:20px;'></i>
		</div>

</div>

<?php if($ARTICLEsharing==1){ ?>	  
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-0 rounded-circle text-center float-right shareHover'>
			<i class="fa fa-whatsapp" style='font-size:20px;color:#4ac959;'></i>
		</div>
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-2 rounded-circle text-center float-right shareHover'>
			<i class="fa fa-linkedin" style='font-size:20px;color:#0077B5;'></i>
		</div>  
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-2 rounded-circle text-center float-right shareHover'>
			<i class="fa fa-twitter" style='font-size:20px;color:#1da1f2;'></i>
		</div>  
		<div style='width:35px;height:35px;line-height:40px' class='d-inline mr-2 rounded-circle text-center float-right shareHover'>
			<i class="fa fa-facebook" style='font-size:20px;color:#3c5a99;'></i>
		</div>
<?php } ?>		
	</div>		 
		 	 			
</div>

<div class="text-justify" style='margin-bottom:18px;'>
<?php
if(isset($_POST['publish'])){ 
	 
			 
			
			$updateINSERTED = $conn->query("UPDATE article SET article_status='5' WHERE article_id='$post' AND article_userid='$USERid' AND article_url='$ARTICLEurl' ");
			if($updateINSERTED===true){
				
				$tempFILE = "post.php";
			$newfile = $ARTICLEurl.".php";
			
			
			if(file_exists($newfile)){
					echo "<script>
							alert('Successfully Approved edited article');
						</script>
						";
					echo "
					<script>
						window.setTimeout(function(){
							window.location.href = 'all-post';
						}, 500);
					</script>
						";
			}else{
				if(copy($tempFILE, $newfile)){
					echo "<script>
							alert('Successfully Approved and created new file link');
						</script>
						";
					echo "
					<script>
						window.setTimeout(function(){
							window.location.href = 'all-post';
						}, 500);
					</script>
						";
				}else{
					echo "<script>
							alert('Failed to create new file link');
						</script>
						";
					echo "
					<script>
						window.setTimeout(function(){
							window.location.href = 'all-post';
						}, 500);
					</script>
						";
				}
			}
			 

			}   
			 
}
?>
	<div class='mt-3'>
	<?php if(isset($errorLOG)){echo $errorLOG;} ?>
	<?php if($ARTICLEstatus==2 || $ARTICLEstatus==3 ){ ?>
		<a class='btn btn-sm btn-warning text-light' >Waiting for Approval</a> <a href='new-post' class='btn btn-sm btn-info text-light'>New Post</a> <a href='all-post' class='btn btn-sm btn-info text-light'>All Post</a>
	<?php }else{ ?>
		<a href='new-post?post=<?php echo $post;?>' class='btn btn-sm btn-warning' >Edit</a> <button name='publish' class='btn btn-sm btn-success' >Publish Article</button>
	<?php } ?>
	</div>
</div> 