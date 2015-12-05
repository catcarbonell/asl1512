<div class="right top">

 <?php echo form_open("user/login"); ?>

  <label for="email">Email:</label>
  <input type="text" id="email" class="top-login" name="email" value="" />

  <label for="password">Password:</label>
  <input type="password" id="pass" class="top-login" name="pass" value="" />
  <input type="submit" class="top-login top-login-btn right" value="Sign in" />


 <?php echo form_close(); ?>

</div>


<div id="signup-thanks" class="clear">

	<h1>Thanks for signing up!</h1>
	<h2>Now use the form above to login!!</h2>

</div><!--<div id="content">-->