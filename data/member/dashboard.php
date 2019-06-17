<?php
	session_start();
	if (!isset($_SESSION['nama']) AND !isset($_COOKIE['nama'])) {
		header('location:../');
	}
?>
<?php include 'pages/sidebar.php'; ?>
  

<?php include 'myFunMember.php'; switchPages(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
		    url: 'cek-foto.php',
		    type: 'POST',
		    success: function(result) {
		        if (result == 'kosong'){
					$('#btnShowPhoto').click();
		        }
		    }
		});
	})

</script>



<?php include 'pages/footer.php'; ?>
