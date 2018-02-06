<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perumahan extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'master/perumahan/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('perumahan_m', 'data');
		$this->load->helper('my_helper');
		$this->load->library('image_lib');
		signin();
	}
	
	public function index()
	{
		if(!group(array('1','2'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}
		$data['head'] 		= 'Daftar Perumahan';
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

		$data['head'] 		= 'Tambah Perumahan Baru';
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

		$data['head'] 		= 'Ubah Data Perumahan';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
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

	public function detail($id=null)
	{
		$data['head'] 		= 'Profil Perumahan';
		$data['record'] 	= $this->data->get_id($id);
		$data['kavling'] 	= $this->data->get_kavling($id);
		$data['content'] 	= $this->folder.'detail';
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
            $col[] = '<a onclick="detail_data();" href="'.site_url('master/perumahan/detail/'.$row->id).'">'.$row->perumahan.'</a>';
			$col[] = $row->lokasi;
			$col[] = $row->alamat;
			$col[] = $row->telpon;
			$col[] = $row->gambar ? '<img src="'.$row->gambar.'" width="100px" height="75px" onerror="this.src='.base_url('asset/dist/img/boxed-bg.jpg').'" >' : '-';
			//$col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('master/perumahan/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
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
			'perumahan' => $this->input->post('perumahan', TRUE),
			'lokasi' => $this->input->post('lokasi', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			'telpon' => $this->input->post('telpon', TRUE),
			'email' => $this->input->post('email', TRUE),
			'informasi' => $this->input->post('informasi'),
			'gambar' => $this->input->post('gambar'),
			'code' => $this->session->userdata('code')
		);
        
        if($this->validation()){
            $insert = $this->data->insert($data);
        }
    }
    
    public function ajax_update($id)
    {
        $data = array(
			'perumahan' => $this->input->post('perumahan', TRUE),
			'lokasi' => $this->input->post('lokasi', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
			'telpon' => $this->input->post('telpon', TRUE),
			'email' => $this->input->post('email', TRUE),
			'informasi' => $this->input->post('informasi'),
			'gambar' => $this->input->post('gambar'),
			'code' => $this->session->userdata('code')
		);

        if($this->validation($id)){
            $this->data->update($data, $id);
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
    
    // public function ajax_delete_all()
    // {
    //     $list_id = $this->input->post('id');
    //     foreach ($list_id as $id) {
    //         $this->data->delete($id);
	// 		//helper_log("trash", "Menghapus Daftar Perumahan");
    //     }
    //     echo json_encode(array("status" => TRUE));
    // }
	
	private function validation($id=null)
    {
        $data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules("perumahan", "Nama Perumahan", "trim|required");
		$this->form_validation->set_rules("lokasi", "Lokasi Perumahan", "trim|required");
		$this->form_validation->set_rules("alamat", "Alamat Pemasaran", "trim|required");
		$this->form_validation->set_rules("informasi", "Informasi Perumahan", "trim");
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
	
	public function ajax_upload(){
		
		$result = array();
		// konfigurasi gambar yang akan diupload
		if (isset($_FILES) ) {
			$FILES = array();
			foreach ($_FILES as $file){
				// resize for thumbnail
				// membuat 'thumbnail'
				$config['source_image'] = $file['tmp_name'];
				$config['height'] = 225;
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