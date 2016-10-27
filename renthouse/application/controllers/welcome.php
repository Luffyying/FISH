<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('user_model');
        $this->load->model('user_hobby_model');
        $this->load->model('house_model');
        $this->load->model('hobby_model');
        $this->load->model('city_model');
        $this->load->model('house_img_model');
        $this->load->model('hobby_model');
        $this->load->model('house_type_model');
        $this->load->model('house_rent_type_model');
        $this->load->model('house_convenience_model');
        $this->load->model('convenience_model');
        $this->load->model('convenient_model');
        $this->load->model('comment_house_model');
    }
	public function index()
	{
		$this->load->view('index');
	}
     /*  search the house start */
    public function street(){
        $id = $this->input->get('id');
        $streets = $this->city_model->get_all_street($id);
        echo json_encode($streets);
    }
    public function city(){
        $city = $this->city_model->get_all_city();
        echo json_encode($city);
    }
	public function search($offset=0){
        $flag = $this->input->get('flag');
        $title = $this->input->get('title');
        $ba = $this->input->get('c');

            $pro = $this->input->get('pro');
            $cit = $this->input->get('cit');
            $start = $this->input->get('start');
            $end = $this->input->get('end');
            $hold = $this->input->get('hold');
            $house_type = $this->input->get('house_type');
            $rent_type = $this->input->get('rent_type');
            $price = $this->input->get('price');
            $room = $this->input->get('room');
            $bed = $this->input->get('bed');
            $toilet = $this->input->get('toilet');
            $conv = $this->input->get('conv');
            $data = array(
                'flag'=>0,
                'pro' => $pro,
                'cit' => $cit,
                'start' => $start,
                'end' => $end,
                'hold' => $hold,
                'house_type' => $house_type,
                'rent_type' => $rent_type,
                'price' => $price,
                'room' => $room,
                'bed' => $bed,
                'toilet' => $toilet,
                'conv' => $conv
            );
        if($flag==1){
            $data = array(
                'c'=>$ba,
                'title'=>$title,
                'flag'=>$flag,
                'pro' => '',
                'cit' => '',
                'start' => '',
                'end' => '',
                'hold' => '',
                'house_type' => '',
                'rent_type' => '',
                'price' => '',
                'room' => '',
                'bed' => '',
                'toilet' =>'',
                'conv' => ''
            );
        }
        var_dump($data);
        /*page config start*/
        //$offset = $this -> uri -> segment(3) == NULL?0:$this -> uri -> segment(3);
        //$orderby = $this->input->get('orderby');
        $orderby = $this -> uri ->segment(3);
        $total_rows = $this->house_model->get_counts($data);
        var_dump($total_rows);
        $this->load->library('pagination');
        $config['base_url'] = 'welcome/search/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 6;
        $config['uri_segment'] = 3;
        // if($orderby=='price'){
        //     $config['base_url'] = 'welcome/search/price/';
        //     $config['uri_segment'] = 4;
        //     $config['per_page'] = 11;
        // }
        $this->pagination->initialize($config);
        /*page config end*/
        $res = $this->house_model->show_all_pic($data,$orderby,$config['per_page'], $offset);
        var_dump($res);
        $d = $this->convenient_model->get_all();
            $imgs = array(
            'images'=>$res,
            'cons'=>$d);
            $this->load->view('search',$imgs);
    }
      /*  search the house end */
	public function become_owner(){
		//成为房东
		$this->load->view('become_owner');
	}
	public  function  order(){
		//预定房源
		$this->load->view('order');
	}
	public function tanceng(){
		//弹层主页
		$this->load->view('tanceng');
	}
	public  function share(){
		//分享个人
		$this->load->view('share');
	}
	public  function  complaint(){
		//申诉
		$this->load->view('complaint');
	}
	public  function  complaint_details(){
		//申诉详情
		$this->load->view('complaint_details');
	}
	public function Guest_home()
	{
		$this->load->view('Guest_home');
	}
	public function booklist(){
		$this->load->view('booklist.php');
	}
	public function owner_page(){
	    //跳转到房东主页
	    $this->load->view('owner_page');
    }
    public function collect_page(){
        //跳转到收藏页
        $this->load->view('collect_page');
    }
    public function publish(){
        $cities = $this->city_model->get_all_city();
        //跳转到发布房源页
        $this->load->view('publish',array(
            'cities'=>$cities
        ));
    }
	/*编辑房客信息页面*/
    public function edit_user_infor(){
    	$hobby = $this->hobby_model->get_all();
        //$user_id = 1;
        $user_id = $this->session->userdata('login_user')->user_id;
        $infor = $this->user_model->get_by_id($user_id);
    	$data = array('hobbys'=>$hobby,
            'infor'=>$infor);
    	$this->load->view('edit_user_infor',$data);
    }
    /*保存编辑的房客信息*/
    public function save_user_infor(){
    	$config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3076';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this->load->library('upload', $config);
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
            //原图
            $img ='upload/'.$upload_data['raw_name'] .$upload_data['file_ext'];
            $img_thumb = 'upload/'.$upload_data['raw_name'] . '_thumb'  . $upload_data['file_ext'];
            $first_name = $this->input->post('name1');
            $last_name = $this->input->post('name2');
            $sex = $this->input->post('sex');
            $birth = $this->input->post('birth');
            $year = explode('-',$birth)[0];
            $month = explode('-',$birth)[1];
            $day = explode('-',$birth)[2];
            $tel = $this->input->post('tel');
            $mail = $this->input->post('e-mail');
            $address = $this->input->post('address');
            $country = $this->input->post('country');
            $currency = $this->input->post('currency');
            $introduce= $this->input->post('introduce');
            $hobbys =$this->input->post('hobbys');
            $user_data = array(
                 'first_name'=>$first_name,
                 'last_name'=>$last_name,
                 'tel'=>$tel,
                 'email'=>$mail,
                 'birth_year'=>$year,
                 'birth_month'=>$month,
                 'birth_day'=>$day,
                 'sex'=>$sex,
                 'intro'=>$introduce,
                 'currency'=>$currency,
                 'country'=> $country,
                 'address'=>$address,
                 'img'=>$img,
                 'thumb_img'=>$img_thumb
                 );
            $user_id = $this->session->userdata('login_user')->user_id;
            $h = explode(',', $hobbys);
            $clear = $this->user_hobby_model->delete($user_id);
            for($i=0;$i<count($h);$i++){
	            $user_hobby = array(
	            	'user_id'=>1,
	            	'hobby_id'=>$h[$i]);
	            $res = $this->user_hobby_model->save($user_hobby);
        	}
            $res2 = $this->user_model->edit_user_save($user_data,$user_id);
            if($res2){
             	$this->load->view('index');
            }
        }else{
                var_dump($this->upload->display_errors());
                echo '文件上传失败!';
            }
    }


    /*------------------------------前台登陆开始----------------------------*/
    //登陆弹窗
    public function register(){
        $this->load->view('register');
    }
    //login
    public function login(){
        $this->load->view('login');
    }
    //forget_password
    public function forget_password(){
        $this->load->view('forget_password');
    }

    //ajax验证电话是否存在
    public function check_tel(){
        $tel = $this -> input -> post('tel');
        $rs = $this -> user_model -> get_by_tel($tel);
        var_dump($rs);
        if($rs){
            echo 'ture';
        }else{
            echo 'false';
        }
    }
    //ajax验证email是否存在
    public function check_email(){
        $email = $this -> input -> post('email');
        $rs = $this -> user_model -> get_by_email($email);
        if($rs){
            echo 'ture';
        }else{
            echo 'false';
        }
    }
    //登陆验证
    public function check_login(){
        $username = $this -> input -> post('username');
        $password = $this -> input -> post('password');
        $row = $this -> user_model -> get_by_username_password($username, $password);
        if($row){
            //put user's infomation into session
            $this -> session -> set_userdata("login_user", $row);
            echo 'true';
        }else{
            echo 'false';
        }
    }
    //退出登录并删除session
    public function logout(){
        $this-> session -> unset_userdata("login_user");
        echo 'success';
    }




    /*--------------------------------前台登陆结束-------------------------------*/

    /*-------------------------------房源展示页开始--------------------------------*/
    /*转到房源展示页面*/
    public function house_detail(){
         $house_id = $this -> input -> get('house_id');
        // $comment_offset = $this -> input -> get('commentOffset');
        $house_imgs = $this -> house_img_model -> get_by_house_id_main($house_id);
//        $house_imgs_small = $this -> house_img_model -> get_by_house_id($house_id);
        $house = $this -> house_model -> get_by_house_id($house_id);
        $house_conveniences = $this -> house_convenience_model -> get_by_house_id($house_id);

        $comments_to_house = $this -> comment_house_model -> get_by_house_id($house_id);

        foreach ($comments_to_house as $comment_to_house) {
            $comment_to_house -> user_info =  $this -> user_model -> get_by_id($comment_to_house -> user_id);
        }
        // var_dump($comment_to_house);
        // die();
        //
        $conveniences = array();
        foreach ($house_conveniences as $house_convenience) {
            $rs_convenience = $this -> convenience_model -> get_by_convenience_id($house_convenience -> convenience_id);
            array_push($conveniences, $rs_convenience);
        }

        $owner_info = $this -> user_model -> get_by_id($house -> user_id);
        $house_type = $this -> house_type_model -> get_by_house_type_id($house -> type_id);
        $house_rent_type = $this -> house_rent_type_model -> get_by_house_rent_type_id($house -> rent_type_id);


        $this -> load -> view('house_detail', array(
            'house_imgs'        => $house_imgs,
            'house_imgs_small'  => $house_imgs_small,
            'house'             => $house,
            'owner_info'        => $owner_info,
            'house_type'        => $house_type,
            'house_rent_type'   => $house_rent_type,
            'conveniences'      => $conveniences,
            'comments_to_house' => $comments_to_house
        ));
    }

    public function get_more(){
        $house_id = $this -> input -> get('houseId');
        $offset = $this -> input -> get('offset');
        $comments_to_house = $this -> comment_house_model -> get_comments_by_page($house_id, $offset);
        foreach ($comments_to_house as $comment_to_house) {
            $comment_to_house -> user_info =  $this -> user_model -> get_by_id($comment_to_house -> user_id);
        }
        echo json_encode($comments_to_house);
    }

    /*-------------------------------房源展示页结束--------------------------------*/


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */