<?php
namespace Models;
use \Illuminate\Database\Eloquent\Model;

class User extends Model {
	protected $table = "users";
	protected $fillable = array("name", "hash", "curent_page");//-------*current_page--------
}

?>