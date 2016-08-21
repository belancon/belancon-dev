<nav class="navbar navbar-default" id="navscroll">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="" href="<?php echo site_url('/');?>">
              <img class="belancon-logo" src="<?php echo base_url();?>assets/public/themes/belancon/img/logo-belancon.png" height="30" alt="logo belancon.com" />
            </a>
            <span class="green-color"><strong> BETA </strong></span>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search icon">
              </div>
              <button type="submit" class="btn btn-default">Find</button>
            </form> -->
            <ul class="nav navbar-nav navbar-right">
              <?php if($this->ion_auth->logged_in()):?>
              <li>
                <a href="<?php echo site_url('member/add-icon');?>" class="btn-yellow-primary no-shadow"><i class="fa fa-pencil-square-o"></i> Upload Icon</a>
              </li>

              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php $picture = user_login('profile_picture') == null ? 'belancon-user.jpg' : user_login('profile_picture'); ?>
                    <img src="<?php echo cloud('member/'.$picture);?>" alt="" class="author-pic" /> <span class="white-color"><?php echo user_login('first_name');?></span>
                  </a>
                  <ul class="dropdown-menu scrollable-menu">
                      <li><a href="<?php echo site_url('member/icon');?>">Iconku</a></li> 
                      <li><a href="<?php echo site_url('member/profile');?>">Profil</a></li> 
                      <li><a href="<?php echo site_url('member/change-password');?>">Ubah Password</a></li>
                      <li><a href="<?php echo site_url('user/logout');?>">Logout</a></li>
                  </ul>
              </li>    
              <?php else: ?>
              <li><a href="<?php echo site_url('register');?>" class="btn-yellow-primary no-shadow">Daftar</a></li>
              <li><a href="<?php echo site_url('login');?>" class="btn white-color" style="text-align: left !important;">Masuk</a></li>   
              <?php endif; ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="total-icons-keranjang">
                  </span>
                  <span class="fa fa-shopping-basket fa-lg"></span>
                </a>
                <ul class="dropdown-keranjang dropdown-menu scrollable-menu">
                 
                                 
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>