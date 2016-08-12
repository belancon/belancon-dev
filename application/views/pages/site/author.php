<div class="row">
<div class="profile col-md-12">
  <div class="profile-info">
    <?php $picture = user($user->id, 'profile_picture') == null ? 'belancon-user.jpg' : user($user->id, 'profile_picture'); ?>
    <img src="<?php echo cloud('member/'.$picture);?>" alt="" class="pull-left profile-img">
    <div class="profile-name">
      <?php echo $user->first_name." ".$user->last_name; ?>
    </div>
    <p class="profile-registered">
      Author sejak <?php echo dateindo($user->join_date); ?>
    </p>
    <p>
      <?php 
      if($socmeds):
      foreach($socmeds as $socmed):
      ?>
      <a class="no-shadow btn-green-primary btn btn-<?php echo $socmed->name;?>" href="<?php echo $socmed->url;?>" target="_blank"><i class="fa <?php echo $socmed->icon;?>"></i></a>
      <?php
      endforeach;
      endif;
      ?>
    </p>
  </div>
  <div class="pull-right profile-stats">
  </div>
</div>
</div>
<div class="row" id="home-icons">
<div class="col-md-12">
  <div id="icon-list" style="margin-top:20px">
          
  </div>
</div>
</div>

<div class="row" style="margin-bottom:100px">
  <div class="col-md-6 col-md-offset-3">
    <div class="text-center" id="content-loadmore">
      
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
      var authorId = '<?php echo $user->id;?>';
      var paramSearch = Belancon.getUrlParameter('search') ? Belancon.getUrlParameter('search') : null;
      var search = paramSearch ? paramSearch : "";

      Author.getIcon(authorId, 1, search);   

      /**
       * Action When Button Loadmore clicked
       */
      $(document).on('click', '#btn-load-more', function(){    
        var currentUrlString = window.location.href;
        var currentUrlArr = currentUrlString.split("?");
        var currentUrl = currentUrlArr[0];
              
        var paramSearch = Belancon.getUrlParameter('search') ? Belancon.getUrlParameter('search') : null;

        var search = paramSearch ? paramSearch : "";
        var page = $(this).attr('data-page');

        Author.getIcon(authorId, page, search);            
      });

      /**
       * Action when button add cart clicked    
       */
      $(document).on('click', '.btn-add-cart', function(){ 
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');

        Icon.addToCart(id, name);
      });    

      /**
       * Action when button remove cart clicked    
       */
      $(document).on('click', '.btn-remove-cart', function(){ 
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');

        Icon.removeFromCart(id, name);
      });        

  });
</script>