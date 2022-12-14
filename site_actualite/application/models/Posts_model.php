<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Posts_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }
      /*
        * Get posts by id_article 
      */ 
      function get_posts($id_article)
      {
        try{
           return $this->db->get_where('posts',array('id_article'=>$id_article))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Posts_model Model : Error in get_posts function - ' . $ex);
           }  
      }
      /*
        * Get posts by  column name
      */ 
      function get_postsbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('posts',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Posts_model Madel : Error in get_postsbyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All posts count 
      */ 
      function get_all_posts_count()
      {
        try{
           $this->db->from('posts');
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in get_all_posts_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join postscount 
      */ 
      function get_all_with_asso_posts()
      {
        try{
           $this->db->select('*');
           $this->db->from('posts a  ' );
            $this->db->join('categorie b', 'b.id_categorie=a. id_categorie','left');
            $this->db->join('utilisateurs c', 'c.id_utilisateur=a. id_utilisateur','left');
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in get_all_with_asso_posts function - ' . $ex);
           }  
      }
      function get_all_with_asso_posts_10()
      {
        try{
          //  $this->db->select('*');
          //  $this->db->from('posts a  ' );
          //   $this->db->join('categorie b', 'b.id_categorie=a. id_categorie','left');
            // $this->db->join('utilisateurs c', 'c.id_utilisateur=a. id_utilisateur','left');
          $query = $this->db->query('select * from posts a left join categorie b on b.id_categorie=a.id_categorie order by a.created_at desc limit 10');
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in get_all_with_asso_posts function - ' . $ex);
           }  
      }
      function get_all_with_asso_posts_4()
      {
        try{
          //  $this->db->select('*');
          //  $this->db->from('posts a  ' );
          //   $this->db->join('categorie b', 'b.id_categorie=a. id_categorie','left');
            // $this->db->join('utilisateurs c', 'c.id_utilisateur=a. id_utilisateur','left');
          $query = $this->db->query('select * from posts a left join categorie b on b.id_categorie=a.id_categorie order by a.created_at desc limit 4');
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in get_all_with_asso_posts function - ' . $ex);
           }  
      }
      
      function get_all_post_by_categorie()
      {
        try{
            // $this->db->select('*');
            // $this->db->from('posts a  ' );
            // $this->db->join('categorie b', 'b.id_categorie=a. id_categorie','left');
            // $this->db->groupBy('b.nom_categorie'); 
            
            $query =$this->db->query('select a.* FROM posts a left join categorie b on b.id_categorie=a.id_categorie group by b.nom_categorie'); 
            
            if($query->num_rows() != 0){
              //  return $query->result_array();
               $result= $query->result_array();
               var_dump($result);exit;
            }else{
                return false;
            }
          } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in get_all_with_asso_posts function - ' . $ex);
          }  
      }

      function get_id_categorie($id_categorie)
      {
        try{
            $query= $this->db->get_where('posts',array('id_categorie'=>$id_categorie));
            if($query->num_rows() != 0){
               return $query->result_array();
              //  var_dump($query->result_array());
            }else{
                return false;
            }
          } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in get_all_with_asso_posts function - ' . $ex);
          }  
      }
      /*
          * Get all posts 
      */ 
      function get_all_posts($params = array())
      {
        try{
              $this->db->order_by('id_article', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('posts')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in get_all_posts function - ' . $ex);
           }  
      } 
      /*
         * function to add new posts 
      */
      function add_posts($params)
      {
        try{
          $this->db->insert('posts',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in add_posts function - ' . $ex);
           }  
      }
      /* 
          * function to update posts 
      */
      function update_posts($id_article,$params)
      {
        try{
            $this->db->where('id_article',$id_article);
        return $this->db->update('posts',$params);
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in update_posts function - ' . $ex);
           }  
       }
     /* 
          * function to delete posts 
      */
       function delete_posts($id_article)
       {
        try{
             return $this->db->delete('posts',array('id_article'=>$id_article));
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in delete_posts function - ' . $ex);
           }  
       }
      /*
        * Get posts by  column name where not in particular id
      */ 
      function get_postsbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('id_article!=', $where_cond);
           return $this->db->get_where('posts',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in get_postsbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join postscount 
      */ 
      function get_all_with_asso_posts_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
           $this->db->select('*');
           $this->db->from('posts a  ' );
              //$this->db->where($column_name, $value_id);
            $this->db->join('categorie b', 'b.id_categorie=a. id_categorie','left');
              $this->db->where('a.'.$column_name, $value_id);
            $this->db->join('utilisateurs c', 'c.id_utilisateur=a. id_utilisateur','left');
              $this->db->where('a.'.$column_name, $value_id);
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in get_all_with_asso_posts_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all posts_by_cat 
      */ 
      function get_all_posts_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('id_article', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('posts')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Posts_model model : Error in get_all_posts_by_cat function - ' . $ex);
           }  
      } 
 }
