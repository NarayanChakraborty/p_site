
<?php 
include('../config.php');
if(isset($_POST['login']))
{
    try{

	   $num=0;
	   $password=$_POST['password'];
	   $password=md5($password);
	  
	  $statement=$db->prepare("select * from tbl_login where username=? and password=?");
	  $statement->execute(array($_POST['name'],$password));
	  $num=$statement->rowCount();

	  if($num>0)
	  {
	     session_start();
		 
		 $_SESSION['name']="snchousebd";
		 header('location: index.php');
	  }
	  else
	  {
	   throw new Exception('<div class="error">Invalid Username and/or password</div>');
	   }
	}
	catch(Exception $e)
	{
	$error_msg=$e->getMessage();
	}
}
?>


















<!DOCTYPE html>

<head>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    

	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">

</head>


<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Binary Admin : Login</h2>
               
                <h5>( Login yourself to get access )</h5>
				
																		<?php
								if(isset($error_msg))
								{
									?>
								      <div style="width:400px;text-align:center;margin:0 auto;" class="alert alert-block alert-danger fade in" >
                          <button  data-dismiss="alert" class="close close-sm" type="button">
                          <i class="icon-remove">x</i>
                          </button>
                          <strong>Opps!&nbsp; </strong><?php echo $error_msg?>
                       </div>
					   <?php
								}
								?>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" data-toggle="validator">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="name" placeholder="Your Username " required />
                                        </div>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" data-toggle="validator" name="password" placeholder="Your Password" required/>
                                        </div>
                                    <div class="form-group">
                                        
                                            <span class="pull-right">
                                                   <a href="#" >Forget password ? </a> 
                                            </span>
                                        </div>
                                     
                                     <div class="form-group">
										<a href="index.php?>"><button type="submit" name="login" class="btn btn-primary" >Log In</button></a>
									</div>
                                  
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
	
   
</body>
</html>
