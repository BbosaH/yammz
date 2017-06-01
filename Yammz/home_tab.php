<?php
require_once('Controllers/auth/auth.php');
include("classes/connector.php");
require_once('classes/gstring_funcs.php'); 
$conn = new connector();

?>

 <html lang="en">
	<?php require_once('imports.php'); ?>



	<body style="background-color:#E9EAEE" ng-app="home">

		
		<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#BD2532;color:#ffffff;border-color:#BD2532;color:#ffffff;">
			<div class="container2" ng-controller="SearchCtrl">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span> 
		      </button>
		      
		      <a class="navbar-brand left5" style="margin-left:5px;" ng-href="{{BaseURL}}/home2.php">
		       
		      <div class="row">
		        <div class="col-md-9 col-lg-9 col-xl-9 col-sm-9 col-xs-9">
		          <div class="" style="font-size:32;margin-top:10px;color: #ffffff;">Yammzit</div>
		        </div>
		        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 col-xs-3">
		          <img src="images/icons/yammz_logo.png" class="logo_left" width="35" height="35" style="margin-left: -17px;" />
		        </div>
		      </div>
		      </a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar"  >
		      
		      <ul class="nav navbar-nav" style="margin-left:0%;">
		        <form role="search" class="navbar-form navbar-left" method="post" action="search.php" >
		          
		           <li class="">
		              <div class="input-group" style="width:180%; margin-top:10px;">
									<input type="text" value="<?php echo (isset($_POST['search'])? $_POST['search'] : "" ) ;?>" name="search" id="searchinput" class="form-control pull-left noborderStyle" style="border-radius:0;" >
									  <span class="input-group-btn">
											<input type="hidden" id="idinput" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"/> 
										<button class="btn" type="submit" name="searching"  style="border-radius:0;" >
											<span class="glyphicon glyphicon-search"></span>
											Search
										</button>
									  </span>
								</div>
		              
		           </li>
		           

		        </form>
		      </ul>
		      <ul class="nav navbar-nav navbar-right" style="margin-right:5px;margin-top:20px;margin-bottom:-25px;">
		        <li class="" >
		        <!-- style="color:#FF7F00;" -->
		          <a class="" href="home2.php" ><span class="glyphicon glyphicon-home white"></span>&nbsp;<span class="white">Home</span></a>
		        </li>
		        <li class="hidden-xs hidden-sm"><hr style="height:10px;width:1px;background-color:white;"></hr></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color:#BD2532;height:20px;"><i class="fa fa-envelope"></i><img src="images/icons/notification icon.png" width="13" height="14px">&nbsp;<span class="white">Notifications</span></a>
		         
		            <div style="height:15px;"> </div>
		          <ul class="dropdown-menu message-dropdown" style="font-size:11;margin-top:-6px;width:320px;margin-right:-118px;">
		            <li class="message-preview" >

		                <a href="#">
		                    <div class="media">
		                      <table >
		                        <tr>
		                          <td style="width:55px;"><img class="media-object" src="http://placehold.it/50x50" alt=""></td>
		                          <td >
		                            <h5 class="media-heading" style="font-size:11;padding-top:10px;"> liked your review
		                            </h5>
		                            <p class="small text-muted" style="font-size:12;"><i class="fa fa-clock-o"></i>  30 mins ago</p>
		                          </td>
		                        </tr>
		                      </table>
		                      

		                    </div>
		                </a>
		            </li>
		            <li class="message-preview">
		                <a href="#">
		                    <div class="media">
		                      <table >
		                        <tr>
		                          <td style="width:55px;"><img class="media-object" src="http://placehold.it/50x50" alt=""></td>
		                          <td >
		                            <div class="media-body">
		                              <h5 class="media-heading" style="font-size:11;padding-top:10px;"> liked your review 
		                              </h5>
		                              <p class="small text-muted" style="font-size:12;"><i class="fa fa-clock-o"></i>  30 mins ago</p>
		                            </div>
		                          </td>
		                        </tr>
		                      </table>
		                      
		                    </div>
		                </a>
		            </li>
		            <li class="message-footer ">
		                <a style="color:#BD2532;font-weight:bold;" href="notifications.php" >Read All Notifications</a>
		            </li>
		          </ul>              
		          
		        </li>
		        <li class="hidden-xs hidden-sm"><hr style="height:10px;width:1px;background-color:white;"></hr></li>
		        <li class="dropdown" >
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color:#BD2532;height:20px;">

		           <span class="white"> 
		            <?php include("Controllers/Profile/profile_image_nameview.php"); ?><b class="caret"></b>
		            </span>
		            
		          </a>
		          <ul class="dropdown-menu" style="font-size:11;size:20x20;margin-top:10px;margin-right:18px;">
		            <li class="">
		              <a href="user_profile.php?id=<?php   echo gString($_SESSION['SESS_MEMBER_ID']); ?>" class=""><i class="glyphicon glyphicon-user"></i>&nbsp;My Profile</a>
		            </li>       
		            <li>
		              <a href="#"><i class="glyphicon glyphicon-cog"></i>&nbsp;My inbox</a>
		            </li>
		            <li>
		              <a href="#"><i class="glyphicon glyphicon-list"></i>&nbsp;Change password</a>
		            </li>
		            <li class="divider"></li>
		            <li>
		              <a href="Controllers/auth/logout.php"><i class="glyphicon glyphicon-off"></i>&nbsp;Log Out</a>
		            </li>
		          </ul>
		        </li>       
		        
		      </ul>
		    </div>
		  </div>
		  </div>
		</nav>
		<div style="margin-top:4.5%;"></div>
		<div class="container" >

			<div class="row">
				<div class="container">
				<div class="row" style="padding-top:15px">

				</div>
				<br/>
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" ng-controller="CategoryCtrl">
					<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $_SESSION['SESS_MEMBER_ID']; ?>'">
							<div class="row">
								<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 sidebar-offcanvas" id="sidebar" role="navigation">
									<span  >
										<?php require_once("Controllers/business_category.php");
										$page="home_tab";
											getCategories($page); ?>
									</span>
									</div>
									<div class="col-lg-9 col-sm-9 col-md-9 col-xs-9">
    									<span>
      										<div class="panel panel-default noborderStyle" ng-repeat="category in categorymodels" ng-show="toggle==category.category_id" >

                                            <div class="panel-body" id="{{category.category_id}}"  stye="min-height: 500px;" >
                                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" >

                                                          <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4" ng-repeat="sub_category in category.sub_categories">
                                                           <p style="margin-top:10px;"> <a hfref="#" style="text-decoration:none;cursor:pointer;" ng-click="getBusinesses(sub_category.id,user_id)"   class="badblack">{{sub_category.name}}</a></p>

                                                          </div>

                            					</div>
                                                <br/>
                                                <br/>
                                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4" style="margin-left:500px;" >
                                            			<table>
                                            				<tr>
                                            				<td><span style="font-size:80px;color:#BD2532;" class="icon icon-{{category.category_icon}}"></span></td>
                                            				<td>
                                            				<span class="redbright" style="font-size:14px;font-weight:bold;margin-bottom:20px;vertical-align:bottom"><br/><br/><br/>&nbsp;&nbsp;&nbsp;<label class="control-label">{{category.categoryname}}</label></span>
                                                    </td>
                                            				</tr>
                                            		</table>
                                            	</div>
                                           </div>
                                           <br/>
                                           </div>

                          				</div>
    									</span>
									</div>
								</div>

							</div>

					</div>



				</div>
			</div>
      <br/><br/>
			<?php require_once("footer.php"); ?>
		</div>
		<!-- <script src="dist/js/bootstrap.min.js"></script> -->

		<!-- <script src="offcanvas.js"></script> -->

	<script type="text/javascript" src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
    <script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
    <script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
    <script type="text/javascript" src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
	<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>

    <script src="js/jquery-1.10.2.min.js"></script>


    <!--my own javascript order-->
    <script src="js/js/yammz.js" type="text/javascript"></script>
    <script src="js/js/home-models.js" type="text/javascript"></script>
    <script src="js/js/home.js" type="text/javascript"></script>
    <script src="js/js/starter.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/function.js"></script>
    <script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>
	</body>

</html>
