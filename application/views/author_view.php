<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header" style="height: 150px;">
  <?php $this->load->view('_parts/navbar'); ?>
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-3">
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('/');?>">Home</a></li>
          <li class="active">Author Profile</li>
        </ol>
      </div>
    </div>
  </div>  
</div>

<!-- <?php echo base_url('assets/public/themes/belancon');?> -->

<div id="author">
  <div class="container">
  
    <div class="row">

      <div class="profile col-md-12">
        <div class="profile-info">
          <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/author-1.jpg" alt="" class="pull-left profile-img">
          <div class="profile-name">
            Belancon Girl
          </div>
          <p class="profile-registered">
            Author sejak 12 Februari, 2015
          </p>
          <p>
            <a style="background: #3b5999;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-facebook"></i></a>
            <a style="background: #1da1f3;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-twitter"></i></a>
            <a style="background: #dc4e41;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-google-plus"></i></a>
            <a style="background: #202020;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-globe"></i></a>
            <a style="background: #de291e;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-youtube fa-lg"></i></a>
            <a style="background: #0083ff;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-behance"></i></a>
            <a style="background: #ea4c89;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-dribbble"></i></a>
          </p>
        </div>
        <div class="pull-right profile-stats">

        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-md-12">
        <p style="margin-top: 20px;">
          Nanti di isi icon2 berbaris sesuai dengan kepemilikan Icon tersebut, berbaris seperti di homepage.
        </p>
      </div>
    </div>

  </div>
</div>

<?php $this->load->view('_parts/loader'); ?>
    
    

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>