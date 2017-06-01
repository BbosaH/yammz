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
                             
                          </div>
                      </div>
                     
                      <div class="row">
                         <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12 col-xs-12 ">
                            <div class="panel panel-default set_goal_upper_section">
                              <div class="panel-body" >
                                <div class="row">
                                  <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 col-xs-12 ">
                                    <p  class="font18" style="margin-top:10px;">Total Number of Ads </p>
                                    <?php
                                      // echo $conn->gstringId("");
                                      // $goal=$conn->Assign_Goal_ToSupervisor("9571160611178441","6");
                                      // $goal=$conn->EditSupervisorGoal("268316614348814","8");
                                      // $goal=$conn->get_daily_worked_on_and_left_ads("specific",date("Y-m-d"),"411819896108871"); 
                                        // var_dump($goal);
                                     ?>
                                     <br/>
                                  </div>
                                  <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xs-12 ">
                                    <span class="font30bold" id="set_goal_ads_left">
                                      <?php                                       

                                        $unass=0;
                                        if(strcmp($user_type, "Manager")==0){
                                          $unass=$conn->getUnassigned_numberOf_ads("Manager","");

                                        }elseif (strcmp($user_type, "Supervisor")==0) {
                                          $unass=$conn->getUnassigned_numberOf_ads("Supervisor",$_SESSION['admin_id']);
                                        }
                                        echo $unass;
                                      ?>
                                    </span><span class="font18">&nbsp;Ads</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                         </div>
                      </div>

                      <!-- default ids, not usefull on this page but are important on other pages, when removed, itmay cause issues -->
                      
                      <input type="hidden" id="year" />
                      <input type="hidden" id="year2" /> 
                      <input type="hidden" id="month" /> 
                      <input type="hidden" id="month2" /> 
                      <input type="hidden" id="week" /> 
                      <input type="hidden" id="week2" /> 
                      <input type="hidden" id="ads_worked_on" /> 
                      <input type="hidden" id="adverts_left" /> 
                      <input type="hidden" id="goal" /> 
                      <input type="hidden" id="extra_ads" />                       
                      <!-- End of default ids -->

                      <!-- Testing -->
                      <?php

                      $dt=date("Y-m-d");

                      $today_year=date("Y");
                      $today_month=date("m");
                      $today_month_name=date("M");  
                      $wk=$conn->getWeekfromMonthday($dt);

                      $dataToDisplay="";
                      $columns =2;//No of column
                      
                       if(strcmp($user_type, "Manager")==0){
                          $supervisors=$conn->getManagerSupervisors();                 
                          $dataToDisplay = $supervisors;

                        }elseif (strcmp($user_type, "Supervisor")==0) {

                          $operators=$conn->getSupervisorTeamMembers($_SESSION['admin_id']);                 
                          $dataToDisplay = $operators;
                        }
                      

                     
                      $count = count($dataToDisplay);
                      $i =0;

                      $identifier=0;
                      $default=2;
                      // var_dump($dataToDisplay);
                      foreach($dataToDisplay as $data) {
                        if($i % $columns == 0){
                          echo "<div class='row'";
                        }

                        $identifier +=1;

                        $default +=2;
                      ?>

                        <?php // hidden field to represent the current selected dat ?>
                        <input type="hidden" id="my_current_date<?php echo $data["id"]; ?>"  value="">
                         <?php // End of hidden field to represent the current selected dat ?>

                       <!-- column 1 -->
                       <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6 col-xs-12">
                          <div class="panel panel-default goal_panel2">
                             <div class="panel-body" >
                             <!--  <div style="margin-bottom:-20px;"> -->
                              <div class="row" style="margin-bottom:-10px;">
                               <div class="col-xs-6 col-md-6">                                
                                    <table class="topminus5">
                                      <td><label class="pnel-heding">Set Goal for: <?php echo $data['name']; ?></label></td>
                                      <td><label class="icon icon-star team_leader_icon"></label></td>
                                    </table>
                               </div>
                               
                                <div class="col-xs-6 col-md-6">
                                 
                                       <div class="form-group col-md-4" style="margin-right:-10px">
                                         <select class="select_style" id="<?php echo 'year'.$data['id']; ?>" onchange="Show_admin_day_set_goal('year',this.value,'<?php echo $data["id"]; ?>');">

                                          <option value="<?php echo $today_year;?>"><?php echo $today_year;?></option>
                                          <option value="2015">2015</option>
                                         </select>
                                       </div>
                                       <div class="form-group col-md-4" style="margin-right:-13px">
                                         <select class="select_style" id="<?php echo 'month'.$data['id']; ?>" onchange="Show_admin_day_set_goal('month',this.value,'<?php echo $data["id"]; ?>');">

                                          <option value="<?php echo $today_month;?>"><?php echo $today_month_name;?></option>
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
                                         <select class="select_style" id="<?php echo 'week'.$data['id']; ?>" onchange="Show_admin_day_set_goal('week',this.value,'<?php echo $data["id"]; ?>');">
                                          <option value="<?php echo $wk;?>">week <?php echo $wk;?></option>
                                          <option value="1">Week 1</option>
                                          <option value="2">Week 2</option>
                                          <option value="3">Week 3</option>
                                          <option value="4">Week 4</option>
                                          <option value="5">Week 5</option>
                                         </select>
                                       </div>

                                </div>
                                <div id="day_details"></div>
                              </div>
                               <div class="row bottomminus10_top15">
                                 <div class="col-xs-12 col-md-12">
                                  <div class="table-responsive">
                                    <table class="table-responsive upper_week_select">

                                     <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Monday" onclick="Show_admin_day_set_goal('days','1','<?php echo $data["id"]; ?>'); return false;">Monday</a></th>

                                     <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Tuesday" onclick="Show_admin_day_set_goal('days','2','<?php echo $data["id"]; ?>'); return false;">Tuesday</a></th>

                                     <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Wednesday" onclick="Show_admin_day_set_goal('days','3','<?php echo $data["id"]; ?>'); return false;">Wednesday</a></th>

                                     <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Thursday" onclick="Show_admin_day_set_goal('days','4','<?php echo $data["id"]; ?>'); return false;">Thursday</a></th>

                                     <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Friday" onclick="Show_admin_day_set_goal('days','5','<?php echo $data["id"]; ?>'); return false;">Friday</a></th>

                                     <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Yesterday" onclick="Show_admin_day_set_goal('days','6','<?php echo $data["id"]; ?>'); return false;">Saturday</a></th>
                                     <th class="table_hd_not_Active"><a href="#" class="week_days_anch" id="Sunday" onclick="Show_admin_day_set_goal('days','7','<?php echo $data["id"]; ?>'); return false;">Sunday</a></th>

                                    </table>
                                  </div>
                                 </div>
                               </div>
                              
                              <div class="row">
                               <div class="col-xs-8 col-sm-9 col-md-8 col-lg-8 col-xl-8">
                                
                                  <div style="height:10px;text-align:center;color:#BE2633;" id="message"></div>
                                  
                                    <input type="hidden" value="" id="<?php echo 'editable'.$data['id']; ?>" />
                                    <p class="set_goal_value">
                                      <span class="font46" id="<?php echo 'ads_worked_on'.$data['id']; ?>">

                                        <?php
                                          //Default value for user goal
                                          $goal=0;
                                          $date5=date("Y-m-d");
  
                                          $id=$data['id'];
                                          $goal=$conn->Weekly_total_ads("specific",$date5,$id);

                                          foreach ($goal as $key => $value) {
                                            $goal=$value['result'];
                                          }
                                          if($goal >=1){
                                            // $default="default";
                                            echo "<span style='cursor:pointer;' id='".$default."' onclick='InputActivator(".$data["id"].",".$identifier.",".$default.")'>".$goal."</span>";

                                            echo "<input type='hidden' id='".$identifier."' onmouseleave='EditGoal(".$data['id'].",".$identifier.");' class='ads_goal_input no_focus' name='goal' value='".$goal."' class='form-control'>";

                                          }else{
                                            // onkeydown ="saveGoal('+$data["id"];+');"                                            
                                            echo '<input type="text" id="input_goal" onmouseleave="saveGoal('.$data["id"].');" class="ads_goal_input no_focus" name="goal" value="" class="form-control">';
                                          }
                                         ?>

                                      </span> 
                                      <span class="font18bold" id="<?php echo 'ads'.$data['id']; ?>">
                                        <?php if($goal >=1){ echo "Ads";}else{

                                        }?>
                                      </span>                                  
                                    </p>
                                  
                               </div>
                               <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                                
                                  <div style="height:10px"></div>

                               </div>
                              </div>

                             
                             </div>
                        </div>
                       </div>
                        <!-- End of column 1 -->
                      <?php
                        if(($i % $columns) == ($columns - 1) || ($i + 1) == $columns){
                          echo "</div>";
                            }
                            $i++;
                        }
                      ?>
                     <!-- Testing -->
                  </div>
                </div>
              </div>
            </div>
 
          </div>

        <br/><br/><br/><br/><br/>
     </section>

    </section>
    <!--***************end content**************-->
      <script type="text/javascript"> 

      // function addLoadEvent(func) {
      //   var oldonload = window.onload;
      //   if (typeof window.onload != 'function') {
      //     window.onload = func;
      //   } else {
      //     window.onload = function() {
      //       if (oldonload) {
      //         oldonload();
      //       }
      //       func();
      //     }
      //   }
      // }
      
      // addLoadEvent(Show_admin_day_set_goal("year","2016","757612128789950"));

      </script>


  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

