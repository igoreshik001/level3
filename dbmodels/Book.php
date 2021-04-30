<?php
namespace Models;
use \Illuminate\Database\Eloquent\Model;

class Book extends Model {
	protected $table = "books";
	protected $fillable = array("title", "year", "pages", "description", "views", "wants", "status", "image_link");

	public function authors(){
		return $this->hasMany('Models\Author');
	}
}
?>