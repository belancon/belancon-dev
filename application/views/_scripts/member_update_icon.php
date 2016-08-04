<script type="text/javascript">
$(document).ready(function() {
	$('#form-update-icon').validate({
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
            	extension: 'png'
            },
            filepsd: {            	
            	extension: 'psd'
            },
            fileai: {            	
            	extension: 'ai|eps'
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
				extension: 'Tipe File tidak sesuai'
			},
			filepsd: {				
				extension: 'Tipe File tidak sesuai'
			},
			fileai: {				
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