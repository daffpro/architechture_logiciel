<?php
class client extends CI_Controller {

    public function index(){
        // $this->load->model('Utilisateurs_model');
        require_once(str_replace("\\","/",APPPATH).'libraries/NuSOAP/lib/nusoap'.'.php'); //If we are executing this script on a Windows server
        $client= new nusoap_client('http://localhost/site_actualite/index.php/soap/nuSoapServer/getMembers?wsdl','wsdl');
        // var_dump($client);
        $error = $client->getError();
        echo $error;
        if($error){
            echo $error;
        }
        $res = $client->call("get_member");
        if($client->fault){
            echo $client->fault;
        }else{
            $data = json_decode($res);
            var_dump($res);
        }
    }
   
 
    
    }

