<?php

    function gString($id){
        srand ((double) microtime() * 1000000);
        $random1 = rand(1000,9999);
        $random2 = rand(1100,1999);
        $random3 = rand(200,999);
        
        $added=($random1)+($random2)+($id);

        $sto=$random1.$random2.$added.$random3;
        return $sto;
    }

    function gStringId($strg){

        $a[] = substr($strg,0,4); // Get the first 5 digit of string

        $b[] = substr($strg,4,4);  // Get the next 5 digit of string 

        $brk[] = substr($strg,0,8); 
        $wt[] = substr($strg,8);

        $lgh=strlen($wt[0]);

        $useful_lenght=$lgh-3;
        $final_added=substr($wt[0],0,$useful_lenght);

        $id= $final_added-$a[0] -$b[0]; 

        return $id;
    } 
 ?>