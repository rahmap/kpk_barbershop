<!DOCTYPE html>
<html>
<head>
	<title>Tes</title>
</head>
<body>
<form action="#" method="POST">
	<input type="date" name="tgl">
	<input type="time" name="waktu">
	<button name="submit" type="submit">Kirim</button>
</form>
<?php
	if (isset($_POST['submit'])) {
		if (empty($_POST['waktu'])) {
			echo "Kosong";
		} else {
			echo $_POST['tgl'].$_POST['waktu'];
		}
	} else {
		echo "Gagal";
	}
?>
</body>
</html>