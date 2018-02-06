<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pesanunit extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'penjualan/pesanunit/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pesanunit_m', 'data');
		$this->load->helper('my_helper');
		signin();
	}
	
	public function index()
	{
		$data['head'] 		= 'Pemesanan Unit';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}

	public function created()
	{
		if ($this->session->userdata('method') == 'kavling') {
		
		$id = $this->session->userdata('id_method');
		$data['head'] 		= 'Pesan Unit kavling';
		$data['record'] 	= $this->data->get_new();
		$data['kavling'] 	= $this->data->get_kavling($id);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_pkj'] 	= $this->data->get_group_pkj();
		$data['group_kav']  = $this->data->get_group_kav1();
		$data['group_bank'] = $this->data->get_group_bank();
		
		$this->load->view('template', $data);
		} else if ($this->session->userdata('method') == 'followup') {

		$ktp = $this->session->userdata('id_method');;
		$data['head'] 		= 'Pesan Unit';
		$data['record'] 	= $this->data->get_new();
		$data['followup'] 	= $this->data->get_follow($ktp);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_pkj'] 	= $this->data->get_group_pkj();
		$data['group_bank'] = $this->data->get_group_bank();
		//$data['group_kav']  = $this->data->get_group_kav();
		
		$this->load->view('template', $data);
		} else {
		
		$data['head'] 		= 'Pesan Unit';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_bank'] = $this->data->get_group_bank();
		$data['group_pkj'] 	= $this->data->get_group_pkj();
		
		
		$this->load->view('template', $data);
		}
	}

	public function kavlingjson($id)
	{
		
		echo json_encode($this->data->get_kav($id));
		
	}

	public function updated($id=null)
	{
		$data['head'] 		= 'Ubah Pesan Unit';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['group'] 		= $this->data->get_group();
		$data['group_bank'] = $this->data->get_group_bank();
		$data['group_pkj'] 	= $this->data->get_group_pkj();
		$data['group_kav']  = $this->data->get_group_kav2();
	

		$this->load->view('template', $data);
	}

	public function detail($id=null)
	{
		$data['head'] 		= 'Ubah Pesan Unit';
		$data['record'] 	= $this->data->get_id($id);
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
           	$col[] = '<a onclick="detail_data();" href="'.site_url('penjualan/pesanunit/detail/'.$row->id).'">'.$row->nama.'</a>';
			$col[] = $row->telpon1;
			$col[] = $row->alamat1;
			$col[] = nama_kavling($row->kavling_id);
			$col[] = tipe_kavling($row->kavling_id);
			$col[] = perumahan($row->perumahan_id);		
			/*$col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('penjualan/pesanunit/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
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
    	if ($this->input->post('carapembelian') == '1') {
	    	$data = array(
				'nama' => $this->input->post('nama'),
				'ktp' => $this->input->post('ktp'),
				'alamat1' => $this->input->post('alamat1'),
				'alamat2' => $this->input->post('alamat2'),
				'telpon1' => $this->input->post('telpon1'),
				'wa' => $this->input->post('wa'),
				'email' => $this->input->post('email'),
				'tambahtanah' => $this->input->post('tambahtanah'),
				'permeter' => $this->input->post('permeter'),
				'tambahbangun' => $this->input->post('tambahbangun'),
				'bangunpermeter' => $this->input->post('bangunpermeter'),
				'kavling_id' => $this->input->post('kavling_id'),
				'perumahan_id' => $this->input->post('perumahan_id'),
				'carapembelian' => $this->input->post('carapembelian'),
				'bank_id' => $this->input->post('bank1'),
				'pokok_kpr' => $this->input->post('pokok_kpr'),
				'dp' => $this->input->post('dp'),
				'diskon' => $this->input->post('diskon'),
				'code' => $this->session->userdata('code')
			);
    	} else if ($this->input->post('carapembelian') == '2') {
    		$data = array(
				'nama' => $this->input->post('nama'),
				'ktp' => $this->input->post('ktp'),
				'alamat1' => $this->input->post('alamat1'),
				'alamat2' => $this->input->post('alamat2'),
				'telpon1' => $this->input->post('telpon1'),
				'wa' => $this->input->post('wa'),
				'email' => $this->input->post('email'),
				'tambahtanah' => $this->input->post('tambahtanah'),
				'permeter' => $this->input->post('permeter'),
				'tambahbangun' => $this->input->post('tambahbangun'),
				'bangunpermeter' => $this->input->post('bangunpermeter'),
				'kavling_id' => $this->input->post('kavling_id'),
				'perumahan_id' => $this->input->post('perumahan_id'),
				'carapembelian' => $this->input->post('carapembelian'),
				'pokok_utang' => $this->input->post('pokok_utang'),
				'dp' => $this->input->post('dp1'),
				'diskon' => $this->input->post('diskon1'),
				'code' => $this->session->userdata('code')
			);
    	} else {
    		$data = array(
				'nama' => $this->input->post('nama'),
				'ktp' => $this->input->post('ktp'),
				'alamat1' => $this->input->post('alamat1'),
				'alamat2' => $this->input->post('alamat2'),
				'telpon1' => $this->input->post('telpon1'),
				'wa' => $this->input->post('wa'),
				'email' => $this->input->post('email'),
				'tambahtanah' => $this->input->post('tambahtanah'),
				'permeter' => $this->input->post('permeter'),
				'tambahbangun' => $this->input->post('tambahbangun'),
				'bangunpermeter' => $this->input->post('bangunpermeter'),
				'kavling_id' => $this->input->post('kavling_id'),
				'perumahan_id' => $this->input->post('perumahan_id'),
				'carapembelian' => $this->input->post('carapembelian'),
				'pokok_utang' => $this->input->post('pokok_utang'),
				'dp' => $this->input->post('dp2'),
				'diskon' => $this->input->post('diskon2'),
				'code' => $this->session->userdata('code')
			);
    	}
        
		$tgl=date('Y-m-d h:i:s');
		$data1 = array(
			'nama' => $this->input->post('nama'),
			'ktp' => $this->input->post('ktp'),
			'alamat1' => $this->input->post('alamat1'),
			'telpon1' => $this->input->post('telpon1'),
			'wa' => $this->input->post('wa'),
			'email' => $this->input->post('email'),
			//'tambahtanah' => $this->input->post('tambahtanah'),
			//'permeter' => $this->input->post('permeter'),
			//'tambahbangun' => $this->input->post('tambahbangun'),
			//'bangunpermeter' => $this->input->post('bangunpermeter'),
			'kavling_id' => $this->input->post('kavling_id'),
			'perumahan_id' => $this->input->post('perumahan_id'),
			'carapembelian' => $this->input->post('carapembelian'),
			'created_at' => $tgl,
			'code' => $this->session->userdata('code')
			
		);

		$data2 = array(
			'status' => '2',
			'created_at' => $tgl
		);

		$id = $this->input->post('kavling_id');
        
        if($this->validation()){

            $insert = $this->data->insert($data);
            $insert1 = $this->data->save($data1);
            $insert2 = $this->data->update_status($data2,$id);
            $this->session->unset_userdata('method');
            $this->session->unset_userdata('id_method');
			//helper_log("add", "Menambah Data Perumahan");
        }
    }
    
    public function ajax_update($id)
    {
        if ($this->input->post('carapembelianx') == '1') {
	    	$data = array(
				'nama' => $this->input->post('nama'),
				'ktp' => $this->input->post('ktp'),
				'alamat1' => $this->input->post('alamat1'),
				'alamat2' => $this->input->post('alamat2'),
				'telpon1' => $this->input->post('telpon1'),
				'wa' => $this->input->post('wa'),
				'email' => $this->input->post('email'),
				'tambahtanah' => $this->input->post('tambahtanah'),
				'permeter' => $this->input->post('permeter'),
				'tambahbangun' => $this->input->post('tambahbangun'),
				'bangunpermeter' => $this->input->post('bangunpermeter'),
				'kavling_id' => $this->input->post('kavling_idx'),
				'perumahan_id' => $this->input->post('perumahan_idx'),
				'carapembelian' => $this->input->post('carapembelianx'),
				'bank_id' => $this->input->post('bank1'),
				'pokok_kpr' => $this->input->post('pokok_kpr'),
				'dp' => $this->input->post('dp'),
				'diskon' => $this->input->post('diskon'),
				'code' => $this->session->userdata('code')
			);
    	} else if ($this->input->post('carapembelianx') == '2') {
    		$data = array(
				'nama' => $this->input->post('nama'),
				'ktp' => $this->input->post('ktp'),
				'alamat1' => $this->input->post('alamat1'),
				'alamat2' => $this->input->post('alamat2'),
				'telpon1' => $this->input->post('telpon1'),
				'wa' => $this->input->post('wa'),
				'email' => $this->input->post('email'),
				'tambahtanah' => $this->input->post('tambahtanah'),
				'permeter' => $this->input->post('permeter'),
				'tambahbangun' => $this->input->post('tambahbangun'),
				'bangunpermeter' => $this->input->post('bangunpermeter'),
				'kavling_id' => $this->input->post('kavling_idx'),
				'perumahan_id' => $this->input->post('perumahan_idx'),
				'carapembelian' => $this->input->post('carapembelianx'),
				'pokok_utang' => $this->input->post('pokok_utang'),
				'dp' => $this->input->post('dp1'),
				'diskon' => $this->input->post('diskon1'),
				'code' => $this->session->userdata('code')
			);
    	} else {
    		$data = array(
				'nama' => $this->input->post('nama'),
				'ktp' => $this->input->post('ktp'),
				'alamat1' => $this->input->post('alamat1'),
				'alamat2' => $this->input->post('alamat2'),
				'telpon1' => $this->input->post('telpon1'),
				'wa' => $this->input->post('wa'),
				'email' => $this->input->post('email'),
				'tambahtanah' => $this->input->post('tambahtanah'),
				'permeter' => $this->input->post('permeter'),
				'tambahbangun' => $this->input->post('tambahbangun'),
				'bangunpermeter' => $this->input->post('bangunpermeter'),
				'kavling_id' => $this->input->post('kavling_idx'),
				'perumahan_id' => $this->input->post('perumahan_idx'),
				'carapembelian' => $this->input->post('carapembelian'),
				'pokok_utang' => $this->input->post('pokok_utang'),
				'dp' => $this->input->post('dp2'),
				'diskon' => $this->input->post('diskon2'),
				'code' => $this->session->userdata('code')
			);
    	}
		$tgl=date('Y-m-d h:i:s');		
		$data1 = array(
			'deleted_at' => $tgl
		);
		$data2 = array(
			'status' => '2',
			'created_at' => $tgl
		);

		$id_kavling = $this->input->post('kavling_idx');

        if($this->validation($id)){
            $hapus = $this->data->update($data,$id);
            $hapus2 = $this->data->delete_tinjauan($data1,$id_kavling);
            $insert2 = $this->data->update_status($data2,$id_kavling);

			//helper_log("edit", "Merubah Data Perumahan");
			$this->session->unset_userdata('method');
            $this->session->unset_userdata('id_method');
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
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
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

	public function get_nomor_kavling()
	{
		//echo 'hallo';
        $record = $this->data->get_id($this->uri->segment(4));
        $perumahan_id = $this->input->post('perumahan_id');
        $kavling_id = $this->data->get_group_kav($perumahan_id);
         if(!empty($kavling_id)){
            //$selected = (set_value('unker')) ? set_value('unker') : '';
           	$selected = set_value('kavling_id', $record->kavling_id);
            echo form_dropdown('kavling_id', $kavling_id, $selected, "style='width: 100%;' class='form-control select2' name='kavling_id' id='kavling_id'");
            			
        }else{
            echo form_dropdown('kavling_id', array(''=>'Pilih Nomor Kavling'), '', "style='width: 100%;' class='form-control select2' name='kavling_id' id='kavling_id'");
        }
    }

}