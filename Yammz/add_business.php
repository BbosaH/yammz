<?php
require_once('Controllers/auth/auth.php');
require_once('classes/connector.php');
$conn = new connector();
?>

<html lang="en">
	<?php require_once('imports.php'); ?>


	<body style="background-color:#E9EAEE" ng-app="home" >

		<?php require_once('Controllers/Logged_header2.php'); ?>
		<br/>
		<div class="container">
			<div class="panel panel-default" ng-controller="AddBusinessCtrl" style="margin-left: 14px;">

				<form   enctype="multipart/form-data"   style="padding-left:30px; padding-right:100px;" name="myform" novalidate >
				  <input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $_SESSION['SESS_MEMBER_ID'];?>'" >
				  <input type="hidden" ng-model="date_created" ng-init="date_created='<?php echo time();?>'" >
					<br/><br/>

					<?php
						if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
					?>
							﻿<div class="alert alert-warning alert-dismissable">
								  <button type="button" class="close" data-dismiss="alert"
										  aria-hidden="true">×</button>
								  <strong>Message!</strong>

					<?php
							echo '<span class="err">';
							foreach($_SESSION['ERRMSG_ARR'] as $msg) {
							echo "$msg" ;
							}
							echo '</span>';
							unset($_SESSION['ERRMSG_ARR']);
					?>
							</div>
					<?php
						}
					  ?>

					<div class="form-group">
					<table>
					<tr>
					<td>
					<img  style="width:200px;height:200px; border-radius:15px;" id="logo" name="logo" ng-src="{{businessobject.picture}}"/>
					</td>
					<td>
					  <h6 style="margin-top: 140px; margin-left: 50px;"><label for="inputfile" class="help-block"></label> </h6>
					  <h6 style=" margin-left: 50px;">
					  <!--<input type="file" style="height:50px;font-size: 25px; width:300px; background-color:#BD2532; font-weight:bold;border-radius:10px;margin-left:250px;color:#EED1D5;"  id="inputfile" > -->
					  	<div class="fileUpload btn btn-danger" style="border-radius: 5px;  background-color:#BD2532;">
						    <span>Upload photo</span>
						    <input id="inputfile" type="file"  name="image" class="upload"  file-model = "myFile" />
						</div>
					  <h6>
					 </td>

					</tr>
					</table>
					<B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
					<h4> <label for="name" class="help-block" style="color:#BD2532;"><B>Add business</B></label> </h4>
					 <h6> <label for="name" class="help-block">Name<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
					  <input type="text" class="form-control" style="width:400px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="name" placeholder="" ng-minlength=4 ng-maxlength=50 required ng-model="businessobject.name">
					  <!-- validate -->

					</span>
					</div>



				   <div >

						 <div class="form-group">

							 <h6> <label for="name" class="help-block">Country<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
							 

							  <select class="form-control" ng-model="businessobject.country_id"  style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options=" country.id as country.name for country in countryModels" ng-change="updateCities(businessobject.country_id)">
							 			<option  value=""> Select country </option>
							
							 </select>

						 </div>
						 <div class="form-group">
							 <h6> <label for="name" class="help-block">City<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>

							 <select  ng-model="businessobject.city_id" class="form-control"  style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;"
							ng-options="city.id as  city.name for city in cityModels">
									<option  value=""> Select city </option>		

							</select>
						 </div>
					</div>


					<B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>




					<div class="form-group">
						 <h6> <label for="name" class="help-block">Address<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
						 <textarea class="form-control" rows="3" id="address" name="address" ng-model='businessobject.address'style="margin-left:0px;background-color:#E9EAEE;height:100px;width:700px;color:black; resize:none; border:none;border-radius: 3px;" placeholder="type address......">
						 </textarea>
					 </div>


					<br/>
					<B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
					<br/>
					<div >
					 <div class="form-group">
						 <h6>
							<span style="font-size:16; font-weight:bold;">
								Select Category
							</span>
							<span style="font-size:12; font-weight:small;" class="simplegrey">
								3 Maximum
							</span>
							<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span>
						 </h6>
						 <table>
							<tr style="font-size:12; font-weight:medium;" class="simplegrey">
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td width="300px">
									<select class="form-control" id="category1" ng-model="businessobject.category_1_id" name="category1" style="width:250px;border-radius:4px;background-color:#EBEAEF;border:0px;"
									ng-options="category.category_id as category.categoryname for category in categoryModels" ng-change="updateCategorySubcategories(businessobject.category_1_id,1)">

										<option  value=""> Select category </option>
											

									</select>
								</td>
								<td>
									<select id="subcategory1" name="subcategory1"  ng-model="businessobject.sub_category_1_id" class="form-control" style="width:250px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options="subcategory.id as subcategory.name for subcategory in subcategory1Models">
										<option  value=""> Select sub-category </option>
									</select>
								</td>
							</tr>

						 </table>
						 <div id="addcategory" class="collapse out">
							<table style="margin-top:10px;">
								<tr style="font-size:12; font-weight:medium;" class="simplegrey">
									<td></td>
									<td></td>
								</tr>
								<tr >
									<td width="300px">
										<select class="form-control"  ng-model="businessobject.category_2_id" name="category1" style="width:250px;border-radius:4px;background-color:#EBEAEF;border:0px;"
									ng-options="category.category_id as category.categoryname for category in dropcategories" ng-change="updateCategorySubcategories(businessobject.category_2_id,2)">

										<option  value=""> Select category </option>
											

									</select>
									</td>
									<td>
										<select   ng-model="businessobject.sub_category_2_id" class="form-control" style="width:250px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options="subcategory.id as subcategory.name for subcategory in subcategory2Models">
										<option  value=""> Select sub-category </option>
										</select>

									</td>
								</tr>

							 </table>
							 <table style="margin-top:10px;">
								<tr style="font-size:12; font-weight:medium;" class="simplegrey">
									<td></td>
									<td></td>
								</tr>
								<tr style="margin-top:10px;">
									<td width="300px">
										<select class="form-control"  ng-model="businessobject.category_3_id" name="category1" style="width:250px;border-radius:4px;background-color:#EBEAEF;border:0px;"
									ng-options="category.category_id as category.categoryname for category in categoryModels" ng-change="updateCategorySubcategories(businessobject.category_3_id,3)">

										<option  value=""> Select category </option>
									</td>
									<td>
										<select id="subcategory1" name="subcategory1"  ng-model="businessobject.sub_category_3_id" class="form-control" style="width:250px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options="subcategory.id as subcategory.name for subcategory in subcategory3Models">
										<option  value=""> Select sub-category </option>
									</select>
									</td>
								</tr>

							 </table>
						</div>
						</div>

						 <br/>
						 <a class=" btn redbright" data-toggle="collapse"style="height:30px;border-radius:4; background-color:#BD2532;color:white;" data-target="#addcategory">Add category</a>
						 <br/> <br/>
						 <B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>


						<br/>

						 <h6>

						 </h6>




						 <br/><br/><br/>



						 <table>
							<tr>
								<td>
									<button  type="submit" ng-disabled="adding==1" ng-click="addbusiness()" name="add_business" class="btn btn-default" style="height:50px;font-size: 25px; width:300px; background-color:#BD2532; font-weight:bold;border-radius:10px;margin-left:350px;color:#EED1D5;" >Add Business</button>
								</td>
								<td><B>&nbsp;&nbsp;&nbsp;&nbsp;Cancel</B></td>

							</tr>

						</table>


						 <br/><br/><br/><br/>


					 </div>

				</form>
			</div>
			<div ng-include="'footer.php'" ></div>
		</div>
		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
<script src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="bootstrap-3.2.0-dist/js/jquery.tmpl.js" type="text/javascript"></script>


<!--my own javascript order-->
<script src="js/js/yammz.js" type="text/javascript"></script>
<script src="js/js/home-models.js" type="text/javascript"></script>
<script src="js/js/home.js" type="text/javascript"></script>
<script src="js/js/starter.js" type="text/javascript"></script>
<!--<script src="Rating/js/star-rating.js" type="text/javascript"></script>-->
<script src="Rating/js/star-rating.js" type="text/javascript"></script>

<script type="text/javascript" src="js/function.js"></script>
<script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>



	</body>

</html>
