<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
   
  }

  
function user1(){
   redirect('user1/products');
     }
  function staff(){
    $this->load->view('user/overview2');
     }

 public function index(){
    // function render_backend tersebut dari file core/MY_Controller.php
    $this->load->view('login_view'); // load view home.php
  }
  
  //public function admin(){
    // function render_backend tersebut dari file core/MY_Controller.php
    //$this->load->view('admin/overview'); // load view home.php
  //}
  public function tabel(){
    // function render_backend tersebut dari file core/MY_Controller.php
    $this->load->view('admin/pages/tables/data.php'); // load view home.php
  }

  public function register(){
    // function render_backend tersebut dari file core/MY_Controller.php
    $this->load->view('v_register'); // load view home.php
  }

  public function logout(){
    $this->session->sess_destroy();
      redirect('login/logout');
  }



}
