
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
            
      if (dna_seq == '')
      {
        $('#dna_seq_text').html("DNA Sequence not yet available.");
        $('#dna_seq_area').html("Illustrative DNA Barcode not yet available.")
      }
      
      else {
        dna_seq = dna_seq.toUpperCase();
        $('#dna_seq_text').html(dna_seq);
      }
      
      $('#A').colorPicker();
      $('#C').colorPicker();
      $('#T').colorPicker();
      $('#G').colorPicker();
      $('#dash').colorPicker();
      
      $('#A').change(function(){
        change_color('#A');
      });
      
      $('#C').change(function(){
       change_color('#C');
      });
      
      $('#T').change(function(){
        change_color('#T');
      });
      
      $('#G').change(function(){
        change_color('#G');
      });
      
      $('#dash').change(function(){
        change_color('#dash');
      });
      
       change_color = function(element){
        var element_name = $(element).attr('id').toLowerCase();
        var color_val = $(element).val();
        if (color_val == "#000000") $('<img src="../../css/images/barcodes/black.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#993300") $('<img src="../../css/images/barcodes/993300.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#333300") $('<img src="../../css/images/barcodes/333300.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#000080") $('<img src="../../css/images/barcodes/000080.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#333399") $('<img src="../../css/images/barcodes/333399.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#333333") $('<img src="../../css/images/barcodes/333333.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        
        if (color_val == "#800000") $('<img src="../../css/images/barcodes/800000.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#ff6600") $('<img src="../../css/images/barcodes/ff6600.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#808000") $('<img src="../../css/images/barcodes/808000.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#008000") $('<img src="../../css/images/barcodes/008000.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#008080") $('<img src="../../css/images/barcodes/008080.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#0000ff") $('<img src="../../css/images/barcodes/0000ff.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        
        if (color_val == "#666699") $('<img src="../../css/images/barcodes/666699.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#808080") $('<img src="../../css/images/barcodes/808080.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#ff0000") $('<img src="../../css/images/barcodes/ff0000.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#ff9900") $('<img src="../../css/images/barcodes/ff9900.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#99cc00") $('<img src="../../css/images/barcodes/99cc00.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#339966") $('<img src="../../css/images/barcodes/339966.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        <!-->
        if (color_val == "#33cccc") $('<img src="../../css/images/barcodes/33cccc.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#3366ff") $('<img src="../../css/images/barcodes/3366ff.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#800080") $('<img src="../../css/images/barcodes/800080.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#999999") $('<img src="../../css/images/barcodes/999999.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#ff00ff") $('<img src="../../css/images/barcodes/ff00ff.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#ffcc00") $('<img src="../../css/images/barcodes/ffcc00.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        
        if (color_val == "#ffff00") $('<img src="../../css/images/barcodes/ffff00.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#00ff00") $('<img src="../../css/images/barcodes/00ff00.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#00ffff") $('<img src="../../css/images/barcodes/00ffff.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#00ccff") $('<img src="../../css/images/barcodes/00ccff.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#993366") $('<img src="../../css/images/barcodes/993366.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#c0c0c0") $('<img src="../../css/images/barcodes/c0c0c0.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        
        if (color_val == "#ff99cc") $('<img src="../../css/images/barcodes/ff99cc.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#ffcc99") $('<img src="../../css/images/barcodes/ffcc99.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#ffff99") $('<img src="../../css/images/barcodes/ffff99.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#ccffff") $('<img src="../../css/images/barcodes/ccffff.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#99ccff") $('<img src="../../css/images/barcodes/99ccff.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
        if (color_val == "#ffffff") $('<img src="../../css/images/barcodes/white.jpg" />').replaceAll('#dna_seq_area #'+element_name+'_bars').attr('id',element_name+"_bars");
       }
    