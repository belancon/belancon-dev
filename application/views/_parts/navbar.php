<nav class="navbar navbar-default">
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
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="total-icons-keranjang">
                  </span>
                  <span class="fa fa-shopping-basket fa-lg"></span>
                </a>
                <ul class="dropdown-keranjang dropdown-menu scrollable-menu">
                 
                                 
                </ul>
              </li>
              <?php if($this->ion_auth->logged_in()):?>
              <li><a href="<?php echo site_url('member/icon');?>"><strong>Iconku</strong></a></li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <strong><?php echo user_login('username');?></strong>
                    <span class="fa fa-user fa-lg"></span>
                  </a>
                  <ul class="dropdown-menu scrollable-menu">
                      <li><a href="<?php echo site_url('member/profile');?>">Profile</a></li> 
                      <li><a href="<?php echo site_url('member/change-password');?>">Ubah Password</a></li>
                      <li><a href="<?php echo site_url('user/logout');?>">Logout</a></li>
                  </ul>
              </li>
              <?php endif; ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>