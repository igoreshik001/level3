<?php

class Controller_Books extends Controller
{
	function __construct(){
		$this->model = new Model_Books();
		$this->view = new View();
		$this->unsetSessionIsLogin();
	}

//---------------------------------get books on 0 page------------------
	function action_index()
	{
		unset($_SESSION['search']);
		unset($_SESSION['count_search']);
		$this->model->change_page(0);
		$data = $this->model->get_data();

		$this->view->generate('tmpl_books_view.php', $data);
	}

//---------------------------------get books on x page------------------
	function action_page($page = 0){
		$page = $this->model->if_out_of_range($page);
		$this->model->change_page($page);

		$data = $this->model->get_data();
		$this->view->generate('tmpl_books_view.php', $data);
	}

//---------------------------------get searched books on 0 page------------------
	function action_like($searches = false){
		$_SESSION['search'] = explode(" ", $_POST['search']);
		$this->model->change_page(0);
		$data = $this->model->get_data();
		$this->view->generate('tmpl_books_view.php', $data);
	}
}

?>