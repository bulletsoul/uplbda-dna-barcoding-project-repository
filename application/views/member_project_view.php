<!-- Called by Controller: view_project/show_project_complete -->
  
  <div class="body">
    <div class="user_project_view" id="user_project_view">
      
        <input type="hidden" id="proj_id" value="<?php echo $proj_id; ?>">
        <input type="hidden" id="dna_seq" value="<?php echo $dna_seq; ?>"/>
        <input type="hidden" id="barcode_url" value="<?php echo $barcode_url; ?>"/>
        <!-- PROJECT DETAILS -->
        <?php 
          if($project_details){
            foreach($project_details as $row){
        ?>
        <h2><?php echo $row->breed; ?></h2>
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
              <label>Project description:</label> <?php if ($row->proj_desc == '') echo '<i>No project description.</i>'; else echo $row->proj_desc; ?>
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
                <label>Height: </label><?php if ($row->height == '') echo 'Value not available.'; else echo $row->height;?><br/>
                <label>Weight: </label><?php if ($prow->weight == '') echo 'Value not available.'; else echo $prow->weight; ?><br/>
                <label>Heart girth: </label><?php if ($row->heart_girth == '') echo 'Value not available.'; else echo $row->heart_girth; ?><br/>
                <label>Midriff girth: </label><?php if ($row->midriff_girth == '') echo 'Value not available.'; else echo $row->midriff_girth; ?><br/>
                <label>Flank girth: </label><?php if ($row->flank_girth == '') echo 'Value not available.'; else echo $row->flank_girth; ?><br/>
                <label>Female maximum weight: </label><?php if ($row->female_maxweight == '') echo 'Value not available.'; else echo $row->female_maxweight; echo $tab2; ?><br/>
              </TD>
              <TD>
                <label>Leg length: </label><?php if ($row->leg_length == '') echo 'Value not available.'; else echo $row->leg_length; ?><br/>
                <label>Body length:</label> <?php if ($row->body_length == '') echo 'Value not available.'; else echo $row->body_length; ?><br/>
                <label>Snout length:</label> <?php if ($row->snout_length == '') echo 'Value not available.'; else echo $row->snout_length; ?><br/>
                <label>Ear length: </label><?php if ($row->ear_length == '') echo 'Value not available.'; else echo $row->ear_length; ?><br/>
                <label>Tail length:</label> <?php if ($row->tail_length == '') echo 'Value not available.'; else echo $row->tail_length; ?><br/>
                <label>Male maximum weight: </label><?php if ($row->male_maxweight == '') echo 'Value not available.'; else echo $row->male_maxweight; echo $tab2; ?><br/>
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
                <label>Wing length: </label><?php if ($row->wing_length == '') echo 'Value not available.'; else echo $row->wing_length; ?><br/>
                <label>Neck length: </label><?php if ($row->neck_length == '') echo 'Value not available.'; else echo $row->neck_length; ?><br/>
                <label>Beak length: </label><?php if ($row->beak_length == '') echo 'Value not available.'; else echo $row->beak_length; ?><br/>
                <label>Breast length: </label><?php if ($row->breast_length == '') echo 'Value not available.'; else echo $row->breast_length; ?><br/>
                <label>Shank length: </label><?php if ($row->shank_length == '') echo 'Value not available.'; else echo $row->shank_length; ?><br/>
              </TD>
              <td>
                <label>Comb type: </label><?php if ($row->comb_type == '') echo 'Value not available.'; else echo $row->comb_type; ?><br/>
                <label>Earlobe color: </label><?php if ($row->earlobe_color == '') echo 'Value not available.'; else echo $row->earlobe_color; ?><br/>
                <label>Eye color: </label><?php if ($row->eye_color == '') echo 'Value not available.'; else echo $row->eye_color; ?><br/>
                <label>Shank color: </label><?php if ($row->shank_color == '') echo 'Value not available.'; else echo $row->shank_color; ?><br/>
                <label>Bill/Beak color: </label><?php if ($row->bill_beak_color == '') echo 'Value not available.'; else echo $row->bill_beak_color; ?><br/>
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
            <label>Sex: </label><?php if ($row->sex == "M") echo "Male"; else echo "Female"; ?><br/>
            <label>Sample type: </label><?php echo $row->sample_type; ?><br/>
            <label>Sampling Date:</label> <?php echo $row->sampling_date; ?><br/>
            <label>Origin:</label> <?php echo $row->origin; ?><br/>
            <label>Owner:</label> <?php echo $row->owner; ?>
        </TD>
        </TR>
        <?php }} ?>
        </TBODY>
       </TABLE><br/>
        
      <!-- DNA SEQUENCE-->
      <table class="project_table" BGCOLOR="#B2D1E5">
          <thead ALIGN="center" style="font-weight: bold">
            <tr>
            <td>DNA Sequence</td>
          </tr>
          </thead>
          <tbody BGCOLOR="#E9F2F9">
          <tr>
            <td id="dna_seq_text">
            </td>
          </tr>
          </tbody>
        </table><br/>
      
      <table class="project_table" BGCOLOR="#B2D1E5">
          <thead ALIGN="center" style="font-weight: bold">
            <tr>
            <td colspan="2">Illustrative Barcode</td>
          </tr>
          </thead>
          <tbody BGCOLOR="#E9F2F9">
          <tr>
            <td width="50px"><label>Legend:</label>
              <div class="form-container">
                <div class="controlset"><label for="A">A</label> <input id="A" type="text" name="a_val" value="red" /></div> 
                <div class="controlset"><label for="C">C</label> <input id="C" type="text" name="C" value="blue" /></div> 
                <div class="controlset"><label for="T">T</label> <input id="T" type="text" name="T" value="green" /></div>
                <div class="controlset"><label for="G">G</label> <input id="G" type="text" name="G" value="black" /></div>
                <div class="controlset"><label for="dash">-</label> <input id="dash" type="text" name="dash" value="white" /></div> 
              </div>
            </td>
            <td style="padding-top: 0 !important">
              <div id="dna_seq_area"></div>
            </td>
          </tr>
          <?php if ($dna_seq) { ?>
          <tr><td colspan="2" align="center"><?php 
            $nw_url = $barcode_url;
            $$nw_url = $proj_id;
            $proj_url = "$nw_url/${$nw_url}";
            echo anchor_popup($proj_url,'View barcode without line break');?>
          </td>
          </tr><?php } ?>
          </tbody>
        </table><br/>
        
    <!-- Images -->
      <table class="project_table" BGCOLOR="#B2D1E5">
        <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2">Images</TD></TR>
          </THEAD>
          <tbody BGCOLOR="#E9F2F9">
          <tr></tr>
          <tr>
            <td width="80px" class="table_header">Dorsal Views</td>
            <td>
              <div id="img_area">
              <?php
              if ($dimgpath != NULL){
              foreach($dimgpath as $row){ ?>
                <a href="<?php echo $row->filepath;  ?>" target="_blank"><img src="<?php echo $row->filepath;  ?>" id="image" width="50px" height="50px"></a>
              <?php } } 
              else {
                echo "Image not available.";
                }?>
              </div>
            </td>
            </tr>
          <tr>
            <td width="80px" class="table_header">Ventral Views</td>
            <td>
              <div id="img_area">
              <?php
              if ($vimgpath != NULL){
                foreach($vimgpath as $row){?>
                <a href="<?php echo $row->filepath;  ?>" target="_blank"><img src="<?php echo $row->filepath;  ?>" id="image" width="100px" height="100px"></a>
               <?php } } 
              else {
                echo "Image not available.";
                }?>              
              </div>
            </td>
            </tr>
          <tr>
            <td width="80px" class="table_header">Lateral Views</td>
            <td>
              <div id="img_area">
              <?php
              if ($limgpath != NULL){
              foreach($limgpath as $row){ ?>
                <a href="<?php echo $row->filepath;  ?>" target="_blank"><img src="<?php echo $row->filepath;  ?>" id="image" width="100px" height="100px"></a>
              <?php } } 
              else {
                echo "Image not available.";
                }?>
              </div>
            </td>
            </tr>
          <tr>
            <td width="80px" class="table_header">Other Views</td>
            <td>
              <div id="img_area">
              <?php
              if ($oimgpath!= NULL){
              foreach($oimgpath as $row){ ?>
                <a href="<?php echo $row->filepath;  ?>" target="_blank"><img src="<?php echo $row->filepath;  ?>" id="image" width="100px" height="100px"></a>
              <?php } } 
              else {
                echo "Image not available.";
                }?>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      <br/>
      
      <!-- Videos -->
      <table class="project_table" BGCOLOR="#B2D1E5">
        <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2">Videos</TD></TR></THEAD>
          <tbody BGCOLOR="#E9F2F9">
          <tr>
            <td align="center" >
              <div id="vid_area">
              <?php
              if ($videopath != NULL){
                foreach($videopath as $row){?>
                  <a href="<?php echo $row->filepath;  ?>"><video width="400" height="310" controls="controls">
                     <source src="<?php echo $row->filepath;  ?>" />
                     Your browser does not support the video element.
                </video></a>
              <?php } } 
              else {
                echo "Video not available.";
                } ?>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      <br/>
        
      <!-- Documents -->
      <table class="project_table" BGCOLOR="#B2D1E5">
        <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2">Documents</TD></TR></THEAD>
          <tbody BGCOLOR="#E9F2F9">
          <tr>
            <td>
              <div id="docs_area">
              <?php
                if ($docpath){
                  foreach($docpath as $row){
                    $filepath = $row->filepath;
                    $filename = $row->filename;
                    //$data = file_get_contents($filepath);
                    ?>
                <a href="<?php echo $row->filepath;  ?>"> <?php echo $row->filename; ?></a><br/>
              <?php } } 
              else {
                echo "Document not available.";
              }?>
              </div>
            </td>
          </tr>
          </tbody>
        </table>

        
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery-1.3.2.min.js"/></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.colorPicker.js"/></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>css/js/sequence.js"/></script>