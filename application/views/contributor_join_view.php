<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header" style="height: 150px;">
  <?php $this->load->view('_parts/navbar'); ?>
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-2">
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('/');?>">Home</a></li>
          <li class="active">Kontributor</li>
        </ol>
      </div>
    </div>
  </div>  
</div>
    
    <div id="home-icons" style="min-height: 768px; padding-top: 50px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center green-color" style="margin-bottom: 20px;">
              Gabung sebagai Kontributor
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <p class="text-center black-color">
              Untuk Anda yang ingin berkontribusi dalam pengembangan website Belancon.com ini, silahkan daftarkan diri Anda segera mungkin.
            </p>
          </div>
        </div>

        <div class="row" style="margin-top: 30px;">
          <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="<?php echo site_url('contributor/join');?>">
            <?php
              $attributes = array('id' => 'form-join-contributor');
              echo form_open('contributor/join()', $attributes)
              ?>
              <div class="form-group">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap" value="<?php echo set_value('fullname'); ?>">
                <span class="text-danger"><?php echo form_error('fullname'); ?></span>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                <span class="text-danger"><?php echo form_error('email'); ?></span>
              </div>
              <div class="form-group">
                <label for="email">Keahlian</label> <br />
                <label class="radio-inline">
                  <input type="radio" name="skill" id="socia-media-manager" value="Social Media Manager" <?php echo set_radio('skill', 'Social Media Manager'); ?>> Social Media Manager
                </label>
                <label class="radio-inline">
                  <input type="radio" name="skill" id="designer" value="Designer" <?php echo set_radio('skill', 'Designer'); ?>> Designer
                </label>
                <label class="radio-inline">
                  <input type="radio" name="skill" id="programmer" value="Programmer" <?php echo set_radio('skill', 'Programmer'); ?>> Programmer
                </label>
                <span class="text-danger"><?php echo form_error('skill'); ?></span>
              </div>
              <div class="form-group">
                <label for="message">Pesan</label>
                <textarea class="form-control" name="message" rows="3" id="message"><?php echo set_value('message'); ?></textarea>
                <span class="text-danger"><?php echo form_error('message'); ?></span>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            <?php echo form_close(); ?>
          </div>
        </div>

      </div>
    </div>

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>