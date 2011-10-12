<!-- Called by Controller: search -->

  <div class="body">
    <div class="body_resize">
      <div class="left">
        <input type="hidden" id="new_url" value="<?php echo $new_url; ?>"/>
       <?php
          $atts = array(
              'width'      => '800',
              'height'     => '500',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes'
            );
          
          $nw_url = $new_url; ?>
        
        <?php
          if(!$results)
          {
            $string = "No records found for " .$search_text;
            $string = highlight_phrase($string, $search_text, '<i><span style="color:#151538; font-weight:bold">', '</span></i.');
        ?>
          <h2><?php echo $string; ?></h2>
        <?php
          }
          else {
        ?>
            <h2>Search results on: <i><span style="color:#151538; font-weight:bold"><?php echo $search_text; ?></span></i></h2>
        <?php
            foreach ($results as $row) {
              $pid = $row->proj_id;
        ?>
        <table class="project_table" BGCOLOR="#B2D1E5">
          <thead class="table_header" align="center"><tr rowspan="6"><td>&nbsp;</td><td>Breed</td></tr></thead>
          <tbody BGCOLOR="#E9F2F9">
            <tr rowspan="6"><td align="center" width="100px"><?php $dimgpath = $this->images->get_single_dfilepath($row->proj_id);
              if ($dimgpath) { foreach($dimgpath as $row){
            ?>
            <a href="<?php echo $row->filepath;  ?>" target="_blank"><img src="<?php echo $row->filepath;  ?>" id="image" width="50px" height="50px"></a>
            <?php } }
              else {
                echo "Image not available.";
                } ?>
            </td>
            <td><?php
                    $$nw_url = $row->proj_id;
                    $proj_url = "$nw_url/${$nw_url}";
                    $string = $row->breed;
                    $string = highlight_phrase($string, $search_text, '<span style="color:#151538">', '</span>');
                    echo anchor_popup($proj_url,$string, $atts); ?></td></tr>
          </tbody>
        </table>
        <?php }} ?>
        <?php echo $this->pagination->create_links(); ?>
      </div>