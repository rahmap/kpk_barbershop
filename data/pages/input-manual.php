<?php
include '../assets/config/koneksi.php';
  $barberman = mysqli_query($conn, "SELECT * FROM barberman");
  $paket = mysqli_query($conn, "SELECT * FROM paket_harga");
?>
<style type="text/css">
  select.form-control option{
    background-color: #4A5A6A;
}
</style>

<div id="resForm"></div>
<div class="padding">
  <div class="p-y-lg clearfix">
    <div class="text-center">
      <h2 class="_700 m-b">Masukkan Data Transaksi</h2>
      <h5 class="m-b-md">Masukkan data pelanggan secara manual, ketika pelanggan datang langsung ke toko.</h5>
    </div>
  </div>
    <div class="col-xs-6 col-sm-12 col-md-12">
    <div class="box text-center">
      <div class="p-a-md">
        <p><img src="../assets/images/kpklogo.png" class="img-circle w-56"></p>
      </div>
      <div class="row row-col no-gutter b-t warn">
      <div class="col-xs-4 b-r">
        <a class="p-y block text-center" ui-toggle-class id="showValOp">

        </a>
      </div>
     </div>
    </div>
  </div>
  <form class="p-x-xs" method="post" action="prosses/prosses-input-manual.php" id="form-input">
    <div class="p-y-lg clearfix">
    </div>
    <div class="m-b-lg row">
      <div class="col-sm-6">
        <div class="row justify-content-md-center">
          <div class="form-group col-md-8">
            <h6>Nama Pelanggan</h6>
            <input required="" name="nama_pelanggan" type="text" class="form-control" placeholder="nama pelanggan">
          </div>
        </div>
        <div class="row justify-content-md-center">
          <div class="form-group col-md-8">
            <h6>Pilih Paket</h6>
            <select required="" name="paket" id="paket" class="form-control" 
                    onchange="loadOptionValue()">
              <option value=""> -</option>
              <?php foreach ($paket as $key) { ?>
                <option value="<?= $key['id_paket'] ?>"><?= $key['nama_paket'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row justify-content-md-center">
          <div class="form-group col-md-8">
            <h6>Pilih Barberman</h6>
            <select required="" name="barberman" id="barberman" class="form-control">
              <option value=""> -</option>
              <?php foreach ($barberman as $key) { ?>
                <option value="<?= $key['id_barberman'] ?>"><?= $key['nama_barberman'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row justify-content-md-center">
          <div class="form-group col-md-8">
            <h6>Metode Pembayaran</h6>
            <select required="" name="pembayaran" id="pembayaran" class="form-control">
              <option value=""> -</option>
              <option value="BRI">BRI</option>
              <option value="BCA">BCA</option>
              <option value="MANDIRI">MANDIRI</option>
              <option value="Uang Cash">Bayar Cash</option>
            </select>
          </div>
        </div>
        <div class="row justify-content-md-center">
          <div class="form-group col-md-8">
            <h6>Waktu</h6>
            <div class='input-group date'>
                <input type='text' disabled="" placeholder="<?= date('F j, Y H:i:s') ?>" required="" autocomplete="off" name="waktu" class="form-control" />
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group row m-t-lg text-center">
      <div class="col-sm-12 col-sm-offset-2">
        <button type="submit" name="inputNow" id="inputNow" class="btn btn-primary inputNow">Masukkan Transaksi</button>
      </div>
    </div>
  </form>
</div>
  <style>
    .swal-button--confirm {
      background-color: #DD6B55;
    }
  </style> 
<script type="text/javascript">
function loadOptionValue(){
 var value = $("#paket option:selected" ).val();
 $.ajax({
  type: 'POST',
  url: 'pages/tampung-value-js.php',
  data: { ov: value },
  success : function(data){
    $("#showValOp").html(data);
  }
 })
}

function resetForm(){
  $('[type=text]').val('');
  $('#pembayaran').prop('selectedIndex',0);
  $('#barberman').prop('selectedIndex',0);
  $('#paket').prop('selectedIndex',0);
}

$('#form-input').submit(function (e) {
  e.preventDefault();
  Swal.fire({
    title: 'Semua sudah benar?',
    text: "Pesanan akan di masukkan ke sistem!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Lanjutkan!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type : $(this).attr('method'),
        url : $(this).attr('action'),
        data : $(this).serialize(),
        statusCode : {
          422 : function(){
            swal.fire('Maaf terjadi kesalahan!','','error');
          },
          200 : function(){
            swal.fire("Berhasil Input Data Transaksi!","","success");
          }
        },
        complete: function(){
          resetForm();
          setTimeout(function(){
            location.reload();
          }, 3000);
        }
      });
    }
  })
});
</script>