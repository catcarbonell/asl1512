<div id="content">

<div class="signup_wrap">

<div class="logo left"><img src="<?php echo base_url();?>/img/logo.png">

<div class="right" id="topheader">

 <?php echo form_open("user/login"); ?>

  <label for="email">Email:</label>
  <input type="text" id="email" class="top-login" name="email" value="" />
  <label for="password">Password:</label>
  <input type="password" id="pass" class="top-login" name="pass" value="" />
  <input type="submit" class="top-login top-login-btn" value="Sign in" />


 <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->

</div><!--<div class="signup_wrap">-->

<div id="reg_form" class="clear">

  <h1>Membership Sign Up!</h1>

 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("user/registration"); ?>

  <p>
  <label for="user_name">User Name:</label>
  <input type="text" id="user_name" name="user_name" value="<?php echo set_value('user_name'); ?>" />
  </p>
  <p>
  <label for="email_address">Your Email:</label>
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
  <input type="submit" class="btn" value="Submit" />
  </p>
 <?php echo form_close(); ?>
</div><!--<div class="reg_form">-->
</div><!--<div id="content">-->