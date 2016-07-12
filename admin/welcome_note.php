
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
		   
		   $success_message="Post is updated succesfully";
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
<h2>Welcome Note</h2>
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
<form action="" method="POST" enctype="multipart/form-data">
<table class="tabl">
	<tr>
		<td>
		     <?php 
			 $statement = $db->prepare("SELECT * FROM tbl_welcome");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
			 ?>
			<textarea name="post_description" cols="100" rows="10" required><?php echo  $row['description']; ?></textarea>
				<script type="text/javascript">
				if ( typeof CKEDITOR == 'undefined' )
				{
					document.write(
						'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
						'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
						'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
						'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
						'value (line 32).' ) ;
				}
				else
				{
					var editor = CKEDITOR.replace( 'post_description' );
					//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
				}

			</script>
			<?php
			}
			?>
		</td>
	</tr>
	<tr><td><input style="width:100px;"  type="submit" value="Save" name="form1"></td></tr>
</table>
</form>	</div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <?php include_once('footer.php'); ?>