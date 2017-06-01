<?php 
  include("header.php");
  require_once "classes/connector.php";
  $conn = new connector();

  $user_id=$_GET['id'];
?>
<?php
  $full_name="";
  $tm=$conn->getAdminOfId($_GET['id']);
  foreach ($tm as $key => $value) {
    $full_name=$value['full_name'];
  }

  $requested_usertype=$conn->getUserTypeOfId($user_id);
 
?>

<section id="container" >
    <?php 
      include("heading.php");
    ?>
    <link rel="stylesheet" type="text/css" href="star_icon/styles.css">
    <style type="text/css">
      
    </style>
    <?php 
      include("sidemenu.php");
    ?>
    <!--/*************main content************/-->

    <section id="main-content">
      <section class="wrapper">
        
          <div class="row mt panel1">
            <div class="col-lg-12 col-md-12 col-xlg-12">
              <div class="col-lg-12 noSidePadding">
                
              </div>
              <div class="col-lg-12 noSidePadding">
                <div class="form-panel panel2">         
                  <div class="panel-body" >
                     <div class="row">
                          <div class="col-xs-8 col-md-8">
                           <div class="row">
                            <div class="col-xs-5 col-md-5">
                               <span class="supervisor_name"><?php echo $full_name;
                                 if(strcmp($requested_usertype, "Supervisor")==0){ ?>
                                   Team Leader.
                                   &nbsp;&nbsp;<span class="supervisor_star" class="icon icon-star"></span>
                                   <?php }else{ echo "'s Performance";} ?>

                                </span>
                                 
                            </div>
                            <span id="activate_deactivate">
                               <?php 
                                $admin_state=$conn->CheckAdminStatus($_GET['id']);
                                                                               
                                if(strcmp($admin_state, "enabled")==0){
                               ?>
                              <div class="col-xs-2 col-md-2">
                               <button class="btn form-control ymz_red supervisor_deactivate_button" id="deactivate" onclick="Admin_Deactivating('<?php echo $_GET['id']; ?>');">Deactivate</button>
                              </div>
                              <div class="col-xs-2 col-md-2">
                                <button class="btn form-control supervisor_activate_button">Activate</button>
                              </div>
                              <?php }else if(strcmp($admin_state, "disabled")==0) { ?>
                              <div class="col-xs-2 col-md-2">
                               
                               <button class="btn form-control supervisor_activate_button">Deactivate</button>
                              </div>
                              <div class="col-xs-2 col-md-2">
                                <button class="btn form-control ymz_red supervisor_deactivate_button" id="activate" onclick="Admin_activating('<?php echo $_GET['id']; ?>');">Activate</button>
                              </div>
                              <?php } ?>
                            </span>
                           </div>
                          </div>
                          <div class="col-xs-4 col-md-4">
                            <div class="height10"></div>
                            
                            <div class="row">
                              <div class="col-xs-6 col-md-6 colorwhite" class="pull-right">
                                  <span class="icon icon-notify" style="margin-left:98%"></span>&nbsp;Notifications
                              </div>
                              <div class="col-xs-6 col-md-6 colorwhite">
                                  <div class="pull-right"><span class="icon icon-email5"></span>&nbsp;Mail</div>
                              </div>
                            </div>
                             <input type="hidden" id="my_current_date" value="" name="">
                          </div>
                      </div>               
                                    

                      </div>
                        <div class="row maanager_view_super_total_wked_ads_row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 margin_left1">
                          <div class="bottom_panel" >
                           <div class="row">
                            <div class="col-md-4 col-lg-4 deep_black_background">
                             <div class="panel panel-default bottom_panel pnel_sizex">
                               <div class="panel-body">
                                 <p class="ads_worked6" >Total No of Ads Worked on</p>

                                  <?php

                                    $month=DATE("m");;

                                    $year=DATE("Y");;
                                    // echo "Month is:".$month;
                                    $id=$_GET['id'];
                                    $declined=0;
                                    $approved=0;                                    

                                    $monthly_declined=$conn->getAdminAdsDeclinedInMonth($month,$id,$year);
                                    
                                    foreach ($monthly_declined as $key => $value) {
                                        $declined=$value['result'];
                                      }

                                    $monthly_approved=$conn->getAdminAdsApprovedInMonth($month,$id,$year);
                                    
                                    foreach ($monthly_approved as $key => $value) {
                                        $approved=$value['result'];
                                      }

                                      $total=$declined+$approved;
                                     
                                      
                                  ?>
                                 <p style="margin-bottom:1px;"><span class="left_side_ads_values"><?php echo $total; ?></span> <span class="font12">Ads</span>
                                 </p>
                               </div>
                             </div>
                             <div class="bottom_panel pnel_sizeA">
                                <div class="height20"></div>
                                <p class="pnel-heding bottom30">Daily Goal</p>
                          
                                <p class="valueA"><span class="left_side_ads_values">
                                  <?php 

                                    $goal=0;
                                    $date5=date("Y-m-d");

                                    $goal=$conn->Weekly_total_ads("specific",$date5,$_GET['id']);
                                    foreach ($goal as $key => $value) {
                                      $goal=$value['result'];
                                    }
                                    
                                    echo $goal;
                                  ?>
                                </span> <span class="font12">Ads</span>
                                </p>
                                <div class="height20"></div>
                             </div>
                            </div>
                            <div class="col-md-8 col-lg-8 marginxx">
                                 
                                 <div class="row margin_minus10">
                                  <div class="col-xs-7 col-md-7">
                                    <div class=""><p class="margin_top30">Number of Ads worked on</p></div>
                                  </div>
                                  
                                   <div class="col-xs-5 col-md-5">
                                    
                                       <form class="top10_left30" style="margin-left:30px;margin-top:20px;">

                                          <div class="form-group col-md-4 rightminus20">
                                            <select class="select_style" id="year" onchange="Date_month_week_select_User_ads('year',this.value,'<?php echo $user_id; ?>');">
                                             <option value="2016">2016</option>
                                              <option value="2015">2015</option>
                                            </select>
                                          </div>
                                          <div class="form-group col-md-4 rightminus21">
                                            <select class="select_style" id="month" onchange="Date_month_week_select_User_ads('month',this.value,'<?php echo $user_id; ?>');">
                                              <option value="1">Jan</option>
                                              <option value="2">Feb</option>
                                              <option value="3">Mar</option>
                                              <option value="4">Apr</option>
                                              <option value="5">May</option>
                                              <option value="6">Jun</option>
                                              <option value="7">Jul</option>
                                              <option value="8">Aug</option>
                                              <option value="9">Sep</option>
                                              <option value="10">Oct</option>
                                              <option value="11">Nov</option>
                                              <option value="12">Dec</option>
                                             </select>
                                          </div>
                                          <div class="form-group col-md-4">
                                            <select class="select_style" id="week" onchange="Date_month_week_select_User_ads('week',this.value,'<?php echo $user_id; ?>');">
                                             <option value="1">Week 1</option>
                                              <option value="2">Week 2</option>
                                              <option value="3">Week 3</option>
                                              <option value="4">Week 4</option>
                                              <option value="5">Week 5</option>
                                            </select>
                                          </div>

                                        </form>
                                    
                                   </div>
                                 </div>
                                  <div class="row" style="margin-bottom:-10px;">
                                    <div class="col-xs-12 col-md-12">
                                     <table class="table-responsive daysselect2">
                                        
                                        <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Monday" onclick="Date_month_week_select_User_ads('days','1','<?php echo $user_id; ?>'); return false;">Monday</a></th>

                                       <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday" onclick="Date_month_week_select_User_ads('days','2','<?php echo $user_id; ?>'); return false;">Tuesday</a></th>

                                       <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Wednesday" onclick="Date_month_week_select_User_ads('days','3','<?php echo $user_id; ?>'); return false;">Wednesday</a></th>

                                       <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Thursday" onclick="Date_month_week_select_User_ads('days','4','<?php echo $user_id; ?>'); return false;">Thursday</a></th>

                                       <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Friday" onclick="Date_month_week_select_User_ads('days','5','<?php echo $user_id; ?>'); return false;">Friday</a></th>

                                       <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Yesterday" onclick="Date_month_week_select_User_ads('days','6','<?php echo $user_id; ?>'); return false;">Saturday</a></th>
                                       <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Sunday" onclick="Date_month_week_select_User_ads('days','0','<?php echo $user_id; ?>'); return false;">Sunday</a></th>
                                     </table>
                                    </div>
                                  </div>
                                 
                                 <div class="row">
                                  <div class="col-xs-8 col-sm-9 col-md-8 col-lg-8 col-xl-8">
                                    <p class="pnel-heding ads_worked_on_text">Ads worked on</p>

                                    <p style="color:#77AF80"><span class="left_ads_value" id="ads_worked_on"></span> <span class="font12">Ads</span></p>
                                  </div>
                                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                                    <p class="pnel-heding left_ads_head">Ads left</p>

                                    <p style="color:#B8233A"><span class="font30" id="adverts_left"></span> <span style="font12">Ads</span></p>
                                  </div>
                                 </div>

                                  <div class="row">
                                  <div class="col-xs-8 col-sm-9 col-md-8 col-lg-8 col-xl-8">
                                    <p class="pnel-heding ads_worked_on_text">Goal</p>

                                    <h3 style="color:#B8233A;margin-left:12px;" id="goal">Not Achieved</h3>
                                  </div>
                                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                                    <p class="pnel-heding extra_ads_text2">Extra Ads</p>

                                    <p style="color:#FEf007"><span class="font30" id="extra_ads">0</span> <span class="font12">Ads</span></p>

                                  </div>
                                 </div>
                                
                            </div>                            
                           </div>
                          </div>
                          
                        </div>
                        
                       </div>
                      
                      <div class="row" style="width:100%;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 marginyyy">
                         
                          <div class="panel panel-default bottom_panel" >
                            <div class="panel-body" >

                              <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                 <p class="ads_number00">Number of Ads Worked on</p>
                                </div>
                                
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                 <form class="marginminus45">

                                   <div class="form-group col-md-4 marginminus70">
                                     <select class="select_style" id="year33" onchange="monthly_ads_records('year',this.value,'<?php echo $_GET['id']; ?>');">
                                      <option>2016</option>
                                      <option>2015</option>
                                     </select>

                                   </div>                                  

                                 </form>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                  
                                </div>
                              </div>                              
                              <div class="row bottomminus10">
                                <div class="col-xs-12 col-md-12">
                                 <table class="table-responsive month_select">
                                 <input type="hidden" name="" id="selected_month" value="1">
                                  <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','1',<?php echo $_GET['id']; ?>); return false;">Jan</a></th>
                                  <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','2',<?php echo $_GET['id']; ?>); return false;">Feb</a></th>
                                  <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','3',<?php echo $_GET['id']; ?>); return false;">March</a></th>
                                  <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','4',<?php echo $_GET['id']; ?>); return false;">April</a></th>
                                  <th class=""><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','5',<?php echo $_GET['id']; ?>); return false;">May</a></th>
                                  <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','6',<?php echo $_GET['id']; ?>); return false;">June</a></th>
                                 <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','7',<?php echo $_GET['id']; ?>,<?php echo $_GET['id']; ?>); return false;">July</a></th>
                                 <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','8',<?php echo $_GET['id']; ?>); return false;">Aug</a></th>
                                 <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','9',<?php echo $_GET['id']; ?>); return false;">Sept</a></th>
                                 <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','10',<?php echo $_GET['id']; ?>); return false;">Oct</a></th>
                                 <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','11',<?php echo $_GET['id']; ?>); return false;">Nov</a></th>
                                 <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="monthly_ads_records('months','12',<?php echo $_GET['id']; ?>); return false;">Dec</a></th>
                                 </table>
                                </div>
                              </div>
                              <?php //Including default for number of ads worked on in a month, goal for that month,extra ads for that month
                                require_once("year_month_ads_defaults.php"); 
                              ?>
                              <div class="row bottomminus10">
                                 <div class="col-xs-4 col-md-4">
                                   <p class="pnel-heding manager_supervisor_middle_performance_text" >Ads worked on this Month</p>

                                    <h3 style="color:#B8233A;font-weight:bold;"><span id="thismonth_ads" class="manager_supervisor_middle_performance_text"><?php echo $total_work; ?></span> <span class="font12" id="this_month_text1">Ads</span></h3>

                                 </div>
                                 <div class="col-xs-4 col-md-4">

                                   <p class="pnel-heding manager_supervisor_middle_performance_text">Goal</p>

                                    <h3><span id="thismonth_goal_achieve" style="margin-left:12px;color:<?php echo $print_color; ?>;"><?php echo $goal; ?>
                                    
                                    </span></h3>

                                 </div>
                                 <div class="col-xs-4 col-md-4">
                                   <p class="pnel-heding manager_supervisor_middle_performance_text">Extra Ads</p>

                                    <h3 style="color:#FEf007"><span class="manager_supervisor_middle_performance_text" id="thismonth_extra_ads"><?php echo $extra_ads; ?></span> <span class="font12">Ads</span></h3>

                                 </div>
                              </div>

                            </div>
                          </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 left_margin0_width100">
                          <div class="panel panel-default bottom_panel" >
                            <div class="panel-body" >
                              
                              <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                 <p class="ads_number00"><?php echo $full_name; ?>'s Performance.</p>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                  
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                 <form style="margin-left:10px;">

                                   <div class="form-group col-md-4 ">
                                     <select class="select_style" id="year_performance" style="margin-left:35px;" onchange="team_leader_performance('<?php echo $_GET['id']; ?>',this.value);">
                                      <option>2016</option>
                                      <option>2015</option>
                                     </select>
                                   </div>
                                   
                                 </form>
                                </div>
                              </div>
                              <div class="work_log_container" id="team_leader_performance">
                               <?php
                                  $months=array(
                                    "Jan"=>"1",
                                    "Feb"=>"2",
                                    "Mar"=>"3",
                                    "Apr"=>"4",
                                    "May"=>"5",
                                    "Jun"=>"6",
                                    "Jul"=>"7",
                                    "Aug"=>"8",
                                    "Sep"=>"9",
                                    "Oct"=>"10",
                                    "Nov"=>"11",
                                    "Dec"=>"12",
                                  );

                                  $id=$_GET['id'];

                                  foreach($months as $x=>$value)
                                  {
                                    
                                    $ads_worked_on=0;
                                    $extra_ads=0;
                                    $monthly_total=0;
                                    $approved=0;

                                    $declined=0;

                                    $current_date=DATE("Y");
                                    
                                    $year=DATE("Y");

                                   
                                      $total_monthly=$conn->getAdminTotalAdsInMonth($value,$id,$year);
                                      
                                      foreach ($total_monthly as $key => $value2) {
                                        $monthly_total=$value2['result'];
                                        
                                      }

                                      $monthly_declined=$conn->getAdminAdsDeclinedInMonth($value,$id,$year);
                                      
                                      foreach ($monthly_declined as $key => $value3) {
                                          $declined=$value3['result'];
                                        }

                                      $monthly_approved=$conn->getAdminAdsApprovedInMonth($value,$id,$year);
                                      
                                      foreach ($monthly_approved as $key => $value4) {
                                          $approved=$value4['result'];
                                      } 

                                      $ads_worked_on= $approved+$declined;
                                        // $total_monthly=3;
                                      if($monthly_total <=0){
                                        $Performance=0;
                                        
                                      }else{
                                        $Performance=($ads_worked_on/$monthly_total)*100;
                                      }
                                      
                                    ?>

                                      <div class="row progress_bar_top_margin">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
                                         <span class="table_hd_not_Active"><?php echo $x; ?></span>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 worklog_row">
                                          <div class="progress leftminus2_borderradius0" >
                                            <div class="progress-bar 
                                            <?php
                                              
                                             if($Performance<50){
                                              echo "ymz_red";
                                            }elseif($Performance>=50 && $Performance <95){
                                              echo "ymz_orange";
                                            }elseif($Performance>=95 && $Performance <109){
                                              echo "ymz_success";
                                            }
                                            elseif($Performance>=110){
                                              echo "ymz_extra";
                                            }

                                            ?>

                                            " role="progressbar" aria-valuenow="<?php echo $Performance; ?>"
                                            aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $Performance; ?>%;">
                                              
                                            </div>
                                          </div>
                                         </div>
                                      </div>

                                    <?php
                                  }
                                 
                                 
                                ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:0%;width:98%">
                          <div class="panel panel-default bottom_panel">
                            <div class="panel-body" >
                              <p class="worklog_head">Work Log</p>
                              <div class="work_log_container">
                                <?php
                                    $test=$conn->getUserWorkLog("Supervisor",$_GET["id"]);

                                    $log_name="";
                                    $who_created_lod="";
                                    $business_Affected=0;
                                    $log_time="";

                                    foreach ($test as $key => $value) {
                                       $log_name=$value['log_name'];
                                      
                                       $log_time=$value['log_time'];
                                    
                                ?>
                                <!-- First row of the work log -->
                                <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 worklog_row">
                                  <div class="pull-left left_margin16">
                                    <h1></h1>
                                    <p class="pnel-heding"><?php echo $log_name; ?></p>
                                  </div>
                                  <div class="pull-right">
                                    <h1></h1>
                                    <p class="pnel-heding work_log_time"><?php echo $log_time; ?></p>
                                    <br/>
                                  </div>
                                 </div>
                                </div>
                               <!-- End of work log first row -->
                               <?php
                                 }
                               ?>
                               <!-- No use -->
                                <input type="hidden" id="year2">
                                <input type="hidden" id="week2">
                                <input type="hidden" id="month2">
                                <!-- No use -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>
 
          </div>

        <br/><br/><br/><br/><br/><br/>
     </section>

    </section>
    <!--***************end content**************-->
    <script type="text/javascript"> 
      function addLoadEvent(func) {
        var oldonload = window.onload;
        if (typeof window.onload != 'function') {
          window.onload = func;
        } else {
          window.onload = function() {
            if (oldonload) {
              oldonload();
            }
            func();
          }
        }
      }
      
      addLoadEvent(Date_month_week_select_Default);
      addLoadEvent(Load1);
    </script>
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

