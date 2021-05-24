<?php
namespace core;

class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Books';
		$action_name = 'Index';
		$argument = false;
		
		$request_uri = explode('?', $_SERVER['REQUEST_URI']);
		$routes = explode('/', $request_uri[0]);


		// получаем имя контроллера
		if (!empty($routes[1]))	{	
			$controller_name = $routes[1];
		}

		
		// получаем имя экшена
		if (!empty($routes[1])) {
			$action_name = $routes[1];
		}

		// получаем значение аргумента который отправим в фунцию 'action_'.$action_name
		if (isset($routes[2])) {
			$argument = $routes[2];
			if (!is_numeric($argument))	{
				$action_name = $argument;
			}
		}

		// добавляем префиксы
		$controller_name = $controller_name.'Controller';
		$action_name = 'action'.$action_name;

		// подцепляем файл с классом контроллера
		$controller_file = $controller_name.'.php';
		$controller_path = "controllers\\".$controller_file;
		if (file_exists($controller_path)) {
			require_once $controller_path;
			$controller = new $controller_name;
		} else {
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$action = $action_name;
		
		if (method_exists($controller, $action)) {
			// вызываем действие контроллера
			if ($argument!==false) {
				$controller->$action($argument);
			} else {
				$controller->$action();
			}
		} else {
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	}
	
	static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}