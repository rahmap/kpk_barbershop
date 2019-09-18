<?php
include '../../assets/config/koneksi.php';

if (isset($_SESSION['cart'])) {
  
  $que = mysqli_query($conn, "SELECT * FROM paket_harga WHERE id_paket = '".$_SESSION['cart']."' ");
  $data = mysqli_fetch_assoc($que);
  $diskon = $data['harga_paket']*$data['diskon_harga'] /100;
  $qwaktu = mysqli_query($conn, "SELECT * FROM waktu_boking ORDER BY `waktu_boking`.`jam` ASC LIMIT 0,7");
  $qwaktu1 = mysqli_query($conn, "SELECT * FROM waktu_boking ORDER BY `waktu_boking`.`jam` ASC LIMIT 7,7");
  $qwaktu2 = mysqli_query($conn, "SELECT * FROM waktu_boking ORDER BY `waktu_boking`.`jam` ASC LIMIT 14,7");
  $barberman = mysqli_query($conn, "SELECT * FROM barberman");
} else {
  echo "<script> Swal.fire('Pilih paket dulu!','','').then(function(){
    window.location = '../../index.php#boking'
  }); </script>";
}

?>
<style type="text/css">
  select.form-control option{
    background-color: #4A5A6A;
}
</style>


<div class="padding">
  <div class="p-y-lg clearfix">
    <div class="text-center">
      <h2 class="_700 m-b">Pilih Waktu Anda</h2>
      <h5 class="m-b-md">Selelah memilih waktu, silahkan lanjutakan untuk pembayaran.</h5>
    </div>
  </div>
  <div class="col-xs-6 col-sm-12 col-md-12">
    <div class="box text-center">
      <div class="p-a-md">
        <p><img src="../../assets/images/kpklogo.png" class="img-circle w-56"></p>
        <a href class="text-md block"><?php echo (isset($_SESSION['cart'])) ? $data['nama_paket'] : '' ?></a>
        <!-- <p><small>London, UK</small></p> -->
      </div>
      <div class="row row-col no-gutter b-t warn">
      <div class="col-xs-4 b-r">
        <a class="p-y block text-center" ui-toggle-class>
          <?php if (isset($_SESSION['cart'])): ?>
            <h5 class="block"><?= 'Rp '.str_replace('+', '', money_format('%i', $data['harga_paket'] -= $diskon))?></h5>
          <?php endif ?>
        </a>
      </div>
     </div>
    </div>
  </div>
  <form class="p-x-xs" method="post" action="prosses/prosses-boking.php">
    <input type="text" hidden="" name="id_paket" value="<?= $_SESSION['cart'] ?>"> <!-- ID PAKET -->
    <div class="p-y-lg clearfix">
      <!-- <h4 class="_700 m-b text-center">Pilih Waktu Anda</h4> -->
    </div>
    <div class="m-b-lg row">
    <?php if (isset($_SESSION['cart'])) { ?>
      <div class="col-sm-6 col-sm-offset-2">
        <div class="row">
          <div class="col-sm-4">
            <?php foreach ($qwaktu as $key) { ?>
              <p>
                <label class="md-switch">
                  <input type="radio" required="" name='waktu' value="<?= $key['id_waktu'] ?>" >
                  <i class="green"></i>
                  <?= $key['jam'] ?>
                </label>
              </p>
            <?php } ?>
          </div>
          <div class="col-sm-4">
            <?php foreach ($qwaktu1 as $key) { ?>
              <p>
                <label class="md-switch">
                  <input type="radio" required="" name='waktu' value="<?= $key['id_waktu'] ?>" >
                  <i class="orange"></i>
                  <?= $key['jam'] ?>
                </label>
              </p>
            <?php } ?>
          </div>
          <div class="col-sm-4">
            <?php foreach ($qwaktu2 as $key) { ?>
              <p>
                <label class="md-switch">
                  <input type="radio" required="" name='waktu' value="<?= $key['id_waktu'] ?>" >
                  <i class="blue"></i>
                  <?= $key['jam'] ?>
                </label>
              </p>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
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
        <div class="row">
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
        <h6>Pilih Hari</h6>
        <div class="row">
          <div class="form-group col-md-8">
            <div class='input-group date' ui-jp="datetimepicker" ui-options="{
                  format: 'MMM DD, YYYY',
                  icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                  }
                }">
                <input type='text' required="" autocomplete="off" name="hari" class="form-control" />
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
    <div class="form-group row m-t-lg text-center">
      <div class="col-sm-12 col-sm-offset-2">
        <button type="submit" class="btn red"><a href="prosses/hapus-cart.php">Batal</a></button>
        <button type="submit" name="bokingNow" class="btn btn-primary">Pesan Sekarang</button>
      </div>
    </div>
  </form>
</div>