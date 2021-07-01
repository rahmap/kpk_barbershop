<?php
  include '../../assets/config/koneksi.php';
  include '../function.php'; 

  $q = mysqli_query($conn, "SELECT * FROM paket_harga ph 
  JOIN boking b ON b.id_paket = ph.id_paket 
  JOIN data_user ON b.id_user = data_user.id_user 
  LEFT JOIN barberman bar ON bar.id_barberman = b.id_barberman
  JOIN waktu_boking wb ON wb.id_waktu = b.id_waktu 
  ORDER BY b.id_boking DESC ");

  $statusLbl; 
  foreach ($q as $key) {
    
    if ($key['diskon_harga'] != 0) {
      $diskon = $key['harga_paket']*$key['diskon_harga'] /100;
    } else {
      $diskon = 0;
    }
    $fullUnik = explode('-', $key['id_pesan']);
    $fullUnik = end($fullUnik);
    $fullUnik = $fullUnik + $key['harga_paket'] - $diskon;
    $status = $key['status'];
    if ($status == 'success') {
      $statusLbl = "success";
    } else if ($status == 'pending') {
      $statusLbl = "warn";
    } else {
      $statusLbl = "red";
    }
    echo '<tr>
            <td>'.$key['id_boking'].'</td>
            <td>'.$key["nama_paket"].'</td>
            <td>'.$key["fullname"].'</td>
            <td><b>'.$key["jam"].' - '.$key["hari"].'<b></td>
            <td>'.$key["nama_barberman"].'</td>
            <td >Rp '.str_replace('+', '', money_format('%i', $key["harga_paket"] - $diskon)).'</td>
            <td>'.$key["pembayaran"].'</td>
            <td><span class="label '.$statusLbl.' " title="Active">'.$key['status'].'</span></td>
            <td class="text-center"><button id="btnDetail" class="md-btn md-raised m-b-sm w-xs blue" data-toggle="modal" data-target="#m-a-a" ui-toggle-class="flip-y" ui-target="#animate" data-harga="'.str_replace('+', '', money_format('%i',$fullUnik)).'" data-id="'.$key['id_boking'].'" data-unik="'.$key['id_pesan'].'" data-bank="'.$key['pembayaran'].'">Detail</button>   ';
            if ($status == 'pending' ) {
              echo '<button data-href="prosses/prosses-hapus-pesanan.php?id_boking='.$key['id_boking'].'" class="md-btn md-raised m-b-sm w-xs pink btnHapus" data-toggle="modal" data-target="#confirm-delete" ui-toggle-class="zoom" ui-target="#animate">Hapus</button>
              <a href="dashboard.php?page=update-status&id_boking='.$key['id_pesan'].' "><button class="md-btn md-raised m-b-sm w-xs primary btnUpdate">Update</button></a></td>';
            }
              
          echo '</tr>';
  } 
?>