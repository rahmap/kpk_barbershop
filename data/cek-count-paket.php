<?php
include '../assets/config/koneksi.php';

$q = mysqli_query($conn,"SELECT COUNT(id_paket) AS jml FROM paket_harga ");
$res = mysqli_fetch_assoc($q);
echo $res['jml'];