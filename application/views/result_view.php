<?php $this->load->view('_parts/public_header_view'); ?>

<div id="header" style="height: 180px;">
  <?php $this->load->view('_parts/navbar'); ?>
  <?php $this->load->view('_parts/header_result'); ?>  
</div>

    <?php $this->load->view('_parts/loader'); ?>
    
    <div id="home-icons" style="padding-top: 50px;">
      <div class="container">              

        <div class="row" id="header-search-page">
          <div class="col-md-12">
              <h2 class="text-center green-color" style="margin-bottom: 20px;">
                Hasil Pencarian Untuk : <span style="color: #3d3938;">" <?php echo $searchText; ?> "</span>
              </h2>
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

                <!-- MODAL VIEW LARGE ICON -->
                <div class="modal fade modal-view-icon" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="text-center" id="modal-content-large-icon">
                          
                      </div>
                    </div>
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