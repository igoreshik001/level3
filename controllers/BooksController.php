<?php
use models\Book;
use core\View;

class BooksController
{
	function __construct()
	{
		$this->model = new Book();
		$this->view = new View();
	}

	function actionIndex()
	{
		unset($_SESSION['search']);
		$this->model->changeCurPage(0);
		$data = $this->model->getAllBooks();
		$this->view->generate('tmpl_books_view.php', $data);
	}

	function actionBooks($page = 0)
	{
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			
		} elseif ($_SERVER['REQUEST_METHOD']=='GET') {
			$this->model->changeCurPage($page);
			$data = $this->model->getAllBooks();
			$this->view->generate('tmpl_books_view.php', $data);
		}
	}

	function actionWants($id)
	{
		$wants = $this->model->change_wants($id);
		echo $wants;
	}
}