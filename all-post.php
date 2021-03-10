<?php include "req/coonnect.php";?>
<?php
if(!userloggedin()){
	header("Location: index");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="keywords" content=""/>
  <meta name="description" content="<?php echo $websiteProfileDESC;?>">
  <meta name="robots" content="noindex, nofollow">
  <meta name="robots" content="max-image-preview:standard">
	<meta name="googlebot" content="noindex">

<meta property="og:type" content="article" />
<meta property="og:title" content="" />
<meta property="og:description" content="" />
<meta property="og:image" content="<?php echo $websiteLogoWhite;?>" />
<meta property="og:url" content="<?php echo $websiteUrl;?>" />
<meta property="og:site_name" content="<?php echo $websiteName;?>" />

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<?php if($serverSTATUS=='ONLINE'){ ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> 
	 
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<?php }else{ ?>
<link rel="stylesheet" href="dist/css/bootstrap.min.css">
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/popper.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

<link rel="stylesheet" type='text/css' href="dist/css/googleFont.css">
<?php } ?>

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

		<link rel='stylesheet' type="text/css" href='css/styling.css' >
</head> 
<body>
<?php include "includes/navHeading.php";?>

<?php // $USERstatus == 5 admin,  10 = super admin
/* if(empty($USERstatus) || ($USERstatus!=5 && $USERstatus!=10)){
	header('Location: index.php');
} */
?>

<?php
	if(isset($_GET['deleteStat'])&&isset($_GET['row'])){
		if($_GET['deleteStat']=="done"){
			$row	= sanitize($conn, $_GET['row']);
			$updateINSERTED=$conn->query("UPDATE article SET article_status='10' WHERE article_id='$row' AND article_userid='$USERid'");
			if($updateINSERTED===true){
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
?> 

<?php
// WAITING SUPER ADMIN
	if(isset($_GET['approveRow'])&&isset($_GET['approveUrl'])&&isset($_GET['approveCheck'])){
		
			$approveRowID	= sanitize($conn, $_GET['approveRow']);
			$approveCheckId	= sanitize($conn, $_GET['approveCheck']);
			$approveRowUrl	= sanitize($conn, $_GET['approveUrl']);
			
			$updateINSERTED = $conn->query("UPDATE article SET article_status='5' WHERE article_id='$approveRowID' AND article_userid='$approveCheckId' AND article_url='$approveRowUrl' ");
			if($updateINSERTED===true){
				
				$tempFILE = "post.php";
			$newfile = $approveRowUrl.".php";
			
			
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
	
if(isset($_GET['rejectRow'])&&isset($_GET['rejectUrl'])&&isset($_GET['rejectCheck'])){
	
		$rejectRowID	= sanitize($conn, $_GET['rejectRow']);
		$rejectCheckId	= sanitize($conn, $_GET['rejectCheck']);
		$rejectRowUrl	= sanitize($conn, $_GET['rejectUrl']);
		
		$updateINSERTED = $conn->query("UPDATE article SET article_status='4' WHERE article_id='$rejectRowID' AND article_userid='$rejectCheckId' AND article_url='$rejectRowUrl' ");
		if($updateINSERTED===true){
			echo "
			<script>
				window.setTimeout(function(){
					window.location.href = 'all-post';
				}, 500);
			</script>
				";
		} 
}
	
// END WAITING SUPER ADMIN
	
?>   

<?php
$selectAPPROVE= $conn->query("SELECT * FROM article WHERE article_status='5' AND article_userid='$USERid' ORDER BY article_date DESC");
	$numRowAPPROVE = $selectAPPROVE->num_rows;

$selectPENDING= $conn->query("SELECT * FROM article WHERE article_status='2' OR article_status='3' OR article_status='4' AND article_userid='$USERid' ORDER BY article_date DESC");
	$numRowPENDING = $selectPENDING->num_rows;

$selectDRAFT = $conn->query("SELECT * FROM article WHERE article_status='0' OR article_status='1' AND article_userid='$USERid' ORDER BY article_date DESC");
	$numRowDRAFT = $selectDRAFT->num_rows;

$selectWAITING= $conn->query("SELECT * FROM article WHERE article_status='2' OR article_status='3' ORDER BY article_date ASC");
	$numRowWAITING = $selectWAITING->num_rows;

?>

<div class="container">
	<div class="row"> 
		<div class="mt-5 col-md-12">
		<h4>All Post  &nbsp; &nbsp; <a href='new-post' class='btn btn-sm btn-success'>New Post</a></h4>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#ApprovedPost">Approved Post <span class="badge badge-pill badge-success"><?php echo $numRowAPPROVE;?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#PendingPost">Pending Post <span class="badge badge-pill badge-primary"><?php echo $numRowPENDING;?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#DraftPost">Draft Post <span class="badge badge-pill badge-info"><?php echo $numRowDRAFT;?></span></a>
  </li><?php if($USERstatus==10){ ?>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#WaitingPost">Waiting Approval <span class="badge badge-pill badge-warning"><?php echo $numRowWAITING;?></span></a>
  </li><?php } ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">

  <div class="tab-pane container active" id="ApprovedPost">
<form method='post' action='' >
  <table class="table ">
	<tr>
		<td>S/N</td>
		<td>Title</td>
		<td>Action</td>
	</tr>
<?php 
for($sn=1;$sn<=$numRowAPPROVE;){
	while($fetchApprove=$selectAPPROVE->fetch_assoc()){
		$approvedId 		= $fetchApprove['article_id'];
		$approvedURL 		= $fetchApprove['article_url'];
		$approvedFeatureimg = $fetchApprove['article_featureimg'];
		$approvedTitle		= $fetchApprove['article_title'];
		$approvedCount		= $fetchApprove['article_count'];
	$modalPhs=$sn++;
?>	
	<tr>
		<td><?php echo $modalPhs;?> || <small class='text-danger'><i class='fas fa-eye'></i> <?php echo $approvedCount;?></small></td>
		<td>
			<div class='clearfix'>
				<img class=''  src="<?php echo dirHompg();?>easyimage/features/imgs/1/<?php echo $approvedFeatureimg;?>" alt="Image" style="width:50px;height:50px;margin-right:10px;float:left;" /> 
			 <?php if(isset($approvedTitle)){ echo $approvedTitle;}?>
			</div>
		 </td>
		<td><a href="<?php echo $approvedURL;?>" target='_blank' class='btn btn-sm btn-info' >Preview</a>
		<a href="new-post?post=<?php echo $approvedId;?>&edits=activ&edit=<?php echo $approvedURL;?>" target='_blank' class='btn btn-sm btn-info' >Edit</a> 
		<a href="all-post?deleteStat=done&row=<?php echo $approvedId;?>" class='btn btn-sm btn-danger' onclick="return confirm('Do you want to delete this?');">Delete</a></td>
	</tr>
<?php } } ?>
  </table>
</form>
  </div>
<!-- END approved Post -->  

<div class="tab-pane container fade" id="PendingPost">
<form method='post' action='' >
  <table class="table ">
	<tr>
		<td>S/N</td>
		<td>Title</td>
		<td>Action</td>
	</tr>
<?php 
for($snn=1;$snn<=$numRowPENDING;){
	while($fetchPENDING=$selectPENDING->fetch_assoc()){
		$pendingId 		= $fetchPENDING['article_id'];
		$pendingURL 		= $fetchPENDING['article_url'];
		$pendingFeatureimg = $fetchPENDING['article_featureimg'];
		$pendingTitle		= $fetchPENDING['article_title'];
		$pendingStatus		= $fetchPENDING['article_status'];
	$modalPhsn=$snn++;
?>	
	<tr>
		<td><?php echo $modalPhsn;?></td>
		<td>
			<div class='clearfix'>
				<img class=''  src="<?php echo dirHompg();?>easyimage/features/imgs/1/<?php echo $pendingFeatureimg;?>" alt="Image" style="width:50px;height:50px;margin-right:10px;float:left;" /> 
			 <?php if(isset($pendingTitle)){ echo $pendingTitle;}?>  <span class="badge badge-pill badge-danger"><?php if($pendingStatus==4){ echo 'Rejected';}?></span> 
			</div>
		 </td>
		<td><a href="new-post?post=<?php echo $pendingId;?>&edits=activ&edit=<?php echo $pendingURL;?>" target='_blank' class='btn btn-sm btn-info' >Edit</a> <a href="all-post?deleteStat=done&row=<?php echo $pendingId;?>" class='btn btn-sm btn-danger' onclick="return confirm('Do you want to delete this?');">Delete</a></td>
	</tr>
<?php } } ?>
  </table>
</form>
</div>
<!-- END Pending Post -->  
  
<div class="tab-pane container fade" id="DraftPost">
<form method='post' action='' >
  <table class="table ">
	<tr>
		<td>S/N</td>
		<td>Title</td>
		<td>Action</td>
	</tr>
<?php 
for($snD=1;$snD<=$numRowDRAFT;){
	while($fetchDRAFT=$selectDRAFT->fetch_assoc()){
		$draftId 		= $fetchDRAFT['article_id'];
		$draftURL 		= $fetchDRAFT['article_url'];
		$draftFeatureimg = $fetchDRAFT['article_featureimg'];
		$draftTitle		= $fetchDRAFT['article_title'];
	$modalPhsD=$snD++;
?>	
	<tr>
		<td><?php echo $modalPhsD;?></td>
		<td>
			<div class='clearfix'>
				<img class=''  src="<?php echo dirHompg();?>easyimage/features/imgs/1/<?php echo $draftFeatureimg;?>" alt="Image" style="width:50px;height:50px;margin-right:10px;float:left;" /> 
			 <?php if(isset($draftTitle)){ echo $draftTitle;}?>
			</div>
		 </td>
		<td><a href="new-post?post=<?php echo $draftId;?>&edits=activ&edit=<?php echo $draftURL;?>" target='_blank' class='btn btn-sm btn-info' >Edit</a> <a href="all-post?deleteStat=done&row=<?php echo $draftId;?>" class='btn btn-sm btn-danger' onclick="return confirm('Do you want to delete this?');">Delete</a></td>
	</tr>
<?php } } ?>
  </table>
</form>

</div>
<!-- END Draft Post -->  


<?php if($USERstatus==10){?>
  <div class="tab-pane container fade" id="WaitingPost">
<form method='post' action=''>
  <table class="table ">
	<tr>
		<td>S/N</td>
		<td>Title</td>
		<td>Action</td>
	</tr>
<?php 
for($snW=1;$snW<=$numRowWAITING;){
	while($fetchWaiting=$selectWAITING->fetch_assoc()){
		$waitingId 			= $fetchWaiting['article_id'];
		$waitingUserid 		= $fetchWaiting['article_userid'];
		$waitingURL 		= $fetchWaiting['article_url'];
		$waitingFeatureimg 	= $fetchWaiting['article_featureimg'];
		$waitingTitle		= $fetchWaiting['article_title'];
		$waitingContent		= $fetchWaiting['article_content'];
	$modalPhW=$snW++;
?>	
	<tr>
		<td><?php echo $modalPhW;?></td>
		<td>
			<div class='clearfix'>
				<img class=''  src="<?php echo dirHompg();?>easyimage/features/imgs/1/<?php echo $waitingFeatureimg;?>" alt="Image" style="width:50px;height:50px;margin-right:10px;float:left;" /> 
			 <?php if(isset($waitingTitle)){ echo $waitingTitle;}?>
			</div>
		 </td>
		<td>
		 
		
		<a type="button" class='btn btn-sm btn-info text-light'  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#approvalStats<?php echo $modalPhW;?>" >View</a>
		
<div class="modal" id="approvalStats<?php echo $modalPhW;?>">
  <div class="modal-dialog" style='max-width:500px;'>
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header ">
        <h4 class="modal-title"><?php if(isset($waitingTitle)){ echo $waitingTitle;}?></h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style='font-size:13px;'>
       <?php echo $waitingContent;?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
	  
		<a href="all-post?approveRow=<?php echo $waitingId;?>&approveCheck=<?php echo $waitingUserid;?>&approveUrl=<?php echo $waitingURL;?>" class='btn btn-sm btn-info' >Approve</a> 
			<a href="all-post?rejectUrl=<?php echo $waitingURL;?>&rejectCheck=<?php echo $waitingUserid;?>&rejectRow=<?php echo $waitingId;?>" class='btn btn-sm btn-danger' onclick="return confirm('Do you want to delete this?');">Reject</a>
		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
		
      </div>

    </div>
  </div>
</div>
		
		
		
		
		
		
		</td>
	</tr>
<?php } } ?>
  </table>
</form>
  </div>
  <?php } ?>
<!-- END Waiting Post --> 



</div>
	 
 
		</div>
	</div>
</div> 
<br/><br/><br/><br/><br/><br/>
		<?php include "includes/footers.php";?>
 
</body>
</html>