(function ($) {
  $(document).ready(function(){

    // fade in .navbar
    $('#form-search-icon-navbar').hide();
    $(function () {

        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();

            if (scroll >= 100) {
                $("#navscroll").addClass("navbar-fixed-top");
            }
            else {
                $("#navscroll").removeClass("navbar-fixed-top");
            }

            if (scroll >= 250) {
                $('#form-search-icon-navbar').fadeIn();
            }
            else {
                $('#form-search-icon-navbar').hide();
            }
            
        });

    });

});
  }(jQuery));