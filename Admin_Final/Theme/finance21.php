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
                                    <div class="col-xs-6 col-md-6 colorwhite"><div class="pull-right">View More <select class="deepblackback noborder" style="border-radius:4px;"><option>20</option></select></div>
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
                                <!-- <table class="table accountTable" cellpadding="10" >
                                   <tr>
                                    <th>No</th>
                                    <th>Time in</th>
                                    <th>Company Name</th>
                                    <th>Payers Name</th>
                                    <th>Type of Ad</th>
                                    <th>Amount Received</th>
                                    <th>Commision %</th>
                                    <th>Commision Paid Out</th>
                                    <th>After Commision</th>
                                    <th>Status</th>

                                   </tr>

                                   <tr>
                                    <td>1</td>
                                    <td>13:45</td>
                                    <td>Company Name</td>
                                    <td>Payers Name</td>
                                    <td>Type of Ad</td>
                                    <td>$ 19.99</td>
                                    <td>1%</td>
                                    <td>$ 12.99</td>
                                    <td>$ 23.75</td>
                                    <td>Approved</td>
                                   </tr>

                                   <tr>
                                    <td>2</td>
                                    <td>13:45</td>
                                    <td>Company Name</td>
                                    <td>Payers Name</td>
                                    <td>Type of Ad</td>
                                    <td>$ 17.99</td>
                                    <td>2%</td>
                                    <td>$ 23.75</td>
                                    <td>$ 23.75</td>
                                    <td>Pending</td>
                                   </tr>

                                   <tr>
                                    <td>3</td>
                                    <td>113:45</td>
                                    <td>Company Name</td>
                                    <td>Payers Name</td>
                                    <td>Type of Ad</td>
                                    <td>$ 17.99</td>
                                    <td>2%</td>
                                    <td>$ 23.75</td>
                                    <td>$ 23.75</td>
                                    <td>Declined</td>
                                   </tr>
                                   <tr>

                                    <td>4</td>
                                    <td>13:45</td>
                                    <td>Company Name</td>
                                    <td>Payers Name</td>
                                    <td>Type of Ad</td>
                                    <td>$ 17.99</td>
                                    <td>2%</td>
                                    <td>$ 23.75</td>
                                    <td>$ 23.75</td>
                                    <td>Approved</td>
                                   </tr>

                                   <tr>
                                    <td>5</td>
                                    <td>13:45</td>
                                    <td>Company Name</td>
                                    <td>Payers Name</td>
                                    <td>Type of Ad</td>
                                    <td>$ 17.99</td>
                                    <td>2%</td>
                                    <td>$ 23.75</td>
                                    <td>$ 23.75</td>
                                    <td>Approved</td>
                                   </tr>

                                   <tr>
                                    <td>6</td>
                                    <td>13:45</td>
                                    <td>Company Name</td>
                                    <td>Payers Name</td>
                                    <td>Type of Ad</td>
                                    <td>$ 17.99</td>
                                    <td>2%</td>
                                    <td>$ 23.75</td>
                                    <td>$ 23.75</td>
                                    <td>Approved</td>
                                   </tr>

                                   <tr>
                                    <td>7</td>
                                    <td>13:45</td>
                                    <td>Company Name</td>
                                    <td>Payers Name</td>
                                    <td>Type of Ad</td>
                                    <td>$ 17.99</td>
                                    <td>2%</td>
                                    <td>$ 23.75</td>
                                    <td>$ 23.75</td>
                                    <td>Approved</td>
                                   </tr>

                                   <tr>
                                    <td>8</td>
                                    <td>13:45</td>
                                    <td>Company Name</td>
                                    <td>Payers Name</td>
                                    <td>Type of Ad</td>
                                    <td>$ 17.99</td>
                                    <td>2%</td>
                                    <td>$ 23.75</td>
                                    <td>$ 23.75</td>
                                    <td>Approved</td>
                                   </tr>

                                   <tr>
                                    <td>9</td>
                                    <td>13:45</td>
                                    <td>Company Name</td>
                                    <td>Payers Name</td>
                                    <td>Type of Ad</td>
                                    <td>$ 17.99</td>
                                    <td>2%</td>
                                    <td>$ 23.75</td>
                                    <td>$ 23.75</td>
                                    <td>Approved</td>
                                   </tr>

                                   <tr>
                                    <td>10</td>
                                    <td>13:45</td>
                                    <td>Company Name</td>
                                    <td>Payers Name</td>
                                    <td>Type of Ad</td>
                                    <td>$ 17.99</td>
                                    <td>2%</td>
                                    <td>$ 23.75</td>
                                    <td>$ 23.75</td>
                                    <td>Approved</td>
                                   </tr>

                                   <tr>
                                    <td class="cellNoBorder"></td>
                                    <td class="cellNoBorder"></td>
                                    <td class="cellNoBorder"></td>
                                    <td class="cellNoBorder"></td>
                                    <td>
                                      <label class="pull-left top5">TT= $1,240,900,130</label>
                                      <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                    </td>
                                    <td class="cellNoBorder"></td>
                                    <td>
                                      <label class="pull-left top5">TT= $1,240,900,130</label>
                                      <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                    </td>
                                    <td>
                                      <label class="pull-left top5">TT= $1,240,900,130</label>
                                      <i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>
                                    </td>
                                   </tr>


                                </table> -->
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
        window.onload=finance21RenderGraphs();
      </script>
  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>

