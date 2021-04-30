<?php
use Controllers\Books;
use Controllers\Users;

class Model_Books extends Model
{

//---------------------------------get books-------------------------
	public function get_data()
	{
		$cur_page_user = Users::get_cur_page_user();
		$books = Books::show_books($cur_page_user, OFFSET_BOOKS_PAGE);
		if ($books){
			if(empty($_SESSION['count_search'])){
				$data["{find}"] = "Поищем?";
			}
			else{
				$data["{find}"] = "Вот что нашлось! Еще поищем?";
			}
		}
		else{
			$data["{find}"] = "Ой, таких книг нет! Еще поищем?";
			unset($_SESSION['search']);
			$books = Books::show_books($cur_page_user, OFFSET_BOOKS_PAGE);
		}
		$count_pages = ceil(Books::count_books()/OFFSET_BOOKS_PAGE);

		//-------------------------------------------PAGINATION-----------------------------------------------------------------------

		$start = $cur_page_user - 4;
		if($start < 0){
			$start = 0;
		}

		$end = $start + 9;
		if($end > $count_pages){
			$end = $count_pages;
			$start = $end-9;
			if($start < 0){
				$start = 0;
			}
		}

		if($cur_page_user == 0){
			$data["{pagination}"] = "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"/level3/books/page/0\">First</a></li>";
		}
		else{
			$data["{pagination}"] = "<li class=\"page-item\"><a class=\"page-link\" href=\"/level3/books/page/0\">First</a></li>";
		}

		for($page = $start; $page<$end; $page++){
			if($page == $cur_page_user){
				$active = "active";
			}
			else{
				$active = "";
			}
			$data["{pagination}"] .= "<li class=\"page-item ".$active."\"><a class=\"page-link\" href=\"/level3/books/page/".$page."\">".($page+1)."</a></li>";
		}
		if($cur_page_user == $count_pages-1){
			$data["{pagination}"] .= "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"/level3/books/page/".($count_pages-1)."\">Last</a></li>";
		}
		else{
			$data["{pagination}"] .= "<li class=\"page-item\"><a class=\"page-link\" href=\"/level3/books/page/".($count_pages-1)."\">Last</a></li>";
		}

		//-------------------------------------------/END PAGINATION---------------------------------------------------------------



		$i=0;
		$data["{books_html}"] = "";
		foreach ($books as $book) {

			$data["{titleBook".$i."}"] = $book->title;
			$data["{author".$i."}"] = "";
			foreach ($book->authors as $author) {
				if ($author->name){
					$data["{author".$i."}"] .= $author->name;
					$data["{author".$i."}"] .= "<br>";
				}
			}
			$data["{year".$i."}"] = $book->year;
			$data["{wants".$i."}"] = $book->wants;
			$data["{views".$i."}"] = $book->views;
			$data["{description".$i."}"] = $book->description;
			$data["{pages".$i."}"] = $book->pages;
			$data["{image_link".$i."}"] = $book->image_link;
			$data["{id".$i."}"] = $book->id;
			$data["{books_html}"] .= "<div data-book-id=\"$book->id\" class=\"book_item col-xs-6 col-sm-3 col-md-2 col-lg-2\">
                    <div class=\"book\">
                        <a href=\"http://localhost/level3/book/id/$book->id\"><img src=\"http://localhost/level3/$book->image_link\" alt=\"$book->title\">
                            <div data-title=\"$book->title\" class=\"blockI\" style=\"height: 46px;\">
                                <div data-book-title=\"$book->title\" class=\"title size_text\">$book->title</div>
                                <div data-book-author=\"".$data['{author'.$i.'}']."\" class=\"author\">".$data['{author'.$i.'}']."</div>
                            </div>
                        </a>
                    </div>
                </div>";
			$i++;
		}

		for ($j = $i; $j<10; $j++) {
			$data["{titleBook}"] = "";
			$data["{author}"] = "";
			$data["{year}"] = "";
			$data["{wants}"] = "";
			$data["{views}"] = "";
			$data["{description}"] = "";
			$data["{pages}"] = "";
			$data["{image_link}"] = "";
			$data["{id}"] = "";
		}
		return $data;
	}

	public function change_page($page){
		Users::change_cur_page_user($page);
	}

	public function if_out_of_range($page){
		if(empty($_SESSION['count_search'])){
			$count_pages = ceil(Books::count_books()/OFFSET_BOOKS_PAGE);
		}
		else{
			$count_pages = ceil($_SESSION['count_search']/OFFSET_BOOKS_PAGE);
		}
		if ($page >= $count_pages){
			$page = $count_pages-1;
		}
		elseif ($page < 0) {
			$page = 0;
		}
		return $page;
	}
}
?>