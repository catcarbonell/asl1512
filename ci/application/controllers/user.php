<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('user_model');
 }

// ***  VIEW CONTROLLERS *** // 

//MAIN PAGE VIEW CONTROLLER -- if the user is logged in - checked by username/email - then they will see the dashboard, otherwise, user will see the landing page

 public function index()
 {
  if(($this->session->userdata('user_email')!=""))
  {
   $this->dashboard();
  }
  else{
   $data['title']= 'Home';
   $this->load->view('header_view',$data);
   $this->load->view("registration_view.php", $data);
   $this->load->view('footer_view',$data);
  }
 } // close index()


//LOGIN CONTROLLER -- draws information from form, checks USER table from DB to confirm

 public function login()
 {
  $email=$this->input->post('email');
  $password=md5($this->input->post('pass'));

  $result=$this->user_model->login($email,$password);
  if($result) $this->dashboard();
  else        $this->index();
 } //close login()

 public function thank()
 {
  $data['title']= 'Thanks';
  $this->load->view('header_view',$data);
  $this->load->view('thank_view.php', $data);
  $this->load->view('footer_view',$data);
 } //close thank()



// ** User logged in, different header view ** // 

//DASHBOARD VIEW CONTROLLER -- When user is logged in, they will see the dashboard_view.php

 public function dashboard()
 {
  $data['title']= 'Dashboard';
  $this->load->view('header_view',$data);
  $this->load->view('loggedin_view',$data);
  $this->load->view('dashboard_view.php', $data);
  $this->load->view('showclients_view.php');
  $this->load->view('footer_view',$data);
 } //close dashboard()

//ADDING NEW CLIENT FORM CONFIRM CONTROLLER
 public function addconfirm($pcid)
 {
  $data['title']= 'Client Add Confirmed';
  $data['pcid']= $pcid;
  $this->load->view('header_view',$data);
  $this->load->view('loggedin_view',$data);
  $this->load->view('addconfirm_view.php', $data);
  $this->load->view('footer_view',$data);
 } //close addconfirm()

//EDIT CLIENT FORM CONTROLLER
  public function edituserpage($pcid)
  {
	$data['pcid']= $pcid;
	$this->load->view('header_view');
	$this->load->view('loggedin_view',$data);
	$this->load->view('edit_view.php', $data);
	$this->load->view('footer_view');
	  
 } //close edituserpage()

//ADD NEW CLIENT STATS PAGE
 public function addstatspage()
 {
  $data['title']= 'Stats';
  $data['pcid'] = $this->input->post('pcid');
  $this->load->view('header_view',$data);
  $this->load->view('loggedin_view',$data);
  $this->load->view('addstats_view.php', $data);
  $this->load->view('footer_view',$data);
 } //close addstatspage()

//EDIT CLIENT STATS PAGE
 public function editstatspage($pcid)
 {
  $data['pcid'] = $this->input->post('pcid');
  $this->load->view('header_view',$data);
  $this->load->view('loggedin_view',$data);
  $this->load->view('editstats_view.php', $data);
  $this->load->view('footer_view',$data);
 } //close editstatspage()

//ADD/EDIT NOTES PAGE
public function addnotespage()
{
  $data['pcid'] = $this->input->post('pcid');
  $this->load->view('header_view',$data);
  $this->load->view('loggedin_view',$data);
  $this->load->view('addnotes_view', $data);
  $this->load->view('footer_view',$data);
} //close addnotespage



 // ***  USER INTERACTION CONTROLLERS *** // 

// Registration -- works for both TRAINER SIGN UP and CLIENT ADD 
 public function registration(){

 	// Load CI library form_validation
  $this->load->library('form_validation');

  // field name, error message, validation rules
  $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[1]');
  $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[1]');
  $this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email|is_unique[user.email]');
  if(($this->input->post('utype')!=2)){
	  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
	  $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
  }
  // if everything fails, run index()/return to index
  if($this->form_validation->run() == FALSE)
  {
 	  $this->index();
  }
  //if a client is added is 2 utype(user type) = 2
  else if(($this->input->post('utype')==2))
  {
  	//add this information into the user table, run addconfirm() which goes to the addconfirm_view
	   $idnumber =  $this->user_model->add_user();
	   $this->addconfirm($idnumber);
  }else{
  	//add this information into the user table, run thank() which goes to the thank_view
	  	$this->user_model->add_user();
	  	$this->thank();
  }
 }

//EDIT CLIENT FORM
public function listeditform(){
	// 
	echo $this->edituserpage($this->input->post('pcid'));
}

//DELETE CLIENT
public function listdeleteform(){

	$pcid = $this->input->post('pcid');
	$rundel=$this->user_model->quickdeleteuser($pcid);
	if($rundel == true){	
	}else{
		echo "Failed to delete clientid $pcid";
		
	}
}


//UPDATE CLIENT
 public function updateediteduser(){
 	// in the user_model model, use the update user function from what the user placed in the input element
 	$this->user_model->update_user($this->input->post());
 	$this->index();
 }


//ADD STATS
public function addstats(){
	$this->user_model->addstats();
	$this->index();
}


//EDIT STATS FORM
public function statseditform(){
	echo $this->editstatspage($this->input->post('pcid'));
}

//UPDATE STATS
 public function updatestatsform(){
 	// in the user_model model, use the update user function from what the user placed in the input element
 	$this->user_model->updatestats($this->input->post());
 	$this->index();
 }


//ADD NOTES

public function addnotesform(){
	$this->user_model->addnotes();
	//$this->index();
	$this->addnotespage();
}

//UPDATE NOTE
 public function updatenotesform(){
 	// in the user_model model, use the update user function from what the user placed in the input element
 	$myarr = $this->input->post();
 	$myarr[$myarr['name']] = $myarr['value'];
    $myarr['id'] = $myarr['pk'];
    unset($myarr['name']);
    unset($myarr['value']);
    unset($myarr['pk']);

 	$this->user_model->updatenotes($myarr);
 }

//DELETE NOTE
public function deletenote(){

	$pcid = $this->input->post('pcid');
	$rundel=$this->user_model->deletenote($pcid);
	if($rundel == true){
	}else{
		echo "Failed to delete note";
		
	}
}

// LOGOUT CONTROLLER 
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