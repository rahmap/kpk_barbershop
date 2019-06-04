function hideForm(){
	$.ajax({
	    url: 'data/cek-session.php',
	    type: 'POST',
	    success: function(result) {
	        if (result == 'aktif'){
				$('#regis').hide();
				$('#getRegis').html('Boking Sekarang!');
				$('#getRegis').attr('href','#boking');
				$('#btnLogin').html('Member Area').attr('href','data/member/');
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
						if (res != 'aktif') {
							$('#formBoking'+i).submit(function(){
								$('#btnBoking'+i).attr('data-toggle','');
								return false;
							})
						} else {
							$('#formBoking'+i).submit(function(e){
								$('#modalBoking').hide();
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