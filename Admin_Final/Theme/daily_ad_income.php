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
    <style type="text/css">
      /*Accounting styles*/
      
      .table> tbody > tr:nth-child(2n+1) > th, .table> tbody > tr:nth-child(2n+1) > th {
         background-color: #303030;
         color: #FCFCFC;
         height: 60px;
         padding-left: 10px;
         border-top:1px solid #3C3C3C;
      }
      /*.table-striped > tbody > tr:nth-child(2n) > th, .table-striped > tbody > tr:nth-child(2n) > th {
         padding-left: 10px;
         color: #FCFCFC;
         height: 60px;
      }*/
      th{border:1px solid #3C3C3C;}
      td{border:1px solid #3C3C3C;height:40px;}
    
    </style>
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
                                 <div class="row" style="margin-bottom:20px;">
                                    <div class="col-xs-6 col-md-6 colorwhite">
                                      <p class="content_head">Daily Ad Income 1st May 2016</p>
                                    </div>
                                    <div class="col-xs-6 col-md-6 colorwhite"><div class="pull-right"><u style="cursor: pointer;" onclick="GoDetails('finance21.php','all')">View More</u></div>
                                    </div>
                                  </div>
                                  <?php
                                    // $min_weekDates=$conn->getMinWeekDates();                               
                                    // $week=2;
                                    // $today=10;
                                    // $year="2016";
                                    // $month="10";

                                    // for ($i=$today; $i >= $min_weekDates[$week] ; $i--) { 
                                    //   $date=$year."-".$month."-".$i;
                                    //   echo $date."<br>";
                                    // }

                                   ?> 
                                  <table class="table accountTable" cellpadding="10" >                                  
                                   <tr>
                                    <th>No</th>
                                    <th>Submit<br> Time</th>
                                    <th>Company Name</th>
                                    <th>Payers Name</th>
                                    <th>Type of Ad</th>
                                    <th>Amount Received</th>
                                    <th>Commision %</th>
                                    <th>Commision Paid Out</th>
                                    <th>After Commision</th>
                                   </tr>
                                   <tbody id="adsTabledisplayBody" style="border:0px;">
                                   
                                   </tbody>
                                  </table>
                              </div>
                            </div>
                         </div>
                      </div>

                       <!-- Row 1 -->
                      <div class="row">
                         <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="panel panel-default goal_panel5">
                               <div class="panel-body" >
                                 
                                 <div class="row">
                                   <div class="col-md-10 col-lg-10 col-xl-10">
                                     <p class="content_head2">TT Amount Received <span id="totalAmountReceivedDate"></span></p>
                                     <span id="weekly_finances"></span>
                                   </div>
                                 </div>
                                 
                               </div>
                            </div>
                         </div>
                         <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="panel panel-default goal_panel5">
                               <div class="panel-body" >
                                 <!-- <p class="content_head">Weekly total after commission May 2016</p>
                                 <div id="TotalWeeklyAfterCommision" class="graphContainer"></div> -->
                                 <div class="row">
                                   <div class="col-md-10 col-lg-10 col-xl-10">
                                     <p class="content_head2">TT of Commision Paid Out <span id="TotalCommissionPaidOutDate"></span></p>

                                     <span id="weekly_finances_commission_paidOut"></span>

                                   </div>                                   
                                 </div>                               

                               </div>
                            </div>
                         </div>
                         <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="panel panel-default goal_panel5">
                               <div class="panel-body ">
                                  <div class="row">
                                   <div class="col-md-10 col-lg-10 col-xl-10">
                                     <p class="content_head2">TT After Commission <span id="TotalAfterCommissionDate"></span></p>
                                     <span id="weekly_finances_TotalAfterCommission"></span>

                                   </div>                                  
                                 </div>                                 

                               </div>
                            </div>
                         </div>
                      </div>

                      <!-- Row 3 -->
                      <div class="row">
                         <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >                                 
                                  <div class="row botttom20">
                                    <div class="col-xs-6 col-md-6 colorwhite">
                                      <p class="content_head">
                                        Weekly Ad Income<div class="toptext">Week 1 May 2016</div>
                                      </p>
                                    </div>
                                    <div class="col-xs-6 col-md-6 colorwhite"><div class="pull-right"><u style="cursor: pointer;" onclick="GoDetails('finance23.php','all')">View More</u></div>
                                    </div>
                                  </div>
                                  <table class="table accountTable" cellpadding="10" >
                                     <tr>
                                      <th>Date</th>                                      
                                      <th>Amount Received</th>                                      
                                      <th>Commision Paid Out</th>
                                      <th>After Commision</th>
                                     </tr>

                                     <tbody id="short_weeklyadsTabledisplayBody" style="border:0px;">
                                   
                                    </tbody>

                                     <!-- <tr>
                                      <td>Today 8th</td>                                      
                                      <td>$23.75</td>
                                      <td>$ 12.99</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Wed 7th</td>                                     
                                      <td>$ 13.75</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Today 8th</td>                                      
                                      <td>$23.75</td>
                                      <td>$ 12.99</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Wed 7th</td>                                     
                                      <td>$ 13.75</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>


                                     <tr>
                                      <td class="cellNoBorder"></td>                                    
                                      <td>
                                        <label class="pull-left top5">TT= $1,240</label>
                                        <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                      </td>
                                      
                                      <td>
                                        <label class="pull-left top5">TT= $1,240,900</label>
                                        <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                      </td>
                                      <td>
                                        <label class="pull-left top5">TT= $10,240</label>
                                        <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                      </td>
                                     </tr> -->
                                  </table>

                               </div>
                            </div>
                         </div>
                         <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head">
                                        TT Weekly Ad Income Received
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right">Week 1 May 2016</div>
                                    </div>
                                  </div>

                                 <div id="TotalWeeklyAdIncomeReceived" class="graphContainer"></div>
                               </div>
                            </div>
                         </div>
                         
                      </div>

                      <!-- Row 4 -->
                      <div class="row">
                         <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head2">
                                        TT Weekly Commission Paid out
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right font12">Week 1 May 2016</div>
                                    </div>
                                  </div>

                                 <div id="TotalWeeklyCommisionPaidOut" class="graphContainer"></div>
                               </div>
                            </div>
                         </div>
                         <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head2">
                                        TT Weekly After Commission
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right font12">Week 1 May 2016</div>
                                    </div>
                                  </div>

                                 <div id="TotalWeeklyAfterCommision" class="graphContainer"></div>
                               </div>
                            </div>
                         </div>

                         <div class="col-md-2 col-lg-2 col-xl-2">
                            <div class="panel panel-default goal_panel2" id="weeklyNetAdIncome">
                               <div class="panel-body height364">
                                 <p class="content_head">Weekly net Ad income</p>
                                 <div class="left8_per top_35_per">
                                   &nbsp;&nbsp;&nbsp;&nbsp;<div class="ion ion-arrow-up-b arrow_red font90"></div>
                                   <div class="arrow_red font50 top_25">20%</div>
                                 </div>
                               </div>
                            </div>
                         </div>
                         
                      </div>

                      <!-- Row 5 -->
                      
                      <div class="row">
                         <div class="col-md-5 col-lg-5 col-xl-5">

                          <div class="panel panel-default goal_panel23">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head2">
                                        TT Monthly Ads Income Received
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right font12">Week 1 May 2016</div>
                                    </div>
                                  </div>

                                 <div id="TotalMonthlyAdsIncome" class="graphContainer"></div>
                               </div>
                            </div>

                            
                         </div>
                         <div class="col-md-7 col-lg-7 col-xl-7">
                           <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >                                 
                                  <div class="row botttom20">
                                    <div class="col-xs-6 col-md-6 colorwhite">
                                      <p class="content_head2">
                                        Monthly Ad Income<div class="toptext">May 2016</div>
                                      </p>
                                    </div>
                                    <div class="col-xs-6 col-md-6 colorwhite"><div class="pull-right"><u style="cursor: pointer;" onclick="GoDetails('finance24.php','all')">View More</u></div>
                                    </div>
                                  </div>
                                  <table class="table accountTable" cellpadding="10" >
                                     <tr>
                                      <th>Week</th>                                      
                                      <th>Amount Received</th>                                      
                                      <th>Commision Paid Out</th>
                                      <th>After Commision</th>
                                     </tr>
                                     <tbody id="short_monthlyadsTabledisplayBody" style="border:0px;">
                                   
                                    </tbody>

                                     <!-- <tr>
                                      <td>Week 1</td>                                      
                                      <td>$23.75</td>
                                      <td>$ 12.99</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Week 2</td>                                     
                                      <td>$ 13.75</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Week 3</td>                                      
                                      <td>$23.75</td>
                                      <td>$ 12.99</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Week 4</td>                                     
                                      <td>$ 13.75</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Week 5</td>                                     
                                      <td>$ 13.75</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>


                                     <tr>
                                      <td class="cellNoBorder"></td>                                    
                                      <td>
                                        <label class="pull-left top5">TT= $1,240</label>
                                        <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                      </td>
                                      
                                      <td>
                                        <label class="pull-left top5">TT= $1,240,900</label>
                                        <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                      </td>
                                      <td>
                                        <label class="pull-left top5">TT= $10,240</label>
                                        <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                      </td>
                                     </tr> -->
                                  </table>

                               </div>
                            </div>

                         </div>
                         
                      </div>

                      <!-- Row 6 -->

                      <div class="row">
                         <div class="col-md-2 col-lg-2 col-xl-2">
                            <div class="panel panel-default goal_panel2" id="mothlyNetAdIncome">
                               <div class="panel-body height364">
                                 <p class="content_head">Monthly net Ad income</p>
                                 <div class="left8_per top_35_per">
                                   &nbsp;&nbsp;&nbsp;&nbsp;<div class="ion ion-arrow-up-b arrow_red font90"></div>
                                   <div class="arrow_red font50 top_25">20%</div>
                                 </div>
                               </div>
                            </div>
                         </div>
                         <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head2">
                                        TT Monthly Commission Paid out
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right font12">Week 1 May 2016</div>
                                    </div>
                                  </div>

                                 <div id="TotalMonthlyCommissionPaidOut" class="graphContainer"></div>
                               </div>
                            </div>
                         </div>
                         <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head2">
                                        TT Monthly After Commission
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right font12">Week 1 May 2016</div>
                                    </div>
                                  </div>

                                 <div id="TotalMonthlyAfterCommission" class="graphContainer"></div>
                               </div>
                            </div>
                         </div>

                      </div>

                      <!-- Row 7 -->
                      
                      <div class="row">
                         <div class="col-md-7 col-lg-7 col-xl-7">

                          <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row botttom20">
                                    <div class="col-xs-6 col-md-6 colorwhite">
                                      <p class="content_head2">
                                        Yearly Ads Income<div class="toptext">May 2016</div>
                                      </p>
                                    </div>
                                    <div class="col-xs-6 col-md-6 colorwhite"><div class="pull-right"><u style="cursor: pointer;" onclick="GoDetails('finance25.php','all')">View More</u></div>
                                    </div>
                                  </div>
                                  <table class="table accountTable" cellpadding="10" >
                                     <tr>
                                      <th>Month</th>                                      
                                      <th>Amount Received</th>                                      
                                      <th>Commision Paid Out</th>
                                      <th>After Commision</th>
                                     </tr>

                                     <tbody id="short_yearlyadsTabledisplayBody" style="border:0px;">
                                   
                                    </tbody>

                                     <!-- <tr>
                                      <td>Week 1</td>                                      
                                      <td>$23.75</td>
                                      <td>$ 12.99</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Week 2</td>                                     
                                      <td>$ 13.75</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Week 3</td>                                      
                                      <td>$23.75</td>
                                      <td>$ 12.99</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Week 4</td>                                     
                                      <td>$ 13.75</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>


                                     <tr>
                                      <td class="cellNoBorder"></td>                                    
                                      <td>
                                        <label class="pull-left top5">TT= $1,240</label>
                                        <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                      </td>
                                      
                                      <td>
                                        <label class="pull-left top5">TT= $1,240,900</label>
                                        <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                      </td>
                                      <td>
                                        <label class="pull-left top5">TT= $10,240</label>
                                        <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                      </td>
                                     </tr> -->
                                  </table>

                               </div>
                            </div>

                            
                         </div>
                         <div class="col-md-5 col-lg-5 col-xl-5">
                           <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >                                  

                                  <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head2">
                                        TT Yearly Ads Income
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right font12">Week 1 May 2016</div>
                                    </div>
                                  </div>
                                 <div id="TotalYeralyAdsIncome" class="graphContainer"></div>

                               </div>
                            </div>

                         </div>
                         
                      </div>

                      <!-- Row 8 -->

                      <div class="row">                         
                         <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head2">
                                        TT Yearly Commission Paid out
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right font12">Week 1 May 2016</div>
                                    </div>
                                  </div>

                                 <div id="TotalYearlyCommissionPaidOut" class="graphContainer"></div>
                               </div>
                            </div>
                         </div>
                         <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head2">
                                        TT Yearly After Commission
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right font12">Week 1 May 2016</div>
                                    </div>
                                  </div>

                                 <div id="TotalYeralyAfterCommission" class="graphContainer"></div>
                               </div>
                            </div>
                         </div>

                         <div class="col-md-2 col-lg-2 col-xl-2">
                            <div class="panel panel-default goal_panel2" id="yearlyNetAdIncome">
                               <div class="panel-body height364">
                                 <p class="content_head">Yearly net Ad income</p>
                                 <div class="left8_per top_35_per">
                                   &nbsp;&nbsp;&nbsp;&nbsp;<div class="ion ion-arrow-up-b arrow_red font90"></div>
                                   <div class="arrow_red font50 top_25">20%</div>
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

        <br/><br/><br/><br/><br/>
     </section>

    </section>
    <!--***************end content**************-->
      <script type="text/javascript">

        window.onload=finance2RenderGraphs("all");
      </script>
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

