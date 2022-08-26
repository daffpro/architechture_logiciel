<?php
class NuSoapServer extends CI_Controller {
	function __construct() {
	parent::__construct();
	$this->load->library("nuSoap_lib");
	$this->nusoap_server = new soap_server();
	$this->nusoap_server->configureWSDL("MemberWSDL", "urn:MemberWSDL");
	$this->nusoap_server->wsdl->addComplexType(
		"Member",
		"complexType",
		"array",
		"",
		"SOAP-ENC:Array",
		
		array(
		"return"=>array("name"=>"return", "type"=>"xsd:string"),

	)
	);
	$this->nusoap_server->register(
	"getMember",
	array(
	"id" => "xsd:int",
	),
	array("return"=>"tns:Member"),
	"urn:MemberWSDL",
	"urn:MemberWSDL#getMember",
	"rpc",
	"literal",
	"retourne les informations des utilisateurs"
	);
	$this->nusoap_server->register(
		"getUsers",
		array(
			"token" => "xsd:string",
			),
		array("return"=>"tns:Member"),
		"urn:MemberWSDL",
		"urn:MemberWSDL#getUsers",
		"rpc",
		"literal",
		"Returns the information of a certain member"
		);
	$this->nusoap_server->register(
		"checkcredential",
		array(
			"user" => "xsd:string",
			"pass" => "xsd:string",
			
		),
		array("return"=>"tns:Member"),
		    "urn:MemberWSDL",
			"urn:MemberWSDL#getUsers",
			"rpc",
			"literal",
			"Returns the information of a certain member"
	);
	$this->nusoap_server->register(
		"ajouter",
		array(
			"user" => "xsd:string",
			"prenom" => "xsd:string",
			"nom" => "xsd:string",
			"pass" => "xsd:string",
			"token" => "xsd:string",

		),
		array("return"=>"tns:Member"),
		    "urn:MemberWSDL",
			"urn:MemberWSDL#getUsers",
			"rpc",
			"literal",
			"Returns the information of a certain member"
	);
	$this->nusoap_server->register(
		"supprimer",
		array(
			"id" => "xsd:int",
			"token" => "xsd:string",

		),
		array("return"=>"tns:Member"),
		    "urn:MemberWSDL",
			"urn:MemberWSDL#getUsers",
			"rpc",
			"literal",
			"Returns the information of a certain member"
	);
	$this->nusoap_server->register(
		"modifier",
		array(
			"id"=>"xsd:int",
			"user" => "xsd:string",
			"prenom" => "xsd:string",
			"nom" => "xsd:string",
			"pass" => "xsd:string",
			"token" => "xsd:string",

		),
		array("return"=>"tns:Member"),
		    "urn:MemberWSDL",
			"urn:MemberWSDL#getUsers",
			"rpc",
			"literal",
			"Returns the information of a certain member"
	);
	}
	function index() {
	if($this->uri->segment(3) == "wsdl") {
	$_SERVER['QUERY_STRING'] = "wsdl";
	} else {
	$_SERVER['QUERY_STRING'] = "";
	}
	$this->nusoap_server->service(file_get_contents("php://input"));
	}
	function get_member() {
		function getMember($idMember) {
			$CI =& get_instance();
			$CI->load->model("Utilisateurs_model");
			$row = $CI->Utilisateurs_model->get_utilisateurs($idMember);
			return $row;
		}
		function getUsers($token) {
			
			$CI =& get_instance();
			$CI->load->model("Utilisateurs_model");
			$row = $CI->Utilisateurs_model->get_all_with_asso_utilisateurs();
			$key=$CI->Utilisateurs_model->getoken()["key"];
			if($token===$key){
				return $row;
			}
			else{
				header('WWW-Authenticate: Basic realm="WebServer Auth"');
				header('HTTP/1.0 401 Unauthorized');
				die();
				// return $_SERVER;
			}
				
		}
		function checkcredential($user,$pass)
		{
			$user = $user;
			$pass = $pass;
			$CI =& get_instance();
			$CI->load->model("Utilisateurs_model");
			$loggin = $CI->Utilisateurs_model->process($user,$pass);
			if ($loggin!='' && $loggin!=null)   
            {
				return array(
					'Responsecode'=>200,
					"Response"=>$loggin
				);
				
			}
			else
			{
				header('WWW-Authenticate: Basic realm="WebServer Auth"');
				header('HTTP/1.0 401 Unauthorized');
				die();
			}
		}
		function supprimer($id_user,$token)
		{
			$user = $id_user;
			$CI =& get_instance();
			$CI->load->model("Utilisateurs_model");
			$loggin = $CI->Utilisateurs_model->delete_utilisateurs($user);
			$key=$CI->Utilisateurs_model->getoken()["key"];
			if($token===$key){
				if ($loggin!='' && $loggin!=null)   
				{
					return array(
						'Responsecode'=>200,
						"Response"=>"supprime avec succes"
					);
					
				}
				else
				{
					return array(
						'Responsecode'=>400,
						"Response"=>"utilisateur n'existe pas"
					);
				}
			}
			else{
				header('WWW-Authenticate: Basic realm="WebServer Auth"');
				header('HTTP/1.0 401 Unauthorized');
				die();
				// return $_SERVER;
			}
		
		}
		function ajouter($user, $prenom,$nom,$pass,$token)
		{
	
			$CI =& get_instance();
			$CI->load->model("Utilisateurs_model");
			$key=$CI->Utilisateurs_model->getoken()["key"];
			$params=array(
				'nom_utilisateur'=> $user,
				'password'=> $pass,
				'nom'=> $nom,
				'prenom'=> $prenom,
				'id_profil'=> 2,
				'created_at'=>'',
				   'updated_at'=>DATE,
				'deleted_at'=>'',
			);
			$loggin = $CI->Utilisateurs_model->add_utilisateurs($params);
			if($token===$key){
				// return $row;
				if ($loggin!='' && $loggin!=null)   
				{
					return array(
						'Responsecode'=>200,
						"Response"=>"Utilisateur ajouté avec succés[id:".$loggin."]"
					);
					
				}
				else
				{
					return array(
						'Responsecode'=>400,
						"Response"=>"utilisateur n'existe pas"
					);
				}
			}
			else{
				header('WWW-Authenticate: Basic realm="WebServer Auth"');
				header('HTTP/1.0 401 Unauthorized');
				die();
				// return $_SERVER;
			}
				
		
		}
		function modifier($id,$user, $prenom,$nom,$pass,$token)
		{
	
			$CI =& get_instance();
			$CI->load->model("Utilisateurs_model");
			$params=array(
				'nom_utilisateur'=> $user,
				'password'=> $pass,
				'nom'=> $nom,
				'prenom'=> $prenom,	
				'updated_at'=>DATE,
			);
			$loggin = $CI->Utilisateurs_model->update_utilisateurs($id,$params);
			$key=$CI->Utilisateurs_model->getoken()["key"];
			if($token===$key){
				if ($loggin!='' && $loggin!=null)   
				{
					return array(
						'Responsecode'=>200,
						"Response"=>"Utilisateur modifié avec succés"
					);
					
				}
				else
				{
					return array(
						'Responsecode'=>400,
						"Response"=>"utilisateur n'existe pas"
					);
				}
			}
			else{
				header('WWW-Authenticate: Basic realm="WebServer Auth"');
				header('HTTP/1.0 401 Unauthorized');
				die();
				// return $_SERVER;
			}
		}
		$this->nusoap_server->service(file_get_contents("php://input"));
	}
}