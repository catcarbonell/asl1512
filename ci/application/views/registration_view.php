
<div class="right top">

 <?php echo form_open("user/login"); ?>

  <label for="email">Email:</label>
  <input type="text" id="email" class="top-login" name="email" value="" />

  <label for="password">Password:</label>
  <input type="password" id="pass" class="top-login" name="pass" value="" />
  <input type="submit" class="top-login top-login-btn right" value="Sign in" />


 <?php echo form_close(); ?>

</div>

<div class="signup_wrap">

<div id="reg_form" class="clear">

  <h1>Membership Sign Up!</h1>

 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("user/registration"); ?>
  <p>
  <label for="fnamee">First Name:</label>
  <input type="text" id="fname" name="fname" value="<?php echo set_value('fname'); ?>" />
  </p>
  <p>
  <label for="lname">Last Name:</label>
  <input type="text" id="lname" name="lname" value="<?php echo set_value('lname'); ?>" />
  </p>
  <p>
  <label for="email_address">Email:</label>
  <input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" />
  </p>
  <p>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
  </p>
  <p>
  <label for="con_password">Confirm Password:</label>
  <input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" />
  </p>
  <p>
  <input type="submit" class="form-btn" value="Submit" />
  </p>
 <?php echo form_close(); ?>
</div><!--<div class="reg_form">-->
</div><!--<div id="content">-->