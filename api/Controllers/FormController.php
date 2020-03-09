<?php
namespace Controllers;
use \Firebase\JWT\JWT;
use \Models\AgentInformationModel;
class FormController
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

    public function SubmitForm($request, $response, $args) {
		$body = $request->getParsedBody();
        $information = new AgentInformationModel;

        $information->firstname = $body['firstname'];
        $information->middlename = $body['middlename'];
        $information->lastname = $body['lastname'];
        $information->birthday = $body['birthday'];
        $information->contactnumber = $body['contactnumber'];
        $information->address = $body['address'];
        $information->municipality = $body['municipality'];
        $information->gender = $body['gender'];
        $information->civilstatus = $body['civilstatus'];
        $information->educationallevel = $body['educationallevel'];
        $information->coursetaken = $body['coursetaken'];
        $information->fdexperience = $body['fdexperience'];
        $information->ccexperience = $body['ccexperience'];
        $information->reference = $body['reference'];
        $information->batchnumber = $body['batchnumber'];
        $information->account = $body['account'];
        $information->site = $body['site'];
        $information->trainer = $body['trainer'];
        $information->ctstartdate = $body['ctstartdate'];
        $information->ctenddate = $body['ctenddate'];
        $information->nhipstartdate = $body['nhipstartdate'];
        $information->nhipenddate = $body['nhipenddate'];
        $information->pbdate = $body['pbdate'];
        $information->trainingstatus = $body['trainingstatus'];
        $information->reason = $body['reason'];
        $information->aht = $body['aht'];
        $information->qagrade = $body['qagrade'];
        $information->totaltc = $body['totaltc'];
        $information->avetc = $body['avetc'];
        $information->complaintcount = $body['complaintcount'];
        $information->complaintovertc = $body['complaintovertc'];
        $information->absencescount = $body['absencescount'];
        $information->tardinesscount = $body['tardinesscount'];
        $information->reliability = $body['reliability'];
        $information->agentsite = $body['agentsite'];
        $information->ngucc = $body['ngucc'];
        $information->ironman = $body['ironman'];
        $information->xavier = $body['xavier'];
        $information->crm = $body['crm'];
        $information->save();

		return $this->container->response->withJson($body);
    }
}

?>
