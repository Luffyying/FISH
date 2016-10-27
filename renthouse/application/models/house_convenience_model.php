<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House_convenience_model extends CI_Model {
    /*------------------------房源展示页开始-------------------------------------*/
    public function get_by_house_id(/*$house_id*/){
        return $this -> db -> get_where('t_house_convenience', array(
            // 'house_id' => $house_id,
            'house_id' => 1
        )) -> result();
    }









    /*------------------------房源展示页结束-------------------------------------*/
 
}