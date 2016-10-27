<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {
    //查询所有对房屋的评论
    public function get_houseComments(){
        $this->db->select('chouse.*,user.last_name,user.first_name,house.title');
        $this->db->from('t_comment_house chouse');
        $this->db->join('t_user user','chouse.user_id=user.user_id');
        $this->db->join('t_house house','chouse.house_id=house.house_id');
        $this->db->order_by('comment_date','desc');//排序规则
        $this->db->limit(10);//限制查询的条数
        return $this->db->get()->result();
    }
    //查询所有对房东的评论
    public function get_ownerComments(){
        $this->db->select('cowner.*,owner.first_name owner_fn,owner.last_name owner_ln,roomer.first_name roomer_fn,roomer.last_name roomer_ln');
        $this->db->from('t_comment_owner cowner');
        $this->db->join('t_user owner','cowner.owner_id=owner.user_id');
        $this->db->join('t_user roomer','cowner.user_id=roomer.user_id');
        $this->db->order_by('comment_date','desc');//排序规则
        $this->db->limit(10);//限制查询的条数
        return $this->db->get()->result();
    }
    //查询所有对房客的评论
    public function get_userComments(){
        $this->db->select('cuser.*,owner.last_name owner_ln,owner.first_name owner_fn,roomer.last_name roomer_ln,roomer.first_name roomer_fn');
        $this->db->from('t_comment_user cuser');
        $this->db->join('t_user owner','cuser.owner_id=owner.user_id');
        $this->db->join('t_user roomer','cuser.user_id=roomer.user_id');
        $this->db->order_by('comment_date','desc');//排序规则
        $this->db->limit(10);//限制查询的条数
        return $this->db->get()->result();
    }
    //根据房屋ID查询该房屋的评论
    public function get_houseComments_by_houseId(){
        $this->db->select('comment.*,user.*');
        $this->db->from('t_comment_house comment');
        $this->db->where('comment.house_id',1);
        $this->db->join('t_user user','user.user_id=comment.user_id');
        $this->db->order_by('comment_date','desc');
        $this->db->limit(1);
        return $this->db->get()->row();
    }
    //根据房东ID查询该方东的评论
    public function get_ownerComments_by_ownerId(){
        $this->db->select('comment.*,user.*');
        $this->db->from('t_comment_owner comment');
        $this->db->where('comment.owner_id',1);
        $this->db->join('t_user user','user.user_id=comment.user_id');
        $this->db->order_by('comment_date','desc');
        $this->db->limit(3);
        return $this->db->get()->result();
    }
}