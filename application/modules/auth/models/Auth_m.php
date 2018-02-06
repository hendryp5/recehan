<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends MY_Model
{
	public $table = 'users'; // you MUST mention the table name
	
	public function get_user($email)
	{
		return $this->db->where('email', $email)->where('active',1)->get($this->table)->row('password');
	}
	
	public function get_userID($email)
	{
		return $this->db->where('email', $email)->where('active',1)->get($this->table)->row('id');
	}
	
	public function get_name($email)
	{
		return $this->db->where('email', $email)->where('active',1)->get($this->table)->row('nama');
	}
	
	public function get_level($email)
	{
		return $this->db->where('email', $email)->where('active',1)->get($this->table)->row('level_id');
	}
	
	public function get_code($email)
	{
		return $this->db->where('email', $email)->where('active',1)->get($this->table)->row('code');
	}

	public function get_gambar($email)
	{
		return $this->db->where('email', $email)->where('active',1)->get($this->table)->row('gambar');
	}
}