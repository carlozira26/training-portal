<?php
use Slim\Middleware\JwtAuthentication;
use Models\UsersModel;
use Controllers\Utils;

$container = $app->getContainer();
$app->add(new JwtAuthentication([
    "path" => ['/api'], /* or ["/api", "/admin"] */
    "secure" => false, //change this to true if only https are allowed
    "attribute" => "decoded_token_data",
    "relaxed" => ["localhost", "127.0.0.1"],
    "header" => "Authorization",
    "regexp" => "/Bearer\s+(.*)$/i",
    "passthrough" => ['/api/login'],
    "callback" => function($request, $response, $params) use ($container){
        $Utils = new Utils();
        $user = $Utils->getUserFromBearerToken($request, $container);
        return true;
        // var_dump($request);
        // exit();
    },
    "secret" => $container['settings']['jwt']
]));

?>
