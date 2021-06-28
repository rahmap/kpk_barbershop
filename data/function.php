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

function generateRandomString($length = 4) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getIdOrder()  
{   
	$angka = sprintf("%03s",rand(999,1));
	return 'ALDYS-'.generateRandomString(4).'-'.$angka;
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
			getAlert("Gagal!","Kata sandi Konfirmasi Tidak Sama","error","../index.php#regis");
		} else if (strlen($pass) < 6) {
			getAlert("Gagal!","Kata sandi Harus Lebih Dari 6 Karakter","error","../index.php#regis");
		} else if (!preg_match ("/^[a-zA-Z\s]+$/",$nama)) {
			getAlert("Gagal!","Nama Hanya Boleh Alphabet","error","../index.php#regis");
		} else if ($cek_row) {
			getAlert("Gagal!","Email Sudah Ada","error","../index.php#regis");
		} else {
			$insert = "INSERT INTO data_user SET fullname = '$nama', email = '$email', no_hp = '$nohp', jenkel = '$jenkel', password = '$pass', level = 'member' ";
				mysqli_query($conn, $insert);
			if ($insert) {
				getAlert("Pendaftaran Berhasil!","Silahkan Masuk!","success","../login.php");
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
			$_SESSION['level'] = $res['level'];
			if (isset($_POST['ingat'])) {
				setcookie('nama',$res['fullname'], time() + (60 * 120), '/');
				setcookie('ID_USER',$res['id_user'], time() + (60 * 120), '/');
				setcookie('level', $res['level'], time() + (60 * 120), '/');
			}
			cekExpireBoking($conn);
			getAlert("Berhasil Masuk!","Nikmati Fitur Kami!","success","../index.php");
		} else {
			getAlert("Gagal Masuk!","Email Atau Kata sandi Salah!","error","../login.php");
		}
	} else {
		header('location:../');
	}
}

function cekLogin(){
	if (isset($_SESSION['nama']) OR isset($_COOKIE['nama'])) {
		die(getAlert('Upps..','Anda sudah masuk','error','index.php'));
	}
}

function logout(){
	session_start();
	if (isset($_SESSION['nama']) OR isset($_COOKIE['nama'])) {
		session_destroy();
		if (isset($_COOKIE['nama'])) {
			setcookie('nama','',time() - (60 * 120),'/');
			setcookie('ID_USER','',time() - (60 * 120),'/');
			setcookie('level','',time() - (60 * 120),'/');
		}
		getAlert("Berhasil Keluar","Terima Kasih!","success","../index.php");
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
				case 'data-kasir':
				include "pages/data-kasir.php";
				break;
			case 'update-status':
				include "pages/update-status-order.php";
				break;
			case 'list-pesanan':
				include "pages/data-pesanan.php";
				break;
			case 'tambah-user':
				include "pages/tambah-user.php";
				break;
			case 'input-data-manual':
				include "pages/input-manual.php";
				break;				
			case 'list-pesanan-manual':
				include "pages/data-pesanan-manual.php";
				break;
			case 'data-paket':
				if (getIdUser() == '1') { include "pages/tambah-paket.php"; }
				else { echo "<center><h3>Maaf. Halaman hanya bisa di akses Owner !</h3></center>"; }
				break;
			case 'data-barberman':
				if (getIdUser() == '1') { include "pages/data-barberman.php"; }
				else { echo "<center><h3>Maaf. Halaman hanya bisa di akses Owner !</h3></center>"; }
				break;
			case 'data-admin':
				if (getIdUser() == '1') { include "pages/data-admin.php"; }
				else { echo "<center><h3>Maaf. Halaman hanya bisa di akses Owner !</h3></center>"; }
				break;				
			case 'laporan-pendapatan':
				if (getIdUser() == '1') { include "pages/cetak-laporan-pendapatan.php"; }
				else { echo "<center><h3>Maaf. Halaman hanya bisa di akses Owner !</h3></center>"; }
				break;
			case 'laporan-transaksi':
				if (getIdUser() == '1') { include "pages/cetak-laporan-transaksi.php"; }
				else { echo "<center><h3>Maaf. Halaman hanya bisa di akses Owner !</h3></center>"; }
				break;
			case 'data-transaksi':
				if (getIdUser() == '1') { include "pages/data-transaksi.php"; }
				else { echo "<center><h3>Maaf. Halaman hanya bisa di akses Owner !</h3></center>"; }
				break;			
			default:
				
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
			die(header("HTTP/1.0 422 Kata sandi Konfirmasi Tidak Sama"));
		} else if (strlen($pass) < 6) {
			die(header("HTTP/1.0 422 Kata sandi Harus Lebih Dari 6 Karakter"));
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
	} else {
		header("location:../../");
	}
}

function hapusUser($conn, $ID_USER){
	$query = mysqli_query($conn, "DELETE FROM data_user WHERE id_user = '".$ID_USER."' ");
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
		$query = mysqli_query($conn,"INSERT INTO paket_harga VALUES(NULL,'$nama','$harga','$ket','$detail','$diskon')");
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
  } else if (isset($_COOKIE['ID_USER'])) {
    $id_user = $_COOKIE['ID_USER'];
  }
  return $id_user;
}

function getNamaAdmin(){
	$id_user = '';
	if (isset($_SESSION['id_user'])) {
		$id_user = $_SESSION['nama'];
  	} else if (isset($_COOKIE['ID_USER'])) {
  		$id_user = $_COOKIE['nama'];
  	}
  	return $id_user;
}

function cekExpireBoking($conn){
	$query = mysqli_query($conn, "SELECT waktu_order,id_boking FROM boking 
			 WHERE id_user = '".getIdUser()."' ");
	foreach ($query as $key) {
		$dt = new DateTime($key['waktu_order'], new DateTimeZone("Asia/Jakarta"));
		$dt->format("F j, Y H:i:s");
		$dt->modify("+1 day");
		$dt->format("F j, Y H:i:s");
		date_default_timezone_set('Asia/Jakarta'); 
  		if (strtotime($dt->format("F j, Y H:i:s")) < strtotime(date("F j, Y H:i:s"))) {
  			mysqli_query($conn, "UPDATE boking SET status = 'expired'
  			WHERE id_user = '".getIdUser()."'
  			AND id_boking = '".$key['id_boking']."' AND status = 'pending' ");
		}
	}
}

function money_format($format, $number) 
{ 
    $regex  = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?'. 
              '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/'; 
    if (setlocale(LC_MONETARY, 0) == 'C') { 
        setlocale(LC_MONETARY, ''); 
    } 
    $locale = localeconv(); 
    preg_match_all($regex, $format, $matches, PREG_SET_ORDER); 
    foreach ($matches as $fmatch) { 
        $value = floatval($number); 
        $flags = array( 
            'fillchar'  => preg_match('/\=(.)/', $fmatch[1], $match) ? 
                           $match[1] : ' ', 
            'nogroup'   => preg_match('/\^/', $fmatch[1]) > 0, 
            'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ? 
                           $match[0] : '+', 
            'nosimbol'  => preg_match('/\!/', $fmatch[1]) > 0, 
            'isleft'    => preg_match('/\-/', $fmatch[1]) > 0 
        ); 
        $width      = trim($fmatch[2]) ? (int)$fmatch[2] : 0; 
        $left       = trim($fmatch[3]) ? (int)$fmatch[3] : 0; 
        $right      = trim($fmatch[4]) ? (int)$fmatch[4] : $locale['int_frac_digits']; 
        $conversion = $fmatch[5]; 

        $positive = true; 
        if ($value < 0) { 
            $positive = false; 
            $value  *= -1; 
        } 
        $letter = $positive ? 'p' : 'n'; 

        $prefix = $suffix = $cprefix = $csuffix = $signal = ''; 

        $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign']; 
        switch (true) { 
            case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+': 
                $prefix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+': 
                $suffix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+': 
                $cprefix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+': 
                $csuffix = $signal; 
                break; 
            case $flags['usesignal'] == '(': 
            case $locale["{$letter}_sign_posn"] == 0: 
                $prefix = '('; 
                $suffix = ')'; 
                break; 
        } 
        if (!$flags['nosimbol']) { 
            $currency = $cprefix . 
                        $csuffix; 
        } else { 
            $currency = ''; 
        } 
        $space  = $locale["{$letter}_sep_by_space"] ? ' ' : ''; 

        $value = number_format($value, $right, $locale['mon_decimal_point'], 
                 $flags['nogroup'] ? '' : $locale['mon_thousands_sep']); 
        $value = @explode($locale['mon_decimal_point'], $value); 

        $n = strlen($prefix) + strlen($currency) + strlen($value[0]); 
        if ($left > 0 && $left > $n) { 
            $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0]; 
        } 
        $value = implode($locale['mon_decimal_point'], $value); 
        if ($locale["{$letter}_cs_precedes"]) { 
            $value = $prefix . $currency . $space . $value . $suffix; 
        } else { 
            $value = $prefix . $value . $space . $currency . $suffix; 
        } 
        if ($width > 0) { 
            $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ? 
                     STR_PAD_RIGHT : STR_PAD_LEFT); 
        } 

        $format = str_replace($fmatch[0], $value, $format); 
    } 
    return $format; 
}

function hapusPesanan($conn){
	$query = mysqli_query($conn, "DELETE FROM boking WHERE id_boking = '".$_GET['id_boking']."' ");
	if ($query) {
		header("HTTP/1.0 200 Berhasil");
	} else {
		header("HTTP/1.0 422 Error");
	}
}

function hapusManual($conn){
	$query = mysqli_query($conn, "DELETE FROM boking_manual WHERE id_manual = '".$_GET['id_manual']."' ");
	if ($query) {
		header("HTTP/1.0 200 Berhasil");
	} else {
		header("HTTP/1.0 422 Error");
	}
}

function inputManual($conn){
	if (isset($_POST['nama_pelanggan'])) {
		$hargaFinal = 0;
		$nama = $_POST['nama_pelanggan'];
		$id_paket = $_POST['paket'];
		$kasir_id = $_POST['kasir_id'];
		$barberman = $_POST['barberman'];
		$bayar = $_POST['pembayaran'];
		$id_pesan = getIdOrder();
		$idKasir = getIdUser();
		date_default_timezone_set('Asia/Jakarta');
		$uang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga_paket,diskon_harga FROM paket_harga WHERE id_paket = '".$id_paket."' "));
		$hargaFinal = $uang['harga_paket'] - ($uang['harga_paket']*$uang['diskon_harga']/100);  
		$insert = mysqli_query($conn,"INSERT INTO boking_manual VALUES(NULL,'".$id_pesan."',
			'$id_paket','".date('M j, Y H:i')."','$barberman','$nama', '$bayar' ,'success','$kasir_id') ");
		if ($insert) {
			// getAlert("Berhasil Input Data Transaksi!","",
			// 	"success","../dashboard.php?page=input-data-manual");
			session_start();
			mysqli_query($conn,"INSERT INTO laporan VALUES('".$id_pesan."','Offline',
			'".getNamaAdmin()."','".date('d F, Y')."','".$hargaFinal."') ");
			header("HTTP/1.0 200 Berhasil");
		} else {
			// getAlert("Maaf terjadi kesalahan!","","error","../dashboard.php?page=input-data-manual");
			header("HTTP/1.0 422 Error");
		}
	} else {
		header("location:../../");
	}
}

function updatePesanan($conn){
	date_default_timezone_set('Asia/Jakarta');
	if (isset($_POST['update'])) {
		$hargaFinal = 0;
		$new = $_POST['pilihUpdate'];
		$id = $_POST['id_pesan'];
		$getPaket = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id_paket FROM boking 
			WHERE id_pesan = '".$id ."' "));
		$uang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga_paket,diskon_harga FROM paket_harga 
			WHERE id_paket = '".$getPaket['id_paket']."' "));
		$hargaFinal = $uang['harga_paket'] - ($uang['harga_paket']*$uang['diskon_harga']/100); 
		if (mysqli_query($conn, "UPDATE boking SET status = '$new' WHERE id_pesan = '$id' ")) {
			if (mysqli_affected_rows($conn)) {
				if ($new == 'success') {
					session_start();
					mysqli_query($conn,"INSERT INTO laporan VALUES('".$id."','Online',
					'".getNamaAdmin()."','".date('d F, Y')."','".$hargaFinal."') ");
				}
				getAlert("Berhasil Memperbaruai Status Pesanan","","success","../dashboard.php?page=list-pesanan");
			}else {
				getAlert("Gagal Memperbaruai Status Pesanan","","error","../dashboard.php?page=list-pesanan");
			}
		} else {
			getAlert("Gagal Memperbaruai","","error","../dashboard.php?page=list-pesanan");
		}
	} else {
		header('location:../../');
	}
	mysqli_close($conn);
}

function tambahBarberman($conn){
	if (isset($_POST['submit'])) {
		$nama = $_POST['nama'];
		$q = mysqli_query($conn, "INSERT INTO barberman VALUES(NULL,'".$nama."') ");
		if ($q) {
			getAlert("Berhasil Menambahkan Barberman","","success","../dashboard.php?page=data-barberman");
		} else {
			getAlert("Gagal Menambahkan Barberman","","error","../dashboard.php?page=data-barberman");
		}
	} else {
		getAlert("Upsss","","","../dashboard.php?page=data-barberman");
	}
}