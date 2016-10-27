<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Share_model extends CI_Model {


    public function get_share(){
        $this -> db -> select('t_share.*, t_house.title, t_house_img.thumb_path');
        $this -> db -> from('t_share');
        $this -> db -> join('t_house','t_house.house_id = t_share.house_id');
        $this -> db -> join('t_house_img','t_house_img.house_id = t_house.house_id');
        $this -> db -> where('t_share.user_id',1);
        $this -> db -> where('t_house_img.is_main',1);
        return $this -> db -> get() -> result();
    }

}