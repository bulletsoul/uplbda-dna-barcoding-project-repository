<!-- Called by controller: main -->
  <div class="body">
    <div class="body_resize">
      <div class="left">
        <h2>Welcome to UPLB-DA DNA Barcoding Project</h2>
         <p style="color: black;">We have sequenced the DNA barcodes (i.e. cytochrome c oxidase subunit I or COI gene of the mitochondrial genome) of common breeds/strains of farm animals in the Philippines.</p>
	 <p style="color: black;">DNA was extracted from blood samples.  The DNA barcode of the livestock and poultry breed/strain was amplified by polymerase chain reaction (PCR) method.  Sequence divergences ("Kimura 2 parameter" or K2P differences) of the DNA barcode between the groups or taxa and a library of common livestock and poultry breeds/strains were analyzed.  A neighbour-joining (NJ) tree based on COI barcodes was also created to provide graphic representation of sequence divergences among the breed/strain specimens to confirm identification.</p>  
        <h2>What We Do</h2>
        <p><span><em>Generating DNA barcodes for livestock and poultry breeds/species</em></span><p>
        <ol style='list-style:upper-alpha'>
		<li>Field sampling and blood collection</li>
		<li>Laboratory analysis (DNA extraction, purification, elution, amplification, and sequencing)</li>
		<li>DNA barcodes generated for common livestock and poultry breeds/ species in the Philippines</li>
		<li>COI sequence analysis</li>
	</ol>
      </div>
      <a name="signin"><div class="right" id="right">
	
        <div class="main_view_form">
			<?php echo form_open('verify_login'); ?>
			<table class="sign_table">
         <tr>
          <td><label class="sign_title">Sign in</label></td>
          <td style="text-align: right;"><a href="<?php echo base_url(); ?>signup/register#signup">Not yet a member? Sign up.</a></td>
         </tr>
         <tr><td colspan="2"><?php echo form_error('password'); ?></td></tr>
		<tr>
			<td><label for="username">Username:</label></td>
			<td align="right"><input type="text" size="30" id="username" name="username"/></td>
		</tr>
		<tr>
			<td><label for="password">Password:</label></td>
			<td align="right"><input type="password" size="30" id="password" name="password"/></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="right"><br/><input type="submit" value="Login"/></td>
		</tr>
	</table>
		</form>
    </div>
  </div>