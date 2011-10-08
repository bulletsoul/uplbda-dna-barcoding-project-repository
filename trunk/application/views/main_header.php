<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UPLB-DA DNA Barcoding Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#slideshow').cycle({
        fx:     'fade',
        speed:  'slow',
        timeout: 7000,
        pager:  '#slider_nav',
        pagerAnchorBuilder: function(idx, slide) {
            // return sel string for existing anchor
            return '#slider_nav li:eq(' + (idx) + ') a';
        }
    }); 
});
 
</script>
</head>
<body>
<div class="main">
  <div class="header_resize">
    <div class="header">
      <div class="logo">UPLB-DA DNA <div class="logo1">Barcoding Project</div></div>
      <div class="menu">
        <ul>
          <li><a href="#" class="active" id="home"><span>Home</span></a></li>
          <li><a href="<?php echo base_url(); ?>user_published_proj" id="published_proj"><span>Samples</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/about" id="about"><span>About</span></a></li>
          <li><a href="<?php echo base_url(); ?>home/contact" id="contact"><span>Contact</span></a></li>
	  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	  <li><?php echo form_open('search'); ?><input name="search_text" type="text" size="20" maxlength="80" id="search_text" value="Search animal or breed..." onFocus="{value=''}" class="input-text"></li>
	  <li><input type="image" src="<?php echo base_url(); ?>css/images/search.png" alt="Search" value="Go" id="search_submit" class="input-button"><?php echo form_close(); ?></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="header_blog">
    <div id="slider">
      <!-- start slideshow -->
      <div id="slideshow">
        <div class="slider-item"><a href="#"><img src="<?php echo base_url(); ?>css/images/simple_img_1.jpg" alt="icon" width="960" height="341" border="0" /></a></div>
        <div class="slider-item"><a href="#"><img src="<?php echo base_url(); ?>css/images/capridae.png" alt="icon" width="960" height="341" border="0" /></a></div>
        <div class="slider-item"><a href="#"><img src="<?php echo base_url(); ?>css/images/bovidae.png" alt="icon" width="960" height="341" border="0" /></a></div>
        <div class="slider-item"><a href="#"><img src="<?php echo base_url(); ?>css/images/monogastrics.png" alt="icon" width="960" height="341" border="0" /></a></div>
        <div class="slider-item"><a href="#"><img src="<?php echo base_url(); ?>css/images/poultry.png" alt="icon" width="960" height="341" border="0" /></a></div>
      </div>
      <!-- end #slideshow -->
      <div class="controls-center">
        <div id="slider_controls">
          <ul id="slider_nav">
            <li><a href="#"></a></li>
            <!-- Slide 1 -->
            <li><a href="#"></a></li>
            <!-- Slide 2 -->
            <li><a href="#"></a></li>
            <!-- Slide 3 -->
            <li><a href="#"></a></li>
            <!-- Slide 4 -->
            <li><a href="#"></a></li>
            <!-- Slide 5 -->
          </ul>
        </div>
      </div>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>