<?php
include '../../assets/config/koneksi.php'; 
session_start();
if (isset($_SESSION['id_user'])) {
    $q = mysqli_query($conn,"SELECT foto FROM data_user WHERE id_user = '".$_SESSION['id_user']."' ");
    $res = mysqli_fetch_assoc($q);
    if (is_null($res['foto']) OR empty($res['foto'])) {
    	echo "kosong";
    } else {
    	echo "ada";
    }
} else if (isset($_COOKIE['ID'])) {
	$q = mysqli_query($conn,"SELECT foto FROM data_user WHERE id_user = '".$_COOKIE['ID']."' ");
	$res = mysqli_fetch_assoc($q);
    if (is_null($res['foto']) OR empty($res['foto'])) {
    	echo "kosong";
    } else {
    	echo "ada";
    }
}