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
	  <?php
	    if($this->session->userdata('logged_in')) {
	  ?>
	      <li><a href="<?php echo base_url(); ?>home" id="home"><span>Home</span></a></li>
	      <li><a href="<?php echo base_url(); ?>home/about" id="about"><span>About</span></a></li>
	      <li><a href="#"><span>Contact</span></a></li>
	      <li><a href="<?php echo base_url(); ?>home/logout"><span>Logout</span></a></li>
	      <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	      <li><?php echo form_open('search/basic_search'); ?><input name="search_text" type="text" size="20" maxlength="80" id="search_text" value="Search animal or breed..." onFocus="{value=''}" class="input-text"></li>
	      <li><input type="image" src="<?php echo base_url(); ?>css/images/search.png" alt="Search" value="Go" id="search_submit" class="input-button" caption="Search"><?php echo form_close(); ?></a></li>
	  <?php
	    } else {
	  ?>    
          <li><a href="<?php echo base_url(); ?>" ><span>Home</span></a></li>
          <li><a href="<?php echo base_url(); ?>user_published_proj" class="active"><span>Samples</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/about" id="about"><span>About</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/contact" id="contact"><span>Contact</span></a></li>
	  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
          <li><?php echo form_open('search/basic_search'); ?><input name="search_text" type="text" size="20" maxlength="80" id="search_text" value="Search animal or breed..." onFocus="{value=''}" class="input-text"></li>
	  <li><input type="image" src="<?php echo base_url(); ?>css/images/search.png" alt="Search" value="Go" id="search_submit" class="input-button"><?php echo form_close(); ?></li>
	  <?php
	    }
	  ?>
	</ul>
      </div>
      <div class="clr"></div>
      <div class="clr"></div>
    </div>
  </div>
 <div class="body">
    <div class="body_resize">
  <div class="right" id="home_right">
    <h2>Search Options</h2>
	<?php echo form_open('search/advanced_search'); ?>
	<table>
            <tr>
              <td align="right"><label>Type</label></td>
              <td><input name="proj_type" type="radio" value="livestock" id="ls"/><label>Livestock</label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input name="proj_type" type="radio" value="poultry" /><label>Poultry</label></td>
            </tr>
            <tr>&nbsp;</tr>
            <tr>
              <td align="right"><label>Sex</label></td>
              <td><input name="sex" type="radio" value="female" /><label>Female</label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input name="sex" type="radio" value="male" /><label>Male</label></td>
            </tr>
            <tr>&nbsp;</tr>
            <tr>
              <td align="right"><label>Color</label></td>
              <td><input name="color" id="color"/></td>
            </tr>
	    <tr>
              <td align="right"><label>Origin</label></td>
              <td><input name="origin" id="origin"/></td>
            </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td align="right"><input type="submit" value="Search"/></td>
	    </tr>
          </table>
    </div>