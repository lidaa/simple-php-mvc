<?php

$routes = array();



// Route for the Action: edit and the Controller: Welcome
$routes['welcome_edit']['_route'] = '/object/{id}/edit/{ih}/show';
$routes['welcome_edit']['_controller'] = 'Welcome';
$routes['welcome_edit']['_action'] = 'edit';



// Route for the Action: index and the Controller: Welcome   
$routes['welcome_index']['_route'] = '/';
$routes['welcome_index']['_controller'] = 'Welcome';
$routes['welcome_index']['_action'] = 'index';

// Route for the Action: demo and the Controller: Welcome   
$routes['welcome_demo']['_route'] = '/welcome/lidaa';
$routes['welcome_demo']['_controller'] = 'Welcome';
$routes['welcome_demo']['_action'] = 'demo';

