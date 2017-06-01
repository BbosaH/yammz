<?php 
  include("header.php");
   require_once "classes/connector.php";
  $conn = new connector();
  $user_type=$_SESSION['admin_type'];

?>

<section id="container" >
    <?php 
      include("heading.php");
    ?>

    <?php 
      include("sidemenu.php");
    ?>
    <!--/*************main content************/-->
    
    <section id="main-content">
      <section class="wrapper" >

          <div class="row">
            <div class="col-lg-12 col-md-12 col-xlg-12">
              
              <!-- Top Navigation -->
              <div class="col-lg-12 btn-group btn-group-justified" style="margin-top:10px;">
                <a href="ad_objective.php" onclick="Advert_register_back_button('ad_objective.php','ad_objective_state');" class="btn noborder_radius active_menu_button" style="color:#ffffff;">Ad Objective</a>
                <a href="search_for_advert_account.php" onclick="Advert_register_back_button('search_for_advert_account.php','search_for_advert_account_state');" class="btn active_menu_button" style="color:#ffffff;">Search for Advert<br/> Account</a>
                <a href="#"  class="btn active_menu_button">Audience / Placement<br/> Budget & schedule</a>
                <a href="#"  class="btn un_active_menu_button">Media & Text</a>
                <a href="#"  class="btn noborder_radius un_active_menu_button">Payment method</a>
              </div>
              <!-- End of top navigation -->
              <!-- Start of down navigation -->
              <div class="col-lg-12 noSidePadding left7_width99">
                <div class="form-panel " style="height:60px;padding-top:3px;box-shadow:none;">         
                  <div class="panel-body" >
                   <p class="boldtext font16">Audience</p> 

                  </div>
                </div>
              </div>
              <!-- End of down navigation-->

              <div class="col-lg-12 noSidePadding left7_width99 topminus17" >
                <div class="form-panel " style="padding-top:3px;box-shadow:none;">         
                  <div class="panel-body">

                    <form>

                    <div class="row">
                      <div class="col-lg-8 col-md-8">

                        <div class="row top10" >
                          <div class="col-md-3 ">
                            <label class="pull-right"></label>
                          </div>
                          <div class="col-md-9 ">
                            <label class="boldtext">Everybody in this Location</label>
                          </div>                         
                        </div>                        
                        <div class="row top10" >
                          <div class="col-md-3 ">
                            <label class="pull-right">Location</label>
                            <div id="city_list_ids" style="display:none"></div>
                            <div id="country_list_ids" style="display:none"></div>
                            <div id="category_list_ids" style="display:none"></div>
                            <div id="sub_category_list_ids" style="display:none"></div>
                          </div>
                          <div class="col-md-9 ">
                            <div class="panel panel-default noborder_radius">
                              <div class="panel-body">
                                <div id="country_list"></div>
                                <hr class="advert_location_line64">
                                <div style="margin-bottom:-4px;">                                  
                                  <input type="text" id="location_search"  class="no_focus budget_input_search" name="" placeholder="Search for Country or City">                                
                                  
                                  <a style="border:0px;background-color:#ffffff;color:#5A5A5A;font-weight:bold;">browse</a>
                                </div>
                                <div id="hidden_line"></div>
                                <div id="suggesstion-box" size="20" maxlength="30" class="cursor"></div>
                              </div>
                            </div>
                          </div>                          
                        </div>
                        <div id="city_list_input"></div>
                        <div class="row top10" >
                          <div class="col-md-3 ">
                            <label class="pull-right">Age</label>
                          </div>
                          <div class="col-md-1">
                            <select id="min_age" class="selectfields2">
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                            </select>
                          </div>
                          <div class="col-md-1">
                            <select id="max_age" class="selectfields2">
                              <option value="100">100</option>
                              <option value="99">99</option>
                              <option value="98">98</option>
                              <option value="97">97</option>
                              <option value="100">96+</option>
                            </select>                            
                          </div>                           
                        </div>

                        <div class="row top10" style="margin-bottom:-12px;" >
                          <div class="col-md-3 ">
                            <label class="pull-right">Gender</label>
                          </div>
                          <div class="col-md-5">
                          
                            <div class="col-lg-12 btn-group" style="margin-top:-2px;margin-left:-15px;">
                              
                              <a class="btn gender_options_unactive black height25" id="all" onclick="activeGender('All');">All</a>
                              <a class="btn gender_options_unactive black height25" id="male" onclick="activeGender('Male');">Male</a>
                              <a class="btn gender_options_unactive black height25" id="female" onclick="activeGender('Female');">Female</a>
                              <input type="hidden" name="" value="All" id="active_gender_item">
                            </div>
                            
                          </div>
                          <div class="col-md-3">
                                                       
                          </div>                           
                        </div>


                        <hr class="advert_line" style="margin-top:30px;"></hr>

                        <div class="row top10" >
                          <div class="col-md-3 ">
                            <label class="pull-right">Categories & <br/>subcategories</label>
                          </div>
                          <div class="col-md-9 ">
                            <div class="panel panel-default noborder_radius">
                              <div class="panel-body">
                                <div id="category_list"></div>
                                <hr class="advert_location_line64">
                                <div style="margin-bottom:-4px;">                                  
                                  <input type="text" class="no_focus budget_input_search" id="search_box_cat" name="" placeholder="Search for Categories & subcategories">
                                  <a style="border:0px;background-color:#ffffff;color:#5A5A5A;font-weight:bold;">browse</a>
                                </div>
                                <div id="hidden_line_cat"></div>
                                <div id="suggesstion_box_cat" size="20" maxlength="30" class="cursor"></div>
                              </div>
                            </div>
                          </div>                          
                        </div>
                        
                      </div>
                      <div class="col-lg-1 col-md-1 col-xl-1 hidden-xs hidden-sm" style="margin-right:-45px;">
                        <hr style="height:350px;width:2px;background-color:#F2F2F2;border-color:#F2F2F2;margin-top:-7px;margin-bottom:-5px;"></hr>
                      </div>
                      <div class="col-lg-3 col-md-3" >
                        <h5 class="boldtext" style="margin-top:-7px;">Who sees your Ad</h5>
                        <p class="font11">Select who you would like to show your Ad to by filing the needed information that will filter outany people who you would not like your Ad to reach</p>                        
                        
                      </div>
                    </div>
                    </form>                    
                  </div>
                </div>
              </div>

               <div class="col-lg-12 noSidePadding left7_width99">
                <div class="form-panel " style="height:40px;padding-top:0px;box-shadow:none;">         
                  <div class="panel-body" >
                   <p class="boldtext font14">Ad placement and budget</p> 

                  </div>
                </div>
              </div>

              <div class="col-lg-12 noSidePadding topminus8_left7_width99">
                <div class="form-panel " style="margin-top:0px;box-shadow:none;">         
                  <div class="panel-body" >

                  <!-- Row 1 -->
                   <div class="row">
                     <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">

                       <div class="row">
                         <div class="col-md-1 col-lg-1 col-xl-1 col-xs-1 col-sm-1">
                           <div class="top60"><input type="radio" id="Desktop_Right" value="" name="budget" onclick="advert_type_selected(this.value);"></div>
                         </div>
                         <div class="col-md-7 col-lg-7 col-xl-7">
                            <img src="../../../admin/Theme/uploads/righ_ hand side_1.png" style="width:300px;height:230px;">
                         </div>
                         <div class="col-md-4 col-lg-4 col-xl-4">
                           <label class="top60"><span class="boldtext" style="font-size:20px;">
                           <?php //echo $currency.": ".number_format($excahnge_rate*19.99,2); ?>
                           <span id="desktop_right_hand"></span>
                           </span> per week</label>
                         </div>
                       </div>

                       <div class="row">
                         <div class="col-md-12 col-lg-12 col-xl-12 col-xs-1 col-sm-12">
                           <h5 class="boldtext">Right Hand Side Ad Desktop</h5>
                           <p class="font11">A right hand side ad space that shows randomly on different pages.</p>
                         </div>                        
                       </div>

                     </div>
                     <div class="col-md-1 col-lg-1 col-xl-1 hidden-sm hidden-xs" style="width:10px;">
                       <hr class="vertical_line_bg" style="width:4px;height:310px;margin-left:0px;margin-bottom:-20px;margin-top:-10px;" />
                     </div>
                     <div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12">
                       
                      <div class="row" >
                         <div class="col-md-1 col-lg-1 col-xl-1 col-xs-1 col-sm-1">
                           <div class="top60"><input type="radio" name="budget" id="Mobile_Side" value="" onclick="advert_type_selected(this.value);"></div>
                         </div>
                         <div class="col-md-4 col-lg-4 col-xl-4">
                            <img src="../../../admin/Theme/uploads/Mobile_slide_ad.png" style="width:120px;height:235px;">
                         </div>
                         <div class="col-md-7 col-lg-7 col-xl-7">
                           <label class="top60"><span class="boldtext" style="font-size:20px;margin-left:-12px;"><?php //echo $currency.": ".number_format($excahnge_rate*11.99,2); ?>
                             <span id="mobile_slide"></span>
                           </span> per week</label>
                         </div>
                       </div>

                       <div class="row">
                         <div class="col-md-12 col-lg-12 col-xl-12 col-xs-1 col-sm-12">
                           <h5 class="boldtext">Mobile Side Ad</h5>
                           <p class="font11">This type of Ad only shows on the mobile app news feeds page.</p>
                         </div>                        
                       </div>

                     </div>
                   </div>

                    <div class="row">
                      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                        <hr class="advert_line2" />
                      </div>
                    </div>

                    <!-- End of row 1 -->

                    <!-- Row 2 -->
                    <div class="row">
                     <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">

                       <div class="row">
                         <div class="col-md-1 col-lg-1 col-xl-1 col-xs-1 col-sm-1">
                           <div class="top60"><input type="radio" name="budget" id="Desktop_Advertising_Login" value="" onclick="advert_type_selected(this.value);"></div>
                         </div>
                         <div class="col-md-7 col-lg-7 col-xl-7">
                            <img src="../../../admin/Theme/uploads/desktop_ad_1.png" style="width:400px;height:200px;margin-left:-30px;">
                         </div>
                         <div class="col-md-4 col-lg-4 col-xl-4">
                           <label class="top60 left20"><span class="boldtext" style="font-size:20px;"><?php //echo $currency.": ".number_format($excahnge_rate*9.99,2); ?>
                             <span id="desktop_before_login"></span>
                           </span> per week</label>
                         </div>
                       </div>

                       <div class="row">
                         <div class="col-md-12 col-lg-12 col-xl-12 col-xs-1 col-sm-12">
                           <h5 class="boldtext top40">A Desktop Advertising before Login</h5>
                           <p class="font11">This Ad can only be viewed on the desktop, laptop or tablets.</p>
                         </div>                        
                       </div>

                     </div>
                     <div class="col-md-1 col-lg-1 col-xl-1 hidden-sm hidden-xs" style="width:10px;">
                       <hr class="vertical_line_bg" style="width:4px;height:330px;margin-left:0px;margin-bottom:-20px;margin-top:-10px;" />
                     </div>
                     <div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12">
                       
                      <div class="row" >
                         <div class="col-md-1 col-lg-1 col-xl-1 col-xs-1 col-sm-1">
                           <div class="top60"><input type="radio" name="budget" id="News_feed" value="" onclick="advert_type_selected(this.value);"></div>
                         </div>
                         <div class="col-md-7 col-lg-7 col-xl-7">
                            <img src="../../../admin/Theme/uploads/Newsfeed_ad1.png" style="width:260px;height:200px;">
                         </div>
                         <div class="col-md-4 col-lg-4 col-xl-4">
                           <label class="top60"><span class="boldtext" style="font-size:20px;margin-left:5px;"><?php //echo $currency.": ".number_format($excahnge_rate*14.99,2); ?>
                             <span id="newsfeeds_ad"></span>
                           </span> per week</label>
                         </div>
                       </div>

                       <div class="row">
                         <div class="col-md-12 col-lg-12 col-xl-12 col-xs-1 col-sm-12">
                           <h5 class="boldtext top40">News feed Ads (Recommended)</h5>
                           <p class="font11">Have your Ads show up in users newsfeeds as sponsored or recommended Ads.</p>
                         </div>                        
                       </div>

                     </div>
                   </div>

                    <div class="row">
                      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                        <hr class="advert_line" />
                      </div>
                    </div>
                    <!-- End of Row 2 -->

                    <!-- Row 3 -->
                    <div class="row">
                      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                          <h5 style="margin-top:-6px;margin-bottom:-6px;" class="boldtext">Search engine Ad (Highly Recommended)</h5>
                      </div>
                    </div>
                    <!-- End of Row 3 -->
                    <div class="row">
                      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                        <hr class="advert_line" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                        
                        <div class="row">
                         <div class="col-md-1 col-lg-1 col-xl-1 col-xs-1 col-sm-1">
                           <div class="top60"><input type="radio" name="budget" id="Search_engine" value="" onclick="advert_type_selected(this.value);"></div>
                         </div>
                         <div class="col-md-3 col-lg-3 col-xl-3">
                            <img src="../../../admin/Theme/uploads/search_ad_1.png" style="width:300px;height:200px;margin-left:-30px;">
                         </div>
                         <div class="col-md-6 col-lg-6 col-xl-6">
                          <div class="left20">
                            <h5 class="boldtext">Search engines Advert (Highly Recommended)</h5>
                            <p class="font11">Have your business show up first each time someone searches in <br/> the category of your choosing by bidding for 
                            the Top spot in our <br/>category search engine</p>
                            <span class="boldtext" style="font-size:20px;"><?php //echo $currency.": ".number_format($excahnge_rate*17.99,2); ?>
                              <span id="search_engine_ad"></span>
                            </span> per week
                          </div>
                           
                         </div>
                       </div>
                        <br/>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Last section of Ad schedule -->
              <div class="col-lg-12 noSidePadding left7_width99">
                <div class="form-panel " style="height:40px;padding-top:0px;box-shadow:none;">         
                  <div class="panel-body" >
                   <p class="boldtext font14">Ad Schedule</p> 

                  </div>
                </div>
              </div>

              <div class="col-lg-12 noSidePadding topminus8_left7_width99">
                <div class="form-panel " style="margin-top:0px;box-shadow:none;">         
                  <div class="panel-body" >
                    <div class="row">
                      <div class="col-lg-8 col-md-8" >
                        <p>Define how many weeks you would like your Ad to run and the start date.</p>

                        <div class="row top20">
                          <div class="col-lg-2 col-md-2"> 
                          <label class="pull-right">Ad Budget</label>
                          </div>
                           <div class="col-lg-3 col-md-3">
                             <select class="noborder_radius selectfields" id="ad_budget_choice" onchange="adBudgetSelect(this.value);">
                               <?php $dat=$conn->getAdTypeDetails("","");
                                $default_currency=$dat[0]["cost_per_week"];
                                foreach ($dat as $key => $value) {
                                ?>
                               <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>

                              <?php } ?>
                             </select>
                             
                           </div>
                        </div>
                        <div class="row top20">
                          <div class="col-lg-2 col-md-2"> 
                          <label class="pull-right">Budget</label>
                          </div>
                           <div class="col-lg-4 col-md-4">
                             <select class="noborder_radius selectfields" id="budeget_option" >
                              
                             </select>
                             <span>per week</span>
                           </div>
                        </div>

                        <div class="row top20">
                          <div class="col-lg-2 col-md-2"> 
                          <label class="pull-right">No of weeks</label>
                          </div>
                           <div class="col-lg-3 col-md-3">
                             <select class="noborder_radius selectfields" id="weeks" onclick="week_budget_calc(this.value);">
                               <option value="1">1 week</option>
                               <option value="2">2 weeks</option>
                               <option value="3">3 weeks</option>
                               <option value="4">4 weeks</option>
                               <option value="5">5 weeks</option>
                             </select>
                             <span>per week</span>
                           </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                            <hr class="advert_line3" />
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                            <p class="font18 boldtext" style="margin-left:30%;">Total Cost:
                              <span id="total_budget">                            
                              <!-- <span id="final_weekly_total_budget"></span> -->
                              <!-- <span id="final_weekly_total_budget"></span> -->
                            </span>
                            </p>
                            <input type="hidden" id="total_advert_cost" value name="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                            <hr class="advert_line3" />
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                            <h5 class="boldtext">Bidding for Ad placing</h5>
                            <div class="row">
                              <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                                <!-- 
                                <p>Restaurants</p> -->
                                <div id="bidding_for_ad"></div>
                               <!--  <h6>
                                  <span class="boldtext">1st place at </span>
                                  <span style="font-weight:lighter;">$16</span>
                                   <span style="color:#AAAAAA;">per week</span>
                                 </h6>

                                <h6>
                                  <span class="boldtext">2nd place at </span>
                                  <span style="font-weight:lighter;">$15</span> 
                                  <span style="color:#AAAAAA;">per week</span>
                                </h6>
                                <h6>
                                  <span class="boldtext">3rd place at </span>
                                  <span style="font-weight:lighter;">$14</span> 
                                  <span style="color:#AAAAAA;">per week</span>
                                </h6>
                                <h6>
                                  <span class="boldtext">4th place at </span>
                                  <span style="font-weight:lighter;">$12.99</span> 
                                  <span style="color:#AAAAAA;">per week</span>
                                </h6> -->
                                

                                <div class="row">
                                  <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                                    <hr class="advert_line3" />
                                  </div>
                                </div>

                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-3 hidden-sm hidden-xs">
                                
                              </div>
                              <div class="col-md-5 col-lg-5 col-xl-5 col-sm-12 col-xs-12">
                                <!-- <p class="boldtext">Clubs</p>
                                <h6>
                                  <span class="boldtext">1st place at </span>
                                  <span style="font-weight:lighter;">$16</span>
                                   <span style="color:#AAAAAA;">per week</span>
                                 </h6>

                                <h6>
                                  <span class="boldtext">2nd place at </span>
                                  <span style="font-weight:lighter;">$15</span> 
                                  <span style="color:#AAAAAA;">per week</span>
                                </h6>
                                <h6>
                                  <span class="boldtext">3rd place at </span>
                                  <span style="font-weight:lighter;">$14</span> 
                                  <span style="color:#AAAAAA;">per week</span>
                                </h6>
                                <h6>
                                  <span class="boldtext">4th place at </span>
                                  <span style="font-weight:lighter;">$12.99</span> 
                                  <span style="color:#AAAAAA;">per week</span>
                                </h6>

                                <div class="row">
                                  <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                                    <hr class="advert_line3" />
                                  </div>
                                </div>                          
                                
                                -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 col-md-12">
                            <span id="alert_message" style="color:#BE2633;"></span> 
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-7 col-md-7">                             
                              <div class="row">
                                <div class="col-lg-4 col-md-4"> 
                                <label style="font-size:12px;">Set your budget</label>
                                </div>
                                 <div class="col-lg-8 col-md-8">                                   
                                   <input class="selectfields44" id="final_budget_set" onchange="setBill(this.value);" type="number" name="" value="">
                                   <span class="faintgrey">per week</span>

                                 </div>
                              </div>
                          </div>
                          
                        </div>

                        <!-- <div class="row">
                          <div class="col-lg-12 col-md-12"> 
                            <p class="top20 boldtext">pubs</p>
                                <h6>
                                  <span class="boldtext">1st place at </span>
                                  <span style="font-weight:lighter;">$16</span>
                                   <span style="color:#AAAAAA;">per week</span>
                                 </h6>

                                <h6>
                                  <span class="boldtext">2nd place at </span>
                                  <span style="font-weight:lighter;">$15</span> 
                                  <span style="color:#AAAAAA;">per week</span>
                                </h6>
                                <h6>
                                  <span class="boldtext">3rd place at </span>
                                  <span style="font-weight:lighter;">$14</span> 
                                  <span style="color:#AAAAAA;">per week</span>
                                </h6>
                                <h6>
                                  <span class="boldtext">4th place at </span>
                                  <span style="font-weight:lighter;">$12.99</span> 
                                  <span style="color:#AAAAAA;">per week</span>
                                </h6>

                                <div class="row">
                                  <div class="col-md-4 col-lg-4 col-xl-4 col-sm-4 col-xs-4">
                                    <hr class="advert_line3" />
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-3"> 
                                  <label style="margin-right:-120px;">Set your budget</label>
                                  </div>
                                   <div class="col-lg-3 col-md-3">
                                     <select class="selectfields3">
                                       <option value="">$&nbsp;</option>
                                       <option value="$19.99">$19.99</option>
                                       <option value="$17.99">$17.99</option>
                                       <option value="$14.99">$14.99</option>
                                       <option value="$11.99">$11.99</option>
                                       <option value="$19.99">$19.99</option>
                                     </select>
                                     <span class="faintgrey">per week</span>
                                   </div>
                                </div>
                          </div>                           
                        </div> -->
                      </div>

                      <div class="col-lg-1 col-md-1 col-xl-1 hidden-xs hidden-sm " style="margin-right:-45px;">
                        <hr style="height:430px;width:2px;background-color:#F2F2F2;border-color:#F2F2F2;margin-top:-7px;margin-bottom:-5px;"></hr>
                      </div>
                      <div class="col-lg-3 col-md-3" >
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End of ad schedule section -->
              <!-- Bottom buttons -->
              <div class="col-lg-12 noSidePadding left7_width99" >
              <!--  <?php //$dd=$conn->getBilledAdPlaces($conn->gstring(2));
                    //var_dump($dd);
                ?> -->
                <button class="pull-left left10" style="height:30px;width:60px;border:0px;border-radius:4px;background-color:#ffffff;font-weight:bold;" onclick="Advert_register_back_button('search_for_advert_account.php','search_for_advert_account_state');">Back</button>
                <label class="" id="load_status" style="margin-left:40%;margin-top:5px;"></label>
                <button class="pull-right right10 ymz_red" style="height:30px;color:#ffffff;border:0px;border-radius:4px;" onclick="buget_schedule_continue();">Continue</button>
              </div>

              <div class="col-lg-12 noSidePadding left7_width99" style="min-height:50%;" >
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br>
              </div>

            </div> 
          </div>

     </section>

    </section>
    <!--***************end content**************-->
    <script type="text/javascript">
     
      window.load=budget_schedule_load();
    </script>
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>
<script src="myjs/country_search.js"></script>
<script src="myjs/searrch_category_sub_category.js"></script>

