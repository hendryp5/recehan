<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'auth/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_m', 'data');
	}
	
	public function index()
	{
		//echo password_hash('admin', PASSWORD_BCRYPT);
		// $ck = new S3('521ee9cfe9a63237681e','iH9o9sfTxbE2ZsgbS5sGPCapMDtS8la4HoXPQgBi','cdn.julak.id');
		// $bucket_name = 'cdn.julak.id';
		// var_dump($ck->listBuckets());
		// var_dump($ck->putObject('Huruf yang panjang', $bucket_name, 'cdn.julak.id.kilatstorage.com/index', S3::ACL_PUBLIC_READ));
		// var_dump($ck->myGetBucket($bucket_name)); // thumb 200x200
		// $myBucket = $ck->myGetBucket($bucket_name);//$ck->putObjectFile('/data/app/dev/git/saka/recehan/asset/dist/img/avatar.png', $bucket_name, "/"."ugitestfile.png", S3::ACL_PUBLIC_READ, $metaHeaders = array(), $contentType = null);//$ck->getObjectInfo($bucket_name);//$ck->myGetBucket($bucket_name);
		
		// die("<script> console.log(JSON.parse('".json_encode($myBucket)."'));</script>");
		// var_dump($ck->getObjectInfo($bucket_name),'index');
		$data['title'] 		= 'SIGN IN';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('default', $data);
	}
	
	public function login()
	{
		$validation = array(
			array('field'=>'email', 'rules'=>'required|valid_email'),
			array('field'=>'password','rules'=>'required')
		);
		
		$this->form_validation->set_rules($validation);
		if($this->form_validation->run() == TRUE){
			$email_post = $this->input->post('email');
			$pass_post = $this->input->post('password');
			
			if($this->_resolve_user_login($email_post, $pass_post)){
				
				$user_ID = $this->_get_userID($email_post);
				$username = $this->_get_username($email_post);
				$ip_address = $this->input->ip_address();
				$level = $this->_get_level($email_post);
				$code = $this->_get_code($email_post);
				$gambar = $this->_get_gambar($email_post);
				
				$create_session = array(
					'userID'=> $user_ID,
					'username' => $username,
					'ip_address'=> $ip_address,
					'signin' => TRUE,
					'level' => $level,
					'code'=> $code,
					'gambar'=> $gambar,
				);
				
				$this->session->set_userdata($create_session);
				//helper_log("login", "Login Pada Sistem");
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('flasherror','Email/Password Tidak Ditemukan.');
				$this->index();
			}
		}else{
			$this->session->set_flashdata('flasherror', validation_errors('<div class="error">', '</div>'));
			$this->index();
		}
	}
	
	private function _resolve_user_login($email_post, $pass_post)
	{
		$hash = $this->data->get_user($email_post);
		return $this->_verify_password_hash($pass_post, $hash);
	}
	
	private function _get_userID($email_post){
		$userID = $this->data->get_userID($email_post);
		return $userID;
	}
	
	private function _get_username($email_post){
		$username = $this->data->get_username($email_post);
		return $username;
	}
	
	private function _get_level($email_post){
		$level = $this->data->get_level($email_post);
		return $level;
	}
	
	private function _get_code($email_post){
		$code = $this->data->get_code($email_post);
		return $code;
	}

	private function _get_gambar($email_post){
		$gambar = $this->data->get_gambar($email_post);
		return $gambar;
	}
	
	private function _verify_password_hash($pass_post, $hash)
	{
		return password_verify($pass_post, $hash);	
	}
	
	public function logout()
	{
		$this->session->unset_userdata('userID');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('sigin');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('code');
		$this->session->unset_userdata('gambar');
		$this->session->sess_destroy();
		//helper_log("logout", "Logout Pada Sistem");
		redirect('login');
	}
}
