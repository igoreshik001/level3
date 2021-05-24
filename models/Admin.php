<?php
namespace models;

use core\Database;

class Admin
{
	function __construct() {
		$this->admin = new Database();
	}

	public function getAllBooks()
	{
		$cur_page = $this->getCurAdminPage();
		$offset_books = ' OFFSET '.($cur_page*10);
		$sql = "SELECT books.id, books.title, books.year, books.pages, books.description, books.views, books.clicks, books.soft_delete, books.image_link, GROUP_CONCAT(authors.name SEPARATOR '<br>') as author_name FROM `books` LEFT JOIN `authors` ON books.id = authors.book_id WHERE soft_delete=1 GROUP BY books.title ORDER BY books.id LIMIT 10 ".$offset_books;
		$books = $this->admin->get($sql);
		$data = $this->generateBooksBlock($books);
		$data['pagination'] = $this->generatePaginationBlock();

		return $data;
	}

	public function isLoginAdmin()
	{
		if (isset($_GET['logout'])) {
			header("HTTP/1.1 401 Unauthorized");
			header('WWW-Authenticate: Basic realm="Input username and password"');
			header('Content-Type: text/html');
		}

		if (isset($_SERVER['PHP_AUTH_USER'])) {
			$sql = "SELECT COUNT(id) FROM users WHERE name='".$_SERVER['PHP_AUTH_USER']."' AND pass='".$_SERVER['PHP_AUTH_PW']."'";
			$count_users = $this->admin->get($sql);
			if ($count_users[0]['COUNT(id)'] == '1') {
				$_SESSION['login'] = $_SERVER['PHP_AUTH_USER'];
				return true;
			}
		}

		header("HTTP/1.1 401 Unauthorized");
		header('WWW-Authenticate: Basic realm="Input username and password"');
		header('Content-Type: text/html');
		echo "logiiiiiiin please";
		exit();
	}

	private function getCurAdminPage()
	{
		$sql = "SELECT current_page FROM `users` WHERE name = '".$_SERVER['PHP_AUTH_USER']."'";
		$books_page = $this->admin->get($sql);
		return $books_page[0]['current_page'];
	}

	public function changeCurPage($page)
	{
		$sql = "UPDATE users SET current_page = ".$page." WHERE name ='".$_SERVER['PHP_AUTH_USER']."'";
		$res = $this->admin->get($sql);
	}

	public function softDeleteBook()
	{
		$sql = "UPDATE books SET soft_delete = 0 WHERE id =".$_GET['id'];
		$res = $this->admin->get($sql);
	}

	public function addUser($data)
	{
		$sql = "INSERT INTO users (name, pass) VALUES ('".$data['name']."', '".$data['pass']."')";
		$res = $this->admin->add($sql);
		if ($res) {
			$data['result'] = 'Добавили';
		} else {
			$data['result'] = 'Не добавили';
		}
		return $data;
	}

	public function addBook($data)
	{
		$image_path = "images/100.png";

		if ($_FILES["filename"]["name"]) {
			$image_path = "images/".$_FILES["filename"]["name"];//"images/100.png";
			move_uploaded_file($_FILES["filename"]["tmp_name"], $image_path);
		}

		$sql = "SELECT title FROM books WHERE title='".$data["title"]."'";
		$res = $this->admin->get($sql);

		if (!count($res)) {
			$sql = "INSERT INTO books (title, year, pages, description, views, clicks, soft_delete, image_link) VALUES ('".$data["title"]."', ".$data["year"].", ".$data["pages"].", '".$data["description"]."', 0,0,1, '".$image_path."')";
			$res = $this->admin->add($sql);

			$sql = "INSERT INTO authors (name, book_id) VALUES ('".$data["author0"]."', ".$res."); INSERT INTO authors (name, book_id) VALUES ('".$data["author1"]."', ".$res."); INSERT INTO authors (name, book_id) VALUES ('".$data["author2"]."', ".$res.")";
			$res = $this->admin->add($sql);
		}
	}

	private function generateBooksBlock($books)
	{
		$i = 0;
		$data['books'] = '';

		foreach ($books as $key => $value) {
			if(empty($value['author_name'])) {
				$value['author_name'] = 'автор не указан';
			}

			$data['books'] .= "<div id='title_".$i."' class='col-4 border border-dark bg-light'>".$value['title']."</div>
					            <div id='author_".$i."' class='col border border-dark bg-light'>".$value['author_name']."</div>
					            <div id='year_".$i."' class='col-1 border border-dark bg-light'>".$value['year']."</div>
					            <div id='action_".$i."' class='col border border-dark bg-light'><a href='/admin/delete?id=".$value['id']."'>delete</a></div>
					            <div id='clicks_".$i."' class='col-1 border border-dark bg-light'>".$value['clicks']."</div>";
			$i++;
		}
		return $data;
	}

	private function generatePaginationBlock()
	{
		$cur_page = $this->getCurAdminPage();
		
		$sql = "SELECT COUNT(*) FROM `books` WHERE soft_delete=1";
		$count_books = $this->admin->get($sql);
		$count_books = $count_books[0]['COUNT(*)'];
		
		$count_pages = ceil($count_books/10);

		$start = $cur_page - 4;
		if ($start < 0) {
			$start = 0;
		}

		$end = $start + 9;
		if ($end > $count_pages) {
			$end = $count_pages;
			$start = $end-9;
			if ($start < 0) {
				$start = 0;
			}
		}

		if ($cur_page == 0) {
			$pagination = '<li class="page-item disabled"><a class="page-link" href="/admin/0">First</a></li>';
		} else {
			$pagination = '<li class="page-item"><a class="page-link" href="/admin/0">First</a></li>';
		}

		for ($page = $start; $page<$end; $page++) {
			if ($page == $cur_page) {
				$active = 'active';
			} else {
				$active = '';
			}
			$pagination .= '<li class="page-item '.$active.'"><a class="page-link" href="/admin/'.$page.'">'.($page+1).'</a></li>';
		}

		if ($cur_page == $count_pages-1) {
			$pagination .= '<li class="page-item disabled"><a class="page-link" href="/admin/'.($count_pages-1).'">Last</a></li>';
		} else {
			$pagination .= '<li class="page-item"><a class="page-link" href="/admin/'.($count_pages-1).'">Last</a></li>';
		}
		return $pagination;
	}
}