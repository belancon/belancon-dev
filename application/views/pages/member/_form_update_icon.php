<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">

		<h2><?php echo setting_lang('member_updateicon_heading');?></h2>
		<hr>
		<?php
		$lbl_name = setting_lang('member_addicon_form_label_name');
        $lbl_category = setting_lang('member_addicon_form_label_category');
        $lbl_tags = setting_lang('member_addicon_form_label_tags');
        $lbl_type = setting_lang('member_addicon_form_label_type');
        $lbl_price = setting_lang('member_addicon_form_label_price');
        ?>
		<legend><?php echo setting_lang('member_addicon_subheading_1');?></legend>
		<!-- Notif Error -->
        <div class="alert alert-danger" role="alert" style="display:none">
        </div>
        <!-- end Notif Error -->
		<?php echo form_open('icon/update', array('id' => 'form-update-icon'));?>
		<input type="hidden" name="id" value="<?php echo $icon->id;?>" />
		<input type="hidden" name="default-image" value="<?php echo $icon->default_image;?>" />
		<div class="form-group">
			<label><?php echo $lbl_name;?> <span class="text-danger"> <span class="text-danger">*</span></label>
			<input type="text" name="name" class="form-control" value="<?php echo $icon->name;?>" />
		</div>
		<div class="form-group">
			<label><?php echo $lbl_category;?> <span class="text-danger">*</span></label>			
			<select class="form-control" name="category">
				<option value="">-- <?php echo setting_lang('lbl_choose_category');?> --</option>
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
			<label><?php echo $lbl_tags;?></label>
			<input type="text" name="tags" class="form-control" value="<?php echo $icon->tags;?>" />
		</div>
		<div class="form-group">
			<label><?php echo $lbl_type;?> <span class="text-danger">*</span></label> <br />
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
			<label><?php echo $lbl_price;?></label>
			<input type="text" name="price" class="form-control" value="<?php echo $icon->price;?>" />
		</div>		
		
		<legend><?php echo setting_lang('member_addicon_subheading_2');?> </legend> 
		<small>(<?php echo setting_lang('member_updateicon_form_note_fileicon');?>)</small>
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