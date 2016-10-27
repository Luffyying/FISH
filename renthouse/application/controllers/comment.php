<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('appeal_model');
		$this -> load -> model('house_model');
		$this -> load -> model('comment_house_model');
		$this -> load -> model('comment_owner_model');
		$this -> load -> model('book_model');
	}

	public function evaluate(){
		$order_id = $this -> input -> get("orderId");
		$user_status = $this -> input -> get("userSt");
		$house_id = $this -> input -> get("houseId");
		$house = $this -> house_model -> get_by_id($house_id);

		$this->load->view('evaluate',array(
			'house' => $house,
			'order_id' => $order_id,
			'user_status' => $user_status
		));
	}


	public function save_comment(){


		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '3076';
		$config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);


		$this->load->library('upload', $config);

//		if ($this->upload->do_upload("imgOne") && $this->upload->do_upload("imgTwo") && $this->upload->do_upload("imgThree"))
//		{

		$order_id = $this -> input -> post("orderId");
		$user_status = $this -> input -> post("userStatus");

			$mark1 = $this ->input -> post('mark1');
			$houseFeel = $this -> input -> post('houseFeel');
//			$imgOne = $this -> input -> post('imgOne');
//			$imgTwo = $this -> input -> post('imgTwo');
//			$imgThree  = $this -> input -> post('imgThree');
			$mark2 = $this ->input -> post('mark2');
			$ownFeel = $this -> input -> post('ownFeel');
			$houseId = $this -> input -> post('houseId');

			$upload_data = $this -> upload -> data();

			$this -> load -> library("image_lib");
			//图片1
			$config['image_library'] = 'gd2';
			$config['source_image'] = $upload_data['full_path'];
			$config['thumb_marker'] = '_imgOne';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['master_dim'] = 'width';
			$config['width'] = 330;
			$config['height'] = 240;
//			$config['maintain_ratio'] = FALSE;

			$this -> image_lib -> initialize($config);
			$this -> image_lib -> resize();
			$this -> image_lib -> clear();

			$imgOne = 'upload/'.$upload_data['raw_name'] . '_imgOne' . $upload_data['file_ext'];

			//图片2
			$config['image_library'] = 'gd2';
			$config['source_image'] = $upload_data['full_path'];
			$config['thumb_marker'] = '_imgTwo';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['master_dim'] = 'width';
			$config['width'] = 330;
			$config['height'] = 240;
//			$config['maintain_ratio'] = FALSE;

			$this -> image_lib -> initialize($config);
			$this -> image_lib -> resize();
			$this -> image_lib -> clear();

			$imgTwo = 'upload/'.$upload_data['raw_name'] . '_imgTwo' . $upload_data['file_ext'];

			//图片3
			$config['image_library'] = 'gd2';
			$config['source_image'] = $upload_data['full_path'];
			$config['thumb_marker'] = '_imgThree';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['master_dim'] = 'width';
			$config['width'] = 330;
			$config['height'] = 240;
//			$config['maintain_ratio'] = FALSE;

			$this -> image_lib -> initialize($config);
			$this -> image_lib -> resize();
			$this -> image_lib -> clear();

			$imgThree = 'upload/'.$upload_data['raw_name'] . '_imgThree' . $upload_data['file_ext'];

			$rows1 = $this -> comment_house_model -> save($mark1,$houseFeel,$imgOne,$imgTwo,$imgThree,$houseId);
			$rows2 = $this -> comment_owner_model -> save($mark2,$ownFeel);
			if($rows1 > 0 && $rows2 > 0){
//				redirect('book/journey');
//				redirect('book/user_comment');
//				echo "success";
//				var_dump($user_status);
//				var_dump($order_id);
				if($user_status == 41){
					$r1 = $this -> book_model -> update_order_status_user($order_id, 42);
				}else if($user_status == 43){
					$r1 = $this -> book_model -> update_order_status_user($order_id, 44);
				}
				if($r1){
					echo "success";
				}else{
					echo "fail";
				}
			}else{
				echo '留言失败';
			}
//		}else{
//			var_dump($this->upload->display_errors());
//			echo '文件上传失败!';
//		}

	}

	public function evaluate_content(){
		$feedback = $this -> input -> get('feedback');
		$rows = $this -> appeal_model -> insert_appeal($feedback);
		if($rows > 0){
			echo 'success';
		}else{
			echo 'fail';
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */