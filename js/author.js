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
     var divImgIcon = document.createElement("div");     
     var imgIcon = document.createElement("img");     
     var spanView = document.createElement("span");
     var btnView = document.createElement("a");

     divIconItem.setAttribute("class", "col-md-2 col-xs-4 col-sm-3 icon-item");

     divImgIcon.setAttribute("class", "text-center img-icon");
     imgIcon.setAttribute("src", icon.path);
     imgIcon.setAttribute("height", "80");
     imgIcon.setAttribute("data-icon-type", "cc");
     imgIcon.setAttribute("id", icon.id);
     divImgIcon.appendChild(imgIcon);

     btnView.setAttribute("href", BASE_URL + "icons/" + icon.url);
     btnView.setAttribute("class", "fa fa-eye fa-lg btn-view-icon");
     spanView.setAttribute("class", "view-icon");

     spanView.appendChild(btnView);

     divIconItem.appendChild(spanView);
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
}