<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_house_model extends CI_Model {

    /*----------------------房源详情页相关开始------------------------------*/

    public function get_by_house_id($house_id){
        $this -> db -> order_by('comment_date', 'desc');
        $this -> db -> limit(6);
        return $this -> db -> get_where('t_comment_house', array(
            'house_id' => $house_id
        )) -> result();
    }

    public function get_comments_by_page($house_id, $offset=0){
        $this -> db -> order_by('comment_date', 'desc');
        $this -> db -> limit(6, $offset);
        return $this -> db -> get_where('t_comment_house', array(
            'house_id' => $house_id
        )) -> result();
    }



    /*----------------------房源详情页相关结束------------------------------*/

    public function save($mark1,$houseFeel,$imgOne,$imgTwo,$imgThree,$houseId){
        $this -> db -> insert('t_comment_house', array(
            'score' => $mark1,
            'content' => $houseFeel,
            'img_first' => $imgOne,
            'img_second' => $imgTwo,
            'img_third' => $imgThree,
            'house_id' => $houseId,
        ));
        return $this -> db -> affected_rows();
    }

}