<?php

error_reporting (0);
header('Access-Control-Allow-Origin: *');


require_once('connector.php');
require_once('businessmodel.php');
require_once('picture_details_rating_post.php');
require_once('nopicture_details_rating_post.php');
require_once('photo_post.php');
require_once('only_rating_post.php');
require_once('comment.php');
require_once('random_biz.php');



$conn = new connector();
$model = new business();

//var_dump($_REQUEST);
//var_dump($_FILES);
function raw_json_encode($input, $flags = 0) {
    $fails = implode('|', array_filter(array(
        '\\\\',
        $flags & JSON_HEX_TAG ? 'u003[CE]' : '',
        $flags & JSON_HEX_AMP ? 'u0026' : '',
        $flags & JSON_HEX_APOS ? 'u0027' : '',
        $flags & JSON_HEX_QUOT ? 'u0022' : '',
    )));
    $pattern = "/\\\\(?:(?:$fails)(*SKIP)(*FAIL)|u([0-9a-fA-F]{4}))/";
    $callback = function ($m) {
        return html_entity_decode("&#x$m[1];", ENT_QUOTES, 'UTF-8');
    };
    return preg_replace_callback($pattern, $callback, json_encode($input, $flags));
}

function getMaxLikeCount($feeds)
{
	global $conn;
   // echo json_encode($feeds);
    
	$counter=0;
	$finalCount =0;
	$myfeed = null;

	foreach ($feeds as $feed) {
		# code...=+1;$counter+1;
		$counter=$counter+1;
		//echo $counter;
		//echo "hhjjjj";
		
		$totoCount  =0;

		$likes = $conn->getAll("SELECT *FROM `like` WHERE newsfeed_id='".$feed['id']."'");
		if(empty($likes))
		{
			
		}

		$commments = $conn->getAll("SELECT *FROM `comment` WHERE review_id='".$feed['id']."'");
		$totoCount=count($likes)+count($commments);

		if($finalCount<$totoCount)
		{
			$finalCount=$totoCount;
			$myfeed=$feed;
		}else
		{
			$myfeed=$feed;
		}

		
		
	}
    //echo json_encode($myfeed);
	return $myfeed;

}



function getCurrentUsersCountryInfo(){
		$user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $city = $geo["geoplugin_city"];

        $country_code = $geo["geoplugin_countryCode"];
        $country = $geo["geoplugin_countryName"];

        $country_code ="UG";
        $info = array('country_name' =>$country , 'country_code' =>$country_code );
        /*
        geoplugin_request
        geoplugin_status
        geoplugin_credit
        geoplugin_city
        geoplugin_region
        geoplugin_areaCode
        geoplugin_dmaCode
        geoplugin_countryCode
        geoplugin_countryName
        geoplugin_continentCode
        geoplugin_latitude
        geoplugin_longitude
        geoplugin_regionCode
        geoplugin_regionName
        geoplugin_currencyCode
        geoplugin_currencySymbol
        geoplugin_currencySymbol_UTF8
        geoplugin_currencyConverter
        */

        return $info;

}

function getCurrentUsersCityInfo(){
		$user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $city = $geo["geoplugin_city"];

        $country_code = $geo["geoplugin_countryCode"];
        $country = $geo["geoplugin_countryName"];


        $info = array('country_name' =>$country , 'country_code' =>$country_code);
        /*
        geoplugin_request
        geoplugin_status
        geoplugin_credit
        geoplugin_city
        geoplugin_region
        geoplugin_areaCode
        geoplugin_dmaCode
        geoplugin_countryCode
        geoplugin_countryName
        geoplugin_continentCode
        geoplugin_latitude
        geoplugin_longitude
        geoplugin_regionCode
        geoplugin_regionName
        geoplugin_currencyCode
        geoplugin_currencySymbol
        geoplugin_currencySymbol_UTF8
        geoplugin_currencyConverter
        */

        return $info;

}

$myCountryInfo = getCurrentUsersCountryInfo();
$myCountryCode =$myCountryInfo['country_code'];

function getCountryLocalTime($country_code){

		$timezones=DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY,$country_code);
		date_default_timezone_set(''.$timezones[0].'');
		$local_time= date('m-d-Y h:i:s');
		$time_zon=$timezones[0];

		$zone=array('localtime' =>$local_time,'time_zone' =>$time_zon);

		return $zone;
}

function getTimeVariation($timestamp,$country_code)
{
	$timezones=DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY,$country_code);
	date_default_timezone_set(''.$timezones[0].'');
	//echo $timezones[0];
	// processing from timestamp

	// $date = new DateTime();
 //    $date->format('U = Y-m-d H:i:s') ;
	// $date->setTimestamp(intval($timestamp));
	// $gmtDateTime = $date;
	//echo $timestamp;
	$date = date('Y-m-d H:i:s',intval($timestamp));
	$gmtDateTime = new DateTime($date);
	//$finalgmtdate = $gmtDateTime->format('Y-m-d H:i:s');
	// processing from timestamp



	//processing current local time
	$localdate = date('Y-m-d H:i:s');
	$localDateTime = new DateTime($localdate);
	//$finalmydate = $myDateTime->format('Y-m-d H:i:s');

	//processing current time

	 return ago($gmtDateTime,$localDateTime);

}

function pluralize( $count, $text ) 
{ 
    return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
}

function ago($datetime,$mycurrentdatetime )
{
    $interval = $mycurrentdatetime->diff( $datetime );
    $suffix = ( $interval->invert ? ' ago' : '' );
    if ( $v = $interval->y >= 1 ) return pluralize( $interval->y, 'year' ) . $suffix;
    if ( $v = $interval->m >= 1 ) return pluralize( $interval->m, 'month' ) . $suffix;
    if ( $v = $interval->d >= 1 ) return pluralize( $interval->d, 'day' ) . $suffix;
    if ( $v = $interval->h >= 1 ) return pluralize( $interval->h, 'hour' ) . $suffix;
    if ( $v = $interval->i >= 1 ) return pluralize( $interval->i, 'minute' ) . $suffix;
    return pluralize( $interval->s, 'second' ) . $suffix;
}






function fill_country_drop_down($countries)
{

		foreach($countries as $country)
		{


			echo '<option value="'.$country['id'].'">'; echo $country['name']; echo'</option>';


		}

}
function fill_city_drop_down($cities)
{
		foreach($cities as $city)
		{
			echo '<option value="'.$city['id'].'">'; echo $city['name']; echo'</option>';
		}
}


function AdminImageUploader($submitName, $fileToUpload, $target_dir = "uploads/"){

		$target_file = $target_dir . basename($_FILES[$fileToUpload]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$uploadErrors = array();
		try{
			// Check if image file is an actual image or fake image
			if(isset($_FILES[$submitName])) {
				$nem = $_FILES[$fileToUpload]["tmp_name"];
				if($nem == null || strlen($nem ) == 0){
					array_push($uploadErrors, "Possibly no file was uploaded") ;
				}else{
		    		$check = getimagesize($nem );
		    		if($check !== false) {
		        		//echo "File is an image - " . $check["mime"] . ".";
		        		$uploadOk = 1;
		    		} else {
		        		array_push($uploadErrors, "File is not an image.") ;
		        		$uploadOk = 0;
		    		}
		    	}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
	    		array_push($uploadErrors, "Sorry, file already exists.");
	    		$uploadOk = 0;
			}
			// Check file size
			if ($_FILES[$fileToUpload]["size"] > 500000) {
			    array_push($uploadErrors, "Sorry, your file is too large.");
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" && $imageFileType != "PNG"  ) {
			    array_push($uploadErrors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    array_push($uploadErrors, "Sorry, your file was not uploaded.");
			} else {// if everything is ok, try to upload file
			    if (move_uploaded_file($_FILES[$fileToUpload]["tmp_name"], $target_file)) {
			        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        array_push($uploadErrors, "Sorry, there was an error uploading your file.");
			    }
			}
		}catch(Exception $e)
		{
			echo $e->getMessage();
			exit(0);
		}
		return (count($uploadErrors)>0)? $uploadErrors : "uploads/" . basename($_FILES[$fileToUpload]["name"]);
	}


	function sendTheMail($message,$subject,$to,$tag){
   		try{
	   		require_once '../../mandrill/src/Mandrill.php';

			$mandrill = new Mandrill('T0bQDPYGxH5Jf3hXgX_ldA');
			$message = array(
		        'html' => $message,
		        'text' => '',
		        'subject' => $subject,
		        'from_email' => 'postmaster@yammzit.com',
		        'from_name' => 'Yammzit',
		        'to' => array(
		            array(
		                'email' => $to,
		                'name' => $to,
		                'type' => 'to'
		            )
		        ),
		        'headers' => array('Reply-To' => 'postmaster@yammzit.com'),
		        'important' => true,
		        'track_opens' => null,
		        'track_clicks' => null,
		        'auto_text' => null,
		        'auto_html' => null,
		        'inline_css' => null,
		        'url_strip_qs' => null,
		        'preserve_recipients' => null,
		        'view_content_link' => null,
		        'bcc_address' => 'nyolamike@live.com',
		        'tracking_domain' => null,
		        'signing_domain' => null,
		        'return_path_domain' => null,
		        'merge' => true,
		        'merge_language' => 'mailchimp',
		        'global_merge_vars' => array(
		            array(
		                'name' => 'merge1',
		                'content' => 'merge1 content'
		            )
		        ),
		        'merge_vars' => array(
		            array(
		                'rcpt' => $to,
		                'vars' => array(
		                    array(
		                        'name' => 'merge2',
		                        'content' => 'merge2 content'
		                    )
		                )
		            )
		        ),
		        'tags' => array($tag),
		        'google_analytics_domains' => array('example.com'),
		        'google_analytics_campaign' => 'message.from_email@example.com',
		        'metadata' => array('website' => 'www.yammzit.com'),
		        'recipient_metadata' => array(
		            array(
		                'rcpt' => 'recipient.email@example.com',
		                'values' => array('user_id' => 123456)
		            )
		        )
		    );

			// array(
		 //        'type' => 'image/png',
		 //        'name' => 'IMAGECID',
		 //        'content' => 'ZXhhbXBsZSBmaWxl'
		 //    )

		    $async = false;
		    $ip_pool = 'Main Pool';
		    $send_at = date("Y-m-d h:i:s", strtotime('2016-04-16'));

		    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
		    //print_r($result);

	    }catch(Mandrill_Error $e) {
		    // Mandrill errors are thrown as exceptions
		    $err =  'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		   // array_push($errors, $err);
		    echo $err;
		    exit(0);
		    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
		    //throw $e;
	    }
}


	function is_session_started()
	{
	    if ( php_sapi_name() !== 'cli' ) {
	        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
	            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
	        } else {
	            return session_id() === '' ? FALSE : TRUE;
	        }
	    }
	    return FALSE;
	}


	function base64_to_jpeg($base64_string, $output_file) {
			 $myerrors;

			try{
			    $ifp = fopen("../../".$output_file, "wb");

			    $base64_string = str_replace(' ', '+', $base64_string);

			    $data = explode(',', $base64_string);

			    fwrite($ifp, base64_decode($data[0]));
			    fclose($ifp);
		    }catch(Exception $e)
			{
				array_push($errors, $e->getMessage());
			}

		    return $output_file;
	}

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


if(isset($_POST['login_form'])&&isset($_POST['username'])&&isset($_POST['password']))
{
	ini_set('session.cookie_lifetime', 60 * 60 * 24 * 365);
    ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);
	session_start();
    
	$username = $_POST['username'];
	$password = $_POST['password'];
	//echo "The username is ." . $username;
	//echo "password is ." . $password;
	//$username="steven@yammzit.com";
	//$password="123456";
	//Input Validations
	if(strcmp($username ,'')==0) {
		$errmsg_arr[] = '<i class="ion ion-alert" style="font-size: 20px;color: #FFFFFF;"></i> username missing';
		$errflag = true;
		if($errflag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			//header("location: ../../index.php");
			echo json_encode( array('login_status'=>-1));
			exit();
		}
	}
	if(strcmp($password ,'')==0) {
		$errmsg_arr[] = '<i class="ion ion-alert" style="font-size: 20px;color: #FFFFFF;"></i> Password missing';
		$errflag = true;
		if($errflag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			//header("location: ../../index.php");
			echo json_encode( array('login_status'=>-1));
			exit();
		}
	}

	try{

		// $qry="SELECT * FROM user WHERE email='$username' AND password='$password'";
		// $result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());;
		$password =md5($password);
		$result = $conn->getAll("SELECT * FROM user WHERE email='$username' AND password='$password'");

		//Check whether the query was successful or not
		if($result) {
			if(count($result) > 0) {
				//echo 'Login Successful';
				//session_regenerate_id();

				$member = $result[0];
				$city = $conn->getCityOfId($member['city_id']);
				$country=$city['country'];
				$country_id =$country['id'];
			    $_SESSION['SESS_MEMBER_ID'] = $member['id'];
			    $_SESSION['SESS_USERNAME'] = $member['name'];
			    $_SESSION['SESS_COUNTRY_ID'] = $country_id;

			   // session_write_close();

				$id=$_SESSION['SESS_MEMBER_ID'];

				//header("location: ../../home2.php");
				echo json_encode(array('login_status'=>1));

			}else {
				//echo 'Login failed';
				echo json_encode( array('login_status'=>0));
				
			}
		}else {
			//echo '';
			$errmsg_arr[] = ' <i class="ion ion-alert" style="font-size: 20px;color: #FFFFFF;"></i>  Wrong Username or Password !!!';
			$errflag = true;
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			//header("location: ../../index.php");
			echo json_encode( array('login_status'=>-2));
			//die("Query failed");

		}
	}catch(PDOException $e){

		$msgb = $e->getMessage();
    }



}else if(isset($_GET['review'])&&isset($_GET['page']))
	{
		if(strcmp($_GET['review'],'latest')==0)
		{
			//yesturday at 12:am
			$yesturtimestamp=strtotime(date('d.m.Y',strtotime("-1 days")));

			//today at 12 am
			$todaytimestamp=strtotime(date('d.m.Y'));

			$yesturdayfeeds =$conn->getAll("SELECT *FROM newsfeed WHERE date_created >='".$yesturtimestamp."' AND date_created < '".$todaytimestamp."' AND business_id !=1");
			//$yesturdayfeeds =$conn->getAll("SELECT *FROM newsfeed");
			$newmyfeed=getMaxLikeCount($yesturdayfeeds);
			
			
			//$lastInsertedId =$conn->getMAxId('newsfeed');
			$latestreview = $conn->getNewsFeedOfId($newmyfeed['id']);
			if(strcmp($_GET['page'],'index')==0)
			{

			}else
			{
				$latestreview['user']['id'] =gString($latestreview['user']['id']);
				$latestreview['business']['id'] =gString($latestreview['business']['id']);
				
				 if(!isset($_SESSION)) {
				 //session_start(); 
				 //$latestreview['session_id']=$_SESSION['SESS_MEMBER_ID'];
				 }else
				 {
					 $latestreview['session_id']=$_SESSION['SESS_MEMBER_ID'];
				 }

			}

			
			
			echo json_encode($latestreview);

		}
	}else if(isset($_GET['events']))
	{
		if(strcmp($_GET['events'],'latest')==0)
		{
			$latest_events=$conn->getLatestEvents();
			echo json_encode($latest_events);

		}
	}
	else if(isset($_GET['gossips']))
	{
		if(strcmp($_GET['gossips'],'latest')==0)
		{
			$latest_gossips=$conn->getLatestGossips();
			echo json_encode($latest_gossips);


		}


	}else if (isset($_GET['categories']))
	{
		if(strcmp($_GET['categories'],'categories')==0){
			//echo "piggie";
			$businesscategories=$conn->renderCategories();
			//var_dump($businesscategories);
		
			//$json = ;
			//$json = json_encode(array_map('utf8_encode', $businesscategories));
			echo json_encode($businesscategories);
		}

	}else if (isset($_GET['countries']))
	{
		if(strcmp($_GET['countries'], 'all')==0)
		{   //echo "acchahaha";
			$countries = $conn->getAll("SELECT *FROM country ORDER BY name ASC");
			//var_dump($countries);
			echo json_encode($countries);
		}

	}else if (isset($_GET['slides']))
	{
		if(strcmp($_GET['slides'],'all')==0)
		{
			$slides =$conn->getAll("SELECT *FROM slide");
			echo json_encode($slides);
		}
	}else if (isset($_GET['signupCountry_id']))
	{
		$cities=$conn->getAll("SELECT * FROM city WHERE country_id ='".$_GET['signupCountry_id']."'");
		echo json_encode($cities);

	}else if(isset($_POST['sign_user']))
	{
		
		$password = md5($_POST['password']);
		$date = $_POST['dob'];
		$date = str_replace('/', '-', $date);
		$dob_timestamp = strtotime($date);

		$log_array =$conn->insertNewUser(addslashes($_POST['first_name']),addslashes($_POST['last_name']),addslashes($_POST['email']),$password,$_POST['city_id'],$dob_timestamp,$_POST['gender'],$social,'',addslashes($_POST['phone']));

		// ('All sent well man'.' '.$successstring);
		$username =$log_array['email'];
		$pass =$log_array['password'];
		//echo $username;
		//echo $pass;

		try{

		// $qry="SELECT * FROM user WHERE email='$username' AND password='$password'";
		// $result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());;
		//$password =md5($password);
		$result = $conn->getAll("SELECT * FROM user WHERE email='$username' AND password='$pass'");

		//Check whether the query was successful or not
		if($result) {
			if(count($result) > 0) {
				//echo 'Login Successful';
				session_start();
				session_regenerate_id();
				$member = $result[0];
			    $_SESSION['SESS_MEMBER_ID'] = $member['id'];
			    $_SESSION['SESS_USERNAME'] = $member['first_name']." ".$member['last_name'];

			    // session_write_close();
			    //echo $_SESSION['SESS_MEMBER_ID'];
			    //echo "truee trueee tteurur";

				// $id=$_SESSION['SESS_MEMBER_ID'];

				//header("location: ../../home2.php");

			}else {
				echo 'Login failed';
				
			}
		}else {
			$errmsg_arr[] = 'Wrong Username or Password !!!';
			$errflag = true;
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			//header("location: ../../index.php");
			die("Query failed");

		}
	}catch(PDOException $e){

		$msgb = $e->getMessage();
    }



	}
	else if(isset($_GET['dropcategories']))
	{
		$categories =$conn->dropcategories();
		echo json_encode($categories);
	}
	//else if(isset($_GET['businesses_to_follow'])&&isset($_GET['city_id'])&&isset($_GET['user_id']))

	else if(isset($_GET['businesses_to_follow'])&&isset($_GET['user_id']))

	{

		if(strcmp($_GET['businesses_to_follow'],'random')==0)
		{
			$finalBusinesses=[];
			 $randombusinesses = $conn->getAllDataRandomly('business',8);
			 foreach ( $randombusinesses as  $randombusiness) {
			 	# code...
			 	 $business_follows =$conn->getAll("SELECT *FROM business_follower WHERE business_id='".$randombusiness['id']."' AND user_id='".$_GET['user_id']."'");
			 	 if(!empty($business_follows))
			 	 {	
			 	 	$randombusiness['isFollowed']='true';

			 	 }else
			 	 {
			 	 	$randombusiness['isFollowed']='false';
			 	 }
			 	 $randombusiness['un_enc_id']=$randombusiness['id'];
			 	 $randombusiness['id'] = gString($randombusiness['id']);
			 	 array_push($finalBusinesses,$randombusiness);
			 }
			
			//$randombusinesses = $conn->getSuggestedDataToFollow('business',5,$_GET['city_id'],$_GET['user_id']);
			 //$randombusinesses = $conn->getAll('SELECT *FROM business');
			echo json_encode($finalBusinesses);

		}
	}
	else if(isset($_GET['side_adds']))
    {
		if(strcmp($_GET['side_adds'],'random')==0)
		{
			

			$myCountryInfo = getCurrentUsersCountryInfo();
			$myCountryCode =$myCountryInfo['country_code'];
			//echo "thisis the country code".$myCountryCode;

			$mycountry_ids =$conn->getAll("SELECT id FROM country where country_code='".$myCountryCode."'");

			$mycountry_id =$mycountry_ids[0]['id'];

			//echo "this is my country".$mycountry_id[0]['id'];

			$final_side_adds = array();
			// $side_adds = $conn->getAllDataRandomly('side_add',2);
			$ad_status="Approved";

			$all_side_adds = $conn->getAll("SELECT * FROM adds WHERE add_type_id=1 AND status='".$ad_status."' ORDER BY RAND() LIMIT 2");
			//echo "tigidiii".$all_side_adds[0]['add_title'];
			foreach($all_side_adds as $side_add)
			{
				//echo "kabedwa".$side_add['add_title'];
				$advert_businesses=$conn->getAll("SELECT *FROM business WHERE id ='".$side_add['business_id']."'");
				$advert_country_instances = $conn->getAll("SELECT *FROM advert_country WHERE country_id='".$mycountry_id."' AND ad_id='".$side_add['id']."'");

				if(count($advert_country_instances)>0)
				{

					$final_side_add =array(
							'id' => $side_add['id'],
							'enc_business_id'=>gString($advert_businesses[0]['id']),
							'business_id'=>$advert_businesses[0]['id'],
							'business_name'=>$advert_businesses[0]['name'],
							'business_logo'=>$advert_businesses[0]['logo'],
							'image'=>$side_add['ad_url'],
							'title'=>$side_add['add_title'],
							'details'=>$side_add['add_description'],
					);
					

					array_push($final_side_adds, $final_side_add);

				}


			}
			
			


			 echo json_encode($final_side_adds);

		}


	}else if(isset($_POST['addbusiness_form']))
	{
		//var_dump($_FILES['business_logo']);
		$who_added_id =$_POST['user_id'];
		$busines_name = $_POST['name'];

		if(!empty($_FILES['business_logo']["tmp_name"])){

			move_uploaded_file($_FILES['business_logo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name.".png");
		    $imagefile= "uploads/".$busines_name.".png";
		}else
		{
			$imagefile="uploads/defbanner.png";
		}
		


		$busines_logo = $imagefile;
		$country_id = $_POST['country_id'];
		$city_id = $_POST['city_id'];
		$address = $_POST['address'];
		$busines_subcategory_id1 = $_POST['subcategoryid_1'];
		$busines_subcategory_id2 = $_POST['subcategoryid_2'];
		$busines_subcategory_id3 = $_POST['subcategoryid_3'];

		//echo "subcategory1 is=>".$busines_subcategory_id1;
		//echo "subcategory2 is=>".$busines_subcategory_id2;
		// "subcategory3 is=>".$busines_subcategory_id3;

		 $model->setWhoAddedId($who_added_id);
		 $model->setDateAdded(time());
		 $model->setName(addslashes($busines_name));
		 $model->setCityId($city_id);
		 $model->setCountryId($country_id);
		 $model->setAddress(addslashes($address));
		 $model->setProfilePhoto($busines_logo);
		 $model->setBanner($busines_logo);

		 $model->setSubCategory1Id($busines_subcategory_id1);
         $model->setSubCategory2Id($busines_subcategory_id2);
         $model->setSubCategory3Id($busines_subcategory_id3);

         $returned_business_id=$conn->insertBusiness($model);
         $enc_business_id = gString($returned_business_id);

         echo json_encode(array(
         		'business_id'=>$returned_business_id,
         		'enc_business_id'=>$enc_business_id

         	));


	}elseif (isset($_GET['middle_adds'])) {
		# code...
		if(strcmp($_GET['middle_adds'],'all')==0)
		{
			$final_middle_adds = array();
			$middle_adds = $conn->getAll("SELECT * FROM newsfeed WHERE kind = 'add' ");
			foreach($middle_adds as $middle_add)
			{
				$business=$conn->getBusinessOfId($middle_add['business_id']);
				$final_middle_add =array(
							'id' => $middle_add['id'],
							'business'=>$business,
							'details'=>$middle_add['details'],
				);
				array_push($final_middle_adds, $final_middle_add);

			}
			echo json_encode($final_middle_adds);
		}
	}else if (isset($_GET['liked_comment_id'])&&isset($_GET['user_id'])&&isset($_GET['newsfeed_id']) )
	{

		$user_id =$_GET['user_id'];
		$comment_id =$_GET['liked_comment_id'];
		$newsfeed_id =0;
		$date_created =time();

		$conn->insertCommentLike($user_id,$comment_id,$newsfeed_id,$date_created);




	}else if (isset($_GET['unliked_comment_id'])&&isset($_GET['user_id'])&&isset($_GET['newsfeed_id']) )
	{

		$user_id =$_GET['user_id'];
		$comment_id =$_GET['unliked_comment_id'];
		$newsfeed_id =$_GET['newsfeed_id'];
		$date_created =time();

		$conn->deleteCommentLike($user_id,$comment_id,$newsfeed_id,$date_created);




	}
	else if (isset($_GET['liked_newsfeed_id'])&&isset($_GET['user_id']))
	{

		$user_id =$_GET['user_id'];
		$comment_id =0;
		$newsfeed_id =$_GET['liked_newsfeed_id'];
		$date_created =time();

		//echo $newsfeed_id."==";
		//echo $user_id."==";
		$conn->insertNewsFeedLike($user_id,$newsfeed_id,$date_created);




	}else if (isset($_GET['unliked_newsfeed_id'])&&isset($_GET['user_id']))
	{

		$user_id =$_GET['user_id'];
		$newsfeed_id =$_GET['unliked_newsfeed_id'];
		$comment_id =0;
		$date_created =time();

		$conn->deleteNewsFeedLike($user_id,$newsfeed_id,$date_created);




	}
	else if(isset($_GET['review_id'])&&isset($_GET['user_id'])&&isset($_GET['commentdetails']))
	{
		$commentTo ="0";
		$kind = "normal";
		$review_id=$_GET['review_id'];
		$user_id=$_GET['user_id'];
		$details=$_GET['commentdetails'];
		$date_created =time();

		$conn->insertComment($user_id,$review_id,$kind,$date_created,$details,$commentTo);

	}else if(isset($_GET['liked_newsfeeds_id'])&&isset($_GET['user_id']))
	{
		$user_id =$_GET['user_id'];
		$comment_id =0;
		$newsfeed_id =$_GET['liked_newsfeeds_id'];
		$date_created =time();

		$conn->insertNewFeedLike($user_id,$comment_id,$newsfeed_id,$date_created);
	}else if(isset($_GET['business_claimer_id'])&&isset($_GET['business_id']))
	{
		$owner_id = $_GET['business_claimer_id'];
		$business_id =$_GET['business_id'];
		$business=$conn->getBusinessOfId($business_id);
		if($business['owner_id']==$owner_id)
		{
			$business['owned']="yes";
			echo json_encode($business);

		}else
		{
			$business['owned']="no";
			echo json_encode($business);
			

		}


	}else if(isset($_POST['random_review']))
	{

		$kind =$_POST['kind'];
		
		$business_id = gStringId($_POST['business_id']);
		$business =$conn->getBusinessOfId($business_id);
		$busines_name=$business['name'];
		$date_created=time();

		if($kind=="review_photo"){

				move_uploaded_file($_FILES['picture']["tmp_name"], "../../admin/Theme/uploads/".$busines_name.time().".png");
			$imagefile= "uploads/".$busines_name.time().".png";
			$conn->submitBusinessPhoto($_POST['current_user_id'],$business_id,$imagefile);
			$newsfeed=$conn->insertNewsfeed($_POST['date_created'],$_POST['current_user_id'],$_POST['kind'],$_POST['cost'],$_POST['good'],addslashes($_POST['details']),$business_id);
			$newsfeed['date_created'] = getTimeVariation($newsfeed['date_created'],'UG');
			$conn->submitNewsFeedPhoto($newsfeed['id'],$imagefile);
			$photos=$conn->getAll("SELECT * FROM newsfeed_photo WHERE newsfeed_id='".$newsfeed['id']."'");
			$newsfeed['photo']=$photos[0]['photo'];

				$id =$_POST['current_user_id'];
			/*relationships of this newsfeed */

			    /* my freinds */
				$user_friends= $conn->getAll("SELECT * FROM user_friend WHERE ((user_id=$id OR friend_id=$id) AND status=2)");
				
		
				 foreach($user_friends as $user_friend)
				 {
				 	//$friend = $conn->getUserOfId($user_friend['friend_id']);
				 	$date_created=time();

				 	if($user_friend['friend_id']==$id)
				 	{
				 		//echo "bada";
						 $friend = $conn->getUserOfId($user_friend['user_id']);
						 
						$querystring3 = "INSERT INTO user_wall(user_id,review_id,date_created) VALUES ('".$user_friend['user_id']."','".$newsfeed['id']."','".$date_created."')";
    					$query3 = $dbase->prepare($querystring3);
    					$query3->execute();
						 
					//array_push($friends,$friend);
				 		//continue;
				 	}else if($user_friend['user_id']==$id){
				 		//echo "badi";
						  $friend = $conn->getUserOfId($user_friend['friend_id']);
						 $querystring3 = "INSERT INTO user_wall(user_id,review_id,date_created) VALUES ('".$user_friend['friend_id']."','".$newsfeed['id']."','".$date_created."')";
    					$query3 = $dbase->prepare($querystring3);
    					$query3->execute();
				 		 
				 	}
				 }

				  /* my freinds */

			/*relationships of this newsfeed */
			$newsfeed['un_enc_user_id'] = $newsfeed['user']['id'];
			$newsfeed['user']['id'] = gString($newsfeed['user']['id']);

			$newsfeed['un_enc_business_id'] = $newsfeed['business']['id'];
			$newsfeed['business']['id'] = gString($newsfeed['business']['id']);
			
			//fill_photo_post($newfeed);
			echo json_encode($newsfeed);

		}else if($kind=="add_photo" || $kind=="business_photo" )
		{
			$id=$_POST['current_user_id'];
			//details of newsfeed is the photo url // agreeed?? mchiteewwwx
			// move_uploaded_file($_FILES['picture']["tmp_name"], "../../admin/Theme/uploads/".$busines_name.time().".png");
			// $imagefile= "uploads/".$busines_name.time().".png";
			// $conn->submitBusinessPhoto($_POST['current_user_id'],$business_id,$imagefile);
			$newsfeed=$conn->insertNewsfeed($_POST['date_created'],$_POST['current_user_id'],$_POST['kind'],$_POST['cost'],$_POST['good'],addslashes($imagefile),$business_id);
			$newsfeed['date_created'] = getTimeVariation($newsfeed['date_created'],'UG');

			/*relationships of this newsfeed */

			    /* my freinds */
				$user_friends= $conn->getAll("SELECT * FROM user_friend WHERE ((user_id=$id OR friend_id=$id) AND status=2)");
				
		
				 foreach($user_friends as $user_friend)
				 {
				 	//$friend = $conn->getUserOfId($user_friend['friend_id']);
				 	$date_created=time();

				 	if($user_friend['friend_id']==$id)
				 	{
				 		//echo "bada";
						 $friend = $conn->getUserOfId($user_friend['user_id']);
						 
						$querystring3 = "INSERT INTO user_wall(user_id,review_id,date_created) VALUES ('".$user_friend['user_id']."','".$newsfeed['id']."','".$date_created."')";
    					$query3 = $dbase->prepare($querystring3);
    					$query3->execute();
						 
					//array_push($friends,$friend);
				 		//continue;
				 	}else if($user_friend['user_id']==$id){
				 		//echo "badi";
						  $friend = $conn->getUserOfId($user_friend['friend_id']);
						 $querystring3 = "INSERT INTO user_wall(user_id,review_id,date_created) VALUES ('".$user_friend['friend_id']."','".$newsfeed['id']."','".$date_created."')";
    					$query3 = $dbase->prepare($querystring3);
    					$query3->execute();
				 		 
				 	}
				 }

				  /* my freinds */

			/*relationships of this newsfeed */
			$newsfeed['un_enc_user_id'] = $newsfeed['user']['id'];
			$newsfeed['user']['id'] = gString($newsfeed['user']['id']);

			$newsfeed['un_enc_business_id'] = $newsfeed['business']['id'];
			$newsfeed['business']['id'] = gString($newsfeed['business']['id']);

			echo json_encode($newsfeed);
			//fill_only_photo_post($newsfeed);

		}
		else
		{ 
			$id=$_POST['current_user_id']; 
			//$business_id = gStringId($_POST['business_id']);
			$newsfeed=$conn->insertNewsfeed(time(),$_POST['current_user_id'],$_POST['kind'],$_POST['cost'],$_POST['good'],addslashes($_POST['details']),$business_id);
			$newsfeed['date_created'] = getTimeVariation($newsfeed['date_created'],'UG');
			/*relationships of this newsfeed */

			    /* my freinds */
				$user_friends= $conn->getAll("SELECT * FROM user_friend WHERE ((user_id=$id OR friend_id=$id) AND status=2)");
				
		
				 foreach($user_friends as $user_friend)
				 {
				 	//$friend = $conn->getUserOfId($user_friend['friend_id']);
				 	$date_created=time();

				 	if($user_friend['friend_id']==$id)
				 	{
				 		//echo "bada";
						 $friend = $conn->getUserOfId($user_friend['user_id']);
						 
						$querystring3 = "INSERT INTO user_wall(user_id,review_id,date_created) VALUES ('".$user_friend['user_id']."','".$newsfeed['id']."','".$date_created."')";
    					$query3 = $dbase->prepare($querystring3);
    					$query3->execute();
						 
					//array_push($friends,$friend);
				 		//continue;
				 	}else if($user_friend['user_id']==$id){
				 		//echo "badi";
						  $friend = $conn->getUserOfId($user_friend['friend_id']);
						 $querystring3 = "INSERT INTO user_wall(user_id,review_id,date_created) VALUES ('".$user_friend['friend_id']."','".$newsfeed['id']."','".$date_created."')";
    					$query3 = $dbase->prepare($querystring3);
    					$query3->execute();
				 		 
				 	}
				 }

				  /* my freinds */

			/*relationships of this newsfeed */
			//var_dump($newsfeed) ;	
			//fill_post($newfeed);
			$newsfeed['un_enc_user_id'] = $newsfeed['user']['id'];
			$newsfeed['user']['id'] = gString($newsfeed['user']['id']);

			$newsfeed['un_enc_business_id'] = $newsfeed['business']['id'];
			$newsfeed['business']['id'] = gString($newsfeed['business']['id']);

			echo json_encode($newsfeed);
		}
		
		//echo json_encode($newfeed);

	}
	else if(isset($_POST['random_add_biz']))
	{
		$kind =$_POST['kind'];
		
		$business_id = $_POST['business_id'];
		echo "henry==>".$_POST['business_id']."tigidididididi";

		echo is_numeric($_POST['business_id']);
		echo intval($_POST['business_id']);
		$intbusiness_id=intval($_POST['business_id']);
		
		$newfeed=$conn->insertNewsfeed($_POST['date_created'],$_POST['current_user_id'],$_POST['kind'],$_POST['cost'],$_POST['good'],addslashes($_POST['details']),$intbusiness_id);	
			//fill_post($newfeed);
		
		
		//echo json_encode($newfeed);

	}
	else if(isset($_GET['comment_user_id'])&&isset($_GET['date_created'])&&isset($_GET['kind'])&&isset($_GET['feed_id'])&&isset($_GET['commentTo'])&&isset($_GET['details']))

	{
		$commment_count=0;
		//echo "mama nyabo";
		$comment=$conn->insertComment($_GET['comment_user_id'],$_GET['feed_id'],$_GET['kind'],addslashes($_GET['details']),time(),$_GET['commentTo']);
		$reviewcomments = $conn->getAll("SELECT *FROM comment WHERE review_id='".$_GET['feed_id']."'");
		if(!empty($reviewcomments))
		{
			$commment_count = count($reviewcomments);
		}else
		{
			$commment_count =0;
		}
		//$comment['date_created'] = $comment['date_created']
		$comment['date_created'] = getTimeVariation($comment['date_created'],'UG');
		$comment['like_number']=count($comment['likes']);
		$comment_and_count = array(
				"comment"=>$comment,
				"comment_count"=>$commment_count
			);
		echo json_encode($comment_and_count);
		//pick_comment($comment);

	}
	else if (isset($_GET['one_business']))
	{
		if(strcmp($_GET['one_business'],'random')==0)
		{
			$randombusinesses = $conn->getAllDataRandomly('business',1);
			//fill_random_biz($randombusinesses[0]);
			$randombusiness = $randombusinesses[0];
			$randombusiness['un_enc_id'] = $randombusiness['id'];
			$randombusiness['id'] = gString($randombusiness['id']);
			echo json_encode($randombusiness);

		}

	}
	else if(isset($_POST['name'])&&isset($_POST['gender'])&&isset($_POST['email'])&&isset($_POST['age'])&&isset($_POST['social_id'])&&isset($_POST['picture']))
	{

		$currentYear = Date("y");
		$name=addslashes($_POST['name']);
		$email =addslashes($_POST['email']);
		$password ="james";
		$city_id ="null";
		$gender=$_POST['gender'];
		$social ="facebook";
		$social_id =$_POST['social_id'];
		$date_of_birth =$_POST['age'];
		$avatar = rawurldecode($_POST['picture']);
		$result=$conn->insertNewUser($name,$email,$password,$city_id,$date_of_birth,$gender,$social,$avatar,$social_id);
		echo $result;

	}else if(isset($_GET['checkmail']))
	{
		$checkmail =$_GET['checkmail'];
		$account = $conn->getAll("SELECT id,email FROM user where email ='".$checkmail."'");
		if(empty($account))
		{
			echo "";
			//echo json_encode($account[0]);
		}else
		{
			$id=$account[0]['id'];

			//send activation code to email
				$message = "<h1>Yammzit Confirmation Email</h1> <br/> Thanks for joining yammzit. <br/> Please click thex link to activate your account <a href = 'https://yammzit.com/forgot_password1.php?username=".$id."'> https://yammzit.com/reset_password</a> ";
				$subject = 'Yammzit Confirmation Email';
				$to = $checkmail;
				$tag = "Confirmation";
				sendTheMail($message,$subject,$to,$tag);

			echo "You are a user";
			//echo json_encode($account[0]);
		}

	}else if(isset($_GET['id'])&&isset($_GET['newpassword']))
	{

		$res=$conn->updateDb($_GET['id'],$_GET['newpassword']);

		if ( is_session_started() === FALSE ) session_start();

		$_SESSION['SESS_MEMBER_ID']=$_GET['id'];
		echo $res;


	}else if(isset($_GET['favourite_business_picker']))
	{
		$favourite_businesses = array();
		$user_id = $_GET['favourite_business_picker'];
		$business_favorite = $conn->getAll("SELECT * FROM business_favorite where user_id ='".$user_id."'");
		foreach($business_favorite as $row)
		{
			$business =$conn->getBusinessOfId($row['business_id']);
			$business['un_enc_id'] = $business['id'];
			$business['id'] = gString($business['id']);

			array_push($favourite_businesses,$business);

		}
		echo json_encode($favourite_businesses);

	}

	else if(isset($_GET['My_businesses_picker']))
	{
		$my_businesses = array();
		$user_id = $_GET['My_businesses_picker'];
		$business_mine = $conn->getAll("SELECT * FROM business where owner_id ='".$user_id."'");
		foreach($business_mine as $row)
		{
			$business =$conn->getBusinessOfId($row['id']);
			$business['un_enc_id'] = $business['id'];
			$business['id'] = gString($business['id']);
			array_push($my_businesses,$business);

		}
		echo json_encode($my_businesses);

	}
	else if(isset($_GET['Added_businesses_picker']))
	{
		$my_businesses = array();
		$user_id = $_GET['Added_businesses_picker'];
		$business_added = $conn->getAll("SELECT * FROM business where user_id ='".$user_id."'");
		foreach($business_added as $row)
		{
			$business =$conn->getBusinessOfId($row['id']);
			$business['un_enc_id'] = $business['id'];
			$business['id'] = gString($business['id']);

			array_push($my_businesses,$business);

		}
		echo json_encode($my_businesses);

	}else if(isset($_GET['my_profile_data_picker_id']))
	{


		$id = $_GET['my_profile_data_picker_id'];
		$full_user = array(
			'user'=>'',
			'friends'=>array(),
			'friend_requests'=>array(),
			'followers'=>array(),
			'photos'=>array(),
			'people_i_follow'=>array(),
			'people_i_follow_count'=>0,
			'businesses_i_follow'=>array(),
			'businesses_i_follow_count'=>0,
			'photo_count'=>0,
			'follower_count'=>0,
			'friend_count'=>0,
			'review_count'=>0
		);
		//colections
		$uusers = $conn->getAll("SELECT *FROM user WHERE id='".$id."'");
		$user = $uusers[0];  // we have id,name,avatar,city;
		$friends = array();
		$friend_requests = array();

		$followers=array();

		$peopleIFollow = array();
		$businessesIFollow= array();
		//collectiond

		//picking friends
		$user_friends= $conn->getAll("SELECT * FROM user_friend WHERE ((user_id=$id OR friend_id=$id) AND status=2)");
		$user_friend_requests= $conn->getAll("SELECT * FROM user_friend WHERE user_id='".$id."' AND status=1");
		
		 foreach($user_friends as $user_friend)
		 {
		 	//$friend = $conn->getUserOfId($user_friend['friend_id']);

		 	if($user_friend['friend_id']==$id)
		 	{
		 		//echo "bada";
				 $friend = $conn->getUserOfId($user_friend['user_id']);
				 if(in_array($friend,$friends))
				 {
				 	//array_push($myFollowersAndFreinds,$friend);
				 }else{
				 	$friend['un_enc_id'] = $friend['id'];
				 	$friend['id'] = gString($friend['id']);
				 	array_push($friends,$friend);
				 }
				 
				 
			//array_push($friends,$friend);
		 		//continue;
		 	}else if($user_friend['user_id']==$id){
		 		//echo "badi";
				  $friend = $conn->getUserOfId($user_friend['friend_id']);
				 if(in_array($friend,$friends))
				 {
				 	//array_push($myFollowersAndFreinds,$friend);
				 }else{
				 	$friend['un_enc_id'] = $friend['id'];
				 	$friend['id'] = gString($friend['id']);
				 	array_push($friends,$friend);
				 }
		 		 
		 	}
		 }


		 foreach($user_friend_requests as $user_friend_request)
		 {
		 	$friend_request = $conn->getUserOfId($user_friend_request['friend_id']);
		 	$friend_request['date_created'] = getTimeVariation($user_friend_request['date_created'],'UG');
		 	//$friend_request['date_created']=;
		 	array_push($friend_requests,$friend_request);
		 }
		 //get Reviews
		 $reviews =$conn->getAll("SELECT *FROM newsfeed WHERE user_id='".$id."'");
		 $user_followers =$conn->getAll("SELECT *FROM user_follower WHERE user_id='".$id."'");
		 $photos =$conn->getAll("SELECT photo FROM business_photo WHERE user_id ='".$id."'");
		 foreach ( $user_followers as  $user_follower) {
		 	# code...
		 	$follower =$conn->getUserOfId($user_follower['follower_id']);
		 	$follower['un_enc_id'] = $follower['id'];
			$follower['id'] = gString($follower['id']);
		 	array_push($followers,$follower);
		 }

		 //getting people i follow
		 $am_followings =$conn->getAll("SELECT *FROM user_follower WHERE follower_id='".$id."'");
		 foreach ( $am_followings as  $am_following) {
		 	# code...
		 	$personIFollow =$conn->getUserOfId($am_following['user_id']);
		 	$personIFollow['un_enc_id'] = $personIFollow['id'];
			$personIFollow['id'] = gString($personIFollow['id']);
		 	array_push($peopleIFollow,$personIFollow);
		 }

		 //getting businesses i follow
		 $business_follows=$conn->getAll("SELECT *FROM business_follower WHERE user_id='".$id."'");
		 foreach ($business_follows as $business_follow) {
		 	# code...
		 	$businessIFollow = $conn->getBusinessOfId($business_follow['business_id'],true);
		 	$businessIFollow['un_enc_id'] = $businessIFollow['id'];
			$businessIFollow['id'] = gString($businessIFollow['id']);
		 	array_push($businessesIFollow,$businessIFollow);
		 }
		 $user['city'] = $conn->getCityOfId($user['city_id']);
		 $user['country'] = $user['city']['country'];
		 $user['un_enc_id'] = $user['id'];
		 $user['id']=gString($user['id']);

		 $full_user['user'] = $user;
		 $full_user['friends']=$friends;
		 $full_user['friend_requests']=$friend_requests;
		 $full_user['followers']=$followers;
		 $full_user['photos']=$photos;
		 $full_user['photo_count']=count($photos);
		 $full_user['follower_count']=count($followers);
		 $full_user['friend_count']=count($friends);
		 $full_user['review_count']=count($reviews);
		 $full_user['people_i_follow']=$peopleIFollow;
		 $full_user['people_i_follow_count']=count($peopleIFollow);
		 $full_user['businesses_i_follow']=$businessesIFollow;
		 $full_user['businesses_i_follow_count']=count($businessesIFollow);

		 echo json_encode($full_user);


	}else if (isset($_GET['acceptor_id'])&&isset($_GET['requestor_id']))
	{
		$acceptor_id = $_GET['acceptor_id'];
		$requestor_id=$_GET['requestor_id'];
		$date_created=time();

		$conn->acceptRequest($acceptor_id,$requestor_id,$date_created);


	}else if (isset($_GET['denier_id'])&&isset($_GET['requestor_id']))
	{
		$denier_id = $_GET['denier_id'];
		$requestor_id=$_GET['requestor_id'];

		$conn->denyRequest($denier_id,$requestor_id);


	}
	else if(isset($_GET['follow_item'])&&isset($_GET['user_id'])&&isset($_GET['item_id']))
	{
		$item_type =$_GET['follow_item'];
		$user_id = $_GET['user_id'];
		$item_id =$_GET['item_id'];

		echo $_GET['follow_item'];
		echo $_GET['user_id'];
		echo $_GET['item_id'];

		$conn->followItem($item_type,$user_id,$item_id);


	}else if(isset($_GET['un_follow_item'])&&isset($_GET['user_id'])&&isset($_GET['item_id']))
	{
		$item_type =$_GET['un_follow_item'];
		$user_id = $_GET['user_id'];
		$item_id =$_GET['item_id'];

		$conn->unFollowItem($item_type,$user_id,$item_id);


	}
	else if(isset($_GET['add_to_favourites'])&&isset($_GET['user_id'])&&isset($_GET['business_id']))
	{
		$item_type =$_GET['add_to_favourites'];
		$user_id = $_GET['user_id'];
		$business_id =$_GET['business_id'];

		echo $_GET['add_to_favourites'];
		echo $_GET['user_id'];
		echo $_GET['business_id'];

		$conn->addToFavourites($item_type,$user_id,$business_id);


	}
	else if (isset($_GET['sender_id'])&&isset($_GET['reciever_id']))
	{
		$sender_id=$_GET['sender_id'];
		$reciever_id=$_GET['reciever_id'];
		$conn->sendFriendRequest($sender_id,$reciever_id);

	}
	else if (isset($_GET['chucker_id'])&&isset($_GET['chucked_id']))
	{
		$chucker_id=$_GET['chucker_id'];
		$chucked_id=$_GET['chucked_id'];
		$conn->unFriendPerson($chucker_id,$chucked_id);

	}else if(isset($_POST['edit_user']))
	{
		 
		 //var_dump($_POST);
		$id=$_POST['user_id'];
		//$id=27;
		

		 //var_dump($_POST);

		$first_name =$_POST['first_name'];
		$last_name =$_POST['last_name'];
		$countryid = $_POST['country_id'];
        $cityid =$_POST['city_id'];
        $email =$_POST['email'];
        $alternative_email =$_POST['alt_email'];
        $phone_number =$_POST['phone'];
        $gender = $_POST['gender'];

       
        $facebook_link = $_POST['facebook_link'];
        $twitter_link = $_POST['twitter_link'];
        $instagram_link = $_POST['instagram_link'];
        $youtube_link = $_POST['youtube_link'];
       

        //innistialize
        $imagefile='';
        $password='';
        //innitialize

        $userr = $conn->getAll("SELECT * FROM user WHERE id='".$id."'");
        //var_dump($userr);
       // echo $userr;
        //$userr = $conn->getUserOfId($id);
		$hidden_password = $userr[0]['password'];
		// echo $hidden_password;
		//print_r($userr[0]['date_of_birth']);
		//echo (strlen($_POST['dob']));
		

		//

		if(strlen($_POST['dob'])>1){

			$dob = $_POST['dob'];
        

	        $date = $dob;
			$date = str_replace('/', '-', $date);
			$timestamp = strtotime($date);
			$hidden_image =$userr[0]['avatar'];


		}else
		{
			$timestamp = $userr[0]['date_of_birth'];
		}
		
        

        if(is_uploaded_file($_FILES['profile_pic']['tmp_name']))
        {
        	move_uploaded_file($_FILES['profile_pic']["tmp_name"], "../../admin/Theme/uploads/".$first_name.$last_name.".png");
        	$imagefile= "uploads/".$first_name.$last_name.".png";

        }else
        {
        	$imagefile=$hidden_image;

        }

        $current_password = $_POST['old_pass'];
        $new_password = $_POST['new_pass'];

		if(strlen($current_password)>1 && strlen($new_password)>1)
		{
			if($hidden_password == md5($current_password))
			{

				$password = md5($new_password) ;

			}else
			{
				$password =$hidden_password;

			}

		}else
		{
			$password =$hidden_password;
		}
		
		 $edited_id = $conn->editProfile($id,$imagefile,$first_name,$last_name,$cityid,$email,$alternative_email,$phone_number,$gender,$timestamp,$password,$facebook_link,$twitter_link,$instagram_link,$youtube_link);
		
		//header('location:../../user_profile.php?id='.$id);
		 echo gstring($id);
        //photo


	}else if(isset($_POST['uploader_id'])&&isset($_POST['business_id']))
	{
		$user_id =$_POST['uploader_id'];
		$business_id =$_POST['business_id'];
		$kind =$_POST['kind'];
		$business=$conn->getBusinessOfId($business_id);
		$busines_name =$business['name'];
		$photo_names= array();
		//var_dump($_FILES['fileToUpload']);
		move_uploaded_file($_FILES['fileToUpload']["tmp_name"], "../../admin/Theme/uploads/".$busines_name.time().".png");
		$imagefile= "uploads/".$busines_name.time().".png";
		$conn->submitBusinessPhoto($user_id,$business_id,$imagefile);

		$photos =$conn->getAll("SELECT *FROM business_photo where business_id='".$business_id."'");
		foreach($photos as $photo)
		{
			$photo_name = $photo['photo'];
			array_push($photo_names,$photo_name);
		}

		$newsfeed=$conn->insertNewsfeed(time(),$user_id,$kind,$_POST['price'],$_POST['rate'],$imagefile,$business_id);
		$newsfeed['date_created']=getTimeVariation($newsfeed['date_created'],'UG');

		$data_array = array("newsfeed"=>$newsfeed,
			"photos"=>$photos
		);
		echo json_encode($data_array);
		//echo json_encode($photos);



	}else if(isset($_GET['business_profile_picker_id'])&&isset($_GET['user_id']))
	{
		$id=$_GET['business_profile_picker_id'];
		$me_id =$_GET['user_id'];
		//$me_id =27;
		//echo("The business id is tigiditigidieififidif ".$id);
		
		$full_business = array(

			'business'=>array(),
			'followers'=>array(),
			'photos'=>array(),
			'photo_count'=>0,
			'follower_count'=>0,
			'review_count'=>0,
			'facebook_link'=>'',
			'twitter_link'=>'',
			'instagram_link'=>'',
			'youtube_link'=>'',
			'watsapp_no' => '',
			'latest_user_rate'=>'',
			'latest_user_price'=>'',
			'services'=>array(),
			'business_claim'=>array(),
			'isclaimed'=>0,
			'business_status'=>'tigidi'
		);

		$followers = array();
		$photos= array();
		//latest user rateing
			$latest_rates =$conn->getAll("SELECT *FROM user_business_rating WHERE business_id='".$id."' AND user_id='".$me_id."' ");
			if(!empty($latest_rates))
			{
				$latest_rate=$latest_rates[0];
				$full_business['latest_user_rate']=$latest_rate['good'];
				$full_business['latest_user_price']=$latest_rate['cost'];
			}else
			{
				$full_business['latest_user_rate']=-1;
				$full_business['latest_user_price']=-1;

			}
		//business
		$businesses = $conn->getAll("SELECT *FROM business WHERE id='".$id."'");
		//$businesses = $conn->getAll("SELECT *FROM business WHERE id=30");
		$current_business =null;
		if(!empty($businesses)){

		
		 $countryId = $businesses[0]['country_id'];
		 $cityId = $businesses[0]['city_id'];
		 $country =$conn->getCountryOfId($countryId,true);
		 $city =$conn->getCityOfId($cityId);
		 $current_business =$businesses[0];

		 $current_business['un_enc_id'] = $current_business['id'];
		 $current_business['id']=gString($current_business['id']);
		 $current_business['country']=$country;
		 $current_business['city']=$city;
		 $subcategoryIds = $conn->getAll("SELECT *FROM business_category WHERE business_id='".$id."'");
		 if(!empty($subcategoryIds)){
		 	//var_dump($subcategoryIds[0]['sub_category_id']) ;
		 	//echo $subcategoryIds[0];
		 	if(count($subcategoryIds)==1){
			 $current_business['subcategory_1_id']=$subcategoryIds[0]['sub_category_id'];
			 $current_business['subcategory_1'] =$conn->getSubCategoryOfId($subcategoryIds[0]['sub_category_id']);
			 $current_business['category_1_id'] =$current_business['subcategory_1']['category_id'];
			 $current_business['category_1'] =$conn->getCategoryOfId($current_business['category_1_id']);

			 $current_business['subcategory_2_id']='';
			 $current_business['subcategory_3_id']='';
			}else if(count($subcategoryIds)==2){

			 $current_business['subcategory_1_id']=$subcategoryIds[0]['sub_category_id'];
			 $current_business['subcategory_1'] =$conn->getSubCategoryOfId($subcategoryIds[0]['sub_category_id']);
			 $current_business['category_1_id'] =$current_business['subcategory_1']['category_id'];
			 $current_business['category_1'] =$conn->getCategoryOfId($current_business['category_1_id']);

			 $current_business['subcategory_2_id']=$subcategoryIds[1]['sub_category_id'];
			 $current_business['subcategory_2'] =$conn->getSubCategoryOfId($subcategoryIds[1]['sub_category_id']);
			 $current_business['category_2_id'] =$current_business['subcategory_2']['category_id'];
			 $current_business['category_2'] =$conn->getCategoryOfId($current_business['category_2_id']);

			 $current_business['subcategory_3_id']='';
			}else if(count($subcategoryIds)==3)
			{
				$current_business['subcategory_1_id']=$subcategoryIds[0]['sub_category_id'];
				$current_business['subcategory_1'] =$conn->getSubCategoryOfId($subcategoryIds[0]['sub_category_id']);
			 	$current_business['category_1_id'] =$current_business['subcategory_1']['category_id'];
			 	$current_business['category_1'] =$conn->getCategoryOfId($current_business['category_1_id']);

			    $current_business['subcategory_2_id']=$subcategoryIds[1]['sub_category_id'];
			 	$current_business['subcategory_2'] =$conn->getSubCategoryOfId($subcategoryIds[1]['sub_category_id']);
			 	$current_business['category_2_id'] =$current_business['subcategory_2']['category_id'];
			 	$current_business['category_2'] =$conn->getCategoryOfId($current_business['category_2_id']);

			    $current_business['subcategory_3_id']=$subcategoryIds[2]['sub_category_id'];
			 	$current_business['subcategory_3'] =$conn->getSubCategoryOfId($subcategoryIds[2]['sub_category_id']);
			 	$current_business['category_3_id'] =$current_business['subcategory_3']['category_id'];
			 	$current_business['category_3'] =$conn->getCategoryOfId($current_business['category_3_id']);
			}
		 }
		}else
		{
			echo "no business";

		}

		//followers and count
		$business_followers =$conn->getAll("SELECT *FROM business_follower WHERE business_id='".$id."'");
		if(!empty($business_followers)){
					foreach ($business_followers as $business_follower) {
						# code...
						$follower = $conn->getUserOfId($business_follower['user_id']);
						array_push($followers,$follower);
					}
		}

		//photos and count
		$business_photos=$conn->getAll("SELECT *FROM business_photo WHERE business_id='".$id."'");
		foreach ($business_photos as $business_photo) {
			# code...
			$photo =$business_photo['photo'];
			array_push($photos,$photo);
		}
		//reviewcount
		$newfeeds = $conn->getAll("SELECT *FROM newsfeed WHERE business_id='".$id."'");

		$reviews =$conn->getAll("SELECT *FROM newsfeed WHERE business_id='".$id."' AND (kind='review' OR kind='review_photo' OR kind='rate') ");

		//social_media_links & working hours

		$business_claims =$conn->getAll("SELECT *FROM user_business_claim where business_id='".$id."'");
		//echo json_encode($business_claims);
		if(!empty($business_claims) && $business_claims[0]['status']=='Approved' ){
			//echo "approve";
			$isclaimed=1;
			$business_status="Approved";
			$business_claim =$business_claims[0];
			$facebook_link = $business_claim['facebook_link'];
			$twitter_link =$business_claim['twitter_link'];
			$instagram_link=$business_claim['instagram_link'];
			$youtube_link =$business_claim['youtube_link'];
			$watsapp_no =$business_claim['phone_2'];
			$week_working_hours =array(


				'monday'=>array('open'=>$business_claim['monday_open'],
								'close'=>$business_claim['monday_close']
								),
				'tuesday'=>array('open'=>$business_claim['tuesday_open'],
								'close'=>$business_claim['tuesday_close']
								),
				'wednesday'=>array('open'=>$business_claim['wednesday_open'],
								'close'=>$business_claim['wednesday_close']
								),
				'thursday'=>array('open'=>$business_claim['thursday_open'],
								'close'=>$business_claim['thursday_close']
								),
				'friday'=>array('open'=>$business_claim['friday_open'],
								'close'=>$business_claim['friday_close']
								),
				'saturday'=>array('open'=>$business_claim['saturday_open'],
								'close'=>$business_claim['saturday_close']
								),
				'sunday'=>array('open'=>$business_claim['sunday_open'],
								'close'=>$business_claim['sunday_close']
								)


			);
			$services = array();

			if($business_claim['other_take_away'] ==1)
			{
				array_push($services,'Take Away');
			}
			if($business_claim['other_accepts_credit_card'] ==1)
			{
				array_push($services,'Accept credit cards');
			}
			if($business_claim['other_good_for_children'] ==1)
			{
				array_push($services,'Good For Children');
			}
			if($business_claim['other_good_for_groups'] ==1)
			{
				array_push($services,'Good For Groups');
			}
			if($business_claim['other_music'] ==1)
			{
				array_push($services,'Music');
			}
			if($business_claim['other_good_for_dancing'] ==1)
			{
				array_push($services,'Good For Dancing');
			}
			if($business_claim['other_alcohol'] ==1)
			{
				array_push($services,'Alcohol');
			}
			if($business_claim['other_happy_hour'] ==1)
			{
				array_push($services,'Happy Hours');
			}
			if($business_claim['other_best_night'] ==1)
			{
				array_push($services,'Best Nights');
			}
			if($business_claim['other_outdoor_seating'] ==1)
			{
				array_push($services,'Outdoor Seating');
			}
			if($business_claim['other_has_wi_fi'] ==1)
			{
				array_push($services,'Has Wifi');
			}
			if($business_claim['other_has_tv'] ==1)
			{
				array_push($services,'Has TV');
			}
			if($business_claim['other_waiter_service'] ==1)
			{
				array_push($services,'Waiter Service');
			}
			if($business_claim['other_has_pool_table'] ==1)
			{
				array_push($services,'Has Pool Table');
			}

			$full_business['business_claim']=$business_claim;

		}else if(!empty($business_claims) && $business_claims[0]['status']=='Pending')
		{
			//echo "pendi";
			$isclaimed=0;
			$business_status="Pending";
			$facebook_link ="";
			$twitter_link ="";
			$instagram_link="";
			$youtube_link ="";
			$watsapp_no ='';
			$week_working_hours =array();
			$services = array('No services attached');
		}
		else if(!empty($business_claims) && $business_claims[0]['status']=='Deactivated')
		{
			//echo "panda";
			$isclaimed=0;
			$business_status="Deactivated";
			$facebook_link ="";
			$twitter_link ="";
			$instagram_link="";
			$youtube_link ="";
			$watsapp_no ='';
			$week_working_hours =array();
			$services = array('No services attached');
		}else if(empty($business_claims))
		{
			$isclaimed=0;
			$business_status="Deactivated";
			$facebook_link ="";
			$twitter_link ="";
			$instagram_link="";
			$youtube_link ="";
			$watsapp_no ='';
			$week_working_hours =array();
			$services = array('No services attached');
		}




		//populating fullbusiness
		$full_business['business']=$current_business;
		$full_business['followers']=$followers;
		$full_business['follower_count']=count($followers);
		$full_business['photos']=$photos;
		$full_business['photo_count']=count($photos);
		$full_business['feed_count']=count($newfeeds);
		//one line of code added
		$full_business['review_count']=count($reviews);
		$full_business['facebook_link']=$facebook_link;
		$full_business['twitter_link']=$twitter_link;
		$full_business['instagram_link']=$instagram_link;
		$full_business['youtube_link']=$youtube_link;
		$full_business['watsapp_no']=$watsapp_no;
		$full_business['services']=$services;
		$full_business['isclaimed']=$isclaimed;
		$full_business['business_status']=$business_status;


		echo json_encode($full_business);

	}else if(isset($_GET['search'])&&isset($_GET['searcher_id'])&&isset($_GET['filter'])&&isset($_GET['country_id']))
	{
		$id = $_GET['searcher_id'];
		$searching_user = $conn->getUserOfId($id);
		$searched_city = $conn->getCityOfId($searching_user['city_id']);
		$search_country_id = $_GET['country_id'];
		//echo $search_country_id;
		$category_businesses=array();
		$searchedBusinesses =array();

		$searchWord =trim($_GET['search']);
		$searchResults =array(
			'businesses'=>array(),
			'people'=>array(),
			'events'=>array(),
			'gossips'=>array(),
		    'countries'=>array()
		);
	if($id == 0){

		if($searchWord!='' ||$searchWord!=null){


			    $finalBusinesses=array();
		       
				if($search_country_id == 0){
					//echo "kalaeb";
					$qryB="SELECT * FROM  business WHERE name LIKE '%$searchWord%' OR address LIKE '%$searchWord%'OR location LIKE '%$searchWord%'OR email LIKE '%$searchWord%'OR website LIKE '%$searchWord%' ";



					//$qryD = "SELECT *FROM sub_category WHERE name LIKE '%$searchWord%'";

				 }else
				 {
					//echo "gualaeb";
					$qryB="SELECT * FROM  business WHERE country_id='".$search_country_id."' AND (name LIKE '%$searchWord%' OR address LIKE '%$searchWord%'OR location LIKE '%$searchWord%'OR email LIKE '%$searchWord%'OR website LIKE '%$searchWord%')";

				 }

			 // about categories and subcategories
			 	$searchedBusinesses =$conn->getAll($qryB);

			 	//var_dump($searchedBusinesses);
			 	//exit(0);

			 	$qryC = "SELECT *FROM category WHERE name LIKE '%$searchWord%'";
				$searched_categories=$conn->getAll($qryC);

				if(!empty($searched_categories))
				{
					
					foreach ($searched_categories as $searched_category) {

						# code...
						$qryC1 = "SELECT *FROM sub_category WHERE category_id='".$searched_category['id']."'";
						$subcategories = $conn->getAll($qryC1);

						foreach ($subcategories as $subcategory) {
							# code...
							$qryC2 = "SELECT *FROM business_category WHERE sub_category_id='".$subcategory['id']."'";
							$business_categories=$conn->getAll($qryC2);

							if(!empty($business_categories)){
								foreach ($business_categories as $business_category) {
									# code...
									//echo json_encode($business_category);
									//echo "piggie";
									$qryC3 = "SELECT *FROM business WHERE id='".$business_category['business_id']."'";
									$searchedBusinesses =$conn->getAll($qryB);
									
									$category_businesses=$conn->getAll($qryC3);
									//echo json_encode($category_businesses);
									array_push($searchedBusinesses,$category_businesses);
									echo json_encode($searchedBusinesses);
									$allBusinesses =$category_businesses+ $searchedBusinesses;
									echo json_encode($category_businesses);
									foreach($category_businesses as $searchedBusiness)
										{
											//echo $searchedBusiness['country_id'];
											$qryfB="SELECT *FROM business_follower WHERE user_id='".$id."' AND business_id='".$searchedBusiness['id']."'";
											$business=$conn->getAll($qryfB);
											if(!empty($business))
											{
												$searchedBusiness['isfollowed']='true';
											}else
											{
												$searchedBusiness['isfollowed']='false';
											}
											$searchedBusiness['un_enc_id'] = $searchedBusiness['id'];
											$searchedBusiness['id'] = gString($searchedBusiness['id']);
											if($searchedBusiness['country_id']==$searched_city['country_id']){
												//echo "tigidi";
												array_push($finalBusinesses,$searchedBusiness);
											}
											

										}
								}
						    }

						}
					}
					
					
				}else
				{
					foreach($searchedBusinesses as $searchedBusiness)
					{
						$searchedBusiness['un_enc_id'] = $searchedBusiness['id'];
						$searchedBusiness['id'] = gString($searchedBusiness['id']);

						array_push($finalBusinesses,$searchedBusiness);
					}
					//$finalBusinesses=$searchedBusinesses;
				}

		}

		            $searchResults['businesses']=$finalBusinesses;
					$searchResults['people']=array();
					$searchResults['events']=array();
					$searchResults['gossips']=array();

					echo json_encode($searchResults);

	}else{
		if($searchWord!='' ||$searchWord!=null){
		  //$searchWord ="yam";

				$finalBusinesses=array();
		        $finalUsers=array();
				if($search_country_id == 0){
					//echo "kalaeb";
					$qryB="SELECT * FROM  business WHERE name LIKE '%$searchWord%' OR address LIKE '%$searchWord%'OR location LIKE '%$searchWord%'OR email LIKE '%$searchWord%'OR website LIKE '%$searchWord%' ";



					//$qryD = "SELECT *FROM sub_category WHERE name LIKE '%$searchWord%'";

				 }else
				 {
					//echo "gualaeb";
					$qryB="SELECT * FROM  business WHERE country_id='".$search_country_id."' AND (name LIKE '%$searchWord%' OR address LIKE '%$searchWord%'OR location LIKE '%$searchWord%'OR email LIKE '%$searchWord%'OR website LIKE '%$searchWord%')";

				 }

			 // about categories and subcategories
			 	$searchedBusinesses =$conn->getAll($qryB);

			 	//var_dump($searchedBusinesses);
			 	//exit(0);

			 	$qryC = "SELECT *FROM category WHERE name LIKE '%$searchWord%'";
				$searched_categories=$conn->getAll($qryC);

				if(!empty($searched_categories))
				{
					
					foreach ($searched_categories as $searched_category) {

						# code...
						$qryC1 = "SELECT *FROM sub_category WHERE category_id='".$searched_category['id']."'";
						$subcategories = $conn->getAll($qryC1);

						foreach ($subcategories as $subcategory) {
							# code...
							$qryC2 = "SELECT *FROM business_category WHERE sub_category_id='".$subcategory['id']."'";
							$business_categories=$conn->getAll($qryC2);

							if(!empty($business_categories)){
								foreach ($business_categories as $business_category) {
									# code...
									//echo json_encode($business_category);
									//echo "piggie";
									$qryC3 = "SELECT *FROM business WHERE id='".$business_category['business_id']."'";
									$searchedBusinesses =$conn->getAll($qryB);
									
									$category_businesses=$conn->getAll($qryC3);
									//echo json_encode($category_businesses);
									array_push($searchedBusinesses,$category_businesses);
									echo json_encode($searchedBusinesses);
									$allBusinesses =$category_businesses+ $searchedBusinesses;
									echo json_encode($category_businesses);
									foreach($category_businesses as $searchedBusiness)
										{
											//echo $searchedBusiness['country_id'];
											$qryfB="SELECT *FROM business_follower WHERE user_id='".$id."' AND business_id='".$searchedBusiness['id']."'";
											$business=$conn->getAll($qryfB);
											if(!empty($business))
											{
												$searchedBusiness['isfollowed']='true';
											}else
											{
												$searchedBusiness['isfollowed']='false';
											}
											$searchedBusiness['un_enc_id'] = $searchedBusiness['id'];
											$searchedBusiness['id'] = gString($searchedBusiness['id']);
											if($searchedBusiness['country_id']==$searched_city['country_id']){
												//echo "tigidi";
												array_push($finalBusinesses,$searchedBusiness);
											}
											

										}
								}
						    }

						}
					}
					
					
				}else
				{
					foreach($searchedBusinesses as $searchedBusiness)
					{
						$searchedBusiness['un_enc_id'] = $searchedBusiness['id'];
						$searchedBusiness['id'] = gString($searchedBusiness['id']);

						array_push($finalBusinesses,$searchedBusiness);
					}
					//$finalBusinesses=$searchedBusinesses;
				}

	           // aboute categoris and subcategories




			
			
			

			//Nakomye wano .......
			//echo json_encode($finalBusinesses);


					$qryU="SELECT * FROM  user WHERE first_name LIKE '%$searchWord%' OR last_name LIKE '%$searchWord%'OR email LIKE '%$searchWord%'OR alternative_email LIKE '%$searchWord%'OR phone_number LIKE '%$searchWord%'";
					$searchedUsers =$conn->getAll($qryU);
					foreach($searchedUsers as $searchedUser)
					{
						$qryfu="SELECT *FROM user_follower WHERE follower_id='".$id."' AND user_id='".$searchedUser['id']."'";
						$user=$conn->getAll($qryfu);
						if(!empty($user))
						{
							$searchedUser['isfollowed']='true';
						}else
						{
							$searchedUser['isfollowed']='false';
						}
						$searchedUser['un_enc_id'] = $searchedUser['id'];
						$searchedUser['id'] = gString($searchedUser['id']);
						array_push($finalUsers,$searchedUser);

					}

				//	echo json_encode($searchedUsers);


					$qryE="SELECT * FROM  event WHERE tittle LIKE '%$searchWord%' OR venue LIKE '%$searchWord%'OR address LIKE '%$searchWord%'";
					$searchedEvents =$conn->getAll($qryE);
					//echo json_encode($searchedUsers);

					$qryG="SELECT * FROM  gossip WHERE tittle LIKE '%$searchWord%' OR details LIKE '%$searchWord%'";
					$searchedGossips =$conn->getAll($qryG);
				//	echo json_encode($searchedUsers);

					//getting countries
					$our_countries = $conn->getAll("SELECT * FROM country ORDER BY name ASC");

					$searchResults['businesses']=$finalBusinesses;
					$searchResults['people']=$finalUsers;
					$searchResults['events']=$searchedEvents;
					$searchResults['gossips']=$searchedGossips;
			//$searchResults['countries']=['uga,ken'];
		}else {
				# code...
		}

			echo json_encode($searchResults);

	

	}




	}else if(isset($_GET['current_user_id'])&&isset($_GET['good'])&&isset($_GET['cost'])&&isset($_GET['business_id'])&&isset($_GET['transaction']))
	{
		$date_created=time();
		
		if($_GET['transaction']=="business_rating")
		{
			//echo "right transaction";
			$conn->rateBusiness($_GET['current_user_id'],$date_created,$_GET['good'],$_GET['cost'],$_GET['business_id']);
			
			$newsfeed=$conn->insertNewsfeed($date_created,$_GET['current_user_id'],"rate",$_GET['cost'],$_GET['good'],'',$_GET['business_id']);
			$newsfeed['isLikedByUser']=0;
			$newsfeed['date_created']=getTimeVariation($newsfeed['date_created'],'UG');
			echo json_encode($newsfeed);
			//fill_rating_post($newsfeed);
	

		}else if($_GET['transaction']=="business_review")
		{
			//$newfeed=$conn->insertNewsfeed($date_created,$_GET['current_user_id'],"rate",$_GET['cost'],$_GET['good'],'',$_GET['business_id']);
	
		}

	//to be filled when  rating display structure is complete......
		//fill_post($newfeed);

	}else if(isset($_GET['user_wall_feeds_picker_id'])&&isset($_GET['picker_type'])&&isset($_GET['picker_business_id'])&&isset($_GET['last_picked_review_id']))
	{
		$currentuser_id = $_GET['user_wall_feeds_picker_id'];
		$current_business_id=$_GET['picker_business_id'];
		$picker_type =$_GET['picker_type'];
		$last_picked_id=$_GET['last_picked_review_id'];
		
		$newsfeeds = array();
		$errors = array();

		if($picker_type=='home'){

			$photoarray = array('photo'=>"");
			$innerFeedarray =array('inner_feed'=>"");
			try{
			
				if($last_picked_id==0){
				$sql = "SELECT * FROM user_wall WHERE user_id ='".$currentuser_id."' AND  review_id > 0  ORDER BY id DESC LIMIT 2 ";
				}else
				{
					$sql = "SELECT * FROM user_wall WHERE user_id ='".$currentuser_id."' AND review_id < '".$last_picked_id."' AND  review_id > 0  ORDER BY id DESC LIMIT 2";

				}

			    $res = $conn->getAll($sql);
			    foreach ($res as $row ) {
			    	$thisNewsFeed =$conn->getNewsFeedOfId($row["review_id"]);
			    	//var_dump($thisNewsFeed);
			    	//$thisNewsFeed['date_created'] = getTimeVariation($thisNewsFeed['date_created'],$myCountryCode);
			    	$thisNewsFeed['date_created'] = getTimeVariation($thisNewsFeed['date_created'],'UG');
			    	$thisNewsFeed['picker_type']="home";
					if($thisNewsFeed['kind']=="review_photo")
					{
						$photos=$conn->getAll("SELECT * FROM newsfeed_photo WHERE newsfeed_id='".$thisNewsFeed['id']."'");
						$photoarray['photo']=$photos[0]['photo'];
					//	echo '<H1>'; echo $thisnewsfeed['photo']; echo '</H2>';

					}else if(substr( $thisNewsFeed['kind'], 0, 7 )=== "shared_")
					{
						$innerFeed = $conn->getNewsFeedOfId($thisNewsFeed['business_id']);
						if(!empty($innerFeed['business'])){

					    	$follow_event =$conn->getAll("SELECT * FROM business_follower WHERE user_id='".$currentuser_id."' AND business_id='".$innerFeed['business']['id']."'");
					    	if(empty($follow_event)){
					    		$innerFeed['business']['followedByUser']=0;
					    		//exit(0);
					    	}else
					    	{
					    		$innerFeed['business']['followedByUser']=1;
					    	}

					    	$favour_event =$conn->getAll("SELECT * FROM business_favorite WHERE user_id='".$currentuser_id."' AND business_id='".$innerFeed['business']['id']."'");
					    	if(empty($favour_event)){
					    		$innerFeed['business']['favouriteByUser']=0;
					    		//exit(0);
					    	}else
					    	{
					    		$innerFeed['business']['favouriteByUser']=1;
					    	}
					    	$innerFeed['un_enc_business_id'] = $innerFeed['business']['id'];
					    	$innerFeed['business']['id'] = gString($innerFeed['business']['id']);
			   	 		}
			   	 		$innerFeed['user']['id'] = gString($innerFeed['user']['id']);
						$innerFeedarray['inner_feed']=$innerFeed;
					}else if($thisNewsFeed['kind']=="new_friend")
					{
						$friend_id = $thisNewsFeed['business_id'];
						$friend = $conn->getUserOfId($friend_id);
						$thisNewsFeed['friend']=$friend;
						$thisNewsFeed['friend']['id']=gString($thisNewsFeed['friend']['id']);
					}
			    	
			    	$like_event =$conn->getAll("SELECT *FROM `like` WHERE user_id='".$currentuser_id."' AND newsfeed_id='".$thisNewsFeed['id']."'");
			    	if(empty($like_event)){
			    		$thisNewsFeed['likedByUser']=0;
			    		//exit(0);
			    	}else
			    	{
			    		$thisNewsFeed['likedByUser']=1;
			    	}

			    	if(!empty($thisNewsFeed['business'])){

				    	$follow_event =$conn->getAll("SELECT * FROM business_follower WHERE user_id='".$currentuser_id."' AND business_id='".$thisNewsFeed['business']['id']."'");
				    	if(empty($follow_event)){
				    		$thisNewsFeed['business']['followedByUser']=0;
				    		//exit(0);
				    	}else
				    	{
				    		$thisNewsFeed['business']['followedByUser']=1;
				    	}

				    	$favour_event =$conn->getAll("SELECT * FROM business_favorite WHERE user_id='".$currentuser_id."' AND business_id='".$thisNewsFeed['business']['id']."'");
				    	if(empty($favour_event)){
				    		$thisNewsFeed['business']['favouriteByUser']=0;
				    		//exit(0);
				    	}else
				    	{
				    		$thisNewsFeed['business']['favouriteByUser']=1;
				    	}
				    	// $thisNewsFeed['user_id']=gString($thisNewsFeed['user_id']);
				    	// $thisNewsFeed['business_id']=gString($thisNewsFeed['business_id']);

				    	
				    	$thisNewsFeed['un_enc_business_id']=$thisNewsFeed['business']['id'];
				    	$thisNewsFeed['business']['id']=gString($thisNewsFeed['business']['id']);
				    	//var_dump($thisNewsFeed['user_id']);
			   	 	}
			   	 	$innerFeed['un_enc_user_id'] = $innerFeed['user']['id'];
			   	 	$thisNewsFeed['user']['id']=gString($thisNewsFeed['user']['id']);

			    	for($i=0;$i<count($thisNewsFeed['comments']); $i++)
			    	{
			    		$feed_comment =$thisNewsFeed['comments'][$i];
			    		$feed_comment['date_created']=getTimeVariation($feed_comment['date_created'],'UG');
			    		$clike_event =$conn->getAll("SELECT *FROM `like` WHERE user_id='".$currentuser_id."' AND comment_id='".$feed_comment['id']."'");

			    		if(empty($clike_event)){
			    			$feed_comment['isLikedByUser']=0;
			    		//exit(0);
				    	}else
				    	{
				    		$feed_comment['isLikedByUser']=1;
				    	}
				    	$feed_comment['like_number']=count($feed_comment['likes']);
				    	$thisNewsFeed['comments'][$i]=$feed_comment;


			    	}

			    	if(is_null($thisNewsFeed))
			    	{
			    		//exit(0);
			    		continue;
			    	}else{
						//$thisNewsFeed,$photoarray
						//$a1 = json_decode( $thisNewsFeed, true );
						//$a2 = json_decode( $photoarray, true );

						$thistempFeed = array_merge($thisNewsFeed, $photoarray );
						$thisNewsFeed =array_merge($thistempFeed,$innerFeedarray);
			    	array_push($newsfeeds, $thisNewsFeed);
			    	}
			    }
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}

			//var_dump($newsfeeds);

			echo json_encode($newsfeeds);
			
		}else if($picker_type=='business_profile')
		{
			if($currentuser_id != 0){
						    session_start();
							$photoarray = array('photo'=>"");
							$innerFeedarray =array('inner_feed'=>"");

							$thisUserId=$_SESSION['SESS_MEMBER_ID'];

						try{

							if($last_picked_id==0){
								$sql = "SELECT * FROM newsfeed WHERE business_id ='".$current_business_id."' AND (kind='review' OR kind='review_photo' OR kind='rate' )  ORDER BY id DESC LIMIT 1";
				
							//$sql = "SELECT * FROM user_wall WHERE user_id ='".$currentuser_id."' AND  review_id > 0  ORDER BY id DESC LIMIT 1 ";
							}else
							{
								$sql = "SELECT * FROM newsfeed WHERE business_id ='".$current_business_id."'  AND id < '".$last_picked_id."' AND (kind='review' OR kind='review_photo' OR kind='rate')  ORDER BY id DESC LIMIT 1";
								//$sql = "SELECT * FROM user_wall WHERE user_id ='".$currentuser_id."' AND id < '".$last_picked_id."' AND  review_id > 0  ORDER BY id DESC LIMIT 1";

							}
						

							//$sql = "SELECT * FROM newsfeed WHERE business_id ='".$current_business_id."'  ORDER BY id DESC LIMIT 1";

						    $res = $conn->getAll($sql);
						    foreach ($res as $row ) {
						    	$thisNewsFeed =$conn->getNewsFeedOfId($row["id"]);
						    	$thisNewsFeed['date_created'] = getTimeVariation($thisNewsFeed['date_created'],'UG');
						    	$thisNewsFeed['picker_type']="business_profile";
								if($thisNewsFeed['kind']=="review_photo")
								{
									$photos=$conn->getAll("SELECT * FROM newsfeed_photo WHERE newsfeed_id='".$thisNewsFeed['id']."'");
									$photoarray['photo']=$photos[0]['photo'];

								}
						    	
						    	
						    	$like_event =$conn->getAll("SELECT *FROM `like` WHERE user_id='".$thisUserId."' AND newsfeed_id='".$thisNewsFeed['id']."'");
						    	if(empty($like_event)){
						    		$thisNewsFeed['likedByUser']=0;
						    		//exit(0);
						    	}else
						    	{
						    		$thisNewsFeed['likedByUser']=1;
						    	}

						    	if(!empty($thisNewsFeed['business'])){

							    	$follow_event =$conn->getAll("SELECT * FROM business_follower WHERE user_id='".$thisUserId."' AND business_id='".$thisNewsFeed['business']['id']."'");
							    	if(empty($follow_event)){
							    		$thisNewsFeed['business']['followedByUser']=0;
							    		//exit(0);
							    	}else
							    	{
							    		$thisNewsFeed['business']['followedByUser']=1;
							    	}

							    	$favour_event =$conn->getAll("SELECT * FROM business_favorite WHERE user_id='".$thisUserId."' AND business_id='".$thisNewsFeed['business']['id']."'");
							    	if(empty($favour_event)){
							    		$thisNewsFeed['business']['favouriteByUser']=0;
							    		//exit(0);
							    	}else
							    	{
							    		$thisNewsFeed['business']['favouriteByUser']=1;
							    	}
							    	
							    	
							    	$thisNewsFeed['un_enc_business_id']=$thisNewsFeed['business']['id'];
							    	$thisNewsFeed['business']['id']=gString($thisNewsFeed['business']['id']);
						   	 	}
						   	 	//$innerFeed['un_enc_user_id'] = $innerFeed['user']['id'];
						   	 	$thisNewsFeed['user']['id']=gString($thisNewsFeed['user']['id']);

						    	for($i=0;$i<count($thisNewsFeed['comments']); $i++)
						    	{
						    		$feed_comment =$thisNewsFeed['comments'][$i];
						    		$feed_comment['date_created']=getTimeVariation($feed_comment['date_created'],'UG');
						    		$clike_event =$conn->getAll("SELECT *FROM `like` WHERE user_id='".$thisUserId."' AND comment_id='".$feed_comment['id']."'");

						    		if(empty($clike_event)){
						    			$feed_comment['isLikedByUser']=0;
						    		//exit(0);
							    	}else
							    	{
							    		$feed_comment['isLikedByUser']=1;
							    	}
							    	$feed_comment['like_number']=count($feed_comment['likes']);
							    	$thisNewsFeed['comments'][$i]=$feed_comment;


						    	}

						    	if(is_null($thisNewsFeed))
						    	{
						    		//exit(0);
						    		continue;
						    	}else{

								$thistempFeed = array_merge($thisNewsFeed, $photoarray );
								$thisNewsFeed =array_merge($thistempFeed,$innerFeedarray);
						    	array_push($newsfeeds, $thisNewsFeed);
						    	}
						    }
						}catch(PDOException $e)
						{
							array_push($errors, $e->getMessage());
						}

						//var_dump($newsfeeds);

						echo json_encode($newsfeeds);
		        }elseif ($currentuser_id==0) {
		        	        session_start();
							$photoarray = array('photo'=>"");
							$innerFeedarray =array('inner_feed'=>"");

							if($last_picked_id==0){

								$sql = "SELECT * FROM newsfeed WHERE business_id ='".$current_business_id."' AND (kind='review' OR kind='review_photo' OR kind='rate' )  ORDER BY id DESC LIMIT 1";
				
							
							}else
							{
								$sql = "SELECT * FROM newsfeed WHERE business_id ='".$current_business_id."'  AND id < '".$last_picked_id."' AND (kind='review' OR kind='review_photo' OR kind='rate')  ORDER BY id DESC LIMIT 1";
								

							}
							$res = $conn->getAll($sql);
							foreach ($res as $row ) {
						    	$thisNewsFeed =$conn->getNewsFeedOfId($row["id"]);
						    	$thisNewsFeed['date_created'] = getTimeVariation($thisNewsFeed['date_created'],'UG');
						    	$thisNewsFeed['picker_type']="business_profile";
								if($thisNewsFeed['kind']=="review_photo")
								{
									$photos=$conn->getAll("SELECT * FROM newsfeed_photo WHERE newsfeed_id='".$thisNewsFeed['id']."'");
									$photoarray['photo']=$photos[0]['photo'];

								}
								$thisNewsFeed['likedByUser']=0;
								
								
								if(!empty($thisNewsFeed['business'])){

							    	$thisNewsFeed['business']['followedByUser']=0;
							    	$thisNewsFeed['business']['favouriteByUser']=0;
							    	
							    	
							    	
							    	$thisNewsFeed['un_enc_business_id']=$thisNewsFeed['business']['id'];
							    	$thisNewsFeed['business']['id']=gString($thisNewsFeed['business']['id']);
						   	 	}
						   	 	for($i=0;$i<count($thisNewsFeed['comments']); $i++)
						    	{
						    		$feed_comment =$thisNewsFeed['comments'][$i];
						    		$feed_comment['date_created']=getTimeVariation($feed_comment['date_created'],'UG');
						    		

						    		$feed_comment['isLikedByUser']=0;
						    		
							    	$feed_comment['like_number']=count($feed_comment['likes']);
							    	$thisNewsFeed['comments'][$i]=$feed_comment;


						    	}

						    	if(is_null($thisNewsFeed))
						    	{
						    		//exit(0);
						    		continue;
						    	}else{

								$thistempFeed = array_merge($thisNewsFeed, $photoarray );
								$thisNewsFeed =array_merge($thistempFeed,$innerFeedarray);
						    	array_push($newsfeeds, $thisNewsFeed);
						    	}
							}
		        	# code...
							echo json_encode($newsfeeds);
		        }

		}else if($picker_type=="user_profile")
		{
			$photoarray = array('photo'=>"");
			$innerFeedarray =array('inner_feed'=>"");
			try{
			

				
				if($last_picked_id==0){
					$sql = "SELECT * FROM newsfeed WHERE user_id ='".$currentuser_id."' AND (kind='review' OR kind='review_photo' OR kind='rate')  ORDER BY id DESC LIMIT 1 ";
	
				
				}else
				{
					$sql = "SELECT * FROM newsfeed WHERE user_id ='".$currentuser_id."' AND id < '".$last_picked_id."' AND (kind='review' OR kind='review_photo' OR kind='rate')  ORDER BY id DESC LIMIT 1 ";
					
				}

			    $newsfeedsres = $conn->getAll($sql);
			    foreach ($newsfeedsres  as $row ) {
			    	$thisNewsFeed =$conn->getNewsFeedOfId($row["id"]);
			    	$thisNewsFeed['date_created'] = getTimeVariation($thisNewsFeed['date_created'],'UG');
			    	$thisNewsFeed['picker_type']="user_profile";
					if($thisNewsFeed['kind']=="review_photo")
					{
						$photos=$conn->getAll("SELECT * FROM newsfeed_photo WHERE newsfeed_id='".$thisNewsFeed['id']."'");
						$photoarray['photo']=$photos[0]['photo'];

					}
			    	


			    	$like_event =$conn->getAll("SELECT *FROM `like` WHERE user_id='".$currentuser_id."' AND newsfeed_id='".$thisNewsFeed['id']."'");
			    	if(empty($like_event)){
			    		$thisNewsFeed['likedByUser']=0;
			    		//exit(0);
			    	}else
			    	{
			    		$thisNewsFeed['likedByUser']=1;
			    	}
			    	if(!empty($thisNewsFeed['business'])){

				    	$follow_event =$conn->getAll("SELECT * FROM business_follower WHERE user_id='".$currentuser_id."' AND business_id='".$thisNewsFeed['business']['id']."'");
				    	if(empty($follow_event)){
				    		$thisNewsFeed['business']['followedByUser']=0;
				    		//exit(0);
				    	}else
				    	{
				    		$thisNewsFeed['business']['followedByUser']=1;
				    	}

				    	$favour_event =$conn->getAll("SELECT * FROM business_favorite WHERE user_id='".$currentuser_id."' AND business_id='".$thisNewsFeed['business']['id']."'");
				    	if(empty($favour_event)){
				    		$thisNewsFeed['business']['favouriteByUser']=0;
				    		//exit(0);
				    	}else
				    	{
				    		$thisNewsFeed['business']['favouriteByUser']=1;
				    	}
				    	
				    	$thisNewsFeed['un_enc_business_id']=$thisNewsFeed['business']['id'];
				    	$thisNewsFeed['business']['id']=gString($thisNewsFeed['business']['id']);
			   	 	}

			   	 	$thisNewsFeed['user']['id']=gString($thisNewsFeed['user']['id']);



			    	for($i=0;$i<count($thisNewsFeed['comments']); $i++)
			    	{
			    		$feed_comment =$thisNewsFeed['comments'][$i];
			    		$feed_comment['date_created']=getTimeVariation($feed_comment['date_created'],'UG');

			    		$clike_event =$conn->getAll("SELECT *FROM `like` WHERE user_id='".$currentuser_id."' AND comment_id='".$feed_comment['id']."'");

			    		if(empty($clike_event)){
			    			$feed_comment['isLikedByUser']=0;
			    		//exit(0);
				    	}else
				    	{
				    		$feed_comment['isLikedByUser']=1;
				    	}
				    	$feed_comment['like_number']=count($feed_comment['likes']);
				    	$thisNewsFeed['comments'][$i]=$feed_comment;


			    	}

			    	if(is_null($thisNewsFeed))
			    	{
			    		//exit(0);
			    		continue;
			    	}else{

						$thistempFeed = array_merge($thisNewsFeed, $photoarray );
						$thisNewsFeed =array_merge($thistempFeed,$innerFeedarray);
			    	    array_push($newsfeeds, $thisNewsFeed);
			    	}
			    }
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}

			//var_dump($newsfeeds);

			echo json_encode($newsfeeds);

		}

	}else if(isset($_GET['random_people']))
	{
		$fullpeople=array();
		
		$people = $conn->getAllDataRandomly('user',5);
		foreach ($people as $person) {
			if($person['id']!=$_SESSION['SESS_MEMBER_ID']){
				$fullperson =array(
				'user'=>array(),
				'city'=>'',
				'country'=>''

				);
				# code...
				$city =$conn->getCityOfId($person['city_id']);
				$country =$conn->getCountryOfId($city['country_id']);
				$fullperson['user']=$person;
				$fullperson['city']=$city;
				$fullperson['country']=$country;
				array_push($fullpeople,$fullperson);
			}

		}
		echo json_encode($fullpeople);
	}else if(isset($_GET['friendsnfollowers'])&&isset($_GET['buddy_id']))
	{
		//friendsnfollowers=all&buddy_id
		$date_created=time();
		$id =$_GET['buddy_id'];
		$myuser_followers  = $conn->getAll("SELECT *FROM user_follower WHERE user_id='".$id."'");
		$myuser_friends= $conn->getAll("SELECT * FROM user_friend WHERE ((user_id=$id OR friend_id=$id) AND status=1)");

		$myFollowersAndFreinds=array();

		foreach ($myuser_followers as $myuser_follower) {
			# code...
			$myfollower = $conn->getUserOfId($myuser_follower['follower_id']);
			echo json_encode($myfollower);
			array_push($myFollowersAndFreinds,$myfollower);

		}
		//echo json_encode($myuser_friends);
		//echo "user+feirnds";
		// foreach ($myuser_friends as $myuser_friend) {
		// 	# code...
		// 	$myfriend = $conn->getUserOfId($myuser_friend['follower_id']);
		// 	array_push($myFollowersAndFreinds,$myfollower);
		// }

		 foreach($myuser_friends as $user_friend)
		 {
		 	//$friend = $conn->getUserOfId($user_friend['friend_id']);

		 	if($user_friend['friend_id']==$id)
		 	{
		 		//echo "bada";
				 $friend = $conn->getUserOfId($user_friend['user_id']);
				 if(in_array($friend,$myFollowersAndFreinds))
				 {
				 	//array_push($myFollowersAndFreinds,$friend);
				 }else{
				 	array_push($myFollowersAndFreinds,$friend);
				 }
				 
				 
			//array_push($friends,$friend);
		 		//continue;
		 	}else if($user_friend['user_id']==$id){
		 		//echo "badi";
				 $friend = $conn->getUserOfId($user_friend['friend_id']);
				 if(in_array($friend,$myFollowersAndFreinds))
				 {	//array_push($myFollowersAndFreinds,$friend);

				 }else{
				 	array_push($myFollowersAndFreinds,$friend);
				 }
		 		 
		 	}
		 }

		 echo json_encode($myFollowersAndFreinds);
		 if(isset($_GET['item_id']))
		 {
		 	$kind="";
		 	if(isset($_GET['item_type']))
			 {
			 	if($_GET['item_type']=='new_feed')
			 	{
			 		$newsfeeed = $conn->getNewsFeedOfId($_GET['item_id']);
			 		$kind = "shared_".$newsfeeed['kind'];
			 	}
			 }
		 	//i have to come with the kind..
		 	$myShareNewsfeed=$conn->insertNewsfeed($date_created,$id,$kind,-1,-1,"shared_newsfeed",$_GET['item_id']);
		 	foreach($myFollowersAndFreinds as $myFollowersAndFreind)
		 	{
		 		///echo "badaaaaa";
		 		//echo "The item_id is==>".$_GET['item_id'];
		 		$item_id =intval($_GET['item_id']);

		 		$querystring2 = "INSERT INTO user_wall(user_id,review_id,date_created) VALUES ('".$myFollowersAndFreind['id']."','".$myShareNewsfeed['id']."','".$date_created."')";
		 		$conn->getAll($querystring2);
		 	}


		 }else{
		 	echo json_encode($myFollowersAndFreinds);
		 }

	}else if(isset($_GET['innerFeedId']))
	{
		$newsfeeed = $conn->getNewsFeedOfId($_GET['innerFeedId']);
		echo json_encode($newsfeeed);
	}else if(isset($_GET['business_id'])&&isset($_GET['follower_id'])&&isset($_GET['transaction']))
	{
		if($_GET['transaction']=='is_followed')
		{
			 $alreadyFollows = $conn->getAll("SELECT * FROM business_follower WHERE user_id='".$_GET['follower_id']."' AND business_id='".$_GET['business_id']."'");
			    $toggle=0;
			    if(empty($alreadyFollows))
			    {
			    	 $toggle=0; //zero if i dnt follow business

			    }else
			    {
			    	 $toggle=1; //one if i follow business
			    }
			echo $toggle;

		}else if($_GET['transaction']=='is_favourite')
		{
				$alreadyFavourites= $conn->getAll("SELECT * FROM business_favorite WHERE user_id='".$_GET['follower_id']."' AND business_id='".$_GET['business_id']."'");



				$favouritetoggle=0;

			    if(empty($alreadyFavourites))
			    {
			    	 $favouritetoggle=0; //zero if i dnt favourite business

			    }else
			    {
			    	foreach ($alreadyFavourites as $alreadyFavourite) {
			    		# code...
			    		$favouritetoggle=1; //one if i favourite business

			    	}
			    }

			    echo $favouritetoggle;
		}

	}else if(isset($_GET['time_owner_business_id'])&&isset($_GET['owner_id']))
	{
		//echo $_GET['time_owner_business_id'];
		//echo $_GET['owner_id'];
		$status='approved';
		$myuser_business_claims = $conn->getAll("SELECT *FROM user_business_claim WHERE user_id='".$_GET['owner_id']."' AND business_id='".$_GET['time_owner_business_id']."' AND status='".$status."' ");
		if(!empty($myuser_business_claims))
		{
			$business_claim = $myuser_business_claims[0];

			echo json_encode($business_claim);

		}else
		{
			echo 'no business claim';
		}


	}else if(isset($_POST['claim_post'])&&isset($_POST['transaction']))
	{

		if(strcmp($_POST['transaction'], 'public_edit')==0)
		{
			//var_dump($_POST['business_id']);
			//var_dump(count($_FILES));
			$thisbusiness =$conn->getBusinessOfId($_POST['business_id']);
			
				//$thisbusiness = $thisbusinesses[0];

				$busines_name_banner =$_POST['business_name']."_banner";
			    $busines_name_logo =$_POST['business_name']."_logo";
			
				if(count($_FILES)==0)
				{
					//echo ("The name is".$thisbusiness['name']);
					//echo("no file");
					$logo_name = $thisbusiness['logo'];
					$banner_name = $thisbusiness['banner'];

				}else if(count($_FILES)==1 && $_FILES['cover_photo'])
				{
					//echo ($thisbusiness['name']);
					//echo("cava foto");
					move_uploaded_file($_FILES['cover_photo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_banner.".png");

					$logo_name = $thisbusiness['logo'];
			        $banner_name = "uploads/".$busines_name_banner.".png";

				}else if(count($_FILES)==1 && $_FILES['logo'])
				{
					//echo ($thisbusiness['name']);
					//echo("ka logoo");
					move_uploaded_file($_FILES['logo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_logo.".png");

					$logo_name = "uploads/".$busines_name_logo.".png";
			        $banner_name = $thisbusiness['banner'];

				}else if (count($_FILES)==2) {
					# code...
					//echo("byombi");
					move_uploaded_file($_FILES['cover_photo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_banner.".png");
					move_uploaded_file($_FILES['logo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_logo.".png");
					$logo_name = "uploads/".$busines_name_logo.".png";
			        $banner_name = "uploads/".$busines_name_banner.".png";
				}

			
			// $busines_name_banner =$_POST['business_name']."_banner";
			// $busines_name_logo =$_POST['business_name']."_logo";
			// move_uploaded_file($_FILES['cover_photo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_banner.".png");
			// move_uploaded_file($_FILES['logo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_logo.".png");
			// $logo_name = "uploads/".$busines_name_logo.".png";
			// $banner_name = "uploads/".$busines_name_banner.".png";

			 $date_created =time();
			 $category_1_post=0;
			 $category_2_post=0;
			 $category_3_post=0;
			// $status = "pending";
			 if(isset($_POST['category_1_id'])&&isset($_POST['sub_category_1_id']))
			 {
			 		$category_1_post=1;
			 }
			 if(isset($_POST['category_2_id'])&&isset($_POST['sub_category_2_id']))
			 {
			 		$category_2_post=1;
			 }
			 if(isset($_POST['category_3_id'])&&isset($_POST['sub_category_3_id']))
			 {
			 		$category_3_post=1;
			 }


			 $conn->editPublicInfo($_POST['user_id'],$_POST['business_id'],$date_created,$_POST['business_name'],addslashes($_POST['business_email']),addslashes($_POST['business_website']),$_POST['country_id'],$_POST['city_id'],addslashes($_POST['phone_1']),addslashes($_POST['phone_2']),$_POST['category_1_id'],$_POST['category_2_id'],$_POST['category_3_id'],$_POST['sub_category_1_id'],$_POST['sub_category_2_id'],$_POST['sub_category_3_id'],$_POST['address'],addslashes($_POST['business_description']),addslashes($banner_name),addslashes($logo_name),$category_1_post,$category_2_post,$category_3_post);

		}else if (strcmp($_POST['transaction'], 'super_edit')==0 || strcmp($_POST['transaction'], 'super_claim')==0)
		{
				//echo "badman am in";
				$thisbusiness =$conn->getBusinessOfId($_POST['business_id']);
			
				//$thisbusiness = $thisbusinesses[0];

				$busines_name_banner =$_POST['business_name']."_banner";
			    $busines_name_logo =$_POST['business_name']."_logo";

				if(count($_FILES)==0)
				{
					//echo ("The name is".$thisbusiness['name']);
					//echo("no file");
					$logo_name = $thisbusiness['logo'];
					$banner_name = $thisbusiness['banner'];

				}else if(count($_FILES)==1 && $_FILES['cover_photo'])
				{
					//echo ($thisbusiness['name']);
					//echo("cava foto");
					move_uploaded_file($_FILES['cover_photo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_banner.".png");

					$logo_name = $thisbusiness['logo'];
			        $banner_name = "uploads/".$busines_name_banner.".png";

				}else if(count($_FILES)==1 && $_FILES['logo'])
				{
					//echo ($thisbusiness['name']);
					//echo("ka logoo");
					move_uploaded_file($_FILES['logo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_logo.".png");

					$logo_name = "uploads/".$busines_name_logo.".png";
			        $banner_name = $thisbusiness['banner'];

				}else if (count($_FILES)==2) {
					# code...
					//echo("byombi");
					move_uploaded_file($_FILES['cover_photo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_banner.".png");
					move_uploaded_file($_FILES['logo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_logo.".png");
					$logo_name = "uploads/".$busines_name_logo.".png";
			        $banner_name = "uploads/".$busines_name_banner.".png";
				}

				$date_created =time();
				$status = "Pending";

				$category_1_post=0;
			 	$category_2_post=0;
			 	$category_3_post=0;

			if(isset($_POST['category_1_id'])&&isset($_POST['sub_category_1_id']))
			 {
			 		$category_1_post=1;
			 }
			 if(isset($_POST['category_2_id'])&&isset($_POST['sub_category_2_id']))
			 {
			 		$category_2_post=1;
			 }
			 if(isset($_POST['category_3_id'])&&isset($_POST['sub_category_3_id']))
			 {
			 		$category_3_post=1;
			 }

		//if(is_numeric($element))

		//due to mikes error in data base naming, category id should have subcategory_id as real data that goes there
		//in  the user_business_claim table

		$buz_id=$conn->insertBusinessClaimOrEdit($_POST['transaction'],addslashes($_POST['business_name']),addslashes($_POST['address']),$_POST['user_id'],$_POST['business_id'],addslashes($_POST['phone_1']),addslashes($_POST['phone_2']),addslashes($_POST['business_email']),addslashes($_POST['business_website']),addslashes($_POST['position_of_editor']),$banner_name,$logo_name,$date_created,$status,addslashes($_POST['business_description']),$_POST['category_1_id'],$_POST['category_2_id'],$_POST['category_3_id'],$_POST['sub_category_1_id'],$_POST['sub_category_2_id'],$_POST['sub_category_3_id'],$_POST['mon_start_time'],$_POST['mon_end_time'],$_POST['tue_start_time'],$_POST['tue_end_time'],$_POST['wed_start_time'],$_POST['wed_end_time'],$_POST['thur_start_time'],$_POST['thur_end_time'],$_POST['fri_start_time'],$_POST['fri_end_time'],$_POST['sat_start_time'],$_POST['sat_end_time'],$_POST['sun_start_time'],$_POST['sun_end_time'],addslashes($_POST['facebook_link']),addslashes($_POST['twitter_link']),addslashes($_POST['youtube_link']),addslashes($_POST['instagram_link']),$_POST['take_away'],$_POST['accepts_credit_card'],$_POST['good_for_children'],$_POST['good_for_dancing'],$_POST['good_for_groups'],$_POST['music'],$_POST['alcohol'],$_POST['happy_hour'],$_POST['best_night'],$_POST['outdoor_seating'],$_POST['has_wifi'],$_POST['has_tv'],$_POST['delivery'],$_POST['take_reservation'],$_POST['waiter_service'],$_POST['has_pool_table'],$_POST['country_id'],$_POST['city_id'],$category_1_post,$category_2_post,$category_3_post);

            $business_status = array(
						'id' =>gString($buz_id),
						'status' => $status
			);
			echo json_encode($business_status); 

		}
		else{
		//var_dump($_POST);
		//var_dump($_FILES);
		$busines_name_banner =$_POST['business_name']."_banner";
		$busines_name_logo =$_POST['business_name']."_logo";
		move_uploaded_file($_FILES['cover_photo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_banner.".png");
		move_uploaded_file($_FILES['logo']["tmp_name"], "../../admin/Theme/uploads/".$busines_name_logo.".png");
		$logo_name = "uploads/".$busines_name_logo.".png";
		$banner_name = "uploads/".$busines_name_banner.".png";

		$date_created =time();
		$status = "pending";

		//if(is_numeric($element))

		//due to mikes error in data base naming, category id should have subcategory_id as real data that goes there
		//in  the user_business_claim table

		$conn->insertBusinessClaimOrEdit($_POST['transaction'],addslashes($_POST['business_name']),addslashes($_POST['address']),$_POST['user_id'],$_POST['business_id'],addslashes($_POST['phone_1']),addslashes($_POST['phone_2']),addslashes($_POST['business_email']),addslashes($_POST['business_website']),addslashes($_POST['position_of_editor']),$banner_name,$logo_name,$date_created,$status,addslashes($_POST['business_description']),$_POST['sub_category_1_id'],$_POST['sub_category_2_id'],$_POST['sub_category_3_id'],$_POST['mon_start_time'],$_POST['mon_end_time'],$_POST['tue_start_time'],$_POST['tue_end_time'],$_POST['wed_start_time'],$_POST['wed_end_time'],$_POST['thur_start_time'],$_POST['thur_end_time'],$_POST['fri_start_time'],$_POST['fri_end_time'],$_POST['sat_start_time'],$_POST['sat_end_time'],$_POST['sun_start_time'],$_POST['sun_end_time'],addslashes($_POST['facebook_link']),addslashes($_POST['twitter_link']),addslashes($_POST['youtube_link']),addslashes($_POST['instagram_link']),$_POST['take_away'],$_POST['accepts_credit_card'],$_POST['good_for_children'],$_POST['good_for_dancing'],$_POST['good_for_groups'],$_POST['music'],$_POST['alcohol'],$_POST['happy_hour'],$_POST['best_night'],$_POST['outdoor_seating'],$_POST['has_wifi'],$_POST['has_tv'],$_POST['delivery'],$_POST['take_reservation'],$_POST['waiter_service'],$_POST['has_pool_table'],$_POST['country_id'],$_POST['city_id']);

	     }

		

	}else if(isset($_GET['sub_category_id'])&&isset($_GET['user_id'])&&isset($_GET['transaction']))
	{
		if(strcmp($_GET['transaction'],'get_businesses')==0)
		{
			$id=$_GET['user_id'];
			if($id==0){
				$businesses_of_subcategory =array();
					$busines_categories =$conn->getAll("SELECT *FROM business_category WHERE sub_category_id='".$_GET['sub_category_id']."'");
					if(!empty($busines_categories))
					{

						foreach ($busines_categories as $busines_category) {

							# code...
							$business_of_subcategory=$conn->getBusinessOfId($busines_category['business_id']);
							
							$business_of_subcategory['isfollowed']='false';
							
							$business_of_subcategory['un_enc_id']=$business_of_subcategory['id'];
							$business_of_subcategory['id']=gString($business_of_subcategory['id']);

							array_push($businesses_of_subcategory,$business_of_subcategory);
						}
						echo json_encode($businesses_of_subcategory);

					}else{

						echo json_encode(
								array(

									"Notice"=>"no businesses"

								)
							);

					}

			}else{
					
					$businesses_of_subcategory =array();
					$busines_categories =$conn->getAll("SELECT *FROM business_category WHERE sub_category_id='".$_GET['sub_category_id']."'");
					if(!empty($busines_categories))
					{
						foreach ($busines_categories as $busines_category) {

							# code...
							$business_of_subcategory=$conn->getBusinessOfId($busines_category['business_id']);
							$qryfB="SELECT *FROM business_follower WHERE user_id='".$id."' AND business_id='".$busines_category['business_id']."'";
							$businessf=$conn->getAll($qryfB);
							if(!empty($businessf))
							{
								$business_of_subcategory['isfollowed']='true';
							}else
							{
								$business_of_subcategory['isfollowed']='false';
							}
							$business_of_subcategory['un_enc_id']=$business_of_subcategory['id'];
							$business_of_subcategory['id']=gString($business_of_subcategory['id']);

							array_push($businesses_of_subcategory,$business_of_subcategory);
						}


						echo json_encode($businesses_of_subcategory);

			   
					}else{
							echo json_encode(
								array(

									"Notice"=>"no businesses"

								)
							);
					}
			}
		}

	}else if(isset($_POST['code']))
	{
		$res=$conn->checkCode($_POST['code']);
		if($res!=0 && $res!=-1 )
		{
			$business_id = gString($res);
			echo json_encode(array( 
				'business_id'=>$business_id,
				'code_status' =>$res)
			);
		}else{

			echo json_encode(array( 
				'business_id'=>$res,
				'code_status' =>0)
			);

		}
		
		
	}else if(isset($_GET['latest_discoveries']))
	{
		/* 
			End point to pick latest discoveries 
			from the database

		*/
		$final_discoveries=array();

		$final_discovery = array (
					'id'=>'',
					'name'=>'',
					'address'=>'',
					'user_id'=>'',
					'user_name'=>'',
					'user_pic'=> '',
		);

		$latest_discoveries = $conn->getAll("SELECT * FROM business ORDER BY id DESC LIMIT 6");

		foreach( $latest_discoveries as $latest_discovery )
		{
			$dis_user = $conn->getUserOfId($latest_discovery['user_id']);

			$final_discovery['unenc_id']= $latest_discovery['id'];
			$final_discovery['id']= gString($latest_discovery['id']);
			$final_discovery['name']=$latest_discovery['name'];
			$final_discovery['address']=$latest_discovery['address'];
			$final_discovery['user_id']=$dis_user['id'];
			$final_discovery['user_name']=$dis_user['first_name'].' '.$dis_user['last_name'];
			$final_discovery['user_pic']=$dis_user['avatar'];

			array_push($final_discoveries,$final_discovery);
		
		}

		echo json_encode($final_discoveries);

	    //$sql = "";
	}



?>
