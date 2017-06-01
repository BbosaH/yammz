<?php
require_once('Controllers/auth/auth.php');
?>

<html lang="en">
	
	<?php require_once('imports.php'); ?>
	
	
	<body style="background-color:#E9EAEE" ng-app="home" >
		
		<?php require_once('Controllers/Logged_header2.php'); ?>
		
		<div class="row">
			<div class="container" style="margin-left:8.7%;width:84.2%;margin-right:7.1%;">
				<div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 col-xl-3 sidebar" style="background-color:#434A5C;">
				  <div><img  class="img img-circle" src="images/icons/wite_color_icon.png" style="width:120px;height:120px;margin-top:20px;margin-left:70px;"/></div>
					<div style="margin-left:61px;margin-top:20px;color:white;">Yammzit Ad Manager</div>
				  <ul class="nav nav-sidebar" style="margin-top:50px;margin-left:50px;margin-right:-20px;">
					
					<span style="font-size:20px;color:white;margin-left:20px;">Select Business </span> 
					<li class="ad_manager_tab"><a href="?&admanager=1050" style="margin-left:40px;color:white;">Yammz.com LTD</a></li>
					<li class="ad_manager_tab"><a href="?&admanager=1000" style="margin-left:88px;color:white;">Yammz it</a></li>
				   
				  </ul>
				  <ul class="nav nav-sidebar" style="margin-top:70px;margin-left:40px;margin-right:-20px;">           
					<span style="font-size:20px;color:white;margin-left:10px;">Advertising Billing </span>            
					<li class="ad_manager_tab"><a href="?&admanager=1700" style="margin-left:80px;color:white;">Edit Billing</a></li>
					
				  </ul>
				  <div style="height:328px;"></div>
				</div>
				<div class="col-sm-9 col-lg-9 col-xl-9  col-xsm-9  col-md-9 main"> 
					<div style="height:20px;"></div>	
					<?php 
						
						if(!isset($_GET['admanager'])){
							require("Controllers/ad_manager_content_1.php");
						}
						else{
							$req=$_GET['admanager'];
							if($req==1000){
								require("Controllers/ad_manager_content_1.php");
							}
							else if($req==1700){
								require("Controllers/ad_manager_edit_billing_content.php");							
							}
							else if($req==1050){
								require("Controllers/ad_manager_edit_billing_content.php");	
							}
						}
						
						
						
					?>				
					
				</div>
			</div>
		</div>
		<div ng-include="'footer.php'" ></div>
		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>


		<!--my own javascript order-->
		<script src="js/js/yammz.js" type="text/javascript"></script>
		<script src="js/js/home-models.js" type="text/javascript"></script>
		<script src="js/js/home.js" type="text/javascript"></script>
		<script src="js/js/starter.js" type="text/javascript"></script>
		<!--<script src="Rating/js/star-rating.js" type="text/javascript"></script>-->
		<script src="Rating/js/star-rating.js" type="text/javascript"></script>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/function.js"></script>

		
	</body>
	
	
</html>