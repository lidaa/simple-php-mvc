<?php

defined('APP_PATH') || define('APP_PATH', realpath(dirname(__FILE__) . DS . 'app'));
defined('CONF_PATH') || define('CONF_PATH', realpath(dirname(__FILE__) . DS . 'conf'));
defined('LIB_PATH') || define('LIB_PATH', realpath(dirname(__FILE__)));
defined('PS') || define('PS', PATH_SEPARATOR);
defined('DS') || define('DS', DIRECTORY_SEPARATOR);

set_include_path(
	get_include_path() .
	PS .
	LIB_PATH
);

function init_routes()
{
	require(CONF_PATH . DS . 'routes.php');	
	return $routes;
}

function init_database()
{
	require(CONF_PATH . DS . 'database.php');	
	return $database;
}

function init_app_config()
{
	require(CONF_PATH . DS . 'app.php');
	return $app_config;
}

require_once('Request.php');
require_once('Dispatcher.php');
require_once('Controller.php');
require_once('Model.php');
require_once('Response.php');
