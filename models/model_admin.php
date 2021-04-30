<?php
use Controllers\Books;
use Controllers\Users;
use Controllers\Authors;

class Model_Admin extends Model
{

//-------------------------------------get books--------------------
	public function get_data()
	{
		$cur_page_user = Users::get_cur_page_user();
		$books = Books::show_books_admin($cur_page_user, OFFSET_ADMIN_PAGE);
		$count_pages = ceil(Books::count_books_admin()/OFFSET_ADMIN_PAGE);

//----------------calculation count pages for pagination---------------------
		$start = $cur_page_user - 4;
		if($start < 0){
			$start = 0;
		}

		$end = $start + 9;
		if($end > $count_pages){
			$end = $count_pages;
			$start = $end-9;
			if($start < 0){
				$start = 0;
			}
		}

//----------------making html pagination-----------------------------------
		if($cur_page_user == 0){
			$data["{pagination}"] = "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"/level3/admin/page/0\">First</a></li>";
		}
		else{
			$data["{pagination}"] = "<li class=\"page-item\"><a class=\"page-link\" href=\"/level3/admin/page/0\">First</a></li>";
		}

		for($page = $start; $page<$end; $page++){
			if($page == $cur_page_user){
				$active = "active";
			}
			else{
				$active = "";
			}
			$data["{pagination}"] .= "<li class=\"page-item ".$active."\"><a class=\"page-link\" href=\"/level3/admin/page/".$page."\">".($page+1)."</a></li>";
		}
		if($cur_page_user == $count_pages-1){
			$data["{pagination}"] .= "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"/level3/admin/page/".($count_pages-1)."\">Last</a></li>";
		}
		else{
			$data["{pagination}"] .= "<li class=\"page-item\"><a class=\"page-link\" href=\"/level3/admin/page/".($count_pages-1)."\">Last</a></li>";
		}


//----------------------generete placeholders html----------------------
		$i=0;
		foreach ($books as $book) {
			$data["{title".$i."}"] = $book->title;
			$data["{author".$i."}"] = "";
			foreach ($book->authors as $author) {
				if ($author->name){
					$data["{author".$i."}"] .= $author->name;
					$data["{author".$i."}"] .= "<br>";
				}
			}
			$data["{year".$i."}"] = $book->year;
			$data["{clicks".$i."}"] = $book->wants;
			$data["{id_".$i."}"] = "<a href=\"/level3/admin/delete/".$book->id."\">delete</a>";
			$i++;
		}

		for ($j = $i; $j<10; $j++) {
			$data["{title".$j."}"] = "";
			$data["{author".$j."}"] = "";
			$data["{year".$j."}"] = "";
			$data["{clicks".$j."}"] = "";
			$data["{id_".$j."}"] = "";
		}
		return $data;
	}

//--------------------------------put new book in DB------------------
	public function put_data($data){
		$image_path = "images/100.png";
		if($_FILES["filename"]["name"]){
			$image_path = "images/".$_FILES["filename"]["name"];//"images/100.png";
			move_uploaded_file($_FILES["filename"]["tmp_name"], $image_path);
		}
		$books = Books::add_books($data["title"], $data["year"], $data["pages"], $data["description"], 0, 0, 1, $image_path);
		$authors = [$data["author0"], $data["author1"], $data["author2"]];
		Authors::add_authors($authors, $books->id);
	}

//-----------------------------soft delete book----------------------
	public function delete_data($data){
		Books::delete_book($data);
	}

	public function change_page($data){
		Users::change_cur_page_user($data);
	}

	public function login($hash){
		$user = Users::get_user($hash);
		if($user){
			$_SESSION['name'] = $user;
			return $user;
		}
		else{
			return false;
		}
	}

//----------------------------add new admin--------------------------
	public function add_user($hash = false){
		$user = false;
		if ($hash){
			$user = Users::add_user($hash);
		}
		return $user;
	}
}
?>