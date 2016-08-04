<script type="text/javascript">
$(document).ready(function(){
	$('#form-change-profile').validate({
        rules: {
            firstname: {
                minlength: 3,       
                required: true
            },            
        },
        messages: {
			firstname: {
				required: 'Nama Depan harap diisi',
				minlength: 'Nama Depan tidak boleh kurang dari 3 karakter'
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
	                //console.log(data);
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