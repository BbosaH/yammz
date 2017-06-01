<?php
	
	require_once __DIR__ . '/Testing News Pool/db_connect.php';

    $db = new DB_CONNECT();	
	function check_changes($item_id){
		$result = mysql_query('SELECT*FROM comment WHERE review_id="'.$item_id.'"');
		$newsrow=mysql_num_rows($result);
		if($newsrow>=1){
			return $newsrow;
		}
		return 0;
	}

	function get_news($item_id){
		$result =mysql_query('SELECT * FROM comment WHERE review_id="'.$item_id.'" ORDER BY date_created DESC LIMIT 50');
			$return = '';
			$newsrow=mysql_num_rows($result);
			if($newsrow>=1){
				while($rows=mysql_fetch_array($result)){
					$return .= '<p>id: '.$rows['id'].' | '.htmlspecialchars($rows['details']).'</p>';
					$return .= '<hr/>';
				}
				return $return;
			}
			
	
	}

	function add_news($title){
	
		if($result=mysql_query('INSERT into comment (id) VALUES ("'.$title.'")')){
			$this->register_changes();
			return TRUE;
		}
		return FALSE;
	}

?>