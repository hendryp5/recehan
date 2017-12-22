<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Daftarharga extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'penjualan/daftarharga/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('daftarharga_m', 'data');
		$this->load->helper('my_helper');
		//signin();
	}
	
	public function index()
	{
		$data['head'] 		= 'Data Daftar Harga';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}

	public function created()
	{
		$data['head'] 		= 'Tambah Data Daftar Harga';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		
		$this->load->view('template', $data);
	}

	public function updated($id=null)
	{
		$data['head'] 		= 'Ubah Data Daftar Harga';
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
			$col[] = $row->kavling;
			$col[] = $row->type;
			$col[] = $row->tanah.' m<sup>2</sup>';			
			$col[] = $row->bangunan.' m<sup>2</sup>' ;
			$col[] = rupiah($row->harga);  
			$col[] = $row->gambar ? '<img src="'.$row->gambar.'" width="100px" height="100px">' : '-';; 			
			$col[] = status_penjualan($row->status); 			
			$col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('penjualan/daftarharga/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
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
			'kode' => $this->input->post('kode'),
			'kavling' => $this->input->post('kavling'),
			'type' => $this->input->post('type'),
			'tanah' => $this->input->post('tanah'),
			'bangunan' => $this->input->post('bangunan'),
			'harga' => $this->input->post('harga'),
			'status' => $this->input->post('status'),
			'sertifikat' => $this->input->post('sertifikat'),
			'status_sertifikat' => $this->input->post('status_sertifikat'),
			'imb' => $this->input->post('imb'),
			'gambar' =>$this->input->post('gambar') ,
			'perumahan_id' => $this->input->post('perumahan_id'),
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
			'kode' => $this->input->post('kode'),
			'kavling' => $this->input->post('kavling'),
			'type' => $this->input->post('type'),
			'tanah' => $this->input->post('tanah'),
			'bangunan' => $this->input->post('bangunan'),
			'harga' => $this->input->post('harga'),
			'status' => $this->input->post('status'),
			'sertifikat' => $this->input->post('sertifikat'),
			'status_sertifikat' => $this->input->post('status_sertifikat'),
			'imb' => $this->input->post('imb'),
			'gambar' => $this->input->post('gambar'),
			'perumahan_id' => $this->input->post('perumahan_id'),
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
		$this->form_validation->set_rules("kavling", "Nama Kavling", "trim|required");
		$this->form_validation->set_rules("type", "Tipe", "trim|required");
		$this->form_validation->set_rules("tanah", "Ukuran Tanah", "trim|required");
		$this->form_validation->set_rules("bangunan", "Ukuran Bangunan", "trim|required");
		$this->form_validation->set_rules("harga", "Harga", "trim|required");
		$this->form_validation->set_rules("status", "Status", "trim|required");
		$this->form_validation->set_rules("sertifikat", " Sertifikat", "trim");
		$this->form_validation->set_rules("status_sertifikat", " Status Sertifikat", "trim|required");
		$this->form_validation->set_rules("imb", "IMB", "trim");				
		$this->form_validation->set_rules("gambar", "Gambar Perumahan", "trim");
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