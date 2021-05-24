<?php
namespace models;

use core\Database;

class Book
{

	function __construct() {
		$this->book = new Database();
	}


	public function getAllBooks()
	{
		$sql_search = $this->getSearch();
		$cur_page = $this->getCurBooksPage();
		$offset_books = ' OFFSET '.($cur_page*OFFSET_BOOKS_PAGE);

		$sql = "SELECT books.id, books.title, books.year, books.pages, books.description, books.views, books.clicks, books.soft_delete, books.image_link, GROUP_CONCAT(authors.name SEPARATOR '<br>') as author_name FROM `books` LEFT JOIN `authors` ON books.id = authors.book_id WHERE books.soft_delete = 1 ".$sql_search." GROUP BY books.title ORDER BY books.id LIMIT ".OFFSET_BOOKS_PAGE.$offset_books;
		$books = $this->book->get($sql);

		$data = $this->generateBooksBlock($books);
		$data['pagination'] = $this->generatePaginationBlock($cur_page, $sql_search);
		if ($sql_search) {
			$data['find'] = "По запросу (".str_replace(' ', ',', $_SESSION['search']).") нашлись такие книги. Еще поищем?";
		} else {
			$data['find'] = 'Поищем?';
		}

		return $data;
	}

	public function getOneBook($id)
	{
		$sql = "SELECT books.id, books.title, books.year, books.pages, books.description, books.views, books.clicks, books.soft_delete, books.image_link, GROUP_CONCAT(authors.name SEPARATOR ', ') as author_name FROM `books` LEFT JOIN `authors` ON books.id = authors.book_id WHERE books.id = $id";
		$book = $this->book->get($sql);

		if (empty($book[0]['author_name'])) {
			$book[0]['author_name'] = 'автор не указан';
		}
		$book[0]['find'] = 'Поищем?';
		return $book[0];
	}

	public function incrementClicks($id)
	{
		$sql = "UPDATE books SET clicks = clicks + 1 WHERE id =".$id;
		$res = $this->book->get($sql);
	}

	public function incrementViews($id)
	{
		$sql = "UPDATE books SET views = views + 1 WHERE id =".$id;
		$res = $this->book->get($sql);
	}

	public function changeCurPage($page)
	{
		$sql = "UPDATE users SET current_page = ".$page." WHERE name ='cur_page'";
		$res = $this->book->get($sql);
	}

	private function getCurBooksPage()
	{
		$sql = "SELECT current_page FROM `users` WHERE name = 'cur_page'";
		$books_page = $this->book->get($sql);
		return $books_page[0]['current_page'];
	}

	private function getSearch()
	{
		if (isset($_GET['search'])) {
			$_SESSION['search'] = $_GET['search'];
		}

		$sql_search = "";
		if (isset($_SESSION['search'])) {
			$search = explode(' ', $_SESSION['search']);
			$sql_search = " AND (books.title LIKE '%".$search[0]."%' OR books.description LIKE '%".$search[0]."%' OR authors.name LIKE '%".$search[0]."%'";
			for ($i=1; $i < count($search); $i++) { 
				$sql_search .= " OR books.title LIKE '%".$search[$i]."%' OR books.description LIKE '%".$search[$i]."%' OR authors.name LIKE '%".$search[$i]."%' ";
			}
			$sql_search .= ')';
		}
		return $sql_search;
	}

	private function generateBooksBlock($books)
	{
		$i = 0;
		$data['books_html'] = '';
		foreach ($books as $book) {
			if (empty($book['author_name'])) {
				$book['author_name'] = 'автор не указан';
			}

			$data['titleBook'.$i] = $book['title'];
			$data['author'.$i] = $book['author_name'];
			$data['year'.$i] = $book['year'];
			$data['wants'.$i] = $book['clicks'];
			$data['views'.$i] = $book['views'];
			$data['description'.$i] = $book['description'];
			$data['pages'.$i] = $book['pages'];
			$data['image_link'.$i] = $book['image_link'];
			$data['id'.$i] = $book['id'];
			$data['books_html'] .= '<div data-book-id="'.$book['id'].'" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
				<div class="book">
					<a href="/book/'.$book['id'].'"><img src="/'.$book['image_link'].'" alt="'.$book['title'].'">
						<div data-title="'.$book['title'].'" class="blockI" style="height: 46px;">
							<div data-book-title="'.$book['title'].'" class="title size_text">'.$book['title'].'</div>
							<div data-book-author="'.$data['author'.$i].'" class="author">'.$data['author'.$i].'</div>
						</div>
					</a>
				</div>
			</div>';
			$i++;
		}
		return $data;
	}

	private function generatePaginationBlock($cur_page, $sql_search)
	{
		if (isset($_SESSION['search'])) {
			// $sql_search = $this->getSearch();
			$sql = "SELECT COUNT(*) FROM `books` LEFT JOIN `authors` ON books.id = authors.book_id WHERE books.soft_delete = 1 ".$sql_search." GROUP BY books.title ORDER BY books.id";
			$count_books = count($this->book->get($sql));
		} else {
			$sql = "SELECT COUNT(*) FROM `books`";
			$count_books = $this->book->get($sql);
			$count_books = $count_books[0]['COUNT(*)'];
		}

		$count_pages = ceil($count_books/OFFSET_BOOKS_PAGE);

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
			$pagination = '<li class="page-item disabled"><a class="page-link" href="/books/0">First</a></li>';
		} else {
			$pagination = '<li class="page-item"><a class="page-link" href="/books/0">First</a></li>';
		}

		for ($page = $start; $page<$end; $page++) {
			if ($page == $cur_page) {
				$active = 'active';
			} else {
				$active = '';
			}
			$pagination .= '<li class="page-item '.$active.'"><a class="page-link" href="/books/'.$page.'">'.($page+1).'</a></li>';
		}
		if ($cur_page == $count_pages-1) {
			$pagination .= '<li class="page-item disabled"><a class="page-link" href="/books/'.($count_pages-1).'">Last</a></li>';
		} else {
			$pagination .= '<li class="page-item"><a class="page-link" href="/books/'.($count_pages-1).'">Last</a></li>';
		}
		return $pagination;
	}

}