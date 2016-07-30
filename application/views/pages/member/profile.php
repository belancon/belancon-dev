<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">

		<h2>Profil Member</h2>		
		<hr>
			<div class="row">
						<div class="col-md-3 profile-picture" align="center">
							<?php $picture = user_login('profile_picture') == null ? 'belancon-user.jpg' : user_login('profile_picture'); ?>
							<img id="img-profile" src="<?php echo cloud('member/'.$picture);?>" width="210px"> 
							<br />		
							<?php echo form_open('member/change_picture', array('id'=>'form-change-picture'));?>
							<input type="hidden" name="filename" value="<?php echo user_login('profile_picture');?>">
							<span class="btn btn-green-primary btn-file btn-block">
							    Ubah Foto <input type="file" name="photo" id="photo" />
							</span>
							<?php echo form_close(); ?>
						</div>

						
						<div class="col-md-9">
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>Username</td>
										<td><?php echo user_login('username');?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td><?php echo user_login('email');?></td>
									</tr>
									<tr>
										<td>Nama Lengkap</td>
										<td><?php echo user_login('first_name')." ".user_login('last_name');?></td>
									</tr>	
									<tr>
										<td>Telepon/HP</td>
										<td><?php echo user_login('phone');?></td>
									</tr>
																			
								</tbody>
							</table>
							
							<a href="<?php echo site_url('member/change-profile');?>" class="btn btn-green-primary">ubah profil</a>
							<a href="<?php echo site_url('member/change-password');?>" class="btn btn-green-primary">ubah password</a>
						</div>
			</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#photo').change(function(e) {		
		var formData = new FormData($('#form-change-picture')[0]);

		$.ajax({
			url: $('#form-change-picture').attr("action"),
			type: 'POST',
			dataType: 'json',
			data: formData,
			async: false,
			success: function(data) {
				if (data.status === true) {
					$('#img-profile').attr("src", data.path);
				} else {
					alert(data.message);
				}
			},
			cache: false,
			contentType: false,
			processData: false
		});
	});
});
</script>