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
          <li role="presentation" class=""><a href="#komentar" aria-controls="komentar" role="tab" data-toggle="tab">Komentar</a></li>
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
              <div class="col-md-12 share-to">
                <p>
                  Bagikan Icon :&nbsp;
                  <a style="background: #3b5999;" class="no-shadow btn-green-primary btn" href="#" onClick="<?php echo $share_fb;?>"><i class="fa fa-facebook"></i></a>
                  <a onClick="<?php echo $share_twitter;?>" style="background: #1da1f3;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-twitter"></i></a>
                  <a onClick="<?php echo $share_gplus;?>" style="background: #dc4e41;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-google-plus"></i></a>
                </p>
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
            <div class="row">
                <div id="disqus_thread"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <h4 style="margin-top: 40px;">
      Tentang Author
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
      <a href="#" id="btn-detail-download" data-id="<?php echo $icon->id;?>">
        <div class="col-md-12 btn-icon">
          Download Sekarang
        </div>
      </a>
      <div id="div-action-cart" data-oncart="<?php echo $on_cart;?>">
      
      </div>
      <div class="col-md-12 info-icon">
        <i class="fa fa-download"></i> <?php echo $icon->downloads;?> Diunduh
      </div>
      <div class="col-md-12 info-icon">
        <i class="fa fa-eye"></i> 1,132 Dilihat
      </div>
      <!--
      <div class="col-md-12 info-icon">
        <a href="">
          <i class="fa fa-comments"></i> 
          <span class="disqus-comment-count" data-disqus-identifier="<?php echo $page_identifier;?>"></span>
        </a>
      </div> -->
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

<script type="text/javascript">
$(document).ready(function() {

    var onCart = $('#div-action-cart').attr('data-oncart');
    var iconId = '<?php echo $icon->id;?>';
    var iconName = '<?php echo $icon->name;?>';

    loadButtonDefault(onCart, iconId, iconName);

    /**
     * Action when button add cart clicked    
     */
    $(document).on('click', '.btn-detail-add-cart', function(e){ 
      e.preventDefault();
      var id = $(this).attr('data-id');
      var name = $(this).attr('data-name');

      Icon.addToCart(id, name, function(result) {
        if(result === true) {
          loadButtonRemoveCart(id, name);
        }
      });

    });

    $(document).on('click', '.btn-detail-remove-cart', function(e){ 
      e.preventDefault();
      var id = $(this).attr('data-id');
      var name = $(this).attr('data-name');

      Icon.removeFromCart(id, name, function(result) {
        if(result.status === true) {
          loadButtonAddCart(id, name);
        }
      });
    });  

    $('#btn-detail-download').click(function(e) {
      e.preventDefault();
      $('#modal-download').modal('show');
    });

    $('#btn-cancel-download').click(function(e) {
      $('#span-error-download').fadeOut();
      $('#modal-download').modal('hide');
    });

    $('#form-download').submit(function(e) {
      e.preventDefault();
      $('#btn-download').button('loading');            
      var id = $('input[name=id]').val();         
      var types = [];
      $('input[type=checkbox]:checked').each(function() {
          types.push($(this).val());
      });
      
      if(types.length < 1) {
        $('#span-error-download').fadeIn();
      } else {
        //Ajax method
        $.ajax({
         type: "post",
         url: $(this).attr('action'),
         cache: false,    
         data: {id: id, types: types},
         success: function(response){        
            result = JSON.parse(response);
            //console.log(response.path);        
            if(result.status === true) {
             $('#modal-download').modal('hide'); 
             window.location = result.path;                            
             setTimeout(function(){ window.location = BASE_URL + "feedback"; }, 2000);
            } else {
              //console.log(result.message);
              /** Message Error */
              var opts = {
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "100",
                "hideDuration": "300",
                "timeOut": "1000",
                "extendedTimeOut": "300",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              };
              toastr.error(result.message, "Warning !", opts);        
            }
            
            $('#btn-download').button('reset');            
         },
         error: function(){      
          alert('Error while request..');
         }
        });
      }
    });
});


var loadButtonDefault = function(onCart, iconId, iconName) {
  if(onCart == 'true') {
    loadButtonRemoveCart(iconId, iconName);    
  } else {
    loadButtonAddCart(iconId, iconName);    
  }
};

var loadButtonAddCart = function(id, name) {
  $('#div-action-cart').html('');
  var btnAdd = '<a href="#" class="btn-detail-add-cart" data-id="' + id + '" data-name="' + name + '">';
  btnAdd += '<div class="col-md-12 btn-cart">Tambahkan ke keranjang</div>';
  btnAdd += '</a>';

  $('#div-action-cart').append(btnAdd);
};

var loadButtonRemoveCart = function(id, name) {
  $('#div-action-cart').html('');
  var btnRemove = '<a href="#" class="btn-detail-remove-cart" data-id="' + id + '" data-name="' + name + '">';
  btnRemove += '<div class="col-md-12 btn-cart">Hapus dari keranjang</div>';
  btnRemove += '</a>';
  $('#div-action-cart').append(btnRemove);
};

</script>

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
