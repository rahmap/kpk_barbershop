<div class="padding">
  <div class="row">    
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h2>Form Tambah Paket</h2>
          <small>Anda dapat menambahkan paket(services) untuk mempermudah member atau pelanggan dalam memilih paket mereka.</small>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
          <form role="form" id="formTambahPaket" method="POST" action="prosses/prosses-tambah-paket.php">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 form-control-label">Nama Paket</label>
              <div class="col-sm-10">
                <input type="text" name="nama-paket" class="form-control" id="inputEmail3" required placeholder="Nama Paket">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 form-control-label">Harga Paket</label>
              <div class="col-sm-10">
                <input type="number" name="harga-paket" class="form-control" id="inputPassword3" required placeholder="Harga Paket">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 form-control-label">Diskon Harga</label>
              <div class="col-sm-10">
                <input type="number" name="diskon" class="form-control" id="inputPassword3" required placeholder="Diskon Paket">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 form-control-label">Detail Paket</label>
              <div class="col-sm-10">
                <select id="multiple" name="detail-paket[]" class="form-control select2-multiple" required multiple ui-jp="select2" multiple="multiple" ui-options="{theme: 'bootstrap'}">
                  <optgroup label="Alaskan/Hawaiian Time Zone">
                    <option value="AK">Alaska</option>
                    <option value="HI" disabled="disabled">Hawaii</option>
                  </optgroup>
                  <optgroup label="Pacific Time Zone">
                    <option value="CA">California</option>
                    <option value="NV">Nevada</option>
                  </optgroup>
                  <optgroup label="Mountain Time Zone">
                    <option value="AZ">Arizona</option>
                    <option value="CO">Colorado</option>
                  </optgroup>
                  <optgroup label="Central Time Zone">
                    <option value="AL">Alabama</option>
                    <option value="AR">Arkansas</option>
                  </optgroup>
                  <optgroup label="Eastern Time Zone">
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                  </optgroup>
              </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3"  class="col-sm-2 form-control-label">Keterangan Paket</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="ket-paket" name="ket-paket" required="" rows="3"></textarea>
              </div>
            </div>
            <div class="form-group row m-t-md">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-info">Tambahkan Paket</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include 'data-list-paket.php'; ?>
</div>
