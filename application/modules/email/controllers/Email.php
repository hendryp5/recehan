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
		$mailconfig['smtp_user'] = 'sakasistem@gmail.com'; // TODO: use ENV var
		$mailconfig['smtp_port'] = '587';
		$mailconfig['smtp_timeout'] = '5';
		$mailconfig['smtp_pass'] = 'takunibos03'; // TODO: use ENV var
		$mailconfig['smtp_crypto'] = 'tls';
		$mailconfig['charset'] = 'utf-8';
		$mailconfig['wordwrap'] = TRUE;
		$mailconfig['mailtype'] = 'html';
		$mailconfig['validate'] = TRUE;
		$this->email->initialize($mailconfig);
		$this->email->set_newline("\r\n");
		
		// db setup
		$config['hostname'] = '101.50.1.41'; // TODO: use ENV var
		$config['username'] = 'sakasistem_users'; // TODO: use ENV var
		$config['password'] = 'tahun@)!&'; // TODO: use ENV var
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
			if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
			    $origin = $_SERVER['HTTP_ORIGIN'];
			}
			else if (array_key_exists('HTTP_REFERER', $_SERVER)) {
			    $origin = $_SERVER['HTTP_REFERER'];
			} else {
			    $origin = $_SERVER['REMOTE_ADDR'];
			}
			
			$from = 'sakasistem@gmail.com';
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
			$message = "Dear $client, <br/><br/>
			Terima kasih telah bargabung, silahkan download ebook yang anda minta disini : \n \n <br/><br/><br/>
			<center>
			<a style='padding:15px;background:green;border:1px lime solid;color:white;' href='$download_link' ><b>Download Ebook</b></a><br/><br/><br/>
			<img src='http://blog.sakasistem.com/wp-content/uploads/2017/12/ebookCOVER-228x300.png' alt='Download' />
			</center><br/><br/>
			Kami sangat senang dapat membantu Anda, kami sangat mempersilahkan Anda untuk mengunjungi <a href='http://sakasistem.com' >Saka Sistem</a>,<br/> atau menghubungi kami melalui email <a href='mailto:sakasistem@gmail.com'>sakasistem@gmail.com</a> jika ada hal yang perlu disampaikan.<br/>
			Nantikan berita terbaru dari kami.
			<br/><br/>
			
			Regards,<br/>
			<br/>
			<br/>
			<span style='color:green;'>
			<b>Tim Saka Sistem</b><br/>
			<i><sub>Website : sakasistem.com</sub></i>
			</span>
			";
			
			  
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
				// redirect($origin.'/'.'form-success'); // redirect
				// echo json_encode(array("success"=>TRUE)); give json
				echo "function form_result(){return true;}"; // give jsonp
			}else{
				
				// redirect($origin.'/'.'form-failed'); // redirect
				// echo json_encode(array("error"=>validation_errors())); // give json
				echo "function form_result(){return false;}"; // give jsonp
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
	 
  // $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
  if($this->form_validation->run()){
    $data['success'] = true;
  }else{
    foreach ($_GET as $key => $value) {
      $data['messages'][$key] = form_error($key);
    }
  }
	// var_dump($_GET); // need debug lib D:
  // echo json_encode($data);
  return $this->form_validation->run();
}


}