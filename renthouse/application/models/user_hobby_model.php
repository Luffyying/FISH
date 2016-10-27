<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_hobby_model extends CI_Model {

    public function get_by_hobby(){
        $this -> db -> select('t_user_hobby.*, t_hobby.hobby_name, t_hobby.hobby_icon');
        $this -> db -> from('t_user_hobby');
        $this -> db -> join('t_hobby','t_user_hobby.hobby_id = t_hobby.hobby_id');
        $this -> db -> where('user_id',1);
        return $this -> db -> get() -> result();
    }
    //通过用户Id查询该用户的爱好
    public function get_userHobby_by_userId($user_id)
    {
        $sql ="SELECT t_user_hobby.*
                FROM t_user_hobby
                LEFT JOIN t_user ON t_user.user_id = t_user_hobby.user_id
                      JOIN t_hobby ON t_hobby.hobby_id = t_user_hobby.hobby_id
                WHERE t_user_hobby.user_id = '$user_id'";
        return $this -> db -> query($sql) -> result();
    }
    //通过用户Id删除该用户的爱好
    public function del_userHobby_by_userId($user_id){
        $this->db->delete('t_user_hobby', array('t_user_hobby.user_id' => $user_id));
        return $this->db->affected_rows();
    }
}
