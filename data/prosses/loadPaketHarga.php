    <?php 
          include '../../assets/config/koneksi.php'; 
          include '../function.php'; 
    ?>
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
                <div class="col-12">
                  <h3 class="mb-0"><?= $key['nama_paket'] ?></h3>
                </div>
                <div class="col-6">
                  <?php
                  if ($key['diskon_harga'] == 0) { ?>
                  <?php } else { ?>
                  <h5 class="mb-0 text-danger"> <b><?= 'Rp '.'<del>'.str_replace('+', '', money_format('%i',$key['harga_paket'])) ?></b></del></b> </h5>
                <?php  }
                  ?>
                </div>
                <div class="col-6">
                  <?php
                  if ($key['diskon_harga'] == 0) { ?>
                    <h5 class="mb-0"> <b><?= 'Rp '.str_replace('+', '', money_format('%i',$key['harga_paket'])) ?></b> </h5>
                  <?php } else {  $diskon = $key['harga_paket']*$key['diskon_harga'] /100; ?>
                  <h5 class="mb-0"> <b><?= 'Rp '.str_replace('+', '', money_format('%i',$key['harga_paket'] - $diskon)) ?></b></b> </h5>
                <?php  }
                  ?>
                </div>
                <div class="col-12 text-center">
                  <?php
                  if ($key['diskon_harga'] != 0) { ?>
                    <h6 class="text-muted ">Potongan Harga <span class="text-info"><b><?= $key['diskon_harga'] ?>%</b></span></h6>
                  <?php }
                  ?>
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