  <div class="body">
    <div class="body_resize">
      <div class="left">
        <input type="hidden" id="new_url" value="<?php echo current_url(); ?>"/>
        <h2>Add livestock project</h2><br/>
        <label class="reqd">*</label><i>Required fields</i>
   <?php echo form_open('process_add_lproj'); ?>
   <table class="input_table">
    <tr>
     <td>&nbsp;</td>
     <td><?php echo form_error('ls_category'); ?></td>
    </tr>
    <tr>
     <td class="it_labels"><label for="category"><label class="reqd">*</label>Category:</label></td>
     <td class="radio">
      <input type="radio" name="ls_category" value="Bovidae"> Bovidae
      <input type="radio" name="ls_category" value="Capridae"> Capridae
      <input type="radio" name="ls_category" value="Monogastrics"> Monogastrics<br/>
     </td>
    </tr>
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
       <td><?php echo form_error('midriff_girth'); ?></td>       
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="weight">Weight:</label></td>
       <td><input type="text" size="10" id="weight" name="weight"/></td>
       <td class="it_stats_lbls"><label for="midriff_girth">Midriff girth:</label></td>
       <td><input type="text" size="10" id="midriff_girth" name="midriff_girth"/></td>
      </tr>
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('male_maxweight'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('flank_girth'); ?></td>
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="male_maxweight">Male <i>(max. weight)</i>:</label></td>
       <td><input type="text" size="10" id="male_maxweight" name="male_maxweight"/></td>
       <td class="it_stats_lbls"><label for="flank_girth">Flank girth:</label></td>
       <td><input type="text" size="10" id="flank_girth" name="flank_girth"/></td>
      </tr>
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('female_maxweight'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('leg_length'); ?></td>
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="female_maxweight">Female <i>(max. weight)</i>:</label></td>
       <td><input type="text" size="10" id="female_maxweight" name="female_maxweight"/></td>
       <td class="it_stats_lbls"><label for="leg_length">Leg length:</label></td>
       <td><input type="text" size="10" id="leg_length" name="leg_length"/></td>
      </tr>
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('height'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('snout_length'); ?></td>
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="height">Height:</label></td>
       <td><input type="text" size="10" id="height" name="height"/></td>
       <td class="it_stats_lbls"><label for="snout_length">Snout length:</label></td>
       <td><input type="text" size="10" id="snout_length" name="snout_length"/></td>
      </tr>
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('body_length'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('ear_length'); ?></td>
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="body_length">Body length:</label></td>
       <td><input type="text" size="10" id="body_length" name="body_length"/></td>
       <td class="it_stats_lbls"><label for="ear_length">Ear length:</label></td>
       <td><input type="text" size="10" id="ear_length" name="ear_length"/></td>
      </tr>
      <tr>
       <td>&nbsp;</td>
       <td><?php echo form_error('heart_girth'); ?></td>
       <td>&nbsp;</td>
       <td><?php echo form_error('tail_length'); ?></td>
      </tr>
      <tr>
       <td class="it_stats_lbls"><label for="heart_girth">Heart girth:</label></td>
       <td><input type="text" size="10" id="heart_girth" name="heart_girth"/></td>
       <td class="it_stats_lbls"><label for="tail_length">Tail length:</label></td>
       <td><input type="text" size="10" id="tail_length" name="tail_length"/></td>
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
   </form>
    </div>