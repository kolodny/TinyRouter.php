<?php

class TinyRouter {
	public $routes = array();

	public function __construct($routes, $start_by_default = false) {
		$this->routes = $routes;
		if ($start_by_default) {
			$this->run();
		}
	}
	public function run() {
		$path = preg_replace('#\?.*#', '', $_SERVER['REQUEST_URI']);
		$method = $_SERVER['REQUEST_METHOD'];
		foreach ($this->routes as $route => $callback) {
			list($route_method, $regex) = explode(' ', $route, 2);
			if ($route_method === $method && preg_match("#^$regex$#", $path, $matches)) {
				break;
			}
		}
		$return = call_user_func_array($callback, $matches);
		echo json_encode($return);
	}
}

