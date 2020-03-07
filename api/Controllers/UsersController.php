<?php
namespace Controllers;
use Models\UsersModel;
use \Firebase\JWT\JWT;
use Controllers\Utils;

class UsersController
{
    protected $container;

    private $response = array(
    	"status" => false,
    	"data" => array(),
    	"message" => ""
    );

    function __construct($container){
        $this->container = $container;
    }

    public function UserAuth($request, $response, $args) {
		$body = $request->getParsedBody();
		// $passwordConverter = $this->container['passwordConverter'];
		// $password = $passwordConverter($body['password']);
		// $user = UsersModel::where('username',$body['username'])->where('password',$password)->where('is_active','Y')->first();

		// $this->response['status'] = (!isset($user)) ? false : true;
		// $this->response['message'] = (!isset($user)) ? "Invalid Credential" : "";
		
		// if(isset($user)){
		// 	$this->response['token'] = JWT::encode(
		// 		$user['token'],
		// 		$this->container['settings']['jwt']
		// 	);
		// }
		return $this->container->response->withJson($body);
    }
}

?>
