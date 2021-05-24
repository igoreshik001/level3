<?php
ini_set('display_errors', 1);
session_start();
require_once 'bootstrap.php';

use core\Route;


$route = new Route;
Route::start();


?>