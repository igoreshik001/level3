<?php
require ('define.php');
require __DIR__. '/vendor/autoload.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

use Models\Database;
use Controllers\Books;
$dt = new Database();

Books::real_del_books();

$path = __DIR__;
$date = date("Ymd_H-i-s_");
system('c:\xampp\mysql\bin\mysqldump.exe -uigor -pghjuhfv555 booksdb > '.$path.'\dump_db\\'.$date.'booksdb.sql');

?>