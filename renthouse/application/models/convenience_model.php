<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convenience_model extends CI_Model {
    /*------------------------房源展示页开始-------------------------------------*/
    public function get_by_convenience_id($convenience_id){
        return $this -> db -> get_where('t_convenience', array(
            'convenience_id' => $convenience_id
        )) -> row();
    }









    /*------------------------房源展示页结束-------------------------------------*/
 
}