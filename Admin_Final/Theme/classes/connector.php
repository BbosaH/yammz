<?php

require_once "Dbase.php";

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

class connector 
{
    public $dbase ;
    public $photoBase;
    public $photoBase2;
    
    public function __construct(){
        global $dbase;
        global $photoBase2;
        global $photoBase;
        $dbaseobj = new Dbase();
        //$dbase= $dbaseobj->test_db_connect('MYSQL5014.Smarterasp.net','db_9eb574_yammzit','9eb574_yammzit','yammz.1234');
        //('localhost','yammzit','root','YES');

        include("connection_variables.php");
        $dbase= $dbaseobj->test_db_connect($servername,$databasename,$username,$password);
        $photoBase="../../../admin/Theme/";
        $photoBase2="../../admin/Theme/";
    }

    public function getAll($querystring)
    {
    
        global $dbase;
        $query = $dbase->query($querystring); //returns pdo statement object
         
        try{
            //$query->execute();

            $rows = $query->fetchAll(PDO::FETCH_ASSOC);  //returns an sccociative array of requests
            //echo '<pre>' ,print_r ($rows,true), '</pre>';
            return $rows;
            

        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        
        return;
    }
    
    public function getResById($querystring,$id)
    {
        global $dbase;
        $query = $dbase->prepare($querystring); //returns pdo statement object
        try{
            $query->execute();

            $rows = $query->fetchAll(PDO::FETCH_ASSOC);  //returns an sccociative array of requests
            foreach($rows as $row)
            {
                if($row['id'] == $id)
                {
                    return $row;
                }

            }
            
            

        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        
        return;

    }

    function getClaimedBusinesses(){
        global $dbase;

        $response=array();
        $sql = "SELECT business.city_id as city_id, business.id as id, business.name as name, business.address as address FROM business,user_business_claim WHERE business.owner_id IS NULL AND business.id=user_business_claim.business_id AND user_business_claim.status !='Deactivated'";
        
        $res = $this->getAll($sql);

        foreach ($res as $key => $value) {

            $city=$this->getCityNameofId($this->gString($value['city_id']));
            $country=$this->getCoutryOfcityId($this->gString($value['city_id']));
            $info=array(
                'id'=>$this->gString($value['id']),
                'name'=>$value['name'],
                'address'=>$value['address'],
                'city'=>$city,
                'country'=>$country
            );

            array_push($response, $info);
        }

        return $response;
    }

    function getApprovedClaimedBusinesses(){
        global $dbase;

        $response=array();
        $sql = "SELECT business.city_id as city_id, business.id as id, business.name as name, business.address as address FROM business,user_business_claim WHERE business.owner_id IS NOT NULL AND business.id=user_business_claim.business_id AND user_business_claim.status !='Deactivated'";
        
        $res = $this->getAll($sql);

        foreach ($res as $key => $value) {

            $city=$this->getCityNameofId($this->gString($value['city_id']));
            $country=$this->getCoutryOfcityId($this->gString($value['city_id']));
            $info=array(
                'id'=>$this->gString($value['id']),
                'name'=>$value['name'],
                'address'=>$value['address'],
                'city'=>$city,
                'country'=>$country
            );

            array_push($response, $info);
        }

        return $response;
    }

    function addOrdinalNumberSuffix($num) {
      if (!in_array(($num % 100),array(11,12,13))){
        switch ($num % 10) {
          // Handle 1st, 2nd, 3rd
          case 1:  return $num.'st';
          case 2:  return $num.'nd';
          case 3:  return $num.'rd';
        }
      }
      return $num.'th';
    }

    function getClaimedBusinessesOfId($id){
        global $dbase;
        $user_fname="";
        $user_lname="";
        $id=$this->gStringId($id);
        $business_category_info=array();
        $subCategories=array();

        $working_hours=array();
        $Other_details=array();

        // claimed_approved_business.php

        $response=array();
        $sql = "SELECT business.city_id as city_id, business.id as id, business.name as name,user_business_claim.banner_web as banner,user_business_claim.logo_web as logo,user_business_claim.user_id as user_id,user_business_claim.position as position,user_business_claim.phone_1 as phone_1,user_business_claim.phone_2 as phone_2,user_business_claim.email as email,user_business_claim.website as website,user_business_claim.address as address,user_business_claim.category1_id as category1_id,user_business_claim.category2_id as category2_id,user_business_claim.category3_id as category3_id,user_business_claim.description as description,user_business_claim.monday_open as monday_open,user_business_claim.monday_close as monday_close,user_business_claim.tuesday_open as tuesday_open,user_business_claim.tuesday_close as tuesday_close,user_business_claim.wednesday_open as wednesday_open,user_business_claim.wednesday_close as wednesday_close,user_business_claim.thursday_open as thursday_open,user_business_claim.thursday_close as thursday_close,user_business_claim.friday_open as friday_open,user_business_claim.friday_close as friday_close,user_business_claim.saturday_open as saturday_open,user_business_claim.saturday_close as saturday_close,user_business_claim.sunday_open as sunday_open,user_business_claim.sunday_close as sunday_close,
            user_business_claim.other_take_away as other_take_away,user_business_claim.other_accepts_credit_card as other_accepts_credit_card,
            user_business_claim.other_good_for_children as other_good_for_children,user_business_claim.other_good_for_groups as other_good_for_groups,
            user_business_claim.other_music as other_music,user_business_claim.other_good_for_dancing as other_good_for_dancing,
            user_business_claim.other_alcohol as other_alcohol,user_business_claim.other_happy_hour as other_happy_hour,
            user_business_claim.other_best_night as other_best_night,user_business_claim.other_outdoor_seating as other_outdoor_seating,
            user_business_claim.other_has_wi_fi as other_has_wi_fi,user_business_claim.other_has_tv as other_has_tv,
            user_business_claim.other_water_service as other_water_service,user_business_claim.other_has_pool_table as other_has_pool_table,user_business_claim.user_id as user_id
         FROM business,user_business_claim WHERE business.id=user_business_claim.business_id AND user_business_claim.business_id='".$id."'";
        
        $res = $this->getAll($sql);

        foreach ($res as $key => $value) {

            $city=$this->getCityNameofId($this->gString($value['city_id']));
            $country=$this->getCoutryOfcityId($this->gString($value['city_id']));
            $user_info=$this->getClientOfId($this->gString($value['user_id']));

            // $business_category_info=$this->getBusinessCategorySubcategory($this->gString($id));
            $monday_open=$value['monday_open'];
            $monday_close=$value['monday_close'];
            $tuesday_open=$value['tuesday_open'];
            $tuesday_close=$value['tuesday_close'];
            $wednesday_open=$value['wednesday_open'];
            $wednesday_close=$value['wednesday_close'];
            $thursday_open=$value['thursday_open'];
            $thursday_close=$value['thursday_close'];
            $friday_open=$value['friday_open'];
            $friday_close=$value['friday_close'];
            $saturday_open=$value['saturday_open'];
            $saturday_close=$value['saturday_close'];
            $sunday_open=$value['sunday_open'];
            $sunday_close=$value['sunday_close'];


            if(!empty($monday_open)){

                $day=array(
                    'day'=>'Mon','from'=>$monday_open,'to'=>$monday_close
                );

                array_push($working_hours, $day);
            }

            if(!empty($tuesday_open)){

                $day=array(
                    'day'=>'Tue','from'=>$tuesday_open,'to'=>$tuesday_close
                );

                array_push($working_hours, $day);
            }
            if(!empty($wednesday_open)){

                $day=array(
                    'day'=>'Wed','from'=>$wednesday_open,'to'=>$wednesday_close
                );

                array_push($working_hours, $day);
            }

            if(!empty($thursday_open)){

                $day=array(
                    'day'=>'Thur','from'=>$thursday_open,'to'=>$thursday_close
                );

                array_push($working_hours, $day);
            }

            if(!empty($friday_open)){

                $day=array(
                    'day'=>'Fri','from'=>$friday_open,'to'=>$friday_close
                );

                array_push($working_hours, $day);
            }

            if(!empty($saturday_open)){

                $day=array(
                    'day'=>'Sat','from'=>$saturday_open,'to'=>$saturday_close
                );

                array_push($working_hours, $day);
            }

            if(!empty($sunday_open)){

                $day=array(
                    'day'=>'Sun','from'=>$sunday_open,'to'=>$sunday_close
                );

                array_push($working_hours, $day);
            }

            if($value['other_take_away']==1){

                $info=array('info'=>'Take away');

                array_push($Other_details, $info);
            }

            if($value['other_accepts_credit_card']==1){

                $info=array('info'=>'Accept Credit Card');

                array_push($Other_details, $info);
            }

            if($value['other_good_for_children']==1){

                $info=array('info'=>'Good for children');

                array_push($Other_details, $info);
            }

            if($value['other_good_for_groups']==1){

                $info=array('info'=>'Good for groups');

                array_push($Other_details, $info);
            }

            if($value['other_music']==1){

                $info=array('info'=>'Music');

                array_push($Other_details, $info);
            }

            if($value['other_good_for_dancing']==1){

                $info=array('info'=>'Good for dancing');

                array_push($Other_details, $info);
            }

            if($value['other_alcohol']==1){

                $info=array('info'=>'Alcohol');

                array_push($Other_details, $info);
            }

            if($value['other_happy_hour']==1){

                $info=array('info'=>'Happy Hour');

                array_push($Other_details, $info);
            }

            if($value['other_best_night']==1){

                $info=array('info'=>'Best night');

                array_push($Other_details, $info);
            }

            if($value['other_outdoor_seating']==1){

                $info=array('info'=>'Outdoor seating');

                array_push($Other_details, $info);
            }

            if($value['other_has_wi_fi']==1){

                $info=array('info'=>'Has Wafi');

                array_push($Other_details, $info);
            }

            if($value['other_has_tv']==1){

                $info=array('info'=>'Has Tv');

                array_push($Other_details, $info);
            }

            if($value['other_water_service']==1){

                $info=array('info'=>'Water service');

                array_push($Other_details, $info);
            }

            if($value['other_has_pool_table']==1){

                $info=array('info'=>'Has pool table');

                array_push($Other_details, $info);
            }



            $category1_id=$value['category1_id'];
            $category2_id=$value['category2_id'];
            $category3_id=$value['category3_id'];

            ///////////////////////
            if(!empty($category1_id)){
                $subCat1=$this->getSubCategoryOfId($value['category1_id']);         
                $getCategoryInfo1=$this->getCategoryOfId($subCat1['category_id']);  
                $dat=array('category_name'=>$getCategoryInfo1['name'],'subCategory_name'=>$subCat1['name']);
                array_push($business_category_info, $dat);
            }

            if(!empty($category2_id)){
                $subCat2=$this->getSubCategoryOfId($value['category2_id']);         
                $getCategoryInfo2=$this->getCategoryOfId($subCat2['category_id']);  
                $dat=array('category_name'=>$getCategoryInfo2['name'],'subCategory_name'=>$subCat2['name']);
                array_push($business_category_info, $dat);
            }

            if(!empty($category3_id)){
                $subCat3=$this->getSubCategoryOfId($value['category3_id']);         
                $getCategoryInfo3=$this->getCategoryOfId($subCat3['category_id']);  
                $dat=array('category_name'=>$getCategoryInfo3['name'],'subCategory_name'=>$subCat3['name']);
                array_push($business_category_info, $dat);
            }
            ////////////////////////

            foreach ($user_info as $key => $value2) {
                $user_fname=$value2['first_name'];
                $user_lname=$value2['last_name'];
            }
            $info=array(
                'business_id'=>$this->gString($value['id']),
                'business_name'=>$value['name'],
                'business_address'=>$value['address'],
                'business_city'=>$city,
                'claimer_post'=>$value['position'],
                'business_country'=>$country,
                'claimer_fname'=>$user_fname,
                'claimer_lname'=>$user_lname,
                'business_description'=>$value['description'],
                'business_category_info'=>$business_category_info,
                'phone_1'=>$value['phone_1'],
                'phone_2'=>$value['phone_2'],
                'email'=>$value['email'],
                'website'=>$value['website'],
                'address'=>$value['address'],
                'working_hours'=>$working_hours,
                'other_details'=>$Other_details,
                'banner_image'=>$value['banner'],
                'logo_image'=>$value['logo'],
                'uid'=>$this->gString($value['user_id'])
            );

            array_push($response, $info);
        }

        return $response;
    }

    // function getBusinessCategorySubcategory($bid){

    // }

    function getBusinessCategorySubcategory($bid){
        global $dbase;
        $countries=array();
        $subCategory_name="";
        $category_name="";
        $data=array();

        $bid=$this->gStringId($bid);

        $sql = "SELECT * FROM business_category WHERE business_id='".$bid."'";
        $res = $dbase->query($sql);
        $number=0;
        foreach ($res as $value) {

            $subCat=$this->getSubCategoryOfId($value['sub_category_id']);

            $subCategory_name=$subCat['name'];

            $getCategoryInfo=$this->getCategoryOfId($subCat['category_id']);
                
            $category_name=$getCategoryInfo['name'];
            
            $dat=array('category_name'=>$category_name,'subCategory_name'=>$subCategory_name);

            array_push($data, $dat);
        }

        return $data;
    }

    function getCallToAction($key,$id){
        if (strcmp($key, "specific")==0) {
            $arres=$this->getAll("SELECT * FROM call_to_action where id='".$id."'");
        }else{
            $arres=$this->getAll("SELECT * FROM call_to_action ");
        }
        return $arres;
    }

    function getBusinessInfoOfAd($key,$key_name,$keyvalue){
        global $dbase;
        $response_data=array();
        // $ad_url ="";       
        // $add_description ="";     
        // $start_date = "";
        // $ad_duration ="";                                    
        // $business_id="";
        // $add_type_id="";
        // $add_title="";
        // $caption="";
        // $min_age="";
        // $max_age=""; 
        // $viewer="";
        // $call_to_action_id="";
        // $business_logo="";
        // $business_banner= "";                                    
        // $name= "";            
        // $business_email="";

        if (strcmp($key, "specific")==0 ) {
            if (strcmp($key_name, "id")==0) {
                $keyvalue=$this->gStringId($keyvalue);
            }
            $arres=$this->getAll("SELECT * FROM adds WHERE ".$key_name." = '".$keyvalue."'");
        }else{
            $arres=$this->getAll("SELECT * FROM adds");
        }

        foreach ($arres as $row) {
            $ad_url = $row['ad_url'];       
            $add_description = $row['add_description'];     
            $start_date = date("Y-m-d H:i:s",$row['reg_date']);
            $ad_duration = $row['no_of_weeks'];                                    
            $business_id=$row['business_id']; //id
            $add_type_id=$row['add_type_id']; //needed// id
            $add_title=$row['add_title'];
            $caption=$row['caption'];//Headline
            $min_age=$row['min_age'];
            $max_age=$row['max_age']; 
            $viewer=$row['gender'];
            $call_to_action_id=$row['call_to_action_id'];//id
            $add_id = $row['id']; 

            // Getting business ifo
            $bus = $this->getResById("SELECT * FROM business",$business_id);
                                    
            $business_logo= $bus['logo'];
            $business_banner= $bus['banner'];                                    
            $business_name= $bus['name'];            
            $business_email=$bus['email'];

            $ad_typ = $this->getResById("SELECT * FROM ad_type",$add_type_id);
            $adtypeName=$ad_typ['name'];
            $adtypeImage=$ad_typ['url'];

            $call_to_action = $this->getResById("SELECT * FROM call_to_action",$call_to_action_id);
            $call_to_action=$call_to_action['name'];


            $country_list=$this->getAll("SELECT * FROM advert_country WHERE ad_id='".$add_id."'");
            $country_data=array();
            foreach ($country_list as $key => $value1) {
                $country = $this->getResById("SELECT * FROM country",$value1['country_id']);
                $carray=array('country_name'=>$country['name']);
                array_push($country_data, $carray);
            }

            $city_list=$this->getAll("SELECT * FROM advert_city WHERE ad_id='".$add_id."'");
            $city_data=array();
            foreach ($city_list as $key => $value2) {
                $city = $this->getResById("SELECT * FROM city",$value2['city_id']);
                $carray=array('city_name'=>$city['name']);
                array_push($city_data, $carray);
            }


            $category_list=$this->getAll("SELECT * FROM advert_category WHERE ad_id='".$add_id."'");
            $category_data=array();
            foreach ($category_list as $key => $value3) {
                $cat = $this->getResById("SELECT * FROM category",$value3['category_id']);
                $carray=array('category_name'=>$cat['name']);
                array_push($category_data, $carray);
            }

            $subcategory_list=$this->getAll("SELECT * FROM advert_sub_category WHERE ad_id='".$add_id."'");

            $subcategory_data=array();
            foreach ($subcategory_list as $key => $value4) {
                $subcat = $this->getResById("SELECT * FROM sub_category",$value4['sub_category_id']);
                $carray=array('subcategory_name'=>$subcat['name']);
                array_push($subcategory_data, $carray);
            }


            $data=array('ad_url'=>$ad_url,'add_description'=>$add_description,'ad_duration'=>$ad_duration,'business_id'=>$this->gString($business_id),'add_title'=>$add_title,'caption'=>$caption,'min_age'=>$min_age,'max_age'=>$max_age,'gender'=>$viewer,'call_to_action'=>$call_to_action,'ad_id'=>$add_id,'business_logo'=>$business_logo,'business_banner'=>$business_banner,'business_name'=>$business_name,'business_email'=>$business_email,'adtypeName'=>$adtypeName,'adtypeImage'=>$adtypeImage,'country_list'=>$country_data,'city_list'=>$city_data,'category_list'=>$category_data,'subcategory_list'=>$subcategory_data);

            array_push($response_data, $data);
        }

        return $response_data;
    }

    function getCountryNameOfId($id){
        global $dbase;
        $countries=array();
        $sql = "SELECT * FROM country WHERE id='".$this->gStringId($id)."' ORDER BY name ASC";
        $res = $dbase->query($sql);
        $country="";
        foreach ($res as $value) {
            $country=$value['name'];
        }

        return $country;
    }

    function getAllCountries(){
        global $dbase;
        $countries=array();
        $sql = "SELECT * FROM country ORDER BY name ASC";
        $res = $dbase->query($sql);
        $number=0;
        foreach ($res as $value) {
            $country=array('name'=>$value['name'],'code'=>$value['code'],'id'=>$this->gString($value['id']));
            array_push($countries, $country);
        }

        return $countries;
    }

    function getCurrentUsersCountryInfo(){
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $city = $geo["geoplugin_city"];

        $country_code = $geo["geoplugin_countryCode"];
        $country = $geo["geoplugin_countryName"];

        $country_code="UG"; //Dummy , can't work from offline
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

    function check_internet_connection($sCheckHost = 'www.google.com') 
      {
          $res=(bool) @fsockopen($sCheckHost, 80, $iErrno, $sErrStr, 5);

          $out="false";
          if ($res==1) {
            $out="true";
          }

          return $out;
      }

    function exchangeRate($amount, $from, $to){

        $data = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
        preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
        $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
        // return number_format(round($converted, 3),2);

        return floatval($converted);            

    }

    function getCountryLocalTime($country_code){

        $timezones=DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY,$country_code);
        date_default_timezone_set(''.$timezones[0].'');
        
        $time_zon=$timezones[0];
        $local_time= date('Y-m-d h:i:s');

        // $nm=split("-", $local_time);

        // $month=$nm[0];
        // $day=$nm[1];
        // var_dump($day);
        // $yearTimedata=split(" ",$nm[2]);
        // $year=$yearTimedata[0];
        // $time=$yearTimedata[1];
       
        // $date=$year."/".$month."/".$day." ".$time;


        $zone=array('localtime' =>$local_time,'time_zone' =>$time_zon);

        return $zone;
    }

    function Country_currencies(){
        $currencies=array (
              'ALL' => 'Albania Lek',
              'AFN' => 'Afghanistan Afghani',
              'ARS' => 'Argentina Peso',
              'AWG' => 'Aruba Guilder',
              'AUD' => 'Australia Dollar',
              'AZN' => 'Azerbaijan New Manat',
              'BSD' => 'Bahamas Dollar',
              'BBD' => 'Barbados Dollar',
              'BDT' => 'Bangladeshi taka',
              'BYR' => 'Belarus Ruble',
              'BZD' => 'Belize Dollar',
              'BMD' => 'Bermuda Dollar',
              'BOB' => 'Bolivia Boliviano',
              'BAM' => 'Bosnia and Herzegovina Convertible Marka',
              'BWP' => 'Botswana Pula',
              'BGN' => 'Bulgaria Lev',
              'BRL' => 'Brazil Real',
              'BND' => 'Brunei Darussalam Dollar',
              'KHR' => 'Cambodia Riel',
              'CAD' => 'Canada Dollar',
              'KYD' => 'Cayman Islands Dollar',
              'CLP' => 'Chile Peso',
              'CNY' => 'China Yuan Renminbi',
              'COP' => 'Colombia Peso',
              'CRC' => 'Costa Rica Colon',
              'HRK' => 'Croatia Kuna',
              'CUP' => 'Cuba Peso',
              'CZK' => 'Czech Republic Koruna',
              'DKK' => 'Denmark Krone',
              'DOP' => 'Dominican Republic Peso',
              'XCD' => 'East Caribbean Dollar',
              'EGP' => 'Egypt Pound',
              'SVC' => 'El Salvador Colon',
              'EUR' => 'Euro Member Countries',
              'FKP' => 'Falkland Islands (Malvinas) Pound',
              'FJD' => 'Fiji Dollar',
              'GHC' => 'Ghana Cedis',
              'GIP' => 'Gibraltar Pound',
              'GTQ' => 'Guatemala Quetzal',
              'GGP' => 'Guernsey Pound',
              'GYD' => 'Guyana Dollar',
              'HNL' => 'Honduras Lempira',
              'HKD' => 'Hong Kong Dollar',
              'HUF' => 'Hungary Forint',
              'ISK' => 'Iceland Krona',
              'INR' => 'India Rupee',
              'IDR' => 'Indonesia Rupiah',
              'IRR' => 'Iran Rial',
              'IMP' => 'Isle of Man Pound',
              'ILS' => 'Israel Shekel',
              'JMD' => 'Jamaica Dollar',
              'JPY' => 'Japan Yen',
              'JEP' => 'Jersey Pound',
              'KZT' => 'Kazakhstan Tenge',
              'KPW' => 'Korea (North) Won',
              'KRW' => 'Korea (South) Won',
              'KGS' => 'Kyrgyzstan Som',
              'LAK' => 'Laos Kip',
              'LBP' => 'Lebanon Pound',
              'LRD' => 'Liberia Dollar',
              'MKD' => 'Macedonia Denar',
              'MYR' => 'Malaysia Ringgit',
              'MUR' => 'Mauritius Rupee',
              'MXN' => 'Mexico Peso',
              'MNT' => 'Mongolia Tughrik',
              'MZN' => 'Mozambique Metical',
              'NAD' => 'Namibia Dollar',
              'NPR' => 'Nepal Rupee',
              'ANG' => 'Netherlands Antilles Guilder',
              'NZD' => 'New Zealand Dollar',
              'NIO' => 'Nicaragua Cordoba',
              'NGN' => 'Nigeria Naira',
              'NOK' => 'Norway Krone',
              'OMR' => 'Oman Rial',
              'PKR' => 'Pakistan Rupee',
              'PAB' => 'Panama Balboa',
              'PYG' => 'Paraguay Guarani',
              'PEN' => 'Peru Nuevo Sol',
              'PHP' => 'Philippines Peso',
              'PLN' => 'Poland Zloty',
              'QAR' => 'Qatar Riyal',
              'RON' => 'Romania New Leu',
              'RUB' => 'Russia Ruble',
              'SHP' => 'Saint Helena Pound',
              'SAR' => 'Saudi Arabia Riyal',
              'RSD' => 'Serbia Dinar',
              'SCR' => 'Seychelles Rupee',
              'SGD' => 'Singapore Dollar',
              'SBD' => 'Solomon Islands Dollar',
              'SOS' => 'Somalia Shilling',
              'ZAR' => 'South Africa Rand',
              'LKR' => 'Sri Lanka Rupee',
              'SEK' => 'Sweden Krona',
              'CHF' => 'Switzerland Franc',
              'SRD' => 'Suriname Dollar',
              'SYP' => 'Syria Pound',
              'TWD' => 'Taiwan New Dollar',
              'THB' => 'Thailand Baht',
              'TTD' => 'Trinidad and Tobago Dollar',
              'TRY' => 'Turkey Lira',
              'TRL' => 'Turkey Lira',
              'TVD' => 'Tuvalu Dollar',
              'UAH' => 'Ukraine Hryvna',
              'GBP' => 'United Kingdom Pound',
              'UGX' => 'Uganda Shilling',
              'USD' => 'United States Dollar',
              'UYU' => 'Uruguay Peso',
              'UZS' => 'Uzbekistan Som',
              'VEF' => 'Venezuela Bolivar',
              'VND' => 'Viet Nam Dong',
              'YER' => 'Yemen Rial',
              'ZWD' => 'Zimbabwe Dollar'
          );
        return $currencies;
    }

    
    function getrecord_count($key,$table,$field,$value){
        global $dbase;
        $all="all";
        if($key==$all){
            $sql2 = "SELECT count(*) FROM ".$table."";
        }
        else{
            $sql2 = "SELECT count(*) FROM ".$table." WHERE ".$field." = '".$value."'";
        }
        $result = $dbase->prepare($sql2); 
        $result->execute(); 
        $sub_category_no = $result->fetchColumn(); 
        return $sub_category_no;
    }

    function SearchClaimedBusinesses($search_key){
        global $dbase;
        $sql2 = "SELECT * FROM business WHERE name LIKE '%".$_POST["name"]."%' ORDER BY skill ASC";
    }

    //Getting pending ads
    function get_user_pending_ads_number($key,$id,$bydate,$day_key){
        global $dbase;

        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level
        $manager="Manager"; //if getting all pending ads for a manager
        $Supervisor="Supervisor"; //if getting all pending ads for a supervisor
        $Operator="Operator"; //if getting all pending ads for a supervisor

        $by_date="yes"; //if getting user pending ads by date
        $pending="Pending";
        $today="today";

        if(strcmp($key, $Supervisor)==0){
            $user_type=$Supervisor;
            $current_user_id=$this->gStringId($id);
        }elseif(strcmp($key, $Operator)==0){
            $user_type=$Operator;
            $current_user_id=$id;
        }

        $data=array();
        //Getting tables containing ads info for the current user
        include("admin_tables.php");
        
        if($user_type==$manager){ //if current user is a manager

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
           
            if($bydate==$by_date){ //selecting records by date
                
                if($day_key==$today){ //Getting todays records                  

                    $sql="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP(CURDATE()) AND status='".$pending."' AND branch_id='".$branch_id."'";
                }else{//NYD NOMIS

                }

            }else{ //If query is not date specific
                $sql = "SELECT count(*) FROM adds WHERE status='".$pending."' AND branch_id='".$branch_id."'";
            }
            
        }// End of manager
        else if($user_type==$Supervisor || $user_type==$Operator){// If current user is either supervisor or operator

            if($bydate==$by_date){//If query is date specific

                if($day_key==$today){//If selecting today's records                 

                    $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP(CURDATE()) AND ".$table.".status='".$pending."' AND ".$table.".admin_id='".$current_user_id."' AND ".$table.".ad_id=adds.id AND ".$table.".status=adds.status";
                }else{//NYD NOMIS

                }

            }else{ //if query is not date specific

                $sql = "SELECT count(*) FROM ".$table." WHERE status='".$pending."' AND admin_id='".$current_user_id."'";
            }
        }
        
        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;

    } //End of pending ads function

    function getUnassigned_ads_ForSupervisorBranch($supervisor_id){
        global $dbase;
        // $supervisor_id=$this->gStringId($supervisor_id);
        $branch=$this->getBranchOfAdmin($this->gStringId($supervisor_id));
        $branch_id="";
        foreach ($branch as $key => $value) {
            $branch_id=$value['branch_id'];
        }
        
        $sq="SELECT count(*) FROM adds WHERE assigned='no' AND status='Pending' AND branch_id='".$branch_id."'";
        $ex=$dbase->query($sq);
        $count=$ex->fetchColumn();

        return $count;
    }

    function randomCode($length = 7) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    function Approve_Claimed_business($business_id,$user_id,$code){
        global $dbase;
        $time_now=time();
        
        $business_id=$this->gStringId($business_id);
        $user_id=$this->gStringId($user_id);

        $upquery="UPDATE user_business_claim set status='approved',date_approved='".$time_now."',code='".$code."' WHERE business_id='".$business_id."' AND user_id='".$user_id."'";
        $query = $dbase->prepare($upquery);
        $query->execute();


        $upquery2="UPDATE business set owner_id='".$user_id."' WHERE id='".$business_id."'";
        $queryr = $dbase->prepare($upquery2);
        $queryr->execute();
        
        return "approved";
    }

    function getApprove_Claimed_business_code($business_id,$user_id){
        global $dbase;
        $time_now=time();
        $response=array();
        
        $business_id=$this->gStringId($business_id);
        $user_id=$this->gStringId($user_id);

        $sql = "SELECT * FROM user_business_claim WHERE business_id='".$business_id."' AND user_id='".$user_id."' ";

        $res = $dbase->query($sql);
        foreach ($res as $row ) {
            
            // $currency=$row['currency'];
            $code=$row['code'];

            $data=array('code'=>$code);
            array_push($response, $data);
        }

        return $response;
    }

    function DeactivateClaimed_business($business_id,$user_id){
        global $dbase;
        $time_now=time();
        $response=array();
        
        $business_id=$this->gStringId($business_id);
        $user_id=$this->gStringId($user_id);

        $sql = "SELECT * FROM user_business_claim WHERE business_id='".$business_id."' AND user_id='".$user_id."' ";

        $sql =$dbase->exec( "UPDATE user_business_claim set status='Deactivated' WHERE business_id='".$business_id."' AND user_id='".$user_id."'");

        if($sql){
            return "true";
        }else{
            return "false";
        }
        
    }

    function EditSupervisorGoal($supervisor_id,$goal){
        global $dbase;
        $message="";
        $supervisor_unassign=0;     
        $date5=date("Y-m-d");

        // Getting supervisor's set goal for today, and worked on ads for the day
       
        $day_goal=0;
        $ads_worked_on=0;
        $ads_left=0;
        $test=$this->get_daily_worked_on_and_left_ads("specific",$date5,$supervisor_id);
        foreach ($test as $key => $value) {
             $ads_worked_on=$value['worked_on_ads'];
            $ads_left=$value['left_ads'];           
        }

        $day_goal=$ads_worked_on+ $ads_left; //Supervisor goal for the current day

        $unassigned_ads=intval($this->getUnassigned_ads_ForSupervisorBranch($supervisor_id));

        // Testing variables Dummy
        // $goal=7;
        // $day_goal=10;
        // $ads_worked_on=5;
        // End of testing variables

        if($goal < $ads_worked_on || $goal > ($day_goal+$unassigned_ads)){
        // if($goal < $ads_worked_on || $goal > 6){
            $message="Goal less than ads worked on or greater than the available number of unassigned ads";
        }else if($goal > $ads_worked_on && $goal < $day_goal) {
            $deduct_amount=$day_goal-$goal;
            
            // Getting number of unassigned and pending ads for the supervisor
            $supcount="SELECT count(*) FROM  supervisor_ads_assigned WHERE admin_id='".$this->gStringId($supervisor_id)."' AND status='Pending' AND assigned='no'";
            $sct=$dbase->query($supcount);
            $supervisor_unassign=$sct->fetchColumn();
            // $supervisor_unassign=2; //Dummy

            if ($supervisor_unassign >= $deduct_amount) {
                $supers="SELECT *FROM  supervisor_ads_assigned WHERE admin_id='".$this->gStringId($supervisor_id)."' AND status='Pending' AND assigned='no' LIMIT $deduct_amount";
                $sctct=$dbase->query($supers);
                foreach ($sctct as $key => $value2) {
                    
                    $delquery1="DELETE  FROM supervisor_ads_assigned WHERE ad_id='".$value2['ad_id']."'";
                    $query = $dbase->prepare($delquery1);
                    $query->execute();

                    $delquery3="UPDATE adds set assigned='no' WHERE id='".$value2['ad_id']."'";
                    $query3 = $dbase->prepare($delquery3);
                    $query3->execute();

                    $message="correct operation performed";
                }
            }else if ($supervisor_unassign < $deduct_amount) {
                
                $assign_factor=$deduct_amount-$supervisor_unassign;

                $supers3="SELECT *FROM  supervisor_ads_assigned WHERE admin_id='".$this->gStringId($supervisor_id)."' AND status='Pending' AND assigned='no' LIMIT $supervisor_unassign";
                $sctct3=$dbase->query($supers3);

                foreach ($sctct3 as $key => $value3) {
                    $delquery1="DELETE  FROM supervisor_ads_assigned WHERE ad_id='".$value3['ad_id']."'";
                    $query = $dbase->prepare($delquery1);
                    $query->execute();

                    $delquery3="UPDATE adds set assigned='no' WHERE id='".$value3['ad_id']."'";
                    $query3 = $dbase->prepare($delquery3);
                    $query3->execute();

                    $message="correct operation2 performed";            
                }

                // $operator_id="";
                $operators=array();
                $operator_number=0;

                $supervisor_operators=$this->getSupervisorOperatorsIds($supervisor_id);
                
                foreach ($supervisor_operators as $key => $value) {
                    // $operator_id=$value['operator_id'];
                    $pending="Pending";
                    $oppends="SELECT * FROM operator_ads_assigned WHERE admin_id='".$value['operator_id']."'";
                    $sqop=$dbase->query($oppends);

                    $status="";
                    foreach ($sqop as $key => $value1) {
                        $status=$value1['status'];

                        if(strcmp($status, $pending)==0){
                            $operator_number  +=1;
                            $operator=array('operator_id'=>$value['operator_id']);
                            array_push($operators, $operator);
                        }
                    }                   
                    
                }

                // $operator_number=sizeof($operators);
                // var_dump($operator_number);
                $equal_share_factor=0;
                $reminder=0;

                if($operator_number <=0){
                    $message="Maximum Editing reachead";
                }elseif ($operator_number >=1) {

                    $equal_share_factor=($assign_factor/$operator_number);
                    $reminder=$assign_factor%$operator_number;                  
                }

                $incrementer=0;
                foreach ($operators as $key => $value3) {
                    $incrementer +=1;
                    if($incrementer >=1 && $incrementer <=$reminder){
                        $share_factor =$equal_share_factor+1;
                    }else{
                        $share_factor=$equal_share_factor;
                    }
                    $pp="Pending";
                    $opps="SELECT * FROM operator_ads_assigned WHERE admin_id='".$value3['operator_id']."' AND status='".$pp."' lIMIT $share_factor";
                    $sqopps=$dbase->query($opps);
                    foreach ($sqopps as $key => $value6) {

                        $delquery11="DELETE  FROM operator_ads_assigned WHERE ad_id='".$value6['ad_id']."'";
                        $query11 = $dbase->prepare($delquery11);
                        $query11->execute();

                        $delquery12="DELETE  FROM supervisor_ads_assigned WHERE ad_id='".$value6['ad_id']."'";
                        $query12 = $dbase->prepare($delquery12);
                        $query12->execute();

                        $delquery33="UPDATE adds set assigned='no' WHERE id='".$value6['ad_id']."'";
                        $query33 = $dbase->prepare($delquery33);
                        $query33->execute();

                        $message="correct operation 44 performed";
                    }

                    if ($reminder >=1) {//NYD
                        # code...
                    }
                }

                // var_dump($reminder);
                
            }
        }else{
            $message="Nomis";
        }

           
        return $message;
    }

    function DisplayAds($status){
        global $dbase;

        $user_type=$_SESSION['admin_type'];
        $manager="Manager"; //if getting all pending ads for a manager
        $Supervisor="Supervisor"; //if getting all pending ads for a supervisor
        $Operator="Operator"; //if getting all pending ads for a supervisor
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id

        $ads_info=array();

        include("admin_tables.php");
        if($user_type==$manager){

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
            

            $sql="SELECT id as ad_id FROM adds WHERE status ='".$status."' AND branch_id='".$branch_id."'";

        }elseif($user_type==$Supervisor || $user_type==$Operator){

            $sql="SELECT ad_id as ad_id FROM ".$table.",adds WHERE ".$table.".status ='".$status."' AND ".$table.".admin_id='".$current_user_id."' AND adds.status= ".$table.".status AND adds.id=".$table.".ad_id";

        }

        $qry=$dbase->query($sql);
        
        foreach ($qry as $key => $value2) {
            $ad_id=$value2['ad_id'];

            $addetails=$this->getDetailsOfAd($this->gString($ad_id));

            array_push($ads_info, $addetails);
        }
        return $ads_info;
    }

    function getDetailsOfAd($ad_id){
        global $dbase;
        $ad_id=$this->gStringId($ad_id);
        $ad_details=array();
        $sq=$this->getResById("SELECT *FROM adds",$ad_id);
        return $sq;
    }


    // Getting new ads for a specific user
    function get_user_new_ads(){
        global $dbase;
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level
        $manager="Manager"; //if getting all pending ads for a manager
        $Supervisor="Supervisor"; //if getting all pending ads for a supervisor
        $Operator="Operator"; //if getting all pending ads for a supervisor

        $by_date="yes"; //if getting user pending ads by date
        $pending="Pending";
        $today="today";

        $data=array();
        //Getting tables containing ads info for the current user
        include("admin_tables.php");
        
        if($user_type==$manager){ //if current user is a manager

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
            

            $sql="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP(CURDATE()) AND branch_id='".$branch_id."'";
            
        }// End of manager
        else if($user_type==$Supervisor || $user_type==$Operator){// If current user is either supervisor or operator

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP(CURDATE()) AND ".$table.".admin_id='".$current_user_id."' AND ".$table.".ad_id=adds.id AND ".$table.".status=adds.status";
        }
        
        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;

    } //End of new ads function

    //Getting pending ads of prevoius months
    function get_previous_months_pending_ads(){

        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";
        $pending="Pending";

        include("admin_tables.php");

        if($user_type==$manager){

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
           
            $sql ="SELECT count(*) FROM adds WHERE reg_date < UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL DAYOFMONTH(CURDATE())-1 DAY)) AND branch_id='".$branch_id."' AND status='".$pending."'";

        } else if($user_type==$Supervisor || $user_type==$Operator){

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned < UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL DAYOFMONTH(CURDATE())-1 DAY)) AND ".$table.".admin_id='".$current_user_id."' AND ".$table.".ad_id= adds.id AND ".$table.".status= adds.status AND adds.status='".$pending."'";
        }

        

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;
    }

    //Getting admin monthly goal
    function get_user_monthly_goal(){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";

        include("admin_tables.php");

        if($user_type==$manager){

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
            
            $sql ="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL DAYOFMONTH(CURDATE())-1 DAY)) AND branch_id='".$branch_id."'";

        } else if($user_type==$Supervisor || $user_type==$Operator){

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL DAYOFMONTH(CURDATE())-1 DAY))  AND ".$table.".admin_id='".$current_user_id."' AND ".$table.".ad_id= adds.id AND ".$table.".status= adds.status";
        }

        $prevpend=$this->get_previous_months_pending_ads();
        $prev_number=0;
          foreach ($prevpend as $key => $valuep) {
            $prev_number=$valuep['result'];
          }

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no+$prev_number );
        array_push($data, $total);

        return $data;

    }


    function get_daily_worked_on_and_left_ads($key2,$date5,$user_id){
        $response_data=array();

        //Getting total of ads worked on a specified day
        // $user_id="10727296116111526";
        $uid=$this->gStringId($user_id);
        $no=0;
        $counts=$this->Weekly_total_ads($key2,$date5,$user_id);


        foreach ($counts as $key => $value) {
            $no=$value['result'];
        }

        //Getting total of ads declined on a specified day
        $total_declined=0;
        $week_worked=$this->Weekly_ads_declined($key2,$date5,$user_id);


        foreach ($week_worked as $key => $value) {
            $total_declined=$value['result'];
        }

        //Getting total of ads approved on a specified day
        $total_approved=0;
        $week_approved=$this->Weekly_ads_approved($key2,$date5,$user_id);
        
        foreach ($week_approved as $key => $value) {
            $total_approved=$value['result'];
        }

        //calculaating total of ads worked on and left on a specified day
        $ads_worked_on=$total_declined+$total_approved;
        
        $ads_left=$no-$ads_worked_on;
        $goal="";

        if($no >0){
            if($ads_left <1){           
                $goal="Achieved";
            }else if($ads_left <1){
                $goal="Not Achieved";
            }
        }else{
            $goal="Not Achieved";
        }

        $extra_ads=0;
        if($ads_left <0){
            $extra_ads=$ads_worked_on-$no;
            $ads_left=0;
        }

        $adds= array('worked_on_ads' =>$ads_worked_on ,'left_ads' =>$ads_left,'goal'=>$goal,'extra_ads'=>$extra_ads,'user_id'=>$uid );
        array_push($response_data, $adds);

        return $response_data;

    }

    function getSupervisorTeamNumber($supervisor_id){
        global $dbase;
        $data=array();
        
        $sel="SELECT count(*) FROM supervisor_team WHERE supervisor_id='".$supervisor_id."'";

        // $result = $dbase->prepare($sel); 
        // $result->execute(); 
        // $no = $result->fetchColumn();

        // $total= array('result' =>$no );
        // array_push($data, $total);

        $qry=$dbase->query($sel);

        $data=$qry->fetchColumn();

        return $data;
    }

    function getBranchSupervisors($branch_id,$department){
        global $dbase;
        $data=array();
        $branch=array();

        $sql ="SELECT * FROM admin WHERE branch_id='".$branch_id."' AND department_id='".$department."' AND account_type_id =3";

        $res = $dbase->query($sql);
        foreach ($res as $key => $value) {

            $team=$this->getSupervisorTeamNumber($value['id']);
            $bran= array(
                'admin_id' =>$value['id'],
                'first_name' =>$value['first_name'],
                'last_name' =>$value['last_name'],
                'company_id' =>$value['company_id'],
                'work_email' =>$value['work_email'],
                'team_no' =>$team
                );
            array_push($branch,$bran);
        }
        return $branch;
    }

    function get_Supervisor_of_Operator($operator_id){
        global $dbase;
        $data=array();
        $branch=array();

        $sql ="SELECT * FROM  supervisor_team WHERE operator_id='".$operator_id."'";

        $res = $dbase->query($sql);
        foreach ($res as $key => $value) {
            $bran= array(
                'supervisor_id' =>$value['supervisor_id']               
                );
            array_push($branch,$bran);
        }
        return $branch;
    }

    function getManagerSupervisors(){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level

        $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
       
        $department_id=0;
        $department=$this->getDepartmentOfAdmin($current_user_id);//Get current users department
        foreach ($department as $key => $value) {
            $department_id=$value['department_id'];
        }

        $tm=$this->getBranchSupervisors($branch_id,$department_id);
        
        foreach ($tm as $key => $value) {

            $gid=$this->gString($value['admin_id']);

            $supervisor_id=$gid;
            $supervisor_name=$value['first_name']." ".$value['last_name'];
            $supervisor_team_no=$value['team_no'];
            $supervisor_email=$value['work_email'];
            $supervisor_company_id=$value['company_id'];

            $supervisor= array(
                'id' =>$supervisor_id ,
                'name' =>$supervisor_name , 
                'team_no' =>$supervisor_team_no , 
                'work_email' => $supervisor_email, 
                'company_id' =>$supervisor_company_id  
            );

            array_push($data, $supervisor);
        }

        return $data;
    }

    function get_daily_total_ads_all_supervisors($date){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $department_id=0;

        $date_stamp=$stam=strtotime($date);
        $next_date=date("d-m-Y", $date_stamp+86400);
        $next_day_stamp=strtotime($next_date);
        
        $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
        
        $department=$this->getDepartmentOfAdmin($current_user_id);//Get current users department
        foreach ($department as $key => $value) {
            $department_id=$value['department_id'];
        }

        $branch_super=$this->getBranchSupervisors($branch_id,$department_id);
        foreach ($branch_super as $key => $value) {
            $id=$value['admin_id'];
            $first_name=$value['first_name'];
            $last_name=$value['last_name'];

            $sql2 ="SELECT count(*) FROM supervisor_ads_assigned,adds WHERE supervisor_ads_assigned.date_assigned >= UNIX_TIMESTAMP('".$date."') AND reg_date < $next_day_stamp AND admin_id='".$id."' AND adds.id=supervisor_ads_assigned.ad_id AND adds.status=supervisor_ads_assigned.status";
            
            $result = $dbase->prepare($sql2); 
            $result->execute(); 
            $no = $result->fetchColumn();

            $total= array(
                'total_ads' =>$no,
                'first_name' =>$first_name,
                'id' =>$id,
                'last_name' =>$last_name
                 );
            array_push($data, $total);
        }

        return $data;

    }



    function Weekly_total_ads($key,$date,$user_id){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level

        if(strcmp($key, "specific")==0){
            $current_user_id=$this->gStringId($user_id);
            $user_type=$this->getUserTypeOfId($user_id);
        }else{
            $current_user_id=$current_user_id;
        }
        
        

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";

        // Getting next day after the posted date. It helps us in selecting dates 
        $date_stamp=$stam=strtotime($date);
        $next_date=date("d-m-Y", $date_stamp+86400);
        $next_day_stamp=strtotime($next_date);//Next day timestamp
        
        include("admin_tables.php");
        if($user_type==$manager){

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
            

            $sql ="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP('".$date."') AND reg_date < $next_day_stamp AND branch_id='".$branch_id."'";

        }else if($user_type==$Supervisor || $user_type==$Operator){

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >=UNIX_TIMESTAMP('".$date."') AND ".$table.".date_assigned < $next_day_stamp AND ".$table.".ad_id=adds.id AND ".$table.".admin_id='".$current_user_id."'";
            
        }

        
        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;
    }

    function getAdminTotalAdsInMonth($month,$admin_id,$year){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($admin_id);//Current user id
        $user_type=$this->getUserTypeOfId($admin_id);

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";

        $date1=$year."-".$month."-01";
        
        $datex = date('Y-m-d', strtotime('+1 month', strtotime($date1)));
        $date2=date("Y-m",strtotime($datex))."-01";

        $date2_stamp=strtotime($date2);

        include("admin_tables.php");
        if($user_type==$manager){

            $branch=$this->getBranchOfAdmin($current_user_id);//Get current users branch
            $branch_id="";

            foreach ($branch as $key => $value) {
                $branch_id=$value['branch_id'];
            }

            $sql ="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP('".$date1."') AND reg_date <  '".$date2_stamp."' AND branch_id='".$branch_id."'";

        }else if($user_type==$Supervisor || $user_type==$Operator){

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP('".$date1."') AND ".$table.".date_assigned < UNIX_TIMESTAMP('".$date2."') AND ".$table.".ad_id=adds.id AND admin_id='".$current_user_id."'";
            
        }

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;
    }

    function get_daily_supervisor_performnce($date){
        global $dbase;
        $data=array();

        $perf=$this->get_daily_total_ads_all_supervisors($date);
        foreach ($perf as $key => $value) {

            $total_ads=$value['total_ads'];
            $first_name=$value['first_name'];
            $last_name=$value['last_name'];
            $id=$value['id'];

            $total_declined=0;
            $total_approved=0;
            $declined=$this->get_daily_suprvisor_declined_ads($date,$id);
            foreach ($declined as $key => $value) {
                $total_declined=$value['result'];
            }

            $approve=$this->get_daily_suprvisor_approved_ads($date,$id);
            foreach ($approve as $key => $value) {
                $total_approved=$value['result'];
            }

            $total_worked_on=$total_approved+$total_declined;

            if($total_ads <=0){
                $performance=0;
            }else{
                $performance=($total_worked_on/$total_ads)*100;
             }
            // $performance=70;
            $perform= array(
                'performance' =>$performance ,
                'first_name' =>$first_name ,
                'last_name' =>$last_name ,
                'id' =>$id
            );
            array_push($data, $perform);
        }
        
        return $data;
    }

    //Getting supervisor team members

    function getSupervisorTeamMembers($supervisor_id){
        $operators=array();

        $supervisors=$this->getSupervisorOperatorsIds($supervisor_id);
        foreach ($supervisors as $key => $value) {
            $operator_details=$this->getAdminOfId($this->gString($value['operator_id']));

            $Operator_full_name="";
            $last_name="";
            $first_name="";
            $company_id="";
            $work_email="";
            $id=$value['operator_id'];
            $team_no=""; // This has no use in this case but helps in display coz this data is being displayed from the same section with supervisor's info for manager's view
            foreach ($operator_details as $key => $value2) {
                $Operator_full_name=$value2['full_name'];
                $first_name=$value2['first_name'];
                $last_name=$value2['last_name'];
                $company_id=$value2['company_id'];              
                $work_email=$value2['work_email'];
                
            }

            $data=array(
                'name' =>$Operator_full_name,
                'company_id'=>$company_id,
                'work_email'=>$work_email,
                'id'=>$this->gString($id),
                'team_no'=>$team_no
            );
            array_push($operators, $data);
        }

        return $operators;
    }

    // Getting performances for operators of a certain supervisor on some date.
    function get_daily_Supervisors_operators_performnce($date, $supervisor_id){
        global $dbase;
        $data=array();

        // $supervisor_id=$this->gStringId($supervisor_id);

        $supervisors=$this->getSupervisorOperatorsIds($supervisor_id);
        foreach ($supervisors as $key => $value) {
            $operator_details=$this->getAdminOfId($this->gString($value['operator_id']));

            $Operator_full_name="";
            $last_name="";
            $first_name="";
            foreach ($operator_details as $key => $value2) {
                $Operator_full_name=$value2['full_name'];
                $first_name=$value2['first_name'];
                $last_name=$value2['last_name'];
                
            }

            $daily_ads=$this->getDailyOperatorsTotalAds($this->gString($value['operator_id']),$date);
            $daily_ads_declined=$this->get_daily_Operator_declined_ads($date,$this->gString($value['operator_id']));
            $daily_ads_approved=$this->get_daily_Operator_approved_ads($date,$this->gString($value['operator_id']));

            $total_worked_on=$daily_ads_declined+$daily_ads_approved;

            $performance=0;
            if($daily_ads <=0){
                $performance=$performance;
            }else{
                
                $performance=($total_worked_on/$daily_ads)*100;
            
            }

            $perform= array(
                'performance' =>$performance ,
                'first_name' =>$first_name ,
                'last_name' =>$last_name ,
                'id' =>$this->gString($value['operator_id'])
            );
            array_push($data, $perform);


        }

        return $data;

    }

    function getSupervisorOperatorsIds($supervisor_id){
        global $dbase;
        $operators=array();

        $supervisor_id=$this->gStringId($supervisor_id);

        $sql="SELECT *FROM supervisor_team,admin WHERE supervisor_team.supervisor_id ='".$supervisor_id."' AND supervisor_team.supervisor_id=admin.id";

        $qry=$dbase->query($sql);

        foreach ($qry as $key => $value) {
            $operator= array('operator_id' =>$value['operator_id']);

            array_push($operators, $operator);
        }

        return $operators;

    }

    function getDailyOperatorsTotalAds($operator_id,$date){
        global $dbase;
        
        $operator_id=$this->gStringId($operator_id);

        $date_stamp=$stam=strtotime($date);
        $next_date=date("d-m-Y", $date_stamp+86400);
        $stmp=strtotime($next_date);

        $sql2 ="SELECT count(*) FROM operator_ads_assigned,adds,supervisor_ads_assigned WHERE operator_ads_assigned.date_assigned >= UNIX_TIMESTAMP('".$date."') AND operator_ads_assigned.date_assigned < $stmp  AND operator_ads_assigned.admin_id='".$operator_id."' AND adds.id=supervisor_ads_assigned.ad_id AND adds.status=supervisor_ads_assigned.status AND adds.id=operator_ads_assigned.ad_id AND adds.status=operator_ads_assigned.status";
            
            $result = $dbase->prepare($sql2); 
            $result->execute(); 
            $no = $result->fetchColumn();
            
            return $no;
    }

    //Getting declined ads for a operator
    function get_daily_Operator_declined_ads($date,$operator_id){
        global $dbase;
        
        $Declined="Declined";
        $operator_id=$this->gStringId($operator_id);

        $date_stamp=$stam=strtotime($date);
        $next_date=date("d-m-Y", $date_stamp+86400);
        $stmp=strtotime($next_date);

        $sql ="SELECT count(*) FROM operator_ads_assigned,adds,supervisor_ads_assigned WHERE operator_ads_assigned.date_assigned >= UNIX_TIMESTAMP('".$date."') AND operator_ads_assigned.date_assigned < $stmp AND operator_ads_assigned.admin_id='".$operator_id."' AND adds.id=supervisor_ads_assigned.ad_id AND adds.status=supervisor_ads_assigned.status AND adds.id=operator_ads_assigned.ad_id AND adds.status=operator_ads_assigned.status AND operator_ads_assigned.status='".$Declined."'";

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        return $no;
    }

    function getNextDate($date){
        $date_stamp=strtotime("$date");
        $next_date=date("d-m-Y", $date_stamp+86400);

        return $next_date;
    }



    //Getting approved ads for a operator
    function get_daily_Operator_approved_ads($date,$operator_id){
        global $dbase;
        // $date="2016-07-19";
        $approved="Approved";
        $operator_id=$this->gStringId($operator_id);

        $date_stamp=strtotime($date);
        $next_date=date("d-m-Y", $date_stamp+86400);
        $stmp=strtotime($next_date);

        $sql ="SELECT count(*) FROM operator_ads_assigned,adds,supervisor_ads_assigned WHERE  operator_ads_assigned.date_assigned >=UNIX_TIMESTAMP('".$date."') AND operator_ads_assigned.date_assigned < $stmp AND operator_ads_assigned.admin_id='".$operator_id."' AND adds.id=supervisor_ads_assigned.ad_id AND adds.status=supervisor_ads_assigned.status AND adds.id=operator_ads_assigned.ad_id AND adds.status=operator_ads_assigned.status AND operator_ads_assigned.status='".$approved."'";

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        return $no;
    }

    //Getting declined ads for a supervisor
    function get_daily_suprvisor_declined_ads($date,$user_id){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level
        $Declined="Declined";
        $table="supervisor_ads_assigned";

        $date_stamp=$stam=strtotime($date);
        $next_date=date("d-m-Y", $date_stamp+86400);
        $next_day_stamp=strtotime($next_date);

        $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP('".$date."') AND reg_date < $next_day_stamp AND ".$table.".ad_id=adds.id AND ".$table.".status='".$Declined."' AND adds.status='".$Declined."' AND admin_id='".$user_id."'";

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;
    }

    //Getting declined ads for a supervisor
    function get_daily_suprvisor_approved_ads($date,$user_id){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level
        $approved="Approved";
        $table="supervisor_ads_assigned";

        $date_stamp=$stam=strtotime($date);
        $next_date=date("d-m-Y", $date_stamp+86400);
        $next_day_stamp=strtotime($next_date);

        $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP('".$date."') AND reg_date < $next_day_stamp AND ".$table.".ad_id=adds.id AND ".$table.".status='".$approved."' AND adds.status='".$approved."' AND admin_id='".$user_id."'";

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;
    }

    function Weekly_ads_declined($key,$date,$user_id){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level

        if(strcmp($key, "specific")==0){
            $current_user_id=$this->gStringId($user_id);
            $user_type=$this->getUserTypeOfId($user_id);
        }else{
            $current_user_id=$current_user_id;
        }
        

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";
        $Declined="Declined";
        $approved="Approved";


        $date_stamp=$stam=strtotime($date);
        $next_date=date("d-m-Y", $date_stamp+86400);
        $next_day_stamp=strtotime($next_date);

        
        include("admin_tables.php");
        if($user_type==$manager){

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
           
            $sql ="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP('".$date."') AND reg_date < $next_day_stamp AND branch_id='".$branch_id."' AND status='".$Declined."'";
        }else if($user_type==$Supervisor || $user_type==$Operator){

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP('".$date."') AND ".$table.".date_assigned < $next_day_stamp AND ".$table.".ad_id=adds.id AND ".$table.".status='".$Declined."' AND adds.status='".$Declined."' AND ".$table.".admin_id='".$current_user_id."'";
            
        }

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;
    }

    function getUserTypeOfId($uid){
        global $dbase;
        $account_type_id=0;
        $user_type="";
        $id=$this->gStringId($uid);
        $sql ="SELECT * FROM admin WHERE id='".$id."'";
        $sqquery=$dbase->query($sql);
        foreach ($sqquery as $key => $value) {
            $account_type_id=$value['account_type_id'];
        }

        $sql2 ="SELECT * FROM account_type WHERE id='".$account_type_id."'";
        $sqquery2=$dbase->query($sql2);
        foreach ($sqquery2 as $key => $value2) {
            $user_type=$value2['name'];
        }
        //$type=array('user_type' =>$user_type);
        return $user_type;
    }

    function getDepartments(){
        global $dbase;
        $data=array();

        $sql ="SELECT * FROM department WHERE name !='Yammzit'";
        $sqquery=$dbase->query($sql);
        foreach ($sqquery as $key => $value) {
            $id=$value['id'];
            $name=$value['name'];

            $dat=array('id'=>$id,'name'=>$name);

            array_push($data, $dat);
        }

       
        return $data;
    }

     function getAdminPositions(){
        global $dbase;
        $data=array();

        $sql ="SELECT * FROM account_type";
        $sqquery=$dbase->query($sql);
        foreach ($sqquery as $key => $value) {
            $id=$value['id'];
            $name=$value['name'];

            $dat=array('id'=>$id,'name'=>$name);

            array_push($data, $dat);
        }

       
        return $data;
    }

   
    function getBranches(){
        global $dbase;
        $data=array();

        $sql ="SELECT * FROM branch";
        $sqquery=$dbase->query($sql);
        foreach ($sqquery as $key => $value) {
            $id=$value['id'];
            $name=$value['name'];
            $city_id=$value['city_id'];

            $cityq ="SELECT * FROM city WHERE id='".$city_id."'";
            $cityquery=$dbase->query($cityq);
            $city="";
            $country="";

            foreach ($cityquery as $key => $value2) {
                $city=$value2['name'];
                $country=$this->getCountryNameOfId($this->gString($value2['country_id']));

            }


            $branch_name=$city.", ".$country;
            $dat=array('id'=>$id,'name'=>$branch_name);

            array_push($data, $dat);
        }

       
        return $data;
    }

    function getCitiesofCountryId($id){
        global $dbase;
        $data=array();

        $sql ="SELECT * FROM city WHERE country_id='".$this->gStringId($id)."'";
        $sqquery=$dbase->query($sql);
        foreach ($sqquery as $key => $value) {
           
            $dat=array('id'=>$value['id'],'name'=>$value['name']);

            array_push($data, $dat);
        }

       
        return $data;
    }

     function getDepartmentInitial($id){
        global $dbase;
        $initial="";

        $sql ="SELECT * FROM department WHERE id='".$id."'";
        $sqquery=$dbase->query($sql);
        foreach ($sqquery as $key => $value) {
           
            $initial=$value['initial'];

        }

       
        return $initial;
    }

    function createAdmin($avatar,$gender,$username,$fname,$lname,$permanent_address,$permanent_address2,$country,$city,$phone,$privateemail,$workemail,$day,$month,$year,$new_password,$department,$position,$branch_location,$securitylevel,$team,$depInitial){

        global $dbase;

        $dob=$day."-".$month."-".$year;
        $dob=strtotime($dob);

        $status="disabled";

        $stm= $dbase->exec("INSERT INTO admin (avatar,username,password,account_type_id,department_id,branch_id,first_name,last_name,permanent_adress,city_id,phone_number,private_email,work_email,gender,dob,status) VALUES 

            ('".$avatar."','".$username."','".$new_password."','".$position."','".$department."','".$branch_location."','".$fname."','".$lname."','".$permanent_address."','".$city."','".$phone."','".$privateemail."','".$workemail."','".$gender."','".$dob."','".$status."')"); 

        if($stm){
            $id=$dbase->lastInsertId();
            // Company Id insert
            $userCompanyId="UG/".$id."/".$position.$depInitial;
            $IdInsert=$dbase->exec("UPDATE admin set company_id='".$userCompanyId."' WHERE id='".$id."'");
            // Team insert
            if (strcmp($team, "")==0) {}else{
                $IdInsert=$dbase->exec("INSERT INTO supervisor_team (supervisor_id,operator_id) VALUES('".$team."','".$id."')");
            
            }
        }else{
            $userCompanyId="false";
        }

        return $userCompanyId;

    }

    function getClientOfId($uid){
        global $dbase;
        $data=array();
        
        $id=$this->gStringId($uid);
        $sql ="SELECT * FROM user WHERE id='".$id."'";
        $sqquery=$dbase->query($sql);
        foreach ($sqquery as $key => $value) {
            $info=array(
                'first_name'=>$value['first_name'],
                'last_name'=>$value['last_name'],
                'avatar'=>$value['avatar'],
                'email'=>$value['email'],
                'city_id'=>$value['city_id'],
                'date_of_birth'=>$value['date_of_birth'],
                'sex'=>$value['sex'],
                'address'=>$value['address'],
                'about_me'=>$value['about_me']
            );
            array_push($data, $info);
        }

        return $data;
    }

    function getAdminAdsDeclinedInMonth($month,$admin_id,$year){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($admin_id);//Current user id
        $user_type=$this->getUserTypeOfId($admin_id); //Get aadmin user type

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";
        $Declined="Declined";
        $approved="Approved";
        $sql="";

        $date1=$year."-".$month."-01";
        
        $datex = date('Y-m-d', strtotime('+1 month', strtotime($date1)));
        $date2=date("Y-m",strtotime($datex))."-01";

        $date2_stamp=strtotime($date2);
        
        include("admin_tables.php");
        if($user_type==$manager){

            $branch=$this->getBranchOfAdmin($current_user_id);//Get current users branch
            $branch_id="";

            foreach ($branch as $key => $value) {
                $branch_id=$value['branch_id'];
            }

            $sql ="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP('".$date1."') AND reg_date < UNIX_TIMESTAMP('".$date2."') AND branch_id='".$branch_id."' AND status='".$Declined."'";
        }else if($user_type==$Supervisor || $user_type==$Operator){

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP('".$date1."') AND ".$table.".date_assigned < UNIX_TIMESTAMP('".$date2."') AND ".$table.".ad_id=adds.id AND ".$table.".status='".$Declined."' AND adds.status='".$Declined."' AND ".$table.".admin_id='".$current_user_id."'";
            
        }

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;
    }
        

    function Weekly_ads_approved($key,$date,$user_id){
        global $dbase;

        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level
        
        if(strcmp($key, "specific")==0){
            $current_user_id=$this->gStringId($user_id);
            $user_type=$this->getUserTypeOfId($user_id);
        }else{
            $current_user_id=$current_user_id;
        }
        
        $approved="Approved";
        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";


        $date_stamp=$stam=strtotime($date);
        $next_date=date("d-m-Y", $date_stamp+86400);
        $next_day_stamp=strtotime($next_date);

        
        include("admin_tables.php");
        if($user_type==$manager){

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
            
            $sql ="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP('".$date."') AND reg_date < '".$next_day_stamp."' AND branch_id='".$branch_id."' AND status='".$approved."'";
        }else if($user_type==$Supervisor || $user_type==$Operator){

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP('".$date."') AND ".$table.".date_assigned < '".$next_day_stamp."' AND ".$table.".ad_id=adds.id AND ".$table.".status='".$approved."' AND adds.status='".$approved."' AND ".$table.".admin_id='".$current_user_id."'";
            
        }


        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no);
        array_push($data, $total);

        return $data;
    }

    function getAdminAdsApprovedInMonth($month,$admin_id,$year){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($admin_id);//Current user id
        $user_type=$this->getUserTypeOfId($admin_id); //Get aadmin user type

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";
        $Declined="Declined";
        $approved="Approved";

        $date1=$year."-".$month."-01";
        
        $datex = date('Y-m-d', strtotime('+1 month', strtotime($date1)));
        $date2=date("Y-m",strtotime($datex))."-01";

        include("admin_tables.php");
        if($user_type==$manager){

            $branch=$this->getBranchOfAdmin($current_user_id);//Get current users branch
            $branch_id="";

            foreach ($branch as $key => $value) {
                $branch_id=$value['branch_id'];
            }

            $sql ="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP('".$date1."') AND reg_date < UNIX_TIMESTAMP('".$date2."') AND branch_id='".$branch_id."' AND status='".$approved."'";
        }else if($user_type==$Supervisor || $user_type==$Operator){

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP('".$date1."') AND ".$table.".date_assigned < UNIX_TIMESTAMP('".$date2."') AND ".$table.".ad_id=adds.id AND ".$table.".status='".$approved."' AND adds.status='".$approved."' AND admin_id='".$current_user_id."'";
            
        }

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;
    }

    function DeactivateAdmin($id){
        global $dbase;
        $admin_id=$this->gStringId($id);
        $disabled="disabled";
        $sq=$dbase->exec("UPDATE admin set status='".$disabled."' WHERE id='".$admin_id."'");
        
        $message="";
        if($sq){
            $message="disabled";
        }else{
            $message="Notexecuted";
        }

        return $message;
    }

    function ActivateAdmin($id){
        global $dbase;
        $admin_id=$this->gStringId($id);
        $enable="enabled";

        $sq=$dbase->exec("UPDATE admin set status='".$enable."' WHERE id='".$admin_id."'");
        
        $message="";
        if($sq){
            $message="enabled";
        }else{
            $message="Notexecuted";
        }

        return $message;
    }

    function CheckAdminStatus($id){
        global $dbase;
        $sate="";
        $id=$this->gStringId($id);
        $sql="SELECT * FROM admin WHERE id='".$id."'";

        $qry=$dbase->query($sql);
        foreach ($qry as $key => $value) {
            $sate=$value['status'];

        }


        return $sate;
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

    //Function to get date of a certain week day
    
    function getDateInRange($from,$to,$dy){
        $dates =$this->dateRange($from,$to);
        $returned_date=null;
        $dd=$dy;
        // $weekends = array_filter($dates, function ($date) {
        //     $day = $date->format("N");
        //     retunrn $day === '6' || $day === '7';
        // });

        // foreach ($weekends as $date) {
        //     echo $date->format("D Y-m-d") . "\n";
        // }

        $real_days = array_filter($dates, function ($date) use ($dy) {
            
            return $date->format("N") ===''.$dy.'';
        });

        foreach ($real_days as $date) {
            $returned_date=$date->format("Y-m-d");
            // echo $returned_date."\n";
            
        }

        return $returned_date;
    }

    function dateRange($begin, $end, $interval = null)
    {
        $begin = new DateTime($begin);
        $end = new DateTime($end);
        // Because DatePeriod does not include the last date specified.
        $end = $end->modify('+1 day');
        $interval = new DateInterval($interval ? $interval : 'P1D');

        return iterator_to_array(new DatePeriod($begin, $interval, $end));
    }

    //Getting admin monthly approved ads
    function get_user_monthly_number_ofapproved_ads(){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";

        $status="Approved";
        include("admin_tables.php");

        if($user_type==$manager){

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
            
            $sql ="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL DAYOFMONTH(CURDATE())-1 DAY)) AND branch_id='".$branch_id."' AND status='".$status."'";

        } else if($user_type==$Supervisor || $user_type==$Operator){

            // $sql ="SELECT count(*) FROM ".$table." WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) AND admin_id='".$current_user_id."' AND status='".$status."'";

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL DAYOFMONTH(CURDATE())-1 DAY)) AND ".$table.".admin_id='".$current_user_id."' AND ".$table.".status='".$status."' AND adds.id=".$table.".ad_id AND adds.status='".$status."'";
        }

        

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;
    }

    

    // function getClientRelatedServerTimeStamp($timestamp){
        
    //     $user_LocationInfo=$this->getCurrentUsersCountryInfo();
    //     $countr_code=$user_LocationInfo['country_code'];
        
    //     $userTimeInfo=$this->getCountryLocalTime($countr_code);

    //     $currentTimezone=$userTimeInfo['time_zone'];
       
    //     $userTimezone = new DateTimeZone($currentTimezone); //User timezone
    //     $gmtTimezone = new DateTimeZone('GMT');
    //     $server_date=DATE("Y-m-d H:i:s",time());

    //     $myDateTime = new DateTime($server_date, $userTimezone); //Server time
    //     $offset = $gmtTimezone->getOffset($myDateTime);//Getting server offset from user time
    //     $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
    //     $myDateTime->add($myInterval);
    //     $result = $myDateTime->format('Y-m-d H:i:s');

    //     return $result;
    // }

    function ConvertFromClientToServerTime($source,$countryCode){
        
        $offsets=$this->getClientAndServerTimeOffsets($countryCode);

        $dest_timezone=$offsets['server_offset'];
        $source_timezone=$offsets['client_offset'];
        
        $converted=$this->convert_from_another_time($source, $source_timezone, $dest_timezone);

        return $converted;
    }

    function getClientAndServerTimeOffsets($country_code){
        $s = new DateTime(); //Server time
        $server_offset = ($s->getOffset())/3600; //Server offset from Utc

        $client_timezone=DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY,$country_code);
        date_default_timezone_set(''.$client_timezone[0].'');
        $c = new DateTime();
        $client_offset = ($c->getOffset())/3600;

        $offs=array('server_offset'=>$server_offset,'client_offset'=>$client_offset);

        return $offs;
    }

    function ConvertFromServerToClientTime($source,$countryCode){
        $offsets=$this->getClientAndServerTimeOffsets($countryCode);

        $source_timezone=$offsets['server_offset'];
        $dest_timezone=$offsets['client_offset'];
        
        $converted=$this->convert_from_another_time($source, $source_timezone, $dest_timezone);

        return $converted;
    }

    function convert_from_another_time($source, $source_timezone, $dest_timezone){
        $offset = $dest_timezone - $source_timezone;

        if($offset == 0)
            return $source;
        
        $date=date_create($source);
        date_modify($date,"".$offset." hours");
        $finaldate=date_format($date,"Y-m-d H:i");
        
        return $finaldate;
    }

    function getPrevioiusDate($date){
      
        $date=date_create($date);

        $fn=date_modify($date,"-1 day");
        $finaldate=date_format($fn,"Y-m-d");
        return $finaldate;
    }


    //Getting admin monthly declined ads
    function get_user_monthly_number_ofdeclined_ads(){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";

        $status="Declined";

        include("admin_tables.php");
        if($user_type==$manager){

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
            
            $sql ="SELECT count(*) FROM adds WHERE reg_date >= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL DAYOFMONTH(CURDATE())-1 DAY)) AND branch_id='".$branch_id."' AND status='".$status."'";

        } else if($user_type==$Supervisor || $user_type==$Operator){

            $sql ="SELECT count(*) FROM ".$table.",adds WHERE ".$table.".date_assigned >= UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL DAYOFMONTH(CURDATE())-1 DAY)) AND ".$table.".admin_id='".$current_user_id."' AND ".$table.".status='".$status."' AND adds.id=".$table.".ad_id AND adds.status='".$status."'";
        }

        

        $result = $dbase->prepare($sql); 
        $result->execute(); 
        $no = $result->fetchColumn();

        $total= array('result' =>$no );
        array_push($data, $total);

        return $data;
    }


    function getBranchOfAdmin($id){
        global $dbase;
        $branch_id=array();
        $sql = "SELECT * FROM admin WHERE id='".$id."'";
        $res = $dbase->query($sql);
        foreach ($res as $key => $value) {
            $branch_id= $value['branch_id'];
        }
        return $branch_id;
    }

    function getBranchNameOfId($id){
        global $dbase;
        $branch_id="";
        $sql = "SELECT * FROM branch WHERE id='".$id."'";
        $res = $dbase->query($sql);
        foreach ($res as $key => $value) {
            $branch_id= $value['name'];
        }
        return $branch_id;
    }

    //Getting department of admin
    function getDepartmentOfAdmin($id){
        global $dbase;
        $department=array();
        $sql = "SELECT * FROM admin WHERE id='".$id."'";
        $res = $dbase->query($sql);
        foreach ($res as $key => $value) {
            $bran= array('department_id' =>$value['department_id']);
            array_push($department,$bran);
        }
        return $department;
    }

    function getDepartmentNameOfId($id){
        global $dbase;
        $department="";
        $sql = "SELECT * FROM department WHERE id='".$id."'";
        $res = $dbase->query($sql);
        foreach ($res as $key => $value) {
            $department= $value['name'];           
        }
        return $department;
    }


    //Getting supervisor's Manager
    function getManagerOfSupervisor($supervisor_id){
        global $dbase;
        $data=array();
        $branch=array();

        $supervisor_department=$this->getDepartmentOfAdmin($supervisor_id); // getting department of supervisor
        
        $department_id=0;
        foreach ($supervisor_department as $key => $value) {
            $department_id=$value['department_id'];
        }

        $supervisor_branch=$this->getBranchOfAdmin($supervisor_id); // getting branch of supervisor

        $branch_id=0;
        foreach ($supervisor_branch as $key => $value) {
            $branch_id=$value['branch_id'];
        }

        // Selecting manager of the supervisor's department and branch.
        $sql ="SELECT * FROM  admin WHERE department_id='".$department_id."' AND branch_id='".$branch_id."' AND account_type_id=2";

        $res = $dbase->query($sql);
        foreach ($res as $key => $value) {
            $bran= array(
                'manager_id' =>$value['id']             
                );
            array_push($branch,$bran); 
        }
        return $branch;
    }

    //Getting Operator's supervisor
    function getSupervisorOfOperator($operator_id){
        global $dbase;
        $data=array();

        $sql ="SELECT * FROM  supervisor_team WHERE operator_id='".$operator_id."'";

        $res = $dbase->query($sql);
        foreach ($res as $key => $value) {
            $supervisor= array(
                'supervisor_id' =>$value['supervisor_id']               
                );
            array_push($data,$supervisor); 
        }
        return $data;
    }


    function AdminImageUpload($submitName, $fileToUpload, $target_dir ="../../admin/Theme/uploads/"){
        
        $target_file = $target_dir . basename($_FILES[$fileToUpload]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $uploadErrors = array();
        try{
            // Check if image file is an actual image or fake image
            if(isset($_POST[$submitName])) {
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

    function loadPageAdminOfId($id){
        global $dbase;
        global $admin;

        try{
            $sql = "SELECT * FROM admin WHERE id = ". $this->gStringId($id);
            $res = $dbase->query($sql);
            foreach ($res as $row ) {
                foreach ($row as $key => $value) {
                    if(is_numeric($key) == false){
                        if(array_key_exists($key, $admin)){
                            $admin[$key] = is_numeric($value) ? intval($value) : $value;
                        }
                    }
                }
                return;
            }
            $inf=23455;
            //$this->gStringId($id)
            echo "!!! Page administrator not found here".$inf;
            // exit(0);
        }catch(PDOException $e)
        {
            echo $e->getMessage();
            exit(0);
        }
    }
    
    function Update_Approve_Decline_state($ad_id,$status){
        global $dbase;
        $data=array();
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $cuser_type=$_SESSION['admin_type']; //Admin level
        $ad_id=$this->gStringId($ad_id);

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";
        $user_type="Supervisor";

        $stacuser_typete="Entry Not_Found";
        $key1=0;
        $key2=0;
        $key3=0;
        $message="false";

        // Get business id of the business that placed the advert. It will be used toupdate the user work log
        $affected_bus=$this->getBusinessOfAd($ad_id);
        $business_id="";
        foreach ($affected_bus as $key => $value) {
            $business_id=$value['business_id'];
        }
        
        // $current_user_id=1;
        if(strcmp($cuser_type, $manager)==0){
            
            $check_assign="SELECT assigned FROM adds WHERE id='".$ad_id."'";
            $qry=$dbase->query($check_assign);
            foreach ($qry as $key => $value) {
                $state=$value['assigned'];
            }

            if(strcmp($state, "no")==0){

                $up1= $dbase->exec("UPDATE adds set status='".$status."' WHERE id='".$ad_id."'");
                if ($up1) {
                    $log=$this->Update_work_log("only_me",ucwords($status),$business_id);
                    $message="true";
                }

            }elseif(strcmp($state, "assigned")==0){

                $up1= $dbase->exec("UPDATE adds set status='".$status."' WHERE id='".$ad_id."'");
                if ($up1) {
                    $key1=1;
                }

                $up3= $dbase->exec("UPDATE supervisor_ads_assigned set status='".$status."' WHERE ad_id='".$ad_id."'");
                if ($up3) {
                    $key2=1;
                }

                $state2="Not_Found";
                $check_assign2="SELECT * FROM supervisor_ads_assigned WHERE ad_id='".$ad_id."'";
                $qry2=$dbase->query($check_assign2);
                foreach ($qry2 as $key => $value2) {
                    $state2=$value2['assigned'];
                }
                
                if(strcmp($state2, "assigned")==0){
                    $up2= $dbase->exec("UPDATE operator_ads_assigned set status='".$status."' WHERE ad_id='".$ad_id."'");
                    if ($up2) {
                        $key3=1;
                    }
                }else{}             

                $total=$key1+$key2+$key3;

                if($total >=2){

                    $log=$this->Update_work_log("only_me",ucwords($status),$business_id);
                    $message="true";
                }
            }

        }elseif(strcmp($cuser_type, $Supervisor)==0){

            $check_assign="SELECT assigned FROM supervisor_ads_assigned WHERE ad_id='".$ad_id."'";
            $qry=$dbase->query($check_assign);
            foreach ($qry as $key => $value) {
                $state=$value['assigned'];
            }       
            

            if(strcmp($state, "assigned")==0){              
                
                $up1= $dbase->exec("UPDATE adds set status='".$status."' WHERE id='".$ad_id."'");
                if ($up1) {
                    $key1=1;
                }

                $up2= $dbase->exec("UPDATE operator_ads_assigned set status='".$status."' WHERE ad_id='".$ad_id."'");
                if ($up2) {
                    $key2=1;
                }
                $up3= $dbase->exec("UPDATE supervisor_ads_assigned set status='".$status."' WHERE ad_id='".$ad_id."' AND admin_id='".$current_user_id."'");
                if ($up3) {
                    $key3=1;
                }

                $total=$key1+$key2+$key3;

                if($total >=3){

                    $log=$this->Update_work_log("me_and_above",ucwords($status),$business_id);
                    $message="true";
                }

            }elseif(strcmp($state, "no")==0){

                $up2= $dbase->exec("UPDATE adds set status='".$status."' WHERE id='".$ad_id."'");
                if ($up2) {
                    $key2=1;
                }
                $up3= $dbase->exec("UPDATE supervisor_ads_assigned set status='".$status."' WHERE ad_id='".$ad_id."' AND admin_id='".$current_user_id."'");
                if ($up3) {
                    $key3=1;
                }

                $total=$key2+$key3;

                if($total >=2){

                    $log=$this->Update_work_log("me_and_above",ucwords($status),$business_id);
                    $message="true";
                }

            }

        }elseif(strcmp($cuser_type, $Operator)==0){
            
            $up1= $dbase->exec("UPDATE adds set status='".$status."' WHERE id='".$ad_id."'");
            if ($up1) {
                $key1=1;
            }
            $up2= $dbase->exec("UPDATE operator_ads_assigned set status='".$status."' WHERE ad_id='".$ad_id."' AND admin_id='".$current_user_id."'");
            if ($up2) {
                $key2=1;
            }
            $up3= $dbase->exec("UPDATE supervisor_ads_assigned set status='".$status."' WHERE ad_id='".$ad_id."'");
            if ($up3) {
                $key3=1;
            }

            $total=$key1+$key2+$key3;

            if($total >=3){

                $log=$this->Update_work_log("me_and_above",ucwords($status),$business_id);
                $message="true";
            }

            
        }
        return $message;
    }

    function approve_add($add_id){
        $response=array();
        $add_id=$this->gStringId($add_id);
        $is_updated="";
        global $dbase;
        $status="Approved";
        $stm= $dbase->exec("UPDATE adds SET status='$status' WHERE id='$add_id'"); 
        if($stm){   
            $is_updated="true";
            $res=array(
                'response' =>$is_updated
            );

            //Getting id for the business  that placed the advert
            $affected_bus=$this->getBusinessOfAd($add_id);
            $business_id="";
            foreach ($variable as $key => $value) {
                $business_id=$value['business_id'];
            }

            $register_log=$this->Update_work_log("me_and_above","approved",$business_id);

            array_push($response,$res);
            
        }
        else{   
            $is_updated="false";
            $res=array(
                'response' =>$is_updated
            );
            array_push($response,$res);
            
        }
        return $response;
    }

    function active($name){
        $self = $_SERVER['PHP_SELF'];
        if(is_array($name)){
            foreach ($name as $value) {
                if(stripos($self, $value)){
                    echo 'active';
                    return;
                }
            }
            echo 'notactive';
        }else{
            if(stripos($self, $name)){
                echo 'active';
            }else{
                echo 'notactive';
            }
        }
    }
        
    function Change_password($id,$new_password){
        $response=array();
        $is_updated="";
        global $dbase;

        $new_password=$this->clean($new_password);

        $querystring="UPDATE admin SET password='".$new_password."' WHERE id='".$id."'";
        $query = $dbase->prepare($querystring);
        $stm = $query->execute();
        
        if($stm){   
            $is_updated="true";
            $res=array(
                'response' =>$is_updated
            );
            array_push($response,$res);
            
        }
        else{   
            $is_updated="false";
            $res=array(
                'response' =>$is_updated
            );
            array_push($response,$res);
            
        }
        return $response;
    }

    function getBusinessOfAd($add_id){
        global $dbase;
        $data=array();

        $stm="SELECT * FROM adds WHERE id='".$add_id."'";
        $sq=$dbase->query($stm);

        $business_name="";
        $business_id=0;
        foreach ($sq as $key => $value) {
            $business_id=$value['business_id'];

            $bus_name=$this->getBusinessOfId($business_id);
            $business_name=$bus_name['name'];

            $bus=array(
                'business_id' =>$business_id,
                'business_name' =>$business_name
                );
            array_push($data, $bus);
        }
        return $data;

    }
        
    function decline_add($add_id){
        $response=array();

        $add_id=$this->gStringId($add_id);
        $is_updated="";
        global $dbase;
        $status="Declined";
        $stm= $dbase->exec("UPDATE adds SET status='$status' WHERE id='$add_id'"); 
        if($stm){   
            $is_updated="true";
            $res=array(
                'response' =>$is_updated
            );
            //Getting id for the business  that placed the advert
            $affected_bus=$this->getBusinessOfAd($add_id);
            $business_id="";
            foreach ($affected_bus as $key => $value) {
                $business_id=$value['business_id'];
            }

            $register_log=$this->Update_work_log("me_and_above","declined",$business_id);

            array_push($response,$res);
            
        }
        else{   
            $is_updated="false";
            $res=array(
                'response' =>$is_updated
            );
            array_push($response,$res);
            
        }
        return $response;
    }

    function AddAdvert($add_type_id,$add_title,$min_age,$max_age,$add_description,$ad_url,$gender,$currency,$timezone,$account_country,$marketing_agent_code,$folder_name,$new_folder_name,$call_to_action_id,$no_of_weeks,$total_budget_cost,$business_id,$cities,$countries,$categories,$subCategories,$cost_per_week,$exchange_rate){

        global $dbase;

        $response=array();

        $folder_id=0;

        if (strcmp($folder_name, "new_folder")==0) {
            
            $stm= $dbase->exec("INSERT INTO business_folder (business_id,folder_name) VALUES ('".$business_id."','".$new_folder_name."')"); 

            if($stm){
                $folder_id=$dbase->lastInsertId();
            }

        }else{
            $folder_id=$folder_name;
        }

        $status="Pending";
        $assigned="no";
        $branch_id=1;

        $country_code="";
        // $current_Country_code=$this->getCurrentUsersCountryInfo();// Commented out because there is internet connection currently for the expected accurate output, TO BE UNCOMMENTED
        // foreach ($current_Country_code as $key => $value) {
        //  $country_code=$value['country_code'];
        // }
        $country_code="UG";//Dummy code coz there is no internet availability
        // $time_zone=$this->getCountryLocalTime($country_code);

        // $reg_date="";
        // foreach ($time_zone as $key => $value) {
        //  $reg_date=$value['time_zone'];
        // }
        // $reg_date=strtotime($reg_date);

        $reg_date=time();

        $insert= $dbase->exec("INSERT INTO adds 

            (add_type_id,add_title,min_age,max_age,add_description,ad_url,gender,currency,timezone,account_country,marketing_agent_code,folder_id,call_to_action_id,no_of_weeks,total_budget_cost,status,business_id,branch_id,assigned,reg_date, cost_per_week,exchange_rate) 
            VALUES ('".$this->gStringId($add_type_id)."','".addslashes($add_title)."','".$min_age."','".$max_age."','".addslashes($add_description)."','".$ad_url."','".$gender."','".$currency."','".$timezone."','".$this->gStringId($account_country)."','".addslashes($marketing_agent_code)."','".$folder_id."','".$call_to_action_id."','".$no_of_weeks."','".$total_budget_cost."','".$status."','".$business_id."','".$branch_id."','".$assigned."','".$reg_date."','".$cost_per_week."','".$exchange_rate."')");
        if ($insert) {
            $ad_id=$dbase->lastInsertId();

            foreach ($cities as $key => $value1) {
                $city= $dbase->exec("INSERT INTO advert_city (ad_id,city_id) VALUES ('".$ad_id."','".$value1."')");
                
            }

            foreach ($countries as $key => $value2) {
                $countries= $dbase->exec("INSERT INTO advert_country (ad_id,country_id) VALUES ('".$ad_id."','".$value2."')");
                
            }

            foreach ($categories as $key => $value3) {
                $city= $dbase->exec("INSERT INTO advert_category (ad_id,category_id) VALUES ('".$ad_id."','".$value3."')");
                
            }

            foreach ($subCategories as $key => $value4) {
                $city= $dbase->exec("INSERT INTO advert_sub_category (ad_id,sub_category_id) VALUES ('".$ad_id."','".$value4."')");             
            }

            $trueResponse="true";
            $result=array('response'=>$trueResponse);
            array_push($response, $result);
            

        }else{

            
            $trueResponse="false";
            $result=array('response'=>$trueResponse);
            array_push($response, $result);

        }

        return $response;
    }

    function insert_category($name,$icon,$description){
        $response=array();
        $is_inserted="";
        global $dbase;
        $status="Declined";

        $description=$this->clean($description);
        
        $stm= $dbase->exec("INSERT INTO category (name,icon,description) VALUES ('".$name."','".$icon."','".$description."')"); 
        if($stm){   
            $is_inserted="true";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        else{   
            $is_inserted="false";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        return $response;
    }


    function insert_business($owner,$banner,$logo,$name,$country_id,$city_id,$phone_1,$phone_2,$email,$website,$address,$description,$sub_category_id_1,$sub_category_id_2,$sub_category_id_3){
        $response=array();
        $is_inserted="";
        global $dbase;

        $owner=2;

        // $owner=$this->clean($owner);
        $name=$name;
        $email=$email;
        $website=$website;
        $address=addslashes($address);
        $description=addslashes($description);
        $sub_category_id_1=$sub_category_id_1;
        $sub_category_id_2=$sub_category_id_2;
        $sub_category_id_3=$sub_category_id_3;

        $banner="";
        if(isset($_FILES['image1']) && !empty($_FILES['image1']['name'])  ){
            $banner=$this->upload_image_banner($_FILES['image1']);
        }
        
        $logo="";
        if(isset($_FILES['image1']) && !empty($_FILES['image1']['name'])  ){
            $logo=$this->upload_image($_FILES['image']);
        }

        // $banner="uploads/banner".$logo;

        // $logo="uploads/".$logo;
        
        $stm= $dbase->exec("INSERT INTO business (date_created,user_id,banner,logo,name,country_id,city_id,phone_1,phone_2,email,website,address,description) VALUES 
        ('".time()."','".$owner."','".$banner."','".$logo."','".$name."','".$country_id."','".$city_id."','".$phone_1."','".$phone_2."','".$email."','".$website."','".$address."','".$description."')"); 
        if($stm){   
            
            $bus_id=$dbase->lastInsertId();
            if(empty($sub_category_id_2) && empty($sub_category_id_3)){
            
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES ('".$sub_category_id_1."','".$bus_id."')"); 
            }else if(! empty($sub_category_id_2) && empty($sub_category_id_3) ){
            
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES 
                ('".$sub_category_id_1."','".$bus_id."'),
                ('".$sub_category_id_2."','".$bus_id."')
                
                "); 
            } else if(! empty($sub_category_id_3) && empty($sub_category_id_2) ){
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES 
                ('".$sub_category_id_1."','".$bus_id."'),
                ('".$sub_category_id_3."','".$bus_id."')
                "); 
            }
            else{
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES 
                ('".$sub_category_id_1."','".$bus_id."'),
                ('".$sub_category_id_2."','".$bus_id."'),
                ('".$sub_category_id_3."','".$bus_id."')
                "); 
            }
            
            $is_inserted="true";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        else{   
            $is_inserted="false";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        return $response;
    }
    function upload_advertImage(){
        $url=$this->upload_image($_FILES['image']);
        return $url;
    }
        
    function Edit_business_info($owner,$name,$country_id,$city_id,$phone_1,$phone_2,$email,$website,$address,$description,$sub_category_id_1,$sub_category_id_2,$sub_category_id_3,$bus_id,$business_banner,$business_logo){
        $response=array();
        $is_inserted="";
        global $dbase;

        $owner=2;
        $website=addslashes($website);
        $address=addslashes($address);
        $description=addslashes($description);
        $sub_category_id_1=$this->clean($sub_category_id_1);
        $sub_category_id_2=$this->clean($sub_category_id_2);
        $sub_category_id_3=$this->clean($sub_category_id_3);

        $banner="empty";
        if(isset($_FILES['image1']) && !empty($_FILES['image1']['name'])  ){
            $banner=$this->upload_image_banner($_FILES['image1']);              
        }else{
            $banner = $business_banner;
        }
        
        $logo="empty";
        if(isset($_FILES['image']) && !empty($_FILES['image']['name'])  ){
            $logo=$this->upload_image($_FILES['image']);                
        }else{
            $logo = $business_logo;
        }
        
        
        $stm= $dbase->exec("UPDATE business set user_id='".$owner."',banner='".$banner."',logo='".$logo."',name='".$name."',country_id='".$country_id."',city_id='".$city_id."',phone_1='".$phone_1."',phone_2='".$phone_2."',email='".$email."',website='".$website."',address='".$address."',description='".$description."' WHERE id='".$bus_id."'"); 
        
        if($stm){

            $delquery1="DELETE  FROM business_category WHERE business_id='".$bus_id."'";
            $query = $dbase->prepare($delquery1);
            $query->execute();      
            
            if(empty($sub_category_id_2) && empty($sub_category_id_3)){
            
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES ('".$sub_category_id_1."','".$bus_id."')"); 
            }else if(! empty($sub_category_id_2) && empty($sub_category_id_3) ){
            
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES 
                ('".$sub_category_id_1."','".$bus_id."'),
                ('".$sub_category_id_2."','".$bus_id."')
                
                "); 
            } else if(! empty($sub_category_id_3) && empty($sub_category_id_2) ){
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES 
                ('".$sub_category_id_1."','".$bus_id."'),
                ('".$sub_category_id_3."','".$bus_id."')
                "); 
            }
            else{
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES 
                ('".$sub_category_id_1."','".$bus_id."'),
                ('".$sub_category_id_2."','".$bus_id."'),
                ('".$sub_category_id_3."','".$bus_id."')
                "); 
            }

            if($stm2){      
        
                $is_inserted="true";
                $res=array(
                    'response' =>$is_inserted
                );
                array_push($response,$res);
                
            }
            else{   
                $is_inserted="false";
                $res=array(
                    'response' =>$is_inserted
                );
                array_push($response,$res);
                
            }
            /*
            $is_inserted="true";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            */
        }
        else{
            
            $delquery1="DELETE  FROM business_category WHERE business_id='".$bus_id."'";
            $query = $dbase->prepare($delquery1);
            $query->execute();
            
            if(empty($sub_category_id_2) && empty($sub_category_id_3)){
            
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES ('".$sub_category_id_1."','".$bus_id."')"); 
            }else if(! empty($sub_category_id_2) && empty($sub_category_id_3) ){
            
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES 
                ('".$sub_category_id_1."','".$bus_id."'),
                ('".$sub_category_id_2."','".$bus_id."')
                
                "); 
            } else if(! empty($sub_category_id_3) && empty($sub_category_id_2) ){
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES 
                ('".$sub_category_id_1."','".$bus_id."'),
                ('".$sub_category_id_3."','".$bus_id."')
                "); 
            }
            else{
                $stm2= $dbase->exec("INSERT INTO  business_category (sub_category_id,business_id) VALUES 
                ('".$sub_category_id_1."','".$bus_id."'),
                ('".$sub_category_id_2."','".$bus_id."'),
                ('".$sub_category_id_3."','".$bus_id."')
                "); 
            }
            
            if($stm2){      
        
                $is_inserted="true";
                $res=array(
                    'response' =>$is_inserted
                );
                array_push($response,$res);
                
            }
            else{   
                $is_inserted="false";
                $res=array(
                    'response' =>$is_inserted
                );
                array_push($response,$res);
                
            }
            
        }
        
        
        
        return $response;
    }

    function getAdTypeDetails($key,$adTypeId){
        global $dbase;
        $response=array();
        $sql="";
        if (strcmp($key, "specific")==0) {
            $sql = "SELECT * FROM ad_type WHERE id='".$this->gStringId($adTypeId)."'";
        }else{
            $sql = "SELECT * FROM ad_type";
        }
        
        $billed=$this->getBilledAdPlaces($adTypeId);

        $res = $dbase->query($sql);
        foreach ($res as $row ) {
            $id=$row['id'];
            $name=$row['name'];
            $cost_per_week=$row['cost_per_week'];

            $data=array('id'=>$this->gString($id),'name'=>$name,'cost_per_week'=>$cost_per_week,'billed_places'=>$billed);
            array_push($response, $data);
        }

        return $response;

    }

    function getBilledAdPlaces($adTypeId){
        global $dbase;
        $response=array();
        $id=$this->gStringId($adTypeId);

        $sql = "SELECT currency,cost_per_week FROM adds WHERE add_type_id='".$id."' group by cost_per_week having   count(*) >= 1 ORDER BY cost_per_week DESC  LIMIT 4";

        $res = $dbase->query($sql);
        foreach ($res as $row ) {
            
            // $currency=$row['currency'];
            $cost_per_week=$row['cost_per_week'];

            $data=array('cost_per_week'=>$cost_per_week);
            array_push($response, $data);
        }

        return $response;
    }

    function getAdAmountReceived($AdId){
        global $dbase;
        $response=array();
        $total_budget_cost=0;
        $id=$this->gStringId($AdId);

        $sql = "SELECT  total_budget_cost FROM adds WHERE id='".$id."'";

        $res = $dbase->query($sql);
        foreach ($res as $row ) {
    
            $total_budget_cost=$row['total_budget_cost'];

        }

        return $total_budget_cost;
    }

    function getAgentCodeOfAdvert($AdId){
        global $dbase;
        $response=array();
        $marketing_agent_code="";
        $id=$this->gStringId($AdId);

        $sql = "SELECT  marketing_agent_code FROM adds WHERE id='".$id."'";

        $res = $dbase->query($sql);
        foreach ($res as $row ) {
    
            $marketing_agent_code=$row['marketing_agent_code'];

        }

        return $marketing_agent_code;
    }

    function getCommissionOfAgentCode($AgentCode){
        global $dbase;
        $response=array();
        $commision=0;
        
        $sql = "SELECT commision FROM agent_commission WHERE agent_code='".$AgentCode."'";

        $res = $dbase->query($sql);
        foreach ($res as $row ) {
    
            $commision=$row['commision'];

        }

        return $commision;
    }

    function getAdCommissionPaidOut($AdId){
       
        $amountReceived=$this->getAdAmountReceived($AdId);
        $commision=$this->getCommissionOfAgentCode($this->getAgentCodeOfAdvert($AdId));

        $commisionPaidOut=($commision/100)*$amountReceived;

        return $commisionPaidOut;
    }

    function getAdAmountAfterCommission($AdId){
        
        $amountReceived=$this->getAdAmountReceived($AdId);
        $getAdCommissionPaidOut=$this->getAdCommissionPaidOut($AdId);

        $AdAmountAfterCommission=$amountReceived-$getAdCommissionPaidOut;

        return $AdAmountAfterCommission;
    }

    // Get accountable adds of a day
        function getDayAccountableAdsDetails($key,$date1,$date2,$status,$status_value,$limit,$country_code){
        global $dbase;
        $response=array();
        $payers_name="Not set";

        $info=array();

        if (strcmp($country_code, " ")==0) {
            $UserCurrentLocInfo=$this->getCurrentUsersCountryInfo();
            $country_code=$UserCurrentLocInfo['country_code'];
        }else{
            $country_code=$country_code;
        }
        
        if (strcmp($key, "range") == 0) {
            $date2=$this->getNextDate($date2);

        }else if (strcmp($key, "today") == 0) {
            
            $ClientLocalTime=$this->getCountryLocalTime($country_code);

            $date1=date("Y-m-d",strtotime($ClientLocalTime['localtime']));

            $date2=$this->getNextDate($date1);
        }else{
            $date2=$this->getNextDate($date1);
        }

        if(strcmp($limit, "")==0){
            $limit=$limit;
        }else{
            $limit="LIMIT ".$limit;
        }
        
        $date11 =strtotime($this->ConvertFromClientToServerTime($date1,$country_code));
        $date22=strtotime($this->ConvertFromClientToServerTime($date2,$country_code));

         if (strcmp($status, "yes") ==0) {
            $sql = "SELECT  id,add_type_id,business_id,total_budget_cost,marketing_agent_code,reg_date FROM adds WHERE reg_date >='".$date11."' AND reg_date <'".$date22."' AND status='".$status_value."' ORDER BY reg_date DESC $limit";
        }else{
            $sql = "SELECT  id,add_type_id,business_id,total_budget_cost,marketing_agent_code,reg_date FROM adds WHERE reg_date >='".$date11."' AND reg_date <'".$date22."' ORDER BY reg_date DESC $limit";
        }        


        $res = $dbase->query($sql);
        $count=0;
        foreach ($res as $row ) {
            $count +=1;
            $adType=$this->getAdTypeDetails("specific",$this->gString($row['add_type_id']));
           
            $adType_name="";
            foreach ($adType as $key => $value) {
                $adType_name=$value['name'];
            }

            $business_name=$this->getBusinessOfId($row['business_id'], $has_details = false);
            $uploadTime=date("H:i",$row['reg_date']);

            $businfo=array(
                'id'=>$this->gString($row['id']),
                'amountReceived'=>$row['total_budget_cost'],
                'adType'=>$adType_name, 
                'uploadTime'=>$uploadTime,               
                'business_name'=>$business_name['name'],
                'payers_name'=>$payers_name,
                'commission'=>$this->getCommissionOfAgentCode($row['marketing_agent_code']),
                'commission_paidOut'=>$this->getAdCommissionPaidOut($this->gString($row['id'])),
                'after_commission'=>$this->getAdAmountAfterCommission($this->gString($row['id'])),
                'TotaAmountReceived'=>$this->getDateAdTotalAmountReceived("",$date1,$date2,$status,$status_value,$country_code),
                'TotaCommissionPaidOut'=>$this->getDateAdTotalCommissionPaidOut("",$date1,$date2,$status,$status_value,$country_code),
                'TotaTotalAfterCommission'=>$this->getDateAdTotalAfterCommission("",$date1,$date2,$status,$status_value,$country_code)               
            );

            array_push($info, $businfo);
        }

        return $info;
        
    }


    // $key shows whether date is to be selected as range from date 1 to date 2. Status shows whether selecting pending, or approved, or declined, or all ads
    function getDateAdTotalAmountReceived($key,$date1,$date2,$status,$status_value,$country_code){
        global $dbase;
        $response=array();

        $total_amount=0;
        
        if (strcmp($key, "range") !=0) {
            $date22=$this->getNextDate($date1);
        }else{
            $date22=$this->getNextDate($date2);
        }

        if (strcmp($country_code, " ")==0) {
            $UserCurrentLocInfo=$this->getCurrentUsersCountryInfo();
            $country_code=$UserCurrentLocInfo['country_code'];
        }else{
            $country_code=$country_code;
        }
        
        // the following field are supposed to be un commented when there is internet availability

        $date11=strtotime($this->ConvertFromClientToServerTime($date1,$country_code));
         $date22=strtotime($this->ConvertFromClientToServerTime($date22,$country_code));

         if (strcmp($status, "yes") ==0) {
            $sql = "SELECT  id FROM adds WHERE reg_date >='".$date11."' AND reg_date <'".$date22."' AND status='".$status_value."'";
        }else{
            $sql = "SELECT  id FROM adds WHERE reg_date >='".$date11."' AND reg_date <'".$date22."'";
        }        

        $res = $dbase->query($sql);
        foreach ($res as $row ) {
            $total_amount +=$this->getAdAmountReceived($this->gString($row['id']));
            
        }

        if ($total_amount <=0) {
            $total_amount=0;
        }

        return $total_amount;
    }

    // $key shows whether date is to be selected as range from date 1 to date 2. Status shows whether selecting pending, or approved, or declined, or all ads
    function getDateAdTotalCommissionPaidOut($key,$date1,$date2,$status,$status_value,$country_code){
        global $dbase;
        $response=array();

        
        
        if (strcmp($key, "range") !=0) {
            $date2=$this->getNextDate($date1);
        }else{
            $date2=$this->getNextDate($date2);
        }

        if (strcmp($country_code, " ")==0) {
            $UserCurrentLocInfo=$this->getCurrentUsersCountryInfo();
            $country_code=$UserCurrentLocInfo['country_code'];
        }else{
            $country_code=$country_code;
        }
       
        $date1=strtotime($this->ConvertFromClientToServerTime($date1,$country_code));
         $date2=strtotime($this->ConvertFromClientToServerTime($date2,$country_code));

         if (strcmp($status, "yes") ==0) {
            $sql1 = "SELECT * FROM adds WHERE reg_date >='".$date1."' AND reg_date < '".$date2."' AND status='".$status_value."'";
        }else{
            $sql1 = "SELECT *FROM adds WHERE reg_date >='".$date1."' AND reg_date < '".$date2."'";
        }        

        $res1 = $dbase->query($sql1);
        $total_amount=0;
        foreach ($res1 as $key => $value) {
     
            $total_amount =$total_amount+ $this->getAdCommissionPaidOut($this->gString($value['id']));
            
        }

        return $total_amount;
    }

    function moveElementInArray($array, $toMove, $targetIndex) {
        if (is_int($toMove)) {
            $tmp = array_splice($array, $toMove, 1);
            array_splice($array, $targetIndex, 0, $tmp);
            $output = $array;
        }
        elseif (is_string($toMove)) {
            $indexToMove = array_search($toMove, array_keys($array));
            $itemToMove = $array[$toMove];
            array_splice($array, $indexToMove, 1);
            $i = 0;
            $output = Array();
            foreach($array as $key => $item) {
                if ($i == $targetIndex) {
                    $output[$toMove] = $itemToMove;
                }
                $output[$key] = $item;
                $i++;
            }
        }
        return $output;
    }

    function getMonthlyWeekDates($year,$month){

        $formatted_date=$year."-".$month."-"."01";
        $maxMonthDays=date("t",strtotime($formatted_date));
        $weeks=array(
          'week 1'=>array('from'=>$year.'-'.$month.'-01','to'=>$year.'-'.$month.'-07'),
          'week 2'=>array('from'=>$year.'-'.$month.'-08','to'=>$year.'-'.$month.'-14'),
          'week 3'=>array('from'=>$year.'-'.$month.'-15','to'=>$year.'-'.$month.'-21'),
          'week 4'=>array('from'=>$year.'-'.$month.'-22','to'=>$year.'-'.$month.'-28'),
          'week 5'=>array('from'=>$year.'-'.$month.'-29','to'=>$year.'-'.$month.'-'.$maxMonthDays)
        );
        return $weeks;
    }
    // $key shows whether date is to be selected as range from date 1 to date 2. Status shows whether selecting pending, or approved, or declined, or all ads
    function getDateAdTotalAfterCommission($key,$date1,$date2,$status,$status_value,$country_code){
        global $dbase;
        $response=array();        
        
        if (strcmp($key, "range") !=0) {
            $date2=$this->getNextDate($date1);
        }else{
            $date2=$this->getNextDate($date2);
        }

        if (strcmp($country_code, " ")==0) {
            $UserCurrentLocInfo=$this->getCurrentUsersCountryInfo();
            $country_code=$UserCurrentLocInfo['country_code'];
        }else{
            $country_code=$country_code;
        }
        
        $date1=strtotime($this->ConvertFromClientToServerTime($date1,$country_code));
        $date2=strtotime($this->ConvertFromClientToServerTime($date2,$country_code));

         if (strcmp($status, "yes") ==0) {
            $sql1 = "SELECT * FROM adds WHERE reg_date >='".$date1."' AND reg_date < '".$date2."' AND status='".$status_value."'";
        }else{
            $sql1 = "SELECT *FROM adds WHERE reg_date >='".$date1."' AND reg_date < '".$date2."'";
        }        

        $res1 = $dbase->query($sql1);
        $total_amount=0;
        foreach ($res1 as $key => $value) {
           
            $total_amount =$total_amount+ $this->getAdAmountAfterCommission($this->gString($value['id']));
            
        }

        return $total_amount;
    }


        
    function check_if_exist($table,$field,$value){
        global $dbase;
        $response=array();
        
        $sql = "SELECT * FROM ".$table." WHERE ".$field." = '". $value."'";
            $res = $dbase->query($sql);
            $id="";
            foreach ($res as $row ) {
                $id=$row['name'];
            }
            
            if(!empty($id)){
                $isthere=1;
                $res=array(
                    'response' =>$isthere
                );
                array_push($response,$res);
            }
            else{
                $isthere=0;
                $res=array(
                    'response' =>$isthere
                );
                array_push($response,$res);
            }
            return $response;
    }

    function insert_country($name,$code,$flag,$other){
        $response=array();
        $is_inserted="";
        global $dbase;
        $other=$this->clean($other);

        $flag_image=$this->upload_image($flag);
        
        $check= $this->check_if_exist("country","name",$name);
        
        $resp="";
        foreach($check as $checkresp){
            $resp=$checkresp['response'];
        }
        if($resp==0){
            $stm= $dbase->exec("INSERT INTO  country (name,code,flag,other) VALUES ('".$name."','".$code."','".$flag_image."','".$other."')"); 
            if($stm){   
                $is_inserted="true";
                $res=array(
                    'response' =>$is_inserted
                );
                array_push($response,$res);
                
            }
            else{   
                $is_inserted="false";
                $res=array(
                    'response' =>$is_inserted
                );
                array_push($response,$res);
                
            }
            
        }
        else if($resp==1){
            $is_inserted="exist";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
        }
        return $response;
    }

    function insert_city($name,$country_id,$other){
        $response=array();
        $is_inserted="";
        global $dbase;
        $other=$this->clean($other);

        $check= $this->check_if_exist("city","name",$name);
        
        $resp="";
        foreach($check as $checkresp){
            $resp=$checkresp['response'];
        }
        if($resp==0){
            $stm= $dbase->exec("INSERT INTO  city (name,country_id,other) VALUES ('".$name."','".$country_id."','".$other."')"); 
            if($stm){   
                $is_inserted="true";
                $res=array(
                    'response' =>$is_inserted
                );
                array_push($response,$res);
                
            }
            else{   
                $is_inserted="false";
                $res=array(
                    'response' =>$is_inserted
                );
                array_push($response,$res);
                
            }
            
        }
        else if($resp==1){
            $is_inserted="exist";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
        }
        return $response;
    }

    function city_update($id,$name,$country_id,$other){
        $response=array();
        $is_inserted="";
        global $dbase;
        $status="Declined";
        $other=$this->clean($other);

        $stm= $dbase->exec("UPDATE city set name='$name',country_id='$country_id',other='$other' WHERE id='$id'"); 
        if($stm){   
            $is_inserted="true";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        else{   
            $is_inserted="false";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        return $response;
    }

    function subcategory_update($id,$name,$category_id,$description){
        $response=array();
        $is_inserted="";
        global $dbase;
        $status="Declined";
        $description=$this->clean($description);
        
        $stm= $dbase->exec("UPDATE sub_category set name='$name',category_id='$category_id', description='$description' WHERE id='$id'"); 
        if($stm){   
            $is_inserted="true";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        else{   
            $is_inserted="false";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        return $response;
    }

    function insert_subcategory($name,$category_id,$description){
        $response=array();
        $is_inserted="";
        global $dbase;
        $description=$this->clean($description);
        
        $stm= $dbase->exec("INSERT INTO sub_category (name,category_id,description) VALUES ('".$name."','".$category_id."','".$description."')"); 
        if($stm){   
            $is_inserted="true";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        else{   
            $is_inserted="false";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        return $response;
    }
        
    function upload_image($image){
        global $photoBase2;
        $photo_link="";
        if(isset($image)){
              $errors= array();
              $file_name = $_FILES['image']['name'];
              $file_size = $_FILES['image']['size'];
              $file_tmp = $_FILES['image']['tmp_name'];
              $file_type = $_FILES['image']['type'];
              $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
              
              $expensions= array("jpeg","jpg","png","gif");
              
              if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              }
              
              if($file_size > 2097152) {
             $errors[]='File size must be excately 2 MB';
              }
              $file_name=$_SESSION['admin_id'].time().".".$file_ext;
              if(empty($errors)==true) {
             move_uploaded_file($file_tmp,$photoBase2."uploads/".$file_name);
            
              }else{
             print_r($errors);
              }
              $photo_link="uploads/".$file_name;
        }
        return $photo_link;
    }



    function upload_image_banner($image){
        global $photoBase2;
        $photo_link="";
        if(isset($image)){
              $errors= array();
              $file_name = $_FILES['image1']['name'];
              $file_size = $_FILES['image1']['size'];
              $file_tmp = $_FILES['image1']['tmp_name'];
              $file_type = $_FILES['image1']['type'];
              $file_ext=strtolower(end(explode('.',$_FILES['image1']['name'])));
              
              $expensions= array("jpeg","jpg","png","gif");
              
              if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              }
              
              if($file_size > 2097152) {
             $errors[]='File size must be excately 2 MB';
              }
              $file_name="banner".$_SESSION['admin_id'].time().".".$file_ext;
              if(empty($errors)==true) {

                move_uploaded_file($file_tmp,$photoBase2."uploads/".$file_name);
            
              }else{
             print_r($errors);
              }
              $photo_link="uploads/".$file_name;
        }
        return $photo_link;
    }

    function clean($str) {
        // $str = @trim($str);
        // if(get_magic_quotes_gpc()) {
        //  $str = stripslashes($str);
        // }
        return $str;
    }

    function fill_country_drop_down($countries)
    {
        // $countries=$conn->getAll("SELECT * FROM country");
        foreach($countries as $country)
        {
                         
                         
            echo '<option value="'.$country['id'].'">'; echo $country['name']; echo'</option>';
                            
                          
        }

    }

    function Update_work_log($for,$log_name,$business_affected){
        $response=array();
        $is_inserted="";
        global $dbase;
        
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id
        $user_type=$_SESSION['admin_type']; //Admin level
        

        $update_time=time();
        $log_name=$log_name;

        if(strcmp($for, "only_me")==0){//If the notification is for only the current user

            $stm= $dbase->exec("INSERT INTO admin_work_log (work_log_owner_id,log_name,log_performer_id,business_Affected,time_updated) VALUES ('".$current_user_id."','".$log_name."','".$current_user_id."','".$business_affected."','".$update_time."')");

        }elseif (strcmp($for, "me_and_above")==0) {

            if(strcmp($user_type, "Manager")==0){

                    $stm= $dbase->exec("INSERT INTO admin_work_log (work_log_owner_id,log_name,log_performer_id,business_Affected,time_updated) VALUES ('".$current_user_id."','".$log_name."','".$current_user_id."','".$business_affected."','".$update_time."')");

            }elseif (strcmp($user_type, "Supervisor")==0) {

                $user_manager=$this->getManagerOfSupervisor($current_user_id); //Getting manager of current supervisor

                $manager_id=0;
                foreach ($user_manager as $key => $value) {
                    $manager_id=$value['manager_id'];
                }

                //Saving work log for both supervisor and his manger
                $stm= $dbase->exec("INSERT INTO admin_work_log (work_log_owner_id,log_name,log_performer_id,business_Affected,time_updated) VALUES 
                    ('".$current_user_id."','".$log_name."','".$current_user_id."','".$business_affected."','".$update_time."'),
                    ('".$manager_id."','".$log_name."','".$current_user_id."','".$business_affected."','".$update_time."')
                 ");

            }elseif (strcmp($user_type, "Operator")==0) {

                $user_supervisor=$this->getSupervisorOfOperator($current_user_id); //Gettin supervisor id for current user

                $supervisor_id=0;
                foreach ($user_supervisor as $key => $value) {
                    $supervisor_id=$value['supervisor_id']; 
                }

                //Saving work log for both Operator and his supervisor
                $stm= $dbase->exec("INSERT INTO admin_work_log (work_log_owner_id,log_name,log_performer_id,business_Affected,time_updated) VALUES 
                    ('".$current_user_id."','".$log_name."','".$current_user_id."','".$business_affected."','".$update_time."'),
                    ('".$supervisor_id."','".$log_name."','".$current_user_id."','".$business_affected."','".$update_time."')
                 ");

            }
        }
        
         
        $work_log_id=0;

        if($stm){
            $work_log_id=$dbase->lastInsertId();    
            $is_inserted="true";
            $res=array(
                'response' =>$is_inserted               
            );
            array_push($response,$res);
            
        }
        else{   
            $is_inserted="false";
            $res=array(
                'response' =>$is_inserted               
            );
            array_push($response,$res);
            
        }
        return $response;
    } 


    function getUserWorkLog($key,$id){
        global $dbase;
        $log=array();
        $log_text="";
        $Supervisor="Supervisor";
        $Operator="Operator";
        $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id

        if(strcmp($key, $Supervisor)==0){
            
            $current_user_id=$this->gStringId($id);
        }elseif(strcmp($key, $Operator)==0){
            
            $current_user_id=$id;
        }


        $sql = "SELECT * FROM admin_work_log WHERE work_log_owner_id='".$current_user_id."' ORDER BY time_updated DESC";
        $res = $dbase->query($sql);

        foreach ($res as $key => $value) {
            // getting info for the person who created the log
            $creator_full_name="";
            $creator_info=$this->getAdminOfId($this->gString($value['log_performer_id']));

            foreach ($creator_info as $key => $value2) {
                $creator_full_name=$value2['full_name'];
            }
            // $creator_full_name="Kafuko Wilson";

            // If the work log is for either approving the ad or declining ad
            if(strcmp($value['log_name'], "Approved")==0 || strcmp($value['log_name'], "Declined")==0 ){
                    $business_info=$this->getBusinessOfId($value['business_Affected'], $has_details = false);

                        $business_name=$business_info['name'];
                    
                    $log_text=$creator_full_name." ".$value['log_name']."<a href='#' style='color:#ffffff;'> ".$business_name."'s"." ad. </a>";

            }else if(strcmp($value['log_name'], "edited goal")==0){ // if work log is for editing someone's goal
                        $edited=$this->getAdminOfId($this->gString($value['business_Affected']));

                        $someone_name="";
                        foreach ($edited as $key => $value2) {
                            $someone_name=$value2['full_name'];
                        }

                        $log_text=$creator_full_name." ".$value['log_name']." for <a href='#' style='color:#ffffff;'> ".$someone_name."</a>";

            }else{//Other work logs
                    $log_text=$value['log_name'];
            }
            
            $updated_date=date("Y-m-d H:i:s",$value['time_updated']);

            $logs= array(
                'log_name' =>$log_text,
                'who_created_lod' =>$value['log_performer_id'],
                'creator_full_name' =>$creator_full_name,
                'business_Affected' =>$value['business_Affected'],
                'log_time' =>$updated_date,
            );

            array_push($log,$logs);
        }
        return $log;
    }

    function Assign_Goal_ToSupervisor($admin_id,$goal){
        $user_type=$this->getUserTypeOfId($admin_id);

        $manager="Manager"; 
        $Supervisor="Supervisor";
        $Operator="Operator";

        $message=array();
        $data=array();

        include("admin_tables.php");

        if(strcmp($user_type,$Supervisor)==0){//admin is a supervisor

            global $dbase;
            // Getting current day date
            $date=date("Y-m-d");            
            
            $date_stamp=strtotime($date);
            $next_date=date("d-m-Y", $date_stamp+86400);
            $stmp=strtotime($next_date);

            $total_goal=0;

            // Checking whether user isalreadyhaving goal assigned
             $goal_assigned=$this->Weekly_total_ads("specific",$date,$admin_id);
             foreach ($goal_assigned as $key => $value) {
                $total_goal=$value['result'];
             }
             if($total_goal >=1){//if supervisor goal is already set
                $error="yes";
                $erroe_content="User already has goal assigned";
                $error_message= array('Error' =>$error ,'content'=>$erroe_content );
                array_push($message,$error_message);
             }else{

                $admin_id=$this->gStringId($admin_id); 
                //Checking for user pending ads
                // $check_pending=$this->get_user_pending_ads_number($user_type,$admin_id,"yes","today");
                // var_dump($check_pending);
                $no="no";
                $lim="20";
                $pending="Pending";

                $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id

                $branch=$this->getBranchOfAdmin($current_user_id);//Get current users branch
                $branch_id=0;
                
                foreach ($branch as $key => $value) {
                    $branch_id=$value['branch_id'];
                }
                
                $super_sel="SELECT *FROM adds WHERE assigned='".$no."' AND status='".$pending."' AND branch_id='".$branch_id."' LIMIT $goal";
                $res = $dbase->query($super_sel);
                // $ct=$res->fetchColumn();
                $unass=$this->getUnassigned_numberOf_ads("Manager","");//Total number of manager's unassigned ads.
                
                if($unass>0 && $unass >= $goal){
             
                    foreach ($res as $key => $value) {

                        $adid=$value['id'];
                        
                        $date_assign=time();
                        
                        $insertToSup=$dbase->exec("INSERT INTO  supervisor_ads_assigned (ad_id,admin_id,date_assigned,status) VALUES('$adid','$admin_id','$date_assign','$pending')");
                        if($insertToSup){
                            $assigned_add="yes";
                            //Recording ad as already assigned to someone
                            $update=$dbase->exec("UPDATE adds set assigned='".$assigned_add."' WHERE id='".$adid."'");

                            $error="NO";
                            $erroe_content="Inserted record";
                            $error_message= array('Error' =>$error ,'content'=>$erroe_content );
                            array_push($message,$error_message);

                        }else{
                            $error="Yes";
                            $erroe_content="Record not Inserted";
                            $error_message= array('Error' =>$error ,'content'=>$erroe_content );
                            array_push($message,$error_message);

                        }
                    }

                }else{

                    $error="Yes";
                    $erroe_content="No un assigned ads available or goal greater than the available unassigned ads.";
                    $error_message= array('Error' =>$error ,'content'=>$erroe_content );
                    array_push($message,$error_message);

                }
                

             }


        }


        return $message;
    }

    function Assign_Goal_ToOperator($admin_id,$goal){
        $user_type=$this->getUserTypeOfId($admin_id);

        $manager="Manager"; 

        $Supervisor="Supervisor";
        $Operator="Operator";

        $message=array();
        $data=array();

        include("admin_tables.php");

        if(strcmp($user_type,$Operator)==0){//admin is a supervisor

            global $dbase;
            // Getting current day date
            $date=date("Y-m-d");            
            
            $date_stamp=$stam=strtotime($date);
            $next_date=date("d-m-Y", $date_stamp+86400);
            $stmp=strtotime($next_date);

            $total_goal=0;

            // Checking whether user isalreadyhaving goal assigned
             $goal_assigned=$this->Weekly_total_ads("specific",$date,$admin_id);
             foreach ($goal_assigned as $key => $value) {
                $total_goal=$value['result'];
             }
             if($total_goal >=1){//if supervisor goal is already set
                $error="yes";
                $erroe_content="User already has goal assigned";
                $error_message= array('Error' =>$error ,'content'=>$erroe_content );
                array_push($message,$error_message);
             }else{

                $admin_id=$this->gStringId($admin_id); 
                //Checking for user pending ads
                // $check_pending=$this->get_user_pending_ads_number($user_type,$admin_id,"yes","today");
                // var_dump($check_pending);
                $no="no";
                $lim="20";
                $pending="Pending";

                $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id

                $branch=$this->getBranchOfAdmin($current_user_id);//Get current users branch
                $branch_id=0;
                
                foreach ($branch as $key => $value) {
                    $branch_id=$value['branch_id'];
                }
                
                $super_sel="SELECT * FROM  supervisor_ads_assigned WHERE assigned='".$no."' AND status='".$pending."' AND admin_id='".$current_user_id."'";
                $res = $dbase->query($super_sel);
                // $ct=$res->fetchColumn();
                $unass=$this->getUnassigned_numberOf_ads("Supervisor",$_SESSION['admin_id']);//Total number of manager's unassigned 
                if($unass>0 && $unass >= $goal){
             
                    foreach ($res as $key => $value) {

                        $adid=$value['ad_id'];

                        $assign_id=$value['id'];
                        
                        $date_assign=time();
                        
                        $insertToSup=$dbase->exec("INSERT INTO  operator_ads_assigned (ad_id,admin_id,date_assigned,status) VALUES('$adid','$admin_id','$date_assign','$pending')");
                        if($insertToSup){
                            $assigned_add="yes";
                            //Recording ad as already assigned to someone
                            $update=$dbase->exec("UPDATE supervisor_ads_assigned set assigned='".$assigned_add."' WHERE ad_id='".$adid."'");

                            $error="NO";
                            $erroe_content="Inserted record";
                            $error_message= array('Error' =>$error ,'content'=>$erroe_content );
                            array_push($message,$error_message);

                        }else{
                            $error="Yes";
                            $erroe_content="Record not Inserted";
                            $error_message= array('Error' =>$error ,'content'=>$erroe_content );
                            array_push($message,$error_message);

                        }
                    }

                }else{

                    $error="Yes";
                    $erroe_content="No un assigned ads available or goal greater than the available unassigned ads.";
                    $error_message= array('Error' =>$error ,'content'=>$erroe_content );
                    array_push($message,$error_message);
                }
                

             }


        }


        return $message;
    }

    function getMinWeekDates(){
        $min_weekDates=array('1'=>'1','2'=>8,'3'=>15,'4'=>22,'5'=>28);  

        return $min_weekDates;
    }


    function getWeekfromMonthday($monthdate){
        
        $monthday=date("d",strtotime($monthdate));
          
        $week=0;
        if($monthday <=7){
            $week=1;
        }elseif($monthday >=8 && $monthday <=14 ){
            $week=2;
        }elseif($monthday >=15 && $monthday <=21 ){
            $week=3;
        }elseif($monthday >=22 && $monthday <=28 ){
            $week=4;
        }elseif($monthday >=29 && $monthday <=31 ){
            $week=5;
        }

        return $week;
    }

    function getStartEndOFMonthWeek($week,$year,$month){
        $date_from="";
        $date_to="";

        $formatted_date=$year."-".$month."-"."01";
        $maxMonthDays=date("t",strtotime($formatted_date));
        if($week==1){
            $date_from="".$year."-".$month."-01";
            $date_to="".$year."-".$month."-07";
        }elseif ($week==2) {
            $date_from="".$year."-".$month."-08";
            $date_to="".$year."-".$month."-14";
        }elseif ($week==3) {
            $date_from="".$year."-".$month."-15";
            $date_to="".$year."-".$month."-21";
        }elseif ($week==4) {
            $date_from="".$year."-".$month."-22";
            $date_to="".$year."-".$month."-28";
        }elseif ($week==5) {
            $date_from="".$year."-".$month."-29";
            $date_to="".$year."-".$month."-".$maxMonthDays;
        }

        $dates=array('date_from'=>$date_from,'date_to'=>$date_to);
        return $dates;
    }

    function getYearMonthDates($month,$year){

        $monthName=date("M",strtotime($year."-".$month."-01"));

        $date_from=$year."-".$month."-01";

        $date_to=date("Y-m-t",strtotime($date_from));

        $YearMonth=array('month'=>$monthName,'date_from'=>$date_from,'date_to'=>$date_to);

        return $YearMonth;
      }

    function getUnassigned_numberOf_ads($usertype,$supervisor_id){//supervisor Id is only when we want to know a specific managers number of un assigned ads, For managers number of un assigned ads, its left empty
        global $dbase;
        $count=0;
        $no="no";
        $pending="Pending";     

        if(strcmp($usertype,"Manager")==0){

            $current_user_id=$this->gStringId($_SESSION['admin_id']);//Current user id

            $branch_id=$this->getBranchOfAdmin($current_user_id);//Get current users branch
           
            $super_sel="SELECT count(*) FROM adds WHERE assigned='".$no."' AND status='".$pending."' AND branch_id='".$branch_id."'";
            
        }if(strcmp($usertype,"Supervisor")==0){
            $supervisor_id=$this->gStringId($supervisor_id);

            $super_sel="SELECT count(*) FROM supervisor_ads_assigned WHERE assigned='".$no."' AND status='".$pending."' AND admin_id='".$supervisor_id."'";
            
        }

        $result = $dbase->prepare($super_sel); 
        $result->execute(); 
        $count = $result->fetchColumn();

        return $count;

    }


    function Update_user_notification($work_log_id,$owner_id){
        $response=array();
        $is_inserted="";
        global $dbase;
        
        // $current_user_id=$_SESSION['admin_id'];//Current user id
        // $user_type=$_SESSION['admin_type']; //Admin level

        // $update_time=time();
        // $log_name=$this->clean($log_name);
        
        $stm= $dbase->exec("INSERT INTO admin_notification (admin_work_log_id,admin_id,status) VALUES ('".$owner_id."','".$log_name."','".$current_user_id."','".$update_time."')"); 
        
        if($stm){   
            $is_inserted="true";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        else{   
            $is_inserted="false";
            $res=array(
                'response' =>$is_inserted
            );
            array_push($response,$res);
            
        }
        return $response;
    }

    function getCurrentUserInfo(){
        $current_user_id=$_SESSION['admin_id'];//Current user id

        $user_info=$this->getAdminOfId($current_user_id);

        return $user_info;
    }

    function getAdminSecurityLevel($id){
         global $dbase;

        $sql = "SELECT * FROM admin WHERE id = ". $this->gStringId($id);
        $res = $dbase->query($sql);

        $depatment_id="";
        $position_id="";
        foreach ($res as $row ) {
            $depatment_id=$row['department_id'];
            $position_id=$row['account_type_id'];
        }

        $departInitial=$this->getDepartmentInitial($depatment_id);

        $level=$position_id.$departInitial;

        return $level;
    }

    function getOtherAdmins(){
        global $dbase;
        $current_user_id=$_SESSION['admin_id'];

        $data=array();
        try{
            $sql = "SELECT * FROM admin WHERE id != ". $this->gStringId($current_user_id);
            $res = $dbase->query($sql);

            foreach ($res as $row ) {

                $user_type=$this->getUserTypeOfId($row['id']);

                $city=$this->getCityNameofId($this->gString($row['city_id']));

                $country=$this->getCoutryOfcityId($this->gstring($row['city_id']));

                $department=$this->getDepartmentNameOfId($row['department_id']);

                $securitylevel=$this->getAdminSecurityLevel($this->gString($row['id']));

                $adminarr= array(
                    'id' =>$this->gString($row['id']) ,
                    'first_name' =>$row['first_name'] , 
                    'username' =>$row['username'] , 
                     'country' =>$country ,                 
                    'department' =>$department ,
                    'securitylevel' =>$securitylevel ,
                    'last_name' =>$row['last_name'] , 
                    'avatar' =>$row['avatar'] ,
                    'full_name' =>$row['first_name']." ".$row['last_name'],
                    'company_id' =>$row['company_id'] ,
                    'work_email' =>$row['work_email'] ,
                    'permanent_adress'=>$row['permanent_adress'],
                    'private_email'=>$row['private_email'],
                    'gender'=>$row['gender'],
                    'dob'=>$row['dob'],
                    'user_type'=>$user_type,
                    'phone_number'=>$row['phone_number'],
                    'city'=>$city
                    // 'country'=>$countr
                );
                array_push($data, $adminarr);
            }

            return $data;

        }catch(PDOException $e)
        {
            
        }
        return $res;

    }

    function getAdminOfId($id){
        global $dbase;
        $data=array();
        try{
            $sql = "SELECT * FROM admin WHERE id = ". $this->gStringId($id);
            $res = $dbase->query($sql);

            foreach ($res as $row ) {

                $user_type=$this->getUserTypeOfId($id);

                $city=$this->getCityNameofId($this->gString($row['city_id']));

                // $country=$this->getCoutryOfcityId($this->gstring(19));

                $department=$this->getDepartmentNameOfId($row['department_id']);

                $securitylevel=$this->getAdminSecurityLevel($this->gString($row['id']));

                $branch=$this->getBranchNameOfId($this->getBranchOfAdmin($row['id']));

                $country=$this->getCoutryOfcityId($this->gString($row['city_id']));

                $adminarr= array(
                    
                    'first_name' =>$row['first_name'] ,                    
                    'department' =>$department ,
                    'branch' =>$branch ,
                    'securitylevel' =>$securitylevel ,
                    'last_name' =>$row['last_name'] , 
                    'avatar' =>$row['avatar'] ,
                    'full_name' =>$row['first_name']." ".$row['last_name'],
                    'company_id' =>$row['company_id'] ,
                    'work_email' =>$row['work_email'] ,
                    'permanent_adress'=>$row['permanent_adress'],
                    'private_email'=>$row['private_email'],
                    'gender'=>$row['gender'],
                    'dob'=>$row['dob'],
                    'user_type'=>$user_type,
                    'phone_number'=>$row['phone_number'],
                    'username'=>$row['username'],
                    'city'=>$city,
                    'country'=>$country,
                    'status'=>$row['status'] 
                );
                array_push($data, $adminarr);
            }

            return $data;

        }catch(PDOException $e)
        {
            
        }
        return $res;

    }

    function getCityNameofId($id){
        global $dbase;
        $cityname="";
        $data=array();
        try{
            $sql = "SELECT * FROM city WHERE id = ". $this->gStringId($id);
            $res = $dbase->query($sql);

            foreach ($res as $row ) {
                $cityname=$row['name'];
            }

            return $cityname;

        }catch(PDOException $e)
        {
            
        }
        return $res;
    }


    function getCoutryOfcityId($id){
        global $dbase;
        $country_id="";
        $country_name="";
        $data=array();
        try{
            $sql = "SELECT * FROM city WHERE id = ". $this->gStringId($id);
            $res = $dbase->query($sql);

            foreach ($res as $row ) {
                $country_id=$row['country_id'];
            }
            $country_name=$this->getCoutryOfthisId($this->gString($country_id));
            
            

        }catch(PDOException $e)
        {
            
        }
        return $country_name;
    }

    function getCoutryOfthisId($id){
        global $dbase;
       
        $country_name="";
        $data=array();
        try{
            $sql = "SELECT * FROM country WHERE id = ". $this->gStringId($id);
            $res = $dbase->query($sql);

            foreach ($res as $row ) {
                $country_name=$row['name'];
            }
           

        }catch(PDOException $e)
        {
            
        }
        return $country_name;
    }



// Code written by Henry and Mike
    function getBusinessOfId($id, $has_details = false){
        global $errors;
        global $business;
        global $dbase;

        $thisBusiness = array();
        $keys = array_keys($business);
        foreach($keys as $key){
            $thisBusiness[$key] = $business[$key];
        }

        if(is_numeric($id) && $id > 0 ){
            try{
                $sql = "SELECT * FROM business WHERE id = ". $id;
                $res = $dbase->query($sql);
                foreach ($res as $row ) {
                    foreach ($row as $key => $value) {
                        if(is_numeric($key) == false){
                            if(array_key_exists($key, $thisBusiness)){
                                $thisBusiness[$key] = is_numeric($value) ? intval($value) : $value;
                            }                           
                        }
                    }
                    break;
                }
                //get the user for this business, this is the person who added the business
                //$thisUser  = getUserOfId(intval($thisBusiness["user_id"]));
                //$thisBusiness["user"] = $thisUser;
                //get the owner for this business
                // $thisOwner  = getUserOfId(intval($thisBusiness["owner_id"]));
                // $thisBusiness["owner"] = $thisOwner;
                //the city
                //$thisCity = getCityOfId($thisBusiness["city_id"]);
                /*$thisBusiness["city"] = $thisCity;
                //add other details about the business
                if(is_bool($has_details) && $has_details == true){
                    //categories
                    $thisCategories = getCategoriesOfBusinessOfId($thisBusiness["id"]);
                    $thisBusiness["sub_categories"] =  $thisCategories;
                    //reviews
                    $thisReviews = getReviewsOfBusinessOfId($thisBusiness["id"]);
                    $thisBusiness["reviews"] =  count($thisReviews);
                    //followers
                    $thisFollowers = getFollowersOfBusinessOfId($thisBusiness["id"]);
                    $thisBusiness["followers"] =  $thisFollowers;
                    //photoes
                    $thisPhotoes = getPhotoesOfBusinessOfId($thisBusiness["id"]);
                    $thisBusiness["photoes"] =  $thisPhotoes;
                }*/
                return $thisBusiness;
            }catch(PDOException $e)
            {           
                array_push($errors, $e->getMessage());
            }
        }else{
            array_push($errors, "This business of id : " . $id . ", does not exist");
        }       
        return $thisBusiness;
    }

    public function insertBusiness($model)
    {     
        $querystring= "INSERT INTO business (user_id,date_created,country_id,name,address,city_id,phone_1,phone_2,email,website,banner,description)VALUES ('".$model->getWhoAddedId()."','".$model->getDateAdded()."','".$model->getCountryId()."','".$model->getName()."','".$model->getAddress()."','".$model->getCityId()."','".$model->getPhone1()."','".$model->getPhone2()."','".$model->getEmail()."','".$model->getWebsite()."','".$model->getBanner()."','".$model->getDescription()."')";
        global $dbase;
        $query = $dbase->prepare($querystring); //returns pdo statement object
        try{
            $query->execute();
            $business_id=$dbase->lastInsertId();
            if($model->getSubCategory1Id()!='' && $model->getSubCategory2Id() !='' && $model->getSubCategory3Id() !=''){
                $querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring1);
                $query->execute();
                $querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring2);
                $query->execute();

                $querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
            $query = $dbase->prepare($querystring3);
            $query->execute();


            }
            else if(strcmp($model->getSubCategory1Id(),'')==0 && strcmp($model->getSubCategory2Id(),'')!=0 && strcmp($model->getSubCategory3Id(),'')!=0){

                $querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring2);
                $query->execute();
            $querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
            $query = $dbase->prepare($querystring3);
            $query->execute();


            }else if(strcmp($model->getSubCategory1Id(),'')!=0 && strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')!=0)
            {
                $querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring1);
                $query->execute();

                $querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring3);
                $query->execute();

            }else if (strcmp($model->getSubCategory1Id(),'')!=0 && strcmp($model->getSubCategory2Id(),'')!=0 && strcmp($model->getSubCategory3Id(),'')==0)
            {
                $querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring1);
                $query->execute();
                $querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring2);
                $query->execute();

            }else if(strcmp($model->getSubCategory1Id(),'')==0 && strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')!=0)
            {
                $querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring3);
                $query->execute();

            }else if (strcmp($model->getSubCategory1Id(),'')!=0 &&strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')==0)
            {
                $querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring1);
                $query->execute();

            }else if(strcmp($model->getSubCategory1Id(),'')==0 &&strcmp($model->getSubCategory2Id(),'')!=0 && strcmp($model->getSubCategory3Id(),'')==0)
            {
                $querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring2);
                $query->execute();

            }else
            {

            }
            
            

            echo 'successfully true';
             
            
            

        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        
        

    }
    public function updateBusiness($model,$id)
    {
        $bannerstring = $model->getBanner();
        if(strcmp($bannerstring,'')==0)
        {
            // 'this is the querystring 1';
            $querystring ="UPDATE business SET country_id='".$model->getCountryId()."' ,name='".$model->getName()."',city_id='".$model->getCityId()."',phone_1='".$model->getPhone1()."',phone_2='".$model->getPhone2()."',email='".$model->getEmail()."',website='".$model->getWebsite()."',address='".$model->getAddress()."',description='".$model->getDescription()."' WHERE id ='".$id."'";

        }else{
            //echo 'this is the querystring 2';

        $querystring ="UPDATE business SET country_id='".$model->getCountryId()."' ,name='".$model->getName()."',city_id='".$model->getCityId()."',phone_1='".$model->getPhone1()."',phone_2='".$model->getPhone2()."',email='".$model->getEmail()."',website='".$model->getWebsite()."',banner='".$model->getBanner()."',address='".$model->getAddress()."',description='".$model->getDescription()."' WHERE id ='".$id."'";
        }
        /*$querystring ="UPDATE business SET country_id='".$model->getCountryId()."' ,name='".$model->getName()."',city_id='".$model->getCityId()."',phone_1='".$model->getPhone1()."',phone_2='".$model->getPhone2()."',email='".$model->getEmail()."',website='".$model->getWebsite()."',banner='".$model->getBanner()."',description='".$model->getDescription()."' WHERE id ='".$id."'";*/
        
        /*$querystring= "INSERT INTO business (user_id,date_created,country_id,name,address,city_id,phone_1,phone_2,email,website,banner,description)VALUES ('".$model->getWhoAddedId()."','".$model->getDateAdded()."','".$model->getCountryId()."','".$model->getName()."','".$model->getAddress()."','".$model->getCityId()."','".$model->getPhone1()."','".$model->getPhone2()."','".$model->getEmail()."','".$model->getWebsite()."','".$model->getBanner()."','".$model->getDescription()."')";*/
        global $dbase;
        $query = $dbase->prepare($querystring); //returns pdo statement object
        try{
            $query->execute();
            $business_id=$id;
            /*echo '<br/>';
            echo $model->getSubCategory1Id();
            echo '<br/>';
            echo $model->getSubCategory2Id();
            echo '<br/>';
            echo $model->getSubCategory3Id();

            echo '<br/>';*/

            if(strcmp($model->getSubCategory1Id(),'')!=0 &&strcmp($model->getSubCategory2Id(),'' )!=0 && strcmp($model->getSubCategory3Id() ,'')!=0){
                /*echo '<br/>';
                echo 'am into the first if';
                echo '<br/>';*/
                $delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
                $query = $dbase->prepare($delquery1);
                $query->execute();
                /*echo '<br/>';
                echo 'executed delete';
                echo '<br/>';*/

                $querystring1="INSERT INTO business_category (sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring1);
                $query->execute();
                /*echo '<br/>';
                echo 'after query';
                echo '<br/>';*/
                $querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring2);
                $query->execute();

                $querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring3);
                $query->execute();


            }
            else if(strcmp($model->getSubCategory1Id(),'')==0 && strcmp($model->getSubCategory2Id(),'') !=0 && strcmp($model->getSubCategory3Id(),'') !=0){
                $delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
                $query = $dbase->prepare($delquery1);
                $query->execute();

                $querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring2);
                $query->execute();
                $querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring3);
                $query->execute();


            }else if(strcmp($model->getSubCategory1Id(),'')!=0 && strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')!=0)
            {
                $delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
                $query = $dbase->prepare($delquery1);
                $query->execute();

                $querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring1);
                $query->execute();

                $querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring3);
                $query->execute();

            }else if (strcmp($model->getSubCategory1Id(),'')!=0 &&strcmp($model->getSubCategory2Id(),'')!=0 && strcmp($model->getSubCategory3Id(),'')==0)
            {
                $delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
                $query = $dbase->prepare($delquery1);
                $query->execute();

                $querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring1);
                $query->execute();
                $querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring2);
                $query->execute();

            }else if(strcmp($model->getSubCategory1Id(),'')==0 && strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')!=0)
            {
                $delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
                $query = $dbase->prepare($delquery1);
                $query->execute();

                $querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring3);
                $query->execute();

            }else if (strcmp($model->getSubCategory1Id(),'')!=0 &&strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')==0)
            {
                $delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
                $query = $dbase->prepare($delquery1);
                $query->execute();

                $querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring1);
                $query->execute();

            }else if(strcmp($model->getSubCategory1Id(),'')==0 && strcmp($model->getSubCategory2Id(),'')!=0 && strcmp($model->getSubCategory3Id(),'')==0)
            {
                $delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
                $query = $dbase->prepare($delquery1);
                $query->execute();

                $querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
                $query = $dbase->prepare($querystring2);
                $query->execute();

            }else
            {

            }
        
            return $this->success_alert("successfully updated"); 
            
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        
        

    }


    function getCategoryOfId($category_id){
        global $errors;
        global $category;
        global $dbase;

        $thisCategory = array();
        $keys = array_keys($category);
        foreach($keys as $key){
            $thisCategory[$key] = $category[$key];
        }

        if(is_numeric($category_id) && $category_id > 0 ){
            try{
                $sql = "SELECT * FROM category WHERE id = ". $category_id;
                $res = $dbase->query($sql);
                foreach ($res as $row ) {                   
                    foreach ($row as $key => $value) {
                        if(is_numeric($key) == false){
                            if(array_key_exists($key, $thisCategory)){
                                $thisCategory[$key] = is_numeric($value) ? intval($value) : $value;
                            }                           
                        }
                    }
                    break;
                }
                return $thisCategory;
            }catch(PDOException $e)
            {           
                array_push($errors, $e->getMessage());
            }
        }else{
            array_push($errors, "This category of id : " . $category_id . ", does not exist");
        }       
        return $thisCategory;
    }

    

    function getSubCategoryOfId($sub_category_id){
        global $errors;
        global $subCategory;
        global $dbase;

        $thisSubCategory = array();
        $keys = array_keys($subCategory);
        foreach($keys as $key){
            $thisSubCategory[$key] = $subCategory[$key];
        }

        if(is_numeric($sub_category_id) && $sub_category_id > 0 ){
            try{
                $sql = "SELECT * FROM sub_category WHERE id = ". $sub_category_id;
                $res = $dbase->query($sql);
                foreach ($res as $row ) {                   
                    foreach ($row as $key => $value) {
                        if(is_numeric($key) == false){
                            if(array_key_exists($key, $thisSubCategory)){
                                $thisSubCategory[$key] = is_numeric($value) ? intval($value) : $value;
                            }                           
                        }
                    }
                    break;
                }
                return $thisSubCategory;
            }catch(PDOException $e)
            {           
                array_push($errors, $e->getMessage());
            }
        }else{
            array_push($errors, "This sub category of id : " . $sub_category_id . ", does not exist");
        }       
        return $thisSubCategory;
    }  
        function getCountryOfId($country_id = 0){
        global $errors;
        global $country;
        global $dbase;

        $thisCountry = array();
        $keys = array_keys($country);
        foreach($keys as $key){
            $thisCountry[$key] = $country[$key];
        }

        if(is_numeric($country_id) && $country_id >= 0 ){
            try{
                $sql = "SELECT * FROM country WHERE id = ". $country_id;
                $res = $dbase->query($sql);
                foreach ($res as $row ) {
                    foreach ($row as $key => $value) {
                        if(is_numeric($key) == false){
                            if(array_key_exists($key, $thisCountry)){
                                $thisCountry[$key] = is_numeric($value) ? intval($value) : $value;
                            }                           
                        }
                    }
                    break;
                }
                return $thisCountry;
            }catch(PDOException $e)
            {           
                array_push($errors, $e->getMessage());
            }
        }else{
            array_push($errors, "This country of id : " . $country_id . ", does not exist");
        }       
        return $thisCountry;
    }

    function getCityOfId($city_id = 0){
        global $errors;
        global $city;
        global $dbase;

        $thisCity = array();
        $keys = array_keys($city);
        foreach($keys as $key){
            $thisCity[$key] = $city[$key];
        }

        if(is_numeric($city_id) && $city_id >= 0 ){
            try{
                $sql = "SELECT * FROM city WHERE id = ". $city_id;
                $res = $dbase->query($sql);
                foreach ($res as $row ) {
                    foreach ($row as $key => $value) {
                        if(is_numeric($key) == false){
                            if(array_key_exists($key, $thisCity)){
                                $thisCity[$key] = is_numeric($value) ? intval($value) : $value;
                            }                           
                        }
                    }
                    break;
                }
                //add the country
                $thisCountry = $this->getCountryOfId($thisCity["country_id"]);
                $thisCity["country"] = $thisCountry;
                return $thisCity;
            }catch(PDOException $e)
            {           
                array_push($errors, $e->getMessage());
            }
        }else{
            array_push($errors, "This city of id : " . $city_id . ", does not exist");
        }       
        return $thisCity;
    }

    function success_alert($message){
?>
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">X</a>
                <h6> <?php echo $message; ?></h6>
        </div>
<?php   

    }
    
    function Error_alert($message){
?>
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert">X</a>
                <h6> <?php echo $message; ?></h6>
        </div>
<?php   

    }



    

}



?>






