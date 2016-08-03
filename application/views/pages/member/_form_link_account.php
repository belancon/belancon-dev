<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">

		<h2>Setting Link Akun</h2>
		<hr>
		<!-- Notif Error -->
        <div class="alert alert-danger" role="alert" style="display:none">
        </div>
        <!-- end Notif Error -->
		<?php echo form_open('member/save_link_account', array('id'=> 'form-setting-link-account')); ?>
		<div class="form-group">
			<label>Facebook</label>
			<input type="text" name="facebook" class="form-control" value="<?php echo user_socmed('facebook', 'url');?>" />
		</div>
    <div class="form-group">
      <label>Twitter</label>
      <input type="text" name="twiter" class="form-control" value="<?php echo user_socmed('twiter', 'url');?>" />
    </div>
    <div class="form-group">
      <label>Google Plus</label>
      <input type="text" name="googleplus" class="form-control" value="<?php echo user_socmed('google-plus', 'url');?>" />
    </div>
    <div class="form-group">
      <label>Behance</label>
      <input type="text" name="behance" class="form-control" value="<?php echo user_socmed('behance', 'url');?>" />
    </div>
    <div class="form-group">
      <label>Dribble</label>
      <input type="text" name="dribble" class="form-control" value="<?php echo user_socmed('dribble', 'url');?>" />
    </div>
    <div class="form-group">
      <label>Youtube</label>
      <input type="text" name="youtube" class="form-control" value="<?php echo user_socmed('youtube', 'url');?>" />
    </div>
    <div class="form-group">
      <label>Web</label>
      <input type="text" name="web" class="form-control" value="<?php echo user_socmed('web', 'url');?>" />
    </div>
		<div class="form-group">		
		<button class="btn btn-success btn-form" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading...">Submit</button>
		<a href="<?php echo site_url('member/profile');?>" class="btn btn-default" type="submit">Kembali ke Profil</a>
		<?php echo form_close(); ?>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $('#form-setting-link-account').validate({
    rules: {
      facebook: {
        url:true
      },
      twiter: {
        url:true
      },
      googleplus: {
        url:true
      },
      behance: {
        url:true
      },
      dribble: {
        url:true
      },
      youtube: {
        url:true
      },
      web: {
        url:true
      },
    },
    messages: {
      facebook: {
        url: 'Facebook harus berupa valid url'
      },
      twiter: {
        url: 'Twitter harus berupa valid url'
      },
      googleplus: {
        url: 'Google Plus harus berupa valid url'
      },
      behance: {
        url: 'Behance harus berupa valid url'
      },
      dribble: {
        url: 'Dribble harus berupa valid url'
      },
      youtube: {
        url: 'Youtube harus berupa valid url'
      },
      web: {
        url: 'Web harus berupa valid url'
      },
    },
    highlight: function(element) {
      $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
      $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
      if (element.parent('.input-group').length) {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    },
    submitHandler: function(form) {
      var formData = new FormData($(form)[0]);

      $.ajax({
        url: $(form).attr("action"),
        type: 'POST',
        dataType: 'json',
        data: formData,
        async: false,
        success: function(data) {
          if (data.status === true) {
            location.reload();
          } else {
            //console.log(data);
            showNotifError(data.message);
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    }
  });

    var showNotifError = function(message) {
      $('.alert-danger').html('');      
      $(".alert-danger").html(message);
      $(".alert-danger").slideDown();
    }

    var hideNotifError = function() {
      $('.alert-danger').hide();
    }

    $("#form-change-profile").submit(function(event){
        event.preventDefault();    
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
                console.log(data);
              }
          },
          cache: false,
          contentType: false,
          processData: false
        });
        return false;
    });
});
</script>