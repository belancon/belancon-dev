<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">

		<h2><?php echo setting_lang('member_changepassword_heading');?></h2>
    <hr>
		    <!-- Notif Error -->
        <div class="alert alert-danger" role="alert" style="display:none">
        </div>
        <!-- end Notif Error -->

		<?php echo form_open('member/update_password', array('id'=> 'form-change-password')); ?>
		<div class="form-group">
			<label><?php echo setting_lang('member_changepassword_form_label_oldpassword');?></label>
			<input type="password" name="old" class="form-control" />
		</div>
		<div class="form-group">
			<label><?php echo setting_lang('member_changepassword_form_label_newpassword');?></label>
			<input type="password" name="new" class="form-control" id="new" />
		</div>
		<div class="form-group">
			<label><?php echo setting_lang('member_changepassword_form_label_confirmnewpassword');?></label>
			<input type="password" name="new_confirm" class="form-control" />
		</div>
		<button class="btn btn-success btn-form" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading..."><?php echo setting_lang('member_changepassword_btn_submit');?></button>
		<a href="<?php echo site_url('member/profile');?>" class="btn btn-default" type="submit"><?php echo setting_lang('member_changepassword_btn_back');?></a>
		<?php echo form_close(); ?>
	</div>
</div>

