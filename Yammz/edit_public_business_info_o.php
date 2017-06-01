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
	$size = array();
	$errors = array();
require_once('classes/connector.php');
require_once('classes/db_config.php');

$conn = new connector();

if(isset($_GET['current_business_id'])){


    $business_id=$_GET['current_business_id'];
	$_SESSION['business_id']=$business_id;
	$business=$conn->getBusinessOfId($business_id,true);

	$business_events = $conn->getEventsOfBusiness($business_id);

	//$working_hours =$conn->getWorkingHoursOfBusiness($business_id);
	$country = $conn->getCountryOfId($business['country_id']);
	$city = $conn->getCityOfId($business['city_id']);

	$user_claims =$conn->getAll("SELECT * FROM user_business_claim WHERE business_id='".$business_id."'");

	$user_claim=array(
			'facebook_link'=>'',
			'twitter_link'=>'',
			'youtube_link'=>'',
			'instagram_link'=>''
		);
	if(!empty($user_claims))
	{
		$user_claim=$user_claims[0];
	}
	
	$rate = $business['good'];
	$price =$business['cost'];
	//echo json_encode($working_hours);
	if(strcmp($business['logo'],"")==0 ||strcmp($business['logo'],'null')==0)
	{
		$business['logo']=BaseImageURL."uploads/deflogo.png";

	}else
	{
		$business['logo']=BaseImageURL.$business['logo'];
	}

	if(strcmp($business['banner'],"")==0 ||strcmp($business['banner'],'null')==0)
	{
		//$business['banner']="http://localhost:89//yammzit/admin/Theme/uploads/defbanner.png";
		$business['banner']=BaseImageURL."uploads/defphoto.jpg";
	}else
	{
		$business['banner']=BaseImageURL.$business['banner'];
	}
	if(strcmp($business['phone_1'],"")==0 ||strcmp($business['phone_1'],'null')==0)
	{
		$business['phone1'] ="________________________________";
	}
	if(strcmp($business['email'],"")==0 ||strcmp($business['email'],'null')==0)
	{
		$business['email'] ="_______________________________";
	}
	if(strcmp($business['website'],"")==0 ||strcmp($business['website'],'null')==0)
	{
		$business['website'] ="________________________________";
	}
	if(strcmp($business['location'],"")==0 ||strcmp($business['location'],'null')==0)
	{
		$business['location'] ="_______________________________";
	}
	$subcategory_ids =$conn->getAll("SELECT sub_category_id FROM business_category WHERE business_id='".$business_id."'");
	//echo json_encode($subcategory_ids);
	$categories=array();
	$subcategories=array();
	foreach($subcategory_ids as  $subcategory_id)
	{
		$subcategory = $conn->getSubCategoryOfId($subcategory_id['sub_category_id']);
		if($subcategory!=null || $subcategory!='')
		{
			$category_id=$subcategory['category_id'];
			$category =$conn->getCategoryOfId($category_id);
			array_push($categories,$category);
			array_push($subcategories,$subcategory);
		}else
		{
			array_push($categories,'null');
			array_push($subcategories,'null');
		}

	}

?>

<html lang="en">
	<?php require_once('imports.php'); ?>
<body style="background-color:#E9EAEE;" ng-app="home">
		
		<?php require_once('Controllers/Logged_header2.php'); ?>
		<br/>
	<div class="container" style="padding-left:30px;padding-right:30px;"  ng-controller="EditFullBusinessCtrl">
		<input type="hidden" ng-model="business_id" ng-init="business_id='<?php echo $_GET['current_business_id']; ?>'">
				<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $_SESSION['SESS_MEMBER_ID'];?>'" >
				<input type="hidden" ng-model="date_created" ng-init="date_created='<?php echo time();?>'" >
						
			<div class="panel panel-default">
				<form ng-submit="postPublicEditBusiness()" style="padding-left:30px; padding-right:100px;" enctype="multipart/form-data" > 
					
					<h4> <label for="name" class="" style="color:#BD2532;"><B>Edit Public Business info</B></label> </h4>
					<div class="form-group"> 
						 <h6> <label for="name" class="">Business Name</label> </h6>
						 <input  type="text" class="form-control" style="width:500px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-model="businessobject.name" id="name" ng-init="businessobject.name='<?php echo $business['name']; ?>'" name="name" placeholder="" >
						 
						
						
					</div>
					<br/>
					<B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
					<!--<div class="form-group"> 
						 <h6> <label for="name" class="">Your Current postion at the company / business</label> </h6>
						 <input type="text" class="form-control"  style="width:500px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="position" ng-model="businessobject.position_of_editor" placeholder="" required="required">
							
					</div>-->

					<div class="form-group"> 
						 <h6> <label for="name" class="">Official Email for the business</label> </h6>
						 <input type="text" class="form-control" style="width:500px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="email" ng-model="businessobject.business_email"  ng-init="businessobject.business_email='<?php if($business['email']=="_______________________________"){echo "";}else{echo $business['email'];}  ?>'" placeholder="">
							
					</div>
					<div class="form-group"> 
						 <h6> <label for="name" class="">Official Website for the business</label> </h6>
						 <input type="text" class="form-control"  style="width:500px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="postion" ng-model="businessobject.business_website" ng-init="businessobject.business_website='<?php if($business['website']=="________________________________"){echo "";}else{echo $business['website'];}  ?>'" placeholder="" >
							
					</div>

					

					<div class="row" >
						<input type="hidden" ng-model="country_name" ng-init="country_name='<?php echo $country['name']; ?>'">
						<input type="hidden" ng-model="country_idd" ng-init="country_idd='<?php echo $country['id']; ?>'">
						<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<span class="" style="font-size:12px;font-weight:bold;">Country</span>

							<select class="form-control" ng-model="businessobject.country_id" ng-init="businessobject.country_id='<?php echo $country['id']; ?>'"   style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options=" country.id as country.name for country in countryModels" ng-change="updateCities(businessobject.country_id)">

							 			
							 			<option  value="">Select Country</option>
							 			



							</select>
						</div>
						
					  <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<span class="" style="font-size:12px;font-weight:bold;">City</span>
							<select  ng-model="businessobject.city_id" class="form-control"  style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;"
							ng-options="city.id as  city.name for city in cityModels">
									<option  value=""> Select city </option>
									

							</select>
						</div> 
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<span class="" style="font-size:12px;font-weight:bold;">Business Phone No</span>
							<input type="text" class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="phone_1" ng-model="businessobject.phone_1" ng-init="businessobject.phone_1='<?php echo $business['phone_1']; ?>'" placeholder="" >
						</div>
						<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
							<span class="" style="font-size:12px;font-weight:bold;">Other Business No</span>
							<input type="text" class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="phone_2" ng-model="businessobject.phone_2" ng-init="businessobject.phone_2='<?php echo $business['phone_2']; ?>'" placeholder="" />
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
									<select class="form-control" ng-model="businessobject.category_1_id"   name="category1" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options="category.category_id as category.categoryname for category in categoryModels" ng-change="updateCategorySubcategories(businessobject.category_1_id,1)">

										<option  value=""> Select category </option>

											
									</select>
									

								</td>
								<td>
									<select id="subcategory1" name="subcategory1"  ng-model='businessobject.sub_category_1_id' class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options="subcategory.name for subcategory in subcategory1Models">
										<option  value=""> Select sub-category </option>
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

										<select  id="edit_biz_category2" ng-model="businessobject.category_2_id" name="category2" class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px; margin-top:10px;" ng-options="category.category_id as category.categoryname for category in categoryModels" ng-change="updateCategorySubcategories(businessobject.category_2_id,2)">
											<option  value=""> Select category </option>
											
										</select>
									</td>
									<td>
										<select id="subcategory2" name="subcategory2" ng-model='businessobject.sub_category_2_id' class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px; margin-top:10px;" ng-options="subcategory.name for subcategory in subcategory2Models">
											<option  value=""> Select sub-category </option>
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
										<select id="edit_biz_category3" ng-model="businessobject.category_3_id" name="category3" class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px; margin-top:10px;" ng-options="category.category_id as category.categoryname for category in categoryModels" ng-change="updateCategorySubcategories(businessobject.category_3_id,3)">
											<option  value=""> Select category </option>
											
										</select>
									</td>
									<td>
										<select id="subcategory3" name="subcategory3" ng-model='businessobject.sub_category_3_id' class="form-control" style="width:200px;border-radius:4px;background-color:#EBEAEF;border:0px; margin-top:10px;"  ng-options="subcategory.name for subcategory in subcategory3Models">
											<option  value=""> Select sub-category </option>
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
						  <input type="text" class="form-control" style=" max-width:600px;height:110px;background-color:#EBEAEF;" id="name" name="description" placeholder="" ng-model="businessobject.address" ng-init="businessobject.address='<?php echo $business['address']; ?>'"  minlength=4 ng-maxlength=50  > 
						 <div style="height:30px;"></div>

						 <h6> <label for="name">Business Description</label> </h6>
						  <input type="text" class="form-control" style=" max-width:600px;height:140px;background-color:#EBEAEF;" id="edit_business_description" name="description" placeholder="" ng-model="businessobject.business_description" ng-init="businessobject.business_description='<?php echo $business['description']; ?>'" minlength=4 ng-maxlength=50 > 
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
						 <input type="hidden" ng-model="businessobject.my_cover_photo" ng-init="businessobject.my_cover_photo='<?php echo $business['banner']; ?>'"/>

						 <input type="hidden" ng-model="businessobject.my_logo" ng-init="businessobject.my_logo='<?php echo $business['logo']; ?>'"/>

						 <img ng-src="{{businessobject.my_cover_photo}}" style="width:85%;max-height:300px" />

						<!-- <input type="file" class="btn btn-default" style="height:40px;width:100px; border-radius:16; background-color:#BD2532;margin-top:16px; font-weight:bold; color:#EED1D5;" name="CoverPhoto" required="required" />-->
						<br/>
						 <div class="fileUpload btn btn-danger" style="border-radius: 5px;margin-left:0px;  background-color:#BD2532;">
		    				<span>Add photo</span>
			    			<input id="input_bannerr" type="file"  name="CoverPhoto" class="upload" file-model="my_cover_photo"   />
						</div>


						 <B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
							<h6> <label for="name" style="font-size:14px;" class="">Logo Photo</label> </h6>
							<table>
								<tr>
									<td>
										<img class="img-circle" ng-src="{{businessobject.my_logo}}" width="150px" height="150px;" />
									</td>
									<td>

										<div class="fileUpload btn btn-danger" style="border-radius:5px; background-color:#BD2532;">
						    				<span>Upload photo</span>
						    			<input id="input_logoo" type="file"  name="LogoPhoto" class="upload" file-model="my_logo"   />
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
						 				<button type="submit" class="btn btn-default " style="height:45px;min-width:140px;margin-left: -35%; border-radius:10; background-color:#BD2532;font-size:18; font-weight:bold; color:#EED1D5;">Save</button>
						 			</div>
						 			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
						 				<a class="btn" style="color:black;text-decoration:none;margin-top:20px;font-weight:bold;">Cancel</a>
						 			</div>
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
<?php
}
?>