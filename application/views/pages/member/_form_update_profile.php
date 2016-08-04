<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">

		<h2>Ubah Profil</h2>
		<hr>
		<!-- Notif Error -->
        <div class="alert alert-danger" role="alert" style="display:none">
        </div>
        <!-- end Notif Error -->
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