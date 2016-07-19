<?php include_once('header.php'); ?>
	<!--//header-->
	

	<!--features-->
	<div class="features">
		<div class="container">
			<div class="col-md-8">
				<?php 
					$statement=$db->prepare("select * from tbl_welcome where id=?") ;
			$statement->execute(array(1));
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
				?>
			
				<h3 class="title" style="margin-bottom:10px;">WELCOME</h3><br>
				<img src="admin/profile/<?php echo $row['post_image']; ?>" class="user-image img-responsive"  height="320px" width="280px" style="float:left;margin-right:15px;margin-bottom:3px;margin-top:2px;"/>
			<?php
					echo $row['description'];
              
			}			  
				?>
			</div>
		
			<div class="col-md-4 feature-grids">
				<h3 class="title">Recent Topics</h3>
				<?php 
					$statement=$db->prepare("select * from tbl_post ORDER BY post_date DESC LIMIT 3") ;
			$statement->execute(array(1));
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
			$i=1;
			foreach($result as $row)
			{
				?>
				<div class="pince">
					<div class="pince-left">
						<h5><?php echo "0".$i++; ?></h5>
					</div>
					<div class="pince-right">
						<h4><a href="blog2.php?id=<?php echo $row['post_id']; ?>"><?php echo $row['post_title']; ?> </a></h4>
						  <div class="a">
           				<p >
						<?php
						$pices=explode(" ",$row['post_description']);
						$first_page=implode(" ",array_splice($pices,0,15));
						$first_page=$first_page."<b> ..........</b>";
						?>
						<?php
						     echo $first_page;
						?>
						</p>
                 </div>
					</div>
					<div class="clearfix"> </div>
				</div>
		<?php 
			}
			?>
			
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//features--><br>
	<br>
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
	<!--services-->


<?php include_once('footer.php'); ?>