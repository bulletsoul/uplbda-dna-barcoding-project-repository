<!-- Called by Controller: view_ls_category--> 
<script type="text/javascript">
    $(document).ready(function(){
	$('#published_proj').attr('class','active');
    });
</script>
  <div class="body">
    <div class="body_resize">
      <div class="left">
        <h2><?php echo $ls_category; ?></h2>
        <input type="hidden" id="my_redirect" value="<?php echo $my_redirect; ?>"/>
        <input type="hidden" id="baseurl" value="<?php echo $baseurl; ?>"/>
        <input type="hidden" id="new_url" value="<?php echo $new_url; ?>"/>
        <input type="hidden" id="new_url1" value="<?php echo $new_url1; ?>"/>
        
        <?php
          $atts = array(
              'width'      => '800',
              'height'     => '500',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'id' => 'breed',
              'style' => 'text-decoration:underline'
            );
          
          $nw_url = $new_url;?>  

   
    
    
    <?php
    
    if ($list){
      ?>
      <TABLE BGCOLOR="#B2D1E5" class="project_table">
      <THEAD ALIGN="center" class="table_header">
    <TR>
      <TD>
        Project ID
      </TD>
    <TD width="200" title="Sort">
    <?php
      if ($ls_category == 'Bovidae') echo anchor('sortby/view_projects/breed/livestock/bovidae','BREED', $atts);
      if ($ls_category == 'Capridae') echo anchor('sortby/view_projects/breed/livestock/capridae','BREED', $atts);
      if ($ls_category == 'Monogastrics') echo anchor('sortby/view_projects/breed/livestock/monogastrics','BREED', $atts);
    ?>
    </TD>
    <TD title="Sort">
    <?php
      if ($ls_category == 'Bovidae') echo anchor('sortby/view_projects/farm_animal/livestock/bovidae','FARM ANIMAL', $atts);
      if ($ls_category == 'Capridae') echo anchor('sortby/view_projects/farm_animal/livestock/capridae','FARM ANIMAL', $atts);
      if ($ls_category == 'Monogastrics') echo anchor('sortby/view_projects/farm_animal/livestock/monogastrics','FARM ANIMAL', $atts);
    ?>
    </TD>
    <TD>PLACE</TD>
    </TR>    
        
    </THEAD>
      <?php
   foreach ($list as $row)
   {
    ?>
    <TBODY BGCOLOR="#E9F2F9">
    <TR>
      <TD align="center"><?php echo $row->proj_id; ?></TD>
    <TD id="breed_name_header" width="200"><?php
      $$nw_url = $row->proj_id;
      $proj_url = "$nw_url/${$nw_url}";
      echo anchor_popup($proj_url,$row->breed, $atts); ?></TD>
    <TD><?php echo $row->farm_animal; ?></TD>
    <TD><?php
    if($row->place){
      $nw_url1 = $new_url1; 
      $$nw_url1 = $row->proj_id;
      $proj_url = "$nw_url1/${$nw_url1}";
      echo anchor_popup($proj_url,$row->place, $atts);} ?></TD> 
    </TR>
    <?php
    }
    } else echo "No published $ls_category project yet!"; ?>
    <tr><td colspan="5" align="center"><?php echo $this->pagination->create_links(); ?></td></tr>
    </TBODY>
   </TABLE>
</div>
      </div>