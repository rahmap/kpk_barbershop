<?php //die($_COOKIE['ID_USER']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="../assets/img/favicon.ico">
  <title>Beranda Admin - ALDYS BarberShop</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">
  <?php if(isset($_GET['page']) AND $_GET['page'] == 'data-transaksi'): ?>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/datatables.min.css"/>
	<?php endif; ?>
  <!-- style -->
  <link rel="stylesheet" href="../assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="../assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../assets/material-design-icons/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css ../assets/styles/app.min.css -->
  <link rel="stylesheet" href="../assets/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="../assets/styles/font.css" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <link rel="stylesheet" type="text/css" href="../css/loading.css"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <div id="loading" class="loading" style="display: none;"></div>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

<!-- aside -->
<div id="aside" class="app-aside modal fade folded md nav-expand">
    <div class="left navside indigo-900 dk" layout="column">
      <div class="navbar navbar-md no-radius">
        <!-- brand -->
        <a class="navbar-brand" href="../">
          <!-- <div ui-include="'../assets/images/logo.svg'"></div> -->
          <img src="../assets/images/newlogo.png" alt=".">
          <span class="hidden-folded inline">ALDYS Barber</span>
        </a>
        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll nav-active-primary">
          
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted"><hr></small>
              </li>
              
              <li>
                <a href="dashboard.php?page=main" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3fc;
                      <span ui-include="'../assets/images/i_0.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Dasbor</span>
                </a>
              </li>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label">
                    <b class="label rounded label-sm primary">1</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe5c3;
                      <span ui-include="'../assets/images/i_1.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Layanan</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="dashboard.php?page=data-paket" >
                      <span class="nav-text">Data Paket Harga</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=data-barberman" >
                      <span class="nav-text">Data Barberman</span>
                    </a>
                  </li>
                  <!-- <li>
                    <a href="contact.html" >
                      <span class="nav-text">Update Harga</span>
                    </a>
                  </li>
                  <li>
                    <a href="calendar.html" >
                      <span class="nav-text">Hapus Harga</span>
                    </a>
                  </li> -->
                </ul>
              </li>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label">
                    <b class="label rounded label-sm primary">3</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe5c3;
                      <span ui-include="'../assets/images/i_1.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Pesanan</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="dashboard.php?page=input-data-manual" >
                      <span class="nav-text">Masukan Data Transaksi Manual</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=list-pesanan-manual" >
                      <span class="nav-text">Daftar Transaksi Offline</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=list-pesanan" >
                      <span class="nav-text">Daftar Pemesanan Online</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a>
                  <span class="nav-label">
                    <b class="label rounded label-sm primary">3</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe8f0;
                      <span ui-include="'../assets/images/i_2.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Data Pengguna</span>
                </a>
                <ul class="nav">
                  <li>
                    <a href="dashboard.php?page=tambah-user" >
                      <span class="nav-text">Tambah Pengguna</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=data-admin" >
                      <span class="nav-text">Daftar Admin</span>
                    </a>
                  </li>
									<li>
                    <a href="dashboard.php?page=data-kasir" >
                      <span class="nav-text">Daftar Kasir</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=data-member" >
                      <span class="nav-text">Daftar Member</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label">
                    <b class="label rounded label-sm primary">3</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe5c3;
                      <span ui-include="'../assets/images/i_1.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Laporan</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="dashboard.php?page=laporan-pendapatan" >
                      <span class="nav-text">Pendapatan</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=laporan-transaksi" >
                      <span class="nav-text">Transaksi</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=data-transaksi" >
                      <span class="nav-text">Data Transaksi</span>
                    </a>
                  </li>
                </ul>
              </li>
        </nav>
      </div>
      <div flex-no-shrink>
      <nav ui-nav>
        <ul class="nav">
          <li><div class="b-b b m-t-sm"></div></li>
          <li class="no-bg">
            <a href="../data/logout.php">
              <span class="nav-icon">
               <i class="material-icons">&#xe8ac;</i>
              </span>
              <span class="nav-text">Keluar</span>
            </a>
          </li>
        </ul>
      </nav>
      </div>
    </div>
  </div>
  <!-- / aside -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z1" role="main">
    <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
              <i class="material-icons">&#xe5d2;</i>
            </a>
            <!-- / -->
        
            <!-- Page title - Bind to $state's title -->
            <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
        
            <!-- navbar collapse -->
            <div class="collapse navbar-collapse" id="collapse">
              <!-- link and dropdown -->
              <ul class="nav navbar-nav mr-auto">
              </ul>
              <!-- / -->
            </div>
            <!-- / navbar collapse -->
          <?php
              if (isset($_SESSION['id_user'])) {
              $id_user = $_SESSION['id_user'];
              } else if (isset($_COOKIE['ID_USER'])) {
                $id_user = $_COOKIE['ID_USER'];
              }
              $q = mysqli_query($conn,"SELECT foto FROM data_user WHERE id_user = '$id_user' ");
              $res = mysqli_fetch_assoc($q);
            ?>
            <!-- navbar right -->
            <ul class="nav navbar-nav ml-auto flex-row">
              <li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link mr-2" href data-toggle="dropdown">
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                  <span class="avatar w-32">
                    <img src="assets/images/photo-user/<?= $res['foto'] ?>" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
                </a>
              </li>
              <li class="nav-item hidden-md-up">
                <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
                  <i class="material-icons">&#xe5d4;</i>
                </a>
              </li>
            </ul>
            <!-- / navbar right -->
        </div>
    </div>
    <div class="app-footer">
      <div class="p-2 text-xs">
        <div class="pull-right text-muted py-1">
          &copy; Copyright <strong>ALDYSBarberShop</strong> <span class="hidden-xs-down">- Made with Love </span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
<!--           <a class="nav-link" href="../">About</a>
          <a class="nav-link" href="">Get it</a> -->
        </div>
      </div>
    </div>
    <div ui-view class="app-body" id="">


