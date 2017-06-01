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
					<div class="col-lg-8 col-sm-8 col-md-8 col-xs-8"  >
						
						
						<ul class="nav nav-tabs" style="width:102.2%;">
						    <li class="active" style="width:50%;border-radius:0px;"><a data-toggle="tab" href="#category">INBOX</a></li>
						    <li style="width:50%"><a data-toggle="tab" href="#subcategory">BUSINESS INBOX</a></li>
						    
						</ul>
						<div class="tab-content">
							<div id="category" class="tab-pane fade in active"> 
								<ul class="nav  nav-pills nav-stacked col-md-12 col-lg-12 col-sm-12 col-xs-12">
									<li class="inboxbutton" id="name" style="margin-top:1px;" >
										<a  href="inbox2.php" >
											<div style="padding-left:25px;">
												
												<img  class="img-circle" src="images/icons/2.png" width="55px"/>
												<span style="margin-left:11px;">
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
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
													Steven Byamugisha liked your review
												</span><br/>
												<label style="color:#C1C1C1;solid:#C1C1C1;font-weight:lighter;padding-left:70px;margin-top:-23px;">30 min ago</label>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
						
						
						<button style="margin-bottom:20px;margin-top:20px; height:100px;width:102%" class="loadmore" data-page="2">
							<table style="margin-left:170px;">
								<tr>
									<td >
									
										<span><div style="height:10px;"></div><B>Load More&nbsp;</B></span>
									</td>
									<td>			
										<span style="font-size:43px;" class="icon icon-sort-desc"></span>
									</td>
								</tr>
							</table>
						</button>
					</div>
					
					
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4" >
					<!--style="height: 100%;overflow: scroll;" -->
					<div class="panel panel-default noborderStyle">					
						<div class="panel-body"style="padding-left:10%;">
								
							<a type="button" href="add_business.php" class="btn btn-default btn-block btn-primary"  style="background-color:#BE2633; padding-top:15px; border-radius:10px; border-color:#BE2633; height:70px; width:95%;">
								
								<table>
									<tr >
										<td style="padding-left:40px;">
											<span ><img src="images/icon_files_white/claim business icon.png" width="40px"/>&nbsp;&nbsp;</span>
										</td>
										<td>
											<div style="height:10px;"></div>
											<span  style=" color:white;"><B>Add Business</B> </span>
											
										</td>
									</tr>
								</table>							
							</a>
							
						</div>
					</div>
					<div class="panel panel-default noborderStyle">					
						<div class="panel-body"style="padding-left:10%;">
								
							<a type="button" href="add_business.php" class="btn btn-default btn-block btn-primary"  style="background-color:#BE2633; padding-top:15px; border-radius:10px; border-color:#BE2633; height:70px; width:95%;">
								
								<table>
									<tr >
										<td style="padding-left:40px;">
											<span ><span data-icon="k" style="font-size:45px;color:white;" class="icon"></span>&nbsp;&nbsp;</span>
										</td>
										<td>
											<div style="height:10px;"></div>
											<span  style=" color:white;"><B>Claim your business</B> </span>
											
											
										</td>
									</tr>
								</table>							
							</a>
							
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<?php require_once("Controllers/suggested_places_to_follow.php");?>
							
						</div>
					</div>
						<div class="panel panel-default">
							<?php require_once("Controllers/business_ads.php")?>
							
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
		<script src="dist/js/bootstrap.min.js"></script>
		<script src="assets/js/docs.min.js"></script>
		<script src="offcanvas.js"></script>
	</body>

</html>