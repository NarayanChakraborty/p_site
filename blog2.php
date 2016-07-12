
<?php
if(!isset($_REQUEST['id']))
{
	header('location: blog.php');
}
$id=$_REQUEST['id'];
?>


<?php include('header.php'); ?>
		
 <!-- Page Content -->
    <div class="container" style="margin-top:10px;">

        <div class="row">
		 <?php
        			 include('config.php');
					 $statement=$db->prepare("select * from tbl_post where post_id=?");
					 $statement->execute(array($id));
					 $result=$statement->fetchAll(PDO::FETCH_ASSOC);
					 foreach($result as $row)
					 {
						 ?>		 

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

 <!-- Blog Post -->
                <div class="post">
                <!-- Title -->
                <h3><?php echo $row['post_title'];?></h3>
                <!-- Date/Time -->
                <p style="margin-top:5px;"><span class="glyphicon glyphicon-time" ></span> Posted on 
				<?php
				$post_date=$row['post_date'];
				$post_day=substr($post_date,8,2);
				$post_month=substr($post_date,5,2);
				$post_year=substr($post_date,0,4);
				
				if($post_month=='01') {$post_month='Jan';}
				if($post_month=='02') {$post_month='Feb';}
			    if($post_month=='03') {$post_month='Mar';}
				if($post_month=='04') {$post_month='Apr';}
				if($post_month=='05') {$post_month='May';}
				if($post_month=='06') {$post_month='Jun';}
				if($post_month=='07') {$post_month='JUL';}
				if($post_month=='08') {$post_month='Aug';}
				if($post_month=='09') {$post_month='Sep';}
				if($post_month=='10') {$post_month='Oct';}
				if($post_month=='11') {$post_month='Nov';}
				if($post_month=='12') {$post_month='Dec';}
				
				echo $post_day." ".$post_month.", ".$post_year; 	
			?>
				</p>

                <hr>
                
				
                <!-- Preview Image -->
                <img  src="admin/uploads/<?php echo $row['post_image'];?>" alt="" width="200px" height="150px" style="float:left;padding-right:10px;padding-bottom:7px">
                  <hr>
				  <div class="a">
           				<p >
					
						<?php
						     echo $row['post_description'];
						?>
						</p>
                 </div>
                <hr>

				
				</div>
				<!--- Blog Post--->           

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

           

                <!-- Comment -->
           

            </div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<?php
					 }
					 ?>
   <!-- Blog Sidebar Widgets Column -->
			<div class="col-md-1"></div>
            <div class="col-md-3">

                <!-- Blog Search Well -->
                <div class="well">
                    
                    <div style="width:150px;height:180px;margin:0 auto">
                      <img class="img-responsive" src="images/2.png" alt="" >
                    </div>
					<h4 style="text-align:center">Masud Kaium</h4>
                    <!-- /.input-group -->
                </div>

               <?php include('blog_sidebar.php'); ?>
        </div>
        <!-- /.row -->

        <hr>
		
<?php include('footer.php'); ?>			
			