<?php
include '../../assets/config/koneksi.php';
if (isset($_POST['nama_barberman'])) {
	$id_barberman = $_POST['id_barberman'];
	$nama_barberman = $_POST['nama_barberman'];

	$cek_all_data = mysqli_query($conn,"SELECT * FROM barberman WHERE 
		id_barberman = '$id_barberman' AND 
		nama_barberman = '$nama_barberman' ");
	$cek_all_row = mysqli_num_rows($cek_all_data);

	if ($cek_all_row) {
		header("HTTP/1.0 422 OK! Data Tidak Berubah");
	} else {
		$query = mysqli_query($conn, "UPDATE barberman SET 
			nama_barberman = '$nama_barberman' WHERE id_barberman = '$id_barberman' ");
		if ($query) {
			header("HTTP/1.0 200 Success");
		} else {
			header("HTTP/1.0 422 Query Error");
		}
	}
}