<?php

function getIdUser(){
	$id_user = '';
	if (isset($_SESSION['id_user'])) {
		$id_user = $_SESSION['id_user'];
  	} else if (isset($_COOKIE['ID'])) {
  		$id_user = $_COOKIE['ID'];
  	}
  	return $id_user;
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
	return 'KPK-'.generateRandomString(4).'-'.$angka;
}   

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

function switchPages(){

	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'main':
				include "pages/main.php";
				break;
			case 'upload-photo':
				include "pages/upload-photo.php";
				break;
			case 'pilih-waktu':
				include "pages/pilih-waktu.php";
				break;
			case 'list-order':
				include "pages/list-order.php";
				break;				
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}else{
		include "pages/main.php";
	}
}

function uploadFotoProfile($conn){
	//UPLOAD GAMBAR
	if (isset($_POST['submit'])) {
	    $namaFile = $_FILES['photo']['name'];
	    //$ukuranFile = $_FILES['gambar']['size'];
	    $error = $_FILES['photo']['error'];
	    $tmpName = $_FILES['photo']['tmp_name'];

	    $extensiGambarValid = ['jpg','jpeg','png','gif'];
	    $extensiGambar = explode('.', $namaFile);
	    $extensiGambar = strtolower(end($extensiGambar));

	    $namaFileBaru = uniqid();
	    $namaFileBaru .= '.';
	    $namaFileBaru .= $extensiGambar;

	    if (!in_array($extensiGambar, $extensiGambarValid)) {
	    	getAlert("Gagal!","Bukan Gambar","error","../dashboard.php");
	    } else if (empty($_FILES['photo']['name'])) {
	        getAlert("Gagal!","Pilih foto dulu","error","../dashboard.php");
	    } else {

	        if (move_uploaded_file($tmpName, '../../assets/images/photo-user/'. $namaFileBaru)) {
	            if (isset($_SESSION['id_user'])) {
	                $q = mysqli_query($conn, "UPDATE data_user SET foto = '$namaFileBaru' WHERE id_user = '".$_SESSION['id_user']."' ");
	                if ($q) {
	                   getAlert("Berhasil!","Sekarang anda bisa mengakses halaman dashboard","success","../dashboard.php");
	                } else {
	                    getAlert("Gagal!","Query Error","error","../dashboard.php");
	                }
	            } else if (isset($_COOKIE['ID'])) {
	                $q = mysqli_query($conn, "UPDATE data_user SET foto = '$namaFileBaru' WHERE id_user = '".$_COOKIE['ID']."' ");
	                if ($q) {
	                    getAlert("Berhasil!","Sekarang anda bisa mengakses halaman dashboard","success","../dashboard.php");
	                } else {
	                    getAlert("Gagal!","Query Error","error","../dashboard.php");
	                }
	            }
	           
	        } else {
	            getAlert("Gagal!","Coba ulangi lagi","error","../dashboard.php");
	        }
	    }
	    
	} else {
	    header('location:../dashboard.php');
	}
    //UPLOAD GAMBAR
}

function updateProfileUmum($conn){
	$id_user = '';
	if (isset($_SESSION['id_user'])) {
		$id_user = $_SESSION['id_user'];
  	} else if (isset($_COOKIE['ID'])) {
  		$id_user = $_COOKIE['ID'];
  	}

	if (isset($_POST['updateProfile'])) {
		$fName = $_POST['fName'];
		$lName = $_POST['lName']; $fullname = $fName.' '.$lName;
		$hp = $_POST['nohp'];
		$cek = mysqli_query($conn,"SELECT * FROM data_user WHERE fullname = '$fullname'AND no_hp = '$hp' AND id_user = '$id_user' ");
		$cek_row = mysqli_num_rows($cek);
		if (!empty($_FILES['foto']['name'])) {
			$namaFile = $_FILES['foto']['name'];
			$tmpName = $_FILES['foto']['tmp_name'];
		    //$ukuranFile = $_FILES['gambar']['size'];
		    $extensiGambarValid = ['jpg','jpeg','png','gif'];
		    $extensiGambar = explode('.', $namaFile);
		    $extensiGambar = strtolower(end($extensiGambar));

		    $namaFileBaru = uniqid();
		    $namaFileBaru .= '.';
		    $namaFileBaru .= $extensiGambar;
		    if (!in_array($extensiGambar, $extensiGambarValid)) {
		    	getAlert("Gagal!","Bukan Gambar","error","../../dashboard.php");
		    } else if (move_uploaded_file($tmpName, '../../../assets/images/photo-user/'. $namaFileBaru)) {
				$update = mysqli_query($conn,"UPDATE data_user SET fullname = '$fullname', no_hp = '$hp', foto = '$namaFileBaru'  WHERE id_user = '$id_user' ");
				if ($update) {
					getAlert("Berhasil!","Profile anda berhasil di update","success","../../dashboard.php");
				} else {
					getAlert("Gagal!","Query Error","error","../../dashboard.php");
				}
			} else {
				getAlert("Gagal!","Coba ulangi lagi","error","../../dashboard.php");
			}

		} else if ($cek_row) {
			getAlert("OK! Data Tidak Berubah","","","../../dashboard.php");
		} else {
			$update = mysqli_query($conn,"UPDATE data_user SET fullname = '$fullname', no_hp = '$hp' WHERE id_user = '$id_user' ");
			if ($update) {
				getAlert("Berhasil!","Profile anda berhasil di update","success","../../dashboard.php");
			} else {
				getAlert("Gagal!","Query Error","error","../../dashboard.php");
			}
		}
		// echo $id_user;
	} else {
		header('location:../../dashboard.php');
	}

}

function getOldPassword($conn){
	$q = mysqli_query($conn,"SELECT password FROM data_user WHERE id_user = '".getIdUser()."' ");
	$res = mysqli_fetch_assoc($q);
	return $res['password'];
}

function updatePassword($conn){
	if (isset($_POST['updatePassword'])) {
		$old = $_POST['oldPass'];
		$new = $_POST['newPass'];
		if ($new != $_POST['newPassFix']) {
			getAlert("Gagal!","Konfirmasi Password Berbeda","error","../../dashboard.php");
		} else if ($old != getOldPassword($conn)) {
			getAlert("Gagal!","Password lama salah","error","../../dashboard.php");
		} else if (strlen($new) < 6) {
			getAlert("Gagal!","Password harus lebih dari 6 karakter","error","../../dashboard.php");
		} else if($old == $new){
			getAlert("Gagal!","Password baru harus berdeda dengan password lama","error","../../dashboard.php");
		} else {
			$update = mysqli_query($conn, "UPDATE data_user SET password = '$new' WHERE id_user = '".getIdUser()."' ");
			if ($update) {
				getAlert("Berhasil!","Password telah di ubah! Silahkan Login lagi.","success","../../../../login.php");
				if (isset($_SESSION['nama']) OR isset($_COOKIE['nama'])) {
					session_destroy();
					if (isset($_COOKIE['nama'])) {
						setcookie('nama','',time() - (60 * 120),'/');
						setcookie('ID','',time() - (60 * 120),'/');
					}
				}
			} else {
				getAlert("Gagal!","Query Error","error","../../dashboard.php");
			}
		}
	} else {
		header('location:../../dashboard.php');
	}
}

function boking($conn){
	if (isset($_POST['bokingNow'])) {
		$id_paket = $_POST['id_paket'];
		$waktu = $_POST['waktu'];
		$hari = $_POST['hari'];
		$barberman = $_POST['barberman'];
		$bayar = $_POST['pembayaran'];
		date_default_timezone_set('Asia/Jakarta'); 
		$insert = mysqli_query($conn,"INSERT INTO boking VALUES('','".getIdOrder()."',
			'$id_paket','$waktu','$hari','$barberman','".getIdUser()."','".date('F j, Y H:i:s')."', '".$bayar."' ,'pending') ");
		if ($insert) {
			getAlert("Berhasil Boking Tempat!","Silahkan lanjutkan untuk pembayaran","success","../dashboard.php?page=list-order");
			unset($_SESSION['cart']);
		} else {
			getAlert("Maaf terjadi kesalahan!","","error","../dashboard.php?page=pilih-waktu");
		}
	} else {
		getAlert("Hohoho!","","","../dashboard.php?page=pilih-waktu");
	}
}

function getCart(){
	if (isset($_POST['pesan'])) {
		session_start();
		$_SESSION['cart'] = $_POST['id_paket'];
		getAlert("Berhasil memasukkan keranjang!","Silahkan lanjutkan untuk prosses boking","success","../dashboard.php?page=pilih-waktu");
	} else {
		header('location:../');
	}
}

function hapusCart(){
	session_start();
	if (isset($_SESSION['cart'])) {
		unset($_SESSION['cart']);
		getAlert("Berhasil mengosongkan keranjang!","","success","../");
	} else {
		header('location:../');
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
