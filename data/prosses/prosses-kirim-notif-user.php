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
$phone = $_GET['phone'];
$nama = $_GET['nama'];
$message = 'Hi Kak '.ucwords($nama).', gimana kabarnya? Udah lama nih ga main ke Aldy\'s Barbershop. Jangan lupa mampir ya!!';

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
	$query = mysqli_query($conn, "SELECT count_notif FROM data_user WHERE id_user= '".$_GET['id_user']."' ");
	$pecah = mysqli_fetch_assoc($query);
	$new =  $pecah['count_notif'] + 1;
	$update = mysqli_query($conn, "UPDATE data_user SET count_notif = '".$new."' WHERE id_user= '".$_GET['id_user']."'");
  getAlert("Berhasil Mengirim Notifikasi Kangen","","success","../dashboard.php?page=data-member");
} catch (Exception $e){
  getAlert("Gagal Mengirim Notifikasi Kangen",$e,"error","../dashboard.php?page=data-member");
//  die($e);
}

?>
</body>
</html>