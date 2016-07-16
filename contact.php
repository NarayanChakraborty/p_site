<?php include_once('header.php'); ?>
	<div class="contact">
		<div class="container">
			<h3 class="title1">Contact With Me</h3>
			<div class="contact-info">
				<div class="col-md-12 contact-grids">
					<h5>Do you have any question? Please use the below contact form and send a message. I'll reply you as quick as possible.</h5>
					
					<div class="contact-form">
						<h3 class="title1">Drop Me a Line</h3>
						<form>
						     <div class="form-group">
							<textarea placeholder="Message" required=""></textarea>
							</div>
							<div class="form-group">
							<input type="text" placeholder="Name" required="">
							</div>
                            <div class="form-group">
							<input type="text" placeholder="Email" required="">
							</div>
						
							<a class="btn btn-success"  href="edit_post.php?id=<?php echo $row['post_id']; ?>">SEND
													  
													  </a>
						</form>
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	<!--//contact-->
<?php include_once('footer.php'); ?>