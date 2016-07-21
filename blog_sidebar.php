<div class="col-md-1"></div>
            <div class="col-md-3">

                <!-- Blog Search Well -->
                 <div class="well">
                    			
			<?php 
											 
											  $statement1=$db->prepare("select * from tbl_welcome where id=?");
												$statement1->execute(array(1));
												$result1=$statement1->fetchAll(PDO::FETCH_ASSOC); 
												foreach($result1 as $row1)
												{
													?>
                    <div ><center>
                      <img class="img-responsive " style="height:160px;width:150px" src="admin/profile/<?php echo $row1['post_image']; ?>" alt="" >
                   </center>
				   </div>
					<h4 style="text-align:center"><?php echo $row1['f_name']." ".$row1['l_name']; ?></h4>
                    <!-- /.input-group -->
					<?php
												}
												?>
                </div>


 <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4><br>
                    <div class="row">
                        <div class="col-md-12 col-xs-10">
                            <ul class="list-unstyled">
							
						     <?php 
							
							 $statement1=$db->prepare("select * from tbl_category");
							 $statement1->execute();
							 $result1=$statement1->fetchALl();
							 foreach($result1 as $row1)
							 {
								 ?>

								 <li><a href="category.php?id=<?php echo $row1['cat_id']; ?>"><span class="glyphicon glyphicon-hand-right"></span><?php echo "  ".$row1['cat_name']; ?></a></li>
                                
                              
								 <?php
							 }
							 
							 ?>
							   
                            </ul>
                        </div>
                
                    </div>
                    <!-- /.row -->
                </div>

                <div class="well">

                    <h4>Archives</h4><br>
							<?php
				     $j=0;
					 $statement=$db->prepare("select distinct(post_date) from tbl_post order by post_date desc");
					 $statement->execute(array());
					 $result=$statement->fetchAll(PDO::FETCH_ASSOC);
					 foreach($result as $row)
					 {
						  
						 $ym=substr($row['post_date'],0,7);
						 $arr_date[$j]=$ym;
						 $j++;
					 }
					 $result=array_unique($arr_date);
					 $final_val=implode(",",$result);
					 $final_arr_date=explode(",",$final_val);
					 $final_arr_date_count=count(explode(",",$final_val));
					 
					 
					 ?> 
					
                    <div class="row">
                        <div class="col-md-12 col-xs-8">
                            <ul class="list-unstyled">
                              		    <?php 
					for($j=0;$j<$final_arr_date_count;$j++)
					 {
						// echo $final_arr_date[$j]."<br>";
						$year=substr($final_arr_date[$j],0,4);
						$month=substr($final_arr_date[$j],5,2);
						if($month=='01') {$post_month='January';}
						if($month=='02') {$post_month='February';}
						if($month=='03') {$post_month='March';}
						if($month=='04') {$post_month='April';}
						if($month=='05') {$post_month='May';}
						if($month=='06') {$post_month='June';}
						if($month=='07') {$post_month='JULY';}
						if($month=='08') {$post_month='August';}
						if($month=='09') {$post_month='September';}
						if($month=='10') {$post_month='October';}
						if($month=='11') {$post_month='November';}
						if($month=='12') {$post_month='December';}
					?>
					
				     <li><a href="archives.php?date=<?php echo $final_arr_date[$j];?>"><span class="glyphicon glyphicon-calendar"></span>
						 <?php echo $post_month."  ".$year."<br>"; ?>
						 </a>
					</li>
					<?php
				     		}
					?>
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
				<div class="well">
                    <h4>Blog Tags</h4><br>
                    <div class="row">
                       <div class="col-md-12 col-xs-10" style="text-align:left">
                           
						     <?php 
							
							 $statement1=$db->prepare("select * from tbl_tag");
							 $statement1->execute();
							 $result1=$statement1->fetchALl();
							 foreach($result1 as $row1)
							 {
								 ?>
								 <a href=""class="btn btn-default disabled"><span class="glyphicon glyphicon-tag"></span><?php echo " ".$row1['tag_name']; ?></a>
								 <?php
							 }
							 
							 ?>
							   
                            
                        </div>
                
                    </div>
                    <!-- /.row -->
                </div>

            </div>