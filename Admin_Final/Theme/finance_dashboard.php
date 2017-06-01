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
                                 <div class="row" style="margin-bottom:10px;">
                                    <div class="col-xs-6 col-md-6 colorwhite">
                                      <p class="content_head">Daily Ad Income <span id="day"></span> <span id="month"></span> <span id="year"></span></p>
                                    </div>
                                    <div class="col-xs-6 col-md-6 colorwhite"><div class="pull-right"><u style="cursor: pointer;" onclick="GoDetails('finance21.php','Pending')">View More</u></div>
                                    </div>
                                  </div>
                                
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
                         <div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >
                                 <p class="content_head2">TT Amount Received <span id="totalAmountReceivedDate"></span></p>
                                 <span id="weekly_finances"></span>                     

                               </div>
                            </div>
                         </div>
                         <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <p class="content_head">Weekly total after commission <span id="TotalWeeklyAfterCommisionBarDate"></span></p>
                                 <div id="TotalWeeklyAfterCommision" class="graphContainer"></div>

                               </div>
                            </div>
                         </div>
                         <div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body font10 ">
                                 <p class="content_head">Work log</p>

                                 <div class="scroll_div">
                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged in
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged out
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged in
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged out
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged in
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged out
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged in
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged out
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged in
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged out
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged in
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged out
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>

                                   <div class="row top10">
                                     <div class="col-md-9 col-lg-9 col-xl-9">
                                       Steven Byamugisha II logged in
                                     </div>
                                     <div class="col-md-3 col-lg-3 col-xl-3">
                                       <span class="left_15">12:45 PM</span>
                                     </div>
                                   </div>
                                 </div>                                 
                               </div>
                            </div>
                         </div>
                      </div>

                      <!-- Row 2 -->
                      <div class="row">
                         <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >
                                 <p class="content_head">Monthly total after commission <span id="TotalMonthlyAfterCommissionLineDate"></span></p>
                                 <div id="TotalMonthlyAfterCommission" class="graphContainer"></div>
                               </div>
                            </div>
                         </div>
                         <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >
                                 <p class="content_head">Yearly total after commission <span id="TotalYeralyAfterCommissionLineDate"></span></p>
                                 <div id="TotalYeralyAfterCommission" class="graphContainer"></div>
                               </div>
                            </div>
                         </div>
                         <div class="col-md-2 col-lg-2 col-xl-2">
                            <div class="panel panel-default goal_panel2">

                               <div class="panel-body height364" id="mothlyNetAdIncome">
                                 <p class="content_head">Monthly net Ad income</p>
                                 <div class="left8_per top_35_per">
                                   &nbsp;&nbsp;&nbsp;&nbsp;<div class="ion ion-arrow-up-b arrow_green font90"></div>
                                   <div class="arrow_green font50 top_25">20%</div>
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
        window.onload=financial_dashboardLoad();
      </script>
      <script type="text/javascript">
        
        // var data={};
        // var nomis="Lydia";
        // data.Name="Nomis";
        // data.class="s.2";
        // data[nomis]="My love";
        // console.log(data);
      </script>
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

