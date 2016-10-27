<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convenient_model extends CI_Model {
      public function get_all(){
      	  return $this->db->get('t_convenience')->result();
      }
      public function get_by_convenience_id($convenience_id){
            return $this -> db -> get_where('t_convenience', array(
                'convenience_id' => $convenience_id
            )) -> row();
      }
}