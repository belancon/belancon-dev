<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="card card-user">
        <div class="image">
          <h4 class="text-center" style="color:#66ae53"><?php echo setting_lang('form_login_heading');?></h4>
          <hr>
        </div>
        <div class="content">        
          <!-- Notif Error -->
          <div class="alert alert-danger" role="alert" style="display:none">
            
          </div>
          <!-- end Notif Error -->
          <?php echo form_open("user/do_login", array('id'=> 'form-login'));?>

          <?php
          $lbl_username= setting_lang('form_login_label_username');
          $lbl_password = setting_lang('form_login_label_password');
          ?>
            <div class="form-group">
              <label for="username"><?php echo $lbl_username;?></label>
              <input type="text" class="form-control" value="" name="identity" placeholder="<?php echo $lbl_username;?>">
            </div>
            <div class="form-group">
              <label for="password"><?php echo $lbl_password;?></label>
              <input type="password" class="form-control" name="password" placeholder="<?php echo $lbl_password;?>">
            </div>
            <div class="form-group" style="margin-left: 20px;">
              <label class="checkbox">
                <input type="checkbox" value="" data-toggle="checkbox" id="remember" value="1" name="remember"> <?php echo setting_lang('form_login_checbox_remember_me');?>
              </label>
            </div>
            <button type="submit" class="btn btn-success"><?php echo setting_lang('btn_login_submit');?></button>
            <?php echo form_close();?>
        </div>
        <br />
        <?php
        $lbl_forgot_password = setting_lang('label_login_forgot_password');
        $lbl_forgot_password = explode("?", $lbl_forgot_password);
        ?>
        <p><?php echo $lbl_forgot_password[0];?>?<a href="<?php echo site_url('forgot-password');?>"><?php echo $lbl_forgot_password[1];?></a></p>
        <hr>

        <div class="text-center">
          <a href="<?php echo $this->facebook->login_url(); ?>" class="btn-green-primary btn" style="background: #3b5999;"><i class="fa fa-facebook"></i> <?php echo setting_lang('label_login_facebook');?></a>
          <a href="<?php echo $this->google->login_url(); ?>" class="btn-green-primary btn" style="background: #dc4e41;"><i class="fa fa-google-plus"></i> <?php echo setting_lang('label_login_google');?></a>
        </div>

        <hr>
        <?php
        $lbl_dont_have_account = setting_lang("label_dont_have_account");
        $lbl_dont_have_account = explode("?", $lbl_dont_have_account);
        ?>
        <p class="text-center">
          <?php echo $lbl_dont_have_account[0];?>? <a href="<?php echo site_url('register');?>"><?php echo $lbl_dont_have_account[1];?></a>
        </p>
        
      </div>
    </div>
  </div>
</div>