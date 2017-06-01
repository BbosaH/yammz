<div class="dataTable_wrapper" style="text-align: center">
  <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="cursor:pointer">
      <thead >
          <tr>
              <th>Advert Name</th>
              <th>Business</th>
              <th>Country</th>
              <th>City</th>
              <th>Age</th>
              <th>slot</th>
          </tr>
      </thead>
      <tbody>
        <?php
          require_once "classes/connector.php";

          $conn = new connector();
          //getting all businesses
         


          //getting all advert requests

          $arres=$conn->getAll("SELECT * FROM business");
          print_r($arres);


         /* $sql = "SELECT * FROM business";
          $res = $conn->query($sql);*/
          foreach ($arres as $row) {
            //$thisRequest = getBusinessOfId(intval($value["business_id"]), false);
            $countryid = $row['country_id'];
            $country = $conn->getAll("SELECT * FROM `country` WHERE `country`.`id` = $countryid");
            print_r($country);
             $bres = $conn->getResById("SELECT * FROM advertrequest",$row['id']);
             if($bres != null){
      ?>
            <tr class="businessSelectionItem" data-id="<?php echo $bres["id"]; ?>">
              <td><?php echo $bres["caption"]; ?></td>
              <td><?php echo $row["name"];  ?></td>
              <td><?php echo $country  ?></td>
              <td><?php echo $country['name']  ?></td>
            </tr>
      <?php
            }
          }
        ?>
      </tbody>
  </table>
</div>