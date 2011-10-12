<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Descriptions</title>
</head>
<body>
    <input type="hidden" id="proj_id" value="<?php echo $proj_id; ?>"/>
    <input type="hidden" id="nw_url10" value="<?php echo $nw_url10; ?>"/>

    <?php
    $proj_desc_url = $nw_url10;
    $$proj_desc_url = $proj_id;
                $proj_url = "$proj_desc_url/${$proj_desc_url}"; ?>
    <?php echo form_open($proj_url); ?>
    <table class="project_table" BGCOLOR="#B2D1E5">
        <THEAD ALIGN="center" class="table_header"><TR><TD>File(s)</TD><TD>Description</TD></TR>
          </THEAD>
          <tbody BGCOLOR="#E9F2F9">
          <?php
          if($type == "Documents"){?>
            <input type="hidden" id="filetype" name="filetype" value="<?php echo $type?>"/>
            
            <?php
            $ftype = "Documents";
              if ($docname != NULL){
                $ctr = 0;
                  foreach($docname as $row){ $ctr++;
                  $str[$ctr] = "filedesc".$ctr;
                  
                  ?>
          <tr>
            <td>
                <?php echo $row->filename; ?>
            </td>
            <td>
                <textarea name="<?php echo $str[$ctr]; ?>" id="<?php echo $str[$ctr]; ?>" rows="2" cols="50" /></textarea>
            </td>
          </tr>
          <?php } }  $total = $ctr; ?>  <input type="hidden" id="total" name="total" value="<?php echo $total; ?>"/>
            <?php }
          else if($type == "Videos"){?>
            <input type="hidden" id="filetype" name="filetype" value="<?php echo $type?>"/>
            
            <?php
            $ftype = "Videos";
              if ($vidname !=NULL){
                $ctr = 0;
                foreach($vidname as $row){ $ctr++;
                $str[$ctr] = "filedesc".$ctr;
                ?>
            <tr>
            <td>
                <?php echo $row->filename; ?>
            </td>
            <td>
                <textarea name="<?php echo $str[$ctr]; ?>" id="<?php echo $str[$ctr]; ?>" rows="2" cols="50" /></textarea>
            </td>
          </tr>
            <?php }} $total = $ctr; ?>  <input type="hidden" id="total" name="total" value="<?php echo $total; ?>"/>
            <?php
            }
              else
              {
                echo "All files have descriptions."; 
              }
              ?>
              <tr><td colspan="2" align="center"><input type="submit"></td></tr>
          </tbody>
        </table>
      <br/>
    
</body>
</html>