<?php
include '../../assets/config/koneksi.php';
include '../function.php';
     $valOp = $_POST['ov'];
     $q = mysqli_query($conn,"SELECT * FROM paket_harga WHERE id_paket = '".$valOp."' ");
     $res = mysqli_fetch_assoc($q);
     echo '<h1 class="block mt-3 text-warning"><strong>'.$res['nama_paket'].'</strong></h1>';
     echo '<h5 class="block">'.$res['detail_paket'].'</h5>';
     if($res['diskon_harga'] != 0){
      echo '<h5 class="block"><i>Diskon : '.$res['diskon_harga'].' %</i></h5>';
     }
