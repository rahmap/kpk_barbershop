<?php
include '../../assets/config/koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM paket_harga ");
foreach ($query as $key) {
	 echo '<tr>
            <th  style="width:10%">'.$key['id_paket'].'</th>
            <th  style="width:15%">'.$key['nama_paket'].'</th>
            <th  style="width:10%">Rp '.$key['harga_paket'].'</th>
            <th  style="width:10%">Rp '.$key['harga_paket_member'].'</th>
            <th  style="width:20%">'.$key['ket_paket'].'</th>
            <th  style="width:20%">'.$key['detail_paket'].'</th>
            <th  style="width:5%">'.$key['diskon_harga'].'%</th>
            <th  style="width:20%">
	            <button class="md-btn md-flat xs-b-sm w-xs text-primary" data-toggle="modal" data-target="#m-md" ui-toggle-class="zoom" ui-target="#animate" data-nama="'.$key['nama_paket'].'" data-harga="'.$key['harga_paket'].'" data-harga_member="'.$key['harga_paket_member'].'" data-ket="'.$key['ket_paket'].'" data-diskon="'.$key['diskon_harga'].'" data-id="'.$key['id_paket'].'" data-detail="'.$key['detail_paket'].'" id="btnEdit">Edit</button>
			<button data-href="prosses/prosses-hapus-paket.php?id_paket='.$key['id_paket'].'" class="md-btn md-flat xs-b-sm w-xs text-danger btnHapus" data-toggle="modal" data-target="#confirm-delete" ui-toggle-class="zoom" ui-target="#animate">Hapus</button>
            </th>
	</tr>';
	} 