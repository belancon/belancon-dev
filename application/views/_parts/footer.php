<div id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img class="belancon-logo" src="<?php echo base_url();?>assets/public/themes/belancon/img/logo-belancon.png" height="40" alt="logo belancon.com" />
        </div>
        <div class="text-center">
          <ul class="primary-menus">
            <!-- <li><a href="<?php echo site_url('term-of-service');?>">
              <?php echo setting_lang('link_term_of_service');?>
            </a></li> -->
            <li><a href="<?php echo site_url('privacy-policy');?>">
              <?php echo setting_lang('link_privacy_policy');?>
            </a></li>
            <li><a href="<?php echo cloud_path('text/License.pdf');?>" target="_blank">
              <?php echo setting_lang('link_license');?>
            </a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 30px;">
      <div class="col-md-8 col-md-offset-2">
        <div class="col-md-3 text-center">
          <h4>
            Help
          </h4>
          <ul class="secondary-menus">
             <li><a href="<?php echo site_url('feedback');?>">
               <?php echo setting_lang('link_give_feedback');?>
             </a></li>
             <li><a href="<?php echo site_url('contributor/join');?>">
               <?php echo setting_lang('link_join_contributor');?>
             </a></li>
             <li><a href="<?php echo site_url('bug');?>">
              <?php echo setting_lang('link_report_bug');?>
             </a></li>
           </ul> 
        </div>
        <div class="col-md-3 text-center">
          <h4>
            Contact
          </h4>
          <ul class="secondary-menus">
             <li><a href="https://www.facebook.com/belancondotcom/" target="_blank">
             Facebook</a></li>
             <li><a href="https://twitter.com/belancondotcom" target="_blank">
             Twitter</a></li>
           </ul> 
        </div>
        <div class="col-md-3 text-center">
          <h4>
            Guide
          </h4>
          <ul class="secondary-menus">
             <li><a href="<?php echo site_url('how-to-download');?>">
               <?php echo setting_lang('link_how_to_download');?>
             </a></li>
           </ul> 
        </div>
        <div class="col-md-3 text-center">
          <h4>
            Company
          </h4>
          <ul class="secondary-menus">
             <li><a href="https://blog.belancon.com">
               Blog
             </a></li>
           </ul> 
        </div>
      </div>
    </div>
  </div>
</div>
<div id="small-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="text-center">
          Copyright Belancon 2016. All Right Reserved.
        </p>
      </div>
    </div>
  </div>
</div>

<?php if($this->ion_auth->logged_in()):?>
<a href="<?php echo site_url('member/add-icon');?>">
  <div id="menu-float">
    <i class="fa fa-plus fa-lg"></i>
  </div><!-- menu float -->
</a>
<?php endif; ?>




