<script type="text/javascript">
$(document).ready(function(){
    $("#form-forgot-password").submit(function(event){
        event.preventDefault();    
        //hide notif error
        hideNotifError();

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
                showNotifError(data.message);
                //console.log(data);
              }
          },
          cache: false,
          contentType: false,
          processData: false
        });
        return false;
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