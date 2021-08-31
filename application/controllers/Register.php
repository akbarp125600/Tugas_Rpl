<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register extends CI_Controller {
	 
	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->model('m_account'); //call model
	}

	public function regis(){
    // function render_backend tersebut dari file core/MY_Controller.php
    $this->load->view('v_register'); // load view home.php
  }
 
	public function index() {
 
		
		$this->form_validation->set_rules('user_name', 'USER_NAME','required');
		$this->form_validation->set_rules('user_email','USER_EMAIL','required|valid_email');
		$this->form_validation->set_rules('user_password','USER_PASSWORD','required');
		$this->form_validation->set_rules('user_level','USER_LEVEL','required');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('v_register');
		}else{
 
			
			$data['user_name'] =    $this->input->post('user_name');
			$data['user_email']  =    $this->input->post('user_email');
			$data['user_password'] =    $this->input->post('user_password');
			$data['user_level'] =    $this->input->post('user_level');
 
			$this->m_account->daftar($data);
			 
			$pesan['message'] =    "Pendaftaran berhasil";
			$this->load->view('v_success',$pesan);
			 redirect(base_url().'login');
			 //print_r($notif); exit;
				//redirect(().'user/login');
		}
	}
}
