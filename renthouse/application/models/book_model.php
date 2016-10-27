<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {
    public function get_booklist($owner_id, $status=0){
        $this -> db -> select("book.*,
                                UNIX_TIMESTAMP(book.order_date) as order_timestamp,
                                UNIX_TIMESTAMP(book.start_date) as start_timestamp,
                                UNIX_TIMESTAMP(book.end_date) as end_timestamp,
                                user.last_name, user.first_name, user.tel, user.thumb_img, house.title, house_img.thumb_path");
        $this -> db -> from("t_order as book");
        if(!$status){
            $this -> db -> where("house.user_id = $owner_id and owner_status != -1");
        }else{
            $this -> db -> where("house.user_id = $owner_id and owner_status LIKE '$status%'");
        }
        $this -> db -> join("t_house as house", "house.house_id=book.house_id");
        $this -> db -> join("t_user as user", "user.user_id=book.user_id");
        $this -> db -> join("t_house_img as house_img", "house_img.house_id=book.house_id and house_img.is_main=1 ");
        $this -> db -> order_by("book.house_id, book.order_date desc");
        return $this -> db -> get() -> result();
    }

    public function get_user_hobby($user_id){
        $this -> db -> select("t_hobby.*");
        $this -> db -> from("t_user_hobby");
        $this -> db -> where("t_user_hobby.user_id = $user_id");
        $this -> db -> join("t_hobby", "t_user_hobby.hobby_id = t_hobby.hobby_id");
        return $this -> db -> get() -> result();
    }

    public function update_order_status_owner($order_id, $status){
        $this -> db -> update("t_order", array(
            "owner_status" => $status
        ),
            "order_id = $order_id");
        return $this->db->affected_rows();
    }

    public function update_order_status_user($order_id, $status){
        $this -> db -> update("t_order", array(
            "user_status" => $status
        ),
            "order_id = $order_id");
        return $this->db->affected_rows();
    }
    public function get_order_by_id($order_id){
        $this -> db -> select("book.*,
                                UNIX_TIMESTAMP(book.order_date) as order_timestamp,
                                UNIX_TIMESTAMP(book.start_date) as start_timestamp,
                                UNIX_TIMESTAMP(book.end_date) as end_timestamp,
                                user.last_name, user.first_name, user.tel, user.thumb_img, house.title, house_img.thumb_path");
        $this -> db -> from("t_order as book");

        $this -> db -> join("t_house as house", "house.house_id=book.house_id");
        $this -> db -> join("t_user as user", "user.user_id=book.user_id");
        $this -> db -> join("t_house_img as house_img", "house_img.house_id=book.house_id and house_img.is_main=1 ");
        $this -> db -> where("book.order_id = $order_id");

        $this -> db -> order_by("book.house_id, book.order_date");

        return $this -> db -> get() -> row();
    }
/**
房东: 房源预订信息结束
 */
/**
房客: 我的旅程开始 Journey
 */
    public function get_journey($user_id, $status=0){
        $this -> db -> select("book.*,
                                UNIX_TIMESTAMP(book.order_date) as order_timestamp,
                                UNIX_TIMESTAMP(book.start_date) as start_timestamp,
                                UNIX_TIMESTAMP(book.end_date) as end_timestamp,
                                user.last_name, user.first_name, user.tel, user.thumb_img,
                                house.title, house.city, house.street, house.road, house.address, house.intro, house.score,
                                house.user_id as owner_id, house_img.thumb_path");
        $this -> db -> from("t_order as book");
        if(!$status){
            $this -> db -> where("book.user_id = $user_id");
        }else{
    //            var_dump($status);
            $this -> db -> where("book.user_id = $user_id and user_status LIKE '$status%'");
        }
        $this -> db -> join("t_house as house", "house.house_id=book.house_id");
        $this -> db -> join("t_user as user", "user.user_id=house.user_id");
        $this -> db -> join("t_house_img as house_img", "house_img.house_id=book.house_id and house_img.is_main=1 ");
        $this -> db -> order_by("book.house_id, book.order_date desc");
        return $this -> db -> get() -> result();
    }

    public function get_order_info_appeal($order_id){
        $this -> db -> select("orders.order_id, house.title, user.last_name, user.first_name, user.thumb_img");
        $this -> db -> from('t_order orders');
        $this -> db -> where('orders.order_id', $order_id);
    //            $this -> db -> join('t_order orders','orders.order_id = appeal.order_id');
        $this -> db -> join('t_house house','orders.house_id = house.house_id');
        $this -> db -> join('t_user user','user.user_id = house.user_id');
        return $this -> db -> get() -> row();
    //            $return  = $this -> db -> get() -> row();
    //            var_dump($return);

    }

    public function get_house_info_share($order_id){
        $this -> db -> select("house_img.thumb_path, house.title, user.last_name, user.first_name,
                                house.city, house.street, house.road, house.address");
        $this -> db -> from("t_order as book");
        $this -> db -> join("t_house as house", "house.house_id=book.house_id");
        $this -> db -> join("t_user as user", "user.user_id=book.user_id");
        $this -> db -> join("t_house_img as house_img", "house_img.house_id=book.house_id and house_img.is_main=1 ");
        $this -> db -> where("book.order_id = $order_id");
        return $this -> db -> get() -> row();
    }

    public function add_user_share($house_id, $share_content, $user_id){
        $data = array(
            "content" => $share_content,
            "house_id" => $house_id,
            "user_id" => $user_id
        );
        $this->db->insert('t_share', $data);
        return $this->db->affected_rows();
    }

/**
房客: 我的旅程结束
 */


}