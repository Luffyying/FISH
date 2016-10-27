<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_model extends CI_Model {
    public function save($content){
        $this -> db -> insert('t_mail', array(
            'content' => $content
        ));
        return $this -> db -> affected_rows();
    }
    //通过用户Id查询该用户发出的邮件
    public function get_sendMail_by_userId($user_id){
        $this -> db -> select("mail.*, user.last_name, user.first_name");
        $this -> db -> from("t_mail mail");
        $this -> db -> where("mail.sender_id",$user_id);
        $this -> db -> where("mail.is_delete",0);
        $this -> db -> join("t_user user","user.user_id = mail.receiver_id");
        $this->db->order_by('mail_date','desc');
        return  $this -> db -> get() -> result();
    }
    //通过用户Id查询该用户收到的邮件
    public function get_recMail_by_userId($user_id){
        $this -> db -> select("mail.*, user.last_name, user.first_name");
        $this -> db -> from("t_mail mail");
        $this -> db -> where("mail.receiver_id",$user_id);
        $this -> db -> where("mail.is_delete",0);
        $this -> db -> join("t_user user","user.user_id = mail.sender_id");
        $this->db->order_by('mail_date','desc');
        return  $this -> db -> get() -> result();
    }
    //通过关键字查询与该关键字相关的邮件
    public function get_recMail_by_keyword($user_id,$keyword){

        $this -> db -> select("mail.*, user.last_name, user.first_name");
        $this -> db -> from("t_mail mail");
        $this->db->like('mail.content', $keyword);
        $this -> db -> where("mail.receiver_id",$user_id);
        $this -> db -> join("t_user user","user.user_id = mail.sender_id");
        $this -> db -> where("mail.is_delete",0);
        $this->db->order_by('mail_date','desc');
        return  $this -> db -> get() -> result();
    }
    public function get_sendMail_by_keyword($user_id,$keyword){
        $this -> db -> select("mail.*, user.last_name, user.first_name");
        $this -> db -> from("t_mail mail");
        $this->db->like('mail.content', $keyword);
        $this -> db -> where("mail.sender_id",$user_id);
        $this -> db -> join("t_user user","user.user_id = mail.receiver_id");
        $this -> db -> where("mail.is_delete",0);
        $this->db->order_by('mail_date','desc');
        return  $this -> db -> get() -> result();
    }
    public function get_noticeMail_by_keyword($owner,$keyword){
        $this -> db -> select("mail.*");
        $this -> db -> from("t_mail mail");
        $this->db->like('mail.content', $keyword);
        $this -> db -> where("mail.receiver_group",$owner);
        $this -> db -> where("mail.is_delete",0);
        $this->db->order_by('mail_date','desc');
        return  $this -> db -> get() -> result();
    }


    //通过关邮件Id删除有关邮件
    public function delete_by_id($mail_id){
        $this -> db -> where('mail_id', $mail_id);
        $this -> db -> update('t_mail', array(
            'is_delete' => '1'
        ));
        return $this -> db -> affected_rows();
    }
    //通过邮件id查询相关邮件
    public function get_recMail_by_mailId($mail_id){
        $query = $this->db->get_where('t_mail',array('mail_id'=>$mail_id));
        return $query->row();
    }
    //回复邮件
    public function save_mail_by_reply($mail_data){
        $this->db->insert('t_mail',$mail_data);
        return $this->db->affected_rows();
    }
    //通过用户查询相关公告
    public function get_noticeMail_by_ownerId($isNotice){
        $this -> db -> select("mail.*");
        $this -> db -> from("t_mail mail");
        $this -> db -> where("mail.receiver_group",$isNotice);
        $this -> db -> where("mail.is_delete",0);
        $this->db->order_by('mail_date','desc');
        return  $this -> db -> get() -> result();
    }
    //通过邮件id批量删除相关的邮件信息
    public function delete_selected($mail_ids_str){
        $mail_ids = explode(',', $mail_ids_str);
        $this -> db -> where_in('mail_id', $mail_ids);
        $this -> db -> update('t_mail', array(
            'is_delete' => '1'
        ));
        return $this -> db -> affected_rows();
    }
}