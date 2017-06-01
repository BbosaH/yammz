<?php 
  include("header.php");
   require_once "classes/connector.php";
  $conn = new connector();
  $user_type=$_SESSION['admin_type'];
?>

  <style>
    .btn-file {
      position: relative;
      overflow: hidden;
      max-width: 110%;
      height:25px;
      padding-left:2px;
      background-color:#F2F2F2;
      padding-top:4px;
      font-size:12px;
      color:#4F4F4F;
      font-weight: bold;
    }
    .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      max-width: 50px;
      max-height: 25px;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background: white;
      cursor: inherit;
      display: block;
      color:#ffffff;
      
    }

    </style>

<section id="container" >
    <?php 
      include("heading.php");
    ?>

    <?php 
      include("sidemenu.php");
    ?>
    <!--/*************main content************/-->
    <style type="text/css"></style>
    <section id="main-content">
      <section class="wrapper">
        
          <div class="row mt panel1">
            <div class="col-lg-12 col-md-12 col-xlg-12">
              <input type="hidden" name="" id="dcd" value="no">
              <!-- Top Navigation -->
              <div class="col-lg-12 btn-group btn-group-justified" style="margin-top:10px;">
                <a href="ad_objective.php" class="btn noborder_radius active_menu_button" onclick="Advert_register_back_button('ad_objective.php','ad_objective_state');" style="color:#ffffff;">Ad Objective</a>
                <a href="search_for_advert_account.php" class="btn active_menu_button" onclick="Advert_register_back_button('search_for_advert_account.php','search_for_advert_account_state');" style="color:#ffffff;">Search for Advert<br/> Account</a>
                <a href="budget_schedule.php" onclick="Advert_register_back_button('budget_schedule.php','budget_schedule_state');" class="btn active_menu_button">Audience / Placement<br/> Budget & schedule</a>
                <a href="media_text.php" onclick='Advert_register_back_button("media_text.php","media_text_state")' class="btn active_menu_button">Media & Text</a>
                <a href="payment_method.php" class="btn noborder_radius active_menu_button">Payment method</a>
              </div>
              <!-- End of top navigation -->
              <!-- Start of down navigation -->
              <div class="col-lg-12 noSidePadding left7_width99">
                <div class="form-panel " style="height:60px;padding-top:3px;box-shadow:none;">         
                  <div class="panel-body" >
                   <p class="boldtext font16">Payment Method</p> 

                  </div>
                </div>
              </div>
              <!-- End of down navigation-->
              <!-- <form> -->
                <!-- Media -->
                <div class="col-lg-12 col-md-12 col-xl-12 noSidePadding left7_width99 topminus17" >
                  <div class="form-panel " style="padding-top:3px;box-shadow:none;">         
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-8 col-md-8 col-xl-8 col-sm-12 col-xs-12">
                          <div class="row">
                              <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12 col-xs-12">
                                <p>Total Ad Payment</p>
                              </div>
                              <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12 col-xs-12">
                                <p id="success_comp_message" style="color:#BE2633;font-weight:bold;"> </p>
                              </div>
                            </div>
                          
                          <hr class="advert_line2">

                          <p class="font22 boldtext left30perc" id="total_cost">Total Cost: $ 36</p>

                          <hr class="advert_line2">
                          <div class="left30perc">
                            <div class="row">
                              <div class="col-lg-2 col-md-2 col-xl-2 col-sm-2 col-xs-2">
                                <a href="media_text.php" id="backbutton" class="btn pull-left left10 grey_file bottom_back2 black" onclick='Advert_register_back_button("media_text.php","media_text_state")'>Back</a>
                              </div>
                              <div class="col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-4">
                                <button class="pull-right right10 ymz_red bottom_continue2" onclick="Ad_placement_complete();">Payment Paid</button>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-lg-1 col-md-1 col-xl-1 hidden-sm hidden-xs">
                           <hr style="height:200px;width:2px;background-color:#F2F2F2;border-color:#F2F2F2;margin-top:-7px;margin-bottom:-5px;margin-right:-20px;"></hr>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xl-3 col-sm-12 col-xs-12">
                          <p class="font16 boldtext top20">Total amount to be paid to the counter <span id="total_value"></span></p>                         
                        </div>
                      </div>                                          
                    </div>
                  </div>
                </div>
                <!-- End of media -->
               
              <!-- </form>    -->
            </div> 
          </div>

        <br/><br/><br/><br/><br/>
     </section>

    </section>
    <!--***************end content**************-->
    <script type="text/javascript">
      window.onload=payment_method_load();

      function back(){
        
      }      
    </script>
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

