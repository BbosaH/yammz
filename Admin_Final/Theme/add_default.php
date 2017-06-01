<?php 
  include("header.php");
  require_once "classes/connector.php";
	$conn2 = new connector();
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
						Default Ads

					</div>
					
						
				  </div>
				</div>
				
				<div class="col-lg-12">
				  <div class="col-lg-12 col-md-12 col-sm-12 mb noSidePadding" style="margin-top:-22px;" >
				
					<ul class="nav nav-tabs">
					    <li class="active" style="width:50%"><a data-toggle="tab" href="#category">Mobile Default Ads</a></li>
					    <li style="width:50%"><a data-toggle="tab" href="#subcategory">Website Default Ads</a></li>
					    
					    
					</ul>
					<div class="tab-content">
						<div id="category" class="tab-pane fade in active">
							<div style="height:3px;"></div>							
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
									<div class="panel panel-default" style="border-radius:0px;">
										<div class="panel-body">
											<h5 style="font-weight:bold;margin-top:0px;margin-bottom:20px;">The News Feed Page</h5>
											<form role="form" action="" class="form-horizontal form-label-left">
												<div style="margin-left:2%;">
													<div style="height:180px;background-color:#D5D5D5;"></div>
													<h5>NB: The Image size should be <B>W300px</B> by <B>H150px</B></h5>
													
												
												</div>
												<hr style="background-color:#D5D5D5;height:2px;border-color:#D5D5D5;"></hr>
												<div style="margin-left:2%;">
													<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 col-xl-4">
														<div class="badge" style="background-color:#D5D5D5;color:#39383D;border-radius:0px;width:100%;margin-bottom:10px;" >Location </div>
														<div class="form-group">
															<label class="col-lg-4 col-sm-4 col-md-4 col-xs-4 col-xl-4 ">Country</label>
															<div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 col-xl-8">
																<select class="">
																	<option>Country</option>
																	<option></option>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-4 col-sm-4 col-md-4 col-xs-4 col-xl-4 ">City</label>
															<div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 col-xl-8">
																<select class="">
																	<option>Kampala</option>
																	<option></option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 col-xl-4">
													
														<div class="badge" style="background-color:#D5D5D5;color:#39383D;border-radius:0px;width:100%;margin-bottom:10px;" >Date </div>
														<div class="form-group">
															<label class="col-lg-4 col-sm-4 col-md-4 col-xs-4 col-xl-4 ">Start</label>
															<div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 col-xl-8">
																<select class="">
																	<option>On</option>
																	<option></option>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-4 col-sm-4 col-md-4 col-xs-4 col-xl-4 ">End</label>
															<div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 col-xl-8">
																<select class="">
																	<option>Off</option>
																	<option></option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 col-xl-4">
													<div class="badge" style="background-color:#D5D5D5;color:#39383D;border-radius:0px;width:100%;margin-bottom:10px;" >Age and Gender </div>
													
													</div>
													
												
												</div>
											</form>
										</div>
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
										<div id="flash"></div>
										<div id="show"></div>
										<form action="" role="form" action="" method="post" style="margin-left:4%;margin-right:4%;">											
											<div class="form-group">											
												 <label style="margin-top:15px;">Subcategory Name</label>
												 <input type="text" class="form-control" name="sub_category" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
											</div>
											<div class="form-group">											
												 <label style="">Category</label>
												 <select name="category" class="form-control" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
													<?php 
														$cat=$conn2->getAll("SELECT * FROM category ORDER BY name ASC");
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
											<button type="submit" class="btn btn-small submit_button" style="height:25px;color:#fff;background-color:#BE2633;padding-top:2px;width:30%;margin-left:30%;" name="addsubCategory" value="insert_subcategory">Submit</button>
										</form>
										<hr style="margin-left:4%;margin-right:4%;background-color:#DCDFE4;border-color:#DCDFE4;height:2px;"></hr>
										<label style="margin-left:4%;margin-right:4%;" >All Icons ID</label>
										
										<iframe src="yammzfonts/icons-reference.html" style="width:100%; height:300px;"></iframe>
										<hr style="margin-left:4%;margin-right:4%;background-color:#DCDFE4;border-color:#DCDFE4;height:2px;"></hr>
										
										<label style="margin-top:0px;margin-left:4%;margin-right:4%;font-weight:bold;"><u>Summary of categories and sub categories</u></label>
										<p style="margin-left:20%;margin-right:4%;">No. of Categories&nbsp;<span style="font-weight:bold;">
										<?php
											$sql = "SELECT * FROM category";
											$res = $conn->query($sql);
											$no=$res->rowCount();
											echo $no;
										?>
										</span><p>
										<p style="margin-left:20%;margin-right:4%;" >No. of Categories&nbsp;<span style="font-weight:bold;">
										<?php
											$sql2 = "SELECT * FROM sub_category";
											$res2 = $conn->query($sql2);
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
												<th>Sub category</th>												
												<th>Status</th>
												<th>Edit</th>
											</tr>
										    </thead>
										    <tbody>
										      <?php
											$sql = "SELECT * FROM sub_category";
											$res = $conn->query($sql);
											$number=0;
											foreach ($res as $value) {
															
												$sql2 = "SELECT count(*) FROM sub_category WHERE category_id = '".$value["id"]."'"; 
												$result = $conn->prepare($sql2); 
												$result->execute(); 
												$sub_category_no = $result->fetchColumn(); 
												$number +=1;
										    ?>
											  <tr>
												<td><?php echo $number; ?></td>
												<td><?php echo $value["name"];  ?></td>
												
												<td><?php echo "active";  ?> </td>
												<td><a class="yammz_red" style="" href="#"> <!--<i class="fa fa-eye"></i> -->Edit</a></td>
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