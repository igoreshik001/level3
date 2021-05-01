<?php
namespace Controllers;
use Models\User;

class Users {
	public static function get_cur_page_user() {
		$user = "no_user";
		if(isset($_SESSION['name'])){
			$user = $_SESSION['name'];
		}

		$cur_page = User::where('name', $user)->get('curent_page');
		return $cur_page[0]->curent_page;
	}

	public static function change_cur_page_user($page) {
		$user = "no_user";
		if(isset($_SESSION['name'])){
			$user = $_SESSION['name'];
		}

		$page = preg_replace('/[\[\]<\/>\'"\\\]/', '', $page);
		User::where('name', $user)->update(['curent_page' => $page]);
		return true;
	}

	public static function get_user($hash){
		$user = User::where('hash', $hash)->get('name');
		return $user[0]->name;
	}

	public static function add_user($hash){
		$id = User::max('id');
		$user = false;
		$arr = array(
			"name"=>'user_'.($id+1),
			"hash"=>$hash,
			"curent_page"=>0
		);
		if(empty(User::where('hash', $hash)->first())){
			$user = User::create($arr);
		}
		else{
			$user = 'already';
		}
		return $user;
	}
} 
?>