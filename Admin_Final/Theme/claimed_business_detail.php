<?php 
  include("header.php");
  require_once('classes/connector.php');    		
  $conn = new connector();
  // $_GET['bus_id']; 
  // $_GET['bus_id'];
  $bid=$_GET['bus_id'];

  $Info=$conn->getClaimedBusinessesOfId($bid);
  foreach ($Info as $key => $value) {
 


 
?>

<style>
	.btn:focus, .btn:active:focus, .btn.active:focus {
      outline: 0 none;
    }

    .btn-primary {
      background: white;
      color:black;
      border-color:#C1C4C9;
    }
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
      background: white;
      color:black;
    }
    .btn-primary:active, .btn-primary.active {
      background: #BD2532;
      box-shadow: none;
    }
    
    .btn-file {
      position: relative;
      overflow: hidden;
      background:#3B3B3A;
      border:0px;
      min-width: 70px;
      min-height: 18px;
    }
    .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background:#3B3B3A;
      cursor: inherit;
      display: block;
    }
    .badge-background{
    background-color:#EBEAEF;
    }
    .approve{
      background-color:#BD2532;color:#fff;border-radius:8px;margin-right:40px;
    
    }
    .approve:hover, .download:approve {
      background: #424A5D;
      color:#ffffff;
    }
    .approve:active, .approve.active {
      background: #424A5D;
      box-shadow: none;
    }

    
    .decline_accept{
      background-color:#424A5D;color:#fff;border-radius:8px;margin-right:40px;
    
    }
    .decline_accept:hover, .decline_accept:focus {
      background: #BD2532;
      color:#ffffff;
    }
    .decline_accept:active, .decline_accept.active {
      background: #BD2532;
      box-shadow: none;
    }

</style>
<section id="container" >
      <?php 
        include("heading.php");
      ?>

      <?php 
        include("sidemenu.php");
      ?>
 
      <!-- -->
      <section id="main-content" style="background-color:#EAE9EF;">
      	<section class="wrapper" style="margin-top:80px;">     	

      		 	
              <div class="col-lg-12 col-md-12 col-xl-12 noSidePadding">    				
          				<div class="panel panel-default padding ym_panel">    					
              			<div class="panel-body" style="font-size:13px; color:black;">

              				<div class="row">
              					<div class="col-xl-12 col-md-12 col-lg-12">              						
              						<img src="<?php echo $photoBase.$value['banner_image']; ?>" style="width:100%;height:350px;">
              					</div>
              				</div>

                      <div class="row top20">
                        <div class="col-xl-1 col-md-1 col-lg-1">
                          <!-- <img src="uploads/defthumb.png"> -->
                          <img src="<?php echo $photoBase.$value['logo_image']; ?>" style="width:110px;height:110px;margin-top:10px;border-radius:50%;">
                        </div>
                        <div class="col-xl-1 col-md-1 col-lg-1">
                          <hr style="width:4px;height:145px;background-color:#D7D7D7;margin-bottom:0px;border:0px;margin-top:0px;margin-right:-10px;" class="hidden-xs hidden-sm">
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-6">
                          <p class="head_text">Name</p>
                          <p class="under_text"><?php echo $value['business_name']; ?></p>
                          <p class="head_text">Country</p>
                          <p class="under_text"><?php echo $value['business_country']; ?></p>
                          <p class="head_text">City</p>
                          <p class="under_text"><?php echo $value['business_city']; ?></p>
                        </div>

                      </div>
                      <hr class="hidden-xs hidden-sm claim_horizontal_line">

                      <div class="row">
                        <div class="col-xl-12 col-md-12 col-lg-12">
                          
                          <p class="head_text">Person Claiming Business</p>
                          <p class="under_text"><?php echo $value['claimer_fname']." ".$value['claimer_lname']; ?></p>

                          <p class="head_text">Your Current Post at the company / business</p>
                          <p class="under_text"><?php echo $value['claimer_post'] ?></p>
                        </div>
                      </div>
                      <hr class="hidden-xs hidden-sm claim_horizontal_line">
                      <?php foreach ($value['business_category_info'] as $key => $value2) {?>

                      <div class="row top20">
                        <div class="col-xl-3 col-md-4 col-lg-4">
                          <p class="head_text">Category</p>
                          <p class="under_text"><?php echo $value2['category_name']; ?></p>
                        </div>
                        <div class="col-xl-4 col-md-3 col-lg-4">
                          <p class="head_text">Subcategory</p>
                          <p class="under_text"><?php echo $value2['subCategory_name']; ?></p>
                        </div>
                        <div class="col-xl-4 col-md-4 col-lg-4"></div>
              			  </div>

                      <?php }?>                      

                      <hr class="hidden-xs hidden-sm claim_horizontal_line">

                      <div class="row top20">
                        <div class="col-xl-4 col-md-4 col-lg-4">
                          <p class="head_text">Contact Phone</p>
                          <p class="under_text"><?php echo $value['phone_1']; ?></p>
                        </div>
                        <div class="col-xl-4 col-md-4 col-lg-4">
                          <p class="head_text">Business Phone</p>
                          <p class="under_text"><?php echo $value['phone_2']; ?></p>
                        </div>
                        <div class="col-xl-4 col-md-4 col-lg-4">
                          <p class="head_text">Email</p>
                          <p class="under_text"><?php echo $value['email']; ?></p>
                        </div>
                        <div class="col-xl-4 col-md-4 col-lg-4"></div>
                      </div>
                      <div class="row top20">
                        <div class="col-xl-4 col-md-3 col-lg-4">
                          <p class="head_text">Website</p>
                          <p class="under_text"><?php echo $value['website']; ?></p>
                        </div>
                        <div class="col-xl-4 col-md-4 col-lg-4">
                          <p class="head_text">Adress</p>
                          <p class="under_text"><?php echo $value['address']; ?></p>
                        </div>
                        <div class="col-xl-4 col-md-4 col-lg-4">
                          
                        </div>
                        <div class="col-xl-4 col-md-4 col-lg-4"></div>
                      </div>

                      <hr class="hidden-xs hidden-sm claim_horizontal_line">

                      <div class="row top20">
                        <div class="col-xl-12 col-md-12 col-lg-12">
                          <p class="head_text">Business Description</p>
                          <p class="under_text"><?php echo $value['business_description']; ?></p>
                        </div>                        
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-lg-12 col-md-12 col-xl-12 noSidePadding top_15">           
                  <div class="panel panel-default padding ym_panel2">              
                    <div class="panel-body" style="font-size:13px; color:black;">
                      <p class="head_text top3 ">Working hours</p>
                      <?php foreach ($value['working_hours'] as $key => $value3) {?>
                      <div class="row">
                        <div class="col-xl-1 col-md-1 col-lg-1 right_40">
                          <p class="under_text top3 "><?php echo $value3['day']; ?></p>
                        </div>
                        <div class="col-xl-1 col-md-1 col-lg-1">
                          <?php echo '<input type="text" value="'.$value3['from'].'" class="claim_time" disabled>'; ?>
                          
                        </div>
                        <div class="col-xl-1 col-md-1 col-lg-1 right_70">
                          to
                        </div>
                        <div class="col-xl-1 col-md-1 col-lg-1">
                          <?php echo '<input type="text" value="'.$value3['to'].'" class="claim_time" disabled>'; ?>
                          
                        </div>                        
                      </div>
                      <?php } ?>
                      
              		</div>
              </div>
            </div>

            <div class="col-lg-12 col-md-12 col-xl-12 noSidePadding top_15">           
                  <div class="panel panel-default padding ym_panel2">              
                    <div class="panel-body" style="font-size:13px; color:black;">
                      <p class="head_text top3 ">Other Details</p>

                      <?php foreach ($value['other_details'] as $key => $value4) {?>
                      <div class="row">
                        <div class="col-xl-2 col-md-2 col-lg-2 right_15">
                          <p class="under_text top3 "><?php echo $value4['info']; ?></p>
                        </div>
                        <div class="col-xl-9 col-md-9 col-lg-9">
                          <input type="text" value="YES" class="claim_time" disabled>
                        </div>                                               
                      </div>
                      <?php } ?>
                      
                  </div>
              </div>
            </div>

            <div class="col-lg-12 col-md-12 col-xl-12 noSidePadding" >           
                  <div class="panel panel-default padding ym_panel2" style="height:200px;">              
                    <div class="panel-body" style="font-size:13px; color:black;">
                    <div class="row" style="margin-top:6%;">
                        <div  class="col-lg-2 col-md-2 col-xl-2 hidden-xs hidden-sm"></div>
                        <?php if($_GET['k']==300){ ?>
                        <div  class="col-lg-2 col-md-2 col-xl-2">                          
                            <input type="hidden" name="add_id" value="" />
                             
                            <button class="btn col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12 btn-small decline_accept" onclick="ApproveClaimed_business('<?php echo $value["business_id"]; ?>','<?php echo $value["uid"]; ?>','<?php echo $value["business_name"]; ?>','<?php echo $value["phone_1"]; ?>','<?php echo $value["business_address"]; ?>','<?php echo $value["claimer_fname"]." ".$value["claimer_lname"]; ?>');">Approve Claim</button>
                          
                        </div>
                        <?php }elseif ($_GET['k']==200) {?>

                          <div  class="col-lg-2 col-md-2 col-xl-2">                          
                            <input type="hidden" name="add_id" value="" />
                             
                            <button class="btn col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12 btn-small decline_accept" onclick="getApproveClaimed_business_code('<?php echo $value["business_id"]; ?>','<?php echo $value["uid"]; ?>','<?php echo $value["business_name"]; ?>','<?php echo $value["phone_1"]; ?>','<?php echo $value["business_address"]; ?>','<?php echo $value["claimer_fname"]." ".$value["claimer_lname"]; ?>');">View Letter</button>
                          
                          </div>

                          <div  class="col-lg-2 col-md-2 col-xl-2">                          
                            <input type="hidden" name="add_id" value="" />
                             
                            <button class="btn col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12 btn-small decline_accept" onclick="DeactivateClaimed_business('<?php echo $value["business_id"]; ?>','<?php echo $value["uid"]; ?>');">
                              Deactivate
                            </button>
                          
                          </div>
                          
                          <?php } ?>
                        <div  class="col-lg-2 col-md-2 col-xl-2">
                          <form action="" method="post" role="form" type="">
                            <input type="hidden" name="add_id" value="" />
                            <button class="btn col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12 btn-small decline_accept" type="submit" name="advert_opt"  value="approve" href="">Cancel</button>
                          </form>
                        </div>
                    </div>
                     

                  </div>
              </div>
            </div>

            <div class="col-lg-12 col-md-12 col-xl-12 noSidePadding">           
                  <div class="panel panel-default" style="background-color:#EAE9EF;border:0px;margin-top:-25px;">              
                    <div class="panel-body" style="font-size:13px; color:black;">
                     
                  </div>
              </div>
            </div>

      	</section>

      	<?php
      	include("footing.php");
    	  ?>

      </section>

</section>
<?php 
  include("footer.php");

}
?>
