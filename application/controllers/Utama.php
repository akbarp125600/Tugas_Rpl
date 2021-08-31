<?php

class Utama extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
        // load view admin/overview.php
       if($this->session->userdata('status')==TRUE){
       	$this->load->view("admin/overview");
       }else{
       	redirect('login');
       }
	}
}