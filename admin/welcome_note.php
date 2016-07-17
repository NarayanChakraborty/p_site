
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

if(isset($_POST['form']))
	
{
	
	try{  
	
	   // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['post_image']['error']) ||
        is_array($_FILES['post_image']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['upfile']['error'] value.

	
if(empty($_FILES['post_image']['name']))
        {
			 //pdo to insert all above informations.. to tbl_post
		 $statement1=$db->prepare("update  tbl_welcome set f_name=?,l_name=?,email=?,f_quote=? ,description=? where id=?");
		 $statement1->execute(array($_POST['f_name'],$_POST['l_name'],$_POST['email'],$_POST['f_quote'],$_POST['post_description'],1));
		}	
         else
         {
		 if($_FILES['post_image']['size']>=3000000){
		 throw new Exception("Sorry,your file is too large"); //image file must be<1MB
		 }
		
		
	    //To generate id(next auto increment value from tbl_post)
	
		  
		//access image process one;   
	    $up_filename=$_FILES['post_image']['name'];   //file_name
		$file_basename=substr($up_filename,0,strripos($up_filename,'.'));//orginal image name
		$file_ext=substr($up_filename,strripos($up_filename,'.')); //extension
		$f1= $up_filename;  //Rename filename;

	    
		//only allow png ,jpg,jpeg,gif
		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif')&&($file_ext!='.PNG')&&($file_ext!='.JPG')&&($file_ext!='.JPEG')&&($file_ext!='.GIF'))
				{
					throw new Exception("only jpg,jpeg,png and gif format are allowed");
				}
				

				
				$target_folder = 'profile/'; 
    $upload_image = $target_folder.$f1;

   
		
						//To unlink previous image
				
				
                        $statement1=$db->prepare("select * from tbl_welcome where id=?");
						$statement1->execute(array(1));
						$result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
						foreach($result1 as $row1)
						{
							$real_path= $target_folder.$row1['post_image'];
						    unlink($real_path);
						}
	     
        //upload image to a folder
		 if(!move_uploaded_file($_FILES['post_image']['tmp_name'],$upload_image)) 
    {
      throw new Exception('image is not uploaded');
    }
        		

   $statement1=$db->prepare("update  tbl_welcome set f_name=?,l_name=?,email=?,f_quote=? ,post_image=?,description=? where id=?");
		 $statement1->execute(array($_POST['f_name'],$_POST['l_name'],$_POST['email'],$_POST['f_quote'],$f1,$_POST['post_description'],1));
		 }
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

  <div id="edit-profile" class="tab-pane">
								        <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1>Home Page</h1>
											  
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
											  
											  
               <form class="form-horizontal" role="form" data-toggle="validator" method="post" action="welcome_note.php" enctype="multipart/form-data">                                                  

		     <?php 
			 $statement = $db->prepare("SELECT * FROM tbl_welcome where id=?");
			$statement->execute(array(1));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
			 ?>
			 
													<div class="form-group">
                                                      <label class="col-lg-2 control-label">First Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" value="<?php echo $row['f_name']; ?>" name="f_name" id="f-name" placeholder=" " required>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Last Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" value="<?php echo $row['l_name']; ?>"  name="l_name" id="l-name" placeholder=" " required>
                                                      </div>
                                                  </div>
			 
												    <div class="form-group">
                                                      <label class="col-lg-2 control-label">Email</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" value="<?php echo $row['email']; ?>"  name="email" id="email" placeholder=" " required>
                                                      </div>
                                                  </div>
												    <div class="form-group">
                                                      <label class="col-lg-2 control-label">Favourite Quote</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" value="<?php echo $row['f_quote']; ?>"  name="f_quote" id="l-name" placeholder=" " required>
                                                      </div>
                                                  </div>
												   <div class="form-group">
													<label class="col-lg-2 control-label">File Input</label>
                                                      <div class="col-lg-6">
													<img src="profile/<?php echo $row['post_image']; ?>" alt="" width="300px" height="250px">
                                                      </div>
												</div>
												  
											    <div class="form-group">
													<label class="col-lg-2 control-label">File Input</label>
                                                      <div class="col-lg-6">
													<input type="file" name="post_image" id="exampleInputFile">
                                                      </div>
												</div>
												   <div class="form-group">
                                                      <label class="col-lg-2 control-label">Welcome Note</label>
                                                      <div class="col-lg-6">
                                                          <textarea name="post_description" cols="100" rows="10" required><?php echo  $row['description']; ?></textarea>
                                                      </div>
                                                  </div>
			 
			 
			 
			 
			 
			
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
			     <div class="form-group">
                                                      <div class="col-lg-offset-10 col-lg-2 ">
                                                        <input style="width:100px;"  type="submit" value="Save" name="form">
                                                      </div>
                                      </div>


</form>	
</div>
</section>
</div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <?php include_once('footer.php'); ?>