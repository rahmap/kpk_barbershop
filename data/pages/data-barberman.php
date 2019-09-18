<!-- ############ PAGE START-->
<?php 
include '../assets/config/koneksi.php'; 
$q = mysqli_query($conn, "SELECT * FROM barberman ORDER by id_barberman ASC");
?>
<div class="padding">
  <div class="row">    
    <div class="col-md-12">
  <div class="box">
    <div class="box-header">
      <h2>Daftar Data Barberman</h2>
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:20%">ID Barberman</th>
            <th  style="width:80%">Nama Barberman</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach ($q as $key) { ?>
            <tr>
              <td style="width: 20%"><?= $key['id_barberman'] ?></td>
              <td style="width: 80%"><?= $key['nama_barberman'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h2>Formulir Tambah Barberman</h2>
          <small>Anda dapat menambahkan Barberman melalui formulir ini.</small>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
          <form role="form" id="formTambahPaket" method="POST" action="prosses/prosses-tambah-barberman.php">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 form-control-label">Nama Barberman</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="inputEmail3" required placeholder="nama ">
              </div>
            </div>
            <div class="form-group row m-t-md">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-info">Tambahkan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>


<!-- ############ PAGE END-->