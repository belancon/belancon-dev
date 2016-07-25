<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header" style="height: 150px;">
  <?php $this->load->view('_parts/navbar'); ?>
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-3">
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('/');?>">Home</a></li>
          <li class="active">Cara Download Icon</li>
        </ol>
      </div>
    </div>
  </div>  
</div>

<?php $this->load->view('_parts/loader'); ?>
    
    <div id="home-icons" style="min-height: 768px; padding-top: 50px;">
      <div class="container">
        <?php $this->load->view('_parts/notification'); ?>

        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center green-color" style="margin-bottom: 20px;">
              Cara Mendownload Icons
            </h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <p class="text-center black-color">
              Berikut kami akan memberikan tata cara bagaimana mendownload sebuah Icons dari website Belancon.com
            </p>
          </div>
        </div>

        <div class="row" style="margin-top: 50px;">
          <div class="col-md-8 col-md-offset-2">
            <img style="border: 1px solid #d0d0d0;" src="<?php echo base_url('assets/public/themes/belancon');?>/img/tata-download-1.png" class="img-responsive" alt="">
            <h4 class="text-center" style="margin-top: 20px;">
              1. Silahkan anda kunjungi halaman Home pada website Belancon.com
            </h4>
          </div>
        </div>

        <div class="row" style="margin-top: 50px;">
          <div class="col-md-8 col-md-offset-2">
            <img style="margin:0 auto; border: 1px solid #d0d0d0;" src="<?php echo base_url('assets/public/themes/belancon');?>/img/tata-download-2.png" class="text-center img-responsive" alt="">
            <h4 class="text-center" style="margin-top: 20px;">
              2. Tersedia fitur search form untuk mencari dengan cepat Icon apa yang anda butuhkan. Gunakan minimal 3 karakter untuk mencarinya.
            </h4>
          </div>
        </div>

        <div class="row" style="margin-top: 50px;">
          <div class="col-md-8 col-md-offset-2">
            <img style="margin:0 auto; border: 1px solid #d0d0d0;" src="<?php echo base_url('assets/public/themes/belancon');?>/img/tata-download-3.png" class="text-center img-responsive" alt="">
            <h4 class="text-center" style="margin-top: 20px;">
              3. Jika anda ingin melihat icon-icon terbaru atau terpopular, silahkan lihat halaman bawah pada website Belancon.com (tepat di bawah fitur search form).
            </h4>
          </div>
        </div>

        <div class="row" style="margin-top: 50px;">
          <div class="col-md-8 col-md-offset-2">
            <img style="margin:0 auto; border: 1px solid #d0d0d0;" src="<?php echo base_url('assets/public/themes/belancon');?>/img/tata-download-4.png" class="text-center img-responsive" alt="">
            <h4 class="text-center" style="margin-top: 20px;">
              4. Untuk menambahkan Icon yang kita pilih ke dalam Keranjang, silahkan arahkan mouse atau tap pada bagian Icon tersebut, lalu akan ada menu yang ditampilkan.
            </h4>
          </div>
        </div>

        <div class="row" style="margin-top: 50px;">
          <div class="col-md-8 col-md-offset-2">
            <img style="margin:0 auto; border: 1px solid #d0d0d0;" src="<?php echo base_url('assets/public/themes/belancon');?>/img/tata-download-5.png" class="text-center img-responsive" alt="">
            <h4 class="text-center" style="margin-top: 20px;">
              5. Setelah klik menu Keranjang pada Icon tersebut, maka akan keluar notif di pojok kanan atas bahwa Icon sukses ditambahkan dalam Keranjang.
            </h4>
          </div>
        </div>

        <div class="row" style="margin-top: 50px;">
          <div class="col-md-8 col-md-offset-2">
            <img style="margin:0 auto; border: 1px solid #d0d0d0;" src="<?php echo base_url('assets/public/themes/belancon');?>/img/tata-download-6.png" class="text-center img-responsive" alt="">
            <h4 class="text-center" style="margin-top: 20px;">
              6. Untuk melihat Icon yang baru saja ditambahkan pada Keranjang, anda bisa klik menu bagian atas website (Icon Keranjang pada pojok kanan atas). <br>Lalu klik menu <span class="green-color">'Download Icons'</span>
            </h4>
          </div>
        </div>

        <div class="row" style="margin-top: 50px;">
          <div class="col-md-8 col-md-offset-2">
            <img style="margin:0 auto; border: 1px solid #d0d0d0;" src="<?php echo base_url('assets/public/themes/belancon');?>/img/tata-download-7.png" class="text-center img-responsive" alt="">
            <h4 class="text-center" style="margin-top: 20px;">
              7. Berikut adalah halaman Keranjang anda, untuk melakukan download Icon silahkan pilih terlebih dahulu type Icon yang ingin anda download. Di sana tersedia 3 type, <br>yakni: <span class="green-color">.PNG, .PSD (Photoshop), .AI (Adobe Illustrator)</span>
            </h4>
          </div>
        </div>

      </div>
    </div>

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>