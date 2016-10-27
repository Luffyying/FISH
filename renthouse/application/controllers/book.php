<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('appeal_model');
    }


    public function get_user_hobby(){
        $user_id = $this -> input -> get("userId");
        $data = $this->book_model->get_user_hobby($user_id);
        echo json_encode($data);
    }



/**
房东: 房源预订信息开始

1	待处理	接受	1	1 -> 21房东／31房客
            拒绝	1	1 -> 41房东／ 5房客
            当前日期>申请日期＋1	1	1－> 42/5(房客）

2	进行中	待房客入住	21	当前日期 >＝ 结束日期＋5: 21->31房东/41房客
            房客入住中	22	当前日期 >=  结束日期：  22 ->31房东/41房客
            房客申诉中	23
3	成功交易	评价房客	31	31 -> 32
3	交易成功	已评价	32
4	无效预定	无效预定

0:全部／1:待处理／2:进行中 21:待房客入住 22:房客入住中／3:成功交易 31:评价房客 32:已评价／41: 无效 42:超过处理时间
 */
    public function booklist(){

        $this->load->view('booklist.php');
    }

    public function get_booklist(){
        $status = $this -> input -> get("status");
        $owner_id = $this -> input -> get("ownerId");
        if(!$status){
            $data = $this->book_model->get_booklist($owner_id);
        }else{
            $data = $this->book_model->get_booklist($owner_id, $status);
        }
        echo json_encode($data);
    }



    public function owner_accept(){
        $order_id = $this -> input -> get("orderId");
        $r1 = $this -> book_model -> update_order_status_owner($order_id, 21);
        $r2 = $this -> book_model -> update_order_status_user($order_id, 31);
        if($r1 && $r2){
            echo "success";
        }else{
            echo "fail";
        }
    }
    public function owner_decline(){
        $order_id = $this -> input -> get("orderId");
        $r1 = $this -> book_model -> update_order_status_owner($order_id, 41);
        $r2 = $this -> book_model -> update_order_status_user($order_id, 5);
        if($r1 && $r2){
            echo "success";
        }else{
            echo "fail";
        }
    }
    public function owner_comment(){
        $order_id = $this -> input -> get("orderId");
        $r1 = $this -> book_model -> update_order_status_owner($order_id, 32);
        if($r1 ){
            echo "success";
        }else{
            echo "fail";
        }
    }

    public function change_status_owner(){
        $order_id = $this -> input -> get("orderId");
        $curr_status_owner = $this -> input -> get("currOStatus");
        $curr_status_user = $this -> input -> get("currUStatus");
        switch($curr_status_owner){
            case 1:
                //1待处理: 当前日期>申请日期＋1		1－> 42/5(房客）
//                var_dump(1);
                $apply_date = $this -> book_model -> get_order_by_id($order_id) -> order_timestamp;
//                var_dump(time());
//                var_dump($apply_date);
                if((time() - $apply_date) >= 86400){
                    $r1 = $this -> book_model -> update_order_status_owner($order_id, 42);
                    $r2 = $this -> book_model -> update_order_status_user($order_id, 5);
                }
                break;

            case 21:
//                var_dump(21);

                //2	进行中	待房客入住21	当前日期 >＝ 结束日期＋5: 21->31房东/41房客
                $end_date = $this -> book_model -> get_order_by_id($order_id) -> end_timestamp;
//                echo time();
//                echo $end_date;
                if((time() - $end_date) >= 86400*5){
//                    echo "yes";

                    $r1 = $this -> book_model -> update_order_status_owner($order_id, 31);
                    $r2 = $this -> book_model -> update_order_status_user($order_id, 41);
                }
                break;

            case 22:
//                var_dump(22);
                //2	进行中	房客入住中22	当前日期 > 结束日期： 22 -> 31房东/41房客
                $end_date = $this -> book_model -> get_order_by_id($order_id) -> end_timestamp;
                if((time() - $end_date) >= 0){
//                    var_dump("yes");
//                    var_dump(date ( "m.d.y" ), $end_date);
//                    var_dump(date ( "m.d.y" ), time());
                    $r1 = $this -> book_model -> update_order_status_owner($order_id, 31);
                    $r2 = $this -> book_model -> update_order_status_user($order_id, 41);
                }
                break;
        }
        $data = $this -> book_model -> get_order_by_id($order_id);
        echo json_encode($data);
    }
/**
房东: 房源预订信息结束
*/
/**
房客: 我的旅程开始

1	待付款	1	付款	1 -> 2／1房东
2	待处理	2	房东处理中
                当前日期>申请日期＋1 	2－> 5房客／4房东
3	进行中	31	确认入住	31->33房客／22房东
                当前日期 >＝ 结束日期＋5	31房东／41房客
                申诉	31->32房客／23房东
            32	申诉中
            33	入住中
                当前日期 > 结束日期	33->41房客／31房东
4	已完成	41	评价	41 －> 42
                分享到我的主页	41 －> 43
            42	已评价
                分享到我的主页	42 -> 44
            43	评价	43 -> 44
                已分享
            44	已评价
                已分享
5	未成功	5	申请未成功
0:全部/1:待付款/2:房东处理中/3:进行中 31:确认入住 申诉 32:申诉中 33:入住中/4:已完成 41:评价 分享 42:已评价 分享 43:评价 已分享 44:已评价 已分享／5:申请未成功
*/


    public function journey(){
        $this->load->view('journey.php');
    }
    public function get_journey(){
        $status = $this -> input -> get("status");
        $user_id = $this -> input -> get("userId");

        if(!$status){
            $data = $this->book_model->get_journey($user_id);
        }else{
            $data = $this->book_model->get_journey($user_id, $status);
        }
        echo json_encode($data);
    }

    public function change_status_user(){
        $order_id = $this -> input -> get("orderId");
//        $curr_status_owner = $this -> input -> get("currOStatus");
        $curr_status_user = $this -> input -> get("currUStatus");
        switch($curr_status_user){
            case 2:
//                var_dump(2);
                //2	房东处理中	当前日期>申请日期＋1 	2－> 5房客／4房东
                $apply_date = $this -> book_model -> get_order_by_id($order_id) -> order_timestamp;
                if((time() - $apply_date) >= 86400){
                    $r1 = $this -> book_model -> update_order_status_owner($order_id, 4);
                    $r2 = $this -> book_model -> update_order_status_user($order_id, 5);
                }
                break;

            case 31:
//                var_dump(31);
//                31	确认入住  当前日期 >＝ 结束日期＋5	31房东／41房客

                $end_date = $this -> book_model -> get_order_by_id($order_id) -> end_timestamp;
//                echo time();
//                echo $end_date;
                if((time() - $end_date) >= 86400*5){
//                    echo "yes";

                    $r1 = $this -> book_model -> update_order_status_owner($order_id, 31);
                    $r2 = $this -> book_model -> update_order_status_user($order_id, 41);
                }
                break;

            case 33:
//                var_dump(33);
//                33	入住中	当前日期 > 结束日期	33->41房客／31房东
                $end_date = $this -> book_model -> get_order_by_id($order_id) -> end_timestamp;
                if((time() - $end_date) >= 0){
//                    var_dump("yes");
//                    var_dump(date ( "m.d.y" ), $end_date);
//                    var_dump(date ( "m.d.y" ), time());
                    $r1 = $this -> book_model -> update_order_status_owner($order_id, 31);
                    $r2 = $this -> book_model -> update_order_status_user($order_id, 41);
                }
                break;
        }
        $data = $this -> book_model -> get_order_by_id($order_id);
        echo json_encode($data);
    }

    public function user_pay(){
        //1	付款	1 -> 2房客／1房东
        $order_id = $this -> input -> get("orderId");
        $r1 = $this -> book_model -> update_order_status_owner($order_id, 1);
        $r2 = $this -> book_model -> update_order_status_user($order_id, 2);
        if($r1 && $r2){
            echo "success";
        }else{
            echo "fail";
        }
    }
    public function user_checkin(){
        //31	确认入住	31->33房客／22房东
        $order_id = $this -> input -> get("orderId");
        $r1 = $this -> book_model -> update_order_status_owner($order_id, 22);
        $r2 = $this -> book_model -> update_order_status_user($order_id, 33);
        if($r1 && $r2){
            echo "success";
        }else{
            echo "fail";
        }
    }

    public function user_appeal(){  //保存用户申诉
        //        31  申诉  	31->32房客／23房东
        $order_id = $this -> input -> post("orderId");
        $appeal_content = $this -> input -> post("appealContent");
        $row = $this -> appeal_model -> save_appeal($order_id, $appeal_content);
        if($row){
            $r1 = $this -> book_model -> update_order_status_owner($order_id, 23);
            $r2 = $this -> book_model -> update_order_status_user($order_id, 32);
            if($r1 && $r2){
                echo 'success';
            }
            else{
                echo 'fail';
            }
        }else{
            echo 'fail';
        }
    }
    public function user_appeal_again(){  //保存用户申诉
        //        31  申诉  	31->32房客／23房东
        $order_id = $this -> input -> post("orderId");
        $appeal_content = $this -> input -> post("appealContent");
        $row = $this -> appeal_model -> save_appeal($order_id, $appeal_content);
        if($row){
//            $r1 = $this -> book_model -> update_order_status_owner($order_id, 23);
//            $r2 = $this -> book_model -> update_order_status_user($order_id, 32);
//            if($r1 && $r2)
                echo 'success';
//            else echo 'fail';
        }else{
            echo 'fail';
        }
    }

    public function get_order_info_appeal(){    //获取申诉信息
        $order_id = $this -> input -> get("orderId");
        $data = $this -> book_model -> get_order_info_appeal($order_id);
        echo json_encode($data);
//        echo $data;
    }
    public function get_appeal_datail(){    //获取申诉详情信息
        $order_id = $this -> input -> get("orderId");
        $data = $this -> appeal_model -> get_appeal_datail($order_id);
        echo json_encode($data);
    }

    public function user_appeal_detail(){
//        31  申诉  	31->32房客／23房东
        $order_id = $this -> input -> get("orderId");
//        $r1 = $this -> book_model -> update_order_status_owner($order_id, 23);
//        $r2 = $this -> book_model -> update_order_status_user($order_id, 32);
//        if($r1 && $r2){
//            echo "success";
//        }else{
//            echo "fail";
//        }
        $this -> load -> view("appeal-datail", $order_id);
    }

    public function user_comment(){
//        41	评价	41 －> 42
//        43	评价	43 -> 44
        $order_id = $this -> input -> get("orderId");
        $user_status = $this -> input -> get("userStatus");
        if($user_status == 41){
            $r1 = $this -> book_model -> update_order_status_user($order_id, 42);
        }else if($user_status == 43){
            $r1 = $this -> book_model -> update_order_status_user($order_id, 44);
        }
        if($r1 ){
            echo "success";
        }else{
            echo "fail";
        }
    }
    public function user_share(){
        //43	评价	43 -> 44
        $order_id = $this -> input -> post("orderId");
        $house_id = $this -> input -> post("houseId");
        $user_id = $this -> input -> post("userId");
        $share_content = $this -> input -> post("shareContent");
//        var_dump($house_id, $share_content, $user_id);
        $r1 = $this -> book_model -> add_user_share($house_id, $share_content, $user_id);
        $r2 = $this -> book_model -> update_order_status_user($order_id, 44);
        if($r1 && $r2){
            echo "success";
        }else{
            echo "fail";
        }
    }

    public function get_house_info_share(){
        $order_id = $this -> input -> get("orderId");
        $data = $this -> book_model -> get_house_info_share($order_id);
        echo json_encode($data);


    }



    /**
房客: 我的旅程结束
 */



}























