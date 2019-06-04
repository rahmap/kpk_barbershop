<!DOCTYPE html>
<html>
<head>
	<title>Loading ..</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
<?php
	session_start();
    include '../../../../assets/config/koneksi.php';
    include '../../myFunMember.php';
    updateProfileUmum($conn);
?>
</body>
</html>