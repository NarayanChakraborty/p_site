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
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-bars"></i>Pages</li>
						<li><i class="fa fa-square-o"></i>Pages</li>
					</ol>
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
													  <a class="btn btn-primary fancybox" href="#inline<?php echo $row['post_id'];?>"title="View image"><i class="icon_plus_alt2"></i></a>
													  <!--Fancy Box-->
													  
													  <div id="inline<?php echo $row['post_id'];?>"style="display:none;width:700px;margin:10px 30px">
														<h3 style= "border-bottom: 2px solid #295498; color:#0C86AC;margin-bottom:10px;" >Product Details</h3>
														<div class="shopper-info">
														
														  <h4><?php echo $row['p_name']; ?></h4>
														  <img src="img/products/<?php echo $row['p_img'];?>" width="450" height="400">
														  <h4>Product Details</h4>
														  <p>
														  <?php echo $row['p_details']; ?>
														  </p>
														  <h4>Product Stock</h4>
														  <p>
															<i class=" fa fa-arrow-right"> Small : <strong style="color: #FE980F"><?php echo $row['p_small'] ; ?></strong></i>
														  </p>
														  <p>
															<i class=" fa fa-arrow-right"> Medium : <strong style="color: #FE980F"><?php echo $row['p_medium']; ?></strong></i>
														  </p>
														  <p>
															<i class=" fa fa-arrow-right"> Large : <strong style="color: #FE980F"><?php echo $row['p_large']; ?></strong></i>
														  </p>
														</div>
													  </div>
													  <!--Fancy box End-->
													  <a class="btn btn-success" title="Edit this Product" href="edit_product.php?id=<?php echo $row['p_id']; ?>"><i class="icon_check_alt2"></i>
													  
													  </a>
													  <a class="btn btn-danger"  title="Delete This product" data-toggle="modal" data-target="#productModal<?php echo $row['p_id'];?>"><i class="icon_close_alt2"></i>
													   </a>
													  
																		  
											<!-- Modal -->
													<div id="productModal<?php echo $row['p_id'];?>" class="modal fade " role="dialog">
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
															<a class="btn btn-danger btn-ok" href="product_delete.php?id=<?php echo $row['p_id']; ?>" >Confirm</a>
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
		  
