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

    echo "<div id='client-list-$rows->id' class='box-lg client-box'>
    <h2>Name:</h2> $rows->fname $rows->lname 
    <br />
    <h2>Email:</h2> $rows->email</h2>";
    echo form_open("user/listeditform");
    echo "
      <p>
      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
      <input type='submit' name='edit'  value='edit' class='edit-btn'>
      ";
    echo form_close(); 
       //echo form_open("user/listdeleteform");
    echo "
      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
      <input type='submit' name='delete'  value='delete' class='del-btn' onclick='delclick(\"$rows->id\")''>
      </p>";

    //echo form_close(); 
    echo "</div> <br />";
     }
?>