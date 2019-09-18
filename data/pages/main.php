<?php 
include '../assets/config/koneksi.php'; 
if (isset($_SESSION['id_user'])) {
    $q = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = '".$_SESSION['id_user']."'");
    $res = mysqli_fetch_assoc($q);
} else if (isset($_COOKIE['ID'])) {
    $q = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = '".$_COOKIE['ID']."' ");
    $res = mysqli_fetch_assoc($q);
}

$profit = mysqli_query($conn, "SELECT *, COUNT(bm.id_manual) AS ord, SUM(ph.harga_paket) 
							   AS uang FROM paket_harga ph 
                               JOIN boking_manual bm ON bm.id_paket = ph.id_paket");
$resProfit = mysqli_fetch_assoc($profit);
$online = mysqli_query($conn, "SELECT COUNT(b.id_boking) AS ord FROM paket_harga ph 
                             JOIN boking b ON b.id_paket = ph.id_paket WHERE status = 'success' ");
$uangOnline = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ph.harga_paket) AS uang FROM paket_harga ph 
                             JOIN boking b ON b.id_paket = ph.id_paket WHERE status = 'success' "));
$resProfitOnline = mysqli_fetch_assoc($online);
//Penghasilan
$member = mysqli_query($conn, "SELECT COUNT(id_user) as jml FROM data_user WHERE level = 'member' ");
$resMember = mysqli_fetch_assoc($member);
//Jml member
$newMember = mysqli_query($conn, "SELECT * FROM data_user WHERE level = 'member' 
								  ORDER BY `data_user`.`id_user` DESC LIMIT 0,5");
//aktifitas offline
$aktifitasOff = mysqli_query($conn,"SELECT * FROM boking_manual bm 
				JOIN paket_harga ph ON bm.id_paket = ph.id_paket
				JOIN barberman bb ON bm.id_barberman = bb.id_barberman 
				ORDER BY bm.id_manual DESC LIMIT 0,5");
//aktifitas online
$aktifitasOn = mysqli_query($conn,"SELECT * FROM boking b 
				JOIN paket_harga ph ON b.id_paket = ph.id_paket
				JOIN barberman bb ON b.id_barberman = bb.id_barberman 
				JOIN data_user du ON du.id_user = b.id_user 
				ORDER BY b.id_boking DESC LIMIT 0,5");

$paket1 = mysqli_query($conn,"SELECT *,COUNT(id_paket) AS jml FROM paket_harga ORDER by id_paket DESC LIMIT 0,4");
$paket = mysqli_query($conn,"SELECT * FROM paket_harga ORDER by id_paket DESC LIMIT 0,4");
$resPaket = mysqli_fetch_assoc($paket1);

$trxGagal = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(id_boking) AS jml FROM boking WHERE status = 'expired' "));
date_default_timezone_set('Asia/Jakarta'); 
$offlineTrx = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id_manual) AS jml FROM boking_manual WHERE STR_TO_DATE(waktu_transaksi,'%b %e, %Y') = '".date('Y-m-d')."' "));
$qLaporan = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(pendapatan) as jml FROM laporan"));
$onLaporan = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(pendapatan) as jml FROM laporan WHERE jenis_transaksi = 'Online' "));
$ofLaporan = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(pendapatan) as jml FROM laporan WHERE jenis_transaksi = 'Offline'"));
?>
<div class="padding" >
	<div class="margin">
		<h5 class="mb-0 _300">Halo, <?= $res['fullname'] ?></h5>
		<small class="text-muted">Ini adalah beranda <?= $res['level'] ?></small>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-5 col-lg-12">
			<div class="row">
				<div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-money text-2x text-danger m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Penghasilan Online</div>
			            <h4 class="m-0 text-md _600">
			            	<a href>Rp <?= str_replace('+', '', money_format('%i',$onLaporan['jml']))  ?></a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-money text-2x text-info m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Penghasilan Offline</div>
			            <h4 class="m-0 text-md _600"><a href>Rp <?= str_replace('+', '', money_format('%i',$ofLaporan['jml'])) ?></a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-money green text-2x  m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Total Penghasilan</div>
			            <h4 class="m-0 text-md _600">
			            	<a href>Rp 
			            		<?= str_replace('+', '', money_format('%i',$qLaporan['jml'])) ?>
			            	</a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-heart text-2x text-blue m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Total Paket Tersedia</div>
			            <h4 class="m-0 text-md _600"><a href><?= $resPaket['jml'] ?></a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-users text-2x text-accent m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Total Member Terdaftar</div>
			            <h4 class="m-0 text-md _600"><a href><?= $resMember['jml'] ?></a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-check-square-o text-2x text-success m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Total Transaksi Berhasil</div>
			            <h4 class="m-0 text-md _600"><a href><?= $resProfit['ord']+$resProfitOnline['ord'] ?></a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-times text-2x text-danger m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Total Transaksi Gagal</div>
			            <h4 class="m-0 text-md _600"><a href><?= $trxGagal['jml'] ?></a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-shopping-cart text-2x text-warning m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Total Transaksi Hari Ini ( Offline )</div>
			            <h4 class="m-0 text-md _600"><a href><?= $offlineTrx['jml'] ?></a></h4>
			          </div>
			        </div>
			    </div>
		    </div>
	    </div>
	    <div class="col-sm-12 col-md-7 col-lg-6">
	    	<div class="row no-gutter box">
		        <div class="col-sm-12">
					<div class="box-header">
						<h3>Aktifitas Online</h3>
					</div>
					  <ul class="list no-border">
					  	<?php $warna = ['success','warn','danger'];  ?>
				        <?php foreach ($aktifitasOn as $key) { ?>
				        <li class="list-item">
				          <a href="" class="pull-left w-40 m-r"><img src="assets/images/photo-user/<?= $key['foto'] ?>" class="img-responsive img-circle"></a>
				          <div class="clear">
				            <a href="" class="_500 block"><?= $key['fullname'] ?></a>
				            <span>Memesan <a  class="text-info"><?= $key['nama_paket'] ?></a>, Barberman <a  class="text-info"><?= $key['nama_barberman'] ?></a> 
				            	status <a class="text-<?php if($key['status'] == 'pending'){echo $warna[1];} else if($key['status'] == 'success'){echo $warna[0];} else {echo $warna[2];} ?>"><?= $key['status'] ?> </a></span><br>
				            	<span class="text-muted">Waktu Transaksi <i class="fa fa-fw fa-clock-o"></i> 
				            		<?= rtrim(substr($key['waktu_order'],0,19),':'); ?></span>
				          </div>
				        </li>
				    	<?php } ?>
				    </ul>
			    </div>
		    </div>
	    </div>
	    <div class="col-sm-12 col-md-7 col-lg-6">
	    	<div class="row no-gutter box">
		        <div class="col-sm-12">
					<div class="box-header">
						<h3>Aktifitas Offline</h3>
					</div>
					  <ul class="list no-border">
					  	<?php foreach ($aktifitasOff as $key) { ?>
				        <li class="list-item">
				          <a href="" class="pull-left w-40 m-r"><img src="../assets/images/kpklogo.png" class="img-responsive img-circle"></a>
				          <div class="clear">
				            <a class="_500 block text-info"><?= $key['nama_pelanggan'] ?></a>
				            <span>Memesan <a class="text-primary"><?= $key['nama_paket'] ?></a> , Barberman <a class="text-"><?= $key['nama_barberman'] ?></a></span><br>
				            <span class="text-muted">Waktu Transaksi <i class="fa fa-fw fa-clock-o"></i> 
				            		<?= $key['waktu_transaksi']; ?></span>
				          </div>
				        </li>
				    	<?php } ?>
				    </ul>
			    </div>
		    </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-6 col-xl-4">
	        <div class="box light lt">
	            <div class="box-header">
	              <span class="label success pull-right">5</span>
	              <h3>Member Baru</h3>
	            </div>
	            <ul class="list no-border p-b">
	           	<?php $warna = ['success','warn','info','orange','green']; $i=0;
	           	foreach ($newMember as $key) { ?>
	              <li class="list-item">
	                <a herf class="list-left">
	                	<span class="w-40 avatar <?= $warna[$i] ?>">
		                  <span><?= strtoupper(substr($key['fullname'], 0, 1)) ?></span>
		                  <i class="away b-white bottom"></i>
		                </span>
	                </a>
	                <div class="list-body">
	                  <div><a href><?= $key['fullname'] ?></a></div>
	                  <small class="text-muted text-ellipsis"><?= $key['email'] ?></small>
	                </div>
	              </li>
	            <?php $i++; } ?>
	            </ul>
	        </div>
	    </div>
	    <div class="col-md-6 col-xl-8" id="paketHrg">
			<div class="box">
				<div class="box 900 lt">
	            <div class="box-header b-b">
	              <h2>Paket Harga</h2>
	            </div>
	            <ul class="list">
	              <li class="list-item">
	                <div class="list-body">   
	                <?php foreach ($paket as $key) { ?>
	                	<p><a href="#paketHrg" class="text-info"><?= $key['nama_paket'] ?></a><br> <?= $key['ket_paket'] ?>. Rp <?= $key['harga_paket']. ' .Potongan harga '.$key['diskon_harga'].'%' ?>
	                	</p>
	               <?php } ?>                
	                </div>
	              </li>
	            </ul>
	        </div>
			  	<div class="box-footer">
			  		<a href="dashboard.php?page=data-paket" class="btn btn-sm btn-outline b-info rounded text-u-c pull-right">Tambah Paket</a>
			  		<a href="#" class="btn btn-sm white text-u-c rounded"></a>
			  	</div>
		  	</div>
		</div>
	    <!-- <div class="col-md-12 col-xl-4"> KHUSUS ANSI AJA LAH BOS
	    	<div class="box">
				<div class="box-header">
					<span class="label success pull-right">5</span>
					<h3>Aktifitas Admin</h3>
					<small>10 members update their activies.</small>
				</div>
				<div class="box-body">
				  	<div class="streamline b-l m-b m-l">
		              <div class="sl-item">
		                <div class="sl-left">
		                  <img src="../assets/images/a8.jpg" class="img-circle">
		                </div>
		                <div class="sl-content">
		                  <a href class="text-info">Walter Paler</a><span class="m-l-sm sl-date">1 hour ago</span>
		                  <div>was added to Repo</div>
		                </div>
		              </div>
		            </div>
		            <a href class="btn btn-sm white rounded text-u-c m-y-xs">Load More</a>
		  		</div>
			</div>
	    </div> -->
	</div>
	<div class="row">
		<div class="col-md-12 col-xl-4">

		</div>
		<div class="col-md-6 col-xl-4">
	        
		</div>
	</div>
</div> <!-- padding -->

