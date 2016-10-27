<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appeal_content_model extends CI_Model {

    public function get_all(){
        $this -> db ->order_by('appeal_date','desc');
        return $this -> db -> get('t_order') -> result();
    }
    public function  get_by_id($order_id){
        $this -> db -> select('t_order_appeal.*,t_order.house_id,t_order.user_id,t_user.first_name,t_user.last_name,t_house.title');
        $this -> db -> from('t_order_appeal ');
        $this -> db -> join('t_order','t_order_appeal.order_id = t_order.order_id');
        $this -> db -> join('t_user','t_order.user_id = t_user.user_id');
        $this -> db -> join('t_house','t_house.user_id = t_user.user_id');
        $this -> db -> where('t_order_appeal.order_id',$order_id);
        return $this -> db -> get() -> row();
    }
}
