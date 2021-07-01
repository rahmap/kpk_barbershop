<?php 
  include '../../assets/config/koneksi.php';
  include '../function.php';  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Prosses Hapus Barberman</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
<?php hapusBarberman($conn, $_GET['id_barberman']); ?>
</body>
</html>