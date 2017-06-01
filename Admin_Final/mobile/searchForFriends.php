<?php
 ob_start();

	//include data base connection
	include_once("db_connection.php");
	
	//include the utility
	include_once("utility.php");
	
	//check the person making this request
	$user = getUser();

	$tst = "";
	$users = array();
	//get the data that was post
	$postdata = "";
	//you can only continue if there are no errors though
	if(count($errors) == 0 && isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		try{

			$citystr = "";
			if($post->country_id == 0 || $post->country_id == "0"){

			}else{
				if($post->city_id == 0 || $post->city_id == "0"){
					//get all the cities of this country
					$cities = getCitiesOfCountryId(intval($post->country_id ));
					for($i=0;$i<count($cities); $i++){
						$citystr = $citystr . " city_id = " . $cities[$i]["id"] . " OR ";
					}
					if(strlen($citystr) > 3){ //if there is any text
						//some users that have not yet specified thier city
						$citystr = $citystr . " city_id = 0 "; 
						$citystr = " ( ".$citystr . " ) " ; 
					}
				}else{
					$citystr = " ( city_id = " . $post->city_id . " OR city_id = 0  ) ";
				}
			}
			if(strlen($citystr) == 0){
				$citystr = " city_id = 0 ";
			}

			$namestr = "";
			if(strlen($post->name) == 0){
				$namestr = " id > 0 ";
			}else{
				$namestr = " name like '%".$post->name."%' ";
			}

			$friendIds = array();
			//get all the guys friends
			$sql = "SELECT * FROM user_friend WHERE user_id = ". $user["id"]  ;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	array_push($friendIds, intval($row["friend_id"]));
		    }

		    $sql = "SELECT * FROM user_friend WHERE friend_id = ". $user["id"] ;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	array_push($friendIds, intval($row["user_id"]));
		    }
		    //the where the string
		    $str = "";
		    for($i = 0; $i < count($friendIds); $i++){
		    	$str = $str . " id != " . $friendIds[$i] . " AND ";
		    }
		    $str = $str . " id !=  " . $user["id"] ;
		    $str = " ( " . $str . " ) " ;

			$sql = "SELECT * FROM user WHERE ". $namestr. " AND ". $citystr. " AND " . $str ." ORDER BY reviews_count DESC LIMIT 100" ;
		    $tst = $sql;
		    //respond($tst);
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisUser = getUserOfId(intval($row["id"]));
		    	$thisUser["reviews_count"] = $row["reviews_count"];
		    	array_push($users, $thisUser);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
	}
	
	

	respond($users);
  
?>