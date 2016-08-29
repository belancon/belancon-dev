<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">

		<h2><?php echo setting_lang('member_profile_heading');?></h2>		
		<hr>
			<div class="row">
						<div class="col-md-3 profile-picture" align="center">
							<?php $picture = user_login('profile_picture') == null ? 'belancon-user.jpg' : user_login('profile_picture'); ?>
							<img id="img-profile" src="<?php echo cloud('member/'.$picture);?>" width="210px"> 
							<br />		
							<?php echo form_open('member/change_picture', array('id'=>'form-change-picture'));?>
							<input type="hidden" name="filename" value="<?php echo user_login('profile_picture');?>" id="filename">
							<span class="btn btn-green-primary btn-file btn-block">
							    <?php echo setting_lang('member_profile_btn_change_picture');?> <input type="file" name="photo" id="photo" />
							</span>
							<?php echo form_close(); ?>
						</div>

						
						<div class="col-md-9">
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>
											<?php echo setting_lang('member_profile_label_username');?>	
										</td>
										<td>
											<?php echo user_login('username');?>
										</td>
									</tr>
									<tr>
										<td><?php echo setting_lang('member_profile_label_email');?></td>
										<td><?php echo user_login('email');?></td>
									</tr>
									<tr>
										<td><?php echo setting_lang('member_profile_label_fullname');?></td>
										<td><?php echo user_login('first_name')." ".user_login('last_name');?></td>
									</tr>	
									<tr>
										<td><?php echo setting_lang('member_profile_label_phone');?></td>
										<td><?php echo user_login('phone');?></td>
									</tr>
																			
								</tbody>
							</table>
							
							<a href="<?php echo site_url('member/change-profile');?>" class="btn btn-green-primary"><?php echo setting_lang('member_profile_btn_change_profile');?></a>
							<a href="<?php echo site_url('member/change-password');?>" class="btn btn-green-primary"><?php echo setting_lang('member_profile_btn_change_password');?></a>
							<a href="<?php echo site_url('member/setting-link-account');?>" class="btn btn-green-primary"><?php echo setting_lang('member_profile_btn_setting_account');?></a>
						</div>
			</div>
	</div>
</div>