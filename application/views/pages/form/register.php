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

            <?php
            $lbl_username= setting_lang('form_login_label_username');
            $lbl_password = setting_lang('form_login_label_password');
            $lbl_email = setting_lang('form_login_label_email');
            $lbl_confirm_password = setting_lang('form_login_label_confirm_password');
            ?>
            <?php echo form_open('user/do_register', array('id'=> 'form-register')); ?>
            <div class="form-group">
              <label for="username"><?php echo $lbl_username;?></label>
              <input type="text" class="form-control" value="" name="identity" placeholder="<?php echo $lbl_username;?>">
            </div>
            <div class="form-group">
              <label for="email"><?php echo $lbl_email;?></label>
              <input type="email" class="form-control" value="" name="email" placeholder="<?php echo $lbl_email;?>">
            </div>
            <div class="form-group">
              <label for="password"><?php echo $lbl_password;?></label>
              <input type="password" class="form-control" name="password" placeholder="<?php echo $lbl_password;?>">
            </div> 
            <div class="form-group">
              <label for="password"><?php echo $lbl_confirm_password;?></label>
              <input type="password" class="form-control" name="password_confirm" placeholder="<?php echo $lbl_confirm_password;?>">
            </div>            
            <button type="submit" class="btn btn-success btn-form" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading...">Daftar</button>
            <?php echo form_close(); ?>
        </div>
       
        <hr>

        <div class="text-center">
          <a href="<?php echo $this->facebook->login_url(); ?>" class="btn-green-primary btn" style="background: #3b5999;"><i class="fa fa-facebook"></i> <?php echo setting_lang('label_login_facebook');?></a>
          <a href="<?php echo $this->google->login_url(); ?>" class="btn-green-primary btn" style="background: #dc4e41;"><i class="fa fa-google-plus"></i> <?php echo setting_lang('label_login_google');?></a>
        </div>

        <hr>
        <?php
        $lbl_have_account = setting_lang("label_have_account");
        $lbl_have_account = explode("?", $lbl_have_account);
        ?>
        <p class="text-center">
          <?php echo $lbl_have_account[0];?>? <a href="<?php echo site_url('login');?>"><?php echo $lbl_have_account[1];?></a>
        </p>
        
      </div>
    </div>
  </div>
</div>