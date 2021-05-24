<?php
require ('../config.php');
require ('../core\Database.php');

use core\Database;

$books = new Database();
$report = '<База восстановлена: ';
$list = scandir(__DIR__);
$list = array_filter($list, function($value){
								if (strrpos($value, '.sql')) {
									return $value;
								}
							});
sort($list);
var_dump($list);
$sql = file_get_contents($list[count($list)-1]);
$del = $books->get($sql);
echo $report;
exit();