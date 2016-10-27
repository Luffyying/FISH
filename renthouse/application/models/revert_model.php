<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Revert_model extends CI_Model {

    public function save($appealId,$content,$reply,$orderId){
        $this -> db -> insert('t_order_appeal',array(
            'appeal_id' => $appealId,
            'content' => $content,
            'reply' => $reply,
            'order_id' => $orderId
        ));
        return $this -> db -> affected_rows();
    }
}
