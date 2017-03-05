<?php
class Route
{
	static function start()
	{
		// defaults
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// get controller name
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// get action
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// add prefixes
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// get model file
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// get controller class file
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			// redirect 404
			Route::ErrorPage404();
		}
	
		// new controller
		$controller = new $controller_name;
		$action = $action_name;

		if(method_exists($controller, $action))
		{
			$controller->$action($routes[3]);
		}
		else
		{
			Route::ErrorPage404();
		}
	}
	
	function ErrorPage404()
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
?>