<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header">
  <?php $this->load->view('_parts/navbar'); ?>  
</div>
    
    <div id="home-icons" style="padding-top: 50px;">
      <div class="container">
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
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
        <div class="row" style="margin-top: 50px;">
          <div class="col-md-12">
            <table class="table-cart-icon table table-bordered text-center">
              <thead>
                <tr>
                  <td>
                    Picture
                  </td>
                  <td>
                    Name
                  </td>
                  <td>
                    Kategori
                  </td>
                  <td>
                    Price
                  </td>
                </tr>
              </thead>
              <tbody id="table-body-cart">
                
              </tbody>              
            </table>
          </div>
        </div>

        <div class="row" id="row-download-icon">
          <div class="col-md-12">
            <a href="javascript:void(0)" class="pull-right btn btn-primary btn-contributor btn-download-icon" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading...">Download Icons</a>
            <div class="pull-right" style="margin-right: 20px; margin-top: 5px;">
              <label class="radio-inline">
                <input type="radio" name="format-file-options" class="format-file-options" id="radio-psd" value="psd"> .PSD
              </label>
              <label class="radio-inline">
                <input type="radio" name="format-file-options" class="format-file-options" id="radio-psd" value="ai"> .AI
              </label>
              <label class="radio-inline">
                <input type="radio" name="format-file-options" class="format-file-options" id="radio-psd" value="png"> .PNG
              </label>
            </div>
          </div>
        </div>

      </div>
    </div>

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>