<div class="row">
  <div class="col-md-12">
    <h2 class="text-center green-color" style="margin-bottom: 20px;">
    Laporkan Bug
    </h2>
  </div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <p class="text-center black-color">
      Jika Anda menemukan masalah atau bug pada web kami. silahkan laporkan dengan mengisi form dibawah ini.
    </p>
  </div>
</div>
<div class="row" style="margin-top: 30px;">
  <div class="col-md-6 col-md-offset-3">
    <?php
    $attributes = array('id' => 'form-report-bug');
    echo form_open('bug', $attributes)
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
        <span style="border-left: 3px solid #66AE53;"> &nbsp; Bug / Masalah</span>
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