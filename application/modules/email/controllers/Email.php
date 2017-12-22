<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'email/';
	
	public function __construct()
	{
		// die(phpinfo());
		parent::__construct();
		// using email utilities
		$this->load->library('email');
		$mailconfig['protocol'] = 'smtp';
		$mailconfig['smtp_host'] = 'smtp.googlemail.com';
		$mailconfig['smtp_user'] = 'saka.jaya.teknologi@gmail.com';
		$mailconfig['smtp_port'] = '587';
		$mailconfig['smtp_timeout'] = '5';
		$mailconfig['smtp_pass'] = 'takunibosgmail';
		$mailconfig['smtp_crypto'] = 'tls';
		$mailconfig['charset'] = 'utf-8';
		$mailconfig['wordwrap'] = TRUE;
		$mailconfig['mailtype'] = 'html';
		$mailconfig['validate'] = TRUE;
		$this->email->initialize($mailconfig);
		$this->email->set_newline("\r\n");
		
		// db setup
		$config['hostname'] = '101.50.1.41';
		$config['username'] = 'sakasistem_users';
		$config['password'] = 'tahun@)!&';
		$config['database'] = 'sakasistem_dbase';
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$config['cache_on'] = FALSE;
		$config['cachedir'] = '';
		$config['char_set'] = 'utf8';
		$config['dbcollat'] = 'utf8_general_ci';
		$this->datadb = $this->load->database($config,TRUE);
		$this->table_name = 'email';
		//$this->load->model('registrasi_m', 'data');
		//signin();
	}
	
	public function index()
	{
		// TODO: add requirement config variables
		// $require = array('download','phone','email'); // name
		
		// TODO: implement NONCE
		
		// TODO: handle post request and CORS
		if ($this->input->server('REQUEST_METHOD') != 'GET' || !isset($_GET['download']) || !isset($_GET['name']) /* || !isset($_GET['phone']) */ || !isset($_GET['email']) || !isset($_GET['cat'])  ) {
			redirect('login');
		}else{
			
			$from = 'saka.jaya.teknologi@gmail.com';
			$name = 'Saka Sistem';
			$client = $_GET['name'];
			$cat = $_GET['cat'];
			$email = $this->input->get('email');
			if (isset($_GET['phone'])) {
				$hp = $this->input->get('phone');
			}else{
				$hp = '';
			}
			// TODO: Secure download URL
			$download_link = $this->input->get('download');
			
			$subject = "Link Download Free Ebook Anda - Saka Sistem";
			// TODO: set design email template
			$message = "Hai $client, terima kasih telah bargabung, silahkan download ebook yang anda minta disini : $download_link \n \n <br/><br/>
			<center>
			<a style='padding:15px;background:green;border:1px lime solid;' href='$download_link' >Download Ebook Saka Sistem</a>
			</center>";
			  
			if ($this->validation() == TRUE){
				// echo "VALID";
				
				// setup db data
				$data = array(
					"email"=>$email,
					"kategori" => $cat,
					"nama" => $client,
					"subject"=>$subject,
					"message"=>$message,
					"phone"=>$hp
				);
				
				// save to db
				// TODO: handle unique data only
				$this->datadb->insert($this->table_name,$data);
				
				// setup mail data
				$this->email->from($from, $name);
				$this->email->to($email);
				$this->email->subject($subject);
				$this->email->message($message);
				
				// send the mail
				$mailed = $this->email->send();
				// echo ("MAIL:".$mailed);
				echo json_encode(array("success"=>TRUE));
			}else{
				// echo "INVALID".validation_errors();
				echo json_encode(array("error"=>validation_errors()));
			}
			
			
		}
		
}

private function validation($id=null)
{
  $data = array('success' => false, 'messages' => array());
	$this->form_validation->set_data($this->input->get());
	$this->form_validation->set_rules('download','Link','trim|required');
	$this->form_validation->set_rules('phone','Nomor Telepon','trim|required|is_natural');
	$this->form_validation->set_rules('email','Email','trim|required|valid_email');
	 
  $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
  if($this->form_validation->run()){
    $data['success'] = true;
  }else{
    foreach ($_GET as $key => $value) {
      $data['messages'][$key] = form_error($key);
    }
  }
	// var_dump($_GET);
  // echo json_encode($data);
  return $this->form_validation->run();
}


}