<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UPLB-DA DNA Barcoding Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery-latest.js"></script>
</head>
<body>
<div class="main">
  <div class="header_resize">
    <div class="header">
      <div class="logo">UPLB-DA DNA <div class="logo1">Barcoding Project</div></a></div>
      <div class="menu">
        <ul>
          <li><a href="<?php echo base_url(); ?>home" id="home"><span>Home</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/about" id="about"><span>About</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/contact" id="contact"><span>Contact</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/logout"><span>Logout</span></a></li>
          <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
          <li><?php echo form_open('search'); ?><input name="search_text" type="text" size="20" maxlength="80" id="search_text" value="Search animal or breed..." onFocus="{value=''}" class="input-text"></li>
	  <li><input type="image" src="<?php echo base_url(); ?>css/images/search.png" alt="Search" value="Go" id="search_submit" class="input-button" caption="Search"><?php echo form_close(); ?></a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="body">
    <div class="body_resize">
  <div class="right" id="home_right">
    <h2>Project Options</h2>
    <ul>
        <li><?php echo anchor('my_projects', 'My Projects'); ?></li>
        <li>Add project</li>
            <ul>
            <li><?php echo anchor('add_lproj', 'Livestock'); ?></li>
            <li><?php echo anchor('add_pproj', 'Poultry'); ?></li>
            </ul>
        <li>View all projects</li>
        <ul>
            <li>Livestock [<?php echo $this->db->count_all_results('livestock'); ?>]</li>
            <ul>
                <li><?php echo anchor('view_ls_category/bovidae', 'Bovidae'); ?> [<?php
        $this->db->where('ls_category', 'Bovidae');
        $this->db->from('livestock');
        echo $this->db->count_all_results(); ?>]</li>
                <li><?php echo anchor('view_ls_category/capridae', 'Capridae'); ?> [<?php
        $this->db->where('ls_category', 'Capridae');
        $this->db->from('livestock');
        echo $this->db->count_all_results(); ?>]</li>
                <li><?php echo anchor('view_ls_category/monogastrics', 'Monogastrics'); ?> [<?php
        $this->db->where('ls_category', 'Monogastrics');
        $this->db->from('livestock');
        echo $this->db->count_all_results(); ?>]</li>
            </ul>
            <li><?php echo anchor('view_pproj', 'Poultry'); ?> [<?php echo $this->db->count_all_results('poultry'); ?>]</li>
        </ul>
        <li><?php echo anchor('my_projects/view_gallery', 'Gallery'); ?></li>
    </ul>
    </div>
    