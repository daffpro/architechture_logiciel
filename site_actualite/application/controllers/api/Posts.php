<?php 
/*
    Generated by Manuigniter v2.0 
    www.manuigniter.com
*/
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Posts extends REST_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Posts_model');
      $this->load->model('Categorie_model');
 } 
 /*
* Listing of posts
 */
public function get_all()
{
  try{
     $data['posts'] = $this->Posts_model->get_all_posts();
     if($data['posts'] && $data['posts']!=null){
       $posts_ar = array();
       foreach($data['posts'] as $p)
       {
       $p_ar = array();
       $p_ar['id_categorie'] = $p['id_categorie'];
       $p_ar['id_utilisateur'] = $p['id_utilisateur'];
       $p_ar['titre_article'] = $p['titre_article'];
       $p_ar['description_article'] = $p['description_article'];
       $p_ar['corps_article'] = $p['corps_article'];
       $p_ar['statut'] = $p['statut'];
       $posts_ar[] = $p_ar;
       }
       $response = array(
       'status' => 200,
       'message' => 'get all data Succesfully',
       'data' => $posts_ar,
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
             throw new Exception('Posts controller_name : Error in get_all_post function - ' . $ex);
        }  
}


public function get_all_by_cat()
{
  try{
        $categorie=[];
        $post_by_cat=[];
        $data['categorie'] = $this->Categorie_model->get_all_with_asso_categorie();
        
        if($data['categorie'] && $data['categorie']!=null){
            foreach($data['categorie'] as $post){
                // var_dump($post);
                array_push($categorie,$post);
            }  
            for($i=0;$i<sizeof($categorie);$i++){
                $params=array(
                  "categorie"=> $categorie[$i]['nom_categorie'],
                  "posts"=>$this->Posts_model->get_id_categorie($categorie[$i]['id_categorie'])
                );
                array_push($post_by_cat,$params);
            }
            // var_dump($categorie);   
            $response = array(
              'status' => 200,
              'message' => 'get all data Succesfully',
              'data' => $post_by_cat,
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
             throw new Exception('Posts controller_name : Error in get_all_post function - ' . $ex);
  }  
}

public function get_post_by_cat($id_categorie){
  try{ 
    $data['post'] = $this->Posts_model->get_id_categorie($id_categorie); 
    if($data['post'] && $data['post']!=null){   
        $response = array(
          'status' => 200,
          'message' => 'get all data Succesfully',
          'data' => $data['post'],
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
          throw new Exception('Posts controller_name : Error in get_all_post function - ' . $ex);
  }  
}

 /*
  * Adding a new posts
  */
 function addnew()
 {  
  try{
      $params = array(
       'id_categorie'=> $this->input->post('id_categorie'),
       'id_utilisateur'=> $this->input->post('id_utilisateur'),
       'titre_article'=> $this->input->post('titre_article'),
       'description_article'=> $this->input->post('description_article'),
       'corps_article'=> $this->input->post('corps_article'),
       'statut'=> $this->input->post('statut'),
       'created_at'=>'',
       'updated_at'=>DATE,
       'deleted_at'=>'',
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       if(isset($_POST) && count($_POST) > 0)     
        {  
           $id_article= $this->Posts_model->add_posts($params);
           $data['posts'] = $this->Posts_model->get_posts($id_article);
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
             throw new Exception('Posts controller_name : Error in new posts function - ' . $ex);
       }  
 }  
  /*
  * Editing a posts
 */
  function edit($id_article)
{   
  try{
   $data['posts'] = $this->Posts_model->get_posts($id_article);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['posts']['id_article']))
      {
        $params = array(
           'id_categorie'=> $this->input->post('id_categorie'),
           'id_utilisateur'=> $this->input->post('id_utilisateur'),
           'titre_article'=> $this->input->post('titre_article'),
           'description_article'=> $this->input->post('description_article'),
           'corps_article'=> $this->input->post('corps_article'),
           'statut'=> $this->input->post('statut'),
            'created_at'=>'',
            'updated_at'=>'',
            'deleted_at'=>'',
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->Posts_model->update_posts($id_article,$params);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Updated',
            'data' => $id_article
             );
           $this->response($response, REST_Controller::HTTP_OK);
           }
           else
          {
           $response = array(
            'status' => 400,
            'message' => 'Not Updated Try again',
            'data' => $id_article
             );
           $this->response($response, REST_Controller::HTTP_OK);
          }
  }
       } catch (Exception $ex) {
             throw new Exception('Posts controller_name : Error in edit_post function - ' . $ex);
        }  
} 
/*
  * Deleting posts
  */
  function remove($id_article)
  {
      try{
      $posts = $this->Posts_model->get_posts($id_article);
        // check if the posts exists before trying to delete it
       if(isset($posts['id_article']))
       {
         $this->Posts_model->delete_posts($id_article);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Removed',
            'data' => $id_article
             );
           $this->response($response, REST_Controller::HTTP_OK);
       }
       else
           $response = array(
            'status' => 400,
            'message' => 'Not Updated Try again',
            'data' => $id_article
             );
           $this->response($response, REST_Controller::HTTP_OK);
       } catch (Exception $ex) {
             throw new Exception('Posts controller_name : Error in remove_post function - ' . $ex);
        }  
  }
 }
