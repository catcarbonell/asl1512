<?php 
$mytid = $this->session->userdata('user_id');
$CI =& get_instance();
$CI->load->model('user_model');

#$CI->user_model->getclients($mytid);


//** GET CLIENTS  INFO ** //
   foreach($CI->user_model->getclients($mytid) as $rows)
     {
    echo "<div id='client-list-$rows->id' class='box-lg client-box'>
    <div class='box-md'>
    <h2>Name:</h2> $rows->fname $rows->lname 
    <br />
    <h2>Email:</h2> $rows->email
    ";
    echo form_open("user/listeditform");
    echo "
      <p>
      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
      <input type='submit' name='edit' class='client-box-input' value='Edit Contact Info'>
      </div>
      ";
    echo form_close(); 


    // ** GET CLIENT STATS **
    $statrows = $CI->user_model->getstats($rows->id);
 
    if (count($statrows) > 0){
	    foreach($statrows as $srows)
	    { echo "
	    <div class='box-md'>
	    <h2>Height (in):</h2> $srows->height 
	    <br />
	    <h2>Weight (lbs):</h2> $srows->weight
	    <br />
	    <h2>Waist (in):</h2> $srows->waist

	    ";
	    echo form_open("user/statseditform");
	    echo "
	      <p>
	      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
	      <input type='submit' name='edit' class='client-box-input'  value='Edit Stats'>
	      
	      </div>
	      ";
	    echo form_close(); 
	    }
	 }else{
	 	echo " <div class='box-md'>";
	 	echo form_open("user/addstatspage");
    	echo "
	      <p>
	      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
	      <input type='submit' name='addstats' class='client-box-input' value='Add Client Stats'>
	      </div>
	      ";
    	echo form_close();
	 }
    
    // ** DELETE BUTTON ** //
	  echo "
      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
      <input type='submit' name='delete'  value='delete' class='del-btn' onclick='delclick(\"$rows->id\")''>
      </p>";


	// VIEW NOTES
	echo form_open("user/addnotespage");
    	echo "
	      <p>
	      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
	      <input type='submit' name='addnotes' class='edit-btn' value='View Notes'>
	      
	      ";
    echo form_close();
	 //}

  	// ENTIRE CLIENT DIV CLOSE
	 echo "
	 </div> <br />";
     }
?>