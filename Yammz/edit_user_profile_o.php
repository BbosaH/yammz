<?php
require_once('Controllers/auth/auth.php');
require_once('classes/gstring_funcs.php');
include("classes/connector.php");
// include("classes/util.php");
$conn = new connector();
$countries=$conn->getAll("SELECT * FROM country");
$cities= $conn->getAll("SELECT * FROM city"); //to be filtered
?>
<html lang="en">
<!-- 
<head>
<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		 <link rel="icon" href="images/icons/yammz_logo.png">
		<title>Yammz it</title>
		<link rel = "stylesheet" href = "bootstrap-3.2.0-dist/css/bootstrap.min.css">

		<!--<link rel="stylesheet" href="bootstrap.vertical-tabs.css">-->
		<!-- <link rel="stylesheet" href="css.css"> -->
		<!--<link href="dist/css/bootstrap.min.css" rel="stylesheet">-->
		<!-- <link href="carousel.css" rel="stylesheet">
		<link href="offcanvas.css" rel="stylesheet">
		<link href="styles.css" rel="stylesheet">
		<link rel="stylesheet" href="Rating/css/star-rating.css" media="all" type="text/css"/>
		<link rel="stylesheet" href="Rating/css/theme-krajee-fa.css" media="all" type="text/css"/>
		<link rel="stylesheet" href="Rating/css/theme-krajee-svg.css" media="all" type="text/css"/>
		<link rel="stylesheet" href="Rating/css/theme-krajee-uni.css" media="all" type="text/css"/>

        <link rel="stylesheet" href="distjpicker/styles.css" /> -->


</head> -->

<?php require_once('imports.php'); ?>







<body style="background-color:#E9EAEE" ng-app="home" >

		<?php require_once('Controllers/Logged_header2.php'); ?>
		<br/>
<?php if(isset($_GET['id'])){

	$edit_profile_id=gStringId($_GET['id']);

	echo $edit_profile_id;

	$edit_profile_users =$conn->getAll("SELECT *FROM user WHERE id='".$edit_profile_id."'");
	$edit_profile_user =$edit_profile_users[0];

	}


?>


<div class="container" >
		<input type="hidden" ng-model="idVal"  ng-init="idVal='<?php echo $edit_profile_id; ?>'" />
			<input type="hidden" ng-model="who" ng-init="who='me'" />
			<div class="panel panel-default" style="margin-left:15px;margin-right:14px;" >

				<form enctype="multipart/form-data"   method="post" action ="classes/util.php"  style="padding-left:30px;margin-top:20px; padding-right:100px;" name="edit_profile_form" novalidate >

				<!--hidden fields old data-->
				<input type="hidden" name="hidden_picture"   value="<?php echo $edit_profile_user['avatar']; ?>"/>
				<input class="form-control" type="hidden" name="hidden_id"   value="<?php echo $edit_profile_id; ?>"/>
				<input type="hidden" name="hidden_password"  value="<?php echo $edit_profile_user['password'];?>" />



				<!--hidden fields old data-->
					{{fullUser}}
					<label style="font-size:18px;" class="redbright">Edit Profile</label>
					<table>
						<tr>
							<td><input type="text" class="form-control" style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="e_first_name" name="e_first_name" ng-minlength=4 ng-maxlength=5 ng-model="fullUser.user.first_name"/>

							 </td>

							<td><input type="text" class="form-control" style="width:263px;margin-left:10px;background-color:#EBEAEF;border:0px;border-radius:4px;" id="e_last_name" name="e_last_name"  minlength=4 maxlength=50 ng-model="fullUser.user.last_name"   />

							 </td>
						</tr>
					</table>
					<table style="margin-top:25px;" >
						<tr >
						<td>





										 <select class="form-control" id="country" name="country" style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px; color:#999999" onchange="makecities()">
										 			
														<?php
            											fill_country_drop_down($countries);
            								//$cities= return_citie($conn);
            											?>



										  </select>

							</td>
							<td>


										 <select id="city" name="city" class="form-control"  style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px; margin-left:10px; color:#999999">
												<?php
            									fill_city_drop_down($cities);
            									?>

										  </select>

							</td>

						</tr>
					</table>
					<table style="margin-top:25px;">
						<tr>
							<td><input type="text" class="form-control" style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="e_email" name="e_email" value="<?php echo $edit_profile_user['email']; ?>" minlength=4 maxlength=50 > </td>
							<td><input type="text" class="form-control"style="width:263px;margin-left:10px;background-color:#EBEAEF;border:0px;border-radius:4px;" id="e_alternative_email" name="e_alternative_email" value="<?php echo $edit_profile_user['alternative_email']; ?>" minlength=4  > </td>
						</tr>
					</table>

					<table style="margin-top:25px;">
						<tr>

							<td><input type="text" class="form-control" style="width:263px;background-color:#EBEAEF;border:0px;border-radius:4px;" id="e_phone_number" name="e_phone_number" value="<?php echo $edit_profile_user['phone_number']; ?>" minlength=4 maxlength=50 > </td>
						</tr>
					</table>


					<table style="margin-top:25px;">

						<tr>
							<td >

											<div class="example" style="margin-top:25px;">

														<input class="form-control" style="border-radius:6;width:300px;background-color:#EBEAEF; color:#999999;"   type="hidden" id="example3">



											</div>

							</td>

							<td>
								<input type="hidden" ng-model="hidden_sex" ng-init="hidden_sex='<?php echo $edit_profile_user['sex'];?>'" />
								
								<span style="margin-left:70px;">
								  <input type="radio" ng-checked="hidden_sex=='male'" id="male_radio" name="e_gender" value="male">
								  <span for="free_event">Male </span>&nbsp;&nbsp;
								</span>
								<span>
								  <input type="radio" ng-checked="hidden_sex=='female'" id="female_radio" name="e_gender" value="female">
								  <span for="free_event">Female </span>&nbsp;&nbsp;
								</span>
							</td>
							
						</tr>
					</table>
					<hr style="height:5px;background-color:#EBEAEF;"></hr>



					<div class="row">

						<div class="col-md-6">
							<span>
								<table>
									<tr>
										<td><input ng-model="somefield" type="password" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="e_current_password" name="e_current_password" placeholder="Current password" minlength=2  > </td>
									</tr>
								</table>
								<table style="margin-top:25px;">
									<tr>
										<td><input ng-model='user.password_verify' type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;text-color:black;border:0px;" id="e_new_password" name="e_new_password" placeholder="New Password" minlength=4 ng-disabled="!somefield.length" > </td>
									</tr>
								</table>
								<table style="margin-top:25px;">
									<tr>
										<td><input ng-model='user.password_verify' type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;text-color:black;border:0px;" id="e_confirm_password" name="e_confirm_password" placeholder="Confirm password" minlength=4 maxlength=15 ng-disabled="!somefield.length" > </td>
									</tr>
								</table>
								<hr style="height:5px;width:105%;background-color:#EBEAEF;margin-left:0px;"></hr>
								<table>
									<label>Facebook Link</label>
									<tr>
										<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="e_facebook_link" name="e_facebook_link" value="<?php echo $edit_profile_user['facebook_link']; ?>" minlength=4  > </td>
									</tr>
								</table>
								<table>
									<label style="margin-top:20px;">Twitter Link</label>
									<tr>
										<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="e_twitter_link" name="e_twitter_link" value="<?php echo $edit_profile_user['twitter_link']; ?>" minlength=4  > </td>
									</tr>
								</table>
								<table>
									<label style="margin-top:20px;">Instagram Link</label>
									<tr>
										<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="e_instagram_link" name="e_instagram_link" value="<?php echo $edit_profile_user['instagram_link']; ?>" minlength=4  > </td>
									</tr>
								</table>
								<table>
									<label style="margin-top:20px;">Youtube Link</label>
									<tr>
										<td><input type="text" class="form-control"style="width:263px;border-radius:4px;background-color:#EBEAEF;border:0px;" id="e_youtube_link" name="e_youtube_link" value="<?php echo $edit_profile_user['youtube_link']; ?>" minlength=4  > </td>
									</tr>
								</table>
							</span>
						</div>
						<div class="col-md-1">
							<span><hr style="height:90%;width:6px;background-color:#EBEAEF;margin-top:0px;"></hr></span>
						</div>
						<div class="col-md-5">

								<p style="margin-top:5px;margin-left:-10%;font-size:16px;" class="redbright">Edit Profile Photo</p>
								<p><img style="margin-left:80px; margin-top:30px;" src="<?php  echo BaseImageURL.$edit_profile_user['avatar'];  ?>" class="img-circle" width="300px" height="300px" id="profile_photo"></p>
								<div class="fileUpload btn btn-danger" style="border-radius: 5px;  background-color:#BD2532; margin-left:173px;">
						    		<span>Upload photo</span>
						    		<input  type="file"  name="image" id="inputfile" class="upload" onchange="readURL(this)"   />
								</div>

						</div>
					</div>

					<table>
						<tr>
							<td>
								<button  type="submit" name="edit_profile_form" class="btn btn-default" style="height:50px;font-size: 25px; width:190px; background-color:#BD2532; font-weight:bold;border:0px;border-radius:10px;margin-left:400px;color:white;margin-top:80px;margin-bottom:30px;" >Save</button>
							</td>
							<td>
								<div style="height:80px;"></div>
								<a style="text-decoration:none; color:#999999; margin-top: -20px;" href="user_profile.php?id=<?php echo $edit_profile_id ?>" ><B>&nbsp;&nbsp;&nbsp;&nbsp;Cancel</B></a>
							</td>
						</tr>
					</table>
				</form>
			</div>

		</div>

		<?php 
		//require_once("footer.php");
		?>
		<script src="js/jquery-1.10.2.min.js"></script>

		<script src="distjpicker/jquery.date-dropdowns.min.js"></script>
		<script>
			$(function() {

				$("#example3").dateDropdowns({
					submitFieldName: 'example3',
					submitFormat: "dd/mm/yyyy"
				});


			});
		</script>
		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
		<script src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
		
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
