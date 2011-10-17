  <!-- Called by Controller: view_pproj -->
  <script type="text/javascript">
    $(document).ready(function(){
	$('#published_proj').attr('class','active');
    });
  </script>  
  <div class="body">
    <div class="body_resize">
      <div class="left" id="home_left">
        <input type="hidden" id="proj_id" value="<?php echo $proj_id; ?>">
        <input type="hidden" id="my_redirect" value="<?php echo $my_redirect; ?>"/>
        <input type="hidden" id="baseurl" value="<?php echo $baseurl; ?>"/>
        <input type="hidden" id="new_url" value="<?php echo $new_url; ?>"/>
        <input type="hidden" id="my_redirect" value="<?php echo $my_redirect; ?>"/>
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
          
          $nw_url = $new_url; ?>
        <h2>Poultry</h2>
   <?php
    if ($list){
      ?>
      <table class="project_table">
        <tr>
          <td><h3>Sorted by <?php echo $column;?> in <?php echo $order; ?> order</h3></td>
          <td align="right"><form name="formName4" onSubmit="return false;">
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
</form></td>
        </tr>
      </table>
      <TABLE BGCOLOR="#B2D1E5" class="project_table">
      <THEAD ALIGN="center" class="table_header">
    <TR>
      <TD></TD>
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
      <TD width="60" align="center">
        <?php $dimgpath = $this->images->get_single_dfilepath($row->proj_id);
              if ($dimgpath) { foreach($dimgpath as $row2){
                $str = '<img src="<?php echo $row2->filepath;  ?>" id="image" width="60px" height="50px">';
            ?>
            <div class="thumbnail-item">
              <a href="#"><img src="<?php echo $row2->filepath;  ?>" id="image" width="60px" height="50px"></a>
              <div class="tooltip">
                <img src="<?php echo $row2->filepath;  ?>" alt="" width="330" height="185" />
                <span class="overlay"></span>
              </div> 
            </div> 
            <?php } }
              else {
                echo "Image not available.";
                } ?>
      </TD>
      <TD align="center" width="30"><?php echo $row->proj_id; ?></TD>
      <TD width="200"><?php
      $$nw_url = $row->proj_id;
      $proj_url = "$nw_url/${$nw_url}";
      echo anchor_popup($proj_url,$row->breed, $atts); ?>
      </TD>
      <TD width="50" align="center"><?php echo $row->farm_animal; ?></TD>
      <TD><?php echo $row->place; ?></TD> 
    </TR><?php
    }
    } else echo "No published Poultry project yet!"; ?>
    <tr><td colspan="5" align="center"><?php echo $this->pagination->create_links(); ?></td></tr>
    </TBODY>
   </TABLE>
      </div>
    </div>
  </div>
 <script type="text/javascript">
      // Load this script once the document is ready
$(document).ready(function () {
         
    // Get all the thumbnail
    $('div.thumbnail-item').mouseenter(function(e) {
 
        // Calculate the position of the image tooltip
        x = e.pageX - $(this).offset().left;
        y = e.pageY - $(this).offset().top;
 
        // Set the z-index of the current item, 
        // make sure it's greater than the rest of thumbnail items
        // Set the position and display the image tooltip
        $(this).css('z-index','15')
        .children("div.tooltip")
        .css({'top': y + 10,'left': x + 20,'display':'block'});
             
    }).mousemove(function(e) {
             
        // Calculate the position of the image tooltip          
        x = e.pageX - $(this).offset().left;
        y = e.pageY - $(this).offset().top;
             
        // This line causes the tooltip will follow the mouse pointer
        $(this).children("div.tooltip").css({'top': y + 10,'left': x + 20});
             
    }).mouseleave(function() {
             
        // Reset the z-index and hide the image tooltip 
        $(this).css('z-index','1')
        .children("div.tooltip")
        .animate({"opacity": "hide"}, "fast");
    });
 
});</script> 

      