<?php 
include_once('header.php');
?>
<?php include_once('config.php'); ?>
	<!--features-->
	<div class="features">
		<div class="container">
			<div class="col-xs-6  col-lg-12 panel-grids">
						<?php
						 $statement=$db->prepare("select * from tbl_status");
									 $statement->execute();
									 $result=$statement->fetchAll(PDO::FETCH_ASSOC);
									 foreach($result as $row)
									 {
						
						?>
			
			
						<div class="panel panel-default"> <div class="panel-heading"> <h3 class="panel-title">Present Status</h3> </div> <div class="panel-body"><?php echo $row['p_status']; ?></div> </div>
					 
					</div>
					<div class="col-md-12 panel-grids">
						<div class="panel panel-success"> <div class="panel-heading"> <h3 class="panel-title">My CV</h3> </div> <div class="panel-body"><p>All files including the compiled CSS. Download this version if you plan on customizing the template.
						<b>Requires a LESS compiler.</b></p>
          <a href="<?php echo $row['cv_linl']; ?>" class="btn btn-success"><i class="fa fa-download"></i> Download</a></div> </div>
					</div>
					  
					   <?php
									 }
					   ?>
					<div class="col-md-12 panel-grids">
						<div class="panel panel-info"> <div class="panel-heading"> <h3 class="panel-title">My Achievements</h3> </div> <div class="panel-body">
						<?php
						 $statement1=$db->prepare("select * from tbl_achievements");
									 $statement1->execute();
									 $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
									 foreach($result1 as $row1)
									 {
						
						?>
						
						
					 <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
					  <h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row1['achievement_id']; ?>" aria-expanded="false" aria-controls="collapseTwo">
							<?php echo $row1['achievement_title']; ?>
						</a>
					  </h4>
					</div>
					<div id="collapse<?php echo $row1['achievement_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					  <div class="panel-body">
						<?php echo $row1['achievement_details']; ?>
					  </div>
					</div>
				  </div>
				  <?php
									 }
				  ?>

						
						
						
						
						</div> 
						</div>
					
					
					
					
					</div>
	</div>
	</div>
	
<?php include_once('footer.php'); ?>