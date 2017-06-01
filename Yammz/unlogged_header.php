<?php 
  /*Created file Unlogged header to be used on visited pages before logging in*/
  /*Linked file name to login and signup pages*/
  /*created new search optimized form  using window localstorage and moving to next page*/
  /*Linked form to home2.php which is the home page*/
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
<div class="container2">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      
      <a class="navbar-brand left5" style="margin-left:5px;" ng-href="index.php">
       
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
    <div class="collapse navbar-collapse" id="myNavbar" ng-controller="IndexCtrl" >
      
      <ul class="nav navbar-nav" style="margin-left:0%;">
        <form role="search" class="navbar-form navbar-left" method="post" action="#" >
          
           <li class="">
              <div class="input-group" style="width:180%; margin-top:10px;">
							<input type="text"  ng-model="searchInputValue" name="search" id="searchinput" class="form-control pull-left noborderStyle" style="border-radius:0;" >
							  <span class="input-group-btn">
									
								<button  class="btn" type="submit" name="searching" ng-click="storeWord(searchInputValue)"  style="border-radius:0;" >
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
          <a class="" href="signup.html" >&nbsp;<span class="white">Sign up</span></a>
        </li>
        <li class="hidden-xs hidden-sm"><hr style="height:10px;width:1px;background-color:white;"></hr></li>
        <li class="">

          <a href="login.html"  style="background-color:#BD2532;height:20px;"> &nbsp;<span class="white">Login</span></a>
         
            <div style="height:15px;"> </div>
                    
          
        </li>
       
      </ul>
    </div>
  </div>
  </div>
</nav>
<div style="margin-bottom: 5.3%;"></div>
