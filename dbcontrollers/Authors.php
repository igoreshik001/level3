<?php
namespace Controllers;
use Models\Author;

class Authors {

	public static function add_authors($authors, $book_id) {
		foreach ($authors as $author) {
			$author = preg_replace('/[\[\]<\/>\'"\\\]/', '', $author); //---------something like anti injection)------------------
			if ($author){
				$arr = array(
					"name"=>$author,
					"book_id"=>$book_id
				);
				$data = Author::create($arr);
			}
		}
	}

	public static function get_authors(){
		$data = Author::where('name','one')->get();
		return $data;
	}
} 
?>