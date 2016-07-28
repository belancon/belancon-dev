<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2 class="green-color" style="margin-left: 18px;">
    <?php echo $icon->name;?> <span class="badge"><?php echo $icon->type;?> icon</span>
    </h2>
    <h4 style="margin-left: 18px; margin-top: -5px; margin-bottom: 30px;">
    Rp. <?php echo $icon->price;?>
    </h4>
  </div>
</div>
<div class="row details-icon">
  <div class="col-md-8 col-md-offset-2">
    <div class="col-md-8">
      <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#icon-detail" aria-controls="icon-detail" role="tab" data-toggle="tab">Icon Preview</a></li>
          <li role="presentation"><a href="#komentar" aria-controls="komentar" role="tab" data-toggle="tab">Komentar</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="icon-detail">
            <div class="row">
              <div class="col-md-12 text-center">
                <img src="<?php echo cloud('png/'.$icon->filename);?>" class="img-detail" alt="" />
              </div>
            </div>
            <div class="row">
              <div class="share-to col-md-12">
                <h4>Item lainnya dari Author:</h4>
              </div>
            </div>
            <div class="row item-lainnya">
              <?php 
              foreach($other_icons as $row): ?>
              <div class="col-md-3 col-sm-3 col-xs-6 icon-item">
                <a href="<?php echo site_url('icons/'.$row->url);?>">
                  <span class="view-icon-detail">
                    <i class="fa fa-eye fa-lg"></i>
                  </span>
                </a>
                <img src="<?php echo cloud('thumbnail/'.$row->default_image);?>" class="img-responsive" alt="">
              </div>
              <?php
              endforeach;
              ?>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="komentar">
            <p>
              Tempat komentar di sini ...
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <h4 style="margin-top: 40px;">
      About Author
      </h4>
      
      <div class="col-md-12 author-icon">
        <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/author-1.jpg" class="img-profile" alt="">
        <a href="#">
          <div class="author-name">
            <?php echo user($icon->created_by, 'first_name')." ".user($icon->created_by, 'last_name');?>
          </div>
        </a>
        <div class="author-follower">
          <i class="fa fa-pencil"></i> 18,392 Icons
        </div>
        <div class="clearfix">
        </div>
        <div style="margin-top: 10px;">
          <a href="<?php echo site_url('contributor/join');?>" style="box-shadow: none; width: 100%;" class="btn btn-primary btn-green-primary">Visit Profile</a>
        </div>
      </div>
      <a href="#">
        <div class="col-md-12 btn-icon">
          Download Now
        </div>
      </a>
      <?php if($on_cart === false): ?>
      <a href="#" class="btn-detail-add-cart" data-id="<?php echo $icon->id;?>" data-name="<?php echo $icon->name;?>">
        <div class="col-md-12 btn-cart">
          Add to Cart
        </div>
      </a>
      <?php else: ?>
      <a href="#" class="btn-detail-remove-cart" data-id="<?php echo $icon->id;?>" data-name="<?php echo $icon->name;?>">
        <div class="col-md-12 btn-cart">
          Remove from Cart
        </div>
      </a>
      <?php endif; ?>
      <div class="col-md-12 info-icon">
        <i class="fa fa-download"></i> <?php echo $icon->downloads;?> Diunduh
      </div>
      <div class="col-md-12 info-icon">
        <i class="fa fa-eye"></i> 1,132 Dilihat
      </div>
      <div class="col-md-12 info-icon">
        <a href="#">
          <i class="fa fa-comments"></i> 0 Komentar
        </a>
      </div>
      <div class="col-md-12 info-icon" style="font-weight: normal;">
        <div class="col-md-3">
          <strong>Date:</strong>
        </div>
        <div class="col-md-9">
          <?php echo dateindo2($icon->created_at, 'date')." ".dateindo2($icon->created_at, 'month')." ".dateindo2($icon->created_at, 'year');  ?>
        </div>
        <div class="clearfix">
        </div>
        <div class="col-md-3">
          <strong>Tags:</strong>
        </div>
        <div class="col-md-9">
          <?php 
          $tags = $icon->tags !== null ? explode(",",$icon->tags) : array(); 
          foreach($tags as $key => $value):
          ?>
          <span class="label label-success"><?php echo $value;?></span>
          <?php
          endforeach;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    /**
     * Action when button add cart clicked    
     */
    $('.btn-detail-add-cart').click(function(e){ 
      e.preventDefault();
      var id = $(this).attr('data-id');
      var name = $(this).attr('data-name');

      Icon.addToCart(id, name, function(result) {
        if(result === true) {
          location.reload();
        }
      });

    });

    $('.btn-detail-remove-cart').click(function(e){ 
      e.preventDefault();
      var id = $(this).attr('data-id');
      var name = $(this).attr('data-name');

      Icon.removeFromCart(id, name);
    });    
});
</script>