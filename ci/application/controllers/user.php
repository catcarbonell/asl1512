<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('user_model');
 }

//MAIN PAGE -- if the user is logged in - checked by username/email - then they will see the dashboard, otherwise, user will see the landing page

 public function index()
 {
  if(($this->session->userdata('user_name')!=""))
  {
   $this->dashboard();
  }
  else{
   $data['title']= 'Home';
   $this->load->view('header_view',$data);
   $this->load->view("registration_view.php", $data);
   $this->load->view('footer_view',$data);
  }
 }

//DASHBOARD CONTROLLER -- When user is logged in, they will see the dashboard

 public function dashboard()
 {
  $data['title']= 'Dashboard';
  $this->load->view('header_view',$data);
  $this->load->view('dashboard_view.php', $data);
  $this->load->view('footer_view',$data);
 }

//LOGIN CONTROLLER -- draws information from form, checks USER table from DB to confirm

 public function login()
 {
  $email=$this->input->post('email');
  $password=md5($this->input->post('pass'));

  $result=$this->user_model->login($email,$password);
  if($result) $this->dashboard();
  else        $this->index();
 }


 public function thank()
 {
  $data['title']= 'Thank';
  $this->load->view('header_view',$data);
  $this->load->view('thank_view.php', $data);
  $this->load->view('footer_view',$data);
 }


 public function registration()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]');
  $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

  if($this->form_validation->run() == FALSE)
  {
   $this->index();
  }
  else
  {
   $this->user_model->add_user();
   $this->thank();
  }
 }


 public function logout()
 {
  $newdata = array(
  'user_id'   =>'',
  'user_name'  =>'',
  'user_email'     => '',
  'logged_in' => FALSE,
  );

  $this->session->unset_userdata($newdata);
  $this->session->sess_destroy();
  $this->index();
 }

}
?>