<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Login extends CI_Controller {  
      
        function __construct()
        {
            parent::__construct();
            $this->load->model('Utilisateurs_model');
        } 
        public function index()  
        {  
            $this->load->view('admin_login');  
            
        }  
        public function process()  
        {  
            
            $user = $this->input->post('username');  
            $pass = $this->input->post('password'); 
            $loggin = $this->Utilisateurs_model->process($user,$pass); 
            // var_dump($loggin);exit;
            if ($loggin!='' && $loggin!=null)   
            {  
                //declaring session  
                $params=array(
                    "id_utilisateur"  => $loggin['id_utilisateur'],
                    "nom_utilisateur" => $loggin['nom_utilisateur'],
                    "profil" => $loggin['nom_profil'],
                    "current_login" => true,
                );
                $this->session->set_userdata($params); 
                // var_dump($_SESSION); 
                redirect("dashboard");  
            }  
            else{  
                $data['error'] = 'Your Account is Invalid';  
                $this->load->view('admin_login', $data);  
            }  
        }  
        public function logout()  
        {  
            //removing session  
            $this->session->unset_userdata('user');  
            redirect("Login");  
        }  
  
    }  
?> 