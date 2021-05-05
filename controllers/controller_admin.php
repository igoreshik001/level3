<?php


class Controller_Admin extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin();
		$this->view = new View();

//----------------------------------------admin authorization-----------------------------
		if(empty($_SESSION['name'])){
			$_SESSION['name'] = 'login';
			header("HTTP/1.1 401 Unauthorized");
			header('WWW-Authenticate: Basic realm="Input username and password"');
			header('Content-Type: text/html');
			echo "login please";
			exit();
		}
		elseif($_SESSION['name']=='login'){
			$headers = getallheaders();
			if ($this->model->login($headers['Authorization']) == false) {
				unset($_SESSION['name']);
				header('Location: http://localhost/level3/admin');
				exit();
			}
		}
	}
//------------------------------------actions        http://localhost/level3/controller/{action}/value
	function action_index()
	{
		$data = $this->model->get_data();

		$this->view->generate('tmpl_admin_view.php', $data);
	}

	function action_add(){
		$this->model->put_data($_POST);
		$data = $this->model->get_data();
		$this->view->generate('tmpl_admin_view.php', $data);
	}

	function action_delete($id = false){
		$delete=$this->model->delete_data($id);
		$data = $this->model->get_data();
		$this->view->generate('tmpl_admin_view.php', $data);
	}

	function action_page($page = 0){
		$this->model->change_page($page);
		$data = $this->model->get_data();
		$this->view->generate('tmpl_admin_view.php', $data);
	}

	function action_logout(){
		// echo "unset";
		header('Location: http://localhost/level3/book');
		session_unset();
		exit();
	}

	function action_adduser(){
		if (empty($_SESSION['adduser'])){
			$_SESSION['adduser'] = "new user knoking";
			header("HTTP/1.1 401 Unauthorized");
			header('WWW-Authenticate: Basic realm="Input username and password"');
			header('Content-Type: text/html');
			echo "sorry, new user is NOT add<br><br>";
			echo "<a href='http://localhost/level3/admin'>to admin page</a>";
			$headers = getallheaders();
			if (empty($headers['Authorization'])){
				unset($_SESSION['adduser']);
			}
			exit();
		}
		else{
			unset($_SESSION['adduser']);
			$headers = getallheaders();
			if (empty($headers['Authorization'])){
				echo "sorry, new user is NOT add<br><br>";
				echo "<a href='http://localhost/level3/admin'>to admin page3</a>";
				exit();
			}
			if($this->model->add_user($headers['Authorization']) == 'already'){
				echo "sorry, this user is already register<br>";
			}
			else{
				echo "new user is add<br>";
			}
			echo "<a href='http://localhost/level3/admin'>to admin page2</a>";
			exit();
		}
	}
}

?>