<?php
include '../../assets/config/koneksi.php';
include '../function.php';
     $valOp = $_POST['ov'];
     $q = mysqli_query($conn,"SELECT * FROM paket_harga WHERE id_paket = '".$valOp."' ");
     $res = mysqli_fetch_assoc($q);
     $hargaSetelahDiskon = (int)$res['harga_paket'] - ((int)$res['harga_paket'] * $res['diskon_harga'] / 100);
//     $hargaSetelahDiskonMember = (int)$res['harga_paket_member'] - ((int)$res['harga_paket_member'] * $res['diskon_harga'] / 100);
//     echo '<h1 class="block">'.$res['nama_paket'].'</h1>';
//     echo '<h5 class="block">'.$res['detail_paket'].'</h5>';
//     echo '<div class="col-xs-6 col-sm-12 col-md-12">';
    echo '<h3><strong class="text-black-dk">Umum</strong></h3>';
     if($res['diskon_harga'] != 0){
           echo '<h4 class="block"><del>Rp '.str_replace('+', '', money_format('%i', $res['harga_paket'])).'</del></h4>
           <h3 class="block">Rp '.str_replace('+', '', money_format('%i', $hargaSetelahDiskon)).'</h3>';
     } else {
//       echo '<h1 class="block">'.$res['nama_paket'].'</h1>
           echo '<h3 class="block">Rp '.str_replace('+', '', money_format('%i', $res['harga_paket'])).'</h3>';
     }
//     echo '</div>';
//     echo '<div class="col-xs-6 col-sm-12 col-md-12">';
//        if($res['diskon_harga'] != 0){
//          echo '<h4 class="block"><del>Rp '.str_replace('+', '', money_format('%i', $res['harga_paket_member'])).'</del></h4>
//                   <h3 class="block">Rp '.str_replace('+', '', money_format('%i', $hargaSetelahDiskonMember)).'</h3>';
//        } else {
//        //       echo '<h1 class="block">'.$res['nama_paket'].'</h1>
//          echo '<h3 class="block">Rp '.str_replace('+', '', money_format('%i', $res['harga_paket_member'])).'</h3>';
//        }
//     echo '</div>';
