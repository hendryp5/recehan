<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Followup extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'penjualan/followup/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('followup_m', 'data');
		$this->load->helper('my_helper');
		signin();
	}
	
	public function index()
	{
		$data['head'] 		= 'Followup Nasabah';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}

	public function created()
	{
		$data['head'] 		= 'Tambah Followup';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_pkj'] 	= $this->data->get_group_pkj();
		
		$this->load->view('template', $data);
	}

	public function created_followup($ktp=null)
	{
		$data['head'] 		= 'Tambah Jejak Followup';
		$data['record'] 	= $this->data->get_info_followup($ktp);
		$data['new'] 		= $this->data->get_new();
		$data['content'] 	= $this->folder.'form_follow';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_pkj'] 	= $this->data->get_group_pkj();
		
		$this->load->view('template', $data);
	}

	public function updated($id=null)
	{
		$data['head'] 		= 'Ubah Followup';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_pkj'] 	= $this->data->get_group_pkj();
		
		$this->load->view('template', $data);
	}

	public function detail($ktp=null)
	{
		$data['head'] 		= 'Riwayat Followup';
		$data['record'] 	= $this->data->get_ktp($ktp);
		$data['info'] 		= $this->data->get_info_followup($ktp);
		$data['content'] 	= $this->folder.'timeline';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}

	public function pesanunit()
	{
		$id_method = $this->uri->segment('4'); 
		$this->session->set_userdata('method','followup');
		$this->session->set_userdata('id_method',$id_method);
		redirect('penjualan/pesanunit/created');
	}
	
	public function ajax_list()
    {
        $record	= $this->data->get_datatables();
        $data 	= array();
        $no 	= $_POST['start'];
		
        foreach ($record as $row) {

            $no++;
            $col = array();
           	$col[] = '<a onclick="detail_data();" href="'.site_url('penjualan/followup/detail/'.$row->ktp).'">'.$row->nama.'</a>';
			$col[] = $row->telpon;
			$col[] = perumahan($row->perumahan_id);  			
			$col[] = $row->keterangan; 			
			$col[] = ddmmyyyy($row->tanggal); 			
			//$col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('penjualan/followup/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                  //<a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
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
			'nama' => $this->input->post('nama', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			'telpon' => $this->input->post('telpon', TRUE),
			'email' => $this->input->post('email', TRUE),
			'ktp' => $this->input->post('ktp', TRUE),
			'pekerjaan' => $this->input->post('pekerjaan', TRUE),
			'tanggal' => $this->input->post('tanggal', TRUE),
			'melalui' => $this->input->post('melalui', TRUE),
			'keterangan' => $this->input->post('keterangan', TRUE),
			'hasil' => $this->input->post('hasil', TRUE),
			'perumahan_id' => $this->input->post('perumahan_id', TRUE),
			'code' => $this->session->userdata('code'),
			'user_id' => $this->session->userdata('userID')
		);
        
        if($this->validation()){
            $insert = $this->data->insert($data);
			//helper_log("add", "Menambah Data Perumahan");
        }
    }
    
    public function ajax_update($id)
    {
       $data = array(
			'nama' => $this->input->post('nama', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			'telpon' => $this->input->post('telpon' , TRUE),
			'email' => $this->input->post('email', TRUE),
			'ktp' => $this->input->post('ktp', TRUE),
			'pekerjaan' => $this->input->post('pekerjaan', TRUE),
			'tanggal' => $this->input->post('tanggal', TRUE),
			'melalui' => $this->input->post('melalui', TRUE),
			'keterangan' => $this->input->post('keterangan', TRUE),
			'hasil' => $this->input->post('hasil', TRUE),
			'perumahan_id' => $this->input->post('perumahan_id', TRUE),
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
		$this->form_validation->set_rules("nama", "Nama", "trim|required");
		$this->form_validation->set_rules("alamat", "Alamat", "trim|required");
		$this->form_validation->set_rules("telpon", "Telpon", "trim|required");
		$this->form_validation->set_rules("pekerjaan", "Pekerjaan", "trim|required");
		$this->form_validation->set_rules("perumahan_id", "Perumahan", "trim|required");
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

    public function json_search_follow()
	{
		$query  = $this->data->get_follow();
        $data = array();
        foreach ($query as $key => $value) 
        {
            $data[] = array(
            	'id' => $value->id, 
            	'name' => $value->nama, 
            	'ktp' => $value->ktp,
            	'email' => $value->email,
            	'telpon' => $value->telpon,
            	'alamat' => $value->alamat,
            	'pekerjaan' => $value->pekerjaan
            );
        }
        echo json_encode($data);
	}

}