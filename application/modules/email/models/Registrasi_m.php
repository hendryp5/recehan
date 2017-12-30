<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_m extends MY_Model
{
	public $table = 'users'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array('id','repassword'); // ...Or you can set an array with the fields that cannot be filled by insert/update
	
	public function __construct()
	{
		$this->timestamps = TRUE;
		$this->soft_deletes = TRUE;
		$this->before_create[] = 'hash_password';
		$this->has_one['last_login'] = array('foreign_model'=>'M_log','foreign_table'=>'log','foreign_key'=>'id','local_key'=>'last_login');
		parent::__construct();
	}
	
	public function get_new()
    {
      $record = new stdClass();
      $record->fullname = '';
			$record->username = '';
			$record->password = '';
			$record->repassword = '';
      $record->email = '';
      $record->telpon = '';
		return $record;
    }
	
	public $rules = array(
		'insert' => array(
				'fullname' => array(
						'field'=>'fullname',
						'label'=>'Nama Lengkap',
						'rules'=>'trim|required'
				),        
				'username' => array(
						'field'=>'username',
						'label'=>'Username',
						'rules'=>'trim|required|max_length[18]|is_unique[users.username]'
				),      
				'email' => array(
						'field'=>'email',
						'label'=>'Email',
						'rules'=>'trim|required|valid_email|is_unique[users.email]'
				),        
				'password' => array(
						'field'=>'password',
						'label'=>'Password',
						'rules'=>'trim|required|min_length[6]|max_length[12]'
				),
				'repassword' => array(
						'field'=>'repassword',
						'label'=>'Password',
						'rules'=>'trim|required|matches[password]|min_length[6]|max_length[12]'
				),
				'telpon' => array(
					'field'=>'telpon',
					'label'=>'Telpon',
					'rules'=>'trim|required'
				)
		)
	);
	
	protected function hash_password($data)
	{
		$data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		return $data;
	}
	
	public function get_code() {
		$query = $this->db->query("SELECT MAX(RIGHT(code,7)) AS code FROM users");
		$code = '';
	  
		if($query->num_rows() > 0){ 
			  foreach($query->result() as $row){
				  $temporary = ((int)$row->code)+1;
				  $code = sprintf("%07s", $temporary);
			  }
		 }else{
		  $code = "0000001";
		}
		
		$char = "A"; 
		return $char.$code;
    }
}