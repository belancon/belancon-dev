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
          <li role="presentation" class="active"><a href="#icon-detail" aria-controls="icon-detail" role="tab" data-toggle="tab"><?php echo setting_lang('tab_preview');?></a></li>
          <li role="presentation" class=""><a href="#komentar" aria-controls="komentar" role="tab" data-toggle="tab"><?php echo setting_lang('tab_comment');?></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="icon-detail">
            <div class="row">
              <div class="col-md-12 text-center">
                <img src="<?php echo cloud('png/'.$icon->filename);?>" class="img-detail" alt="<?php echo $icon->name.' '.$icon->category;?>" />
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 share-to">
                <p>
                  <?php echo setting_lang('label_share_icon');?> :&nbsp;
                  <a style="background: #3b5999;" class="no-shadow btn-green-primary btn" href="#" onClick="<?php echo $share_fb;?>"><i class="fa fa-facebook"></i></a>
                  <a onClick="<?php echo $share_twitter;?>" style="background: #1da1f3;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-twitter"></i></a>
                  <a onClick="<?php echo $share_gplus;?>" style="background: #dc4e41;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-google-plus"></i></a>
                </p>
              </div>
            </div>

            <div class="row">
              <div class="share-to col-md-12">
                <h4><?php echo setting_lang('label_other_icon');?> :</h4>
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
            <div class="row">
                <div id="disqus_thread"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <h4 style="margin-top: 40px;">
      <?php echo setting_lang('heading_about_author');?>
      </h4>
      
      <div class="col-md-12 author-icon">
        <?php $picture = user($icon->created_by, 'profile_picture') == null ? 'belancon-user.jpg' : user($icon->created_by, 'profile_picture'); ?>
        <img src="<?php echo cloud('member/'.$picture);?>" class="img-profile" alt="">
        <a href="<?php echo site_url('author/'.user($icon->created_by, 'url'));?>">
          <div class="author-name">
            <?php echo user($icon->created_by, 'first_name')." ".user($icon->created_by, 'last_name');?>
          </div>
        </a>
        <div class="author-follower">
          <i class="fa fa-pencil"></i> <?php echo icon_total_author($icon->created_by);?> Icon
        </div>
        <div class="clearfix">
        </div>
        <div style="margin-top: 10px;">
          <!-- <a href="<?php echo site_url('contributor/join');?>" style="box-shadow: none; width: 100%;" class="btn btn-primary btn-green-primary">Visit Profile</a> -->
        </div>
      </div>
      <?php
      if($icon->type == 'free'): ?>
      <a href="#" id="btn-detail-download" data-id="<?php echo $icon->id;?>">
        <div class="col-md-12 btn-icon">
          <?php echo setting_lang('btn_single_download');?>
        </div>
      </a>
      <?php else: ?>
      <a href="#" id="btn-detail-buy" data-id="<?php echo $icon->id;?>">
        <div class="col-md-12 btn-icon">
          Buy Now
        </div>
      </a>
      <?php endif; ?>

      <div id="div-action-cart" data-oncart="<?php echo $on_cart;?>">
      
      </div>
      <div class="col-md-12 info-icon">
        <i class="fa fa-download"></i> <?php echo $icon->downloads." ".setting_lang('label_count_download');?>
      </div>
      <div class="col-md-12 info-icon">
        <i class="fa fa-eye"></i> <?php echo $icon->views." ".setting_lang('label_count_view');?>
      </div>
      <!--
      <div class="col-md-12 info-icon">
        <a href="">
          <i class="fa fa-comments"></i> 
          <span class="disqus-comment-count" data-disqus-identifier="<?php echo $page_identifier;?>"></span>
        </a>
      </div> -->
      <div class="col-md-12 info-icon" style="font-weight: normal;">
        <div class="col-md-4">
          <strong><?php echo setting_lang('label_date_icon');?></strong>
        </div>
        <div class="col-md-8">
          <?php echo dateindo2($icon->created_at, 'date')." ".dateindo2($icon->created_at, 'month')." ".dateindo2($icon->created_at, 'year');  ?>
        </div>
        <div class="clearfix">
        </div>
        <div class="col-md-3">
          <strong>Tags:</strong>
        </div>
        <div class="col-md-9 icon-tags">
          <?php 
          $tags = $icon->tags !== null ? explode(",",$icon->tags) : array(); 
          foreach($tags as $key => $value):
            $searchText = str_replace(" ", "", $value);
          ?>
          <a href="<?php echo site_url('result?search='.$searchText);?>">
          <span class="label label-success"><?php echo $value;?></span>
          </a>
          <?php
          endforeach;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Download -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-download">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Download Icon Gratis</h4>
      </div>

      
      <div class="modal-body">        
        <h4>Bagaimana Memberikan kredit untuk Author?</h4>
        <small>Silahkan cantumkan link dibawah ini pada web anda</small>
        <div class="form-group">
          <?php 
            $author_name = user($icon->created_by, 'first_name')." ".user($icon->created_by, 'last_name'); 
            $author_url = user($icon->created_by, 'url');
            $credit = 'icon dibuat oleh <a target="_blank" href="'.site_url('author/'.$author_url).'">'.$author_name.'</a>';
            $credit_string = htmlentities($credit);
          ?>
          <input type="text" name="credit" value="<?php echo $credit_string;?>" class="form-control" />
        </div>
        <hr>
        <?php echo form_open('icon/download_single', array('id'=> 'form-download'));?>
        <input type="hidden" name="id" value="<?php echo $icon->id;?>" />  
        <div class="form-group">
          <label>Pilih Tipe File</label>
        </div>
        <div class="radio">
          <?php
          foreach($files as $file):
          ?>
          <label class="checkbox-inline">
            <input type="checkbox" name="type" value="<?php echo $file->type;?>"> <?php echo '.'.strtoupper($file->type);?>
          </label>
          <?php
          endforeach;
          ?>
        </div> 
        <span class="text-danger" id="span-error-download" style="display:none;">Silahkan Pilih salah satu tipe file terlebih dahulu</span>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="btn-cancel-download">Batal</button>
        <button type="submit" class="btn btn-green-primary" id="btn-download" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Loading...">Download</button>
      </div>
      <?php echo form_close();?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Modal Download -->

<?php if($show_disqus): ?>
<script>
/**
 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */

var disqus_config = function () {
    this.page.url = '<?php echo $page_url;?>';  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = '<?php echo $page_identifier;?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = '//belancon.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
</script>
<script id="dsq-count-scr" src="//belancon.disqus.com/count.js" async></script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<?php endif; ?>
