<?php 
  include("header.php");
  require_once "classes/connector.php";
	$conn2 = new connector();
	$user=$_SESSION['admin_id']; 
	$use = $conn2->getResById("SELECT * FROM admin ",$user);
?>

<section id="container" >

    <?php 
      include("heading.php");
     

    ?>
	<!-- <script>
		
		$(document).ready(function() {

			$.post( "change_pssword.php", { pic: ""}, function( data ) {
			  $("#password_chnge_response").html( data );
			});
			
		});
			
	</script> -->
	<script>
			function Change_user_password(str) {
			
				var old_password = $('#old_password').val();
				var new_password = $('#new_password').val();
				var confirm = $('#confirm').val();
				var real_current_password = $('#real_current_password').val();
				
				if (str=="") {
					document.getElementById("password_chnge_response").innerHTML="";
					return;
					exit;
					
				} 
				else if (confirm=="") {
					document.getElementById("password_chnge_response").innerHTML="Please confirm password:";
					return;
					exit;
					
				} 
				else if (new_password=="") {
					document.getElementById("password_chnge_response").innerHTML="Please put new password";
					return;
					exit;
				
				} 
				else if (old_password=="") {
					document.getElementById("password_chnge_response").innerHTML="Please put old password";
					return;
					exit;
					
				} 
				else if(real_current_password !==old_password){
					document.getElementById("password_chnge_response").innerHTML="Old paassword entered is wrong";
					return;
					exit;
				}
				else if(confirm !== new_password){
					document.getElementById("password_chnge_response").innerHTML="Please confirm the password";	
					return;	
					exit;					
				}
				else{			
				  
				  
				  if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				  } else { // code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				  xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					  document.getElementById("password_chnge_response").innerHTML=xmlhttp.responseText;
					}
				  }
				  xmlhttp.open("GET","change_pssword.php?id="+str+"&&new_password="+new_password,true);
				  xmlhttp.send();
			  }
			}
		</script>
	 <style>
		.search-box-title [type="radio"]:not(:checked)+label:before, [type="radio"]:not(:checked)+label:after {
		    border: 2px solid #ff6d00;
		}

		.search-box-title [type="radio"]:checked+label:after, [type="radio"].with-gap:checked+label:after {
		    background-color: #ff6d00;
		    z-index: 0;
		}

		.search-box-title [type="radio"]:checked+label:after, [type="radio"].with-gap:checked+label:before, [type="radio"].with-gap:checked+label:after {
		    border: 2px solid #ff6d00;
		}
	 </style>
	
    <?php 
      include("sidemenu.php");
    ?>

    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <?php 

      	$avatar="";
      	$first_name="";
      	$last_name="";
      	$full_name="";
      	$company_id="";
      	$work_email="";
      	$permanent_adress="";
      	$private_email="";
      	$gender="";
      	$dob="";
      	$user_type="";
      	$phone="";
      	$city="";
      	$country="";

      	$department="";
      	$securitylevel="";


		$info=$conn2->getCurrentUserInfo();



		foreach ($info as $key => $value) {

			if(strcmp($value['avatar'], "")==0){
				$avatar=$photoBase."uploads/defflag.png";
			}else{
				$avatar=$photoBase.$value['avatar'];
			}
			
	      	$first_name=$value['first_name'];
	      	$last_name=$value['last_name'];
	      	$full_name=$value['full_name'];
	      	$company_id=$value['company_id'];
	      	$work_email=$value['work_email'];
	      	$permanent_adress=$value['permanent_adress'];
	      	$private_email=$value['private_email'];
	      	$gender=$value['gender'];
	      	$dob=$value['dob'];
	      	$user_type=$value['user_type'];
	      	$phone=$value['phone_number'];
	      	$city=$value['city'];
	      	$country=$value['country'];

	      	$department=$value['department'];
	      	$securitylevel=$value['securitylevel'];
		}
	 ?>

    <!--main content start-->
    <section id="main-content" style="margin-top:0px;">
		<section class="wrapper">  
			<div class="row mt">			
				
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12 ">
					<div class="panel panel-default" style="border-radius:0px;border-color:#fff;height:auto;">
						<div class=" panel-body">
							<div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 ">
								
								<div style="height:25px;"></div>
								<p class="centered" >
								    
								      <img src="<?php
										if(empty($avatar)){
											echo "uploads/defavatar.png";
										} else{
											echo $avatar; 
										} ?>" class="img-circle" width="150" height="150">
											  
								  
								  </p>
								<div class="centered" style="font-weight:bold;margin-top:0px;color:#39383D;"></div>
								<div class="centered" style=""><?php echo $full_name;?></div>
								<div class="centered" style=""><?php echo $user_type; ?></div>
								<div class="centered" style=""><?php echo $company_id; ?></div>

								
							</div>
							<div class="col-lg-1 col-xl-1 col-md-1 hidden-sm hidden-xs " style="margin-left:0px;margin-right:0px;">
								<hr style="width:3px;height:380px;margin-top:0px;margin-bottom:0px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:0px;"></hr>
							</div>
							<div class="col-lg-5 col-xl-5 col-md-5 col-sm-12 col-xs-12 " style="margin-left:-6%;">
								
								<div  style="height:25px;"></div>
								<div id="user"> 
						
								</div>
								<?php 
									// $tt= $conn2->getCoutryOfcityId($conn2->gstring(19));
									// var_dump($tt);
								?>
								
								<p class="yammz_red" style="">Change Password</p>
								<div class="yammz_red" id="password_chnge_response"></div>
								 <form action="" method="post" role="form" class="form-horizontal form-label-left">
								 
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Old Password</label>
										<input name="old_psd"type="hidden" id="real_current_password" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $use['password']; ?>" style="min-width:120%;height:26px;background-color:#F2F2F2;" required>
										<div class="col-md-7 col-sm-6 col-xs-12">
											<input name="old_psd"type="password" id="old_password" class="form-control col-md-7 col-sm-12 col-xs-12" value="" style="min-width:120%;height:26px;background-color:#F2F2F2;" required>
										</div>
									</div>
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">New Password</label>
										
										<div class="col-md-7 col-sm-6 col-xs-12">
											<input name="fname"type="password" id="new_password" class="form-control col-md-7 col-sm-12 col-xs-12" value="" style="min-width:120%;height:26px;background-color:#F2F2F2;" required>
										</div>
									</div>
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Confirm Password</label>
										
										<div class="col-md-7 col-sm-6 col-xs-12">
											<input name="fname" type="password" id="confirm" class="form-control col-md-7 col-sm-12 col-xs-12" value="" style="min-width:120%;height:26px;background-color:#F2F2F2;" required>
										</div>
									</div>
									<div>
										<a class="btn pull-right" type="" style="height:26px;font-size:12px;padding-top:4px; margin-right:-46px;margin-bottom:20px;background-color:#A8A8A8;color:white;" onclick="Change_user_password(<?php echo $user; ?>)" >Save</a>
									</div>
								 
								 </form> 
								 <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12 ">
								
									<hr style="margin-top:0px;height:4px;margin-left:-10.3%;width:149%;background-color:#F2F2F2;border-color:#F2F2F2;"></hr>
								  </div>
								  <div class="" style="padding-top:10%;">Current Position at the Company</div>
								  <div class="" style="font-weight:bold;color:#39383D;">
								  
								  	<input type="" style="height:26px;background-color:#F2F2F2;border:1px;padding-left: 15px;font-weight: lighter;
								  	......................................................................................................................................................................................................................................................................................9" value="<?php echo $user_type; ?>" disabled>
								  </div>
								  <div class="" style="padding-top:3%;">Department</div>
								  <div class="" style="font-weight:bold;color:#39383D;">
								 
								  	<input type="" style="height:26px;background-color:#F2F2F2;border:1px;padding-left: 15px;font-weight: lighter;" value="<?php echo $department; ?>" disabled>
								  </div>
								  <div class="" style="padding-top:3%;">Security Level</div>
								  <div class="" style="font-weight:bold;color:#39383D;">
								  
								  	<input type="" style="height:26px;background-color:#F2F2F2;border:1px;padding-left: 15px;font-weight: lighter;" value="<?php echo $securitylevel; ?>" disabled>
								  </div>
								
							</div>
						</div>
					</div>					
					
				</div>
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12 " style="margin-top:-1.2%">
					<div class="panel panel-default" style="border-radius:0px;border-color:#fff;">
						<div class=" panel-body">
							<div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 ">
								<p class="yammz_red" style="">Change Info</p>
								
								 <form action="" method="post" role="form" class="form-horizontal form-label-left">
								 
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">First Name</label>
										
										<div class="col-md-7 col-sm-6 col-xs-12">
											<input name="fname" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $first_name; ?>" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" disabled>
										</div>
									</div>
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Last Name</label>
										
										<div class="col-md-7 col-sm-6 col-xs-12">
											<input name="fname" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $last_name; ?>" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" disabled>
										</div>
									</div>
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Permanent Address</label>
										
										<div class="col-md-7 col-sm-6 col-xs-12">
											<input name="fname" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $permanent_adress; ?>" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" disabled>
										</div>
										
									</div>
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
										
										<div class="col-md-7 col-sm-6 col-xs-12">
											<input name="fname" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="nomis" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" disabled>
										</div>
										
									</div>
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Country</label>
										
										<div class="col-md-7 col-sm-6 col-xs-12">
											<input name="fname" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $country; ?>" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" disabled>
										</div>
									</div>
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">City</label>
										
										<div class="col-md-7 col-sm-6 col-xs-12">
											<input name="fname" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $city; ?>" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" disabled>
										</div>
									</div>
									
								 
								 </form> 
							</div>
							<div class="col-lg-1 col-xl-1 col-md-1 hidden-sm hidden-xs " style="margin-left:0px;margin-right:0px;">
								<hr style="width:3px;height:280px;margin-top:0px;margin-bottom:0px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:0px;"></hr>
							</div>
							<div class="col-lg-5 col-xl-5 col-md-5 col-sm-12 col-xs-12 " style="margin-left:-6%;">
								
								<div style="height:25px;"></div>
								<p class="yammz_red" style=""></p>
								
								 <form action="" method="post" role="form" class="form-horizontal form-label-left">
								 
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Phone No</label>
										
										<div class="col-md-7 col-sm-6 col-xs-12">
											<input name="fname" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $phone; ?>" style="min-width:120%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-31%" disabled>
										</div>
									</div>
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Private Email</label>
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input name="fname" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $private_email; ?>" style="min-width:144%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-38%" disabled>
										</div>
									</div>
									<div class="form-group">
										<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Work Email</label>
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input name="fname"type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $work_email; ?>" style="min-width:144%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-38%" disabled>
										</div>
									</div>
									
									<div class="form-group">
										
										<div class="col-md-2 col-sm-2 col-xs-2">
											<select disabled style="height: 26px;width:65px;">
												<!-- <option value="">Date</option> -->
												<option><?php echo Date("d",$dob); ?></option>
												
											</select>
										</div>
										<div class="col-md-2 col-sm-2 col-xs-2" style="margin-left:5px;">
											<select disabled style="height: 26px;width:65px;">
												<!-- <option value="">Month</option> -->
												<option><?php echo Date("m",$dob); ?></option>
												
											</select>
										</div>
										<div class="col-md-2 col-sm-2 col-xs-2" style="margin-left:15px;">
											<select disabled style="height: 26px;width:65px;">
												<!-- <option value="">Year</option> -->
												<option><?php echo Date("Y",$dob); ?></option>
												
											</select>
										</div>
										<div class="col-md-2 col-sm-2 col-xs-2">
											<span class="radio" style="size:50px; margin-left: 10px;">
											  <label class="radiolabel"><input type="radio"  name="gender" value="male" style="color:red" disabled>Male</label>
											</span>
										</div>
										<div class="col-md-2 col-sm-2 col-xs-2">
											<span class="radio" style="size:50px; margin-left: 10px;">
											  <label class="radiolabel"><input type="radio"  name="gender" value="male" style="color:red" disabled>Female</label>
											</span>
										</div>
									</div>
									
								 
								 </form> 
								 
								
							</div>
						</div>
					</div>	
					<div style="height:20px;"></div>
					
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