/**
 * Member Object
 * @type {Object}
 */
Member = {
  clearList: function() {
    $('#my-icon-list').html('');
  },
	/**
   * Get list icon via ajax and get back return array json from server
   * @param  {[type]} page   [description]
   * @param  {[type]} by     [description]
   * @param  {[type]} search [description]
   * @return {[type]}        [description]
   */
  getIcon: function(page, search) {
    var self = this;
    var search = search ? search : "";
    
    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/get_by_user",
     cache: false,    
     data: {page: page, search: search},      
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
        $('#my-icon-list').append.apply($('#my-icon-list'), items);
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
     var spanRemoveIcon = document.createElement("span");
     var divImgIcon = document.createElement("div");     
     var imgIcon = document.createElement("img");
     var btnUpdate = document.createElement("a");
     var btnRemove = document.createElement("a");

     divIconItem.setAttribute("class", "col-md-2 col-xs-4 col-sm-3 icon-item");
     spanDownloadIcon.setAttribute("class", "download-icon");
     spanDownloadIcon.setAttribute("data-id", icon.id);
     spanRemoveIcon.setAttribute("class", "view-icon");

     divImgIcon.setAttribute("class", "text-center img-icon");
     imgIcon.setAttribute("src", icon.path);
     imgIcon.setAttribute("height", "80");
     imgIcon.setAttribute("data-icon-type", "cc");
     imgIcon.setAttribute("id", icon.id);
     divImgIcon.appendChild(imgIcon);

     btnUpdate.setAttribute("data-id", icon.id);
     btnUpdate.setAttribute("href", "javascript:void(0)");
     btnUpdate.setAttribute("class", "fa fa-pencil fa-lg btn-update-icon");
     btnUpdate.setAttribute("title", "Ubah Icon");
     spanDownloadIcon.appendChild(btnUpdate);

     btnRemove.setAttribute("data-id", icon.id);
     btnRemove.setAttribute("data-name", icon.name);
     btnRemove.setAttribute("href", "javascript:void(0)");
     btnRemove.setAttribute("class", "fa fa-trash fa-lg btn-remove-icon");
     btnRemove.setAttribute("title", "Hapus Icon");
     spanRemoveIcon.appendChild(btnRemove);

     divIconItem.appendChild(spanDownloadIcon);
     divIconItem.appendChild(spanRemoveIcon);
     divIconItem.appendChild(divImgIcon);

     callback(divIconItem);
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
  removeIcon: function(id, name) {
    var self = this;
  
    //show alert warning before remove icon from cart
    swal({
      title: "Hapus Icon",
      text: "Yakin Ingin menghapus icon " + name + "?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: true,
      showLoaderOnConfirm: true
    }, function () {        
        //if clicked confirmation, call method to remove icon from cart
        $.ajax({
         type: "post",
         url: BASE_URL + "icon/delete",
         cache: false,    
         data: {id: id, name: name},
         success: function(response){        
           response  = JSON.parse(response);
           // console.log(response);
           
          if(response.status === true) {          
            location.reload();                         
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
          }          
         },
         error: function(){      
                  
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
  }
}