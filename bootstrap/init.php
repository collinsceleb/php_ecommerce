<?php

# Start session if not already started
if(!isset($_SESSION)) session_start();

# Load Environment path
require_once __DIR__.'/../app/config/_env.php';

// Instantiate Database Class
// new \App\Classes\Database();

require_once __DIR__.'/../app/routing/route.php';

// set custom error handler
set_error_handler([new \App\Classes\ErrorHandler(), 'handleErrors']);


new \App\RouteDispatcher($router);