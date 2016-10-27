<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_owner_model extends CI_Model {
        //通过房东Id查询对房东的评论
        public function get_ownerComments_by_ownerId($owner_id){

            $this->db->order_by('comment_date','desc');//排序规则
            $this->db->limit(10);//限制查询的条数
            $this->db->select('cowner.*,user.last_name,user.first_name,user.img');
            $this->db->from('t_comment_owner cowner');
            $this->db->join('t_user user','cowner.user_id=user.user_id');
            $this->db->where('cowner.owner_id',$owner_id);
            return $this->db->get()->result();
        }
         //通过房东Id查询对该房东的评论总数
        public function get_ownerComments_by_ownerId_count($owner_id)
        {
            $sql = 'select count(*) as count from t_comment_owner cowner,t_user user where cowner.owner_id='.$owner_id .' and cowner.user_id=user.user_id';

            return $this -> db -> query($sql) -> result();
        }
        //通过房东Id查询对该房东的评论总分
         public function get_ownerComments_by_ownerId_sum($owner_id)
        {
            $sql = 'select sum(cowner.score) as sum from t_comment_owner cowner,t_user user where cowner.owner_id='.$owner_id .'  and cowner.user_id=user.user_id';

            return $this -> db -> query($sql) -> result();
        }
        public function get_by_page($owner_id,$limit=5,$offset=0){


            $this->db->select('cowner.*,user.last_name,user.first_name,user.img');
            $this->db->from('t_comment_owner cowner');
            $this->db->join('t_user user','cowner.user_id=user.user_id');
            $this->db->where('cowner.owner_id',$owner_id);
            $this->db->order_by('comment_date','desc');//排序规则
            $this -> db -> limit($limit, $offset);
            return $this->db->get()->result();
        }

    public function save($mark2,$ownFeel){
        $this -> db -> insert('t_comment_owner', array(
            'score' => $mark2,
            'content' => $ownFeel
        ));
        return $this -> db -> affected_rows();
    }

}