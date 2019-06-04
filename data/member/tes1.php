<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getIdOrder()  
{   
	$angka = sprintf("%03s",rand(999,1));
	return 'KPK-'.generateRandomString(4).'-'.$angka;
}  

$extensiGambar = explode('-', getIdOrder());
$extensiGambar = end($extensiGambar);
echo $extensiGambar;

echo "<br><br>";

date_default_timezone_set('Asia/Jakarta'); 
$nextWeek = time() + (2 * 12 * 60 * 60);
echo $nextWeek;
$tes = "Jan 5, 2021 15:37:25";
echo $tes;
                   // 7 days; 24 hours; 60 mins; 60 secs
if(date('M d, Y H:i:s') < date('M d, Y H:i:s', $nextWeek)){
	echo "<br>Bener";
	echo "<br>Next Week : ".date('M d, Y H:i:s', $nextWeek);
	echo " > Saiki : ".date('M d, Y H:i:s');
} else {
	echo "<br>Salah";
	echo "<br>Next Week : ".date('M d, Y H:i:s', $nextWeek);
	echo " < Saiki : ".date('M d, Y H:i:s');
}
// echo 'Next Week: '.  ."<br>";
// or using strtotime():
echo "<br>Tes ".date('M d, Y H:i:s')." ||  ".date('Y-m-d H:i', +$nextWeek);
echo '<br>Next Week: '. date('Y-m-d H:i', strtotime("+1 hour")) ."<br>";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- Display the countdown timer in an element -->
<p id="demo"></p>

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

// Set the date we're counting down to
var countDownDate = new Date('<?= $tes ?>').getTime();

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
  }
}, 1000);
</script>
</body>
</html>