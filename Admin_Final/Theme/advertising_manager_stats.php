<?php 
  include("header.php");
   require_once "classes/connector.php";
  $conn = new connector();

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
                             
                          </div>
                          <div class="col-xs-4 col-md-4">
                            <div class="row">
                              <div class="col-xs-6 col-md-6 colorwhite" class="pull-right"><span class="icon icon-notify" style="margin-left:98%"></span>&nbsp;Notifications</div>
                              <div class="col-xs-6 col-md-6 colorwhite"><div class="pull-right"><span class="icon icon-email5"></span>&nbsp;Mail</div></div>
                            </div>
                             <input type="hidden" id="my_current_date" value="" name="">
                          </div>
                      </div>
                     
                      <div class="row">
                       <div class="col-xs-6 col-md-6" style="margin-left:-1%">
                         <div class="row">
                           <div class="col-xs-6 col-md-6" >
                               <div class="panel panel-default left_panel">
                                <div class="panel-body" >
                                  <p class="pnel-heding bottom30">Number of pending Ads</p>
                                  <p style="margin-bottom:1px;"><span class="left_side_ads_values">

                                    <?php
                                       // echo $_SESSION['admin_id'];
                                      $pends=$conn->get_user_pending_ads_number("","","","");
                                      $number=0;
                                      foreach ($pends as $key => $value) {
                                        $number=$value['result'];
                                      }
                                      echo $number;
                                    ?>
                                  </span> <span style="font-size:12px;">Ads</span></p>
                                 
                                </div>
                               </div>
                           </div>
                           <div class="col-xs-6 col-md-6" style="margin-left:-1%;width:51%;">
                               <div class="panel panel-default left_panel">
                                <div class="panel-body" >
                                  <p class="pnel-heding bottom30">New Ads Today</p>
                                  <p style="margin-bottom:1px;"><span class="left_side_ads_values">
                                    <?php 
                                      
                                      $pends=$conn->get_user_new_ads();
                                      $number=0;
                                      foreach ($pends as $key => $value) {
                                        $number=$value['result'];
                                      }
                                      echo $number;
                                    ?>
                                  </span> <span class="font12">Ads</span></p>
                                 
                                </div>
                               </div>
                           </div>
                         </div>                     

                        <div class="panel panel-default left_panel">
                         <div class="panel-body" >
                          <div class="row">
                            <div class="col-xs-7 col-md-7" style="">
                               <p class="pnel-heding bottom30">Monthly Goal</p>
                                
                               <p class="monthly_gool_value"><span class="left_side_ads_values">
                               <?php
                                                                    
                                  $goal=$conn->get_user_monthly_goal();
                                  $number2=0;
                                  foreach ($goal as $key => $value) {
                                    $number2=$value['result'];
                                  }
                                  echo $number2;
                                 
                                ?>
                                      
                                </span> <span class="font12">Ads</span></p>
                            </div>
                            <div class="col-xs-5 col-md-5" style="">
                              <?php                                       
                                  $monthly_goal=0;
                                  $monthly_pproved_ads=0;
                                  $monthly_declined_ads=0;
                                  $worked_on=0;
                                  $extra_adds=0;

                                  $goal5=$conn->get_user_monthly_goal();
                                  $monthly_goal=0;
                                  foreach ($goal5 as $key => $value) {
                                    $monthly_goal=$value['result'];
                                  }

                                  $approved5=$conn->get_user_monthly_number_ofapproved_ads();
                                  foreach ($approved5 as $key => $value) {
                                    $monthly_pproved_ads=$value['result'];
                                  }

                                  $declined5=$conn->get_user_monthly_number_ofdeclined_ads();

                                  foreach ($declined5 as $key => $value) {
                                    $monthly_declined_ads=$value['result'];
                                  }
                                  
                                  //Clculating monthly ands worked on

                                  $worked_on=$monthly_declined_ads+$monthly_pproved_ads;

                                  //Clculating monthly extra ads worked on
                                  $extra_adds=$worked_on-$monthly_goal;
                                  if($extra_adds <=0){
                                    $extra_adds=0;
                                  }

                                  //Clculating monthly working percentage
                                  if($monthly_goal==0){
                                    $monthly_percent=$worked_on;
                                  }else{

                                    $monthly_percent=($worked_on/$monthly_goal)*100;
                                    $monthly_percent=number_format((float)$monthly_percent, 2, '.', '');

                                  }
                                  
                                  if($monthly_percent <50){
                                      if($number2 <1){
                                          echo '<div style="font-size:45px;margin-top:10px;color:#ffffff">
                                          '.$monthly_percent.' %                                
                                          </div>';
                                      }else{
                                          echo '<div style="font-size:45px;margin-top:10px;color:#B8233A">
                                          '.$monthly_percent.' %                                
                                          </div>';
                                      }
                                    
                                  }elseif ($monthly_percent >=50 && $monthly_percent <=94) {
                                    echo '<div class="progress_50_94" style="font-size:45px;margin-top:10px;color:#FEf007">
                                      '.$monthly_percent.'%                               
                                      </div>';
                                  }elseif ($monthly_percent >=95 && $monthly_percent <99) {
                                    echo '<div style="font-size:45px;margin-top:10px;color:#4EA280">
                                      '.$monthly_percent.'%                               
                                      </div>';
                                  }elseif ($monthly_percent >=100 && $monthly_percent <109) {
                                    echo '<div style="font-size:45px;margin-top:10px;color:#4EA280">
                                      '.$monthly_percent.'%                               
                                      </div>';
                                  }else{
                                    echo '<div class="progress_110_above" style="font-size:45px;margin-top:10px;color:yellow">
                                      '.$monthly_percent.'                               
                                      </div>';
                                  }

                                ?>

                            </div>
                          </div>                         
                          
                         </div>
                        </div>
                       </div>
                       
                       <div class="col-xs-6 col-md-6" style="margin-right:-1%;">
                        <div class="panel panel-default right_panel">
                         <div class="panel-body" >
                         <!--  <div style="margin-bottom:-20px;"> -->
                          <div class="row" style="margin-bottom:-10px;">
                           <div class="col-xs-6 col-md-6">
                            <div id="selected_choice_details"></div>
                             <div class=""><p class="pnel-heding">Number of Ads worked on</p></div>
                           </div>
                           
                            <div class="col-xs-6 col-md-6">
                             
                                <form style="margin-left:20px;margin-right:-12px;" >

                                   <div class="form-group col-md-4" style="margin-right:-10px">
                                     <select class="select_style" id="year" onchange="Date_month_week_select('year',this.value);">
                                      <option value="2016">2016</option>
                                      <option value="2015">2015</option>
                                     </select>
                                   </div>
                                   <div class="form-group col-md-4" style="margin-right:-13px">
                                     <select class="select_style" id="month" onchange="Date_month_week_select('month',this.value);">
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
                                     <select class="select_style" id="week" onchange="Date_month_week_select('week',this.value);">
                                      <option value="1">Week 1</option>
                                      <option value="2">Week 2</option>
                                      <option value="3">Week 3</option>
                                      <option value="4">Week 4</option>
                                      <option value="5">Week 5</option>
                                     </select>
                                   </div>

                                 </form>
                            </div>
                            <div id="day_details"></div>
                          </div>
                           <div class="row" style="margin-bottom:-10px;">
                             <div class="col-xs-12 col-md-12">
                              <table class="table-responsive upper_week_select">

                               <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Monday" onclick="Date_month_week_select('days','1'); return false;">Monday</a></th>

                               <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday" onclick="Date_month_week_select('days','2'); return false;">Tuesday</a></th>

                               <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Wednesday" onclick="Date_month_week_select('days','3'); return false;">Wednesday</a></th>

                               <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Thursday" onclick="Date_month_week_select('days','4'); return false;">Thursday</a></th>

                               <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Friday" onclick="Date_month_week_select('days','5'); return false;">Friday</a></th>

                               <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Yesterday" onclick="Date_month_week_select('days','6'); return false;">Saturday</a></th>
                               <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Sunday" onclick="Date_month_week_select('days','7'); return false;">Sunday</a></th>

                              </table>
                              
                             </div>
                           </div>
                          
                          <div class="row">
                           <div class="col-xs-8 col-sm-9 col-md-8 col-lg-8 col-xl-8">
                             <p class="pnel-heding ads_worked_on_text">Ads worked on</p>
                                <div style="height:10px"></div>

                             <p style="color:#77AF80"><span class="left_ads_value" id="ads_worked_on"></span> <span class="font12">Ads</span></p>
                           </div>
                           <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                             <p class="pnel-heding left_ads_head">Ads left</p>
                              <div style="height:10px"></div>

                             <p style="color:#B8233A" >
                                <span class="left_ads_value" id="adverts_left" ></span> <span class="font12">Ads</span>
                             </p>
                           </div>
                          </div>

                           <div class="row">
                           <div class="col-xs-8 col-sm-9 col-md-8 col-lg-8 col-xl-8">
                             <p class="pnel-heding goal_head">Goal</p>
                              <div style="height:9px"></div>

                             
                             <?php 
                              if($monthly_percent <50){
                                  echo '<h3 style="color:#B8233A;margin-left:12px;"><span id="achieved_gooal">Not Achieved</span></h3>';
                              }else if($monthly_percent >=50 && $monthly_percent<=94){
                                echo '<h3 style="color:#FEf007;margin-left:12px;"><span id="achieved_gooal">Not Achieved</span></h3>';
                              }
                              else if($monthly_percent >=95 && $monthly_percent<=99){
                                echo '<h3 style="color:#4EA280;margin-left:12px;"><span id="achieved_gooal">Not Achieved</span></h3>';
                              }else if($monthly_percent >=100 && $monthly_percent<=109){
                                echo '<h3 style="color:#4EA280;margin-left:12px;"><span id="achieved_gooal">Achieved</span></h3>';
                              }else if($monthly_percent >=110){
                                echo '<h3 style="color:yellow;margin-left:12px;"><span id="achieved_gooal">Achieved</span></h3>';
                              }

                             ?>
                               
                             
                           </div>
                           <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                             <p class="pnel-heding extra_ads_text">Extra Ads</p>
                              <div style="height:9px"></div>
                              
                             <p class="coloryellow"><span class="font30"><?php echo $extra_adds; ?></span> <span class="font12">Ads</span></p>

                           </div>
                          </div>
                         
                         </div>
                        </div>
                       </div>
                      </div>
                      <div class="row" style="width:105%;">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 middle_performance_column-left" >
                          <div class="panel panel-default bottom_panel" >
                            <div class="panel-body" >
                              <p class="pnel-heding declined_approved_ads_heading">Number of Approved Ads this Month</p>            

                              <p class="declined_approved_ads_value"><span class="left_side_ads_values">
                             
                                <?php                                       
                                  $approved=$conn->get_user_monthly_number_ofapproved_ads();
                                  $number3=0;
                                  foreach ($approved as $key => $value) {
                                    $number3=$value['result'];
                                  }
                                  echo $number3;
                                ?>
                              </span> <span class="font12">Ads</span></p>
                            </div>
                          </div>
                          
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="margin-left:0%">
                          
                           <div class="panel panel-default bottom_panel">
                            <div class="panel-body" >
                              <p class="pnel-heding declined_approved_ads_heading">Number of Declined Ads this Month</p>            

                              <p class="declined_approved_ads_value"><span class="left_side_ads_values">
                                <?php                                       
                                  $declined=$conn->get_user_monthly_number_ofdeclined_ads();
                                  $number4=0;
                                  foreach ($declined as $key => $value) {
                                    $number4=$value['result'];
                                  }
                                  echo $number4;
                                ?>
                              </span> <span style="font-size:12px;">Ads</span>
                              </p>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="margin-left:0%">
                          <div class="panel panel-default bottom_panel">
                            <div class="panel-body" >
                              <div style="height:75px;"></div>
                            </div>
                          </div>
                        </div>
                       </div>

                       <?php if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Advertising")==0 && strcmp($_SESSION['admin_type'], "Operator")==0){ }else{?>
                       <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 middle_performance_column-left">
                          <div class="panel panel-default bottom_panel">
                            <div class="panel-body" >
                              
                              <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                 <p class="middle_performance_head_text">
                                   <?php 
                                      if(strcmp($_SESSION['admin_type'], "Supervisor")==0){
                                          echo "Team Performance";
                                      }else if(strcmp($_SESSION['admin_type'], "Manager")==0){
                                        echo "Team Leader Performance";
                                      }
                                   ?>                                 
                                 </p>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                  <table class="table-responsive middle_week_days_table">
                                    <?php $user_kind=$_SESSION['admin_type']; ?>
                                    <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Monday2" onclick="PerformanceDate_month_week_select('days','1','<?php echo $user_kind; ?>'); return false;">Monday</a></th>

                                   <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday2" onclick="PerformanceDate_month_week_select('days','2','<?php echo $user_kind; ?>'); return false;">Tuesday</a></th>

                                   <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Wednesday2" onclick="PerformanceDate_month_week_select('days','3','<?php echo $user_kind; ?>'); return false;">Wednesday</a></th>

                                   <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Thursday2" onclick="PerformanceDate_month_week_select('days','4','<?php echo $user_kind; ?>'); return false;">Thursday</a></th>

                                   <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Friday2" onclick="PerformanceDate_month_week_select('days','5','<?php echo $user_kind; ?>'); return false;">Friday</a></th>

                                   <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Yesterday2" onclick="PerformanceDate_month_week_select('days','6','<?php echo $user_kind; ?>'); return false;">Saturday</a></th>
                                   <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Sunday2" onclick="PerformanceDate_month_week_select('days','7','<?php echo $user_kind; ?>'); return false;">Sunday</a></th>

                                  </table>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                 <form style="margin-left:10px;">

                                   <div class="form-group col-md-4" style="margin-right:-10px">
                                     <select class="select_style" id="year2" onchange="PerformanceDate_month_week_select('year',this.value,'<?php echo $user_kind; ?>');">
                                      <option value="2016">2016</option>
                                      <option value="2015">2015</option>
                                     </select>
                                   </div>
                                   <div class="form-group col-md-4" style="margin-right:-15px">
                                     <select class="select_style" id="month2" onchange="PerformanceDate_month_week_select('month',this.value,'<?php echo $user_kind; ?>');">
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
                                     <select class="select_style" id="week2" onchange="PerformanceDate_month_week_select('week',this.value,'<?php echo $user_kind; ?>');">
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

                              <!-- Hidding performance section from operator-->
                              
                              <span id="performance_view">
                                <?php require_once("supervisor_default_performance.php"); ?>
                              </span>
                              
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-10px;width:100.7%;">
                          <div class="panel panel-default bottom_panel">
                            <div class="panel-body" >
                              <p class="worklog_head">Work Log</p>
                              <div class="work_log_container">
                                 <?php
                                    $test=$conn->getUserWorkLog("","");

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
<!-- <script type="text/javascript"> 

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
var day33="friday";
addLoadEvent(Load1);
addLoadEvent(Date_month_week_select_Default);


</script> -->
<script type="text/javascript">
  window.onload=Load1();
</script>

  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

