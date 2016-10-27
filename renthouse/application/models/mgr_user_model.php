<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mgr_user_model extends CI_Model {
    public function save($user_data){
        $this->db->insert('t_user',$user_data);
        return $this->db->affected_rows();
    }
    public function get_all(){
        $this->db->select('user.*');
        $this->db->from('t_user user');
        $this->db->where('user.status',0);
        return $this->db->get()->result();
    }

    public function delete($user_id){
        $this -> db -> where('user_id', $user_id);
        $this -> db -> update('t_user', array(
            'status' => '1'
        ));
        return $this -> db -> affected_rows();
    }
    public function disable($user_id){
        $this -> db -> where('user_id', $user_id);
        $this -> db -> update('t_user', array(
            'status' => '2'
        ));
        return $this -> db -> affected_rows();
    }


    public function delete_selected($user_ids_str){
        $user_ids = explode(',', $user_ids_str);
        $this -> db -> where_in('user_id', $user_ids);
        $this -> db -> update('t_user', array(
            'status' => '1'
        ));
        return $this -> db -> affected_rows();
    }


}
?>