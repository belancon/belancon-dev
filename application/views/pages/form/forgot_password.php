<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="card card-user">
        <div class="image">
          <h4 class="text-center" style="color:#66ae53">LUPA PASSWORD</h4>
          <hr>
        </div>
        <div class="content">        
          <!-- Notif Error -->
          <div class="alert alert-danger" role="alert" style="display:none">
            
          </div>
          <!-- end Notif Error -->
          <?php echo form_open("user/do_forgot_password", array('id'=> 'form-forgot-password'));?>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" value="" name="username" placeholder="Username">
            </div>
           
            <button type="submit" class="btn btn-success">Kirim</button>
            <?php echo form_close();?>
        </div>
        <br />
       <p class="text-danger">* Pastikan username yang anda masukkan benar dan telah terdaftar di Belancon</p>
        
      </div>
    </div>
  </div>
</div>