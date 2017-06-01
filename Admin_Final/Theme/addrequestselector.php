
<div class="dataTable_wrapper" style="text-align: center">
  <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="cursor:pointer">
      <thead >
          <tr>
              <th>No.</th>
			  <th></th>
			  <th>Ads</th>
              <th>Status</th>
              <th>Country</th>
              <th>Business</th>
              <th>Published date</th>
            
          </tr>
      </thead>
      <tbody>
        <?php
          require_once "classes/connector.php";

          $conn = new connector();
          
			
          // $arres=$conn->getAll("SELECT * FROM `adds` WHERE `adds`.`status` = '$status'");
         // print_r($arres);
          $arres=$conn->DisplayAds($status);
          $no=0;
          foreach ($arres as $row) {
            //$thisRequest = getBusinessOfId(intval($value["business_id"]), false);
             $no +=1;
            $add_id = $conn->gstring($row['id']);			

			$status = $row['status'];
			$business_id = $row['business_id'];
			$start_date = date("Y-m-d H:i:s",$row['reg_date']);
			$end_dte = date("Y-m-d H:i:s",$row['reg_date']); 
			$add_description = $row['add_description'];

			if(strcmp($add_description, "")==0){
				$add_description="Search Engine Ad";
			}
			
			$bus = $conn->getResById("SELECT * FROM business",$business_id);
			$business_name="";
			$country_name="";

			$banner=$bus['banner'];
			if($bus != null){
				$business_name = $bus['name'];
				$country_id = $bus['country_id'];
				
				$bus2 = $conn->getResById("SELECT * FROM country",$country_id);
				$country_name = $bus2['name'];
				
			}

			if(strcmp($row['ad_url'], "")==0){
				if (strcmp($banner, "")==0) {
					$ad_url = $photoBase."uploads/defphoto.jpg";
				}else{
					$ad_url =$ad_url = $photoBase.$banner;
				}
				
			}else{
				$ad_url = $photoBase.$row['ad_url'];
			}
      ?>
            <tr class="businessSelectionItem" data-id="<?php echo $add_id;?>" onclick="xx(<?php echo $add_id;?>,
			<?php 
				if($status=="Approved"){
					echo"200";
				}
				else if($status=="Pending"){
					echo"404";
				}
				else if($status=="Declined"){
					echo"504";
				}
			?>);">
              <td><?php echo $no; ?></td>
              <td> <img src="<?php echo $ad_url;  ?>" width="30px" height="35px"/></td>
              <td><?php
					if(strlen($add_description)>28){
						$bcat=substr($add_description,0,27);
						$add_description=$bcat;
					}				
					
					echo $add_description; 
					?>
					...
			  </td>
              <td><?php echo $status;  ?></td>
			  <td><?php echo $country_name ; ?></td>
			   <td><?php
					if(strlen($business_name)>14){
						$bcat=substr($business_name,0,14);
						$business_name=$bcat;
					}				
					
					echo $business_name; 
					?>
					...
			  </td>
			    <td>
			    <?php 
				$st1=substr($start_date,0,10);
				$st2=substr($start_date,11,16);
				echo"<span>".$st1."</span><span style='color:#AAAAAA;'>&nbsp;&nbsp;".$st2."</span>";
			    ?>
			    <br/>
			    <?php 
				$st11=substr($end_dte,0,10);
				$st22=substr($end_dte,11,16);
				echo"<span>".$st11."</span><span style='color:#AAAAAA;'>&nbsp;&nbsp;".$st22."</span>";
			    //echo $end_dte ; ?>
			    </td>
            </tr>
      <?php
      
          }
        ?>
      </tbody>
  </table>
</div>
<script type="text/javascript">
	function xx(ad_id,status){
		window.location="advert_pproval.php?k="+ad_id+"&&st="+status;
	}
</script>