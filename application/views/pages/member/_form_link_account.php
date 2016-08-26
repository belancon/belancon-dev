<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">

		<h2><?php echo setting_lang('member_settingaccount_heading');?></h2>
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
      <input type="text" name="twitter" class="form-control" value="<?php echo user_socmed('twitter', 'url');?>" />
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
		<button class="btn btn-success btn-form" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading..."><?php echo setting_lang('member_settingaccount_btn_submit');?></button>
		<a href="<?php echo site_url('member/profile');?>" class="btn btn-default" type="submit"><?php echo setting_lang('member_settingaccount_btn_back');?></a>
		<?php echo form_close(); ?>
	</div>
</div>