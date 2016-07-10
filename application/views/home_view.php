<?php $this->load->view('_parts/public_header_view'); ?>

<div id="header">
  <?php $this->load->view('_parts/navbar'); ?>
  <?php $this->load->view('_parts/header'); ?>  
</div>

    
    <div id="home-icons" style="padding-top: 50px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center green-color" style="margin-bottom: 20px;">
              Icons untuk Kebutuhan Desain Anda
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <p class="text-center black-color">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
        <div class="row" style="margin-top: 30px;">
          <div class="col-md-12">
            <div>
              <div class="row" style="margin-bottom: 50px;">
                <div class="col-md-4 col-md-offset-4">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#terbaru" aria-controls="terbaru" role="tab" data-toggle="tab" data-filter="newest" class="btn-filter">Terbaru</a></li>
                    <li role="presentation"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab" data-filter="popular" class="btn-filter">Popular</a></li>
                    <li role="presentation"><a href="#free" aria-controls="free" role="tab" data-toggle="tab" data-filter="free" class="btn-filter">Free</a></li>
                    <li role="presentation"><a href="#paid" aria-controls="paid" role="tab" data-toggle="tab" data-filter="paid" class="btn-filter">Paid</a></li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="icon-list">                 
                    </div>
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
        </div>
      </div>
    </div>

    <div id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/about.png" class="img-responsive" alt="">
          </div>
          <div class="col-md-6">
            <h2 class="green-color" style="margin-top: 150px; margin-bottom: 30px;">
              Apa itu Belancon.com ?
            </h2>
            <p style="line-height: 1.6;">
              Sebuah website yang menyediakan icon-icon untuk kebutuhan desain website, aplikasi, print-out, dan lain-lain. Icon-icon pada Belancon ini memiliki kategori yang berbeda-beda, yakni Gratis dan juga ada yang berbayar.
            </p>
            <p style="margin-top: 30px;">
              <a href="mailto:anggariskysetiawan@gmail.com" class="btn btn-primary btn-contributor">Join as Contributor</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>