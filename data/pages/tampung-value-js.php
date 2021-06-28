<?php
include '../../assets/config/koneksi.php';
include '../function.php';
     $valOp = $_POST['ov'];
     $q = mysqli_query($conn,"SELECT * FROM paket_harga WHERE id_paket = '".$valOp."' ");
     $res = mysqli_fetch_assoc($q);
     $hargaSetelahDiskon = (int)$res['harga_paket'] - ((int)$res['harga_paket'] * $res['diskon_harga'] / 100);
     if($res['diskon_harga'] != 0){
       echo '<h4 class="block">'.$res['nama_paket'].'</h4>
           <h4 class="block"><del>Rp '.str_replace('+', '', money_format('%i', $res['harga_paket'])).'</del></h4>
           <h3 class="block">Rp '.str_replace('+', '', money_format('%i', $hargaSetelahDiskon)).'</h3>';
     } else {
       echo '<h4 class="block">'.$res['nama_paket'].'</h4>
           <h3 class="block">Rp '.str_replace('+', '', money_format('%i', $res['harga_paket'])).'</h3>';
     }