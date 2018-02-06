<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pembangunanrumah extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'laporan/pembangunanrumah/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pembangunanrumah_m', 'data');
		$this->load->helper('my_helper');
		
		//signin();
	}
	
	public function index()
	{
		$data['head'] 		= 'Order Pembangunan';
		$data['record'] 	= $this->data->get_all();
		$data['group1'] 	= $this->data->get_group1();
		$data['new'] 		= $this->data->get_new();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}

	
	public function ajax_list()
    {
    	// var_dump($_POST);
        $record	= $this->data->get_datatables();
        $data 	= array();
        $no 	= $_POST['start'];
		
        foreach ($record as $row) {

            $no++;
            $col = array();
            $col[] = '<input type="checkbox" class="data-check" value="'.$row->id.'">';
			$col[] = $row->kavling;
			$col[] = $row->type;
			$col[] = $row->tanah.' m<sup>2</sup>';			
			$col[] = $row->bangunan.' m<sup>2</sup>' ;
			$col[] = rupiah($row->harga);  
			
            $data[] = $col;
        }
 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->data->count_all(),
			"recordsFiltered" => $this->data->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
    }
	
	
    public function ajax_delete($id)
    {
        $this->data->delete($id);
		//helper_log("trash", "Menghapus Data Perumahan");
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_delete_all()
    {
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->data->delete($id);
			//helper_log("trash", "Menghapus Data Perumahan");
        }
        echo json_encode(array("status" => TRUE));
    }
	

}