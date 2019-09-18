function hideForm(){
	$.ajax({
	    url: 'data/cek-session.php',
	    type: 'POST',
	    success: function(result) {
	        if (result == 'member'){
				$('#regis').hide();
				$('#getRegis').html('Pesan Sekarang!');
				$('#getRegis').attr('href','#boking');
				$('#btnLogin').html('Member Area').attr('href','data/member/');
	        } else if (result == 'admin'){
				$('#regis').hide();
				$('#getRegis').html('Pesan Sekarang!');
				$('#getRegis').attr('href','#boking');
				$('#btnLogin').html('Dasbor').attr('href','data/');
	        } else if (result == 'owner'){
				$('#regis').hide();
				$('#getRegis').html('Pesan Sekarang!');
				$('#getRegis').attr('href','#boking');
				$('#btnLogin').html('Dasbor').attr('href','data/');
	        } else {
	        	$('#btnLogout').hide();
	        }
	    }
	});
}

function editBtnBoking(){
	$.ajax({
		url : 'data/cek-session.php',
		type : 'POST',
		success : function(res){
			$.ajax({
				url : 'data/cek-count-paket.php',
				type : 'POST',
				success : function(jml){
					for(var i=1;i<=jml;i++){
						if (res == 'member' || res == 'admin' || res == 'owner') {
							$('#formBoking'+i).submit(function(e){
								$('#modalBoking').hide();
							})
						} else {
							$('#formBoking'+i).submit(function(){
								$('#btnBoking'+i).attr('data-toggle','');
								return false;
							})
						}
					}
				}
			})
		},
	})
}

function getPaket(){
	$.get('data/prosses/loadPaketHarga.php', function(data){
		$('#boking').html(data);
	})
}

getPaket();
editBtnBoking();
hideForm();