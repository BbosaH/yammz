 <?php function edit() { ?>
 <div class="modal fade" id="edit_example">
	<div class="modal-dialog" role="modal">
	  <div class="modal-content">
		<div class="modal-header">
		 <!-- <button type="button" class="close" data-dismiss="modal"
				  aria-hidden="true">×</button> -->
		  <h4 class="modal-title">Edit Profile</h4>
		</div>
		<div class="modal-body">



				<form role="form" method="post" action ="classes/util.php"style="padding-left:30px; padding-right:100px;" enctype="multipart/form-data" name="edit_profile_form" > 
            					<h4> <label for="name" class="help-block" style="color:#BD2532;"><B></B></label> </h4>
            					
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

            						<div class="form-group" > 
            						<h6> 
            						
            						<img  class="img-circle" src="http://localhost:89//yammzit/admin/Theme/uploads/addprofile.png"style="width:200px; height:200px;"  name="" placeholder=""/> 	
            						
            						<span>
            							<h6 style=" margin-left:0px;"> 
					  
										  	<div class="fileUpload btn btn-danger" style="border-radius: 5px;  background-color:#BD2532;">
											    <span>Upload photo</span>
											    <input id="" type="file"  name="" class="upload"   />
											</div>
					  					<h6>	

            						</div>
                                                
            						
            						<div class="form-group"> 
            							<h6> <label for="name" class="help-block">Name<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
            							<!--<input type="text" class="form-control"style="width:900px; border-color:#868686; border-radius:0;" id="name" name="name" placeholder="">--> 
            							<input type="text" required class="form-control input-sm " name="name" value="" style="width: 500px;" />				 
            						</div>

            						
            						
            						
            						<div ng-controller="CountryCtrl">
				   
									 <div class="form-group"> 
									    
										 <h6> <label for="name" class="help-block">Country<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
										 <select class="form-control" id="countrry" name="countrry" style="  width:500px; border-color:#E9EAEE; border-radius: 0px;">
										 			<option  value=""> Select country </option>
														<option ng-repeat="country in countryModels"  value="{{country.id}}">{{country.name}}</option>
											
												
																		
										  </select>
									 </div>
									 <div class="form-group"> 
										 <h6> <label for="name" class="help-block">City<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
										 <select id="city" name="city" class="form-control" ng-model='businessobject.city_id' style="  width:500px; border-color:#E9EAEE; border-radius: 0px;">
												<option  value=""> Select city </option>
											
										  </select>
									 </div>
									</div>
            						
            						<B><hr style="height:3px; width:500px; background-color:#E9EAEE;"></hr></B>

            						<div class="form-group  noMarginBottom">
            							<h6> <label for="name" class="help-block">contact phone<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
            							<input type="text"  class="form-control input-sm " name="phone1" value="" style="width: 500px;" />
            						</div>
            						<div class="form-group  noMarginBottom">
            							<h6> <label for="name" class="help-block">Business phone<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
            							<input type="text"  class="form-control input-sm " name="phone2" value="" style="width: 500px;"/>
            						</div>
            						<div class="form-group  noMarginBottom">
            							<h6> <label for="name" class="help-block">Email<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
            							<input type="text"  class="form-control input-sm " name="email" value="" style="width: 500px;"/>
            						</div>
            						<div class="form-group  noMarginBottom">
            							<h6> <label for="name" class="help-block">Website<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
            							<input type="text"  class="form-control input-sm " name="website" value="" style="width: 500;" />
            						</div>
            						<!--<div class="form-group  noMarginBottom">
            							<h6> <label for="name" class="help-block">Banner<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
            							<input type="file" class="form-control input-sm " name="banner_image" required style="width: 700px;"/>
            						</div>-->

            						<B><hr style="height:3px; width:500px; background-color:#E9EAEE;"></hr></B>
            						
            						
            						
            						
            						

            						<div class="form-group"> 
            							<h6> <label for="name" class="help-block">About Me<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
            							<textarea class="form-control" rows="3" id="desc" name="desc" style="background-color:#E9EAEE;resize:none; border-color:#868686; width:500px; height:100px; border:none; border-radius: 0px;" placeholder="Write a review......">
            							</textarea>  
            						</div>
            						
            						
            						<br/>
            						<B><hr style="height:3px; width:500px; background-color:#E9EAEE;"></hr></B>
            						<br/>
            						<div class="form-group"> 
            							
      						 
      							
      							<table>							
      								<tr>
      									<td>
      										<button  type="submit" name="add_business" class="btn btn-default" style="height:50px;font-size: 25px; width:200px; background-color:#BD2532; font-weight:bold;border-radius:10px;margin-left:250px;color:#EED1D5;">save</button>
      									</td>
      									<td><B data-dismiss="modal">&nbsp;&nbsp;&nbsp;&nbsp;Cancel</B></td>
      									
      								</tr>
      								
      							</table>
      							
      							
      						</div>
      						
      					</form>
			
			
		</div>
		<!-- <div class="modal-footer">
		  <button type="button" class="btn btn-danger" data-dismiss="modal">
			Close
		  </button>
		  
		</div> -->
	  </div>
	</div>
  </div>
 <?php } ?>