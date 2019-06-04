
function cekLevel(){
	$.ajax({
	    url: 'cek-session.php',
	    type: 'POST',
	    success: function(result) {
	        if (result == 'aktif'){
				
	        } else {
	        	
	        }
	    }
	});
}

function tambahUser(){
	$(document).ready(function(){
		$('#formTambahUser').on('submit', function(e){
			e.preventDefault();
			$.ajax({
				type : $(this).attr('method'),
				url : $(this).attr('action'),
				data : $(this).serialize(),
				beforeSend : function(){
					$('#loading').show();
				},
				statusCode : {
					422 : function(e,f,g){
						setTimeout(function(){
							const isi = {text : g, title : 'Gagal!', type : 'error'};
							$('#loading').hide();
							resetForm();
							status(isi);
						}, 3000)
					},
					200 : function(){
						setTimeout(function(){
							const isi = {text : 'Data Ditambahkan!.', title : 'Berhasil!', type : 'success'};
							$('#loading').hide();
							resetForm();
							status(isi);
						}, 3000)
					},
				},
			});
		})
	});
}


function status(txt){
	const { title, text, type } = txt;
	Swal.fire({
		title,
		text,
		type
	});
}

function resetForm(){
	$('[type=text]').val('');
	$('[type=password]').val('');
	$('[type=email]').val('');
	$('[type=number]').val('');
}

tambahUser();
