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
                            <p class="content_head">Daily Ad Income 1st May 2016</p>   
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
                              <div class="col-xs-6 col-md-6 colorwhite"><div class="pull-right">view more</div></div>
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
                                     <p class="content_head2">TT Amount Received 1st May 2016</p>
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
                                     <p class="content_head2">TT of Commision Paid Out 1st May 2016</p>

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
                                     <p class="content_head2">TT After Commission 1st May 2016</p>
                                     <span id="weekly_finances_TotalAfterCommission"></span>

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
 
          </div>

        <br/><br/><br/><br/><br/>
     </section>

    </section>
    <!--***************end content**************-->
      <script type="text/javascript">
        window.onload=finance22RenderGraphs();
      </script>
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

