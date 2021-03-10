<style>
.headingLINK{ color:#159e02;text-decoration:none;font-weight:900;}
.headingLINK:hover{	color:#000;	text-decoration:none;}
.subHeadingLINK{ color:#000;text-decoration:none;}
.subHeadingLINK:hover{ color:#116206;text-decoration:none;}
.text-dangerr{ color:#7e0505;}
</style>
<?php
$pageArticleQuery = $conn->query("SELECT * FROM article WHERE article_status='5' ORDER BY article_date DESC LIMIT 10");
		while($fetchArticleQuery = $pageArticleQuery->fetch_assoc() ){
				$ARTid 			= $fetchArticleQuery['article_id'];
				$ARTuserid 		= $fetchArticleQuery['article_userid'];
				$ARTtitle		 = $fetchArticleQuery['article_title'];
				$ARTurl			 = $fetchArticleQuery['article_url'];
				$ARTfeatureimg	 = $fetchArticleQuery['article_featureimg'];
				$ARTcomment		 = $fetchArticleQuery['article_comment'];
				$ARTdescription	 = $fetchArticleQuery['article_description'];
				$ARTcount		 = $fetchArticleQuery['article_count'];
				$ARTdate		 = $fetchArticleQuery['article_date'];

$selectUSERpost=$conn->query("SELECT * FROM main_user WHERE user_id='$ARTuserid' ");
			$fetchUSERpost = $selectUSERpost->fetch_assoc();
				$AuthourFirstname 	= $fetchUSERpost['user_firstname'];
				$AuthourLastname 	= $fetchUSERpost['user_lastname'];
					$AuthourFullname = $AuthourLastname.' '.$AuthourFirstname;				
		
?>
<div class="col-sm-12 text-justify" style='margin-bottom:18px;'>
	<a href='<?php echo $ARTurl;?>' class='headingLINK'><h3 class='text-left'><?php echo $ARTtitle;?></h3></a>
				
		<a href='<?php echo $ARTurl;?>' class='subHeadingLINK'>
		 <div class='clearfix mt-2' style='width:100%;'>
		<?php if(!empty($ARTfeatureimg)){?><img class='' title='<?php echo $ARTtitle;?>' src="<?php echo dirHompg();?>easyimage/features/imgs/1/<?php echo $ARTfeatureimg;?>" alt="<?php echo $ARTtitle;?>" style="width:120px;height:120px;margin-right:15px;float:left;" /> <?php } ?>
			 <?php echo $ARTdescription;?> [...]
		 </div>
		</a>
	<div class='' style="font-size:13px;"><i class='text-dangerr'><?php echo $ARTcount;?> <i class='fas fa-eye'></i></i>&nbsp;&nbsp; <i>~ posted by  <?php echo ucwords($AuthourFullname);?></i></div>				
</div>
			<hr/>
<?php } ?>	
			<hr/>