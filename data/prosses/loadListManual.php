<?php
  include '../../assets/config/koneksi.php';
  include '../function.php'; 

  $q = mysqli_query($conn, "SELECT * FROM boking_manual b
  JOIN paket_harga ph  ON b.id_paket = ph.id_paket 
  JOIN barberman bar ON bar.id_barberman = b.id_barberman
  ORDER BY b.id_manual ASC ");

  $statusLbl; 
  foreach ($q as $key) {
    if ($key['status'] == 'success') {
      $statusLbl = "success";
    } else if ($key['status'] == 'pending') {
      $statusLbl = "warn";
    } else {
      $statusLbl = "red";
    }
    echo '<tr>
            <td>'.$key["nama_paket"].'</td>
            <td><b>'.$key["waktu_transaksi"].'<b></td>
            <td>'.$key["nama_barberman"].'</td>
            <td data-value="'.$key["harga_paket"].'">Rp. '.money_format('%i', $key["harga_paket"]).'</td>
            <td>'.$key["pembayaran"].'</td>
            <td><span class="label '.$statusLbl.' " title="Active">'.$key['status'].'</span></td>
            <td><button id="btnDetail" class="md-btn md-raised m-b-sm w-xs blue" data-toggle="modal" data-target="#m-a-a" ui-toggle-class="flip-y" ui-target="#animate"  data-id="'.$key['id_manual'].'" data-unik="'.$key['id_pesan'].'" >Detail</button>   <button data-href="prosses/prosses-hapus-manual.php?id_manual='.$key['id_manual'].'" class="md-btn md-raised m-b-sm w-xs pink btnHapus" data-toggle="modal" data-target="#confirm-delete" ui-toggle-class="zoom" ui-target="#animate">Hapus</button></td>
          </tr>';
  } 
?>