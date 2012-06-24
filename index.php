<?php

ini_set('display_errors', 1);

defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('APP_PATH') || define('APP_PATH', realpath(dirname(__FILE__) . DS . 'app'));
defined('CONF_PATH') || define('CONF_PATH', realpath(dirname(__FILE__) . DS . 'conf'));
defined('LIB_PATH') || define('LIB_PATH', realpath(dirname(__FILE__) . DS . 'lib'));

require_once(LIB_PATH . DS . 'bootstrap.php');

$request = new Request();
$dispatcher = new Dispatcher();

$dispatcher->init($request)->dispatch();
