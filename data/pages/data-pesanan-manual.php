<!-- ############ PAGE START-->

<?php
  include '../assets/config/koneksi.php';

  $success = mysqli_query($conn, "SELECT COUNT(id_manual) AS oke FROM boking_manual 
    WHERE status = 'success'   ");
  $res3 = mysqli_fetch_assoc($success);
  $all = mysqli_query($conn, "SELECT COUNT(id_manual) AS jml FROM boking_manual  ");
  $resAll = mysqli_fetch_assoc($all);
  $resProfit = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(pendapatan) as jml FROM laporan WHERE jenis_transaksi = 'Offline'"));

?>
<div class="padding">
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
      <div class="box p-a">
        <div class="pull-left m-r">
          <span class="w-40 green text-center rounded">
            <i class="fa fa-money"></i>
          </span>
        </div>
        <div class="clear">
          <h4 class="m-0 text-md"><a href>Rp <?= str_replace('+', '', money_format('%i',$resProfit['jml'])) ?> <span class="text-sm"></span></a></h4>
          <small class="text-muted">Total Penghasilan.</small>
        </div>
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box-header">
      <h2>Data Pesanan</h2>
      <small>Anda dapat melihat detail pembayaran dan mencetak nota di sini</small>
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
              <th>
                  Waktu Transaksi
              </th>              
              <th>
                  Nama Paket
              </th>
              <th>
                  Waktu Cukur
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
        <p>Apakah anda ingin menghapus Transaksi ini?</p>
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
      </div>

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
    var unik = $(this).data('unik');
    var id = $(this).data('id');
    $('#m-a-a #unik').html(unik);
    $.ajax({
        type: 'POST',
        url: 'member/getIDBoking.php',
        data: { idbo: id },
        success: function() {
        }
    });
  });

function loadData(){
  $(document).ready(function(){
    $.get('prosses/loadListManual.php',function(data){
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
<!-- ############ PAGE END-->