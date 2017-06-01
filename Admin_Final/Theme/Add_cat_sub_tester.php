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
    <section id="main-content" style="margin-bottom:-10px;" >
		<section class="wrapper">  
			<div class="row mt">			
				<div class="col-lg-12" >
				  <div class="col-lg-12 col-md-12 col-sm-12 mb noSidePadding" style="background-color:#fff;height:70px;" >
					<div class="yammz_red" style="padding-left:15px;padding-top:10px;">
						Add New Category

					</div>
					
						
				  </div>
				</div>
				
				<div class="col-lg-12">
				  <div class="col-lg-12 col-md-12 col-sm-12 mb noSidePadding" style="margin-top:-22px;" >
				
					<ul class="nav nav-tabs">
					    <li class="active" style="width:50%"><a data-toggle="tab" href="#category">Add Category</a></li>
					    <li style="width:50%"><a data-toggle="tab" href="#subcategory">Add subcategory</a></li>
					    
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
										<form action="" method="post" role="form" style="margin-left:4%;margin-right:4%;">											
											<div class="form-group">											
												 <label style="margin-top:15px;">Category Name</label>
												 <input type="text" class="form-control" name="category" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
											</div>
											<div class="form-group">											
												 <label style="">Icon</label>
												 <input type="text" class="form-control" name="cat_icon" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
											</div>
											<div class="form-group">											
												 <label style="" class="">Other Details</label>
												 <textarea class="form-control" name="cat_details" style="border-radius:0px;background-color:#DCDFE4;border:0px;"></textarea>
											</div>
											<button type="submit" class="btn btn-small" style="height:25px;color:#fff;background-color:#BE2633;padding-top:2px;width:30%;margin-left:30%;" name="addCategory" value="insert_category">Submit</button>
										</form>
										<hr style="margin-left:4%;margin-right:4%;background-color:#DCDFE4;border-color:#DCDFE4;height:2px;"></hr>
										<label style="margin-left:4%;margin-right:4%;" class="">All Icons ID</label>
										
										<iframe src="yammzfonts/icons-reference.html" style="width:100%; height:300px;"></iframe>
										<hr style="margin-left:4%;margin-right:4%;background-color:#DCDFE4;border-color:#DCDFE4;height:2px;"></hr>
										
										<label style="margin-top:0px;margin-left:4%;margin-right:4%;font-weight:bold;"><u>Summary of categories and sub categories</u></label>
										<p style="margin-left:20%;margin-right:4%;">No. of Categories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;">
										<?php
											$sql = $conn2->getAll("SELECT * FROM category");
											
											$count = count($sql);
											echo $count;
										?>
										</span><p>
										<p style="margin-left:20%;margin-right:4%;" >No. of Subcategories&nbsp;<span style="font-weight:bold;">
										<?php
											$sql2 = $conn2->getAll("SELECT * FROM sub_category");
											$no2 = count($sql2);
											echo $no2;;
											
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
												<th>Category</th>												
												<th>Status</th>
												<th>View</th>
											</tr>
										    </thead>
										    <tbody>
										      <?php
											$sql = $conn2->getAll("SELECT * FROM category");
											
											//$res = $conn->query($sql);
															$number=0;
											foreach ($sql as $value) {
															
												$sql2 = $conn2->getAll("SELECT count(*) FROM sub_category WHERE category_id = '".$value["id"]."'"); 
												//$result = $conn->prepare($sql2); 
												//$result->execute(); 
												//$sub_category_no = $result->fetchColumn(); 
												$sub_category_no=$sql2;
												$number +=1;
										    ?>
											  <tr>
												<td><?php echo $number; ?></td>
												<td><?php echo $value["name"];  ?></td>
												
												<td><?php echo "active";  ?> </td>
												<td><a style="color:#000;" href="#"> <!--<i class="fa fa-eye"></i> -->View</a></td>
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
											$sql = $conn2->getAll("SELECT * FROM category");
											$no = count($sql);
											//echo $no2;;
											//$res = $conn->query($sql);
											//$no=$res->rowCount();
											echo $no;
										?>
										</span><p>
										<p style="margin-left:20%;margin-right:4%;" >No. of Categories&nbsp;<span style="font-weight:bold;">
										<?php
											$sql2 = $conn2->getAll("SELECT * FROM sub_category");
											//$res2 = $conn->query($sql2);
											$no2=count($sql2);
											echo $no2;
										?>
										</span></p>
										
									</div>
									
								</div>
								
								<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="margin-left:-3.3%;width:61.6%;">
									<div  style="background-color:#fff;height:50px;"></div>
									
									<div class="dataTable_wrapper" style="background-color:#fff;">
										<table class="table table-bordered table-hover" style="background-color:#fff;margin-left:2%;margin-right:2%;width:96%;" id="dataTables2">
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
											$sql = $conn2->getAll("SELECT * FROM sub_category");
											//$res = $conn->query($sql);
											$number=0;
											foreach ($sql as $value) {
															
												$sql2 = $conn2->getAll("SELECT count(*) FROM sub_category WHERE category_id = '".$value["id"]."'"); 
												//$result = $conn->prepare($sql2); 
												//$result->execute(); 
												//$sub_category_no = $result->fetchColumn();
												$sub_category_no=$sql2;
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