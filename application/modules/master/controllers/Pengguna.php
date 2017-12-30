<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'master/pengguna/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_m', 'data');
		signin();
		//group(array('1'));
	}
	
	//halaman index
	public function index()
	{
		$data['head'] 		= 'Daftar Pengguna';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}
	
	public function created()
	{
		$data['head'] 		= 'Tambah Daftar Pengguna';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['satker'] 	= $this->data->get_satker();
		$data['group'] 		= $this->data->get_group();
		
		$this->load->view('template', $data);
	}
	
	public function updated($id)
	{
		$data['head'] 		= 'Ubah Daftar Pengguna';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form_edit';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['satker'] 	= $this->data->get_satker();
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
			$col[] = $row->fullname;
			$col[] = $row->username;
			$col[] = $row->email;
			$col[] = level($row->level);
			$col[] = $row->active ? '<a class="btn btn-xs btn-block btn-success btn-flat"><i class="fa fa-check-square"></i></a>' : '<a class="btn btn-xs btn-block btn-danger btn-flat"><i class="fa fa-minus-square"></i></a>';
            
            //add html for action
            $col[] = '<a class="btn btn-xs btn-flat btn-info" onclick="edit_data();" href="'.site_url('master/password/updated/'.$row->id).'" data-toggle="tooltip" title="Ganti Password"><i class="fa fa-key"></i></a> <a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('master/pengguna/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
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
				'username' => $this->input->post('username', TRUE),
				'fullname' => $this->input->post('fullname', TRUE),
				'email' => $this->input->post('email', TRUE),
				'password' => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT),
				'telpon' => $this->input->post('telpon', TRUE),
				'level' => $this->input->post('level', TRUE),
				'active' => $this->input->post('active', TRUE),
				'gambar' => $this->input->post('gambar'),
				'code' => $this->session->userdata('code')
        );
        
        if($this->validation()){
            $insert = $this->data->insert($data);
			//helper_log("add", "Menambah Daftar Pengguna");
        }
    }
    
    public function ajax_update($id)
    {
        $data = array(
			'username' => $this->input->post('username', TRUE),
			'fullname' => $this->input->post('fullname', TRUE),
			'email' => $this->input->post('email', TRUE),
			'telpon' => $this->input->post('telpon', TRUE),
			'level' => $this->input->post('level', TRUE),
			'active' => $this->input->post('active', TRUE),
			'gambar' => $this->input->post('gambar', TRUE),
			'code' => $this->session->userdata('code')
		);
		
        if($this->validation($id)){
            $this->data->update($data, $id);
			//helper_log("edit", "Merubah Daftar Pengguna");
        }
    }
    
    public function ajax_delete($id)
    {
        $this->data->delete($id);
		//helper_log("trash", "Menghapus Daftar Pengguna");
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_delete_all()
    {
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->data->delete($id);
			//helper_log("trash", "Menghapus Daftar Pengguna");
        }
        echo json_encode(array("status" => TRUE));
    }
	
	private function validation($id=null)
    {
        $data = array('success' => false, 'messages' => array());
        
		if(!isset($id)){
			$this->form_validation->set_rules("username", "Username", "trim|required|is_unique[users.username]");
			$this->form_validation->set_rules("password", "Password", "trim|required|min_length[6]|max_length[18]");
			$this->form_validation->set_rules("repassword", "Ulangi Password", "trim|required|matches[password]");
		}else{
			$this->form_validation->set_rules("username", "Username", "trim|required");
		}
		
		$this->form_validation->set_rules("fullname", "Nama Lengkap", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("telpon", "Telpon", "trim|is_natural");
		$this->form_validation->set_rules("level", "Tingkat Pengguna", "trim|required");
		$this->form_validation->set_rules("active", "Status Pengguna", "trim|required");
		
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
