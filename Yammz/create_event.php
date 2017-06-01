<?php
require_once('Controllers/auth/auth.php');
?>

<html lang="en">
	<?php require_once('imports.php'); ?>
	<body style="background-color:#E9EAEE" ng-app="home">
		
		<?php require_once('Controllers/Logged_header2.php'); ?>
		<br/>
		<div class="container">
			<div class="panel panel-default">
				<form role="form" action="register_supplier.php" method="post" style="padding-left:30px; padding-right:100px;" > 
					<h4> <label for="name" class="help-block" style="color:#BD2532;"><B>Submit an Event</B></label> </h4>
					<div class="form-group"> 
					 <h6> <label for="name" class="help-block">Event Name</label> </h6>
					  <input type="text" class="form-control"style="width:900px;" id="name" name="phone" placeholder=""> 				 
					</div>
									
					<div class="form-group"> 
					 <h6> <label for="name" class="help-block">Date</label> </h6>					
					 <table>
					 
						<tr>				
											
							<td>
								 ﻿<input class="form-control" style="width:130px"
									  data-provide="datepicker"
									  data-date-format="dd/mm/yyyy"
									  data-date-language="th"						  
									>	
							</td>
							<td>
								 ﻿<select id="sl_privileges" class="form-control" style="width:80px">
									<option value="1">0:00</option>
									<option value="2">12:00</option>
									<option value="3">12:01</option>
								  </select>
							</td>
							<td class="redbright"><h6><br/><br/>&nbsp;Add end time</h6></td>
						</tr>	
					 </table>
						  
					</div>
					<div class="form-group"> 
						<h6> <label for="name" class="help-block">Where</label> </h6>
						 <div class="radio">
						  <label ><input type="radio"  name="optradio">Public Vence</label>
						</div>
						<div class="radio">
						  <label><input type="radio" name="optradio">Private Address</label>
						</div>
						
					</div>
					
					<B><hr style="height:7px; background-color:#CFCFCF;"></hr></B>
					<div class="form-group"> 
						 <h6> <label for="name" class="help-block">Business Name</label> </h6>
						 <table>
							<tr>	
								<td><input type="text" class="form-control"style="width:500px;" id="name" name="phone" placeholder=""></td>
								<td>&nbsp;﻿&nbsp;﻿<button type="button" class="btn btn-default" style="height:30px; background-color:#BD2532; color:white;">Search</button></td>
								<td class="redbright"><h6>&nbsp;﻿&nbsp;Add Business</h6></td>
							</tr>
						</table>
					</div>
					<div class="form-group"> 
						 <h6> <label for="name" class="help-block">Description</label> </h6>
						 <textarea class="form-control" rows="3" style="background-color:#E9EAEE; width:700px; height:60px;" placeholder="Write a review......">
						 </textarea>  
					 </div>
					 <div class="form-group"> 
						 <h6> <label for="name" class="help-block">Who can come</label> </h6>
						  <div class="radio">
						  <label ><input type="radio"  name="optradio">Public</label>
						</div>
						<div class="radio">
						  <label><input type="radio" name="optradio">Friends only</label>
						</div>
						<div class="radio">
						  <label><input type="radio" name="optradio">The Yammz-it family</label>
						</div>
					 </div>
					<B><hr style="height:7px; background-color:#CFCFCF;"></hr></B>
					 <div class="form-group"> 
						 <h6> <label for="name" class="help-block">Event site url</label> </h6>
						 <input type="text" class="form-control"style="width:700px;" id="name" name="phone" placeholder=""> 
					 </div>
					 <div class="form-group"> 
						<table>
							<tr>
							<td> 
								<h6> <label for="name" class="help-block">Select currency &nbsp;&nbsp;&nbsp;</label> </h6>
							</td>
							<td>&nbsp;
								<select id="sl_privileges" class="form-control" style="width:80px; height:28px;">
									<option value="1">$ US Dollar</option>
									<option value="2">Ugx</option>
									<option value="3">Ksh</option>
								  </select>
								  <br/>
							</td>
							</tr>
						 
					 </div>
					 <div class="form-group"> 

						<table>
							
							<tr>
								<td> 
									<h6> <label for="name" class="help-block">price&nbsp;&nbsp;&nbsp;</label> </h6>
								</td>
								<td>
									<input type="text" class="form-control" id="name" name="phone" placeholder="">
								</td>
								<td>&nbsp;&nbsp; to&nbsp;&nbsp;</td>
								<td><input type="text" class="form-control" id="name" name="phone" placeholder=""></td>
								<td>&nbsp;&nbsp; or &nbsp;</td>
								<td><input type="text" class="form-control"style="width:0px; height:0px" id="name" name="phone" placeholder=""></td>
								<td>&nbsp; Free Event</td>
							</tr>
						</table>
						 
					 </div>
					  <div class="form-group"> 
						 <h6> <label for="name" class="help-block">Category</label> </h6>
						 <select id="sl_privileges" class="form-control" style="width:700px">
									<option value="1">Family</option>
									
								  </select>
					 </div>
					 <table>							
							<tr>
								<td>
									<button type="button" class="btn btn-default" style="height:30px; background-color:#BD2532; color:white;">Create Event</button>
								</td>
								<td><B>&nbsp;&nbsp;&nbsp;&nbsp;Cancel</B></td>
							</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>