  <!-- Called by Controller: my_projects/index -->
  
  <div class="body">
    <div class="body_resize">
      <div class="left">
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
              'style' => 'text-decoration:underline'
            );
          
          $nw_url = $new_url; ?>
                
        <h2>My Poultry Projects</h2>
        <?php
          if($result_poultry){
        ?>
        
        <TABLE class="project_table" BGCOLOR="#B2D1E5">
          <THEAD ALIGN="center" rowspan="2" class="table_header">
            <TR>
              <TD>Project ID</TD>
              <TD width="200" title="Sort"><?php echo anchor('sortby/my_projects/breed/poultry','BREED', $atts);?></TD>
              <TD width="100" title="Sort"><?php echo anchor('sortby/my_projects/farm_animal/poultry','FARM ANIMAL', $atts);?></TD>
              <TD width="100">Place</TD>
              <TD width="40">Edit</TD>
              <TD width="40">Delete</TD>
            </TR>    
          </THEAD>
        <?php
            foreach ($result_poultry as $prow){
        ?>
          <TBODY BGCOLOR="#E9F2F9">
            <TR>
              <td align="center"><?php echo $prow->proj_id; ?></td>
              <TD id="breed"><?php echo $prow->breed; ?>
              <TD><?php echo $prow->farm_animal; ?></TD>
              <TD><?php echo $prow->place; ?></TD>
              <TD align="center"><?php
                $$nw_url = $prow->proj_id;
                $proj_url = "$nw_url/${$nw_url}";
                $str = '<img src="/uplbda/css/images/logo.png" alt="icon" title="EDIT '.$prow->breed.'" width="12" height="12"/>';
                echo anchor_popup($proj_url,$str,$atts) ?></TD>
              <TD align="center"><a href="javascript:delete_project('<?php echo $prow->breed; ?>','<?php echo $prow->proj_id; ?>')"><img src="<?php echo base_url(); ?>css/images/delete.png" alt="icon" title="<?php echo "DELETE "; echo $prow->breed; ?>" width="12" height="12"></a></TD>
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
          } else echo "You have no existing poultry project!"; ?>
          </TBODY>
        </TABLE>
        <br/>
        <br/>
        <a name="livestock">
          <h2>My Livestock Projects</h2></a>
          <?php
          if($result_livestock){ ?>
          
          <TABLE class="project_table" BGCOLOR="#B2D1E5">
              <THEAD ALIGN="center" class="table_header">
                <TR>
                  <td>Project ID</td>
                  <TD width="200" title="Sort"><?php echo anchor('sortby/my_projects/breed/livestock#livestock','BREED', $atts); ?></TD>
                  <TD width="100" title="Sort"><?php echo anchor('sortby/my_projects/farm_animal/livestock#livestock','FARM ANIMAL', $atts); ?></TD>
                  <TD width="100">Place</TD>
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
                  <TD><?php echo $lrow->farm_animal; ?></TD>
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
              </TBODY>
            </TABLE>   
      </div>
      