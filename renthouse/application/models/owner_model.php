<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Owner_model extends CI_Model {
    public function get_all($owner_name,$limit=10, $offset=0){
        // $sql = 'select * from t_owner where
        // 1=user_id';
        // $query = $this->db->query($sql);
        // return $query;

        $this->db->select('user.*,owner.room_num as room_num,owner.owner_pwd as owner_pwd
			 ,owner.bank_card as bank_card,owner.intro as intro,owner.reg_date as
			 reg_date,owner.income as income,owner.identity as identity,owner.status as status');
        $this->db->from('t_user user');
        $this->db->join('t_owner owner','user.user_id=owner.user_id');
        $this->db->where('owner.status',0);
        if($owner_name!=''){
            $this->db->like('user.first_name', $owner_name);
        }
        //$this->db->order_by('user.reg_date','desc');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    public function get_by_id($ownerid){
        $query = $this->db->get_where('t_owner',array('user_id'=>$ownerid));
        return $query->row();
    }
    public function get_counts($owner_name){
        $this->db->select('owner.*');
        $this->db->from('t_owner owner');
        $this->db->where('owner.status', 0);
        if($owner_name!=''){
            $this->db->join('t_user user','user.user_id=owner.user_id');
            $this ->db->like('user.first_name', $owner_name);
        }
        return $this->db->count_all_results();
    }
    public function save($owner_data){
        $this->db->insert('t_owner',$owner_data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function edit_save($user_id,$owner_data){
        $this->db->where('user_id', $user_id);
        $this->db->update('t_owner', $owner_data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($owner_id){
        $this->db->where('user_id',$owner_id);
        $this->db->update('t_owner',array('status'=>'2'));
        return $this->db->affected_rows();
    }
    public function forbid($owner_id){
        $this->db->where('user_id',$owner_id);
        $this->db->update('t_owner',array('status'=>'1'));
        return $this->db->affected_rows();
    }
    public function relieve_forbid($owner_id){
        $this->db->where('user_id',$owner_id);
        $this->db->update('t_owner',array('status'=>'0'));
        return $this->db->affected_rows();
    }
    public function fobid_selected($owner_ids_str){
        $owner_ids = explode(',', $owner_ids_str);
        $this->db->where_in('user_id', $owner_ids);
        $this->db->update('t_owner', array(
            'status'=> '1'
        ));
        return $this->db->affected_rows();
    }
    public function delete_selected($owner_ids_str){
        $owner_ids = explode(',', $owner_ids_str);
        $this->db->where_in('user_id', $owner_ids);
        $this->db->update('t_owner', array(
            'status'=> '2'
        ));
        return $this->db->affected_rows();
    }
}
