<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this -> load -> model('appeal_model');
        $this -> load -> model('appeal_content_model');
        $this -> load -> model('revert_model');
        $this->load->model('comment_model');
        $this->load->model('user_model');
        $this->load->model('owner_model');
    }
    /* 房东管理相关 start */
    //房东列表
    public function owner($offset=0){
          /* page config start*/
        $owner_name = $this->input->get('owner_name');
        $total_rows = $this->owner_model->get_counts($owner_name);

        //$total_rows = $this->owner_model->get_counts();
        $this->load->library('pagination');
        $config['base_url'] = 'admin/owner/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        /* page config end*/
        $res = $this->owner_model->get_all($owner_name,$config['per_page'], $offset);
        $owners = array(
            'owners'=>$res);
        $this->load->view('admin/owner',$owners);
    }
    //添加房东
    public function add_owner(){
        $this->load->view('admin/add_owner');
    }
    //保存编辑房东的信息
    public function edit_owner_infor($user_id){
        echo 'ss';
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3076';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this->load->library('upload', $config);
         $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $cardid = $this->input->post('id');
            $bankcard = $this->input->post('bankcard');
            $password = $this->input->post('password');
            $intro= $this->input->post('intro');
        if ($this->upload->do_upload("img"))
        {
           
            $upload_data = $this->upload->data();
            $this->load->library("image_lib");
            //压缩小图
            $config['image_library'] = 'gd2';
            $config['source_image'] = $upload_data['full_path'];
            $config['thumb_marker'] = '_thumb';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['master_dim'] = 'width';
            $config['width'] = 330;
            $config['height'] = 240;
            $config['maintain_ratio'] = FALSE;
            $this->image_lib-> initialize($config);
            $this->image_lib-> resize();
            $this->image_lib-> clear();
            $thumb_img = 'upload/'.$upload_data['raw_name'] . '_thumb'  . $upload_data['file_ext'];
            $img='upload/'.$upload_data['raw_name'];
            $user_data = array(
             'first_name'=>$first_name,
             'last_name'=>$last_name,
             'tel'=>$phone,
             'email'=>$email,
             'img'=>$img,
             'thumb_img'=>$thumb_img
             );
        }
        else{
            $user_data = array(
             'first_name'=>$first_name,
             'last_name'=>$last_name,
             'tel'=>$phone,
             'email'=>$email,
             );
        }
            $res2 = $this->user_model->edit_save($user_id,$user_data);      
             $owner_data=array(
             'bank_card'=>$bankcard,
             'owner_pwd'=>$password,
             'identity'=>$cardid,
             'intro'=>$intro);

            $res = $this->owner_model->edit_save($user_id,$owner_data);
                //  if($res&&$res2){
                    redirect('admin/owner');
                // }else{
                //     echo '更新失败';
                // }
                
}
    //保存新增房东信息
    public function add_owner_infor(){
        //judge
        $password= $this->input->post('password');;
        $confirm_pwd= $this->input->post('confirm_pwd');
        if($password!=$confirm_pwd){
// history.go(-1);
             redirect('admin/edit_owner_infor');
        }else{
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3076';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this->load->library('upload', $config);
         $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $cardid = $this->input->post('id');
            $bankcard = $this->input->post('bankcard');
            $password = $this->input->post('password');
            $intro= $this->input->post('intro');
       if($this->upload->do_upload("img")){
            $upload_data = $this->upload->data();
            $this->load->library("image_lib");
            //压缩小图
            $config['image_library'] = 'gd2';
            $config['source_image'] = $upload_data['full_path'];
            $config['thumb_marker'] = '_thumb';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['master_dim'] = 'width';
            $config['width'] = 330;
            $config['height'] = 240;
            $config['maintain_ratio'] = FALSE;
            $this->image_lib-> initialize($config);
            $this->image_lib-> resize();
            $this->image_lib-> clear();
            $thumb_img = 'upload/'.$upload_data['raw_name'] . '_thumb'  . $upload_data['file_ext'];
            $img = 'upload/'.$upload_data['raw_name'] . $upload_data['file_ext'];
            $user_data = array(
                 'first_name'=>$first_name,
                 'last_name'=>$last_name,
                 'tel'=>$phone,
                 'email'=>$email,
                 'img'=>$img,
                 'thumb_img'=>$thumb_img
                 );
             $res2 = $this->user_model->save_infor($user_data);
             if($res2){
                 $owner_data=array(
                     'user_id'=>$res2,
                     'bank_card'=>$bankcard,
                     'owner_pwd'=>$password,
                     'identity'=>$cardid,
                     'intro'=>$intro);
                 $res = $this->owner_model->save($owner_data);
                 if($res&&$res2){
                    redirect('admin/owner');
                 }else{
                    echo '更新失败';
                 }
              }
       }
       else{
            var_dump($this->upload->display_errors());
                echo '文件上传失败!';
       }
   }
    }
    //编辑房东信息
    public function edit_owner(){
        $ownerid = $this->input->get('user_id');
        $owner = $this->owner_model->get_by_id($ownerid);
        $user = $this->user_model->get_by_id($ownerid);
        $data = array('owner'=>$owner,'user'=>$user);
        //var_dump($user->thumb_img);
        //die;
        $this->load->view('admin/edit_owner',$data);
    }
    //禁用房东
    public function forbid_owner(){
        $owner_id = $this->input->get('ownerId');
        $rows = $this->owner_model->forbid($owner_id);
        if($rows){
            echo 'success';
        }else{
            echo 'fail';
        }

    }
    //解除禁用
    public function relieve_forbid_owner(){
        $owner_id = $this->input->get('ownerId');
        $rows = $this->owner_model->relieve_forbid($owner_id);
        if($rows){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    //删除单个房东
    public function delete_owner(){
        $owner_id = $this->input->get('ownerId');
        $rows = $this->owner_model-> delete($owner_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    //批量删除房东
    public function delete_selected_owner(){
        $owner_ids = $this->input->get('ownerIdStr');
        $rows = $this->owner_model->delete_selected($owner_ids);
        if($rows){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    //房东的详细信息
    public function owner_detial(){
        $owner_id = $this->input->get('owner_id');
        $owner_infor = $this->owner_model->get_by_id($owner_id);
        $user_infor = $this->user_model->get_by_id($owner_id);
        $data = array('owner_infor'=>$owner_infor,'user_infor'=>$user_infor);
        $this->load->view('admin/owner_detial',$data);
    }
    /* 保留批量禁用功能*/
    // public function forbid_selected_owner(){
    //     $owner_ids = $this->input->get('ownerIdStr');
    //     $rows = $this->owner_model->fobid_selected($owner_ids);
    //     if($rows){
    //         echo 'success';
    //     }else{
    //         echo 'fail';
    //     }
    // }


     /* 房东管理相关 end */
    public function login(){
        $this->load->view('admin/login');
    }
    public function index(){
        $this->load->view('admin/index');
    }
    public function get_comments(){
        //跳转到评论管理页
        $hcomments = $this->comment_model->get_houseComments();
        $this->load->view('admin/comment',array(
            'hcomments'=>$hcomments,
        ));
    }
    public function get_comments_by_kind(){
        //切换房屋评论，房东评论，房客评论
        $comments = $this->input->get('comments');
        if($comments == 'house'){
            $hcomments = $this->comment_model->get_houseComments();
            echo json_encode(array('house',$hcomments));
        }else if($comments == 'owner'){
            $ocomments = $this->comment_model->get_ownerComments();
            echo json_encode(array('owner',$ocomments));
        }else{
            $ucomments = $this->comment_model->get_userComments();
            echo json_encode(array('roomer',$ucomments));
        }
    }
    public function notice(){
        $this->load->view('admin/notice');
    }
    public function appeal()
    {
        $appeals = $this->appeal_model->get_all();
        $this->load->view('admin/appeal', array(
            'appeals' => $appeals
        ));
    }
    public function appeal_content()
    {
        $order_id = $this->input->get('orderId');
        $order = $this->appeal_content_model->get_by_id($order_id);
        if ($order) {
            $this->load->view('admin/appeal_content', array(
                'order' => $order
            ));
        } else {
            echo '没有差到指定值';
        }
    }

    public function revert(){
        $appealId = $this -> input -> post('appealId');
        $content = $this -> input -> post('content');
        $reply = $this -> input -> post('reply');
        $orderId = $this -> input -> post('orderId');
        $rows = $this -> revert_model -> save($appealId,$content,$reply,$orderId);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
        public function delete_piece(){
            $order_id = $this -> input -> get('orderId');
            $rows = $this -> appeal_model -> delete($order_id);
            if($rows > 0){
                echo 'success';
            }else{
                echo 'fail';
            }
        }

        public function delete_selected_piece(){
            $order_ids_str = $this -> input -> get('orderIdStr');
            $rows = $this -> appeal_model -> delete_selected($order_ids_str);
            if($rows > 0){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    public function feedback(){
        $this-> load -> model('feedback_model');
        $feedbacks = $this -> feedback_model -> get_all();
        $this->load->view('admin/feedback',array(
            'feedbacks' => $feedbacks
        ));
    }
    public function delete_feedback(){
        $feedback_id = $this -> input -> get('feedbackId');
        $this -> load -> model('feedback_model');
        $rows = $this -> feedback_model -> delete($feedback_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function delete_selected_feedback(){
        $feedback_ids = $this -> input -> get('feedbackIdStr');
        $this -> load -> model('feedback_model');
        $rows = $this -> feedback_model -> delete_selected($feedback_ids);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
}
