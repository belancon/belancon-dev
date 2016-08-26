<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-control" content="no-cache">
	<meta http-equiv="Expires" content="0">

	<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/public/themes/belancon/img/favicon.ico">
	<?php
		// Page Title
		if(isset($theme['assets']['header']['title']))
			echo $this->template->get_title() . "\n";

		// Meta Tags
		if(isset($theme['assets']['header']['meta'])) {
			foreach($this->template->get_meta() as $meta_tag) {
				echo $meta_tag . "\n";
			}
		}

		// Custom CSS Files
		if(isset($theme['assets']['header']['css'])) {
			foreach($this->template->get_css() as $css_file) {
				echo $css_file . "\n";
			}
		}

		// Custom JS Files
		if(isset($theme['assets']['header']['js'])) {
			foreach($this->template->get_js('header') as $js_file) {
				echo $js_file . "\n";
			}
		}
	?>	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-80819561-1', 'auto');
	  ga('send', 'pageview');

	</script>	
</head>
<body>

	<!-- Header & Navbar -->
	<div id="header">
	  <?php  
	  	if(isset($parts['navbar'])) {
            echo $parts['navbar'];
        }
	  	if(isset($parts['header'])) {
            echo $parts['header'];
        }
	  ?>
	</div>
	<!-- End Header & Navbar -->

	<!-- Loader -->
	<?php 
		if(isset($parts['loader'])) {
            echo $parts['loader'];
        }
	?>
	<!-- end Loader -->

	<div id="home-icons" class="home-icons-loaded" style="padding-top: 50px;">
	  <div class="container">
	  	<!-- Notifications -->
	  	<div class="notification">
	    <?php
	    if(isset($parts['notification'])) {
            echo $parts['notification'];
        }
        ?>
        </div>
        <!-- End Notifications -->
	    
	    <!-- MAIN CONTENT -->
	    <?php 
            if(isset($content)) {
                echo $content;
            }
        ?>
        <!-- END MAIN CONTENT -->
	  </div>
	</div>

	<!-- About -->
	<div id="about">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-6">
	        <img id="img-home-about" src="<?php echo base_url('assets/public/themes/belancon');?>/img/about.png" class="img-responsive" alt="">
	      </div>
	      <div class="col-md-6">
	        <h2 class="green-color" style="margin-top: 110px; margin-bottom: 30px;">
	        <?php echo setting_lang('heading_introduction');?>
	        </h2>
	        <?php
	        $desc = setting_lang('desc_introduction');
	        $desc = explode(".", $desc, 3);
	        ?>
	        <p style="line-height: 1.6;">
	         <?php echo $desc[0].".".$desc[1];?>
	        </p>
	        <p style="line-height: 1.6;">
	          <?php echo $desc[2];?>
	        </p>
	        <p style="margin-top: 30px;">
	          <a href="<?php echo site_url('contributor/join');?>" class="btn btn-primary btn-green-primary"><?php echo setting_lang('btn_join_contributor');?></a>
	        </p>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- end About -->

	<!-- Footer -->
	<?php
        if(isset($parts['footer'])) {
            echo $parts['footer'];
        }
    ?>
    <!-- end Footer -->

    <script type="text/javascript" src="<?php echo base_url('assets/public/themes/belancon/js/jquery-1.12.1.min.js');?>"></script>

    <script type="text/javascript">
	    BASE_URL = "<?php echo base_url();?>";
	    var csrfData = {};
	    	csrfData['<?php echo (string) $this->security->get_csrf_token_name()?>'] = '<?php echo (string) $this->security->get_csrf_hash()?>';
	    	$.ajaxSetup({
	    		data: csrfData
	    	});
	    csrf_token_name = '<?php echo (string) $this->security->get_csrf_token_name()?>';

	    $.ajaxSetup({
		  beforeSend: function() {
		     $('#loader').fadeIn();
		     $('.overlay-loader').fadeIn();
		  },
		  complete: function(){
		    $('#loader').fadeOut(1000);
		    $('.overlay-loader').fadeOut(1000);
		  },
		  success: function() {}
		});
	</script>

	<?php
        // Custom JS Files
        if(isset($theme['assets']['footer']['js'])) {
            foreach($this->template->get_js('footer') as $js_file) {
                echo $js_file . "\n";
            }
        }

    ?>
</body>
</html>