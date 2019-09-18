<?php
include '../../assets/config/koneksi.php'; 
  if (isset($_SESSION['id_user'])) {
      $q = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = '".$_SESSION['id_user']."' ");
      $res = mysqli_fetch_assoc($q);
  } else if (isset($_COOKIE['ID'])) {
    $q = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = '".$_COOKIE['ID']."' ");
    $res = mysqli_fetch_assoc($q);
  }
  $nama = explode(' ', $res['fullname']);
?>
<div class="col-sm-9 col-lg-10 light lt">
    <div class="tab-content pos-rlt">
      <div class="tab-pane active" id="tab-1">
        <div class="p-a-md dker _600">Data Diri Anda</div>
        <form enctype="multipart/form-data" role="form" class="p-a-md col-md-6" action="prosses/profile/update-profile-umum.php" method="POST">
          <div class="form-group">
            <label>Foto Profil</label>
            <div class="form-file">
              <input type="file" id="filePhoto" name="foto">
              <button class="btn danger" id="newPhoto">Unggah Foto Baru</button>
            </div>
          </div>
          <div class="form-group">
            <label>Nama Depan</label>
            <input type="text" name="fName" value="<?= $nama[0] ?>" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Nama Belakang</label>
            <input type="text" name="lName" value="<?= $nama[1] ?>" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" disabled="" value="<?= $res['email'] ?>" name="email" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <input type="text" disabled="" value="<?= $res['jenkel'] ?>" name="jenkel" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Nomer Hp</label>
            <input type="number" name="nohp" value="<?= $res['no_hp'] ?>" class="form-control" required="">
          </div>
          <button type="submit" name="updateProfile" class="btn btn-info m-t">Update</button>
        </form>
      </div>
      <div class="tab-pane" id="tab-5">
        <div class="p-a-md dker _600">Keamanan</div>
        <div class="p-a-md">
          <div class="clearfix m-b-lg">
            <form role="form" action="prosses/profile/update-password.php" method="POST" class="col-md-6 p-a-0">
              <div class="form-group">
                <label>Kata Sandi Lama</label>
                <input required="" type="password" name="oldPass" class="form-control">
              </div>
              <div class="form-group">
                <label>Kata Sandi Baru</label>
                <input required="" type="password" name="newPass" class="form-control">
              </div>
              <div class="form-group">
                <label>Konfirmasi Kata Sandi Baru</label>
                <input required="" type="password" name="newPassFix" class="form-control">
              </div>
              <button type="submit" name="updatePassword" class="btn btn-info m-t" >Perbarui</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  function awal(){
    $("#filePhoto").change(function() {
      filename = this.files[0].name;
      $('#newPhoto').text(filename);
    });
  }
  awal();
</script>
