<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">
		<h2>Tambah Icon Baru</h2>
		<hr>
		<!-- Notif Error -->
        <div class="alert alert-danger" role="alert" style="display:none">
        </div>
        <!-- end Notif Error -->

        <div class="col-md-6">
        	<legend>Detail Icon</legend>
        	<?php echo form_open('icon/add', array('id' => 'form-add-icon'));?>
			<div class="form-group">
				<label>Nama Icon<span class="text-danger">*</span></label>
				<input type="text" name="name" class="form-control" value="" />
			</div>
			<div class="form-group">
				<label>Kategori Icon<span class="text-danger">*</span></label>			
				<select class="form-control" name="category">
					<option value="">-- Pilih Kategori --</option>
					<?php foreach($categories as $category): ?>
					<option value="<?php echo $category->name;?>"><?php echo $category->name;?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label>Label Icon</label>
				<input type="text" name="tags" class="form-control" value="" />
			</div>
			<div class="form-group">
				<label>Tipe <span class="text-danger">*</span></label> <br />
				<label class="radio-inline">
				 <input type="radio" name="type" id="free" value="free" checked> Free
				</label>
				<label class="radio-inline">
				  <input type="radio" name="type" id="paid" value="paid"> Paid
				</label>
			</div>
			<div class="form-group">
				<label>Price</label>
				<input type="text" name="price" class="form-control" value="0" />
			</div>	
        </div><!-- left section -->

        <div class="col-md-6">
        	<legend>Upload File Icon</legend>
			<div class="form-group">
				<label>PNG <span class="text-danger">*</span></label>
				<input type="file" data-iconName="fa fa-file-image-o" class="filestyle" data-buttonText=" " data-buttonName="btn-success" data-buttonBefore="true" name="filepng">			
			</div>
			<div class="form-group">
				<label>PSD (Photoshop)</label>
				<input type="file" class="filestyle" data-iconName="fa fa-object-ungroup" data-buttonText=" " data-buttonName="btn-success" data-buttonBefore="true" name="filepsd">			
			</div>
			<div class="form-group">
				<label>AI/EPS (Adobe Illustrator)</label>
				<input type="file" class="filestyle" data-iconName="fa fa-object-ungroup" data-buttonText=" " data-buttonName="btn-success" data-buttonBefore="true" name="fileai">			
			</div>
			<div class="form-group">
				<label>CDR (Corel Draw)</label>
				<input type="file" class="filestyle" data-iconName="fa fa-object-ungroup" data-buttonText=" " data-buttonName="btn-success" data-buttonBefore="true" name="filecdr">			
			</div>
			<div class="form-group">
				<label>SVG</label>
				<input type="file" data-iconName="fa fa-file-code-o" data-iconName="fa fa-facebook" class="filestyle" 
				data-buttonText=" " data-buttonName="btn-success" data-buttonBefore="true" name="filesvg">			
			</div>
        </div><!-- right section -->

		<div class="col-md-12" style="margin-bottom: 30px; margin-top: 30px;">
			<div class="pull-right">
				<a href="<?php echo site_url('member/icon');?>" class="btn btn-default" type="submit">Batal</a>
				<button class="btn btn-success btn-form" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading...">Simpan</button>
			</div>
		</div>

		</form>
	</div>
</div>