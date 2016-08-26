(function ($) {
  $(document).ready(function(){

    // fade in .navbar
    $('#search-form-icon').hide();
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
                $('#search-form-icon').fadeIn();
            }
            else {
                $('#search-form-icon').hide();
            }
            
        });

    });

});
  }(jQuery));

