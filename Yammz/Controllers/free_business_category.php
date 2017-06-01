<?php
//
 function getCategories($from){

    $index_page="index_page";
    $home_page ="home_page";
    $home_tab ="home_tab";

    require_once("classes/connector.php");
    require_once("classes/db_config.php");
    $conn = new connector();
    $qry="SELECT * FROM category ";
    $results=$conn->getAll($qry); //or die ('Unable to execute query!!'.mysql_error());
    $rowCount=count($results);

   ?>
    <?php if($from==$index_page){ ?>

            <ul class="nav  nav-pills nav-stacked col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <?php
            		//$conn = new connector();





            		if($rowCount>=1){
            			$count =0;
            			foreach($results as $result){

            					$name=$result['name'];
            					$icon=$result['icon'];
            					$id=$result['id'];
             ?>


            				  <?php
            				  if($count==9)
            				  {
            				  	?>
            				  	<li class="siderLink card" id="<?php echo "$count"; ?>"style="margin-top:1px;" >
            						<a  href="#<?php echo"$count"; ?>" data-toggle="pill" ng-click="makeFillData(<?php echo"$count"; ?>)">
            						<span style="font-size:15px;" class="icon icon-<?php echo"$icon"; ?>"></span>

            							 <?php
            							 if(strlen($name)>16){
            								 $bcat=substr($name,0,15);
            								 echo"$bcat <B>....</B>";
            							 }
            							 else{
            								 echo"$name";
            							 }

            							  ?>
            						<span class="pull-right"><span class="icon icon-angle-right"></span></span>
            						</a>
            				  	</li>

            				  	<li class="siderLink more" style="margin-top:1px;"><a href="#tab_d" data-toggle="collapse">&nbsp;&nbsp;&nbsp;&nbsp;More </a></li>





            				  <?php
            				  //$count=$count+1;
            				  //continue;

            				  }else{

            				  	?>
            				  	 <li class="siderLink card" id="<?php echo "$count"; ?>"style="margin-top:1px;" >
            						<a  href="#<?php echo"$count"; ?>" ng-click="makeFillData(<?php echo"$count"; ?>)" data-toggle="pill">
            						<span style="font-size:15px;" class="icon icon-<?php echo"$icon"; ?>"></span>

            							 <?php
            							 if(strlen($name)>16){
            								 $bcat=substr($name,0,15);
            								 echo"$bcat <B>....</B>";
            							 }
            							 else{
            								 echo"$name";
            							 }

            							  ?>
            						<span class="pull-right"><span class="icon icon-angle-right"></span></span>
            						</a>
            				  	</li>

            <?php 			}
            				$count=$count+1;
            			}
            		}

            ?>
            </ul>

    <?php }else if($from==$home_page){?>

      <ul class="nav  nav-pills nav-stacked col-md-12 col-lg-12 col-sm-12 col-xs-12">
      <?php
          if($rowCount>=1){
            $count =0;
            foreach($results as $result){

                $name=$result['name'];
                $icon=$result['icon'];
                $id=$result['id'];
       ?>


                <?php
                if($count==9)
                {
                  ?>
                  <li class="siderLink card" id="<?php echo "$count"; ?>"style="margin-top:1px;" >
                  <a  href="<?php echo BaseURL."home_tab.php#";echo"$count"; ?>" data-toggle="pill" ng-click="redirect(<?php echo"$count"; ?>)">
                  <span style="font-size:15px;" class="icon icon-<?php echo"$icon"; ?>"></span>

                     <?php
                     if(strlen($name)>16){
                       $bcat=substr($name,0,15);
                       echo"$bcat <B>....</B>";
                     }
                     else{
                       echo"$name";
                     }

                      ?>
                  <span class="pull-right"><span class="icon icon-angle-right"></span></span>
                  </a>
                  </li>

                  <li class="siderLink more" style="margin-top:1px;"><a href="#tab_d" data-toggle="collapse">&nbsp;&nbsp;&nbsp;&nbsp;More </a></li>





                <?php
                //$count=$count+1;
                //continue;

                }else if($count==1)
                {
                  ?>

                   <li class="siderLink card" id="<?php echo "$count"; ?>"style="margin-top:1px;" >
                  <a  href="<?php echo BaseURL."home_tab.php#";echo"$count"; ?>" ng-click="redirect(<?php echo"$count"; ?>)" data-toggle="pill">

                  <span style="font-size:15px;" class="icon icon-<?php echo"$icon"; ?>"></span>

                     <?php
                     if(strlen($name)>16){
                       $bcat=substr($name,0,15);
                       echo"$bcat <B>....</B>";
                     }
                     else{
                       echo"$name";
                     }

                      ?>
                  <span class="pull-right"><span class="icon icon-angle-right"></span></span>
                  </a>
                  </li>



                <?php }
                else{

                  ?>
                   <li class="siderLink card" id="<?php echo "$count"; ?>"style="margin-top:1px;" >
                  <a  href="<?php echo BaseURL."home_tab.php#";echo"$count"; ?>" ng-click="redirect(<?php echo"$count"; ?>)" data-toggle="pill">

                  <span style="font-size:15px;" class="icon icon-<?php echo"$icon"; ?>"></span>

                     <?php
                     if(strlen($name)>16){
                       $bcat=substr($name,0,15);
                       echo"$bcat <B>....</B>";
                     }
                     else{
                       echo"$name";
                     }

                      ?>
                  <span class="pull-right"><span class="icon icon-angle-right"></span></span>
                  </a>
                  </li>

      <?php 			}
              $count=$count+1;
            }
          }

      ?>
      </ul>

    <?php }else if($from==$home_tab){ ?>

      <ul class="nav  nav-pills nav-stacked col-md-12 col-lg-12 col-sm-12 col-xs-12">
      <?php
          if($rowCount>=1){
            $count =0;
            foreach($results as $result){

                $name=$result['name'];
                $icon=$result['icon'];
                $id=$result['id'];
       ?>


                <?php
                if($count==9)
                {
                  ?>
                  <li class="siderLink card" id="<?php echo "$count"; ?>"style="margin-top:1px;" >
                  <a  href="#<?php echo"$count"; ?>" data-toggle="pill" ng-click="togglify(<?php echo $id ?>)">
                  <span style="font-size:15px;" class="icon icon-<?php echo"$icon"; ?>"></span>

                     <?php
                     if(strlen($name)>16){
                       $bcat=substr($name,0,15);
                       echo"$bcat <B>....</B>";
                     }
                     else{
                       echo"$name";
                     }

                      ?>
                  <span class="pull-right"><span class="icon icon-angle-right"></span></span>
                  </a>
                  </li>

                  <li class="siderLink more" style="margin-top:1px;"><a href="#tab_d" data-toggle="collapse">&nbsp;&nbsp;&nbsp;&nbsp;More </a></li>





                <?php
                //$count=$count+1;
                //continue;

                }else{

                  ?>
                   <li class="siderLink card" id="<?php echo "$count"; ?>"style="margin-top:1px;" >
                  <a  href="#<?php echo"$count"; ?>" ng-click="togglify(<?php echo $id ?>)" data-toggle="pill">
                  <span style="font-size:15px;" class="icon icon-<?php echo"$icon"; ?>"></span>

                     <?php
                     if(strlen($name)>16){
                       $bcat=substr($name,0,15);
                       echo"$bcat <B>....</B>";
                     }
                     else{
                       echo"$name";
                     }

                      ?>
                  <span class="pull-right"><span class="icon icon-angle-right"></span></span>
                  </a>
                  </li>

      <?php 			}
              $count=$count+1;
            }
          }

      ?>
      </ul>


    <?php }?>

<?php
}
?>
