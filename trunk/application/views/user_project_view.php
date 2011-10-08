<!-- Called by Controller: view_project/show_project -->
  
  <div class="body">
    <div class="user_project_view" id="user_project_view">
        <input type="hidden" id="proj_id" value="<?php echo $proj_id; ?>"/>
        <input type="hidden" id="redirect_url" value="<?php echo $redirect_url; ?>"/>
        <?php
        $nw_url = $redirect_url; ?>
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
              <label>Farm animal: </label><?php echo $row->farm_animal; ?><BR/>
              <label>Farm animal code:</label> <?php echo $row->fa_code; ?><BR/>
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
              <label>Project description:</label> <?php echo $row->proj_desc; ?>
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
         ?>
        <TABLE BGCOLOR="#B2D1E5" class="project_table">
          <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2">Statistics</TD></TR></THEAD>
          <TBODY BGCOLOR="#E9F2F9" >
            <TR rowspan="6">
              <TD>
                <label>Height: <br/>
                <label>Weight: <br/>
                <label>Heart girth: <br/>
                <label>Midriff girth: <br/>
                <label>Flank girth: <br/>
                <label>Female maximum weight: <br/>
              </TD>
              <TD>
                <label>Leg length: <br/>
                <label>Body length: <br/>
                <label>Snout length: <br/>
                <label>Ear length: <br/>
                <label>Tail length: <br/>
                <label>Male maximum weight: <br/>
              </TD>
            </TR>
            <tr>
              <?php
                $$nw_url = $proj_id;
                $proj_url = "$nw_url/${$nw_url}#signup"; ?>
              <td colspan="2" align="center"><?php echo anchor($proj_url,'Register to view complete details.'); ?></td>
            </tr>
          </TBODY>
        </TABLE><br/>
   
        <?php
          } else {
        ?>
        <TABLE BGCOLOR="#B2D1E5" class="project_table">
          <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2">Statistics</TD></TR></THEAD>
          <TBODY BGCOLOR="#E9F2F9">
            <TR rowspan="6">
              <TD>
                <label>Wing length:<br/>
                <label>Neck length:<br/>
                <label>Beak length: <br/>
                <label>Breast length: <br/>
                <label>Shank length: <br/>
              </TD>
              <td>
                <label>Comb type: <br/>
                <label>Earlobe color: <br/>
                <label>Eye color:<br/>
                <label>Shank color: <br/>
                <label>Bill/Beak color: <br/>
              </TD>
            </TR>
            <tr>
              <?php
                $$nw_url = $proj_id;
                $proj_url = "$nw_url/${$nw_url}#signup"; ?>
              <td colspan="2" align="center"><?php echo anchor($proj_url,'Register to view complete details.'); ?></td>
            </tr>
          </TBODY>
          <?php }}} ?>
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
            <label>Sample type:</label> <?php echo $row->sample_type; ?><br/>
            <label>Sampling Date: </label><?php echo $row->sampling_date; ?><br/>
            <label>Origin: </label><?php echo $row->origin; ?><br/>
            <label>Owner:</label> <?php echo $row->owner; ?>
        </TD>
        </TR>
        <?php }} ?>
        </TBODY>
       </TABLE>