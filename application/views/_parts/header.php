      <div class="container form-search-icon">
        <div class="row">
          <div class="col-md-12" style="margin-bottom: 30px; margin-top: 50px;">
            <h1 class="text-center" style="text-shadow: 2px 2px #202020;">
              <?php
              $text = setting_lang('heading_total_icon');
              $text = str_replace("{val}", icon_total(), $text);
              echo $text;
              ?>          
            </h1>
          </div>
          <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
              <form class="form-inline" id="form-search-icon">
                <div class="form-group">
                  <input type="text" class="form-control col-md-6 col-xs-6 col-sm-5" id="search-icon" placeholder="<?php echo setting_lang('ph_input_search');?>">
                </div>
                <button type="submit" id="submit-search-icon" class="btn btn-default"><i class="fa fa-search"></i></button>
                <p style="margin-left: 10px;" class="text-left white-color help-block">
                  <?php 
                  $text = setting_lang('txt_input_search');
                  $text = str_replace("{val}", "sport, animal, building", $text);
                  echo $text;
                  ?>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>

    

