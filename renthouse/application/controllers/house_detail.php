<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('house_img_model');
        $this->load->model('user_model');
        $this->load->model('house_model');
        $this->load->model('house_type_model');
        $this->load->model('house_rent_type_model');
        $this->load->model('house_convenience_model');
        $this->load->model('convenience_model');
        $this->load->model('comment_house_model');
    }

	public function index()
	{
		$this->load->view('index');
	}
	public function search(){
		$this->load->view('search.php');
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
	/*编辑房客信息页面*/
    public function edit_user_infor(){
    	$this->load->view('edit_user_infor');
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
        // $house_id = $this -> input -> get('houseId');
        // $comment_offset = $this -> input -> get('commentOffset');
        $house_imgs = $this -> house_img_model -> get_by_house_id_main(/*$house_id*/);
        $house_imgs_small = $this -> house_img_model -> get_by_house_id(/*$house_id*/);
        $house = $this -> house_model -> get_by_house_id(/*$house_id*/);
        $house_conveniences = $this -> house_convenience_model -> get_by_house_id(/*$house_id*/);

        $comments_to_house = $this -> comment_house_model -> get_by_house_id(/*$house_id*/'1');
        
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
