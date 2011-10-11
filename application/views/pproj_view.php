  <!-- Called by Controller: view_pproj -->
  <script type="text/javascript">
    $(document).ready(function(){
	$('#published_proj').attr('class','active');
    });
  </script>  
  <div class="body">
    <div class="body_resize">
      <div class="left" id="home_left">
        <input type="hidden" id="my_redirect" value="<?php echo $my_redirect; ?>"/>
        <input type="hidden" id="baseurl" value="<?php echo $baseurl; ?>"/>
        <input type="hidden" id="new_url" value="<?php echo $new_url; ?>"/>
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
          
          $nw_url = $new_url; ?>
        <h2>Poultry</h2>
        
   <?php
    
    if ($list){
      ?>
      
      <TABLE BGCOLOR="#B2D1E5" class="project_table">
          <THEAD ALIGN="center" class="table_header">
    <TR>
      <TD>
        Project ID
      </TD>
    <TD width="200" title="Sort"><?php echo anchor('sortby/view_projects/breed/poultry','BREED', $atts);?></TD>
    <TD title="Sort"><?php echo anchor('sortby/view_projects/farm_animal/poultry','FARM ANIMAL', $atts);?></TD>
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
      <TD width="200"><?php
      $$nw_url = $row->proj_id;
      $proj_url = "$nw_url/${$nw_url}";
      echo anchor_popup($proj_url,$row->breed, $atts); ?>
      </TD>
      <TD><?php echo $row->farm_animal; ?></TD>
      <TD><?php echo $row->place; ?></TD> 
    </TR><?php
    }
    } else echo "No published Poultry project yet!"; ?>
    </TBODY>
   </TABLE>
      </div>
    </div>
  </div>
  

      