<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class feedback_model extends CI_Model {

    public function get_all(){
        $this -> db -> order_by ('t_feedback.feedback_date','desc');
        $this -> db -> select('t_feedback.*, t_user.first_name,t_user.last_name');
        $this -> db -> from('t_feedback');
        $this -> db -> join('t_user','t_feedback.user_id = t_user.user_id');
        $this -> db -> where('is_delete',0);
        return $this -> db -> get() -> result();

    }
    public function delete($feedback_id){
        $this -> db -> where('feedback_id', $feedback_id);
        $this -> db -> update('t_feedback', array(
            'is_delete' => '1'
        ));
        return $this -> db -> affected_rows();
    }

    public function delete_selected($feedback_ids_str){
        $feedback_ids = explode(',', $feedback_ids_str);
        $this -> db -> where_in('feedback_id', $feedback_ids);
        $this -> db -> update('t_feedback', array(
            'is_delete' => '1'
        ));
        return $this -> db -> affected_rows();
    }

}