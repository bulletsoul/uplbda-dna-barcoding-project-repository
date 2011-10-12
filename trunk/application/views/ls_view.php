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
        <input type="hidden" id="sortby_breed_asc" value="<?php echo $sortby_breed_asc; ?>"/>
        <input type="hidden" id="sortby_breed_desc" value="<?php echo $sortby_breed_desc; ?>"/>
        <input type="hidden" id="sortby_pid_asc" value="<?php echo $sortby_pid_asc; ?>"/>
        <input type="hidden" id="sortby_pid_desc" value="<?php echo $sortby_pid_desc; ?>"/>
        <input type="hidden" id="sortby_fa_asc" value="<?php echo $sortby_fa_asc; ?>"/>
        <input type="hidden" id="sortby_fa_desc" value="<?php echo $sortby_fa_desc; ?>"/>
        <input type="hidden" id="sortby_place_asc" value="<?php echo $sortby_place_asc; ?>"/>
        <input type="hidden" id="sortby_place_desc" value="<?php echo $sortby_place_desc; ?>"/>
        
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
      <script language="JavaScript"><!--
function ls_view() {
  var Current = document.formName4.selectName4.selectedIndex;
  
  if (Current == 0) window.location = sortby_pid_asc.value;
  if (Current == 1) window.location = sortby_pid_desc.value;
  if (Current == 2) window.location = sortby_breed_asc.value;
  if (Current == 3) window.location = sortby_breed_desc.value;
  if (Current == 4) window.location = sortby_fa_asc.value;
  if (Current == 5) window.location = sortby_fa_desc.value;
  if (Current == 6) window.location = sortby_place_asc.value;
  if (Current == 7) window.location = sortby_place_desc.value;  
}
//--></script>

<form name="formName4" onSubmit="return false;" align="right">
<select name="selectName4">
<option value="a_pid">Project ID (Ascending)
<option value="d_pid">Project ID (Descending)
<option value="a_breed">Breed (Ascending)
<option value="d_breed">Breed (Descending)
<option value="a_fa">Farm Animal (Ascending)
<option value="d_fa">Farm Animal (Descending)
<option value="a_place">Place (Ascending)
<option value="d_place">Place (Descending)
</select>
<input name="submitName4" type="submit" value="Sort" onClick="ls_view();return false;">
</form>
      <TABLE BGCOLOR="#B2D1E5" class="project_table">
      <THEAD ALIGN="center" class="table_header">
    <TR>
      <TD>Project ID</TD>
      <TD width="200">Breed</TD>
      <TD>Farm Animal</TD>
      <TD>Place</TD>
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