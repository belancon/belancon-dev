Cart = {
  /**
   * get all icon on cart
   * @return {[type]} [description]
   */
  getAll: function() {
    var self = this;
    //clear table
    $('#table-body-cart').html("");

    //set row if cart empty
    var rowEmpty = '<tr><td colspan="10">No Items. Silahkan <a href="'+ BASE_URL +'">tambahkan Icon</a> pada Keranjang.</td></tr>';

    //Ajax method 
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/get_cart",
     cache: false,    
     data: {},
     success: function(response){        
        response = JSON.parse(response);
        //console.log(response.data);
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

        //and append all icons to display in cart page
        $('#table-body-cart').append.apply($('#table-body-cart'), items);
        
     },
     error: function(){      
        var opts = {
          "debug": false,
          "positionClass": "toast-bottom-right",
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };
        toastr.success("Terjadi kesalahan pada sistem.", "Oops...", opts);
     }
    });
  },
  /**
   * set row to append on the table cart
   * @param {[type]} icon [description]
   */
  setRow: function(icon) {
    var row = '<tr>';
    row += '<td><img src="'+ icon.path +'" /></td>';
    row += '<td>' + icon.name + '</td>';
    row += '<td><a href="' + BASE_URL + 'result?search='+ icon.category +'">'+ icon.category +'</a></td>';
    row += '<td> Rp. '+ icon.price +'</td>';
    row += icon.availablePng === true ? '<td><i class="fa fa-check fa-2 text-success"></i></td>' : '<td><i class="fa fa-times fa-2 text-danger"></i></td>';
    row += icon.availablePsd === true ? '<td><i class="fa fa-check fa-2 text-success"></i></td>' : '<td><i class="fa fa-times fa-2 text-danger"></i></td>';
    row += icon.availableAi === true ? '<td><i class="fa fa-check fa-2 text-success"></i></td>' : '<td><i class="fa fa-times fa-2 text-danger"></i></td>';
    row += icon.availableCdr === true ? '<td><i class="fa fa-check fa-2 text-success"></i></td>' : '<td><i class="fa fa-times fa-2 text-danger"></i></td>';
    row += icon.availableSvg === true ? '<td><i class="fa fa-check fa-2 text-success"></i></td>' : '<td><i class="fa fa-times fa-2 text-danger"></i></td>';
    row += '<td> <button class="btn-remove-cart btn btn-xs btn-danger" data-id="'+icon.id+'" data-name="'+ icon.name +'"><i class="fa fa-trash"></i></button>';
    row += '</tr>';

    return row;
  },
  /**
   * get two icon randomly from database and insert to cart (for demo)
   */
  setDefaultCart: function() {
    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/set_default_cart",
     cache: false,    
     data: {},
     success: function(response){        
        
     },
     error: function(){      
        var opts = {
          "debug": false,
          "positionClass": "toast-bottom-right",
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };
        toastr.success("Terjadi kesalahan pada sistem.", "Oops...", opts);
     }
    });
  },
  /**
   * clear / empty cart
   * @return {[type]} [description]
   */
  clearAll: function() {
    
    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/clear_cart",
     cache: false,    
     data: {},
     success: function(response){        
        
     },
     error: function(){      
        var opts = {
          "debug": false,
          "positionClass": "toast-bottom-right",
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };
        toastr.success("Terjadi kesalahan pada sistem.", "Oops...", opts);
     }
    });
  }
};