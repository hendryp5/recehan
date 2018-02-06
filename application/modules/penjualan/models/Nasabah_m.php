<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah_m extends MY_Model
{
	public $table = 'nasabah'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
	
	//ajax datatable
    public $column_order = array('id','ktp','nama','email','pekerjaan','instansi','pendapatan','angsuran',null); //set kolom field database pada datatable secara berurutan
    public $column_search = array('ktp','nama','email','pekerjaan','instansi','pendapatan','angsuran'); //set kolom field database pada datatable untuk pencarian
    public $order = array('id' => 'asc'); //order baku 
	
	public function __construct()
	{
		$this->timestamps = TRUE;
		$this->soft_deletes = TRUE;
		parent::__construct();
	}
	
	public function get_new()
    {
        $record = new stdClass();
        $record->id = '';
        $record->ktp = '';
        $record->nama = '';
        $record->tmlahir = '';
        $record->tglahir = '';
        $record->sex = '';
        $record->kawin = '';
        $record->pendidikan = '';
        $record->agama = '';
        $record->alamat1 = '';        
        $record->alamat2 = '';
        $record->telpon1 = '';
        $record->telpon2 = '';
        $record->wa = '';
        $record->email = '';
        $record->pekerjaan = '';
        $record->instansi = '';
        $record->alamat_kantor = '';
        $record->telpon_kantor = '';
        $record->status_pegawai = '';
        $record->lama_bekerja = '';
        $record->pendapatan = '';
        $record->angsuran = '';
        $record->npwp = '';
        $record->join_income = '';
        $record->pasangan = '';
        $record->telpon_pasangan = '';
        $record->pekerjaan_pasangan = '';
        $record->instansi_pasangan = '';
        $record->alamat_kantor_pasangan = '';
        $record->telpon_kantor_pasangan = '';
        $record->status_pegawai_pasangan = '';
        $record->lama_bekerja_pasangan = '';
        $record->pendapatan_pasangan = '';
        $record->perumahan_id = '';
        $record->kavling_id = '';
        $record->gambar = '';
        //$record->status = '';
        return $record;
    }
	
	//urusan lawan datatable
    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    //urusan lawan ambil data
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->where('deleted_at', NULL);
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

	
	public function get_id($id=null)
    {
        $this->db->where('id', $id);
		$this->db->where('deleted_at', NULL);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function get_group()
	{
        $this->db->where('deleted_at', NULL);
        $query = $this->db->order_by('id', 'ASC')->get('master_perumahan');
        if($query->num_rows() > 0){
        $dropdown[''] = 'Pilih Perumahan';
		foreach ($query->result() as $row)
		{
			$dropdown[$row->id] = $row->perumahan;
		}
        }else{
            $dropdown[''] = 'Belum Ada Perumahan Tersedia'; 
        }
		return $dropdown;
	}

    public function get_group_kw()
    {
        
        $dropdown = array(
            '0' => 'Pilih Status Hubungan',
            '1' => 'Belum Kawin',
            '2' => 'Kawin',
            '3' => 'Cerai'
         );
        
        return $dropdown;
    }

    // Dropdown Pendidikan
    public function get_group_pd()
    {
        
        $query = $this->db->order_by('id', 'ASC')->get('master_pendidikan');
        if($query->num_rows() > 0){
        $dropdown[''] = 'Pilih Pendidikan';
        foreach ($query->result() as $row)
        {
            $dropdown[$row->id] = $row->pendidikan;
        }
        }else{
            $dropdown[''] = 'Pendidikan Tidak Ada'; 
        }
        return $dropdown;
    }

    public function get_group_agama()
    {
        
        $dropdown = array(
            '' => 'Pilih Agama',
            '1' => 'Islam',
            '2' => 'Kristen Protestan',
            '3' => 'Kristen Katolik',
            '4' => 'Hindu',
            '5' => 'Budha',
            '6' => 'Kong Hu Chu'
         );
        
        return $dropdown;
    }

    //dropdown kavling
    public function get_group_kav()
    {

        $this->db->where('deleted_at', NULL);
        $query = $this->db->order_by('id', 'ASC')->get('kavling');
        
        if($query->num_rows() > 0){
        $dropdown[''] = 'Pilih Kavling';
        foreach ($query->result() as $row)
        {
            $dropdown[$row->id] = $row->kavling;
        }
        }else{
            $dropdown[''] = 'Kavling Belum Ada';
           
        }
        return $dropdown;
    }
    

    public function get_group_kav_json()
    {

        $hasil = $this->get_kav();
        $hasiljson = json_encode($hasil);
        return $hasiljson;
    }

    public function get_kav($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('kavling');
        return $query->row();
    }

    //dropdown pekerjaaan
    public function get_group_pkj()
    {

        $query = $this->db->order_by('id', 'ASC')->get('master_pekerjaan');
        if($query->num_rows() > 0){
        $dropdown[''] = 'Pilih Pekerjaan';
        foreach ($query->result() as $row)
        {

            $dropdown[$row->id] = $row->pekerjaan;
        }
        }else{
            $dropdown[''] = 'Pekerjaan Belum Ada'; 
        }
        return $dropdown;
    }

    function get_follow()
    {
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get('followup');
        return $query->result();
    }

  
}