<div class="row">
  <div class="col-md-12">
    <?php if($this->session->flashdata('success_message')): ?>
    <div class="alert alert-success">
      <span><?php echo $this->session->flashdata('success_message'); ?></span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error_message')): ?>
    <div class="alert alert-danger">
      <span><?php echo $this->session->flashdata('error_message'); ?></span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <?php endif; ?>
  </div>
</div>