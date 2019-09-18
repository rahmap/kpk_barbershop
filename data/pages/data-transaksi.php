<!-- ############ PAGE START-->
<?php 
include '../assets/config/koneksi.php'; 
$q = mysqli_query($conn, "SELECT * FROM laporan ORDER by tgl_acc ASC");
?>
<div class="padding">
  <div class="row">    
    <div class="col-md-12">
  <div class="box">
    <div class="box-header">
      <h2>Daftar Data Transaksi</h2>
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:20%">ID Transaksi</th>
            <th  style="width:20%">Jenis Transaksi</th>
            <th  style="width:20%">Admin</th>
            <th  style="width:20%">Tanggal</th>
            <th  style="width:20%">Total Harga</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach ($q as $key) { ?>
            <tr>
            <th  style="width:20%"><?= $key['id_pesan'] ?></th>
            <th  style="width:20%"><?= $key['jenis_transaksi'] ?></th>
            <th  style="width:20%"><?= $key['admin'] ?></th>
            <th  style="width:20%"><?= $key['tgl_acc'] ?></th>
            <th  style="width:20%">Rp <?= str_replace('+', '', money_format('%i',$key['pendapatan'])) ?></th>
            </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
