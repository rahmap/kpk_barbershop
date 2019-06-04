<?php
  include '../../assets/config/koneksi.php'; 
  include 'myFunMember.php';

  date_default_timezone_set('Asia/Jakarta'); 
  $nextWeek = time() + (1 * 12 * 60 * 60);
                     // 7 days; 24 hours; 60 mins; 60 secs
  $query = mysqli_query($conn, "SELECT * FROM boking WHERE id_pesan = 'KPK-paVl-465' ");
  $res = mysqli_fetch_assoc($query);

  echo $res['id_pesan'].$res['waktu_order'];
  // if(date('M d, Y H:i:s') < date('M d, Y H:i:s', $nextWeek)){
  //   echo "<br>Bener";
  //   echo "<br>Next Week : ".date('M d, Y H:i:s', $nextWeek);
  //   echo " > Saiki : ".date('M d, Y H:i:s');
  // } else {
  //   echo "<br>Salah";
  //   echo "<br>Next Week : ".date('M d, Y H:i:s', $nextWeek);
  //   echo " < Saiki : ".date('M d, Y H:i:s');
  // }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <p id="demo"></p>
  <p id="demo1"></p>
<script>
  function formatDate(date) {
    var monthNames = [
      "January", "February", "March",
      "April", "May", "June", "July",
      "August", "September", "October",
      "November", "December"
    ];

    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();
    var jam = date.getHours();
    var mnt = date.getMinutes();

    return year + '-' + monthIndex + '-' + day + ' ' + jam + ':' + mnt;
  }

  console.log(formatDate(new Date()));  // show current date-time in console
  // Set the date we're counting down to

  // Set the date we're counting down to KPK-paVl-465
  var countDownDate = new Date("<?= $res['waktu_order'] ?>").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text 
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
      <?php
        $q = mysqli_query($conn, "UPDATE boking SET status = 'success' WHERE id_pesan = 'KPK-paVl-465' ");  
        if ($q) $A = "Berhasil";  else  $A = "Gagal";
      ?>
      document.getElementById("demo1").innerHTML = "<?= $A ?>";
    }
  }, 1000);
</script>
</body>
</html>