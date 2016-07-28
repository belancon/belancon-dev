<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">

		<h2>Profil Member</h2>

		<table class="table table-striped">
			<tbody>
				<tr>
					<td>Nama</td>
					<td><?php echo user_login('first_name');?> <?php echo user_login('last_name');?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo user_login('email');?></td>
				</tr>			
				<tr>
					<td>Telepon/Hp</td>
					<td><?php echo user_login('phone');?></td>
				</tr>
			</tbody>
		</table>

		<a href="<?php echo site_url('member/change-profile');?>" class="btn btn-default">ubah profil</a>
		<a href="<?php echo site_url('member/change-password');?>" class="btn btn-default">ubah password</a>
	</div>
</div>