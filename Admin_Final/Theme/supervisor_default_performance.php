<?php 

	require_once "classes/connector.php";
 	$conn = new connector();

	$month=DATE('m');
	$year=DATE('Y');
	
	$date_from="";
	$date_to="";
 
  $nowdate = DATE('Y-m-d'); 
  //Get the day of the week using PHP's date function.
  $myday = strtolower(date("l", strtotime($nowdate)));

  $daytoday=DATE('d',strtotime($nowdate));

  if($daytoday <=7){
    $week=1;
  }elseif($daytoday >=8 && $daytoday <=14){
    $week=2;
  }elseif($daytoday >=15 && $daytoday <=21){
    $week=3;
  }
  elseif($daytoday >=22 && $daytoday <=28){
    $week=4;
  }elseif($daytoday >=29 && $daytoday <=31){
    $week=5;
  }
  
	//Getting the real date range in from the selected week 
	if($week==1){
		$date_from="".$year."-".$month."-01";
		$date_to="".$year."-".$month."-07";
	}elseif ($week==2) {
		$date_from="".$year."-".$month."-08";
		$date_to="".$year."-".$month."-14";
	}elseif ($week==3) {
		$date_from="".$year."-".$month."-15";
		$date_to="".$year."-".$month."-21";
	}elseif ($week==4) {
		$date_from="".$year."-".$month."-22";
		$date_to="".$year."-".$month."-28";
	}elseif ($week==5) {
		$date_from="".$year."-".$month."-29";
		$date_to="".$year."-".$month."-31";
	}
		//$gwe="saturday";
	//Getting date for a day in the selected range
	$date5=$conn->getDateInRange($date_from,$date_to,$myday);

?>

<div style="height:200px; width:100%; overflow-y: scroll; padding-bottom:10px;">
    <?php
       // $perf=$conn->get_daily_supervisor_performnce($date5);
    // $perf=$conn->get_daily_supervisor_performnce($date5);
        $user_type=$_SESSION['admin_type'];
        $supervisor_id=$_SESSION['admin_id'];

        if(strcmp($user_type, "Manager")==0){

          $perf=$conn->get_daily_supervisor_performnce($date5);

        }elseif(strcmp($user_type, "Supervisor")==0){
          $perf=$conn->get_daily_Supervisors_operators_performnce($date5,$supervisor_id);
        }
       
        foreach ($perf as $key => $value) {
           $performance=$value['performance'];
           $first_name=$value['first_name'];
           $last_name=ucwords($value['last_name']);
           $id=$value['id'];

           $last_name_initial=strtoupper(substr($first_name,0, 1));
           $name_toshow=$last_name." . ".$last_name_initial;

           $progress_color="";
          
           if($performance <=0){
              $progress_color="ymz_white";
           }
           if($performance >=1 && $performance <50){
            $progress_color="ymz_red";
           }else if($performance >=50 && $performance <=94){
              $progress_color="ymz_orange";
           }else if($performance >=95 && $performance <=109){
              $progress_color="ymz_success";
           }else{
              $progress_color="ymz_extra";
           }
      
     ?>
          <!-- First row of the work log -->
           <div class="row progress_bar_top_margin">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
             <?php echo $name_toshow; ?>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="margin-left:-15px;margin-bottom:-30px;">
              <div class="progress " style="margin-left:-2%;border-radius:0px;">
                <div class="progress-bar <?php echo $progress_color; ?>" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $performance; ?>%;">
                  
                </div>
              </div>
             </div>
          </div>                            
    <?php } ?>
  </div>
  
</div>