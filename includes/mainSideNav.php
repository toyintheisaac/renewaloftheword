
		<div class="col-sm-12 mb-4">
				<h5 style='width:100%;padding:10px;background:#000;color:#fff;'>Search</h5>
			<form method='GET' action='search<?php if(isset($_GET['s'])){ echo '?s='.$_GET['s'];}?> '>
		<input type='text' class='' style='width:100%;padding:15px;' name='s' id='MainSearch' placeholder='Search here...' value="<?php if(isset($mainSearch)){ echo $mainSearch;}?>" />
			</form>
		</div>
 
		<div class="col-sm-12 mb-4">
				<h5 style='width:100%;padding:10px;background:#000;color:#fff;margin-bottom:8px;'>Recent Posts</h5>
<?php
$RecentPostsQuery = $conn->query("SELECT * FROM article WHERE article_status='5' ORDER BY article_date DESC LIMIT 7");
	while($fetchRecentPosts = $RecentPostsQuery->fetch_assoc() ){
			$RecentPid 			= $fetchRecentPosts['article_id'];
			$RecentPuserid 		= $fetchRecentPosts['article_userid'];
			$RecentPtitle		= $fetchRecentPosts['article_title'];
			$RecentPurl			= $fetchRecentPosts['article_url'];
			$RecentPdate		= $fetchRecentPosts['article_date'];

$selectRP = $conn->query("SELECT * FROM main_user WHERE user_id='$RecentPuserid' ");
			$fetchRP = $selectRP->fetch_assoc();
				$RPFirstname 	= $fetchRP['user_firstname'];
				$RPLastname 	= $fetchRP['user_lastname'];
					$RFFullname = $RPLastname.' '.$RPFirstname;				
		
?>		
		<div class='' style='border-bottom:1px dashed #000;margin-bottom:8px;'>
			<a href='<?php echo $RecentPurl;?>' class='text-justify' style='color:#000;font-size:14px;'> <?php echo $RecentPtitle;?> </a></br>
			<i class='' style='color:ccc;font-size:13px;'>~ <?php echo ucwords($RFFullname);?></i>
		</div>
	<?php } ?>
		</div>







<div class="col-sm-12 mb-4">
		<h5 style='width:100%;padding:10px;background:#000;color:#fff;margin-bottom:8px;'>Popular Posts</h5>
<?php
$PopularPostsQuery = $conn->query("SELECT * FROM article WHERE article_status='5' ORDER BY article_count DESC LIMIT 5");
	while($fetchPopularPosts = $PopularPostsQuery->fetch_assoc() ){
			$PopularPid 		= $fetchPopularPosts['article_id'];
			$PopularPuserid 	= $fetchPopularPosts['article_userid'];
			$PopularPtitle		= $fetchPopularPosts['article_title'];
			$PopularPurl		= $fetchPopularPosts['article_url'];
			$PopularPdate		= $fetchPopularPosts['article_date'];

$selectPP = $conn->query("SELECT * FROM main_user WHERE user_id='$PopularPuserid' ");
			$fetchPP = $selectPP->fetch_assoc();
				$PPFirstname 	= $fetchPP['user_firstname'];
				$PPLastname 	= $fetchPP['user_lastname'];
					$PFFullname = $PPLastname.' '.$PPFirstname;				
		
?>			
		<div class='' style='border-bottom:1px dashed #000;margin-bottom:8px;'>
			<a href='<?php echo $PopularPurl;?>' class='text-justify' style='color:#000;font-size:14px;'><?php echo $PopularPtitle;?></a></br>
			<i class='' style='color:ccc;font-size:13px;'>~  <?php echo ucwords($PFFullname);?></i>
		</div>
<?php }?>
</div>

<?php
if(userloggedin()===true ){
$checkSAVE = $conn->query("SELECT * FROM article_save WHERE save_userId='$USERid' ");
	$numRowCheckSave = $checkSAVE->num_rows;
if($numRowCheckSave>=1){
?>
<div class="col-sm-12 mb-4">
		<h5 style='width:100%;padding:10px;background:#000;color:#fff;margin-bottom:8px;'>Saved Article</h5>
<?php
	while($fetchSAVE = $checkSAVE->fetch_assoc() ){
			$saveArticleId 		= $fetchSAVE['save_articleId'];
		
	
$PopularSaveQuery = $conn->query("SELECT * FROM article WHERE article_id='$saveArticleId' ORDER BY article_count DESC");	
		$fetchSavePosts = $PopularSaveQuery->fetch_assoc();
			$SaveDtitle		= $fetchSavePosts['article_title'];
			$SaveDurl		= $fetchSavePosts['article_url'];
			$SaveDdate		= $fetchSavePosts['article_date'];			
		
?>			
		<div class='' style='border-bottom:1px dashed #000;margin-bottom:8px;'>
			<a href='<?php echo $SaveDurl;?>' class='text-justify' style='color:#000;font-size:14px;'><?php echo $SaveDtitle;?></a></br>
		</div>
<?php }?>
</div>
<?php }}?>
      
		  