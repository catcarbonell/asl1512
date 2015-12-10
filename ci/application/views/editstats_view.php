
<?php

$CI =& get_instance();
$CI->load->model('user_model');
echo form_open("user/updatestatsform");
//$CI->user_model->getclientrecord($pcid);

foreach($CI->user_model->getstats($pcid) as $row)
{

echo "
<div class='clear box-lg'>
<input type='hidden' id='id' name='id' value='$row->id' />

<h2>Edit Client Stats</h2>

<p>
<label for='height'>
	<span>Height (in):</span>
	  <input type='text' id='height' name='height' value='$row->height'  />
</label>
	</p>
	<p>
<label for='weight'>
	<span>Weight (lbs):</span>
	 	<input type='text' id='weight' name='weight' value='$row->weight' />
<label>
	</p>
	<p>
<label for='waist'>
	<span>Waist (in):</span>
		<input type='text' id='waist' name='waist' value='$row->waist' />
<label>
	  </p>
	</label>

  ";
}
echo "<br>
 <input type='submit' class='form-btn' value='Submit' />
 </div>";
echo form_close();


