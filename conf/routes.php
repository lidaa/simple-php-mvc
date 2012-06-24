<?php

$routes = array();

// Route for the Action: index and the Controller: Welcome   
$routes['welcome_index']['_route'] = '/';
$routes['welcome_index']['_controller'] = 'Welcome';
$routes['welcome_index']['_action'] = 'index';

// Route for the Action: demo and the Controller: Default   
$routes['welcome_demo']['_route'] = '/welcome/lidaa';
$routes['welcome_demo']['_controller'] = 'Welcome';
$routes['welcome_demo']['_action'] = 'demo';

// Route for the Action: hello and the Controller: default
//$routes['default_hello'][_route] = '/welcome/:name';
//$routes['default_hello'][_controller] = 'default';
//$routes['default_hello'][_action] = 'hello';
