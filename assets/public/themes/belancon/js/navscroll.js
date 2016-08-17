(function ($) {
  $(document).ready(function(){

    // fade in .navbar
    $(function () {

        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();

            if (scroll >= 100) {
                $("#navscroll").addClass("navbar-fixed-top");
            }
            else {
                $("#navscroll").removeClass("navbar-fixed-top");
            }
            
        });

    });

});
  }(jQuery));

