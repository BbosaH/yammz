<?php 
  include("header.php");
   require_once "classes/connector.php";
  $conn = new connector();
  $user_type=$_SESSION['admin_type'];
?>
<style type="text/css">
  #country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
  #country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;cursor:pointer;}
  #country-list li:hover{background:#F0F0F0;}
  #search-box{padding: 10px;border: #F0F0F0 1px solid;}
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
                <a href="ad_objective.php" onclick="Advert_register_back_button('ad_objective.php','ad_objective_state');" class="btn noborder_radius active_menu_button" style="color:#ffffff;">Ad Objective</a>
                <a href="#" class="btn active_menu_button" style="color:#ffffff;">Search for Advert<br/> Account</a>
                <a href="#" class="btn un_active_menu_button">Audience / Placement<br/> Budget & schedule</a>
                <a href="#" class="btn un_active_menu_button">Media & Text</a>
                <a href="#" class="btn noborder_radius un_active_menu_button">Payment method</a>
              </div>
              <!-- End of top navigation -->
              <!-- Start of down navigation -->
              <div class="col-lg-12 noSidePadding left7_width99">
                <div class="form-panel " style="height:60px;padding-top:3px;box-shadow:none;">         
                  <div class="panel-body" >
                   <p class="boldtext font16">Create the user's advert account.</p> 

                  </div>
                </div>
              </div>
              <!-- End of down navigation-->


              <div class="col-lg-12 noSidePadding left7_width99 topminus17" >
                <div class="form-panel " style="padding-top:3px;box-shadow:none;">         
                  <div class="panel-body">

                    <!-- <form> -->
                    <div class="row">
                      <div class="col-lg-8 col-md-8">                       
                        

                        <div class="row top10" >
                          <div class="col-md-3 "> 
                             <label id="business_name_msg"></label>                         
                            <label class="pull-right">Business Name</label>
                              <div id="bis_id"></div>
                          </div>
                          <div class="col-md-7 ">
                          
                            <input type="text" name="business_name" id="search-box" class="form-control noborder_radius" required>
                            <div id="suggesstion-box" size="20" maxlength="30"></div>                            
                          </div>
                          <div class="col-md-1 ">
                           
                            <button class="ymz_red" style="border-radius:6px;border:0px;height:30px;width:60px;color:#ffffff;margin-left:-20px;margin-top:5px;">Search</button>
                          </div>
                          <div class="col-md-1 ">
                             <div id="tick" style="margin-top:15px;"><i class="" style="color:#79B183;margin-left:-15px;font-size:20px;"></i></div>
                          </div>
                          <div class="col-md-1 "></div>
                        </div>

                        <div id="available_folders"></div>

                        <div id="folder_creation"></div>

                        <!-- <div class="row top10" >
                          <div class="col-md-3 ">                           
                            <label class="pull-right">Folder Name</label>
                              <div id="bis_id"></div>
                          </div>
                          <div class="col-md-4 ">
                            <input type="text" name="business_name" id="" class="form-control noborder_radius" required>
                            <div id="suggesstion-box" size="20" maxlength="30"></div>                            
                          </div>
                          <div class="col-md-1 ">
                           
                          </div>
                          <div class="col-md-1 ">
                             
                          </div>
                          <div class="col-md-1 "></div>
                        </div> -->

                        <hr class="advert_line" style="margin-top:30px;"></hr>

                          <div class="row">
                            <div class="col-md-3 ">
                              <label class="pull-right">Currency</label>
                            </div>
                            <div class="col-md-7 ">
                              <select class="form-control noborder_radius" name="currency" id="currency" style="width:120px;" onchange="currency(this.value);">
                                <option value="USD">United States Dollar</option>
                                <?php

                                  $currencies=$conn->Country_currencies();
                          
                                  foreach ($currencies as $key => $value) {
                                    echo "<option value='".$key."'>".$value."</option>";
                                  }
                                  
                                 ?>
                              </select>
                            </div>
                            <div class="col-md-1 ">
                              
                            </div>
                            <div class="col-md-1 "></div>
                          </div>
                          <h1>
                            <?php 

                              // $exchange=$conn->exchangeRate("USD","UGX",1000);

                              // var_dump($exchange);

                             ?>
                          </h1>
                          <div class="row top10">
                            <div class="col-md-3 ">
                              <label class="pull-right">Account country</label>
                            </div>
                            <div class="col-md-7 ">
                              <select class="form-control noborder_radius" name="account_country" id="account_country" style="width:150px;" onchange="fillTimeZone(this.value);">
                                <option value="115518002958331">Uganda</option>
                                <?php 
                                    $c=$conn->getAllCountries();
                                    foreach ($c as $key => $value) {
                                      echo '<option value='.$value["id"].'>'.$value["name"].'</option>';
                                    }
                                 ?>
                                
                              </select>

                            </div>
                            <div class="col-md-1 ">
                              
                            </div>
                            <div class="col-md-1 "></div>
                          </div>

                          <div class="row top10">
                            <div class="col-md-3 ">
                              <label class="pull-right">Time zone</label>
                            </div>
                            <div class="col-md-7 ">
                              <select class="form-control noborder_radius timezone" name="timezone" id="timezone" style="width:190px;">
                                <!-- <div id="timezone"> -->
                                  <!-- <option>Nairobi /Kenya</option> -->
                                <!-- </div> -->                                
                              </select>
                              
                            </div>
                            <div class="col-md-1 ">
                              
                            </div>
                            <div class="col-md-1 "></div>
                          </div>

                          <div class="row top10">
                            <div class="col-md-3 ">
                              
                            </div>
                            <div class="col-md-7 ">
                              <div class="row">
                                <div class="col-md-5 col-lg-5 boldtext">Local Time</div>
                                <div class="col-md-5 col-lg-5 boldtext">GMT Time</div>
                                
                              </div>
                            </div>
                            <div class="col-md-1 ">
                              
                            </div>
                            <div class="col-md-1 "></div>
                          </div>

                          <div class="row">
                            <div class="col-md-3 ">
                              
                            </div>
                            <div class="col-md-7 ">
                              <div class="row">
                                <div class="col-md-5 col-lg-5"><div id="local_time"></div></div>
                                <div class="col-md-5 col-lg-5"><div id="gmt"></div></div>
                                <!-- <div class="col-md-4 col-lg-4"></div> -->
                              </div>
                            </div>
                            <div class="col-md-1 ">
                              
                            </div>
                            <div class="col-md-1 "></div>
                          </div>

                          <hr class="advert_line"></hr>

                          <div class="row" style="margin-top:30px;">
                            <div class="col-md-3 ">
                              <label class="pull-right">Marketing agent code<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(optional)</label>
                            </div>
                            <div class="col-md-7 ">
                              <div class="row">
                                <div class="col-md-8 col-lg-8">
                                  <input type="text" class="form-control noborder_radius" id="agent_code" style="background-color:#F2F2F2;border-color:#F2F2F2;">
                                </div>                                
                                <div class="col-md-4 col-lg-4"></div>
                              </div>
                            </div>
                            
                          </div>

                      </div>
                      <div class="col-lg-1 col-md-1" style="margin-right:-45px;">
                        <hr style="height:400px;width:2px;background-color:#F2F2F2;border-color:#F2F2F2;margin-top:-7px;margin-bottom:-5px;"></hr>
                      </div>
                      <div class="col-lg-3 col-md-3" >
                        <h5 class="boldtext" style="margin-top:-7px;">Search for a claimed business</h5>
                        <p class="font11">To create an ad for business, the business should be claimed for before creating a news ad for the business</p>
                        
                        <div style="height:35px;"></div>
                        <h5 class="boldtext">Currency and Timezone</h5>
                        <p class="font11">All of your advertising billings and reporting data will be recorded in this currencyand Nairobi / kenya timezone.</p>
                        <p>To change these in the future, you will have to create a new advert account.</p>

                        <div style="height:55px;"></div>
                        <h5 class="boldtext">Marketing Agent code</h5>
                        <p class="font11">This code is only given to marketing agents of the company. Ask the marketing agent to enter this code.This is optional</p>
                      </div>
                    </div>
                                        
                  </div>
                </div>
              </div>
              <div class="col-lg-12 noSidePadding left7_width99" >
              
                <button class="pull-left left10" style="height:30px;width:60px;border:0px;border-radius:4px;background-color:#ffffff;font-weight:bold;" onclick="Advert_register_back_button('ad_objective.php','ad_objective_state');">Back</button>
                <label class="" id="load_status" style="margin-left:40%;margin-top:5px;"></label>
                <button class="pull-right right10 ymz_red" style="height:30px;color:#ffffff;border:0px;border-radius:4px;" onclick="search_for_advert_account_continue();" >Continue</button>
              </div>
              <!-- </form> -->
            </div> 
          </div>

        <br/><br/><br/><br/><br/>
     </section>

    </section>
    <!--***************end content**************-->
    <script type="text/javascript">
     
      document.onload=search_for_advert_account_load();

    </script>
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>
<script src="myjs/search.js"></script>

