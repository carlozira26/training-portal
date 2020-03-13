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
        
        if($body['edit'] == 1){
            $information = AgentInformationModel::where('id',$body['id'])
                ->update(array(
                    "firstname" => ucwords($body['firstname']),
                    "middlename" => ucwords($body['middlename']),
                    "lastname" => ucwords($body['lastname']),
                    "birthday" => $body['birthday'],
                    "contactnumber" => $body['contactnum'],
                    "address" => $body['address'],
                    "municipality" => $body['municipality'],
                    "gender" => $body['gender'],
                    "civilstatus" => $body['civilstatus'],
                    "educationallevel" => $body['educationallevel'],
                    "coursetaken" => $body['course'],
                    "fdexperience" => $body['fdexperience'],
                    "ccexperience" => $body['ccexperience'],
                    "reference" => $body['reference'],
                    "batchnumber" => $body['batchnum'],
                    "account" => $body['account'],
                    "site" => $body['site'],
                    "trainer" => $body['trainer'],
                    "ctstartdate" => $body['ctstartdate'],
                    "ctenddate" => $body['ctenddate'],
                    "nhipstartdate" => $body['nhipstartdate'],
                    "nhipenddate" => $body['nhipenddate'],
                    "pbdate" => $body['pbdate'],
                    "trainingstatus" => $body['trainingstatus'],
                    "reason" => $body['reasonofattr'],
                    "aht" => $body['aht'],
                    "qagrade" => $body['qagrade'],
                    "totaltc" => $body['totaltc'],
                    "avetc" => $body['avetc'],
                    "complaintcount" => $body['complaintcount'],
                    "complaintovertc" => $body['complaintovertc'],
                    "absencescount" => $body['absencescount'],
                    "tardinesscount" => $body['tardinesscount'],
                    "reliability" => $body['reliability'],
                    "agentsite" => $body['agentsite'],
                    "ngucc" => $body['ngucc'],
                    "ironman" => $body['ironman'],
                    "xavier" => $body['xavier'],
                    "crm" => $body['crm']
                ));
        }else{
            $information = new AgentInformationModel;
            $information->firstname = ucwords($body['firstname']);
            $information->middlename = ucwords($body['middlename']);
            $information->lastname = ucwords($body['lastname']);
            $information->birthday = $body['birthday'];
            $information->contactnumber = $body['contactnum'];
            $information->address = $body['address'];
            $information->municipality = $body['municipality'];
            $information->gender = $body['gender'];
            $information->civilstatus = $body['civilstatus'];
            $information->educationallevel = $body['educationallevel'];
            $information->coursetaken = $body['course'];
            $information->fdexperience = $body['fdexperience'];
            $information->ccexperience = $body['ccexperience'];
            $information->reference = $body['reference'];
            $information->batchnumber = $body['batchnum'];
            $information->account = $body['account'];
            $information->site = $body['site'];
            $information->trainer = $body['trainer'];
            $information->ctstartdate = $body['ctstartdate'];
            $information->ctenddate = $body['ctenddate'];
            $information->nhipstartdate = $body['nhipstartdate'];
            $information->nhipenddate = $body['nhipenddate'];
            $information->pbdate = $body['pbdate'];
            $information->trainingstatus = $body['trainingstatus'];
            $information->reason = $body['reasonofattr'];
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
        }
        $this->response['status'] = true;
		return $this->container->response->withJson($this->response);
    }

    public function FetchTrainee($request, $response, $args){
        $body = $request->getQueryParams();
        $batch = ($_GET['batch']!='All' && $_GET['batch']!='') ? $_GET['batch'] : '';
        $account = ($_GET['account']!='All' && $_GET['account']!='') ? $_GET['account'] : '';
        $site = ($_GET['site']!='All'  && $_GET['site']!='') ? $_GET['site'] : '';

        $information = AgentInformationModel::selectRaw("*");
        if($_GET['account']!='All' && $_GET['account']!=''){
            $information = $information->where('account', $account);
        }
        if($_GET['site']!='All' && $_GET['site']!=''){
            $information = $information->where('site', $site);
        }
        if($_GET['batch']!='All' && $_GET['batch']!=''){
            $information = $information->where('batch', $batch);
        }
        $information = $information->get();

        if(count($information)>0){
            $this->response['data'] = $information;
            $this->response['status'] = true;
        }
        return $this->container->response->withJson($this->response);
    }
}

?>
