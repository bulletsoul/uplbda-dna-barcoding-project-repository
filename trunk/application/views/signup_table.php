<!-- Called by Controller: verify_signup/verify_signup_table -->
<div class="signup_pos">
<input type="hidden" id="proj_id" value="<?php echo $proj_id; ?>"/>
        <input type="hidden" id="redirect_url" value="<?php echo $redirect_url; ?>"/>
        <?php
        $nw_url = $redirect_url; ?>
<a name="signup"><div class="right" id="right">
                <?php
                $$nw_url = $proj_id;
                $proj_url = "$nw_url/${$nw_url}#signup"; ?>
	<?php echo form_open($proj_url); ?>
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
   </div>
</div>