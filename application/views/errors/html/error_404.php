<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <title>404 page Not Found - Belancon | Belanja Icon</title>
  <link rel="icon" type="image/x-icon" href="<?php echo config_item('base_url');?>assets/public/themes/belancon/img/favicon.ico">
  <link href="<?php echo config_item('base_url');?>assets/public/themes/belancon/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo config_item('base_url');?>assets/public/themes/belancon/css/style-404.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo config_item('base_url');?>assets/public/themes/belancon/css/style-horizontal.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo config_item('base_url');?>assets/public/themes/belancon/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo config_item('base_url');?>assets/public/themes/belancon/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

  <body class="cyan">
  <div id="error-page">

    <div class="row">
      <div class="col s12">
        <div class="browser-window">
          <div class="top-bar">
            <div class="circles">
              <div id="close-circle" class="circle"></div>
              <div id="minimize-circle" class="circle"></div>
              <div id="maximize-circle" class="circle"></div>
            </div>
          </div>
          <div class="content" style="box-shadow: 0 2px 5px 0 rgba(16, 14, 14, 0.57), 0 2px 10px 0 rgba(0, 0, 0, 0.18);">
            <div class="row">
              <div id="site-layout-example-top" class="col s12">
                <p class="flat-text-logo center white-text caption-uppercase">Maaf, halaman ini tidak tersedia</p>
              </div>
              <div id="site-layout-example-right" class="col s12 m12 l12">
                <div class="row center">
                  <h1 class="text-long-shadow col s12">404</h1>
                </div>
                <div class="row center">
                  <p class="center white-text col s12">Tautan yang Anda ikuti mungkin telah rusak.</p>
                  <p class="center s12"><button onclick="goBack()" class="btn waves-effect waves-light">Back</button> <a href="<?php echo config_item('base_url');?>" class="btn waves-effect waves-light">Homepage</a>
                    <p>
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function goBack() {
      window.history.back();
    }
  </script>
</body>
</html>
