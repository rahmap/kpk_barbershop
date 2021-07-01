<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="assets/img/favicon.ico">
  <title>Home - ALDYS BarberShop</title>
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/colorful.css">
  <link rel="stylesheet" type="text/css" href="css/loading.css">
  <!-- Script: Navbar on-top -->
  <script src="js/navbar-ontop.js"></script>
</head>

<body>

  <div id="homekpk"></div>
  <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><b>ALDYS BarberShop</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar3SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" id="btnLogin" href="login.php">Masuk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="btnLogout" href="data/logout.php">Keluar</a>
          </li>
        </ul>
        <a class="btn navbar-btn btn-outline-light" href="#homekpk">Home</a>
      </div>
    </div>
  </nav>
  <div class="py-5 text-center cover d-flex flex-column bg-dark">
    <div class="container my-auto">
      <div class="row">
        <div class="mx-auto col-lg-6 col-md-8">
          <h1 class="display-1 mb-0 mt-5 big-title">ALDYS</h1>
          <h3 class="mb-4"><b>Kulo Pengen Keren BarberShop</b></h3>
          <!-- <h4> "Enak Tur Keras" </h4> -->
          <p>“Heroes don’t always wear capes, badges, or uniforms. Ganteng itu pilihan.”</p><br><br>
          <div class="col-md-12">
            <a class="btn btn-outline-secondary" id="getRegis" href="#regis"> Buat Akun Sekarang!</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-auto">
      <div class="row">
        <div class="mx-auto col-lg-6 col-md-8 col-10">
          <a href="#mission"><i class="d-block fa fa-angle-down fa-2x"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 filter-dark cover bg-fixed" style="background-image: url('assets/img/bg.jpg');background-position:center bottom;background-size:cover;" id="mission">
    <div class="container my-auto">
      <div class="row">
        <div class="col-md-8 p-3 text-white" id="mission">
          <h2 class="mb-4" id="coba">Tujuan Kami</h2>
          <p class="lead"><i>Mempermudah anda dalam mencukur rambut,<br>Sehingga mendapatkan kegantengan maximal bukanlah hal yang sulit<br></i></p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-light" id="what tesH">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-10 mx-auto px-4">
          <h2 class="text-muted mb-4" id="how">Apa Yang Kami Lakukan</h2>
          <div class="row text-left">
            <div class="p-3 col-lg-4 col-md-6">
              <div class="row mb-3">
                <div class="text-center col-3"><i class="d-block mx-auto fa text-muted fa-4x fa-flask"></i></div>
                <div class="align-self-center d-flex align-items-center px-0 px-md-2 col-9">
                  <h5 class="mb-0"><b>&nbsp; &nbsp;Ramuan Khusus</b></h5>
                </div>
              </div>
              <p class="text-muted">Menggunakan ramuan khusus untuk kesehatan rambut anda.</p>
            </div>
            <div class="p-3 col-lg-4 col-md-6">
              <div class="row mb-3">
                <div class="text-center col-3"><i class="d-block mx-auto fa text-muted fa-4x fa-fire"></i></div>
                <div class="align-self-center d-flex align-items-center px-0 px-md-2 col-9">
                  <h5 class="mb-0"><b>&nbsp; Memberi Sinar</b></h5>
                </div>
              </div>
              <p class="text-muted">Membuat wajah anda lebih bersinar, dengan gaya rambut pilihan.</p>
            </div>
            <div class="p-3 col-lg-4">
              <div class="row mb-3">
                <div class="text-center col-3"><i class="d-block mx-auto fa text-muted fa-4x fa-fighter-jet"></i></div>
                <div class="align-self-center d-flex align-items-center px-0 px-md-2 col-9">
                  <h5 class="mb-0"><b>&nbsp; Tanpa Antri</b></h5>
                </div>
              </div>
              <p class="text-muted">Jika anda seorang yang sibuk, jangan khawatir! kami solusinya.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-5" id="boking">
                                    <!-- Tempat load paket -->
  </div>
  <div class="py-3 bg-light" id="regis">
    <div class="container">
      <div class="row">
        <div class="col-md-8 p-4">

          <h1>Buat akun sekarang!</h1>
          <p>Setelah registrasi selesai, anda akan mendapatkan berbagai kemudahan.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 p-4">
          <h3>Mencari Kami?</h3>
          <p>Hubungi kami melalui kontak yang tersedia dibawah.</p>
          <p class="lead mt-3"> <b>Support</b> </p>
          <p> <a href="#">+62 898 200 2040</a> </p>
          <p> <a href="#">support@smvll.com</a> </p>
          <p class="lead mt-3"> <b>Marketing</b> </p>
          <p> <a href="#">+62 898 200 2040</a> </p>
          <p> <a href="#">sales@smvll.com</a> </p>
          <p class="lead mt-3"> <b>General</b> </p>
          <p> <a href="#">info@smvll.com</a> </p>
        </div>
        <div class="col-md-7 p-4">
          <h3 class="mb-3">Formulir Pendaftaran</h3>
          <form action="data/prosses-daftar.php" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6"> <input required="" minlength="3" name="fnama" type="text" class="form-control" id="form36" placeholder="Nama Depan"> </div>
              <div class="form-group col-md-6"> <input  required="" name="lnama" minlength="3" type="text" class="form-control" id="form37" placeholder="Nama Belakang"> </div>
            </div>
            <div class="form-group">
              <input required="" type="email" name="email" class="form-control" id="form39" placeholder="Email">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input name="nohp" type="number" required class="form-control" id="form40" placeholder="628.. atau 089..">
              </div>
              <div class="form-group col-md-6">
                <select required="" name="jenkel" id="inputState" class="form-control">
                  <option selected="" value="X"> - Pilih -</option>
                  <option value="L">Pria</option>
                  <option value="P">Wanita</option>
                </select>
              </div>
            </div>
            <div class="form-group"> <input required="" minlength="8" type="password" name="pass" class="form-control mb-2"  placeholder="Kata Sandi"> </div>
            <div class="form-group"> <input required="" minlength="8" type="password" name="pass-fix" class="form-control mb-2" placeholder="Konfirmasi Kata Sandi"> </div>
            <button type="submit" name="submit" class="btn btn-primary">Daftar!</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="text-white bg-dark">
    <div class="container">
      <div class="row">
        <!-- <div class="p-5 col-md-6">
          <h3><b>ALDYS Barber</b></h3>
          <p class="">
            <a href="#" target="_blank">Jalan Turi - Pakem <br>Km 3 Sleman DIY</a>
          </p>
          <p class="">
            <a href="#">smvll.co</a>
          </p>
          <p class="mb-3">
            <a href="#">+62 898 200 2040&nbsp;</a>
          </p>
          <a href="#" target="_blank"><i class="fa d-inline fa-lg mr-3 text-white fa-linkedin"></i></a>
          <a href="#" target="_blank"><i class="fa fa-facebook d-inline fa-lg mr-3 text-white"></i></a>
        </div>
        <div class="p-5 col-md-6">
          <h3>Butuh Bantuan?</h3>
          <form>
            <div class="form-group">
              <input type="email" class="form-control form-control-sm" placeholder="Email" required="required" name="email"> </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" id="inlineFormInput" placeholder="Subject" required="required" name="subject"> </div>
            <div class="form-group"><textarea class="form-control p-1 form-control-sm" id="exampleTextarea" rows="3" placeholder="Tulis pesanmu" name="message"></textarea></div>
            <button type="submit" class="btn btn-outline-light btn-sm">SUBMIT</button>
          </form>
        </div> -->
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-muted">© Copyright 2021 ALDYS BarberShop - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="modalBoking">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Halo!</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">
          <p>Silahkan login dulu untuk melanjutkan prosses boking!<br>Belum punya Akun?
            <a class="text-info" href="#regis" data-dismiss="modal" > Daftar</a> sekarang. Gratis!</p>
        </div>
        <div class="modal-footer"> 
          <a href="login.php"><button type="button" class="btn btn-primary">Masuk</button></a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> </div>
      </div>
    </div>
  </div>
  <div class="loading" id="loading" style="display: none;"></div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="js/addon.js"></script>
  <script src="js/smooth-scroll.js"></script>
  
</body>

</html>