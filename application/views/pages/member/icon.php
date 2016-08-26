<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('_parts/sidebar'); ?>
	</div>
	<div class="col-md-10">
		<h2><?php echo setting_lang('member_icon_heading');?></h2>		
		<hr>
		<a href="<?php echo site_url('member/add-icon');?>" class="btn btn-green-primary"><i class="fa fa-plus"></i> <?php echo setting_lang('member_icon_btn_add');?></a>
		
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

