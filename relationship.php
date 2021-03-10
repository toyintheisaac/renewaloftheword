<?php include "req/coonnect.php"; ?>
<!DOCTYPE html> 
<html lang="en" >
<head>
	<title>Relationship - <?php echo $websiteName;?></title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="keywords" content="<?php echo $websiteProfileTags;?>"/>
  <meta name="description" content="<?php echo $websiteProfileDESC;?>"> 
  <meta name="robots" content="index, follow"> 
  
<meta property="og:type" content="website" />
<meta property="og:title" content="Relationship Chat, <?php echo $websiteName;?>" />
<meta property="og:description" content="<?php echo $websiteProfileDESC;?>" />
<meta property="og:image" content="<?php echo $websiteUrl;?><?php echo $websiteSearchDisImg;?>" />
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
 
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<?php } ?>

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

	<link rel="stylesheet" href='dist/css/venobox.css' type="text/css" media="screen" />
	<script type="text/javascript" src="dist/js/venobox.min.js"></script>
	
		<link rel='stylesheet' type="text/css" href='css/styling.css' >
		
</head> 
<body>
	<?php include "includes/navHeading.php";?>
			
<div class='container pt-3 pb-3 mt-2 mb-4'>
	<div class='row'>
		<div class="col-lg-8 col-md-12 col-sm-12">
			<?php include "includes/relationSlider.php";?>
			<h2 class="mb-4">Christian Relationship</h2>
			<?php include "includes/relationContentMenu.php";?>
		</div>
		
		<div class="col-lg-4 col-md-12 col-sm-12">
			<?php include "includes/mainSideNav.php";?>
		</div>
	</div>
</div>  

		<?php include "includes/footers.php";?>
</body>
</html>
