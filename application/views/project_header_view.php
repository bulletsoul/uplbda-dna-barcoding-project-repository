<!-- Called by Controller:
    - view_project/show_project
    - my_projects/index
    - my_projects/edit_project
    - my_projects/view_sequence
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UPLB-DA DNA Barcoding Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery-1.3.2.min.js"></script>
<link href="<?php echo base_url(); ?>css/colorPicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery-latest.js"></script>
<link href="<?php echo base_url(); ?>css/legend.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">
  <div class="header_resize">
    <div class="header">
      <div class="logo">UPLB-DA DNA <div class="logo1">Barcoding Project</div></a></div>
      <div class="menu">
        <ul>
          <li><a href="<?php echo base_url(); ?>home"><span>Home</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/about"><span>About</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/contact" id="contact"><span>Contact</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/logout"><span>Logout</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="clr"></div>
    </div>
  </div>
  <input type="hidden" id="proj_id" value="<?php echo $proj_id; ?>"/>
  <input type="hidden" id="new_url" value="<?php echo $new_url; ?>"/>
  <input type="hidden" id="nw_url" value="<?php echo $nw_url; ?>"/><!--from view_project: site_url('my_projects/edit_project')-->
  <input type="hidden" id="nw_url1" value="<?php echo $nw_url1; ?>"/>
  <input type="hidden" id="nw_url1" value="<?php echo $nw_url2; ?>"/>
  <input type="hidden" id="nw_url1" value="<?php echo $nw_url3; ?>"/>
  
  <?php
    $$new_url = $proj_id;
    $proj_url = "$new_url/${$new_url}";
  ?>
  <div class="body">
    <div class="body_resize">
      <div class="right" id="home_right">
    <h2><?php echo anchor($proj_url,$breed_name,'id="breed_name_header"'); ?> <br/> Project Options</h2>
    <ul>   
      <li><?php
      $$nw_url = $proj_id;
      $proj_url = "$nw_url/${$nw_url}";
      echo anchor($proj_url,'Edit specimen data'); ?></li>
      <li>Upload</li>
      <ul>
	<?php
	  $$nw_url1 = $proj_id;
	  $proj_url = "$nw_url1/${$nw_url1}"; ?>
        <li><?php echo anchor($proj_url,'Specimen Documents'); ?></li>
        <li>Specimen Images</li>
        <ul>
        <?php
	  $$nw_url2 = $proj_id;
	  $proj_url = "$nw_url2/${$nw_url2}"; ?>
        <li><?php echo anchor($proj_url,'Dorsal Views'); ?></li>
        <?php
	  $$nw_url6 = $proj_id;
	  $proj_url = "$nw_url6/${$nw_url6}"; ?>
        <li><?php echo anchor($proj_url,'Lateral Views'); ?></li>
        <?php
	  $$nw_url5 = $proj_id;
	  $proj_url = "$nw_url5/${$nw_url5}"; ?>
        <li><?php echo anchor($proj_url,'Ventral Views'); ?></li>
        <?php
	  $$nw_url7 = $proj_id;
	  $proj_url = "$nw_url7/${$nw_url7}"; ?>
        <li><?php echo anchor($proj_url,'Other Views'); ?></li>
        </ul>
	<?php
	  $$nw_url3 = $proj_id;
	  $proj_url = "$nw_url3/${$nw_url3}"; ?>
        <li><?php echo anchor($proj_url,'Specimen Videos'); ?></li>
      </ul>
    </ul>
    </div>
      
