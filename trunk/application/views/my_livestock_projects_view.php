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
              <td><label style="font-size:20px">My Livestock Projects</label></td>
              <td align="right"><?php echo anchor('my_projects/my_del_lproj', 'Deleted livestock projects');?></td>
            </tr>
          </table>
          <br/>
          <?php
          if($result_livestock){ ?>
          <TABLE class="project_table" BGCOLOR="#B2D1E5" >
              <THEAD align="center" class="table_header" >
                <TR>
                  <?php $seg2 = $this->uri->segment(2);
                  if ($seg2 == 'my_livestock_projects') { ?>
                  <th width="50"><a href="<?php echo base_url(); ?>my_projects/sortby_pid_asc_livestock">Project ID<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_breed_asc_livestock">Breed<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="90"><a href="<?php echo base_url(); ?>my_projects/sortby_fa_asc_livestock">Farm Animal<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_place_asc_livestock">Place<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  
                  <?php } if ($seg2 == 'sortby_pid_asc_livestock') { ?>
                  <th width="50"><a href="<?php echo base_url(); ?>my_projects/sortby_pid_desc_livestock">Project ID<br/><img src="<?php echo base_url(); ?>css/images/desc.gif" alt="icon" id="desc_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_breed_asc_livestock">Breed<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="90"><a href="<?php echo base_url(); ?>my_projects/sortby_fa_asc_livestock">Farm Animal<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_place_asc_livestock">Place<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <?php } if ($seg2 == 'sortby_pid_desc_livestock') { ?>
                  <th width="50"><a href="<?php echo base_url(); ?>my_projects/sortby_pid_asc_livestock">Project ID<br/><img src="<?php echo base_url(); ?>css/images/asc.gif" alt="icon" id="asc_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_breed_asc_livestock">Breed<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="90"><a href="<?php echo base_url(); ?>my_projects/sortby_fa_asc_livestock">Farm Animal<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_place_asc_livestock">Place<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  
                  <?php } if ($seg2 == 'sortby_breed_asc_livestock') { ?>
                  <th width="50"><a href="<?php echo base_url(); ?>my_projects/sortby_pid_asc_livestock">Project ID<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_breed_desc_livestock">Breed<br/><img src="<?php echo base_url(); ?>css/images/desc.gif" alt="icon" id="desc_header"></a></th>
                  <th width="90"><a href="<?php echo base_url(); ?>my_projects/sortby_fa_asc_livestock">Farm Animal<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_place_asc_livestock">Place<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <?php } if ($seg2 == 'sortby_breed_desc_livestock') { ?>  
                  <th width="50"><a href="<?php echo base_url(); ?>my_projects/sortby_pid_asc_livestock">Project ID<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_breed_asc_livestock">Breed<br/><img src="<?php echo base_url(); ?>css/images/asc.gif" alt="icon" id="asc_header"></a></th>
                  <th width="90"><a href="<?php echo base_url(); ?>my_projects/sortby_fa_asc_livestock">Farm Animal<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_place_asc_livestock">Place<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  
                  <?php } if ($seg2 == 'sortby_fa_asc_livestock') { ?>
                  <th width="50"><a href="<?php echo base_url(); ?>my_projects/sortby_pid_asc_livestock">Project ID<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_breed_asc_livestock">Breed<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="90"><a href="<?php echo base_url(); ?>my_projects/sortby_fa_desc_livestock">Farm Animal<br/><img src="<?php echo base_url(); ?>css/images/desc.gif" alt="icon" id="desc_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_place_asc_livestock">Place<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <?php } if ($seg2 == 'sortby_fa_desc_livestock') { ?>
                  <th width="50"><a href="<?php echo base_url(); ?>my_projects/sortby_pid_asc_livestock">Project ID<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_breed_asc_livestock">Breed<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="90"><a href="<?php echo base_url(); ?>my_projects/sortby_fa_asc_livestock">Farm Animal<br/><img src="<?php echo base_url(); ?>css/images/asc.gif" alt="icon" id="asc_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_place_asc_livestock">Place<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  
                  <?php } if ($seg2 == 'sortby_place_asc_livestock') { ?>
                  <th width="50"><a href="<?php echo base_url(); ?>my_projects/sortby_pid_asc_livestock">Project ID<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_breed_asc_livestock">Breed<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="90"><a href="<?php echo base_url(); ?>my_projects/sortby_fa_asc_livestock">Farm Animal<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_place_desc_livestock">Place<br/><img src="<?php echo base_url(); ?>css/images/desc.gif" alt="icon" id="desc_header"></a></th>
                  <?php } if ($seg2 == 'sortby_place_desc_livestock') { ?>
                  <th width="50"><a href="<?php echo base_url(); ?>my_projects/sortby_pid_asc_livestock">Project ID<img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_breed_asc_livestock">Breed<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="90"><a href="<?php echo base_url(); ?>my_projects/sortby_fa_asc_livestock">Farm Animal<br/><img src="<?php echo base_url(); ?>css/images/bg.gif" alt="icon" id="bg_header"></a></th>
                  <th width="150"><a href="<?php echo base_url(); ?>my_projects/sortby_place_asc_livestock">Place<br/><img src="<?php echo base_url(); ?>css/images/asc.gif" alt="icon" id="asc_header"></a></th>
                  <?php } ?>
                  <TD width="40">Edit<br/>&nbsp;</TD>
                  <TD width="40">Delete<br/>&nbsp;</TD>
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
                    $str = '<img src="/uplbda/css/images/logo.png" alt="icon" title="EDIT '.$lrow->breed.'" width="13" height="13"/>';
                    echo anchor_popup($proj_url,$str,$atts); ?>
                  <TD align="center"><a href="javascript:delete_project('<?php echo $lrow->breed; ?>','<?php echo $lrow->proj_id; ?>')"><img src="<?php echo base_url(); ?>css/images/delete.png" alt="icon" title="<?php echo "DELETE "; echo $lrow->breed; ?>" width="13" height="13"></a></TD>
                  </TD>
                </TR>
                <script type="text/javascript">
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