/**
 * Get Icon Lists from ajax function, and append into element html
 * @return {[type]} [description]
 */
$(document).ready(function () {
    Icon.getCart();
    Cart.getAll();

    /**
     * Action when button remove cart clicked    
     */
    $(document).on('click', '.btn-remove-cart', function(){ 
      var id = $(this).attr('data-id');
      var name = $(this).attr('data-name');

      Icon.removeFromCart(id, name);
    });        

    /**
     * Action when button download icon clicked
     */
    $(document).on('click', '.btn-download-icon', function(){ 
      $('.btn-download-icon').button('loading');
     
      var types = [];
      $('input[name=format-file-options]:checked').each(function() {
          types.push($(this).val());
      });


      if(types.length > 0) {       
        //Ajax method
        $.ajax({
         type: "post",
         url: BASE_URL + "icon/download_all",
         cache: false,    
         data: {types: types},
         success: function(response){        
            result = JSON.parse(response);
            //console.log(response.path);        
            if(result.status === true) {
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
            
            $('.btn-download-icon').button('reset');            
         },
         error: function(){      
          alert('Error while request..');
         }
        });
      } else {
               
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
        toastr.error("Silahkan pilih tipe file yang akan didownload.", "Warning !", opts);        
        $('.btn-download-icon').button('reset');
      }
    });        
});

window.unload = function(e) {
  
};

"console" in window && console.log("%cHi Developer\nIf you find an error please report  on this page %chttps://dev.belancon.com/bug/\n%cGive your feedback on this page %chttps://dev.belancon.com/feedback/",
  "color: #000000; font-size: 17px; line-height: 2",
  "color: #2bbbad; font-size: 17px; line-height: 2; font-style: normal",
  "color: #000000; font-size: 17px; line-height: 2",
  "color: #2bbbad; font-size: 17px; line-height: 2; font-style: normal"); 