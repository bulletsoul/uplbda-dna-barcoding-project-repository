<!-- Called by Controller: view_project/show_project -->
  
  <div class="body">
    <div class="user_project_view" id="user_project_view">
        <input type="hidden" id="proj_id" value="<?php echo $proj_id; ?>">
        <input type="hidden" id="complete_proj_url" value="<?php echo $complete_proj_url; ?>">
        <input type="hidden" id="curr_url" value="<?php echo $curr_url; ?>">
        <!-- PROJECT DETAILS -->
        <?php 
          if($project_details){
            foreach($project_details as $row){
        ?>
        <h2><?php
          $$complete_proj_url = $row->proj_id;
          $my_complete_proj_url = "$complete_proj_url/${$complete_proj_url}";
        echo $row->breed; ?></h2>
        <input type="hidden" id="my_complete_proj_url" value="<?php echo $my_complete_proj_url; ?>">
        <TABLE BGCOLOR="#B2D1E5" class="project_table">
        <THEAD ALIGN="center" class="table_header"><TR><TD>Project Details</TD></TR></THEAD>
        <TBODY BGCOLOR="#E9F2F9">
          <TR rowspan="6">
            <TD>
              <label>Breed code: </label><?php echo $row->breed_code; ?><BR/>
              <label>Farm animal: </label><?php echo $row->farm_animal; ?><BR/>
              <label>Farm animal code:</label> <?php echo $row->fa_code; ?><BR/>
            <?php }
              $proj_categ = $row->proj_category;
              if($proj_categ == "livestock") {
                foreach($ls_details as $row){
            ?>
                  <label>Category: </label>Livestock - <?php echo $row->ls_category; ?><BR/>
            <?php }}
              if($proj_categ == "poultry") {
            ?>
                <label>Category: </label>Poultry<BR/>
            <?php }
              foreach($project_details as $row){
            ?>
              <label>Project description:</label> <?php echo $row->proj_desc; ?>
            </TD>
          </TR>
        <?php }} ?>
        </TBODY>
        </TABLE><br/>
   
        <!-- STATISTICS -->
        <?php
          $tab1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          $tab2 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          if ($project_details){
            foreach ($project_details as $prow){
              $proj_categ = $prow->proj_category;
              if($proj_categ == "livestock"){
         ?>
        <TABLE BGCOLOR="#B2D1E5" class="project_table">
          <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2">Statistics</TD></TR></THEAD>
          <TBODY BGCOLOR="#E9F2F9" >
            <TR rowspan="6">
              <TD>
                <label>Height: <br/>
                <label>Weight: <br/>
                <label>Heart girth: <br/>
                <label>Midriff girth: <br/>
                <label>Flank girth: <br/>
                <label>Female maximum weight: <br/>
              </TD>
              <TD>
                <label>Leg length: <br/>
                <label>Body length: <br/>
                <label>Snout length: <br/>
                <label>Ear length: <br/>
                <label>Tail length: <br/>
                <label>Male maximum weight: <br/>
              </TD>
            </TR>
            <tr>
              <td colspan="2" align="center"><a href="javascript:signup();" id="basic_modal" class="basic" name="basic">Register or sign in to view complete details.</a></td>
            </tr>
          </TBODY>
        </TABLE><br/>
   
        <?php
          } else {
        ?>
        <TABLE BGCOLOR="#B2D1E5" class="project_table">
          <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2">Statistics</TD></TR></THEAD>
          <TBODY BGCOLOR="#E9F2F9">
            <TR rowspan="6">
              <TD>
                <label>Wing length:<br/>
                <label>Neck length:<br/>
                <label>Beak length: <br/>
                <label>Breast length: <br/>
                <label>Shank length: <br/>
              </TD>
              <td>
                <label>Comb type: <br/>
                <label>Earlobe color: <br/>
                <label>Eye color:<br/>
                <label>Shank color: <br/>
                <label>Bill/Beak color: <br/>
              </TD>
            </TR>
            <tr>
              <td colspan="2" align="center"><a href="javascript:signup();" class="basic" name="basic">Register or sign in to view complete details.</a></td>
            </tr>
          </TBODY>
          <?php }}} ?>
        </TABLE><br/>
   
        <!-- SPECIMEN DATA -->
        <?php 
          if($project_details){
            foreach($project_details as $row){
        ?>
        <TABLE BGCOLOR="#B2D1E5" class="project_table">
        <THEAD ALIGN="center" class="table_header"><TR><TD>Specimen Data</TD></TR></THEAD>
        <TBODY BGCOLOR="#E9F2F9">
        <TR rowspan="7">
          <TD>
            <label>Sex: </label><?php if ($row->sex == "M") echo "Male"; else echo "Female"; ?><br/>
            <label>Sample type:</label> <?php echo $row->sample_type; ?><br/>
            <label>Sampling Date: </label><?php echo $row->sampling_date; ?><br/>
            <label>Origin: </label><?php echo $row->origin; ?><br/>
            <label>Owner:</label> <?php echo $row->owner; ?>
        </TD>
        </TR>
        <?php }} ?>
        </TBODY>
       </TABLE><br/>
        
    <!-- Images -->
      <table class="project_table" BGCOLOR="#B2D1E5">
        <THEAD ALIGN="center" class="table_header"><TR><TD colspan="2">Images</TD></TR>
          </THEAD>
          <tbody BGCOLOR="#E9F2F9">
          <tr></tr>
          <tr>
            <td>
              <div id="img_area">
              <input type="hidden">                
              <?php
              if ($dimgpath){
              foreach($dimgpath as $row){
                $new_path1 = substr($row->filepath, 8);
                $new_path2 = substr($new_path1, 0, -3);
                $new_path3 = $new_path2.'png';
               $im = imagecreatefromjpeg($new_path1);
                if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
                {
                    imagejpeg($im, $new_path3);
                }
                else
                {
                    echo '';
                }
                imagedestroy($im);
                ?>
                <a href="javascript:signup();" class="basic" name="basic" alt="img" title="<?php echo $new_path3;  ?>"/>
                <img src="<?php echo "/uplbda/".$new_path3;  ?>" width="50px" height="50px" /></a>
              <?php
               } } 
              else {
                echo "Image not available.";
                }?>
                <?php
                
                ?>
              </div>
            </td>
            </tr>
          </tbody>
        </table>
      <br/>
        
    </div>
  </div>
  
  
  <div class="hidden">
    <div id="basic-modal-content" class="simplemodal-data" style="display: block; ">
    <table id="signup">
         <tr><td colspan="2"><label id="error_username"></label></td></tr>
		<tr>
			<td><label for="username">Username:</label></td>
			<td><input type="text" size="20" id="username" name="username" /><span id="usr_verify" class="verify"></span></td>
		</tr>
                <tr><td colspan="2"><?php echo form_error('email'); ?></td></tr>
		<tr>
			<td><label for="email">Email address:</label></td>
			<td><input type="text" size="20" id="email" name="email"/><span id="email_verify" class="verify"></span></td>
		</tr>
                <tr><td colspan="2"><?php echo form_error('password'); ?></td></tr>
		<tr>
			<td><label for="password">Password:</label></td>
			<td><input type="password" size="20" id="password" name="password"/><span id="password_verify" class="verify"></span></td>
		</tr>
                <tr><td colspan="2"><?php echo form_error('passconf'); ?></td></tr>
		<tr>
			<td><label for="passconf">Retype password:</label></td>
			<td><input type="password" size="20" id="passconf" name="passconf"/><span id="passconf_verify" class="verify"></span></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="right"><br/><a href="javascript:reg_user(username.value, email.value, password.value);"><button id="signup_button">Register</button></a></td>
                </tr>
    </table>
    <br/>
    
  </div>
  <div style='display:none'>
			<img src='<?php echo base_url(); ?>css/images/x.png' alt='' />
		</div>
  </div>
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='<?php echo base_url(); ?>css/js/jquery.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>css/js/jquery.simplemodal.js'></script>
<script type='text/javascript'>
  $.ajaxSetup ({  
            cache: false  
        });
	
    function signup(){
      $("#signup").modal({
        overlayClose:true,
        opacity:50,
        overlayCss: {backgroundColor:"black"}
      });
      
      
      $('#username').keyup(function() {
        
          if($("#username").val().length >= 5 && $("#username").val().length <= 12)
          {
            $.ajax({
              type: "GET",
              url: "<?php echo site_url('signup/check_user'); ?>",
              data: ({username:username.value}),
              success: function(msg){
                if(msg=="available")
                {
                    $("#usr_verify").css({ "background-image": "url('<?php echo base_url();?>css/images/yes.png')" });
                    $('#error_username').html("Username is available.").css('color','yellow');
                }
                else
		{
                    $("#usr_verify").css({ "background-image": "url('<?php echo base_url();?>css/images/no.png')" });
                    $("#error_username").html("Username already existing.").css('color','yellow');
                }
              },
              error: function(){
                alert('error');
                }
              });
          }
      }); //end of keyup  
      
      
      $("#email").keyup(function(){
        var email = $("#email").val();
        if(email != 0){
        if(isValidEmailAddress($("#email").val()))
          {
            $("#email_verify").css({"background-image": "url('<?php echo base_url();?>css/images/yes.png')"});
          }
          else
          {
            $("#email_verify").css({"background-image": "url('<?php echo base_url();?>css/images/no.png')"});
          }
          }
          else $("#email_verify").css({ "background-image": "none" });
        });
      
      $("#password").keyup(function(){
        if($("#passconf").val().length >= 5)
        {
            if($("#passconf").val()!=$("#password").val())
            {
                $("#passconf_verify").css({ "background-image": "url('<?php echo base_url();?>css/images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>css/images/no.png')" });
            }
            else{
                $("#passconf_verify").css({ "background-image": "url('<?php echo base_url();?>css/images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>css/images/yes.png')" });
            }
        }
    });
    
    $("#passconf").keyup(function(){
        if($("#password").val().length >= 5)
        {
            if($("#passconf").val()!=$("#password").val())
            {
                $("#passconf_verify").css({ "background-image": "url('<?php echo base_url();?>css/images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>css/images/no.png')" });
            }
            else{
                $("#passconf_verify").css({ "background-image": "url('<?php echo base_url();?>css/images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>css/images/yes.png')" });
            }
        }
    });
  }
  
  function reg_user(username, email, password)
  {
    if ($('#error_username').html() == "Username is available."){
      $.ajax({
        type: "GET",
        data: ({username:username, email:email, password:password}),
        url: "<?php echo site_url('signup/register_user'); ?>",
        success: function(){
          window.location = my_complete_proj_url.value;
        },
        error: function(){
          alert('Error.');
        }
      });
    } else {
      alert('Username already existing.');
      window.location = curr_url.value;
    }
  }
    
 function isValidEmailAddress(emailAddress) {
  var pattern = new RegExp(/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i);
  return pattern.test(emailAddress);
 }
</script>