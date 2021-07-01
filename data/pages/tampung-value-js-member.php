<?php
include '../../assets/config/koneksi.php';
include '../function.php';
     $valOp = $_POST['ov'];
     $q = mysqli_query($conn,"SELECT * FROM paket_harga WHERE id_paket = '".$valOp."' ");
     $res = mysqli_fetch_assoc($q);
     $hargaSetelahDiskonMember = (int)$res['harga_paket_member'] - ((int)$res['harga_paket_member'] * $res['diskon_harga'] / 100);
      echo '<h3><strong class="text-primary">Member</strong></h3>';
      if($res['diskon_harga'] != 0){
        echo '<h5 class="block"><del>Rp '.str_replace('+', '', money_format('%i', $res['harga_paket_member'])).'</del></h5>
                 <h3 class="block">Rp '.str_replace('+', '', money_format('%i', $hargaSetelahDiskonMember)).'</h3>';
      } else {
        echo '<h3 class="block">Rp '.str_replace('+', '', money_format('%i', $res['harga_paket_member'])).'</h3>';
      }
