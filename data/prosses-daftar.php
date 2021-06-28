<?php 
	include '../assets/config/koneksi.php'; 
	include 'function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Prosses Daftar..</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>

<?php
error_reporting(0);
if (isset($_POST['submit'])) {
	daftar($conn);
} else {
	die(header('location:../'));
}
	$email1 = $_POST['email'];
	$nama1 = $_POST['fnama']." ".$_POST['lnama'];
	require 'vendor/autoload.php';
	use Mailgun\Mailgun;
	// First, instantiate the SDK with your API credentials
	$mg = Mailgun::create('key-1b7b13209a251da1b62fce7e2a92d9bd'); // For US servers
	// Now, compose and send your message.
	// $mg->messages()->send($domain, $params);
	$fileloc = fopen("vendor/pesan.html", 'r');
	$fileread = fread($fileloc, filesize("vendor/pesan.html"));

	$mg->messages()->send('mail.rahmatvv.co', [
	  'from'    => 'ALDYS-BarberShop@smvll.co',
	  'to'      => "$email1",
	  'subject' => "Halo $nama1 😎",
	  // 'text'    => 'It is so simple to send a message.',
	  'html'	=> "$fileread"
	]);
?>
</body>
</html>