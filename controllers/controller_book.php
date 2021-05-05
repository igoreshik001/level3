<?php

class Controller_Book extends Controller
{
	function __construct(){
		$this->model = new Model_Book();
		$this->view = new View();
		$this->unsetSessionIsLogin();
	}


	function action_index()
	{
		$data = $this->model->get_book();
		// var_dump($data);
		// exit();
		$this->view->generate('tmpl_book_view.php', $data);
	}

//------------------------------get book by id-----------------
	function action_id($id){
		$data = $this->model->get_book($id);
		$this->view->generate('tmpl_book_view.php', $data);
	}

//------------------------------change count of clicks on button want-------------
	function action_wants($id){
		$wants = $this->model->change_wants($id);
		echo $wants;
	}
}

?>