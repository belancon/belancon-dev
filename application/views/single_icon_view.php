<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header" style="height: 150px;">
  <?php $this->load->view('_parts/navbar'); ?>
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-2">
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('/');?>">Home</a></li>
          <li class="active">Icon Details</li>
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
            <h2 class="green-color" style="margin-left: 18px;">
              Beautiful Woman
            </h2>
            <h4 style="margin-left: 18px; margin-top: -5px; margin-bottom: 30px;">
              Rp. 189.000,-
            </h4>
          </div>
        </div>

        <div class="row details-icon">
          <div class="col-md-8 col-md-offset-2">

            <div class="col-md-8">
              <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#icon-detail" aria-controls="icon-detail" role="tab" data-toggle="tab">Icon Preview</a></li>
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
                      <div class="col-md-3 col-sm-3 col-xs-6 icon-item">
                        <a href="#">
                          <span class="view-icon-detail">
                            <i class="fa fa-eye fa-lg"></i>
                          </span>
                        </a>
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-2.png" class="img-responsive" alt="">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-6 icon-item">
                        <a href="#">
                          <span class="view-icon-detail">
                            <i class="fa fa-eye fa-lg"></i>
                          </span>
                        </a>
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-1.png" class="img-responsive" alt="">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-6 icon-item">
                        <a href="#">
                          <span class="view-icon-detail">
                            <i class="fa fa-eye fa-lg"></i>
                          </span>
                        </a>
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-3.png" class="img-responsive" alt="">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-6 icon-item">
                        <a href="#">
                          <span class="view-icon-detail">
                            <i class="fa fa-eye fa-lg"></i>
                          </span>
                        </a>
                        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/user-4.png" class="img-responsive" alt="">
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

            <div class="col-md-4">
              <h4 style="margin-top: 40px;">
                About Author
              </h4>
              
              <div class="col-md-12 author-icon">
                <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/author-1.jpg" class="img-profile" alt="">
                <a href="#">
                  <div class="author-name">
                    Belancon Team
                  </div>
                </a>
                <div class="author-follower">
                  <i class="fa fa-pencil"></i> 18,392 Icons
                </div>
                <div class="clearfix">
                </div>
                <div style="margin-top: 10px;">
                  <a href="<?php echo site_url('contributor/join');?>" style="box-shadow: none; width: 100%;" class="btn btn-primary btn-green-primary">Visit Profile</a>
                </div>
              </div>

              <a href="#">
                <div class="col-md-12 btn-icon">
                  Download Now
                </div>
              </a>

              <a href="#">
                <div class="col-md-12 btn-cart">
                  Add to Cart
                </div>
              </a>

              <div class="col-md-12 info-icon">
                <i class="fa fa-download"></i> 12 Diunduh
              </div>

              <div class="col-md-12 info-icon">
                <i class="fa fa-eye"></i> 1,132 Dilihat
              </div>

              <div class="col-md-12 info-icon">
                <a href="#">
                  <i class="fa fa-comments"></i> 321 Komentar
                </a>
              </div>

              <div class="col-md-12 info-icon" style="font-weight: normal;">
                <div class="col-md-3">
                  <strong>Date:</strong>
                </div>
                <div class="col-md-9">
                  17 Mar, 2015
                </div>
                <div class="clearfix">
                </div>
                <div class="col-md-3">
                  <strong>Tags:</strong>
                </div>
                <div class="col-md-9">
                  <a href="#">Woman</a>, 
                  <a href="#">Beautiful</a>, 
                  <a href="#">Yellow</a>, 
                  <a href="#">Calm</a>, 
                  <a href="#">Kid</a>,
                  <a href="#">Woman</a>, 
                  <a href="#">Beautiful</a>, 
                  <a href="#">Yellow</a>, 
                  <a href="#">Calm</a>, 
                  <a href="#">Kid</a>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>