 <?php echo $_GET['pcid']; ?>
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