<?php 
  include("header.php");
?>
<style type="text/css">
 
 .left_panel{
   background-color:#2B2B2B;
   
   border-radius: 4px;
   color:#ffffff;
   border:0px;
 }
 .right_panel{
  background-color:#2B2B2B;
  margin-left: -1%;
  width:105%;
  border-radius: 4px solid;
  color:#ffffff;
  border:0px;

 }
 .bottom_panel{
  background-color:#2B2B2B;
  width:101.5%;
  border-radius: 4px;
  color:#ffffff;
  border:0px;

 }
 .pnel-heding{
   font-size:10px;
   margin-top:-3px;
 }
 .table_hd_not_Active{
  color: #828282;
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

    <section id="main-content">
    	 <section class="wrapper">
        
          <div class="row mt" style="margin-top:0px;margin-left:-25px;margin-right:-25px;">
            <div class="col-lg-12 col-md-12 col-xlg-12">
              <div class="col-lg-12 noSidePadding">
                
              </div>
              <div class="col-lg-12 noSidePadding">
                <div class="form-panel" style="font-size:13px; background-color:#1B1A20;">    					
                  <div class="panel-body" >
                     <div class="row">
                          <div class="col-xs-8 col-md-8">
                              
                          </div>
                          <div class="col-xs-4 col-md-4">
                            <div class="row">
                              <div class="col-xs-6 col-md-6" style="color:#ffffff;" class="pull-right"><span class="icon icon-notify" style="margin-left:98%"></span>&nbsp;Notifications</div>
                              <div class="col-xs-6 col-md-6" style="color:#ffffff;"><div class="pull-right"><span class="icon icon-email5"></span>&nbsp;Mail</div></div>
                            </div>
                             
                          </div>
                      </div>
                      <div class="row">
                       <div class="col-xs-5 col-md-5" style="margin-left:-1%">
                        <div class="panel panel-default left_panel">
                         <div class="panel-body" >
                           <p class="pnel-heding" style="margin-bottom:30px;">Number of pending Ads Today</p>
                           <p style="margin-bottom:1px;"><span style="font-size:30px;">400</span> <span style="font-size="12px">Ads</span></p>
                          
                         </div>
                        </div>

                        <div class="panel panel-default left_panel">
                         <div class="panel-body" >
                          <p class="pnel-heding" style="margin-bottom:30px;">Today's Goal</p>
                          
                          <p style="color:#77AF80;margin-bottom:3px;"><span style="font-size:30px;">100</span> <span style="font-size="12px">Ads</span></p>
                          
                         </div>
                        </div>
                       </div>
                       
                       <div class="col-xs-7 col-md-7" style="margin-right:-1%;">
                        <div class="panel panel-default right_panel">
                         <div class="panel-body" >
                          <p class="pnel-heding">Number of Ads worked on</p>
                          

                          <table class="table-responsive" style="border-spacing: 25px;border-collapse: separate;margin-left:-3.5%;margin-top:-3%;">
                           <th class="table_hd_not_Active">Monday</th>
                           <th class="table_hd_not_Active">Tuesday</th>
                           <th class="table_hd_not_Active">Wednesday</th>
                           <th class="table_hd_not_Active">Thursday</th>
                           <th class="table_hd_not_Active">Friday</th>
                           <th class="table_hd_not_Active">Yesterday</th>
                           <th>Today</th>

                          </table>

                          <div class="row">
                           <div class="col-xs-8 col-sm-9 col-md-8 col-lg-8 col-xl-8">
                             <p class="pnel-heding" style="margin-top:4px;margin-bottom:0px;margin-left:12px;">Ads worked on</p>

                             <p style="color:#77AF80"><span style="font-size:30px;margin-left:12px;">40</span> <span style="font-size="12px">Ads</span></p>
                           </div>
                           <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                             <p class="pnel-heding " style="margin-top:4px;margin-bottom:0px;">Ads left</p>

                             <p style="color:#B8233A"><span style="font-size:30px;">40</span> <span style="font-size="12px">Ads</span></p>
                           </div>
                          </div>

                           <div class="row">
                           <div class="col-xs-8 col-sm-9 col-md-8 col-lg-8 col-xl-8">
                             <p class="pnel-heding" style="margin-top:4px;margin-bottom:-10px;margin-left:12px;">Goal</p>

                             <h3 style="color:#B8233A;margin-left:12px;">Not Achieved</h3>
                           </div>
                           <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                             <p class="pnel-heding" style="margin-top:4px;margin-bottom:0px;">Extra Ads</p>

                             <p style="color:#FEf007"><span style="font-size:30px;">0</span> <span style="font-size="12px">Ads</span></p>

                           </div>

                          </div>
                          <div style="height:9px;"></div>

                         </div>
                        </div>
                       </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-1%">
                          <div class="panel panel-default bottom_panel">
                            <div class="panel-body" >
                              <p style="font-size:14px;margin-bottom:-7px;">Work Log</p>
                              <div style="height:200px; width:100%; overflow-y: scroll; padding-bottom:10px;">

                                <!-- First row of the work log -->
                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha II logged in</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log first row -->
                                <!-- second row of the work log -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha approved Yammzit Co LTD's Ad</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log second row -->
                               <!-- 3rd row of the work log -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha declined Yammzit Co LTD's Ad</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log 3rd row -->
                               <!-- 3rd row of the work log -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha achieved his goal of the day</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log 3rd row -->
                               <!-- 3rd row of the work log -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha II logged out</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log 3rd row -->
                               <!-- 3rd row of the work log -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha II logged in</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log 3rd row -->
                               <!-- First row of the work log -->
                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha II logged in</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log first row -->
                                <!-- second row of the work log -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha approved Yammzit Co LTD's Ad</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log second row -->
                               <!-- 3rd row of the work log -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha declined Yammzit Co LTD's Ad</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log 3rd row -->
                               <!-- 3rd row of the work log -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha achieved his goal of the day</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log 3rd row -->
                               <!-- 3rd row of the work log -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha II logged out</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log 3rd row -->
                               <!-- 3rd row of the work log -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-15px;margin-bottom:-30px;">
                                <div class="pull-left">
                                  <h1></h1>
                                  <p class="pnel-heding">Steven Byamugisha II logged in</p>
                                </div>
                                <div class="pull-right">
                                  <h1></h1>
                                  <p class="pnel-heding" style="margin-right:-15px;">12:30 PM</p>
                                  <br/>
                                </div>
                               </div>
                               <!-- End of work log 3rd row -->
                               
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

  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>
