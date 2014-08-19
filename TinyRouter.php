<?php

class TinyRouter {
	public $routes = array();
	protected $post_filter;

	public function __construct($routes, $post_filter = null, $start_by_default = false) {
		$this->routes = $routes;
		$this->post_filter = $post_filter;

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
		$result = call_user_func_array($callback, array_slice($matches, 1));
		if (is_callable($this->post_filter)) {
			call_user_func($this->post_filter, $result);
		}
	}
}

