/**
 * Get Icon Lists from ajax function, and append into element html
 * @return {[type]} [description]
 */
window.onload = function() {
  User.setToken();

  //get params
  var paramBy = getUrlParameter('by') ? getUrlParameter('by') : null;
  var by = paramBy ? paramBy : "newest";
  var paramSearch = getUrlParameter('search') ? getUrlParameter('search') : null;
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

/**
 * Get Param from url
 * @param  {[type]} sParam [description]
 * @return {[type]}        [description]
 */
function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1).split('&');
  for (var i = 0; i < sPageURL.length; i++) {
    var sParameterName = sPageURL[i].split('=');
    if (sParameterName[0] == sParam) {
      return sParameterName[1];
    }
  }
}

User = {
  setToken: function() {
    this.checkTokenIsExist(function(result) {
      if(result === false) {
        //Ajax method
        $.ajax({
           type: "post",
           url: BASE_URL + "user/set_token",
           cache: false,    
           data:'',
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
  checkTokenIsExist: function(callback) {
    if(sessionStorage.getItem('userNotRegistered')) {
      callback(true);
    } else {
      callback(false);
    }

    return false;
  }
}


/**
 * Icon Object
 * @type {Object}
 */
Icon = {
  /**
   * Get list icon via ajax and get back return array json from server
   * @param  {[type]} page   [description]
   * @param  {[type]} by     [description]
   * @param  {[type]} search [description]
   * @return {[type]}        [description]
   */
  getAll: function(page, by, search) {
    var self = this;
    var search = search ? search : "";

    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/get_all",
     cache: false,    
     data:'page=' + page + "&by=" + by + "&search=" + search,
     success: function(response){        
        response = JSON.parse(response);
        //console.log(response);
        var items=[]; 
        var data = response.data;

        //populate data
        if(data.length > 0) {
          for(var i=0; i < data.length; i++) {
            //push data to content html
            var item = self.setSingleContent(data[i]);
            items.push(item);
          }
        } else {
          items.push('<h2 class="text-center">Sorry, No Result</h2>');
        }

        //and append all icons to display in page html
        $('#icon-list').append.apply($('#icon-list'), items);
        //set button loadmore
        self.setLoadMore(response.more, response.page);
     },
     error: function(){      
      alert('Error while request..');
     }
    });
  },
  getCart: function() {
    var self = this;
    $('.dropdown-keranjang').html("");
    var liDownload = '<li class="divider"></li>';
    liDownload += '<li style="padding-top: 20px; padding-bottom: 30px;" id="btn-download-cart">';
    liDownload += '<a href="'+ BASE_URL +'cart">';
    liDownload += '<span class="green-color glyphicon glyphicon-save" aria-hidden="true"></span> Download all Icons </a> </li>';
                                    
    var liEmpty = '<li style="padding-top: 20px; padding-bottom: 30px;" id="li-cart-empty">Cart Empty</li>';

    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/get_cart",
     cache: false,    
     data:'',
     success: function(response){        
        response = JSON.parse(response);
        //console.log(response);
        var items=[]; 
        var data = response.data;

        //populate data
        if(data.length > 0) {
          for(var i=0; i < data.length; i++) {
            //push data to content html
            var item = self.setSingleItemOnCart(data[i]);
            items.push(item);
          }

          items.push(liDownload);
        } else {
          items.push(liEmpty);
        }

        //and append all icons to display in page html
        $('.dropdown-keranjang').append.apply($('.dropdown-keranjang'), items);
     },
     error: function(){      
      alert('Error while request..');
     }
    });
  },
  addToCart: function(id) {
    var self = this;
    var token = sessionStorage.getItem('userNotRegistered');
    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/add_to_cart",
     cache: false,    
     data: {id: id, token: token},
     success: function(response){        
       response  = JSON.parse(response);
       if(response.status === true) {
         self.getCart();
       }
     },
     error: function(){      
      alert('Error while request..');
     }
    });
  },
  removeFromCart: function(id) {
    var token = sessionStorage.getItem('userNotRegistered');
    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/remove_from_cart",
     cache: false,    
     data: {id: id, token: token},
     success: function(response){        
       response  = JSON.parse(response);
       // console.log(response);
       Icon.getCart();
       Cart.getAll();
     },
     error: function(){      
      alert('Error while request..');
     }
    });
  },
  setSingleItemOnCart: function(icon) {
    var liCart = document.createElement("li");
    var imgCart = document.createElement("img");
    var spanCart = document.createElement("span");
    var btnRemove = document.createElement("a");
    var iconRemove = document.createElement("i");
    var textRemove = document.createTextNode(" Hapus");

    btnRemove.setAttribute("class", "black-color btn-remove-cart");
    btnRemove.setAttribute("data-id", icon.id);
    btnRemove.setAttribute("href", "javascript:void(0)");
    iconRemove.setAttribute("class", "green-color fa fa-trash");
    btnRemove.appendChild(iconRemove);
    btnRemove.appendChild(textRemove);        
    spanCart.appendChild(btnRemove);

    imgCart.setAttribute("alt", icon.name);
    imgCart.setAttribute("src", icon.path);

    liCart.setAttribute("id", "item-cart-" + icon.id);
    liCart.appendChild(imgCart);
    liCart.appendChild(spanCart);

    return liCart;
  },
  /**
   * Generate Element Html to display single icon
   * @param {[type]} icon [description]
   */
  setSingleContent: function(icon) {
     var divIconItem = document.createElement("div");
     var spanDownloadIcon = document.createElement("span");
     var divImgIcon = document.createElement("div");
     var btnAction = document.createElement("a");
     var iconAdd = document.createElement("i");
     var imgIcon = document.createElement("img");


     divIconItem.setAttribute("class", "col-md-2 col-xs-4 col-sm-3 icon-item");
     spanDownloadIcon.setAttribute("class", "download-icon");
     btnAction.setAttribute("class", "btn-add-cart");
     btnAction.setAttribute("data-id", icon.id);
     btnAction.setAttribute("data-name", icon.name);
     btnAction.setAttribute("data-path", icon.path);
     btnAction.setAttribute("href", "javascript:void(0)");
     iconAdd.setAttribute("class", "fa fa-shopping-basket");
     btnAction.appendChild(iconAdd);
     spanDownloadIcon.appendChild(btnAction);

     divImgIcon.setAttribute("class", "text-center img-icon");
     imgIcon.setAttribute("src", icon.path);
     imgIcon.setAttribute("height", "80");
     imgIcon.setAttribute("data-icon-type", "cc");
     imgIcon.setAttribute("id", icon.id);
     divImgIcon.appendChild(imgIcon);

     divIconItem.appendChild(spanDownloadIcon);
     divIconItem.appendChild(divImgIcon);

     return divIconItem;
  },
  /**
   * Set button loadmore, and show it to page or not
   * @param {[type]} more [description]
   * @param {[type]} page [description]
   */
  setLoadMore: function(more, page) {
    $('#content-loadmore').html('');

    if(more === true) {
      var btnLoadmore = document.createElement("a");
      var textLoadmore = document.createTextNode("LOAD MORE");
      btnLoadmore.setAttribute("class", "btn btn-primary btn-load-more");
      btnLoadmore.setAttribute("id", "btn-load-more");
      btnLoadmore.setAttribute("data-page", page);
      btnLoadmore.setAttribute("href", "javascript:void(0)");
      btnLoadmore.appendChild(textLoadmore);
      

      $('#content-loadmore').html(btnLoadmore);
      $('#content-loadmore').show();
    } else {
      $('#content-loadmore').hide();
    }
  },
  /**
   * Get All Icon with filter
   * @param  {[type]} by [description]
   * @return {[type]}    [description]
   */
  changefilter: function(by) {
    //first clear icon list
    this.clearList();
    //get params search
    var paramSearch = getUrlParameter('search') ? getUrlParameter('search'): null;
    var search = paramSearch ? paramSearch : "";

    var page = 1;

    //call method to get icon list
    Icon.getAll(page, by, search);    

    //redirect url with params
    if(search !== "") {
      window.history.pushState("", "", BASE_URL + "?by=" +by + "&search=" + search);
    } else {
      window.history.pushState("", "", BASE_URL + "?by=" +by);
    }
  },
  /**
   * Get Result All Icon from search form
   * @param  {[type]} search [description]
   * @return {[type]}        [description]
   */
  search: function(search) {
    //first clear icon list
    this.clearList();
    //set params
    var page = 1;
    var paramBy = getUrlParameter('by') ? getUrlParameter('by'): null;
    var by = paramBy ? paramBy : "newest";
    //call method to get all icon with search key
    Icon.getAll(page, by, search);
    //redirect url
    window.history.pushState("", "", BASE_URL + "?by=" +by + "&search=" + search);
  },
  /**
   * Clear Icon List from page
   * @return {[type]} [description]
   */
  clearList: function() {
    $('#icon-list').html("");
  },  
};

Cart = {
  getAll: function() {
    var self = this;
    $('#table-body-cart').html("");

    var rowEmpty = '<tr><td colspan="4">No Item</td></tr>';

    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/get_cart",
     cache: false,    
     data:'',
     success: function(response){        
        response = JSON.parse(response);
        //console.log(response);
        var items=[]; 
        var data = response.data;

        //populate data
        if(data.length > 0) {
          for(var i=0; i < data.length; i++) {
            //push data to content html
            var item = self.setRow(data[i]);
            items.push(item);
          } 
        } else {
          items.push(rowEmpty);
          $('#row-download-icon').hide();
        }

        //and append all icons to display in page html
        $('#table-body-cart').append.apply($('#table-body-cart'), items);
        
     },
     error: function(){      
      alert('Error while request..');
     }
    });
  },
  setRow: function(icon) {
    var row = '<tr>';
    row += '<td><img src="'+ icon.path +'" /></td>';
    row += '<td>' + icon.name + '</td>';
    row += '<td><a href="result.html?=Zonk">'+ icon.category +'</a></td>';
    row += '<td> Rp. '+ icon.price +'</td>';
    row += '</tr>';

    return row;
  },
};



$(document).ready(function () {
    /**
     * Action When Search Form Submitted
     */
    $('#form-search-icon').submit(function(e) {
      e.preventDefault();
      var search = $('#search-icon').val().trim();
      Icon.search(search);
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
      //Icon.getAll();
      var paramBy = getUrlParameter('by') ? getUrlParameter('by'): null;
      var by = paramBy ? paramBy : "newest";
      var page = $(this).attr('data-page');

      Icon.getAll(page, by);
      
      if(paramBy)
        window.history.pushState("", "", BASE_URL + "?by=" +by);

    });

    $(document).on('click', '.btn-add-cart', function(){ 
      var id = $(this).attr('data-id');

      Icon.addToCart(id);
    });    

    $(document).on('click', '.btn-remove-cart', function(){ 
      var id = $(this).attr('data-id');

      Icon.removeFromCart(id);
    });        

    $(document).on('click', '.btn-download-icon', function(){ 
      $('.btn-download-icon').button('loading');
      var type = $('input[name=format-file-options]:checked').val();
      var token = sessionStorage.getItem('userNotRegistered');

      if(type) {
        var url = BASE_URL + "icon/download_all/" + type + "/" + token;
        window.location = url;

        setTimeout(function(){ window.location = BASE_URL; }, 3000);
      } else {
        alert("Please select file type");
      }
    });        
          
});

window.onbeforeunload = function(e) {
  
};