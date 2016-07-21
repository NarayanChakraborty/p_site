
<?php
if(!isset($_REQUEST['id']))
{
	header('location: blog.php');
}
$id=$_REQUEST['id'];
?>
<?php
if(isset($_POST['form']))
{
	try{
		
			if(!(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $_POST['c_email'])))
		    {
			 throw new Exception("Please Enter a valid Email Address<br>");
			  //echo "<div class='error'>Please Enter a valid Email Address</div><br>";
		    }
			$c_date=date("Y-m-d");
			$active =0;
	     include_once('config.php');
	     $statement=$db->prepare("insert into tbl_comment(c_name,c_email,c_message,c_date,post_id,action) values(?,?,?,?,?,?)");
		 $statement->execute(array($_POST['c_name'],$_POST['c_email'],$_POST['c_comment'],$c_date,$id,$active));
		   
	
	     $success_msg="Your Comment successfully sent,it will be published after admin approval";
	    
	
	}
	catch(Exception $e)
	{
	$error_msg=$e->getMessage();
	}
}

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
			?><span class="categories">&nbsp; Tags : <em>
				<?php
								//when retrive data (using explode)
								$arr=explode(',',$row['tag_id']);
								$arr_count=count(explode(',',$row['tag_id']));
								$k=0;
								$arr1=array();
								for($j=0;$j<$arr_count;$j++)
								{
									 $statement1=$db->prepare("select * from tbl_tag where tag_id=?");
									 $statement1->execute(array($arr[$j]));
									 $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
									 foreach($result1 as $row1)
									 {
										$arr1[$k]=$row1['tag_name'];  
									 }
								   $k++;
                                }
								$tag_names=implode(",",$arr1);
								echo $tag_names;
                              ?>	
</em>							  
				
				</span>
				</p>

                <hr>
                
				
                <!-- Preview Image -->
                <img  src="admin/uploads/<?php echo $row['post_image'];?>" class="img-responsive" alt="" width="400px" height="260px" style="float:left;margin-right:15px;margin-bottom:12px">
               
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
 <ul class="pager">
    <li class="previous"><a href="blog.php">←Back to Blogs</a></li>
</ul>				

                <!-- Blog Comments -->

                <!-- Comments Form -->
   <div class="well">
 
    <h4>Leave a comment</h4><br>
 
    <form role="form" data-toggle="validator" action="blog2.php?id=<?php echo $row['post_id'];?>" method="POST" class="clearfix">
 
        <div class="col-md-6 form-group">
            <label class="sr-only" for="name">Name</label>
            <input type="text" class="form-control" name="c_name" id="name" placeholder="Name" required>
        </div>
 
        <div class="col-md-6 form-group">
            <label class="sr-only" for="email">Email</label>
            <input type="email" class="form-control" name="c_email" id="email" placeholder="Email" required>
        </div>
 
        <div class="col-md-12 form-group">
            <label class="sr-only" for="email">Comment</label>
            <textarea class="form-control" id="comment" name='c_comment' placeholder="Comment"required></textarea>
        </div>
 
        <div class="col-md-12 form-group text-right">
            <button type="submit" class="btn btn-primary" name="form">Submit</button>
        </div>
 
    </form>
</div>

      
			<?php
					 }
					 ?>          

                <!-- Posted Comments -->
<div class="box-footer box-comments">

				<?php
			$statement=$db->prepare("select * from tbl_comment where action=1 and post_id=?");
			$statement->execute(array($id));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			$num=$statement->rowCount();
			 if($num==0)
				{
					 ?>
			          <h2 style="text-align:center;">No Comment Found</h2>
				  <?php	
				}
				else{
					?>
			<h3>All Comments</h3>
			<br><hr>
			<?php
			foreach($result as $row)
			{
			  ?>
					



              <div class="box-comment">
                <!-- User image -->
				<?php
							$gravatarMd5=md5($row['c_email']);
							//$gravatarMd5=""; //when no gravatar is found
							?>
							<img class="img-circle img-sm" src="http://www.gravatar.com/avatar/<?php echo $gravatarMd5;?>" alt="" >
				
               

                <div class="comment-text">
                      <span class="username">
                         <?php
                  echo $row['c_name'];
				  ?>
				  
                        	  <?php
						$date=$row['c_date'];
						$year=substr($date,0,4);
						$month=substr($date,5,2);
						$post_day=substr($post_date,8,2);
						
						if($month=='01') {$post_month='Jan';}
						if($month=='02') {$post_month='Feb';}
						if($month=='03') {$post_month='Mar';}
						if($month=='04') {$post_month='Apr';}
						if($month=='05') {$post_month='May';}
						if($month=='06') {$post_month='Jun';}
						if($month=='07') {$post_month='JUL';}
						if($month=='08') {$post_month='Aug';}
						if($month=='09') {$post_month='Sep';}
						if($month=='10') {$post_month='Oct';}
						if($month=='11') {$post_month='Nov';}
						if($month=='12') {$post_month='Dec';}
						?>
						<span class="text-muted pull-right"><?php echo "$post_day"." "."$post_month"." "."$year";?></span>
                      </span><!-- /.username -->
  
						 <?php
							    echo $row['c_message'];
						 ?>
	  
					
                </div>
                <!-- /.comment-text -->
              </div>
			  
			  
			  
			  <?php
			}
			}
			?>
              
            </div>
           

                <!-- Comment -->
           

            </div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
   <!-- Blog Sidebar Widgets Column -->
			

               <?php include('blog_sidebar.php'); ?>
        </div>
        <!-- /.row -->

    
		</div>
		
<?php include('footer.php'); ?>			
			