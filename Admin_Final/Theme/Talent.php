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
          
			
          $arres=$conn->getAll("SELECT * FROM `adds` WHERE `adds`.`status` = '$status'");
         // print_r($arres);

          foreach ($arres as $row) {
            //$thisRequest = getBusinessOfId(intval($value["business_id"]), false);
            $add_id = $row['id'];
			$ad_url = $row['ad_url'];
			$status = $row['status'];
			$business_id = $row['business_id'];
			$start_date = $row['start_date'];
			$end_dte = $row['end_dte']; 
			$add_description = $row['add_description'];
			
			$bus = $conn->getResById("SELECT * FROM business",$business_id);
			$business_name="";
			$country_name="";
			if($bus != null){
				$business_name = $bus['name'];
				$country_id = $bus['country_id'];
				
				$bus = $conn->getResById("SELECT * FROM country",$country_id);
				$country_name = $bus['name'];
			}
      ?>
            <tr class="businessSelectionItem" data-id="<?php echo $add_id;?>" onclick="xx(<?php echo $add_id;?>,
			<?php 
				if($status=="approved"){
					echo"200";
				}
				else if($status=="pending"){
					echo"404";
				}
			?>);">
              <td><?php echo $add_id; ?></td>
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
			
			    <td><?php echo $start_date ; ?><br/><?php echo $end_dte ; ?></td>
            </tr>
      <?php
      
          }
        ?>
      </tbody>
  </table>
</div>






