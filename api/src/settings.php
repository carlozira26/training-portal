<?php

return array(
    'settings' => array(
        'determineRouteBeforeAppMiddleware' => true,
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'corsPath' => '/api',
        'jwt' => 'jfcpass',
        'jwtalgo' => array('HS256'),
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'training_portal',
            'username' => 'root',
            'password' => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ],
        'baseURL' => 'http://localhost/training-portal/api',
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
        ],
        "uploadDirectory" => str_replace(DIRECTORY_SEPARATOR."settings", "", __DIR__) . DIRECTORY_SEPARATOR . 'uploads'.DIRECTORY_SEPARATOR,
    ),
);
