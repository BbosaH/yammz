<?php
 //echo "the new style";
 //exit(0);

	try {

	require_once 'mandrill/src/Mandrill.php';

	$mandrill = new Mandrill('T0bQDPYGxH5Jf3hXgX_ldA');

	$message = array(
        'html' => '<p>Example HTML content</p> <br/> Thank you for joining us Gasta Kevin from yammzit, this mail cost 2,500 ugx to be sendable, so use it wisely ',
        'text' => 'Thank you for joining us Mike Nyola, this mail cost 1,500 ugx to send so use it wisely ',
        'subject' => 'Yammzit mobile app',
        'from_email' => 'postmaster@yammzit.com',
        'from_name' => 'Nyola Mike',
        'to' => array(
            array(
                'email' => 'kevingasta@gmail.com',
                'name' => 'Kevin Gasta',
                'type' => 'to'
            ),
            array(
                'email' => 'nyolamike@live.com',
                'name' => 'Nyola Mike',
                'type' => 'to'
            ),
            array(
                'email' => 'yammz.co@gmail.com',
                'name' => 'Yammzit',
                'type' => 'to'
            ),
            array(
                'email' => 'quisoplay@gmail.com',
                'name' => 'Yammzit',
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
                'rcpt' => 'kevingasta@gmail.com',
                'vars' => array(
                    array(
                        'name' => 'merge2',
                        'content' => 'merge2 content'
                    )
                )
            )
        ),
        'tags' => array('password-resets'),
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
    echo $send_at . "<br/>";
    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
    print_r($result);

    }catch(Mandrill_Error $e) {
	    // Mandrill errors are thrown as exceptions
	    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
	    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
	    throw $e;
	}

	exit(0);



	require("mobile/vendor/autoload.php");

	use \DrewM\MailChimp\MailChimp;

	$MailChimp = new MailChimp('b1e580d6ba2fe65f58a61934fa7fb79b-us13');

	echo $MailChimp->getLastError();

	//var_dump($MailChimp);

	$result = $MailChimp->get('lists/a8ded499b0');

	//print_r($result);

	$list_id = 'a8ded499b0';

	$result = $MailChimp->post("lists/$list_id/members", [
        'email_address' => 'kevingasta@gmail.com',
        'status'        => 'subscribed',
    ]);

	print_r($result);
	
	exit(0);

	$name = "friday";
	$foo = array("stain" => "this is like sheet itself");
	$tip =  <<<EOT
	My name is "$name". I am printing some.
	Now, I am printing some {$foo["stain"]}.
	This should print a capital 'A': \x41
EOT;
	echo $tip;
	exit(0);

	$r = date("Y/m/d H:i:s",1458359400);
    $d = time($r);
    $s = date("Y/m/d H:i:s",$d);
    var_dump($r);
    echo "<hr/><br/>";
    var_dump($d);
    echo "<hr/><br/>";
    var_dump($s);
    echo "<hr/><br/>";
	exit(0);

	//include data base connection
	include_once("mobile/db_connection.php");
	
	//include the utility
	include_once("mobile/utility.php");
	//this is open anyone can have access

	//load settings
	loadSettings();

	$results = array(
		"sponsored" => array(),
		"found" => array()
	);

	$results = array(
		"sponsored" => array(),
		"found" => array()
	);


	//get the query
	$query = "";
	if(isset($_REQUEST['query'])){
		$query = $_REQUEST['query'];
	}else{
		array_push($errors, "You need to supply a query");
	}

	//you can only continue if there are no errors though
	if(count($errors) == 0){
		try{
		  $foundIds = array();
		  //search from businesses table
		  $sql = "SELECT *  FROM business WHERE (
		    CONVERT(name USING utf8) LIKE '%".$query."%' OR
		    CONVERT(address USING utf8) LIKE '%".$query."%' OR
		    CONVERT(phone_1 USING utf8) LIKE '%".$query."%' OR
		    CONVERT(phone_2 USING utf8) LIKE '%".$query."%' OR
		    CONVERT(email USING utf8) LIKE '%".$query."%' OR
		    CONVERT(website USING utf8) LIKE '%".$query."%' OR
		    CONVERT(location USING utf8) LIKE '%".$query."%' OR
		    CONVERT(description USING utf8) LIKE '%".$query."%'
		  )";
		  echo $sql;
		  $res = $conn->query($sql);
		  foreach ($res as $row ) {
		    if(!(in_array($row["id"], $foundIds))){
		      array_push($foundIds,$row["id"]);
		    }
		  }
		  
		  
		  //search from categories
		  //$sql = "SELECT * FROM business_category WHERE sub_category_id = " . $sub_category_id ;
		  
		  //search from country
		  
		  //search from city
		  
		  
			
		  for($i = 0; $i < count($foundIds);  $i++ ) {
		    	$business_id = intval($foundIds[$i]);
		    	$thisBusiness = getBusinessOfId($business_id, true);
		    	array_push($results["found"], $thisBusiness);
			}
		  

			//get sponsored results
			$results["sponsored"] = getSponsoredSearchResults();
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
	}

	var_dump($results);


?>

