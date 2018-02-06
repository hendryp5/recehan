<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'dashboard/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_m', 'data');
		$this->load->helper('my_helper');
		signin();
	}
	
	public function index()
	{
		$data['head'] 		= 'Dashboard';
		$data['record'] 	= FALSE;
		$data['content'] 	= $this->folder.'default';
		$data['perusahaan'] 	= $this->data->get_perusahaan();
		$data['perumahan'] 	= $this->data->get_perumahan();
		$data['count_perumahan'] 	= $this->data->count_perumahan();
		$data['count_kavling'] 	= $this->data->count_kavling();
		$data['count_nasabah'] 	= $this->data->count_nasabah();
		$data['count_pengguna'] 	= $this->data->count_pengguna();
		//$data['style'] 	= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$this->load->view('template', $data);
	}
}