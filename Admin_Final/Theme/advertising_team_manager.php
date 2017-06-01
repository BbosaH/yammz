<?php 
  include("header.php");

  require_once "classes/connector.php";
  $conn = new connector();
  $user_type=$_SESSION['admin_type'];
  $current_user=$_SESSION['admin_id'];
?>
<style type="text/css"> 
  .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
   background-color: #2B2B2B;
   color: #ffffff;
   height: 40px;
   padding-left: 10px;
}
.table-striped > tbody > tr:nth-child(2n) > td, .table-striped > tbody > tr:nth-child(2n) > th {
   padding-left: 10px;
   color: #ffffff;
   height: 60px;
}
th{border:1px solid #424242;}


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
                             <form>
                               <div class="form-group" style="margin-top:-10px;">
                                 <input type="text" name="search" class="form-control" placeholder="Search......." style="border-radius:0px;color:#ffffff;background-color:#2B2B2B;border-color:#2B2B2B;" />
                               </div>
                             </form>
                         </div>
                         <div class="col-xs-4 col-md-4">
                           <div class="row">
                             <div class="col-xs-6 col-md-6" style="color:#ffffff;" class="pull-right"><span class="icon icon-notify" style="margin-left:98%"></span>&nbsp;Notifications</div>
                             <div class="col-xs-6 col-md-6" style="color:#ffffff;"><div class="pull-right"><span class="icon icon-email5"></span>&nbsp;Mail</div></div>
                           </div>
                            
                         </div>
                     </div>
              
                     <div class="row">
                       <div class="col-xs-12 col-md-12">
                         <table class="table-striped" style="width:100%;" cellpadding="10" >
                            <tr>
                           <th style="width:10%;">ID</th>
                           <th style="width:25%;">NAME</th>
                            <?php 
                              //Hidding team number header if showing supervisor team members
                              if(strcmp($user_type, "Supervisor")==0){

                              } elseif(strcmp($user_type, "Manager")==0){
                            ?>
                           <th style="width:30%;">Team Number</th>
                           <?php } ?>
                           <th style="width:35%;">EMAIL</th>
                           </tr>
                          
                           <?php
                             
                              if(strcmp($user_type, "Manager")==0){
                                $tm=$conn->getManagerSupervisors();
                              }elseif(strcmp($user_type, "Supervisor")==0){
                                $tm=$conn->getSupervisorTeamMembers($current_user);
                              }
                              
                              foreach ($tm as $key => $value) {
                               $supervisor_id=$value['id'];
                               $supervisor_name=$value['name'];
                               $supervisor_team_no=$value['team_no'];
                               $supervisor_email=$value['work_email'];
                               $supervisor_company_id=$value['company_id'];
                               
                           ?>
                           <tr style="cursor:pointer;" onclick="supervisor_details(<?php echo $supervisor_id; ?>);" >
                            <td><?php echo $supervisor_company_id; ?></td>
                            <td><?php echo $supervisor_name; ?></td>
                            
                              <?php
                                if(strcmp($user_type, "Supervisor")==0){

                                } elseif(strcmp($user_type, "Manager")==0){
                                  echo "<td>";
                                  echo $supervisor_team_no; 

                                  echo "</td>";
                                }
                              ?>                               
                             
                            <td><?php echo $supervisor_email; ?></td>
                           </tr>

                           <?php } ?>

                           <!-- <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>90</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>30</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>130</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>130</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>40</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>60</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>90</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>50</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>30</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>10</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>30</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>80</td>
                            <td>Kevin Gasta</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>10</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>30</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>45</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>35</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>70</td>
                            <td>kevingasta@gmail.com</td>
                           </tr>
                           <tr>
                            <td>23A4</td>
                            <td>Kevin Gasta</td>
                            <td>76</td>
                            <td>kevingasta@gmail.com</td>
                           </tr> -->
                         </table>
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
    <script type="text/javascript">
      function supervisor_details(id){

        window.location="advertising_manager_view_team_leader.php?id="+id;

      }
    </script>

</section>

<?php 
  include("footer.php");
?>
