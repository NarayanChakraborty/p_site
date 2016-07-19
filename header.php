<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Personal Website | Home :: Masud Kaium</title>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="We Care Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js -->
<!-- start-smooth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
		
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smooth-scrolling-->	
</head>
<body>
	<!--header-->
	<div class="header" style="background-color:#f6f6f6">
		<nav class="navbar navbar-default">
			<div class="container">
			
			<?php 
											  include_once('config.php');
											  $statement1=$db->prepare("select * from tbl_welcome where id=?");
												$statement1->execute(array(1));
												$result1=$statement1->fetchAll(PDO::FETCH_ASSOC); 
												foreach($result1 as $row1)
												{
													?>
			
				<div class="navbar-header navbar-left">
					<h1><a href="index.php"><?php echo $row1['f_name'].$row1['l_name']; ?></a></h1>
				</div>
		
				<!--navigation-->
				<div class="header-text navbar-left" style="margin-top:25px;">
					<p><?php echo ' " '. $row1['f_quote'].' " '; ?><p>
				</div>

				<div class="header-right">
					<div class="top-nav-text">
						<ul>
						
							<li >Me : <a class="email-link" href="mailto:<?php echo $row1['email']; ?>"><?php echo $row1['email']; ?> </a></li>
							<li>
								<ul class="social-icons">
									<li><a href="#"></a></li>
									<li><a href="#" class="pin"></a></li>
									<li><a href="#" class="in"></a></li>
								</ul>
							</li>
						</ul>

					</div>

				</div>		<?php
												}
												?>
				
		<!--//navigation-->
				<div class="clearfix"> </div>
							<!-- Collect the nav links, forms, and other content for toggling -->
			
			</div>	

		</nav>	
<nav class="navbar navbar-inverse" style="margin-left:15px;margin-right:15px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
        <li><a href="about.php">About</a></li>
        <li><a href="blog.php">Blog</a></li> 
	
        <li><a href="contact.php">Contact</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Developer</a>
		
</li>
        
      </ul>
    </div>
  </div>
</nav>		
	</div>	
	<!--//header-->

