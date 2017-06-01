<style type="text/css">
	.social_links_input{
		border-top:0px;
		border-left:0px;
		border-right:0px;
		border-color:#868686;
		margin-top: -1%;
		margin-left: -6%;
	}
	.social_link_text{
		
		font-weight: bold;
		font-size: 13px;
	}
	.more_info_input{
		width:100px;margin-left:-10px;border-radius:0;border-color:#868686;height:28px;
	}
	.more_info_text{
		margin-left:-15px;
	}
	.more_info_space{
		height:28px;
	}
	.rowbottom20{
		margin-bottom:20px;
	}
</style>
<?php 
require_once('classes/connector.php');
require_once('classes/db_config.php');
require_once('classes/gstring_funcs.php');

$conn = new connector();

?>

<html lang="en">
	<?php require_once('imports.php'); ?>
<body style="background-color:#E9EAEE;" ng-app="home">
		
		<?php require_once('Controllers/Logged_header2.php'); ?>
		<br/>
	<div class="container" style="padding-left:30px;padding-right:30px;"  ng-controller="FullBusinessCtrl">
		<input type="hidden" ng-model="business_id" ng-init="business_id='<?php echo  gStringId($_GET['current_business_id']); ?>'">
				<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $_SESSION['SESS_MEMBER_ID'];?>'" >
				<input type="hidden" ng-model="date_created" ng-init="date_created='<?php echo time();?>'" >
						
			<div class="panel panel-default">
				<form  style="padding-left:30px; padding-right:100px;" enctype="multipart/form-data" > 
					
					<h4> <label for="name" class="" style="color:#BD2532;"><B>Edit Public Business info</B></label> </h4>
					<div class="form-group"> 
						 <h6> <label for="name" class="">Business Name</label> </h6>
						 <input  type="text" class="form-control" style="width:500px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-model="FullBusiness.business.name" id="name"  name="name" placeholder="" >
						 
						
						
					</div>
					<br/>
					<B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
					<!--<div class="form-group"> 
						 <h6> <label for="name" class="">Your Current postion at the company / business</label> </h6>
						 <input type="text" class="form-control"  style="width:500px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="position" ng-model="businessobject.position_of_editor" placeholder="" required="required">
							
					</div>-->

					<div class="form-group"> 
						 <h6> <label for="name" class="">Official Email for the business</label> </h6>
						 <input type="text" class="form-control" style="width:500px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="email" ng-model="FullBusiness.business.email"  placeholder="">
							
					</div>
					<div class="form-group"> 
						 <h6> <label for="name" class="">Official Website for the business</label> </h6>
						 <input type="text" class="form-control"  style="width:500px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="postion" ng-model="FullBusiness.business.website"  placeholder="" >
							
					</div>

					
					
					{{FullBusiness.business.category_1.name}}
					{{showdefault}}

					<div class="row" >
						<input type="hidden" ng-model="country_name" ng-init="country_name='<?php echo $country['name']; ?>'">
						<input type="hidden" ng-model="country_idd" ng-init="country_idd='<?php echo $country['id']; ?>'">
						<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<span class="" style="font-size:12px;font-weight:bold;">Country</span>

							<select class="form-control" ng-model="FullBusiness.business.country.id"   style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options="country.id as country.name for country in countryModels" ng-change="updateCities(FullBusiness.business.country.id)">

							 			
							 	<option  value="">{{FullBusiness.business.country.name}}</option>
							 			



							</select>
						</div>
						
					  <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<span class="" style="font-size:12px;font-weight:bold;">City</span>
							<select id="mycities"  ng-model="FullBusiness.business.city.id" class="form-control"   style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;"
							ng-options="city.id as  city.name for city in cityModels">
									<option  value="" ng-show="showdefault==0"> {{FullBusiness.business.city.name}} </option>
									

							</select>
						</div> 
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<span class="" style="font-size:12px;font-weight:bold;">Business Phone No</span>
							<input type="text" class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="phone_1" ng-model="FullBusiness.business.phone_1"  placeholder="" >
						</div>
						<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<span class="" style="font-size:12px;font-weight:bold;">Other Business No</span>
							<input type="text" class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="phone_2" ng-model="FullBusiness.business.phone_2"  placeholder="" />
						</div>
					</div>
					<div style="height:10px;"></div>

						<div class="row">
						 <div class="form-group" style="margin-left:15px;margin-top:15px;">
						 

						 <table>
							<tr style="font-size:12; font-weight:medium;" class="simplegrey">
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td width="250px">
									<select class="form-control"  ng-model="FullBusiness.business.category_1.id"   name="category1" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options="category.category_id as category.categoryname for category in categoryModels" ng-change="updateCategorySubcategories(FullBusiness.business.category_1.id,1)">

										<option  value="">{{FullBusiness.business.category_1.name}} </option>

											
									</select>
									

								</td>
								<td>
									<select id="subcategory1" name="subcategory1"  ng-model='FullBusiness.business.subcategory_1.id' class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options="subcategory.name for subcategory in subcategory1Models">
										<option  value="">{{FullBusiness.business.subcategory_1.name}} </option>
									</select>
								</td>
							</tr>

						 </table>
						 <div id="addcategory" class="collapse out">
							<table>
								<tr style="font-size:12; font-weight:medium;" class="simplegrey">
									<td></td>
									<td></td>
								</tr>
								<tr >
									<td width="250px">

										<select  id="edit_biz_category2" ng-model="FullBusiness.business.category_2.id" name="category2" class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px; margin-top:10px;" ng-options="category.category_id as category.categoryname for category in categoryModels" ng-change="updateCategorySubcategories(FullBusiness.business.category_2.id,2)">
											<option  value="">{{FullBusiness.business.category_2.name}} </option>
											
										</select>
									</td>
									<td>
										<select id="subcategory2" name="subcategory2" ng-model='FullBusiness.business.subcategory_2.id' class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px; margin-top:10px;" ng-options="subcategory.name for subcategory in subcategory2Models">
											<option  value="">{{FullBusiness.business.subcategory_2.name}} </option>
										</select>
									</td>
								</tr>

							 </table>
							 <table>
								<tr style="font-size:12; font-weight:medium;" class="simplegrey">
									<td></td>
									<td></td>
								</tr>
								<tr style="margin-top:10px;">
									<td width="250px">
										<select id="edit_biz_category3" ng-model="FullBusiness.business.category_3.id" name="category3" class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px; margin-top:10px;" ng-options="category.category_id as category.categoryname for category in categoryModels" ng-change="updateCategorySubcategories(FullBusiness.business.category_3.id,3)">
											<option  value=""> {{FullBusiness.business.category_3.name}}</option>
											
										</select>
									</td>
									<td>
										<select id="subcategory3" name="subcategory3" ng-model='FullBusiness.business.subcategory_3.id' class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px; margin-top:10px;"  ng-options="subcategory.name for subcategory in subcategory3Models">
											<option  value=""> {{FullBusiness.business.subcategory_3.name}} </option>
										</select>
									</td>
								</tr>

							 </table>
						</div>
						</div>
						<br/>
						
						<div class="col-sm-3 col-xs-3 col-md-3 col-lg-3 col-xl-3" style="float:right; margin-top:-90px; margin-right:270px;">
							 <a class="redbright" data-toggle="collapse" data-target="#addcategory" style="text-decoration:none; cursor:pointer"><p style="margin-top:16%;margin-left:-13%; " class="redbright">Add category</p></a>
							
						</div>
					</div>
					
					
					
					
					 <B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>

			 			<h6> <label for="name">Address</label> </h6>
						  <textarea  class="form-control" style=" max-width:600px;height:110px;background-color:#EBEAEF;" id="name" name="description" placeholder="" ng-model="FullBusiness.business.address"   minlength=4 ng-maxlength=50  > 
						  </textarea>
						 <div style="height:30px;"></div>

						 <h6> <label for="name">Business Description</label> </h6>
						  <textarea type="text" class="form-control" style=" max-width:600px;height:140px;background-color:#EBEAEF;" id="edit_business_description" name="description" placeholder="" ng-model="FullBusiness.business.description"  minlength=4 ng-maxlength=50 > </textarea>

						 <div style="height:30px;"></div>

					 	<!--<B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
						<div style="height:3px;"></div>
						 <h6> 
							<span style="font-size:16; font-weight:bold;">
								 Working hours	
							 </span>
						 </h6>-->
						 
						 <?php //require_once('working_hours.php'); ?>
						 <!--<div ng-include="'working_hours.html'"></div>-->

						<br/><br/></br/>

						 <!--      removed facebook links -->

						 <B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
						 <h6> <label for="name" class="">Business Cover Photo Width:1135 Height: 390</label> </h6>
						 

						 <img ng-src="{{FullBusiness.business.banner}}" style="width:85%;max-height:300px" />

						<!-- <input type="file" class="btn btn-default" style="height:40px;width:100px; border-radius:16; background-color:#BD2532;margin-top:16px; font-weight:bold; color:#EED1D5;" name="CoverPhoto" required="required" />-->
						<br/>
						 <div class="fileUpload btn btn-danger" style="border-radius: 5px;margin-left:0px;  background-color:#BD2532;">
		    				<span>Add photo</span>
			    			<input id="input_bannerrr" type="file" onchange="angular.element(this).scope().pictureChanges(event,'banner')"  name="CoverPhoto" class="upload" file-model="my_cover_photo">
						</div>


						 <B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
							<h6> <label for="name" style="font-size:14px;" class="">Logo Photo</label> </h6>
							<table>
								<tr>
									<td>
										<img class="img-circle" ng-src="{{FullBusiness.business.logo}}" width="150px" height="150px;" />
									</td>
									<td>

										<div class="fileUpload btn btn-danger" style="border-radius:5px; background-color:#BD2532;">
						    				<span>Upload photo</span>
						    			<input  onchange="angular.element(this).scope().pictureChanges(event,'logo')" type="file"  name="LogoPhoto" class="upload" file-model="my_logo"   />
										</div>
										
									</td>
								</tr>
							</table>
						 <B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>

							<!-- <p><B>Other Details</B></p>-->

							<?php //require_once('business_Services.php'); ?>

						 <br/><br/><br/><br/><br/><br/>
						 <div class="row">
						 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
						 		
						 	</div>
						 	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
						 		<div class="row">
						 			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
						 				<button type="submit" ng-disabled="isPublicEditing==1"  ng-click="postPublicEditBusiness()" class="btn btn-default " style="height:45px;min-width:140px;margin-left: -35%; border-radius:10; background-color:#BD2532;font-size:18; font-weight:bold; color:#EED1D5;">Save</button>
						 			</div>
						 			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
						 				<a class="btn" style="color:black;text-decoration:none;margin-top:20px;font-weight:bold;">Cancel</a>
						 			</div>
						 		</div>

						 		<div class="row" ng-show="isPublicEditing==1">

						 		<img   style="width:30px; height:30px; margin-top:20px; margin-left:100px ;" ng-src="{{BaseImageURL}}uploads/feed_loader.gif">
						 		</div>
						 		
						 		
						 	</div>
						 	<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
						 		
						 	</div>
						 </div>				
						 
						 <br/><br/><br/><br/><br/><br/>				 
						 
						 
					 </div>
					 
				</form>
			</div>
		
		<?php require_once("footer.php"); ?>
					<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
					<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
					<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
						<script type="text/javascript" src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
					<script src="js/jquery-1.10.2.min.js"></script>


					<!--my own javascript order-->
					<script src="js/js/yammz.js" type="text/javascript"></script>
					<script src="js/js/home-models.js" type="text/javascript"></script>
					<script src="js/js/home.js" type="text/javascript"></script>
					<script src="js/js/starter.js" type="text/javascript"></script>
					<!--<script src="Rating/js/star-rating.js" type="text/javascript"></script>-->
					<script src="Rating/js/star-rating.js" type="text/javascript"></script>

					<script type="text/javascript" src="js/function.js"></script>
					<script type="text/javascript" src="js/function.js"></script>
                    <script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>
	</body>
</html>
