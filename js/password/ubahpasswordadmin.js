$('#btnedit').click(function(){
	edit();
});

function edit(){

	var id = $('#id').val();
	var base_url = $('#base_url').val();
	var passwordbaru = $('#passwordbaru').val();
	var passwordlama = $('#passwordlama').val();
	var confirmpassword = $('#confirmpassword').val();

	var lanjut = true;

	//$('#attention').html('Data Berhasil Disimpan!');

	if(passwordbaru.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Password Masih Kosong</div>');
		return false;
	}
	if(passwordlama.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Masukkan Password Anda</div>');
		return false;
	}
	if (confirmpassword.length==0) {
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Konfirmasi Password Masih Kosong!</div>');
		return false;
	}
	
	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'akademik/update_passwordadmin',
			data : {
				id:id,
				confirmpassword:confirmpassword,
				passwordbaru:passwordbaru,
				passwordlama:passwordlama
        	},
        	dataType:"json",
			success	: function(response){
				if(response.status=='gagal'){
					$('#attention').html(response.pesan);
					clear_data();
				}
				else{
					$('#attention').html(response.pesan);
					clear_data();
            	}
			}
		});
	}
}
$('#btnback').click(function() {
	back();
});

function back(){
	var base_url = $('#base_url').val();
	var id = $('#id').val();

	window.location.assign(base_url+"akademik/profiladmin");
}

function clear_data(){
	$('#passwordbaru').val('');
	$('#passwordlama').val('');
	$('#confirmpassword').val('');
}