<?php 
$mytid = $this->session->userdata('user_id');
$CI =& get_instance();
$CI->load->model('user_model');

#$CI->user_model->getclients($mytid);


//** GET CLIENTS  INFO ** //
   foreach($CI->user_model->getclients($mytid) as $rows)
     {

    //ADD PICTURE
    echo "
    <div id='client-list-$rows->id' class='client-box'>
    <div class='row'>
    ";

    echo "<div class='col-md-4'>";
    echo "<img src='<?php echo base_url();?>/img/uploads/$rows->profilepic' class='img-responsive'>";
    echo form_open("user/clientprofilepic");
    	echo "
 
		    	<input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
		    	<input type='submit' name='profilepic' class='client-box-input' value='Add/Change Profile Pic'>
		    
			 ";

	echo form_close();

	echo form_open("user/addnotespage");
    	echo "

		    	<input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
		    	<input type='submit' name='addnotes' class='client-box-input' value='View Notes'>

	      ";

	echo form_close();
	echo "</div>";

    echo "
    <div class='col-md-3'>
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
	    { 

	    echo "

	    <div class='col-md-3'>
		    <h2>Height (in):</h2> <span> $srows->height </span>
		    <br />
		    <h2>Weight (lbs):</h2> <span> $srows->weight </span>
		    <br />
		    <h2>Waist (in):</h2> <span> $srows->waist </span>

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
	 	echo " <div class='col-md-3'>";
	 	echo form_open("user/addstatspage");
    	echo "
	      <p>
	      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
	      <input type='submit' name='addstats' class='client-box-input' value='Add Client Stats'>
	      </div>
	      ";
    	echo form_close();
	 }

	echo "</div>"; // Closes first row
    
	echo "<div class='row'> ";

	// ** DELETE BUTTON ** //
	 echo "
	  <div class='col-md-4 pull-right'>
      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
      <input type='submit' name='delete'  value='delete' class='del-btn right' onclick='delclick(\"$rows->id\")''>
      </div>
	
      ";

	echo "</div>";
	 //}



  	// ENTIRE CLIENT DIV CLOSE
	 echo "
	 </div>";
     }
?>

</div> <!-- ENDS CONTAINER -->