<?php 
include '../../assets/config/koneksi.php';
session_start(); 
  if (!isset($_COOKIE['nama']) AND !isset($_SESSION['nama'])) {
    header("location:../../");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Flatkit - HTML Version | Bootstrap 4 Web App Kit with AngularJS</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../../assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="../../assets/images/logo.png">
  
  <!-- style -->
  <link rel="stylesheet" href="../../assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/material-design-icons/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../../assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css ../../assets/styles/app.min.css -->
  <link rel="stylesheet" href="../../assets/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="../../assets/styles/font.css" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <link rel="stylesheet" type="text/css" href="../../css/loading.css"/>
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
        <a class="navbar-brand">
          <div ui-include="'../../assets/images/logo.svg'"></div>
          <img src="../../assets/images/logo.png" alt="." class="hide">
          <span class="hidden-folded inline">KPK Barber</span>
        </a>
        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll nav-active-primary">
          
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">Admin</small>
              </li>
              
              <li>
                <a href="dashboard.php?page=main" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3fc;
                      <span ui-include="'../../assets/images/i_0.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label">
                    <b class="label rounded label-sm primary">5</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe5c3;
                      <span ui-include="'../../assets/images/i_1.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Services</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="dashboard.php?page=pilih-waktu">
                      <span class="nav-text">Boking Tempat</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=list-order" >
                      <span class="nav-text">List Order</span>
                    </a>
                  </li>
                  <li>
                    <a href="calendar.html" >
                      <span class="nav-text">Hapus Harga</span>
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
                    <b class="label rounded label-sm primary">5</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe5c3;
                      <span ui-include="'../../assets/images/i_1.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Pesanan</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="inbox.html" >
                      <span class="nav-text">Input Data Manual</span>
                    </a>
                  </li>
                  <li>
                    <a href="contact.html" >
                      <span class="nav-text">Data Boking Online</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=list-pesanan" >
                      <span class="nav-text">List Pesanan</span>
                    </a>
                  </li>
                  <li>
                    <a href="asides.html" >
                      <span class="nav-text">Atur Diskon</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe8f0;
                      <span ui-include="'../../assets/images/i_2.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Data User</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="dashboard.php?page=tambah-user" >
                      <span class="nav-text">Tambah User</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=data-admin" >
                      <span class="nav-text">List Admin</span>
                    </a>
                  </li>
                  <li>
                    <a href="dashboard.php?page=data-member" >
                      <span class="nav-text">List Member</span>
                    </a>
                  </li>
                </ul>
              </li>
          
              <li>
                <a href="widget.html" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe8d2;
                      <span ui-include="'../../assets/images/i_3.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Katalog</span>
                </a>
              </li>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe8f0;
                      <span ui-include="'../../assets/images/i_2.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Other</span>
                </a>
                <ul class="nav-sub">
                  <!-- <li>
                    <a href="dashboard.php?page=tambah-user" >
                      <span class="nav-text">Tambah User</span>
                    </a>
                  </li> -->
                </ul>
              </li>
          
              <li class="nav-header hidden-folded">
                <small class="text-muted">Components</small>
              </li>          
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label"><b class="label no-bg">9</b></span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3e8;
                      <span ui-include="'../../assets/images/i_5.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Pages</span>
                </a>
                <ul class="nav-sub nav-mega">
                  <li>
                    <a href="profile.html" >
                      <span class="nav-text">Profile</span>
                    </a>
                  </li>
                </ul>
              </li>
          
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe39e;
                      <span ui-include="'../../assets/images/i_6.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Form</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="form.layout.html" >
                      <span class="nav-text">Form Layout</span>
                    </a>
                  </li>
                  <li>
                    <a href="form.dropzone.html" class="no-ajax" >
                      <span class="nav-text">File Upload</span>
                    </a>
                  </li>
                </ul>
              </li>
          
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe896;
                      <span ui-include="'../../assets/images/i_7.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Tables</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="static.html" >
                      <span class="nav-text">Static table</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label hidden-folded">
                    <b class="label label-sm info">N</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe1b8;
                      <span ui-include="'../../assets/images/i_8.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Charts</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="chart.html" >
                      <span class="nav-text">Chart</span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="nav-caret">
                        <i class="fa fa-caret-down"></i>
                      </span>
                      <span class="nav-text">Echarts</span>
                    </a>
                    <ul class="nav-sub">
                      <li>
                        <a href="echarts-map.html" >
                          <span class="nav-text">Map</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
          
              <li class="nav-header hidden-folded">
                <small class="text-muted">Help</small>
              </li>
              
              <li class="hidden-folded" >
                <a href="docs.html" >
                  <span class="nav-text">Documents</span>
                </a>
              </li>
          
            </ul>
        </nav>
      </div>
      <div flex-no-shrink>
      <nav ui-nav>
        <ul class="nav">
          <li><div class="b-b b m-v-sm"></div></li>
          <li class="no-bg">
            <a class="auto">
              <span class="nav-icon">
                <i class="material-icons inline">&#xe835;</i>
                <i class="material-icons text-warn none">&#xe834;</i>
              </span>
              <span class="nav-text">Filter</span>
            </a>
          </li>
          <li class="no-bg">
            <a>
              <span class="nav-icon">
                <i class="material-icons">&#xe83a;</i>
              </span>
              <span class="nav-text">
                Star<small class="block text-muted">Border</small>
              </span>
            </a>
          </li>
          <li><div class="b-b b m-t-sm"></div></li>
          <li class="no-bg">
            <a href="../../data/logout.php">
              <span class="nav-icon">
               <i class="material-icons">&#xe8ac;</i>
              </span>
              <span class="nav-text">Logout</span>
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
                <li class="nav-item dropdown">
                  <a class="nav-link" href data-toggle="dropdown">
                  </a>
                  <div ui-include="'../../views/blocks/dropdown.new.html'"></div>
                </li>
              </ul>
        
              <div ui-include="'../../views/blocks/navbar.form.html'"></div>
              <!-- / -->
            </div>
            <!-- / navbar collapse -->
        
            <!-- navbar right -->
            <ul class="nav navbar-nav ml-auto flex-row">
              <li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link mr-2" href data-toggle="dropdown">
                  <i class="material-icons">&#xe7f5;</i>
                  <span class="label label-sm up warn">3</span>
                </a>
                <div ui-include="'../../views/blocks/dropdown.notification.html'"></div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                  <span class="avatar w-32">
                    <img src="../../assets/images/a0.jpg" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div ui-include="'../../views/blocks/dropdown.user.html'"></div>
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
          &copy; Copyright <strong>KPKBarberShop</strong> <span class="hidden-xs-down">- Made with Love </span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
          <a class="nav-link" href="../">About</a>
          <a class="nav-link" href="">Get it</a>
        </div>
      </div>
    </div>
    <div ui-view class="app-body" id="">


