<?php
include '../../assets/config/koneksi.php';
if (isset($_POST['nama'])) {
	$id = $_POST['id_user'];
	$fn = $_POST['nama'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$nohp = $_POST['nohp'];
	$jenkel = $_POST['jenkel'];

	$cek_all_data = mysqli_query($conn,"SELECT * FROM data_user WHERE fullname = '$fn' AND email = '$email' AND password = '$pass' AND jenkel = '$jenkel' AND no_hp = '$nohp' AND id_user = '$id' ");
	$cek_all_row = mysqli_num_rows($cek_all_data);

	if ($pass != $_POST['pass-fix']) {
		header("HTTP/1.0 422 Gagal Password Konfirmasi Tidak Sama");
	} else if (strlen($pass) < 6) {
		header("HTTP/1.0 422 Gagal Password Harus Lebih Dari 6 Karakter");
	} else if (!preg_match ("/^[a-zA-Z\s]+$/",$fn)) {
		header("HTTP/1.0 422 Gagal Nama Hanya Boleh Alphabet");
	} else if ($cek_all_row) {
		header("HTTP/1.0 422 OK! Data Tidak Berubah");
	} else {
		$query = mysqli_query($conn, "UPDATE data_user SET fullname = '$fn', email = '$email', password = '$pass', jenkel = '$jenkel', no_hp = '$nohp' WHERE id_user = '$id' ");
		if ($query) {
			header("HTTP/1.0 200 Success");
		} else {
			header("HTTP/1.0 422 Query Error");
		}
	}
}
