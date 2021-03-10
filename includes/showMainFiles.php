<?php include "../req/coonnect.php";?>

<?php
if(isset($_POST['posts'])){
	$post	= $_POST['posts'];
	$currenturl		=sanitize($conn, $_POST['currenturl']);
	
		$urlDelSt= $websiteUrl.'/new-post.php';
?>	
<form method='POST' action=''>	
 <table class='table table-sm'>
<?php
	$checkFile = $conn->query("SELECT * FROM attachment WHERE attachment_type='1' AND attachment_article_id='$post' AND attachment_userID='$USERid' "); 
		while($fetchFile=$checkFile->fetch_assoc()){
			$attachmentID	= $fetchFile['attachment_id'];
			$attachmentUrl	= $fetchFile['attachment_url'];

?>		
	<tr>
		<td style='width:41px;' ><img src='easyimage/upload/<?php echo $attachmentUrl;?>' style='width:40px;height:40px;' /> </td>
		<td>easyimage/upload/<?php echo $attachmentUrl;?></td>
		<td>
			<a href="<?php echo $urlDelSt;?>?post=<?php echo $post;?>&edits=activ&edit=<?php echo $currenturl;?>&FileURL=<?php echo $attachmentUrl;?>&FileURLid=<?php echo $attachmentID;?>" class='btn btn-sm btn-danger' onclick="return confirm('Kindly save all your changes before deleting?');">x</a>
		</td>
	</tr>

<?php } ?>
	</table>
	</form>
<?php	
}
?>