<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mgruser extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');

    }

    /*------------------------------------------房源管理开始-------------------------------------------*/
    //房源管理页面加载
    public function rooms_mgr($offset=0){
        // $owner_id = $this->session->userdata('login_user')->user_id;
        /*$this->input->get('userId');*/
       $owner_id=1;

        $this->load->model('house_model');
        $house_types=$this->house_model->get_house_type();
        $rent_types=$this->house_model->get_house_rent_type();
        $room_type_session=$this->session->userdata('room_type');
        $rent_type_session=$this->session->userdata('room_rent_type');
        $room_keyword_session = $this->session->userdata('room_keyword');
        $data = array(
            'owner_id'=> $owner_id,
            'house_type'=>$room_type_session,
            'rent_type'=>$rent_type_session,
            'keyword'=>$room_keyword_session
        );
        $total_rows = $this->house_model-> get_searchCounts_by_ownerId($data);
        /*分页配置信息开始*/
        $this->load->library('pagination');
        $config['base_url'] = 'admin/mgruser/rooms_mgr/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        /*分页配置信息结束*/
        $datas = $this ->house_model ->get_search_by_ownerId_and_page($data,$config['per_page'], $offset);
        $this->load->view('rooms_mgr',array(
            'datas'=>$datas,
            'house_types'=>$house_types,
            'rent_types'=>$rent_types,
            'total_rows'=>$total_rows
        ));
    }
    //改变选择的房屋类型
    public function change_room_type(){
        $room_type=$this->input->get('roomType');
        if ($room_type!=0&&$room_type!=""){
            $this->session->unset_userdata('room_type');
            $this->session->set_userdata('room_type', $room_type);
        }else{
            $this->session->unset_userdata('room_type');
        }
    }
    //改变选择的房屋出租类型
    public function change_room_rent_type(){
        $room_rent_type=$this->input->get('rentType');
        if ($room_rent_type!=0&&$room_rent_type!=""){
            $this->session->unset_userdata('room_rent_type');
            $this->session->set_userdata('room_rent_type', $room_rent_type);
        }else{
            $this->session->unset_userdata('room_rent_type');
        }
    }
    //改变搜索的关键字
    public function change_room_keyword(){
        $room_keyword=$this->input->get('keyword');
        if ($room_keyword==""){
            $this->session->unset_userdata('room_keyword');
        }else{
            $this->session->unset_userdata('room_keyword');
            $this->session->set_userdata('room_keyword', $room_keyword);
        }
    }
    //单个删除选择的房屋
    public function delete_house(){
        $house_id = $this -> input -> get('houseId');
        $this -> load -> model('house_model');
        $rows = $this ->house_model-> delete_by_id($house_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    //休眠选择的房屋
    public function disabled_house(){
        $house_id = $this -> input -> get('houseId');
        $this -> load -> model('house_model');
        $rows = $this ->house_model-> disabled_by_id($house_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    //取消休眠选择的房屋
    public function cancel_disabled_house(){
        $house_id = $this -> input -> get('houseId');
        $this -> load -> model('house_model');
        $rows = $this ->house_model-> cancel_disabled_by_id($house_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }







    //批量删除选择的房屋
    public function delete_selected_house(){
        $house_ids_str = $this -> input -> get('houseIdStr');
        $this -> load -> model('house_model');
        $rows = $this -> house_model -> delete_selected($house_ids_str);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    /*------------------------------------------房源管理结束-------------------------------------------*/





    /*------------------------------------------------收发回复开始-------------------------------------*/
    //收发邮件页面加载
    public function send_rec_message(){
        /*$this->input->get('userId');*/
        $user_id=1;
        // $user_id=$this->session->userdata('login_user')->user_id;


        $this->load->model('mail_model');
        $datas=$this->mail_model->get_recMail_by_userId($user_id);
        $count = count($datas);
        $this->load->model('user_model');
        $users=$this->user_model->get_all();
        $this->load->view('send_rec_message',array(
            'datas'=>$datas,
            'users'=>$users,
            'count'=>$count
        ));
    }
    //收件箱页面加载
    public function get_rec_message(){
        /*$this->input->get('userId');*/
        $user_id=1;
        // $user_id=$this->session->userdata('login_user')->user_id;
        $this->load->model('mail_model');
        $this->load->model('user_model');
        $datas=$this->mail_model->get_recMail_by_userId($user_id);
        $count = count($datas);
        $arr=array(
            'datas'=>$datas,
            'count'=>$count
        );
        echo json_encode($arr);
    }
    //发件箱页面加载
    public function get_send_message(){
        /*$this->input->get('userId');*/
        $user_id=1;
        //$user_id=$this->session->userdata('login_user')->user_id;
        $this->load->model('mail_model');
        $datas=$this->mail_model->get_sendMail_by_userId($user_id);
        $count = count($datas);
        $arr=array(
            'datas'=>$datas,
            'count'=>$count
        );
        echo json_encode($arr);
    }
    //公告箱页面加载
    public function get_notice_message(){
        /*$this->input->get('userId');*/
        $user_id=1;
        // $user_id=$this->session->userdata('login_user')->user_id;
        $this->load->model('mail_model');
        $this->load->model('user_model');
        $user_info=$this->user_model->get_by_id($user_id);
        $owner = $user_info -> is_owner;
        if($owner==0){
            $datas=$this->mail_model->get_noticeMail_by_userId(0);
        }else{
            $datas=$this->mail_model->get_noticeMail_by_ownerId(1);
        }
        $count = count($datas);
        $arr=array(
            'datas'=>$datas,
            'count'=>$count
        );
        echo json_encode($arr);
    }
    //单个删除选择的邮件
    public function delete_message(){
        $mail_id = $this -> input -> get('mailId');
        $this -> load -> model('mail_model');
        $rows = $this ->mail_model-> delete_by_id($mail_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    //回复选择的邮件
    public function reply_message(){
        $mail_id = $this -> input -> get('mailId');
        $content = $this -> input -> get('content');
        $this->load->model('mail_model');
        $datas=$this->mail_model->get_recMail_by_mailId($mail_id);
        $sender_id= $datas->sender_id;
        $receiver_id = $datas->receiver_id;
        $mail_data=array(
            'sender_id'=>$receiver_id,
            'receiver_id'=>$sender_id,
            'content'=>$content
        );
        $rows=$this ->mail_model->save_mail_by_reply($mail_data);
        if($rows){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    //通过内容搜索相关收到的邮件
    public function search_recMail_by_content(){
        /*$this->input->get('userId');*/
        $user_id=1;
        // $user_id=$this->session->userdata('login_user')->user_id;
        $keyword = $this -> input -> get('keyword');
        if($keyword){
           $this -> load -> model('mail_model');
           $datas = $this ->mail_model->get_recMail_by_keyword($user_id,$keyword);
            $count = count($datas);
           $arr=array(
               'datas'=>$datas,
               'count'=>$count
           );
           echo json_encode($arr);
       }else{
           echo "fail";
       }
    }
    //通过内容搜索相关发出的邮件
    public function search_sendMail_by_content(){
        /*$this->input->get('userId');*/
        $user_id=1;
        //$user_id=$this->session->userdata('login_user')->user_id;
        $keyword = $this -> input -> get('keyword');
        if($keyword){
            $this -> load -> model('mail_model');
            $datas = $this ->mail_model->get_sendMail_by_keyword($user_id,$keyword);
            $count = count($datas);
            $arr=array(
                'datas'=>$datas,
                'count'=>$count
            );
            echo json_encode($arr);
        }else{
            echo "fail";
        }
    }
    //通过内容搜索相关收到的公告
    public function search_noticeMail_by_content(){
        /*$this->input->get('userId');*/
       $user_id=1;
        // $user_id=$this->session->userdata('login_user')->user_id;
        $keyword = $this -> input -> get('keyword');
        if($keyword){
            $this->load->model('mail_model');
            $this->load->model('user_model');
            $user_info=$this->user_model->get_by_id($user_id);
            $owner = $user_info -> is_owner;
            $datas = $this ->mail_model->get_noticeMail_by_keyword($owner,$keyword);
            $count = count($datas);
            $arr=array(
                'datas'=>$datas,
                'count'=>$count
            );
            echo json_encode($arr);
        }else{
            echo "fail";
        }
    }
    //批量删除选择的邮件
    public function delete_selected_mail(){
        $mail_ids_str = $this -> input -> get('mailIdStr');
        $this -> load -> model('mail_model');
        $rows = $this -> mail_model -> delete_selected($mail_ids_str);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    /*-----------------------------------------收发回复结束--------------------------------------------------------*/


    /*-----------------------------------------房客评论房东开始----------------------------------------------------*/

    //房客对他的页面加载
    public function user_comment_owner($offset=0){
        //$owner_id=$this->input->get(ownerId);
        $owner_id=1;
        //$owner_id=$this->session->userdata('login_user')->user_id;
        $this->load->model('comment_owner_model');
        $this->load->model('user_model');
        $counts=$this->comment_owner_model->get_ownerComments_by_ownerId_count($owner_id);
        $scores =$this->comment_owner_model->get_ownerComments_by_ownerId_sum($owner_id);
        $count=floatval($counts[0]->count);
        $sum=floatval($scores[0]->sum);
        $average =round(($sum/$count),1);
        /*分页配置信息开始*/
        $this->load->library('pagination');
        $config['base_url'] = 'admin/mgruser/user_comment_owner/';
        $config['total_rows'] =11;
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        /*分页配置信息结束*/
        $datas = $this -> comment_owner_model -> get_by_page($owner_id,$config['per_page'], $offset);

        $this->load->view('user_comment_owner',array(
            'datas'=>$datas,
            'average'=>$average
        ));
    }
    /*---------------------------------------------房客评论房东结束---------------------------------------------------------*/

    /*---------------------------------------------房客管理开始-------------------------------------------------------------*/

    //后台房客管理加载界面
    public function mgr_user($offset=0){
        $title = $this -> input -> get('title');
        $this -> load -> model('user_model');
        $total_rows = $this -> user_model -> get_all_count($title);
        /*分页配置信息开始*/
        $this->load->library('pagination');
        $config['base_url'] = 'admin/mgruser/mgr_user/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        /*分页配置信息结束*/
        $users = $this -> user_model -> get_by_page($title, $config['per_page'], $offset);
        $this -> load -> view('admin/mgr_user', array(
            'users' => $users
        ));
    }
    //后台房客管理房客资料更新界面加载
    public function mgr_user_update(){
        $user_id=$this->input->get('userId');
        $this->load->model('hobby_model');
        $this->load->model('user_model');
        $this->load->model('user_hobby_model');
        $user=$this->user_model->get_by_id($user_id);
        $hobbys=$this->hobby_model->get_all();
        $user_hobbys=$this->user_hobby_model->get_userHobby_by_userId($user_id);
        if($user){
            $this->load->view('admin/mgr_user_update',array(
                'user'=>$user,
                'hobbys'=>$hobbys,
                'user_hobbys'=>$user_hobbys
            ));
        }else{
            echo '没有查到指定值';
        }
    }
   //后台房客管理房客资料更新
    public function mgr_user_edit(){
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '4096';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("img"))
        {
            $upload_data = $this -> upload -> data();
            $this -> load -> library("image_lib");
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

            $this -> image_lib -> initialize($config);
            $this -> image_lib -> resize();
            $this -> image_lib -> clear();

            $thumb_img = 'upload/'.$upload_data['raw_name'] . '_thumb'  . $upload_data['file_ext'];

            //压缩大图
            $config['image_library'] = 'gd2';
            $config['source_image'] = $upload_data['full_path'];
            $config['thumb_marker'] = '';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['master_dim'] = 'width';
            $config['width'] = 1170;
            $config['height'] = 400;

            $this -> image_lib -> initialize($config);
            $this -> image_lib -> resize();
            $this -> image_lib -> clear();

            $img = 'upload/'.$upload_data['raw_name'] . $upload_data['file_ext'];

            $firstname= htmlspecialchars($this->input->post('firstname'));
            $lastname=htmlspecialchars($this->input->post('lastname'));
            $sex=$this->input->post('sex');



            $birth=$this->input->post('birth');
            $arr=explode('-', $birth);
            if(($arr[1]==null)&&($arr[2]==null)){
                $birth_year=date('Y',time());
                $birth_month=date('m',time());
                $birth_day=date('d',time());

            }else{
                $birth_year=$arr[0];
                $birth_month=$arr[1];
                $birth_day=$arr[2];
            }

            $email=htmlspecialchars($this->input->post('email'));
            $tel = htmlspecialchars($this->input->post('tel'));
            $country =$this ->input->post('country');
            $address =htmlspecialchars($this->input->post('address'));
            $currency = $this->input->post('currency');
            $hobby =$this->input->post('hobby');
            $intro = htmlspecialchars($this ->input ->post('intro'));

            $user_id=$this->input->post('userId');

            $user_data = array(
                'first_name'=>$firstname,
                'last_name'=>$lastname,
                'sex'=>$sex,
                'birth_year'=>$birth_year,
                'birth_month'=>$birth_month,
                'birth_day'=>$birth_day,
                'email'=>$email,
                'tel'=>$tel,
                'country'=>$country,
                'address'=>$address,
                'currency'=>$currency,
                'intro'=>$intro,
                'img'=>$img,
                'thumb_img'=>$thumb_img,
                'hobby' => $hobby

            );
            $this->load->model('user_model');
            $this->load->model('user_hobby_model');
            $this->user_hobby_model->del_userHobby_by_userId($user_id);
            $rows=$this->user_model->update_by_id($user_id,$user_data);

            if($rows){
                redirect('admin/mgr_user');
            }else{
                echo 'fail';
            }
        }else{
            $firstname= htmlspecialchars($this->input->post('firstname'));
            $lastname=htmlspecialchars($this->input->post('lastname'));
            $sex=$this->input->post('sex');
            $birth=$this->input->post('birth');
            $arr=explode('-', $birth);

            if(($arr[1]==null)&&($arr[2]==null)){
                $birth_year=date('Y',time());
                $birth_month=date('m',time());
                $birth_day=date('d',time());

            }else{
                $birth_year=$arr[0];
                $birth_month=$arr[1];
                $birth_day=$arr[2];
            }
            $email=htmlspecialchars($this->input->post('email'));
            $tel = htmlspecialchars($this->input->post('tel'));
            $country =$this ->input->post('country');
            $address =htmlspecialchars($this->input->post('address'));

            $currency = $this->input->post('currency');
            $hobby =$this->input->post('hobby');
            $intro = htmlspecialchars($this ->input ->post('intro'));

            $user_id=$this->input->post('userId');
            $user_data = array(
                'first_name'=>$firstname,
                'last_name'=>$lastname,
                'sex'=>$sex,
                'birth_year'=>$birth_year,
                'birth_month'=>$birth_month,
                'birth_day'=>$birth_day,
                'email'=>$email,
                'tel'=>$tel,
                'country'=>$country,
                'address'=>$address,
                'currency'=>$currency,
                'intro'=>$intro,
                'hobby' => $hobby
            );

            $this->load->model('user_model');
            $this->load->model('user_hobby_model');
            $this->user_hobby_model->del_userHobby_by_userId($user_id);
            $rows=$this->user_model->update_by_id($user_id,$user_data);

            if($rows){
                redirect('admin/mgr_user');
            }else{
                echo 'fail';
            }
        }

    }
    //后台房客管理新增房客资料界面加载
    public function mgr_user_add(){
        $this->load->model('hobby_model');
        $hobbys=$this->hobby_model->get_all();
        $this->load->view('admin/mgr_user_add',array(
            'hobbys'=>$hobbys
        ));
    }
    //后台房客管理房客资料保存
    public function mgr_user_save(){
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '4096';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("img"))
        {
            $upload_data = $this -> upload -> data();

            $this -> load -> library("image_lib");
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

            $this -> image_lib -> initialize($config);
            $this -> image_lib -> resize();
            $this -> image_lib -> clear();

            $thumb_img = 'upload/'.$upload_data['raw_name'] . '_thumb'  . $upload_data['file_ext'];

            //压缩大图
            $config['image_library'] = 'gd2';
            $config['source_image'] = $upload_data['full_path'];
            $config['thumb_marker'] = '';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['master_dim'] = 'width';
            $config['width'] = 1170;
            $config['height'] = 400;

            $this -> image_lib -> initialize($config);
            $this -> image_lib -> resize();
            $this -> image_lib -> clear();

            $img = 'upload/'.$upload_data['raw_name'] . $upload_data['file_ext'];

            $firstname= htmlspecialchars($this->input->post('firstname'));
            $lastname=htmlspecialchars($this->input->post('lastname'));
            $sex=$this->input->post('sex');

            $birth=$this->input->post('birth');
            $arr=explode('-', $birth);
            if(($arr[1]==null)&&($arr[2]==null)){
                $birth_year=date('Y',time());
                $birth_month=date('m',time());
                $birth_day=date('d',time());

            }else{
               $birth_year=$arr[0];
                $birth_month=$arr[1];
                $birth_day=$arr[2];
            }

            $email=htmlspecialchars($this->input->post('email'));
            $tel = htmlspecialchars($this->input->post('tel'));
            $country =$this ->input->post('country');
            $address =htmlspecialchars($this->input->post('address'));
            $currency = $this->input->post('currency');
            $hobby =$this->input->post('hobby');
            $intro = htmlspecialchars($this ->input ->post('intro'));
            $user_data = array(
                'first_name'=>$firstname,
                'last_name'=>$lastname,
                'sex'=>$sex,
                'birth_year'=>$birth_year,
                'birth_month'=>$birth_month,
                'birth_day'=>$birth_day,
                'email'=>$email,
                'tel'=>$tel,
                'country'=>$country,
                'address'=>$address,
                'currency'=>$currency,
                'intro'=>$intro,
                'img'=>$img,
                'thumb_img'=>$thumb_img,
                'hobby' => $hobby


            );
            $this->load->model('user_model');
            $rows=$this->user_model->save($user_data);
            if($rows){
                

                redirect('admin/mgr_user');
            }else{
                echo 'fail';
            }
        }else{
            var_dump($this->upload->display_errors());
            echo '文件上传失败!';
        }
    }

    //后台房客管理通过关键字匹配姓名查询房客
    public function search_user(){
        $keyword = $this -> input -> get('keyword');
        $this -> load -> model('user_model');
        $results = $this ->user_model->get_user_by_keyword($keyword);
        if($results){
            echo json_encode($results);
        }
    }

    //后台房客管理房客单个选中删除
    public function delete_user(){
        $user_id = $this -> input -> get('userId');
        $this -> load -> model('user_model');
        $rows = $this ->user_model-> delete($user_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    //后台房客管理房客单个选中禁用
    public function disabled_user(){
        $user_id = $this -> input -> get('userId');
        $this -> load -> model('user_model');
        $rows = $this ->user_model->disable($user_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    //后台房客管理房客批量选中删除
    public function delete_selected_user(){
        $user_ids = $this -> input -> get('userIdStr');
        $this -> load -> model('user_model');
        $rows = $this -> user_model -> delete_selected($user_ids);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    /*---------------------------------------------房客管理结束----------------------------------------------------------------*/
}
