/**
 * Get Icon Lists from ajax function, and append into element html
 * @return {[type]} [description]
 */
window.onload = function() {
  User.setToken();

  //get params
  var paramBy = Belancon.getUrlParameter('by') ? Belancon.getUrlParameter('by') : null;
  var by = paramBy ? paramBy : "newest";
  var paramSearch = Belancon.getUrlParameter('search') ? Belancon.getUrlParameter('search') : null;
  var search = paramSearch ? paramSearch : "";
  
  //call method to get icon lists
  Icon.getAll(1, by, search);

  Icon.getCart();
  Cart.getAll();

  //if param ready, redirect url with params
  if(paramBy !== null) {
    if(paramSearch !== null) {
      window.history.pushState("", "", BASE_URL + "?by=" + paramBy + "&search=" + search);
    } else {
      window.history.pushState("", "", BASE_URL + "?by=" + paramBy);
    }
  }
}



$(document).ready(function () {

    /**
     * Action When Search Form Submitted
     */
    $('#form-search-icon').submit(function(e) {
      e.preventDefault();
      var search = $('#search-icon').val().trim();

      if(search.length < 3) {
        
        /** Message Error */
        
        var opts = {
          "debug": false,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };
        toastr.error("Gunakan minimal 3 karakter dalam pencarian Icon.", "Warning !", opts);
        
      } else {
        var url = BASE_URL + "result?search=" + search;
        window.location = url;
      }      
    });

    /**
     * Action when tab panel clicked
     */
    $('.btn-filter').click(function() {
      var filter = $(this).attr('data-filter');

      Icon.changefilter(filter);
    });

    /**
     * Action When Button Loadmore clicked
     */
    $(document).on('click', '#btn-load-more', function(){       
      var currentUrlString = window.location.href;
      var currentUrlArr = currentUrlString.split("?");
      var currentUrl = currentUrlArr[0];
            
      var paramBy = Belancon.getUrlParameter('by') ? Belancon.getUrlParameter('by'): null;
      var paramSearch = Belancon.getUrlParameter('search') ? Belancon.getUrlParameter('search') : null;
      var by = paramBy ? paramBy : "newest";
      var search = paramSearch ? paramSearch : "";
      var page = $(this).attr('data-page');

      Icon.getAll(page, by, search);
      
      if(paramBy) {
        if(paramSearch) {
          window.history.pushState("", "", BASE_URL + "?by=" +by + "&search=" + search);
        } else {
          window.history.pushState("", "", BASE_URL + "?by=" +by);
        }
      }

    });

    /**
     * Action when button add cart clicked    
     */
    $(document).on('click', '.btn-add-cart', function(){ 
      var id = $(this).attr('data-id');
      var name = $(this).attr('data-name');

      Icon.addToCart(id, name);
    });    

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
      var type = $('input[name=format-file-options]:checked').val();
      var token = sessionStorage.getItem('userNotRegistered');

      if(type) {
        var url = BASE_URL + "icon/download_all/" + type + "/" + token;
        window.location = url;

        setTimeout(function(){ window.location = BASE_URL; }, 2000);
      } else {
        swal("Warning!", 
        "Silahkan pilih tipe file yang akan didownload", 
        "error");
        $('.btn-download-icon').button('reset');
      }
    });        

    /**
     * Action when button view icon clicked     
     */
    $(document).on('click', '.btn-view-icon', function() {      
      var id = $(this).attr('data-id');
      Icon.view(id, function(result) {
        if(result) {
          $('.modal-view-icon').modal('show');
        }
      })      
    });
          
});

window.unload = function(e) {
  //Cart.clearAll();
};