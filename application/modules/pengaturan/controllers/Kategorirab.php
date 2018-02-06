<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategorirab extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'pengaturan/kategorirab/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategorirab_m', 'data');
		$this->load->helper('my_helper');
		//signin();
	}
	
	public function index()
	{
		$data['head'] 		= 'Data Kategori RAB';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}

	public function created()
	{
		$data['head'] 		= 'Tambah Kategori RAB';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		
		$this->load->view('template', $data);
	}

	public function updated($id=null)
	{
		$data['head'] 		= 'Ubah Kategori RAB';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		
		$this->load->view('template', $data);
	}
	
	public function ajax_list()
    {
        $record	= $this->data->get_datatables();
        $data 	= array();
        $no 	= $_POST['start'];
		
        foreach ($record as $row) {

            $no++;
            $col = array();
            $col[] = '<input type="checkbox" class="data-check" value="'.$row->id.'">';
			$col[] = $row->kode;
			$col[] = $row->kategori;
			$col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('pengaturan/kategorirab/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
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
	
	public function ajax_save()
    {
        $data = array(
			'parent_id' => $this->input->post('parent_id', TRUE),
			'kode' => $this->input->post('kode', TRUE),
			'kategori' => $this->input->post('kategori', TRUE),
			'code' => $this->session->userdata('code')
		);
        
        if($this->validation()){
            $insert = $this->data->insert($data);
			//helper_log("add", "Menambah Data Perumahan");
        }
    }
    
    public function ajax_update($id)
    {
        $data = array(
			'parent_id' => $this->input->post('parent_id', TRUE),
			'kode' => $this->input->post('kode', TRUE),
			'kategori' => $this->input->post('kategori', TRUE),
			'code' => $this->session->userdata('code')
		);
        if($this->validation($id)){
            $this->data->update($data, $id);
			//helper_log("edit", "Merubah Data Perumahan");
        }
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
	
	private function validation($id=null)
    {
        $data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules("kode", "Kode", "trim|required");
		$this->form_validation->set_rules("kategori", "Kategori", "trim|required");
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        if($this->form_validation->run()){
            $data['success'] = true;
        }else{
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
        return $this->form_validation->run();
    }
}