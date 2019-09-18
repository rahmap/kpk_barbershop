<?php 
  include '../../assets/config/koneksi.php';
  include '../function.php';  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Prosses Tambah Barberman</title>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
	<?php tambahBarberman($conn); ?>
</body>
</html>