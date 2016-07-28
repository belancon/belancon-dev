<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="card card-user">
        <div class="image">
          <a href="<?php echo site_url();?>"><h4 class="text-center" style="color:#66ae53">BELANCON</h4></a>
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
            <div class="form-group">
              <label class="checkbox">
                <input type="checkbox" value="" data-toggle="checkbox" id="remember" value="1" name="remember"> remember me
              </label>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
          <?php echo form_close();?>
        </div>
       
        <hr>
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#form-login").submit(function(event){
        event.preventDefault();    
        //hide notif error
        hideNotifError();

        var formData = new FormData($(this)[0]);
        $.ajax({
          url:$(this).attr("action"),
          type: 'POST',
          dataType: 'json',
          data: formData,
          async: false,
          success: function (data) {
              if(data.status === true) {
                location.reload();
              } else {
                showNotifError(data.message);
                console.log(data);
              }
          },
          cache: false,
          contentType: false,
          processData: false
        });
        return false;
    });

    var showNotifError = function(message) {
      $('.alert-danger').html('');      
      $(".alert-danger").html(message);
      $(".alert-danger").slideDown();
    }

    var hideNotifError = function() {
      $('.alert-danger').hide();
    }
});
</script>