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
        <div class="p-a-md dker _600">Data Anda</div>
        <form enctype="multipart/form-data" role="form" class="p-a-md col-md-6" action="prosses/profile/update-profile-umum.php" method="POST">
          <div class="form-group">
            <label>Foto Profile</label>
            <div class="form-file">
              <input type="file" id="filePhoto" name="foto">
              <button class="btn danger" id="newPhoto">Upload Foto Baru</button>
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
      <div class="tab-pane" id="tab-2">
        <div class="p-a-md dker _600">Account settings</div>
        <form role="form" class="p-a-md col-md-6">
          <div class="form-group">
            <label>Client ID</label>
            <input type="text" disabled class="form-control" value="d6386c0651d6380745846efe300b9869">
          </div>
          <div class="form-group">
            <label>Secret Key</label>
            <input type="text" disabled class="form-control" value="3f9573e88f65787d86d8a685aeb4bd13">
          </div>
          <div class="form-group">
            <label>App Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>App URL</label>
            <input type="text" class="form-control">
          </div>
          <button type="submit" class="btn btn-info m-t">Update</button>
        </form>
      </div>
      <div class="tab-pane" id="tab-3">
        <div class="p-a-md dker _600">Emails</div>
        <form role="form" class="p-a-md col-md-6">
          <p>E-mail me whenever</p>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone posts a comment
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone follow me
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone send me a message
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone invite me to group
            </label>
          </div>
          <button type="submit" class="btn btn-info m-t">Update</button>
        </form>
      </div>
      <div class="tab-pane" id="tab-4">
        <div class="p-a-md dker _600">Notifications</div>
        <form role="form" class="p-a-md col-md-6">
          <p>Notice me whenever</p>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone seeing my profile page
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone follow me
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone send me a message
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone invite me to group
            </label>
          </div>
          <button type="submit" class="btn btn-info m-t">Update</button>
        </form>
      </div>
      <div class="tab-pane" id="tab-5">
        <div class="p-a-md dker _600">Security</div>
        <div class="p-a-md">
          <div class="clearfix m-b-lg">
            <form role="form" action="prosses/profile/update-password.php" method="POST" class="col-md-6 p-a-0">
              <div class="form-group">
                <label>Old Password</label>
                <input required="" type="password" name="oldPass" class="form-control">
              </div>
              <div class="form-group">
                <label>New Password</label>
                <input required="" type="password" name="newPass" class="form-control">
              </div>
              <div class="form-group">
                <label>New Password Again</label>
                <input required="" type="password" name="newPassFix" class="form-control">
              </div>
              <button type="submit" name="updatePassword" class="btn btn-info m-t" >Update</button>
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
