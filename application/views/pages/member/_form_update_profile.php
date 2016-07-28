<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-6">

		<h2>Ubah Profil</h2>

		<?php echo form_open('member/update_profile', array('id'=> 'form-change-profile')); ?>
		<div class="form-group">
			<label>Nama Depan</label>
			<input type="text" name="firstname" class="form-control" value="<?php echo user_login('first_name');?>" />
		</div>
		<div class="form-group">
			<label>Nama Belakang</label>
			<input type="text" name="lastname" class="form-control" value="<?php echo user_login('last_name');?>" />
		</div>
		<div class="form-group">
			<label>Telepon/Hp</label>
			<input type="text" name="phone" class="form-control" value="<?php echo user_login('phone');?>" />
		</div>
		<button class="btn btn-success btn-form" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading...">Submit</button>
		<a href="<?php echo site_url('member/profile');?>" class="btn btn-default" type="submit">Kembali ke Profil</a>
		<?php echo form_close(); ?>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
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