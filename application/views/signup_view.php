
  <div class="body">
    <div class="body_resize">
      <div class="left">
        <h2>Welcome to UPLB-DA DNA Barcoding Project</h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        <h2>What We Do</h2>
        <p><span><em>Vestibulum vehicula purus nec dui accumsan fermentum. Suspendisse potenti.</em></span> <br />
          Ut dapibus est id odio pretium blandit in eget leo. Aliquam erat volutpat. Curabitur blandit odio eget odio eleifend vel mattis augue convallis. Praesent fringilla, eros et tristique tempus, libero metus porttitor velit, at ultrices eros dolor placerat nunc. Fusce ac egestas ante.</p>
      </div>
      <a name="signup"><div class="right" id="right">
	<?php echo form_open('verify_signup'); ?>
	<table class="sign_table">
         <tr>
          <td><label class="sign_title">Sign up</label></td>
          <td style="text-align: right;"><a href="<?php echo base_url(); ?>main#signin">Sign in</a></td>
         </tr>
         <tr><td colspan="2"><?php echo form_error('username'); ?></td></tr>
		<tr>
			<td><label for="username">Username:</label></td>
			<td align="right"><input type="text" size="20" id="username" name="username"/></td>
		</tr>
                <tr><td colspan="2"><?php echo form_error('email'); ?></td></tr>
		<tr>
			<td><label for="email">Email address:</label></td>
			<td align="right"><input type="text" size="20" id="email" name="email"/></td>
		</tr>
                <tr><td colspan="2"><?php echo form_error('password'); ?></td></tr>
		<tr>
			<td><label for="password">Password:</label></td>
			<td align="right"><input type="password" size="20" id="password" name="password"/></td>
		</tr>
                <tr><td colspan="2"><?php echo form_error('passconf'); ?></td></tr>
		<tr>
			<td><label for="password">Retype password:</label></td>
			<td align="right"><input type="password" size="20" id="passconf" name="passconf"/></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="right"><br/><input type="submit" value="Register"/></td>
                </tr>
	</table>
   </form> 
      </a>
  </div>
  
  