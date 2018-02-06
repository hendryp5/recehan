<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function helper_log($tipe = "", $str = ""){
    
	$CI =& get_instance();
	
    if (strtolower($tipe) == "login"){
        $log_tipe   = 1;
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe   = 0;
    }
    elseif(strtolower($tipe) == "add"){
        $log_tipe   = 2;
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe  = 3;
    }
    elseif(strtolower($tipe) == "trash"){
        $log_tipe  = 4;
    }
	
    elseif(strtolower($tipe) == "restore"){
        $log_tipe  = 5;
    }
    else{
        $log_tipe  = 6;
    }
    // paramter
    $param['log_user']      = $CI->session->userdata('nama');
    $param['log_tipe']      = $log_tipe;
    $param['log_desc']      = $str;
	$param['log_ip']        = $CI->input->ip_address();
    //load model log
    $CI->load->model('m_log');
    //save to database
    $CI->m_log->save_log($param);
}

function level($id=null)
{
	if($id == 1){
		$level = 'Owner';
	}elseif($id == 2){
		$level = 'Manager';
	}elseif($id == 3){
		$level = 'Administrasi';
	}elseif($id == 4){
		$level = 'Marketing';
	}elseif($id == 5){
		$level = 'Keuangan';
	}elseif($id == 6){
		$level = 'Teknik';
	}elseif($id == 7){
		$level = 'Investor';
	}elseif($id == 8){
		$level = 'Nasabah';
	}else{
		$level = 'Tidak Di Ketahui';
	}

	return $level;
}

function signin()
{
	
	$CI =& get_instance();
	
	if(!$CI->session->userdata('signin')){
		$CI->session->set_flashdata('flasherror','Anda Harus Login Terlebih Dahulu.');
		redirect('login');
	}
}

function admin()
{
	
	$CI =& get_instance();
	
	if(!$CI->session->userdata('signin')){
		$CI->session->set_flashdata('flasherror','Anda Harus Login Terlebih Dahulu.');
		redirect('login');
	}
	
	if($CI->session->userdata('level') != 1){
		$CI->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
		redirect('dashboard');
	}
}

function group($group)
{
	$CI =& get_instance();	
	if(!in_array($CI->session->userdata('level'), $group)){
		//$CI->session->set_flashdata('flasherror','Anda Tidak Memiliki Hak Akses Untuk Modul Tersebut.');
		//redirect('dashboard');
		return FALSE;
	}else{
		return TRUE;
	}
}

if ( ! function_exists('active'))
{
	function active($id)
	{
		if($id == '1')
		{
			return 'Aktif';
		}
		else
		{
			return 'Tidak Aktif';
		}
	}
}
