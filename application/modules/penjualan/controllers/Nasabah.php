<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Nasabah extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'penjualan/nasabah/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('nasabah_m', 'data');
		$this->load->helper('my_helper');
		$this->load->library('image_lib');
		signin();
	}
	
	public function index()
	{
		$data['head'] 		= 'Data Nasabah';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}

	public function kavlingjson($id)
	{
		
		echo json_encode($this->data->get_kav($id));
		
	}

	public function created()
	{
		$data['head'] 		= 'Ubah Data Nasabah';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_kw'] 	= $this->data->get_group_kw();
		$data['group_pd'] 	= $this->data->get_group_pd();
		$data['group_agama']= $this->data->get_group_agama();
		$data['group_pkj']  = $this->data->get_group_pkj();
		$data['group_kav']  = $this->data->get_group_kav();
		
		$this->load->view('template', $data);
	}

	public function updated($id=null)
	{
		$data['head'] 		= 'Ubah Data Nasabah';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_kw'] 	= $this->data->get_group_kw();
		$data['group_pd'] 	= $this->data->get_group_pd();
		$data['group_agama']= $this->data->get_group_agama();
		$data['group_pkj']  = $this->data->get_group_pkj();
		$data['group_kav']  = $this->data->get_group_kav();
		
		$this->load->view('template', $data);
	}
	
	public function detail($id=null)
	{
		$data['head'] 		= 'Data Nasabah';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form_detail';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_kw'] 	= $this->data->get_group_kw();
		$data['group_pd'] 	= $this->data->get_group_pd();
		$data['group_agama']= $this->data->get_group_agama();
		$data['group_pkj']  = $this->data->get_group_pkj();
		$data['group_kav']  = $this->data->get_group_kav();
		
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
            $col[] = '<a onclick="detail_data();" href="'.site_url('penjualan/nasabah/detail/'.$row->id).'">'.$row->nama.'</a>';
			$col[] = $row->telpon1;
			$col[] = $row->alamat1;
			$col[] = nama_kavling($row->kavling_id);
			$col[] = tipe_kavling($row->kavling_id);
			$col[] = perumahan($row->perumahan_id);
			/*$col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('penjualan/nasabah/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';*/
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
			'ktp' => $this->input->post('ktp', TRUE),
			'nama' => $this->input->post('nama', TRUE),
			'tmlahir' => $this->input->post('tmlahir', TRUE),
			'tglahir' => $this->input->post('tglahir', TRUE),
			'sex' => $this->input->post('sex', TRUE),
			'kawin' => $this->input->post('kawin', TRUE),
			'pendidikan' => $this->input->post('pendidikan', TRUE),
			'agama' => $this->input->post('agama', TRUE),
			'alamat1' => $this->input->post('alamat1', TRUE),
			'alamat2' => $this->input->post('alamat2', TRUE),
			'telpon1' => $this->input->post('telpon1', TRUE),
			'telpon2' => $this->input->post('telpon2', TRUE),
			'wa' => $this->input->post('wa', TRUE),
			'email' => $this->input->post('email', TRUE),
			'pekerjaan' => $this->input->post('pekerjaan', TRUE),
			'instansi' => $this->input->post('instansi', TRUE),
			'alamat_kantor' => $this->input->post('alamat_kantor', TRUE),
			'telpon_kantor' => $this->input->post('telpon_kantor', TRUE),
			'status_pegawai' => $this->input->post('status_pegawai', TRUE),
			'lama_bekerja' => $this->input->post('lama_bekerja', TRUE),
			'pendapatan' => $this->input->post('pendapatan', TRUE),
			'angsuran' => $this->input->post('angsuran', TRUE),
			'npwp' => $this->input->post('npwp', TRUE),
			'join_income' => $this->input->post('join_income', TRUE),
			'pasangan' => $this->input->post('pasangan', TRUE),
			'telpon_pasangan' => $this->input->post('telpon_pasangan', TRUE),
			'pekerjaan_pasangan' => $this->input->post('pekerjaan_pasangan', TRUE),
			'instansi_pasangan' => $this->input->post('instansi_pasangan', TRUE),
			'alamat_kantor_pasangan' => $this->input->post('alamat_kantor_pasangan', TRUE),
			'telpon_kantor_pasangan' => $this->input->post('telpon_kantor_pasangan', TRUE),
			'status_pegawai_pasangan' => $this->input->post('status_pegawai_pasangan', TRUE),
			'lama_berkerja_pasangan' => $this->input->post('lama_bekerja_pasangan', TRUE),
			'pendapatan_pasangan' => $this->input->post('pendapatan_pasangan', TRUE),
			'perumahan_id' => $this->input->post('perumahan_id', TRUE),
			'kavling_id' => $this->input->post('kavling_id', TRUE),
			'gambar' => $this->input->post('gambar'),
			'code' => $this->session->userdata('code')
			//'status' => $this->input->post('status')			
		);
        
        if($this->validation()){
            $insert = $this->data->insert($data);
			//helper_log("add", "Menambah Data Perumahan");
        }
    }
    
    public function ajax_update($id)
    {
        $data = array(
			'ktp' => $this->input->post('ktp', TRUE),
			'nama' => $this->input->post('nama', TRUE),
			'tmlahir' => $this->input->post('tmlahir', TRUE),
			'tglahir' => $this->input->post('tglahir', TRUE),
			'sex' => $this->input->post('sex', TRUE),
			'kawin' => $this->input->post('kawin', TRUE),
			'pendidikan' => $this->input->post('pendidikan', TRUE),
			'agama' => $this->input->post('agama', TRUE),
			'alamat1' => $this->input->post('alamat1', TRUE),
			'alamat2' => $this->input->post('alamat2', TRUE),
			'telpon1' => $this->input->post('telpon1', TRUE),
			'telpon2' => $this->input->post('telpon2', TRUE),
			'wa' => $this->input->post('wa', TRUE),
			'email' => $this->input->post('email', TRUE),
			'pekerjaan' => $this->input->post('pekerjaan', TRUE),
			'instansi' => $this->input->post('instansi', TRUE),
			'alamat_kantor' => $this->input->post('alamat_kantor', TRUE),
			'telpon_kantor' => $this->input->post('telpon_kantor', TRUE),
			'status_pegawai' => $this->input->post('status_pegawai', TRUE),
			'lama_bekerja' => $this->input->post('lama_bekerja', TRUE),
			'pendapatan' => $this->input->post('pendapatan', TRUE),
			'angsuran' => $this->input->post('angsuran', TRUE),
			'npwp' => $this->input->post('npwp', TRUE),
			'join_income' => $this->input->post('join_income', TRUE),
			'pasangan' => $this->input->post('pasangan', TRUE),
			'telpon_pasangan' => $this->input->post('telpon_pasangan', TRUE),
			'pekerjaan_pasangan' => $this->input->post('pekerjaan_pasangan', TRUE),
			'instansi_pasangan' => $this->input->post('instansi_pasangan', TRUE),
			'alamat_kantor_pasangan' => $this->input->post('alamat_kantor_pasangan', TRUE),
			'telpon_kantor_pasangan' => $this->input->post('telpon_kantor_pasangan', TRUE),
			'status_pegawai_pasangan' => $this->input->post('status_pegawai_pasangan', TRUE),
			'lama_berkerja_pasangan' => $this->input->post('lama_bekerja_pasangan', TRUE),
			'pendapatan_pasangan' => $this->input->post('pendapatan_pasangan', TRUE),
			'perumahan_id' => $this->input->post('perumahan_id', TRUE),
			'kavling_id' => $this->input->post('kavling_id', TRUE),
			'gambar' => $this->input->post('gambar'),
			'code' => $this->session->userdata('code'),
			//'status' => $this->input->post('status')	
		);

        	if($this->validation()){
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
		$this->form_validation->set_rules("ktp", "Ktp", "trim|required");
		$this->form_validation->set_rules("nama", "Nama Nasabah", "trim|required");
		/*$this->form_validation->set_rules("tmlahir", "Tempat Lahir", "trim|required");
		$this->form_validation->set_rules("tglahir", "Tanggal Lahir", "trim|required");
		$this->form_validation->set_rules("sex", "Jenis Kelamin", "trim|required");
		$this->form_validation->set_rules("kawin", "Kawin", "trim|required");
		$this->form_validation->set_rules("pendidikan", "Pendidikan", "trim|required");
		$this->form_validation->set_rules("agama", "Agama", "trim|required");
		$this->form_validation->set_rules("alamat1", "Alamat Asal", "trim|required");
		$this->form_validation->set_rules("alamat2", "Alamat Sekarang", "trim|required");
		$this->form_validation->set_rules("telpon1", "Nomor Telepon 1", "trim|required");
		$this->form_validation->set_rules("telpon2", "Nomor Telepon 2", "trim|required");
		$this->form_validation->set_rules("wa", "WhatsApp", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("pekerjaan", "Pekerjaan", "trim|required");
		$this->form_validation->set_rules("instansi", "Instansi", "trim|required");
		$this->form_validation->set_rules("alamat_kantor", "Alamat Kantor", "trim|required");
		$this->form_validation->set_rules("telpon_kantor", "Telepon Kantor", "trim|required");
		$this->form_validation->set_rules("status_pegawai", "Status Pegawai", "trim|required");
		$this->form_validation->set_rules("lama_bekerja", "Lama Bekerja", "trim|required");
		$this->form_validation->set_rules("pendapatan", "Pendapatan", "trim|required");
		$this->form_validation->set_rules("angsuran", "Angsuran", "trim|required");
		$this->form_validation->set_rules("npwp", "NPWP", "trim|required");*/
		//$this->form_validation->set_rules("join_income", "Join Income", "trim|required");
		//$this->form_validation->set_rules("perumahan_id", "Perumahan", "trim|required");			
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