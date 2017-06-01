<?php
  session_start();
  require_once "classes/connector.php";
  $conn = new connector();

  $months=array(
    "Jan"=>"1",
    "Feb"=>"2",
    "Mar"=>"3",
    "Apr"=>"4",
    "May"=>"5",
    "Jun"=>"6",
    "Jul"=>"7",
    "Aug"=>"8",
    "Sep"=>"9",
    "Oct"=>"10",
    "Nov"=>"11",
    "Dec"=>"12",
  );

  $id=$_GET['id'];
   $year=$_GET['year'];

  foreach($months as $x=>$value)
  {
    
    $ads_worked_on=0;
    $extra_ads=0;
    $monthly_total=0;
    $approved=0;

    $declined=0;

    // $current_date=DATE("Y");
    
    // $year=DATE("Y");
   
      $total_monthly=$conn->getAdminTotalAdsInMonth($value,$id,$year);
      
      foreach ($total_monthly as $key => $value2) {
        $monthly_total=$value2['result'];
        
      }

      $monthly_declined=$conn->getAdminAdsDeclinedInMonth($value,$id,$year);
      
      foreach ($monthly_declined as $key => $value3) {
          $declined=$value3['result'];
        }

      $monthly_approved=$conn->getAdminAdsApprovedInMonth($value,$id,$year);
      
      foreach ($monthly_approved as $key => $value4) {
          $approved=$value4['result'];
      } 

      $ads_worked_on= $approved+$declined;
        // $total_monthly=3;
      if($monthly_total <=0){
        $Performance=0;
        
      }else{
        $Performance=($ads_worked_on/$monthly_total)*100;
      }
      
    ?>

      <div class="row progress_bar_top_margin">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"">
         <span class="table_hd_not_Active"><?php echo $x; ?></span>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 worklog_row">
          <div class="progress leftminus2_borderradius0" >
            <div class="progress-bar 
              <?php
                                                
                if($Performance<50){
                  echo "ymz_red";
                }elseif($Performance>=50 && $Performance <95){
                  echo "ymz_orange";
                }elseif($Performance>=95 && $Performance <109){
                  echo "ymz_success";
                }
                elseif($Performance>=110){
                  echo "ymz_extra";
                }

              ?>
            " role="progressbar" aria-valuenow="<?php echo $Performance; ?>"
            aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $Performance; ?>%;">
              
            </div>
          </div>
         </div>
      </div>

    <?php
  }
 
 
?>