<script type="text/javascript">
$(document).ready(function(){    
    $('#form-change-password').validate({
        rules: {
            old: {
                required: true
            },
            new: {
                minlength: 6,
                required: true
            },  
            new_confirm: {
                equalTo: "#new",
                required: true
            },            
        },
        messages: {
          old: {
            required: 'Password lama harap diisi',           
          },
          new: {
            required: 'Password baru harap diisi',
            minlength: 'Password baru tidak boleh kurang dari 8 karakter'
          },
          new_confirm: {
            required: 'Konfirmasi Password baru harap diisi', 
            equalTo: 'Konfirmasi Password baru tidak sesuai'
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