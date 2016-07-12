<?php
	// Custom JS Files
	if(isset($theme['assets']['footer']['js'])) {
		foreach($this->template->get_js('footer') as $js_file) {
			echo $js_file . "\n";
		}
	}

?>

<!-- CUSTOM SCRIPT JS -->
<script  src="<?php echo base_url();?>/js/general.js"></script>
<script  src="<?php echo base_url();?>/js/user.js"></script>
<script  src="<?php echo base_url();?>/js/icon.js"></script>
<script  src="<?php echo base_url();?>/js/cart.js"></script>
<script  src="<?php echo base_url();?>/js/script.js"></script>
</body>
</html>