<?php
require ('config.php');

$list_of_fils = scandir('dump_db');
$file = $list_of_fils[count($list_of_fils)-1];
$path = __DIR__;
system('c:\xampp\mysql\bin\mysql.exe -uigor -pghjuhfv555 booksdb < '.$path.'\dump_db\\'.$file);