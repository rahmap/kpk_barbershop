
<?php
  include '../assets/config/koneksi.php';

  $pending = mysqli_query($conn, "SELECT COUNT(id_boking) AS pen FROM boking WHERE status = 'pending'   ");
  $res1 = mysqli_fetch_assoc($pending);
  $gagal = mysqli_query($conn, "SELECT COUNT(id_boking) AS gagal FROM boking WHERE status = 'expired'   ");
  $res2 = mysqli_fetch_assoc($gagal);
    $success = mysqli_query($conn, "SELECT COUNT(id_boking) AS oke FROM boking WHERE status = 'success'   ");
  $res3 = mysqli_fetch_assoc($success);
  $all = mysqli_query($conn, "SELECT COUNT(id_boking) AS jml FROM boking  ");
  $resAll = mysqli_fetch_assoc($all);

?>
<div class="padding">
  <div class="row">
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box p-a">
          <div class="pull-right m-r">
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
        <div class="box-color p-a primary">
          <div class="pull-right m-l">
            <span class="w-40 dker text-center rounded">
              <i class="material-icons">local_shipping</i>
            </span>
          </div>
          <div class="clear">
            <h4 class="m-0 text-md"><a href><?= $res1['pen'] ?> <span class="text-sm">Menunggu pembayaran</span></a></h4>
            <small class="text-muted"><?= $res1['pen'] ?> Menunggu pembayaran.</small>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box p-a box-color danger">
          <div class="pull-right m-l">
            <span class="w-40 danger text-center rounded">
              <i class="material-icons">close</i>
            </span>
          </div>
          <div class="clear">
            <h4 class="m-0 text-md"><a href><?= $res2['gagal'] ?> <span class="text-sm">Pesanan Dibatalkan</span></a></h4>
            <small class="text-muted"><?= $res2['gagal'] ?> Pesanan dibatalkan.</small>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box-color p-a accent">
          <div class="pull-right m-r">
            <span class="w-40 dker text-center rounded">
              <i class="material-icons">comment</i>
            </span>
          </div>
          <div class="clear">
            <h4 class="m-0 text-md"><a href><?= $res3['oke'] ?> <span class="text-sm">Pesanan Berhasil</span></a></h4>
            <small class="text-muted"><?= $res3['oke'] ?> Berhasil.</small>
          </div>
        </div>
      </div>
  </div>
  <div class="box">
    <div class="box-header">
      <h2>Data Pesanan</h2>
      <small>Admin dapat mengelola pesanan online dari member lewat halaman ini.</small>
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" id="dTables" class="table table-striped b-t b-b">
        <thead>
          <tr>
              <th>
                  ID  
              </th>
              <th>
                  Nama Paket
              </th>
              <th>
                  Waktu Pemesanan
              </th>
              <th>
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
        <tbody id="loadDataPesanan">

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
<!-- modal hapus -->
<div id="confirm-delete" class="modal fade animate" data-backdrop="true">
  <div class="modal-dialog" id="animate">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Peringatan!</h5>
      </div>
      <div class="modal-body text-center p-lg">
        <p>Apakah anda ingin menghapus Pesanan ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">No</button>
        <a><button type="button" class="btn danger p-x-md fixHapus" data-dismiss="modal">Yes</button></a>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
<!-- modal hapus -->

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
        url: 'member/getIDBoking.php',
        data: { idbo: id },
        success: function() {
          $.get('member/getStatusBoking.php',function(data){
            $('#loadStatus').html(data);
          })
        }
    });
  });

function loadData(){
  $(document).ready(function(){
    $.get('prosses/loadListPesanan.php',function(data){
    $('#loadDataPesanan').html(data);

    $('.btnHapus').on('click', function(e) {
      var href = $(this).data('href');
      $('.fixHapus').data('href', href);
    });

    $('.fixHapus').on('click', function(e) {
      e.preventDefault();
      var href = $(this).data('href');
      $.ajax({
        type : 'GET',
        url : $(this).data('href'),
        success : function(){
          loadData();
          Swal.fire('Berhasil Menghapus');
          }
        })
      })
    })
  })
}

loadData();
</script>
<!-- ############ PAGE END