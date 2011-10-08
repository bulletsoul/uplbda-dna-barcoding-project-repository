<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UPLB-DA DNA Barcoding Project</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link type='text/css' href='<?php echo base_url(); ?>css/basic.css' rel='stylesheet' media='screen' />
<script type="text/javascript" src="<?php echo base_url(); ?>css/js/jquery-1.3.2.min.js"></script>
</head>
<body>
<input type="hidden" id="dna_seq" value="<?php echo $dna_seq; ?>"/>
<div id="dna_seq_area" style="width: 200% !important; word-break: loose; margin: 10px;"></div>
<script type="text/javascript">
            var dna_seq = document.getElementById('dna_seq').value;
        var dna_length = document.getElementById('dna_seq').value.length;
        
        dna_seq = dna_seq.toLowerCase();
        for(var i = 0; i < dna_length; i++ ){
              var single_seq = dna_seq.charAt(i);
              if(single_seq == "a"){
                $('#dna_seq_area').append('<img id="a_bars" alt="a" src="../../css/images/barcodes/red.jpg" />');
              }
              else if(single_seq == "c"){
                $('#dna_seq_area').append('<img id="c_bars" alt"c" src="../../css/images/barcodes/blue.jpg" />');//blue
              }
              else if(single_seq == "g"){
                $('#dna_seq_area').append('<img id="g_bars" alt="g" src="../../css/images/barcodes/black.jpg" />');//black
              }
              else if(single_seq == "t"){
                $('#dna_seq_area').append('<img id="t_bars" alt="t" src="../../css/images/barcodes/green.jpg" />');
              }
              else $('#dna_seq_area').append('<img id="dash_bars" alt="-" src="../../css/images/barcodes/white.jpg" />');//white
            }
</script>
</body>
</html>