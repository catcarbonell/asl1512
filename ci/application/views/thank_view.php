
<div class="signup_wrap">
<div class="signin_form">


<div class="logo left"><a href="/ci"><img src="<?php echo base_url();?>/img/logo.png"></a>

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


<div id="signup-thanks" class="clear">

	<h1>Thanks for signing up!</h1>
	<h2>Now use the form above to login!!</h2>

</div><!--<div id="content">-->