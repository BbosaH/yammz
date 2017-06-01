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
     	$info=$conn2->getCurrentUserInfo();

		foreach ($info as $key => $value) {

	      	$country=$value['country'];
		}

		$department=$conn2->getDepartments();
		
		$Positions=$conn2->getAdminPositions();

		$branches=$conn2->getBranches();

		$countries=$conn2->getAllCountries();

      ?>
      
    <!--main content start-->
    <section id="main-content">
		<section class="wrapper">  
			<div class="row mt">			
				<form id="uploadForm" action="" method="post">
				<input type="hidden" name="depInitial" id="depInitial" value="" name="">
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12 ">
						<div class="panel panel-default" style="border-radius:0px;border-color:#fff;height:460px;">
							<div class=" panel-body">
								<div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-xs-12 ">
									
									<div style="height:5px;"></div>
	                                <p class="yammz_red" style="">New User</p>
									<p class="centered" >								    
									      <img id="logo2" name="logo2" src="../../../admin/Theme/uploads/defavatar.png" class="img-circle" width="200" height="200">										  
									 <?php //var_dump($Positions); ?>
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
					                            &nbsp;&nbsp;&nbsp;Upload photo<input type="file" name="image" id="inputfile" onchange="readURLLogo9(this)">
				                          	</span>
										</div>
									</div>

	                                <div class="form-group" style="margin-bottom:70px;">
										<label style="font-weight:lighter;margin-top:7px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Select a team for the Yamm</label>
											
										<div class="col-md-7 col-sm-6 col-xs-12">
	                                        <select name="team" id="team" class="form-control col-md-12 col-sm-12 col-xs-12" style="min-width:120%;height:26px;background-color:#F2F2F2;padding-top:4px;color:#000;font-size:12px;">
	                                            <option value="">----Select team-----</option>
	                                        </select >
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
												<input name="Username" type="text" id="Username" class="form-control col-md-7 col-sm-12 col-xs-12" value="" style="min-width:120%;height:26px;background-color:#F2F2F2;" required>
											</div>
										</div>
										<div class="form-group" style="margin-top: 40px;">
											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">New Password</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="new_password" type="password" id="new_password" class="form-control col-md-7 col-sm-12 col-xs-12" value="" style="min-width:120%;height:26px;background-color:#F2F2F2;" required>
											</div>
										</div>

										<div class="form-group" style="margin-top: 40px;">
											<label  class="control-label col-md-5 col-sm-12 col-xs-12"></label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<label style="font-weight:lighter;font-size:12px;color:#BE2633;" id="passwordMismatchError"></label>
											</div>
										</div>
										<!-- <div id="passwordMismatchError" style="margin-bottom: -70px;padding-left: 45%;margin-top: 75px;">
										</div> -->
										<div class="form-group" style="margin-bottom:130px;margin-top: 80px;">
											<label style="font-weight:lighter;margin-top:0px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Confirm Password</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="confirm_password" type="password" id="confirm" class="form-control col-md-7 col-sm-12 col-xs-12" value="" style="min-width:120%;height:26px;background-color:#F2F2F2;" required onmouseleave="WatchPassword();">
											</div>
										</div>
										
									 <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12 ">
									
										<hr style="margin-top:0px;height:4px;margin-left:-10.3%;width:149%;background-color:#F2F2F2;border-color:#F2F2F2;"></hr>
									  </div>
	                                    
	                                    <div class="form-group">
											<label style="font-weight:lighter;margin-top:-7px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Department</label>
											
											<div class="col-md-7 col-sm-12 col-xs-12">
	                                             <select name="department" id="department" class="form-control col-md-12 col-sm-12 col-xs-12" style="min-width:120%;height:26px;padding-top:4px;background-color:#F2F2F2;color:#000;font-size:12px;" required onchange="getDepartmentInitial(this.value);">
	                                                <option value="">----select department----</option>
	                                                <?php
	                                                	foreach ($department as $key => $value) {
	                                                		echo "<option value='".$value['id']."'>".$value['name']."</option>";
	                                                	}
	                                                 ?>
	                                            </select>
												
											</div>
										</div>

	                                    <div class="form-group">
											<label style="font-weight:lighter;margin-top:20px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Current position at the company</label>
											
											<div class="col-md-7 col-sm-12 col-xs-12">
	                                            <select name="position" id="position" class="form-control col-md-12 col-sm-12 col-xs-12" style="min-width:120%;height:26px;padding-top:4px;background-color:#F2F2F2;color:#000;font-size:12px;" required onchange="UpdatepositionLevel(this.value);">
	                                            	<option value="">----select position----</option>
	                                                <?php                                                
	                                                	foreach ($Positions as $key => $value) {
	                                                		echo "<option value='".$value['id']."'>".$value['name']."</option>";
	                                                	}
	                                                 ?>
	                                            </select>
											</div>
										</div>
									  
	                                    <div class="form-group">
											<label style="font-weight:lighter;margin-top:20px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Branch location</label>
											
											<div class="col-md-7 col-sm-12 col-xs-12">
	                                            <select name="branch_location" id="branch_id" class="form-control col-md-12 col-sm-12 col-xs-12" style="min-width:120%;height:26px;padding-top:4px;background-color:#F2F2F2;color:#000;font-size:12px;" required onchange="teampop();">
	                                            	<option value="">----select branch location----</option>
	                                                <?php                                                
	                                                	foreach ($branches as $key => $value) {
	                                                		echo "<option value='".$value['id']."'>".$value['name']."</option>";
	                                                	}
	                                                 ?>
	                                            </select>
											</div>
										</div>

	                                    <div class="form-group">
											<label style="font-weight:lighter;margin-top:20px;font-size:12px;" class="control-label col-md-12 col-sm-12 col-xs-12">Security Level</label>
											
											<div class="col-md-7 col-sm-12 col-xs-12">
												<input name="securitylevel" type="text" id="securitylevel" class="form-control" value="" style="min-width:120%;height:26px;background-color:#F2F2F2;" required>
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
									<p class="yammz_red" style="">Admin residential Info</p>
									
										<div class="form-group">
											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">First Name</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="fname" type="text" class="form-control" value="" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" required>
											</div>
										</div>

	                                    <div class="form-group" style="margin-top:50px;margin-bottom:90px;">
											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Last Name</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="lname" type="text" class="form-control" value="" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" required>
											</div>
										</div>

	                                     <div class="form-group" style="margin-top:50px;margin-bottom:90px;">
											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Permanent Address</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="permanent_address" type="text" class="form-control" value="" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" required>
											</div>
										</div>

	                                     <div class="form-group"  style="margin-top:130px;margin-bottom:90px;">

											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12"></label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												<input name="permanent_address2"type="text" class="form-control" value="" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%" >
											</div>
										</div>
	                                    
	                                     <div class="form-group"  style="margin-top:170px;margin-bottom:90px;">

											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Country</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12">
												
												<select name="country" class="form-control" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%;padding-top: 2px;" onchange="fillcountryCities(this.value);" required>
													<option value="">-------select country------</option>
													<?php                                                
	                                                	foreach ($countries as $key => $value) {
	                                                		echo "<option value='".$value['id']."'>".$value['name']."</option>";
	                                                	}
	                                                 ?>
												</select>
											</div>
										</div>

	                                    <div class="form-group"  style="margin-top:210px;margin-bottom:90px;">

											<label style="font-weight:lighter;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">City</label>
											
											<div class="col-md-7 col-sm-6 col-xs-12" id="citysection">
												<select name="city" id="city" class="form-control" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%;padding-top: 2px;" required>
													<option id="cityOptions" value="">-------select city------</option>
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
												<input name="phone" type="text" class="form-control col-md-7 col-sm-12 col-xs-12" value="" style="min-width:144%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-38%" required>
											</div>
										</div>
										<div class="form-group" style="margin-top: 50px;">
											<label style="font-weight:lighter;margin-top:7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Private Email</label>
											
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input name="privateemail" type="email" class="form-control col-md-7 col-sm-12 col-xs-12" value="" style="min-width:144%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-38%">
											</div>
										</div>
										<div class="form-group" style="margin-top: 90px;margin-bottom: 135px;">
											<label style="font-weight:lighter;margin-top:7px;font-size:12px;" class="control-label col-md-5 col-sm-12 col-xs-12">Work Email</label>
											
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input name="workemail" type="email" class="form-control col-md-7 col-sm-12 col-xs-12" value="" style="min-width:144%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-38%">
											</div>
										</div>
										
										<div class="form-group">
											
											<div class="col-md-2 col-sm-2 col-xs-2">
												<select name="day" style="width:65px;margin-top: 10px;" required>
													<!-- <option value="">Date</option> -->
	                                                <option value="">Day</option>
													<option value="01">01</option>
												      <option value="02">02</option>
												      <option value="03">03</option>
												      <option value="04">04</option>
												      <option value="05">05</option>
												      <option value="06">06</option>
												      <option value="07">07</option>
												      <option value="08">08</option>
												      <option value="09">09</option>
												      <option value="10">10</option>
												      <option value="11">11</option>
												      <option value="12">12</option>
												      <option value="13">13</option>
												      <option value="14">14</option>
												      <option value="15">15</option>
												      <option value="16">16</option>
												      <option value="17">17</option>
												      <option value="18">18</option>
												      <option value="19">19</option>
												      <option value="20">20</option>
												      <option value="21">21</option>
												      <option value="22">22</option>
												      <option value="23">23</option>
												      <option value="24">24</option>
												      <option value="25">25</option>
												      <option value="26">26</option>
												      <option value="27">27</option>
												      <option value="28">28</option>
												      <option value="29">29</option>
												      <option value="30">30</option>
												      <option value="31">31</option>
													
												</select>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2" style="margin-left:5px;">
												<select name="month" style="width:65px;margin-top: 10px;" required>
													<!-- <option value="">Month</option> -->
	                                                <option value="">Month</option>
													<option value="01">January</option>
												      <option value="02">February</option>
												      <option value="03">March</option>
												      <option value="04">April</option>
												      <option value="05">May</option>
												      <option value="06">June</option>
												      <option value="07">July</option>
												      <option value="08">August</option>
												      <option value="09">September</option>
												      <option value="10">October</option>
												      <option value="11">November</option>
												      <option value="12">December</option>
													
												</select>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2" style="margin-left:15px;">
												<select  name="year" style="width:65px;margin-top: 10px;" required>
													<option value="">Year</option>
													<?php
														for($i=date('Y'); $i>1899; $i--) {
															print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>');
														}
													 ?>
													
												</select>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2">
												<span class="radio" style="size:60px; margin-left: 10px;">
												  <label class="radiolabel"><input type="radio"  name="gender" value="male" style="color:red" >Male</label>
												</span>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-2">
												<span class="radio" style="size:50px; margin-left: 10px;">
												  <label class="radiolabel"><input type="radio"  name="gender" value="male" style="color:red" >Female</label>
												</span>
											</div>

	                                        <div class="col-md-12 col-sm-12 col-xs-12">
	                                        	<span id="load_status"></span>
												<table class="" style="margin: 50px 0px -30px;">
	                                                <tr>
	                                                    <td style="width:300px;"><button type="" style="background-color:#BE2633;border-radius:6px;border:0px;width:90%;color:#fff;height:30px;margin-right: 20px;" onclick="createAdmin();">Creat Account</button></td>
	                                                    <td><p style="margin: 0px 0px -18px;">Cancel</p></td>
	                                                </tr>
												</table>
											</div>
										</div>
										
								</div>
							</div>
						</div>	
						<div style="height:20px;"></div>
						
					</div>
				</form>
					
			</div>
			
			<!-- Modal test -->
			<!-- <script type="text/javascript">
			    $(window).load(function(){
			        $('#myModal').modal('show');
			    });
			</script> -->

			<!-- <div class="modal hide fade" id="myModal">
			  <div class="modal-header">
			    <a class="close" data-dismiss="modal">×</a>
			    <h3>Modal header</h3>
			  </div>
			  <div class="modal-body">
			    <p>One fine body…</p>
			  </div>
			  <div class="modal-footer">
			    <a href="#" class="btn">Close</a>
			    <a href="#" class="btn btn-primary">Save changes</a>
			  </div>
			</div> -->
			<!--  -->
		</section>
    </section>
    <script type="text/javascript">
    	function WatchPassword(){
    		var password=$("#new_password").val();
	       	var confirm=$("#confirm").val();

	       	if (confirm ==password) {
	       		$("#passwordMismatchError").html("");
	       		
	       	}else{
	       		$("#passwordMismatchError").html("Passwords don't match.");
	       	}
    	}
    
       $("#uploadForm").on('submit',(function(e) {
       	
       	// var password=$("#password").val();
       	// var confirm=$("#confirm").val();
       	// if (confirm !=password) {
       	// 	$("#passwordMismatchError").html("Passwords don't match.");
       	// 	return;
       	// }
        e.preventDefault();

        $("#load_status").html("<img src='../../../admin/Theme/uploads/loader2.gif' style='width:30px;height:30px;'/>"); 

        $.ajax({

          url: "createAdmin.php",
          type: "POST",
          data:  new FormData(this),
          contentType: false,
              cache: false,
          processData:false,
          success: function(data)
            {
            
            $("#load_status").html("");
            $('#uploadForm').trigger("reset");
            var dat=JSON.parse(data);
            alert("User Company Id is "+dat.response);

            },
            error: function() 
            {
            }
                       
         });

      }));
    

  // }
    </script>
    <?php
      include("footing.php");
    ?>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.8.3.min.js"></script>
</section>

<?php 
  include("footer.php");
?>