<?php
require ('config.php');
require ('core\Database.php');

use core\Database;

$migrate = new Database();

$list = scandir('migrations/');
$sql = "SHOW TABLES LIKE 'migrations'";
$res = $migrate->get($sql);
$complete_list = '';

if(count($res))
{
	$sql = "SELECT name FROM migrations";
	$complete_list = $migrate->get($sql);
}
$complete_list = json_encode($complete_list);

foreach ($list as $key => $value) {
	if (strrpos($value, '.php') && !strpos($complete_list, $value))
	{
		$sql = file_get_contents('migrations/'.$value);
		$res = $migrate->get($sql);
		$sql = "INSERT INTO `migrations` (name) VALUES ('".$value."')";
		$res = $migrate->get($sql);
		echo $value.PHP_EOL;
	}
}