  
  <style type="text/css">
  select.form-control option{
    background-color: #4A5A6A;
  }
  </style>
<?php 
include '../assets/config/koneksi.php';

if (isset($_GET['id_boking'])) { 
  if ($_GET['id_boking'] != '') {
    $q = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM boking WHERE id_pesan = '".$_GET['id_boking']."' "));
?>
  <div class="padding">  
    <div class="col-md-6 offset-md-3">
      <div class="box">
        <div class="box-header">
          <h2>Form Update Status Pesanan</h2>
          <small></small>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
          <form role="form" method="post" action="prosses/prosses-update-pesanan.php">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 form-control-label">ID Unik</label>
              <div class="col-sm-10">
                <input class="form-control" name="id_pesan" hidden="" value="<?= $q['id_pesan'] ?>">
                <input class="form-control" disabled="" value="<?= $_GET['id_boking'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 form-control-label">Pilih</label>
              <div class="col-sm-10">
                <select class="form-control c-select" name="pilihUpdate">
                  <option value="pending">Pending</option>
                  <option value="expired">Expired</option>
                  <option value="success">Success</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <br>
              <ul class="pager wizard">
                  <a href="" ><button class="md-btn md-raised m-b-sm w-xs danger ">Batal</button></a>
                  <button type="submit" name="update" class="md-btn md-raised m-b-sm w-xs primary ">Update</button>
                </ul>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } } ?> 