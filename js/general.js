Belancon = {
	/**
	 * Get Param from url
	 * @param  {[type]} sParam [description]
	 * @return {[type]}        [description]
	 */
	getUrlParameter: function(sParam) {
	  var sPageURL = window.location.search.substring(1).split('&');
	  for (var i = 0; i < sPageURL.length; i++) {
	    var sParameterName = sPageURL[i].split('=');
	    if (sParameterName[0] == sParam) {
	      return sParameterName[1];
	    }
	  }
	},
	isPageDetailIcon: function(callback) {
		var path = window.location.pathname;
    	var test = path.split("/");

    	if(test[2] === "icons") {
    		callback(true);
    	} else {
    		callback(false);
    	}
	}
}