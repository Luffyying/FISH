<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House_img_model extends CI_Model {
    /*------------------------房源展示页开始-------------------------------------*/
    public function get_by_house_id_main(/*$house_id*/){
        return $this -> db -> get_where('t_house_img', array(
            // 'house_id' => $house_id,
            'house_id' => 1,
            'is_main' => 1
        )) -> result();
    }

    public function get_by_house_id(/*$house_id*/){
        return $this -> db -> get_where('t_house_img', array(
            // 'house_id' => $house_id,
            'house_id' => 1,
            'is_main' => 0
        )) -> result();
    }









    /*------------------------房源展示页结束-------------------------------------*/
 
}