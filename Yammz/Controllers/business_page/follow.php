<?php 

	$follow=mysql_query("INSERT INTO supplier (supplier_name,phone,email,location_description,disease_name,pest_name) 
	VALUES
	('$suppliername','$phone','$email','$location','$disease','$pest')") ;
	
	if(!$post_supplier){
		echo 'Can not select from the database'.mysql_error();
	}
?>