<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

 public function __construct()
 {
  parent::__construct();
 }
 // LOGIN 

 function login($email,$password)
 {
  $this->db->where("email",$email);
  $this->db->where("password",$password);

  $query=$this->db->get("user");


  if($query->num_rows()>0)
  {
   foreach($query->result() as $rows)
   {
    // Add all data to session
    $newdata = array(
      'user_id'  => $rows->id,
      'fname'  => $rows->fname,
      'lname'  => $rows->lname,
      'user_name'  => $rows->username,
      'user_email'    => $rows->email,
      'logged_in'  => TRUE,
    );
   }
   $this->session->set_userdata($newdata);
   return true;
  }
  return false;
 }

 // Adds to user table 

 public function add_user()
 { 
// If 'User Type' is not defined, set to 1 (Trainer)
  if(($this->input->post('utype')!=""))
  {
    $utype = $this->input->post('utype');
  } else {
    $utype = 1;
  }

  $data=array(
    'fname'=>$this->input->post('fname'),
    'lname'=>$this->input->post('lname'),
    //'username'=>$this->input->post('user_name'),
    'email'=>$this->input->post('email_address'),
    'password'=>md5($this->input->post('password')),
    'tid'=>$this->input->post('tid'),
    'utype'=>$utype
  );
  $this->db->insert('user',$data);
 } //end add_user


// Adds to stats table
public function add_stats()
{
  $data=array(
    'height'=>$this->input->post('height'),
    'weight'=>$this->input->post('weight'),
    'waist'=>$this->input->post('waist'),
    'utype'=>$utype,
    'tid'=>$this->session->userdata('user_id')
  );
  $this->db->insert('stats',$data);
 } //end add_stats

//GET/DISPLAY CLIENTS
function getclients($tid)
{
    $this->db->where('tid',$tid);
    $this->db->where('deleted', 0);

    $query=$this->db->get('user');


    /* if($query->num_rows()>0)
    {
      foreach($query->result() as $rows)
     {

      // Add all data to session
      /*$newdata = array(
        'user_id'  => $rows->id,
        'fname'  => $rows->fname,
        'lname'  => $rows->lname,
        'user_name'  => $rows->username,
        'user_email'    => $rows->email,
        'logged_in'  => TRUE,
      );
    echo "<div class='client-list'>
      <h2>$rows->fname $rows->lname $rows->email</h2> 
      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
      <input type='submit' class='btn'>edit</a>
      <a href='/deleteclient?pcid=$rows->id' class='btn'>delete</a>
    </div> <br />";
     } */

     return $query->result();
     
   //}

   //return $query->result();
  } // closes getclients()

function getclientrecord($pcid)
{
    $this->db->where('id',$pcid);

    $query=$this->db->get('user');
    return $query->result();
}

function update_user($udata)
{
  foreach($udata as $key => $value)
  {
      if ($key == 'id')
      {
        $this->db->where($key, $value);
      }
      else
      {
         $this->db->set($key, $value);
      }
  }
  $this->db->update('user');
}

} //closes class User_model

?>