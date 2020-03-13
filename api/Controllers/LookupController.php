<?php
namespace Controllers;
use Models\LookupModel;
use \Firebase\JWT\JWT;

class LookupController
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

    public function Lookup($request, $response, $args) {
		$lookup = LookupModel::get();
		if($lookup){
			$this->response['data'] = $lookup;
			$this->response['status'] = true;
		}
		return $this->container->response->withJson($this->response);
    }

    public function submit($request, $response, $args){
        $body = $request->getParsedBody();
        $type = $body['type'];
        $name = $body['name'];
        $lookup = LookupModel::create(array(
            'type' => strtolower($type),
            'name' => ucwords($name)
        ));
        if($lookup){
            $this->response['status'] = true;
            $this->response['message'] = "Successfully Added!";
        }
        return $this->container->response->withJson($this->response);
    }
}

?>
