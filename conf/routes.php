<?php

$routes = array();

// Route for the Action: index and the Controller: Welcome   
$routes['welcome_index']['_route'] = '/';
$routes['welcome_index']['_controller'] = 'Welcome';
$routes['welcome_index']['_action'] = 'index';

// Route for the Action: show and the Controller: Welcome   
$routes['welcome_show']['_route'] = '/blog/{id}/{slug}';
$routes['welcome_show']['_controller'] = 'Welcome';
$routes['welcome_show']['_action'] = 'show';

