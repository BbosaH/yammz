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
   font-size:14px;
   margin-top:-3px;
 }
 .table_hd_not_Active{
  color: #828282;
  margin-top: -50px;
 }
 .left_side_ads_values{
  font-size:30px;
   font-weight:bold;
 }
 .progress_bar_top_margin{
  margin-top: 20px;
 }
 .select_style{background-color:#1A1B20;
  border-radius:2px;
  border:0px;}
  .ymz_red{
   background-color: #BE2633;
   
  }
  .ymz_success{
   background-color: #5CB85C;
  
  }
  .ymz_extra{
   background-color: #FEf007;
  
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
                      <div class="col-xs-6 col-md-6" style="margin-left:-1%">
                         <div class="row">
                           <div class="col-xs-6 col-md-6" >
                               <div class="panel panel-default left_panel">
                                <div class="panel-body" >
                                  <p class="pnel-heding" style="margin-bottom:30px;">Number of pending Ads</p>
                                  <p style="margin-bottom:1px;"><span class="left_side_ads_values">30,000</span> <span style="font-size:12px;">Ads</span></p>
                                 
                                </div>
                               </div>
                           </div>
                           <div class="col-xs-6 col-md-6" style="margin-left:-1%;width:51%;">
                               <div class="panel panel-default left_panel">
                                <div class="panel-body" >
                                  <p class="pnel-heding" style="margin-bottom:30px;">New Ads Today</p>
                                  <p style="margin-bottom:1px;"><span class="left_side_ads_values">20,000</span> <span style="font-size:12px;">Ads</span></p>
                                 
                                </div>
                               </div>
                           </div>
                         </div>                     

                        <div class="panel panel-default left_panel">
                         <div class="panel-body" >
                          <div class="row">
                            <div class="col-xs-8 col-md-8" style="">
                               <p class="pnel-heding" style="margin-bottom:30px;">Monthly Goal</p>
                          
                               <p style="color:#77AF80;margin-bottom:3px;"><span class="left_side_ads_values">20,000</span> <span style="font-size:12px;">Ads</span></p>
                            </div>
                            <div class="col-xs-4 col-md-4" style="">
                              <div style="font-size:50px;color:#B8233A;margin-top:10px;">0.1%</div>
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
                             <div class=""><p class="pnel-heding">Number of Ads worked on</p></div>
                           </div>
                           
                            <div class="col-xs-6 col-md-6">
                             
                                <form style="margin-left:20px;margin-right:-12px;" >

                                   <div class="form-group col-md-4" style="margin-right:-10px">
                                     <select class="select_style">
                                      <option>2016</option>
                                     </select>
                                   </div>
                                   <div class="form-group col-md-4" style="margin-right:-13px">
                                     <select class="select_style">
                                      <option>May</option>
                                     </select>
                                   </div>
                                   <div class="form-group col-md-4">
                                     <select class="select_style">
                                      <option>Week 1</option>
                                     </select>
                                   </div>

                                 </form>
                            </div>
                          </div>
                           <div class="row" style="margin-bottom:-10px;">
                             <div class="col-xs-12 col-md-12">
                              <table class="table-responsive" style="border-spacing: 15px;border-collapse: separate;margin-left:-3%;margin-top:-3.8%;">
                               <th class="table_hd_not_Active">Monday</th>
                               <th class="table_hd_not_Active">Tuesday</th>
                               <th class="table_hd_not_Active">Wednesday</th>
                               <th class="table_hd_not_Active">Thursday</th>
                               <th class="table_hd_not_Active">Friday</th>
                               <th class="table_hd_not_Active">Yesterday</th>
                               <th>Today</th>
                              </table>
                             </div>
                           </div>
                          
                          <div class="row">
                           <div class="col-xs-8 col-sm-9 col-md-8 col-lg-8 col-xl-8">
                             <p class="pnel-heding" style="margin-top:4px;margin-bottom:0px;margin-left:12px;">Ads worked on</p>
                             <div style="height:10px;"></div>
                             <p style="color:#77AF80"><span style="font-size:30px;margin-left:12px;">40</span> <span style="font-size="12px">Ads</span></p>
                           </div>
                           <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                             <p class="pnel-heding " style="margin-top:4px;margin-bottom:0px;">Ads left</p>
                             <div style="height:10px;"></div>
                             <p style="color:#B8233A"><span style="font-size:30px;">40</span> <span style="font-size="12px">Ads</span></p>
                           </div>
                          </div>

                           <div class="row">
                           <div class="col-xs-8 col-sm-9 col-md-8 col-lg-8 col-xl-8">
                             <p class="pnel-heding" style="margin-top:2px;margin-bottom:-10px;margin-left:12px;">Goal</p>
                             
                             <div style="height:9px;"></div>
                             <h3 style="color:#B8233A;margin-left:12px;">Not Achieved</h3>
                           </div>
                           <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                             <p class="pnel-heding" style="margin-top:2px;margin-bottom:0px;">Extra Ads</p>
                             <div style="height:9px;"></div>

                             <p style="color:#FEf007"><span style="font-size:30px;">0</span> <span style="font-size="12px">Ads</span></p>

                           </div>
                          </div>
                         
                         </div>
                        </div>
                       </div>
                      </div>
                          <div class="row" style="width:104%;">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="margin-left:-1%">
                          <div class="panel panel-default bottom_panel" >
                            <div class="panel-body" >
                              <p class="pnel-heding" style="margin-top:4px;margin-bottom:7px;margin-left:1px;">Number of Approved Ads this Month</p>            

                              <p style="color:#77AF80;margin-bottom:3px;"><span class="left_side_ads_values">10,000</span> <span style="font-size:12px;">Ads</span></p>
                            </div>
                          </div>
                          
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="margin-left:0%">
                          
                           <div class="panel panel-default bottom_panel">
                            <div class="panel-body" >
                              <p class="pnel-heding" style="margin-top:4px;margin-bottom:7px;margin-left:1px;">Number of Declined Ads this Month</p>            

                              <p style="color:#B8233A;margin-bottom:3px;"><span class="left_side_ads_values">5,000</span> <span style="font-size:12px;">Ads</span>
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
                       <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:-1%">
                          <div class="panel panel-default bottom_panel">
                            <div class="panel-body" >
                              
                              <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                 <p style="font-size:14px;margin-bottom:-7px;margin-top:-1%">Team Performance</p>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                  <table class="table-responsive" style="border-spacing: 15px;border-collapse: separate;margin-left:-20%;margin-top:-3%;">
                                   <th class="table_hd_not_Active">Monday</th>
                                   <th class="table_hd_not_Active">Tuesday</th>
                                   <th class="table_hd_not_Active">Wednesday</th>
                                   <th class="table_hd_not_Active">Thursday</th>
                                   <th class="table_hd_not_Active">Friday</th>
                                   <th class="table_hd_not_Active">Yesterday</th>
                                   <th>Today</th>
                                  </table>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                 <form style="margin-left:10px;">

                                   <div class="form-group col-md-4" style="margin-right:-10px">
                                     <select class="select_style">
                                      <option>2016</option>
                                     </select>
                                   </div>
                                   <div class="form-group col-md-4" style="margin-right:-15px">
                                     <select class="select_style">
                                      <option>May</option>
                                     </select>
                                   </div>
                                   <div class="form-group col-md-4">
                                     <select class="select_style">
                                      <option>Week 1</option>
                                     </select>
                                   </div>

                                 </form>
                                </div>
                              </div>
                              <div style="height:200px; width:100%; overflow-y: scroll; padding-bottom:10px;">
                               
                                <!-- First row of the work log -->
                                <div class="row progress_bar_top_margin">
                                  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
                                   Steven.B
                                  </div>
                                  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="margin-left:-15px;margin-bottom:-30px;">
                                    <div class="progress " style="margin-left:-2%;border-radius:0px;">
                                      <div class="progress-bar ymz_success" role="progressbar" aria-valuenow="70"
                                      aria-valuemin="0" aria-valuemax="100" style="width:55%;">
                                        
                                      </div>
                                    </div>
                                   </div>
                                </div>
                                <div class="row progress_bar_top_margin">
                                  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
                                   Kevin.G
                                  </div>
                                 <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="margin-left:-15px;margin-bottom:-30px;">

                                    <div class="progress" style="margin-left:-2%;border-radius:0px;">
                                      <div class="progress-bar ymz_red" role="progressbar" aria-valuenow="70"
                                      aria-valuemin="0" aria-valuemax="100" style="width:30%;">
                                      
                                      </div>
                                    </div>

                                   </div>
                                </div>
                                <div class="row progress_bar_top_margin">
                                  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
                                   Wilson.K
                                  </div>
                                  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="margin-left:-15px;margin-bottom:-30px;">

                                    <div class="progress" style="margin-left:-2%;border-radius:0px;">
                                      <div class="progress-bar ymz_extra" role="progressbar" aria-valuenow="70"
                                      aria-valuemin="0" aria-valuemax="100" style="width:70%;">
                                       
                                      </div>
                                    </div>

                                   </div>
                                </div>
                                <div class="row progress_bar_top_margin">
                                  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
                                   Mike.N
                                  </div>
                                  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="margin-left:-15px;margin-bottom:-30px;">
                                    <div class="progress " style="margin-left:-2%;border-radius:0px;">
                                      <div class="progress-bar ymz_success" role="progressbar" aria-valuenow="70"
                                      aria-valuemin="0" aria-valuemax="100" style="width:75%;">
                                        
                                      </div>
                                    </div>
                                   </div>
                                </div>
                                <div class="row progress_bar_top_margin">
                                  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
                                   Henry.B
                                  </div>
                                  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="margin-left:-15px;margin-bottom:-30px;">
                                    <div class="progress " style="margin-left:-2%;border-radius:0px;">
                                      <div class="progress-bar ymz_extra" role="progressbar" aria-valuenow="70"
                                      aria-valuemin="0" aria-valuemax="100" style="width:90%;">
                                        
                                      </div>
                                    </div>
                                   </div>
                                </div>
                                <div class="row progress_bar_top_margin">
                                  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
                                   Opondo.F
                                  </div>
                                  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="margin-left:-15px;margin-bottom:-30px;">
                                    <div class="progress " style="margin-left:-2%;border-radius:0px;">
                                      <div class="progress-bar ymz_red" role="progressbar" aria-valuenow="70"
                                      aria-valuemin="0" aria-valuemax="100" style="width:10%;">
                                        
                                      </div>
                                    </div>
                                   </div>
                                </div>
                                <div class="row progress_bar_top_margin">
                                  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
                                   Ketty.N
                                  </div>
                                  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="margin-left:-15px;margin-bottom:-30px;">
                                    <div class="progress " style="margin-left:-2%;border-radius:0px;">
                                      <div class="progress-bar ymz_success" role="progressbar" aria-valuenow="70"
                                      aria-valuemin="0" aria-valuemax="100" style="width:90%;">
                                        
                                      </div>
                                    </div>
                                   </div>
                                </div>
                                <div class="row progress_bar_top_margin">
                                  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
                                   Nomis.W
                                  </div>
                                  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="margin-left:-15px;margin-bottom:-30px;">
                                    <div class="progress " style="margin-left:-2%;border-radius:0px;">
                                      <div class="progress-bar ymz_red" role="progressbar" aria-valuenow="70"
                                      aria-valuemin="0" aria-valuemax="100" style="width:25%;">
                                        
                                      </div>
                                    </div>
                                   </div>
                                </div>                                              
                               
                              </div>
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

