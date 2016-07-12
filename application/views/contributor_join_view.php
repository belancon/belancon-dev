<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header">
  <?php $this->load->view('_parts/navbar'); ?>  
</div>
    
    <div id="home-icons" style="min-height: 768px; padding-top: 50px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center green-color" style="margin-bottom: 20px;">
              Join sebagai Kontributor
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <p class="text-center black-color">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="<?php echo site_url('contributor/join');?>">
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
                  <input type="radio" name="skill" id="designer" value="designer"> desainer
                </label>
                <label class="radio-inline">
                  <input type="radio" name="skill" id="programmer" value="programmer"> programmer
                </label>
                <span class="text-danger"><?php echo form_error('skill'); ?></span>
              </div>
              <div class="form-group">
                <label for="message">Pesan</label>
                <textarea class="form-control" name="message" rows="3" id="message"><?php echo set_value('message'); ?></textarea>
                <span class="text-danger"><?php echo form_error('message'); ?></span>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
        </div>

      </div>
    </div>

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>