<?php 
include '../../../assets/config/koneksi.php';
session_start(); 
  if (!isset($_COOKIE['nama']) AND !isset($_SESSION['nama'])) {
    header("location:../../");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>KPKBarberShop - Invoice</title>
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
  <link rel="stylesheet" href="../../../assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="../../../assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="../../../assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../../../assets/material-design-icons/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../../../assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css ../../assets/styles/app.min.css -->
  <link rel="stylesheet" href="../../../assets/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="../../../assets/styles/font.css" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <link rel="stylesheet" type="text/css" href="../../../css/loading.css"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside modal nav-dropdown">
  	<!-- fluid app aside -->
    <div class="left navside dark dk" data-layout="column">
  	  <div class="navbar no-radius">
        <!-- brand -->
        <a class="navbar-brand">
        	<div ui-include="'../assets/images/logo.svg'"></div>
        	<img src="../../../assets/images/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline">Flatkit</span>
        </a>
        <!-- / brand -->
      </div>
      <div class="hide-scroll" data-flex>
          <nav class="scroll nav-light">
            
              <ul class="nav" ui-nav>
                <li class="nav-header hidden-folded">
                  <small class="text-muted">Main</small>
                </li>
                
                <li>
                  <a href="dashboard.html" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'../assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Dashboard</span>
                  </a>
                </li>
            
                <li>
                  <a href="../dashboard.php?page=pilih-waktu">
                    <span class="nav-caret">
                      <i class=""></i>
                    </span>
                    <span class="nav-icon">
                      <i class="material-icons">&#xe5c3;
                      </i>
                    </span>
                    <span class="nav-text">Kembali</span>
                  </a>
                </li>
              </ul>
          </nav>
      </div>
    </div>
  </div>
  <!-- / -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
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
              <!-- / -->
            </div>
            <!-- / navbar collapse -->
        
            <!-- navbar right -->

            <!-- / navbar right -->
        </div>
    </div>
    <div class="app-footer">
      <div class="p-2 text-xs">
        <div class="pull-right text-muted py-1">
          &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love v1.1.3</span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
      </div>
    </div>
    <div ui-view class="app-body" id="view">

<!-- ############ PAGE START-->
<div class="padding">
    <a href class="btn btn-sm btn-info pull-right hidden-print" onClick="window.print();">Print</a>
    <p><i class="fa fa-apple fa fa-3x"></i></p>
    <div class="row">
      <div class="col-xs-12">
        <h4 class="text-md">Apple Inc.</h4>
        <p><a href="http://www.apple.com">www.apple.com</a></p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="box p-a">
          <strong class="text-muted">ORDER DETAIL:</strong>
          <br><br>
          <h6>Jack Perez</h6>
          <p class="text-muted">
            <p>Order date: <strong>26th Mar 2013</strong><br>
                Order status: <span class="label success">Shipped</span><br>
                Order ID: <strong>#9399034</strong>
            </p>
          </p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="box p-a">
          <strong class="text-muted">PEMBAYARAN :</strong>
          <br><br>
          <h6>Jack Perez</h6>
          <p class="text-muted">
            2nd Floor<br>
            St John Street, Aberdeenshire 2541<br>
            United Kingdom<br>
            Phone: 031-432-678<br>
            Email: youemail@gmail.com<br>
          </p>
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped white b-a">
        <thead>
          <tr>
            <th style="width: 60px">QTY</th>
            <th>DESCRIPTION</th>
            <th style="width: 140px">UNIT PRICE</th>
            <th style="width: 90px">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>iPhone 5 32GB White & Silver (GSM) Unlocked</td>
            <td>$749.00</td>
            <td>$749.00</td>
          </tr>
          <tr>
            <td>2</td>
            <td>iPad mini with Wi-Fi 32GB - White & Silver</td>
            <td>$429.00</td>
            <td>$858.00</td>
          </tr>
          <tr>
            <td colspan="3" class="text-right"><strong>Subtotal</strong></td>
            <td>$1607.00</td>
          </tr>
          <tr>
            <td colspan="3" class="text-right no-border"><strong>Shipping</strong></td>
            <td>$0.00</td>
          </tr>
          <tr>
            <td colspan="3" class="text-right no-border"><strong>VAT Included in Total</strong></td>
            <td>$0.00</td>
          </tr>
          <tr>
            <td colspan="3" class="text-right no-border"><strong>Total</strong></td>
            <td><strong>$1607.00</strong></td>
          </tr>
        </tbody>
      </table>
    </div>          
  </div>

<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->

  <!-- theme switcher -->
  
  <!-- / -->

<!-- ############ LAYOUT END-->

  </div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->

</body>
</html>
