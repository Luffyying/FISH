<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hobby_model extends CI_Model {
    //查询所有爱好
    public  function get_all(){
        $this->db->order_by('hobby_id','desc');
        $this->db->select('hobby.*');
        $this->db->from('t_hobby hobby');
        return $this->db->get()->result();
    }
}
