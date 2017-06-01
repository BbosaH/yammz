
<?php
 
 function showRates($rate,$price){ 

 	if($rate>-1 && $price>-1){
 	
	?>
		<span> 
			<?php for ($x = 0; $x < $rate; $x++) { ?>
				<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
			<?php }?>
			<?php
			 for ($x = 0; $x < 5-$rate; $x++) { ?>
				<i class="ion ion-ios-star-outline redbright" width="15px" height="15px"/>
				

			<?php }?>
		</span>
		&nbsp;&nbsp;
		<span> 
			<?php for ($x = 0; $x < $price; $x++) { ?>
				<i class="ion ion-social-usd " style="color:#00cc00;" width="15px" height="15px"/>
			<?php }?>
			
			<?php for ($x = 0; $x < 5-$price; $x++) { ?>
				
				<i class="ion ion-social-usd-outline " style="color:#00cc00;" width="15px" height="15px"/>
			<?php } ?>
		</span>
<?php

	}else if($rate==-1 && $price==-1){
		?>

		<span> 
		<?php
			 for ($x = 0; $x < 5; $x++) { ?>
				<i class="ion ion-ios-star-outline redbright" width="15px" height="15px"/>
				

			<?php }?>
		</span>
		&nbsp;&nbsp;
		<span> 
		<?php
			 for ($x = 0; $x < 5; $x++) { ?>
				<i class="ion ion-social-usd-outline " style="color:#00cc00;" width="15px" height="15px"/>
				

			<?php }?>
		</span>




<?php

	}

 }
 ?>