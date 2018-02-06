<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bankmitra extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'master/bankmitra/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bankmitra_m', 'data');
		signin();
	}
	
	public function index()
	{
		if(!group(array('1','2'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}

		$data['head'] 		= 'Daftar Bank Mitra KPR';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$this->load->view('template', $data);
	}

	public function created()
	{
		if(!group(array('1','2'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}

		$data['head'] 		= 'Tambah Bank Mitra KPR';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$this->load->view('template', $data);
	}

	public function updated($id=null)
	{
		if(!group(array('1','2'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}

		$data['head'] 		= 'Ubah Bank Mitra KPR';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
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
            $col[] = $row->bank;
			$col[] = $row->cabang;
			$col[] = $row->telpon;
			$col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('master/bankmitra/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
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
			'bank' => $this->input->post('bank', TRUE),
			'cabang' => $this->input->post('cabang', TRUE),
			'telpon' => $this->input->post('telpon', TRUE),
			'code' => $this->session->userdata('code')
		);
        
        if($this->validation()){
            $insert = $this->data->insert($data);
			//helper_log("add", "Menambah Master Bank Mitra KPR");
        }
    }
    
    public function ajax_update($id)
    {
        $data = array(
			'bank' => $this->input->post('bank', TRUE),
			'cabang' => $this->input->post('cabang', TRUE),
			'telpon' => $this->input->post('telpon', TRUE),
			'code' => $this->session->userdata('code')
		);

        if($this->validation($id)){
            $this->data->update($data, $id);
			//helper_log("edit", "Merubah Master Bank Mitra KPR");
        }
    }
    
    public function ajax_delete($id)
    {
		if(!group(array('1'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}

		$this->data->delete($id);
		//helper_log("trash", "Menghapus Master Bank Mitra KPR");
        echo json_encode(array("status" => TRUE));
    }
    
    // public function ajax_delete_all()
    // {
    //     $list_id = $this->input->post('id');
    //     foreach ($list_id as $id) {
    //         $this->data->delete($id);
	// 		//helper_log("trash", "Menghapus Master Bank Mitra KPR");
    //     }
    //     echo json_encode(array("status" => TRUE));
    // }
	
	private function validation($id=null)
    {
        $data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules("cabang", "Cabang", "trim|required");
		$this->form_validation->set_rules("bank", "Nama Bank", "trim|required");
		$this->form_validation->set_rules("telpon", "Telpon Bank", "trim");
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