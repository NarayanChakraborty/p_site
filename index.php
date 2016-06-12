<?php 
include_once('header.php');
?>

	<!--features-->
	<div class="features">
		<div class="container">
			<div class="col-md-4 feature-grids">
				<h3 class="title">WELCOME</span></h3>
				<p>popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 
				 It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p>popularised in the 1960s with the release of Letraset sheets.  Loremipsum passages, and more recently with desktop publishing software like Aldus PageMaker include</p>
				<div class="more">
					<a href="#" style="background-color:#000">Read More</a>
				</div>
			</div>
			<div class="col-md-4 feature-grids">
				<img src="images/2.png" alt=""/>
			</div>
			<div class="col-md-4 feature-grids">
				<h3 class="title">OUR SPECIFICATIONS</h3>
				<div class="pince">
					<div class="pince-left">
						<h5>01</h5>
					</div>
					<div class="pince-right">
						<h4>Quasellus eget purus mauris </h4>
						<p>Vero vulputate enim non justo posuereces placerat vel mauris.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="pince">
					<div class="pince-left">
						<h5>02</h5>
					</div>
					<div class="pince-right">
						<h4>Quasellus eget purus mauris </h4>
						<p>Vero vulputate enim non justo posuere placerat Phasellus mauris.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="pince">
					<div class="pince-left">
						<h5>03</h5>
					</div>
					<div class="pince-right">
						<h4>Quasellus eget purus mauris </h4>
						<p>Vero vulputate enim non justo posuere placerat eget.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//features-->
	<!--projects-->
	<div class="projects">
		<div class="container">
			<div class="col-md-3 project-right ">
				<h3 class="title">OUR <span> PROJECTS</span></h3>
				<p>Vero vulputate enim non justo posuere placerat Phasellus mauris vulputate enim non justo posuere placerat egetposuere enim .</p>
			</div>
			<div class="col-md-9 project-left">
				<!-- flex-slider -->
				<div class="work-bottom">
					<div class="nbs-flexisel-container"><div class="nbs-flexisel-inner">
						<ul id="flexiselDemo1" class="nbs-flexisel-ul" style="left: -285px; display: block;">																																		
							<li class="nbs-flexisel-item" style="width: 285px;">
								<div class="project-grids">
									<img src="images/img1.jpg" alt="">
									<div class="team-bottom">
									</div>
								</div>
							</li>
							<li class="nbs-flexisel-item" style="width: 285px;">
								<div class="project-grids">
									<img src="images/img2.jpg" alt="">
									<div class="team-bottom">
									</div>
								</div>
							</li>
							<li class="nbs-flexisel-item" style="width: 285px;">
								<div class="project-grids">
									<img src="images/img3.jpg" alt="">
									<div class="team-bottom">
									</div>
								</div>
							</li>
							<li class="nbs-flexisel-item" style="width: 285px;">
								<div class="project-grids">
									<img src="images/img4.jpg" alt="">
									<div class="team-bottom">
									</div>
								</div>
							</li>
						</ul>
						<div class="nbs-flexisel-nav-left" style="top: 138px;"></div><div class="nbs-flexisel-nav-right" style="top: 138px;"></div></div></div>
							<script type="text/javascript">
								$(window).load(function() {
									$("#flexiselDemo1").flexisel({
										visibleItems: 4,
										animationSpeed: 1000,
										autoPlay: true,
										autoPlaySpeed: 3000,    		
										pauseOnHover: true,
										enableResponsiveBreakpoints: true,
										responsiveBreakpoints: { 
											portrait: { 
												changePoint:480,
												visibleItems: 2
											}, 
											landscape: { 
												changePoint:640,
												visibleItems: 3
											},
											tablet: { 
												changePoint:768,
												visibleItems: 3
											}
										}
									});
									
								});
							</script>
							<script type="text/javascript" src="js/jquery.flexisel.js"></script>				
						<!-- //flex-slider -->	
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//projects-->
	
<?php include_once('footer.php'); ?>