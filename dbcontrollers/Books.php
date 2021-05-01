<?php
namespace Controllers;
use Models\Book;
class Books {

	public static function show_books_admin($cur_page, $offset = 0) {

		$books = Book::where('status', 1)->skip($cur_page*$offset)->take($offset)->get();
		return $books;
	}

	public static function show_books($cur_page, $offset = 0) {
		if (empty($_SESSION['search'])){
			$books = Book::where('status', 1)->skip($cur_page*$offset)->take($offset)->get();
		}
		else{
			$data = false;
			$i = 0;
			foreach ($_SESSION['search'] as $search) {
				$search = preg_replace('/[\[\]<\/>\'"\\\]/', '', $search);
				if ($i == 0){
					$data = Book::where('description', 'LIKE', '%' . $search . '%')->orWhere('title', 'LIKE', '%' . $search . '%');
				}
				else{
					$data = $data->orWhere('description', 'LIKE', '%' . $search . '%')->orWhere('title', 'LIKE', '%' . $search . '%');
				}
				$i++;
			}
			if ($data->where('status', 1)->count()>0){
				$_SESSION['count_search'] = $data->where('status', 1)->count();
				$books = $data->where('status', 1)->skip($cur_page*$offset)->take($offset)->get();
			}
			else{
				unset($_SESSION['count_search']);
				$books = false;
			}
		}
		return $books;
	}

	public static function get_book($id) {
		if($id){
			$book = Book::where('id', $id)->get();
		}
		else{
			$book = Book::where('status', 1)->get();
		}
		return $book[0];
	}

	public static function count_books() {
		if(empty($_SESSION['count_search'])){
			$count_books = Book::where('status', 1)->count();
		}
		else{
			$count_books = $_SESSION['count_search'];
		}
		return $count_books;
	}

	public static function count_books_admin() {
		$count_books = Book::where('status', 1)->count();
		return $count_books;
	}

	public static function add_books($title, $year, $pages, $description, $views, $wants, $status, $image_link) {
		$arr = array(
			"title"=>$title,
			"year"=>$year,
			"pages"=>$pages,
			"description"=>$description,
			"views"=>$views,
			"wants"=>$wants,
			"status"=>$status,
			"image_link"=>$image_link
		);
		foreach ($arr as $key => $value) {
			if ($key == "image_link"){
				$arr[$key] = preg_replace('/[\[\]<>\'"\\\]/', '', $value);
			}
			else{
				$arr[$key] = preg_replace('/[\[\]<\/>\'"\\\]/', '', $value);
			}
		}
		$books = Book::create($arr);
		return $books;
	}

	public static function delete_book($data) {
		$data = preg_replace('/[\[\]<\/>\'"\\\]/', '', $data);
		if($data){
			Book::where('id', $data)->update(['status' => 0]);
		}
	}

	public static function real_del_books() {
		Book::where('status', 0)->delete();
	}

	public static function change_wants($id) {
		$wants = false;
		if($id){
			$wants = Book::where('id', $id)->increment('wants',1);
		}
		return $wants;
	}

	public static function change_views($id) {
		$views = false;
		if($id){
			$views = Book::where('id', $id)->increment('views',1);
		}
		return $views;
	}

}
?>