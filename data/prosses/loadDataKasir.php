<?php
include '../../assets/config/koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM data_user WHERE level = 'kasir' ");
	foreach ($query as $key) {
	 echo '<tr>
		<th  style="width:10%">'.$key['id_user'].'</th>
		<th  style="width:25%">'.$key['fullname'].'</th>
		<th  style="width:20%">'.$key['email'].'</th>
		<th  style="width:10%">'.$key['password'].'</th>
		<th  style="width:5%">'.$key['jenkel'].'</th>
		<th  style="width:15%">'.$key['no_hp'].'</th>
		<th  style="width:15%"><div class="btn-group">
			<button class="md-btn md-flat xs-b-sm w-xs text-primary" data-toggle="modal" data-target="#m-md" ui-toggle-class="zoom" ui-target="#animate" data-fn="'.$key['fullname'].'" data-email="'.$key['email'].'" data-pass="'.$key['password'].'" data-jenkel="'.$key['jenkel'].'" data-nohp="'.$key['no_hp'].'" data-id_user="'.$key['id_user'].'" id="btnEdit">Edit</button>
			<button data-href="prosses/prosses-hapus-user.php?id_user='.$key['id_user'].'" class="md-btn md-flat xs-b-sm w-xs text-danger btnHapus" data-toggle="modal" data-target="#confirm-delete" ui-toggle-class="zoom" ui-target="#animate">Hapus</button>
		</th>
	</tr>';
	} 