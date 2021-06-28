<?php
include '../../assets/config/koneksi.php';
if (isset($_GET['cvsx']) AND $_GET['cvsx'] != '') {
  $id = 'ALDYS-'.$_GET['cvsx'];
  $cekKode = mysqli_num_rows(mysqli_query($conn,"SELECT id_pesan FROM boking WHERE id_pesan = '".$id."' "));
  if ($cekKode) { //CEK BAWAH
  $query = 'SELECT d.fullname,ph.harga_paket,ph.detail_paket,ph.nama_paket,
            b.pembayaran,b.status,b.waktu_order,b.id_pesan,ph.diskon_harga 
            FROM boking b 
            JOIN paket_harga ph ON b.id_paket = ph.id_paket
            JOIN data_user d ON d.id_user = b.id_user WHERE b.id_pesan = "'.$id.'" ';
  $res = mysqli_fetch_assoc(mysqli_query($conn,$query));
  if ($res['diskon_harga'] != 0) {
    $diskon = $res['harga_paket']*$res['diskon_harga'] /100;
  } else {
    $diskon = 0;
  }
  $fullUnik = explode('-', $res['id_pesan']);
  $fullUnik = end($fullUnik);
  $totalHarga = $fullUnik + $res['harga_paket'] - $diskon;
  if ($res['status'] == 'success') {
    $lbl = "success";
  } else if ($res['status'] == 'pending') {
    $lbl = "warn";
  } else {
    $lbl = "red";
  }
  $dt = new DateTime($res['waktu_order'], new DateTimeZone("Asia/Jakarta"));
  $dt->format("F j, Y H:i");
  $dt->modify("+1 day");
  $dt->format("F j, Y H:i");
?>
  <div class="padding">
  <div class="p-y-lg clearfix">
    <div class="text-center">
      <h2 class="_700 m-b">Faktur Pembayaran</h2>
      <h5 class="m-b-md">Cetak Faktur Pembayaran anda, agar anda tidak lupa untuk membayarnya.</h5>
    </div>
  </div>  
    <div class="row">
      <div class="col-sm-6">
        <div class="box p-a">
          <strong class="text-muted">DETAIL PESANAN :</strong>
          <br><br>
          <h6><strong><?= $res['fullname'] ?></strong></h6>
          <p class="text-muted">
            <p>Tanggal Pemesanan : 
              <strong>
                <?= rtrim(substr($res['waktu_order'],0,19),':'); ?>
              </strong><br>
                Status Pemesanan : 
                <span class="label <?= $lbl ?>">
                  <?= $res['status'] ?>
                </span><br>
                ID Pesanan: <strong><?= $res['id_pesan'] ?></strong>
            </p>
          </p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="box p-a">
          <strong class="text-muted">PEMBAYARAN :</strong>
          <br><br>
          <h6><?= $res['pembayaran'] ?></h6>
          <p class="text-muted">
            <?php if ($res['status'] == 'pending'){ ?>
              Batas Pembayaran : <span class="text-danger"><strong><?= rtrim(substr($dt->format("F j, Y H:i"),0,19),':'); ?></strong></span><br>
              <?php } else if ($res['status'] == 'expired') { ?> <span class="text-danger"><strong>Pesanan Dibatalkan</strong></span> 
            <?php } else {?>
              <span class="text-info"><strong>Pembayaran Berhasil</strong></span>
            <?php } ?>
            
          </p>
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped white b-a">
        <thead>
          <tr>
            <th style="width: 10%">Nama Paket</th>
            <th style="width: 70%">Keterangan</th>
            <th style="width: 10%">Harga Paket</th>
            <th style="width: 10%">Kode Unik</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= $res['nama_paket'] ?></td>
            <td><?= str_replace(',', ', ',$res['detail_paket']) ?></td>
            <td>Rp <?= str_replace('+', '', money_format('%i',$res['harga_paket']- $diskon)) ?></td>
            <td><?= $fullUnik ?></td>
          </tr>
          <tr>
            <td colspan="4" class="text-center no-border"><strong class="text-muted">Total</strong> <strong class="text-primary"> Rp <?= str_replace('+', '', money_format('%i',$totalHarga)) ?></strong></td>
          </tr>
        </tbody>
      </table>

    </div>
    <div class=" text-center">
      <a href class="md-btn md-raised m-b-sm w-xs danger hidden-print" onClick="window.print();">Cetak</a>  
    </div> 
  </div>
</div>
<?php
    }
    else {
      echo "<center><h3>Hohoh! Tidak semudah itu ferguso!</h3></center>";
    } 
  } else {
    echo "<center><h3>Hohoh! Tidak semudah itu ferguso!</h3></center>";
  }
?>