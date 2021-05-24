<?php
use models\Book;
use core\View;

class BookController
{
	function __construct(){
		$this->model = new Book();
		$this->view = new View();
	}


	function actionIndex()
	{
		$data = $this->model->get_book();
		$this->view->generate('tmpl_book_view.php', $data);
	}

	function actionBook($id){
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$this->model->incrementClicks($id);
			$data = $this->model->getOneBook($id);
			echo $data['clicks'];
		} elseif ($_SERVER['REQUEST_METHOD']=='GET') {
			$this->model->incrementViews($id);
			$data = $this->model->getOneBook($id);
			$this->view->generate('tmpl_book_view.php', $data);
		}
	}

	function actionWants($id)
	{
		$wants = $this->model->change_wants($id);
		echo $wants;
	}
}