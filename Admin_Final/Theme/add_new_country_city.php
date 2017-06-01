<?php 
  include("header.php");
  include("classes/connector.php");
	$conn2 = new connector();
?>

<style>
.btn-file {
    position: relative;
    overflow: hidden;
	max-width: 110%;
    height:20px;
	padding-left:2px;
	background-color:#BE2633;
	padding-top:2px;
	font-size:12px;
	color:#ffffff;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    max-width: 50px;
    max-height: 20px;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
	color:#ffffff;
	
}

</style>
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
											if (!empty($_POST['addCountryCity']) && $_POST['addCountryCity']=="addCountryCity" ){
												
												$check= $conn2->insert_city($_POST['city'],$_POST['country_id'],$_POST['other']);
												
												$response="";
												foreach($check as $checking){
													$response=$checking['response'];
												}
												
												if($response=="true"){
													$conn2->success_alert("Thanks, City added");
												}else if($response=="false"){
													$conn2->Error_alert("Error! An error has occurred and adding city has failed");
												}
												else if($response=="exist"){
													$conn2->Error_alert("Error! city already exists");
												}
												else{
													$conn2->Error_alert("Error! Internal system error has occured. Please try again");
												}
											
											}
											
										?>
										<?php 
											if (!empty($_POST['addCountry']) && $_POST['addCountry']=="addCountry" ){
												$check= $conn2->insert_country($_POST['country'],$_POST['code'],$_FILES['image'],$_POST['other']);
												
												$response="";
												foreach($check as $checking){
													$response=$checking['response'];
												}
												
												if($response=="true"){
													$conn2->success_alert("Thanks, Country added");
												}else if($response=="false"){
													$conn2->Error_alert("Error! An error has occurred and adding country has failed");
												}
												else if($response=="exist"){
													$conn2->Error_alert("Error! country already exists");
												}
												else{
													$conn2->Error_alert("Error! Internal system error has occured. Please try again");
												}
											}
										?>
										
										<form action="" method="post" role="form" style="margin-left:4%;margin-right:4%;" enctype="multipart/form-data">											
											<div class="form-group">											
												 <label style="margin-top:15px;">Name</label>
												 <input type="text" class="form-control" name="country" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
											</div>
											<div class="form-group">											
												 <label style="">Postal Code</label>
												 <input type="text" class="form-control" name="code" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
											</div>
											<div class="form-group">											
												 <label style="" class="">Other Details</label>
												 <textarea class="form-control" name="other" style="border-radius:0px;background-color:#DCDFE4;border:0px;resize:none;"></textarea>
											</div>
											<div class="form-group" > 
												<h6> 
													
													<!-- <img  class="form-control" style="width:200px;height:200px;" id="logo" name="logo" placeholder=""/> 	-->
													
													<span>
													<h6><label for="inputfile" class="help-block"><B>Upload Flag Image</B></label> 
													<!--<input type="file" name="image" id="inputfile" onchange="readURL(this)"> </h6></span> -->
												</h6>	

											</div>
											
											
											<div class="row">
												<div class="col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-4">
													<span class="btn btn-small btn-file">
														Select image <input type="file" name="image" id="inputfile" onchange="readURL(this)">
													</span>
												</div>
												<div class="col-lg-8 col-md-8 col-xl-8 col-sm-8 col-xs-8">
													<img  class="form-control" style="height:80px;background-color:#DCDFE4;border-radius:0px;border:0px;" id="logo" name="logo" placeholder=""/> 
													
													<button type="submit" class="btn btn-small" style="height:25px;color:#fff;background-color:#BE2633;padding-top:2px;width:50%;margin-top:20px;" name="addCountry" value="addCountry">Submit</button>
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
									<div  style="background-color:#fff;height:20px;"></div>
									
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
												<td><img src="<?php echo $photoBase.$value["flag"];  ?>" width="50" height="30" /></td>
												
												<td><?php echo $value["name"];  ?><br/><?php echo $value["code"];  ?> </td>
												<td><a class="yammz_red" style="" href="edit_country_cities.php?country=<?php echo $value["id"];  ?>"> <!--<i class="fa fa-eye"></i> -->View</a></td>
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
												 <input type="text" class="form-control" name="city" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
											</div>
											<div class="form-group">											
												 <label style="">Country</label>
												 <select name="country_id" class="form-control" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
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
												 <textarea class="form-control" name="other" style="border-radius:0px;background-color:#DCDFE4;border:0px;"></textarea>
											</div>
											<button type="submit" class="btn btn-small" style="height:25px;color:#fff;background-color:#BE2633;margin-top:15px;padding-top:2px;width:30%;margin-left:30%;" name="addCountryCity" value="addCountryCity">Submit</button>
											
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
										<table class="table table-bordered table-hover" style="background-color:#fff;margin-left:2%;margin-right:2%;width:96%;" id="dataTables2">
										    <thead>
											<tr>
												<th>No.</th>
												<th>Country Flag</th>												
												<th>City</th>
												<th>view</th>
											</tr>
										    </thead>
										    <tbody>
										      <?php
											$sql = "SELECT * FROM city ORDER BY name ASC";
											$res = $dbase->query($sql);
											$number=0;
											foreach ($res as $value) {
												$number +=1;			
												$sql2 = "SELECT * FROM country WHERE id = '".$value["country_id"]."'"; 
												$res2 = $dbase->query($sql2);

												$flag="";
												$thisCountry_id=0;
												foreach ($res2 as $key => $value2) {
													$flag=$value2["flag"];
													$thisCountry_id=$value2["id"];
												}
												
										    ?>
											  <tr>
												<td><?php echo $number; ?></td>
												<td><img src="<?php echo $photoBase.$flag;  ?>" width="50" height="30" /></td>
												
												<td><?php echo $value["name"]; ?></td>
												<td><a class="yammz_red" style="" href="edit_country_cities.php?country=<?php echo $thisCountry_id;  ?>"> <!--<i class="fa fa-eye"></i> -->View</a></td>
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
