<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OwnerHomepage extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('house_model');
        $this->load->model('comment_model');
        $this->load->model('user_model');
    }
    public function index(){
        $ownerId = $this->input->get('ownerId');
        $houses = $this->house_model->get_house_by_userId();
        $hcomment = $this->comment_model->get_houseComments_by_houseId();
        $ocomments = $this->comment_model->get_ownerComments_by_ownerId();
        $owner = $this->user_model->get_by_id(1);
        //跳转到房东主页
        $this->load->view('owner_page',array(
            'houses'=>$houses,
            'hcomment'=>$hcomment,
            'ocomments'=>$ocomments,
            'owner'=>$owner
        ));
    }
}