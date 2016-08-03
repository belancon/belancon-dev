<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">
		<h2>Icon Member</h2>		
		<hr>
		<a href="<?php echo site_url('member/add-icon');?>" class="btn btn-green-primary"><i class="fa fa-plus"></i> Tambah icon</a>
		
		<br />

		<div class="row" style="margin-bottom:50px;">
			<div class="col-md-4 pull-right">
			<div class="input-group">			 
			  <input type="text" class="form-control" id="search" />
			  <span class="input-group-addon"><i class="fa fa-search"></i></span>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div id="my-icon-list">
					
				</div>
			</div>
		</div>

		<div class="row">
	        <div class="col-md-6 col-md-offset-3">
	          <div class="text-center" id="content-loadmore">
	            
	          </div>
	        </div>	        
	    </div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		var paramSearch = Belancon.getUrlParameter('search') ? Belancon.getUrlParameter('search') : null;
		var search = paramSearch ? paramSearch : "";

		Member.getIcon(1, search);

		/**
	     * Action when button remove icon clicked    
	     */
	    $(document).on('click', '.btn-update-icon', function(){ 
	       var id = $(this).attr('data-id');	    
	       window.location = BASE_URL + "member/update-icon/" + id;
	    }); 

		/**
	     * Action when button remove icon clicked    
	     */
	    $(document).on('click', '.btn-remove-icon', function(){ 
	      var id = $(this).attr('data-id');
	      var name = $(this).attr('data-name');

	      Member.removeIcon(id, name);
	    });     

	    /**
	     * Action When Button Loadmore clicked
	     */
	    $(document).on('click', '#btn-load-more', function(){    
	      var currentUrlString = window.location.href;
	      var currentUrlArr = currentUrlString.split("?");
	      var currentUrl = currentUrlArr[0];
	            
	      var paramSearch = Belancon.getUrlParameter('search') ? Belancon.getUrlParameter('search') : null;

	      var search = paramSearch ? paramSearch : "";
	      var page = $(this).attr('data-page');

	      Member.getIcon(page, search);	      	   
	    });

	    /**
	     * Action When Search Form Submitted
	     */
	    $('#search').keyup(function(e){
	      e.preventDefault();
	      if(e.keyCode == 13) {
		    var search = $('#search').val().trim();
		    
		    if(search.length > 0) {
		    	window.history.pushState("", "", BASE_URL + "member/icon?search=" + search);
		    } else {
		    	window.history.pushState("", "", BASE_URL + "member/icon");
		    }

		    Member.clearList();
		    Member.getIcon(1, search);
	  	  }
	    });
	});
</script>