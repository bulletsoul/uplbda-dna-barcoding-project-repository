<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Specimen Images</title>
<?php echo $css; ?>
<?php echo $src; ?>
<script type="text/javascript" language="javascript">
			$(document).ready(function()
			{			
				var fileExt = "";
				var fileDesc = "";
				var folder = "";
				var ftype = "";
				var proj_id = $('#proj_id').val();
				var script = "<?php echo base_url(); ?>application/uploadify/uploadify.php";
				if ("<?php echo $type; ?>" == "Dorsal Images")
				{
			              fileExt = "*.jpg;*.bmp;*.jpeg*;*.gif;*.png";
				      ftype = "Dorsal";
				      fileDesc = "Image File";
				      folder = "<?php echo base_url(); ?>application/uploads/images/dorsal";
				}
				else if ("<?php echo $type; ?>" == "Ventral Images")
				{
			              fileExt = "*.jpg;*.bmp;*.jpeg*;*.gif;*.png";
				      ftype = "Ventral";
				      fileDesc = "Image File";
				      folder = "<?php echo base_url(); ?>application/uploads/images/ventral";
				}
				else if ("<?php echo $type; ?>" == "Lateral Images")
				{
			              fileExt = "*.jpg;*.bmp;*.jpeg*;*.gif;*.png";
				      ftype = "Lateral";
				      fileDesc = "Image File";
				      folder = "<?php echo base_url(); ?>application/uploads/images/lateral";
				}
				else if ("<?php echo $type; ?>" == "Other Images")
				{
			              fileExt = "*.jpg;*.bmp;*.jpeg*;*.gif;*.png";
				      ftype = "Other";
				      fileDesc = "Image File";
				      folder = "<?php echo base_url(); ?>application/uploads/images/other";
				}
				else if ("<?php echo $type; ?>" == "Documents")
				{
			              fileExt = "*.doc;*.docx;*.pdf";
				      ftype = "Document";
				      fileDesc = "Document File";
				      folder = "<?php echo base_url(); ?>application/uploads/docs";
				}
				else if ("<?php echo $type; ?>" == "Videos")
				{
			              fileExt = "*.flv;*.mpg;*.mp4;*.avi;*.wmv";
				      ftype = "Video";
				      fileDesc = "Video File";
				      folder = "<?php echo base_url(); ?>application/uploads/videos";				      
				}
				
				$("#uploadifyit").uploadify({
							uploader: '<?php echo base_url(); ?>application/uploadify/uploadify.swf',
							script: '<?php echo base_url(); ?>application/uploadify/uploadify.php',
							cancelImg: '<?php echo base_url(); ?>application/uploadify/cancel.png',
							folder: folder,
							fileExt: fileExt,
							fileDesc: fileDesc,
							scriptAccess: 'always',
							scriptData: {'proj_id': proj_id},
							multi: true,
							auto: false,
							'onError' : function(a, b, c, d){
								if(d.status=404)
									alert('Could not find upload script');
								else if(d.type === "HTTP")
									alert('error'+d.type+": "+d.info);
								else if(d.type === "File Size")
									alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'MB');
								else
									alert('error'+d.type+": "+d.text);
							},
							'onComplete' : function(event, queueID, fileObj, response, data){
									var filetype = ftype;								
									$.post("<?php echo base_url(); ?>application/uploadify/insert.php", { name: fileObj.name, path: fileObj.filePath, proj_id: $('#proj_id').val(), filetype: filetype }, function(info) { 
										});
																		
						        },
							'onAllComplete' : function(event,data){
									window.location = set_filedesc_url.value;
							}
					
					
					
				});
			});
	
</script>

</head>
<body>
  <div class="body">
    <div class="body_resize">
             <div class="left">
			
   
    
             <input type="hidden" id="proj_id" value="<?php echo $proj_id; ?>"/>
               <h2>Upload Specimen <?php echo $type; ?></h2>
	<?php
			$$nw_url8 = $proj_id;
                    $set_filedesc_url = "$nw_url8/${$nw_url8}";
	
                    $$nw_url = $proj_id;
                    $proj_url = "$nw_url/${$nw_url}";?>
	 <input type="hidden" id="set_filedesc_url" value="<?php echo $set_filedesc_url; ?>"/>
	<?php echo form_open_multipart('upload/index');
	?>
			<label for="Filedata">Choose files</label><br/>
			<?php echo form_upload(array('name'=>'Filedata','id'=>'uploadifyit')); ?><br/>
			<a href="javascript:$('#uploadifyit').uploadifyUpload();">Upload File(s)</a>
	<?php form_close(); ?>
	
	</div>
      </div>
    </div>
	<div id="fileinfotarget">
	</div>
	
	
</body>
</html>