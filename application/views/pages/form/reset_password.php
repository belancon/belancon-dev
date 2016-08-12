<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="card card-user">
        <div class="image">
          <h4 class="text-center" style="color:#66ae53">RESET PASSWORD</h4>
          <hr>
        </div>
        <div class="content">        
          <!-- Notif Error -->
          <div class="alert alert-danger" role="alert" style="display:none">
            
          </div>
          <!-- end Notif Error -->
          <?php echo form_open("user/do_reset_password", array('id'=> 'form-reset-password'));?>
            <input type="hidden" name="code" value="<?php echo $code; ?>" />
            <div class="form-group">
              <label for="username">Password baru</label>
              <input type="password" class="form-control" value="" name="new" />
            </div>
            <div class="form-group">
              <label for="username">Konfirmasi Password baru</label>
              <input type="password" class="form-control" value="" name="new_confirm" />
            </div>
           
            <button type="submit" class="btn btn-success">Kirim</button>
            <?php echo form_close();?>
        </div>
        <br />
      
        
      </div>
    </div>
  </div>
</div>