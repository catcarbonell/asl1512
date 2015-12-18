
<div class="navbar-form navbar-right">
 <?php echo form_open("user/login"); ?>

      <span>Email:</span>
      <input type="text" id="email" class="top-login" name="email" value="" />
  
      <span>Password:</span>
      <input type="password" id="pass" class="top-login" name="pass" value="" />
      <input type="submit" class="top-login top-login-btn right" value="Sign in" />

 <?php echo form_close(); ?>

</div>

<div class="row">
  <div id="reg_form" class="col-md-6">

    <h2>Membership Sign Up!</h2>

   <?php echo validation_errors('<p class="error">'); ?>
   <?php echo form_open("user/registration"); ?>
    <p>
    <label>
      <span>First Name:</span>
      <input type="text" id="fname" name="fname" value="First Name" />
    </label>
    </p>
    <p>
    <label>
      <span>Last Name:</span> 
      <input type="text" id="lname" name="lname" value="Last Name" />
    </label>
    </p>
    <p>
    <label>
      <span>Email</span>
      <input type="email" id="email_address" name="email_address" value="Email" />
    </label>
    </p>
    <p>
    <label>
    <span>Password</span>
    <input type="password" id="password" name="password"/>
    </label>
    </p>
    <p>
    <label>
      <span>Password Confirmation</span>
      <input type="password" id="con_password" name="con_password"/>
    </label>
    </p>

    <p>
    <input type="submit" class="form-btn center-block" value="Submit" />
    </p>
   <?php echo form_close(); ?>
  </div><!--<div class="reg_form">-->
 
</div><!--<div id="content">-->