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

            <?php echo form_open('user/do_register', array('id'=> 'form-register')); ?>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" value="" name="identity" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" value="" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div> 
            <div class="form-group">
              <label for="password">Konfirm Password</label>
              <input type="password" class="form-control" name="password_confirm" placeholder="Konfirm Password">
            </div>            
            <button type="submit" class="btn btn-success btn-form" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading...">Daftar</button>
            <?php echo form_close(); ?>
        </div>
       
        <hr>

        <div class="text-center">
          <a href="<?php echo site_url('user/loginfacebook');?>" class="btn-green-primary btn" style="background: #3b5999;" onclick="MyWindow=window.open(this.href,
            'MyWindow','width=600,height=300'); return false;"><i class="fa fa-facebook"></i> Masuk via Facebook</a>
          <a href="#" class="btn-green-primary btn" style="background: #dc4e41;"><i class="fa fa-google-plus"></i> Masuk via Google+</a>
        </div>

        <hr>
        
        <p class="text-center">
          Sudah punya Akun? <a href="<?php echo site_url('login');?>">Masuk</a>
        </p>
        
      </div>
    </div>
  </div>
</div>