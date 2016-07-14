<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header" style="height: 150px;">
  <?php $this->load->view('_parts/navbar'); ?>  
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-2">
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('/');?>">Home</a></li>
          <li class="active">Keranjang</li>
        </ol>
      </div>
    </div>
  </div>
</div>

  <?php $this->load->view('_parts/loader'); ?>
    
    <div id="home-icons" style="min-height: 768px; padding-top: 50px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php if($this->session->flashdata('success_message')): ?>
            <div class="alert alert-success">
              <span><?php echo $this->session->flashdata('success_message'); ?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <?php endif; ?>

            <?php if($this->session->flashdata('error_message')): ?>
            <div class="alert alert-danger">
              <span><?php echo $this->session->flashdata('error_message'); ?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <?php endif; ?>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center green-color" style="margin-bottom: 20px;">
              Keranjang Belanja
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <p class="text-center black-color">
              Silahkan unduh semua Icons yang sudah anda tambahkan pada Keranjang anda, jangan lupa untuk pilih jenis file yang anda ingin unduh.
            </p>
          </div>
        </div>
        <div class="row" style="margin-top: 50px;">
          <div class="col-md-12">
              Download Page
          </div>
        </div>
      </div>
    </div>

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>