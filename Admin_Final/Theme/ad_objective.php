<?php 
  include("header.php");
   require_once "classes/connector.php";
  $conn = new connector();
  $user_type=$_SESSION['admin_type'];
?>

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
              
              <!-- Top Navigation -->
              <div class="col-lg-12 btn-group btn-group-justified" style="margin-top:10px;">
                <a href="#" class="btn noborder_radius active_menu_button" style="color:#ffffff;">Ad Objective</a>
                <a href="#" class="btn un_active_menu_button">Search for Advert<br/> Account</a>
                <a href="#" class="btn un_active_menu_button">Audience / Placement<br/> Budget & schedule</a>
                <a href="#" class="btn un_active_menu_button">Media & Text</a>
                <a href="#" class="btn noborder_radius un_active_menu_button">Payment method</a>
              </div>
              <!-- End of top navigation -->
              <!-- Start of down navigation -->
              <div class="col-lg-12 noSidePadding topminus8_left7_width99">
                <div class="form-panel " style="height:500px;">         
                  <div class="panel-body" >
                   <p class="boldtext font16">Choose your objective</p> 

                   <img src="../../../admin/Theme/uploads/Campaign_Ad_image.png" style="width:170px;height:170px;margin-left:5px;cursor:pointer;margin-top:20px;" onclick="Objective('campaign');">
                   <h2 style="margin-left:45px;font-size:14px;margin-top:10px;" class="boldtext">Campaign Ad</h2>

                  </div>
                </div>
              </div>
              <!-- End of down navigation-->

            </div> 
          </div>

        <br/><br/><br/><br/><br/>
     </section>

    </section>
    <!--***************end content**************-->
    
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

