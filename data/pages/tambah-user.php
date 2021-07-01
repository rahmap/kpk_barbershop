
</style>
<script src="scripts/tambahUser.js"></script>
<div class="padding">
  <div class="row">
    <div class="col-sm-12">
      <form ui-jp="parsley" id="formTambahUser" action="prosses/prosses-tambah-user.php" method="POST">
        <div class="box">
          <div class="box-header">
            <h2>Formulir Tambah User</h2>
          </div>
          <div class="box-body">
            <p class="text-muted">Masukan data admin yang akan dibuat!</p>
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama"  required="" minlength="4" class="form-control" >
            </div>
            <div class="row m-b">
              <div class="col-sm-6">
                <label>Email</label>
                <input type="email" required name="email" class="form-control" >
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                    <select name="jenkel" required class="form-control c-select">
                      <option value=""> - Pilih -</option>
                      <option value="L">Pria</option>
                      <option value="P">Wanita</option>
                    </select>
                </div>
              </div>
            </div>
            <div class="row m-b">
              <div class="col-sm-6">
                <label>Enter password</label>
                <input type="text" class="form-control" required minlength="8" name="pass" id="pwd">
              </div>
              <div class="col-sm-6">
                <label>Confirm password</label>
                <input type="text" class="form-control" required minlength="8" name="pass-fix" >
              </div>   
            </div>
            <div class="row m-b">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>No HP</label>
                  <input type="number" name="nohp" required class="form-control" placeholder='628.. atau 089..' >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Level</label>
                    <select name="level" required class="form-control">
                      <option value=""> - Pilih -</option>
                      <?php 
                        if (getIdUser() == 1) {
                          echo '<option value="admin">Admin</option>';
                          echo '<option value="kasir">Kasir</option>';
                        }
                      ?>
                      <option value="member">Member</option>
                    </select>
                </div> 
              </div>   
            </div>
          </div>
          <div class="dker p-a text-right">
            <button type="submit" name="submit" class="btn info">Tambahkan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



