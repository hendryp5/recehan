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
		$this->load->library('image_lib');
		//signin();
	}
	
	public function index()
	{
		$data['head'] 		= 'Data Perumahan';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$this->load->view('template', $data);
	}
	
	public function created()
	{
		$data['head'] 		= 'Tambah Data Perumahan';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$this->load->view('template', $data);
	}
	
	public function updated($id=null)
	{
		$data['head'] 		= 'Ubah Data Perumahan';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}
	
	public function ajax_upload(){
		// will return array
		$result = array();

		// konfigurasi gambar yang akan diupload
		$imgconfig['ratio_w'] = 16;
		$imgconfig['ratio_h'] = 9;
		$imgconfig['ratio'] = $imgconfig['ratio_w']/$imgconfig['ratio_h'];
		$imgconfig['thumb_height'] = '200px';
		$imgconfig['crop_position_list'] = array(
			'center',
			'right',
			'left',
			'top',
			'bottom',
			'top_right',
			'bottom_right',
			'top_left',
			'bottom_right'
		);
		$imgconfig['crop_position'] = '200px'; // TODO: implement crop position

		if (isset($_FILES) ) {
			$FILES = array();
			foreach ($_FILES as $file){
				// Modify image
				// TODO: make a dedicated function/lib

				// $config['image_library'] = 'GD2'; // 'GD' by default
				$config['source_image'] = $file['tmp_name'];
				
				// resize to ratio 4:3

				// cek ukuran gambar
				$file['imagesize'] = getimagesize($file['tmp_name']);


				// atur konfigurasi crop
				if ($file['imagesize'][0] > $file['imagesize'][1]){
					// jika lebar lebih dari tinggi
					// crop width
					// potong lebar
					$file['width'] = round($file['imagesize'][1]/$imgconfig['ratio_h']*$imgconfig['ratio_w']);
					$file['height'] = $file['imagesize'][1];
					// selisih potongan
					$file['delta'] = $file['imagesize'][0]-$file['width'];
					$file['crop_at'] = 'x_axis';

				}else{
					// jika lebar TIDAK lebih dari tinggi
					// crop height
					// potong tinggi
					$file['width'] = $file['imagesize'][0];
					$file['height'] = round($file['imagesize'][0]/$imgconfig['ratio_w']*$imgconfig['ratio_h']);
					// selisih potongan
					$file['delta'] = $file['imagesize'][1]-$file['height'];
					$file['crop_at'] = 'y_axis';
				}

				// atur potongan ke tengah gambar
				$file['half_delta'] = round($file['delta']/2);
				$config[$file['crop_at']] = $file['half_delta'];
				$config['width'] = $file['width'];
				$config['height'] = $file['height'];
				// beri akhiran .crop
				$file['tmp_name'] = $file['tmp_name'].'.crop';
				$config['maintain_ratio'] = FALSE;
				$config['new_image'] = basename($file['tmp_name']);

				// terapkan konfigurasi
				$this->image_lib->initialize($config);
				// mulai potong
				if ( ! $this->image_lib->crop())
				{
					// hentikan proses jika error
			        die(json_encode($this->image_lib->display_errors()));
				}

				// bersihkan konfigurasi
				$this->image_lib->clear();
				// resize for thumbnail
				// membuat 'thumbnail'
				$tconfig['source_image'] = $file['tmp_name'];
				$tconfig['height'] = 200;
				// pertahankan proporsi gambar
				$tconfig['maintain_ratio'] = TRUE;
				// beri akhiran .thumb
				$file['tmp_name_thumb'] = $file['tmp_name'].'.thumb';
				$tconfig['new_image'] = basename($file['tmp_name_thumb']);

				// POTONG
				$this->image_lib->initialize($tconfig);
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
	
	public function ajax_list()
	{
		$record	= $this->data->get_datatables();
		$data 	= array();
		$no 	= $_POST['start'];
		
		foreach ($record as $row) {
			$no++;
			$col = array();
			$col[] = '<input type="checkbox" class="data-check" value="'.$row->id.'">';
			$col[] = $row->perumahan;
			$col[] = $row->lokasi;
			$col[] = $row->gambar ? '<img src="'.$row->gambar.'" width="100px" height="100px">' : '-';
			$col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('master/perumahan/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
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
			'perumahan' => $this->input->post('perumahan', TRUE),
			'lokasi' => $this->input->post('lokasi', TRUE),
			'gambar' => $this->input->post('gambar'),
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
			'perumahan' => $this->input->post('perumahan', TRUE),
			'lokasi' => $this->input->post('lokasi', TRUE),
			'gambar' => $this->input->post('gambar'),
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
		$this->form_validation->set_rules("perumahan", "Nama Perumahan", "trim|required");
		$this->form_validation->set_rules("lokasi", "Lokasi Perumahan", "trim|required");
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