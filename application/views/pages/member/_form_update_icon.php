<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-6">

		<h1>Update Icon</h1>

		<legend>Data Icon</legend>
		<!-- Notif Error -->
        <div class="alert alert-danger" role="alert" style="display:none">
        </div>
        <!-- end Notif Error -->
		<?php echo form_open('icon/add', array('id' => 'form-add-icon'));?>
		<div class="form-group">
			<label>Nama <span class="text-danger">*</span></label>
			<input type="text" name="name" class="form-control" value="<?php echo $icon->name;?>" />
		</div>
		<div class="form-group">
			<label>Kategori <span class="text-danger">*</span></label>
			<input type="text" name="category" class="form-control" value="<?php echo $icon->category;?>" />
		</div>
		<div class="form-group">
			<label>Tags</label>
			<input type="text" name="tags" class="form-control" value="<?php echo $icon->tags;?>" />
		</div>
		<div class="form-group">
			<label>Tipe</label> <br />
			<label class="radio-inline">
			 <input type="radio" name="type" id="free" value="free" checked> Free
			</label>
			<label class="radio-inline">
			  <input type="radio" name="type" id="paid" value="paid"> Paid
			</label>
		</div>
		<div class="form-group">
			<label>Price</label>
			<input type="text" name="price" class="form-control" value="<?php echo $icon->price;?>" />
		</div>		
		
		<legend>File Icon</legend>
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

<script type="text/javascript">
$(document).ready(function() {
	$('#form-add-icon').validate({
        rules: {
            name: {
                minlength: 3,       
                required: true
            },
            category: {
                minlength: 3,                
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
            	required: true,
            	extension: 'psd'
            },
            fileai: {
            	required: true,
            	extension: 'ai|eps'
            }
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
        	var formData = new FormData($(form)[0]);

        	$.ajax({
	          url: $(form).attr("action"),
	          type: 'POST',
	          dataType: 'json',
	          data: formData,
	          async: false,
	          success: function (data) {
	              if(data.status === true) {
	                location.reload();
	              } else {
	                console.log(data);
	                showNotifError(data.message);
	              }
	          },
	          cache: false,
	          contentType: false,
	          processData: false
	        });	    
        }
    });

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