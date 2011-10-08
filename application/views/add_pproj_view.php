  <!-- Called by Controller: add_pproj -->
  
  <div class="body">
    <div class="body_resize">
      <div class="left">
        <h2>Add poultry project</h2>
        <label class="reqd">*</label><i>Required fields</i>
   <?php echo form_open('process_add_pproj'); ?>
   <table class="input_table">
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('farm_animal'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label for="farm_animal"><label class="reqd">*</label>Farm animal:</label></td>
     <td><input type="text" size="30" id="farm_animal" name="farm_animal"/></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('fa_code'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label for="fa_code"><label class="reqd">*</label>Farm animal code<br/><i>(2 letters)</i>:</label></td>
     <td><input type="text" size="3" id="fa_code" name="fa_code"/></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('breed'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label for="breed"><label class="reqd">*</label>Breed:</label></td>
     <td><input type="text" size="30" id="breed" name="breed"/></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('breed_code'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label for="breed_code"><label class="reqd">*</label>Breed code <br/><i>(3 letters)</i>:</label></td>
     <td><input type="text" size="3" id="breed_code" name="breed_code"/></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('sex'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label for="sex"><label class="reqd">*</label>Sex:</label></td>
     <td>
      <input type="radio" name="sex" value="M"> Male
      <input type="radio" name="sex" value="F"> Female
     </td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('dna_seq'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label for="dna_seq"><label class="reqd">*</label>DNA sequence:</label></td>
     <td><textarea name="dna_seq" id="dna_seq" rows="7" cols="40"></textarea></td>
    </tr>
   </table>
  <br/><br/>
     <table class="it_stats">
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('weight'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('comb_type'); ?></td>       
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="weight">Weight:</label></td>
       <td><input type="text" size="10" id="weight" name="weight"/></td>
       <td class="it_stats_lbls"><label for="comb_type">Comb type:</label></td>
       <td><input type="text" size="10" id="comb_type" name="comb_type" value="<?php echo set_value('comb_type'); ?>"/></td>
      </tr>
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('wing_length'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('eye_color'); ?></td>
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="wing_length">Wing length:</label></td>
       <td><input type="text" size="10" id="wing_length" name="wing_length" value="<?php echo set_value('wing_length'); ?>"/></td>
       <td class="it_stats_lbls"><label for="eye_color">Eye color:</label></td>
       <td><input type="text" size="10" id="eye_color" name="eye_color" value="<?php echo set_value('eye_color'); ?>"/></td>
      </tr>
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('neck_length'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('earlobe_color'); ?></td>
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="neck_length">Neck length:</label></td>
       <td><input type="text" size="10" id="neck_length" name="neck_length" value="<?php echo set_value('neck_length'); ?>"/></td>
       <td class="it_stats_lbls"><label for="earlobe_color">Earlobe color:</label></td>
       <td><input type="text" size="10" id="earlobe_color" name="earlobe_color" value="<?php echo set_value('earlobe_color'); ?>"/></td>
      </tr>
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('breast_length'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('shank_color'); ?></td>
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="breast_length">Breast length:</label></td>
       <td><input type="text" size="10" id="breast_length" name="breast_length" value="<?php echo set_value('breast_length'); ?>"/></td>
       <td class="it_stats_lbls"><label for="shank_color">Shank color:</label></td>
       <td><input type="text" size="10" id="shank_color" name="shank_color" value="<?php echo set_value('shank_color'); ?>"/></td>
      </tr>
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('shank_length'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('beak_color'); ?></td>
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="shank_length">Shank length:</label></td>
       <td><input type="text" size="10" id="shank_length" name="shank_length" value="<?php echo set_value('shank_length'); ?>"/></td>
       <td class="it_stats_lbls"><label for="beak_color">Beak color:</label></td>
       <td><input type="text" size="10" id="beak_color" name="beak_color" value="<?php echo set_value('beak_color'); ?>"/></td>
      </tr>
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('beak_length'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('bill_color'); ?></td>
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="beak_length">Beak length:</label></td>
       <td><input type="text" size="10" id="beak_length" name="beak_length" value="<?php echo set_value('beak_length'); ?>"/></td>
       <td class="it_stats_lbls"><label for="bill_color">Bill color:</label></td>
       <td><input type="text" size="10" id="bill_color" name="bill_color" value="<?php echo set_value('bill_color'); ?>"/></td>
      </tr>
     </table>
     <br/><br/>
     <table class="input_table">
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('sampling_date'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label class="reqd">*</label><label for="sampling_date">Sampling date <br/><i>(Format: mm/dd/yyyy)</i>:</label></td>
     <td><input type="text" size="20" id="sampling_date" name="sampling_date"/></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('sample_type'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label class="reqd">*</label><label for="sample_type">Sample type:</label></td>
     <td><input type="text" size="20" id="sample_type" name="sample_type"/></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('origin'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label class="reqd">*</label><label for="origin">Origin:</label></td>
     <td><input type="text" size="20" id="origin" name="origin"/><br/></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('owner'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label class="reqd">*</label><label for="owner">Owner:</label></td>
     <td><input type="text" size="20" id="owner" name="owner"/></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('proj_desc'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label class="reqd">*</label><label for="proj_desc">Project description:</label></td>
     <td><textarea name="proj_desc" id="proj_desc" rows="7" cols="40"></textarea></td>
    </tr>
    <tr>
     <td class="it_labels">&nbsp;</td>
     <td><br/><input type="submit" value="Submit project"/>&nbsp;<?php echo form_reset('reset', 'Clear fields'); ?></td>
    </tr>
   </table><br/>
   </form><br/>   
      </div>