
<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: login.php');
}
include('../config.php');
?>


<?php
//form1 to Update data
 if(isset($_POST['form1']))
 {
	 try{
	
		 if(empty($_POST['p_status']))
		 {
			 throw new Exception("Status can not be empty");
		 }
				 //SearchSql and PDO
	       $statement2=$db->prepare("update  tbl_status set p_status=? where s_id=?");
		   $statement2->execute(array($_POST['p_status'],1));
		   
		   $success_message="Status is updated succesfully";
		}
		catch(Exception $e)
		{
		    $error_message=$e->getMessage();	
		}
	 
 }





 //form2 to insert data
 if(isset($_POST['form2']))
 {
	 try{
		 if(empty($_POST['a_title']))
		 {
			 throw new Exception("Achievement Title can not be empty");
		 } 
		 if(empty($_POST['a_details']))
		 {
			 throw new Exception("Achievement Details can not be empty");
		 }
				 //SearchSql and PDO
		$statement=$db->prepare("select * from tbl_achievements where achievement_title=?");
		$statement->execute(array($_POST['a_title']));
		$total=$statement->rowCount();
		if($total>0)
		{
		  throw new Exception("This Achievement  already exists");
		}
		$statement=$db->prepare("insert into tbl_achievements(achievement_title,achievement_details) values(?,?)");
		$statement->execute(array($_POST['a_title'],$_POST['a_details']));
	$success_message1='New Achievement Successfully Inserted';
		}
		catch(Exception $e)
		{
		    $error_message1=$e->getMessage();	
		}
	 
 }
 
  //Form3 to update data
 
 
 	if(isset($_POST['form_edit_achievement']))
	{
		try{
			 if(empty($_POST['a_title']))
		 {
			 throw new Exception("Achievement Title can not be empty");
		 } 
		 if(empty($_POST['a_details']))
		 {
			 throw new Exception("Achievement Details can not be empty");
		 }
			
			$a_title=mysql_real_escape_string($_POST['a_title']);
			$a_details=mysql_real_escape_string($_POST['a_details']);
			$statement1=$db->prepare("update tbl_achievements set achievement_title=? , achievement_details=? where achievement_id=?");
			$statement1->execute(array($a_title,$a_details,$_POST['hidden_id_for_edit_achievement']));
						
			
			$success_message2='Achievement Details Successfully Updated';
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
					
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-bars"></i>Pages</li>
						<li><i class="fa fa-square-o"></i>Pages</li>
					</ol>
				</div>
			</div>
              <!-- page start-->



<div style="margin-left:30px;">
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>


											  <?php	
					 if(isset($error_message)){
                        ?>
                        <div class="alert alert-block alert-danger fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                          <i class="icon-remove"> X</i>
                          </button>
                          <strong>Opps!&nbsp; </strong><?php echo $error_message;?>
                       </div>
                        <?php
                      }
                      if (isset($success_message)) {
                       ?>
                       <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"> X</i>
                          </button>
                          <strong>Well done!&nbsp; </strong><?php echo $success_message;?>
                       </div>
                       <?php
                        }
                      ?>
											  
											  <?php 
											  
											  $statement1=$db->prepare("select * from tbl_status where s_id=?");
												$statement1->execute(array(1));
												$result1=$statement1->fetchAll(PDO::FETCH_ASSOC); 
												foreach($result1 as $row1)
												{
													?>
											<form class="form-horizontal" role="form" method="post" >                                                  
                                                 
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Present Status</label>
                                                      <div class="col-lg-8">
                                                          <textarea name="p_status"  id="" placeholder="use <br> to display next line" class="form-control" cols="30" rows="5"><?php echo $row1['p_status']; ?></textarea>
                                                          <span class="help-block with-errors">To seperate line, use <br> at the end of the line </span>
													 </div>
                                                  </div>
                                           <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" name="form1" class="btn btn-primary">Update</button>
                                                        
                                                      </div>
                                                  </div>
                                              </form>
													
													
													<?php
												}
											  
											  ?>
											  
											  
											  
											  
                                     
                                          </div>
                                      </section>
                                  </div>
								  
								  
								        <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1>Add New Achievement</h1>
											  
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
											  
											  
                                              <form class="form-horizontal" role="form" method="post" action="profile.php">                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Achievement Title</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" name="a_title"  class="form-control" id="f-name" placeholder=" ">
                                                      </div>
                                                  </div>
                                              
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Description</label>
                                                      <div class="col-lg-8">
                                                          <textarea  name="a_details" class="form-control" cols="30" rows="5"></textarea>
                                                      </div>
                                                  </div>
                                           <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" name="form2" class="btn btn-primary" >Save</button>
                                                        
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </section>
<h2>View All Achievements</h2>  
<table class="tabl2" width="100%">
<tr>
    <th width="5%">Serial</th>
	<th width="75%">Title</th>
	<th width="20%">Action</th>
</tr>

<!-------SQL with PDO to fetch all category----->
		
					 
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
						
		
		
		
		
<?php
$i=0;
$statement=$db->prepare("select * from tbl_achievements order by achievement_title asc");
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

	<?php echo $row['achievement_title'];?></td>
    <td><a class="btn btn-info " data-toggle="modal" href="#myModal<?php echo $row['achievement_id'];?>">
                                Edit
                              </a>
							 
								<!---- For Edit------->
							  
	                  <!-- Modal -->
						  <div class="modal fade" id="myModal<?php echo $row['achievement_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
								  <div class="modal-content">
									<div class="modal-header">
									  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									  <h4 class="modal-title">Edit Your Achievement</h4>
									</div>
									<div class="modal-body">
									  <h4>Achievement Title:</h4>
									  <form method="post" action="" enctype="multipart/form-data">
										<input type="text"value="<?php echo $row['achievement_title'];?>"class="form-control" name="a_title"><br>
										<h4>Achievement Description :</h4>
										<textarea  name="a_details" name="a_details" class="form-control" cols="30" rows="5"><?php echo $row['achievement_details']; ?></textarea>
										<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
										<input type="hidden" name="hidden_id_for_edit_achievement" value="<?php echo $row['achievement_id'];?>">
										<input type="submit" value="Update" class="btn btn-success" name="form_edit_achievement">
									  </form>
									</div>         
								  </div>
								</div>
							  </div>
							  <!-- modal -->
							  <!---- For Edit------->
							  
	&nbsp;|&nbsp;
	
	  <a class="btn btn-danger " data-toggle="modal"
							  data-target="#MyModal<?php echo $row['achievement_id'];?>"  >
                                  Delete!
                              </a>
	</td>
	
	
	 <!-------------FOR Delete-------------->
							  
							  <!-- Modal -->
								<div id="MyModal<?php echo $row['achievement_id'];?>" class="modal fade " role="dialog">
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
										<a class="btn btn-danger btn-ok" href="delete_achievements.php?ID=<?php echo $row['achievement_id'];?>" >Confirm</a>
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