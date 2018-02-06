<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengajuanunit extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'penjualan/pengajuanunit/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengajuanunit_m', 'data');
		$this->load->helper('my_helper');
		signin();
	}
	
	public function index()
	{
		$data['head'] 		= 'Persetujuan Unit';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}

	public function detail($id=null)
	{
		$data['head'] 		= 'Rincian Nasabah';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form_detail';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_bank'] = $this->data->get_group_bank();
		$data['group_pkj'] 	= $this->data->get_group_pkj();
		$data['group_kav']  = $this->data->get_group_kav2();
	

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
           	$col[] = '<a onclick="detail_data();" href="'.site_url('penjualan/pengajuanunit/detail/'.$row->id).'">'.$row->nama.'</a>';
			$col[] = $row->telpon1;
			$col[] = $row->alamat1;
			$col[] = nama_kavling($row->kavling_id);
			$col[] = tipe_kavling($row->kavling_id);
			$col[] = perumahan($row->perumahan_id);	
			$col[] = status_persetujuan($row->status_persetujuan,$row->id);			
			$col[] = tinjauan_kembali($row->id);		
			$col[] = '<a class="btn btn-xs btn-flat btn-danger" onclick="pembatalan('."'".$row->id."'".');" data-toggle="tooltip" title="Pembatalan"><i class="fa fa-close"></i></a>';		
				
			/*$col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('penjualan/followup/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
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
	
    public function ajax_add_tinjauan()
	{
		
		$tgl=date('Y-m-d h:i:s'); 
		$data = array(
				'pesanunit_id' => $this->input->post('pesanunit_id'),
				'catatan' => $this->input->post('catatan'),
				'kavling_id' => $this->input->post('kavling_id'),
				'user_id' => $this->session->userdata('userID'),
				'created_at' => $tgl
			);
		$data2 = array(      
		        'status' => 0,
		        'status_persetujuan' => 0,
        );
		$id_pajb = $this->input->post('pesanunit_id');
		$id_kavling = $this->input->post('kavling_id');
		$insert2 = $this->data->update($data2, $id_pajb);
		$insert = $this->data->save_tinjauan($data);
		$insert1 = $this->data->update_kavling($id_kavling);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_add_pembatalan()
	{
		
		$tgl=date('Y-m-d h:i:s'); 
		$data = array(
				'pesanunit_id' => $this->input->post('pesanunit_id'),
				'keterangan' => $this->input->post('keterangan'),
				'kavling_id' => $this->input->post('kavling_id'),
				'user_id' => $this->session->userdata('userID'),
				'created_at' => $tgl
			);
		$insert = $this->data->save_pembatalan($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_pesan($id)
	{
		$data = $this->data->get($id);
		echo json_encode($data);
	}

	public function ajax_lihat_tinjauan($id)
	{
		$data = $this->data->get_tinjauan($id);
		echo json_encode($data);
	}

	public function ajax_update_tinjuan()
	{
		
		$tgl=date('Y-m-d h:i:s'); 
		$data = array(
				'catatan' => $this->input->post('catatan'),
				'updated_at' => $tgl
			);
		$id = $this->input->post('pesanunit_id'); 
		$this->data->update_tinjauan($data,$id);
		echo json_encode(array("status" => TRUE));
	}

    public function terima($id)
	{
		$this->data->konfirmasi($id); // Panggil fungsi edit() yang ada di SiswaModel.php        
		redirect('penjualan/pengajuanunit'); 
		
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
		$this->form_validation->set_rules("catatan", "Catatan", "trim|required");
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