<div class="row">
  <div class="col-md-12">
    <h2 class="text-center green-color" style="margin-bottom: 20px;">
    <?php echo setting_lang('heading_cart');?>
    </h2>
  </div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <p class="text-center black-color">
      <?php echo setting_lang('desc_cart');?>
    </p>
  </div>
</div>
<div class="row" style="margin-top: 50px;">
  <div class="col-md-12">
    <table class="table-cart-icon table table-bordered text-center">
      <thead>
        <tr>
          <th rowspan="2">
            <?php echo setting_lang('th_cart_picture');?>
          </th>
          <th  rowspan="2">
            <?php echo setting_lang('th_cart_name');?>
          </th>
          <th  rowspan="2">
            <?php echo setting_lang('th_cart_category');?>
          </th>          
          <th colspan="5" class="text-center">
            <?php echo setting_lang('th_cart_type');?>
          </th>
          <th  rowspan="2">
           <?php echo setting_lang('th_cart_Price');?>
          </th>
          <th  rowspan="2">
            <?php echo setting_lang('th_cart_action');?>
          </th>
        </tr>
        <tr>
          <th>PNG</th>
          <th>PSD</th>          
          <th>AI</th> 
          <th>CDR</th>
          <th>SVG</th>         
        </tr>
      </thead>
      <tbody id="table-body-cart">
      </tbody>
      <tfoot id="table-foot-cart">
        <tr>
          <td colspan="8">Total</td>
          <td id="total-price"></td>
          <td></td>
        </tr>
      </tfoot> 
    </table>
  </div>
</div>
<div class="row" id="row-download-icon">
  <div class="col-md-12">
    <a href="javascript:void(0)" class="pull-right btn btn-primary btn-green-primary btn-download-icon" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading..."><?php echo setting_lang('btn_cart_download');?></a>
    <div class="pull-right" style="margin-right: 20px; margin-top: 5px;">
      <label class="checkbox-inline">
        <input type="checkbox" name="format-file-options" class="format-file-options" id="checkbox-psd" value="psd"> .PSD
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" name="format-file-options" class="format-file-options" id="checkbox-psd" value="ai"> .AI
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" name="format-file-options" class="format-file-options" id="checkbox-psd" value="png"> .PNG
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" name="format-file-options" class="format-file-options" id="checkbox-cdr" value="cdr"> .CDR
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" name="format-file-options" class="format-file-options" id="checkbox-svg" value="svg"> .SVG
      </label>
    </div>
  </div>
</div>