User = {
  /**
   * Set token first user open or visit belancon site
   */
  setToken: function() {
    this.checkTokenIsExist(function(result) {
      if(result === false) {      
        Cart.setDefaultCart();
        //Ajax method
        $.ajax({
           type: "post",
           url: BASE_URL + "user/set_token",
           cache: false,    
           data: {},
           success: function(response){        
              response = JSON.parse(response);
              sessionStorage.setItem('userNotRegistered', response.token);          
           },
           error: function(){      
            alert('Error while request..');
           }
        });
      }
    });
  },
  /**
   * check whether the token has the generated
   * @param  {Function} callback [description]
   * @return {[type]}            [description]
   */
  checkTokenIsExist: function(callback) {
    if(sessionStorage.getItem('userNotRegistered')) {
      callback(true);
    } else {      
      callback(false);
    }

    return false;
  }
}
