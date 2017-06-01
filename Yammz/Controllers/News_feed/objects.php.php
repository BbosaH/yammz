<?php
$hasConnectionError = false;
$errors = array();
$user = array(
	'id' => 0,
	'name' => '',
	'avatar' => '',
	'login_status' => 0,
	'last_login_date' => 0,
	'is_authorised' => false,
	'city_id' => 0,
	'city' => null,
	'reviews_count' => 0,
	'date_of_birth' => 0,
	'sex' => '',
	'social' => 'yammzit'
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
