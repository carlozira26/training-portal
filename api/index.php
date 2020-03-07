<?php
set_time_limit(0);
require __DIR__ . '/vendor/autoload.php';

date_default_timezone_set('Asia/Manila');

$src = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($src);

// Setup functions
require( __DIR__ . '/src/functions.php');

// DB connection
require( __DIR__ . '/src/dbconnect.php');

// CORS Settings
require( __DIR__ . '/src/cors.php');

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

// Register routes
require __DIR__ . '/src/routes.php';

// Controller register
require( __DIR__ . '/src/controllers.php');
// Run app
$app->run();
