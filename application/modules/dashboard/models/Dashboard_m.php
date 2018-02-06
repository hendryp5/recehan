<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends MY_Model
{
	public $table = 'kavling'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
	
	//ajax datatable
    
	public function __construct()
	{
		$this->timestamps = TRUE;
		$this->soft_deletes = TRUE;
		parent::__construct();
	}
	

    //urusan lawan ambil data
   
    function get_perumahan()
    {
        $this->db->where('deleted_at', NULL);
        $this->db->where('code',$this->session->userdata('code'));
        $query = $this->db->get('master_perumahan');
        return $query->result();
    }

    function get_perusahaan()
    {
        $this->db->where('deleted_at', NULL);
        $this->db->where('code',$this->session->userdata('code'));
        $query = $this->db->get('master_perusahaan');
        return $query->row();
    }

    function count_perumahan()
    {
        $this->db->where('deleted_at', NULL);
        $this->db->where('code',$this->session->userdata('code'));
        $query = $this->db->get('master_perumahan');
        return count($query->result());
    }

    function count_kavling()
    {
        $this->db->where('deleted_at', NULL);
        $this->db->where('code',$this->session->userdata('code'));
        $query = $this->db->get('kavling');
        return count($query->result());
    }

    function count_nasabah()
    {
        $this->db->where('deleted_at', NULL);
        $this->db->where('code',$this->session->userdata('code'));
        $query = $this->db->get('nasabah');
        return count($query->result());
    }

    function count_pengguna()
    {
        $this->db->where('deleted_at', NULL);
        $this->db->where('code',$this->session->userdata('code'));
        $query = $this->db->get('users');
        return count($query->result());
    }
}