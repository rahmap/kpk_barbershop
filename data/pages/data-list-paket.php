<!-- ############ PAGE START-->

  <div class="box">
    <div class="box-header">
      <h2>Daftar Data Paket Harga</h2>
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:10%">ID Paket</th>
            <th  style="width:15%">Nama Paket</th>
            <th  style="width:10%">Harga Paket</th>
            <th  style="width:20%">Keterangan Paket</th>
            <th  style="width:20%">Detail Paket</th>
            <th  style="width:5%">Diskon</th>
            <th  style="width:20%">Action</th>
          </tr>
        </thead>
        <tbody id="loadDataPaket">
        </tbody>
      </table>
    </div>
  </div>
<div id="confirm-delete" class="modal fade animate" data-backdrop="true">
  <div class="modal-dialog" id="animate">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Peringatan!</h5>
      </div>
      <div class="modal-body text-center p-lg">
        <p>Apakah anda ingin menghapus Paket ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">No</button>
        <a><button type="button" class="btn danger p-x-md fixHapus" data-dismiss="modal">Yes</button></a>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
<!-- large modal -->
<div id="m-md" class="modal fade animate" data-backdrop="true">
  <div class="modal-dialog modal-lg" id="animate">
    <div class="modal-content dark">
      <div class="modal-header">
        <h5 class="modal-title">Perbaruhi Data Paket Harga</h5>
      </div>
      <div class="row">
        <div class="col-sm-12">
        <form  action="prosses/prosses-edit-paket.php" method="post" id="editYuk" >
          <div class="box">
            <div class="box-body">
              <input type="text" hidden=""  id="id_paket" name="id_paket">
              <input type="text" hidden="" id="detail_paket" name="detail_paket">
              <p class="text-muted">Perbaruhi data member yang sudah ada!</p>
              <div class="form-group">
                <label>Nama Paket</label>
                <input type="text" id="nama_paket" name="nama_paket" class="form-control" required>           
              </div>
              <div class="row m-b">
                <div class="col-sm-12">
                  <label>Keterangan Paket</label>
                  <textarea type="text" id="ket_paket" name="ket_paket" class="form-control" required></textarea>
                </div>
              </div>
              <div class="row m-b">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Rp XXXX" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <label>Potongan Harga</label>
                  <input type="number" placeholder="XX %" name="diskon" id="diskon" class="form-control" required>
                </div>   
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn danger p-x-md" data-dismiss="modal">Batal</button>
            <button type="submit" name="submit" id="btnModalEdit" class="btn info p-x-md" data-d>Perbarui</button>
        </div>
        </div></div>
      </form></div></div></div></div></div>
      </form>
    </div><!-- /.modal-content -->
  </div>
<script type="text/javascript">
function loadData(){
  $(document).ready(function(){
    $.get('prosses/loadListPaket.php',function(data){
      $('#loadDataPaket').html(data);

      $('.btnHapus').on('click', function(e) {
        var href = $(this).data('href');
        $('.fixHapus').data('href', href);
      });

      $('.fixHapus').on('click', function(e) {
        e.preventDefault();
        var href = $(this).data('href');
        $.ajax({
          type : 'GET',
          url : $(this).data('href'),
          success : function(){
            loadData();
            Swal.fire('Berhasil Menghapus');
          }
        })
      })
    })
  })
}

function editModal(){
  $(document).on('click', '#btnEdit', function(){
    var id_paket = $(this).data('id');
    var nama = $(this).data('nama');
    var ket = $(this).data('ket');
    var harga = $(this).data('harga');
    var diskon = $(this).data('diskon');
    var detail = $(this).data('detail');
    $('#m-md #id_paket').val(id_paket);
    $('#m-md #nama_paket').val(nama);
    $('#m-md #ket_paket').val(ket);
    $('#m-md #harga').val(harga);
    $('#m-md #diskon').val(diskon);
    $('#m-md #detail_paket').val(detail);
  });

  $(document).ready(function(e){
    $('#editYuk').on('submit',function(e){
      e.preventDefault();
      $.ajax({
        url : $(this).attr('action'),
        type : $(this).attr('method'),
        data : $(this).serialize(),
        statusCode : {
          200 : function(e){
            $('#btnModalEdit').attr('data-dismiss','modal');
            $('#btnModalEdit').click();
            Swal.fire('Berhasil Mengupdate Data Paket');
          },
          422 : function(e,f,g){
            $('#btnModalEdit').attr('data-dismiss','modal');
            $('#btnModalEdit').click();
            Swal.fire(g);
          }
        },
        complete : function(w){
          $('#btnModalEdit').attr('data-dismiss','');
          loadData();
        },
      })
    })
  });
}
editModal();
loadData();
</script>

<!-- ############ PAGE END-->