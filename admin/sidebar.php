
	<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu"> 
			  
			  	<?php 
				include_once('../config.php');
					$statement=$db->prepare("select * from tbl_welcome where id=?") ;
			$statement->execute(array(1));
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
				?>
                    <li class="text-center">
					
                    <img src="profile/<?php echo $row['post_image']; ?>" class="user-image img-responsive img-sm" />
					</li>	

               <?php
			}
?>			
                  <li class="active">
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Page Options</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="welcome_note.php">Welcome Note</a></li>                          
                          <li><a class="" href="#">Manage Gallary</a></li>
						  <li><a class="" href="about_me.php">About Section</a></li>
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Blog Options</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="add_post.php">Add Post</a></li>
                          <li><a class="" href="viewpost.php">View Post</a></li>
                          <li><a class="" href="managecategory.php">Manage Category</a></li>
						  <li><a class="" href="managetag.php">Manage Tags</a></li>
                      </ul>
                  </li>
    
                  <li>                     
                      <a class="" href="comments.php"
					  ">
                          <i class="icon_piechart"></i>
                          <span>View Comments</span>
                          
                      </a>
                                         
                  </li>
                             
       
                  
                 
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->