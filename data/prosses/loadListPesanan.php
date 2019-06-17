<?php
  include '../../assets/config/koneksi.php';
  include '../function.php'; 

  $q = mysqli_query($conn, "SELECT * FROM paket_harga ph 
  JOIN boking b ON b.id_paket = ph.id_paket 
  JOIN barberman bar ON bar.id_barberman = b.id_barberman
  JOIN waktu_boking wb ON wb.id_waktu = b.id_waktu 
  ORDER BY b.id_boking ASC ");

  $statusLbl; 
  foreach ($q as $key) {
    $fullUnik = explode('-', $key['id_pesan']);
    $fullUnik = end($fullUnik);
    $fullUnik = $fullUnik + $key['harga_paket'];
    if ($key['status'] == 'success') {
      $statusLbl = "success";
    } else if ($key['status'] == 'pending') {
      $statusLbl = "warn";
    } else {
      $statusLbl = "red";
    }
    echo '<tr>
            <td>'.$key["nama_paket"].'</td>
            <td><b>'.$key["jam"].' - '.$key["hari"].'<b></td>
            <td>'.$key["nama_barberman"].'</td>
            <td data-value="'.$key["harga_paket"].'">Rp. '.money_format('%i', $key["harga_paket"]).'</td>
            <td>'.$key["pembayaran"].'</td>
            <td><span class="label '.$statusLbl.' " title="Active">'.$key['status'].'</span></td>
            <td><button id="btnDetail" class="md-btn md-raised m-b-sm w-xs blue" data-toggle="modal" data-target="#m-a-a" ui-toggle-class="flip-y" ui-target="#animate" data-harga="'.money_format('%i',$fullUnik).'" data-id="'.$key['id_boking'].'" data-unik="'.$key['id_pesan'].'" data-bank="'.$key['pembayaran'].'">Detail</button>   <button data-href="prosses/prosses-hapus-pesanan.php?id_boking='.$key['id_boking'].'" class="md-btn md-raised m-b-sm w-xs pink btnHapus" data-toggle="modal" data-target="#confirm-delete" ui-toggle-class="zoom" ui-target="#animate">Hapus</button></td>
          </tr>';
  } 
?>