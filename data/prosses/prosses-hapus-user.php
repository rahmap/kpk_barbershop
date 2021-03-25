<?php 
  include '../../assets/config/koneksi.php';
  include '../function.php';  
?>

<?php 

hapusUser($conn, $_GET['id_user']);

?>

