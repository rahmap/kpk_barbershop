
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <!-- Script: Navbar on-top -->
  <!-- <script src="js/navbar-ontop.js"></script> -->
</head>

<body style="background-image: url('assets/img/bg-login.jpg');">
  <?php session_start(); include 'data/function.php'; cekLogin(); ?>
  <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php"><b>ALDYS BarberShop</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php?#regis">Daftar</a>
          </li>
<!--           <li class="nav-item mx-2 mb-2 my-md-0">
            <a class="nav-link" href="#how">How</a>
          </li> -->
        </ul>
        <a class="btn navbar-btn btn-outline-light" href="index.php">Home</a>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
      </div>
    </div>
  </div>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-6 col-10 p-5" style="background: #D1D1D1;">
          <h4 class="mb-3 justify-content-end">Silahkan masuk menggunakan akun yang telah anda daftarkan.</h4>
          <form action="data/prosses-login.php" method="POST">
            <div class="form-group"> <input type="email" name="email" class="form-control" placeholder="Email" id="form9"> </div>
            <div class="form-group mb-3"> <input type="password" class="form-control" placeholder="Kata Sandi" id="form10" name="password"> <small class="form-text text-muted text-right"></small> </div>
            <div class="form-check my-3 text-dark text-md-left"> <input class="form-check-input" type="checkbox" id="form21" name="ingat" value="ingat"> <label class="form-check-label" for="form21" contenteditable="true" > Ingat Saya </label> </div>
            <button type="submit" name="submit" class="btn btn-primary">Masuk</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="js/smooth-scroll.js"></script>
</body>

</html>