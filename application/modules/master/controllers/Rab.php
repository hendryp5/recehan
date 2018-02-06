<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rab extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'master/rab/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rab_m', 'data');
		$this->load->helper('my_helper');
		signin();
	}
	
	public function index()
	{
		if(!group(array('1','2'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}

		$data['head'] 		= 'Data RAB Proyek';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['biaya'] 		= $this->data->get_biaya();
		$data['sum'] 		= '';
		
		$this->load->view('template', $data);
	}

	public function created()
	{
		if(!group(array('1','2'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}

		$data['head'] 		= 'Tambah RAB Proyek';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['perumahan'] 	= $this->data->get_perumahan();

		$this->load->view('template', $data);
	}

	public function updated($id=null)
	{
		if(!group(array('1','2'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}

		$data['head'] 		= 'Ubah RAB Proyek';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['perumahan'] 	= $this->data->get_perumahan();

		$this->load->view('template', $data);
	}

	public function detail($perumahan_id=null)
	{
		if(!group(array('1','2'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}

		$data['head'] 		= 'RAB Proyek';
		$data['record']		= $this->data->get_detail($perumahan_id);
		//$data['record'] 	= $this->data->get_kategori_id($kategori_id);
		$data['content'] 	= $this->folder.'detail';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		//$data['group'] 		= $this->data->get_group();
		//$data['perumahan'] 	= $this->data->get_perumahan();
		//$data['sum'] 		= '';
		
		$this->load->view('template', $data);
	}

	public function cetak($perumahan_id=null)
	{
		if(!group(array('1','2'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}
		$this->load->library('pdf');

		$data['head'] 		= 'RAB Proyek';
		$data['record']		= $this->data->get_detail($perumahan_id);
		$data['content'] 	= $this->folder.'detail';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$html = $this->load->view('master/rab/print',$data,true);
		
		$this->pdf->generate($html, $filename='Rencana Anggaran Biaya', $stream=TRUE, $paper = 'A4', $orientation = "landscape");
	}
	
	public function ajax_list()
    {
        $record	= $this->data->get_datatables();
        $data 	= array();
        $no 	= $_POST['start'];
		
        foreach ($record as $row) {

            $no++;
            $col = array();
            $col[] = '<a onclick="detail_data();" href="'.site_url('master/rab/detail/'.$row->perumahan_id).'">'.perumahan($row->perumahan_id).'</a>';
			$col[] = rupiah(penerimaan($row->perumahan_id));
			$col[] = rupiah(pengeluaran($row->perumahan_id));
			$col[] = rupiah(penerimaan($row->perumahan_id)-pengeluaran($row->perumahan_id));
			/*$col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('master/rab/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
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
			'perumahan_id' => $this->input->post('perumahan_id', TRUE),
			'kategori_id' => $this->input->post('kategori_id', TRUE),
			'uraian' => $this->input->post('uraian', TRUE),
			'biaya' => $this->input->post('biaya', TRUE),
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
			'perumahan_id' => $this->input->post('perumahan_id', TRUE),
			'kategori_id' => $this->input->post('kategori_id', TRUE),
			'uraian' => $this->input->post('uraian', TRUE),
			'biaya' => $this->input->post('biaya', TRUE),
			'code' => $this->session->userdata('code')
		);

        if($this->validation($id)){
            $this->data->update($data, $id);
			//helper_log("edit", "Merubah Data Perumahan");
        }
    }
    
    public function ajax_delete($id)
    {
		if(!group(array('1'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}

		$this->data->delete($id);
		//helper_log("trash", "Menghapus Data Perumahan");
        echo json_encode(array("status" => TRUE));
	}
	
	public function deleted($id)
    {
		if(!group(array('1'))){
			$this->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
			redirect('dashboard');
		}
		
		$this->data->delete($id);
		redirect('master/rab');
    }
    
    // public function ajax_delete_all()
    // {
    //     $list_id = $this->input->post('id');
    //     foreach ($list_id as $id) {
    //         $this->data->delete($id);
	// 		//helper_log("trash", "Menghapus Data Perumahan");
    //     }
    //     echo json_encode(array("status" => TRUE));
    // }
	
	private function validation($id=null)
    {
        $data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules("perumahan_id", "Perumahan", "trim|required");
		$this->form_validation->set_rules("kategori_id", "Kategori", "trim|required");
		$this->form_validation->set_rules("uraian", "Uraian", "trim|required");
		$this->form_validation->set_rules("biaya", "biaya", "trim|required");
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