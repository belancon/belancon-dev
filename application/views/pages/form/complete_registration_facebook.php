<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="card card-user">
        <div class="image">
          <h4 class="text-center" style="color:#66ae53">COMPLETE REGISTRATION</h4>
          <hr>
        </div>
        <div class="content">        
          <!-- Notif Error -->
          <div class="alert alert-danger" role="alert" style="display:none">
            
          </div>

          <p>Silahkan masukkan alamat email anda untuk melengkapi proses registrasi</p>
          <!-- end Notif Error -->
          <?php echo form_open("user/complete_registration_facebook", array('id'=> 'form-complete-registration-fb'));?>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" value="" name="email" placeholder="Email">
            </div>
            
          
            <button type="submit" class="btn btn-success">Submit</button>
            <?php echo form_close();?>
        </div>
   
      </div>
    </div>
  </div>
</div>