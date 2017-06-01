<?php 
//send activation code to email 
	// $message = '<h1>Yammzit Confirmation Email</h1> <br/> Thanks for joining yammzit. <br/> Please enter this code to activate your account ' . $code;
	// $subject = 'Yammzit Confirmation Email';
	// $to = $post->email;
	// $tag = "Confirmation";
	// sendTheMail($message,$subject,$to,$tag);
   function sendTheMail($message,$subject,$to,$tag){
   		try{
	   		require_once 'mandrill/src/Mandrill.php';

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
		    array_push($errors, $err);
		    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
		    //throw $e;
		}


   }
   ?>