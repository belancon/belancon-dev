<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="card card-user">
        <div class="image">
          <h4 class="text-center" style="color:#66ae53">AUTHOR BELANCON</h4>
          <hr>
        </div>
        <div class="content">        
          <!-- Notif Error -->
          <div class="alert alert-danger" role="alert" style="display:none">
            
          </div>
          <!-- end Notif Error -->
          <?php echo form_open("user/do_login", array('id'=> 'form-login'));?>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" value="" name="identity" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group" style="margin-left: 20px;">
              <label class="checkbox">
                <input type="checkbox" value="" data-toggle="checkbox" id="remember" value="1" name="remember"> Remember me
              </label>
            </div>
            <button type="submit" class="btn btn-success">Masuk</button>
            <?php echo form_close();?>
        </div>
        <br />
        <p>Lupa Password? <a href="<?php echo site_url('forgot-password');?>">Reset password Anda</a></p>
        <hr>

        <div class="text-center">
          <a href="<?php echo $this->facebook->login_url(); ?>" class="btn-green-primary btn" style="background: #3b5999;"><i class="fa fa-facebook"></i> Masuk via Facebook</a>
          <a href="<?php echo $this->google->login_url(); ?>" class="btn-green-primary btn" style="background: #dc4e41;"><i class="fa fa-google-plus"></i> Masuk via Google+</a>
        </div>

        <hr>

        <p class="text-center">
          Belum punya Akun? <a href="<?php echo site_url('register');?>">Daftar Gratis</a>
        </p>
        
      </div>
    </div>
  </div>
</div>