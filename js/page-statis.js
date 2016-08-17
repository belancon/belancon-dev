/**
 * Get Icon Lists from ajax function, and append into element html
 * @return {[type]} [description]
 */
$(document).ready(function () {
    Icon.getCart();
    /**
     * Action when button remove cart clicked    
     */
    $(document).on('click', '.btn-remove-cart', function(){ 
      var id = $(this).attr('data-id');
      var name = $(this).attr('data-name');

      Icon.removeFromCart(id, name);
    });        
  
});

window.unload = function(e) {
  
};

"console" in window && console.log("%cHi Developer\nIf you find an error please report  on this page %chttps://belancon.com/bug/\n%cGive your feedback on this page %chttps://belancon.com/feedback/",
  "color: #000000; font-size: 17px; line-height: 2",
  "color: #2bbbad; font-size: 17px; line-height: 2; font-style: normal",
  "color: #000000; font-size: 17px; line-height: 2",
  "color: #2bbbad; font-size: 17px; line-height: 2; font-style: normal"); 