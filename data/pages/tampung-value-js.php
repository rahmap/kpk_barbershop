<?php
include '../../assets/config/koneksi.php';
include '../function.php';
     $valOp = $_POST['ov'];
     $q = mysqli_query($conn,"SELECT * FROM paket_harga WHERE id_paket = '".$valOp."' ");
     $res = mysqli_fetch_assoc($q);
     echo '<strong class="block">'.$res['nama_paket'].'</strong>
           <span class="block">Rp '.str_replace('+', '', money_format('%i', $res['harga_paket'])).'</span>';