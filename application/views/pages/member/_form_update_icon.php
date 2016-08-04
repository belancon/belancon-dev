<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">

		<h2>Ubah Icon</h2>
		<hr>

		<legend>Data Icon</legend>
		<!-- Notif Error -->
        <div class="alert alert-danger" role="alert" style="display:none">
        </div>
        <!-- end Notif Error -->
		<?php echo form_open('icon/update', array('id' => 'form-update-icon'));?>
		<input type="hidden" name="id" value="<?php echo $icon->id;?>" />
		<input type="hidden" name="default-image" value="<?php echo $icon->default_image;?>" />
		<div class="form-group">
			<label>Nama <span class="text-danger">*</span></label>
			<input type="text" name="name" class="form-control" value="<?php echo $icon->name;?>" />
		</div>
		<div class="form-group">
			<label>Kategori <span class="text-danger">*</span></label>			
			<select class="form-control" name="category">
				<option value="">-- Pilih Kategori --</option>
				<?php foreach($categories as $category): ?>
				<?php if($category->name == $icon->category): ?>
				<option value="<?php echo $category->name;?>" selected><?php echo $category->name;?></option>
				<?php else: ?>
				<option value="<?php echo $category->name;?>"><?php echo $category->name;?></option>
				<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Tags</label>
			<input type="text" name="tags" class="form-control" value="<?php echo $icon->tags;?>" />
		</div>
		<div class="form-group">
			<label>Tipe <span class="text-danger">*</span></label> <br />
			<label class="radio-inline">
			 <?php $checked_free = $icon->type === 'free' ? 'checked' : '' ; ?>
			 <input type="radio" name="type" id="free" value="free" <?php echo $checked_free;?>> Free
			</label>
			<label class="radio-inline">
			  <?php $checked_paid = $icon->type === 'paid' ? 'checked' : '' ; ?>
			  <input type="radio" name="type" id="paid" value="paid" <?php echo $checked_paid;?>> Paid
			</label>
		</div>
		<div class="form-group">
			<label>Price</label>
			<input type="text" name="price" class="form-control" value="<?php echo $icon->price;?>" />
		</div>		
		
		<legend>File Icon </legend> 
		<small>(Jika tidak ada perubahan pada file, tidak perlu mengupload file-filenya)</small>
		<br />
		<br />
		<div class="form-group">
			<input type="file" class="filestyle" data-buttonText="File PNG" data-buttonName="btn-info" data-buttonBefore="true" name="filepng">			
		</div>
		<div class="form-group">
			<input type="file" class="filestyle" data-buttonText="File PSD" data-buttonName="btn-info" data-buttonBefore="true" name="filepsd">			
		</div>
		<div class="form-group">
			<input type="file" class="filestyle" data-buttonText="File AI" data-buttonName="btn-info" data-buttonBefore="true" name="fileai">			
		</div>

		<button class="btn btn-success btn-form" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading...">Submit</button>
		<a href="<?php echo site_url('member/icon');?>" class="btn btn-default" type="submit">Kembali</a>
		</form>
	</div>
</div>