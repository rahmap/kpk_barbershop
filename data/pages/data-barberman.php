<!-- ############ PAGE START-->
<?php 
include '../assets/config/koneksi.php'; 
$q = mysqli_query($conn, "SELECT * FROM barberman WHERE barberman_deleted_at IS NULL ORDER by id_barberman ASC");
?>
<div class="padding">
  <div class="row">
    <div class="col-md-12">
  <div class="box">
    <div class="box-header">
      <h2>Daftar Data Barberman</h2>
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" id="tblBarber" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:20%">ID Barberman</th>
            <th  style="width:40%">Nama Barberman</th>
            <th class="text-center"  style="width:40%">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach ($q as $key) { ?>
            <tr>
              <td style="width: 20%"><?= $key['id_barberman'] ?></td>
              <td style="width: 40%"><?= $key['nama_barberman'] ?></td>
							<td style="width:40%" class="text-center">
								<button class="md-btn md-raised m-b-sm w-xs blue btnEdit" data-toggle="modal" data-target="#m-md"
												ui-toggle-class="flip-y" ui-target="#animate"  data-id_barberman="<?= $key['id_barberman'] ?>"
												data-nama_barberman="<?= $key['nama_barberman'] ?>" >Edit</button>

								<button data-nama_barberman="<?= $key['nama_barberman'] ?>" data-id_barberman="<?= $key['id_barberman'] ?>"
												data-href="prosses/prosses-hapus-barberman.php?id_barberman=<?= $key['id_barberman'] ?>" class="md-btn md-raised m-b-sm w-xs danger btnHapus" >Hapus</button>
							</td>
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
		<!-- large modal -->
		<div id="m-md" class="modal fade animate" data-backdrop="true">
			<div class="modal-dialog modal-lg" id="animate">
				<div class="modal-content dark">
					<div class="modal-header">
						<h5 class="modal-title">Perbaruhi Data Paket Harga</h5>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<form  action="prosses/prosses-edit-barberman.php" method="post" id="editYuk" >
								<div class="box">
									<div class="box-body">
										<input type="text" hidden=""  id="id_barberman" name="id_barberman">
										<p class="text-muted">Perbaruhi data member yang sudah ada!</p>
										<div class="form-group">
											<label>Nama Barberman</label>
											<input type="text" id="nama_barberman" name="nama_barberman" class="form-control" required>
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
<form id="form_delete" action="" method="post">
</form>
<script>
	function editModal(){
		$(document).on('click', '.btnEdit', function(){
			let id_barberman = $(this).data('id_barberman');
			let nama_barberman = $(this).data('nama_barberman');
			$('#m-md #id_barberman').val(id_barberman);
			$('#m-md #nama_barberman').val(nama_barberman);
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
							Swal.fire('Berhasil Mengupdate Data Barberman. Silahkan Refresh Halaman.');
						},
						422 : function(e,f,g){
							$('#btnModalEdit').attr('data-dismiss','modal');
							$('#btnModalEdit').click();
							Swal.fire(g);
						}
					},
					complete : function(w){
						$('#btnModalEdit').attr('data-dismiss','');
            setTimeout(function(){
              window.location.reload()
            }, 3000);
					},
				})
			})
		});
	}
	editModal();
  $(document).ready(function (){
    let tblBarber = $('#tblBarber');
    $.ajaxSetup({
      headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });
    tblBarber.on('click', '.btnHapus', function (e){
      let namaBar = $(this).data('nama_barberman')
      e.preventDefault();
      Swal.fire({
        title: 'Anda Yakin?',
        text: `Hapus Barberman ${namaBar}?`,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, lanjutkan!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result) {
          Swal.fire({
            title: 'Pertanyaan Terakhir!',
            text: 'Tidak bisa diulangi!',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus barberman!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result) {
              $('#form_delete').attr('action', $(this).data('href')).submit()
            }
          })
        }
      })
    })
  })
</script>
<!-- ############ PAGE END-->