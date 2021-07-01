<?php
  include '../../assets/config/koneksi.php';
  $q = mysqli_query($conn, "SELECT * FROM paket_harga ph 
    JOIN boking b ON b.id_paket = ph.id_paket 
    LEFT JOIN barberman bar ON bar.id_barberman = b.id_barberman
    JOIN waktu_boking wb ON wb.id_waktu = b.id_waktu 
    WHERE b.id_user = '".getIdUser()."'  ORDER BY b.id_boking ASC ");
?>
<div class="padding">
<!--   <div class="row">
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
        <div class="box-color p-a info">
          <div class="pull-right m-l">
            <span class="w-40 dker text-center rounded">
              <i class="material-icons">local_shipping</i>
            </span>
          </div>
          <div class="clear">
            <h4 class="m-0 text-md"><a href><?= $res1['pen'] ?> <span class="text-sm">Pending Orders</span></a></h4>
            <small class="text-muted"><?= $res1['pen'] ?> Menunggu pembayaran.</small>
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
            <h4 class="m-0 text-md"><a href><?= $res2['gagal'] ?> <span class="text-sm">Expired Orders</span></a></h4>
            <small class="text-muted"><?= $res2['gagal'] ?> Orderan dibatalkan.</small>
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
            <h4 class="m-0 text-md"><a href><?= $res3['oke'] ?> <span class="text-sm">Success Orders</span></a></h4>
            <small class="text-muted"><?= $res3['oke'] ?> Berhasil.</small>
          </div>
        </div>
      </div>
  </div> -->
  <div class="box">
    <div class="box-header">
      <h2>Daftar Booking Anda</h2>
      <small>Anda dapat melihat detail pembayaran dan status pesanan anda.</small>
    </div>
    <div class="box-body">
      Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r"/>
    </div>
    <div>
      <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="10">
        <thead>
          <tr>
              <th>
                  Nama Paket
              </th>
              <th>
                  Waktu Pemesanan
              </th>
              <th data-hide="phone,tablet" data-name="Barberman">
                  Barberman
              </th>
              <th data-toggle="true">
                  Harga
              </th>
              <th>
                Pembayaran
              </th>
              <th>
                  Status
              </th>
              <th class="text-center">
                  Aksi
              </th>
          </tr>
        </thead>
        <tbody>
        <?php
          $statusLbl; 
          foreach ($q as $key) {
            if ($key['diskon_harga'] != 0) {
              $diskon = $key['harga_paket']*$key['diskon_harga'] /100;
            } else {
              $diskon = 0;
            }
            $fullUnik = explode('-', $key['id_pesan']);
            $fullUnik = end($fullUnik);
            $fullUnik = $fullUnik + $key['harga_paket']-$diskon;
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
                    <td>Rp '.str_replace('+', '', money_format('%i', $key["harga_paket"]-$diskon)).'</td>
                    <td>'.$key["pembayaran"].'</td>
                    <td><span class="label '.$statusLbl.' " title="Active">'.$key['status'].'</span></td>
                    <td class="text-center"><button id="btnDetail" class="md-btn md-raised m-b-sm w-xs blue" data-toggle="modal" data-target="#m-a-a" ui-toggle-class="flip-y" ui-target="#animate" data-harga="'.str_replace('+', '', money_format('%i',$fullUnik)).'" data-id="'.$key['id_boking'].'" data-unik="'.$key['id_pesan'].'" data-bank="'.$key['pembayaran'].'">Detail</button>
                      <a href="dashboard.php?page=cetak-nota&id_pesanan='.password_hash($key['id_pesan'], PASSWORD_DEFAULT).'&cvsx='.str_replace('ALDYS-', '', $key['id_pesan']).' " target="_blank"><button id="btnDetail" class="md-btn md-raised pink">Cetak Nota</button></a> 
                    </td>
                  </tr>';
          } 
        ?>
        </tbody>
        <tfoot class="hide-if-no-paging">
          <tr>
              <td colspan="5" class="text-center">
                  <ul class="pagination"></ul>
              </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<!-- modal -->
<div id="m-a-a" class="modal fade animate" data-backdrop="true">
  <div class="modal-dialog" id="animate">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Pesanan</h5>
      </div>
      <div class="modal-body text-center p-lg">
        <p>Kode Unik : <h5><div id="unik"></div></h5></p>
        <p>Silahkan lakukan pembayaran sebesar <br><h4 id="harga"></h4><div id="bank"></div></p>
        <p>Waktu Tersisa Untuk Melakukan Pembayaran</p>
      </div>
      <div id="loadStatus" class="modal-body text-center p-lg">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn danger p-x-md" data-dismiss="modal">OK</button>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
<div id="result"></div>
<!-- modal -->
<script type="text/javascript">


  $(document).on('click', '#btnDetail', function(){
    var bank = $(this).data('bank');
    var unik = $(this).data('unik');
    var id = $(this).data('id');
    var harga = $(this).data('harga');
    harga = 'Rp '+harga;
    $('#m-a-a #bank').html(bank);
    $('#m-a-a #unik').html(unik);
    $('#m-a-a #harga').html(harga);
    $.ajax({
        type: 'POST',
        url: 'getIDBoking.php',
        data: { idbo: id },
        success: function() {
          $.get('getStatusBoking.php',function(data){
            $('#loadStatus').html(data);
          })
        }
    });
  });

</script>