<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('house_model');
    }

    public function index(){
        $house = $this -> house_model -> get_house_all();
        $house_type = $this -> house_model -> get_house_type();
        $house_rent_type = $this -> house_model -> get_house_rent_type();
        $convenience = $this -> house_model -> get_convenience();
        $city = $this -> house_model -> get_city();
        $data = array(
            "houses" => $house,
            "house_types" => $house_type,
            "conveniences" => $convenience,
            "house_rent_types" => $house_rent_type,
            "city" => $city
        );

        $this->load->view('admin/house', $data);
    }
    public function get_street(){
        $city_id = $this -> input -> get("cityId");
        $street = $this -> house_model -> get_street_by_city($city_id);
        echo json_encode($street);
    }
    public function get_road(){
        $street_id = $this -> input -> get("streetId");
//var_dump($street_id);
        $road = $this -> house_model -> get_street_by_city($street_id);
        echo json_encode($road);
    }
    public function house_detail(){
        $house_id = $this -> input -> get("house_id");
        $house_detail = $this -> house_model -> get_house_detail($house_id);
        $data = array(
            "house_detail" => $house_detail
        );
        $this->load->view('admin/house_detail', $data);
    }
    public function change_house_status(){
        $status = $this -> input -> get("status");
        $house_id = $this -> input -> get("houseId");

        $data = $this -> house_model -> change_house_status($house_id, $status);

        if($data){
            echo "success";
        }else{
            echo "fail";
        }

    }
    public function add_house(){
        $this -> load -> view("admin/add_house");
    }
    public function save_house(){
        $title = $this -> input ->post("title");
        $house = array(
            "title" => $title
        );
        $data = $this -> house_model -> save_house($house);
        if($data){
            echo "success";
        }else{
            echo "fail";
        }
//        redirect('admin/house');
    }


    public function search_house(){
        $searchObj = $this -> input -> get("searchObj");
//        var_dump($searchObj);
        $data =  $this -> house_model -> get_house_by_search($searchObj);
        echo json_encode($data);
    }

}


