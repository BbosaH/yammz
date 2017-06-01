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
					<h4> <label for="name" class="help-block" style="color:#BD2532;"><B>Create a new conversation</B></label> </h4>
					<div class="form-group"> 
					 <h6> <label for="name" class="help-block">Topic Name</label> </h6>
					  <input type="text" class="form-control"style="width:900px;" style=" background-color:#CFCFCF;" id="name" name="phone" placeholder=""> 				 
					</div>
					<br/>
					<B><hr style="height:7px; background-color:#CFCFCF;"></hr></B>
					<table style="font-size:14px;">					
						<tr>
							<td>
								<div class="radio ">
								  <label><input type="radio" name="optradio">Events</label>
								</div>
							</td>
							<td >
								<div class="radio ">
								  <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;<input type="radio" name="optradio">Entertainment and pop culture</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="radio  ">
								  <label><input type="radio" name="optradio">Sports</label>
								</div>
							</td>
							<td>
								<div class="radio  ">
								  <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;<input type="radio" name="optradio">Yammz it Updates & Questions</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="radio  ">
								  <label><input type="radio" name="optradio">Travel</label>
								</div>
							</td>
							<td>
								<div class="radio   ">
								  <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;<input type="radio" name="optradio">local Questions & Answers</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="radio  ">
								  <label><input type="radio" name="optradio">Food</label>
								</div>
							</td>
							<td>
								<div class="radio  ">
								  <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;<input type="radio" name="optradio">relationship & Dating</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="radio  ">
								  <label><input type="radio" name="optradio">News & Politics</label>
								</div>
							</td>
							<td>
								<div class="radio ">
								  <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;<input type="radio" name="optradio">shopping & Products</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="radio   ">
								  <label><input type="radio" name="optradio">Humour 7 Offbeat</label>
								</div>
							</td>
							<td>
							<div class="radio ">
								  <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  &nbsp;<input type="radio" name="optradio">Others</label>
								</div>
							</td>
						</tr>
					</table>
					
					<B><hr style="height:7px; background-color:#CFCFCF;"></hr></B>
					<div class="form-group"> 
						 <h6> <label for="name" class="help-block">Location</label> </h6>
						 <table>
							<tr>
								<td>
								<input type="text" class="form-control"style="width:400px;" style="background-color:#CFCFCF;" id="name" name="phone" placeholder="Coutry"> 	
								 <td style="padding-left:10px.
								 ">
								<input type="text" class="form-control"style="width:400px;" style="background-color:#CFCFCF;" id="name" name="phone" placeholder="City"> 
								</td>
							<tr>								
						 </table>
					 </div>
					 <br/>
					 <B><hr style="height:7px; background-color:#CFCFCF;"></hr></B>
					<div class="form-group"> 
						 <h6> <label for="name" class="help-block">Description</label> </h6>
						 <textarea class="form-control" rows="3" style="background-color:#CFCFCF; width:700px; height:60px;" placeholder="Write a review......">
						 </textarea>  
					 </div>
					
					 
					 
					 <table>							
							<tr>
								<td>
									<button type="button" class="btn btn-default" style="height:30px; background-color:#BD2532; color:white;">Post</button>
								</td>
								<td><B>&nbsp;&nbsp;&nbsp;&nbsp;Cancel</B></td>
								<td><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								
								
								
								
								
								read out Talk Guidelines</B></td>
							</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>