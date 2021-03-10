<div class='container-fluid mt-3 bg-dark footerBottom'>
<div class='container'>
	<div class='row'>
		<div class="col-sm-12 col-md-12 bg-dark p-4">
			<div class="mx-auto text-center text-white ">
				<a href='<?php echo dirHompg();?>index.php' class='text-secondary mr-2' >Home</a> 
				<a href='about-us.php' class='text-secondary mr-2' >About Us</a> 
				<a href='faq.php' class='text-secondary mr-2' >Faq</a> 
				<a href='contact-us.php' class='text-secondary' >Contact Us</a>
			</div>
			<p class="mx-auto text-center text-white ">&copy All right Reversed. <a class="text-white mx-auto" href="<?php echo $websiteUrl;?>" title='<?php echo $websiteName;?>' ><?php echo $websiteName;?></a></p>
			<p class="mx-auto text-center text-white ">
<?php 
	$conn->query("INSERT INTO websitevisit(visit_count, visit_date) VALUES ('1','$StrCurrentTime')");
	
	$selectCOUNT =	$conn->query("SELECT * FROM websitevisit");
		$numRowCOUNT = $selectCOUNT->num_rows;
				  
				
	$selectCOUNTunique =	$conn->query("SELECT * FROM temp_users");
		$numRowCOUNTunique = $selectCOUNTunique->num_rows;
				 
?>			
			Unique Visitor: <b><?php echo $numRowCOUNTunique;?></b> Total Visit: <b><?php echo $numRowCOUNT;?></b>
			
			
			</p>
		</div>
		
	</div>
</div> 
</div> 

 	<script> 	
	 $('.venobox_custom2').venobox({
        framewidth: '850px',        // default: ''
	//	frameheight: '1500px',       // default: ''
     //   border: '1px',             // default: '0'
      //  bgcolor: '#5dff5e',         // default: '#fff'
        titleattr: 'data-title',    // default: 'title'
        numeratio: false,            // default: false
        infinigall: false            // default: false
    });
	
	
	</script>