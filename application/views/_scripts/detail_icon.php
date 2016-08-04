<script type="text/javascript">
$(document).ready(function() {

    var onCart = $('#div-action-cart').attr('data-oncart');
    var iconId = '<?php echo $icon->id;?>';
    var iconName = '<?php echo $icon->name;?>';

    loadButtonDefault(onCart, iconId, iconName);

    /**
     * Action when button add cart clicked    
     */
    $(document).on('click', '.btn-detail-add-cart', function(e){ 
      e.preventDefault();
      var id = $(this).attr('data-id');
      var name = $(this).attr('data-name');

      Icon.addToCart(id, name, function(result) {
        if(result === true) {
          loadButtonRemoveCart(id, name);
        }
      });

    });

    $(document).on('click', '.btn-detail-remove-cart', function(e){ 
      e.preventDefault();
      var id = $(this).attr('data-id');
      var name = $(this).attr('data-name');

      Icon.removeFromCart(id, name, function(result) {
        if(result.status === true) {
          loadButtonAddCart(id, name);
        }
      });
    });  

    $('#btn-detail-download').click(function(e) {
      e.preventDefault();
      $('#modal-download').modal('show');
    });

    $('#btn-cancel-download').click(function(e) {
      $('#span-error-download').fadeOut();
      $('#modal-download').modal('hide');
    });

    $('#form-download').submit(function(e) {
      e.preventDefault();
      $('#btn-download').button('loading');            
      var id = $('input[name=id]').val();         
      var types = [];
      $('input[type=checkbox]:checked').each(function() {
          types.push($(this).val());
      });
      
      if(types.length < 1) {
        $('#span-error-download').fadeIn();
        $('#btn-download').button('reset');
      } else {
        //Ajax method
        $.ajax({
         type: "post",
         url: $(this).attr('action'),
         cache: false,    
         data: {id: id, types: types},
         success: function(response){        
            result = JSON.parse(response);
            //console.log(response.path);        
            if(result.status === true) {
             $('#modal-download').modal('hide'); 
             window.location = result.path;                            
             setTimeout(function(){ window.location = BASE_URL + "feedback"; }, 2000);
            } else {
              //console.log(result.message);
              /** Message Error */
              var opts = {
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "100",
                "hideDuration": "300",
                "timeOut": "1000",
                "extendedTimeOut": "300",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              };
              toastr.error(result.message, "Warning !", opts);        
            }
            
            $('#btn-download').button('reset');            
         },
         error: function(){      
          alert('Error while request..');
         }
        });
      }
    });
});


var loadButtonDefault = function(onCart, iconId, iconName) {
  if(onCart == 'true') {
    loadButtonRemoveCart(iconId, iconName);    
  } else {
    loadButtonAddCart(iconId, iconName);    
  }
};

var loadButtonAddCart = function(id, name) {
  $('#div-action-cart').html('');
  var btnAdd = '<a href="#" class="btn-detail-add-cart" data-id="' + id + '" data-name="' + name + '">';
  btnAdd += '<div class="col-md-12 btn-cart">Tambahkan ke keranjang</div>';
  btnAdd += '</a>';

  $('#div-action-cart').append(btnAdd);
};

var loadButtonRemoveCart = function(id, name) {
  $('#div-action-cart').html('');
  var btnRemove = '<a href="#" class="btn-detail-remove-cart" data-id="' + id + '" data-name="' + name + '">';
  btnRemove += '<div class="col-md-12 btn-cart">Hapus dari keranjang</div>';
  btnRemove += '</a>';
  $('#div-action-cart').append(btnRemove);
};

</script>