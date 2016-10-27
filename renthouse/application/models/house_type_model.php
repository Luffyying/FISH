<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House_type_model extends CI_Model {

    /*------------------------房源展示页开始-------------------------------------*/
    public function get_by_house_type_id($type_id){
        return $this -> db -> get_where('t_house_type', array(
            'type_id' => $type_id
            // 'type_id' => 1,
        )) -> row();
    }









    /*------------------------房源展示页结束-------------------------------------*/
 
}