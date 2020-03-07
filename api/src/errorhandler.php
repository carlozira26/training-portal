<?php

$container = $app->getContainer();


//404 Error
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $response->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('API url not found');
    };
};

// PHP Runtime Error
$container['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $error) use ($c) {
        return $response->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write(var_dump($error));
    };
};

?>
