<?php
	$conn = mysqli_connect("localhost","root","","barbershop");

	if (!$conn) {
		DIE("KONEKSI DB GAGAL");
	}
?>