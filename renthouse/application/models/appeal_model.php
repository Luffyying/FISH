<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appeal_model extends CI_Model {

    public function get_all(){
        $this -> db -> order_by('t_order_appeal.appeal_date','desc');
        $this -> db -> select('t_order_appeal.*,t_order.house_id,t_order.user_id,t_user.first_name,t_user.last_name,t_house.title');
        $this -> db -> from('t_order_appeal ');
        $this -> db -> where('t_order_appeal.status','0');
        $this -> db -> join('t_order','t_order_appeal.order_id = t_order.order_id');
        $this -> db -> join('t_user','t_order.user_id = t_user.user_id');
        $this -> db -> join('t_house','t_house.user_id = t_user.user_id');
        return $this -> db -> get() -> result();
    }

    public function delete($order_id){
        $this -> db -> where('order_id',$order_id);
        $this -> db -> update('t_order_appeal', array(
            'status' => '1'
        ));
        return $this -> db -> affected_rows();
    }

    public function delete_selected($order_ids_str){
        $order_ids = explode(',' , $order_ids_str);
        $this -> db -> where_in('order_id', $order_ids);
        $this -> db -> update('t_order_appeal', array(
            'status' => '1'
        ));
        return $this -> db -> affected_rows();
    }

    public function save_appeal($order_id, $appeal_content){
        $data = array(
            "order_id" => $order_id,
            'content' => $appeal_content
        );

        $this->db->insert('t_order_appeal', $data);
        return $this->db->affected_rows();
    }

    public function get_appeal_datail($order_id){
        $this -> db -> select("appeal.*, house.title, user.last_name, user.first_name, , user.thumb_img");
        $this -> db -> from('t_order_appeal appeal');
        $this -> db -> where('appeal.order_id', $order_id);
        $this -> db -> join('t_order orders','orders.order_id = appeal.order_id');
        $this -> db -> join('t_house house','orders.house_id = house.house_id');
        $this -> db -> join('t_user user','user.user_id = house.user_id');
        return $this -> db -> get() -> result();
    }


    }
