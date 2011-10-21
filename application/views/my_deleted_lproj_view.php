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

<table width="630px">
  <tr>
    <td><label style="font-size:20px">My Deleted Livestock Projects</label></td>
    <td align="right"><?php echo anchor('my_projects/my_livestock_projects', 'Back to my livestock projects');?></td>
  </tr>
</table>
<br/>
          <?php
          if($result_livestock){ ?>
          <TABLE class="project_table" BGCOLOR="#B2D1E5">
              <THEAD ALIGN="center" class="table_header">
                <TR>
                  <TD width="70">Project ID</TD>
                  <TD width="350">Breed</TD>
                  <TD>Farm Animal</TD>
                  <TD width="40">Restore</TD>
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
                  <TD align="center"><a href="javascript:restore_project('<?php echo $lrow->breed; ?>','<?php echo $lrow->proj_id; ?>')"><img src="<?php echo base_url(); ?>css/images/restore.gif" alt="icon" title="<?php echo "RESTORE "; echo $lrow->breed; ?>" width="13" height="13"></a></TD>
                  </TD>
                </TR>
                <script type="text/javascript">
        $.ajaxSetup ({  
            cache: false
        });
        
        function restore_project(breed_name, proj_id)
        {
          if(confirm('Are you sure you want to restore ' + breed_name + ' project?')){
            $.ajax({
              type: "GET",
              data: ({proj_id:proj_id}),
              url: "<?php echo site_url('my_projects/restore_project');?>",
              success: function(){
                window.location = my_redirect.value;
                alert('You have successfully restored ' +breed_name+ ' project!');
              },
              error: function(){
                alert(breed_name + ' was not restored. Please try again.');
              }
            });
          }
        }
            </script>
                <?php
            }
          } else echo "You do not have any deleted livestock project."; ?>
          <tr><td align="center" colspan="6"><?php echo $this->pagination->create_links(); ?></td></tr>
              </TBODY>
            </TABLE>   
      </div>