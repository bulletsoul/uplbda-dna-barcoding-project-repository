  <!-- Called by Controller: my_projects/my_livestock_projects -->
  
  <div class="body">
    <div class="body_resize">
      <div class="left">
        <input type="hidden" id="my_redirect" value="<?php echo $my_redirect; ?>"/>
        <input type="hidden" id="baseurl" value="<?php echo $baseurl; ?>"/>
        <input type="hidden" id="new_url" value="<?php echo $new_url; ?>"/>
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
              'style' => 'text-decoration:underline'
            );
          
          $nw_url = $new_url; ?>

<h2>My Livestock Projects</h2></a>
          <?php
          if($result_livestock){ ?>
          <script language="JavaScript"><!--
function onClick() {
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
<input name="submitName4" type="submit" value="Sort" onClick="onClick();return false;">
</form>
          <TABLE class="project_table" BGCOLOR="#B2D1E5">
              <THEAD ALIGN="center" class="table_header">
                <TR>
                  <TD>Project ID</TD>
                  <TD width="200">Breed</TD>
                  <TD width="70">Farm Animal</TD>
                  <TD width="200">Place</TD>
                  <TD width="40">Edit</TD>
                  <TD width="40">Delete</TD>
                </TR>    
              </THEAD>
          <?php
            foreach ($result_livestock as $lrow){
            ?>
            
              <TBODY BGCOLOR="#E9F2F9">
                <TR>
                  <td align="center"><?php echo $lrow->proj_id; ?></td>
                  <TD id="breed"><?php echo $lrow->breed; ?></TD>
                  <TD align="center"><?php echo $lrow->farm_animal; ?></TD>
                  <TD><?php echo $lrow->place; ?></TD>
                  <TD align="center">
                    <?php
                    $$nw_url = $lrow->proj_id;
                    $proj_url = "$nw_url/${$nw_url}";
                    $str = '<img src="/uplbda/css/images/logo.png" alt="icon" title="EDIT '.$lrow->breed.'" width="12" height="12"/>';
                    echo anchor_popup($proj_url,$str,$atts); ?>
                  <TD align="center"><a href="javascript:delete_project('<?php echo $lrow->breed; ?>','<?php echo $lrow->proj_id; ?>')"><img src="<?php echo base_url(); ?>css/images/delete.png" alt="icon" title="<?php echo "DELETE "; echo $lrow->breed; ?>" width="12" height="12"></a></TD>
                  </TD>
                </TR>
                <script type="text/javascript">
                var my_redirect = document.getElementById("new_url").val();
        $.ajaxSetup ({  
            cache: false
        });
        
        function delete_project(breed_name, proj_id)
        {
          if(confirm('Are you sure you want to delete ' + breed_name + ' project?')){
            $.ajax({
              type: "GET",
              data: ({proj_id:proj_id}),
              url: "<?php echo site_url('my_projects/delete_project');?>",
              success: function(){
                window.location = my_redirect.value;
                alert('You have successfully deleted ' +breed_name+ ' project!');
              },
              error: function(){
                alert(breed_name + ' was not deleted. Please try again.');
              }
            });
          }
        }
            </script>
                <?php
            }
          } else echo "You have no existing livestock project!"; ?>
          <tr><td align="center" colspan="6"><?php echo $this->pagination->create_links(); ?></td></tr>
              </TBODY>
            </TABLE>   
      </div>