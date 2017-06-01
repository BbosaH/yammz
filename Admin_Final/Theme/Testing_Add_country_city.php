      <?php 
      include("header.php");
      ?>

      <section id="container" >
      	<?php 
      	include("heading.php");
      	?>

      	<?php 
      	include("sidemenu.php");
      	?>

          <!-- **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** -->
            <!--main content start-->


            <section id="main-content">
            	<section class="wrapper">
            		
					<div class="row mt">			
						<div class="col-lg-12" >
						  <div class="col-lg-12 col-md-12 col-sm-12 mb noSidePadding" style="background-color:#fff;height:70px;" >
							
							<div class="yammz_red" style="padding-left:15px;padding-top:10px;">
								Add New Country and City

							</div>
							
								
						  </div>
						</div>
						
						<div class="col-lg-12">
						  <div class="col-lg-12 col-md-12 col-sm-12 mb noSidePadding" style="margin-top:-22px;" >
						
							<ul class="nav nav-tabs">
								<li class="active" style="width:50%"><a data-toggle="tab" href="#category">Add Country</a></li>
								<li style="width:50%"><a data-toggle="tab" href="#subcategory">Add City</a></li>
								
							</ul>
							<div class="tab-content">
								<div id="category" class="tab-pane fade in active">
									<div style="height:3px;"></div>							
									<div class="row">
										<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
											
											<div  style="background-color:#fff;">
												<?php
													if (!empty($_POST['addCategory']) && $_POST['addCategory']=="insert_category" ){
														// Check if icon or ctegory lready exists
														$check_category=$conn2->getrecord_count("","category","name",$_POST['category']);
														$check_icon=$conn2->getrecord_count("","category","icon",$_POST['cat_icon']);
														
														if($check_category >0){
															$conn2->Error_alert("Error! Category already exists");
														}
														else if($check_icon >0){
															$conn2->Error_alert("Error! Icon already exists");
														}
														else{
															$app= $conn2->insert_category($_POST['category'],$_POST['cat_icon'],$_POST['cat_details']);
															foreach($app as $app){
																$response=$app['response'];
																if(strcmp($response,"true")==0){
																	$conn2->success_alert("Thanks, Category Added");
																}else{
																	$conn2->Error_alert("Error! An error has occurred and adding category has failed");
																}
															}
														}
													
													}
													
												?>
												<form role="form" action="" method="post" style="padding-left:30px; padding-right:100px;" enctype="multipart/form-data" > 											
													<div class="form-group">											
														 <label style="margin-top:15px;">Name</label>
														 <input type="text" class="form-control" name="category" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
													</div>
													<div class="form-group">											
														 <label style="">Postal Code</label>
														 <input type="text" class="form-control" name="cat_icon" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
													</div>
													<div class="form-group">											
														 <label style="" class="">Other Details</label>
														 <textarea class="form-control" name="cat_details" style="border-radius:0px;background-color:#DCDFE4;border:0px;"></textarea>
													</div>
													<div class="form-group" > 
														<h6> 
															
															<img  class="form-control"style="width:200px;height:200px;" id="logo" name="logo" placeholder=""/> 	
															
															<span>
															<h6><label for="inputfile" class="help-block">Select business profile photo</label> 
															<input type="file" name="image" id="inputfile" onchange="readURL(this);"> </h6></span>
														</h6>
													</div>
													<div class="row">
														<div class="col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-4">
															<button type="submit" class="btn btn-small" style="height:18px;color:#fff;background-color:#BE2633;padding-top:-0px;font-size:12px;padding-left:4px;padding-right:4px" name="addCategory" value="insert_category">Select image</button>
														</div>
														<div class="col-lg-8 col-md-8 col-xl-8 col-sm-8 col-xs-8">
															<textarea style="resize:none;height:80px;background-color:#DCDFE4;border-radius:0px;border:0px;"></textarea>
															<button type="submit" class="btn btn-small" style="height:25px;color:#fff;background-color:#BE2633;padding-top:2px;width:50%;margin-top:20px;" name="addCategory" value="insert_category">Submit</button>
														</div>
														
													</div>
													
												</form>
												<hr style="margin-left:4%;margin-right:4%;background-color:#DCDFE4;border-color:#DCDFE4;height:2px;"></hr>
												
												<label style="margin-top:10px;margin-left:4%;margin-right:4%;font-weight:bold;"><u>Summary of Countries and Cities</u></label>
												<p style="margin-left:20%;margin-right:4%;">No. of Countries&nbsp;<span style="font-weight:bold;">
												<?php
													$sql = "SELECT * FROM country";
													$res = $dbase->query($sql);
													$no=$res->rowCount();
													echo $no;
												?>
												</span><p>
												<p style="margin-left:20%;margin-right:4%;" >No. of Cities&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;">
												<?php
													$sql2 = "SELECT * FROM city";
													$res2 = $dbase->query($sql2);
													$no2=$res2->rowCount();
													echo $no2;
												?>
												</span></p>
												
											</div>
											
										</div>
										
										<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="margin-left:-3.3%;width:61.6%;">
											<div  style="background-color:#fff;height:50px;"></div>
											
											<div class="dataTable_wrapper" style="background-color:#fff;">
												<table class="table table-bordered table-hover" style="background-color:#fff;margin-left:2%;margin-right:2%;width:96%;" id="dataTables-example">
													<thead>
													<tr>
														<th>No.</th>
														<th>Flag</th>												
														<th>Country & Code</th>
														<th>view</th>
													</tr>
													</thead>
													<tbody>
													  <?php
													$sql = "SELECT * FROM country";
													$res = $dbase->query($sql);
													$number=0;
													foreach ($res as $value) {
																	
														$sql2 = "SELECT count(*) FROM sub_category WHERE category_id = '".$value["id"]."'"; 
														$result = $dbase->prepare($sql2); 
														$result->execute(); 
														$sub_category_no = $result->fetchColumn(); 
														$number +=1;
													?>
													  <tr>
														<td><?php echo $number; ?></td>
														<td><img src="<?php echo $value["flag"];  ?>" width="50" height="30" /></td>
														
														<td><?php echo $value["name"];  ?><br/><?php echo $value["code"];  ?> </td>
														<td><a class="yammz_red" style="" href="#"> <!--<i class="fa fa-eye"></i> -->View</a></td>
																		<!-- <td><a style="color:#000;" href="countries.php?c=<?php // echo $value["id"];  ?>"> <i class="fa fa-eye"></i> View</a></td> -->
													  </tr>
													<?php
													}
													  ?>
													</tbody>
												</table>
											</div>
											
										</div>
									</div>							
								</div>
								<div id="subcategory" class="tab-pane fade">
									<div style="height:3px;"></div>							
									<div class="row">
										<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
											
											<div  style="background-color:#fff;">
												<?php
													if (!empty($_POST['addsubCategory']) && $_POST['addsubCategory']=="insert_subcategory" ){
														// Check if icon or ctegory lready exists
														$check_sub=$conn2->getrecord_count(""," sub_category","name",$_POST['sub_category']);
														
														
														if($check_sub >0){
															$conn2->Error_alert("Error! Sub category already exists");
														}												
														else{
															$app= $conn2->insert_subcategory($_POST['sub_category'],$_POST['category'],$_POST['other_details']);
															foreach($app as $app){
																$response=$app['response'];
																if(strcmp($response,"true")==0){
																	$conn2->success_alert("Thanks, Sub category Added");
																}else{
																	$conn2->Error_alert("Error! An error has occurred and adding sub category has failed");
																}
															}
														}
													
													}
													
												?>
												<form action="" role="form" action="" method="post" style="margin-left:4%;margin-right:4%;">											
													<div class="form-group">											
														 <label style="margin-top:15px;">Name</label>
														 <input type="text" class="form-control" name="sub_category" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
													</div>
													<div class="form-group">											
														 <label style="">Country</label>
														 <select name="category" class="form-control" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
															<?php 
																$cat=$conn2->getAll("SELECT * FROM country ORDER BY name ASC");
																foreach($cat as $dat){
															?>
																<option value="<?php echo $dat['id']; ?>"><?php echo $dat['name']; ?><option>
															<?php
																}
															
															?>
														 </select>
													</div>
													<div class="form-group">											
														 <label style="" class="">Other Details</label>
														 <textarea class="form-control" name="other_details" style="border-radius:0px;background-color:#DCDFE4;border:0px;"></textarea>
													</div>
													<button type="submit" class="btn btn-small" style="height:25px;color:#fff;background-color:#BE2633;margin-top:15px;padding-top:2px;width:30%;margin-left:30%;" name="addsubCategory" value="insert_subcategory">Submit</button>
													
													<hr style="margin-left:4%;margin-right:4%;background-color:#DCDFE4;border-color:#DCDFE4;height:2px;margin-top:30px;"></hr>
												</form>
												
												<label style="margin-top:10px;margin-left:4%;margin-right:4%;font-weight:bold;"><u>Summary of Countries and Cities</u></label>
												<p style="margin-left:20%;margin-right:4%;">No. of Countries&nbsp;<span style="font-weight:bold;">
												<?php
													$sql = "SELECT * FROM country";
													$res = $dbase->query($sql);
													$no=$res->rowCount();
													echo $no;
												?>
												</span><p>
												<p style="margin-left:20%;margin-right:4%;" >No. of Cities&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;">
												<?php
													$sql2 = "SELECT * FROM city";
													$res2 = $dbase->query($sql2);
													$no2=$res2->rowCount();
													echo $no2;
												?>
												</span></p>
												
											</div>
											
										</div>
										
										<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="margin-left:-3.3%;width:61.6%;">
											<div  style="background-color:#fff;height:50px;"></div>
											
											<div class="dataTable_wrapper" style="background-color:#fff;">
												<table class="table table-bordered table-hover" style="background-color:#fff;margin-left:2%;margin-right:2%;width:96%;" id="dataTables-example">
													<thead>
													<tr>
														<th>No.</th>
														<th>Flag</th>												
														<th>Country & Code</th>
														<th>view</th>
													</tr>
													</thead>
													<tbody>
													  <?php
													$sql = "SELECT * FROM country";
													$res = $dbase->query($sql);
													$number=0;
													foreach ($res as $value) {
																	
														$sql2 = "SELECT count(*) FROM sub_category WHERE category_id = '".$value["id"]."'"; 
														$result = $dbase->prepare($sql2); 
														$result->execute(); 
														$sub_category_no = $result->fetchColumn(); 
														$number +=1;
													?>
													  <tr>
														<td><?php echo $number; ?></td>
														<td><img src="<?php echo $value["flag"];  ?>" width="50" height="30" /></td>
														
														<td><?php echo $value["name"];  ?><br/><?php echo $value["code"];  ?> </td>
														<td><a class="yammz_red" style="" href="#"> <!--<i class="fa fa-eye"></i> -->View</a></td>
																		<!-- <td><a style="color:#000;" href="countries.php?c=<?php // echo $value["id"];  ?>"> <i class="fa fa-eye"></i> View</a></td> -->
													  </tr>
													<?php
													}
													  ?>
													</tbody>
												</table>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
						  
						  </div>
						</div>
						
					</div>
					
				</section>
      </section>

      <?php
      include("footing.php");
      ?>

      </section>

      <?php 
      include("footer.php");
      ?>
