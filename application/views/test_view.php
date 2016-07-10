<?php

foreach ($icons as $key => $value): ?>
	<div class="col-md-2 col-xs-4 col-sm-3 icon-item">
		<span class="download-icon">
			<a onclick="addToCart(this); return false;" data-name="<?php echo $value['name'];?>" data-id="1" href="javascript:void(0)"><i class="fa fa-shopping-basket"></i></a>
		</span>
		<div class="text-center img-icon">
			<img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-1.png" height="80" id="c" data-icon-type="cc" />
		</div>
	</div> 

<?php
endforeach;
?>