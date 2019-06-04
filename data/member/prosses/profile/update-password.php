<!DOCTYPE html>
<html>
<head>
	<title>Prosses Ubah Password</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
<?php
	session_start();
    include '../../../../assets/config/koneksi.php';
    include '../../myFunMember.php';
    updatePassword($conn);
?>

</body>
</html>