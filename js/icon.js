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
     data: {page: page, by: by, search: search},
      // 'page=' + page + "&by=" + by + "&search=" + search,
     success: function(response){        
        response = JSON.parse(response);
        //console.log(response);
        var items=[]; 
        var data = response.data;

        //populate data
        if(data.length > 0) {
          for(var i=0; i < data.length; i++) {
            //push data to content html
            self.setSingleContent(data[i], function(result) {
              items.push(result);
            });            
          }
        } else {
          items.push('<h2 class="text-center" style="color: #3d3938;">Maaf, Icon tidak ditemukan</h2>');
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
  /**
   * get all icon on cart
   * @return {[type]} [description]
   */
  getCart: function() {
    var self = this;
    //clear list cart on page
    $('.dropdown-keranjang').html("");

    //set button download element
    var liDownload = '<li class="divider"></li>';
    liDownload += '<li style="padding-top: 20px; padding-bottom: 30px;" id="btn-download-cart">';
    liDownload += '<a href="'+ BASE_URL +'cart">';
    liDownload += '<span class="green-color glyphicon glyphicon-save" aria-hidden="true"></span> Download all Icons </a> </li>';
                                  
    //set list element if cart empty  
    var liEmpty = '<li style="padding-top: 20px; padding-bottom: 30px;" id="li-cart-empty">Cart Empty</li>';

    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/get_cart",
     cache: false,    
     data: {},
     success: function(response){        
        response = JSON.parse(response);
        //console.log(response);
        var items=[]; 
        var data = response.data;
        var limit = data.length < 3 ? data.length : 3; //limit only 3 icon show on cart

        //populate data
        if(data.length > 0) {
          for(var i=0; i < limit; i++) {
            //push data to content html
            var item = self.setSingleItemOnCart(data[i], function(result) {
              items.push(result);  
            });
            
          }

          items.push(liDownload);
          $('.total-icons-keranjang').show();
        } else {
          $('.total-icons-keranjang').hide();
          items.push(liEmpty);
        }

        //and append all icons to display in cart list
        $('.dropdown-keranjang').append.apply($('.dropdown-keranjang'), items);
     },
     error: function(){      
      alert('Error while request..');
     }
    });
  },
  /**
   * add icon to cart
   * @param {[type]} id   [description]
   * @param {[type]} name [description]
   */
  addToCart: function(id, name, callback) {
    var self = this;
    $('.download-icon[data-id="'+ id +'"]').html("");
    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/add_to_cart",
     cache: false,    
     data: {id: id},
     success: function(response){        
       response  = JSON.parse(response);
       if(response.status === true) {
          //refresh cart
          self.getCart();
          //toggle button action to icon item         
          self.setBtnRemoveIcon(id, name, function(result) {
            $('.download-icon[data-id="'+ id +'"]').append(result);
          });                 
          var opts = {
          "debug": false,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "100",
          "hideDuration": "100",
          "timeOut": "1000",
          "extendedTimeOut": "300",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
          };
          toastr.success("Success ditambahkan ke keranjang.", name, "Success !", opts);           

          if(callback) {
            callback(response.status);
          }
       }
     },
     error: function(){    
      self.setBtnAddIcon(id, name, function(result) {
        $('.download-icon[data-id="'+ id +'"]').append(result);    
      });        
        var opts = {
          "debug": false,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "100",
          "hideDuration": "500",
          "timeOut": "1000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };
        toastr.success("Terjadi kesalahan pada sistem.", "Oops...", opts);

        if(callback) {
          callback(response.status);
        }
     }
    });
  },
  /**
   * remove icon selected from cart
   * @param  {[type]} id   [description]
   * @param  {[type]} name [description]
   * @return {[type]}      [description]
   */
  removeFromCart: function(id, name, callback) {
    var self = this;
  
    //show alert warning before remove icon from cart
    swal({
      title: "Hapus Icon",
      text: "Ingin menghapus icon " + name + " dari cart?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: true,
      showLoaderOnConfirm: true
    }, function () {
         $('.download-icon[data-id="'+ id +'"]').html("");
        //if clicked confirmation, call method to remove icon from cart
        $.ajax({
         type: "post",
         url: BASE_URL + "icon/remove_from_cart",
         cache: false,    
         data: {id: id},
         success: function(response){        
           response  = JSON.parse(response);
           // console.log(response);
           
           if(response.status === true) {          
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
            toastr.success("Success dihapus dari keranjang.", name,  "Terhapus !", opts);                        
             //toggle button action on icon item.           
             self.setBtnAddIcon(id, name, function(result) {
                $('.download-icon[data-id="'+ id +'"]').append(result);    
             });             

            if(callback) {
              callback(response);
            }

            //switch button action on page detail icon 
            Belancon.isPageDetailIcon(function(result) {
              if(result === true) {
                self.setButtonAddToCartPageDetail(id, name);
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
              toastr.error("Icons gagal dihapus dari keranjang..", "Warning !", opts);          
             //toggle button action on icon item.           
             self.setBtnRemoveIcon(id, name, function(result) {
                $('.download-icon[data-id="'+ id +'"]').append(result);             
             });     

            if(callback) {
              callback(response);
            }
          }

          //refresh cart
          Icon.getCart();
          Cart.getAll();
         },
         error: function(){      
          self.setBtnRemoveIcon(id, name, function(result) {
            $('.download-icon[data-id="'+ id +'"]').append(result);
          });          
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
            toastr.error("Terjadi kesalahan pada sistem.", "Warning !", opts);
         }
        }); 
    });   
  },
  /**
   * set element html for single item on cart list
   * @param {[type]} icon [description]
   */
  setSingleItemOnCart: function(icon, callback) {
    var liCart = document.createElement("li");
    var imgCart = document.createElement("img");
    var spanCart = document.createElement("span");
    var btnRemove = document.createElement("a");
    var iconRemove = document.createElement("i");
    var textRemove = document.createTextNode(" Hapus");

    btnRemove.setAttribute("class", "black-color btn-remove-cart");
    btnRemove.setAttribute("data-id", icon.id);
    btnRemove.setAttribute("data-name", icon.name);
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

    callback(liCart);
    return true;
  },
  /**
   * set Element Html to display single icon on page
   * @param {[type]} icon [description]
   */
  setSingleContent: function(icon, callback) {
     var divIconItem = document.createElement("div");
     var spanDownloadIcon = document.createElement("span");
     var spanViewIcon = document.createElement("span");
     var divImgIcon = document.createElement("div");     
     var imgIcon = document.createElement("img");
     var btnView = document.createElement("a");

     divIconItem.setAttribute("class", "col-md-2 col-xs-4 col-sm-3 icon-item");
     spanDownloadIcon.setAttribute("class", "download-icon");
     spanDownloadIcon.setAttribute("data-id", icon.id);
     spanViewIcon.setAttribute("class", "view-icon");
     
     if(icon.onCart === true) {
        this.setBtnRemoveIcon(icon.id, icon.name, function(result) {
          spanDownloadIcon.appendChild(result);   
        });
        
     } else {
        this.setBtnAddIcon(icon.id, icon.name, function(result) {
          spanDownloadIcon.appendChild(result); 
        });        
     }

     divImgIcon.setAttribute("class", "text-center img-icon");
     imgIcon.setAttribute("src", icon.path);
     imgIcon.setAttribute("height", "80");
     imgIcon.setAttribute("data-icon-type", "cc");
     imgIcon.setAttribute("id", icon.id);
     divImgIcon.appendChild(imgIcon);

     btnView.setAttribute("href", BASE_URL + "icons/" + icon.url);
     btnView.setAttribute("class", "fa fa-eye fa-lg btn-view-icon");
     spanViewIcon.appendChild(btnView);

     divIconItem.appendChild(spanDownloadIcon);
     divIconItem.appendChild(spanViewIcon);
     divIconItem.appendChild(divImgIcon);

     callback(divIconItem);
     return true;
  },
  /**
   * set button action add to cart on single content icon on page
   * @param  {[type]} id   [description]
   * @param  {[type]} name [description]
   * @return {[type]}      [description]
   */
  setBtnAddIcon: function(id, name, callback) {
    var btnAdd = document.createElement("a");     
    var iconAdd = document.createElement("i");
    btnAdd.setAttribute("class", "btn-add-cart");
    btnAdd.setAttribute("data-id", id);
    btnAdd.setAttribute("data-name", name);   
    btnAdd.setAttribute("href", "javascript:void(0)");
    iconAdd.setAttribute("class", "fa fa-shopping-basket");
    btnAdd.appendChild(iconAdd);

    callback(btnAdd);
    return true;
  },
  /**
   * set button action remove from cart on single content icon on page
   * @param  {[type]} id   [description]
   * @param  {[type]} name [description]
   * @return {[type]}      [description]
   */
  setBtnRemoveIcon: function(id, name, callback) {
    var btnRemove = document.createElement("a");
    var iconRemove = document.createElement("i");
    btnRemove.setAttribute("class", "btn-remove-cart");
    btnRemove.setAttribute("data-id", id);
    btnRemove.setAttribute("data-name", name);     
    btnRemove.setAttribute("href", "javascript:void(0)");
    iconRemove.setAttribute("class", "fa fa-trash");
    btnRemove.appendChild(iconRemove);

    callback(btnRemove);     
    return true;
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
      var textLoadmore = document.createTextNode("SELANJUTNYA");
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
    var paramSearch = Belancon.getUrlParameter('search') ? Belancon.getUrlParameter('search'): null;
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
    var paramBy = Belancon.getUrlParameter('by') ? Belancon.getUrlParameter('by'): null;
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
  /**
   * view detail/large icon using modal element
   * @param  {[type]}   id       [description]
   * @param  {Function} callback [description]
   * @return {[type]}            [description]
   */
  view: function(id, callback) {
    $('#modal-content-large-icon').html("");
    //Ajax method to get icon detail
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/get_one",
     cache: false,    
     data: {id: id},
     success: function(response){        
        response = JSON.parse(response);
        var data = response.data;
        var imgIcon = '<img src="'+ data.path +'" />';
        $('#modal-content-large-icon').append(imgIcon);
        callback(response.status);
     },
     error: function(){      
        /** Message Error */        
        var opts = {
          "debug": false,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "300",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };
        toastr.error("Terjadi kesalahan pada sistem.", "Warning !", opts);
     }
    });
  },
  setButtonAddToCartPageDetail: function(id, name) {
    console.log("setButtonAddToCartPageDetail")

    $('#div-action-cart').html('');
    var btnAdd = '<a href="#" class="btn-detail-add-cart" data-id="' + id + '" data-name="' + name + '">';
    btnAdd += '<div class="col-md-12 btn-cart">Add to Cart</div>';
    btnAdd += '</a>';

    $('#div-action-cart').append(btnAdd);
  },
  setButtonRemoveFromCartPageDetail: function(id, name) {
    $('#div-action-cart').html('');
    var btnRemove = '<a href="#" class="btn-detail-remove-cart" data-id="' + id + '" data-name="' + name + '">';
    btnRemove += '<div class="col-md-12 btn-cart">Remove from Cart</div>';
    btnRemove += '</a>';
    $('#div-action-cart').append(btnRemove);
  }
};