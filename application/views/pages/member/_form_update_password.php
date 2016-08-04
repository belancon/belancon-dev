<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">

		<h2>Ubah Password</h2>
    <hr>
		    <!-- Notif Error -->
        <div class="alert alert-danger" role="alert" style="display:none">
        </div>
        <!-- end Notif Error -->

		<?php echo form_open('member/update_password', array('id'=> 'form-change-password')); ?>
		<div class="form-group">
			<label>Password Lama</label>
			<input type="password" name="old" class="form-control" />
		</div>
		<div class="form-group">
			<label>Password Baru</label>
			<input type="password" name="new" class="form-control" id="new" />
		</div>
		<div class="form-group">
			<label>Konfirmasi Password Baru</label>
			<input type="password" name="new_confirm" class="form-control" />
		</div>
		<button class="btn btn-success btn-form" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading...">Submit</button>
		<a href="<?php echo site_url('member/profile');?>" class="btn btn-default" type="submit">Kembali ke Profil</a>
		<?php echo form_close(); ?>
	</div>
</div>

