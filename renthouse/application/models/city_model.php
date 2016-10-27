<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends CI_Model {
      public function get_all_city(){
      	  return $this->db->get_where('t_city',array(
            "parent_id" => 0
        ))->result();
      }
      public function get_all_street($id){
           return $this->db->get_where('t_city',array(
            "parent_id" => $id
        ))->result(); 
      }
    
}