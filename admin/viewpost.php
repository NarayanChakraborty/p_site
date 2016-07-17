<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: login.php');
}
require_once('../config.php');
?>





<?php include_once('header.php'); ?>

<?php include_once('sidebar.php'); ?>


      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
				
				</div>
			</div>
              <!-- page start-->



 <h2>View All Posts</h2>
<table class="tabl2" width="100%">
<tr>
    <th width="5%">Serial</th>
	<th width="70%">Tttle</th>
	<th width="25%">Action</th>
</tr>


<?php
$i=0;
$statement=$db->prepare("select * from tbl_post order by post_id desc");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{ $i++;
	?>
	
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $row['post_title'];?></td>
			<td><div class="btn-group">
													  <a class="btn btn-primary fancybox" href="#inline<?php echo $row['post_id'];?>"title="View Post"><i class="icon_plus_alt2"></i></a>
													  <!--Fancy Box-->
													  
													  <div id="inline<?php echo $row['post_id'];?>"style="display:none;width:700px;margin:10px 30px">
														<h3 style= "border-bottom: 2px solid #295498; color:#0C86AC;margin-bottom:10px;" >Post Details</h3>
														<div class="shopper-info">
				<p>
				 
				 <table style="border:2px solid #3d9ccd" class="tabl3" >
				    <tr><td><b>Post Title</b></td></tr>
					<tr>
						<td><?php echo $row['post_title'];?></td>
					</tr>
					<tr>
						<td><b>Featured Image</b></td>
					</tr>
					<tr>
							<td><img src="uploads/<?php echo $row['post_image'];?>" alt="" width="320px" height="250px"></td>
					</tr>
					<tr>
						<td><b>Description</b></td>
					</tr>
					<tr>
						<td>
						<?php echo $row['post_description'];?>
							<br>
						</td>
					</tr>
					
					<tr>
						<td><b>Category</b></td>
					</tr>
					<tr>
						<td>
						<?php
						$statement1=$db->prepare("select * from tbl_category where cat_id=?");
						$statement1->execute(array($row['cat_id']));
						$result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
						foreach($result1 as $row1)
						{
							echo $row1['cat_name'];
						}
						
						?>
						</td>
					</tr>
					<tr>
						<td><b>Tag</b></td>
					</tr>
					<tr>
						<td>
                             <?php
								//when retrive data (using explode)
								$arr=explode(',',$row['tag_id']);
								$arr_count=count(explode(',',$row['tag_id']));
								$k=0;
								$arr1=array(); //Empty Array
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
						</td>
					</tr>
				 </table>
			
				 </p>
														  
														</div>
													  </div>
													  <!--Fancy box End-->
													  <a class="btn btn-success" title="Edit this Post" href="edit_post.php?id=<?php echo $row['post_id']; ?>"><i class="icon_check_alt2"></i>
													  
													  </a>
													  <a class="btn btn-danger"  title="Delete This post" data-toggle="modal" data-target="#productModal<?php echo $row['post_id'];?>"><i class="icon_close_alt2"></i>
													   </a>
													  
																		  
											<!-- Modal -->
													<div id="productModal<?php echo $row['post_id'];?>" class="modal fade " role="dialog">
													  <div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
														  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">DELETE Confirmation</h4>
														  </div>
														  <div class="modal-body">
															<h4>Are You Confirm To Delete This Element?</h4>
														  </div>
														  <div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															<a class="btn btn-danger btn-ok" href="delete_post.php?id=<?php echo $row['post_id']; ?>" >Confirm</a>
														  </div>
														</div>

													  </div>
													</div>
												
													  
													  
												  </div>
												  
												  </td>
		</tr>
			
	
	
  <?php	
}

?>
</table>
<?php include("footer.php"); ?>   
		  
