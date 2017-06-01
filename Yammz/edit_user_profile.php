<?php
require_once('Controllers/auth/auth.php');
require_once('classes/connector.php');
require_once('classes/gstring_funcs.php');
$conn = new connector();
?>

<html lang="en" ng-app="starter" >
	<?php require_once('imports.php'); ?>
	<style>
		
	</style>
	
	<body style="background-color:#E9EAEE" ng-controller="FullUserCtrl">
		
		<?php require_once('Controllers/Logged_header2_o.php'); ?>
		<br/>
	<div class="container" >
		<input type="hidden" ng-model="idVal"  ng-init="idVal='<?php echo gStringId($_GET['id']); ?>'" />
			<input type="hidden" ng-model="who" ng-init="who='me'" />

			
			
			<div class="panel panel-default" style="margin-left:15px;margin-right:14px;" >
				<form enctype="multipart/form-data" ng-submit="postUserEdit()"   style="padding-left:30px;margin-top:20px; padding-right:100px;" name="myform"> 
					<label style="font-size:18px;" class="redbright">Edit Profile</label>
					<table>
					
						<tr>
							<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="name" ng-model="fullUser.user.first_name" minlength=4 maxlength=50 > </td>
							<td><input type="text" class="form-control"style="width:263px;margin-left:10px;background-color:#EBEAEF;border:0px;border-radius:4px;" id="name" name="name" ng-model="fullUser.user.last_name" minlength=4 maxlength=50 > </td>
						</tr>
					</table>
					<table style="margin-top:25px;">
						<tr>
							<td>
							<!-- <input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="name" placeholder="Uganda" minlength=4 maxlength=50 >  -->
							<select class="form-control" ng-model="fullUser.user.country.id"   style="width:262px;border-radius:4px;background-color:#EBEAEF;border:0px;" ng-options="country.id as country.name for country in countryModels" ng-change="updateCities(fullUser.user.country.id)">

							<option  value="">{{fullUser.user.country.name}}</option>
							 			



							</select>
							</td>

							<td>
							<select id="mycities"  ng-model="fullUser.user.city.id" class="form-control"  style="width:262px;border-radius:4px;margin-left: 10px;background-color:#EBEAEF;border:0px;"
							ng-options="city.id as  city.name for city in cityModels">
									<option  value="" ng-show="showdefault==0"> {{fullUser.user.city.name}} </option>
									

							</select> 
							</td>
						</tr>
					</table>
					<table style="margin-top:25px;">
						<tr>
							<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="name" ng-model="fullUser.user.email" minlength=4 maxlength=50 > </td>
							<td><input type="text" class="form-control"style="width:263px;margin-left:10px;background-color:#EBEAEF;border:0px;border-radius:4px;" id="name" name="name" ng-model="fullUser.user.alternative_email" minlength=4 ng-maxlength=50 > </td>
						</tr>
					</table>
					<table style="margin-top:25px;">
						<tr>
							<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="name" ng-model="fullUser.user.phone_number" minlength=4 maxlength=50 > </td>
							
						</tr>
					</table>
					<table style="margin-top:25px;">
						<tr>
							<td>								
								<div class="example">

									<input class="form-control" style="border-radius:6;width:300px;background-color:#EBEAEF;" ng-model="dob"  type="hidden" id="example3">



								</div>								
							</td>
							<td>
								<span style="margin-left:60px;">
								  <input type="radio" ng-model="fullUser.user.sex"  name="event_cost" id="free_event" ng-checked="fullUser.user.sex == 'male'" value="male">
								  <span for="free_event" >Male </span>&nbsp;&nbsp;						
								</span>
								<span>
								  <input type="radio" ng-model="fullUser.user.sex" name="event_cost" id="free_event" ng-checked="fullUser.user.sex == 'female'" value="female">
								  <span for="free_event">Female </span>&nbsp;&nbsp;						
								</span>
							</td>
						</tr>
					</table>
					<hr style="height:7px;background-color:#EBEAEF;"></hr>
					<div class="row">
						<div class="col-md-6">
							<span>
								<table>
									<tr>
										<td><input type="password" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="first_pass" name="name" placeholder="Current password" minlength=4 maxlength=55 > </td>								
									</tr>
								</table>
								<table style="margin-top:25px;">
									<tr>
										<td><input type="text" ng-model="secondpass" class="form-control" style="width:263px;border-radius:4px;background-color:#EBEAEF;text-color:black;border:0px;" id="second_pass" name="second_pass" placeholder="New Password" minlength=4 maxlength=55 > </td>								
									</tr>
								</table>
								<table style="margin-top:25px;">
									<tr>
										<td><input type="text" ng-model="newpass" class="form-control" style="width:263px;border-radius:4px;background-color:#EBEAEF;text-color:black;border:0px;" id="third_pass" name="third_pass" placeholder="Confirm password" minlength=4 maxlength=55 pw-check='second_pass' >
										<span style="margin-top:20px; "  ng-show='myform.third_pass.$error.pwmatch'>
				   							 <label class="redbright" style="font-size: 15px; font-style:italic;font-weight: normal;margin-left:2px;">passwords don't match</label>
				  						</span>
										 </td>								
									</tr>
								</table>
								<hr style="height:7px;width:105%;background-color:#EBEAEF;margin-left:0px;"></hr>
								<table>
									<label>Facebook Link</label>
									<tr>
										<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="name" ng-model="fullUser.user.facebook_link" minlength=4 maxlength=55 > </td>								
									</tr>
								</table>
								<table>
									<label style="margin-top:20px;">Twitter Link</label>
									<tr>
										<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="name" ng-model="fullUser.user.twitter_link" minlength=4 maxlength=55 > </td>								
									</tr>
								</table>
								<table>
									<label style="margin-top:20px;">Instagram Link</label>
									<tr>
										<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="name" ng-model="fullUser.user.instagram_link" minlength=4 maxlength=55 > </td>								
									</tr>
								</table>
								<table>
									<label style="margin-top:20px;">Youtube Link</label>
									<tr>
										<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="name" name="name" ng-model="fullUser.user.youtube_link" minlength=4 maxlength=55 > </td>								
									</tr>
								</table>
							</span>
						</div>
						<div class="col-md-1">
							<span><hr style="height:90%;width:6px;background-color:#EBEAEF;margin-top:0px;"></hr></span>
						</div>
						<div class="col-md-5" >
							
								<p style="margin-top:0px;margin-left: 140px;font-size:16px;" class="redbright">Edit Profile Photo</p>
								<p><img style="margin-left:30px;margin-top: 40px;" ng-src="{{fullUser.user.avatar}}" class="img-circle" width="370px" height="370px"></p>

								<div class="fileUpload btn btn-danger" style="border-radius:5px; background-color:#BD2532; margin-top: 70px; margin-left: 160px;">
						    				<span>Upload photo</span>
						    	<input type="file"  onchange="angular.element(this).scope().picture_change(event,'avatar')"   name="avatarPhoto" class="upload" file-model="my_avatar"   />
								</div>
								
							
						</div>
					</div>
					
					
					
					
					
					<table>						
						<tr>
							<td>
								<button  type="submit" name="add_business" class="btn btn-default" style="height:50px;font-size: 25px; width:190px; background-color:#BD2532; font-weight:bold;border:0px;border-radius:10px;margin-left:400px;color:white;margin-top:80px;margin-bottom:30px;" >Save</button>
							</td>
							<td>
								<div style="height:80px;"></div>
								<B>&nbsp;&nbsp;&nbsp;&nbsp;Cancel</B>
							</td>									
						</tr>								
					</table>
				</form>
			</div>
			
		</div>
		<!-- <?php //require_once("Controllers/footer.php"); ?> -->
		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
    	<!--<script type="text/javascript" src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>-->
		
		<script src="distjpicker/jquery.date-dropdowns.min.js"></script>

		<script src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="bootstrap-3.2.0-dist/js/jquery.tmpl.js" type="text/javascript"></script>

		<script src="distjpicker/jquery.date-dropdowns.min.js"></script>

		 <script>
			$(function() {

				$("#example2").dateDropdowns({
					submitFieldName: 'example2',
					submitFormat: "dd/mm/yyyy"
				});
				$("#example3").dateDropdowns({
					submitFieldName: 'example3',
					submitFormat: "dd/mm/yyyy"
				});

				
			});
		</script>


		<script src="js/js/yammz.js" type="text/javascript"></script>
		<script src="js/js/home-models.js" type="text/javascript"></script>
		<script src="js/js/home.js" type="text/javascript"></script>
		<script src="js/js/starter.js" type="text/javascript"></script>
		<script src="Rating/js/star-rating.js" type="text/javascript"></script>

		<script type="text/javascript" src="js/function.js"></script>
        <script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>


	</body>

</html>