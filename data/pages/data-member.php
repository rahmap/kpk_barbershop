<!-- ############ PAGE START-->
<style type="text/css">
  select.form-control option{
    background-color: #4A5A6A;
}
</style>
<?php 
  include '../assets/config/koneksi.php';  
?>
<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Data Pelanggan</h2>
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:10%">ID User</th>
            <th  style="width:25%">Nama Lengkap</th>
            <th  style="width:20%">Email</th>
            <th  style="width:10%">Password</th>
            <th  style="width:5%">Jenkel</th>
            <th  style="width:15%">No Telp</th>
            <th  style="width:15%" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody id="loadDataMember">
          <!-- laod data member -->
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- ############ PAGE END-->
<!-- large modal -->
<div id="m-md" class="modal fade animate" data-backdrop="true">
  <div class="modal-dialog modal-lg" id="animate">
    <div class="modal-content dark">
      <div class="modal-header">
        <h5 class="modal-title">Update Data Pelanggan</h5>
      </div>
      <div class="row">
        <div class="col-sm-12">
        <form  action="prosses/prosses-edit-user.php" method="post" id="editYuk" >
          <div class="box">
            <div class="box-body">
              <input type="text" hidden="" id="id_user" name="id_user">
              <p class="text-muted">Perbaruhi data pelanggan yang sudah ada!</p>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" id="fn" name="nama" class="form-control" required>           
              </div>
              <div class="row m-b">
                <div class="col-sm-6">
									<label>Email <small>(tidak bisa diubah)</small></label>
                  <input type="email" readonly id="email" name="email" class="form-control" required>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                      <select required="" id="jenkel" name="jenkel" 
                      class="form-control c-select">
                        <option selected="" value="X"> - Pilih -</option>
                        <option value="L">Pria</option>
                        <option value="P">Wanita</option>
                      </select>
                  </div>
                </div>
              </div>
              <div class="row m-b">
                <div class="col-sm-6">
                  <label>Enter password</label>
                  <input type="password" id="pass" class="form-control" name="pass" required id="pwd">   
                </div>
                <div class="col-sm-6">
                  <label>Confirm password</label>
                  <input type="password" id="pass-fix" class="form-control" name="pass-fix" required>      
                </div>   
              </div>
              <div class="row m-b">
                <div class="col-sm-6">
                  <div class="form-group">
										<label>Phone <small>(tidak bisa diubah)</small></label>
                    <input type="number" readonly name="nohp" id="nohp" class="form-control" placeholder="XXX XXXX XXX" required>
                  </div>
                </div>
                <div class="col-sm-6">
									<label>Level <small>(tidak bisa diubah)</small></label>
                  <input type="text" disabled="" class="form-control" value="member" required>
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
<!-- / .modal -->
<div id="confirm-delete" class="modal fade animate" data-backdrop="true">
  <div class="modal-dialog" id="animate">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Peringatan!</h5>
      </div>
      <div class="modal-body text-center p-lg">
        <p>Apakah anda ingin menghapus data pelanggan ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">No</button>
        <a><button type="button" class="btn danger p-x-md fixHapus" data-dismiss="modal">Yes</button></a>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
<script type="text/javascript" >

function loadData(){
  $(document).ready(function(e){
    $.get('prosses/loadDataMember.php',function(data){
      $('#loadDataMember').html(data);

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
          $.get('prosses/loadDataMember.php',function(data){
                $('#loadDataMember').html(data);
          });
            Swal.fire('Berhasil Menghapus');
          }
        })
      })
    });
  });
}

function editModal(){
  $(document).on('click', '#btnEdit', function(){
    var id = $(this).data('id_user');
    var fn = $(this).data('fn');
    var email = $(this).data('email');
    var pass = $(this).data('pass');
    var nohp = $(this).data('nohp');
    var jenkel = $(this).data('jenkel');
    $('#m-md #id_user').val(id);
    $('#m-md #fn').val(fn);
    $('#m-md #email').val(email);
    $('#m-md #pass').val(pass);
    $('#m-md #pass-fix').val(pass);
    $('#m-md #nohp').val(nohp);
    $('#m-md #jenkel').val(jenkel);
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
            Swal.fire('Berhasil Mengupdate Data Pelanggan');
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
