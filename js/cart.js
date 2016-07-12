Cart = {
  getAll: function() {
    var self = this;
    $('#table-body-cart').html("");

    var rowEmpty = '<tr><td colspan="5">No Item</td></tr>';

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
      sweetAlert("Oops...", "Terjadi kesalahan pada sistem", "error");
     }
    });
  },
  setRow: function(icon) {
    var row = '<tr>';
    row += '<td><img src="'+ icon.path +'" /></td>';
    row += '<td>' + icon.name + '</td>';
    row += '<td><a href="result.html?=Zonk">'+ icon.category +'</a></td>';
    row += '<td> Rp. '+ icon.price +'</td>';
    row += '<td> <button class="btn-remove-cart btn btn-xs btn-danger" data-id="'+icon.id+'" data-name="'+ icon.name +'"><i class="fa fa-trash"></i></button>';
    row += '</tr>';

    return row;
  },
  setDefaultCart: function() {
    //Ajax method
    $.ajax({
     type: "post",
     url: BASE_URL + "icon/set_default_cart",
     cache: false,    
     data:'',
     success: function(response){        
        
     },
     error: function(){      
      sweetAlert("Oops...", "Terjadi kesalahan pada sistem", "error");
     }
    });
  },
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
      sweetAlert("Oops...", "Terjadi kesalahan pada sistem", "error");
     }
    });
  }
};