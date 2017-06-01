      <?php 
      include("header.php");
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
            		<?php
            		require_once('classes/businessmodel.php');
            		require_once('classes/connector.php');
            		require_once('classes/util.php');
            		$model = new business();
            		$conn = new connector();
            		$countries=$conn->getAll("SELECT * FROM country");
            		$cities= $conn->getAll("SELECT * FROM city"); //to be filtered
                        $categories=$conn->getAll("SELECT * FROM category");
                        $subcategories=$conn->getAll("SELECT * FROM sub_category");//to be filtered

            		?>


            		
            		
            		
            		<div class="container" style="padding-top:30px; margin-right:30px;">
            			<div class="panel panel-default">
							<?php 
								if (!empty($_POST['add_business']) && $_POST['add_business']=="add_business" ){
									
									$insert=$conn->insert_business($_SESSION['admin_id'],$_FILES['image1'],$_FILES['image'],$_POST['name'],$_POST['country'],$_POST['city'],$_POST['phone1'],$_POST['phone2'],$_POST['email'],$_POST['website'],$_POST['address'],$_POST['desc'],$_POST['subcategory1'],$_POST['subcategory2'],$_POST['subcategory3']);
									
									$message="";
									foreach($insert as $response){
										$message=$response['response'];
									}
									if($message=="true"){
										$conn->success_alert("Business registered successfully");
									}
									else if($message=="false"){
										$conn->Error_alert("Error! An error has occurred and registering business has failed");
									}
									else{
										$conn->Error_alert("Unexpected Error has occurred. Please try again.");									
									}
                                                      $_POST = array();
								}
							?>
            				<form role="form" action="" method="post" style="padding-left:30px; padding-right:100px;" enctype="multipart/form-data" id="add_business_form"> 
            					
									<div class="form-group" > 
										<h6> 
											
											<img  class="" style="width:86%;height:200px;background-color:#E9EAEE;" id="logo" name="logo" placeholder=""/> 	
											
            						</div>
            						<span class="btn btn-small btn-file" style="margin-left:75%;">
										&nbsp;&nbsp;&nbsp;Add Photo <input type="file" name="image1" id="inputfile" onchange="readURL(this)" >
									</span>
									<B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>
									
									<label>Logo Photo</label>
									<div class="form-group" > 
									
											<!--<img src="uploads/shop3.jpg" style="width:50px;height:50px;margin-left:30%;margin-top:28%;"> -->
											<img  class="" style="width:120px;height:120px;border-radius:50%; background-color:#E9EAEE;" id="logo2" name="logo2" placeholder=""/> 	
											
            						</div>
									
										<span class="btn btn-small btn-file" style="margin-left:17%;margin-top:-8%;">
											&nbsp;&nbsp;&nbsp;Add Photo <input type="file" name="image" id="inputfile" onchange="readURLLogo(this)">
										</span>
									
									<B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>
									
									<h5> <label for="name" class="help-block" style="color:#BD2532;"><B>Add business</B></label> </h5>
            						<div class="form-group"> 
									
            							<h6> <label for="name" class="help-block">Name <span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
            							<!--<input type="text" class="form-control"style="width:900px; border-color:#868686; border-radius:0;" id="name" name="name" placeholder="">--> 
            							<input type="text" required class="form-control input-sm " name="name" value="" style="max-width:80%" />				 
            						</div>
            						<?php


            						?>
            						
            						
            						<div class="form-group"> 
            							<h6> <label for="name" class="help-block">Country<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
            							<select class="form-control input-sm" id="country" name="country" style=" border-radius:5px; max-width:50% " onchange="makecities()" required>
            								<option value="">--Select Country--<option>
											<?php
            								fill_country_drop_down($countries);
            								//$cities= return_citie($conn);
            								?>
            							</select>
            						</div>
            						<div class="form-group"> 
            							<h6> <label for="name" class="help-block">City<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
            							<select class="form-control input-sm" id="city" name="city" style=" border-radius:5px; max-width:30%;" required>
            								<option value="">--Select City--<option>
											<?php
            								fill_city_drop_down($cities);
            								?>
            								
            							</select>
            						</div>
            						
            						<B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>

            						<div class="form-group  noMarginBottom">
            							<h6> <label for="name" class="help-block">contact phone<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
            							<input type="text"  class="form-control input-sm " name="phone1" value="" style="max-width:80%" />
            						</div>
            						<div class="form-group  noMarginBottom">
            							<h6> <label for="name" class="help-block">Business phone<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
            							<input type="text"  class="form-control input-sm " name="phone2" value="" style="max-width:80%"/>
            						</div>
            						<div class="form-group  noMarginBottom">
            							<h6> <label for="name" class="help-block">Email<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
            							<input type="text"  class="form-control input-sm " name="email" value="" style="max-width:80%"/>
            						</div>
            						<div class="form-group  noMarginBottom">
            							<h6> <label for="name" class="help-block">Website<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
            							<input type="text"  class="form-control input-sm " name="website" value="" style="max-width:80%" />
            						</div>
            						<!--<div class="form-group  noMarginBottom">
            							<h6> <label for="name" class="help-block">Banner<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
            							<input type="file" class="form-control input-sm " name="banner_image" required style="max-width:80%"/>
            						</div>-->

            						<B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>
            						
            						
            						
            						
            						<div class="form-group"> 
            							<h6> <label for="name" class="help-block">Address<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
            							<textarea class="form-control" rows="3" id="address" name="address" style="background-color:#E9EAEE;resize:none; border-color:#E9EAEE; width:700px; height:100px;" placeholder="Write a review......" required></textarea>
            							  
            						</div>

            						<div class="form-group"> 
            							<h6> <label for="name" class="help-block">Business Description</label> </h6>
            							<textarea class="form-control" rows="3" id="desc" name="desc" style="background-color:#E9EAEE;resize:none; border-color:#E9EAEE;border-color:#E9EAEE;border:0px; width:700px; height:100px;" placeholder="Write a review......"></textarea>
            							  
            						</div>
            						
            						
            						<br/>
            						<B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>
            						<br/>
            						<div class="form-group"> 
            							<h6> 
            								<span style="font-size:16; font-weight:bold;">
            									Select Category
            								</span>
            								<span style="font-size:12; font-weight:small;" class="simplegrey">
            									3 Maximum
            								</span>
            								
            							</h6>
            							<table>
            								<tr style="font-size:12; font-weight:medium;" class="simplegrey">
            									<td>Category<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></td>
            									<td>Subcategory<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></td>
            								</tr>
            								<tr>
            									<td width="300px">
            										<select class="form-control input-sm" id="category1" name="category1" style=" border-radius:5px; width:250px; " onchange="makeSubcategories('category1','subcategory1')" required>
                                                                        <?php
            											fill_category_drop_down($categories);
                                                                              ?>
                                                                              	
            											
            										</select>
            									</td>
            									<td>
            										<select class="form-control input-sm" id="subcategory1" name="subcategory1" style=" border-radius:5px; width:250px; " required>
            											<?php
                                                                              fill_subcategory_drop_down($subcategories);
                                                                              ?>							
            										</select>
            									</td>
            								</tr>
            								
            							</table>
            							<div id="addcategory" class="collapse out">
            								<table>
            									<tr style="font-size:12; font-weight:medium;" class="simplegrey">
            										<td>Category</td>
            										<td>Subcategory</td>
            									</tr>
            									<tr>
            										<td width="300px">
            											<select class="form-control input-sm" id="category2" name="category2" style=" border-radius:5px; width:250px; "
                                                                              onchange="makeSubcategories('category2','subcategory2')">
            												 <?php
                                                                              fill_category_drop_down($categories);
                                                                              ?>							
            											</select>
            										</td>
            										<td>
            											<select class="form-control input-sm" id="subcategory2" name="subcategory2" style=" border-radius:5px; width:250px; ">
            												<?php
                                                                              fill_subcategory_drop_down($subcategories);
                                                                              ?>    							
            											</select>
            										</td>
            									</tr>
            									
            								</table>
            								<table>
            									<tr style="font-size:12; font-weight:medium;" class="simplegrey">
            										<td>Category</td>
            										<td>Subcategory</td>
            									</tr>
            									<tr>
            										<td width="300px">
            											<select class="form-control input-sm" id="category3" name="category3" style=" border-radius:5px; width:250px; "
                                                                              onchange="makeSubcategories('category3','subcategory3')">
            												 <?php
                                                                              fill_category_drop_down($categories);
                                                                              ?>							
            											</select>
            										</td>
            										<td>
            											<select class="form-control input-sm" id="subcategory3" name="subcategory3" style=" border-radius:5px; width:250px; ">
            												<?php
                                                                              fill_subcategory_drop_down($subcategories);
                                                                              ?>    							
            											</select>
            										</td>
            									</tr>
            									
            								</table>
            							</div>
            							
            							<br/>
            							<a class=" btn redbright" data-toggle="collapse"style="height:30px;border-radius:4; background-color:#BD2532;color:white;" data-target="#addcategory">Add category</a>
            						<div style="height:100px;"></div>
      							<table>							
      								<tr>
      									<td>
      										<button  type="submit" name="add_business" value="add_business" class="btn btn-default" style="height:40px;font-size: 20px; width:40%; background-color:#BD2532; font-weight:bold;border-radius:10px;margin-left:250px;color:#EED1D5;">Add Business</button>
      									</td>
      									<td><B><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" style="text-decoration:none;color:black;">Cancel</a></B></td>
      									
      								</tr>
      								
      							</table>
      							
      							
      						</div>
      						
      					</form>

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
