<?
$query = preg_quote(ltrim($_SERVER['REQUEST_URI'], '/'));
var_dump($query);

require_once '../vendor/utils/functions.php';
require_once '../vendor/core/Router.php';

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
/*
if(Router::mathRoute($query)){
	//var_dump(Router::getRoute());
} else {
	echo '404';
}*/