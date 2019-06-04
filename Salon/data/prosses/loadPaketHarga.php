    <?php include '../../assets/config/koneksi.php'; ?>
    <div class="container">
      <div class="row">
        <div class="text-center col-md-12">
          <h1>Pilih Paket Mu!</h1>
        </div>
      </div>
      <div class="row">
        <?php $i = 0;
        $query = mysqli_query($conn,"SELECT * FROM paket_harga");
        foreach ($query as $key) { $i++ ?>
        <div class="col-lg-4 col-md-6 p-3">
          <div class="card bg-light">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-8">
                  <h3 class="mb-0"><?= $key['nama_paket'] ?></h3>
                </div>
                <div class="col-12 text-right">
                  <h5 class="mb-0"> <b><?= 'Rp.'.$key['harga_paket'] ?></b> </h5>
                </div>
              </div>
              <p class="my-3"><?= $key['ket_paket'] ?></p>
              <form action="data/member/prosses/prosses-cart.php" method="post" id="formBoking<?= $i ?>">
              <input type="text" hidden="" name="id_paket" value="<?= $key['id_paket']; ?>">
              <ul class="pl-3">
               
              <?php echo  '<li>'.str_replace(',', '<li>', $key['detail_paket']); ?></li>
              </ul> <button type="submit" data-toggle="modal" data-target="#modalBoking" id="btnBoking<?= $i ?>" class="btn btn-primary mt-3" name="pesan">Pesan Sekarang!</button> 
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>