<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">
		<h2 class="pull-left">Icon Kamu</h2>
		<a href="<?php echo site_url('member/add-icon');?>" style="margin-top: 20px;" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Icon</a>		
		<div class="clearfix">
		</div>

		<hr>

		<div class="row" style="margin-bottom:50px;">
			<div class="col-md-4 pull-right">
			<div class="input-group">			 
			  <input type="text" class="form-control" id="search" placeholder="Pencarian cepat Icon" />
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

