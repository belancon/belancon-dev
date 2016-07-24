<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header" style="height: 150px;">
  <?php $this->load->view('_parts/navbar'); ?>
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-2">
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('/');?>">Home</a></li>
          <li class="active">Feedback</li>
        </ol>
      </div>
    </div>
  </div>  
</div>

<?php $this->load->view('_parts/loader'); ?>
    
    <div id="home-icons" style="min-height: 768px; padding-top: 50px;">
      <div class="container">
        <?php $this->load->view('_parts/notification'); ?>

        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center green-color" style="margin-bottom: 20px;">
              Berikan Feedback Anda
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <p class="text-center black-color">
              Terima kasih telah mendownload Icons dari website Belancon.com, Silahkan berikan Saran atau Kritik agar Belancon.com bisa lebih baik lagi.
            </p>
          </div>
        </div>

        <div class="row" style="margin-top: 30px;">
          <div class="col-md-6 col-md-offset-3">            
            <?php
              $attributes = array('id' => 'form-give-feedback');
              echo form_open('feedback', $attributes)
              ?>
              <div class="form-group">
                <label for="fullname">
                  <span style="border-left: 3px solid #66AE53;"> &nbsp; Nama Lengkap</span>
                  </label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap" value="<?php echo set_value('fullname'); ?>">
                <span class="text-danger"><?php echo form_error('fullname'); ?></span>
              </div>
              <div class="form-group">
                <label for="email">
                  <span style="border-left: 3px solid #66AE53;"> &nbsp; Email Valid</span>
                </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                <span class="text-danger"><?php echo form_error('email'); ?></span>
              </div>
              <div class="form-group">
                <label for="message">
                  <span style="border-left: 3px solid #66AE53;"> &nbsp; Berikan Feedback (Saran/Kritik)</span>
                </label>
                <textarea style="resize: none;" class="form-control" name="message" rows="3" id="message"><?php echo set_value('message'); ?></textarea>
                <span class="text-danger"><?php echo form_error('message'); ?></span>
              </div>

              <div class="form-group">
                <?php echo $recaptcha_html;?>
                <span class="text-danger"><?php echo form_error('g-recaptcha-response');?></span>
              </div>
              <button type="submit" class="btn btn-green-primary btn-default btn-contributor">Submit</button>
              <a href="<?php echo site_url();?>" class="btn btn-default">Kembali Ke Beranda</a>
            <?php echo form_close(); ?>
          </div>
        </div>

      </div>
    </div>

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>