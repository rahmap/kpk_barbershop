<?php
  include '../../assets/config/koneksi.php';
  include '../function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Prosses Kirim Notifikasi Antrian</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
<?php

$token = 'BLNhKH3a5CyIltxR5Sf3IJcmg2oOJdy682ngSzulx8MbdQ5abY';
//$phone = '08982002040'; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
$phone = $_GET['nomor_hp'];
$message = 'Antrian anda sudah dekat, silahkan datang ke Aldys Barbershop sekarang.';

try{
  $url = 'https://app.ruangwa.id/api/send_message';
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_TIMEOUT,30);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, array(
    'token'    => $token,
    'number'     => $phone,
    'message'   => $message,
  ));

  error_reporting(0);
  curl_setopt($curl, CURLOPT_HTTPHEADER,'Content-Type: application/x-www-form-urlencoded');
  $response = curl_exec($curl);
  curl_close($curl);
//  echo $response;
  getAlert("Berhasil Mengirim Notifikasi Antrian","","success","../dashboard.php?page=list-pesanan");
} catch (Exception $e){
  getAlert("Gagal Mengirim Notifikasi Antrian",$e,"error","../dashboard.php?page=list-pesanan");
//  die($e);
}

?>
</body>
</html>