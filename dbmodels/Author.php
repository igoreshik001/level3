<?php
namespace Models;
use \Illuminate\Database\Eloquent\Model;

class Author extends Model {
	protected $table = "authors";
	protected $fillable = array("name", "book_id");

	public function book(){
		return $this->belongsTo('Models\Book');
	}
}

?>