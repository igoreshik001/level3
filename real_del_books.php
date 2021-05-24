<?php
require ('config.php');
require ('core\Database.php');

use core\Database;

$books = new Database();
$sql = "SELECT id, title FROM books WHERE soft_delete=0";
$del = $books->get($sql);
$del_sql = '';
$report = 'Удалены книги: ';
if (count($del)) {
	$i = 0;
	foreach ($del as $key => $value) {
		if ($i == 0){
			$del_sql .= 'WHERE book_id='.$value['id'];
		}
		else
		{
			$del_sql .= ' OR book_id='.$value['id'];
		}
		$report = $report.$value['title'].', ';
		$i++;
	}
	$sql = "DELETE FROM books WHERE soft_delete=0";
	$books->get($sql);

	$sql = "DELETE FROM authors ".$del_sql;
	$books->get($sql);
}
echo $report;
exit();