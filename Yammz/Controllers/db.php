<?php 
	class db{
		public $db;
		
		function check_changes(){
			$result = $this->db->query('SELECT counting FROM news WHERE id=1');
			if($result = $result->fetch_object()){
				return $result->counting;
			}
			return 0;
		}	
		
		function register_changes(){
			$this->db->query('UPDATE news SET counting = counting + 1 WHERE id=1');
		
		function get_news(){
			if($result = $this->db->query('SELECT * FROM news WHERE id<>1 ORDER BY add_date DESC LIMIT 50')){
				$return = '';
				while($r = $result->fetch_object()){
					$return .= '<p>id: '.$r->id.' | '.htmlspecialchars($r->title).'</p>';
					$return .= '<hr/>';
				}
				return $return;
			}
		}
		
		function add_news($title){
			$title = $this->db->real_escape_string($title);
			if($this->db->query('INSERT into news (title) VALUES ("'.$title.'")')){
				$this->register_changes();
				return TRUE;
			}
			return FALSE;
		}
		
		
	}


?>