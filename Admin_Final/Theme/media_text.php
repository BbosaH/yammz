<?php 
  include("header.php");
   require_once "classes/connector.php";
  $conn = new connector();
 
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
              
              <!-- Top Navigation -->
              <div class="col-lg-12 btn-group btn-group-justified" style="margin-top:10px;">
                <a href="ad_objective.php" onclick="Advert_register_back_button('ad_objective.php','ad_objective_state');" class="btn noborder_radius active_menu_button" style="color:#ffffff;">Ad Objective</a>
                <a href="search_for_advert_account.php" onclick="Advert_register_back_button('search_for_advert_account.php','search_for_advert_account_state');" class="btn active_menu_button" style="color:#ffffff;">Search for Advert<br/> Account</a>
                <a href="budget_schedule.php" onclick="Advert_register_back_button('budget_schedule.php','budget_schedule_state');" class="btn active_menu_button">Audience / Placement<br/> Budget & schedule</a>
                <a href="#" class="btn active_menu_button">Media & Text</a>
                <a href="#"  class="btn noborder_radius un_active_menu_button">Payment method</a>
              </div>
              <!-- End of top navigation -->
              <!-- Start of down navigation -->
              <div class="col-lg-12 noSidePadding left7_width99">
                <div class="form-panel " style="height:60px;padding-top:3px;box-shadow:none;">         
                  <div class="panel-body" >
                   <p class="boldtext font16">Media</p> 

                  </div>
                </div>
              </div>
              <!-- End of down navigation-->
              <!-- <form role="form" action="" method="post" enctype='multipart/form-data'> -->
              <form id="uploadForm" action="" method="post">
                <!-- Media -->
                <div class="col-lg-12 col-md-12 col-xl-12 noSidePadding left7_width99 topminus17" >
                  <div class="form-panel " style="padding-top:3px;box-shadow:none;">         
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-8 col-md-8 col-xl-8 col-sm-12 col-xs-12">
                          <p>Choose the image or video that you would like to use in your advert</p>
                          <span class="btn btn-small btn-file">
                            &nbsp;&nbsp;&nbsp;Browse library<input type="file" name="image" id="inputfile" onchange="readURLLogo8(this)">
                          </span>
                          <br/><br/>
                         
                            <img  class="" style="width:280px;height:130px;background-color:#E9EAEE;" id="logo2" name="logo2" placeholder="" required/>

                          <!-- </div> -->

                        </div>
                        <div class="col-lg-1 col-md-1 col-xl-1 hidden-sm hidden-xs">
                           <hr style="height:200px;width:2px;background-color:#F2F2F2;border-color:#F2F2F2;margin-top:-7px;margin-bottom:-5px;margin-right:-20px;"></hr>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xl-3 col-sm-12 col-xs-12">

                          <p>Recommended Image size</p>
                          <p>1200 X 628 pixels</p>
                        </div>
                      </div>                                          
                    </div>
                  </div>
                </div>
                <!-- End of media -->
                <!-- Text -->

                <div class="col-lg-12 noSidePadding left7_width99">
                <div class="form-panel " style="height:60px;padding-top:3px;box-shadow:none;">         
                  <div class="panel-body" >
                   <p class="boldtext font16">Text</p> 

                  </div>
                </div>
              </div>

              <div class="col-lg-12 col-md-12 col-xl-12 noSidePadding left7_width99 topminus17" >
                  <div class="form-panel " style="padding-top:3px;box-shadow:none;">         
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-5 col-md-5 col-xl-5 col-sm-12 col-xs-12">
                          <p>Headline</p>
                          <input class="grey_file form-control noborder_radius" id="headline" maxlength="50" onchange="feedHeadline(this.value);" placeholder="Best Place in Town" type="text" name="" style="max-width:60%;height:25px;"> 

                          <p class="top10">Description</p>
                          <textarea class="grey_file form-control noborder_radius" id="description" style="min-height:160px;" placeholder="Short description: Dress to kill with Yammz.com's news fashion brand. 20% off of all sales." onchange="feedDescription(this.value);"></textarea>

                          <h4 class="top10">Call to action button</h4>
                          <p>Select what kind of button you would like to have on your ad</p>

                          <select class="cursor" id="act_call" style="height:25px;border-radius:4px;border:0px;background-color:#E9EAEE;" onchange="CallToAction(this.value);">
                          
                          <?php $n=$conn->getCallToAction("","");
                          foreach ($n as $key => $value) {
                             echo'<option value="'.$value["id"].'">'.$value['name'].'</option>';
                           } ?>
                          </select>

                        </div>
                        <div class="col-lg-1 col-md-1 col-xl-1 hidden-sm hidden-xs">
                           <hr style="height:570px;width:2px;background-color:#F2F2F2;border-color:#F2F2F2;margin-top:-7px;margin-bottom:-5px;margin-right:-20px;"></hr>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-xs-12">
                          <div class="row" style="margin-bottom:-20px;">
                            <div class="col-lg-2 col-md-2 col-xl-2 hidden-xs hidden-sm"></div>
                            <div class="col-lg-6 col-md-6 col-xl-6 col-sm-6 col-xs-6"><h5>Desktop</h5></div>
                            <div class="col-lg-4 col-md-4 col-xl-4 col-sm-6 col-xs-6"><h5>Mobile</h5></div>
                            <div class="col-lg-2 col-md-2 col-xl-2 hidden-xs hidden-sm"></div>
                          </div>
                          <hr class="advert_line2">
                          <p>Desktop Ad preview</p>
                          <div class="panel panel-default noborder_radius">
                            <div class="panel-body grey_file">

                              <div class="panel panel-default noborder_radius" style="margin-bottom:0px;">
                                <div class="panel-body">
                                  <!--Startof advert show -->
                                    <div class="row">
                                      <!-- column with avatar -->
                                      <div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1">
                                        <div class="outer_profile_letter">
                                                  
                                        </div>
                                      </div>
                                      <!-- End of column with avatar -->
                                      <!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
                                      <div class="col-md-9 col-lg-9 col-sm-9 col-xl-9 col-xs-9">
                                        
                                        <h6 class="left20">          
                                          <span class="profile_name" style="font-weight:bold;" id="business_name_field">Yammz.com LTD</span><br/>
                                          <span class="help-block " style="color:#CFCFCF;">Sponsored</span>
                                        </h6>
                                      </div>
                                      <div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
                                        <div class="left20">
                                          <div class="icon icon-add182 " style="color:#ECCB37;font-size:16px;margin-top:15px;"></div>
                                          <div  style="font-size:10px;margin-left:-7px;color:#C4C4C4;margin-top:-1px;">Follow</div>
                                        </div>
                                      </div>
                                    </div>
                                  <!-- End of advert show -->

                                  <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
                                      <div class="left10">                                       
                                        <p id="description_preview">Short description: Dress to kill with Yammz.com's news fashion brand. 20% off of all sales.</p>
                                        <img src="../../../admin/Theme/uploads/web_side_ad_3.png" id="post_img" name="post_img" style="width:100%;height:200px;">
                                        <label class="top10" id="headline_preview">Best Place in Town</label>
                                        <span id="action_button" class="pull-right">
                                          <div class="badge badge-default top10" style="border-radius:4px;height:20px;color:#4F4F4F;background-color:#CFCFCF;">Shop Now</div>
                                        </span>
                                      </div>
                              
                                    </div>
                                  </div>

                                  <!-- Start of likes and commenting -->
                                  <div class="left10">
                                    <div class="row">
                                      <div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
                                        <a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="">
                                          <span class="icon icon-like85 yammz_red" style="font-size:16px;"> </span>&nbsp;
                                            <span class="simplegrey grey_color font12 boldtext" style="margin-left:-7px;">10 </span>&nbsp;
                                            <span class="grey_color boldtext" style="margin-left:-7px;" class="simplegrey">Likes</span>
                                        </a>
                                      </div>
                                      <div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:-40px;">
                                        <a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
                                        <div class="row">
                                          <div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 grey_color pull-left"></div>
                                          <div class="grey_color col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;margin-top:-3px;">2 </div>
                                          <div class="grey_color col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;">Comments</div>
                                        </div>  
                                        </a>
                                      </div>
                                      <div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:0px;">
                                       
                                      </div>
                                    </div>      
                                
                                    <!-- End of Row with like and comment buttons -->
                                    <!-- start of Row with comment field -->
                                    <div style="height:5px;"></div>
                                    <div class="row">
                                      <div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
                                        <!-- <form action="" > -->
                                          <div class="form-group">
                                            <input type="text" class="form-control comment_field" placeholder="Write a comment...." disabled>
                                          </div>
                                        <!-- </form> -->

                                      </div>
                                      <div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
                                        <button class="post_send_button" disabled>Send</button>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- End of likes and commenting -->

                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>                                          
                    </div>
                  </div>
                </div>
                <!-- End of text -->
             <!--  </form>  -->        
                <!-- <form id="uploadForm" action="upload.php" method="post">
                <div id="targetLayer">No Image</div>
                <div id="uploadFormLayer">
                <label>Upload Image File:</label><br/>
                <input name="image" type="file" class="inputFile" />
                <input type="submit" value="Submit" class="btnSubmit" />
                </form> -->
                
               <!--  <div id="targetLayer">No Image</div>
                <div id="uploadFormLayer">
                <label>Upload Image File:</label><br/>
                <input name="image" type="file" class="inputFile" /> -->
                <!-- <input type="submit" value="Submit" class="btnSubmit" /> -->
                

              <!-- Bottom buttons -->
              <div class="col-lg-12 noSidePadding left7_width99" >
                <a class="pull-left left10 bottom_back" style="background-color:#BE2633;color:#FAFFF2;padding-top:6px;cursor:pointer;padding-left:12px;" onclick="Advert_register_back_button('budget_schedule.php','budget_schedule_state');">Back</a>
                <label class="" id="load_status" style="margin-left:40%;margin-top:5px;"></label>
                <button type="submit" class="pull-right right10 ymz_red bottom_continue" onclick="Media_text_continue();">Continue</button>
              </div>

              </form>
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
<script type="text/javascript">
  window.onload=media_text_load();
</script>
<?php 
  include("footer.php");
?>

