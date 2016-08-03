<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">
		<h2>Tambah Icon</h2>
		<hr>

		<legend>Data Icon</legend>
		<!-- Notif Error -->
        <div class="alert alert-danger" role="alert" style="display:none">
        </div>
        <!-- end Notif Error -->
		<?php echo form_open('icon/add', array('id' => 'form-add-icon'));?>
		<div class="form-group">
			<label>Nama <span class="text-danger">*</span></label>
			<input type="text" name="name" class="form-control" value="" />
		</div>
		<div class="form-group">
			<label>Kategori <span class="text-danger">*</span></label>			
			<select class="form-control" name="category">
				<option value="">-- Pilih Kategori --</option>
				<?php foreach($categories as $category): ?>
				<option value="<?php echo $category->name;?>"><?php echo $category->name;?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Tags</label>
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
		
		<legend>File Icon</legend>
		<div class="form-group">
			<label>PNG <span class="text-danger">*</span></label>
			<input type="file" class="filestyle" data-buttonText="File PNG" data-buttonName="btn-info" data-buttonBefore="true" name="filepng">			
		</div>
		<div class="form-group">
			<label>PSD (Photoshop)</label>
			<input type="file" class="filestyle" data-buttonText="File PSD" data-buttonName="btn-info" data-buttonBefore="true" name="filepsd">			
		</div>
		<div class="form-group">
			<label>AI/EPS (Adobe Illustrator)</label>
			<input type="file" class="filestyle" data-buttonText="File AI" data-buttonName="btn-info" data-buttonBefore="true" name="fileai">			
		</div>
		<div class="form-group">
			<label>CDR (Corel Draw)</label>
			<input type="file" class="filestyle" data-buttonText="File CDR" data-buttonName="btn-info" data-buttonBefore="true" name="filecdr">			
		</div>
		<div class="form-group">
			<label>SVG</label>
			<input type="file" class="filestyle" data-buttonText="File SVG" data-buttonName="btn-info" data-buttonBefore="true" name="filesvg">			
		</div>		
		<button class="btn btn-success btn-form" type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading...">Submit</button>
		<a href="<?php echo site_url('member/icon');?>" class="btn btn-default" type="submit">Kembali</a>
		</form>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#form-add-icon').validate({
        rules: {
            name: {
                minlength: 3,       
                required: true
            },
            category: {                  
                required: true
            },   
            price: {                
                number: true
            },     
            filepng: {
            	required: true,
            	extension: 'png'
            },
            filepsd: {        
            	extension: 'psd'
            },
            fileai: {          
            	extension: 'ai|eps'
            },
            filecdr: {        
            	extension: 'cdr'
            },
            filesvg: {            	
            	extension: 'svg'
            }
        },
        messages: {
			name: {
				required: 'Nama icon harap diisi',
				minlength: 'Nama icon tidak boleh kurang dari 3 karakter'
			},
			category: {
				required: 'Kategori icon harap diisi',
				minlength: 'Kategori icon tidak boleh kurang dari 3 karakter'
			},
			type: {
				required: 'Tipe icon harap diisi'
			},
			price: {
				required: 'Harga harus berupa angka desimal'
			},
			filepng: {
				required: 'File Png harap dipilih',
				extension: 'Tipe File tidak sesuai'
			},
			filepsd: {				
				extension: 'Tipe File tidak sesuai'
			},
			fileai: {				
				extension: 'Tipe File tidak sesuai'
			},
			filecdr: {				
				extension: 'Tipe File tidak sesuai'
			},
			filesvg: {
				extension: 'Tipe File tidak sesuai'
			},
		},
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {   
        	showLoader();     	
        	var formData = new FormData($(form)[0]);

        	$.ajax({
	          url: $(form).attr("action"),
	          type: 'POST',
	          dataType: 'json',
	          data: formData,
	          async: false,
	          success: function (data) {
	          	  hideLoader();
	              if(data.status === true) {
	                location.reload();
	              } else {
	                console.log(data);
	                showNotifError(data.message);
	              }
	          },
	          error: function() {
	          	hideLoader();
	          },
	          cache: false,
	          contentType: false,
	          processData: false
	        });	    
        }
    });

    var showLoader = function() {
    	$('#loader').fadeIn();
		$('.overlay-loader').fadeIn();
    };

    var hideLoader = function() {
    	$('#loader').fadeOut(1000);
		$('.overlay-loader').fadeOut(1000);
    }

    var showNotifError = function(message) {
      $('.alert-danger').html('');      
      $(".alert-danger").html(message);
      $(".alert-danger").slideDown();
    }

    var hideNotifError = function() {
      $('.alert-danger').hide();
    }
});
</script>