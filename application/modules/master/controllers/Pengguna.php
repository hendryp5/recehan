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
		$this->load->helper('my_helper');
		$this->load->library('image_lib');
		signin();
		//group(array('1'));
	}
	
	//halaman index
	public function index()
	{
		if(!group(array('1','2'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}

		$data['head'] 		= 'Daftar Pengguna';
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

		$data['head'] 		= 'Tambah Daftar Pengguna';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['agama'] 		= $this->data->get_agama();
		$data['pendidikan'] = $this->data->get_pendidikan();
		$data['level'] 		= $this->data->get_level();
		$data['perumahan'] 	= $this->data->get_perumahan();
		
		
		$this->load->view('template', $data);
	}
	
	public function updated($id)
	{
		if(!group(array('1','2'))){
			if($this->session->userdata('userid') != $id){
				$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
				redirect('dashboard');
			}
		}

		$data['head'] 		= 'Ubah Daftar Pengguna';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form_edit';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['agama'] 		= $this->data->get_agama();
		$data['pendidikan'] = $this->data->get_pendidikan();
		$data['level'] 		= $this->data->get_level();
		$data['perumahan'] 	= $this->data->get_perumahan();
		$data['list'] 		= $this->data->get_users_perumahan($id);
		
		$this->load->view('template', $data);
	}

	public function detail($id)
	{
		if(!group(array('1','2'))){
			if($this->session->userdata('userid') != $id){
				$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
				redirect('dashboard');
			}
		}
		
		$data['head'] 		= 'Detail Pengguna';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'detail';
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
            $col[] = '<a onclick="detail_data();" href="'.site_url('master/pengguna/detail/'.$row->id).'">'.$row->nama.'</a>';
			$col[] = $row->email;
			$col[] = $row->telpon;
			$col[] = level($row->level_id);
			$col[] = $row->active ? '<a class="btn btn-xs btn-success btn-flat"><i class="fa fa-check-square"></i></a>' : '<a class="btn btn-xs btn-block btn-danger btn-flat"><i class="fa fa-minus-square"></i></a>';
			/*$col[] = '<a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';*/
            
            //add html for action
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
				'tmlahir' => $this->input->post('tmlahir', TRUE),
				'tglahir' => yyyymmdd($this->input->post('tglahir', TRUE)),
				'sex' => $this->input->post('sex', TRUE),
				'agama_id' => $this->input->post('agama', TRUE),
				'pendidikan_id' => $this->input->post('pendidikan', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'telpon' => $this->input->post('telpon', TRUE),
				'email' => $this->input->post('email', TRUE),
				'password' => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT),
				'level_id' => $this->input->post('level', TRUE),
				'active' => $this->input->post('active', TRUE),
				'avatar' => $this->input->post('gambar'),
				'code' => $this->session->userdata('code')
        );
        
        if($this->validation()){
			$insert = $this->data->insert($data);
			if($insert){
				$perumahan_id = $this->input->post('perumahan');
				$result = array();
				foreach($perumahan_id AS $key => $val){
					if($_POST['perumahan'][$key] != ''){
						$result[] = array(
						"user_id" => $insert,
						"perumahan_id"  => $_POST['perumahan'][$key]
						);
					}
				}
				$this->db->insert_batch('users_perumahan', $result);
			}
			//helper_log("add", "Menambah Daftar Pengguna");
        }
    }
    
    public function ajax_update($id)
    {
        $data = array(
			'nama' => $this->input->post('nama', TRUE),
			'tmlahir' => $this->input->post('tmlahir', TRUE),
			'tglahir' => yyyymmdd($this->input->post('tglahir', TRUE)),
			'sex' => $this->input->post('sex', TRUE),
			'agama_id' => $this->input->post('agama', TRUE),
			'pendidikan_id' => $this->input->post('pendidikan', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			'telpon' => $this->input->post('telpon', TRUE),
			'email' => $this->input->post('email', TRUE),
			'level_id' => $this->input->post('level', TRUE),
			'active' => $this->input->post('active', TRUE),
			'avatar' => $this->input->post('gambar'),
			'code' => $this->session->userdata('code')
		);
		
        if($this->validation($id)){
			$update = $this->data->update($data, $id);
			
			if(group(array('1','2'))){
				if($update){
					$this->db->where('user_id', $id);
					$this->db->delete('users_perumahan');
					$perumahan_id = $this->input->post('perumahan');
					$result = array();
					foreach($perumahan_id AS $key => $val){
						if($_POST['perumahan'][$key] != ''){
							$result[] = array(
							"user_id" => $id,
							"perumahan_id"  => $_POST['perumahan'][$key]
							);
						}
					}
					$this->db->insert_batch('users_perumahan', $result);
				}
			}
			//helper_log("edit", "Merubah Daftar Pengguna");
        }
    }
    
    public function ajax_delete($id)
    {
		if(!group(array('1'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}
		$this->data->delete($id);
		echo json_encode(array("status" => TRUE));
    }

    public function deleted($id)
    {
		if(!group(array('1'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}
		$this->data->delete($id);
		redirect('master/pengguna');
    }
    
    // public function ajax_delete_all()
    // {
	// 	if(!group(array('1'))){
	// 		$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
	// 		redirect('dashboard');
	// 	}
	// 	$list_id = $this->input->post('id');
    //     foreach ($list_id as $id) {
    //         $this->data->delete($id);
    //     }
    //     echo json_encode(array("status" => TRUE));
    // }
	
	private function validation($id=null)
    {
        $data = array('success' => false, 'messages' => array());
        
		if(!isset($id)){
			$this->form_validation->set_rules("password", "Password", "trim|required|min_length[6]|max_length[18]");
			$this->form_validation->set_rules("repassword", "Ulangi Password", "trim|required|matches[password]");
		}
		
		$this->form_validation->set_rules("nama", "Nama Lengkap", "trim|required");
		$this->form_validation->set_rules("tmlahir", "Tempat Lahir", "trim");
		$this->form_validation->set_rules("tglahir", "Tanggal Lahir", "trim");
		$this->form_validation->set_rules("sex", "Jenis Kelamin", "trim|required");
		$this->form_validation->set_rules("agama", "Agama / Kepercayaan", "trim|required");
		$this->form_validation->set_rules("pendidikan", "Pendidikan Terakhir", "trim");
		$this->form_validation->set_rules("alamat", "Alamat Tinggal / Domisili", "trim|required");
		$this->form_validation->set_rules("telpon", "Telpon", "trim|is_natural|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|callback_check_email");
		if(group(array('1','2'))){
			$this->form_validation->set_rules("level", "Tingkat Pengguna", "trim|required");
			$this->form_validation->set_rules("active", "Status Pengguna", "trim|required");
			$this->form_validation->set_rules("perumahan", "Lokasi Perumahan", "trim|callback_check_lokasi");
		}
		
		
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

	public function check_email($str=null)
	{
		$id = $this->uri->segment(4);
		$query = $this->db->get_where('users', array('email'=>$str, 'id !='=>$id));
		if($query->num_rows() > 0){
			$this->form_validation->set_message('check_email', '{field} sudah tersedia atau telah digunakan.');
			return FALSE;
		}else{
		 	return TRUE;
		}
	}

	public function check_lokasi($str=null)
	{
		if(empty($str))
		{
			$this->form_validation->set_message('check_lokasi', '{field} tidak boleh kosong.');
			return TRUE;
		}else{
			return FALSE; 
		}
	}

	
	public function ajax_upload(){
		
		$result = array();
		// konfigurasi gambar yang akan diupload
		if (isset($_FILES) ) {
			$FILES = array();
			foreach ($_FILES as $file){
				// resize for thumbnail
				// membuat 'thumbnail'
				$config['source_image'] = $file['tmp_name'];
				$config['height'] = 200;
				// pertahankan proporsi gambar
				$config['maintain_ratio'] = TRUE;
				// beri akhiran .thumb
				$file['tmp_name_thumb'] = $file['tmp_name'].'.thumb';
				$config['new_image'] = basename($file['tmp_name_thumb']);
				// POTONG
				$this->image_lib->initialize($config);
				if ( ! $this->image_lib->resize())
				{
			        die(json_encode($this->image_lib->display_errors()));
				}
				// simpan untuk hasil
				$FILES[] = $file;
			}	
			// upload semua gambar ke cdn
			$result = $this->file->create_files($FILES);
		}
		else {
			$result = array('error'=>"Files empty",'success'=>false);
		}
		// cetak hasil dalam bentuk dokumen .json, nb: biarkan slash '/' apa-adanya
		echo json_encode($result,JSON_UNESCAPED_SLASHES);
	}
}