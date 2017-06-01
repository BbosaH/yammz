<?php 
  require_once "classes/connector.php";
  $conn = new connector();
  
  $user=$conn->gStringId($_SESSION['admin_id']); 
  $use = $conn->getResById("SELECT * FROM admin ",$user);

?>
 <!--
     **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion" >
      
          <p class="centered">
            <a href="profile.php">
              <img src="<?php if(empty($use['avatar'])){ echo "$photoBase"."uploads/defflag.png";} else{ echo $photoBase.$use['avatar']; } ?>" class="img-circle" width="80" height="80">
   
            </a>
          </p>
          <p class="centered" style="color:#ffffff;"><?php echo $_SESSION['users_name']; ?></p>
          <p class="centered" style="color:#ffffff;font-size:11px;margin-top:-10px;"><?php echo $_SESSION['department']; ?></p>
          <p class="centered" style="color:#ffffff;font-size:11px;margin-top:-10px;"><?php echo $_SESSION['admin_type']; ?></p>
          
          <?php if(isset($_SESSION['admin_id']) && strcmp($_SESSION['admin_type'], "General")==0){}else if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Accounting")==0){ ?>
            <li class="mt" style="margin-right:0px;">
                <a class="tabs_align <?php active(array('index.php','finance_dashboard.php')); ?>" href="finance_dashboard.php">
                   <span class="" >Dashboard</span>
                </a>
            </li>
          <?php }else if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "I.T Technical")==0){ ?>
                  <li class="mt" style="margin-right:0px;">
                    <a class="tabs_align <?php active(array('index.php','manage_accounts.php')); ?>" href="manage_accounts.php">
                       <span class="" >Dashboard</span>
                    </a>
                  </li>
          <?php } else{ ?>
                  <li class="mt" style="margin-right:0px;">
                    <a class="tabs_align <?php active(array('index.php','advertising_manager_stats.php')); ?>" href="advertising_manager_stats.php">
                       <span class="" >Dashboard</span>
                    </a>
                  </li>
          <?php } ?>
          <li class="sub-menu" style="">
              <a class=" tabs_align <?php active('user_profile.php'); ?>" href="user_profile.php">
                 <span class="">Profile&nbsp;</span>
              </a>
          </li>
          <?php if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Advertising")==0 && strcmp($_SESSION['admin_type'], "Supervisor")==0){ ?>

              <li class="sub-menu" style="">
                <a class=" tabs_align <?php active('advertising_team_manager.php'); ?>" href="advertising_team_manager.php">
                   <span class="">Team Members&nbsp;</span>
                </a>
              </li>
              <li class="sub-menu" style="">
                <a class=" tabs_align <?php active('set_goal.php'); ?>" href= "set_goal.php">
                   <span class="">Set Goals&nbsp;</span>
                </a>
              </li>

          <?php }else if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Advertising")==0 && strcmp($_SESSION['admin_type'], "Manager")==0){ ?>

              <li class="sub-menu" style="">

                <a class=" tabs_align <?php active('advertising_team_manager.php'); ?> " href="advertising_team_manager.php" >
                   <span class="">Team Leaders&nbsp;</span>
                </a>
              </li>
              <li class="sub-menu" style="">
                <a class=" tabs_align <?php active('set_goal.php'); ?>" href="set_goal.php">
                   <span class="">Set Goals&nbsp;</span>
                </a>
              </li>

          <?php } ?>

          
          <?php if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Accounting")==0){ ?>
            <li class="sub-menu" style="margin-right:0px;">
                <a class=" tabs_align <?php active(array('daily_ad_income.php','pending_ad_income.php','approved_ad_income.php','declined_ad_income.php')); ?>" href="javascript:;" >
                   <span class="">Ad Income</span>
                </a>
                <ul class="sub">
                  <?php 
                    if(strcmp($admin["username"],"admin") == 0){
                  ?>
                    <li class="<?php active('admins.php'); ?>" ><a  href="admins.php"><span  style=" ">Admins </span></a>
                    </li>
                  <?php } ?>
                  <li class="<?php active('daily_ad_income.php'); ?>" >
                    <a  href="daily_ad_income.php"><span style="">Daily Ad Income</span></a>
                  </li>
                  <li class="<?php active('pending_ad_income.php'); ?>" >
                    <a  href="pending_ad_income.php"><span style="">Pending Ad Income</span></a>
                  </li>
                  <li class="<?php active('approved_ad_income.php'); ?>" >
                    <a  href="approved_ad_income.php"><span style="">Approved Ad Income</span></a>
                  </li>
                  <li class="<?php active('declined_ad_income.php'); ?>" >
                    <a  href="declined_ad_income.php"><span style="">Declined Ad Income</span></a>
                  </li>
                </ul>
            </li>
          <?php } ?>

          <?php if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Data Entry")==0 || strcmp($_SESSION['admin_type'], "General")==0){ ?>
            <li class="sub-menu active" style="margin-right:0px;">

                <a class="tabs_align <?php active(array('all_cat_sub.php','add_cat_or_sub_category.php','category_sub_edit.php')); ?>" href="javascript:;" >
                   
                    <span class="<?php active('all_cat_sub.php'); ?>">Category & subcategory</span>
                </a>

                <ul class="sub">
    
                    <li class="<?php active(array('all_cat_sub.php','category_sub_edit.php')); ?>" style="" >
                      <a  href="all_cat_sub.php"><span style=""> 
                        All Categories & Sub ca<B>..</B></span>
                      </a>
                    </li>
                    <li class="<?php active('add_cat_or_sub_category.php'); ?>" >
                      <a  href="add_cat_or_sub_category.php">
                        <span style="">Add New Category</span>
                      </a>
                    </li>
                </ul>
            </li>
    
            <li class="sub-menu active" style="margin-right:0px;">
                <a class="tabs_align <?php active(array('countries.php','add_new_country_city.php','edit_country_cities.php')); ?>" href="javascript:;" >

                    <span class="<?php active('countries.php'); ?>">Countries & Cities</span>
                </a>
                <ul class="sub">

                  <li class="<?php active(array('countries.php','edit_country_cities.php')); ?>" >
                    <a  href="countries.php"><span style="">Countries &amp; Cities</span>
                    </a>
                  </li>

                  <li class="<?php active('add_new_country_city.php');  ?>" >
                    <a  href="add_new_country_city.php"><span style="">Add new country & City</span></a>
                  </li>

                   
                </ul>
            </li>
    
            <li class="sub-menu" style="margin-right:0px;">
                <a class="tabs_align <?php active(array('add_business.php','view_business.php')); ?>" href="javascript:;" >                       
                  <span class="">Businesses</span>
                </a>
                <ul class="sub">
                    <li class="<?php active('view_business.php'); ?>" ><a  href="view_business.php"><span style="">View Businesses</a></li>
                    <li class="<?php active('add_business.php'); ?>" ><a  href="add_business.php"><span style=""> Add Businesses</span></a></li>

                </ul>
            </li>

            <li class="sub-menu" style="margin-right:0px;">
                <a class="tabs_align <?php active(array('claimed_business_letter.php','claim_business.php','claimed_business_detail.php','claimed_approved_business.php')); ?>" href="javascript:;" >                       
                  <span class="">Claim Business</span>
                </a>
                <ul class="sub">
                    <li class="<?php active('claim_business.php'); ?>" ><a  href="claim_business.php"><span style="">Requests</a></li>
                    <li class="<?php active('claimed_approved_business.php'); ?>" ><a  href="claimed_approved_business.php?k="><span style=""> Claimed Businesses</span></a></li>

                </ul>
            </li>
          <?php } ?>

          <?php if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Advertising")==0){ ?>
          <li class="sub-menu" style="margin-right:0px;">
              <a class="tabs_align <?php active(array('approved_adds.php','addrequests.php','declined_ads.php','ad_objective.php','search_for_advert_account.php','budget_schedule.php','media_text.php','payment_method.php')); ?>" href="javascript:;" >
                 
                  <span class="">Ad Manger</span>
              </a>
              <ul class="sub">
                  <li class="<?php active('approved_adds.php'); ?>" >
                    <a  href="approved_adds.php"><span style=""> Approved Adds</span></a>
                  </li>
                  <li class="<?php active('addrequests.php'); ?>" >
                    <a  href="addrequests.php?msg="><span style=""> Pending Adds</span></a>
                  </li>
                  <li class="<?php active('declined_ads.php'); ?>" >
                    <a  href="declined_ads.php?msg="><span style="">  Declined Adds</span></a>
                  </li>
                 <!-- <li class="//active('sliders.php'); " > 
                   <a  href="sliders.php"><span style="">  Default Adds</span></a>
                  </li> -->
                  <li class="<?php active(array('ad_objective.php','search_for_advert_account.php','budget_schedule.php','media_text.php','payment_method.php')); ?>" >
                    <a  href="ad_objective.php"><span style="">New Ad</span></a>
                  </li>

              </ul>
          </li>

          <?php } ?>

          <?php if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Legal")==0 || strcmp($_SESSION['admin_type'], "General")==0){ ?>
          <li class="sub-menu" style="margin-right:0px;">
              <a class="tabs_align" href="../../about/" target="_blank">
                
                  <span class="" >Yammz it Policy</span>
              </a>
          </li>

          <?php } ?>

          <?php if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "I.T Technical")==0){ ?>

            <li class="sub-menu" style="margin-right:0px;">
                <a class="tabs_align <?php active(array('manage_accounts.php','create_new_admin_account.php','adminAccountDetails.php')); ?>" href="javascript:;" >                       
                  <span class="">Create Accounts</span>
                </a>
                <ul class="sub">
                    <li class="<?php active(array('manage_accounts.php','adminAccountDetails.php')); ?>" ><a  href="manage_accounts.php"><span style="">Manage Accounts</a></li>
                    <li class="<?php active('create_new_admin_account.php'); ?>" ><a  href="create_new_admin_account.php"><span style=""> Create New Admin Account</span></a></li>

                    <li class="<?php //active('create_new_admin_account.php'); ?>" ><a  href="#"><span style="">Register New Department</span></a></li>

                    <li class="<?php //active('create_new_admin_account.php'); ?>" ><a  href="#"><span style="">Register New Branch</span></a></li>

                </ul>
            </li>

          <?php } ?>

      </ul>
      <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end
















