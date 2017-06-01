<?php 
  include("header.php");
  require_once "classes/connector.php";
	$conn2 = new connector();
	$admin_id=$_GET['key']; 	
?>

<section id="container" >

    <?php 
      include("heading.php");
     

    ?>
	
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


		 .btn-file {
	      position: relative;
	      overflow: hidden;
	      max-width: 110%;
	      height:25px;
	      padding-left:2px;
	      background-color:#F2F2F2;
	      padding-top:4px;
	      font-size:12px;
	      color:#4F4F4F;
	      font-weight: bold;
	    }
	    .btn-file input[type=file] {
	      position: absolute;
	      top: 0;
	      right: 0;
	      max-width: 50px;
	      max-height: 25px;
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
      	$username="";
      	$branch="";
      	$status="";


		$info=$conn2->getAdminOfId($admin_id);



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
	      	$username=$value['username'];
	      	$branch=$value['branch'];
	      	$status=$value['status'];
		}

		$gender_male="";
		$gender_female="";

		if (strcmp($gender, "male")==0) {
			$gender_male="checked";
			$gender_female="";
		}else if (strcmp($gender, "female")==0) {
			$gender_male="";
			$gender_female="checked";
		}

		$superv=$conn2->getSupervisorOfOperator($conn2->gstringId($admin_id));
		$mysupervisor="";
		foreach ($superv as $key => $value) {
			$mysupervisor=$value['supervisor_id'];
		}

		$mysup=$conn2->getAdminOfId($conn2->gstring($mysupervisor));
		foreach ($mysup as $key => $value2) {
			$mysupervisor=$value2['full_name'];
		}
		if (strcmp($mysupervisor, "")==0) {
			$mysupervisor="No team";
		}
		
	 ?>
    <!--main content start-->
    <section id="main-content" style="">
		<section class="wrapper">  
			<div class="row mt">			
				
				<input type="hidden" name="depInitial" id="depInitial" value="" name="">
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12 ">
						<div class="panel panel-default" style="border-radius:0px;border-color:#fff;height:460px;">
							<div class=" panel-body">
								<div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 ">
									
									<div style="height:5px;"></div>
	                                <p class="yammz_red" style=""><?php echo $full_name; ?> info</p>
									<p class="centered" >								    
									      <img id="logo2" name="logo2" src="<?php echo $avatar; ?>" class="img-circle" width="200" height="200">										  
									 
									  </p>
									<div class="centered" style="font-weight:bold;margin-top:0px;color:#39383D;"></div>
									<!-- <div class="centered" style="">Nomis Wison</div>
									<div class="centered" style="" id="profPosition">Manager</div> -->
									<!--<div class="centered" style="">11/u23641/ps</div>-->

	                                <div class="row">
	                                    <div class="col-md-12 hidden-xs hidden-sm">
	                                        <hr style="width:580px;height:3px;margin-top:13px;margin-bottom:0px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-31px;"></hr>
								   
	                                    </div>
	                                </div>

	                                <div class="form-group" style="margin-bottom:70px;">
										<label style="font-weight:lighter;margin-top:7px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Select a photo for the Yamm</label>

										<div class="col-md-7 col-sm-6 col-xs-12">
											<!-- <input name="fname" type="password" id="Password1" class="form-control col-md-12 col-sm-12 col-xs-12" value="" style="min-width:120%;height:26px;background-color:#F2F2F2;" required> -->
											<span class="btn btn-small btn-file">
					                            &nbsp;&nbsp;&nbsp;Upload photo<input type="file" name="image" id="inputfile" onchange="readURLLogo9(this)" disabled>
				                          	</span>
										</div>
									</div>

	                                <div class="form-group" style="margin-bottom:70px;">
										<label style="font-weight:lighter;margin-top:7px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Select a team for the Yamm</label>
											
										<div class="col-md-7 col-sm-6 col-xs-12">
	                                        <select name="team" class="form-control col-md-12 col-sm-12 col-xs-12" style="min-width:120%;height:26px;background-color:#F2F2F2;padding-top:4px;color:#000;font-size:12px;" disabled>
	                                            <option><?php echo $mysupervisor; ?></option>
	                                        </select>
										</div>
									</div>
									    

									
								</div>
								<div class="col-lg-1 col-xl-1 col-md-1 hidden-sm hidden-xs " style="margin-left:0px;margin-right:0px;">
									<hr style="width:3px;height:443px;margin-top:0px;margin-bottom:0px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:0px;"></hr>
								</div>
								<div class="col-lg-5 col-xl-5 col-md-5 col-sm-12 col-xs-12 " style="margin-left:-6%;">
									
									<div  style="height:25px;"></div>
									<div id="user"> 
							
									</div>
									
									<!--<p class="yammz_red" style="">Change Password</p>-->
									<div class="yammz_red" id="password_chnge_response"></div>
									
									 	<div class="form-group">
											<label style="font-weight:lighter;margin-top:0px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Username</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="Username" type="text" id="Username" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $username; ?>" style="min-width:120%;height:26px;background-color:#F2F2F2;" disabled>
											</div>
										</div>
										<div class="form-group" style="margin-top: 40px;">
											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">New Password</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="new_password" type="password" id="new_password" class="form-control col-md-7 col-sm-12 col-xs-12" value="password" style="min-width:120%;height:26px;background-color:#F2F2F2;" disabled>
											</div>
										</div>
										<div class="form-group" style="margin-bottom:130px;margin-top: 80px;">
											<label style="font-weight:lighter;margin-top:0px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Confirm Password</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="confirm_password" type="password" id="confirm" class="form-control col-md-7 col-sm-12 col-xs-12" value="password" style="min-width:120%;height:26px;background-color:#F2F2F2;" disabled>
											</div>
										</div>
										
									 <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12 ">
									
										<hr style="margin-top:0px;height:4px;margin-left:-10.3%;width:149%;background-color:#F2F2F2;border-color:#F2F2F2;"></hr>
									  </div>
	                                    
	                                    <div class="form-group">
											<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Department</label>
											
											<div class="col-md-7 col-sm-12 col-xs-12">
	                                             <select name="department" class="form-control col-md-12 col-sm-12 col-xs-12" style="min-width:120%;height:26px;padding-top:4px;background-color:#F2F2F2;color:#000;font-size:12px;" disabled onchange="getDepartmentInitial(this.value);">
	                                                <option value=""><?php echo $department; ?></option>
	                                                
	                                            </select>
												
											</div>
										</div>

	                                    <div class="form-group">
											<label style="font-weight:lighter;margin-top:20px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Current position at the company</label>
											
											<div class="col-md-7 col-sm-12 col-xs-12">
	                                            <select name="position" id="position" class="form-control col-md-12 col-sm-12 col-xs-12" style="min-width:120%;height:26px;padding-top:4px;background-color:#F2F2F2;color:#000;font-size:12px;" disabled onchange="UpdatepositionLevel(this.value);">
	                                            	<option value=""><?php echo $user_type; ?></option>
	                                                
	                                            </select>
											</div>
										</div>
									  
	                                    <div class="form-group">
											<label style="font-weight:lighter;margin-top:20px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Branch location</label>
											
											<div class="col-md-7 col-sm-12 col-xs-12">
	                                            <select name="branch_location" class="form-control col-md-12 col-sm-12 col-xs-12" style="min-width:120%;height:26px;padding-top:4px;background-color:#F2F2F2;color:#000;font-size:12px;" disabled>
	                                            	<option value=""><?php echo $branch; ?></option>
	                                                
	                                            </select>
											</div>
										</div>

	                                    <div class="form-group">
											<label style="font-weight:lighter;margin-top:20px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Security Level</label>
											
											<div class="col-md-7 col-sm-12 col-xs-12">
												<input name="securitylevel" type="text" id="securitylevel" class="form-control" value="<?php echo $securitylevel; ?>" style="min-width:120%;height:26px;background-color:#F2F2F2;" disabled>
											</div>
										</div>
									  
									
								</div>
							</div>
						</div>					
						
					</div>
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12 " style="">
						<div class="panel panel-default" style="border-radius:0px;border-color:#fff;margin-top:-15px;">
							<div class=" panel-body">
								<div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 ">
									<p class="yammz_red" style=""><?php echo $full_name; ?> residential Info</p>
									
										<div class="form-group">
											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">First Name</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="fname" type="text" class="form-control" value="<?php echo $first_name; ?>" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" disabled>
											</div>
										</div>

	                                    <div class="form-group" style="margin-top:50px;margin-bottom:90px;">
											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Last Name</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="lname" type="text" class="form-control" value="<?php echo $last_name; ?>" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" disabled>
											</div>
										</div>

	                                     <div class="form-group" style="margin-top:50px;margin-bottom:90px;">
											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Permanent Address</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="permanent_address" type="text" class="form-control" value="<?php echo $permanent_adress; ?>" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" disabled>
											</div>
										</div>

	                                     <div class="form-group"  style="margin-top:130px;margin-bottom:90px;">

											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12"></label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="permanent_address2" type="text" class="form-control" value="" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" disabled>
											</div>
										</div>
	                                    
	                                     <div class="form-group"  style="margin-top:170px;margin-bottom:90px;">

											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Country</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												
												<select name="country" class="form-control" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%;padding-top: 2px;"  disabled>
													<option value=""><?php echo $country; ?></option>
													
												</select>
											</div>
										</div>

	                                    <div class="form-group"  style="margin-top:210px;margin-bottom:90px;">

											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">City</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12" id="citysection">
												<select name="city" id="city" class="form-control" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%;padding-top: 2px;" disabled>
													<option id="cityOptions" value=""><?php echo $city; ?></option>
												</select>
											</div>
										</div>

										
								</div>
								<div class="col-lg-1 col-xl-1 col-md-1 hidden-sm hidden-xs " style="margin-left:0px;margin-right:0px;">
									<hr style="width:3px;height:280px;margin-top:0px;margin-bottom:0px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:0px;"></hr>
								</div>
								<div class="col-lg-5 col-xl-5 col-md-5 col-sm-12 col-xs-12 " style="margin-left:-6%;">
									
									<div style="height:25px;"></div>
									<p class="yammz_red" style=""></p>
									
									 
										<div class="form-group">
											<label style="font-weight:lighter;margin-top:7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Phone No</label>
											
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input name="phone" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $phone; ?>" style="min-width:144%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-38%" disabled>
											</div>
										</div>
										<div class="form-group" style="margin-top: 50px;">
											<label style="font-weight:lighter;margin-top:7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Private Email</label>
											
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input name="privateemail" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $private_email; ?>" style="min-width:144%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-38%" disabled>
											</div>
										</div>
										<div class="form-group" style="margin-top: 90px;margin-bottom: 135px;">
											<label style="font-weight:lighter;margin-top:7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Work Email</label>
											
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input name="workemail" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="<?php echo $work_email; ?>" style="min-width:144%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-38%" disabled>
											</div>
										</div>
										
										<div class="form-group">
											
											<div class="col-md-2 col-sm-2 col-xs-2">
												<select name="day" style="width:65px;margin-top: 10px;" disabled>
													<option value=""><?php echo Date("d",$dob); ?></option>
	                                                
													
												</select>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2" style="margin-left:5px;">
												<select name="month" style="width:65px;margin-top: 10px;" disabled>
	                                                <option><?php echo Date("m",$dob); ?></option>
													
												</select>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2" style="margin-left:15px;">
												<select  name="year" style="width:65px;margin-top: 10px;" disabled>
													<!-- <option value="">Year</option> -->
													<option><?php echo Date("Y",$dob); ?><option>
													
												</select>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2">
												<span class="radio" style="size:60px; margin-left: 10px;">
												  <label class="radiolabel"><input type="radio"  name="gender" value="male" style="color:red" disabled <?php echo $gender_male; ?>>Male</label>
												</span>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2">
												<span class="radio" style="size:50px; margin-left: 10px;">
												  <label class="radiolabel"><input type="radio"  name="gender" value="male" style="color:red" disabled <?php echo $gender_female; ?>>Female</label>
												</span>
											</div>

	                                        <div class="col-md-12 col-sm-12 col-xs-12">
	                                        	<span id="load_status"></span>
	                                        	<span id="admin_activation_manager">
	                                        		<?php

	                                        			if (strcmp($status, "enabled")==0) {
	                                        		 ?>
													<table class="" style="margin: 50px 0px -30px;">
		                                                <tr>
		                                                    <td style="width:100px;"><button type="" style="background-color:#E3E3E1;border-radius:6px;border:0px;width:80%;color:#fff;height:23px;margin-right: 20px;padding-top: 0px;font-size: 12px;" disabled>Activate</button>
		                                                    </td>
		                                                    <td style="width:100px;"><button type="" style="background-color:#2B2B2B;border-radius:6px;border:0px;width:80%;color:#fff;height:23px;margin-right: 20px;padding-top: 0px;font-size: 12px;" onclick="AccountManager_user_Deactivation(<?php echo $admin_id;?>);">Deactivate</button>
		                                                    </td>
		                                                    <td><p style="margin: -5px 0px -18px;">Cancel</p></td>
		                                                </tr>
													</table>
													<?php }else{ ?>
														<table class="" style="margin: 50px 0px -30px;">
		                                                <tr>
		                                                    <td style="width:100px;"><button type="" style="background-color:#2B2B2B;border-radius:6px;border:0px;width:80%;color:#fff;height:23px;margin-right: 20px;padding-top: 0px;font-size: 12px;" onclick="AccountManager_user_Activation(<?php echo $admin_id;?>);" >Activate</button>
		                                                    </td>
		                                                    <td style="width:100px;"><button type="" style="background-color:#E3E3E1;border-radius:6px;border:0px;width:80%;color:#fff;height:23px;margin-right: 20px;padding-top: 0px;font-size: 12px;" disabled>Deactivate</button>
		                                                    </td>
		                                                    <td><p style="margin: -5px 0px -18px;">Cancel</p></td>
		                                                </tr>
													</table>
													<?php }?>
												</span>
											</div>
										</div>
										
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