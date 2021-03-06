<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="card card-user">
        <div class="image">
          <h4 class="text-center" style="color:#66ae53"><?php echo setting_lang('form_forgotpassword_heading');?></h4>
          <hr>
        </div>
        <div class="content">        
          <!-- Notif Error -->
          <div class="alert alert-danger" role="alert" style="display:none">
            
          </div>
          <!-- end Notif Error -->
          <?php
          $lbl_username= setting_lang('form_login_label_username');       
          ?>

          <?php echo form_open("user/do_forgot_password", array('id'=> 'form-forgot-password'));?>
            <div class="form-group">
              <label for="username"><?php echo $lbl_username;?></label>
              <input type="text" class="form-control" value="" name="username" placeholder="<?php echo $lbl_username;?>">
            </div>
           
            <button type="submit" class="btn btn-success"><?php echo setting_lang('btn_forgotpassword_submit');?></button>
            <?php echo form_close();?>
        </div>
        <br />
       <p class="text-danger">* <?php echo setting_lang('label_note_forgotpassword');?></p>
        
      </div>
    </div>
  </div>
</div>