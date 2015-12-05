<?php 
$mytid = $this->session->userdata('user_id');
$CI =& get_instance();
$CI->load->model('user_model');

#$CI->user_model->getclients($mytid);

   foreach($CI->user_model->getclients($mytid) as $rows)
     {

      // Add all data to session
      /*$newdata = array(
        'user_id'  => $rows->id,
        'fname'  => $rows->fname,
        'lname'  => $rows->lname,
        'user_name'  => $rows->username,
        'user_email'    => $rows->email,
        'logged_in'  => TRUE,
      );*/
    echo form_open("user/listeditform");
    echo "<div class='client-list'>
      <h2>Name: $rows->fname $rows->lname</h2> <h2>Email: $rows->email</h2>
      <p>
      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
      <input type='submit' name='edit'  value='edit' class='btn'>
      </p>
    </div> <br />";
    echo form_close(); 
     }
?>