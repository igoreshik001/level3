<?php
require __DIR__. '/vendor/autoload.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

use Models\Database;
// use Controllers\Books;
$dt = new Database();

Route::start(); // запускаем маршрутизатор
?>