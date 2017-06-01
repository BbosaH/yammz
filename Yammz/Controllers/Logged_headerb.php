<?php 
  
?>
<style type="text/css">
  .white{
    color: #ffffff;
  }
  .white2{
    color: #ffffff;
  }
  .container2{
    margin-left: 6.5%;
    margin-right: 5%;
  }
  .logo_left{
    margin-left: -10px;
  }
  .form-control:focus{
    border-color:#CCCCCC;
    box-shadow:0px 1px 1px rgba(0,0,0,0.015) inset, 0px 0px 8px rgba(255, 100, 255, 0);
  }
  .dropback{
    background-color:#BD2532;height:20px;
  }
  .left_15{
    margin-left:-15px;
  }
  .right{
    margin-right:5px;
  }
  .bold{font-weight: bold;}
</style>
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
          <div class="white2" style="font-size:32;margin-top:10px;">Yammzit</div>
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
                            <h5 class="media-heading" style="font-size:11;padding-top:10px;">Steven Byamugisha liked your review
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
                              <h5 class="media-heading" style="font-size:11;padding-top:10px;">Steven Byamugisha liked your review 
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
<div style="margin-bottom: 5.3%;"></div>
