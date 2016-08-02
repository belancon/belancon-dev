/**
 * Member Object
 * @type {Object}
 */
Author = {
  clearList: function() {
    $('#icon-list').html('');
  },
	/**
   * Get list icon via ajax and get back return array json from server
   * @param  {[type]} page   [description]
   * @param  {[type]} by     [description]
   * @param  {[type]} search [description]
   * @return {[type]}        [description]
   */
  getIcon: function(id, page, search) {
    var self = this;
    var search = search ? search : "";
    
    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/get_by_user",
     cache: false,    
     data: {userId: id, page: page, search: search},      
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
}