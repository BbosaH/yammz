<?php
require_once('db_config.php');
//$dbase= $dbaseobj->test_db_connect(DB_SERVER,DB_DATABASE,DB_USER,DB_PASSWORD);
$servername = DB_SERVER;
$databasename = DB_DATABASE;
$username = DB_USER;
$password = DB_PASSWORD;
$hasConnectionError = false;
$errors = array();
$tips = array(
	0 => "tip_welcome",
	1 => "tip_search_friends",
	2 => "tip_follow_businesses",
	3 => "tip_follow_people",
	4 => "tip_add_business",
	5 => "tip_support"
);
$tipInterval =  ( 1.0 / 60 ) * 0.5;  //24; //it is in hours
$suggestedBusinesseslimit = 3;
$suggestedPeoplelimit = 4;					
$newsFeedKinds = array(        
    "review" => array( 
    	"shared_as" => 'shared_review', 
    	"receivers" => array(
    		"friends_of_user"=>true, 
    		"followers_of_user" => true, 
    		"followers_of_business" => true
    	)
    ),
    "review_photo" => array( "shared_as" => 'review_photo', "receivers" => array()),
    "rate" => array( "shared_as" => 'rate', "receivers" => array()), 
    "new_friend" => array( "shared_as" => 'new_friend', "receivers" => array()), 
    "add_business" => array( 
    	"shared_as" => 'shared_add_business', 
    	"receivers" => array(
    		"friends_of_user" => true,
			"followers_of_user"	=> true
    	)
    ),
    "add_photo" => array( "shared_as" => 'add_photo', "receivers" => array()),
    "business_post" => array( "shared_as" => 'business_post', "receivers" => array()),
    "business_photo" => array( "shared_as" => 'business_photo', "receivers" => array()),
    "business_post_photo" => array( "shared_as" => 'business_post_photo', "receivers" => array()),
    "business_edit_banner" => array( "shared_as" => 'business_edit_banner', "receivers" => array()), 
    "business_edit_logo" => array( "shared_as" => 'business_edit_logo', "receivers" => array()), 
    "business_edit_info" => array( "shared_as" => 'business_edit_info', "receivers" => array()),
    "business_edit_some_info" => array( "shared_as" => 'business_edit_some_info', "receivers" => array()),
    "business_edit_name" => array( "shared_as" => 'business_edit_name', "receivers" => array()), 
    "business_edit_all" => array( "shared_as" => 'business_edit_all', "receivers" => array()), 
    "business_follow" => array( "shared_as" => 'business_follow', "receivers" => array()), 
    "business_favourite" => array( 
    	"shared_as" => 'shared_business_favourite', 
    	"receivers" => array(
    		"friends_of_user" => true,
			"followers_of_user"	=> true
    	)
    ), 
    "add_comment" => array( "shared_as" => 'add_comment', "receivers" => array()),
    "shared_review" => array( "shared_as" => 'shared_review', "receivers" => array()),
    "shared_add_business" => array( "shared_as" => 'shared_add_business', "receivers" => array()),
    "shared_business_favourite" => array( "shared_as" => 'shared_business_favourite', "receivers" => array()),
    "add" => array( "shared_as" => 'add', "receivers" => array()),
    "tip_welcome" => array( "shared_as" => 'tip_welcome', "receivers" => array()),
    "tip_search_friends" => array( "shared_as" => 'tip_search_friends', "receivers" => array()),
    "tip_follow_businesses" => array( "shared_as" => 'tip_follow_businesses', "receivers" => array()),
    "tip_follow_people" => array( "shared_as" => 'tip_follow_people', "receivers" => array()),
    "tip_add_business" => array( "shared_as" => 'tip_add_business', "receivers" => array()),
    "check_in" => array( "shared_as" => 'check_in', "receivers" => array())
);
$user = array(
	'id' => 0,
	'first_name' => '',
	'last_name' => '',
	'avatar' => '',
	'login_status' => 0,
	'last_login_date' => 0,
	'is_authorised' => false,
	'city_id' => 0,
	'city' => null,
	'reviews_count' => 0,
	'date_of_birth' => 0,
	'sex' => '',
	'social' => 'yammzit',
	'social_id' => '',
);
$business = array(
	"id" => 0,
	"user_id" => 0,
	"owner_id" => 0,
	"date_created" =>0,
	"date_claimed" => 0,
	"country_id" => "",
	"name" => "",
	"address" => "",
	"city_id" => "",
	"phone_1" => "",
	"phone_2" => "",
	"email" => "",
	"website" => "",
	"location" => "",
	"logo" => "",
	"banner" => "",
	"good" => 0,
	"cost" => 0,
	"description" => "",
	"user" => null,
	"owner" => null,
	"sub_categories" => array(),
	"reviews" => 0,
	"followers" => array(),
	"messages" => array(),
	"photoes" => array(),
	"events" => array(),
	"posts" => array(),
	"city" => null
);
$settings = array(
	"newsfeed_chunk" => 0,
	"newsfeed_comments_chunk" => 0,
	"notifications_chunk" => 0,
	"sponsored_search_results_chunk" => 0
);
$newsfeed = array(
	"id" => 0,
	"date_created" => 0,
	"user_id" => 0,
	"kind" => "",
	"cost" => 0,
	"good" => 0,
	"details" => "",
	"business_id" => 0,
	"user" => null,
	"business" => null,
	"comments" => array(),
	"likes" => array()
);
$slide = array(
	"id" => 0,
	"business_id" => 0,
	"slide_image" => "",
	"business" => null
);
$country = array(
	"id" => 0,
	"name" => "",
	"code" => "",
	"other" => "",
	"flag" => "",
	"cities" => array()
);
$city = array(
	"id" => 0,
	"name" => "",
	"country_id" => 0,
	"other" => "",
	"country" => null
);
$category = array(
	"id" => 0,
	"name" => "",
	"icon" => "",
	"description" => "",
	"sub_categories" => array()
);
$subCategory = array(
	"id" => 0,
	"category_id" =>"",
	"name" => "",
	"icon" => "",
	"description" => ""
);
$admin = array(
	"id" => 0,
	"username" => "",
	"avatar" => "",
	"status" => "",
);
$business_follower = array(
	"id" => 0,
	"user_id" => 0,
	"business_id" => 0,
	"user" => null
);
$business_favorite = array(
	"id" => 0,
	"user_id" => 0,
	"business_id" => 0,
	"user" => null
);
$business_photo = array(
	"business_id" => 0,
	"user_id" => 0,
	"photo" => 0,
	"date_created" => 0
);
$sponsored_search_result = array(
	"id" => 0,
	"business_id" => 0,
	"slide_image" => "",
    "business" => null
);
$like = array(
	"id" => 0,
	"user_id" => 0,
	"newsfeed_id" => 0,
	"comment_id" => 0,
	"date_created" => 0
);
$comment = array(
	"id" => 0,
	"user_id" => 0,
	"review_id" => 0,
	"kind" => "",
	"details" => "",
	"date_created" => "",
	"commenTo" => 0,
	"user" => null,
	"likes" => array()
);
$business_message = array(
	"id" => 0,
	"business_id" => 0,
	"user_id" => 0,
	"details" => "",
	"date_created" => 0,
	"status" => 0,
	"is_from_user" => 0
);
$user_message = array(
	"id" => 0,
	"user_id" => 0,
	"sender_id" => 0,
	"details" => "",
	"date_created" => 0,
	"status" => 0,
);
$geo = null;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
	array_push($errors, $e->getMessage());
}
?>