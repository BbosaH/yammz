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
                            <p class="content_head">Yearly Ad Income</p>   
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
                                  <div class="row ">
                                    <div class="col-xs-6 col-md-6 colorwhite">
                                      <p class="content_head">
                                        Yearly Ad Income 2016
                                      </p>
                                    </div>
                                    <div class="col-xs-6 col-md-6 colorwhite">
                                      <!-- <div class="pull-right">View More</div> -->
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
                                      <td>Jan</td>                                      
                                      <td>$23.75</td>
                                      <td>10%</td>
                                      <td>$ 12.99</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Feb</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Mar</td>                                      
                                      <td>$23.75</td>
                                      <td>10%</td>
                                      <td>$ 12.99</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Apri</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>May</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Jun</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Jul</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Aug</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Sep</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Oct</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Nov</td>                                     
                                      <td>$ 13.75</td>
                                      <td>10%</td>
                                      <td>$ 23.75</td>
                                      <td>$ 23.75</td>
                                     </tr>

                                     <tr>
                                      <td>Dec</td>                                     
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

                            <!--  -->
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-8 col-lg-8 col-md-8 colorwhite">
                                      <p class="content_head2">
                                        TT Yearly After Commission 2016
                                      </p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 colorwhite">
                                    </div>
                                  </div>

                                 <div id="TotalYeralyAfterCommission" class="graphContainer"></div>
                               </div>
                            </div>
                            <!--  -->
                         </div>
                         <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-12 col-lg-12 col-md-12 colorwhite">
                                      <p class="content_head">
                                        TT Yearly Ads Income Received 2016
                                      </p>
                                    </div>
                                    
                                  </div>

                                 <div id="TotalYeralyAdsIncome" class="graphContainer"></div>
                               </div>
                            </div>

                            <div class="panel panel-default goal_panel2">
                               <div class="panel-body" >

                                 <div class="row ">
                                    <div class="col-xl-12 col-lg-12 col-md-12 colorwhite">
                                      <p class="content_head">
                                        TT Yearly Commission Paid Out 2016
                                      </p>
                                    </div>
                                    
                                  </div>

                                 <div id="TotalYearlyCommissionPaidOut" class="graphContainer"></div>
                               </div>
                            </div>

                            <!--  -->
                            <div class="panel panel-default goal_panel23_x">
                                 <div class="panel-body">
                                   <p class="content_head">Yearly net Ad Income</p>
                                   
                                 <p class="font20">
                                    <div class="row" style="margin-left:20%;margin-top:17%;" id="yearlynet">
                                      <div class="col-md-2 col-lg-2 col-xl-2"><i class="arrow_green" style="font-size:42px;">10% </i></div>
                                      <div class="col-md-2 col-lg-2 col-xl-2">
                                        <i class="ion ion-arrow-up-b arrow_green" style="margin-left:35px;font-size:80px;margin-top:-12px;"></i>
                                      </div>
                                    </div>                                   
                                  </p>
                              </div>
                           </div>
                            <!--  -->
                            
                         </div>
                         
                      </div>
                      <!-- End of Row 1 -->

                </div>
              </div>
            </div>
 
          </div>

        <br/><br/><br/><br/><br/>
     </section>

    </section>
    <!--***************end content**************-->
      <script type="text/javascript">
        // window.onload=finance25RenderGraphs();
        window.onload=PageRun();

        function PageRun(){
          var status=localStorage.getItem("dataStatus");  
          // alert(status);        
          finance25RenderGraphs(status);
        }
        
      </script>
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

