<!DOCTYPE html> 
<html lang="en" >
<head>
<?php

		$pageArticleQuery = $conn->query("SELECT * FROM article WHERE article_url='$currentProductFilename'");
			
			$fetchArticleQuery = $pageArticleQuery->fetch_assoc() ;
				$ARTid = $fetchArticleQuery['article_id'];
				$ARTuserid = $fetchArticleQuery['article_userid'];
				$ARTtitle		 = $fetchArticleQuery['article_title'];
				$ARTurl			 = $fetchArticleQuery['article_url'];
				$ARTcontent		 = $fetchArticleQuery['article_content'];
				$ARTfeatureimg	 = $fetchArticleQuery['article_featureimg'];
				$ARTcomment		 = $fetchArticleQuery['article_comment'];
				$ARTcommentreply = $fetchArticleQuery['article_commentreply'];
				$ARTsharing		 = $fetchArticleQuery['article_sharing'];
				$ARTtags		 = $fetchArticleQuery['article_tags'];
				$ARTdescription	 = $fetchArticleQuery['article_description'];
				$ARTstatus		 = $fetchArticleQuery['article_status'];
				$ARTdate		 = $fetchArticleQuery['article_date'];
				$ARTmodifieddate = $fetchArticleQuery['article_modifieddate'];
				$ARTE_count 	 = $fetchArticleQuery['article_count'];

$conn->query("UPDATE article SET article_count=article_count+'1' WHERE article_id='$ARTid'");

if($ARTstatus!=5){
	header("Location: index.php");
}
if($pageArticleQuery->num_rows<1){
	header("Location: index.php");
}

$selectUSERpost=$conn->query("SELECT * FROM main_user WHERE user_id='$ARTuserid' ");
			$fetchUSERpost = $selectUSERpost->fetch_assoc();
				$AuthourFirstname 	= $fetchUSERpost['user_firstname'];
				$AuthourLastname 	= $fetchUSERpost['user_lastname'];
					$AuthourFullname = $AuthourLastname.' '.$AuthourFirstname;
?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="keywords" content="<?php echo $ARTtags; ?>"/>
	<meta name="description" content="<?php echo $ARTdescription;?>">
	<meta name="robots" content="index, follow">
  <meta name="robots" content="max-image-preview:standard">

<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $ARTtitle;?>" />
<meta property="og:description" content="<?php echo $ARTdescription;?>" />
<meta property="og:image" content="<?php echo $websiteUrl;?>/easyimage/features/imgs/1/<?php echo $ARTfeatureimg;?>" /> 
<meta property="og:url" content="<?php echo $websiteUrl;?>/<?php echo $currentProductFilename;?>" />
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
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<?php } ?>
	 
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

	<link rel="stylesheet" href='dist/css/venobox.css' type="text/css" media="screen" />
	<script type="text/javascript" src="dist/js/venobox.min.js"></script>
	
		<link rel='stylesheet' type="text/css" href='css/styling.css' >
	<title><?php echo  $ARTtitle;?></title> 
</head> 