<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House_model extends CI_Model {

    public function get_house_all(){
        $this -> db -> select("house.*, user.last_name, user.first_name");
        $this -> db -> from("t_house house");
//        $this -> db -> where("house.status != 2");
        $this -> db -> join("t_user user", "user.user_id = house.user_id");
        $data = $this -> db -> get() -> result();
        return $data;
    }
    /*   start the search*/
    public function get_counts($data){
        $this->db->select('house.*');
        $this->db->from('t_house_img house');
        $this->db->where('house.is_delete',0);
        $this->db->where('house.is_main', 1);
        $this->db->join('t_house h','h.house_id=house.house_id');
        $this->db->where('h.status',0);
       if($data['flag']==1){
           if($data['c']){
               $this->db->where('h.city',$data['c']);
           }
           if($data['title']){
               $this->db->where('h.title',$data['title']);
           }
           return $this->db->count_all_results();
       }else {
           //  if($orderby=='price'){
           //      $this->db-> order_by('h.price', 'desc');
           // }
           if ($data['pro'] != '请选择省份') {
               $this->db->where('h.city', $data['pro']);
               $this->db->where('h.street', $data['cit']);
           }
           if ($data['hold']) {
               $this->db->where('h.hold_num >', $data['hold']);
               $this->db->or_where('h.hold_num', $data['hold']);
           }
           if ($data['house_type'] != '房屋类型' && $data['house_type'] != '选择类型') {
               $this->db->join('t_house_type p', 'p.type_id=h.type_id');
               $this->db->where('p.name', $data['house_type']);
           }
           if ($data['rent_type'] != '出租类型' && $data['rent_type'] != '选择类型') {
               $this->db->join('t_house_rent_type r', 'r.rent_type_id=h.rent_type_id');
               $this->db->where('r.name', $data['rent_type']);
           }
           if ($data['price']) {
               $k = explode(',', $data['price']);
               $this->db->where('h.price >', $k[0]);
               $this->db->where('h.price <', $k[1]);
               $this->db->where('h.price', $k[0]);
               $this->db->where('h.price', $k[1]);
           }
           if ($data['room']) {
               $this->db->where('h.bedroom_num >', $data['room']);
               $this->db->or_where('h.bedroom_num', $data['room']);
           }
           if ($data['bed']) {
               $this->db->where('h.bed_num >', $data['bed']);
               $this->db->where('h.bed_num', $data['bed']);
           }
           if ($data['toilet']) {
               $this->db->where('h.washroom_num >', $data['toilet']);
               $this->db->where('h.washroom_num', $data['toilet']);
           }
           if ($data['conv']) {
               $this->db->join('t_house_convenient v', 'v.house_id= h.house_id');
               $this->db->where_in('v.convenient_id', $data['conv']);
           }
           if ($data['end']) {
               $this->db->where('h.post_date >', $data['end']);
           }
       }
        return $this->db->count_all_results();
    }
    public function show_all_pic($data,$orderby,$limit, $offset)
    {
        $this->db->select('house.*,img.thumb_path as path,t.name as type,');
        $this->db->from('t_house house');
        $this->db->join('t_house_type t', 't.type_id=house.type_id');
        $this->db->join('t_house_img img', 'house.house_id=img.house_id');
        $this->db->where('img.is_main', 1);
        $this->db->where('house.status', 0);
        if($data['flag']==1){
            if($data['c']){
                $this->db->where('house.city',$data['c']);
            }
            if($data['title']){
                $this->db->where('house.title',$data['title']);
            }
            $this->db->limit($limit, $offset);
            return $this->db->get()->result();
        }else {
            if ($data['pro'] != '请选择省份') {
                $this->db->where('house.city', $data['pro']);
                $this->db->where('house.street', $data['cit']);
            }
            if ($data['hold']) {
                $this->db->where('house.hold_num >', $data['hold']);
                $this->db->or_where('house.hold_num >', $data['hold']);
            }
            if ($data['house_type'] != '房屋类型' && $data['house_type'] != '选择类型') {
                $this->db->join('t_house_type p', 'p.type_id=house.type_id');
                $this->db->where('p.name', $data['house_type']);
            }
            if ($data['rent_type'] != '出租类型' && $data['rent_type'] != '选择类型') {
                $this->db->join('t_house_rent_type r', 'r.rent_type_id=house.rent_type_id');
                $this->db->where('r.name', $data['rent_type']);
            }
            if ($data['price']) {
                $k = explode(',', $data['price']);
                $this->db->where('house.price >', $k[0]);
                $this->db->where('house.price <', $k[1]);
                $this->db->where('house.price', $k[0]);
                $this->db->where('house.price', $k[1]);
            }
            if ($data['room']) {
                $this->db->where('house.bedroom_num >', $data['room']);
                $this->db->or_where('house.bedroom_num', $data['room']);
            }
            if ($data['bed']) {
                $this->db->where('house.bed_num >', $data['bed']);
                $this->db->where('house.bed_num', $data['bed']);
            }
            if ($data['toilet']) {
                $this->db->where('house.washroom_num >', $data['toilet']);
                $this->db->where('house.washroom_num', $data['toilet']);
            }
            if ($data['conv']) {
                $this->db->join('t_house_convenient v', 'v.house_id= house.house_id');
                $this->db->where_in('v.convenient_id', $data['conv']);
            }
            if ($data['end']) {
                $this->db->where('house.post_date >', $data['end']);
            }
            if ($orderby == 'price') {
                $this->db->order_by('house.price', 'desc');

            } else if ($orderby == 'score') {
                $this->db->order_by('house.score', 'desc');
            } else if ($orderby == 'collect') {
                $this->db->order_by('house.collect_num', 'desc');
            } else {
                $this->db->order_by('house.post_date', 'desc');
            }
        }
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    /*   end the search */

    public function get_house_type(){
        return $this -> db -> get("t_house_type") -> result();
    }
    public function get_city(){
        return $this -> db -> get_where("t_city", array(
            "parent_id" => 0
        )) -> result();
    }
    public function get_street_by_city($city_id){
        return $this -> db -> get_where("t_city", array(
            "parent_id" => $city_id
        )) -> result();
    }
    public function get_house_rent_type(){
        return $this -> db -> get("t_house_rent_type") -> result();
    }
    public function get_convenience(){
        return $this -> db -> get("t_convenience") -> result();
    }
    public function get_house_detail($house_id){
        return $this -> db ->get_where("t_house", array(
            "house_id" => $house_id
        )) -> row();
    }

    public  function get_house_by_userId($userId){
        $this->db->select("house.*,img.thumb_path,type.name");
        $this->db->from("t_house house");
        $this->db->where("house.user_id",$userId);
        $this->db->join("t_house_img img","house.house_id=img.house_id");
        $this->db->join("t_house_type type","house.type_id=type.type_id");
        return $this->db->get()->result();
    }

    //通过用户id获得相关的房屋信息并可分页
    public function get_house_by_ownerId_and_page( $owner_id,$limit=10,$offset=0){
        $this->db->select("house.*,img.thumb_path,type.name");
        $this->db->from("t_house house");
        $this->db->where("house.user_id",$owner_id);
        $this -> db -> where('house.status',0);
        $this -> db -> or_where('house.status',1);
        $this->db->join("t_house_img img","house.house_id=img.house_id");
        $this->db->join("t_house_type type","house.type_id=type.type_id");
        $this -> db -> order_by('house.house_id', 'desc');
        $this -> db -> limit($limit, $offset);
        return $this->db->get()->result();
    }

    //通过用户id获得相关的房屋信息的总数
    public function get_house_count_by_ownerId($owner_id){
        $this->db->select("house.*");
        $this->db->from("t_house house");
        $this->db->where("house.user_id",$owner_id);
        $this -> db -> where('house.status', 0);
        return $this->db->count_all_results();
    }
    //获得通过查询条件得到的匹配数目
    public function get_searchCounts_by_ownerId($data){
        $this->db->select("house.*");
        $this->db->from("t_house house");
        $this->db->where("house.user_id",$data['owner_id']);
        $this -> db -> where('house.status',0);
        $this -> db -> or_where('house.status',1);
       if($data['house_type']!=false){
            $this->db->join('t_house_type p','p.type_id=house.type_id');
            $this->db->where('p.type_id',$data['house_type']);
        }
        if($data['rent_type']!=false){
            $this->db->join('t_house_rent_type r','r.rent_type_id=house.rent_type_id');
            $this->db->where('r.rent_type_id',$data['rent_type']);
        }
        if($data['keyword']!=false){
            $this->db->like('house.title', $data['keyword']);
        }
        return $this->db->count_all_results();
    }
    //获得通过查询条件得到的结果
    public function  get_search_by_ownerId_and_page($data,$limit=10,$offset=0){
        $this->db->select("house.*,img.thumb_path,type.name");
        $this->db->from("t_house house");
        $this->db->where("house.user_id",$data['owner_id']);
        $this -> db -> where('house.status',0);
        $this -> db -> or_where('house.status',1);
        $this->db->join("t_house_img img","house.house_id=img.house_id");
        $this->db->join("t_house_type type","house.type_id=type.type_id");
        if($data['house_type']!=false){
            $this->db->where('type.type_id',$data['house_type']);
        }
        if($data['rent_type']!=false){
            $this->db->join('t_house_rent_type r','r.rent_type_id=house.rent_type_id');
            $this->db->where('r.rent_type_id',$data['rent_type']);
        }
        if($data['keyword']!=false){
            $this->db->like('house.title', $data['keyword']);
        }
        $this -> db -> order_by('house.house_id', 'desc');
        $this -> db -> limit($limit, $offset);
        return $this->db->get()->result();
    }
    //通过房屋Id删除有关房屋
    public function delete_by_id($house_id){
        $this -> db -> where('house_id', $house_id);
        $this -> db -> update('t_house', array(
            'status' => '2'
        ));
        return $this -> db -> affected_rows();
    }
    //通过房屋Id禁用（休眠）有关房屋
    public function disabled_by_id($house_id){
        $this -> db -> where('house_id', $house_id);
        $this -> db -> update('t_house', array(
            'status' => '1'
        ));
        return $this -> db -> affected_rows();
    }
    //通过房屋Id取消休眠有关房屋
    public function cancel_disabled_by_id($house_id){
        $this -> db -> where('house_id', $house_id);
        $this -> db -> update('t_house', array(
            'status' => '0'
        ));
        return $this -> db -> affected_rows();
    }
    //通过房屋id批量删除相关的房屋信息
    public function delete_selected($house_ids_str){
        $house_ids = explode(',', $house_ids_str);
        $this -> db -> where_in('house_id', $house_ids);
        $this -> db -> update('t_house', array(
            'status' => '2'
        ));
        return $this -> db -> affected_rows();
    }




































    public function change_house_status($house_id, $status){
        $this -> db -> update("t_house", array(
            "status" => $status
        ), "house_id = $house_id");
        return $this->db->affected_rows();
    }
    public function save_house($data){
        $this -> db -> insert("t_house", $data);
        return $this-> db -> affected_rows();
    }

    public function get_house_by_search($searchObj){
//var_dump($searchObj);

        $this -> db -> select("house.*, user.last_name, user.first_name");
        $this -> db -> from("t_house house");
        foreach($searchObj as $key => $value){
//            var_dump($key);
//            var_dump($value);
            if($key == "status"){
//                            var_dump($value);
                if($value == 3){
                    $this -> db -> where("house.status !=", 2);
                }else if($value == '') {

                }else{
                    $this -> db -> where("house.$key", $value);
                }
            }else if($key == 'convenience'){

                $conv = $value;
                $this->db->where_in('username', $conv);
//                            var_dump($value);
//                foreach($value as $conv){
//                    var_dump($conv);
//
//                }

            }else{
                $this -> db -> where("house.$key", $value);
            }
        }
        $this -> db -> join("t_user user", "user.user_id = house.user_id");


        return $this->db->get()->result();

    }

    public function get_by_id($house_id){
        $this -> db -> select('t_house.*,t_user.first_name,t_user.last_name');
        $this -> db -> from('t_house ');
        $this -> db -> join('t_user','t_user.user_id = t_house.user_id');
        $this -> db -> join('t_order','t_order.user_id = t_user.user_id');
        $this -> db -> where('t_house.house_id', $house_id);
        return $this -> db -> get() -> row();
    }

    /*----------------------房源详情页相关开始------------------------------*/
    //
    public function get_by_house_id(/*$house_id*/){
        return $this -> db -> get_where('t_house', array(
            // 'house_id':  $house_id
            'house_id'=> 1 )) ->row();
    }





    /*----------------------房源详情页相关结束------------------------------*/


}