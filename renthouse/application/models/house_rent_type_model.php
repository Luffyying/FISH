<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House_rent_type_model extends CI_Model {

    /*------------------------房源展示页开始-------------------------------------*/
    public function get_by_house_rent_type_id($rent_type_id){
        return $this -> db -> get_where('t_house_rent_type', array(
            'rent_type_id' => $rent_type_id
        )) -> row();
    }









    /*------------------------房源展示页结束-------------------------------------*/
 
}