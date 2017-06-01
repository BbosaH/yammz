<?php
require_once('Controllers/auth/auth.php');
require_once('classes/connector.php');
$conn = new Connector();
?>

<html lang="en">
	<?php require_once('imports.php'); ?>
	<body style="background-color:#E9EAEE;">
	<style>
		.nav-tabs{
		  background-color:#E2E2E2;
		
		}
		.tab-content{
		    background-color:#fff;
		    font-size:11px;
		  
		    
		}
		.nav-tabs > li > a{
		  border: medium none;
		   color:#BD2532;
		   font-weight:bold;
		}
		.nav-tabs > li > a:hover{
		  background-color: #fff !important;
		   
		    border: medium none;
		    border-radius: 0;
		    color:#BD2532;
		}
		
	</style>
		
	<?php require_once('Controllers/Logged_header2.php');?>
		<div class="container">
			
			<div class="row">
				<div class="container">
				<div class="row" style="padding-top:5px">
				
				</div>
				<br/>
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4"  >
						
						
						<ul class="nav nav-tabs" style="width:99%;">
						    <li class="active" style=""><a data-toggle="tab" href="#category">INBOX</a></li>
						    <li style=""><a data-toggle="tab" href="#subcategory">BUSINESS INBOX</a></li>
						    
						</ul>
						<div class="tab-content">
							<div id="category" class="tab-pane fade in active"> 
								<ul class="nav  nav-pills nav-stacked col-md-12 col-lg-12 col-sm-12 col-xs-12">
									<li class="inboxbutton" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php" >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
									</li>
								
									<li class="inboxbutton_yellow" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php"  >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
											
										
									</li>
									<li class="inboxbutton" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php" >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
									</li>
								
									<li class="inboxbutton_yellow" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php"  >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
											
										
									</li>
									<li class="inboxbutton" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php" >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
									</li>
									<li class="inboxbutton" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php" >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
									</li>
									<li class="inboxbutton_yellow" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php"  >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
											
										
									</li>
								</ul>
							</div>
							<div id="subcategory" class="tab-pane fade in">
								<ul class="nav  nav-pills nav-stacked col-md-12 col-lg-12 col-sm-12 col-xs-12">
									<li class="inboxbutton" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php" >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
									</li>
								
									<li class="inboxbutton_yellow" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php"  >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
											
										
									</li>
									<li class="inboxbutton" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php" >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
									</li>
								
									<li class="inboxbutton_yellow" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php"  >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
											
										
									</li>
									<li class="inboxbutton" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php" >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
									</li>
									<li class="inboxbutton" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php" >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
									</li>
									<li class="inboxbutton_yellow" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php"  >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your...
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
											
										
									</li>
									
								</ul>
							</div>
						</div>
						
						
						
					</div>
					<div class="col-lg-1 col-sm-1 col-md-1 col-xs-1" >
						<hr style="width:2px; height:105.2%;background-color:#D1D1D1;margin-left:-70%;margin-top:0px;"></hr>
					</div>
					
					<div class="col-lg-7 col-sm-7 col-md-7 col-xs-7" >
						<div class="panel panel-default" style="margin-left:-21.3%;border-radius:0px;solid:#ffffff;border-color:#ffffff;height:105.3%;">
						
							<div class="panel-body">
								<div class="redbright" style="font-size:16px;font-weight:bold;margin-top:-10px;">Chat with Steven Byamugish II</div>
							
								<div class="row" style="margin-top:10px;">
									<div class="col-md-1 col-sm-1"><img  class="img-circle" src="images/icons/2.png" width="55px"/></div>
									<div class="col-md-7 col-sm-7">
										
										<div  style="background-color:#E2E2E2;margin-left:10px;font-size:12px;border-radius:4px;padding-left:8px;padding-right:8px;">
											Nomis Wilson Nomis WilsonNomis WilsonNomis WilsonNomis WilsonNomis WilsonNomis  WilsonNomis Wilson
										</div>
									</div>
								</div>
								
								<div class="row" style="margin-top:30px;">
									<div class="col-md-3 col-sm-3"></div>
									<div class="col-md-7 col-sm-7">
										
										<div  style="background-color:#BD2532;color:#ffffff;margin-left:20px;margin-right:-20px;font-size:12px;border-radius:4px;padding-left:8px;">
											Nomis Wilson Nomis WilsonNomis WilsonNomis WilsonNomis WilsonNomis WilsonNomis  WilsonNomis Wilson
										</div>
									</div>
									<div class="col-md-1 col-sm-1"><img  class="img-circle" src="images/icons/2.png" width="55px"/></div>									
								</div>
								<div class="row" style="margin-top:10px;">
									<div class="col-md-3 col-sm-3"></div>
									<div class="col-md-7 col-sm-7">
										
										<div  style="background-color:#BD2532;color:#ffffff;margin-left:20px;font-size:12px;border-radius:4px;padding-left:8px;">
											Nomis Wilson Nomis WilsonNomis  Nomis Wilson Nomis WilsonNomis 
										</div>
									</div>
									<div class="col-md-1 col-sm-1"><img  class="img-circle" src="images/icons/2.png" width="55px"/></div>									
								</div>
								
								<div class="row" style="margin-top:30px;">
									<div class="col-md-1 col-sm-1"><img  class="img-circle" src="images/icons/2.png" width="55px"/></div>
									<div class="col-md-7 col-sm-7">
										
										<div  style="background-color:#E2E2E2;margin-left:10px;font-size:12px;border-radius:4px;padding-left:8px;padding-right:8px;">
											Nomis Wilson Nomis WilsonNomis WilsonNomis WilsonNomis WilsonNomis
										</div>
									</div>
								</div>
								
								<textarea class="form-control" style="resize:none; background-color:#E2E2E2;border-radius:0px;margin-top:32%;border:0px;" placeholder="Type a reply...."></textarea>
							</div>
						
						</div>
					</div>
			</div>
			<div class="row">
				<div class="container">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"  >
						<div class="panel panel-default" style="background-color:#F5F6F1;padding-bottom:0px; padding-left:20px;padding-right:20px;">
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
										<B>BUSINESSES</B>
										<h1></h1>
										<h6 ><a href="#" class="simplegrey">Claim your business page</a></h6>
										<h6><a href="#" class="simplegrey">Business support</a></h6>
										<h6><a href="#" class="simplegrey">Ad choices</a></h6>
									</div>
									<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
										<B>YAMMZIT</B>
										<h1></h1>
										<h6><a href="#" class="simplegrey">About yammzit</a></h6>
										<h6><a href="#" class="simplegrey">Contact yammzit</a></h6>
									</div>
									<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
										
										<B>POLICIES</B>
										<h1></h1>
										<h6><a href="#" class="simplegrey">Privacy policy</a></h6>
										<h6><a href="#" class="simplegrey">Content guidelines</a></h6>
										<h6><a href="#" class="simplegrey">Terms of service</a></h6>
									</div>
									<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
										<B>MOBILE</B>
										<h1></h1>
										<h6><a href="#" class="simplegrey">Android</a></h6>
									</div>
									<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
										<B>SOCIAL MEDIA</B>
										<h1></h1>
										<table>
											<tr>
												<td size="10px">
													<a href="#" class="simplegrey"><img src="images/icons/official-youtube-logo.png" class="img-responsive" style="width:30px;height:30px"  alt="Generic placeholder thumbnail Responsive image"></a>
												</td>
												<td >
													<a href="#" class="simplegrey"><img src="images/icons/Facebook_logo_square.png" class="img-responsive" style="width:30px;height:30px"  alt="Generic placeholder thumbnail Responsive image"></a>
												</td>
											</tr>
											
											<tr>
											
												<td>
													<a href="#" class="simplegrey"><img src="images/icons/Twitter-icon.png" class="img-responsive" style="width:30px;height:30px"  alt="Generic placeholder thumbnail Responsive image"></a>
												</td>
												<td>
													<a href="#" class="simplegrey"><img src="images/icons/Instagram-logo-005.png" class="img-responsive" style="width:30px;height:30px"  alt="Generic placeholder thumbnail Responsive image"></a>
												</td>
											</tr>
										</table>
									</div>
									<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
										<B>PARTNERS</B>
										<h1></h1>
										<a href="#" class="simplegrey"><img src="images/icons/yammz_logo.png" width="50" height="60" /></a>
									</div>
								</div>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<p > <h6 class="pull-left simplegrey">By using this website, you agree to our Terms of service, cookie Polict, Privacy policy and Content Policy</h6></p>
							</div>
						 </div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
    	<!--<script type="text/javascript" src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>-->
		
		<script src="distjpicker/jquery.date-dropdowns.min.js"></script>

		<script src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="bootstrap-3.2.0-dist/js/jquery.tmpl.js" type="text/javascript"></script>


		<script src="js/js/yammz.js" type="text/javascript"></script>
		<script src="js/js/home-models.js" type="text/javascript"></script>
		<script src="js/js/home.js" type="text/javascript"></script>
		<script src="js/js/starter.js" type="text/javascript"></script>
		<script src="Rating/js/star-rating.js" type="text/javascript"></script>

		<script type="text/javascript" src="js/function.js"></script>
        <script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>
	</body>

</html>