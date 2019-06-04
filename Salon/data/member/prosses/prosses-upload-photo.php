<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
<?php
    include '../../../assets/config/koneksi.php';
    include '../myFunMember.php';
    session_start(); 
    uploadFotoProfile($conn); //UPLOAD GAMBAR
?>
</body>
</html>

