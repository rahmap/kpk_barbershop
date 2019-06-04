 <?php

function getAlert($title ="",$text ="",$type="",$href = ""){
	echo "<script>
		var title = '$title';
		var text = '$text'; 
		var type = '$type';
			Swal.fire(title,text,type).then(function() {
              window.location = '$href';
          });
		</script>";
}

function daftar($conn){
	if (isset($_POST['submit'])) {
		$fnama = $_POST['fnama'];
		$lnama = $_POST['lnama'];
		$email = $_POST['email'];
		$nohp = $_POST['nohp'];
		$jenkel = $_POST['jenkel'];
		$pass = $_POST['pass'];
		$nama = $fnama." ".$lnama;

		$cek_data = mysqli_query($conn,"SELECT email FROM data_user WHERE email = '$email' ");
		$cek_row = mysqli_num_rows($cek_data);
		if ($pass != $_POST['pass-fix']) {
			getAlert("Gagal!","Password Konfirmasi Tidak Sama","error","../index.php#regis");
		} else if (strlen($pass) < 6) {
			getAlert("Gagal!","Password Harus Lebih Dari 6 Karakter","error","../index.php#regis");
		} else if (!preg_match ("/^[a-zA-Z\s]+$/",$nama)) {
			getAlert("Gagal!","Nama Hanya Boleh Alphabet","error","../index.php#regis");
		} else if ($cek_row) {
			getAlert("Gagal!","Email Sudah Ada","error","../index.php#regis");
		} else {
			$insert = "INSERT INTO data_user SET fullname = '$nama', email = '$email', no_hp = '$nohp', jenkel = '$jenkel', password = '$pass', level = 'member' ";
				mysqli_query($conn, $insert);
			if ($insert) {
				getAlert("Registrasi Berhasil!","Silahkan Login!","success","../login.php");
			} else {
				getAlert("Gagal!","Error Tidak Terduga!","error","../index.php#regis");
			}
		}
	}
}

function login($conn){
	if (isset($_POST['submit'])) {
		$pass = $_POST['password'];
		$email = $_POST['email'];

		$q = mysqli_query($conn, "SELECT * FROM data_user WHERE email = '$email' AND password = '$pass' ");
		$res = mysqli_fetch_assoc($q);
		
		if (($email == $res['email']) AND ($pass == $res['password'])) {
			session_start();
			$_SESSION['nama'] = $res['fullname'];
			$_SESSION['id_user'] = $res['id_user'];
			if (isset($_POST['ingat'])) {
				setcookie('nama',hash('sha512', $res['fullname']),time() + (60 * 120), '/');
				setcookie('ID',hash('sha512', $res['id_user']),time() + (60 * 120), '/');
			}
			cekExpireBoking($conn);
			getAlert("Berhasil Login","Nikmati Fitur Kami!","success","../index.php");
		} else {
			getAlert("Login Gagal!","Email Atau Password Salah!","error","../login.php");
		}
	} else {
		header('location:../');
	}
}

function cekLogin(){
	if (isset($_SESSION['nama'])) {
		die(getAlert('Upps..','Anda sudah login','error','index.php'));
	}
}

function logout(){
	session_start();
	if (isset($_SESSION['nama']) OR isset($_COOKIE['nama'])) {
		session_destroy();
		if (isset($_COOKIE['nama'])) {
			setcookie('nama','',time() - (60 * 120),'/');
			setcookie('ID','',time() - (60 * 120),'/');
		}
		getAlert("Berhasil Logout","Terima Kasih!","success","../index.php");
	}else{
		header("location:../index.php");
	}
}

function switchPages(){

	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'main':
				include "pages/main.php";
				break;
			case 'data-member':
				include "pages/data-member.php";
				break;
			case 'data-admin':
				include "pages/data-admin.php";
				break;
			case 'list-pesanan':
				include "pages/data-pesanan.php";
				break;
			case 'tambah-user':
				include "pages/tambah-user.php";
				break;
			case 'data-paket':
				include "pages/tambah-paket.php";
				break;		
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}else{
		include "pages/main.php";
	}
}

// function dataUser($conn,$level){
	// lihat di prosses/loadData
// }

function tambahUser($conn){
	if (isset($_POST['nama'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$jenkel = $_POST['jenkel'];
		$nohp = $_POST['nohp'];
		$pass = $_POST['pass'];
		$level = $_POST['level'];

		$cek_data = mysqli_query($conn,"SELECT email FROM data_user WHERE email = '$email' ");
		$cek_row = mysqli_num_rows($cek_data);
		if (empty($nama) OR empty($email) OR empty($jenkel) OR empty($nohp) OR empty($pass) OR empty($level)) {
			die(header("HTTP/1.0 422 Semua Field Harus Di Isi"));
		} else if ($pass != $_POST['pass-fix']) {
			die(header("HTTP/1.0 422 Password Konfirmasi Tidak Sama"));
		} else if (strlen($pass) < 6) {
			die(header("HTTP/1.0 422 Password Harus Lebih Dari 6 Karakter"));
		} else if (!preg_match ("/^[a-zA-Z\s]+$/",$nama)) {
			die(header("HTTP/1.0 422 Nama Hanya Boleh Alphabet"));
		} else if ($cek_row) {
			die(header("HTTP/1.0 422 Email Sudah Ada"));
		} else {
			$insert = "INSERT INTO data_user SET fullname = '$nama', email = '$email', no_hp = '$nohp', jenkel = '$jenkel', password = '$pass', level = '$level' ";
				mysqli_query($conn, $insert);
			if ($insert) {
				die(header("HTTP/1.0 200 Berhasil"));
			} else {
				die(header("HTTP/1.0 422 Error"));
			}
		}
	}
}

function hapusUser($conn){
	$query = mysqli_query($conn, "DELETE FROM data_user WHERE id_user = '".getIdUser()."' ");
	if ($query) {
		header("HTTP/1.0 200 Berhasil");
		header('location:../dashboard.php?page=data-member');
	} else {
		header("HTTP/1.0 422 Error");
	}
}

function tambahPaket($conn){
	if (isset($_POST['nama-paket'])) {
		$nama = $_POST['nama-paket'];
		$harga = $_POST['harga-paket'];
		$ket = $_POST['ket-paket'];
		$detail = $_POST['detail-paket'];
		$diskon = $_POST['diskon'];
		if (isset($detail)) {
			$detail = implode(',', $detail);
		}
		$query = mysqli_query($conn,"INSERT INTO paket_harga VALUES('','$nama','$harga','$ket','$detail','$diskon')");
		if($query){
			getAlert("Berhasil Menambahkan Paket","","","../dashboard.php?page=data-paket");
		} else {
			getAlert("Gagal Menambahkan Paket","","","../dashboard.php?page=data-paket");
		}
	}
}

function hapusPaket($conn){
	$query = mysqli_query($conn, "DELETE FROM paket_harga WHERE id_paket = '".$_GET['id_paket']."' ");
	if ($query) {
		header("HTTP/1.0 200 Berhasil");
	} else {
		header("HTTP/1.0 422 Error");
	}
}

function getIdUser(){
	$id_user = '';
	if (isset($_SESSION['id_user'])) {
		$id_user = $_SESSION['id_user'];
  	} else if (isset($_COOKIE['ID'])) {
  		$id_user = $_COOKIE['ID'];
  	}
  	return $id_user;
}

function cekExpireBoking($conn){
	$query = mysqli_query($conn, "SELECT * FROM boking WHERE id_user = '".getIdUser()."' ");
	foreach ($query as $key) {
		$dt = new DateTime($key['waktu_order'], new DateTimeZone("Asia/Jakarta"));
		$dt->format("F j, Y H:i:s");
		$dt->modify("+1 day");
		$dt->format("F j, Y H:i:s");
		date_default_timezone_set('Asia/Jakarta'); 
		if ($dt->format("F j, Y H:i:s") < date('F j, Y H:i:s')) {
  			mysqli_query($conn, "UPDATE boking SET status = 'expired' WHERE 
  			id_user = '".getIdUser()."' ");
		}
	}
}