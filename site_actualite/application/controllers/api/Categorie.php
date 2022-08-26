<?php 
/*
    Generated by Manuigniter v2.0 
    www.manuigniter.com
*/
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Categorie extends REST_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Categorie_model');
 } 
 /*
* Listing of categorie
 */

  function token_get(){
    $this->load->library('Token');
    return $this->Token->token_get();
  }

  // GET ARTICLE
  // function index_get(){
  //   $token = $this->token_get(); // added this line
  //   $data = $this->Api_model->get_all_article();
  //   return $this->response($data,200);
  // }
  public function get_all()
  {
    try{
           $data['categorie'] = $this->Categorie_model->get_all_categorie();
      if($data['categorie'] && $data['categorie']!=null){
        $categorie_ar = array();
        foreach($data['categorie'] as $c)
        {
            $c_ar = array();
            $c_ar['id_categorie'] = $c['id_categorie'];
            $c_ar['nom_categorie'] = $c['nom_categorie'];
            $c_ar['description'] = $c['description'];
            $c_ar['created_at'] = $c['created_at'];
            $c_ar['updated_at'] = $c['updated_at'];
            $c_ar['deleted_at'] = $c['deleted_at'];
            $categorie_ar[] = $c_ar;
        }
        $response = array(
            'status' => 200,
            'message' => 'get all data Succesfully',
            'data' => $categorie_ar,
        );
        $this->response($response, REST_Controller::HTTP_OK);
        // $this->load->view('xml/response',$categorie_ar);
      }
      else{
        $response = array(
        'status' => 400,
        'message' => 'Detail is not found'
          );
        $this->response($response, REST_Controller::HTTP_OK); 
          }
    } catch (Exception $ex) {
              throw new Exception('Categorie controller_name : Error in get_all function - ' . $ex);
          }  
  }
 /*
  * Adding a new categorie
  */
 function addnew()
 {  
  try{
      $params = array(
       'nom_categorie'=> $this->input->post('nom_categorie'),
       'description'=> $this->input->post('description'),
       'created_at'=> $this->input->post('created_at'),
       'updated_at'=> $this->input->post('updated_at'),
       'deleted_at'=> $this->input->post('deleted_at'),
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       if(isset($_POST) && count($_POST) > 0)     
        {  
            $id_categorie= $this->Categorie_model->add_categorie($params);
   $data['categorie'] = $this->Categorie_model->get_categorie($id_categorie);
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
             throw new Exception('Categorie controller_name : Error in new categorie function - ' . $ex);
       }  
 }  
  /*
  * Editing a categorie
 */
  function edit($id_categorie)
 {   
  try{
   $data['categorie'] = $this->Categorie_model->get_categorie($id_categorie);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['categorie']['id_categorie']))
      {
        $params = array(
           'nom_categorie'=> $this->input->post('nom_categorie'),
           'description'=> $this->input->post('description'),
           'created_at'=> $this->input->post('created_at'),
           'updated_at'=> $this->input->post('updated_at'),
           'deleted_at'=> $this->input->post('deleted_at'),
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->Categorie_model->update_categorie($id_categorie,$params);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Updated',
            'data' => $id_categorie
             );
           $this->response($response, REST_Controller::HTTP_OK);
           }
           else
          {
           $response = array(
            'status' => 400,
            'message' => 'Not Updated Try again',
            'data' => $id_categorie
             );
           $this->response($response, REST_Controller::HTTP_OK);
          }
  }
       } catch (Exception $ex) {
             throw new Exception('Categorie controller_name : Error in edit function - ' . $ex);
        }  
 } 
/*
  * Deleting categorie
  */
  function remove($id_categorie)
  {
      try{
          $categorie = $this->Categorie_model->get_categorie($id_categorie);
      // check if the categorie exists before trying to delete it
          if(isset($categorie['id_categorie']))
          {
            $this->Categorie_model->delete_categorie($id_categorie);
              $response = array(
                'status' => 200,
                'message' => 'Succesfully Removed',
                'data' => $id_categorie
                );
              $this->response($response, REST_Controller::HTTP_OK);
          }
          else
              $response = array(
                'status' => 400,
                'message' => 'Not Updated Try again',
                'data' => $id_categorie
                );
              $this->response($response, REST_Controller::HTTP_OK);
          } catch (Exception $ex) {
                throw new Exception('Categorie controller_name : Error in remove function - ' . $ex);
            }  
  }
}