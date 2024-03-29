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
			              fileExt = "*.jpg;*.jpeg*;*.png;*.JPG;*.JPEG;*.PNG";
				      ftype = "Dorsal";
				      fileDesc = "Image File";
				      folder = "/uplbda/application/uploads/images/dorsal";
				}
				else if ("<?php echo $type; ?>" == "Ventral Images")
				{
			              fileExt = "*.jpg;*.jpeg*;*.png;*.JPG;*.JPEG;*.PNG";
				      ftype = "Ventral";
				      fileDesc = "Image File";
				      folder = "/uplbda/application/uploads/images/ventral";
				}
				else if ("<?php echo $type; ?>" == "Lateral Images")
				{
			              fileExt = "*.jpg;*.jpeg*;*.png;*.JPG;*.JPEG;*.PNG";
				      ftype = "Lateral";
				      fileDesc = "Image File";
				      folder = "/uplbda/application/uploads/images/lateral";
				}
				else if ("<?php echo $type; ?>" == "Other Images")
				{
			              fileExt = "*.jpg;*.jpeg*;*.png;*.JPG;*.JPEG;*.PNG";
				      ftype = "Other";
				      fileDesc = "Image File";
				      folder = "/uplbda/application/uploads/images/other";
				}
				else if ("<?php echo $type; ?>" == "Documents")
				{
			              fileExt = "*.doc;*.docx;*.pdf";
				      ftype = "Document";
				      fileDesc = "Document File";
				      folder = "/uplbda/application/uploads/docs";
				}
				else if ("<?php echo $type; ?>" == "Videos")
				{
			              fileExt = "*.flv;*.mpg;*.mp4;*.avi;*.mov;*.FLV;*.MPG;*.MP4;*.AVI;*.MOV";
				      ftype = "Video";
				      fileDesc = "Video File";
				      folder = "/uplbda/application/uploads/videos";				      
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
									$.post("/uplbda/application/uploadify/insert.php", { name: fileObj.name, path: fileObj.filePath, proj_id: $('#proj_id').val(), filetype: filetype }, function(info) {
										});
						        },
							'onAllComplete' : function(event,data){
									var filetype = ftype;
									if(ftype == "Document")
									{
									    window.location = set_doc_filedesc_url.value;
									}
									if(ftype == "Video")
									{
									    window.location = set_vid_filedesc_url.value;
									}
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
                    $set_doc_filedesc_url = "$nw_url8/${$nw_url8}";
	
                    $$nw_url9 = $proj_id;
                    $set_vid_filedesc_url = "$nw_url9/${$nw_url9}";
	
                    $$nw_url = $proj_id;
                    $proj_url = "$nw_url/${$nw_url}";
		    
		    if($type == "Ventral Images" || $type == "Dorsal Images" || $type == "Lateral Images" || $type == "Other Images")
		    {
			?>
			<i>Note: Images to be uploaded should be at most 1MB.</i><br/><br/>
			<?php
		    }
		    if($type == "Videos")
		    {
			?>
			<i>Note: Maximum file size of videos to be uploaded is 250MB.</i><br/>
			<i>The speed may vary depending on the speed of your internet connection.</i><br/><br/>
			<?php
		    }
		    ?>
	 <input type="hidden" id="set_doc_filedesc_url" value="<?php echo $set_doc_filedesc_url; ?>"/>
	 <input type="hidden" id="set_vid_filedesc_url" value="<?php echo $set_vid_filedesc_url; ?>"/>
	
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