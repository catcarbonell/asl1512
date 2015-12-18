<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

 public function __construct()
 {
  parent::__construct();
 }

 // LOGIN - check the DB for matching email/password inputs
 function login($email,$password)
 {
    // in DB where email column matches what is typed into the email input field 
    $this->db->where("email",$email);
    // in DB where password column matches what is typed into the password input field 
    $this->db->where("password",$password);
    // Have this query retrieve information from the "user" table in the DB.
    $query=$this->db->get("user");

    // If there are more than 0 rows in the user DB...
    if($query->num_rows()>0)
    {
      // For each row, refer to each row as $rows
     foreach($query->result() as $rows)
     {
      // for the _SESSION, use this information from the DB
      $newdata = array(
        'user_id'  => $rows->id, // user_id input = column id
        'fname'  => $rows->fname, // fname input = column fname
        'lname'  => $rows->lname, // lname input = column lname
        'user_name'  => $rows->username, // user_name input = column username
        'user_email'    => $rows->email, // user_email input = user email
        'logged_in'  => TRUE, // status "logged_in" = true
      );
     }
    // Set this session with the above information recorded until log out
     $this->session->set_userdata($newdata);
     return true;
    }

    // If there is no login information, deny access to dashboard
    return false;
 }

 // Adds to user to 'user' table 

 public function add_user()
 { 
  // If 'User Type' is not defined, set to 1 (Trainer)
  if(($this->input->post('utype')!=""))
  {
    $utype = $this->input->post('utype');
  } else {
    $utype = 1;
  }
  //
  $data=array(
    'fname'=>$this->input->post('fname'),
    'lname'=>$this->input->post('lname'),
    //'username'=>$this->input->post('user_name'), -- not using this yet.
    'email'=>$this->input->post('email_address'),
    'password'=>md5($this->input->post('password')),
    'tid'=>$this->input->post('tid'),
    'utype'=>$utype
  );
  $this->db->insert('user',$data);
  return $this->db->insert_id();
 } //end add_user

//GET(DISPLAY) CLIENTS IN DASHBOARD
function getclients($tid)
{
    // where tid (trainer ID) in the DB = the tid input
    $this->db->where('tid',$tid);

    // where status in deleted column in the DB = 0 (active)
    $this->db->where('deleted', 0);

    // access DB table 'user'
    $query=$this->db->get('user');

    // return/display result
    return $query->result();
     
  } // closes getclients()

//GET(DISPLAY) INDIVIDUAL CLIENT RECORD IN EDIT_VIEW
function getclientrecord($pcid)
{
    // From db where the client's id matches user table id
    $this->db->where('id',$pcid);

    $query=$this->db->get('user');
    return $query->result();
} // close getclientrecord()

//PROCESS OF UPDATING THE CLIENT'S ROW WITH NEW INFORMATION
function update_user($udata)
{ 
  //for each parameter as key is the value variable
  foreach($udata as $key => $value)
  {   // if key matches the id input
      if ($key == 'id')
      {
        //
        $this->db->where($key, $value);
      }
      else
      {
         $this->db->set($key, $value);
      }
  }
  $this->db->update('user');
  if($this->db->affected_rows() > 0){
    return TRUE;
  }else{
    return FALSE;
  }
}//closes update_user

// DELETE USER
function quickdeleteuser($pcid){
  $this->db->where('id', $pcid);
  $this->db->set('deleted', 1);
  $this->db->update('user');
  if($this->db->affected_rows() > 0){
    return TRUE;
  }else{
    return FALSE;
  }
} // closes quickdeleteuser()


// ADD STATS
public function addstats()
{
  $data=array(
    'height'=>$this->input->post('height'),
    'weight'=>$this->input->post('weight'),
    'waist'=>$this->input->post('waist'),
    'bmi'=> bmicalc()->input->post('bmi'),
    'cid'=>$this->input->post('cid')
  );
  $this->db->insert('stats',$data);
 } //end add_stats

// GET/ACCESS STATS TABLE
function getstats($pcid)
{
    $this->db->where('cid',$pcid);

    // access DB table 'user'
    $query=$this->db->get('stats');

    // return/display result
    return $query->result();
     
  } // closes getclients()
 
// UPDATE STATS TABLE -- DB

  //for each parameter as key is the value variable
function updatestats($udata){
  foreach($udata as $key => $value)
  {   // if key matches the id input
      if ($key == 'id')
      {
        $this->db->where($key, $value);
      }
      else
      {
         $this->db->set($key, $value);
      }
  }
  $this->db->update('stats');
  if($this->db->affected_rows() > 0){
    return TRUE;
  }else{
    return FALSE;
  }
}//closes updatestats

//BMI CALCULATOR
function bmicalc($pcid){
    //Get height 
    $ht = $this->db->where('height',$height);
    //Get weight
    $wt = $this->db->where('weight',$weight);
    //Get waist
    $wst = $this->db->where('waist',$waist);

    //Conversion for calculation
   // $htc = $ht * 2.52;
    $htc = ($ht * $ht)*703;

    //Calculate
    $bmi = $wt / $htc;

    //Return result
    return $bmi;

} // closes bmicalc


// ACCESS USER_OBJ TABLE
function getnotes($pcid){
    $this->db->where('cid',$pcid);

    // where status in deleted column in the DB = 0 (active)
    $this->db->where('deleted', 0);

    // access DB table 'user_obj'
    $query=$this->db->get('user_obj');

    // return/display result
    return $query->result();
} // closes getnotes()

// ADD NOTES -- notes are new rows in DB, will find and associate each separate note with UID/client ID
function addnotes(){
 $data=array(
    'text_entry'=>$this->input->post('text_entry'),
    'entry_type'=>$this->input->post('entry_type'),
    'deleted'=>$this->input->post('deleted'),
    'cid'=>$this->input->post('cid')
  );
  $this->db->insert('user_obj',$data);
 } //end addnotes


function deletenote($pcid){
  $this->db->where('id', $pcid);
  $this->db->set('deleted', 1);
  $this->db->update('user_obj');
  if($this->db->affected_rows() > 0){
    return TRUE;
  }else{
    return FALSE;
  }
} // closes deletenote()

function updatenotes($udata){
  foreach($udata as $key => $value)
  {   // if key matches the id input
      if ($key == 'pk')
      {
        $key = 'id';
      }
      if ($key == 'id')
      {
        $this->db->where($key, $value);
      }
      else
      {
         $this->db->set($key, $value);
      }
  }
  $this->db->update('user_obj');
  if($this->db->affected_rows() > 0){
    return TRUE;
  }else{
    return FALSE;
  }
}//closes updatestats

// GET/ACCESS Profile Pic
function getprofilepic($pcid)
{   //Where ID is Client's ID, user type is 2
    $this->db->where('id',$pcid);
    $this->db->where('utype', 2);
    //$this->db->where('profile_pic', $profilepic);

    // access DB table 'user'
    $query=$this->db->get('user');

    // return/display result
    $result = $query->result_array();
    return $result[0]['profile_pic'];
     
  } // closes getprofilepic()

// GET/ACCESS Profile Pic
function getprofilethumb($pcid)
{   //Where ID is Client's ID, user type is 2
    $this->db->where('id',$pcid);
    $this->db->where('utype', 2);
    //$this->db->where('profile_pic', $profilepic);

    // access DB table 'user'
    $query=$this->db->get('user');

    // return/display result
    $result = $query->result_array();
    return $result[0]['profile_thumb'];
     
  } // closes getprofilepic()


} //closes class User_model






?>