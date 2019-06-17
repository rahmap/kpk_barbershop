<?php
	include 'function.php';
	include '../assets/config/koneksi.php';
	session_start();
	if (isset($_SESSION['nama']) OR isset($_COOKIE['nama'])) {
		$q = mysqli_query($conn, "SELECT * FROM data_user WHERE id_user = '".getIdUser()."' ");
		$res = mysqli_fetch_assoc($q);
		if ($res['level'] == 'member') {
			header('location:../');
		}
	} else {
		header('location:../');
	}
?>

<?php include 'pages/sidebar.php'; ?>
  

<?php switchPages(); ?>


<?php include 'pages/footer.php'; ?>
