<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Profil_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }
      /*
        * Get profil by id_profil 
      */ 
      function get_profil($id_profil)
      {
        try{
           return $this->db->get_where('profil',array('id_profil'=>$id_profil))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Profil_model Model : Error in get_profil function - ' . $ex);
           }  
      }
      /*
        * Get profil by  column name
      */ 
      function get_profilbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('profil',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Profil_model Madel : Error in get_profilbyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All profil count 
      */ 
      function get_all_profil_count()
      {
        try{
           $this->db->from('profil');
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Profil_model model : Error in get_all_profil_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join profilcount 
      */ 
      function get_all_with_asso_profil()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Profil_model model : Error in get_all_with_asso_profil function - ' . $ex);
           }  
      }
      /*
          * Get all profil 
      */ 
      function get_all_profil($params = array())
      {
        try{
              $this->db->order_by('id_profil', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('profil')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Profil_model model : Error in get_all_profil function - ' . $ex);
           }  
      } 
      /*
         * function to add new profil 
      */
      function add_profil($params)
      {
        try{
          $this->db->insert('profil',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Profil_model model : Error in add_profil function - ' . $ex);
           }  
      }
      /* 
          * function to update profil 
      */
      function update_profil($id_profil,$params)
      {
        try{
            $this->db->where('id_profil',$id_profil);
        return $this->db->update('profil',$params);
           } catch (Exception $ex) {
             throw new Exception('Profil_model model : Error in update_profil function - ' . $ex);
           }  
       }
     /* 
          * function to delete profil 
      */
       function delete_profil($id_profil)
       {
        try{
             return $this->db->delete('profil',array('id_profil'=>$id_profil));
           } catch (Exception $ex) {
             throw new Exception('Profil_model model : Error in delete_profil function - ' . $ex);
           }  
       }
      /*
        * Get profil by  column name where not in particular id
      */ 
      function get_profilbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('id_profil!=', $where_cond);
           return $this->db->get_where('profil',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Profil_model model : Error in get_profilbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join profilcount 
      */ 
      function get_all_with_asso_profil_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Profil_model model : Error in get_all_with_asso_profil_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all profil_by_cat 
      */ 
      function get_all_profil_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('id_profil', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('profil')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Profil_model model : Error in get_all_profil_by_cat function - ' . $ex);
           }  
      } 
 }