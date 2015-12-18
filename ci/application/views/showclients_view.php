<?php 
$mytid = $this->session->userdata('user_id');
$CI =& get_instance();
$CI->load->model('user_model');

#$CI->user_model->getclients($mytid);


//** GET CLIENTS  INFO ** //
   foreach($CI->user_model->getclients($mytid) as $rows)
     {

    // ** START CLIENT INFO DISPLAY BOX **
   	// Open first row
    echo "
    <div id='client-list-$rows->id' class='client-box'>
    <div class='row'>
    ";

    //Start first div
    echo "<div class='col-md-4'>";

    // ** DISPLAY PROFILE PIC **
    $pics = $CI->user_model->getprofilethumb($rows->id);

    if($pics != ''){
    	$thumb = $pics;
	    echo "<img src='$pics' class='img-responsive'>";
	    echo form_open("user/uploadformpage");

	    	echo "
			    	<input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                   
			    	<input type='submit' name='profilepic' class='client-box-input' value='Change Profile Pic'>
				 ";

		echo form_close();
	}else{
			    echo form_open("user/uploadformpage");

	    	echo "
			    	<input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
			    	<input type='submit' name='profilepic' class='client-box-input' value='Add Profile Pic'>
			    
				 ";

		echo form_close();
	}

	// ** VIEW NOTES **
	echo form_open("user/addnotespage");
    	echo "

		    	<input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
		    	<input type='submit' name='addnotes' class='client-box-input' value='View Notes'>

	      ";

	echo form_close();
	echo "</div>"; // Close first div

	// ** BASIC CLIENT INFO **
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
		    <br />
			<h2>BMI:</h2> <span>  $srows->bmi </span>
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

	 	// ** DISPLAY OR ADD STATS **
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
    
	echo "<div class='row'> "; // Open second row

	// ** DELETE BUTTON ** //
	 echo "
	  <div class='col-md-4 pull-right'>
      <input type='hidden' id='pcid' name='pcid' value='$rows->id' />                                                                                                                                                                                                                                               
      <input type='submit' name='delete'  value='delete' class='del-btn right' onclick='delclick(\"$rows->id\")''>
      </div>
	
      ";

	echo "</div>"; // Closes second row
	 //}



  	// ENTIRE CLIENT DIV CLOSE
	 echo "
	 </div>";
     }
?>

</div> <!-- ENDS CONTAINER -->