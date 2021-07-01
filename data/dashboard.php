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
<?php
  if (isset($_SESSION['nama'])) {
    if($_SESSION['level'] == 'kasir'){
      include 'pages/sidebar-kasir.php';
    } else {
      include 'pages/sidebar.php';
    }
  } else {
    header('location:../');
  }
?>

<?php cekExpireBoking($conn) ?>

<?php switchPages(); ?>


<?php include 'pages/footer.php'; ?>
