<?php

$CI =& get_instance();
$CI->load->model('user_model');
echo form_open("user/updateediteduser");
//$CI->user_model->getclientrecord($pcid);

foreach($CI->user_model->getclientrecord($pcid) as $row)
{
  //foreach($row as $key => $value) {
    //echo "$key:<br>
    //<input type='text' id='$key' name='$key' value='$value' /><br>";
    //echo "$key is at $value <BR>";
    
  //}
//}

echo "
  <input type='hidden' id='id' name='id' value='$row->id' />
<p>
  <label for='fname'>First Name:</label>
  <input type='text' id='fname' name='fname' value='$row->fname' />
  </p>
<p>
  <label for='lname'>Last Name:</label>
  <input type='text' id='lname' name='lname' value='$row->lname' />
  </p>
<p>
  <label for='email'>Email:</label>
  <input type='text' id='email' name='email' value='$row->lname' />
  </p>
  ";
}
echo "<br>
 <input type='submit' class='form-btn' value='Submit' />";
echo form_close();


