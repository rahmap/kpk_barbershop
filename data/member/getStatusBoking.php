<?php
  include '../../assets/config/koneksi.php'; 
  include 'myFunMember.php';
  session_start();

  $query = mysqli_query($conn, "SELECT waktu_order FROM boking WHERE id_boking = '".$_SESSION['IDBO']."' ");
  $res = mysqli_fetch_assoc($query);

  $dt = new DateTime($res['waktu_order'], new DateTimeZone("Asia/Jakarta"));
  $dt->format("F j, Y H:i:s");
  $dt->modify("+1 day");
  $dt->format("F j, Y H:i:s");

  date_default_timezone_set('Asia/Jakarta'); 
  if (strtotime($dt->format("F j, Y H:i:s")) < strtotime(date("F j, Y H:i:s"))) {
    mysqli_query($conn, "UPDATE boking SET status = 'expired' WHERE id_boking = '".$_SESSION['IDBO']."' ");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <h4 id="demo"></h4>

<script>
  var countDownDate = new Date("<?= $dt->format("F j, Y H:i:s") ?>").getTime();
  var now;
  setInterval(function() {

    now = new Date().getTime();
    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    if (distance < 0) {
      document.getElementById("demo").innerHTML = "EXPIRED";
    }
  }, 1000);

</script>
</body>
</html>