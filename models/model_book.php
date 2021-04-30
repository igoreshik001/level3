<?php
use Controllers\Books;
use Controllers\Users;

class Model_Book extends Model
{

	public function get_book($id = false){

		$this->change_views($id);

		$book = Books::get_book($id);

		$data["{find}"] = "Поищем?";
		$data["{titleBook}"] = $book->title;
		$data["{author}"] = "";
		foreach ($book->authors as $author) {
			if ($author->name){
				$data["{author}"] .= $author->name;
				$data["{author}"] .= "<br>";
			}
		}
		$data["{year}"] = $book->year;
		$data["{wants}"] = $book->wants;
		$data["{views}"] = $book->views;
		$data["{description}"] = $book->description;
		$data["{pages}"] = $book->pages;
		$data["{image_link}"] = $book->image_link;
		$data["{id}"] = $book->id;

		return $data;
	}

	public function change_wants($id){
		$wants = Books::change_wants($id);
		return $wants;
	}

	public function change_views($id){
		$views = Books::change_views($id);
		return $views;
	}

}


?>