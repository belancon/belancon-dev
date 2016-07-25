<?php $this->load->view('_parts/public_header_view'); ?>
<div id="header" style="height: 150px;">
  <?php $this->load->view('_parts/navbar'); ?>
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-3">
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('/');?>">Home</a></li>
          <li class="active">Kebijakan Privasi</li>
        </ol>
      </div>
    </div>
  </div>  
</div>

<?php $this->load->view('_parts/loader'); ?>
    
    <div id="home-icons" style="min-height: 700px; padding-top: 50px;">
      <div class="container">
        <?php $this->load->view('_parts/notification'); ?>

        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center green-color" style="margin-bottom: 20px;">
              Kebijakan Privasi
            </h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <p class="black-color">
              Kebijakan privasi yang dimaksud di Belancon.com adalah acuan yang mengatur dan melindungi penggunaan data dan informasi penting para pengguna situs Belancon.com. Data dan informasi yang telah dikumpulkan pada saat mendaftar, mengakses dan menggunakan layanan di Belancon.com, seperti alamat e-mail, nomor telepon, foto, gambar, <br>dan lain-lain.
            </p>
          </div>
        </div>

        <div class="row" style="margin-top: 20px;">
          <!-- <div class="container"> -->
            <div class="col-md-8 col-md-offset-2">
              <h5>Kebijakan - kebijakan tersebut di antaranya:</h5>
              <ul class="hukum-list">
                <li>
                  Belancon.com melindungi segala informasi yang diberikan pengguna pada saat pendaftaran, mengakses, dan menggunakan seluruh layanan Belancon.com.
                </li>
                <li>
                  Belancon.com melindungi segala hak pribadi yang muncul atas informasi mengenai suatu produk yang ditampilkan oleh pengguna layanan Belancon.com, baik berupa berupa foto, username, logo, dan lain-lain.
                </li>
                <li>
                  Belancon.com berhak menggunakan data dan informasi para pengguna situs demi meningkatkan mutu dan pelayanan di Belancon.com.
                </li>
                <li>
                  Belancon.com tidak bertanggung jawab atas pertukaran data yang dilakukan sendiri di antara pengguna situs.
                </li>
                <li>
                  Belancon.com hanya dapat memberitahukan data dan informasi yang dimiliki oleh para pengguna situs bila diwajibkan dan/atau diminta oleh institusi yang berwenang berdasarkan ketentuan hukum yang berlaku, perintah resmi dari pengadilan, dan/atau perintah resmi dari instansi/aparat yang bersangkutan.
                </li>
                <li>
                  Pengguna situs Belancon.com dapat berhenti berlangganan beragam informasi promo terbaru dan penawaran eksklusif (unsubsribe) jika tidak ingin menerima informasi tersebut.
                </li>
              </ul>
            </div>
          <!-- </div> -->
        </div>

      </div>
    </div>

<?php $this->load->view('_parts/footer'); ?>

<?php $this->load->view('_parts/public_footer_view'); ?>