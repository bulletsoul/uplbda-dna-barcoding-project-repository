
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
      <div class="user_project_view" id="user_project_view">
    <!-- googlemap-->
    <?php if ($is_marker == "true") { ?>
        <TABLE class="google_map" BGCOLOR="#B2D1E5" text-align="center">
        <tr><td>
        <?php $this->cigooglemapapi->printMap(); ?>
        </td><td>
        <?php $this->cigooglemapapi->printSidebar(); ?>
        </td></tr>
        </TABLE>
        <?php } else echo "Google Map did not find the specified place."; ?>
        <br/><br/>
      </div>
    