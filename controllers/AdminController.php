<?php
use models\Admin;
use core\View;

class AdminController
{
	function __construct()
	{
		$this->model = new Admin();
		$this->view = new View();
		$this->model->isLoginAdmin();
	}

	function actionIndex()
	{
		$data = $this->model->get_book();
		$this->view->generate('tmpl_book_view.php', $data);
	}

	function actionAdmin($page = 0)
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->model->addBook($_POST);
			$data = $this->model->getAllBooks();
			$this->view->generate('tmpl_admin_view.php', $data);
		} elseif ($_SERVER['REQUEST_METHOD']=='GET') {
			$this->model->changeCurPage($page);
			$data = $this->model->getAllBooks();
			$this->view->generate('tmpl_admin_view.php', $data);
		}
	}


	function actionDelete()
	{
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$this->model->softDeleteBook();
		}
		header('Location: /admin');
	}

	function actionAdduser()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = $this->model->addUser($_POST);
			$this->view->generate('tmpl_adduser_view.php', $data);
		} elseif ($_SERVER['REQUEST_METHOD']=='GET') {
			$data['result'] = '';
			$this->view->generate('tmpl_adduser_view.php', $data);
		}
	}
}