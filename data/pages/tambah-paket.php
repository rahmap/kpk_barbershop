<div class="padding">
  <div class="row">    
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h2>Formulir Tambah Paket Harga</h2>
          <small>Anda dapat menambahkan paket(layanan) untuk mempermudah member atau pelanggan dalam memilih paket mereka.</small>
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
                <input type="number" name="harga-paket" class="form-control" id="" required placeholder="Harga Paket">
              </div>
            </div>
						<div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 form-control-label">Harga Paket (Member)</label>
              <div class="col-sm-10">
                <input type="number" name="harga_paket_member" class="form-control" id="" required placeholder="Harga Paket Member">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 form-control-label">Potongan Harga</label>
              <div class="col-sm-10">
                <input type="number" name="diskon" class="form-control" id="" required placeholder="Diskon Paket">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 form-control-label">Detail Paket</label>
              <div class="col-sm-10">
                <select id="multiple" name="detail-paket[]" class="form-control select2-multiple" required multiple ui-jp="select2" multiple="multiple" ui-options="{theme: 'bootstrap'}">
                  <optgroup label="Basic">
                    <option value="Cukur">Cukur</option>
                    <option value="Gundul" disabled="disabled">Gundul</option>
                  </optgroup>
                  <optgroup label="Stylish">
                    <option value="Semir">Semir</option>
                    <option value="Semir Special">Semir Special</option>
                  </optgroup>
                  <optgroup label="Manjakan Kepala">
                    <option value="Vitamin">Vitamin</option>
                    <option value="Pijat">Pijat</option>
                    <option value="Keramas">Keramas</option>
                  </optgroup>
                  <optgroup label="Lain - lain">
                    <option value="Styling Pomade">Styling Pomade</option>
                    <option value="Hair Tatto">Hair Tatto</option>
                    <option value="Perawatan Jenggot">Perawatan Jenggot</option>
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
