<?php 
date_default_timezone_set('Asia/Jakarta'); 
?>
  <div class="padding">  
    <div class="col-md-4 offset-md-3">
      <div class="box text-center">
        <div class="box-header">
          <h2 class="text-center"><b>Cetak Laporan Transaksi</b></h2>
        </div>
        <hr>
        <div class="box-body">
          <div class="text-center">
            <p class="m-0">
              <?= "Laporan jumlah transaksi pada KPK BarberShop berdasarkan hari, <br>yang terjadi mulai tanggal <b class='text-blue'>"
                .date('01 F, Y')."</b> sampai <b class='text-danger'>".date('d F, Y').'</b>.' 
              ?>
            </p>
            <br>
            <p class="m-0">
              Silahkan pilih jenis transaksi :
            </p>
          </div>
        </div>
        <a target="_blank" href="laporan/laporan-transaksi-offline.php" ><button class="md-btn md-raised m-b-sm w-xs primary ">Offline</button></a>
        <a target="_blank" href="laporan/laporan-transaksi-online.php" ><button class="md-btn md-raised m-b-sm w-xs danger ">Online</button></a>
      </div>
    </div>
  </div>