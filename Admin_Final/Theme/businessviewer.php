<div class="dataTable_wrapper" style="text-align: center; float:left">
  <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="cursor:pointer">
      <thead >
          <tr>
              <th>Name</th>
              <th>Address</th>
              <th>Country</th>
              <th>City</th>
          </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT * FROM business";
          $res = $conn->query($sql);
          foreach ($res as $value) {
            $thisBusiness = getBusinessOfId(intval($value["id"]), false);
      ?>
            <tr class="businessSelectionItem" data-id="<?php echo $thisBusiness["id"]; ?>">
              <td><?php echo $thisBusiness["name"]; ?></td>
              <td><?php echo $thisBusiness["address"];  ?></td>
              <td><?php echo $thisBusiness["city"]["country"]["name"];  ?></td>
              <td><?php echo $thisBusiness["city"]["name"];  ?></td>
            </tr>
      <?php
          }
        ?>
      </tbody>
  </table>
</div>