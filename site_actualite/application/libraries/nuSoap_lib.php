<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
      class nuSoap_lib{
          function __construct(){
               require_once(str_replace("\\","/",APPPATH).'libraries/NuSOAP/lib/nusoap'.'.php'); //If we are executing this script on a Windows server
          }
      }
?>