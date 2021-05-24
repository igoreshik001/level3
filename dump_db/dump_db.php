<?php
require ('../config.php');

$path = __DIR__;
$date = date("Ymd_H-i-s_");
$command = DUMPSQL_PATH.'\mysqldump.exe -uigor -pghjuhfv555 booksdb > '.$path.'\\'.$date.'booksdb.sql';
$res = system($command);