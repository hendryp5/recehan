<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registrasi extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'registrasi/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('registrasi_m', 'data');
		//signin();
	}
	
	public function index()
	{
		$data = array(
			'code'=>$this->data->get_code(),
			'level'=> 3,
			'active'=> 1
		);

		$insert = $this->data->from_form(NULL, $data)->insert();
		
		$data['head'] 		= 'REGISTRASI SAKA SISTEM';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		if($insert === FALSE)
		{
			$this->load->view('registrasi/default', $data);
		}
		else
		{
			$this->session->set_flashdata('flashconfirm','Data Anda Sudah Di Simpan. Silahkan Login');
			redirect('registrasi');
		}
		
	}
}