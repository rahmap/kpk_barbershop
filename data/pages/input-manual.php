<?php
include '../assets/config/koneksi.php';
  $barberman = mysqli_query($conn, "SELECT * FROM barberman WHERE barberman_deleted_at IS NULL");
  $paket = mysqli_query($conn, "SELECT * FROM paket_harga");
?>
<!--<style type="text/css">-->
<!--  select.form-control option{-->
<!--    background-color: #4A5A6A;-->
<!--}-->
<!--</style>-->

<div id="resForm"></div>
<div class="padding">
  <div class="p-y-lg clearfix">
    <div class="text-center">
      <h2 class="_700 m-b">Masukkan Data Transaksi</h2>
      <h5 class="m-b-md">Masukkan data pelanggan secara manual, ketika pelanggan datang langsung ke toko.</h5>
    </div>
  </div>
    <div class="col-xs-6 col-sm-12 col-md-12">
    <div class="box text-center">
      <div class="p-a-md">
        <p><img src="../assets/images/kpklogo.png" class="img-circle w-56"></p>
      </div>
      <div class="row row-col no-gutter b-t warn">
      <div class="col-xs-4 b-r">
				<h1 id="paketTitle"></h1>
				<div class="row justify-content-center">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<span class="block" id="showValOpUmum"></span>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<span class="block" id="showValOpMember"></span>
					</div>
<!--        <span class="p-y block" ></span>-->
				</div>
      </div>
     </div>
    </div>
  </div>
  <form class="p-x-xs" method="post" action="prosses/prosses-input-manual.php" id="form-input">
    <div class="p-y-lg clearfix">
    </div>
		<?php
//		var_dump($_SESSION);die();
			$id_user = '';
			if (isset($_SESSION['id_user'])) {
				$id_user = $_SESSION['id_user'];
			} else if (isset($_COOKIE['ID_USER'])) {
				$id_user = $_COOKIE['ID_USER'];
			}
		?>
		<input type="hidden" value="<?= $id_user ?>" name="kasir_id" required>
    <div class="m-b-lg row">
      <div class="col-sm-6">
        <div class="row justify-content-md-center">
          <div class="form-group col-md-8">
            <h6>Nama Pelanggan</h6>
            <input required="" name="nama_pelanggan" type="text" class="form-control" placeholder="nama pelanggan">
          </div>
					<div class="form-group col-md-8">
            <h6>Nomer HP <i><small>(untuk verifikasi member)</small></i> </h6>
            <input required="" name="no_hp" type="number" class="form-control" placeholder="0898337432">
          </div>
        </div>
        <div class="row justify-content-md-center">
          <div class="form-group col-md-8">
            <h6>Pilih Paket</h6>
            <select required="" name="paket" id="paket" class="form-control" 
                    onchange="loadOptionValue()">
              <option value=""> -</option>
              <?php foreach ($paket as $key) { ?>
                <option value="<?= $key['id_paket'] ?>"><?= $key['nama_paket'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row justify-content-md-center">
          <div class="form-group col-md-8">
            <h6>Metode Pembayaran</h6>
            <select required="" name="pembayaran" id="pembayaran" class="form-control">
              <option value=""> -</option>
<!--							<option value="BRI - 150684898792">BRI - 150684898792</option>-->
<!--							<option value="BCA - 19878485321">BCA - 19878485321</option>-->
<!--							<option value="MANDIRI - 176584859003">MANDIRI - 176584859003</option>-->
              <option value="Uang Cash">Bayar Cash</option>
            </select>
          </div>
        </div>
        <div class="row justify-content-md-center">
          <div class="form-group col-md-8">
            <h6>Waktu</h6>
            <div class='input-group date'>
                <input type='text' disabled="" placeholder="<?= date('F j, Y H:i:s') ?>" required="" autocomplete="off" name="waktu" class="form-control" />
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
          </div>
						<div class="form-group col-md-8">
							<h6>Pilih Barberman</h6>
							<select required="" name="barberman" id="barberman" class="form-control">
								<option value=""> -</option>
                <?php foreach ($barberman as $key) { ?>
									<option value="<?= $key['id_barberman'] ?>"><?= $key['nama_barberman'] ?></option>
                <?php } ?>
							</select>
						</div>
<!--					<div class="form-group col-md-8">-->
<!--						<h6>Status Pelanggan</h6>-->
<!--						<select required="" name="member" id="member" class="form-control">-->
<!--							<option value=""> -</option>-->
<!--							<option value="umum">Umum</option>-->
<!--							<option value="member">Member</option>-->
<!--						</select>-->
<!--					</div>-->
        </div>
      </div>
    </div>
    <div class="form-group row m-t-lg text-center">
      <div class="col-sm-12 col-sm-offset-2">
        <button type="submit" name="inputNow" id="inputNow" class="btn btn-primary inputNow">Masukkan Transaksi</button>
      </div>
    </div>
  </form>
</div>
  <style>
    .swal-button--confirm {
      background-color: #DD6B55;
    }
  </style> 
<script type="text/javascript">

	function getValUmum()
	{
    let value = $('#paket option:selected').val();
    $.ajax({
      type: 'POST',
      url: 'pages/tampung-value-js.php',
      data: { ov: value },
      success : function(data){
        $('#showValOpUmum').html(data);
      }
    })
	}

	function getValMember()
	{
    let value = $('#paket option:selected').val();
    $.ajax({
      type: 'POST',
      url: 'pages/tampung-value-js-member.php',
      data: { ov: value },
      success : function(data){
        $('#showValOpMember').html(data);
      }
    })
	}
	function getValTitle()
	{
    let value = $('#paket option:selected').val();
    $.ajax({
      type: 'POST',
      url: 'pages/tampung-value-js-title.php',
      data: { ov: value },
      success : function(data){
        $('#paketTitle').html(data);
      }
    })
	}
function loadOptionValue(){
	getValTitle()
	getValUmum()
	getValMember()
}

function resetForm(){
  $('[type=text]').val('');
  $('#pembayaran').prop('selectedIndex',0);
  $('#barberman').prop('selectedIndex',0);
  $('#paket').prop('selectedIndex',0);
  $('#member').prop('selectedIndex',0);
}

$('#form-input').submit(function (e) {
  e.preventDefault();
  Swal.fire({
    title: 'Semua sudah benar?',
    text: "Pesanan akan di masukkan ke sistem!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Lanjutkan!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type : $(this).attr('method'),
        url : $(this).attr('action'),
        data : $(this).serialize(),
        statusCode : {
          422 : function(){
            swal.fire('Maaf terjadi kesalahan!','','error');
          },
          200 : function(){
            swal.fire("Berhasil Input Data Transaksi!","","success");
          }
        },
        complete: function(){
          resetForm();
          setTimeout(function(){
            location.reload();
          }, 3000);
        }
      });
    }
  })
});
</script>