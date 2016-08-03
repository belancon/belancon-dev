
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="http://localhost/belancon/assets/public/themes/belancon/img/favicon.ico">
  <title>Belancon | Belanja Icon untuk Kebutuhan Desainmu</title>
<meta name="author" content="Belancon Team">
<meta name="keyword" content="Download free Icons, Download Icon Gratis, Flat Icon Gratis">
<meta name="description" content="Download gratis Icon untuk kebutuhan design website, design flyer, design print-out">
<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url');?>assets/public/themes/belancon/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url');?>assets/public/themes/belancon/css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url');?>assets/public/themes/belancon/css/toastr.css">
<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url');?>assets/public/themes/belancon/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url');?>assets/public/themes/belancon/css/font-awesome.css">
<script type="text/javascript" src="<?php echo config_item('base_url');?>assets/public/themes/belancon/js/jquery-1.12.1.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){

      BASE_URL = "<?php echo config_item('base_url');?>";

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
  });
  </script>
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
  <div id="header" style="padding-bottom: 0;">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="" href="<?php echo config_item('site_url');?>/">
              <img class="belancon-logo" src="<?php echo config_item('base_url');?>assets/public/themes/belancon/img/logo-belancon.png" height="30" alt="logo belancon.com" />
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search icon">
              </div>
              <button type="submit" class="btn btn-default">Find</button>
            </form> -->
            <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo config_item('site_url');?>login" class="btn-yellow-primary no-shadow">Masuk</a></li>
              <!-- <li><a href="#" class="btn white-color">Register</a></li>    -->
                            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="total-icons-keranjang">
                  </span>
                  <span class="fa fa-shopping-basket fa-lg"></span>
                </a>
                <ul class="dropdown-keranjang dropdown-menu scrollable-menu">
                 
                                 
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>  </div>
  <!-- End Header & Navbar -->

  <!-- Loader -->
  <div id="loader" style="display:none">  
  <img src="<?php echo config_item('base_url');?>assets/public/themes/belancon/img/loader.svg" />
</div>  <!-- end Loader -->

  <div id="home-icons" class="home-icons-loaded" style="padding-top: 50px;">
    <div class="container">
      <!-- Notifications -->
      <div class="row">
  <div class="col-md-12">
          </div>
</div>        <!-- End Notifications -->
      
      <!-- MAIN CONTENT -->
      <div class="row page-404">
  <div class="col-md-8 col-md-offset-2">

    <div class="col-md-8 col-sm-12 col-xs-12">
      <div class="text-404 text-center" style="margin-top: -40px;">
        <font class="roboto" color="#66ae53">4</font><font class="mono" color="#3d3938">0</font><font class="roboto" color="#fdaa3e">4</font>
      </div>
      <h4 class="text-center">
        HALAMAN YANG ANDA CARI TIDAK DITEMUKAN
      </h4>

      <form class="form-inline" style="margin-left: 10px; margin-top: 30px;" id="form-search">
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <!-- <label for="exampleInputEmail2">Email</label> -->
          <input type="text" style="width: 66% !important; margin-right: 5px;" class="col-xs-8 col-md-8 col-sm-8 form-control" placeholder="Kategori, Tags, Nama Icon" id="search">
          <button type="submit" style="width: 30%;" class="col-xs-4 col-md-4 btn col-sm-4 btn-default btn-green-primary no-shadow">Search</button>
          <div class="clearfix"></div>
          <p class="help-block">Temukan Icon dengan berbagai kategori.</p>
        </div>
      </form>

    </div>

    <div class="col-md-4 col-xs-12 col-sm-12">
      <img src="<?php echo config_item('base_url');?>assets/public/themes/belancon/img/mascot-404-compressed.png" alt="" class="img-responsive" />
    </div>
  </div>
</div>        <!-- END MAIN CONTENT -->
    </div>
  </div>


  <!-- Footer -->
  <div id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img class="belancon-logo" src="<?php echo config_item('base_url');?>assets/public/themes/belancon/img/logo-belancon.png" height="40" alt="logo belancon.com" />
        </div>
        <div class="text-center">
          <ul class="primary-menus">
            <li><a href="<?php echo config_item('site_url');?>term-of-service">
              Syarat & Ketentuan
            </a></li>
            <li><a href="<?php echo config_item('site_url');?>privacy-policy">
              Kebijakan Privasi
            </a></li>
            <li><a href="<?php echo config_item('base_url');?>assets/public/themes/belancon/about/LICENSE.txt" target="_blank">
              Lisensi
            </a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 30px;">
      <div class="col-md-8 col-md-offset-2">
        <div class="col-md-4 text-center">
          <h4>
            Help
          </h4>
          <ul class="secondary-menus">
             <li><a href="<?php echo config_item('site_url');?>feedback">
               Berikan Saran
             </a></li>
             <li><a href="<?php echo config_item('site_url');?>contributor/join">
               Jadi Kontributor
             </a></li>
             <li><a href="<?php echo config_item('site_url');?>belancon/bug">
               Laporkan Bug
             </a></li>
           </ul> 
        </div>
        <div class="col-md-4 text-center">
          <h4>
            Contact
          </h4>
          <ul class="secondary-menus">
             <li><a href="https://www.facebook.com/belancondotcom/" target="_blank">
             Facebook</a></li>
           </ul> 
        </div>
        <div class="col-md-4 text-center">
          <h4>
            Guide
          </h4>
          <ul class="secondary-menus">
             <li><a href="<?php echo config_item('site_url');?>belancon/how-to-download">
               Cara Mendownload
             </a></li>
           </ul> 
        </div>
      </div>
    </div>
  </div>
</div>
<div id="small-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="text-center">
          Copyright Belancon 2016. All Right Reserved.
        </p>
      </div>
    </div>
  </div>
</div>    <!-- end Footer -->

  <script type="text/javascript" src="<?php echo config_item('base_url');?>assets/public/themes/belancon/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo config_item('base_url');?>assets/public/themes/belancon/js/sweetalert.min.js"></script>
<script type="text/javascript" src="<?php echo config_item('base_url');?>assets/public/themes/belancon/js/toastr.js"></script>
<script type="text/javascript" src="<?php echo config_item('base_url');?>js/general.js"></script>
<script type="text/javascript" src="<?php echo config_item('base_url');?>js/user.js"></script>
<script type="text/javascript" src="<?php echo config_item('base_url');?>js/icon.js"></script>
<script type="text/javascript" src="<?php echo config_item('base_url');?>js/cart.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      Icon.getCart();

      /**
       * Action when button remove cart clicked    
       */
      $(document).on('click', '.btn-remove-cart', function(){ 
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');

        Icon.removeFromCart(id, name);
      });  

      $('#form-search').submit(function(e) {
        e.preventDefault();

        var search = $('#search').val();
        var searchText = search.trim();

        if(searchText.length < 3) {
          /** Message Error */
        
          var opts = {
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "300",
            "timeOut": "1000",
            "extendedTimeOut": "300",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          };
          toastr.error("Gunakan minimal 3 karakter dalam pencarian Icon.", "Warning !", opts);
        } else {
          window.location = BASE_URL + "result?search=" + searchText;
        }
      });
    });
  </script>
</body>
</html>