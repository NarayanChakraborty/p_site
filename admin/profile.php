
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

if(isset($_POST['form1']))
{
	try{  
		
		   
		   
		   //pdo to insert all above informations.. to tbl_post
		   $statement=$db->prepare("update  tbl_welcome set description=? where id=?");
		   $statement->execute(array($_POST['post_description'],1));
		   
		   $success_message="Post is inserted succesfully";
	}
	
	catch(Exception $e)
	{
		$error_message=$e->getMessage();
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



<div style="margin-left:30px;">
<h2>Profile</h2>
<?php
if(isset($error_message))
		{
		  echo "<div class='error'>".$error_message."</div>";
		}
		if(isset($success_message))
		{
			echo "<div class='success'>".$success_message."</div>";
		}
?>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <?php include_once('footer.php'); ?>