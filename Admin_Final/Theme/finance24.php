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
                            <p class="content_head">Monthly Ad Income 1st May 2016</p>   
                          </div>
                          <div class="col-xs-4 col-md-4">
                            <div class="row">
                              <div class="col-xs-6 col-md-6 colorwhite" class="pull-right"><span class="icon icon-notify" style="margin-left:98%"></span>&nbsp;Notifications</div>
                              <div class="col-xs-6 col-md-6 colorwhite"><div class="pull-right"><span class="icon icon-email5"></span>&nbsp;Mail</div></div>
                            </div>
                             
                          </div>
                      </div>

                      <div class="row colorwhite bottom15">
                          <div class="col-lg-10 col-xl-10 col-md-10">
                            <select class="width60 palebackback noborder height25 border_radius6 right10 font11">
                              <option>2016</option>
                            </select>
                            <select class="width60 palebackback noborder height25 border_radius6 right10 font11">
                              <option>May</option>
                            </select>
                            <select class="width60 palebackback noborder height25 border_radius6 right10 font11">
                              <option>1st</option>
                            </select>
                            <a class="btn height25 border_radius6 font11 colorwhite toppad4 ymz_red" href="">Search</a>
                            
                          </div>
                          <div class="col-lg-2 col-xl-2 col-md-2">
                            <div class="row">
                              <div class="col-xs-6 col-md-6 "></div>
                              <div class="col-xs-6 col-md-6 colorwhite">
                                <!-- <div class="pull-right">view more</div> -->
                              </div>
                            </div>
                             
                          </div>
                      </div>

                      <!-- Row 1 -->                     
                      <div class="row">
                         <div class="col-md-7 col-lg-7 col-xl-7">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >                                 
                                  <div class="row botttom20">
                                    <div class="col-xs-6 col-md-6 colorwhite">
                                      <p class="content_head">
                                        Monthly Ad Income<div class="toptext">Week 1 May 2016</div>
                                      </p>
                                    </div>
                                    <div class="col-xs-6 col-md-6 colorwhite">
                                      <!-- <div class="pull-right">View More</div> -->
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
                                      <td>10%</td>
                                      <td>$ 12.99</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Week 2</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Week 3</td>                                      
                                      <td>$23.75</td>
                                      <td>10%</td>
                                      <td>$ 12.99</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Week 4</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>
                                     
                                     <tr>
                                      <td class="cellNoBorder"></td>                                    
                                      <td>
                                        <label class="pull-left top5">TT= $1,240</label>
                                        <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                      </td>
                                      <td class="cellNoBorder"></td>
                                      
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
                            <div class="panel panel-default goal_panel24">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head">
                                        TT Monthly Ad Income
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right">Week 1 May 2016</div>
                                    </div>
                                  </div>

                                 <div id="TotalMonthlyAdsIncome" class="graphContainer"></div>
                               </div>
                            </div>
                            
                         </div>
                         
                      </div>
                      <!-- End of Row 1 -->

                      <!-- Row 2 -->
                      <div class="row">
                         <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head2">
                                        TT Monthly Commission Paid Out
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite"><div class="pull-right font12">Week 1 May 2016</div>
                                    </div>
                                  </div>

                                 <div id="TotalMonthlyCommissionPaidOut" class="graphContainer"></div>
                               </div>
                            </div>
                         </div>
                         <div class="col-md-5 col-lg-5 col-xl-6">
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

                         <div class="col-md-2 col-lg-2 col-xl-2">
                            <div class="panel panel-default goal_panel2" id="mothlyNetAdIncome">
                               <div class="panel-body height364">
                                 <p class="content_head">Monthly profits</p>
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
        // window.onload=finance24RenderGraphs();
        window.onload=PageRun();

        function PageRun(){
          var status=localStorage.getItem("dataStatus");  
          // alert(status);        
          finance24RenderGraphs(status);
        }
        
      </script>
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

