<div class="row">
<div class="profile col-md-12">
  <div class="profile-info">
    <img src="<?php echo base_url('assets/public/themes/belancon');?>/img/author-1.jpg" alt="" class="pull-left profile-img">
    <div class="profile-name">
      <?php echo $user->first_name." ".$user->last_name; ?>
    </div>
    <p class="profile-registered">
      Author sejak <?php echo dateindo($user->join_date); ?>
    </p>
    <p>
      <a style="background: #3b5999;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-facebook"></i></a>
      <a style="background: #1da1f3;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-twitter"></i></a>
      <a style="background: #dc4e41;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-google-plus"></i></a>
      <a style="background: #202020;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-globe"></i></a>
      <a style="background: #de291e;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-youtube fa-lg"></i></a>
      <a style="background: #0083ff;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-behance"></i></a>
      <a style="background: #ea4c89;" class="no-shadow btn-green-primary btn" href="#"><i class="fa fa-dribbble"></i></a>
    </p>
  </div>
  <div class="pull-right profile-stats">
  </div>
</div>
</div>
<div class="row">
<div class="col-md-12">
  <div id="icon-list" style="margin-top:20px">
          
  </div>
</div>
</div>

<div class="row">
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
  });
</script>