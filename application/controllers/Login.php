<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }

  function index(){
    $this->load->view('login_view');
  }
  function register(){
    $this->load->view('v_register');
  }



  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = $this->input->post('password',TRUE);
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $id  = $data['user_id'];
        $name  = $data['user_name'];
        $email = $data['user_email'];
        $level = $data['user_level'];
        $sesdata = array(
            'user_id'  => $id,
            'username'  => $name,
            'email'     => $email,
            'level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === 'admin'){
            redirect('admin/products');

        // access login for staff
        }elseif($level === 'user'){
            redirect('user/products');

        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login/logout');
    }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('login/index');
  }

}
