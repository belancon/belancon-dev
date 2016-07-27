<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header" style="height: 150px;">
  <?php $this->load->view('_parts/navbar'); ?>
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-2">
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('/');?>">Home</a></li>
          <li class="active">Icon</li>
        </ol>
      </div>
    </div>
  </div>  
</div>

<?php $this->load->view('_parts/loader'); ?>
    
    <div id="home-icons" style="min-height: 768px; padding-top: 50px;">
      <div class="container">

        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="green-color" style="margin-left: 18px; margin-bottom: 20px;">
              Beautiful Woman
            </h2>
          </div>
        </div>

        <div class="row details-icon">
          <div class="col-md-8 col-md-offset-2">
            <div class="col-md-9">
              <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#icon-detail" aria-controls="icon-detail" role="tab" data-toggle="tab">Icon Detail</a></li>
                  <li role="presentation"><a href="#komentar" aria-controls="komentar" role="tab" data-toggle="tab">Komentar</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="icon-detail">
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-1.png" class="img-detail" alt="" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="share-to col-md-12">
                        <h4>Item lainnya dari Author:</h4>
                      </div>
                    </div>
                    <div class="row item-lainnya">
                      <div class="col-md-2 icon-item">
                        <a href="#">
                          <span class="view-icon-detail">
                            <i class="fa fa-eye fa-lg"></i>
                          </span>
                        </a>
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-2.png" class="img-responsive" alt="">
                      </div>
                      <div class="col-md-2 icon-item">
                        <a href="#">
                          <span class="view-icon-detail">
                            <i class="fa fa-eye fa-lg"></i>
                          </span>
                        </a>
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-1.png" class="img-responsive" alt="">
                      </div>
                      <div class="col-md-2 icon-item">
                        <a href="#">
                          <span class="view-icon-detail">
                            <i class="fa fa-eye fa-lg"></i>
                          </span>
                        </a>
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-3.png" class="img-responsive" alt="">
                      </div>
                      <div class="col-md-2 icon-item">
                        <a href="#">
                          <span class="view-icon-detail">
                            <i class="fa fa-eye fa-lg"></i>
                          </span>
                        </a>
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-4.png" class="img-responsive" alt="">
                      </div>
                      <div class="col-md-2 icon-item">
                        <a href="#">
                          <span class="view-icon-detail">
                            <i class="fa fa-eye fa-lg"></i>
                          </span>
                        </a>
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-1.png" class="img-responsive" alt="">
                      </div>
                      <div class="col-md-2 icon-item">
                        <a href="#">
                          <span class="view-icon-detail">
                            <i class="fa fa-eye fa-lg"></i>
                          </span>
                        </a>
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-2.png" class="img-responsive" alt="">
                      </div>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="komentar">
                    <p>
                      Tempat komentar di sini ...
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>