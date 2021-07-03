<?php
include '../../assets/config/koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM data_user  WHERE level = 'member' ");
//var_dump(mysqli_fetch_assoc($query));die();
	foreach ($query as $key) {
	    $queryWaktuOrder = mysqli_query($conn, "SELECT waktu_order FROM boking 
                    WHERE id_user = '".$key['id_user']."' AND status = 'success' ORDER BY id_boking DESC ");
	    $pecah = mysqli_fetch_assoc($queryWaktuOrder);
//	    var_dump($pecah);
      if(!empty($pecah)){
        $count = count($pecah) - 1;
        $waktuBoking = substr(date('d-m-Y H:i', strtotime($pecah['waktu_order'])), 0,16);
      } else {
        $waktuBoking = '-';
      }
//		<td>'.$key['password'].'</td>
	 echo '<tr>
		<td>'.$key['id_user'].'</td>
		<td>'.$key['fullname'].'</td>
		<td>'.$key['email'].'</td>
		<td>'.$key['jenkel'].'</td>
		<td>'.$key['no_hp'].'</td>
		<td>'.$waktuBoking.'</td>
		<td>'.$key['count_notif'].'</td>
		<td>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button class="md-btn md-flat xs-b-sm w-xs text-primary" data-toggle="modal" data-target="#m-md" ui-toggle-class="zoom" ui-target="#animate" data-fn="'.$key['fullname'].'" data-email="'.$key['email'].'" data-pass="'.$key['password'].'" data-jenkel="'.$key['jenkel'].'" data-nohp="'.$key['no_hp'].'" data-id_user="'.$key['id_user'].'" id="btnEdit">Edit</button>
        <button data-href="prosses/prosses-hapus-user.php?id_user='.$key['id_user'].'" class="md-btn md-flat xs-b-sm w-xs text-danger btnHapus" data-toggle="modal" data-target="#confirm-delete" ui-toggle-class="zoom" ui-target="#animate">Hapus</button>
        <a href="prosses/prosses-kirim-notif-user.php?phone='.$key['no_hp'].'&nama='.$key['fullname'].'&id_user='.$key['id_user'].'">
          <button
            class="md-btn md-flat xs-b-sm w-xs text-info">Kirim Notif
          </button>
        </a>
      </div>
		</td>
	</tr>';
	} 