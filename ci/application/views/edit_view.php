<?php

$CI =& get_instance();
$CI->load->model('user_model');
echo form_open("user/updateediteduser");
//$CI->user_model->getclientrecord($pcid);

foreach($CI->user_model->getclientrecord($pcid) as $row)
{

echo "
<br />
  <input type='hidden' id='id' name='id' value='$row->id' />
<p>
  
<input type='text' id='fname' name='fname' value='$row->fname' />
</p>
<p>
  
<input type='text' id='lname' name='lname' value='$row->lname' />
  </p>
<p>
  
<input type='text' id='email' name='email' value='$row->email' />
  </p>
  ";
}
echo "<br>
 <input type='submit' class='form-btn' value='Submit' />";
echo form_close();


