 <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
							
						     <?php 
							
							 $statement1=$db->prepare("select * from tbl_category");
							 $statement1->execute();
							 $result1=$statement1->fetchALl();
							 foreach($result1 as $row1)
							 {
								 ?>
								 <li><a href="#"><?php echo $row1['cat_name']; ?></a>
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
                    <h4>Archives</h4>
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
                        <div class="col-md-6">
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
					
				     <li><a href="archives.php?date=<?php echo $final_arr_date[$j];?>">
						 <?php echo $post_month." ".$year."<br>"; ?>
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

            </div>