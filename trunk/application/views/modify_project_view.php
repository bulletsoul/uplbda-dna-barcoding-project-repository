<!-- Called by Controller: my_projects/edit_project -->
  
  <div class="body">
    <div class="body_resize">
      <div class="left">
        <input type="hidden" id="proj_id" value="<?php echo $proj_id; ?>">
        <input type="hidden" id="my_current_url" value="<?php echo $my_current_url; ?>">
        <!-- PROJECT DETAILS -->
        <?php 
          if($project_details){
            foreach($project_details as $row){
        ?>
        <input type="hidden" id="proj_id" value="<?php echo $row->proj_id; ?>"/>
      <input type="hidden" id="edit_proj_url" value="<?php echo $edit_proj_url; ?>"/>
      <?php
        $$edit_proj_url = $proj_id;
        $proj_url = "$edit_proj_url/${$edit_proj_url}"; ?>
      <?php echo form_open($proj_url); ?>
      <h2>Edit <?php echo $row->breed; ?> project</h2>
        <TABLE BGCOLOR="#B2D1E5" class="project_table">
        <THEAD ALIGN="center" class="table_header"><TR><TD>Project Details</TD></TR></THEAD>
        <TBODY BGCOLOR="#E9F2F9">
          <TR rowspan="6">
            <TD>
              <label>Breed code: </label><?php echo $row->breed_code; ?><BR/>
              <label>Farm animal:</label> <?php echo $row->farm_animal; ?><BR/>
              <label>Farm animal code: </label><?php echo $row->fa_code; ?><BR/>
            <?php }
              $proj_categ = $row->proj_category;
              if($proj_categ == "livestock") {
                foreach($ls_details as $row){
            ?>
                  <label>Category: </label>Livestock - <?php echo $row->ls_category; ?><BR/>
            <?php }}
              if($proj_categ == "poultry") {
            ?>
                <label>Category: </label>Poultry<BR/>
            <?php }
              foreach($project_details as $row){
            ?>
              <label>Project description:</label><br/> <textarea name="proj_desc" id="proj_desc" rows="7" cols="50"><?php echo $row->proj_desc; ?></textarea>
            </TD>
          </TR>
        <?php }} ?>
        </TBODY>
        </TABLE><br/>
   
        <!-- STATISTICS -->
        <?php
          $tab1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          $tab2 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          if ($project_details){
            foreach ($project_details as $prow){
              $proj_categ = $prow->proj_category;
              if($proj_categ == "livestock"){
                if($ls_details){
                  foreach($ls_details as $row){
         ?>
        <TABLE BGCOLOR="#B2D1E5" class="project_table">
          <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2">Statistics</TD></TR></THEAD>
          <TBODY BGCOLOR="#E9F2F9">
            <TR rowspan="6">
              <TD>
                <label>Height: </label><input id="height" name="height" value="<?php echo $row->height;?>"/><br/>
                <label>Weight: </label><input id="weight" name="weight" value="<?php echo $prow->weight; ?>"/><br/>
                <label>Heart girth: </label><input id="heart_girth" name="heart_girth" value="<?php echo $row->heart_girth; ?>"/><br/>
                <label>Midriff girth: </label><input id="midriff_girth" name="midriff_girth" value="<?php echo $row->midriff_girth; ?>"/><br/>
                <label>Flank girth: </label><input id="flank_girth" name="flank_girth" value="<?php echo $row->flank_girth; ?>"/><br/>
                <label>Female maximum weight: </label><input id="female_maxweight" name="female_maxweight" value="<?php echo $row->female_maxweight; echo $tab2; ?>"/><br/>
              </TD>
              <TD>
                <label>Leg length: </label><input id="leg_length" name="leg_length" value="<?php echo $row->leg_length; ?>"/><br/>
                <label>Body length: </label><input id="body_length" name="body_length" value="<?php echo $row->body_length; ?>"/><br/>
                <label>Snout length: </label><input id="snout_length" name="snout_length" value="<?php echo $row->snout_length; ?>"/><br/>
                <label>Ear length: </label><input id="ear_length" name="ear_length" value="<?php echo $row->ear_length; ?>"/><br/>
                <label>Tail length: </label><input id="tail_length" name="tail_length" value="<?php echo $row->tail_length; ?>"/><br/>
                <label>Male maximum weight: </label><input id="male_maxweight" name="male_maxweight" value="<?php echo $row->male_maxweight; echo $tab2; ?>"/><br/>
              </TD>
            </TR>
        <?php }} else echo 'Error.';  ?>
          </TBODY>
        </TABLE>
   
        <?php
          } else {
            if($poultry_details){
              foreach($poultry_details as $row){
        ?>
        <TABLE BGCOLOR="#B2D1E5" class="project_table">
          <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2">Statistics</TD></TR></THEAD>
          <TBODY BGCOLOR="#E9F2F9">
            <TR rowspan="6" style="border: hidden;">
              <TD>
                <label>Wing length: </label><input id="wing_length" name="wing_length" value="<?php echo $row->wing_length; ?>"/><br/>
                <label>Neck length:</label><input id="neck_length" name="neck_length" value="<?php echo $row->neck_length; ?>"/><br/>
                <label>Beak length: </label><input id="beak_length" name="beak_length" value="<?php echo $row->beak_length; ?>"/><br/>
                <label>Breast length: </label><input id="breast_length" name="breast_length" value="<?php echo $row->breast_length; ?>"/><br/>
                <label>Shank length: </label><input id="shank_length" name="shank_length" value="<?php echo $row->shank_length; ?>"/><br/>
              </TD>
              <td>
                <label>Comb type: </label><input id="comb_type" name="comb_type" value="<?php echo $row->comb_type; ?>"/><br/>
                <label>Earlobe color: </label><input id="earlobe_color" name="earlobe_color" value="<?php echo $row->earlobe_color; ?>"/><br/>
                <label>Eye color: </label><input id="eye_color" name="eye_color" value="<?php echo $row->eye_color; ?>"/><br/>
                <label>Shank color:</label><input id="shank_color" name="shank_color" value="<?php echo $row->shank_color; ?>"/><br/>
                <label>Bill/Beak color: </label><input id="bill_beak_color" name="bill_beak_color" value="<?php echo $row->bill_beak_color; ?>"/><br/>
              </TD>
            </TR>
        <?php }} else echo 'Error.'; }}}?>
          </TBODY>
        </TABLE><br/>
   
        <!-- SPECIMEN DATA -->
        <?php 
          if($project_details){
            foreach($project_details as $row){
        ?>
        <TABLE BGCOLOR="#B2D1E5" class="project_table">
        <THEAD ALIGN="center" class="table_header"><TR><TD>Specimen Data</TD></TR></THEAD>
        <TBODY BGCOLOR="#E9F2F9">
        <TR rowspan="7">
          <TD>
            <label>Sex:</label> <?php if ($row->sex == "M") echo "Male"; else echo "Female"; ?><br/>
            <label>Sample type: </label><input id="sample_type" name="sample_type" value="<?php echo $row->sample_type; ?>"/><br/>
            <label>Sampling Date: </label><input id="sampling_date" name="sampling_date" value="<?php echo $row->sampling_date; ?>"/><br/>
            <label>Origin: </label><input id="origin" name="origin" value="<?php echo $row->origin; ?>"/><br/>
            <label>Owner: </label><input id="owner" name="owner" value="<?php echo $row->owner; ?>"/><br/>
        </TD>
        </TR>
        <?php }} ?>
        </TBODY>
       </TABLE><br/>
        <a href="javascript:edit_project('<?php echo $row->breed; ?>','<?php echo $row->proj_id; ?>')" ><button id="update_button">Update values</button></a>
        <script type="text/javascript">
        $.ajaxSetup ({  
            cache: false
        });
        
        function edit_project(breed_name, proj_id)
        {
          if(confirm('Are you sure you want to edit ' + breed_name + ' project?')){
            var params = {
            proj_id:proj_id,
            proj_desc:proj_desc.value,
            sampling_date:sampling_date.value,
            sample_type:sample_type.value,
            origin:origin.value,
            owner:owner.value,
            wing_length:wing_length.value,
            neck_length:neck_length.value,
            breast_length:breast_length.value,
            shank_length:shank_length.value,
            beak_length:beak_length.value,
            comb_type:comb_type.value,
            earlobe_color:earlobe_color.value,
            eye_color:eye_color.value,
            shank_color:shank_color.value,
            bill_beak_color:bill_beak_color.value,
            height:height.value,
            weight:weight.value,
            heart_girth:heart_girth.value,
            midriff_girth:midriff_girth.value,
            flank_girth:flank_girth.value,
            female_maxweight:female_maxweight.value,
            leg_length:leg_length.value,
            body_length:body_length.value,
            snout_length:snout_length.value,
            ear_length:ear_length.value,
            tail_length:tail_length.value,
            male_maxweight:male_maxweight.value
          }
            $.ajax({
              type: "GET",
              data: (params),
              url: "<?php echo site_url('process_edit_proj/edit_project');?>",
              success: function(){
                window.location = my_current_url.value;
              },
              error: function(){
                alert(breed_name + ' was not edited. Please try again.');
              }
            });
          } else window.location = my_current_url.value;
        }
            </script>
    </div>
  </div>
</div>
  