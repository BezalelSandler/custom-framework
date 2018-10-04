<?php
/**
 * Created by PhpStorm.
 * User: bezal
 * Date: 03.10.2018
 * Time: 6:21
 */

class Router
{
	protected static $routes = [];
	protected static $route = [];

	public static function add($regexp, $route = []){
		self::$routes[$regexp] = $route;
	}

	public static function getRoutes() {
		return self::$routes;
	}

	public static function getRoute() {
		return self::$route;
	}

	public static function mathRoute($url) {
		foreach (self::$routes as $pattern => $route) {
			if (preg_match('~'.$pattern.'~', $url, $mathes)) {
				self::$route = $route;
				return true;
			}
		}
		return false;
	}

	public static function dispatch($url){
		if (self::mathRoute($url)) {
			echo "OK0";
		} else {
			http_response_code(404);
			require_once '../app/view/404.html';
		}
	}

}