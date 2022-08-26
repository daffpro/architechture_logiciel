<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Services{
    
    public static function getSecretKey(){
        return getenv('JWT_SECRET_KEY');
    } 

}