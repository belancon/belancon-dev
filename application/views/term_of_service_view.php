<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header" style="height: 150px;">
  <?php $this->load->view('_parts/navbar'); ?>
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-3">
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('/');?>">Home</a></li>
          <li class="active">Syarat & Ketentuan</li>
        </ol>
      </div>
    </div>
  </div>  
</div>

<?php $this->load->view('_parts/loader'); ?>
    
    <div id="home-icons" style="min-height: 700px; padding-top: 50px;">
      <div class="container">
        <?php $this->load->view('_parts/notification'); ?>

        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center green-color" style="margin-bottom: 20px;">
              Syarat & Ketentuan
            </h2>
          </div>
        </div>

        <div class="row" style="margin-top: 20px;">
          <!-- <div class="container"> -->
            <div class="col-md-8 col-md-offset-2">
              <p>Masih dalam tahap Review.</p>
            </div>
          <!-- </div> -->
        </div>

      </div>
    </div>

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>