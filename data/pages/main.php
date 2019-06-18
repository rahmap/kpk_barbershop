<?php 
include '../assets/config/koneksi.php'; 
if (isset($_SESSION['id_user'])) {
    $q = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = '".$_SESSION['id_user']."'");
    $res = mysqli_fetch_assoc($q);
} else if (isset($_COOKIE['ID'])) {
    $q = mysqli_query($conn,"SELECT * FROM data_user WHERE id_user = '".$_COOKIE['ID']."' ");
    $res = mysqli_fetch_assoc($q);
}

$profit = mysqli_query($conn, "SELECT COUNT(bm.id_manual) AS ord, SUM(ph.harga_paket) AS uang FROM paket_harga ph 
                             JOIN boking_manual bm ON bm.id_paket = ph.id_paket");
$resProfit = mysqli_fetch_assoc($profit);
$online = mysqli_query($conn, "SELECT COUNT(b.id_boking) AS ord, SUM(ph.harga_paket) AS uang FROM paket_harga ph 
                             JOIN boking b ON b.id_paket = ph.id_paket");
$resProfitOnline = mysqli_fetch_assoc($online);
//Penghasilan
$member = mysqli_query($conn, "SELECT COUNT(id_user) as jml FROM data_user WHERE level = 'member' ");
$resMember = mysqli_fetch_assoc($member);
//Jml member
$newMember = mysqli_query($conn, "SELECT * FROM data_user WHERE level = 'member' 
								  ORDER BY `data_user`.`id_user` DESC LIMIT 0,5");

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
			          	<div class="text-muted">Online</div>
			            <h4 class="m-0 text-md _600">
			            	<a href>Rp <?= money_format('%i',$resProfitOnline['uang']) ?></a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-money text-2x text-info m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Offline</div>
			            <h4 class="m-0 text-md _600"><a href>Rp <?= money_format('%i',$resProfit['uang']) ?></a></h4>
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
			            		<?= money_format('%i',$resProfit['uang']+$resProfitOnline['uang']) ?>
			            	</a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-check-square-o text-2x text-success m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Total Transaksi</div>
			            <h4 class="m-0 text-md _600"><a href><?= $resProfit['ord']+$resProfitOnline['ord'] ?></a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-sm-3">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-users text-2x text-success m-y-sm"></i>
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
			          	<i class="fa fa-users text-2x text-success m-y-sm"></i>
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
			          	<i class="fa fa-users text-2x text-success m-y-sm"></i>
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
			          	<i class="fa fa-users text-2x text-success m-y-sm"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Total Member Terdaftar</div>
			            <h4 class="m-0 text-md _600"><a href><?= $resMember['jml'] ?></a></h4>
			          </div>
			        </div>
			    </div>
		    </div>
	    </div>
	    <div class="col-sm-12 col-md-7 col-lg-6">
	    	<div class="row no-gutter box dark bg">
		        <div class="col-sm-6">
					<div class="box-header">
						<h3>Aktifitas Online</h3>
					</div>
					  <ul class="list no-border">
				        <li class="list-item">
				          <a href="" class="pull-left w-40 m-r"><img src="../assets/images/a3.jpg" class="img-responsive img-circle"></a>
				          <div class="clear">
				            <a href="" class="_500 block">Jessi</a>
				            <span class="text-muted">Sectetur adipiscing elit</span>
				          </div>
				        </li>
				        <li class="list-item">
				          <a href="" class="pull-left w-40 m-r"><img src="../assets/images/a4.jpg" class="img-responsive img-circle"></a>
				          <div class="clear">
				            <a href="" class="_500 block">Sodake</a>
				            <span class="text-muted">Vestibulum ullamcorper sodales nisi nec condimentum</span>
				          </div>
				        </li>
				    </ul>
			    </div>
		    </div>
	    </div>
	    <div class="col-sm-12 col-md-7 col-lg-6">
	    	<div class="row no-gutter box dark bg">
		        <div class="col-sm-6">
					<div class="box-header">
						<h3>Aktifitas Offline</h3>
					</div>
					  <ul class="list no-border">
				        <li class="list-item">
				          <a href="" class="pull-left w-40 m-r"><img src="../assets/images/a3.jpg" class="img-responsive img-circle"></a>
				          <div class="clear">
				            <a href="" class="_500 block">Jessi</a>
				            <span class="text-muted">Sectetur adipiscing elit</span>
				          </div>
				        </li>
				        <li class="list-item">
				          <a href="" class="pull-left w-40 m-r"><img src="../assets/images/a4.jpg" class="img-responsive img-circle"></a>
				          <div class="clear">
				            <a href="" class="_500 block">Sodake</a>
				            <span class="text-muted">Vestibulum ullamcorper sodales nisi nec condimentum</span>
				          </div>
				        </li>
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
	    <div class="col-md-6 col-xl-4">
			<div class="box">
				<div class="box-header">
					<h3>Tasks</h3>
					<small>20 finished, 5 remaining</small>
				</div>
				<div class="box-tool">
			        <ul class="nav">
			          <li class="nav-item inline dropdown">
			            <a class="nav-link text-muted p-x-xs" data-toggle="dropdown">
			              <i class="fa fa-ellipsis-v"></i>
			            </a>
			            <div class="dropdown-menu dropdown-menu-scale pull-right">
			              <a class="dropdown-item" href>New task</a>
			              <a class="dropdown-item" href>Make all finished</a>
			              <a class="dropdown-item" href>Make all unfinished</a>
			              <div class="dropdown-divider"></div>
			              <a class="dropdown-item">Settings</a>
			            </div>
			          </li>
			        </ul>
			    </div>
				<div class="box-body">
				  	<div class="streamline b-l m-l">
				        <div class="sl-item b-success">
				          <div class="sl-icon">
				            <i class="fa fa-check"></i>
				          </div>
				          <div class="sl-content">
				            <div class="sl-date text-muted">8:30</div>
				            <div>Call to customer <a href class="text-info">Jacob</a> and discuss the detail about the AP project.</div>
				          </div>
				        </div>
				        <div class="sl-item b-info">
				          <div class="sl-content">
				            <div class="sl-date text-muted">Sat, 5 Mar</div>
				            <div>Prepare for presentation</div>
				          </div>
				        </div>
				        <div class="sl-item b-warning">
				          <div class="sl-content">
				            <div class="sl-date text-muted">Sun, 11 Feb</div>
				            <div><a href class="text-info">Jessi</a> assign you a task <a href class="text-info">Mockup Design</a>.</div>
				          </div>
				        </div>
				    </div>
				</div>
			  	<div class="box-footer">
			  		<a href class="btn btn-sm btn-outline b-info rounded text-u-c pull-right">Add one</a>
			  		<a href class="btn btn-sm white text-u-c rounded">More</a>
			  	</div>
		  	</div>
		</div>
	    <div class="col-md-12 col-xl-4">
	    	<div class="box">
				<div class="box-header">
					<span class="label success pull-right">5</span>
					<h3>Activity</h3>
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
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12 col-xl-4">

		</div>
		<div class="col-md-6 col-xl-4">
	        <div class="box indigo-900 lt">
	            <div class="box-header b-b">
	              <h2>Latest Tweets</h2>
	            </div>
	            <ul class="list">
	              <li class="list-item">
	                <div class="list-body">                   
	                  <p><a href class="text-info">@Josh Long</a> Vestibulum ullamcorper sodales nisi nec adipiscing elit. Morbi id neque quam</p>
	                  <small class="block text-muted"><i class="fa fa-fw fa-clock-o"></i> 2 hours ago</small>
	                </div>
	              </li>
	            </ul>
	        </div>
		</div>
		<div class="col-md-6 col-xl-4">
			<div class="box">
	            <div class="box-header">
	              <h3>Feeds</h3>
	            </div>
	            <div class="box-divider m-0"></div>
	            <ul class="list no-border">
	              <li class="list-item">
	                <a herf class="pull-left m-r">
	                    <span class="w-40">
	                  		<img src="../assets/images/b5.jpg" class="w-full" alt="...">
	                 	</span>
	                </a>
	                <div class="clear">
	                  <a href class="_500 text-ellipsis">See stars</a>
	                  <small class="text-muted">Jan 2, 2015</small>
	                </div>
	              </li>
	            </ul>
	        </div>
		</div>
	</div>
</div> <!-- padding -->

