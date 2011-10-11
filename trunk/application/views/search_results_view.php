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
        <ul>
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
        ?>
            <li><?php
                    $$nw_url = $row->proj_id;
                    $proj_url = "$nw_url/${$nw_url}";
                    $string = $row->breed;
                    $string = highlight_phrase($string, $search_text, '<span style="color:#151538">', '</span>');
                    echo anchor_popup($proj_url,$string, $atts); ?> - <?php $string = $row->proj_desc;
                    $string = highlight_phrase($string, $search_text, '<span style="color:#151538; font-weight:bold">', '</span>');
                    echo $string;?></li>
        <?php }} ?>
        </ul>
        <?php echo $this->pagination->create_links(); ?>
      </div>