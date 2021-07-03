
<!-- ############ PAGE START-->
<?php 
include '../../assets/config/koneksi.php'; 
if (isset($_SESSION['id_user'])) {
    $q = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = '".$_SESSION['id_user']."'");
    $res = mysqli_fetch_assoc($q);
} else if (isset($_COOKIE['ID_USER'])) {
    $q = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = '".$_COOKIE['ID_USER']."' ");
    $res = mysqli_fetch_assoc($q);
}

  $pending = mysqli_query($conn, "SELECT COUNT(id_boking) AS pen FROM boking WHERE status = 'pending' AND id_user = '".getIdUser()."'  ");
  $res1 = mysqli_fetch_assoc($pending);
  $gagal = mysqli_query($conn, "SELECT COUNT(id_boking) AS gagal FROM boking WHERE status = 'expired' AND id_user = '".getIdUser()."'  ");
  $res2 = mysqli_fetch_assoc($gagal);
    $success = mysqli_query($conn, "SELECT COUNT(id_boking) AS oke FROM boking WHERE status = 'success' AND id_user = '".getIdUser()."'  ");
  $res3 = mysqli_fetch_assoc($success);
  $all = mysqli_query($conn, "SELECT COUNT(id_boking) AS jml FROM boking WHERE id_user = '".getIdUser()."' ");
  $resAll = mysqli_fetch_assoc($all);
    $q = mysqli_query($conn, "SELECT * FROM paket_harga ph 
    JOIN boking b ON b.id_paket = ph.id_paket 
    LEFT JOIN barberman bar ON bar.id_barberman = b.id_barberman
    JOIN waktu_boking wb ON wb.id_waktu = b.id_waktu 
    WHERE b.id_user = '".getIdUser()."'  ORDER BY b.id_boking DESC LIMIT 0,5");
?>
  <div class="item">
    <div class="item-bg">
      <img src="../assets/images/photo-user/<?= $res['foto'] ?>" class="blur opacity-3">
    </div>
    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">
          <a href class="pull-left m-r-md">
            <span class="avatar w-96">
              <img src="../assets/images/photo-user/<?= $res['foto'] ?>">
              <i class="on b-white"></i>
            </span>
          </a>
          <div class="clear m-b">
            <h3 class="m-0 m-b-xs"><?= $res['fullname'] ?></h3>
            <p class="text-muted"><span class="m-r"><?= $res['email'] ?></span> <small></small></p>
            <div class="block clearfix m-b">
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-facebook indigo"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-twitter"></i>
                <i class="fa fa-twitter light-blue"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-google-plus red"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-linkedin"></i>
                <i class="fa fa-linkedin cyan-600"></i>
              </a>
            </div>
            <!-- <a href class="btn btn-sm warn btn-rounded m-b">Follow</a> -->
            <div style="height: 50px"></div>
          </div>
        </div>  
      </div>
    </div>
  </div>
  <div class="dker p-x">
    <div class="row">
      <div class="col-sm-6 push-sm-6">
      </div>
      <div class="col-sm-6 pull-sm-6">
        <div class="p-y-md clearfix nav-active-primary">
          <ul class="nav nav-pills nav-sm">
            <li class="nav-item active">
              <a class="nav-link" href data-toggle="tab" data-target="#tab_1">Aktifitas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href data-toggle="tab" data-target="#tab_4">Profil</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="padding">
    <div class="row">
      <div class="col-sm-8 col-lg-9">
        <div class="tab-content">      
          <div class="tab-pane p-v-sm active" id="tab_1">
            <div class="box">
              <div class="box-header info text-center">
                <h3>Rangkuman Aktifitas Anda</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box p-a">
                  <div class="pull-left m-r">
                    <span class="w-40 warn text-center rounded">
                      <i class="material-icons">shopping_basket</i>
                    </span>
                  </div>
                  <div class="clear">
                    <h4 class="m-0 text-md"><a href><?= $resAll['jml'] ?> <span class="text-sm">Transaksi</span></a></h4>
                    <small class="text-muted">Jumlah seluruh transaksi.</small>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box-color p-a accent">
                  <div class="pull-right m-l">
                    <span class="w-40 dker text-center rounded">
                      <i class="material-icons">local_shipping</i>
                    </span>
                  </div>
                  <div class="clear">
                    <h4 class="m-0 text-md"><a href><?= $res1['pen'] ?> <span class="text-sm">Menunggu Pembayaran</span></a></h4>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box p-a">
                  <div class="pull-right m-l">
                    <span class="w-40 dker text-center rounded danger">
                      <i class="material-icons">snooze</i>
                    </span>
                  </div>
                  <div class="clear">
                    <h4 class="m-0 text-md"><a href><?= $res2['gagal'] ?> <span class="text-sm">Pesanan Dibatalkan</span></a></h4>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box-color p-a success">
                  <div class="pull-left m-r">
                    <span class="w-40 dker text-center rounded">
                      <i class="material-icons">check_box</i>
                    </span>
                  </div>
                  <div class="clear">
                    <h4 class="m-0 text-md"><a href><?= $res3['oke'] ?> <span class="text-sm">Pesanan berhasil</span></a></h4>
                    <small class="text-muted"><?= $res3['oke'] ?> Berhasil.</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="box-header">
                <h2>Sekilas Riwayat Pesanan Anda</h2>
                <small>Untuk lebih detail silahkan klik 
                  <a href="dashboard.php?page=list-order" class="text-danger"><b>di sini.</b></a>
                </small>
              </div>
              <div>
                <table class="table m-b-none">
                  <thead>
                    <tr>
                        <th>
                            Nama Paket
                        </th>
                        <th>
                            Waktu Pemesanan
                        </th>
                        <th>
                            Barberman
                        </th>
                        <th >
                            Harga
                        </th>
                        <th>
                          Pembayaran
                        </th>
                        <th>
                            Status
                        </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $statusLbl; 
                    foreach ($q as $key) {
                      if ($key['diskon_harga'] != 0) {
                        $diskon = $key['harga_paket_member']*$key['diskon_harga'] /100;
                      } else {
                        $diskon = 0;
                      }
                      $fullUnik = explode('-', $key['id_pesan']);
                      $fullUnik = end($fullUnik);
                      $fullUnik = $fullUnik + $key['harga_paket_member']-$diskon;
                      if ($key['status'] == 'success') {
                        $statusLbl = "success";
                      } else if ($key['status'] == 'pending') {
                        $statusLbl = "warn";
                      } else {
                        $statusLbl = "red";
                      }
                      echo '<tr>
                              <td>'.$key["nama_paket"].'</td>
                              <td><b>'.$key["jam"].' - '.$key["hari"].'<b></td>
                              <td>'.$key["nama_barberman"].'</td>
                              <td data-value="'.$key["harga_paket_member"].'">Rp '.str_replace('+', '', money_format('%i', $key["harga_paket_member"]-$diskon)).'</td>
                              <td>'.$key["pembayaran"].'</td>
                              <td><span class="label '.$statusLbl.' " title="Active">'.$key['status'].'</span>
                              </td>
                            </tr>';
                    } 
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane p-v-sm" id="tab_4">
            <div class="streamline b-l m-b m-l">
              <div class="sl-item">
                <?php include 'pages/profile.php'; ?> <!-- PROFILE -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        $totUang = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ph.harga_paket_member-(ph.harga_paket_member*ph.diskon_harga/100)) AS uang FROM paket_harga ph 
                             JOIN boking b ON b.id_paket = ph.id_paket WHERE status = 'success' 
                             AND b.id_user = '".getIdUser()."' "));
      ?>
      <div class="col-sm-4 col-lg-3">
        <div>
          <div class="box">
              <div class="box-header info">
                <h3>Total Uang Di Belanjakan</h3>
              </div>
              <div class="box-divider m-0"></div>
              <ul class="list no-border p-b">
                <li class="list-item">
                  <a herf class="list-left">
                    <span class="w-40 avatar">
                      <img src="../../assets/images/kpklogo.png" alt="...">
                      <i class="on b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div><a href>Rp <?= str_replace('+', '', money_format('%i', $totUang['uang'])) ?></a></div>
                    <small class="text-muted text-ellipsis">Dari total transaksi berhasil.</small>
                  </div>
                </li>
              </ul>
          </div>
          <?php 
            $queryB = mysqli_query($conn, "SELECT * FROM boking b 
                      JOIN paket_harga ph ON b.id_paket = ph.id_paket
                      LEFT JOIN barberman bb ON b.id_barberman = bb.id_barberman 
                      JOIN data_user du ON du.id_user = b.id_user
                      WHERE b.id_user = '".getIdUser()."' 
                      ORDER BY b.id_boking DESC LIMIT 0,4  ");
          ?>
          <div class="box">
            <div class="box-header info">
              <h3>Aktifitas Pemesanan</h3>
            </div>
            <div class="box-divider m-0"></div>
            <ul class="list">
              <?php foreach ($queryB as $key) { ?>
                <li class="list-item">
                  <div class="list-body">
                    <p>Memesan <a href class="text-info"><?= $key['nama_paket'] ?></a> - <i><?= $key['id_pesan'] ?></i> </p>
                    <small class="block text-muted"><i class="fa fa-fw fa-clock-o"></i> <?= rtrim(substr($key['waktu_order'],0,19),':'); ?></small>
                  </div>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- ############ PAGE END-->


