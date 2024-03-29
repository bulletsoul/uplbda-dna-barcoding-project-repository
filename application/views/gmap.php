
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
      <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
    <?php $this->cigooglemapapi->printHeaderJS(); ?>
    <?php $this->cigooglemapapi->printMapJS(); ?>
    <!-- necessary for google maps polyline drawing in IE -->
    <style type="text/css">
      v\:* {
        behavior:url(#default#VML);
      }
    </style>
    </head>
    <body onload="onLoad()">
      <input hidden="">
      <div class="user_project_view" id="user_project_view">
    <!-- googlemap-->
        <TABLE class="google_map" BGCOLOR="#B2D1E5" text-align="center">
          <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2"><h3>
          <?php
          $proj_id = $this->uri->segment(3);
          $place = $this->project->get_place($proj_id);
          foreach ($place as $item){
            foreach ($item as $row){
               echo $row;
            }
          }
          ?>
          </h3></TD></TR></THEAD>
        <TR><TD>
        <i>Note: If the map does not show anything, Google Map did not find the specified place.</i>
        </TD></TR>
        <tr><td>
        <?php $this->cigooglemapapi->printMap(); ?>
        </td><td>
        <?php $this->cigooglemapapi->printSidebar(); ?>
        </td></tr>
        </TABLE>
        <br/><br/>
      </div>
    