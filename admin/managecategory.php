<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: login.php');
}
require_once('../config.php');
?>





<?php
 //form1 to insert data
 if(isset($_POST['form1']))
 {
	 try{
		 if(empty($_POST['cat_name']))
		 {
			 throw new Exception("Category Name can not be empty");
		 }
				 //SearchSql and PDO
		$statement=$db->prepare("select * from tbl_category where cat_name=?");
		$statement->execute(array($_POST['cat_name']));
		$total=$statement->rowCount();
		if($total>0)
		{
		  throw new Exception("Category Name already exists");
		}
		$statement=$db->prepare("insert into tbl_category(cat_name) values(?)");
		$statement->execute(array($_POST['cat_name']));
	$success_message1='Category Name Successfully Inserted';
		}
		catch(Exception $e)
		{
		    $error_message1=$e->getMessage();	
		}
	 
 }
 
 
 //Form2 to update data
 

 
 	if(isset($_POST['form_edit_cat']))
	{
		try{
			if(empty($_POST['edit_cat_name']))
			{
				throw new Exception('Category Name Can not be Empty');
			}
			
			$cat_name=mysql_real_escape_string($_POST['edit_cat_name']);
			$statement1=$db->prepare('update tbl_category set cat_name=? where cat_id=?');
			$statement1->execute(array($cat_name,$_POST['hidden_id_for_edit_cat']));
						
			
			$success_message2='Category Name Successfully Updated';
		}
		catch(Exception $e)
		{
		    $error_message2=$e->getMessage();	
		}
	}


 
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



 <h2>Add new Category</h2>

		
		<?php	
					 if(isset($error_message1)){
                        ?>
                        <div class="alert alert-block alert-danger fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                          <i class="icon-remove"> X</i>
                          </button>
                          <strong>Opps!&nbsp; </strong><?php echo $error_message1;?>
                       </div>
                        <?php
                      }
                      if (isset($success_message1)) {
                       ?>
                       <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"> X</i>
                          </button>
                          <strong>Well done!&nbsp; </strong><?php echo $success_message1;?>
                       </div>
                       <?php
                        }
                      ?>
					 
					 <?php
                      if(isset($error_message2)){
                        ?>
                        <div class="alert alert-block alert-danger fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                          <i class="icon-remove"> X</i>
                          </button>
                          <strong>Opps!&nbsp; </strong><?php echo $error_message2;?>
                       </div>
                        <?php
                      }
                      if (isset($success_message2)) {
                       ?>
                       <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove">X</i>
                          </button>
                          <strong>Well done!&nbsp; </strong><?php echo $success_message2;?>
                       </div>
                       <?php
                        }
                      ?>					 
						
		
		
		
		
		
		
<form action="" method="post">
<table class="tabl">
    <tr>
	     <td>Category Name<br>
		 <input class="short" type="text" name="cat_name"></td>
	</tr>
	<tr>
		 <td><input type="submit" value="save" name="form1"></td>
	</tr>
</table>
</form>		

<!---View All Category---->

<h2>View All Categories</h2>  
<table class="tabl2" width="100%">
<tr>
    <th width="5%">Serial</th>
	<th width="75%">Category Name</th>
	<th width="20%">Action</th>
</tr>

<!-------SQL with PDO to fetch all category----->

<?php
$i=0;
$statement=$db->prepare("select * from tbl_category order by cat_name asc");
$statement->execute();
$result=$statement->fetchAll(PDO::FETCH_ASSOC); 
if($result==null)
{
	 echo "No Entry"; 
	
}
foreach($result as $row)
{

 $i++;
 ?>
<tr>
    <td><?php echo $i; ?></td>
    <td>

	<?php echo $row['cat_name'];?></td>
    <td><a class="btn btn-info " data-toggle="modal" href="#myModal<?php echo $row['cat_id'];?>">
                                Edit
                              </a>
							 
								<!---- For Edit------->
							  
	                  <!-- Modal -->
							  <div class="modal fade" id="myModal<?php echo $row['cat_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
								  <div class="modal-content">
									<div class="modal-header">
									  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									  <h4 class="modal-title">Edit This Category Name</h4>
									</div>
									<div class="modal-body">
									  <h4>Category Name :</h4>
									  <form method="post" action="" enctype="multipart/form-data">
										<input type="text"value="<?php echo $row['cat_name'];?>"class="form-control" name="edit_cat_name"><br>
										<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
										<input type="hidden" name="hidden_id_for_edit_cat" value="<?php echo $row['cat_id'];?>">
										<input type="submit" value="Update" class="btn btn-success" name="form_edit_cat">
									  </form>
									</div>         
								  </div>
								</div>
							  </div>
							  <!-- modal -->
							  <!---- For Edit------->
							  
	&nbsp;|&nbsp;
	
	  <a class="btn btn-danger " data-toggle="modal"
							  data-target="#MyModal<?php echo $row['cat_id'];?>"  >
                                  Delete!
                              </a>
	</td>
	
	
	 <!-------------FOR Delete-------------->
							  
							  <!-- Modal -->
								<div id="MyModal<?php echo $row['cat_id'];?>" class="modal fade " role="dialog">
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
										<a class="btn btn-danger btn-ok" href="delete_category.php?ID=<?php echo $row['cat_id'];?>" >Confirm</a>
									  </div>
									</div>

								  </div>
								</div>
															  
															  
							  <!-------------FOR Delete-------------->
	
	
	
	
</tr>  

<?php	
}
?>
</table>	
<?php include("footer.php"); ?>   
		  
