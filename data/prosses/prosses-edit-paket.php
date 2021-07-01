<?php
include '../../assets/config/koneksi.php';
if (isset($_POST['nama_paket'])) {
	$id_paket = $_POST['id_paket'];
	$nama_paket = $_POST['nama_paket'];
	$ket_paket = $_POST['ket_paket'];
	$harga = $_POST['harga'];
	$harga_member = $_POST['harga_member'];
	$diskon = $_POST['diskon'];
	$detail_paket = $_POST['detail_paket'];

	$cek_all_data = mysqli_query($conn,"SELECT * FROM paket_harga WHERE 
		nama_paket = '$nama_paket' AND 
		detail_paket = '$detail_paket' AND 
		ket_paket = '$ket_paket' AND 
		harga_paket = '$harga' AND 
		harga_paket_member = '$harga_member' AND 
		diskon_harga = '$diskon' AND 
		id_paket = '$id_paket' ");
	$cek_all_row = mysqli_num_rows($cek_all_data);

	if ($cek_all_row) {
		header("HTTP/1.0 422 OK! Data Tidak Berubah");
	} else {
		$query = mysqli_query($conn, "UPDATE paket_harga SET 
			nama_paket = '$nama_paket', 
			detail_paket = '$detail_paket' , 
			ket_paket = '$ket_paket' , 
      harga_paket_member = '$harga_member',
			harga_paket = '$harga', 
			diskon_harga = '$diskon' 
			WHERE id_paket = '$id_paket' ");
		if ($query) {
			header("HTTP/1.0 200 Success");
		} else {
			header("HTTP/1.0 422 Query Error");
		}
	}
}