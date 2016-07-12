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
        var limit = data.length < 3 ? data.length : 3;

        //populate data
        if(data.length > 0) {
          for(var i=0; i < limit; i++) {
            //push data to content html
            var item = self.setSingleItemOnCart(data[i]);
            items.push(item);
          }

          items.push(liDownload);
          $('.total-icons-keranjang').show();
        } else {
          $('.total-icons-keranjang').hide();
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
  addToCart: function(id, name) {
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
          //toggle button action to icon item
          $('.btn-add-cart[data-id="'+ id +'"]').remove();
          var btnRemove = self.getBtnRemoveIcon(id, name);
          $('.download-icon[data-id="'+ id +'"]').append(btnRemove);
          swal(name, "ditambahkan ke keranjang", "success")
       }
     },
     error: function(){      
      sweetAlert("Oops...", "Terjadi kesalahan pada sistem", "error");
     }
    });
  },
  removeFromCart: function(id, name) {
    var self = this;
    var token = sessionStorage.getItem('userNotRegistered');

    swal({
      title: "Hapus Icon",
      text: "Ingin menghapus icon " + name + " dari cart?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      showLoaderOnConfirm: true
    }, function () {
        $.ajax({
         type: "post",
         url: BASE_URL + "icon/remove_from_cart",
         cache: false,    
         data: {id: id, token: token},
         success: function(response){        
           response  = JSON.parse(response);
           // console.log(response);
           swal("Deleted!", 
            "Icons telah dihapus dari keranjang.", 
            "success");
           Icon.getCart();
           Cart.getAll();
           //toggle button action on icon item.
           $('.btn-remove-cart[data-id="'+ id +'"]').remove();
           var btnAdd = self.getBtnAddIcon(id, name);
           $('.download-icon[data-id="'+ id +'"]').append(btnAdd);
         },
         error: function(){      
          sweetAlert("Oops...", "Terjadi kesalahan pada sistem", "error");
         }
        }); 
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

    return liCart;
  },
  /**
   * Generate Element Html to display single icon
   * @param {[type]} icon [description]
   */
  setSingleContent: function(icon) {
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
        var btnRemove = this.getBtnRemoveIcon(icon.id, icon.name);
        spanDownloadIcon.appendChild(btnRemove); 
     } else {
        var btnAdd = this.getBtnAddIcon(icon.id, icon.name);
        spanDownloadIcon.appendChild(btnAdd); 
     }

     divImgIcon.setAttribute("class", "text-center img-icon");
     imgIcon.setAttribute("src", icon.path);
     imgIcon.setAttribute("height", "80");
     imgIcon.setAttribute("data-icon-type", "cc");
     imgIcon.setAttribute("id", icon.id);
     divImgIcon.appendChild(imgIcon);

     btnView.setAttribute("data-id", icon.id);
     btnView.setAttribute("href", "javascript:void(0)");
     btnView.setAttribute("class", "fa fa-eye fa-lg btn-view-icon");
     spanViewIcon.appendChild(btnView);

     divIconItem.appendChild(spanDownloadIcon);
     divIconItem.appendChild(spanViewIcon);
     divIconItem.appendChild(divImgIcon);

     return divIconItem;
  },
  getBtnAddIcon: function(id, name) {
    var btnAdd = document.createElement("a");     
    var iconAdd = document.createElement("i");
    btnAdd.setAttribute("class", "btn-add-cart");
    btnAdd.setAttribute("data-id", id);
    btnAdd.setAttribute("data-name", name);   
    btnAdd.setAttribute("href", "javascript:void(0)");
    iconAdd.setAttribute("class", "fa fa-shopping-basket");
    btnAdd.appendChild(iconAdd);

    return btnAdd;
  },
  getBtnRemoveIcon: function(id, name) {
    var btnRemove = document.createElement("a");
    var iconRemove = document.createElement("i");
    btnRemove.setAttribute("class", "btn-remove-cart");
    btnRemove.setAttribute("data-id", id);
    btnRemove.setAttribute("data-name", name);     
    btnRemove.setAttribute("href", "javascript:void(0)");
    iconRemove.setAttribute("class", "fa fa-trash");
    btnRemove.appendChild(iconRemove);

    return btnRemove;     
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
  view: function(id, callback) {
    $('#modal-content-large-icon').html("");
    //Ajax method
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
      sweetAlert("Oops...", "Terjadi kesalahan pada sistem", "error");
     }
    });
  },
};