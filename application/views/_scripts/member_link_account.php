<script type="text/javascript">
$(document).ready(function(){
  $('#form-setting-link-account').validate({
    rules: {
      facebook: {
        url:true
      },
      twiter: {
        url:true
      },
      googleplus: {
        url:true
      },
      behance: {
        url:true
      },
      dribble: {
        url:true
      },
      youtube: {
        url:true
      },
      web: {
        url:true
      },
    },
    messages: {
      facebook: {
        url: 'Facebook harus berupa valid url'
      },
      twiter: {
        url: 'Twitter harus berupa valid url'
      },
      googleplus: {
        url: 'Google Plus harus berupa valid url'
      },
      behance: {
        url: 'Behance harus berupa valid url'
      },
      dribble: {
        url: 'Dribble harus berupa valid url'
      },
      youtube: {
        url: 'Youtube harus berupa valid url'
      },
      web: {
        url: 'Web harus berupa valid url'
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
      if (element.parent('.input-group').length) {
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
        success: function(data) {
          if (data.status === true) {
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

    $("#form-change-profile").submit(function(event){
        event.preventDefault();    
        var formData = new FormData($(this)[0]);
        $.ajax({
          url:$(this).attr("action"),
          type: 'POST',
          dataType: 'json',
          data: formData,
          async: false,
          success: function (data) {
              if(data.status === true) {
                location.reload();
              } else {
                console.log(data);
              }
          },
          cache: false,
          contentType: false,
          processData: false
        });
        return false;
    });
});
</script>