<?php include "req/coonnect.php";?>
<!DOCTYPE html> 
<html lang="en" >
<head>
	<title>Frequently Asked Questions</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="keywords" content="<?php echo $websiteProfileTags;?>"/>
  <meta name="description" content="<?php echo $websiteProfileDESC;?>"> 
  <meta name="robots" content="index, follow"> 
  
<meta property="og:type" content="website" />
<meta property="og:title" content="Frequently Asked Questions" />
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
	 
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<?php }else{ ?>
<link rel="stylesheet" href="dist/css/bootstrap.min.css">
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/popper.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="dist/css/fontawesomev5.7.0-all.css">
<link rel="stylesheet" type='text/css' href="dist/css/googleFont.css">
<?php } ?>
		<link rel='stylesheet' type="text/css" href='css/styling.css' >
</head> 
<body>
<?php include "includes/navHeading.php";?>
   
<div class="container">
	<div class="row"> 
		<div class="mt-5 col-md-12">
 <h2>Frequently Asked Questions</h2>


<div id="accordion d-none" style='display:none;'>
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseOne">
        Who we are
      </a>
    </div>
    <div id="collapseOne" class="collapse show" data-parent="#accordion">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Our Objectives
      </a>
    </div>
    <div id="collapseTwo" class="collapse show" data-parent="#accordion">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
        How we make impact
      </a>
    </div>
    <div id="collapseThree" class="collapse show" data-parent="#accordion">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>

</div> 
 
		</div>
	</div>
</div>
		<?php include "includes/footers.php";?>
 
</body>
</html>