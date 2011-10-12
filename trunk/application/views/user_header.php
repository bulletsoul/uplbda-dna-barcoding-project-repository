<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UPLB-DA DNA Barcoding Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.cycle.all.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header_resize">
    <div class="header">
      <div class="logo">UPLB-DA DNA <div class="logo1">Barcoding Project</div></a></div>
      <div class="menu">
        <ul>
          <li><a href="<?php echo base_url(); ?>" id="home"><span>Home</span></a></li>
          <li><a href="<?php echo base_url(); ?>user_published_proj" id="published_proj"><span>Samples</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/about" id="about"><span>About</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/contact" id="contact"><span>Contact</span></a></li>
          <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
          <li><?php echo form_open('search/basic_search'); ?><input name="search_text" type="text" size="20" maxlength="80" id="search_text" value="Search animal or breed..." onFocus="{value=''}" class="input-text"></li>
	  <li><input type="image" src="<?php echo base_url(); ?>css/images/search.png" alt="Search" value="Go" id="search_submit" class="input-button"></li>
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
        <li>View all projects</li>
        <ul>
            <li>Livestock [<?php echo $this->livestock->get_total_livestock(); ?>]</li>
            <ul>
                <li><?php echo anchor('view_ls_category/bovidae', 'Bovidae'); ?> [<?php echo $this->livestock->get_total_bovidae(); ?>]</li>
                <li><?php echo anchor('view_ls_category/capridae', 'Capridae'); ?> [<?php echo $this->livestock->get_total_capridae(); ?>]</li>
                <li><?php echo anchor('view_ls_category/monogastrics', 'Monogastrics'); ?> [<?php echo $this->livestock->get_total_monogastrics(); ?>]</li>
            </ul>
            <li><?php echo anchor('view_pproj', 'Poultry'); ?> [<?php echo $this->poultry->get_total_poultry(); ?>]</li>
        </ul>
    </ul>
    
    </div>
    