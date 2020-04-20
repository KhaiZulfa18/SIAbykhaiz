

$('#btnkirim').click(function(){
	kirim();
});

function kirim(){

	$('#attention').html('<div class="alert alert-success" role="alert">Terima Kasih Atas Masukkan Anda!</div>');

	var base_url = $('#base_url').val();
	var nama = $('#nama').val();
	var email = $('#email').val();
	var subjek = $('#subjek').val();
	var masukkan = $('#masukkan').val();	

	var lanjut = true;

	if(masukkan.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Maaf, Harap isi Saran atau Kritik anda</div>');
		return false;
	}
	if(nama.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Maaf, Harap isi Nama Anda</div>');
		return false;
	}
	if(email.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">MAaf, Harap isi Email Anda</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'school/kirim_masukkan',
        	data : {
        		nama:nama,
        		email:email,
        		subjek:subjek,
        		masukkan:masukkan
        	},
			success	: function(response){ 
				if(response.status=='gagal'){
					$('#attention').html(response.pesan);
				}
				else{
					$('#attention').html(response.pesan);
					clear_data();
            	}
			}
		});
	}
}

function clear_data(){
	
	$('#email').val('');
	$('#nama').val('');
	$('#subjek').val('');
	$('#masukkan').val('');

}