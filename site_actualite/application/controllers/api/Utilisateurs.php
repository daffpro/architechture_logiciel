<?php 
/*
    Generated by Manuigniter v2.0 
    www.manuigniter.com
*/
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Utilisateurs extends REST_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Utilisateurs_model');
 } 
 /*
* Listing of utilisateurs
 */
public function get_all_post()
{
  try{
  $data['utilisateurs'] = $this->Utilisateurs_model->get_all_utilisateurs();
     if($data['utilisateurs'] && $data['utilisateurs']!=null){
       $utilisateurs_ar = array();
       foreach($data['utilisateurs'] as $u)
       {
       $u_ar = array();
       $u_ar['nom_utilisateur'] = $u['nom_utilisateur'];
       $u_ar['password'] = $u['password'];
       $u_ar['nom'] = $u['nom'];
       $u_ar['prenom'] = $u['prenom'];
       $u_ar['id_profil'] = $u['id_profil'];
       $utilisateurs_ar[] = $u_ar;
       }
       $response = array(
       'status' => 200,
       'message' => 'get all data Succesfully',
       'data' => $utilisateurs_ar,
       );
       $this->response($response, REST_Controller::HTTP_OK);
     }
     else{
       $response = array(
      'status' => 400,
      'message' => 'Detail is not found'
        );
       $this->response($response, REST_Controller::HTTP_OK); 
        }
       } catch (Exception $ex) {
             throw new Exception('Utilisateurs controller_name : Error in get_all_post function - ' . $ex);
        }  
}
 /*
  * Adding a new utilisateurs
  */
 function addnew_post()
 {  
  try{
        $params = array(
            'nom_utilisateur'=> $this->input->post('nom_utilisateur'),
            'password'=> $this->input->post('password'),
            'nom'=> $this->input->post('nom'),
            'prenom'=> $this->input->post('prenom'),
            'id_profil'=> $this->input->post('id_profil'),
            'created_at'=>'',
            'updated_at'=>DATE,
            'deleted_at'=>'',
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
  if(isset($_POST['nom_utilisateur']) && $_POST['nom_utilisateur'] == '' || !isset($_POST['nom_utilisateur']))
                         $this->response(array('status' => 400,'message' => 'nom_utilisateur is require'), REST_Controller::HTTP_OK);
  if(isset($_POST['password']) && $_POST['password'] == '' || !isset($_POST['password']))
                         $this->response(array('status' => 400,'message' => 'password is require'), REST_Controller::HTTP_OK);
  if(isset($_POST['nom']) && $_POST['nom'] == '' || !isset($_POST['nom']))
                         $this->response(array('status' => 400,'message' => 'nom is require'), REST_Controller::HTTP_OK);
  if(isset($_POST['prenom']) && $_POST['prenom'] == '' || !isset($_POST['prenom']))
                         $this->response(array('status' => 400,'message' => 'prenom is require'), REST_Controller::HTTP_OK);
  if(isset($_POST['id_profil']) && $_POST['id_profil'] == '' || !isset($_POST['id_profil']))
                         $this->response(array('status' => 400,'message' => 'id_profil is require'), REST_Controller::HTTP_OK);
        if($this->form_validation->run())  
        {  
            $id_utilisateur= $this->Utilisateurs_model->add_utilisateurs($params);
   $data['utilisateurs'] = $this->Utilisateurs_model->get_utilisateurs($id_utilisateur);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Added',
            'data' => $data
             );
           $this->response($response, REST_Controller::HTTP_OK);
        }
        else
        { 
           $response = array(
            'status' => 400,
            'message' => 'Not Added try again',
            'data' => ''
             );
           $this->response($response, REST_Controller::HTTP_OK);
        }
       } catch (Exception $ex) {
             throw new Exception('Utilisateurs controller_name : Error in new utilisateurs function - ' . $ex);
       }  
 }  
  /*
  * Editing a utilisateurs
 */
  function edit_post($id_utilisateur)
 {   
  try{
   $data['utilisateurs'] = $this->Utilisateurs_model->get_utilisateurs($id_utilisateur);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['utilisateurs']['id_utilisateur']))
      {
        $params = array(
           'nom_utilisateur'=> $this->input->post('nom_utilisateur'),
           'password'=> $this->input->post('password'),
           'nom'=> $this->input->post('nom'),
           'prenom'=> $this->input->post('prenom'),
           'id_profil'=> $this->input->post('id_profil'),
            'created_at'=>'',
            'updated_at'=>'',
            'deleted_at'=>'',
        );
           $this->response(array('status' => 400,'message' => 'nom_utilisateur required'), REST_Controller::HTTP_OK);
           $this->response(array('status' => 400,'message' => 'password required'), REST_Controller::HTTP_OK);
           $this->response(array('status' => 400,'message' => 'nom required'), REST_Controller::HTTP_OK);
           $this->response(array('status' => 400,'message' => 'prenom required'), REST_Controller::HTTP_OK);
           $this->response(array('status' => 400,'message' => 'id_profil required'), REST_Controller::HTTP_OK);
         if($this->form_validation->run())  
           {  
           $this->Utilisateurs_model->update_utilisateurs($id_utilisateur,$params);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Updated',
            'data' => $id_utilisateur
             );
           $this->response($response, REST_Controller::HTTP_OK);
           }
           else
          {
           $response = array(
            'status' => 400,
            'message' => 'Not Updated Try again',
            'data' => $id_utilisateur
             );
           $this->response($response, REST_Controller::HTTP_OK);
          }
  }
       } catch (Exception $ex) {
             throw new Exception('Utilisateurs controller_name : Error in edit_post function - ' . $ex);
        }  
} 
/*
  * Deleting utilisateurs
  */
  function remove_post($id_utilisateur)
   {
  try{
      $utilisateurs = $this->Utilisateurs_model->get_utilisateurs($id_utilisateur);
  // check if the utilisateurs exists before trying to delete it
       if(isset($utilisateurs['id_utilisateur']))
       {
         $this->Utilisateurs_model->delete_utilisateurs($id_utilisateur);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Removed',
            'data' => $id_utilisateur
             );
           $this->response($response, REST_Controller::HTTP_OK);
       }
       else
           $response = array(
            'status' => 400,
            'message' => 'Not Updated Try again',
            'data' => $id_utilisateur
             );
           $this->response($response, REST_Controller::HTTP_OK);
       } catch (Exception $ex) {
             throw new Exception('Utilisateurs controller_name : Error in remove_post function - ' . $ex);
        }  
  }
 }
