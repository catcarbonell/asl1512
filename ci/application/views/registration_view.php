
<div class="right top">

 <?php echo form_open("user/login"); ?>

  <label for="email">Email:</label>
  <input type="text" id="email" class="top-login" name="email" value="" />

  <label for="password">Password:</label>
  <input type="password" id="pass" class="top-login" name="pass" value="" />
  <input type="submit" class="top-login top-login-btn right" value="Sign in" />


 <?php echo form_close(); ?>

</div>

<div class="box-lg">

<div id="reg_form" class="clear">

  <h1>Membership Sign Up!</h1>

 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("user/registration"); ?>
  <p>
  <input type="text" id="fname" name="fname" value="First Name" />
  </p>
  <p>
  <input type="text" id="lname" name="lname" value="Last Name" />
  </p>
  <p>
  <input type="text" id="email_address" name="email_address" value="Email" />
  </p>
  <p>

  <h4>Password</h4>
  <input type="password" id="password" name="password"/>
  </p>
  <h4>Password Confirmation</h4>
  <p>
  <input type="password" id="con_password" name="con_password"/>
  </p>

  <p>
  <input type="submit" class="form-btn" value="Submit" />
  </p>
 <?php echo form_close(); ?>
</div><!--<div class="reg_form">-->
</div><!--<div id="content">-->